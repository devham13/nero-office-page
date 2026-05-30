#!/usr/bin/env python3
"""Build page-copilot-computer-use-mcp-agenty-bez-api.php from handoff."""
from __future__ import annotations

import json
import re
from pathlib import Path

import markdown
from markdown.extensions import tables, fenced_code, nl2br

ROOT = Path(__file__).resolve().parents[1]
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme" / "page-copilot-computer-use-mcp-agenty-bez-api.php"
SLUG = "copilot-computer-use-mcp-agenty-bez-api"
PAGE_CLASS = f"{SLUG}-page"

SEO_TITLE = "Computer-using агенты Copilot и MCP — автоматизация без API"
SEO_DESC = (
    "Microsoft открыл GA UI-агентов и federated MCP в M365 Copilot. "
    "Как автоматизировать 1С и CRM без API, чем отличается от RPA и что делать в РФ с Make и Cursor."
)

INTRO_LEAD = (
    "В мае 2026 Microsoft вывела в GA «агентов с компьютерным зрением» в Copilot Studio "
    "и расширила federated MCP-коннекторы в Microsoft 365 Copilot. Вместе это закрывает две боли SMB: "
    "legacy без API (UI) и live-данные из SaaS без индексации в облако Microsoft."
)
INTRO_SUB = (
    "Для российского бизнеса прямой стек M365 не всегда доступен — ниже разбор фактов, TCO, "
    "безопасности и практичного аналога на Make, Cursor и MCP."
)

SECTION_MAP = [
    ("may-2026-ga-mcp", "Что изменилось в мае 2026: computer-using agents (GA) и MCP-коннекторы"),
    ("computer-using-agents", "Computer-using agents: как работают «агенты с компьютерным зрением»"),
    ("federated-mcp", "Federated MCP-коннекторы: live-данные HubSpot, Notion и legacy"),
    ("copilot-vs-make", "Copilot Studio vs Make, n8n и Cursor для российского SMB"),
    ("security-dlp-hitl", "Безопасность, DLP и human-in-the-loop"),
    ("russia-context", "Российский контекст: альтернативы и что повторить без M365"),
    ("implementation-steps", "Пошаговое внедрение: аудит процесса, пилот, масштабирование"),
    ("faq", "FAQ"),
    ("itog", "Итог"),
]

CTA_PRIMARY = """<aside class="ym-cta-block reveal" id="cta-primary-audit" aria-labelledby="cta-primary-audit-title">
  <div class="ym-container">
    <div class="ym-card" style="padding: clamp(28px, 4vw, 40px); border-left: 4px solid var(--ym-primary);">
      <h3 id="cta-primary-audit-title" class="ym-section-title" style="font-size: clamp(22px, 3vw, 28px); text-align: left; margin-bottom: 12px;">Аудит процесса «без API» под ваш стек</h3>
      <p style="margin: 0 0 20px; color: var(--ym-text); line-height: 1.6;">Разберём один процесс: где хватит <strong>MCP</strong>, где нужен UI-агент или browser automation, где обязателен <strong>human-in-the-loop</strong>. Пилот в периметре РФ — без обязательного M365.</p>
      <div class="ym-btn-group" style="justify-content: flex-start;">
        <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer"><span>${PRIMARY_CTA_LABEL}</span></a>
      </div>
    </div>
  </div>
</aside>"""

CTA_SECONDARY = """<aside class="ym-cta-block reveal" id="cta-secondary-training" aria-labelledby="cta-secondary-training-title">
  <div class="ym-container">
    <div class="ym-card" style="padding: clamp(24px, 3vw, 32px); background: var(--ym-bg);">
      <h3 id="cta-secondary-training-title" style="font-size: 20px; font-weight: 700; margin: 0 0 10px; color: var(--ym-heading);">Освоить Make, Cursor и MCP на практике</h3>
      <p style="margin: 0 0 16px; color: var(--ym-text); line-height: 1.6;">Если команда хочет не только заказать внедрение, но и <strong>внедрение ai агентов</strong> своими силами — начните с обучающей программы по автоматизации и no-code.</p>
      <p style="margin: 0;"><a class="ym-btn ym-btn-secondary" href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">${SECONDARY_CTA_LABEL}</a></p>
    </div>
  </div>
</aside>"""

