#!/usr/bin/env python3
"""Assemble page-ai-finops-kontrol-rashodov-tokeny-biznes.php for Natasha role."""

from __future__ import annotations

import os
import re
from pathlib import Path

import markdown
from markdown.extensions.tables import TableExtension

ROOT = Path("/workspace")
HANDOFF = ROOT / ".cursor/nero-network-handoff.md"
BORIS_FRAG = ROOT / ".cursor/nero-network-fragments/boris.md"
CSS_REF = ROOT / "shared/longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared/longread-page-reveal.js"
OUT_DIR = ROOT / "wordpress-theme"
OUT_PHP = OUT_DIR / "page-ai-finops-kontrol-rashodov-tokeny-biznes.php"

SLUG = "ai-finops-kontrol-rashodov-tokeny-biznes"
PAGE_CLASS = f"{SLUG}-page"

SEO_TITLE = "AI FinOps: контроль расходов на токены и ИИ в бизнесе"
SEO_DESC = (
    "FinOps для AI: контроль расходов на токены, лимиты API и окупаемость "
    "внедрения нейросетей. Уроки Microsoft и Uber для бизнеса и МСБ."
)

SECTION_IDS = {
    "Почему в 2026 году счета за токены обгоняют пилоты и ФОТ": "pochemu-scheta-tokeny-2026",
    "Что такое AI FinOps и чем отличается от «облачного» FinOps": "ai-finops-opredelenie",
    "Из чего складываются расходы на нейросети в бизнесе": "rashody-neyroseti-biznes",
    "Unit-экономика внедрения ИИ: как считать до масштабирования": "unit-ekonomika-ii",
    "Практики контроля: gateway, лимиты, маршрутизация моделей, кэш": "praktiki-kontrol-gateway",
    "AI-агенты и автоматизация (Make, n8n, MCP) с прозрачной экономикой": "ai-agenty-avtomatizaciya",
    "Российский контекст: пилоты 55% / промышленное 15% и что делать МСБ": "rossiyskiy-kontekst-msb",
    "FAQ": "faq-ai-finops",
    "Итог": "itog-ai-finops",
}

CTA_MAIN = """<aside class="ym-cta-inline reveal" aria-label="Консультация по AI FinOps">
  <div class="ym-card" style="border-left:4px solid var(--ym-primary);padding:1.5rem 1.75rem;margin:2rem 0;">
    <p style="margin:0 0 8px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#64748b;">Nero Network · AI FinOps</p>
    <h3 style="margin:0 0 12px;font-size:22px;font-weight:800;color:var(--ym-heading);">Аудит расходов на API и FinOps с первого дня</h3>
    <p style="margin:0 0 16px;color:#64748b;line-height:1.6;font-size:15px;">30 дней логов, shadow AI, gateway, лимиты и метрика ₽/операция — до масштабирования Make/n8n/MCP и AI-агентов.</p>
    <p style="margin:0;font-weight:600;color:var(--ym-heading);">Свяжитесь с Nero Network для консультации по внедрению с прозрачной экономикой.</p>
  </div>
</aside>"""

CTA_SECONDARY = """<aside class="ym-cta-inline reveal" aria-label="Обучение FinOps и автоматизации">
  <div class="ym-card" style="padding:1.5rem 1.75rem;margin:2rem 0;background:var(--ym-surface);border:1px solid var(--ym-border);">
    <p style="margin:0 0 8px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#64748b;">Обучение команды</p>
    <h3 style="margin:0 0 12px;font-size:20px;font-weight:800;color:var(--ym-heading);">Не «жечь токены» в промптах и агентах</h3>
    <p style="margin:0;color:#64748b;line-height:1.6;font-size:15px;">FinOps-практики для автоматизации: лимиты цепочек, chargeback по отделам, маршрутизация моделей. Уточните программу обучения у Nero Network.</p>
  </div>
</aside>"""

CTA_FINAL = """<div class="ym-btn-group reveal" style="margin:2.5rem 0 1rem;" role="region" aria-label="Итоговый призыв к действию">
  <p style="flex:1 1 100%;text-align:center;margin:0 0 1rem;font-size:18px;font-weight:600;color:var(--ym-heading);max-width:640px;margin-left:auto;margin-right:auto;">Готовы считать операцию, а не пилоты?</p>
  <span class="ym-btn ym-btn-primary" style="cursor:default;"><span>Консультация: аудит API и unit-экономика</span></span>
</div>"""


