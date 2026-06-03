#!/usr/bin/env python3
"""Сборка HTML лонгрида Наташи: bezopasnoe-vnedrenie-generativnogo-ii-biznes."""
from __future__ import annotations

import os
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SLUG = "bezopasnoe-vnedrenie-generativnogo-ii-biznes"
PAGE_CLASS = f"{SLUG}-page"
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme" / f"page-{SLUG}.php"
OUT_HTML_SNIP = ROOT / ".cursor" / f"{SLUG}-page-html.txt"

def _cta_config(git_safe: bool) -> tuple[str, str, str, str]:
    if git_safe:
        return (
            "#cta-safe-genai-audit",
            "Обсудить безопасный контур",
            "#cta-training-title",
            "Записаться на обучение",
        )
    return (
        os.environ.get("PRIMARY_CTA_URL", "#"),
        os.environ.get("PRIMARY_CTA_LABEL", "Обсудить проект"),
        os.environ.get("SECONDARY_CTA_URL", "#"),
        os.environ.get("SECONDARY_CTA_LABEL", "Записаться на обучение"),
    )


PRIMARY_URL, PRIMARY_LABEL, SECONDARY_URL, SECONDARY_LABEL = _cta_config(git_safe=False)

SEO_TITLE = "Генеративный ИИ в бизнесе без утечек: безопасное внедрение"
SEO_DESC = (
    "42,5% компаний боятся утечек при genAI. Исследование УЦСБ и «Солар»: "
    "контур, политики, AI-шлюзы, human-in-the-loop — как внедрить без теневого ИИ."
)
def _site_url(git_safe: bool) -> str:
    if git_safe:
        return ""
    return os.environ.get("WP_SITE_URL", os.environ.get("PUBLIC_SITE_URL", ""))


SITE_URL = _site_url(git_safe=False)


def extract_codeblock(handoff: str, marker: str) -> str:
    idx = handoff.find(marker)
    if idx < 0:
        raise ValueError(f"Marker not found: {marker}")
    rest = handoff[idx:]
    m = re.search(r"```html\n(.*?)```", rest, re.DOTALL)
    if not m:
        raise ValueError(f"No html block after {marker}")
    return m.group(1).strip()


def page_css() -> str:
    raw = CSS_REF.read_text(encoding="utf-8")
    # strip file header comment block
    raw = re.sub(r"^/\*\*.*?\*/\n", "", raw, count=1, flags=re.DOTALL)
    css = raw.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    extra = f"""
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section {{ display: none !important; }}
#primary, .site-main, .site-content, #content, .content-area {{
  padding-top: 0 !important;
  margin-top: 0 !important;
}}
.{PAGE_CLASS} .genai-perimeter-hero {{
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}}
.{PAGE_CLASS} :root {{
  --ym-primary: #059669;
  --ym-accent: #0ea5e9;
}}
.bezopasnoe-intro-section {{ padding: clamp(48px, 6vw, 80px) 0 40px; }}
.bezopasnoe-intro-grid {{
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: start;
}}
@media (min-width: 900px) {{
  .bezopasnoe-intro-grid {{ grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr); gap: 40px; }}
}}
.bezopasnoe-intro-text {{
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: clamp(16px, 3vw, 28px);
}}
.bezopasnoe-intro-text p {{
  text-align: left !important;
  font-size: 17px;
  line-height: 1.7;
  color: var(--ym-text) !important;
  margin: 0 0 14px;
}}
.bezopasnoe-intro-text p:last-child {{ margin-bottom: 0; }}
.ym-toc-wrap {{ margin-top: 48px; text-align: center; }}
.{PAGE_CLASS} .ym-prose {{
  max-width: 900px;
  margin: 0 auto;
}}
.{PAGE_CLASS} .ym-prose h2 {{
  font-size: clamp(26px, 3vw, 36px);
  font-weight: 800;
  margin: 0 0 20px;
  letter-spacing: -0.5px;
  scroll-margin-top: 100px;
}}
.{PAGE_CLASS} .ym-prose h3 {{
  font-size: 20px;
  font-weight: 700;
  margin: 32px 0 14px;
  scroll-margin-top: 100px;
}}
.{PAGE_CLASS} .ym-prose p, .{PAGE_CLASS} .ym-prose li {{
  line-height: 1.7;
  margin-bottom: 16px;
}}
.{PAGE_CLASS} .ym-prose table {{
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 15px;
}}
.{PAGE_CLASS} .ym-prose th, .{PAGE_CLASS} .ym-prose td {{
  border: 1px solid var(--ym-border);
  padding: 12px 16px;
  text-align: left;
}}
.{PAGE_CLASS} .ym-prose th {{ background: #f1f5f9; font-weight: 700; }}
.{PAGE_CLASS} .ym-prose a {{ color: var(--ym-accent); }}
.ym-cta-band {{ padding: 60px 0; }}
"""
    return css + extra


