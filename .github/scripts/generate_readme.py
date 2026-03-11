import json
import sys
from datetime import datetime, timezone

try:
    with open("gists.json", "r") as f:
        data = json.load(f)
except Exception as e:
    print(f"Failed to read gists.json: {e}")
    sys.exit(1)

# Handle API error responses
if isinstance(data, dict):
    print(f"API Error: {data.get('message', 'Unknown error')}")
    print(f"Full response: {data}")
    sys.exit(1)

if not isinstance(data, list):
    print(f"Unexpected response format: {type(data)}")
    sys.exit(1)

gists = data
print(f"Processing {len(gists)} gists...")

lines = []
lines.append("# My Gist Index")
lines.append("")
lines.append("> Auto-updated daily via GitHub Actions")
lines.append("")
lines.append(f"**Total Gists: {len(gists)}**")
lines.append("")

if not gists:
    lines.append("No public gists found.")
else:
    lines.append("| # | Description | Files | Last Updated |")
    lines.append("|---|-------------|-------|--------------|")

    for i, gist in enumerate(gists, 1):
        description = (gist.get("description") or "Untitled").replace("|", "-")
        url = gist.get("html_url", "")
        files = ", ".join(gist.get("files", {}).keys())
        updated = gist.get("updated_at", "")[:10]
        lines.append(f"| {i} | [{description}]({url}) | {files} | {updated} |")

now = datetime.now(timezone.utc).strftime("%Y-%m-%d %H:%M UTC")
lines.append("")
lines.append(f"Last synced: {now}")

with open("README.md", "w") as f:
    f.write("\n".join(lines))

print(f"README.md successfully generated with {len(gists)} gists.")