#!/usr/bin/env python3
"""Convert overlay hero layouts to finops-hero-grid split layout + inject hero-split-layout.css."""

from __future__ import annotations

import argparse
import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SPLIT_CSS = (ROOT / "shared/hero-split-layout.css").read_text(encoding="utf-8")
REMOTE_DIR = ROOT / "wordpress-remote"
OUT_DIR = ROOT / "wordpress"

FINOPS_SHELL_STYLE = """
.finops-hero-shell {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  box-sizing: border-box;
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
  background: #ffffff;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.finops-hero-grid {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: minmax(0, 0.4fr) minmax(0, 0.6fr);
  gap: clamp(20px, 3vw, 40px);
  align-items: center;
  max-width: 1440px;
  margin: 0 auto;
  min-height: min(72vh, 720px);
}
.finops-hero-main {
  display: flex;
  flex-direction: column;
  gap: clamp(14px, 2vh, 24px);
  min-width: 0;
}
.finops-hero-stage {
  position: relative;
  min-height: min(56vh, 560px);
  height: 100%;
  border-radius: 20px;
  overflow: hidden;
  background: rgba(255, 255, 255, 0.5);
  border: 1px solid rgba(226, 232, 240, 0.95);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.85), 0 20px 50px rgba(15, 23, 42, 0.06);
}
.finops-hero-stage canvas {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.finops-hero-copy, .finops-hero-shell .hero-copy-stack, .finops-hero-shell .sf-hero-copy {
  position: relative;
  max-width: 100%;
  z-index: 4;
}
.finops-hero-cta-wrap { position: relative; z-index: 4; }
.finops-hero-shell .giant-seo {
  font-size: clamp(1.5rem, 2.75vw, 2.5rem);
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.02em;
  color: #0f172a;
  margin: 0;
  text-wrap: balance;
}
.finops-hero-shell .giant-seo span {
  display: block;
  margin-top: 0.12em;
  background: __GRADIENT__;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.finops-hero-shell .giant-seo-sub {
  font-size: clamp(15px, 1.65vw, 19px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 14px 0 0;
  max-width: 42ch;
  text-wrap: pretty;
}
.finops-hero-shell .vl-ui-tasks, .finops-hero-shell .sf-hero-phases {
  position: relative;
  left: auto;
  top: auto;
  transform: none;
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 8px;
  z-index: 3;
  max-width: 100%;
}
.finops-hero-shell .vl-ui-task, .finops-hero-shell .sf-hero-phase {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 16px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(0,0,0,0.06);
}
.finops-hero-shell .vl-ui-pill, .finops-hero-shell .sf-hero-metrics {
  position: relative;
  top: auto;
  right: auto;
  left: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  gap: 10px;
  z-index: 3;
  max-width: 100%;
}
.finops-hero-shell .vl-ui-pill span, .finops-hero-shell .sf-hero-metrics span {
  padding: 9px 16px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.finops-hero-shell .alina-eyebrow {
  margin: 0 0 12px;
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: #2563eb;
}
@media (max-width: 900px) {
  .finops-hero-grid { grid-template-columns: 1fr; min-height: auto; }
  .finops-hero-stage { order: -1; min-height: min(42vh, 360px); }
  .finops-hero-shell .vl-ui-tasks { display: none; }
}
""".strip()

OVERLAY_SLUGS = {
    "kontrol-rashodov-ai-tokeny-500-mln-claude": {
        "gradient": "linear-gradient(90deg, #dc2626, #8b5cf6)",
        "section_re": r'<section id="finops-hero"[^>]*>',
    },
    "copilot-computer-use-mcp-agenty-bez-api": {
        "gradient": "linear-gradient(90deg, #0078d4, #8b5cf6)",
        "section_re": r'<section class="copilot-mcp-hero[^"]*"[^>]*>',
    },
    "salesforce-claude-code-13-dnej-agentnaya-razrabotka": {
        "gradient": "linear-gradient(90deg, #0284c7, #7c3aed)",
        "section_re": r'<section id="sf-orchestration-hero"[^>]*>',
    },
    "microsoft-otkaz-claude-code-stoimost-ai-avtomatizaciya": {
        "gradient": "linear-gradient(90deg, #dc2626, #7c3aed)",
        "section_re": r'<section id="finops-token-control-room"[^>]*>',
    },
}


def inject_split_css(text: str) -> str:
    if "Split grid: FinOps / SMB" in text and "hero-split-layout" in text:
        return text
    if "Split grid: FinOps / SMB" in text:
        return text
    marker = "#primary, .site-main, .site-content, #content, .content-area {"
    pos = text.find(marker)
    if pos < 0:
        marker = "body[class*=\"page-template-page-\"]"
        pos = text.find(marker)
    if pos < 0:
        raise ValueError("CSS anchor for hero-split-layout not found")
    insert_at = text.find("}", pos) + 1
    block = "\n/* hero-split-layout.css */\n" + SPLIT_CSS + "\n"
    if block.strip() in text:
        return text
    return text[:insert_at] + block + text[insert_at:]


