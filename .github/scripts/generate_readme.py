import os
import subprocess
import requests
import shutil

GITHUB_TOKEN = os.environ["GITHUB_TOKEN"]
GITHUB_USER = os.environ["GIT_USER"]
REPO_DIR = os.path.abspath(os.path.join(os.path.dirname(os.path.abspath(__file__)), "../../"))

headers = {
    "Authorization": f"token {GITHUB_TOKEN}",
    "Accept": "application/vnd.github+json"
}

def fetch_all_gists():
    gists, page = [], 1
    while True:
        r = requests.get(
            f"https://api.github.com/gists?per_page=100&page={page}",
            headers=headers
        )
        r.raise_for_status()
        data = r.json()
        if not data:
            break
        gists.extend(data)
        page += 1
    print(f"Found {len(gists)} gists.")
    return gists

def safe_folder_name(desc, gist_id):
    """Use description if available, otherwise gist ID."""
    name = desc.strip() if desc and desc.strip() else gist_id
    # Replace characters that are invalid in folder names
    for ch in ['/', '\\', ':', '*', '?', '"', '<', '>', '|']:
        name = name.replace(ch, '-')
    return name[:60]  # cap length

def sync_gist(gist):
    gist_id = gist["id"]
    desc = gist.get("description", "")
    folder_name = safe_folder_name(desc, gist_id)
    folder = os.path.join(REPO_DIR, "gists", folder_name)
    os.makedirs(folder, exist_ok=True)

    # Write a metadata file
    with open(os.path.join(folder, "_meta.txt"), "w") as f:
        f.write(f"Gist ID:     {gist_id}\n")
        f.write(f"Description: {desc}\n")
        f.write(f"URL:         https://gist.github.com/{gist_id}\n")
        f.write(f"Updated at:  {gist['updated_at']}\n")
        f.write(f"Files:       {', '.join(gist['files'].keys())}\n")

    # Clone or pull the gist repo into a temp dir
    clone_dir = os.path.join(folder, ".gist_clone")
    gist_url = f"https://{GITHUB_TOKEN}@gist.github.com/{gist_id}.git"

    try:
        if os.path.exists(clone_dir):
            result = subprocess.run(
                ["git", "-C", clone_dir, "pull"],
                capture_output=True, text=True
            )
        else:
            result = subprocess.run(
                ["git", "clone", gist_url, clone_dir],
                capture_output=True, text=True
            )
        if result.returncode != 0:
            print(f"  WARNING: git error for {gist_id}: {result.stderr.strip()}")
            return
    except Exception as e:
        print(f"  ERROR cloning/pulling {gist_id}: {e}")
        return

    # Copy gist files into the folder (skip git internals)
    for fname in gist["files"]:
        src = os.path.join(clone_dir, fname)
        dst = os.path.join(folder, fname)
        if os.path.exists(src):
            shutil.copy2(src, dst)

    print(f"  Synced: {folder_name}")

def main():
    gists = fetch_all_gists()
    gists_dir = REPO_DIR
    os.makedirs(gists_dir, exist_ok=True)

    for gist in gists:
        sync_gist(gist)

    # Write an index file at the root
    with open(os.path.join(gists_dir, "README.md"), "w") as f:
        f.write("# Gist Index\n\n")
        f.write("| Description | Gist ID | Files | Updated |\n")
        f.write("|-------------|---------|-------|---------|\n")
        for g in sorted(gists, key=lambda x: x["updated_at"], reverse=True):
            desc = g.get("description") or "_No description_"
            gid = g["id"]
            files = ", ".join(g["files"].keys())
            updated = g["updated_at"][:10]
            url = f"https://gist.github.com/{gid}"
            f.write(f"| [{desc}]({url}) | `{gid}` | {files} | {updated} |\n")

    print("Sync complete.")

if __name__ == "__main__":
    main()