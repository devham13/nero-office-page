#!/usr/bin/env python3
"""Build WordPress page template for Natasha (claude SMB longread)."""
from __future__ import annotations

import re
import textwrap
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
SLUG = "claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow"
PAGE_CLASS = f"{SLUG}-page"
OUT_PHP = ROOT / "wordpress-theme" / f"page-{SLUG}.php"
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
LONGREAD = ROOT / ".cursor" / "zhenya-longread-body.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
ALINA_FRAG = ROOT / ".cursor" / "nero-network-fragments" / "alina.md"
BORIS_FRAG = ROOT / ".cursor" / "nero-network-fragments" / "boris.md"

SEO_TITLE = "Claude для малого бизнеса: 15 AI-workflow и как повторить в РФ"
SEO_DESC = (
    "Claude for Small Business (13.05.2026): 15 AI-workflow для финансов, продаж и HR. "
    "Как повторить на Make, n8n, MCP, amoCRM и 1С без QuickBooks."
)

H2_IDS = {
    "Что такое Claude for Small Business и почему это важно в мае 2026": "chto-takoe-claude-for-small-business",
    "15 AI-workflow Anthropic: финансы, продажи, маркетинг, HR и сервис": "pyatnadcat-ai-workflow-anthropic",
    "Коннекторы и MCP: как Claude подключается к QuickBooks, HubSpot, M365": "konnektory-i-mcp",
    "Коробка Anthropic vs кастом: Make, n8n, Zapier и Cursor": "korobka-anthropic-vs-kastom",
    "Как повторить сценарии для российского SMB: amoCRM, Битрикс24, 1С, мессенджеры": "kak-povtorit-dlya-rossiyskogo-smb",
    "Безопасность: approve-before-send, права доступа и human-in-the-loop": "bezopasnost-approve-before-send",
    "Стоимость, тарифы Cowork/Pro/Max и окупаемость для SMB": "stoimost-tarify-cowork",
    "FAQ — нейросети и AI-агенты для малого бизнеса": "faq-nejroseti-ai-agenty",
    "Внедрение под ключ — когда звать интегратора Nero Network": "vnedrenie-pod-klyuch",
    "Источники (сводка для проверки фактов)": "istochniki",
}

H3_IDS = {
    "Чек-лист внедрения для владельца малого бизнеса (4 недели)": "chek-list-vnedreniya-4-nedeli",
}

TOC_LABELS = {
    "chto-takoe-claude-for-small-business": "Что такое Claude SMB",
    "pyatnadcat-ai-workflow-anthropic": "15 AI-workflow",
    "konnektory-i-mcp": "MCP и коннекторы",
    "korobka-anthropic-vs-kastom": "Коробка vs Make/n8n",
    "kak-povtorit-dlya-rossiyskogo-smb": "Повторить в РФ",
    "bezopasnost-approve-before-send": "Безопасность",
    "stoimost-tarify-cowork": "Тарифы и окупаемость",
    "faq-nejroseti-ai-agenty": "FAQ",
    "vnedrenie-pod-klyuch": "Внедрение под ключ",
    "istochniki": "Источники",
}


def slugify_heading(text: str) -> str:
    t = text.strip()
    if t in H2_IDS:
        return H2_IDS[t]
    if t in H3_IDS:
        return H3_IDS[t]
    s = t.lower()
    s = re.sub(r"[^\w\s-]", "", s, flags=re.UNICODE)
    s = re.sub(r"[\s_]+", "-", s)
    return s[:80] or "section"


def inline_md(text: str) -> str:
    text = re.sub(r"\*\*(.+?)\*\*", r"<strong>\1</strong>", text)
    text = re.sub(r"(?<!\*)\*([^*]+)\*(?!\*)", r"<em>\1</em>", text)
    text = re.sub(r"`([^`]+)`", r"<code>\1</code>", text)
    text = re.sub(
        r"\[([^\]]+)\]\(([^)]+)\)",
        r'<a href="\2" target="_blank" rel="noopener noreferrer">\1</a>',
        text,
    )
    return text