def cta_primary_1() -> str:
    return f"""<section class="ym-section ym-section-alt ym-cta-band" id="cta-safe-genai-audit" aria-labelledby="cta-safe-genai-audit-title">
  <div class="ym-container">
    <div class="ym-card reveal" style="max-width: 920px; margin: 0 auto; padding: clamp(32px, 5vw, 48px); text-align: center;">
      <p class="ym-section-subtitle" style="margin: 0 auto 12px; font-size: 13px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ym-accent);">Nero Network</p>
      <h3 id="cta-safe-genai-audit-title" style="font-size: clamp(22px, 3vw, 28px); font-weight: 800; margin: 0 0 16px; color: var(--ym-heading);">Уберите теневой ChatGPT — без утечек в публичные модели</h3>
      <p style="color: #64748b; line-height: 1.65; margin: 0 0 28px; max-width: 640px; margin-left: auto; margin-right: auto;">Поможем пройти путь за 90 дней: диагностика теневого ИИ, регламент зелёный/жёлтый/красный, пилот в Make/n8n/MCP с human-in-the-loop — по цифрам исследования УЦСБ и «Солар».</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
      </div>
    </div>
  </div>
</section>"""


def cta_secondary() -> str:
    return f"""<aside class="ym-card reveal" style="margin: 32px 0; padding: clamp(24px, 4vw, 36px); border-left: 4px solid var(--ym-accent);" aria-labelledby="cta-training-title">
  <h3 id="cta-training-title" style="font-size: 20px; font-weight: 700; margin: 0 0 12px; color: var(--ym-heading);">Обучение сотрудников — снимаем барьер 35% «нехватка компетенций»</h3>
  <p style="color: #64748b; line-height: 1.6; margin: 0 0 20px;">Воркшопы по безопасным промптам, антипаттернам утечек и работе с утверждёнными инструментами — в связке с политикой ИИ, а не вместо неё.</p>
  <a class="ym-btn ym-btn-secondary" href="{SECONDARY_URL}" target="_blank" rel="noopener noreferrer"><span>{SECONDARY_LABEL}</span></a>
</aside>"""


def cta_primary_2() -> str:
    return f"""<section class="ym-section ym-cta-band" id="cta-roadmap" aria-labelledby="cta-roadmap-title">
  <div class="ym-container">
    <div class="ym-bento-card ym-bento-wide reveal" style="padding: clamp(32px, 5vw, 48px); text-align: center;">
      <h3 id="cta-roadmap-title" style="font-size: clamp(22px, 3vw, 28px); font-weight: 800; margin: 0 0 12px; color: var(--ym-heading);">Готовы к пилоту в закрытом контуре?</h3>
      <p style="color: #64748b; line-height: 1.65; margin: 0 0 24px; max-width: 680px; margin-left: auto; margin-right: auto;">Обсудим один сценарий (CRM, документооборот, поддержка) с метриками ROI и контролем ИБ — без «ещё одного чат-бота на сайте».</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
      </div>
    </div>
  </div>
</section>"""