def extract_tag_block(html: str, pattern: str) -> str:
    m = re.search(pattern, html, re.I | re.S)
    if not m:
        return ""
    tag = m.group(0)
    if tag.endswith("/>"):
        return tag
    name = re.match(r"<(\w+)", tag)
    if not name:
        return tag
    el = name.group(1)
    cls_m = re.search(r'class="([^"]*)"', tag)
    if cls_m:
        cls = cls_m.group(1).split()[0]
        close = re.compile(rf"</{el}>", re.I)
        depth = 1
        pos = m.end()
        while depth and pos < len(html):
            nxt_open = html.find(f"<{el}", pos)
            nxt_close = html.find(f"</{el}>", pos)
            if nxt_close < 0:
                break
            if nxt_open != -1 and nxt_open < nxt_close:
                depth += 1
                pos = nxt_open + 1
            else:
                depth -= 1
                if depth == 0:
                    return html[m.start() : nxt_close + len(f"</{el}>")]
                pos = nxt_close + 1
    return tag


def extract_script_blocks(html: str) -> str:
    scripts = []
    for m in re.finditer(r"<script\b[^>]*>.*?</script>", html, re.I | re.S):
        scripts.append(m.group(0))
    return "\n".join(scripts)


def extract_canvas(html: str) -> str:
    m = re.search(r"<canvas\b[^>]*(?:/>|>\s*</canvas>)", html, re.I | re.S)
    if m:
        tag = m.group(0).strip()
        if not tag.endswith("</canvas>") and not tag.endswith("/>"):
            tag = tag.rstrip(">") + "></canvas>"
        return tag
    return '<canvas id="hero-canvas"></canvas>'


def normalize_copy(block: str) -> str:
    block = re.sub(r'\bclass="sf-hero-copy"', 'class="finops-hero-copy"', block)
    block = re.sub(r'\bclass="hero-copy-stack"', 'class="finops-hero-copy hero-copy-block"', block)
    if "finops-hero-copy" not in block and "<h1" in block:
        block = f'<div class="finops-hero-copy">{block}</div>'
    return block


def normalize_tasks(block: str) -> str:
    if not block:
        return ""
    block = re.sub(r'\bclass="sf-hero-phases[^"]*"', 'class="vl-ui-tasks"', block)
    block = re.sub(r"<nav\b", "<nav", block)
    if not block.strip().startswith("<nav"):
        block = re.sub(r"^<div", "<nav", block, count=1)
        block = re.sub(r"</div>\s*$", "</nav>", block)
    return block


def normalize_pill(block: str) -> str:
    if not block:
        return ""
    block = re.sub(r'\bclass="sf-hero-metrics[^"]*"', 'class="vl-ui-pill"', block)
    return block


def extract_cta(html: str) -> str:
    if "nn_hero_cta_buttons" in html:
        return '    <div class="finops-hero-cta-wrap">\n      <?php echo nn_hero_cta_buttons(); ?>\n    </div>'
    m = re.search(r'<a class="telegram-button"[^>]*>.*?</a>', html, re.I | re.S)
    if m:
        return f'    <div class="finops-hero-cta-wrap">\n      {m.group(0)}\n    </div>'
    return ""


def convert_microsoft_hero(section: str, gradient: str) -> str:
    copy = extract_tag_block(section, r'<div class="alina-hero-copy"[^>]*>')
    metrics = extract_tag_block(section, r'<div class="alina-metrics-rail"[^>]*>')
    stages = extract_tag_block(section, r'<div class="vl-ui-tasks alina-stages-row"[^>]*>')
    canvas = extract_canvas(section)
    scripts = extract_script_blocks(section)
    pill = ""
    if metrics:
        spans = re.findall(r"<span class=\"alina-metric-chip\"[^>]*>.*?</span>", metrics, re.S)
        if spans:
            pill = '<div class="vl-ui-pill" aria-label="Метрики">\n' + "\n".join(
                re.sub(r'alina-metric-chip', '', s).replace("<span ", "<span ") for s in spans
            ) + "\n</div>"
        else:
            pill = metrics.replace("alina-metrics-rail", "vl-ui-pill").replace("alina-metric-chip", "")
    tasks = stages.replace("alina-stages-row", "") if stages else ""
    copy = normalize_copy(copy)
    cta = extract_cta(section)
    style = f"<style>\n{FINOPS_SHELL_STYLE.replace('__GRADIENT__', gradient)}\n</style>"
    grid = f"""
{style}
<div class="finops-hero-grid">
  <div class="finops-hero-main">
    {pill}
    {tasks}
    {copy}
    {cta}
  </div>
  <div class="finops-hero-stage" aria-hidden="true">
    {canvas}
  </div>
</div>
{scripts}
"""
    open_tag = re.match(r"<section[^>]*>", section)
    if not open_tag:
        raise ValueError("section open tag missing")
    new_open = open_tag.group(0)
    new_open = re.sub(
        r'class="[^"]*"',
        'class="fullscreen-white-office finops-hero-shell hero-enterprise-gateway"',
        new_open,
    )
    if "finops-hero-shell" not in new_open:
        new_open = new_open.replace("<section", '<section class="fullscreen-white-office finops-hero-shell hero-enterprise-gateway"', 1)
    return new_open + grid + "\n</section>"


