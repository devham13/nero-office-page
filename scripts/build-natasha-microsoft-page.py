#!/usr/bin/env python3
"""Сборка page-microsoft-otkaz-claude-code-stoimost-ai-avtomatizaciya.php и блока handoff."""
from __future__ import annotations

import os
import re
from pathlib import Path

ROOT = Path("/workspace")
SLUG = "microsoft-otkaz-claude-code-stoimost-ai-avtomatizaciya"
PAGE_CLASS = f"{SLUG}-page"
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
ALINA = ROOT / ".cursor" / "nero-network-fragments" / "alina.md"
BORIS = ROOT / ".cursor" / "nero-network-fragments" / "boris.md"
OUT_PHP = ROOT / "wordpress-theme" / f"page-{SLUG}.php"

SEO_TITLE = "Microsoft отказ от Claude Code: TCO AI для бизнеса"
SEO_DESC = (
    "Microsoft отзывает Claude Code у инженеров и переводит на Copilot CLI — урок для SMB: "
    "как считать TCO, токены и ROI AI-агентов и когда заказывать внедрение с KPI, "
    "а не «безлимит» для всех."
)

def _env(name: str, default: str) -> str:
    val = os.environ.get(name, default).strip()
    if not val or val == "[REDACTED]":
        return default
    return val


PRIMARY_URL = _env("PRIMARY_CTA_URL", "https://t.me/neronetwork")
PRIMARY_LABEL = _env("PRIMARY_CTA_LABEL", "Обсудить пилот в Telegram")
SECONDARY_URL = _env("SECONDARY_CTA_URL", "#")
SECONDARY_LABEL = _env("SECONDARY_CTA_LABEL", "курс по внедрению ИИ")
SITE_BRAND = _env("SITE_BRAND", "Nero Network")
PUBLIC_HOST = os.environ.get("PUBLIC_SITE_HOST", os.environ.get("WP_SITE_URL", "").replace("https://", "").replace("http://", "").strip("/"))


def extract_fence(path: Path, lang: str = "html") -> str:
    text = path.read_text(encoding="utf-8")
    m = re.search(rf"```{{1,3}}{lang}\s*\n(.*?)```", text, re.DOTALL)
    if not m:
        raise ValueError(f"No ```{lang} block in {path}")
    return m.group(1).strip()


def load_page_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    # strip file header comment block
    css = re.sub(r"^/\*\*.*?\*/\s*", "", css, count=1, flags=re.DOTALL)
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = re.sub(
        r"--ym-primary:\s*#ff0000;",
        "--ym-primary: #2563eb;",
        css,
    )
    css = re.sub(
        r"--ym-accent:\s*#3b82f6;",
        "--ym-accent: #7c3aed;",
        css,
    )
    extra = f"""
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section {{ display: none !important; }}
#primary, .site-main, .site-content, #content, .content-area {{
  padding-top: 0 !important;
  margin-top: 0 !important;
}}
#finops-token-control-room.alina-finops-hero {{
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}}
.{PAGE_CLASS} .ym-content-prose {{
  max-width: 820px;
  margin: 0 auto;
  text-align: left !important;
}}
.{PAGE_CLASS} .ym-content-prose p,
.{PAGE_CLASS} .ym-content-prose li {{
  text-align: left !important;
}}
.{PAGE_CLASS} .ym-content-table-wrap {{
  overflow-x: auto;
  margin: 24px 0;
}}
.{PAGE_CLASS} .ym-content-table-wrap table {{
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
}}
.{PAGE_CLASS} .ym-content-table-wrap th,
.{PAGE_CLASS} .ym-content-table-wrap td {{
  border: 1px solid var(--ym-border);
  padding: 12px 16px;
  text-align: left;
  vertical-align: top;
}}
.{PAGE_CLASS} .ym-content-table-wrap th {{
  background: #f1f5f9;
  font-weight: 700;
}}
.{PAGE_CLASS} .ym-lead-kicker {{
  font-size: 13px;
  font-weight: 800;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--ym-primary);
  margin: 0 0 12px;
}}
.{PAGE_CLASS} .microsoft-finops-intro-grid {{
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: start;
}}
@media (min-width: 900px) {{
  .{PAGE_CLASS} .microsoft-finops-intro-grid {{
    grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
  }}
}}
.{PAGE_CLASS} .microsoft-finops-intro-text {{
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: clamp(16px, 3vw, 28px);
}}
.{PAGE_CLASS} .microsoft-finops-intro-text p {{
  text-align: left !important;
  line-height: 1.65;
  margin: 0 0 16px;
}}
.{PAGE_CLASS} .microsoft-finops-intro-deco .ym-mac-window {{
  margin-bottom: 0;
}}
.{PAGE_CLASS} .ym-h3-block {{
  font-size: 22px;
  font-weight: 700;
  margin: 36px 0 16px;
  color: var(--ym-heading) !important;
}}
.{PAGE_CLASS} .ym-sources {{
  font-size: 14px;
  color: #64748b !important;
  margin-top: 48px;
  padding-top: 24px;
  border-top: 1px solid var(--ym-border);
}}
"""
    return css + extra


