#!/usr/bin/env python3
"""Assemble Natasha HTML + WordPress template for alice-ai-llm-flash-vnedrenie-biznes."""
from __future__ import annotations

import json
import os
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SLUG = "alice-ai-llm-flash-vnedrenie-biznes"
PAGE_CLASS = f"{SLUG}-page"

PRIMARY_URL = os.environ.get("PRIMARY_CTA_URL", "#")
PRIMARY_LABEL = os.environ.get("PRIMARY_CTA_LABEL", "Обсудить пилот Flash")
SECONDARY_URL = os.environ.get("SECONDARY_CTA_URL", "#")
SECONDARY_LABEL = os.environ.get("SECONDARY_CTA_LABEL", "Обучение AI Studio")
SITE_URL = (os.environ.get("WP_SITE_URL") or os.environ.get("PUBLIC_SITE_URL") or "").rstrip("/")
PAGE_URL = f"{SITE_URL}/{SLUG}/" if SITE_URL else f"/{SLUG}/"

SEO_TITLE = "Alice AI LLM Flash: внедрение нейросети Яндекса для бизнеса"
SEO_DESC = (
    "Подключение Alice AI LLM Flash в Yandex AI Studio: цена, сравнение с GPT-5.4 mini, "
    "кейсы поддержки, RAG и модерации. Внедрение под ключ — данные в РФ, без западных API."
)


def extract_codeblock(path: Path) -> str:
    text = path.read_text(encoding="utf-8")
    m = re.search(r"```html\n(.*?)```", text, re.DOTALL)
    if not m:
        raise ValueError(f"No html block in {path}")
    return m.group(1).strip()


def patch_hero_cta(hero: str) -> str:
    rel = ' rel="noopener noreferrer"' if PRIMARY_URL.startswith("http") else ""
    target = ' target="_blank"' if PRIMARY_URL.startswith("http") else ""
    hero = hero.replace(
        'href="#" data-nero-cta="primary"',
        f'href="{PRIMARY_URL}" data-nero-cta="primary"{target}{rel}',
    )
    hero = hero.replace(">Обсудить пилот Flash<", f">{PRIMARY_LABEL}<")
    return hero


def load_css() -> str:
    css = (ROOT / "shared/longread-page-design-reference.css").read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    extra = f"""
/* Page shell — Natasha */
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section {{ display: none !important; }}
#primary, .site-main, .site-content, #content, .content-area {{
  padding-top: 0 !important;
  margin-top: 0 !important;
}}
.{PAGE_CLASS} {{
  --ym-primary: #fc3f1d;
  --ym-accent: #8b5cf6;
}}
.fullscreen-white-office.alice-flash-hero {{
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}}
.{PAGE_CLASS} .ym-content-narrow {{
  max-width: 900px;
  margin: 0 auto;
}}
.{PAGE_CLASS} .ym-table-wrap {{
  overflow-x: auto;
  margin: 24px 0;
}}
.{PAGE_CLASS} .ym-table {{
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
}}
.{PAGE_CLASS} .ym-table th,
.{PAGE_CLASS} .ym-table td {{
  border: 1px solid var(--ym-border);
  padding: 12px 16px;
  text-align: left;
}}
.{PAGE_CLASS} .ym-table th {{
  background: #f1f5f9;
  font-weight: 700;
}}
.{PAGE_CLASS} .ym-kicker {{
  font-size: 13px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--ym-primary) !important;
  margin: 28px 0 12px;
}}
.{PAGE_CLASS} .ym-short {{
  background: linear-gradient(90deg, rgba(252,63,29,0.08), transparent);
  border-left: 4px solid var(--ym-primary);
  padding: 16px 20px;
  border-radius: 0 12px 12px 0;
  margin: 24px 0;
  font-weight: 600;
}}
.{PAGE_CLASS} .ym-pre {{
  background: var(--ym-code-bg);
  color: #e2e8f0 !important;
  padding: 20px;
  border-radius: 12px;
  font-family: 'Fira Code', monospace;
  font-size: 13px;
  line-height: 1.5;
  overflow-x: auto;
  margin: 24px 0;
  white-space: pre-wrap;
}}
/* Intro after hero */
.{PAGE_CLASS}-intro-grid {{
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}}
@media (min-width: 900px) {{
  .{PAGE_CLASS}-intro-grid {{
    grid-template-columns: 1.1fr 0.9fr;
  }}
}}
.{PAGE_CLASS}-intro-text {{
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}}
.{PAGE_CLASS}-intro-text p {{
  text-align: left !important;
}}
.{PAGE_CLASS}-intro-deco .ym-mac-window {{
  margin-bottom: 0;
}}
.{PAGE_CLASS} .ym-toc-wrap {{
  text-align: center;
  margin: 48px 0 24px;
}}
.{PAGE_CLASS} .ym-cta-panel {{
  background: linear-gradient(135deg, #fff7ed 0%, #ffffff 55%);
  border: 1px solid var(--ym-border);
  border-radius: 20px;
  padding: 36px 32px;
  text-align: center;
  box-shadow: var(--ym-shadow);
  margin: 48px 0;
}}
.{PAGE_CLASS} .ym-cta-panel h3 {{
  font-size: 24px;
  margin: 0 0 12px;
}}
.{PAGE_CLASS} .ym-cta-panel p {{
  max-width: 640px;
  margin: 0 auto 20px;
  color: #64748b !important;
}}
.{PAGE_CLASS} .ym-cta-trust {{
  font-size: 13px;
  color: #64748b !important;
  margin-top: 12px;
}}
.{PAGE_CLASS} .ym-cta-strip {{
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  padding: 28px 32px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 16px;
  margin: 40px 0;
}}
.{PAGE_CLASS} .telegram-button {{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 14px 28px;
  background: #0f172a;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  text-decoration: none;
  transition: transform 0.2s;
}}
.{PAGE_CLASS} .telegram-button:hover {{
  transform: translateY(-2px);
  color: #fff !important;
}}
.{PAGE_CLASS} .ym-partner-banner-slot {{
  display: none;
}}
"""
    return css + extra