def parse_table(lines: list[str]) -> str:
    rows = []
    for line in lines:
        if not line.strip():
            continue
        cells = [inline_md(c.strip()) for c in line.strip("|").split("|")]
        rows.append(cells)
    if not rows:
        return ""
    html = ['<div class="ym-table-wrap reveal"><table class="ym-table">']
    for i, row in enumerate(rows):
        tag = "th" if i == 0 or (i == 1 and all("---" in c or c == "" for c in row)) else "td"
        if tag == "td" and i == 1 and all(re.match(r"^[-:]+$", c.strip()) or not c for c in row):
            continue
        if i == 0:
            html.append("<thead><tr>")
            for c in row:
                html.append(f"<th>{c}</th>")
            html.append("</tr></thead><tbody>")
        else:
            if all(re.match(r"^[-:\s]+$", c) for c in row):
                continue
            html.append("<tr>")
            for c in row:
                html.append(f"<td>{c}</td>")
            html.append("</tr>")
    html.append("</tbody></table></div>")
    return "\n".join(html)


def markdown_to_html(md: str) -> str:
    lines = md.splitlines()
    parts: list[str] = []
    i = 0
    h2_count = 0
    section_open = False
    para_buf: list[str] = []
    insert_boris_after_next_para = False

    def close_section() -> None:
        nonlocal section_open
        if section_open:
            parts.append("</div></div></section>")
            section_open = False

    def flush_paragraph() -> None:
        nonlocal insert_boris_after_next_para
        if not para_buf:
            return
        p = " ".join(x.strip() for x in para_buf if x.strip())
        para_buf.clear()
        if not p:
            return
        parts.append(f'<p class="ym-lead-text">{inline_md(p)}</p>')
        if insert_boris_after_next_para:
            parts.append("{{BORIS_BLOCK}}")
            insert_boris_after_next_para = False

    while i < len(lines):
        line = lines[i]
        if line.strip() == "---":
            i += 1
            continue

        if line.startswith("## "):
            flush_paragraph()
            close_section()
            title = line[3:].strip()
            if title == "Введение":
                i += 1
                continue
            sec_id = slugify_heading(title)
            h2_count += 1
            alt = " ym-section-alt" if h2_count % 2 == 0 else ""
            parts.append(
                f'<section class="ym-section{alt} reveal" id="{sec_id}">'
                f'<div class="ym-container"><div class="ym-prose reveal">'
                f'<h2 class="ym-section-title">{inline_md(title)}</h2>'
            )
            section_open = True
            if sec_id == "pyatnadcat-ai-workflow-anthropic":
                insert_boris_after_next_para = True
            i += 1
            continue

        if line.startswith("### "):
            flush_paragraph()
            title = line[4:].strip()
            sec_id = slugify_heading(title)
            parts.append(f'<h3 class="ym-h3" id="{sec_id}">{inline_md(title)}</h3>')
            i += 1
            continue

        if line.startswith("|"):
            flush_paragraph()
            table_lines = []
            while i < len(lines) and lines[i].startswith("|"):
                table_lines.append(lines[i])
                i += 1
            parts.append(parse_table(table_lines))
            continue

        if re.match(r"^[-*]\s+", line):
            flush_paragraph()
            parts.append('<ul class="ym-list">')
            while i < len(lines) and re.match(r"^[-*]\s+", lines[i]):
                item = re.sub(r"^[-*]\s+", "", lines[i])
                parts.append(f"<li>{inline_md(item)}</li>")
                i += 1
            parts.append("</ul>")
            continue

        if re.match(r"^\d+\.\s+", line):
            flush_paragraph()
            parts.append('<ol class="ym-list ym-list-ordered">')
            while i < len(lines) and re.match(r"^\d+\.\s+", lines[i]):
                item = re.sub(r"^\d+\.\s+", "", lines[i])
                parts.append(f"<li>{inline_md(item)}</li>")
                i += 1
            parts.append("</ol>")
            continue

        if not line.strip():
            flush_paragraph()
            i += 1
            continue

        para_buf = []
        while i < len(lines) and lines[i].strip() and not lines[i].startswith("#") and not lines[i].startswith("|") and not re.match(r"^[-*]\s+", lines[i]) and not re.match(r"^\d+\.\s+", lines[i]):
            para_buf.append(lines[i])
            i += 1
        flush_paragraph()

    flush_paragraph()
    close_section()
    return "\n".join(parts)


def extract_html_block(frag: Path, start_marker: str, end_markers: tuple[str, ...]) -> str:
    text = frag.read_text(encoding="utf-8")
    start = text.find(start_marker)
    if start < 0:
        raise ValueError(f"Marker not found: {start_marker} in {frag}")
    chunk = text[start:]
    end = len(chunk)
    for em in end_markers:
        pos = chunk.find(em, len(start_marker))
        if pos > 0:
            end = min(end, pos)
    return chunk[:end].strip()


