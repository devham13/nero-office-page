#!/usr/bin/env python3
"""Assemble Natasha page HTML for zip-mcp-superagenty-governed-ai-zakupki."""
from __future__ import annotations

import os
import re
from pathlib import Path

import markdown
from markdown.extensions.tables import TableExtension

ROOT = Path(__file__).resolve().parents[1]
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme" / "page-zip-mcp-superagenty-governed-ai-zakupki.php"
OUT_HTML = ROOT / ".cursor" / "natasha-page-html.tmp"

SLUG = "zip-mcp-superagenty-governed-ai-zakupki"
PAGE_CLASS = f"{SLUG}-page"

PRIMARY_URL = os.environ.get("PRIMARY_CTA_URL", "#contact")
PRIMARY_LABEL = os.environ.get("PRIMARY_CTA_LABEL", "Обсудить governed MCP")
SECONDARY_URL = os.environ.get("SECONDARY_CTA_URL", "#")
SECONDARY_LABEL = os.environ.get("SECONDARY_CTA_LABEL", "Курс по Make и MCP")

SEO_TITLE = "Zip Superagents и MCP: AI-агенты для закупок с аудитом"
SEO_DESC = (
    "Кейс Zip 2 июня 2026: пять Superagents и enterprise MCP к Claude и ChatGPT "
    "с OAuth и audit trail. Как внедрить governed AI для закупок, договоров и CRM "
    "в РФ без утечек в личный ChatGPT."
)

SECTIONS = [
    ("zip-announce", "Что анонсировал Zip 2 июня 2026: Superagents и procurement-native MCP"),
    ("mcp-explained", "Что такое MCP и зачем он бизнесу вместо «ещё одной интеграции»"),
    ("shadow-ai", "Почему финансы и закупки грузят договоры в личный ChatGPT — и чем это грозит"),
    ("governed-ai", "Governed AI: OAuth, RBAC, audit trail и human-in-the-loop"),
    ("zip-architecture", "Архитектура Zip: orchestration layer, LangGraph и чем отличается от SAP Joule / Coupa"),
    ("zip-cases", "Кейсы и цифры: Block, UCI Health, Forrester ROI — что можно цитировать честно"),
    ("rf-stack", "Как повторить governed-слой в России: MCP к Bitrix, amoCRM, 1С, Make и n8n"),
    ("implementation-plan", "Пошаговый план внедрения MCP + агентов для закупок и договоров"),
    ("faq", "FAQ: Claude и ChatGPT, безопасность, стоимость, поддержка Nero Network"),
]

FAQ_ITEMS = [
    ("faq-mcp-one", "Что такое MCP в одном предложении?", "Открытый протокол, чтобы AI-ассистенты вызывали корпоративные инструменты по правилам компании, с единым <strong>mcp сервер</strong> вместо ручной загрузки файлов в чат."),
    ("faq-claude-chatgpt", "Claude или ChatGPT — что выбрать как MCP-клиент?", "Оба поддерживаются экосистемой; Zip отдаёт <strong>vendor-hosted MCP</strong> сразу к обоим. В РФ выбор зависит от <strong>контура данных</strong>, договора с вендором и доступности API, не от модного бренда. Технически важнее <strong>oauth mcp</strong> и scope, чем логотип клиента."),
    ("faq-mcp-per-dept", "Нужен ли отдельный MCP на каждый отдел?", "Обычно — <strong>один gateway</strong>, разные RBAC-роли и наборы tools. Отдельные серверы оправданы при жёстком разделении контуров (холдинг, ГОЗ, медданные)."),
    ("faq-make-n8n", "Make/n8n vs «голый» чат-бот", "Чат без MCP повторяет <strong>теневой</strong> сценарий: файлы уходят в облако модели. <strong>Make com mcp</strong> / <strong>n8n mcp</strong> дают оркестрацию, логи, повторяемые сценарии и стык с 1С/CRM — ближе к Zip orchestration, чем к промпту в браузере."),
    ("faq-sdk-compliance", "Почему 97M загрузок MCP SDK не означают готовность к SOX/152-ФЗ?", "SDK — про разработку клиентов; compliance — про ваши политики, DLP, договоры, <strong>human in the loop ai</strong> и хранение журналов."),
    ("faq-roi-386", "Можно ли обещать клиенту 386% ROI как у Zip?", 'Нет, если только вы не провели свой TEI. Цифра Forrester — <strong>composite</strong> для крупного enterprise на платформе Zip (<a href="https://zip.com/resources/forrester-total-economic-impact-zip" target="_blank" rel="noopener noreferrer">источник</a>).'),
    ("faq-nero", "Кто помогает собрать governed MCP в России?", "Интеграторы уровня <strong>Nero Network</strong> (Make, n8n, Cursor, агенты): аудит теневого ИИ, gateway, пилот к Bitrix/amoCRM/1С, обучение закупок. Zip используйте как <strong>архитектурный референс</strong>, не как поставщика лицензии."),
    ("faq-start-tomorrow", "С чего начать завтра без бюджета «как у Unicorn»?", "Запретить загрузку исходников договоров с ПДн в публичный ChatGPT, запустить <strong>один</strong> MCP-read-only к справочнику поставщиков или статусам заявок, назначить владельца политики ИИ."),
]


