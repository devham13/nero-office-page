#!/usr/bin/env python3
"""
Единственная точка применения hero-layout на прод для лонгридов.

По умолчанию загружает в активную тему WordPress:
  - wordpress/includes/nn-cta.php
  - wordpress/includes/longread-hero-layout.css

Опционально — полный шаблон страницы из wordpress/templates/pages/page-{slug}.php
(если файл есть в репозитории).

НЕ использует regex-патчи inline CSS. См. shared/longread-hero-layout-system.md
"""

from __future__ import annotations

import argparse
import json
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
sys.path.insert(0, str(ROOT / "shared"))

from deploy import connect_ssh, resolve_theme_directory, run_remote, upload_via_sftp  # noqa: E402

INCLUDES = [
    ROOT / "wordpress" / "includes" / "nn-cta.php",
    ROOT / "wordpress" / "includes" / "longread-hero-layout.css",
]
MANIFEST = ROOT / "shared" / "longread-hero-canvas.defaults.json"
TEMPLATES_DIR = ROOT / "wordpress" / "templates" / "pages"


def load_manifest() -> dict:
    if not MANIFEST.is_file():
        return {"pages": {}}
    return json.loads(MANIFEST.read_text(encoding="utf-8"))


def upload_includes(ssh, theme_dir: str) -> None:
    remote_includes = f"{theme_dir}/includes"
    run_remote(ssh, f"mkdir -p {remote_includes}")
    for local in INCLUDES:
        if not local.is_file():
            raise SystemExit(f"Missing required file: {local}")
        remote = f"{remote_includes}/{local.name}"
        upload_via_sftp(ssh, local, remote)
        print(f"uploaded {local.name} -> {remote}")


def upload_page(ssh, theme_dir: str, slug: str) -> bool:
    name = f"page-{slug}.php"
    local = TEMPLATES_DIR / name
    if not local.is_file():
        print(f"skip page (no template in repo): {name}")
        return False
    remote = f"{theme_dir}/{name}"
    upload_via_sftp(ssh, local, remote)
    print(f"uploaded full template -> {remote}")
    return True


def list_slugs_from_manifest() -> list[str]:
    data = load_manifest()
    pages = data.get("pages") or {}
    return sorted(pages.keys())


def main() -> int:
    parser = argparse.ArgumentParser(description="Deploy longread hero layout (global CSS only by default).")
    parser.add_argument(
        "--page",
        action="append",
        dest="pages",
        metavar="SLUG",
        help="Upload wordpress/templates/pages/page-{slug}.php if present",
    )
    parser.add_argument(
        "--all-pages",
        action="store_true",
        help="Upload every page-*.php found in wordpress/templates/pages/",
    )
    parser.add_argument("--no-cache-flush", action="store_true")
    args = parser.parse_args()

    ssh = connect_ssh()
    root = __import__("credentials").require_credential("REMOTE_SITE_ROOT")
    theme_dir = resolve_theme_directory(ssh, root)

    upload_includes(ssh, theme_dir)

    slugs: list[str] = []
    if args.all_pages:
        slugs = [p.name.replace("page-", "").replace(".php", "") for p in sorted(TEMPLATES_DIR.glob("page-*.php"))]
    elif args.pages:
        slugs = args.pages

    for slug in slugs:
        upload_page(ssh, theme_dir, slug)

    if not args.no_cache_flush:
        run_remote(ssh, f"cd {root} && wp cache flush 2>/dev/null || true")
        print("cache flush requested")

    ssh.close()

    known = list_slugs_from_manifest()
    print(f"manifest: {len(known)} longread slugs in {MANIFEST.name}")
    print("verify: python3 scripts/verify-hero-layout.py")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
