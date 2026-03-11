import json
from datetime import datetime, timezone

with open("gists.json", "r") as f:
    data = json.load(f)

# Handle API error responses
if isinstance(data, dict) and "message" in data:
    print(f"API Error: {data['message']}")
    exit(1)

gists = data
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
        description = gist.get("description") or "Untitled"
        url = gist.get("html_url", "")
        files = ", ".join(gist.get("files", {}).keys())
        updated = gist.get("updated_at", "")[:10]
        lines.append(f"| {i} | [{description}]({url}) | {files} | {updated} |")

now = datetime.now(timezone.utc).strftime("%Y-%m-%d %H:%M UTC")
lines.append("")
lines.append(f"Last synced: {now}")

with open("README.md", "w") as f:
    f.write("\n".join(lines))

print(f"README.md generated with {len(gists)} gists.")
```

---

## Final Folder Structure
```
your-repo/
├── .github/
│   ├── workflows/
│   │   └── update-gists.yml
│   └── scripts/
│       └── generate_readme.py
├── gists.json          (auto-generated)
└── README.md           (auto-generated)