def convert_generic_overlay(section: str, gradient: str) -> str:
    copy = extract_tag_block(section, r'<div class="finops-hero-copy"[^>]*>')
    if not copy:
        copy = extract_tag_block(section, r'<div class="hero-copy-stack"[^>]*>')
    if not copy:
        copy = extract_tag_block(section, r'<div class="sf-hero-copy"[^>]*>')
    tasks = extract_tag_block(section, r'<(?:nav|div)\b[^>]*class="[^"]*vl-ui-tasks[^"]*"[^>]*>')
    if not tasks:
        tasks = extract_tag_block(section, r'<nav class="sf-hero-phases[^"]*"[^>]*>')
    pill = extract_tag_block(section, r'<div class="vl-ui-pill"[^>]*>')
    if not pill:
        pill = extract_tag_block(section, r'<div class="sf-hero-metrics[^"]*"[^>]*>')
    canvas = extract_canvas(section)
    scripts = extract_script_blocks(section)
    copy = normalize_copy(copy)
    tasks = normalize_tasks(tasks)
    pill = normalize_pill(pill)
    cta = extract_cta(section)
    copy = re.sub(r"\s*<\?php echo nn_hero_cta_buttons\(\); \?>\s*", "\n", copy)
    copy = re.sub(r'<div class="alina-hero-copy">\s*', "", copy)
    copy = re.sub(r"\s*</div>\s*$", "", copy) if copy.count("</div>") else copy
    style = f"<style>\n{FINOPS_SHELL_STYLE.replace('__GRADIENT__', gradient)}\n</style>"
    grid = f"""
{style}
<div class="finops-hero-grid">
  <div class="finops-hero-main">
    {pill}
    {tasks}
    {copy}
    {cta}
  </div>
  <div class="finops-hero-stage" aria-hidden="true">
    {canvas}
  </div>
</div>
{scripts}
"""
    open_tag = re.match(r"<section[^>]*>", section)
    if not open_tag:
        raise ValueError("section open tag missing")
    new_open = open_tag.group(0)
    extra = "copilot-mcp-hero" if "copilot-mcp" in section else ""
    classes = "fullscreen-white-office finops-hero-shell hero-enterprise-gateway"
    if extra:
        classes += f" {extra}"
    new_open = re.sub(r'class="[^"]*"', f'class="{classes}"', new_open)
    if "finops-hero-shell" not in new_open:
        new_open = new_open.replace("<section", f'<section class="{classes}"', 1)
    return new_open + grid + "\n</section>"


def patch_file(path: Path, slug: str, meta: dict) -> bool:
    text = path.read_text(encoding="utf-8")
    if "finops-hero-grid" in text and "finops-hero-stage" in text:
        before = text
        text = inject_split_css(text)
        if text != before:
            path.write_text(text, encoding="utf-8")
            print(f"{slug}: injected split CSS only")
            return True
        print(f"{slug}: already split layout")
        return False

    m = re.search(meta["section_re"] + r".*?</section>", text, re.S | re.I)
    if not m:
        print(f"{slug}: hero section not found", file=sys.stderr)
        return False
    section = m.group(0)
    gradient = meta["gradient"]
    if "alina-finops-hero" in section or "finops-token-control-room" in section:
        new_section = convert_microsoft_hero(section, gradient)
    else:
        new_section = convert_generic_overlay(section, gradient)
    text = text[: m.start()] + new_section + text[m.end() :]
    text = inject_split_css(text)
    path.write_text(text, encoding="utf-8")
    print(f"{slug}: converted to finops-hero-grid")
    return True


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument("--slug", action="append")
    parser.add_argument("--deploy", action="store_true")
    args = parser.parse_args()
    slugs = args.slug or list(OVERLAY_SLUGS.keys())
    for slug in slugs:
        src = REMOTE_DIR / f"page-{slug}.php"
        if not src.is_file():
            print(f"Missing {src}", file=sys.stderr)
            continue
        meta = OVERLAY_SLUGS.get(slug, {"gradient": "linear-gradient(90deg, #059669, #0ea5e9)", "section_re": r"<section[^>]*>"})
        patch_file(src, slug, meta)
        out = OUT_DIR / f"page-{slug}.php"
        out.write_text(src.read_text(encoding="utf-8"), encoding="utf-8")

    if args.deploy:
        import subprocess

        for slug in slugs:
            php = OUT_DIR / f"page-{slug}.php"
            if not php.is_file():
                continue
            subprocess.run(
                [
                    sys.executable,
                    str(ROOT / "shared/deploy.py"),
                    "--slug",
                    slug,
                    "--title",
                    slug,
                    "--description",
                    "hero split layout fix",
                    "--local-path",
                    str(php),
                    "--skip-live-check",
                ],
                check=False,
            )


if __name__ == "__main__":
    main()
