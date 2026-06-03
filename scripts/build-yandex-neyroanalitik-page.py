#!/usr/bin/env python3
"""Сборка page-yandex-neyroanalitik-ai-analitika-dannyh-2026.php и блока Наташи в handoff."""
from __future__ import annotations

import os
import re
from pathlib import Path

import markdown

ROOT = Path("/workspace")
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme" / "page-yandex-neyroanalitik-ai-analitika-dannyh-2026.php"

SLUG = "yandex-neyroanalitik-ai-analitika-dannyh-2026"
PAGE_CLASS = f"{SLUG}-page"

SEO_TITLE = "Нейроаналитик Яндекса: AI-аналитика данных в DataLens 2026"
SEO_DESC = (
    "Нейроаналитик DataLens (июнь 2026): сырые данные, чат на русском, ИИ на дашборде. "
    "Сравнение с Power BI и внедрение AI-аналитики в CRM и Make."
)

H2_IDS = [
    ("chto-takoe-neyroanalitik", "Что такое Нейроаналитик в Yandex DataLens"),
    ("chto-novogo-iyun-2026", "Что нового в июне 2026: сырые данные и ИИ-виджет"),
    ("bez-sql-dlya-biznesa", "Как это работает для бизнеса без SQL"),
    ("ai-analitika-dannyh", "AI-аналитика данных: родовой смысл и польза"),
    ("avtomatizaciya-otchetov", "Автоматизация отчётов и дашбордов с ИИ"),
    ("text-to-sql-russkiy", "Запросы на русском и Text-to-SQL"),
    ("vizualizaciya-neyroset", "Визуализация данных нейросетью"),
    ("sravnenie-datalens", "Сравнение: DataLens vs Power BI Copilot и аналоги"),
    ("vnedrenie-ai-analitiki", "Внедрение AI-аналитики у себя"),
    ("ogranicheniya-tarify", "Ограничения, тарифы и доступность для SMB"),
    ("riski-fz152", "Риски, ФЗ-152 и локальные модели"),
    ("faq", "FAQ"),
]

TOC_LINKS = [(sid, title.split(":")[0].strip() if ":" in title else title[:42]) for sid, title in H2_IDS]


def extract_block(text: str, marker: str, next_markers: list[str]) -> str:
    start = text.find(marker)
    if start < 0:
        raise ValueError(f"Marker not found: {marker}")
    start = text.find("\n", start) + 1
    end = len(text)
    for nm in next_markers:
        pos = text.find(nm, start)
        if pos >= 0:
            end = min(end, pos)
    return text[start:end].strip()


def extract_fenced(html_block: str, lang: str = "html") -> str:
    m = re.search(rf"```{lang}\s*\n(.*?)```", html_block, re.DOTALL)
    if not m:
        raise ValueError("No fenced block")
    return m.group(1).strip()


def env_cta() -> dict[str, str]:
    return {
        "primary_url": os.environ.get("PRIMARY_CTA_URL", ""),
        "primary_label": os.environ.get("PRIMARY_CTA_LABEL", "Обсудить внедрение"),
        "secondary_url": os.environ.get("SECONDARY_CTA_URL", ""),
        "secondary_label": os.environ.get("SECONDARY_CTA_LABEL", "Курс по автоматизации"),
    }


def cta_primary_html(_cta: dict[str, str] | None = None) -> str:
    return '''<aside class="ym-card reveal ym-cta-primary" aria-labelledby="cta-primary-title">
  <div class="ym-card-icon" aria-hidden="true">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
  <h3 id="cta-primary-title">Внедрить AI-аналитику на ваших данных</h3>
  <p>Разберём CRM, 1С, таблицы и БД: спроектируем чат на русском, пилот за 2–8 недель и контур под ФЗ-152 — без обязательной миграции в DataLens.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;margin-top:24px;">
    <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $primary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( $primary_cta_label ); ?></span></a>
  </div>
</aside>'''