def md_inline(s: str) -> str:
    s = re.sub(r"\*\*(.+?)\*\*", r"<strong>\1</strong>", s)
    s = re.sub(
        r"\[([^\]]+)\]\(([^)]+)\)",
        r'<a href="\2" rel="noopener noreferrer">\1</a>',
        s,
    )
    s = re.sub(r"`([^`]+)`", r"<code>\1</code>", s)
    return s


def md_table(block: str) -> str:
    lines = [ln.strip() for ln in block.strip().splitlines() if ln.strip()]
    if len(lines) < 2:
        return f"<p>{md_inline(block)}</p>"
    rows = []
    for i, line in enumerate(lines):
        if re.match(r"^\|[-:\s|]+\|$", line):
            continue
        cells = [c.strip() for c in line.strip("|").split("|")]
        tag = "th" if i == 0 else "td"
        rows.append(
            "<tr>" + "".join(f"<{tag}>{md_inline(c)}</{tag}>" for c in cells) + "</tr>"
        )
    return '<div class="ym-content-table-wrap reveal"><table><tbody>' + "".join(rows) + "</tbody></table></div>"


def md_block_to_html(block: str) -> str:
    block = block.strip()
    if not block:
        return ""
    # table embedded in paragraph run (after bad join)
    if "|" in block and block.count("\n") >= 1 and re.search(r"^\|.+\|", block, re.MULTILINE):
        chunks = re.split(r"\n\n+", block)
        out = []
        for ch in chunks:
            ch = ch.strip()
            if ch.startswith("|"):
                out.append(md_table(ch))
            else:
                out.append(_md_paras_or_lists(ch))
        return "".join(out)
    if block.startswith("|"):
        return md_table(block)
    return _md_paras_or_lists(block)


def _md_paras_or_lists(block: str) -> str:
    block = block.strip()
    if not block:
        return ""
    if block.startswith("- ") or block.startswith("* "):
        items = re.findall(r"^[-*]\s+(.+)$", block, re.MULTILINE)
        lis = "".join(f"<li>{md_inline(it)}</li>" for it in items)
        return f'<ul class="ym-content-list reveal">{lis}</ul>'
    if re.match(r"^\d+\.\s", block, re.MULTILINE):
        items = re.findall(r"^\d+\.\s+(.+)$", block, re.MULTILINE)
        lis = "".join(f"<li>{md_inline(it)}</li>" for it in items)
        return f'<ol class="ym-content-list reveal">{lis}</ol>'
    paras = [p.strip() for p in block.split("\n\n") if p.strip()]
    return "".join(f'<p class="reveal">{md_inline(p)}</p>' for p in paras)


