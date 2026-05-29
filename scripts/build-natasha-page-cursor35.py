#!/usr/bin/env python3
"""Assemble Natasha HTML + PHP template for cursor-35 page from handoff."""
from __future__ import annotations

import os
import re
import json
from pathlib import Path

ROOT = Path("/workspace")
HANDOFF = ROOT / ".cursor/nero-network-handoff.md"
CSS_REF = ROOT / "shared/longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared/longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme/page-cursor-35-automations-no-repo-agenty-biznesa.php"
OUT_HANDOFF_MARKER = "=== НАТАША (HTML СТРАНИЦЫ) ==="

SLUG = "cursor-35-automations-no-repo-agenty-biznesa"
PAGE_CLASS = "cursor-35-automations-no-repo-agenty-biznesa-page"

PRIMARY_CTA = os.environ.get("PRIMARY_CTA_URL") or "${PRIMARY_CTA_URL}"
SECONDARY_CTA = os.environ.get("SECONDARY_CTA_URL") or "${SECONDARY_CTA_URL}"
TELEGRAM_CTA = os.environ.get("PRIMARY_CTA_URL") or os.environ.get("TELEGRAM_CTA_URL") or "#"

SEO_TITLE = "Cursor 3.5 Automations без репо: агенты Slack, Stripe"
SEO_DESC = (
    "Cursor 3.5: Automations в Agents Window, no-repo и multi-repo. "
    "Шаблоны Slack, Stripe, Databricks. Настройка без репозитория и связка с Make, MCP, n8n."
)

SECTION_IDS = [
    ("cursor-35-news", "Что нового в Cursor 3.5 (20 мая 2026) — Automations в Agents Window"),
    ("no-repo-automations", "No-repo automations: агенты без привязки к коду"),
    ("marketplace-shablony", "Пять шаблонов Marketplace (готовые сценарии)"),
    ("multi-repo", "Multi-repo: один агент — несколько кодовых баз"),
    ("mcp-cursor", "MCP в Cursor 3.5: как агент «видит» внешние системы"),
    ("cursor-vs-make", "Cursor vs Make / n8n / Copilot: что выбрать в 2026"),
    ("tarify-roi", "Тарифы, лимиты и ROI для SMB"),
    ("povtorit-biznes", "Как повторить сценарий в своём бизнесе (Make, MCP, вайбкодинг)"),
    ("faq-geo", "FAQ (GEO-блок для сниппетов)"),
]

CTA_PRIMARY_1 = """<aside class="ym-section ym-cta-insert reveal" data-cta="primary-audit" aria-labelledby="ym-cta-primary-audit-title">
  <div class="ym-container">
    <div class="ym-card" style="border-left:4px solid var(--ym-primary);padding:clamp(24px,4vw,36px);">
      <p style="margin:0 0 8px;font-size:14px;font-weight:700;color:var(--ym-primary);text-transform:uppercase;letter-spacing:.08em;">Nero Network</p>
      <h3 id="ym-cta-primary-audit-title" style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);text-align:left;">Аудит 1–2 шаблонов Cursor 3.5 под ваш стек</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);max-width:58ch;text-align:left;">Разберём Slack, Stripe, CRM и мессенджеры: что подключить через MCP, кто утверждает отчёты и где связать Make или n8n — <strong>за 48 часов</strong>, без обязательного своего репозитория.</p>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-primary" href="{primary}" target="_blank" rel="noopener noreferrer">Заказать аудит no-repo</a>
      </div>
    </div>
  </div>
</aside>"""