def intro_section() -> str:
    return """<section class="ym-section bezopasnoe-intro-section" id="intro">
  <div class="ym-container">
    <div class="bezopasnoe-intro-grid reveal">
      <div class="bezopasnoe-intro-text">
        <p><strong>Коротко:</strong> 3 июня 2026 года УЦСБ и ГК «Солар» опубликовали опрос 102 российских компаний: почти 60% уже используют ИИ, но <strong>42,5%</strong> тех, кто ещё не внедрил genAI в рабочую среду, называют <strong>утечку данных</strong> главным барьером.</p>
        <p>Ниже — как перейти от страха и «теневого» ChatGPT к управляемому корпоративному контуру: политики, AI Security, human-in-the-loop и автоматизация в Make/n8n/MCP без утечек в публичные модели.</p>
      </div>
      <div class="bezopasnoe-intro-decor reveal delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">ai-security-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-comment"># Снимок контура</span></div>
            <div><span class="ym-command">audit</span> shadow_ai_traffic</div>
            <div><span class="ym-command">classify</span> green | yellow | red</div>
            <div><span class="ym-command">route</span> --gateway corp_llm</div>
            <div><span class="ym-command">approve</span> human_in_the_loop</div>
            <div><span class="ym-comment"># KPI: 42.5% → managed</span></div>
          </div>
        </div>
        <div class="ym-bento-grid" style="margin-top: 16px; grid-template-columns: repeat(2, 1fr);">
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-300">
            <div class="ym-stat-value">42,5%</div>
            <div class="ym-stat-label">барьер «утечки»</div>
          </div>
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-400">
            <div class="ym-stat-value">×30</div>
            <div class="ym-stat-label">трафик в публичные LLM</div>
          </div>
        </div>
      </div>
    </div>
    <nav class="ym-toc-wrap reveal delay-200" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#pochemu-kompanii-tormozyat-genai">Барьеры genAI</a>
        <a href="#tenevoy-ii">Теневой ИИ</a>
        <a href="#korporativnyy-kontur">Корпоративный контур</a>
        <a href="#politika-ii">Политика и обучение</a>
        <a href="#human-in-the-loop">Human-in-the-loop</a>
        <a href="#prakticheskoe-vnedrenie">Внедрение 90 дней</a>
        <a href="#faq-bezopasnoe-vnedrenie">FAQ</a>
      </div>
    </nav>
  </div>
</section>"""


def bento_barriers() -> str:
    return """<div class="ym-bento-grid reveal">
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">42,5%</div>
        <div class="ym-stat-label">утечки и конфиденциальность</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">35%</div>
        <div class="ym-stat-label">нехватка компетенций</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">32,5%</div>
        <div class="ym-stat-label">нет сценариев</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">40%</div>
        <div class="ym-stat-label">уже в гибридном режиме</div>
      </div>
    </div>"""