def section_html(section_id: str, title: str, body_md: str, alt: bool = False) -> str:
    cls = "ym-section ym-section-alt" if alt else "ym-section"
    inner = section_body_html(body_md, section_id)
    return f"""
<section class="{cls} reveal" id="{section_id}">
  <div class="ym-container">
    <h2 class="ym-section-title">{md_inline(title)}</h2>
    <div class="ym-content-prose">
      {inner}
    </div>
  </div>
</section>"""


def main_cta() -> str:
    return f"""
<aside class="ym-cta-card reveal" role="complementary" aria-label="Призыв к действию: внедрение с KPI">
  <div class="ym-container">
    <div class="ym-cta-card-inner" style="background:linear-gradient(135deg,#fff 0%,#f8fafc 100%);border:1px solid var(--ym-border);border-radius:20px;padding:clamp(28px,4vw,40px);box-shadow:var(--ym-shadow);border-left:4px solid var(--ym-primary);">
      <p class="ym-cta-eyebrow" style="margin:0 0 8px;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--ym-primary);">Пилот с KPI · Make / n8n / MCP</p>
      <h3 class="ym-cta-title" style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);">Не повторяйте паттерн Uber: внедрите AI с измеримой экономикой</h3>
      <p class="ym-cta-text" style="margin:0 0 20px;max-width:720px;line-height:1.6;">{SITE_BRAND} проектирует <strong>цифровых сотрудников</strong> на процессах: один контур → одна метрика → 90 дней пилота, governance по токенам и интеграция в CRM/документооборот — без «подписки на всех».</p>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" rel="noopener noreferrer" target="_blank"><span>{PRIMARY_LABEL}</span></a>
      </div>
    </div>
  </div>
</aside>"""


def secondary_cta() -> str:
    return f"""
<aside class="ym-cta-inline reveal delay-100" role="note" aria-label="Обучение по внедрению ИИ">
  <p style="margin:24px 0;padding:20px 24px;background:var(--ym-surface);border:1px solid var(--ym-border);border-radius:16px;box-shadow:var(--ym-shadow-sm);line-height:1.65;">
    <strong>Обучение — не галочка в LMS.</strong> Чтобы сценарии под роли (FinOps, интеграторы, владельцы процессов) не превратились в «культуру галочки», имеет смысл пройти структурированный курс по внедрению и автоматизации —
    <a href="{SECONDARY_URL}" rel="noopener noreferrer" target="_blank" style="color:var(--ym-accent);font-weight:600;">{SECONDARY_LABEL}</a>.
  </p>
</aside>"""


def intro_section() -> str:
    return f"""
<section class="ym-section reveal" id="intro-finops">
  <div class="ym-container">
    <div class="microsoft-finops-intro-grid">
      <div class="microsoft-finops-intro-text">
        <p class="ym-lead-kicker">Коротко</p>
        <p><strong>Microsoft</strong> сворачивает внутренний доступ к Claude Code у команд Experiences + Devices к <strong>30 июня 2026</strong> и переводит инженеров на <strong>GitHub Copilot CLI</strong>. Это не «конец Claude» на рынке, а сигнал FinOps: даже гиганты с Foundry и M365 режут usage-based расходы, когда adoption обгоняет измеримый ROI.</p>
        <p>Ниже — как перевести инфоповод в TCO, пилот с KPI и осознанное внедрение ИИ в бизнес.</p>
      </div>
      <div class="microsoft-finops-intro-deco reveal-right delay-200">
        <div class="ym-mac-window" role="img" aria-label="Схема FinOps: аудит токенов, baseline ROI, hard cap">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">finops-pilot.sh</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-command">$</span> audit --tokens --by-process<br>
            <span class="ym-comment"># baseline ROI, 90 дней</span><br>
            <span class="ym-command">$</span> route --cheap-model routine<br>
            <span class="ym-command">$</span> cap --hard 80% --alert CFO<br>
            <span class="ym-comment"># не leaderboard usage → FinOps</span>
          </div>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление статьи">
      <a href="#section-microsoft">Microsoft и Claude Code</a>
      <a href="#section-tco">Токены и TCO</a>
      <a href="#section-roi">ROI внедрения</a>
      <a href="#section-pilot">Пилот vs масштаб</a>
      <a href="#section-tools">Инструменты 2026</a>
      <a href="#section-integrator">Интегратор vs подписки</a>
      <a href="#section-checklist">Чек-лист CFO</a>
      <a href="#section-faq">FAQ</a>
    </nav>
  </div>
</section>"""