def load_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = re.sub(r"/\*.*?\*/", "", css, flags=re.DOTALL)
    # Theme accents — Anthropic orange + violet
    css = css.replace("--ym-primary: #ff0000", "--ym-primary: #d97706")
    css = css.replace("--ym-accent: #3b82f6", "--ym-accent: #7c3aed")
    css = css.replace("rgba(255, 0, 0,", "rgba(217, 119, 6,")
    css = css.replace("#ff0000", "#d97706")
    css = css.replace("#e60000", "#b45309")
    css = css.replace("#ff4b4b", "#8b5cf6")
    return css


EXTRA_CSS = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#smb-workflow-hero.smb-workflow-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.claude-intro-section { padding: 56px 0 24px; }
.claude-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr);
  gap: clamp(24px, 4vw, 40px);
  align-items: start;
}
.claude-intro-text {
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #d97706, #7c3aed) 1;
  padding-left: clamp(16px, 3vw, 24px);
  text-align: left !important;
}
.claude-intro-text p { text-align: left !important; }
.claude-intro-deco .ym-mac-window { margin-bottom: 0; }
.claude-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.claude-kpi-chips span {
  padding: 8px 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.ym-toc-wrap { padding: 8px 0 48px; text-align: center; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose .ym-lead-text { font-size: 17px; line-height: 1.75; margin-bottom: 20px; }
.ym-h3 { font-size: 24px; font-weight: 700; margin: 36px 0 16px; color: var(--ym-heading) !important; }
.ym-list { margin: 0 0 24px 1.2em; line-height: 1.7; }
.ym-list-ordered { list-style: decimal; }
.ym-table-wrap { overflow-x: auto; margin: 24px 0 32px; }
.ym-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 12px;
  overflow: hidden;
}
.ym-table th, .ym-table td {
  padding: 12px 16px;
  border-bottom: 1px solid var(--ym-border);
  text-align: left;
  vertical-align: top;
}
.ym-table th { background: #f1f5f9; font-weight: 700; }
.ym-faq-geo { margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--ym-border); }
.ym-faq-geo h4 { font-size: 18px; margin: 20px 0 8px; }
.ym-sources-list { list-style: none; padding: 0; margin: 0; }
.ym-sources-list li { margin-bottom: 12px; }
@media (max-width: 900px) {
  .claude-intro-grid { grid-template-columns: 1fr; }
}
"""

CTA_PRIMARY = """<?php
$nn_primary_url   = getenv('PRIMARY_CTA_URL') ?: '';
$nn_primary_label = getenv('PRIMARY_CTA_LABEL') ?: 'Заказать аудит и пилот AI-workflow';
if ($nn_primary_url) :
?>
<aside class="ym-cta-panel reveal" id="cta-primary-vnedrenie" aria-labelledby="cta-primary-vnedrenie-title">
  <div class="ym-card ym-cta-card">
    <h3 class="ym-cta-title" id="cta-primary-vnedrenie-title">Внедрение AI-workflow под ваш CRM, 1С и мессенджеры</h3>
    <p class="ym-cta-lead">Сверим ваши процессы с 15 сценариями Anthropic, запустим пилот на 1–2 workflow (lead triage, month-end, утренняя сводка) и настроим approve-before-send без автосписаний и массовых правок в CRM.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nn_primary_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nn_primary_label); ?></a>
    </div>
  </div>
</aside>
<?php endif; ?>"""

CTA_SECONDARY = """<?php
$nn_secondary_url   = getenv('SECONDARY_CTA_URL') ?: '';
$nn_secondary_label = getenv('SECONDARY_CTA_LABEL') ?: 'Пройти обучение вайбкодингу и MCP';
if ($nn_secondary_url) :
?>
<aside class="ym-cta-panel reveal" id="cta-secondary-obuchenie" aria-labelledby="cta-secondary-obuchenie-title">
  <div class="ym-card ym-cta-card ym-cta-card--secondary">
    <h3 class="ym-cta-title" id="cta-secondary-obuchenie-title">Закрепить чек-лист на практике</h3>
    <p class="ym-cta-lead">После пилота на Make или n8n команда держит сценарии сама: разбор MCP-коннекторов, сборка approve в Telegram/CRM и поддержка без ежедневного подрядчика.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url($nn_secondary_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nn_secondary_label); ?></a>
    </div>
  </div>