CTA_SECONDARY_2 = """<aside class="ym-cta-insert reveal" data-cta="secondary-learn" aria-labelledby="ym-cta-secondary-learn-title">
  <div class="ym-container">
    <div class="ym-card" style="background:linear-gradient(135deg,#eff6ff 0%,#f8fafc 100%);padding:clamp(20px,3vw,28px);border-radius:16px;border:1px solid var(--ym-border);">
      <h3 id="ym-cta-secondary-learn-title" style="margin:0 0 10px;font-size:20px;color:var(--ym-heading);text-align:left;">Освоить вайбкодинг и Cursor Automations</h3>
      <p style="margin:0 0 16px;color:var(--ym-text);text-align:left;">Промпты, MCP, auto-run allowlist и ответственность за вывод агента — с практикой под ваши процессы (<em>обучение cursor автоматизация</em>, <em>вайбкодинг cursor</em>).</p>
      <a class="ym-btn ym-btn-secondary" href="{secondary}" target="_blank" rel="noopener noreferrer">Обучение вайбкодингу и Cursor</a>
    </div>
  </div>
</aside>"""

CTA_DUAL_CLOSE = """<aside class="ym-section ym-section-alt ym-cta-insert reveal" data-cta="primary-close" aria-labelledby="ym-cta-primary-close-title">
  <div class="ym-container" style="text-align:center;">
    <h3 id="ym-cta-primary-close-title" class="ym-section-title" style="margin-bottom:12px;">Следующий шаг: аудит шаблонов под CRM, мессенджер и платёжку</h3>
    <p class="ym-section-subtitle" style="margin-bottom:24px;">Cursor 3.5 даёт витрину; внедрение и governance — ваша зона ответственности. Поможем собрать no-repo + Make MCP за 48 часов.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="{primary}" target="_blank" rel="noopener noreferrer">Заказать аудит no-repo</a>
      <a class="ym-btn ym-btn-secondary" href="{secondary}" target="_blank" rel="noopener noreferrer">Обучение вайбкодингу и Cursor</a>
    </div>
  </div>
</aside>"""


def extract_codeblock(text: str, marker: str) -> str:
    idx = text.find(marker)
    if idx < 0:
        raise ValueError(f"Marker not found: {marker}")
    rest = text[idx:]
    m = re.search(r"```html\n(.*?)```", rest, re.DOTALL)
    if not m:
        raise ValueError(f"No html block after {marker}")
    return m.group(1).strip()