def md_inline(s: str) -> str:
    s = re.sub(r"\*\*(.+?)\*\*", r"<strong>\1</strong>", s)
    s = re.sub(
        r"\[([^\]]+)\]\(([^)]+)\)",
        r'<a href="\2" rel="noopener noreferrer" target="_blank">\1</a>',
        s,
    )
    return s


def md_block(text: str) -> str:
    lines = text.strip().split("\n")
    out: list[str] = []
    i = 0
    while i < len(lines):
        line = lines[i]
        if line.startswith("|"):
            rows = []
            while i < len(lines) and lines[i].startswith("|"):
                row = [c.strip() for c in lines[i].strip("|").split("|")]
                rows.append(row)
                i += 1
            if len(rows) >= 2:
                header, body = rows[0], rows[2:] if "---" in rows[1][0] else rows[1:]
                if "---" in rows[1][0]:
                    body = rows[2:]
                html = ['<div class="ym-table-wrap reveal"><table class="ym-table">']
                html.append("<thead><tr>" + "".join(f"<th>{md_inline(c)}</th>" for c in header) + "</tr></thead><tbody>")
                for row in body:
                    html.append("<tr>" + "".join(f"<td>{md_inline(c)}</td>" for c in row) + "</tr>")
                html.append("</tbody></table></div>")
                out.append("\n".join(html))
            continue
        if line.startswith("```"):
            i += 1
            code_lines = []
            while i < len(lines) and not lines[i].startswith("```"):
                code_lines.append(lines[i])
                i += 1
            out.append(f'<pre class="ym-pre reveal">{"".join(code_lines)}</pre>')
            i += 1
            continue
        if line.startswith("**Коротко:**") or line.startswith("**Определение.**") or line.startswith("**Итог"):
            out.append(f'<p class="ym-short reveal">{md_inline(line)}</p>')
        elif line.startswith("- "):
            items = []
            while i < len(lines) and lines[i].startswith("- "):
                items.append(f"<li>{md_inline(lines[i][2:])}</li>")
                i += 1
            out.append('<ul class="reveal">' + "".join(items) + "</ul>")
            continue
        elif re.match(r"^\d+\.\s", line):
            items = []
            while i < len(lines) and re.match(r"^\d+\.\s", lines[i]):
                items.append(f"<li>{md_inline(re.sub(r'^\\d+\\.\\s*', '', lines[i]))}</li>")
                i += 1
            out.append('<ol class="reveal">' + "".join(items) + "</ol>")
            continue
        elif line.strip() == "---":
            pass
        elif line.strip():
            out.append(f'<p class="reveal">{md_inline(line)}</p>')
        i += 1
    return "\n".join(out)