def bento_after_tco() -> str:
    return """
<div class="ym-bento-grid reveal delay-200" aria-label="Ключевые метрики FinOps">
  <div class="ym-bento-card ym-bento-main">
    <p class="ym-stat-label">Парадокс Gartner · 2026</p>
    <p class="ym-stat-value" style="font-size:28px;">−90% unit cost</p>
    <p style="margin:0;color:#64748b!important;line-height:1.5;">При росте agentic usage в <strong>5–30×</strong> совокупный счёт enterprise может расти, даже когда токен дешевеет.</p>
  </div>
  <div class="ym-bento-card ym-bento-stat">
    <p class="ym-stat-value">40–60%</p>
    <p class="ym-stat-label">TCO — не «модель»</p>
    <span class="ym-stat-trend">интеграция · процессы</span>
  </div>
  <div class="ym-bento-card ym-bento-stat">
    <p class="ym-stat-value">~4 мес</p>
    <p class="ym-stat-label">кейс Uber · coding AI</p>
    <span class="ym-stat-trend" style="background:rgba(220,38,38,0.1);color:#dc2626!important;">бюджет исчерпан</span>
  </div>
  <div class="ym-bento-card ym-bento-wide">
    <p class="ym-stat-label">Пилот с KPI</p>
    <p style="margin:8px 0 0;font-weight:600;color:var(--ym-heading)!important;">90 дней → пересмотр гипотезы, не «масштаб надежды»</p>
  </div>
</div>"""