def extract_zhenya_markdown(handoff: str) -> str:
    m = re.search(
        r"=== ЖЕНЯ \(ЛОНГРИД\) ===.*?### Полный текст\n(.*?)\n\n### GEO-чеклист",
        handoff,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Zhenya markdown not found")
    return m.group(1).strip()


def md_to_html(md: str) -> str:
    import markdown

    return markdown.markdown(
        md,
        extensions=["tables", "fenced_code", "nl2br", "sane_lists"],
        output_format="html5",
    )


def slugify_heading(text: str) -> str:
    t = text.strip().lower()
    for a, b in [
        ("ё", "e"),
        ("—", "-"),
        ("«", ""),
        ("»", ""),
        (":", ""),
        ("?", ""),
        ("/", "-"),
        (" ", "-"),
        (",", ""),
        (".", ""),
        ("(", ""),
        (")", ""),
        ("'", ""),
        ('"', ""),
    ]:
        t = t.replace(a, b)
    t = re.sub(r"[^a-z0-9а-я-]+", "-", t)
    t = re.sub(r"-+", "-", t).strip("-")
    return t


def wrap_sections(html: str, boris: str) -> str:
    """Split converted HTML by H2 and wrap in ym-section."""
    parts = re.split(r"(<h2[^>]*>.*?</h2>)", html, flags=re.DOTALL)
    if not parts or not parts[0].strip().startswith("<"):
        lead = parts[0] if parts else html
        body_parts = parts[1:] if len(parts) > 1 else []
    else:
        lead = ""
        body_parts = parts

    out: list[str] = []
    id_map = {title: sid for sid, title in SECTION_IDS}

    # Lead before first H2 (skip duplicate H1)
    if lead:
        lead = re.sub(r"<h1[^>]*>.*?</h1>", "", lead, count=1, flags=re.DOTALL)
        out.append(
            f'<section class="ym-section" id="lead">'
            f'<div class="ym-container"><div class="ym-prose reveal">{lead}</div></div></section>'
        )

    i = 0
    section_idx = 0
    while i < len(body_parts):
        h2_block = body_parts[i]
        content = body_parts[i + 1] if i + 1 < len(body_parts) else ""
        i += 2
        h2_text = re.sub(r"<[^>]+>", "", h2_block).strip()
        sid = id_map.get(h2_text)
        if not sid:
            sid = slugify_heading(h2_text)[:48] or f"section-{section_idx}"
        alt = ' ym-section-alt' if section_idx % 2 else ''
        section_idx += 1

        if sid == "povtorit-biznes":
            inline_secondary = (
                '<p>Если команде не хватает навыков настройки MCP и промптов, имеет смысл пройти '
                f'<a href="{SECONDARY_CTA}" target="_blank" rel="noopener noreferrer">обучение вайбкодингу и Cursor</a> '
                "перед промышленным запуском no-repo.</p>\n"
            )
            if "обучение вайбкодингу и Cursor</a>" not in content:
                content = content.replace(
                    "<strong>без обязательного своего репозитория</strong>.</p>",
                    "<strong>без обязательного своего репозитория</strong>.</p>\n"
                    + inline_secondary,
                    1,
                )
            if "Типовые ошибки внедрения" in content:
                chunks = re.split(
                    r"(<h3[^>]*>.*?Типовые ошибки внедрения.*?</h3>.*?)((?=<h3)|$)",
                    content,
                    maxsplit=1,
                    flags=re.DOTALL,
                )
                if len(chunks) >= 2:
                    content = (
                        chunks[0]
                        + chunks[1]
                        + CTA_SECONDARY_2.format(secondary=SECONDARY_CTA)
                        + (chunks[2] if len(chunks) > 2 else "")
                    )

        block = (
            f'<section class="ym-section{alt}" id="{sid}">\n'
            f'<div class="ym-container">\n'
            f'<div class="ym-prose reveal">{h2_block}{content}</div>\n'
            f"</div>\n</section>\n"
        )
        out.append(block)
        if sid == "no-repo-automations":
            out.append(boris + "\n")
        if sid == "marketplace-shablony":
            out.append(CTA_PRIMARY_1.format(primary=PRIMARY_CTA) + "\n")

    # Dual CTA before FAQ
    faq_idx = next((j for j, s in enumerate(out) if 'id="faq-geo"' in s), None)
    if faq_idx is not None:
        out.insert(faq_idx, CTA_DUAL_CLOSE.format(primary=PRIMARY_CTA, secondary=SECONDARY_CTA) + "\n")

    return "\n".join(out)


def fix_links(html: str) -> str:
    html = html.replace("${SECONDARY_CTA_URL}", SECONDARY_CTA)
    html = html.replace("${PRIMARY_CTA_URL}", PRIMARY_CTA)
    html = re.sub(
        r'href="\[обучение вайбкодингу и Cursor\]\([^)]+\)"',
        f'href="{SECONDARY_CTA}"',
        html,
    )
    # external links target blank
    def _rel(m):
        url = m.group(1)
        if url.startswith("#") or url.startswith("/"):
            return m.group(0)
        extra = ' target="_blank" rel="noopener noreferrer"'
        if "rel=" in m.group(0):
            return m.group(0)
        return f'href="{url}"{extra}'

    html = re.sub(r'href="(https?://[^"]+)"', _rel, html)
    return html


def build_intro() -> str:
    return f"""
<section class="ym-section c35-intro-section" id="intro">
  <div class="ym-container">
    <div class="c35-intro-grid reveal">
      <div class="c35-intro-text">
        <p class="c35-intro-lead"><strong>Коротко:</strong> 20 мая 2026 Cursor вынес <strong>Automations</strong> в <strong>Agents Window</strong>, добавил <strong>no-repo</strong> и <strong>multi-repo</strong>. Для бизнеса без своего Git — готовые шаблоны мониторинга Slack, Stripe, Databricks и customer health с оплатой как у cloud agents и обязательным <strong>Max Mode</strong>.</p>
        <p>Этот лонгрид — пошаговый разбор релиза, Marketplace-шаблонов, MCP, сравнения с Make/n8n/Copilot и практики внедрения для SMB на русском.</p>
      </div>
      <div class="c35-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">agents-window — no-repo</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># триггер без Git</span><br>
            <span class="ym-command">cron</span> slack-digest → mcp stripe read-only<br>
            <span class="ym-command">webhook</span> make → cursor cloud agent<br>
            <span class="ym-comment"># human approve в Slack</span>
          </div>
        </div>
        <div class="c35-intro-chips">
          <span>No-repo</span><span>Slack</span><span>Stripe</span><span>MCP</span><span>Max Mode</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      {"".join(f'<a href="#{sid}">{title.split("—")[0].strip()[:42]}</a>' for sid, title in SECTION_IDS)}
    </nav>
  </div>
</section>
"""


def build_faq_jsonld() -> str:
    faqs = [
        ("Нужен ли Git-репозиторий для Automations?", "Нет для no-repo: Slack, MCP, webhooks, Linear, PagerDuty работают без клонирования. Для GitHub/GitLab-триггеров и PR — да."),
        ("Можно ли создать свой Blank automation?", "Да. В Marketplace и через Blank automation задаёте инструкции, триггеры и tools."),
        ("Чем no-repo отличается от Zapier?", "Zapier — фиксированные шаги; Cursor no-repo — LLM-reasoning + MCP + текстовые инструкции. PR и код — только с repo."),
        ("Сколько стоят ежедневные automations?", "Зависит от модели и частоты; биллинг = cloud agent usage, Max Mode обязателен."),
        ("Работает ли Jira с Individual-планом?", "Нет. Jira + Cloud Agents — Teams и Enterprise."),
        ("Можно ли связать Make и Cursor?", "Да, через Make MCP Server и webhooks."),
        ("Кто отвечает за ошибку агента в Slack?", "Организация назначает владельца промпта и human-in-the-loop."),
        ("Есть ли русскоязычные гайды по 3.5?", "Короткие обзоры есть; данный лонгрид закрывает пробел внедрения ai агентов для бизнеса на русском."),
    ]
    data = {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": q,
                "acceptedAnswer": {"@type": "Answer", "text": a},
            }
            for q, a in faqs
        ],
    }
    return (
        '<script type="application/ld+json">\n'
        + json.dumps(data, ensure_ascii=False, indent=2)
        + "\n</script>"
    )