def article_body() -> str:
    """Основной контент Жени в HTML (секции с якорями)."""
    return f"""
<section class="ym-section ym-section-alt" id="pochemu-kompanii-tormozyat-genai">
  <div class="ym-container ym-prose reveal">
    <h2>Почему компании тормозят genAI: утечки как главный барьер (исследование УЦСБ × «Солар», 102 компании)</h2>
    <p><strong>Определение:</strong> <em>Безопасное внедрение генеративного ИИ</em> — это внедрение LLM и агентов в бизнес-процессы с заранее заданными правилами классификации данных, контролем промптов и ответов, обучением сотрудников и техническим контуром (шлюз, on-prem или корпоративное облако), а не разовая покупка «ещё одного чат-бота».</p>
    <p>3 июня 2026 года ComNews опубликовал результаты совместного исследования <strong>УЦСБ</strong> и <strong>ГК «Солар»</strong>: опрошены <strong>102 компании</strong> из <strong>10 отраслей</strong>.</p>
    <h3 id="cifry-issledovaniya">Цифры: 59,6% уже используют ИИ, 33,3% — LLM, 42,5% — страх утечек</h3>
    <p>По данным исследования (<a href="https://www.comnews.ru/content/245648/2026-06-03/2026-w23/1010/risk-utechki-dannykh-stal-glavnym-barerom-dlya-vnedreniya-generativnogo-ii-biznese" target="_blank" rel="noopener noreferrer">ComNews, 03.06.2026</a>):</p>
    <ul>
      <li><strong>59,6%</strong> компаний уже используют различные формы ИИ в работе;</li>
      <li><strong>33,3%</strong> работают с <strong>LLM</strong> и их комбинациями;</li>
      <li><strong>32,3%</strong> пока не применяют ИИ, но изучают или планируют внедрение;</li>
      <li>лишь <strong>3%</strong> заявили о полностью автоматизированных решениях на базе ИИ.</li>
    </ul>
    <p>Параллельно около <strong>40%</strong> ИТ- и ИБ-специалистов уже работают в <strong>гибридном режиме</strong>.</p>
    {bento_barriers()}
    <h3 id="drugie-barery">Другие барьеры: компетенции (35%), отсутствие сценариев (32,5%)</h3>
    <table>
      <thead><tr><th>Барьер</th><th>Доля среди не внедривших ИИ</th></tr></thead>
      <tbody>
        <tr><td>Утечки и конфиденциальность</td><td><strong>42,5%</strong></td></tr>
        <tr><td>Нехватка компетенций</td><td><strong>35%</strong></td></tr>
        <tr><td>Нет понятных экономически обоснованных сценариев</td><td><strong>32,5%</strong></td></tr>
        <tr><td>Регуляторная неопределённость</td><td><strong>25%</strong></td></tr>
        <tr><td>Высокая стоимость</td><td><strong>20%</strong></td></tr>
      </tbody>
    </table>
    <h3 id="citaty-ekspertov">Цитаты экспертов: AI Security, защита ИИ-трафика (Тодышев, Вассунов)</h3>
    <p><strong>Евгений Тодышев</strong> (УЦСБ): «Компании видят высокий потенциал в ИИ, но хотят чётко понимать, как не потерять данные и контроль… бизнес остро нуждается в <strong>обучении сотрудников</strong> и внутренних политиках <strong>AI Security</strong>.»</p>
    <p><strong>Иван Вассунов</strong> («Солар»): в <strong>2025 году</strong> трафик в публичные LLM вырос <strong>в 30 раз</strong>, при этом только <strong>25%</strong> компаний разработали политики ИБ для работы сотрудников с ИИ.</p>
  </div>
</section>

<section class="ym-section" id="tenevoy-ii">
  <div class="ym-container ym-prose reveal">
    <h2>Что ломается при «теневом» ИИ: публичные чат-боты и коммерческая тайна</h2>
    <p><strong>Определение:</strong> <em>Теневой ИИ в компании</em> — использование публичных GenAI-сервисов без утверждённых правил и без учёта <strong>ФЗ-152</strong>, <strong>ФЗ-98</strong> и внутренних регламентов.</p>
    <h3 id="rost-trafika">Рост трафика в публичные LLM и риск промптов с PII</h3>
    <p>Исследование «Солар» (<strong>150 организаций</strong>, февраль 2026): объём чувствительных данных в публичные ИИ за <strong>2025 год</strong> вырос <strong>в 30 раз</strong>; около <strong>60%</strong> компаний без формализованных правил; <strong>46%</strong> конфиденциальных промптов уходит через <strong>ChatGPT</strong>.</p>
    <p><strong>Lasso Security</strong>: <strong>13%</strong> промптов содержат чувствительные организационные данные.</p>
    <p><strong>Verizon DBIR 2026</strong>: доля сотрудников, регулярно использующих ИИ, выросла с <strong>15% до 45%</strong>; <strong>67%</strong> — через некорпоративные аккаунты.</p>
    <h3 id="keisy-community-bank">Кейсы: Community Bank, Verizon/Lasso</h3>
    <p><strong>Community Bank (май 2026)</strong> — обработка непубличных данных через <strong>несанкционированное ИИ-приложение</strong>; инцидент признан <strong>material</strong> (<a href="https://www.sec.gov/Archives/edgar/data/1605301/000160530126000021/cbfv-20260507.htm" target="_blank" rel="noopener noreferrer">SEC Form 8-K</a>).</p>
    <h3 id="pochemu-zaprety-ne-rabotayut">Почему запреты без альтернативы не работают</h3>
    <p><strong>Илья Рыбальченко</strong>, ICS Consulting: «Запреты не работают… запрет использовать публичные ИИ повышает трение и выталкивает практику в серую зону».</p>
    <p><strong>Коротко:</strong> стратегия «запрет публичных чатов gpt в офисе» без <strong>зелёной зоны</strong> — утверждённых инструментов, обучения и сценариев — увеличивает <strong>теневой ии</strong>, а не снижает риски.</p>
  </div>
</section>

<!-- BORIS_BLOCK -->

{cta_primary_1()}

<section class="ym-section ym-section-alt" id="korporativnyy-kontur">
  <div class="ym-container ym-prose reveal">
    <h2>Корпоративный контур генеративного ИИ: on-prem, закрытые модели, AI-шлюзы</h2>
    <p><strong>Определение:</strong> <em>Корпоративный контур ии</em> — изолированная среда, где запросы к LLM проходят через <strong>ai шлюз</strong>, логируются и фильтруются DLP.</p>
    <h3 id="dlp-filtratsiya">DLP и фильтрация промптов/ответов</h3>
    <p>Вендоры <strong>AI Gateway</strong> закрывают маскирование ПДн и RBAC — но покупатель часто остаётся один с change management. Важно разделять <strong>продукт</strong>, <strong>процесс</strong> и <strong>внедрение под ключ</strong>.</p>
    <h3 id="razdelenie-sred">Разделение сред: dev / prod / персональные устройства</h3>
    <p><strong>prod</strong> — только утверждённые модели; <strong>dev</strong> — тестовые данные без ПДн; личные устройства — зона максимального риска.</p>
    <h3 id="fz152-komplaens">ФЗ-152, комплаенс и коммерческая тайна в эпоху genAI</h3>
    <p>Тема <strong>«фз 152 и нейросети»</strong> перестала быть только для госсектора. <strong>Итог:</strong> внедрение — одновременно ИТ-, ИБ- и HR/комплаенс-проект.</p>
  </div>
</section>

<section class="ym-section" id="politika-ii">
  <div class="ym-container ym-prose reveal">
    <h2>Политика использования ИИ и обучение сотрудников</h2>
    <h3 id="chto-razresheno">Что разрешено, что запрещено, куда эскалировать инцидент</h3>
    <table>
      <thead><tr><th>Уровень данных</th><th>Примеры</th><th>Разрешённые инструменты</th></tr></thead>
      <tbody>
        <tr><td><strong>Зелёный</strong></td><td>обезличенные FAQ</td><td>корпоративный чат, агенты в контуре</td></tr>
        <tr><td><strong>Жёлтый</strong></td><td>внутренние процессы без ПДн</td><td>только через ai шлюз</td></tr>
        <tr><td><strong>Красный</strong></td><td>ПДн, договоры, код</td><td>запрет публичных LLM; human-in-the-loop</td></tr>
      </tbody>
    </table>
    <h3 id="chek-list-hr">Чек-лист для HR, ИБ и руководителей</h3>
    <ol>
      <li>Есть ли утверждённая <strong>политика использования ии</strong>?</li>
      <li>Обучены ли сотрудники безопасной работе с ИИ?</li>
      <li>Есть ли <strong>законная альтернатива</strong> личному ChatGPT?</li>
      <li>Включён ли <strong>аудит промптов</strong> на корпоративном шлюзе?</li>
      <li>Назначены ли владельцы сценариев?</li>
      <li>Проведён ли пилот с метриками?</li>
      <li>Согласован ли roadmap с <strong>AI Security</strong>?</li>
    </ol>
    <h3 id="snizhenie-tenevogo-ii">Снижение теневого ИИ через понятные инструменты</h3>
    <p>Nero Network закрывает пробел обзоров: <strong>диагностика теневого ИИ → регламент → обучение → утверждённые агенты</strong> в Make/n8n/MCP вместо личного ChatGPT.</p>
    {cta_secondary()}
  </div>
</section>

<section class="ym-section ym-section-alt" id="human-in-the-loop">
  <div class="ym-container ym-prose reveal">
    <h2>Human-in-the-loop и гибридный режим: когда человек обязателен</h2>
    <h3 id="kritichnye-processy">Критичные процессы: финансы, юристы, персональные данные</h3>
    <p>Для договоров, финансов, ПДн, публикаций и <strong>исходного кода</strong> human-in-the-loop обязателен. Community Bank напоминает: material incident возможен без «взлома».</p>
    <h3 id="audit-promptov">Аудит промптов и логирование</h3>
    <p><strong>Аудит промптов</strong> — доказательная база для ИБ и комплаенса.</p>
    <h3 id="metriki-kachestva">Метрики качества и ответственности</h3>
    <ul>
      <li>доля запросов через корпоративный контур vs публичные сервисы;</li>
      <li>число инцидентов DLP;</li>
      <li>время цикла «черновик ИИ → approve»;</li>
      <li>удовлетворённость пользователей;</li>
      <li>экономический эффект по сценарию.</li>
    </ul>
  </div>
</section>

<section class="ym-section" id="prakticheskoe-vnedrenie">
  <div class="ym-container ym-prose reveal">
    <h2>Практическое внедрение: CRM, документооборот, агенты Make/n8n/MCP в контуре</h2>
    <h3 id="stsenarii-bez-utechek">Сценарии без утечек: закрытые API, корпоративные ключи</h3>
    <p>Черновики в CRM с approve, RAG в контуре, классификация обращений, агенты на Make/n8n с LLM только через корпоративный endpoint.</p>
    <h3 id="roadmap-90-dney">От пилота к масштабу: roadmap на 90 дней</h3>
    <table>
      <thead><tr><th>Фаза</th><th>Срок</th><th>Действия</th></tr></thead>
      <tbody>
        <tr><td><strong>Диагностика</strong></td><td>недели 1–2</td><td>интервью ИБ/ИТ; оценка теневого трафика</td></tr>
        <tr><td><strong>Регламент</strong></td><td>недели 3–4</td><td>зелёный/жёлтый/красный; политика</td></tr>
        <tr><td><strong>Обучение</strong></td><td>недели 5–6</td><td>воркшопы; антипаттерны промптов</td></tr>
        <tr><td><strong>Пилот</strong></td><td>недели 7–10</td><td>1–2 сценария в Make/n8n/MCP</td></tr>
        <tr><td><strong>Масштаб</strong></td><td>недели 11–13</td><td>второй отдел; интеграция CRM</td></tr>
      </tbody>
    </table>
    <h3 id="chem-otlichaetsya-nero">Чем Nero Network отличается от «ещё одного чат-бота»</h3>
    <p>Nero Network проектирует <strong>корпоративный контур</strong>, внедряет <strong>автоматизацию make n8n mcp без утечек</strong> и оставляет <strong>human-in-the-loop</strong> там, где это требуют ИБ.</p>
    <p><strong>Итог блока:</strong> безопасное внедрение — мост между цифрами ComNews и ежедневной работой команды.</p>
  </div>
</section>

{cta_primary_2()}

<section class="ym-section ym-section-alt" id="faq-bezopasnoe-vnedrenie">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по безопасному внедрению генеративного ИИ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;">Вопросы</h3>
        <ul class="ym-faq-list">
          <li><a href="#faq-chatgpt">ChatGPT для работы?</a></li>
          <li><a href="#faq-onprem">Нужен ли on-prem?</a></li>
          <li><a href="#faq-roi">Как измерить ROI?</a></li>
          <li><a href="#faq-dogovor">Договор с LLM</a></li>
          <li><a href="#faq-start">С чего начать?</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content">
        <article class="ym-faq-item reveal" id="faq-chatgpt">
          <h3>Можно ли использовать ChatGPT для рабочих задач?</h3>
          <p>Для зелёных данных — только если разрешено политикой. Для жёлтых и красных — через корпоративный ии или ai шлюз.</p>
        </article>
        <article class="ym-faq-item reveal delay-100" id="faq-onprem">
          <h3>Нужен ли on-prem для всех компаний?</h3>
          <p>Нет. Многим достаточно гибрида: корпоративное облако + шлюз + DLP + human in the loop.</p>
        </article>
        <article class="ym-faq-item reveal delay-200" id="faq-roi">
          <h3>Как измерить ROI при ограничениях ИБ?</h3>
          <p>Считайте пилот по одному процессу: время, доля автоматизации с approve, отсутствие инцидентов DLP.</p>
        </article>
        <article class="ym-faq-item reveal delay-300" id="faq-dogovor">
          <h3>Что проверить в договоре с поставщиком LLM?</h3>
          <p>Обучение на промптах, регион данных (ФЗ-152), SLA, защита от промпт-инъекций, private endpoint.</p>
        </article>
        <article class="ym-faq-item reveal delay-400" id="faq-start">
          <h3>С чего начать, если ИБ блокирует любой genAI?</h3>
          <p>Диагностика теневого ИИ → политика + обучение + один пилот в закрытом контуре.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="ym-section" id="zaklyuchenie">
  <div class="ym-container ym-prose reveal">
    <h2>Заключение</h2>
    <p>Опрос <strong>УЦСБ × «Солар»</strong> (102 компании, ComNews, <strong>03.06.2026</strong>) показывает: genAI уже частично здесь, но внедрение тормозят страх утечек (<strong>42,5%</strong>), нехватка навыков (<strong>35%</strong>) и отсутствие сценариев (<strong>32,5%</strong>).</p>
    <p>Выход — <strong>корпоративный контур</strong>, <strong>политика</strong>, <strong>обучение</strong>, <strong>human-in-the-loop</strong> и агенты в Make/n8n/MCP. Nero Network помогает пройти путь за <strong>90 дней</strong>.</p>
    <p><strong>Источники:</strong>
      <a href="https://www.comnews.ru/content/245648/2026-06-03/2026-w23/1010/risk-utechki-dannykh-stal-glavnym-barerom-dlya-vnedreniya-generativnogo-ii-biznese" target="_blank" rel="noopener noreferrer">ComNews</a> ·
      <a href="https://www.cnews.ru/news/top/2026-02-04_sotrudniki_rossijskih_kompanij" target="_blank" rel="noopener noreferrer">CNews</a> ·
      <a href="https://ics-consulting.ru/2026/04/07/bans_dont_work/" target="_blank" rel="noopener noreferrer">ICS Consulting</a>
    </p>
  </div>
</section>
"""


