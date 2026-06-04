#!/usr/bin/env python3
"""Assemble page-microsoft-work-iq-api-agenty-m365.php (Natasha)."""
from __future__ import annotations

import argparse
import re
from pathlib import Path

ROOT = Path("/workspace")
SLUG = "microsoft-work-iq-api-agenty-m365"
PAGE_CLASS = f"{SLUG}-page"
UTM = "utm_source=meta-journal&utm_medium=longread&utm_campaign=microsoft-work-iq-api-agenty-m365"


def load_env() -> dict[str, str]:
    env: dict[str, str] = {}
    env_path = ROOT / ".env"
    if env_path.exists():
        for line in env_path.read_text(encoding="utf-8").splitlines():
            line = line.strip()
            if not line or line.startswith("#") or "=" not in line:
                continue
            k, v = line.split("=", 1)
            env[k.strip()] = v.strip().strip('"').strip("'")
    for k in (
        "PRIMARY_CTA_URL",
        "PRIMARY_CTA_LABEL",
        "SECONDARY_CTA_URL",
        "SECONDARY_CTA_LABEL",
    ):
        if k not in env:
            import os

            env[k] = os.environ.get(k, "")
    return env


def extract_fence(path: Path, lang: str = "html") -> str:
    text = path.read_text(encoding="utf-8")
    m = re.search(rf"```{lang}\s*\n(.*?)```", text, re.DOTALL)
    if not m:
        raise ValueError(f"No {lang} fence in {path}")
    return m.group(1).strip()


def slugify_heading(title: str) -> str:
    title = re.sub(r"\*\*", "", title).strip()
    mapping = {
        "Что такое Microsoft Work IQ API и зачем он бизнесу": "work-iq-chto-takoe",
        "MCP в Work IQ: 10 инструментов и progressive disclosure": "work-iq-mcp",
        "Copilot Credits: сколько стоят вызовы агентов": "work-iq-credits",
        "Copilot Studio, Foundry и pro-code агенты": "work-iq-studio-foundry",
        "Контекст организации: почта, Teams, файлы": "work-iq-kontekst",
        "Внедрение AI-агентов: пошаговый план для компании": "work-iq-vnedrenie",
        "Цифровые сотрудники и корпоративные AI-агенты в 2026": "work-iq-cifrovye",
        "Россия и SMB: если нет полного M365 Copilot": "work-iq-rossiya",
        "Сравнение с тем, что делает Nero Network": "work-iq-nero",
        "FAQ": "work-iq-faq",
    }
    for key, sid in mapping.items():
        if key in title:
            return sid
    base = re.sub(r"[^a-zа-яё0-9]+", "-", title.lower())[:48].strip("-")
    return f"work-iq-{base}" if base else "work-iq-section"


def md_to_html(md: str) -> str:
    import markdown

    return markdown.markdown(
        md,
        extensions=["tables", "nl2br", "sane_lists"],
        output_format="html5",
    )


def apply_cta(html: str, env: dict[str, str]) -> str:
    if env.get("_git_template"):
        return html
    primary = env.get("PRIMARY_CTA_URL", "")
    primary_label = env.get("PRIMARY_CTA_LABEL", "Оставить заявку")
    secondary = env.get("SECONDARY_CTA_URL", "")
    secondary_label = env.get("SECONDARY_CTA_LABEL", "Узнать больше")

    def utm(url: str) -> str:
        if not url:
            return "#"
        sep = "&" if "?" in url else "?"
        return f"{url}{sep}{UTM}"

    html = html.replace("[PRIMARY_CTA_URL]", utm(primary))
    html = html.replace("[PRIMARY_CTA_LABEL]", primary_label)
    html = html.replace("[SECONDARY_CTA_URL]", utm(secondary))
    html = html.replace("[SECONDARY_CTA_LABEL]", secondary_label)
    return html