AD_BANNER = """<!-- AD_BANNER: env not set — hidden until AD_BANNER_* secrets -->
<aside class="ym-ad-banner reveal" aria-label="Рекламный баннер партнёра" hidden>
  <div class="ym-container" style="text-align: center; padding: 24px 0 48px;">
    <a href="${AD_BANNER_URL}" target="_blank" rel="noopener noreferrer">
      <img src="${AD_BANNER_IMAGE_URL}" width="970" height="90" alt="${AD_BANNER_ALT}" loading="lazy" decoding="async" style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
    </a>
  </div>
</aside>"""

FAQ_ITEMS = [
    ("faq-1", "Что такое computer-using agent в Copilot Studio?", "ИИ-агент с инструментом Computer use: vision, рассуждение и управление UI в браузере и Windows. GA с 13.05.2026 в коммерческих регионах Power Platform."),
    ("faq-2", "Чем computer use отличается от RPA?", "RPA опирается на селекторы и жёсткие сценарии; computer use адаптируется к изменениям UI и неструктурированному входу за счёт моделей (CUA, Claude)."),
    ("faq-3", "Сколько стоит один шаг computer use?", "5 Copilot Credits (standard) или 15 (premium Opus). Пакет 25 000 credits ≈ $200/мес."),
    ("faq-4", "Что такое federated MCP в M365 Copilot?", "Подключение по MCP без индексации данных в M365; read-only запросы в runtime с правами пользователя."),
    ("faq-5", "Какие MCP-коннекторы опубликовал Microsoft?", "Canva, Google Calendar/Contacts, HubSpot, Intercom, Linear, LSEG, Moody's, Notion (список Learn, 30.04.2026)."),
    ("faq-6", "Можно ли автоматизировать 1С без API?", "Да: либо computer use (UI), либо MCP там, где есть API метаданных, либо гибрид. Это разные слои — не путайте «клик в клиенте» и «запрос к базе через MCP»."),
    ("faq-7", "Подходит ли Copilot Studio российскому SMB?", "Зависит от лицензий M365, бюджета на credits и ИБ. Часто рациональнее пилот на Make/Cursor/MCP с тем же процессным дизайном."),
    ("faq-8", "Что такое A2A в Copilot Studio?", "Agent-to-agent: агенты делегируют задачи друг другу; в блоге Microsoft (май 2026) — GA в Studio. Work IQ API для внешних разработчиков — preview."),
    ("faq-9", "Безопасно ли давать агенту пароли?", "Используйте Key Vault, выделенные УЗ, allow-list, Cloud PC pools и HITL; проверяйте поддержку вашего типа приложения в Learn."),
    ("faq-10", "Есть ли в России аналог computer use GA?", "На май 2026 у GigaCowork и MWS заявлены MCP и оркестрация, но не GA UI-automation уровня Microsoft. Alice Flash — модель, не UI-агент."),
    ("faq-11", "Что анонсировали на Build 2026?", "Windows Agent Runtime (preview): text agents в 2026, vision/UI — в roadmap 2027. Это не замена уже GA Copilot Studio computer use."),
    ("faq-12", "С чего начать внедрение ai агентов в компанию?", "Аудит одного процесса: API / MCP / только UI / почта → пилот с метриками и HITL → политики ИБ и cost model."),
]


def extract_block(text: str, marker: str, next_marker: str | None = None) -> str:
    start = text.find(marker)
    if start < 0:
        raise ValueError(f"Marker not found: {marker}")
    start = text.find("\n", start) + 1
    if next_marker:
        end = text.find(next_marker, start)
        if end < 0:
            end = len(text)
    else:
        end = len(text)
    return text[start:end]