def faq_section() -> str:
    faqs = [
        (
            "faq-ms-claude",
            "Microsoft полностью отказалась от Claude?",
            'Нет. Отзываются <strong>внутренние</strong> лицензии <strong>Claude Code</strong> в <strong>Experiences + Devices</strong> к <strong>30.06.2026</strong>. <strong>Foundry</strong>, <strong>M365</strong> и доступ к моделям Anthropic для клиентов Azure — отдельная линия (<a href="https://www.theverge.com/tech/930447/microsoft-claude-code-discontinued-notepad" rel="noopener noreferrer">The Verge</a>, <a href="https://learn.microsoft.com/en-us/azure/foundry/foundry-models/how-to/use-foundry-models-claude" rel="noopener noreferrer">Microsoft Learn</a>).',
        ),
        (
            "faq-uber-sum",
            "Сколько Uber потратила на AI в 2026?",
            "<strong>Точная сумма годового AI-бюджета в открытых источниках не раскрыта.</strong> Подтверждено исчерпание бюджета на coding tools за <strong>~4 месяца</strong> после массового внедрения Claude Code (<a href=\"https://finance.yahoo.com/sectors/technology/articles/uber-burned-entire-2026-ai-180347400.html\" rel=\"noopener noreferrer\">Yahoo Finance / Fortune</a>).",
        ),
        (
            "faq-gartner",
            "Почему счёт растёт, если Gartner обещает дешевле inference?",
            "Agentic-сценарии едят <strong>в 5–30 раз больше токенов</strong> на задачу, чем чат-бот; при росте usage быстрее падения unit cost <strong>совокупные costs</strong> растут (<a href=\"https://www.gartner.com/en/newsroom/press-releases/2026-03-25-gartner-predicts-that-by-2030-performing-inference-on-an-llm-with-1-trillion-parameters-will-cost-genai-providers-over-90-percent-less-than-in-2025\" rel=\"noopener noreferrer\">Gartner</a>).",
        ),
        (
            "faq-claude-code",
            "Что такое Claude Code простыми словами?",
            'Terminal-based агент для разработки: планирование, правки кода, shell, многошаговые задачи (<a href="https://code.claude.com/docs/ru/how-claude-code-works" rel="noopener noreferrer">документация</a>).',
        ),
        (
            "faq-roi-formula",
            "Какая формула ROI внедрения ИИ?",
            "<code>((Выгода − Затраты) / Затраты) × 100%</code> при зафиксированной базовой линии (<a href=\"https://habr.com/ru/companies/beeline_cloud/articles/1034668/\" rel=\"noopener noreferrer\">Habr / beeline cloud</a>).",
        ),
        (
            "faq-integrator",
            "Когда нужен интегратор вместо подписок на всех?",
            "Когда процесс затрагивает CRM/документы/KPI, нужны <strong>MCP</strong>, governance и <strong>пилот 90 дней</strong> с измеримым эффектом — иначе риск повторить Uber/Microsoft-паттерн перерасхода.",
        ),
        (
            "faq-rf",
            "Что использовать в РФ, если западный стек ограничен?",
            '<strong>GigaChat</strong>, <strong>YandexGPT</strong>, on-prem/open-source + RAG; единой замены Claude Code нет, но <strong>TCO операции</strong> считается так же (<a href="https://vc.ru/aihub/2842998-obzor-rossiyskih-neyrosetey-2026-goda" rel="noopener noreferrer">vc.ru</a>).',
        ),
        (
            "faq-cost-avg",
            "Сколько стоит внедрение нейросетей «в среднем по рынку»?",
            "Универсальной цифры нет: зависит от TCO (интеграция 40–60%+, лицензии, обучение). Ориентир — <strong>пилот с KPI ~90 дней</strong>, затем защита масштаба тремя сценариями ROI.",
        ),
        (
            "faq-copilot-cli",
            "Чем Copilot CLI отличается для бизнеса от «просто Copilot в браузере»?",
            "CLI-агент встроен в инженерный контур (репозитории, политики, agentic workflow) — ставка Microsoft на <strong>стандартизацию</strong> внутренней разработки, а не на разовый чат.",
        ),
    ]
    sidebar = "".join(
        f'<li><a href="#{fid}">{q}</a></li>' for fid, q, _ in faqs
    )
    items = "".join(
        f'<article class="ym-faq-item reveal" id="{fid}"><h3>{q}</h3><p>{a}</p></article>'
        for fid, q, a in faqs
    )
    return f"""
<section class="ym-section ym-section-alt reveal" id="section-faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin:0 0 16px;font-size:18px;">Вопросы</h3>
        <ul class="ym-faq-list">{sidebar}</ul>
      </aside>
      <div>{items}</div>
    </div>
  </div>
</section>"""


def parse_sections_from_handoff() -> dict[str, str]:
    text = HANDOFF.read_text(encoding="utf-8")
    m = re.search(
        r"=== АРТУР \(CTA И РЕКЛАМА\) ===.*?### Полный текст\n(.*?)\n### Рекламные вставки",
        text,
        re.DOTALL,
    )
    if not m:
        raise ValueError("Artur full text not found")
    body = m.group(1)
    body = re.sub(r"^# .+\n\n", "", body, count=1)
    sections: dict[str, str] = {}
    current_title = None
    current_lines: list[str] = []
    for line in body.splitlines():
        if line.startswith("## "):
            if current_title:
                sections[current_title] = "\n".join(current_lines).strip()
            current_title = line[3:].strip()
            current_lines = []
        elif line.strip() == "---":
            continue
        else:
            current_lines.append(line)
    if current_title:
        sections[current_title] = "\n".join(current_lines).strip()
    return sections