def cta_secondary_html(_cta: dict[str, str] | None = None) -> str:
    return '''<aside class="ym-card reveal ym-cta-secondary" aria-labelledby="cta-secondary-title">
  <h3 id="cta-secondary-title">Освоить Make, n8n и вайбкодинг</h3>
  <p>Если вы строите свой стек (Telegram-бот, оркестратор, text-to-SQL), начните с практики: сценарии автоматизации, промпты и разбор типовых ошибок агентов.</p>
  <p style="margin-top:16px;margin-bottom:0;"><a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $secondary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $secondary_cta_label ); ?></a></p>
</aside>'''


def md_to_html(md: str) -> str:
    md = re.sub(r"\n---\n", "\n\n", md)
    html = markdown.markdown(
        md,
        extensions=["tables", "fenced_code", "nl2br", "sane_lists"],
    )
    return re.sub(r"<hr\s*/?\s*>\s*", "", html, flags=re.IGNORECASE)


def split_longread(md: str) -> list[tuple[str, str, str]]:
    """Returns list of (id, title, body_md)."""
    parts = re.split(r"\n(?=## )", md.strip())
    sections = []
    for i, part in enumerate(parts):
        if not part.strip():
            continue
        if part.startswith("## "):
            lines = part.split("\n", 1)
            title = lines[0].replace("## ", "").strip()
            body = lines[1] if len(lines) > 1 else ""
        else:
            title = "Введение"
            body = part
        sid = H2_IDS[len(sections)][0] if len(sections) < len(H2_IDS) else f"section-{len(sections)}"
        if len(sections) < len(H2_IDS):
            sid = H2_IDS[len(sections)][0]
        body = re.sub(r"\n---\s*$", "", body.strip())
        sections.append((sid, title, body))
    return sections


def wrap_section(sid: str, title: str, inner_html: str, alt: bool = False) -> str:
    alt_cls = " ym-section-alt" if alt else ""
    return f'''<section id="{sid}" class="ym-section{alt_cls} reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">{title}</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main">{inner_html}</div>
    </div>
  </div>
</section>'''


def build_content_sections(longread_md: str, boris_html: str, cta: dict[str, str]) -> str:
    sections = split_longread(longread_md)
    out: list[str] = []
    for idx, (sid, title, body) in enumerate(sections):
        body = re.sub(r"^---\s*\n", "", body)
        body_html = md_to_html(body)
        # Secondary CTA after "Когда хватает DataLens" in automation section
        if sid == "avtomatizaciya-otchetov":
            marker = "<h3>Запросы на русском"
            insert_at = body_html.find("<h3>Когда хватает DataLens")
            if insert_at >= 0:
                next_h3 = body_html.find("<h3>", insert_at + 10)
                if next_h3 < 0:
                    next_h3 = len(body_html)
                # find end of "Когда хватает" section - before next h3 "Запросы" doesn't exist - next is ### GigaChat in different section
                # Actually structure: ### Baseline, ### Когда хватает - then section ends
                end_h3 = body_html.find("<h3>", insert_at + 5)
                while end_h3 > insert_at and "Когда хватает" not in body_html[insert_at:end_h3]:
                    pass
                # Simpler: insert after paragraph following "Нужен свой стек" list ends
                split_key = "<h3>Запросы на русском"
                pos = body_html.find("**Нужен свой стек**")
                if pos < 0:
                    pos = body_html.rfind("</ul>", 0, len(body_html))
                if pos >= 0:
                    close_ul = body_html.find("</ul>", pos)
                    if close_ul >= 0:
                        body_html = (
                            body_html[: close_ul + 5]
                            + "\n"
                            + cta_secondary_html(cta)
                            + body_html[close_ul + 5 :]
                        )
        if sid == "vnedrenie-ai-analitiki":
            key = "<h3>Пилот за 2–8 недель"
            pos = body_html.find(key)
            if pos >= 0:
                table_end = body_html.find("</table>", pos)
                if table_end >= 0:
                    after = table_end + 8
                    checklist = body_html.find("Чеклист перед продакшеном", after)
                    if checklist >= 0:
                        para_end = body_html.find("</p>", body_html.find("<p>", checklist))
                        if para_end >= 0:
                            after = para_end + 4
                    body_html = (
                        body_html[:after] + "\n" + cta_primary_html(cta) + body_html[after:]
                    )

        block = wrap_section(sid, title, body_html, alt=(idx % 2 == 1))
        out.append(block)
        if sid == "chto-novogo-iyun-2026":
            out.append(boris_html)
    return "\n\n".join(out)