</aside>
<?php endif; ?>"""

AD_BANNER = """<?php
$nn_banner_url = getenv('AD_BANNER_URL') ?: '';
$nn_banner_img = getenv('AD_BANNER_IMAGE_URL') ?: '';
$nn_banner_alt = getenv('AD_BANNER_ALT') ?: 'Рекламный баннер партнёра';
if ($nn_banner_url && $nn_banner_img) :
?>
<div class="ym-ad-banner-wrap reveal" id="cta-ad-banner-bottom">
  <a href="<?php echo esc_url($nn_banner_url); ?>" target="_blank" rel="noopener noreferrer">
    <img src="<?php echo esc_url($nn_banner_img); ?>" width="970" height="90" alt="<?php echo esc_attr($nn_banner_alt); ?>" loading="lazy" decoding="async" style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
  </a>
</div>
<?php endif; ?>"""

CTA_CSS = """
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel { margin: 48px 0; padding: 0; }
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-card {
  padding: clamp(24px, 4vw, 40px);
  border: 1px solid var(--ym-border, #e2e8f0);
  border-radius: 20px;
  background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
  box-shadow: var(--ym-shadow, 0 12px 40px rgba(15, 23, 42, 0.08));
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-card--secondary {
  background: #ffffff;
  border-left: 4px solid var(--ym-accent, #7c3aed);
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-title {
  margin: 0 0 12px;
  font-size: clamp(22px, 3vw, 28px);
  color: var(--ym-heading, #0f172a);
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-lead {
  margin: 0 0 20px;
  color: var(--ym-text, #334155);
  line-height: 1.6;
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-ad-banner-wrap {
  margin: 56px auto 32px;
  text-align: center;
}
"""

JSON_LD = """{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Claude для малого бизнеса: 15 AI-workflow и коннекторы — как повторить у себя",
      "description": "Claude for Small Business (13.05.2026): 15 AI-workflow для финансов, продаж и HR. Как повторить на Make, n8n, MCP, amoCRM и 1С без QuickBooks.",
      "datePublished": "2026-05-30",
      "dateModified": "2026-05-30",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "inLanguage": "ru-RU"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Что такое Claude for Small Business?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Режим в Claude Cowork с 15 готовыми AI-workflow и MCP к бухгалтерии, CRM и офисным приложениям; владелец утверждает критические действия."
          }
        },
        {
          "@type": "Question",
          "name": "С чего начать внедрение AI в малом бизнесе без программиста?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Выберите один процесс, подключите no-code (Make/Albato) и CRM, включите approve на исходящие действия."
          }
        },
        {
          "@type": "Question",
          "name": "Нужен ли разработчик для MCP?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Для готовых коннекторов Anthropic — нет; для 1С и кастом MCP на этапе пилота — обычно да."
          }
        }
      ]
    }
  ]
}"""


def build_intro_html(intro_md: str) -> str:
    paras = [p.strip() for p in intro_md.split("\n\n") if p.strip()]
    p_html = "\n".join(f"<p>{inline_md(p)}</p>" for p in paras[:2])
    return f"""
<section class="claude-intro-section reveal" id="vvedenie">
  <div class="ym-container">
    <div class="claude-intro-grid">
      <div class="claude-intro-text">
        {p_html}
      </div>
      <div class="claude-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">cowork — smb-workflow</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-command">/monday-brief</div>
            <div class="ym-comment"># cash + pipeline + calendar</div>
            <div class="ym-command">/close-month → approve</div>
            <div class="ym-comment"># QB ↔ PayPal → бухгалтеру</div>
            <div class="ym-command">handoff → amoCRM · 1С · TG</div>
          </div>
        </div>
        <div class="claude-kpi-chips" aria-hidden="true">
          <span>15 workflow</span><span>MCP</span><span>approve</span><span>Make/n8n</span>
        </div>
      </div>
    </div>
  </div>
</section>
"""


def build_toc() -> str:
    links = "\n".join(
        f'      <a href="#{sid}">{TOC_LABELS.get(sid, sid)}</a>'
        for sid in TOC_LABELS
    )
    return f"""
<section class="ym-toc-wrap reveal" aria-label="Оглавление">
  <div class="ym-container">
    <nav class="ym-toc">{links}
    </nav>
  </div>
</section>
"""


def fix_content_html(html: str, boris: str) -> str:
    html = html.replace("{{BORIS_BLOCK}}", boris)
    html = re.sub(
        r'(<p class="ym-lead-text"><strong>Коротко:</strong> звоните интегратору.*?</p>)',
        r"\1\n" + CTA_PRIMARY,
        html,
        count=1,
        flags=re.DOTALL,
    )
    html = re.sub(
        r'(<p class="ym-lead-text">Метрика: время владельца.*?</p>)',
        r"\1\n" + CTA_SECONDARY,
        html,
        count=1,
        flags=re.DOTALL,
    )
    return html


def main() -> None:
    longread = LONGREAD.read_text(encoding="utf-8")
    intro_part, rest = longread.split("---", 1)
    intro_part = intro_part.replace("## Введение", "").strip()
    rest = rest.strip()

    hero_section = extract_html_block(
        ALINA_FRAG,
        '<section id="smb-workflow-hero"',
        ("## Чеклист",),
    )
    hero_script = ""
    if "<script>" in hero_section:
        idx = hero_section.rfind("<script>")
        hero_html = hero_section[:idx].strip()
        hero_script = hero_section[idx:].strip()
        if not hero_script.rstrip().endswith("</script>"):
            hero_script = hero_script.rstrip() + "\n</script>"
    else:
        hero_html = hero_section

    boris = extract_html_block(
        BORIS_FRAG,
        '<section\n  class="boris-smb-workflow-map',
        ("```\n\nЧеклист", "Чеклист отличий"),
    )
    if boris.startswith("```html"):
        boris = boris[7:]
    boris = boris.strip()
    if boris.endswith("```"):
        boris = boris[:-3].strip()

    content = markdown_to_html(rest)
    content = fix_content_html(content, boris)

    # FAQ layout for last FAQ section — optional enhancement skipped for time
    intro_html = build_intro_html(intro_part)
    toc_html = build_toc()

    reveal_js = REVEAL_JS.read_text(encoding="utf-8")

    php = f"""<?php
/**
 * Template Name: Claude для малого бизнеса — AI workflow
 * Description: Лонгрид Claude for Small Business — 15 AI-workflow, MCP, Make/n8n для SMB.
 */

$page_seo_title = {SEO_TITLE!r};
$page_seo_description = {SEO_DESC!r};

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
{load_css()}
{EXTRA_CSS}
{CTA_CSS}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">

{hero_html}

{hero_script}

{intro_html}

{toc_html}

{content}

{AD_BANNER}

</main>

<script>
{reveal_js.strip()}
</script>

<script type="application/ld+json">
{JSON_LD}
</script>

<?php
get_footer();
"""

    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(php, encoding="utf-8")

    html_only = re.sub(r"<\?php.*?\?>", "", php, flags=re.DOTALL)
    html_chars = len(html_only)
    print(f"Written: {OUT_PHP}")
    print(f"HTML size (chars, no PHP): {html_chars}")

    # Update handoff
    handoff = HANDOFF.read_text(encoding="utf-8")
    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in handoff:
        handoff = re.sub(
            r"=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            "",
            handoff,
            flags=re.DOTALL,
        ).rstrip()
    natasha_block = f"""
=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

## Структура страницы
1. Hero Алины (`#smb-workflow-hero`, canvas `smb-workflow-hub-canvas`)
2. Введение (`#vvedenie`) — split текст + терминал
3. Оглавление `.ym-toc`
4. H2-секции: {", ".join("#" + v for v in H2_IDS.values())}
5. Блок Бориса после вводного абзаца `#pyatnadcat-ai-workflow-anthropic`
6. CTA primary `#vnedrenie-pod-klyuch`, secondary `#chek-list-vnedreniya-4-nedeli`, баннер после `#istochniki`
7. Reveal + JSON-LD (Article, FAQPage)

## Файлы
- Шаблон: `wordpress-theme/page-{SLUG}.php`
- Размер HTML (без PHP): ~{html_chars} знаков

## Передача Юре
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит `<script>` (hero engine + reveal + Борис) и `<canvas>` — при публикации в WordPress обернуть в `<!-- wp:html -->`.
Файл темы: `wordpress-theme/page-{SLUG}.php`
"""
    HANDOFF.write_text(handoff + "\n" + natasha_block.strip() + "\n", encoding="utf-8")
    print("Handoff updated.")


if __name__ == "__main__":
    main()