def section_body_html(body_md: str, id_prefix: str) -> str:
    parts = []
    current: list[str] = []
    for line in body_md.splitlines():
        if line.startswith("### "):
            if current:
                parts.append(md_block_to_html("\n".join(current)))
                current = []
            parts.append(
                f'<h3 class="ym-h3-block reveal" id="{id_prefix}-{len(parts)}">{md_inline(line[4:].strip())}</h3>'
            )
        else:
            current.append(line)
    if current:
        parts.append(md_block_to_html("\n".join(current)))
    return "\n".join(parts)


def build_tco_section(body: str) -> str:
    """Split TCO section to inject secondary CTA after TCO list, before Uber."""
    marker = "### Кейс Uber: годовой AI-бюджет за 4 месяца"
    if marker in body:
        before, after = body.split(marker, 1)
        before_html = section_body_html(before, "section-tco")
        after_html = (
            '<h3 class="ym-h3-block reveal" id="section-tco-uber-0">Кейс Uber: годовой AI-бюджет за 4 месяца</h3>'
            + section_body_html(after, "section-tco-uber")
        )
        inner = before_html + secondary_cta() + after_html + bento_after_tco()
    else:
        inner = section_body_html(body, "section-tco")
    return f"""
<section class="ym-section ym-section-alt reveal" id="section-tco">
  <div class="ym-container">
    <h2 class="ym-section-title">Почему корпорации режут «безлимитный» AI: токены и TCO</h2>
    <div class="ym-content-prose">
      {inner}
    </div>
  </div>
</section>"""


def json_ld() -> str:
    page_url = f"https://{PUBLIC_HOST}/{SLUG}/" if PUBLIC_HOST else ""
    return f"""<script type="application/ld+json">
{{
  "@context": "https://schema.org",
  "@graph": [
    {{
      "@type": "Article",
      "headline": "Microsoft отказывается от Claude Code: как считать экономику AI-автоматизации для бизнеса",
      "description": {repr(SEO_DESC)},
      "inLanguage": "ru-RU",
      "author": {{"@type": "Organization", "name": {repr(SITE_BRAND)}}},
      "publisher": {{"@type": "Organization", "name": {repr(SITE_BRAND)}}},
      "mainEntityOfPage": {repr(page_url) if page_url else '"#"'}
    }},
    {{
      "@type": "FAQPage",
      "mainEntity": [
        {{
          "@type": "Question",
          "name": "Microsoft полностью отказалась от Claude?",
          "acceptedAnswer": {{"@type": "Answer", "text": "Нет. Отзываются внутренние лицензии Claude Code в Experiences + Devices к 30.06.2026."}}
        }},
        {{
          "@type": "Question",
          "name": "Сколько Uber потратила на AI в 2026?",
          "acceptedAnswer": {{"@type": "Answer", "text": "Точная сумма годового AI-бюджета в открытых источниках не раскрыта. Подтверждено исчерпание бюджета на coding tools за около 4 месяцев."}}
        }},
        {{
          "@type": "Question",
          "name": "Почему счёт растёт, если Gartner обещает дешевле inference?",
          "acceptedAnswer": {{"@type": "Answer", "text": "Agentic-сценарии потребляют в 5–30 раз больше токенов на задачу, чем чат-бот."}}
        }}
      ]
    }}
  ]
}}
</script>"""