def cta_secondary(env: dict[str, str]) -> str:
    if env.get("_git_template"):
        href = f"[SECONDARY_CTA_URL]?{UTM}"
        l = "[SECONDARY_CTA_LABEL]"
    else:
        u = env.get("SECONDARY_CTA_URL", "")
        l = env.get("SECONDARY_CTA_LABEL", "")
        sep = "&" if "?" in u else "?"
        href = f"{u}{sep}{UTM}" if u else "#"
    return f'''<aside class="ym-cta-panel reveal ym-section-alt" aria-label="Обучение и автоматизация">
  <div class="ym-container">
    <div class="ym-card" style="max-width:920px;margin:0 auto;padding:clamp(24px,4vw,40px);">
      <p class="ym-section-subtitle" style="text-align:left;margin-bottom:12px;">Практика внедрения</p>
      <h3 style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);">67% успеха ИИ — про организацию, не про лицензию</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);line-height:1.65;">Перед пилотом Work IQ или «своего контура» на Make/n8n полезно увидеть, какие процессы реально автоматизируются без «универсального агента» — и кого обучать владельцем сценария.</p>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-secondary" href="{href}" target="_blank" rel="noopener noreferrer"><span>{l}</span></a>
      </div>
    </div>
  </div>
</aside>'''


def cta_primary_mid(env: dict[str, str]) -> str:
    if env.get("_git_template"):
        href = f"[PRIMARY_CTA_URL]?{UTM}"
        l = "[PRIMARY_CTA_LABEL]"
    else:
        u = env.get("PRIMARY_CTA_URL", "")
        l = env.get("PRIMARY_CTA_LABEL", "")
        sep = "&" if "?" in u else "?"
        href = f"{u}{sep}{UTM}" if u else "#"
    return f'''<aside class="ym-cta-panel reveal" aria-label="Консультация Nero Network">
  <div class="ym-container">
    <div class="ym-card" style="max-width:920px;margin:0 auto;padding:clamp(24px,4vw,40px);border-left:4px solid var(--ym-primary);">
      <h3 style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);">Собрать паритет Work IQ без Copilot SKU в РФ</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);line-height:1.65;">RAG + Make/n8n + governance: ограниченный набор tools, FinOps-лимиты и первый цифровой сотрудник с KPI — как у Microsoft, но под ваш контур (почта, CRM, Telegram, 1С).</p>
      <ul style="margin:0 0 20px;padding-left:1.2em;color:var(--ym-text);line-height:1.6;">
        <li>Матрица A2A / MCP / REST под ваш стек</li>
        <li>TCO: Credits + Agent 365 vs фиксированный проект</li>
        <li>Чеклист к GA 16.06.2026 или трек B без M365 Copilot</li>
      </ul>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-primary" href="{href}" target="_blank" rel="noopener noreferrer"><span>{l}</span></a>
      </div>
    </div>
  </div>
</aside>'''


def cta_footer(env: dict[str, str]) -> str:
    if env.get("_git_template"):
        href_p = f"[PRIMARY_CTA_URL]?{UTM}"
        href_s = f"[SECONDARY_CTA_URL]?{UTM}"
        pl, sl = "[PRIMARY_CTA_LABEL]", "[SECONDARY_CTA_LABEL]"
    else:
        pu = env.get("PRIMARY_CTA_URL", "")
        pl = env.get("PRIMARY_CTA_LABEL", "")
        su = env.get("SECONDARY_CTA_URL", "")
        sl = env.get("SECONDARY_CTA_LABEL", "")
        sep_p = "&" if "?" in pu else "?"
        sep_s = "&" if "?" in su else "?"
        href_p = f"{pu}{sep_p}{UTM}" if pu else "#"
        href_s = f"{su}{sep_s}{UTM}" if su else "#"
    return f'''<aside class="ym-cta-panel reveal ym-section-alt" aria-label="Заявка на внедрение">
  <div class="ym-container">
    <div class="ym-card" style="max-width:960px;margin:0 auto;padding:clamp(28px,5vw,48px);text-align:center;">
      <h3 style="margin:0 0 12px;font-size:clamp(24px,3.5vw,32px);color:var(--ym-heading);">Внедрение AI-агентов под ключ к GA Work IQ</h3>
      <p style="margin:0 auto 24px;max-width:720px;color:var(--ym-text);line-height:1.65;">Аудит процесса → пилот 4–8 недель → первый агент в Studio/Foundry или на Make/n8n. Без «зоопарка» API и с обучением владельцев процессов.</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="{href_p}" target="_blank" rel="noopener noreferrer"><span>{pl}</span></a>
        <a class="ym-btn ym-btn-secondary" href="{href_s}" target="_blank" rel="noopener noreferrer"><span>{sl}</span></a>
      </div>
      <p style="margin:16px 0 0;font-size:14px;color:#64748b;">Ответим с ориентиром по срокам, стеку и бюджету Credits/проекта.</p>
    </div>
  </div>
</aside>'''