def page_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace("--ym-primary: #ff0000", "--ym-primary: #fc3f1d")
    css = css.replace("#e60000", "#e11d00")
    css = css.replace("rgba(255, 0, 0,", "rgba(252, 63, 29,")
    css = css.replace("rgba(255,0,0,", "rgba(252,63,29,")
    extra = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#neuro-insight-hero.neuro-hero-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.yandex-neyroanalitik-intro-section { padding: 56px 0 32px; }
.yandex-neyroanalitik-intro-grid {
  display: grid;
  grid-template-columns: 1fr minmax(260px, 0.85fr);
  gap: 40px;
  align-items: start;
}
.yandex-neyroanalitik-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}
.yandex-neyroanalitik-intro-text p {
  text-align: left !important;
  font-size: 1.05rem;
  line-height: 1.65;
  margin: 0 0 16px;
}
.yandex-neyroanalitik-intro-deco .ym-mac-window { margin-bottom: 0; }
.yandex-neyroanalitik-toc-wrap { padding: 8px 0 48px; text-align: center; }
.yandex-neyroanalitik-toc-wrap .ym-toc { margin-top: 0; }
.ym-prose-main { max-width: 100%; text-align: left !important; }
.ym-prose-main p, .ym-prose-main li { text-align: left !important; }
.ym-prose-main table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 14px;
}
.ym-prose-main th, .ym-prose-main td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
  vertical-align: top;
}
.ym-prose-main th { background: #f1f5f9; font-weight: 700; }
.ym-prose-main pre {
  background: var(--ym-code-bg);
  color: #e2e8f0 !important;
  padding: 20px;
  border-radius: 12px;
  overflow-x: auto;
}
.ym-prose-main h3 { font-size: 1.35rem; margin: 32px 0 16px; font-weight: 700; }
.ym-prose-main h4 { font-size: 1.1rem; margin: 24px 0 12px; }
.ym-cta-primary, .ym-cta-secondary {
  margin: 40px 0;
  padding: 32px;
  border-radius: 20px;
  border: 1px solid var(--ym-border);
  background: var(--ym-surface);
  box-shadow: var(--ym-shadow);
}
.ym-cta-primary .ym-card-icon {
  width: 48px; height: 48px;
  background: rgba(252, 63, 29, 0.1);
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: var(--ym-primary);
  margin-bottom: 16px;
}
.ym-page-outro {
  padding: 48px 0 80px;
  text-align: left;
  max-width: 900px;
  margin: 0 auto;
}
@media (max-width: 900px) {
  .yandex-neyroanalitik-intro-grid { grid-template-columns: 1fr; }
}
"""
    return css + extra


def intro_section() -> str:
    return '''<section class="yandex-neyroanalitik-intro-section ym-section" aria-label="Введение">
  <div class="ym-container">
    <div class="yandex-neyroanalitik-intro-grid reveal">
      <div class="yandex-neyroanalitik-intro-text">
        <p><strong>Коротко:</strong> 2 июня 2026 Yandex B2B Tech расширила Нейроаналитик в DataLens: агент работает с сырыми корпоративными данными, строит графики по вопросу на русском языке и показывает ИИ-подсказки на дашборде.</p>
        <p>Ниже — что это значит для бизнеса, как устроен продукт, чем он отличается от Power BI Copilot и как повторить сценарий у себя без обязательной миграции в Yandex Cloud.</p>
      </div>
      <div class="yandex-neyroanalitik-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">neuroanalitik — запрос</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># NL → SQL → график</span><br>
            <span class="ym-command">user:</span> Выручка менеджера в Казани за май?<br>
            <span class="ym-comment"># RLS: только ваши строки</span><br>
            <span class="ym-command">agent:</span> SELECT … GROUP BY city → chart
          </div>
        </div>
      </div>
    </div>
  </div>
</section>'''


def toc_section() -> str:
    links = "\n".join(
        f'      <a href="#{sid}">{label}</a>' for sid, label in TOC_LINKS
    )
    return f'''<div class="yandex-neyroanalitik-toc-wrap">
  <div class="ym-container reveal">
    <nav class="ym-toc" aria-label="Оглавление">
{links}
    </nav>
  </div>
</div>'''


def faq_section_html(faq_body_html: str) -> str:
    items = re.findall(
        r"<h3>(.*?)</h3>\s*(.*?)(?=<h3>|$)",
        faq_body_html,
        re.DOTALL,
    )
    faq_list = ""
    faq_items = ""
    for i, (q, a) in enumerate(items):
        fid = f"faq-{i+1}"
        q_clean = re.sub(r"<[^>]+>", "", q).strip()
        faq_list += f'        <li><a href="#{fid}">{q_clean[:60]}</a></li>\n'
        faq_items += f'''      <article class="ym-faq-item reveal" id="{fid}">
        <h3>{q}</h3>
        {a.strip()}
      </article>\n'''
    return f'''<section id="faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;font-size:18px;">Вопросы</h3>
        <ul class="ym-faq-list">
{faq_list}        </ul>
      </aside>
      <div class="ym-faq-content">
{faq_items}      </div>
    </div>
  </div>
</section>'''


def json_ld() -> str:
    return '''{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Нейроаналитик Яндекса: AI-аналитика на русском языке для бизнеса",
      "description": "Нейроаналитик DataLens (июнь 2026): сырые данные, чат на русском, ИИ на дашборде. Сравнение с Power BI и внедрение AI-аналитики.",
      "datePublished": "2026-06-03",
      "dateModified": "2026-06-03",
      "inLanguage": "ru-RU",
      "author": { "@type": "Organization", "name": "Nero Network" }
    },
    {
      "@type": "SoftwareApplication",
      "name": "Yandex DataLens Нейроаналитик",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "Web",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "RUB" }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Нужен ли аналитик, если есть Нейроаналитик?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да, но роль меняется: агент снимает рутину, аналитик проектирует датасеты, RLS и семантический слой."
          }
        },
        {
          "@type": "Question",
          "name": "Можно ли повторить функционал без Yandex Cloud?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да: чат → оркестратор Make/n8n → LLM + схема → read-only SQL/API → график."
          }
        },
        {
          "@type": "Question",
          "name": "Чем июнь 2026 отличается от запуска 2025?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Июнь 2026 добавляет доступ к сырым данным и ИИ-виджет на дашборде; июль 2025 — baseline чата и ~30% ускорения отчётов."
          }
        }
      ]
    }
  ]
}'''


def hero_with_cta(hero_html: str, _cta: dict[str, str] | None = None) -> str:
    return hero_html.replace(
        'href="<!-- NATASHA: PRIMARY_CTA_URL -->"',
        'href="<?php echo esc_url( $primary_cta_url ?: \'#\' ); ?>"',
    )


def build_php_body(
    hero: str,
    intro: str,
    toc: str,
    sections_html: str,
    outro: str,
    reveal: str,
    ld: str,
) -> str:
    return f"""<style>
{page_css()}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{hero}
{intro}
{toc}
{sections_html}
{outro}
</main>

{reveal}
<script type="application/ld+json">
{ld}
</script>
"""


def php_template(html_body: str) -> str:
    return f'''<?php
/**
 * Template Name: Yandex Нейроаналитик AI аналитика 2026
 * Description: Лонгрид о Нейроаналитике DataLens (июнь 2026) — hero Алины, блок Бориса, CTA.
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

$primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '';
$primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Обсудить внедрение';
$secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: '';
$secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Узнать больше';

get_header();
?>

{html_body}

<?php
get_footer();
'''


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    cta = env_cta()

    alina_block = extract_block(
        handoff,
        "=== АЛИНА (HERO) ===",
        ["=== БОРИС", "=== НАТАША"],
    )
    hero = extract_fenced(alina_block)
    hero = hero_with_cta(hero, cta)

    boris_block = extract_block(
        handoff,
        "=== БОРИС (БЛОК СТАТЬИ, НЕ HERO) ===",
        ["=== НАТАША"],
    )
    boris = extract_fenced(boris_block)

    zhenya_block = extract_block(
        handoff,
        "### Полный текст",
        ["### GEO-чеклист"],
    )
    # Remove intro paragraph before first ##
    zhenya_block = re.sub(
        r"^\*\*Коротко:\*\*.*?\n\n---\n\n",
        "",
        zhenya_block,
        count=1,
        flags=re.DOTALL,
    )
    # Remove final outro - handle separately
    outro_match = re.search(
        r"\n\*\*Итог страницы:\*\*.*",
        zhenya_block,
        re.DOTALL,
    )
    outro_md = ""
    if outro_match:
        outro_md = outro_match.group(0).strip()
        zhenya_block = zhenya_block[: outro_match.start()].strip()

    sections = split_longread(zhenya_block)
    content_parts: list[str] = []
    for idx, (sid, title, body) in enumerate(sections):
        body = re.sub(r"^---\s*\n", "", body)
        body_html = md_to_html(body)
        if sid == "faq":
            content_parts.append(faq_section_html(body_html))
            continue
        if sid == "avtomatizaciya-otchetov":
            pos = body_html.find("</ul>")
            if pos >= 0 and "Нужен свой стек" in body_html:
                # second ul in section - find last ul before end
                last_ul = body_html.rfind("</ul>")
                body_html = (
                    body_html[: last_ul + 5]
                    + "\n"
                    + cta_secondary_html(cta)
                    + body_html[last_ul + 5 :]
                )
        if sid == "vnedrenie-ai-analitiki":
            table_end = body_html.find("</table>")
            if table_end >= 0:
                after = table_end + 8
                chk = body_html.find("Чеклист перед продакшеном", after)
                if chk >= 0:
                    pe = body_html.find("</p>", chk)
                    if pe >= 0:
                        after = pe + 4
                body_html = body_html[:after] + "\n" + cta_primary_html(cta) + body_html[after:]

        content_parts.append(wrap_section(sid, title, body_html, alt=(idx % 2 == 1)))
        if sid == "chto-novogo-iyun-2026":
            content_parts.append(boris)

    sections_html = "\n\n".join(content_parts)
    outro_html = ""
    if outro_md:
        outro_html = f'''<section class="ym-page-outro ym-container reveal">
  <div class="ym-prose-main">{md_to_html(outro_md)}</div>
</section>'''

    reveal_inline = REVEAL_JS.read_text(encoding="utf-8")
    reveal_wrapped = f"<script>\n{reveal_inline}\n</script>"

    html_body = build_php_body(
        hero,
        intro_section(),
        toc_section(),
        sections_html,
        outro_html,
        reveal_wrapped,
        json_ld(),
    )

    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(php_template(html_body), encoding="utf-8")

    natasha_block = f"""=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

### Структура
- Hero Алины (`#neuro-insight-hero`, canvas `hero-neuroanalitik-canvas`)
- Введение (лид слева + терминал)
- TOC (12 якорей H2)
- 12 секций лонгрида + блок Бориса после H2 «июнь 2026»
- CTA PRIMARY + SECONDARY (Артур)
- FAQ (sidebar + items)
- JSON-LD: Article, SoftwareApplication, FAQPage
- Reveal IntersectionObserver

{html_body}

## Передача Юре
SLUG: {SLUG}
Контент содержит <script> (hero engine + boris pipeline + reveal) и <canvas>. Обязательно обернуть в <!-- wp:html --> при публикации.
Файл темы: wordpress-theme/page-{SLUG}.php
"""

    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in handoff:
        handoff = re.sub(
            r"=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            natasha_block.strip(),
            handoff,
            flags=re.DOTALL,
        )
    else:
        handoff = handoff.rstrip() + "\n\n" + natasha_block

    HANDOFF.write_text(handoff, encoding="utf-8")

    size = len(html_body.encode("utf-8"))
    print(f"PHP: {OUT_PHP}")
    print(f"HTML body size: {size} bytes ({len(html_body)} chars)")
    print("Handoff updated.")


if __name__ == "__main__":
    main()