def primary_cta_card() -> str:
    rel = ' rel="noopener noreferrer" target="_blank"' if PRIMARY_URL.startswith("http") else ""
    cls = "telegram-button" if "t.me" in PRIMARY_URL or "telegram" in PRIMARY_URL.lower() else "ym-btn ym-btn-primary"
    return f"""
<section id="cta-vnedrenie-flash" class="ym-section ym-section-alt" aria-label="Заявка на пилот">
  <div class="ym-container">
    <div class="ym-cta-panel reveal">
      <h3>Пилот Alice AI LLM Flash за 2–4 недели</h3>
      <p>Поддержка, модерация или RAG — с метриками и маршрутизацией моделей в Yandex AI Studio</p>
      <a class="{cls}" href="{PRIMARY_URL}"{rel}>{PRIMARY_LABEL}</a>
      <p class="ym-cta-trust">данные в РФ · без западных API</p>
    </div>
  </div>
</section>"""


def secondary_cta() -> str:
    rel = ' rel="noopener noreferrer" target="_blank"' if SECONDARY_URL.startswith("http") else ""
    return f"""
<div id="cta-obuchenie-ai-studio" class="ym-prompt-card reveal delay-100">
  <p class="ym-prompt-text">Команда уже подключает API сама? Пройдите обучение: AI Studio, промпты, shadow mode и лимиты API — чтобы не попасть в 70% неуспешных ИИ-проектов</p>
  <a class="ym-btn ym-btn-secondary" href="{SECONDARY_URL}"{rel}>{SECONDARY_LABEL}</a>
</div>"""


def primary_cta_strip() -> str:
    rel = ' rel="noopener noreferrer" target="_blank"' if PRIMARY_URL.startswith("http") else ""
    cls = "telegram-button" if "t.me" in PRIMARY_URL or "telegram" in PRIMARY_URL.lower() else "ym-btn ym-btn-primary"
    return f"""
<div id="cta-itog-zayavka" class="ym-cta-strip reveal">
  <div>
    <strong style="font-size:18px;color:#0f172a;">Готовы к пилоту на Alice AI LLM Flash?</strong>
    <p style="margin:8px 0 0;color:#64748b;">Обсудим задачи, метрики и маршрутизацию моделей в AI Studio</p>
  </div>
  <a class="{cls}" href="{PRIMARY_URL}"{rel}>{PRIMARY_LABEL}</a>
</div>"""


def intro_section() -> str:
    return f"""
<section class="ym-section {PAGE_CLASS}-intro">
  <div class="ym-container">
    <div class="{PAGE_CLASS}-intro-grid reveal">
      <div class="{PAGE_CLASS}-intro-text">
        <p>28 мая 2026 года Яндекс представил <strong>Alice AI LLM Flash</strong> — быструю языковую модель для корпоративных задач. Модель доступна в <strong>Yandex AI Studio</strong> на базе Yandex Cloud. Для российского бизнеса это не просто новость: по данным компании, около <strong>60%</strong> всех B2B-запросов к моделям Яндекса связаны с текстами и документами — поддержка, модерация, базы знаний, обработка обращений.</p>
        <p>Релиз совпал с конференцией <strong>AI2Business</strong> и закрывает запрос на <strong>предсказуемый бюджет</strong> и <strong>данные в РФ</strong> без западных API.</p>
        <p class="ym-short"><strong>Коротко:</strong> Alice AI LLM Flash — российская LLM под массовые текстовые операции; заявлена экономика «почти в 5 раз дешевле» прежних решений Яндекса и сопоставимость по цене с <strong>GPT-5.4 mini</strong> при работе в российском облаке.</p>
      </div>
      <div class="{PAGE_CLASS}-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">aliceai-llm-flash · Yandex AI Studio</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># пилот 2–4 недели</span><br>
            <span class="ym-command">POST</span> gpt://&lt;folder&gt;/aliceai-llm-flash<br>
            <span class="ym-comment">→ поддержка · документы · модерация</span><br>
            <span class="ym-command">RAG</span> регламенты + CRM + shadow mode<br>
            <span class="ym-comment">152-ФЗ · биллинг в ₽</span>
          </div>
        </div>
      </div>
    </div>
    <div class="ym-toc-wrap reveal delay-100">
      <nav class="ym-toc" aria-label="Оглавление">
        <a href="#chto-takoe-flash">Что такое Flash</a>
        <a href="#ai-studio-podklyuchenie">AI Studio</a>
        <a href="#keysy-b2b">Кейсы B2B</a>
        <a href="#dannye-152fz">152-ФЗ</a>
        <a href="#integracii-crm">Интеграции</a>
        <a href="#stoimost-vnedreniya">Стоимость</a>
        <a href="#faq-alice-flash">FAQ</a>
        <a href="#itog">Итог</a>
      </nav>
    </div>
  </div>
</section>"""