def build_page_css() -> str:
    base = CSS_REF.read_text(encoding="utf-8")
    base = base.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    base = base.replace("--ym-primary: #ff0000", "--ym-primary: #6366f1")
    base = base.replace("--ym-accent: #3b82f6", "--ym-accent: #06b6d4")
    base = base.replace("rgba(255, 0, 0", "rgba(99, 102, 241")
    base = base.replace("rgba(255,0,0", "rgba(99,102,241")
    base = base.replace("#ff0000", "#6366f1")
    base = base.replace("#e60000", "#4f46e5")

    extra = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#cursor-norepo-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.c35-intro-section { padding-top: 48px; padding-bottom: 40px; }
.c35-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
  gap: clamp(24px, 4vw, 48px);
  align-items: start;
}
.c35-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: clamp(16px, 3vw, 28px);
}
.c35-intro-text p { text-align: left !important; }
.c35-intro-lead { font-size: 18px; line-height: 1.65; margin: 0 0 16px; }
.c35-intro-chips {
  display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px;
}
.c35-intro-chips span {
  font-size: 12px; font-weight: 600; padding: 6px 12px;
  border-radius: 999px; background: var(--ym-surface);
  border: 1px solid var(--ym-border); color: var(--ym-text);
}
.c35-intro-section .ym-toc { margin-top: 36px; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose h2 { font-size: clamp(26px, 3vw, 36px); font-weight: 800; margin: 0 0 24px; letter-spacing: -0.5px; }
.ym-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; }
.ym-prose p, .ym-prose li { font-size: 16px; line-height: 1.7; margin-bottom: 16px; }
.ym-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; font-size: 15px; }
.ym-prose th, .ym-prose td { border: 1px solid var(--ym-border); padding: 12px 14px; text-align: left; }
.ym-prose th { background: #f1f5f9; font-weight: 700; }
.ym-prose a { color: var(--ym-accent); }
.ym-prose hr { border: none; border-top: 1px solid var(--ym-border); margin: 40px 0; }
.ym-cta-insert { padding: 0; }
.ym-cta-insert .ym-section { padding: 60px 0; }
@media (max-width: 900px) {
  .c35-intro-grid { grid-template-columns: 1fr; }
}
"""
    return f"<style>\n{base}\n{extra}\n</style>"


def build_html_body(handoff: str) -> str:
    hero = extract_codeblock(handoff, "=== АЛИНА (HERO) ===")
    hero = hero.replace('href="#"', f'href="{TELEGRAM_CTA}"', 1)
    boris = extract_codeblock(handoff, "=== БОРИС (БЛОК СТАТЬИ, НЕ HERO) ===")
    md = extract_zhenya_markdown(handoff)
    # Remove top H1 and lead (в intro); .+ с DOTALL съедает весь текст до последнего «Коротко»
    md = re.sub(
        r"^# [^\n]+\n\n\*\*Коротко:\*\*[^\n]*\n\n---\n\n",
        "",
        md,
        count=1,
        flags=re.MULTILINE,
    )
    html_content = md_to_html(md)
    html_content = fix_links(html_content)
    sections = wrap_sections(html_content, boris)
    intro = build_intro()
    reveal = REVEAL_JS.read_text(encoding="utf-8")
    faq_ld = build_faq_jsonld()

  # Boris script stays inside boris section; hero script inside hero
    return f"""{build_page_css()}

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{hero}
{intro}
{sections}
</main>

<script>
{reveal.strip()}
</script>
{faq_ld}
"""


def build_php(html: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    template_name = "Cursor 3.5 Automations no-repo"
    return f"""<?php
/**
 * Template Name: {template_name}
 * Description: Cursor 3.5 Automations — no-repo / multi-repo, Slack, Stripe, MCP.
 */

$page_seo_title = '{esc_title}';
$page_seo_description = '{esc_desc}';

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

{html}

<?php get_footer(); ?>
"""


def update_handoff(html: str, char_count: int) -> None:
    text = HANDOFF.read_text(encoding="utf-8")
    block = f"""
{OUT_HANDOFF_MARKER}
Статус: ✅ ГОТОВО
SLUG: {SLUG}
Размер HTML: {char_count} символов
Класс страницы: {PAGE_CLASS}
Структура: hero Алины → intro (лид+терминал) → ym-toc → 9 секций H2 → блок Бориса (после no-repo) → CTA Артура (×3) → FAQ + JSON-LD
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->
PHP шаблон: wordpress-theme/page-{SLUG}.php

{html}

## Передача Юре
SLUG: {SLUG}
Контент содержит <script> (hero engine + boris engine + reveal) и <canvas> (2 id). Обязательно обернуть в <!-- wp:html --> при публикации через редактор; при деплое page-{SLUG}.php — как есть.
Файл темы: wordpress-theme/page-{SLUG}.php
AD_BANNER: не вставлен (secrets пусты)
"""
    if OUT_HANDOFF_MARKER in text:
        text = re.sub(
            rf"{re.escape(OUT_HANDOFF_MARKER)}.*",
            block.strip(),
            text,
            flags=re.DOTALL,
        )
    else:
        text = text.rstrip() + "\n\n" + block.strip() + "\n"
    HANDOFF.write_text(text, encoding="utf-8")


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    html = build_html_body(handoff)
    char_count = len(html)
    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(build_php(html), encoding="utf-8")
    update_handoff(html, char_count)
    print(f"OK slug={SLUG} chars={char_count} php={OUT_PHP}")


if __name__ == "__main__":
    main()