def build_styles() -> str:
    css = (ROOT / "shared/longread-page-design-reference.css").read_text(encoding="utf-8")
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = re.sub(
        r"--ym-primary:\s*#ff0000;",
        "--ym-primary: #0078d4;",
        css,
    )
    css = re.sub(
        r"--ym-accent:\s*#3b82f6;",
        "--ym-accent: #5b5fc7;",
        css,
    )
  # fix red shadows to blue
    css = css.replace("rgba(255, 0, 0,", "rgba(0, 120, 212,")
    css = css.replace("rgba(255,0,0,", "rgba(0,120,212,")
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
#workiq-hero.fullscreen-white-office.workiq-hero-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.workiq-intro-section { padding: clamp(48px, 6vw, 72px) 0 24px; }
.workiq-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: start;
}
@media (min-width: 900px) {
  .workiq-intro-grid { grid-template-columns: 1.2fr 0.9fr; gap: 40px; }
}
.workiq-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #0078d4, #5b5fc7) 1;
  padding-left: clamp(16px, 3vw, 24px);
}
.workiq-intro-text p { text-align: left !important; }
.workiq-intro-deco .ym-mac-window { margin-bottom: 0; }
.workiq-toc-wrap { padding: 8px 0 48px; text-align: center; }
.workiq-longread .ym-content-table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 15px;
}
.workiq-longread .ym-content-table th,
.workiq-longread .ym-content-table td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.workiq-longread .ym-content-table th { background: #f1f5f9; }
.workiq-longread h2 { font-size: clamp(28px, 3.5vw, 36px); margin: 0 0 20px; }
.workiq-longread h3 { font-size: clamp(20px, 2.5vw, 24px); margin: 32px 0 16px; }
.workiq-longread p, .workiq-longread li { line-height: 1.7; }
.workiq-longread blockquote {
  margin: 20px 0;
  padding: 16px 20px;
  border-left: 4px solid var(--ym-accent);
  background: #f8fafc;
  border-radius: 0 12px 12px 0;
}
.workiq-longread hr { border: none; border-top: 1px solid var(--ym-border); margin: 40px 0; }
.workiq-longread ul { padding-left: 1.25em; }
.workiq-conclusion {
  padding: 48px 0 80px;
  text-align: left;
  max-width: 900px;
  margin: 0 auto;
}
"""
    return f"<style>\n{css}\n{extra}\n</style>"


def parse_longread(handoff: str) -> tuple[str, list[tuple[str, str, str]]]:
    m = re.search(r"### Полный текст\s*\n(.*?)\n### GEO-чеклист", handoff, re.DOTALL)
    if not m:
        raise ValueError("Longread not found in handoff")
    body = m.group(1).strip()
    parts = re.split(r"\n---\n", body, maxsplit=1)
    intro_md = parts[0].strip()
    if intro_md.startswith("## "):
        intro_md = re.sub(r"^##[^\n]+\n+", "", intro_md, count=1)

    rest = parts[1] if len(parts) > 1 else ""
    chunks = re.split(r"\n## ", rest)
    sections: list[tuple[str, str, str]] = []
    for chunk in chunks:
        if not chunk.strip():
            continue
        lines = chunk.strip().split("\n", 1)
        title = lines[0].strip()
        content = lines[1].strip() if len(lines) > 1 else ""
        sid = slugify_heading(title)
        sections.append((sid, title, content))
    return intro_md, sections


def wrap_section(sid: str, title: str, inner_html: str, alt: bool = False) -> str:
    alt_class = " ym-section-alt" if alt else ""
    return f'''<section id="{sid}" class="ym-section{alt_class} reveal">
  <div class="ym-container workiq-longread">
    <h2>{title}</h2>
    <div class="ym-prose">{inner_html}</div>
  </div>
</section>'''


def faq_section(faq_md: str) -> str:
    items = []
    blocks = re.split(r"\n\*\*", faq_md.strip())
    for block in blocks:
        block = block.strip()
        if not block:
            continue
        if "?" in block[:80]:
            q, _, a = block.partition("?")
            question = q.strip() + "?"
            answer = a.strip()
        else:
            continue
        items.append((question, answer))

    faq_items_html = ""
    faq_nav = ""
    for i, (q, a) in enumerate(items):
        fid = f"faq-{i+1}"
        faq_nav += f'<li><a href="#{fid}">{q}</a></li>\n'
        a_html = md_to_html(a) if a else ""
        faq_items_html += f'''<article class="ym-faq-item reveal" id="{fid}">
      <h3>{q}</h3>
      <div>{a_html}</div>
    </article>\n'''

    return f'''<section id="work-iq-faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <p class="ym-section-subtitle" style="text-align:left;margin-bottom:16px;">Быстрые ответы</p>
        <ul class="ym-faq-list">{faq_nav}</ul>
      </aside>
      <div class="ym-faq-content">{faq_items_html}</div>
    </div>
  </div>
</section>'''


def main() -> None:
    parser = argparse.ArgumentParser(description="Assemble Work IQ page PHP template")
    parser.add_argument(
        "--git-template",
        action="store_true",
        help="Emit CTA placeholders for git (no env secret values)",
    )
    args = parser.parse_args()

    env = load_env()
    if args.git_template:
        env["_git_template"] = "1"
    handoff = (ROOT / ".cursor/nero-network-handoff.md").read_text(encoding="utf-8")
    hero = extract_fence(ROOT / ".cursor/nero-network-fragments/alina.md")
    boris = extract_fence(ROOT / ".cursor/nero-network-fragments/boris.md")
    hero = apply_cta(hero, env)
    boris = apply_cta(boris, env)

    intro_md, sections = parse_longread(handoff)
    intro_html = md_to_html(intro_md)

    toc_links = [
        ("work-iq-chto-takoe", "Что такое Work IQ"),
        ("work-iq-mcp", "MCP и протоколы"),
        ("work-iq-credits", "Copilot Credits"),
        ("work-iq-studio-foundry", "Studio и Foundry"),
        ("work-iq-kontekst", "Контекст M365"),
        ("work-iq-vnedrenie", "Внедрение"),
        ("work-iq-cifrovye", "Цифровые сотрудники"),
        ("work-iq-rossiya", "Россия и SMB"),
        ("work-iq-nero", "Nero Network"),
        ("work-iq-faq", "FAQ"),
    ]
    toc = '<nav class="ym-toc" aria-label="Оглавление">' + "".join(
        f'<a href="#{sid}">{label}</a>' for sid, label in toc_links
    ) + "</nav>"

    intro_block = f'''<section class="workiq-intro-section" aria-label="Введение">
  <div class="ym-container">
    <div class="workiq-intro-grid reveal">
      <div class="workiq-intro-text">{intro_html}</div>
      <div class="workiq-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">work-iq-api · GA 16.06.2026</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># 4 домена API</span><br>
            <span class="ym-command">Chat</span> · <span class="ym-command">Context</span> · <span class="ym-command">Tools</span> · <span class="ym-command">Workspaces</span><br><br>
            <span class="ym-comment"># MCP progressive disclosure</span><br>
            <span class="ym-command">tools_active=10/10</span><br>
            <span class="ym-command">credits_tool=0.1</span> · <span class="ym-command">chat=$0.20–1.50</span>
          </div>
        </div>
        <div class="ym-bento-grid" style="margin-top:20px;grid-template-columns:1fr 1fr;">
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-300">
            <div class="ym-stat-value">16.06</div>
            <div class="ym-stat-label">GA Work IQ API</div>
          </div>
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-400">
            <div class="ym-stat-value">10</div>
            <div class="ym-stat-label">MCP tools</div>
          </div>
        </div>
      </div>
    </div>
    <div class="workiq-toc-wrap">{toc}</div>
  </div>
</section>'''

    body_parts: list[str] = []
    alt = False
    faq_md = ""
    conclusion_md = ""

    for sid, title, content in sections:
        if sid == "work-iq-faq":
            faq_md = content
            continue
        inner = md_to_html(content)
        # Add class to tables
        inner = inner.replace("<table>", '<table class="ym-content-table">')
        section_html = wrap_section(sid, title, inner, alt)
        body_parts.append(section_html)

        if sid == "work-iq-mcp":
            body_parts.append(boris)

        if sid == "work-iq-vnedrenie":
            body_parts.append(cta_secondary(env))

        if sid == "work-iq-rossiya":
            body_parts.append(cta_primary_mid(env))

        if sid == "work-iq-nero":
            body_parts.append(cta_footer(env))

        alt = not alt

    if faq_md:
        body_parts.append(faq_section(faq_md))

    # Conclusion from end of longread (after FAQ in source - the **Итог:** paragraph)
    m_itog = re.search(
        r"\*\*Итог:\*\*.*",
        handoff.split("### GEO-чеклист")[0],
        re.DOTALL,
    )
    if m_itog:
        conclusion_md = m_itog.group(0).strip()
        body_parts.append(
            f'<section class="workiq-conclusion reveal"><div class="ym-container">{md_to_html(conclusion_md)}</div></section>'
        )

    reveal_js = (ROOT / "shared/longread-page-reveal.js").read_text(encoding="utf-8")

    json_ld = """<script type="application/ld+json">
<?php
echo wp_json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'Microsoft Work IQ API: как внедрить AI-агентов в Microsoft 365 с MCP',
    'description' => $page_seo_description,
    'author' => ['@type' => 'Organization', 'name' => 'Nero Network'],
    'datePublished' => '2026-06-04',
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => get_permalink()],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
</script>
<script type="application/ld+json">
<?php
echo wp_json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Что такое Work IQ API?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Набор API Microsoft (Chat, Context, Tools, Workspaces) для агентов с доступом к данным и действиям в M365 под Entra ID и политиками compliance.']],
        ['@type' => 'Question', 'name' => 'Когда выходит Work IQ API в GA?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => '16 июня 2026 (анонс 2 июня 2026).']],
        ['@type' => 'Question', 'name' => 'Сколько стоят Copilot Credits за вызов агента?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Tools: 0,1 credit за вызов. Chat/Context: ориентир $0,20–$1,50 за вызов в зависимости от light/medium/heavy.']],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