def parse_zhenya_sections() -> list[tuple[str, str, str, str]]:
    handoff = (ROOT / ".cursor/nero-network-handoff.md").read_text(encoding="utf-8")
    m = re.search(r"=== ЖЕНЯ \(ЛОНГРИД\) ===.*?### Полный текст\n(.*?)\n\n### GEO-чеклист", handoff, re.DOTALL)
    if not m:
        raise ValueError("Zhenya content not found")
    body = m.group(1)
    # skip intro already in intro_section (until first ##)
    first_h2 = body.find("\n## ")
    body = body[first_h2 + 1 :]

    anchor_map = {
        "Что такое Alice AI LLM Flash": "chto-takoe-flash",
        "Yandex AI Studio: как подключить": "ai-studio-podklyuchenie",
        "Кейсы для B2B": "keysy-b2b",
        "Данные в России": "dannye-152fz",
        "Интеграции": "integracii-crm",
        "Стоимость внедрения": "stoimost-vnedreniya",
        "FAQ по Alice AI LLM Flash": "faq-alice-flash",
        "Итог": "itog",
    }

    parts = re.split(r"\n(?=## )", body)
    sections = []
    for part in parts:
        if not part.strip():
            continue
        lines = part.split("\n", 1)
        h2_line = lines[0].replace("## ", "").strip()
        rest = lines[1] if len(lines) > 1 else ""
        anchor = "section"
        for key, aid in anchor_map.items():
            if key in h2_line:
                anchor = aid
                break
        sections.append((anchor, h2_line, rest, part))
    return sections


def render_section(anchor: str, title: str, content: str, alt: bool) -> str:
    alt_cls = " ym-section-alt" if alt else ""
    html = f"""
<section id="{anchor}" class="ym-section{alt_cls}">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">{md_inline(title)}</h2>
"""
    chunks = re.split(r"\n(?=### )", content)
    for chunk in chunks:
        chunk = chunk.strip()
        if not chunk:
            continue
        if chunk.startswith("### "):
            h3_title, _, h3_body = chunk.partition("\n")
            h3_title = h3_title.replace("### ", "").strip()
            html += f'    <h3 class="ym-kicker reveal">{md_inline(h3_title)}</h3>\n'
            html += "    " + md_block(h3_body).replace("\n", "\n    ") + "\n"
        else:
            html += "    " + md_block(chunk).replace("\n", "\n    ") + "\n"
    html += "  </div>\n</section>"
    return html


def faq_section(content: str) -> str:
    items = re.findall(r"\*\*(.+?)\*\*\s*\n(.+?)(?=\n\n\*\*|\Z)", content, re.DOTALL)
    faq_html = []
    faq_ld = []
    for q, a in items:
        q_clean = q.strip()
        a_html = md_inline(a.strip())
        faq_id = re.sub(r"[^a-z0-9]+", "-", q_clean.lower())[:40].strip("-")
        faq_html.append(
            f'<article class="ym-faq-item reveal" id="faq-{faq_id}">'
            f"<h3>{md_inline(q_clean)}</h3><p>{a_html}</p></article>"
        )
        faq_ld.append({"@type": "Question", "name": q_clean, "acceptedAnswer": {"@type": "Answer", "text": re.sub(r"<[^>]+>", "", a_html)}})

    sidebar = "".join(
        f'<li><a href="#faq-{re.sub(r"[^a-z0-9]+", "-", q.strip().lower())[:40].strip("-")}">{md_inline(q.strip())}</a></li>'
        for q, _ in items
    )
    return f"""
<section id="faq-alice-flash" class="ym-section ym-section-alt">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по Alice AI LLM Flash для бизнеса</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <p style="font-weight:700;margin:0 0 16px;color:#0f172a;">Вопросы</p>
        <ul class="ym-faq-list">{sidebar}</ul>
      </aside>
      <div class="ym-faq-content">{"".join(faq_html)}</div>
    </div>
  </div>
</section>""", faq_ld


def reveal_script() -> str:
    return (ROOT / "shared/longread-page-reveal.js").read_text(encoding="utf-8")


def json_ld(faq_entities: list) -> str:
    data = {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Article",
                "headline": SEO_TITLE,
                "description": SEO_DESC,
                "url": PAGE_URL,
                "inLanguage": "ru-RU",
                "author": {"@type": "Organization", "name": "Nero Network"},
                "about": "Alice AI LLM Flash, Yandex AI Studio, внедрение нейросети для бизнеса",
            },
            {
                "@type": "SoftwareApplication",
                "name": "Alice AI LLM Flash",
                "applicationCategory": "BusinessApplication",
                "operatingSystem": "Yandex Cloud",
                "offers": {"@type": "Offer", "priceCurrency": "RUB"},
            },
            {
                "@type": "FAQPage",
                "mainEntity": faq_entities,
            },
        ],
    }
    return json.dumps(data, ensure_ascii=False, indent=2)