def build_html_body() -> str:
    hero = extract_fence(ALINA, "html")
    boris = extract_fence(BORIS, "html")
    sections = parse_sections_from_handoff()
    css = load_page_css()
    reveal = REVEAL_JS.read_text(encoding="utf-8")

    mapping = [
        ("section-roi", "Как считать ROI и окупаемость внедрения ИИ", True),
        ("section-pilot", "Пилот vs масштаб: когда не раздавать AI всем сотрудникам", False),
        ("section-tools", "Инструменты 2026: Claude Code, Copilot CLI, Cursor и агенты", True),
        ("section-integrator", "Внедрение у интегратора vs самостоятельные подписки", False),
        ("section-checklist", "Чек-лист для владельца бизнеса перед масштабированием AI", True),
    ]

    parts = [
        f"<style>\n{css}\n</style>",
        f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">',
        hero,
        intro_section(),
        section_html(
            "section-microsoft",
            "Что произошло: Microsoft, Claude Code и Copilot CLI",
            sections["Что произошло: Microsoft, Claude Code и Copilot CLI"],
            False,
        ),
        boris,
        build_tco_section(sections["Почему корпорации режут «безлимитный» AI: токены и TCO"]),
    ]

    for sid, title, alt in mapping:
        body = sections.get(title, "")
        if sid == "section-integrator":
            parts.append(section_html(sid, title, body, alt))
            parts.append(main_cta())
        else:
            parts.append(section_html(sid, title, body, alt))

    sources = """
<p class="ym-sources reveal">Материал подготовлен на основе первоисточников:
<a href="https://www.theverge.com/tech/930447/microsoft-claude-code-discontinued-notepad" rel="noopener noreferrer">The Verge</a>,
<a href="https://habr.com/ru/news/1036392/" rel="noopener noreferrer">Habr News</a>,
<a href="https://startupfortune.com/microsofts-ai-cost-warning-makes-automation-math-harder/" rel="noopener noreferrer">Startup Fortune</a>,
<a href="https://www.gartner.com/en/newsroom/press-releases/2026-03-25-gartner-predicts-that-by-2030-performing-inference-on-an-llm-with-1-trillion-parameters-will-cost-genai-providers-over-90-percent-less-than-in-2025" rel="noopener noreferrer">Gartner</a>,
<a href="https://finance.yahoo.com/sectors/technology/articles/uber-burned-entire-2026-ai-180347400.html" rel="noopener noreferrer">Fortune/Yahoo Finance (Uber)</a>,
<a href="https://habr.com/ru/companies/beeline_cloud/articles/1034668/" rel="noopener noreferrer">Habr / beeline cloud (ROI)</a>.</p>
"""
    parts.append(faq_section())
    parts.append(f'<section class="ym-section"><div class="ym-container">{sources}</div></section>')
    parts.append("</main>")
    parts.append(f"<script>\n{reveal}\n</script>")
    parts.append(json_ld())
    return "\n".join(parts)


def build_php(html_body: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    return f"""<?php
/**
 * Template Name: Microsoft Claude Code TCO FinOps
 * Description: Лонгрид — экономика AI-автоматизации, FinOps, TCO/ROI.
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

{html_body}

<?php
get_footer();
"""


def update_handoff(html_body: str) -> None:
    text = HANDOFF.read_text(encoding="utf-8")
    natasha_block = f"""=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

### Структура страницы
- Hero Алины (`#finops-token-control-room`, canvas `microsoft-finops-hero-canvas`)
- Введение слева + терминал + `.ym-toc`
- `#section-microsoft` → блок Бориса (`boris-tco-finops-canvas`) → `#section-tco` (+ bento, вторичный CTA)
- `#section-roi`, `#section-pilot`, `#section-tools`, `#section-integrator` (+ главный CTA), `#section-checklist`, `#section-faq`
- Reveal IntersectionObserver + JSON-LD Article/FAQPage

### HTML
{html_body}

## Передача Юре
SLUG: {SLUG}
Контент содержит <script> (hero engine + boris engine + reveal) и <canvas>. Обязательно обернуть в <!-- wp:html --> при публикации.
Файл темы: `wordpress-theme/page-{SLUG}.php`
"""
    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in text:
        text = re.sub(
            r"=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            natasha_block,
            text,
            flags=re.DOTALL,
        )
    else:
        text = text.rstrip() + "\n\n" + natasha_block
    HANDOFF.write_text(text, encoding="utf-8")


def main() -> None:
    OUT_PHP.parent.mkdir(parents=True, exist_ok=True)
    html = build_html_body()
    php = build_php(html)
    OUT_PHP.write_text(php, encoding="utf-8")
    update_handoff(html)
    print(len(html))
    print(str(OUT_PHP))


if __name__ == "__main__":
    main()
