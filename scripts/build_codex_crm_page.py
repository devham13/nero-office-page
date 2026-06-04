#!/usr/bin/env python3
"""Assemble page-openai-codex-plaginy-prodazhi-crm-avtomatizaciya.php from handoff."""

from __future__ import annotations

import os
import re
import json
from pathlib import Path

ROOT = Path("/workspace")
HANDOFF = ROOT / ".cursor/nero-network-handoff.md"
CSS_REF = ROOT / "shared/longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared/longread-page-reveal.js"
OUT = ROOT / "wordpress-theme/page-openai-codex-plaginy-prodazhi-crm-avtomatizaciya.php"

SLUG = "openai-codex-plaginy-prodazhi-crm-avtomatizaciya"
PAGE_CLASS = f"{SLUG}-page"
UTM = f"utm_source=longread&utm_medium=cta&utm_campaign={SLUG}"

SEO_TITLE = "OpenAI Codex для продаж и CRM: плагины Sites — гайд 2026"
SEO_DESC = (
    "Плагины Codex для продаж и CRM: Salesforce, HubSpot, amoCRM. "
    "Как SMB автоматизирует сделки через Make, n8n и MCP без разработчиков — "
    "разбор релиза 2 июня 2026."
)

# Placeholders substituted at deploy time (see shared/deploy.py).
PRIMARY_CTA_URL = "%%NERO_PRIMARY_CTA_URL%%"
PRIMARY_CTA_LABEL = "%%NERO_PRIMARY_CTA_LABEL%%"
SECONDARY_CTA_URL = "%%NERO_SECONDARY_CTA_URL%%"
SECONDARY_CTA_LABEL = "%%NERO_SECONDARY_CTA_LABEL%%"


def extract_codeblock(handoff: str, start_marker: str, lang: str = "html") -> str:
    idx = handoff.find(start_marker)
    if idx < 0:
        raise ValueError(f"Marker not found: {start_marker}")
    fence = f"```{lang}"
    start = handoff.find(fence, idx)
    if start < 0:
        raise ValueError(f"Code fence not found after {start_marker}")
    start = handoff.index("\n", start) + 1
    end = handoff.find("```", start)
    return handoff[start:end].strip()