def build_page_html() -> str:
    hero = patch_hero_cta(extract_codeblock(ROOT / ".cursor/nero-network-fragments/alina.md"))
    boris = extract_codeblock(ROOT / ".cursor/nero-network-fragments/boris.md")
    css = load_css()
    sections = parse_zhenya_sections()

    parts = [f"<style>\n{css}\n</style>"]
    parts.append(
        f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">'
    )
    parts.append(hero)
    parts.append(intro_section())

    alt_toggle = False
    faq_ld: list = []
    for anchor, title, content, _ in sections:
        if anchor == "faq-alice-flash":
            continue
        if anchor == "itog":
            parts.append(render_section(anchor, title, content, alt_toggle))
            parts.append(primary_cta_strip())
            alt_toggle = not alt_toggle
            continue

        parts.append(render_section(anchor, title, content, alt_toggle))
        alt_toggle = not alt_toggle

        if anchor == "ai-studio-podklyuchenie":
            parts.append(boris)

        if anchor == "keysy-b2b":
            parts.append(primary_cta_card())

        if anchor == "stoimost-vnedreniya":
            # inject secondary CTA before checklist H3 — re-render handled in content
            pass

    # FAQ + itog order: render FAQ after itog block already added; find FAQ section
    for anchor, title, content, _ in sections:
        if anchor == "faq-alice-flash":
            faq_html, faq_ld = faq_section(content)
            parts.append(faq_html)

    parts.append(
        '<!-- AD_BANNER slot: env AD_BANNER_URL / AD_BANNER_IMAGE_URL не заданы — баннер не вставлен -->'
    )
    parts.append("</main>")

    # Secondary CTA injection into stoimost section content — done via string replace
    page = "\n".join(parts)
    marker = '<h3 class="ym-kicker reveal">Чек-лист готовности компании к внедрению</h3>'
    if marker in page:
        page = page.replace(marker, secondary_cta() + "\n    " + marker, 1)

    page += f"\n<script>\n{reveal_script()}\n</script>\n"
    page += f'<script type="application/ld+json">\n{json_ld(faq_ld)}\n</script>\n'
    return page


def build_php(page_html: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    return f"""<?php
/**
 * Template Name: Alice AI LLM Flash для бизнеса
 * Description: Лонгрид — внедрение Alice AI LLM Flash в Yandex AI Studio
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
{page_html}
<?php get_footer(); ?>
"""


def update_handoff(page_html: str) -> None:
    handoff_path = ROOT / ".cursor/nero-network-handoff.md"
    text = handoff_path.read_text(encoding="utf-8")
    block = f"""=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

## Структура
- Hero Алины `#alice-ai-studio-hero` (canvas `alice-flash-studio-hero-canvas`)
- Введение + `.ym-toc`
- Секции: #chto-takoe-flash → #ai-studio-podklyuchenie → блок Бориса → #keysy-b2b → CTA primary → #dannye-152fz → #integracii-crm → #stoimost-vnedreniya → #itog → CTA strip → #faq-alice-flash
- Reveal + JSON-LD (Article, SoftwareApplication, FAQPage)

{page_html}

## Передача Юре
SLUG: {SLUG}
Контент содержит <script> (hero engine + boris router + reveal) и <canvas> (2 шт.). Обязательно обернуть в <!-- wp:html --> при публикации.
Файл темы: wordpress-theme/page-{SLUG}.php
"""
    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in text:
        text = re.sub(
            r"=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            block,
            text,
            flags=re.DOTALL,
        )
    else:
        text = text.rstrip() + "\n\n" + block
    handoff_path.write_text(text, encoding="utf-8")


def main() -> None:
    page_html = build_page_html()
    php_path = ROOT / "wordpress-theme" / f"page-{SLUG}.php"
    php_path.parent.mkdir(parents=True, exist_ok=True)
    php_path.write_text(build_php(page_html), encoding="utf-8")
    update_handoff(page_html)
    size_kb = len(page_html.encode("utf-8")) / 1024
    has_canvas = "<canvas" in page_html
    print(f"HTML_SIZE_KB={size_kb:.1f}")
    print(f"PHP_PATH={php_path}")
    print(f"HAS_CANVAS={has_canvas}")
    print(f"CANVAS_COUNT={page_html.count('<canvas')}")


if __name__ == "__main__":
    main()