def json_ld() -> str:
    canonical = f"{SITE_URL.rstrip('/')}/{SLUG}/" if SITE_URL else ""
    return f"""<script type="application/ld+json">
{{
  "@context": "https://schema.org",
  "@graph": [
    {{
      "@type": "Article",
      "headline": "{SEO_TITLE}",
      "description": "{SEO_DESC}",
      "datePublished": "2026-06-03",
      "author": {{ "@type": "Organization", "name": "Nero Network" }},
      "publisher": {{ "@type": "Organization", "name": "Nero Network" }},
      "mainEntityOfPage": "{canonical}"
    }},
    {{
      "@type": "FAQPage",
      "mainEntity": [
        {{ "@type": "Question", "name": "Можно ли использовать ChatGPT для рабочих задач?", "acceptedAnswer": {{ "@type": "Answer", "text": "Для зелёных данных — только по политике; для жёлтых и красных — через корпоративный контур или AI-шлюз." }}}},
        {{ "@type": "Question", "name": "Нужен ли on-prem для всех компаний?", "acceptedAnswer": {{ "@type": "Answer", "text": "Нет; часто достаточно гибрида: корпоративное облако, шлюз, DLP и human-in-the-loop." }}}},
        {{ "@type": "Question", "name": "Как измерить ROI при ограничениях ИБ?", "acceptedAnswer": {{ "@type": "Answer", "text": "Пилот по одному процессу: время, доля автоматизации с approve, отсутствие инцидентов DLP." }}}}
      ]
    }}
  ]
}}
</script>"""