def extract_html_block(text: str, start_marker: str) -> str:
    idx = text.find(start_marker)
    if idx < 0:
        raise ValueError(f"Marker not found: {start_marker}")
    rest = text[idx:]
    m = re.search(r"```html\n(.*?)```", rest, re.DOTALL)
    if not m:
        raise ValueError(f"No html block after {start_marker}")
    return m.group(1).strip()


def extract_artur_markdown(handoff: str) -> str:
    m = re.search(
        r"=== АРТУР \(CTA И РЕКЛАМА\) ===.*?### Полный текст\n(.*?)\n\n### GEO-чеклист",
        handoff,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Artur markdown not found")
    body = m.group(1).strip()
    # Drop duplicate H1
    body = re.sub(r"^# .+\n\n", "", body, count=1)
    return body


def split_hero(html: str) -> tuple[str, str]:
    """Return (section_html, hero_script)."""
    m = re.search(r"(<script[^>]*id=[\"']hero-finops-engine[\"'][^>]*>.*?</script>)", html, re.DOTALL | re.IGNORECASE)
    if m:
        script = m.group(1)
        section = html[: m.start()].strip() + "\n"
        return section, script
    return html, ""


def md_to_html(md: str) -> str:
    return markdown.markdown(
        md,
        extensions=["extra", "sane_lists", TableExtension()],
    )


def wrap_longread(html: str, boris_block: str) -> str:
    parts = re.split(r"<h2>(.*?)</h2>", html)
    if not parts[0].strip():
        parts = parts[1:]
    else:
        # leading intro before first h2 (Коротко blockquote area)
        lead = parts[0]
        parts = parts[1:]
        if lead.strip():
            # Usually empty after removing H1
            pass

    sections_out: list[str] = []
    i = 0
    sec_idx = 0
    while i < len(parts):
        title = parts[i].strip()
        content = parts[i + 1] if i + 1 < len(parts) else ""
        i += 2
        sid = SECTION_IDS.get(title, re.sub(r"[^a-z0-9]+", "-", title.lower())[:48].strip("-"))
        alt = " ym-section-alt" if sec_idx % 2 else ""
        sec_idx += 1
        block = f"""<section id="{sid}" class="ym-section{alt} reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">{title}</h2>
    <div class="ym-prose">
{content.strip()}
    </div>
  </div>
</section>"""
        sections_out.append(block)
        if sid == "ai-finops-opredelenie":
            sections_out.append(boris_block)

        if sid == "unit-ekonomika-ii":
            sections_out[-1] = sections_out[-1].replace(
                "</section>",
                f"\n{CTA_MAIN}\n</section>",
                1,
            )

        if sid == "ai-agenty-avtomatizaciya" and "Кейс Nero Network" in content:
            sections_out[-1] = re.sub(
                r"(</h3>\s*</div>\s*</div>\s*</section>)",
                CTA_SECONDARY + r"\1",
                sections_out[-1],
                count=1,
            )
            # Insert after h3 кейс - simpler: append before closing ym-prose
            sections_out[-1] = sections_out[-1].replace(
                "    </div>\n  </div>\n</section>",
                f"    {CTA_SECONDARY}\n    </div>\n  </div>\n</section>",
                1,
            )

        if sid == "itog-ai-finops":
            sections_out[-1] = sections_out[-1].replace(
                "    </div>\n  </div>\n</section>",
                f"    {CTA_FINAL}\n    </div>\n  </div>\n</section>",
                1,
            )

    return "\n".join(sections_out)


def build_intro() -> str:
    return f"""<section class="ym-section ai-finops-intro-section reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="ai-finops-intro-grid">
      <div class="ai-finops-intro-text">
        <p class="ai-finops-intro-lead"><strong>Коротко:</strong> в 2026 году расходы на нейросети в бизнесе перестали быть «экспериментом в углу IT». Токены API, агенты и массовые лицензии съедают бюджеты быстрее, чем пилоты приносят измеримый ROI.</p>
        <p>AI FinOps — дисциплина учёта, лимитов и unit-экономики <strong>до</strong> масштабирования, а не после сюрприза в счёте. Ниже — кейсы Microsoft и Uber, практики gateway и ответы на частые вопросы.</p>
      </div>
      <div class="ai-finops-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot"></span><span class="ym-mac-dot"></span><span class="ym-mac-dot"></span>
            <span style="margin-left:8px;font-size:11px;color:#94a3b8;">finops-snapshot.sh</span>
          </div>
          <div class="ym-mac-body">
            <p class="ym-command">$ finops status --team=all</p>
            <p class="ym-comment"># 98% manage AI spend · 53% visibility gap</p>
            <p class="ym-command">→ gateway.route(mini|flagship)</p>
            <p class="ym-command">→ chargeback.tag(team_id, feature)</p>
            <p class="ym-comment"># alert @ 80% · hard cap @ 100%</p>
          </div>
        </div>
        <div class="ai-finops-intro-chips">
          <span>₽/операция</span><span>Gateway</span><span>LiteLLM</span><span>Make/n8n</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc-wrap" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#pochemu-scheta-tokeny-2026">Почему растут счета</a>
        <a href="#ai-finops-opredelenie">Что такое AI FinOps</a>
        <a href="#rashody-neyroseti-biznes">Статьи расходов</a>
        <a href="#unit-ekonomika-ii">Unit-экономика</a>
        <a href="#praktiki-kontrol-gateway">Практики контроля</a>
        <a href="#ai-agenty-avtomatizaciya">Агенты и автоматизация</a>
        <a href="#rossiyskiy-kontekst-msb">Контекст РФ</a>
        <a href="#faq-ai-finops">FAQ</a>
        <a href="#itog-ai-finops">Итог</a>
      </div>
    </nav>
  </div>
</section>"""


def build_faq_layout(sections_html: str) -> str:
    faq_m = re.search(
        r'(<section id="faq-ai-finops".*?</section>)',
        sections_html,
        re.DOTALL,
    )
    if not faq_m:
        return sections_html
    faq_sec = faq_m.group(1)
    inner_m = re.search(r"<div class=\"ym-prose\">(.*)</div>\s*</div>\s*</section>", faq_sec, re.DOTALL)
    if not inner_m:
        return sections_html
    inner = inner_m.group(1)
    items = re.findall(r"<h3>(.*?)</h3>\s*(.*?)(?=<h3>|$)", inner, re.DOTALL)
    if not items:
        return sections_html
    faq_items_html = ""
    faq_nav = ""
    for i, (q, a) in enumerate(items, 1):
        fid = f"faq-q{i}"
        faq_nav += f'<a href="#{fid}">{q.strip()}</a>\n'
        faq_items_html += f"""<article class="ym-faq-item reveal" id="{fid}">
  <h3>{q.strip()}</h3>
  <div class="ym-faq-answer">{a.strip()}</div>
</article>\n"""
    new_faq = f"""<section id="faq-ai-finops" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar">
        <p class="ym-faq-sidebar-title">Вопросы</p>
        <nav class="ym-faq-list" aria-label="Вопросы FAQ">
{faq_nav}        </nav>
      </aside>
      <div class="ym-faq-content">
{faq_items_html}      </div>
    </div>
  </div>
</section>"""
    return sections_html.replace(faq_sec, new_faq)


def page_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = re.sub(
        r":root \{[^}]+\}",
        """:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #059669;
    --ym-accent: #0ea5e9;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(5, 150, 105, 0.15);
}""",
        css,
        count=1,
    )
    extra = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#finops-command-center.finops-hero-shell {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.ai-finops-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
  gap: 40px;
  align-items: start;
  margin-bottom: 48px;
}
.ai-finops-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #059669, #0ea5e9) 1;
  padding-left: 24px;
}
.ai-finops-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  color: #334155 !important;
}
.ai-finops-intro-lead { font-size: 18px !important; }
.ai-finops-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 14px;
}
.ai-finops-intro-chips span {
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
  color: #0f172a !important;
}
.ym-toc-wrap { display: flex; justify-content: center; margin-top: 8px; }
.ai-finops-intro-section .ym-toc { justify-content: center; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose h3 { margin-top: 2rem; font-size: 1.35rem; }
.ym-prose table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 14px; }
.ym-prose th, .ym-prose td { border: 1px solid var(--ym-border); padding: 10px 12px; text-align: left; }
.ym-prose th { background: #f1f5f9; font-weight: 700; }
.ym-prose blockquote {
  border-left: 4px solid var(--ym-primary);
  margin: 1.5rem 0;
  padding: 0.75rem 1.25rem;
  background: #f0fdf4;
  font-size: 15px;
}
.ym-faq-answer { font-size: 15px; line-height: 1.65; }
.ym-faq-answer ul { padding-left: 1.25rem; }
@media (max-width: 900px) {
  .ai-finops-intro-grid { grid-template-columns: 1fr; }
}
"""
    return css + extra


def json_ld() -> str:
    return """<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "AI FinOps для бизнеса: контроль расходов на токены и ИИ",
      "description": "FinOps для AI: контроль расходов на токены, лимиты API и окупаемость внедрения нейросетей. Уроки Microsoft и Uber для бизнеса и МСБ.",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "inLanguage": "ru-RU",
      "about": ["AI FinOps", "расходы на нейросети в бизнесе", "стоимость токенов", "unit-экономика внедрения ИИ"]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Как посчитать стоимость одной операции с нейросетью?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Зафиксируйте границы операции, соберите за 30 дней токены и затраты, разделите на число успешных операций и добавьте пессимистичный коэффициент на рост частоты."
          }
        },
        {
          "@type": "Question",
          "name": "Что такое chargeback по командам в AI FinOps?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Распределение AI-затрат по подразделениям на основе тегов team_id, feature, workflow и отчётов gateway."
          }
        },
        {
          "@type": "Question",
          "name": "Как снизить расходы на ChatGPT и API без отказа от ИИ?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Единый gateway, маршрутизация на дешёвые модели, кэш, hard caps и учёт стоимости операции."
          }
        },
        {
          "@type": "Question",
          "name": "Нужен ли отдельный FinOps-специалист или достаточно процесса?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Для МСБ достаточно процесса, gateway, 30-дневного аудита и метрик ₽/операция; отдельная ставка оправдана при enterprise spend."
          }
        }
      ]
    }
  ]
}
</script>"""


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    hero_raw = extract_html_block(handoff, "=== АЛИНА (HERO) ===")
    boris_block = extract_html_block(handoff, "=== БОРИС (БЛОК СТАТЬИ, НЕ HERO) ===")
    if not boris_block and BORIS_FRAG.exists():
        boris_block = extract_html_block(BORIS_FRAG.read_text(encoding="utf-8"), "=== БОРИС")

    hero_section, hero_script = split_hero(hero_raw)
    artur_md = extract_artur_markdown(handoff)
    # Remove Artur blockquote CTAs from md (we inject HTML CTAs)
    artur_md = re.sub(r"\n> \*\*Следующий шаг:.*?\n", "\n", artur_md, flags=re.DOTALL)
    artur_md = re.sub(r"\n> \*\*Закрепите экономику.*?\n", "\n", artur_md, flags=re.DOTALL)
    artur_md = re.sub(
        r"\n\*\*Готовы считать операцию.*?\n",
        "\n",
        artur_md,
    )

    body_html = md_to_html(artur_md)
    body_html = re.sub(r"<hr\s*/?>", "", body_html)
    sections = wrap_longread(body_html, boris_block)
    sections = build_faq_layout(sections)

    reveal_inline = REVEAL_JS.read_text(encoding="utf-8")
    reveal_inline = reveal_inline.replace(
        "document.addEventListener('DOMContentLoaded', function() {",
        "document.addEventListener('DOMContentLoaded', function () {",
    )

    php = f"""<?php
/**
 * Template Name: AI FinOps — контроль расходов на токены
 * Description: Лонгрид AI FinOps (hero canvas + блок Бориса + reveal + JSON-LD)
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
{page_css()}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">

{hero_section}

{build_intro()}

{sections}

</main>

{hero_script}

<script>
{reveal_inline}
</script>

{json_ld()}

<?php
get_footer();
"""

    OUT_DIR.mkdir(parents=True, exist_ok=True)
    OUT_PHP.write_text(php, encoding="utf-8")
    size = OUT_PHP.stat().st_size
    has_main = 'id="primary"' in php
    has_canvas = "hero-finops-canvas" in php and "boris-finops-gateway-canvas" in php
    print(f"Wrote {OUT_PHP} ({size} bytes)")
    print(f"main#primary: {has_main}")
    print(f"canvas: {has_canvas}")


if __name__ == "__main__":
    main()
