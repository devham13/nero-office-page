#!/usr/bin/env python3
"""Verify longread pages: no full-bleed hero canvas, single overflow-y on document."""

from __future__ import annotations

import re
import subprocess
import sys
from urllib.parse import urljoin

def base_url() -> str:
    import os

    host = (
        os.environ.get("PUBLIC_SITE_HOST")
        or os.environ.get("WP_SITE_URL", "")
        .replace("https://", "")
        .replace("http://", "")
        .strip("/")
    )
    if not host:
        raise SystemExit("Set PUBLIC_SITE_HOST or WP_SITE_URL for verify-hero-layout.py")
    return f"https://{host}/"

PAGES = [
    "ai-finops-kontrol-rashodov-tokeny-biznes",
    "claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow",
    "claude-opus-4-8-dynamic-workflows-dlya-biznesa",
    "copilot-computer-use-mcp-agenty-bez-api",
    "cursor-35-automations-no-repo-agenty-biznesa",
    "kontrol-rashodov-ai-tokenov-tokenmaxxing",
    "kontrol-rashodov-ai-tokeny-500-mln-claude",
    "kpmg-claude-vnedrenie-ai-276-tysyach",
    "mcp-ii-agent-kontrol-kachestva-prodazh",
    "salesforce-claude-code-13-dnej-agentnaya-razrabotka",
    "yandex-alice-ai-llm-flash-avtomatizaciya-biznesa",
]


def fetch(url: str) -> str:
    r = subprocess.run(
        ["curl", "-sL", "-A", "NeroNetwork-Hero-QA/1.0", url],
        capture_output=True,
        text=True,
        timeout=60,
        check=False,
    )
    return r.stdout or ""


def check_html(slug: str, html: str) -> list[str]:
    issues: list[str] = []
    if "inset: auto !important" in html and "left: 52%" not in html:
        issues.append("nn-cta may still reset canvas position (inset:auto)")
    # Inline hero block still full bleed
    if re.search(r"#hero-[a-z0-9-]+-canvas\s*\{[^}]*inset:\s*0", html, re.DOTALL):
        issues.append("inline #hero-*-canvas still inset:0")
    if re.search(
        r"\.sf-hero-bridge\s+canvas\s*\{[^}]*inset:\s*0", html, re.DOTALL
    ):
        issues.append("sf-hero canvas still inset:0")
    if re.search(
        r"\.smb-hero-canvas-wrap\s*\{[^}]*inset:\s*0", html, re.DOTALL
    ):
        issues.append("smb canvas wrap still inset:0")
    if re.search(r"max-width:\s*min\(720px,\s*92vw\)", html):
        issues.append("hero copy still 720px wide")
    if re.search(r"max-width:\s*min\(640px,\s*92vw\)", html):
        issues.append("hero copy still 640px wide")
    has_canvas_right = (
        "left: 52% !important" in html
        or "left: 52%;" in html
        or "left:52%" in html
    )
    if not has_canvas_right:
        issues.append("canvas not shifted right (52%)")
    if "overflow-x: hidden;" in html and "-page {" in html:
        if re.search(r"\.[a-z0-9-]+-page\s*\{[^}]*overflow-x:\s*hidden", html):
            issues.append("page wrapper overflow-x:hidden (double scroll risk)")
    return issues


def main() -> int:
    failed = 0
    for slug in PAGES:
        url = urljoin(base_url(), slug + "/")
        html = fetch(url)
        if not html:
            print(f"FAIL {slug}: empty response")
            failed += 1
            continue
        issues = check_html(slug, html)
        if issues:
            print(f"FAIL {slug}:")
            for i in issues:
                print(f"  - {i}")
            failed += 1
        else:
            print(f"OK   {slug}")
    return 1 if failed else 0


if __name__ == "__main__":
    raise SystemExit(main())