def extract_codeblock(text: str, marker: str) -> str:
    start = text.find(marker)
    if start == -1:
        raise ValueError(f"Marker not found: {marker}")
    rest = text[start:]
    m = re.search(r"```html\n(.*?)```", rest, re.DOTALL)
    if not m:
        m = re.search(r"```\n(.*?)```", rest, re.DOTALL)
    if not m:
        raise ValueError(f"No html block after {marker}")
    return m.group(1).strip()


def extract_zhenya_markdown(handoff: str) -> str:
    m = re.search(
        r"=== ЖЕНЯ \(ЛОНГРИД\) ===.*?### Полный текст\n(.*?)\n### GEO-чеклист",
        handoff,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Zhenya full text not found")
    return m.group(1).strip()


def split_sections(md: str) -> dict[str, str]:
    parts: dict[str, str] = {}
    chunks = re.split(r"\n## ", md)
    for chunk in chunks:
        if not chunk.strip():
            continue
        lines = chunk.split("\n", 1)
        title = lines[0].strip()
        body = lines[1].strip() if len(lines) > 1 else ""
        for sid, stitle in SECTIONS:
            if title == stitle:
                parts[sid] = body
                break
    return parts


def md_to_html(md: str) -> str:
    return markdown.markdown(
        md,
        extensions=["extra", TableExtension()],
        output_format="html5",
    )


def external_link_attrs(html: str) -> str:
    def repl(m: re.Match[str]) -> str:
        tag = m.group(0)
        if 'target="_blank"' in tag:
            return tag
        if 'href="http' in tag and 'rel=' not in tag:
            return tag.replace("<a ", '<a target="_blank" rel="noopener noreferrer" ', 1)
        return tag

    return re.sub(r"<a [^>]+>", repl, html)


def adapt_css(css: str) -> str:
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace("--ym-primary: #ff0000", "--ym-primary: #0ea5e9")
    css = css.replace("--ym-accent: #3b82f6", "--ym-accent: #6366f1")
    return css


def hero_cta_replace(hero: str) -> str:
    hero = hero.replace('href="#contact"', f'href="{PRIMARY_URL}"')
    hero = re.sub(
        r'(<a class="telegram-button"[^>]*>)(.*?)(</a>)',
        rf"\1{PRIMARY_LABEL}\3",
        hero,
        count=1,
    )
    if 'target="_blank"' not in hero and PRIMARY_URL.startswith("http"):
        hero = hero.replace(
            f'href="{PRIMARY_URL}"',
            f'href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"',
        )
    return hero


def cta_primary() -> str:
    return f"""<aside class="ym-cta-block reveal" aria-label="Призыв к действию">
  <div class="ym-container">
    <div class="ym-card" style="text-align:center; border-color: rgba(14,165,233,0.2);">
      <p style="font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ym-primary) !important; font-weight: 600; margin: 0 0 12px;">Nero Network</p>
      <h3 style="font-size: 24px; margin-bottom: 12px;">Нужен governed MCP под закупки, 1С и CRM?</h3>
      <p style="max-width: 640px; margin: 0 auto 24px;">Аудит теневого ИИ, self-hosted gateway, пилот Superagent-аналога на Bitrix/amoCRM/1С — без утечки договоров в личный ChatGPT.</p>
      <div class="ym-btn-group" style="justify-content: center;">
        <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
      </div>
    </div>
  </div>
</aside>"""


def cta_secondary() -> str:
    return f"""<aside class="ym-cta-block ym-cta-block--secondary reveal delay-100" aria-label="Обучение по автоматизации">
  <div class="ym-container">
    <div class="ym-card" style="padding: 28px 32px;">
      <h3 style="font-size: 20px; margin-bottom: 10px;">Освоить Make, n8n и MCP на практике</h3>
      <p style="margin-bottom: 16px;">Перед масштабированием пилота полезно пройти структурированное обучение: сценарии оркестрации, OAuth-scopes и отладка агентов без «голого» чата.</p>
      <a class="ym-btn ym-btn-secondary" href="{SECONDARY_URL}" target="_blank" rel="noopener noreferrer">{SECONDARY_LABEL}</a>
    </div>
  </div>
</aside>"""


def intro_block() -> str:
    return f"""<section class="ym-section {PAGE_CLASS}-intro-section reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="{PAGE_CLASS}-intro-grid">
      <div class="{PAGE_CLASS}-intro-text">
        <p class="{PAGE_CLASS}-intro-lead">Zip 2 июня 2026 показал, как <strong>ai агенты для бизнеса</strong> в закупках работают не в личном ChatGPT, а через <strong>enterprise MCP</strong> с OAuth, RBAC и полным audit trail. Ниже — разбор протокола, governance и пошаговый план для российского стека Bitrix, 1С, Make и n8n.</p>
        <p>Лонгрид для CFO, закупок, IT и интеграторов: от новости Superagents до практики <strong>внедрения ai в компанию</strong> без утечки договоров в теневой чат.</p>
      </div>
      <div class="{PAGE_CLASS}-intro-deco" aria-hidden="true">
        <div class="ym-mac-window reveal-scale delay-200">
          <div class="ym-mac-header">
            <span class="ym-mac-dot red"></span>
            <span class="ym-mac-dot yellow"></span>
            <span class="ym-mac-dot green"></span>
            <span style="margin-left:8px;font-size:12px;color:#94a3b8;">governed-mcp-pipeline</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-command">audit: tool.supplier.lookup → OK</div>
            <div class="ym-command">oauth: scope=read_requests</div>
            <div class="ym-comment"># Superagents: Intake → Contract → AP</div>
            <div class="ym-command">hitl: legal_review pending</div>
            <div class="ym-comment"># 152-ФЗ: DLP before public LLM</div>
          </div>
        </div>
        <div class="{PAGE_CLASS}-intro-chips">
          <span>OAuth</span><span>RBAC</span><span>Audit trail</span><span>MCP gateway</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      {''.join(f'<a href="#{sid}">{title.split(":")[0] if ":" in title else title[:42]}</a>' for sid, title in SECTIONS)}
    </nav>
  </div>
</section>"""


def section_html(sid: str, title: str, body_html: str, alt: bool = False) -> str:
    cls = "ym-section-alt" if alt else "ym-section"
    return f"""<section id="{sid}" class="{cls} reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">{title}</h2>
    <div class="ym-prose">{body_html}</div>
  </div>
</section>"""


def faq_html() -> str:
    items = "\n".join(
        f"""        <article id="{fid}" class="ym-faq-item reveal">
          <h3>{q}</h3>
          <p>{a}</p>
        </article>"""
        for fid, q, a in FAQ_ITEMS
    )
    nav = "\n".join(f'          <li><a href="#{fid}">{q}</a></li>' for fid, q, _ in FAQ_ITEMS)
    return f"""<section id="faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ: Claude и ChatGPT, безопасность, стоимость, поддержка Nero Network</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <p class="ym-section-subtitle" style="text-align:left;margin-bottom:16px;">Быстрые ответы</p>
        <ul class="ym-faq-list">
{nav}
        </ul>
      </aside>
      <div class="ym-faq-content">
{items}
      </div>
    </div>
  </div>
</section>"""


def extra_styles() -> str:
    return f"""
#zip-governed-hero-section,
.zip-governed-hero.fullscreen-white-office {{
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}}
#primary, .site-main, .site-content, #content, .content-area {{
  padding-top: 0 !important;
  margin-top: 0 !important;
}}
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section {{ display: none !important; }}

.{PAGE_CLASS} .ym-prose {{ max-width: 900px; margin: 0 auto; text-align: left; }}
.{PAGE_CLASS} .ym-prose h3 {{ margin-top: 2rem; font-size: 1.35rem; }}
.{PAGE_CLASS} .ym-prose table {{ width: 100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 15px; }}
.{PAGE_CLASS} .ym-prose th, .{PAGE_CLASS} .ym-prose td {{ border: 1px solid var(--ym-border); padding: 10px 14px; text-align: left; }}
.{PAGE_CLASS} .ym-prose th {{ background: #f1f5f9; }}
.{PAGE_CLASS} .ym-prose hr {{ border: none; border-top: 1px solid var(--ym-border); margin: 2rem 0; }}
.{PAGE_CLASS} .ym-prose a {{ color: var(--ym-accent); }}
.{PAGE_CLASS} .ym-prose code {{ background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.9em; }}
.{PAGE_CLASS} .ym-prose pre {{ background: var(--ym-code-bg); color: #e2e8f0; padding: 16px; border-radius: 12px; overflow-x: auto; }}
.{PAGE_CLASS} .ym-prose pre code {{ background: transparent; color: inherit; }}

.{PAGE_CLASS}-intro-grid {{
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr);
  gap: 40px;
  align-items: start;
  margin-bottom: 48px;
}}
.{PAGE_CLASS}-intro-text {{
  text-align: left !important;
  border-left: 4px solid;
  border-image: linear-gradient(180deg, #0ea5e9, #6366f1) 1;
  padding-left: 24px;
}}
.{PAGE_CLASS}-intro-text p {{
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}}
.{PAGE_CLASS}-intro-lead {{ font-size: 19px !important; font-weight: 500; }}
.{PAGE_CLASS}-intro-chips {{
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 16px;
}}
.{PAGE_CLASS}-intro-chips span {{
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: #fff;
  border: 1px solid var(--ym-border);
  color: #0f172a !important;
}}
.{PAGE_CLASS} .ym-cta-block {{ margin: 48px 0; }}
.{PAGE_CLASS} .ym-cta-block--secondary .ym-card {{ border-left: 4px solid var(--ym-accent); }}
@media (max-width: 900px) {{
  .{PAGE_CLASS}-intro-grid {{ grid-template-columns: 1fr; }}
}}
"""


def json_ld() -> str:
    faq_entities = [
        {"@type": "Question", "name": q, "acceptedAnswer": {"@type": "Answer", "text": re.sub(r"<[^>]+>", "", a)}}
        for _, q, a in FAQ_ITEMS
    ]
    import json

    article = {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": SEO_TITLE,
        "description": SEO_DESC,
        "author": {"@type": "Organization", "name": "Nero Network"},
        "datePublished": "2026-06-03",
        "inLanguage": "ru-RU",
    }
    faq = {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": faq_entities}
    return (
        f'<script type="application/ld+json">{json.dumps(article, ensure_ascii=False)}</script>\n'
        f'<script type="application/ld+json">{json.dumps(faq, ensure_ascii=False)}</script>'
    )


def build_page_html(handoff: str) -> str:
    hero = extract_codeblock(handoff, "=== АЛИНА (HERO) ===")
    boris = extract_codeblock(handoff, "=== БОРИС (БЛОК СТАТЬИ")
    hero = hero_cta_replace(hero)

    zhenya_md = extract_zhenya_markdown(handoff)
    bodies = split_sections(zhenya_md)

    css = adapt_css(CSS_REF.read_text(encoding="utf-8"))
    reveal = REVEAL_JS.read_text(encoding="utf-8")

    parts = [
        "<style>",
        css,
        extra_styles(),
        "</style>",
        f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">',
        hero,
        intro_block(),
    ]

    for i, (sid, title) in enumerate(SECTIONS):
        if sid == "faq":
            continue
        body = bodies.get(sid, "")
        html = external_link_attrs(md_to_html(body)) if body else f"<p>Контент секции «{title}».</p>"
        parts.append(section_html(sid, title, html, alt=(i % 2 == 1)))
        if sid == "mcp-explained":
            parts.append(boris)
        if sid == "rf-stack":
            parts.append(cta_primary())
        if sid == "implementation-plan":
            parts.append(cta_secondary())

    parts.append(faq_html())
    parts.append(cta_primary().replace('class="ym-cta-block reveal"', 'class="ym-cta-block ym-cta-block--final reveal"'))
    parts.append("</main>")
    parts.append(f"<script>\n{reveal}\n</script>")
    parts.append(json_ld())
    return "\n\n".join(parts)


def build_php(page_html: str) -> str:
  esc_title = SEO_TITLE.replace("'", "\\'")
  esc_desc = SEO_DESC.replace("'", "\\'")
  return f"""<?php
/**
 * Template Name: Zip Superagents и MCP — governed AI для закупок
 * Description: Лонгрид Nero Network Office — Zip Superagents, MCP, governance.
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

<?php
get_footer();
"""


def update_handoff(page_html: str) -> None:
    text = HANDOFF.read_text(encoding="utf-8")
    block = f"""=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
Размер HTML (байт): {len(page_html.encode('utf-8'))}

**Структура:** hero Алины → intro+TOC → 8 секций лонгрида → блок Бориса после H2 MCP → CTA Артура (×3) → FAQ → JSON-LD Article+FAQPage → reveal.js

ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

{page_html}

## Передача Юре
SLUG: {SLUG}
Файл шаблона: wordpress-theme/page-{SLUG}.php
Контент содержит <script> (hero engine + boris canvas + reveal) и <canvas>. Публиковать как page-{SLUG}.php в активную тему.
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
    HANDOFF.write_text(text, encoding="utf-8")


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    page_html = build_page_html(handoff)
    OUT_HTML.write_text(page_html, encoding="utf-8")
    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(build_php(page_html), encoding="utf-8")
    update_handoff(page_html)
    size = len(page_html.encode("utf-8"))
    print(f"HTML bytes: {size}")
    print(f"PHP: {OUT_PHP}")
    print(f"Handoff updated")


if __name__ == "__main__":
    main()