def extract_hero(handoff: str) -> str:
    m = re.search(
        r"(<section class=\"copilot-mcp-hero.*?</script>\s*)",
        handoff,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Hero block not found")
    return m.group(1).strip()


def extract_boris(handoff: str) -> str:
    m = re.search(r"```html\n(<section class=\"boris-article-viz.*?</section>)\n```", handoff, re.DOTALL)
    if not m:
        raise ValueError("Boris block not found")
    return m.group(1).strip()


def extract_artur_body(handoff: str) -> str:
    block = extract_block(handoff, "=== АРТУР (CTA И РЕКЛАМА) ===", "=== АЛИНА (HERO) ===")
    m = re.search(r"### Полный текст\n\n(.*?)### Рекламные вставки", block, re.DOTALL)
    if not m:
        raise ValueError("Artur full text not found")
    return m.group(1).strip()


def page_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace("--ym-primary: #ff0000", "--ym-primary: #0078d4")
    css = css.replace("--ym-shadow-lg: 0 20px 40px -10px rgba(255, 0, 0, 0.15)", "--ym-shadow-lg: 0 20px 40px -10px rgba(0, 120, 212, 0.15)")
    css = css.replace("rgba(255, 0, 0, 0.2)", "rgba(0, 120, 212, 0.2)")
    css = css.replace("#ff0000", "#0078d4")
    css = css.replace("#e60000", "#106ebe")
    extra = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
.copilot-mcp-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.copilot-computer-use-intro {
  padding: 72px 0 32px;
  background: var(--ym-bg);
}
.copilot-computer-use-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 900px) {
  .copilot-computer-use-intro-grid {
    grid-template-columns: 1.1fr 0.9fr;
    gap: 48px;
  }
}
.copilot-computer-use-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.copilot-computer-use-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.copilot-computer-use-intro-lead {
  font-size: 19px !important;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.copilot-computer-use-intro-deco .ym-mac-window { margin-bottom: 0; }
.copilot-computer-use-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.copilot-computer-use-kpi-chips span {
  padding: 8px 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.ym-content-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; color: var(--ym-heading) !important; }
.ym-content-prose h4 { font-size: 18px; font-weight: 700; margin: 24px 0 12px; }
.ym-content-prose p { margin: 0 0 16px; line-height: 1.65; }
.ym-content-prose ul, .ym-content-prose ol { margin: 0 0 20px 20px; }
.ym-content-prose li { margin-bottom: 8px; }
.ym-content-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0 28px;
  font-size: 14px;
}
.ym-content-prose th, .ym-content-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.ym-content-prose th { background: #f1f5f9; font-weight: 700; }
.ym-content-prose a { color: var(--ym-accent); }
.ym-content-prose blockquote {
  margin: 20px 0;
  padding: 16px 20px;
  border-left: 4px solid var(--ym-primary);
  background: #f8fafc;
  font-style: italic;
}
.ym-cta-block { padding: 24px 0; }
.ym-cta-block .ym-section-title { margin-bottom: 12px; }
"""
    return f"<style>\n{css}\n{extra}\n</style>"


def intro_html() -> str:
    return f"""
<section class="copilot-computer-use-intro reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="copilot-computer-use-intro-grid">
      <div class="copilot-computer-use-intro-text">
        <p class="copilot-computer-use-intro-lead">{INTRO_LEAD}</p>
        <p>{INTRO_SUB}</p>
      </div>
      <div class="copilot-computer-use-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">copilot · mcp · legacy-ui</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> audit_process --no-api</div>
            <div><span class="ym-comment"># ветка: MCP live → HubSpot</span></div>
            <div><span class="ym-command">$</span> computer_use --steps 4 --credits 20</div>
            <div><span class="ym-comment"># ветка: UI legacy → 1С-клиент</span></div>
            <div><span class="ym-command">$</span> hitl --on-low-confidence</div>
          </div>
        </div>
        <div class="copilot-computer-use-kpi-chips" aria-hidden="true">
          <span>GA 13.05.2026</span>
          <span>5 credits/step</span>
          <span>MCP federated</span>
          <span>1С без API</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-300" aria-label="Оглавление">
      <a href="#may-2026-ga-mcp">Май 2026 GA</a>
      <a href="#computer-using-agents">Computer use</a>
      <a href="#federated-mcp">Federated MCP</a>
      <a href="#copilot-vs-make">Copilot vs Make</a>
      <a href="#security-dlp-hitl">Безопасность</a>
      <a href="#russia-context">Россия</a>
      <a href="#implementation-steps">Внедрение</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</section>
"""


def md_to_html(md: str) -> str:
    md = re.sub(r"^# H1:.*\n", "", md)
    md = re.sub(r"^---\s*\n", "", md, flags=re.MULTILINE)
    md = re.sub(r"<!-- CTA:.*?-->\s*\n", "", md)
    md = re.sub(r"\*Материал подготовлен.*?\*\s*\n?", "", md, flags=re.DOTALL)
    return markdown.markdown(
        md,
        extensions=["tables", "fenced_code", "nl2br", "sane_lists"],
        output_format="html5",
    )


def split_sections(md_body: str) -> dict[str, str]:
    parts: dict[str, list[str]] = {}
    current_id = None
    for line in md_body.splitlines():
        h2 = re.match(r"^## (.+)$", line)
        if h2:
            title = h2.group(1).strip()
            current_id = None
            for sid, stitle in SECTION_MAP:
                if stitle == title or title.startswith(stitle[:40]):
                    current_id = sid
                    break
            if current_id is None:
                slug = re.sub(r"[^a-z0-9]+", "-", title.lower())[:40].strip("-")
                current_id = slug or "section"
            parts.setdefault(current_id, [])
            continue
        if current_id:
            parts[current_id].append(line)
    return {k: "\n".join(v).strip() for k, v in parts.items()}


def section_wrap(section_id: str, title: str, inner_html: str, alt: bool = False) -> str:
    alt_class = " ym-section-alt" if alt else ""
    return f"""
<section class="ym-section{alt_class} reveal" id="{section_id}">
  <div class="ym-container">
    <h2 class="ym-section-title">{title}</h2>
    <div class="ym-content-prose">
{inner_html}
    </div>
  </div>
</section>
"""


def faq_html() -> str:
    items = []
    sidebar_links = []
    for fid, q, a in FAQ_ITEMS:
        sidebar_links.append(f'<li><a href="#{fid}">{q[:48]}…</a></li>' if len(q) > 48 else f'<li><a href="#{fid}">{q}</a></li>')
        items.append(
            f'<article class="ym-faq-item reveal" id="{fid}"><h3>{q}</h3><p>{a}</p></article>'
        )
    return f"""
<section class="ym-section ym-section-alt reveal" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <p class="ym-section-subtitle">Ответы для сниппетов и AI-поиска</p>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="font-size:18px;margin:0 0 16px;">Вопросы</h3>
        <ul class="ym-faq-list">{''.join(sidebar_links)}</ul>
      </aside>
      <div>{''.join(items)}</div>
    </div>
  </div>
</section>
"""


def json_ld() -> str:
    faq_entities = [
        {"@type": "Question", "name": q, "acceptedAnswer": {"@type": "Answer", "text": a}}
        for _, q, a in FAQ_ITEMS
    ]
    article = {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "Computer-using агенты и MCP в Copilot: как автоматизировать бизнес без API",
        "description": SEO_DESC,
        "author": {"@type": "Organization", "name": "Nero Network"},
        "datePublished": "2026-05-30",
        "dateModified": "2026-05-30",
        "inLanguage": "ru-RU",
        "keywords": "ai агенты для бизнеса, автоматизация без api, mcp для бизнеса, copilot studio, computer use агент",
    }
    faq_page = {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": faq_entities,
    }
    return (
        f'<script type="application/ld+json">\n{json.dumps(article, ensure_ascii=False, indent=2)}\n</script>\n'
        f'<script type="application/ld+json">\n{json.dumps(faq_page, ensure_ascii=False, indent=2)}\n</script>'
    )


def build_page_html(handoff: str) -> str:
    hero = extract_hero(handoff)
    boris = extract_boris(handoff)
    body_md = extract_artur_body(handoff)
    sections = split_sections(body_md)

    alt_toggle = False
    chunks: list[str] = [page_css(), f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">', hero, intro_html()]

    for sid, stitle in SECTION_MAP:
        if sid == "faq":
            chunks.append(faq_html())
            continue
        if sid not in sections:
            continue
        html = md_to_html(sections[sid])
        chunks.append(section_wrap(sid, stitle, html, alt_toggle))
        alt_toggle = not alt_toggle
        if sid == "computer-using-agents":
            chunks.append(f'<div class="ym-container">{boris}</div>')
        if sid == "copilot-vs-make":
            chunks.append(CTA_PRIMARY)
        if sid == "implementation-steps":
            chunks.append(CTA_SECONDARY)
    chunks.append(AD_BANNER)
    chunks.append("""
<section class="ym-section reveal">
  <div class="ym-container">
    <p class="ym-content-prose" style="font-size:14px;color:#64748b!important;text-align:center;margin:0;">
      Материал подготовлен редакцией Nero Network; факты Microsoft — по ссылкам Learn и Tech Community на дату research 30.05.2026.
    </p>
  </div>
</section>
""")
    chunks.append("</main>")
    reveal = REVEAL_JS.read_text(encoding="utf-8")
    chunks.append(f"<script>\n{reveal}\n</script>")
    chunks.append(json_ld())
    return "\n".join(chunks)


def build_php(html: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    html_escaped = html.replace("?>", "?>")
    return f"""<?php
/**
 * Template Name: Copilot Computer Use MCP Agenty Bez API
 * Description: Longread — computer-using agents Copilot + federated MCP (Nero Network Office Page).
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

<!-- wp:html -->
{html_escaped}
<!-- /wp:html -->

<?php
get_footer();
"""


def update_handoff(handoff_path: Path, html_size: int, php_path: Path) -> None:
    text = handoff_path.read_text(encoding="utf-8")
    summary = f"""=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
PHP: {php_path.relative_to(ROOT)}
Размер HTML (контент wp:html): ~{html_size} байт

## Структура
- Hero Алины (`#copilot-mcp-hero`, canvas `copilot-mcp-hero-canvas`)
- Введение слева + терминал/KPI (`copilot-computer-use-intro`)
- `.ym-toc` по центру
- Секции H2: may-2026-ga-mcp → computer-using-agents → **Борис** (`#copilot-computer-use-boris-block`) → federated-mcp → copilot-vs-make + CTA PRIMARY → security → russia → implementation + CTA SECONDARY → FAQ → итог
- JSON-LD: Article + FAQPage
- Reveal IntersectionObserver

ВНИМАНИЕ: контент содержит `<script>` и `<canvas>` — при публикации обёрнут в `<!-- wp:html -->` (уже в PHP).

## Передача Юре
SLUG: {SLUG}
Файл темы: `wordpress-theme/page-{SLUG}.php`
Контент содержит `<script>` (hero engine + boris engine + reveal) и `<canvas>`. CTA: плейсхолдеры `${{PRIMARY_CTA_URL}}`, `${{SECONDARY_CTA_URL}}`, `${{AD_BANNER_*}}`. Баннер скрыт (`hidden`) до env.
"""
    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in text:
        text = re.sub(
            r"=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            summary.strip(),
            text,
            flags=re.DOTALL,
        )
    else:
        text = text.rstrip() + "\n\n" + summary.strip() + "\n"
    handoff_path.write_text(text, encoding="utf-8")


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    html = build_page_html(handoff)
    php = build_php(html)
    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(php, encoding="utf-8")
    update_handoff(HANDOFF, len(html.encode("utf-8")), OUT_PHP)
    print(f"Wrote {OUT_PHP} ({OUT_PHP.stat().st_size} bytes)")
    print(f"HTML content: {len(html)} chars")


if __name__ == "__main__":
    main()