def extract_zhenya_markdown(handoff: str) -> str:
    m = re.search(
        r"### Полный текст\s*\n(.*?)\n### GEO-чеклист",
        handoff,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Zhenya full text not found")
    return m.group(1).strip()


def slugify_heading(text: str) -> str:
    text = re.sub(r"\*\*", "", text)
    text = text.lower()
    mapping = {
        "что изменилось в codex 2 июня 2026": "codex-2026",
        "плагин для продаж: сценарии из релиза": "sales-plugin",
        "crm и мессенджеры: salesforce, hubspot и российский контекст": "crm-messengers",
        "как smb повторяет логику codex без enterprise-тарифа": "smb-without-enterprise",
        "сценарии внедрения: от квалификации лида до дашборда": "implementation-scenarios",
        "ограничения, 152-фз и безопасность данных": "limitations-152fz",
        "пошаговый план внедрения под ключ": "implementation-plan",
        "faq": "faq",
    }
    key = text.strip()
    if key in mapping:
        return mapping[key]
    key = re.sub(r"[^a-z0-9а-яё]+", "-", key)
    return key.strip("-")[:60] or "section"


def md_inline(s: str) -> str:
    s = re.sub(r"\*\*(.+?)\*\*", r"<strong>\1</strong>", s)
    s = re.sub(r"\*(.+?)\*", r"<em>\1</em>", s)
    s = re.sub(
        r"\[([^\]]+)\]\(([^)]+)\)",
        r'<a href="\2" rel="noopener noreferrer">\1</a>',
        s,
    )
    return s


def md_table(lines: list[str]) -> str:
    if len(lines) < 2:
        return ""
    rows = []
    for i, line in enumerate(lines):
        cells = [c.strip() for c in line.strip("|").split("|")]
        tag = "th" if i == 0 else "td"
        row = "".join(f"<{tag}>{md_inline(c)}</{tag}>" for c in cells)
        rows.append(f"<tr>{row}</tr>")
    return '<div class="ym-table-wrap reveal"><table class="ym-table">' + "".join(rows) + "</table></div>"


def markdown_to_sections(md: str) -> list[dict]:
    sections: list[dict] = []
    current: dict | None = None
    buf: list[str] = []
    i = 0
    lines = md.splitlines()

    def flush_paragraph(para: str) -> None:
        if not current:
            return
        p = para.strip()
        if not p:
            return
        if p.startswith("**Коротко:**") or p.startswith("**Определение:**") or p.startswith("**Итог"):
            cls = "ym-lead-box reveal"
            if "Определение" in p[:20]:
                cls += " ym-definition"
            current["blocks"].append(f'<p class="{cls}">{md_inline(p)}</p>')
        elif p.startswith("|"):
            return  # handled separately
        else:
            current["blocks"].append(f'<p class="reveal">{md_inline(p)}</p>')

    while i < len(lines):
        line = lines[i]
        if line.startswith("## "):
            if current:
                current["body"] = "\n".join(buf)
                sections.append(current)
            title = line[3:].strip()
            current = {
                "level": 2,
                "title": title,
                "id": slugify_heading(title),
                "blocks": [],
                "h3s": [],
            }
            buf = []
            i += 1
            continue
        if line.startswith("### ") and current:
            h3_title = line[4:].strip()
            current["h3s"].append({"title": h3_title, "id": slugify_heading(h3_title), "blocks": []})
            i += 1
            continue
        if line.startswith("|") and current:
            table_lines = [line]
            i += 1
            while i < len(lines) and lines[i].startswith("|"):
                table_lines.append(lines[i])
                i += 1
            if re.match(r"^\|[\s\-:|]+\|$", table_lines[1] if len(table_lines) > 1 else ""):
                table_lines = [table_lines[0]] + table_lines[2:]
            tbl = md_table(table_lines)
            if current["h3s"]:
                current["h3s"][-1]["blocks"].append(tbl)
            else:
                current["blocks"].append(tbl)
            continue
        if line.strip() == "---":
            i += 1
            continue
        if line.startswith("**Коротко:**") and not current:
            # intro lead before first H2 — handled separately
            i += 1
            continue
        if current:
            if line.strip():
                buf.append(line)
            elif buf:
                para = "\n".join(buf)
                if current["h3s"]:
                    current["h3s"][-1]["blocks"].append(
                        f'<p class="reveal">{md_inline(para)}</p>'
                    )
                else:
                    flush_paragraph(para)
                buf = []
        i += 1

    if buf and current:
        para = "\n".join(buf)
        if current["h3s"]:
            current["h3s"][-1]["blocks"].append(f'<p class="reveal">{md_inline(para)}</p>')
        else:
            flush_paragraph(para)
    if current:
        sections.append(current)
    return sections


def cta_primary_mid() -> str:
    return f"""
<aside class="ym-cta-block ym-cta-block--primary reveal" aria-labelledby="ym-cta-primary-title">
  <div class="ym-card" style="text-align:center; border-color: rgba(255,0,0,0.15);">
    <div class="ym-card-icon" style="margin:0 auto 20px;" aria-hidden="true">⚡</div>
    <h3 id="ym-cta-primary-title" style="font-size:24px; margin-bottom:12px;">Повторить сценарии Codex в amoCRM или Bitrix24</h3>
    <p style="color:#64748b; margin-bottom:24px; max-width:640px; margin-left:auto; margin-right:auto;">Аудит трёх процессов отдела продаж, пилот на Make/n8n за 5–7 дней и внедрение AI-агентов под ключ — с human-in-the-loop и учётом 152-ФЗ.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url . '?{UTM}&utm_content=primary-mid' ); ?>" rel="noopener">Заявка на консультацию — <?php echo esc_html( $nero_primary_cta_label ); ?></a>
    </div>
    <p style="font-size:13px; color:#94a3b8; margin-top:16px; margin-bottom:0;">Без обязательств: разберём воронку и предложим один пилотный сценарий под вашу CRM.</p>
  </div>
</aside>"""


def cta_secondary_training() -> str:
    return f"""
<aside class="ym-cta-block ym-cta-block--secondary reveal" aria-labelledby="ym-cta-secondary-title">
  <div class="ym-prompt-card" style="margin-bottom:0;">
    <h3 id="ym-cta-secondary-title" style="font-size:18px; margin:0 0 10px;">Обучение команды после пилота</h3>
    <p style="margin:0 0 16px; color:#475569;">Регламент human-in-the-loop, промпты под книгу продаж и самостоятельная поддержка сценариев на Make/n8n — в программе <strong><?php echo esc_html( $nero_secondary_cta_label ); ?></strong>.</p>
    <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $nero_secondary_cta_url . '?{UTM}&utm_content=secondary-training' ); ?>" rel="noopener" style="display:inline-flex;">Подробнее об обучении</a>
  </div>
</aside>"""


def cta_final() -> str:
    return f"""
<aside class="ym-cta-block ym-cta-block--primary ym-cta-block--final reveal" aria-labelledby="ym-cta-final-title">
  <div class="ym-card" style="background: linear-gradient(135deg, #fff 0%, #fef2f2 100%); text-align:center;">
    <h3 id="ym-cta-final-title" style="font-size:26px; margin-bottom:12px;">Готовы автоматизировать продажи без Enterprise Codex?</h3>
    <p style="color:#475569; margin-bottom:24px; max-width:700px; margin-left:auto; margin-right:auto;">Nero Network спроектирует цепочку «лид → CRM → AI-бриф → задача менеджеру» и обучит РОПа работе с черновиками и approval.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url . '?{UTM}&utm_content=primary-final' ); ?>" rel="noopener"><?php echo esc_html( $nero_primary_cta_label ); ?></a>
      <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $nero_secondary_cta_url . '?{UTM}&utm_content=secondary-training' ); ?>" rel="noopener"><?php echo esc_html( $nero_secondary_cta_label ); ?></a>
    </div>
  </div>
</aside>"""


def intro_section() -> str:
    return """
<section class="ym-section openai-codex-intro-section" id="intro">
  <div class="ym-container">
    <div class="openai-codex-intro-grid reveal">
      <div class="openai-codex-intro-text">
        <p class="openai-codex-intro-lead"><strong>Коротко:</strong> 2 июня 2026 OpenAI вынесла Codex в продажи, аналитику и маркетинг — шесть ролевых плагинов, 62 приложения, 110 skills и preview Sites. Для российского SMB прямой доступ к sales plugin с amoCRM и Bitrix24 недоступен, но <strong>автоматизацию продаж нейросетью</strong> и <strong>нейросеть для CRM</strong> можно собрать на Make, n8n, MCP и API российских CRM — под ключ или пилотом за 2–4 недели.</p>
      </div>
      <div class="openai-codex-intro-deco" aria-hidden="true">
        <div class="ym-mac-window openai-codex-intro-terminal">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">codex-sales-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> lead.telegram → crm.webhook</div>
            <div><span class="ym-command">$</span> llm.brief --hitl --152fz-min-pdn</div>
            <div><span class="ym-comment"># 62 apps · 110 skills · Sites preview</span></div>
          </div>
        </div>
        <div class="openai-codex-intro-chips">
          <span class="openai-codex-chip">5M+ WAU Codex</span>
          <span class="openai-codex-chip">20% non-dev</span>
          <span class="openai-codex-chip">Make / n8n</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      <a href="#codex-2026">Релиз 2 июня</a>
      <a href="#sales-plugin">Плагин Sales</a>
      <a href="#crm-messengers">CRM и мессенджеры</a>
      <a href="#boris-rf-sales-pipeline">Пайплайн РФ</a>
      <a href="#smb-without-enterprise">SMB без Enterprise</a>
      <a href="#implementation-scenarios">Сценарии</a>
      <a href="#limitations-152fz">152-ФЗ</a>
      <a href="#implementation-plan">План внедрения</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</section>"""


def render_section(sec: dict, alt: bool) -> str:
    cls = "ym-section ym-section-alt" if alt else "ym-section"
    parts = [
        f'<section class="{cls} reveal" id="{sec["id"]}">',
        '  <div class="ym-container">',
        f'    <h2 class="ym-section-title">{md_inline(sec["title"])}</h2>',
    ]
    for block in sec["blocks"]:
        parts.append(f"    {block}")
    for h3 in sec.get("h3s", []):
        parts.append(f'    <h3 class="ym-h3 reveal" id="{h3["id"]}">{md_inline(h3["title"])}</h3>')
        for block in h3["blocks"]:
            parts.append(f"    {block}")
    parts.append("  </div>")
    parts.append("</section>")
    return "\n".join(parts)


def render_faq(sec: dict) -> str:
    items = []
    for h3 in sec.get("h3s", []):
        blocks = []
        for block in h3["blocks"]:
            if "<strong>Итог страницы:</strong>" in block:
                continue
            blocks.append(block)
        items.append(
            f'<article class="ym-faq-item reveal" id="{h3["id"]}">'
            f'<h3>{md_inline(h3["title"])}</h3>'
            + "".join(blocks)
            + "</article>"
        )
    nav = "".join(
        f'<li><a href="#{h3["id"]}">{md_inline(h3["title"])}</a></li>'
        for h3 in sec.get("h3s", [])
    )
    return f"""
<section class="ym-section ym-section-alt" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">{md_inline(sec["title"])}</h2>
    <div class="ym-faq-layout reveal">
      <aside class="ym-faq-sidebar">
        <p style="font-weight:700;margin-bottom:16px;">Вопросы</p>
        <ul class="ym-faq-list">{nav}</ul>
      </aside>
      <div class="ym-faq-content">{"".join(items)}</div>
    </div>
  </div>
</section>"""


def page_css() -> str:
    raw = CSS_REF.read_text(encoding="utf-8")
  # strip file header comment block
    raw = re.sub(r"^/\*\*.*?\*/\s*", "", raw, count=1, flags=re.DOTALL)
    raw = raw.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    extra = """
/* Breadcrumbs hide + hero-first reset */
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#codex-crm-hero.codex-crm-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.openai-codex-intro-section { padding: 72px 0 40px; }
.openai-codex-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 900px) {
  .openai-codex-intro-grid { grid-template-columns: 1.15fr 0.85fr; }
}
.openai-codex-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.openai-codex-intro-text p { text-align: left !important; }
.openai-codex-intro-lead { font-size: 18px; line-height: 1.65; margin: 0; }
.openai-codex-intro-chips {
  display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px;
}
.openai-codex-chip {
  font-size: 12px; font-weight: 600; padding: 6px 12px;
  border-radius: 999px; background: #fff; border: 1px solid var(--ym-border);
}
.ym-h3 { font-size: 24px; font-weight: 700; margin: 40px 0 16px; text-align: left; }
.ym-lead-box { font-size: 17px; line-height: 1.6; padding: 16px 20px; background: #fff; border-radius: 12px; border: 1px solid var(--ym-border); }
.ym-definition { border-left: 4px solid var(--ym-accent); }
.ym-table-wrap { overflow-x: auto; margin: 24px 0; }
.ym-table { width: 100%; border-collapse: collapse; font-size: 14px; }
.ym-table th, .ym-table td { border: 1px solid var(--ym-border); padding: 12px 14px; text-align: left; }
.ym-table th { background: #f1f5f9; font-weight: 700; }
.ym-cta-block { margin: 48px 0; }
.{PAGE_CLASS} a:not(.ym-btn) {{ color: var(--ym-accent); }}
"""
    return raw + extra


def json_ld() -> str:
    data = {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "OpenAI Codex: плагины для продаж и CRM — как повторить автоматизацию в своём бизнесе",
        "description": SEO_DESC,
        "datePublished": "2026-06-04",
        "dateModified": "2026-06-04",
        "author": {"@type": "Organization", "name": "Nero Network"},
        "publisher": {"@type": "Organization", "name": "Nero Network"},
        "inLanguage": "ru-RU",
        "about": ["OpenAI Codex", "CRM automation", "AI sales agents"],
    }
    return (
        '<script type="application/ld+json">'
        + json.dumps(data, ensure_ascii=False)
        + "</script>"
    )


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    hero = extract_codeblock(handoff, "## HTML-фрагмент hero", "html")
    boris = extract_codeblock(handoff, "**Якорь вставки (для Наташи):**", "html")
    md = extract_zhenya_markdown(handoff)

    # Pull intro short line already in intro section
    md = re.sub(
        r"^\*\*Коротко:\*\*.*?\n\n---\n\n",
        "",
        md,
        count=1,
        flags=re.DOTALL,
    )

    sections = markdown_to_sections(md)

    body_parts = [hero, intro_section()]
    alt = False
    conclusion_html = ""

    for sec in sections:
        if sec["id"] == "faq":
            body_parts.append(render_faq(sec))
            body_parts.append(f'<div class="ym-container">{cta_final()}</div>')
            alt = not alt
            continue
        if sec["title"].startswith("**Итог") or "Итог страницы" in sec["title"]:
            for block in sec["blocks"]:
                conclusion_html += block
            continue

        html = render_section(sec, alt)
        body_parts.append(html)

        if sec["id"] == "crm-messengers":
            body_parts.append(
                f'<div id="boris-rf-sales-pipeline" class="ym-boris-anchor">{boris}</div>'
            )

        if sec["id"] == "implementation-scenarios":
            body_parts.append(f'<div class="ym-container">{cta_primary_mid()}</div>')

        if sec["id"] == "implementation-plan":
            body_parts.append(f'<div class="ym-container">{cta_secondary_training()}</div>')

        alt = not alt

    if conclusion_html or True:
        body_parts.append(f"""
<section class="ym-section" id="conclusion">
  <div class="ym-container">
    <p class="reveal ym-lead-box"><strong>Итог страницы:</strong> релиз Codex 2 июня 2026 показывает, куда движется рынок <strong>AI агентов для бизнеса</strong> в продажах. Российская компания может получить тот же эффект — приоритет аккаунтов, follow-up, риск сделки, дашборд РОПа — через <strong>нейросеть для CRM</strong> на Make, n8n и MCP, с соблюдением 152-ФЗ. Nero Network проектирует и внедряет такие цепочки под ключ: от аудита воронки до обучения команды.</p>
  </div>
</section>""")

    reveal = REVEAL_JS.read_text(encoding="utf-8")

    php = f"""<?php
/**
 * Template Name: OpenAI Codex плагины продажи CRM
 */
$page_seo_title = {SEO_TITLE!r};
$page_seo_description = {SEO_DESC!r};

$nero_primary_cta_url = {PRIMARY_CTA_URL!r};
$nero_primary_cta_label = {PRIMARY_CTA_LABEL!r};
$nero_secondary_cta_url = {SECONDARY_CTA_URL!r};
$nero_secondary_cta_label = {SECONDARY_CTA_LABEL!r};

add_filter('document_title_parts', static function (array $parts) use ($page_seo_title): array {{
    $parts['title'] = $page_seo_title;
    return $parts;
}}, 20);

add_action('wp_head', static function () use ($page_seo_title, $page_seo_description): void {{
    echo '<meta name="description" content="' . esc_attr($page_seo_description) . '" />' . "\\n";
    echo '<meta property="og:title" content="' . esc_attr($page_seo_title) . '" />' . "\\n";
    echo '<meta property="og:description" content="' . esc_attr($page_seo_description) . '" />' . "\\n";
    echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\\n";
    echo '<meta property="og:type" content="article" />' . "\\n";
}}, 1);

get_header();
?>
<style>
{page_css()}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{"".join(body_parts)}
</main>

<script>
{reveal}
</script>
{json_ld()}
<?php get_footer(); ?>
"""

    OUT.parent.mkdir(parents=True, exist_ok=True)
    OUT.write_text(php, encoding="utf-8")
    print(f"Wrote {OUT} ({OUT.stat().st_size} bytes)")


if __name__ == "__main__":
    main()