</script>"""

    html_content = f"""{build_styles()}

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{hero}
{intro_block}
{"".join(body_parts)}
</main>

<script>
{reveal_js.strip()}
</script>
{json_ld}
"""

    if not env.get("_git_template"):
        html_content = apply_cta(html_content, env)

    php_header = """<?php
/**
 * Template Name: Microsoft Work IQ API
 */
$page_seo_title = 'Microsoft Work IQ API: AI-агенты в M365, MCP и Copilot Credits';
$page_seo_description = 'Анонс Work IQ API (GA 16 июня 2026): Chat, Context, Tools и Workspaces для AI-агентов в Microsoft 365. Разбор MCP, Copilot Credits, Copilot Studio и как внедрить аналог для бизнеса в РФ.';

add_filter('document_title_parts', static function (array $parts) use ($page_seo_title): array {
    $parts['title'] = $page_seo_title;
    return $parts;
}, 20);

add_action('wp_head', static function () use ($page_seo_title, $page_seo_description): void {
    echo '<meta name="description" content="' . esc_attr($page_seo_description) . '" />' . "\\n";
    echo '<meta property="og:title" content="' . esc_attr($page_seo_title) . '" />' . "\\n";
    echo '<meta property="og:description" content="' . esc_attr($page_seo_description) . '" />' . "\\n";
    echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\\n";
    echo '<meta property="og:type" content="article" />' . "\\n";
}, 1);

get_header();
?>
"""

    php_footer = "\n<?php get_footer(); ?>\n"
    out_dir = ROOT / "wordpress" if env.get("_git_template") else ROOT / "wordpress-theme"
    out_path = out_dir / f"page-{SLUG}.php"
    out_path.write_text(php_header + html_content + php_footer, encoding="utf-8")

    # stats
    size = len(html_content.encode("utf-8"))
    print(f"Wrote {out_path}")
    print(f"HTML bytes: {size}")
    print(f"PRIMARY set: {bool(env.get('PRIMARY_CTA_URL'))}")
    placeholders = html_content.count("[PRIMARY_CTA") + html_content.count("[SECONDARY_CTA")
    print(f"Remaining placeholders: {placeholders}")


if __name__ == "__main__":
    main()
