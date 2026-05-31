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
        "left: 58% !important" in html
        or "left: 58%;" in html
        or "left:58%" in html
        or "var(--nn-hero-canvas-left)" in html
        or "opus48-hero-stage" in html
        or "finops-hero-stage" in html
        or "mcp-qc-hero-stage" in html
        or "alice-hero-stage" in html
        or "smb-hero-stage" in html
    )
    if slug == "ai-finops-kontrol-rashodov-tokeny-biznes" and "finops-hero-grid" not in html:
        issues.append("finops hero missing grid-split (finops-hero-grid)")
    if slug == "claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow" and "smb-hero-grid" not in html:
        issues.append("smb hero missing grid-split (smb-hero-grid)")
    if not has_canvas_right:
        issues.append("canvas not in right zone (58% or stage)")
    if re.search(r"\.finops-hero-shell\s*\n\s*position:", html):
        issues.append("broken CSS: finops-hero-shell missing brace")
    if re.search(r"font-size:\s*clamp\(32px,\s*4\.8vw,\s*68px\)", html):
        issues.append("inline hero h1 still 68px")
    if "hero-enterprise-gateway" in html and re.search(
        r"\.hero-enterprise-gateway\s+#(?:kpmg-gateway-hero|hero-tokenops|cursor)[^{]*\{[^}]*left:\s*58%",
        html,
        re.DOTALL,
    ):
        issues.append("enterprise canvas wrongly at 58% (should fill visual-col)")
    if "hero-visual-col" in html and "left: 0 !important" not in html and "left: 0;" not in html:
        if "hero-enterprise-gateway" in html:
            issues.append("enterprise visual-col canvas missing left:0")
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