def build_html(handoff: str, git_safe: bool = False) -> str:
    global PRIMARY_URL, PRIMARY_LABEL, SECONDARY_URL, SECONDARY_LABEL, SITE_URL
    PRIMARY_URL, PRIMARY_LABEL, SECONDARY_URL, SECONDARY_LABEL = _cta_config(git_safe)
    SITE_URL = _site_url(git_safe)
    hero = extract_codeblock(handoff, "## HTML hero")
    boris = extract_codeblock(handoff, "=== БОРИС")
    body = article_body().replace("<!-- BORIS_BLOCK -->", boris)
    reveal = REVEAL_JS.read_text(encoding="utf-8").strip()
    reveal_inline = f"<script>\n{reveal}\n</script>"

    # Hero CTA: anchor to first body CTA + optional primary URL on top button
    hero = hero.replace('href="#cta-safe-genai-audit"', f'href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"', 1)

    parts = [
        "<style>",
        page_css(),
        "</style>",
        f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">',
        hero,
        intro_section(),
        body,
        "</main>",
        reveal_inline,
        json_ld(),
    ]
    return "\n\n".join(parts)


def build_php(html: str) -> str:
  esc_title = SEO_TITLE.replace("'", "\\'")
  esc_desc = SEO_DESC.replace("'", "\\'")
  return f"""<?php
/**
 * Template Name: Безопасное внедрение генеративного ИИ в бизнес
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


def append_handoff(html: str) -> None:
    text = HANDOFF.read_text(encoding="utf-8")
    marker = "=== НАТАША (HTML СТРАНИЦЫ) ==="
    if marker in text:
        text = text.split(marker)[0].rstrip() + "\n\n"
    sections_list = """## Структура страницы
- `#genai-perimeter-hero` — hero Алины (canvas `bezopasnoe-genai-hero-canvas`)
- `#intro` — лид слева + терминал/KPI
- `.ym-toc` — оглавление
- `#pochemu-kompanii-tormozyat-genai` … `#zaklyuchenie`
- `#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block` — блок Бориса (`genai-perimeter-canvas`)
- `#cta-safe-genai-audit`, `#cta-training-title`, `#cta-roadmap`
- `#faq-bezopasnoe-vnedrenie`
"""
    block = f"""
{marker}
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

{sections_list}

{html}

## Передача Юре
SLUG: {SLUG}
Контент содержит <script> (hero engine + Борис + reveal) и <canvas> (hero + Борис). Обязательно обернуть в <!-- wp:html --> при публикации.
Файл темы: `wordpress-theme/page-{SLUG}.php`
Размер HTML (без PHP-обёртки): {len(html)} байт
"""
    HANDOFF.write_text(text + block, encoding="utf-8")


def main() -> None:
    handoff = HANDOFF.read_text(encoding="utf-8")
    html_live = build_html(handoff, git_safe=False)
    html_git = build_html(handoff, git_safe=True)
    OUT_HTML_SNIP.write_text(html_live, encoding="utf-8")
    OUT_PHP.write_text(build_php(html_git), encoding="utf-8")
    append_handoff(html_live)
    print(f"HTML size (handoff): {len(html_live)} bytes")
    print(f"main#primary: {'id=\"primary\"' in html_live}")
    print(f"hero canvas: {'bezopasnoe-genai-hero-canvas' in html_live}")
    print(f"boris canvas: {'genai-perimeter-canvas' in html_live}")
    print(f"PHP: {OUT_PHP}")


if __name__ == "__main__":
    main()
