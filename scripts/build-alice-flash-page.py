#!/usr/bin/env python3
"""Assemble Natasha page for alice-ai-llm-flash-yandex-dlya-biznesa."""
from __future__ import annotations

import os
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SLUG = "alice-ai-llm-flash-yandex-dlya-biznesa"
PAGE_CLASS = f"{SLUG}-page"
HANDOFF = ROOT / ".cursor" / "nero-network-handoff.md"
CSS_REF = ROOT / "shared" / "longread-page-design-reference.css"
REVEAL_JS = ROOT / "shared" / "longread-page-reveal.js"
OUT_PHP = ROOT / "wordpress-theme" / f"page-{SLUG}.php"

PRIMARY_URL = os.environ.get("PRIMARY_CTA_URL", "").strip() or "#"
PRIMARY_LABEL = os.environ.get("PRIMARY_CTA_LABEL", "").strip() or "Обсудить пилот Flash"
SECONDARY_URL = os.environ.get("SECONDARY_CTA_URL", "").strip() or "#"
SECONDARY_LABEL = os.environ.get("SECONDARY_CTA_LABEL", "").strip() or "Программа обучения Nero Network"
PUBLIC_SITE = os.environ.get("PUBLIC_SITE_URL", "").strip().rstrip("/")
PAGE_PATH = f"/{SLUG}/"
CANONICAL_PAGE_ID = f"{PUBLIC_SITE}{PAGE_PATH}" if PUBLIC_SITE else PAGE_PATH

SEO_TITLE = "Alice AI LLM Flash: дешёвая LLM Яндекса для бизнеса — внедрение"
SEO_DESC = (
    "Яндекс запустил Alice AI LLM Flash в Yandex AI Studio: в 5 раз дешевле для текстов и документов. "
    "Сценарии для поддержки, RAG и CRM, тарифы, сравнение с GPT-5.4 mini и пилот за 2–4 недели."
)


def extract_block(name: str, text: str) -> str:
    pat = rf"=== {re.escape(name)} ===\s*\n(.*?)(?=\n=== |\Z)"
    m = re.search(pat, text, re.DOTALL)
    return m.group(1) if m else ""


def extract_html_fence(block: str) -> str:
    m = re.search(r"```html\s*\n(.*?)```", block, re.DOTALL)
    return m.group(1).strip() if m else ""


def load_css() -> str:
    css = CSS_REF.read_text(encoding="utf-8")
    # Strip file header comment block
    css = re.sub(r"^/\*\*.*?\*/\s*", "", css, count=1, flags=re.DOTALL)
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace("--ym-primary: #ff0000", "--ym-primary: #fc3f1d")
    css = css.replace("--ym-accent: #3b82f6", "--ym-accent: #8b5cf6")
    css = css.replace("rgba(255, 0, 0", "rgba(252, 63, 29")
    css = css.replace("rgba(255,0,0", "rgba(252,63,29")
    css = css.replace("#ff0000", "#fc3f1d")
    css = css.replace("#e60000", "#e03518")
    return css


PAGE_EXTRA_CSS = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#alice-flash-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.alice-flash-intro-section {
  padding: 56px 0 24px;
}
.alice-flash-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 901px) {
  .alice-flash-intro-grid {
    grid-template-columns: 1.1fr 0.9fr;
    gap: 40px;
  }
}
.alice-flash-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}
.alice-flash-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.alice-flash-intro-text p:last-child { margin-bottom: 0; }
.alice-flash-intro-deco .ym-mac-window { margin-bottom: 0; }
.alice-flash-toc-wrap {
  padding: 8px 0 48px;
  text-align: center;
}
.alice-flash-prose h2 {
  font-size: clamp(26px, 3vw, 34px);
  font-weight: 800;
  margin: 0 0 20px;
  scroll-margin-top: 100px;
}
.alice-flash-prose h3 {
  font-size: 20px;
  font-weight: 700;
  margin: 28px 0 12px;
}
.alice-flash-prose p, .alice-flash-prose li {
  line-height: 1.65;
  margin-bottom: 14px;
}
.alice-flash-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  font-size: 15px;
}
.alice-flash-prose th, .alice-flash-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.alice-flash-prose th { background: #f1f5f9; font-weight: 700; }
.alice-flash-prose a { color: var(--ym-accent); }
.alice-flash-prose hr {
  border: none;
  border-top: 1px solid var(--ym-border);
  margin: 48px 0;
}
.ym-cta-insert { margin: 48px 0; }
.ym-cta-insert-inner {
  padding: clamp(24px, 4vw, 36px);
  border: 1px solid var(--ym-border);
  border-radius: 20px;
  background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(241,245,249,0.95));
  box-shadow: var(--ym-shadow);
  border-left: 4px solid var(--ym-primary);
}
.ym-cta-insert--secondary .ym-cta-insert-inner { border-left-color: var(--ym-accent); }
.ym-cta-eyebrow {
  margin: 0 0 8px;
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--ym-accent) !important;
}
.ym-cta-title { margin: 0 0 12px; font-size: clamp(22px, 3vw, 28px); line-height: 1.25; color: var(--ym-heading) !important; }
.ym-cta-lead { margin: 0 0 16px; line-height: 1.6; color: var(--ym-text) !important; }
.ym-cta-list { margin: 0 0 20px; padding-left: 1.25rem; color: var(--ym-text) !important; }
.ym-cta-list li { margin-bottom: 6px; }
"""


def cta_primary() -> str:
    return f"""
<aside id="nero-cta-flash-pilot" class="ym-cta-insert reveal" aria-labelledby="cta-flash-pilot-title">
  <div class="ym-cta-insert-inner">
    <p class="ym-cta-eyebrow">Пилот на Alice AI LLM Flash</p>
    <h3 id="cta-flash-pilot-title" class="ym-cta-title">Классификатор обращений и RAG за 2–4 недели</h3>
    <p class="ym-cta-lead">Команда Nero Network настраивает Flash в Yandex AI Studio, подключает CRM и мессенджеры, проводит A/B на ваших тикетах — без западных API и с учётом 152-ФЗ.</p>
    <ul class="ym-cta-list">
      <li>Неделя 1 — маршрутизация и метрики качества</li>
      <li>Неделя 2 — ассистент по регламентам (сценарий 61% из релиза)</li>
      <li>Недели 3–4 — MCP в Bitrix24, human-in-the-loop</li>
    </ul>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" rel="noopener noreferrer">{PRIMARY_LABEL}</a>
    </div>
  </div>
</aside>"""


def cta_secondary() -> str:
    return f"""
<aside class="ym-cta-insert ym-cta-insert--secondary reveal delay-100" aria-labelledby="cta-flash-training-title">
  <div class="ym-cta-insert-inner">
    <p class="ym-cta-eyebrow">Компетенции команды</p>
    <h3 id="cta-flash-training-title" class="ym-cta-title">Барьер №1 — не цена API, а нехватка навыков</h3>
    <p class="ym-cta-lead">По данным SML, главное препятствие внедрения ИИ — внутренняя экспертиза. Программа обучения закрывает настройку Studio, промптов, MCP и безопасного вывода в прод.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-secondary" href="{SECONDARY_URL}" rel="noopener noreferrer">{SECONDARY_LABEL}</a>
    </div>
  </div>
</aside>"""


INTRO = """
<section class="alice-flash-intro-section ym-container reveal" aria-label="Введение">
  <div class="alice-flash-intro-grid">
    <div class="alice-flash-intro-text">
      <p><strong>Коротко:</strong> 28 мая 2026 года на конференции AI2Business Яндекс представил Alice AI LLM Flash — быструю LLM для массовых B2B-задач в Yandex AI Studio. По данным компании, около 60% корпоративных запросов к моделям — работа с текстами и документами; новая модель позиционируется как решение «почти в 5 раз дешевле» прежних вариантов при сопоставимой цене с GPT-5.4 mini и хранении данных в российской инфраструктуре.</p>
      <p>Запрос «нейросеть для бизнеса» в Яндекс Wordstat вырос с ~1300 показов в месяц (до августа 2024) до ~4000 (с января 2025) — по аналитике <a href="https://companies.rbc.ru/news/qXdVsY7cCF/interes-biznesa-k-ii-vyiros-v-8-raz-godovaya-analitika-sml/" rel="noopener noreferrer">SML (РБК Компании)</a>. Релиз Flash попадает в момент, когда компании ищут ответы: <strong>сколько стоит</strong>, <strong>какие сценарии закрывает</strong>, <strong>чем отличается от флагмана Alice AI LLM</strong> и <strong>как внедрить за 2–4 недели</strong> без западных API.</p>
    </div>
    <div class="alice-flash-intro-deco reveal-right delay-200" aria-hidden="true">
      <div class="ym-mac-window">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">yandex_ai_studio — flash_pilot</span>
        </div>
        <div class="ym-mac-body">
          <div><span class="ym-command">$</span> model: alice-ai-llm-flash</div>
          <div><span class="ym-comment"># 60% B2B — тексты и документы</span></div>
          <div><span class="ym-command">$</span> deploy classifier → CRM/MCP</div>
          <div><span class="ym-comment"># пилот 2–4 нед · данные в РФ</span></div>
        </div>
      </div>
      <div class="ym-bento-grid" style="margin-top:20px;grid-template-columns:1fr 1fr;">
        <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">×5</div><div class="ym-stat-label">дешевле флагмана*</div></div>
        <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">56%</div><div class="ym-stat-label">vs GPT-5.4 mini*</div></div>
      </div>
    </div>
  </div>
</section>
"""

TOC = """
<div class="alice-flash-toc-wrap ym-container">
  <nav class="ym-toc reveal" aria-label="Оглавление">
    <a href="#chto-takoe-flash">Что такое Flash</a>
    <a href="#skolko-stoit">Тарифы и ROI</a>
    <a href="#kachestvo-modeli">Качество</a>
    <a href="#avtomatizaciya-podderzhki">Поддержка</a>
    <a href="#dokumentooborot-rag">RAG</a>
    <a href="#moderaciya-kontenta">Модерация</a>
    <a href="#ai-agenty-mcp">MCP и API</a>
    <a href="#otrasli-scenarii">Отрасли</a>
    <a href="#flash-vs-deepseek">vs DeepSeek</a>
    <a href="#importozameshchenie">152-ФЗ</a>
    <a href="#faq-vnedrenie">FAQ</a>
    <a href="#nero-network-pilot">Пилот Nero</a>
  </nav>
</div>
"""


def section_prose() -> str:
    return """
<div class="ym-container alice-flash-prose">

<section id="chto-takoe-flash" class="ym-section reveal">
  <h2>Что такое Alice AI LLM Flash и почему релиз на AI2Business важен для B2B</h2>
  <p><strong>Определение:</strong> Alice AI LLM Flash — отдельная быстрая LLM Яндекса для потоковых бизнес-задач: модерация UGC, классификация обращений в поддержку, диалог с клиентом, массовая обработка однотипных запросов. Это не замена флагманской Alice AI LLM, а «рабочая лошадка» для высокочастотного инференса.</p>
  <p>Анонс — <strong>28.05.2026</strong> на <strong>AI2Business</strong> (Yandex Cloud). Продукт представлял <strong>Дмитрий Рыбалко</strong>; о позиционировании — <strong>Артур Самигуллин</strong>, руководитель Yandex AI Studio (<a href="https://yandex.ru/company/news/28-05-2026-03" rel="noopener noreferrer">пресс-релиз</a>, <a href="https://www.vedomosti.ru/technologies/industries_and_markets/news/2026/05/28/1200947-biznesa-alice" rel="noopener noreferrer">«Ведомости»</a>).</p>
  <p>«Яндекс выходит на новый для себя рынок моделей, созданных специально под запросы бизнеса», — цитируют Самигуллина в релизе. Flash должен помочь перейти на отечественные нейросети при автоматизации больших объёмов данных (<a href="https://www.cnews.ru/news/line/2026-05-28_yandeks_zapustil_bystruyu" rel="noopener noreferrer">CNews</a>).</p>
  <h3>60% B2B-запросов — тексты и документы; обещание «в 5 раз дешевле»</h3>
  <p>По <strong>внутренней статистике Яндекса</strong>, <strong>~60% B2B-запросов</strong> — <strong>тексты и документы</strong> (<a href="https://yandex.ru/company/news/28-05-2026-03" rel="noopener noreferrer">пресс-релиз</a>). Формулировка — <strong>«почти в 5 раз дешевле, чем ранее»</strong>; в СМИ база сравнения — <strong>флагманская Alice AI LLM</strong>. Это <strong>заявление вендора</strong>, не гарантия для каждого контура.</p>
  <p>Яндекс также заявляет <strong>сопоставимость по цене с GPT-5.4 mini</strong> и <strong>безопасность данных в РФ</strong> (<a href="https://www.cnews.ru/news/line/2026-05-28_yandeks_zapustil_bystruyu" rel="noopener noreferrer">CNews</a>).</p>
  <h3>Отличие от Alice AI LLM и YandexGPT — когда брать Flash</h3>
  <p><strong>Alice AI LLM</strong> открыли бизнесу в <strong>ноябре 2025</strong>; Flash — <strong>облегчённая быстрая версия</strong> (<a href="https://kod.ru/yandeks-vipustil-alica-ai-llm" rel="noopener noreferrer">kod.ru</a>).</p>
  <table>
    <thead><tr><th>Критерий</th><th>Flash</th><th>Alice AI LLM (флагман)</th></tr></thead>
    <tbody>
      <tr><td>Роль</td><td>Массовые тексты, поддержка, модерация</td><td>Сложный диалог, выше качество</td></tr>
      <tr><td>Цена</td><td>~5× дешевле флагмана (заявление)</td><td>Пример: 0,50 ₽/1k вход, 2,00 ₽/1k выход (ноябрь 2025)</td></tr>
      <tr><td>Когда</td><td>Классификация, FAQ, UGC</td><td>Критичное качество ответа</td></tr>
    </tbody>
  </table>
  <p><strong>Итог:</strong> Flash — <strong>высокочастотный</strong> инференс; флагман — когда ошибка дороже экономии на токене.</p>
</section>

<section id="skolko-stoit" class="ym-section ym-section-alt reveal">
  <h2>Сколько стоит и какие лимиты в Yandex AI Studio (тарифы и ROI)</h2>
  <p><strong>Коротко:</strong> отдельного прайса Flash в ₽ в открытой документации <strong>нет</strong>; тарификация — <strong>по токенам</strong>. У семейства Alice AI вход <strong>в 4 раза дешевле</strong> выхода; на кириллице ~4–5 символов на токен (<a href="https://yandex.cloud/ru/blog/alice-ai-november-2025" rel="noopener noreferrer">блог Yandex Cloud</a>). Точные ₽/1k для Flash сверяйте в <strong>биллинге Yandex Cloud</strong>.</p>
  <h3>Сравнение с Alice AI LLM и GPT-5.4 mini по цене и скорости</h3>
  <p>Позиционирование — <strong>сопоставимая цена с GPT-5.4 mini</strong> в <strong>российском облаке</strong>. Публичного «рубль к рублю» Flash vs GPT нет — только заявления и бенчмарки качества.</p>
  <h3>Калькулятор окупаемости для поддержки и документов</h3>
  <ol>
    <li>Тикеты/мес и доля рутины.</li>
    <li>Длина запроса/ответа в токенах.</li>
    <li>Тариф AI Studio vs <strong>стоимость часа оператора</strong>.</li>
  </ol>
  <p>По SML, барьер №1 — <strong>нехватка компетенций</strong>, не цена API (<a href="https://companies.rbc.ru/news/qXdVsY7cCF/interes-biznesa-k-ii-vyiros-v-8-raz-godovaya-analitika-sml/" rel="noopener noreferrer">РБК / Елена Мокрушина</a>). ROI Flash = процесс + A/B на реальных тикетах.</p>
</section>

<!-- BORIS_PLACEHOLDER -->

<section id="kachestvo-modeli" class="ym-section reveal">
  <h2>Качество модели: бенчмарки, слепое сравнение, ограничения</h2>
  <p><strong>Слепое попарное сравнение</strong> с <strong>GPT-5.4 mini</strong> (<a href="https://yandex.ru/company/news/28-05-2026-03" rel="noopener noreferrer">пресс-релиз</a>):</p>
  <table>
    <thead><tr><th>Метрика</th><th>Побед Flash</th></tr></thead>
    <tbody>
      <tr><td>Бизнес-задачи (агрегат)</td><td><strong>56%</strong></td></tr>
      <tr><td>Диалоги</td><td><strong>73%</strong></td></tr>
      <tr><td>Обобщение текста</td><td><strong>66%</strong></td></tr>
      <tr><td>Поиск по файлам/БЗ</td><td><strong>61%</strong></td></tr>
    </tbody>
  </table>
  <h3>Цифры 56% / 73% / 66% / 61% — что именно тестировали</h3>
  <p><strong>Известно:</strong> слепое попарное сравнение с GPT-5.4 mini. <strong>Не опубликовано:</strong> N, промпты, независимый аудит. Перед продом — <strong>свой A/B на 200–500 тикетов</strong>.</p>
  <h3>Где Flash слабее Pro-моделей и когда нужен апгрейд</h3>
  <p>Flash — <strong>дешёкий высокочастотный</strong> слой, не deep reasoning (<a href="https://vc.ru/aihub/2842998-obzor-rossiyskih-neyrosetey-2026-goda" rel="noopener noreferrer">vc.ru</a>). Апгрейд на <strong>Alice AI LLM</strong> или <strong>DeepSeek V4 Flash</strong> (1M контекст), если нужны длинные документы и многошаговые агенты.</p>
</section>

<section id="avtomatizaciya-podderzhki" class="ym-section ym-section-alt reveal">
  <h2>Автоматизация техподдержки и классификация обращений</h2>
  <p>«Чат бот для бизнеса» — ~<strong>2010</strong>/мес в Wordstat (SML). Официальные сценарии Flash: <strong>классификация</strong>, <strong>диалог</strong>, <strong>массовые запросы</strong> (<a href="https://yandex.ru/company/news/28-05-2026-03" rel="noopener noreferrer">пресс-релиз</a>).</p>
  <h3>Первая линия, FAQ, маршрутизация в CRM</h3>
  <p>Контур: <strong>классификатор Flash</strong> → <strong>FAQ/RAG</strong> → задача в CRM. <strong>Bitrix24 ↔ AI Studio</strong> через MCP: <code>https://mcp.bitrix24.tech/mcp/</code> (<a href="https://helpdesk.bitrix24.ru/open/26952788/" rel="noopener noreferrer">helpdesk</a>). Гайдов Flash + amoCRM/1С <strong>нет</strong> — API/MCP/Make/n8n.</p>
  <h3>Копилот оператора vs полная автоматизация</h3>
  <p><strong>Копилот</strong> снижает риск; <strong>полная автоматизация</strong> — для статусов и типовых FAQ с эскалацией. <strong>Итог:</strong> старт с копилота + классификатора.</p>
</section>

<section id="dokumentooborot-rag" class="ym-section reveal">
  <h2>Документооборот и RAG по базе знаний</h2>
  <p><strong>61%</strong> пар по поиску в файлах/БЗ выиграл Flash — аргумент для корпоративного ассистента.</p>
  <h3>File Search, Workflows, индексация регламентов</h3>
  <p><strong>Yandex AI Studio:</strong> MCP Hub, Workflows, OpenAI-compatible API, Responses API <code>https://ai.api.cloud.yandex.net/v1/responses</code>, модель <code>gpt://&lt;folder_id&gt;/&lt;model&gt;/latest</code> (<a href="https://ai.cnews.ru/news/line/2026-03-03_yandex_b2b_tech_otkryla_biznesu" rel="noopener noreferrer">CNews 03.03.2026</a>). <strong>86% пользователей — МСБ</strong> (RB.ru, март 2026).</p>
  <h3>Связка с 1С, Bitrix24, amoCRM</h3>
  <p>Bitrix — официальный MCP; 1С/amo — через API/оркестраторы. Длинные документы — <strong>DeepSeek V4 Flash</strong> (1M токенов) в том же Studio.</p>
</section>

<section id="moderaciya-kontenta" class="ym-section ym-section-alt reveal">
  <h2>Модерация контента и массовая обработка текстов</h2>
  <p>В релизе — <strong>модерация UGC</strong>. <strong>Коротко:</strong> Flash для высокого QPS и единых правил; спорное — человеку.</p>
  <h3>UGC, маркетплейсы, compliance</h3>
  <p>Поток: контент → Flash (риск) → модератор «серой зоны». Отрасли релиза: <strong>банки, ритейл, телеком</strong> — без имён клиентов в публичных материалах.</p>
</section>

<section id="ai-agenty-mcp" class="ym-section reveal">
  <h2>AI-агенты, MCP и интеграции без западных API</h2>
  <p><strong>MCP Hub</strong>, Workflows, грант <strong>500 млн ₽</strong> на агентов (Forbes, осень 2025).</p>
  <h3>OpenAI-compatible API и перенос с GPT</h3>
  <p>Формат <code>gpt://&lt;folder_id&gt;/&lt;model&gt;/latest</code>. Flash — <strong>высокочастотные</strong> вызовы после A/B.</p>
  <h3>Make.com, Cursor, on-prem / облако РФ</h3>
  <p>Make/n8n, Cursor+MCP, биллинг в РФ. <strong>GigaChat</strong> силён в on-prem; <strong>Yandex/Alice</strong> — Cloud и экосистема. Flash — <strong>дешёвый слой</strong>, не битва флагманов.</p>
</section>

<section id="otrasli-scenarii" class="ym-section ym-section-alt reveal">
  <h2>Отрасли: банки, ритейл, телеком — практические сценарии</h2>
  <p>Банки строят <strong>AI-native</strong>-модели (<a href="https://lenta.ru/articles/2026/05/25/banki-nachali-sozdavat-ai-native-modeli/" rel="noopener noreferrer">Lenta.ru</a>).</p>
  <table>
    <thead><tr><th>Отрасль</th><th>Flash</th><th>Ограничение</th></tr></thead>
    <tbody>
      <tr><td>Банки</td><td>Классификация, FAQ</td><td>Human-in-the-loop</td></tr>
      <tr><td>Ритейл</td><td>Статус заказа, отзывы</td><td>152-ФЗ, логи API</td></tr>
      <tr><td>Телеком</td><td>Маршрутизация</td><td>Длинные логи → DeepSeek V4</td></tr>
    </tbody>
  </table>
  <h3>Пилот за 2–4 недели: чек-лист для SMB и enterprise</h3>
  <p><strong>Н1:</strong> классификатор + метрики. <strong>Н2:</strong> RAG по регламентам. <strong>Н3–4:</strong> MCP/CRM + A/B. Enterprise — согласование ИБ и 152-ФЗ.</p>
</section>

<!-- CTA_SECONDARY_PLACEHOLDER -->

<section id="flash-vs-deepseek" class="ym-section reveal">
  <h2>Alice AI LLM Flash vs DeepSeek V4 Flash и другие «быстрые» модели</h2>
  <p>На AI2Business — <strong>DeepSeek V4 Flash</strong>: <strong>1M токенов</strong>, <strong>в 1,5× дешевле V3.2</strong> (заявление Яндекса). Глобально: 284B/13B active, MIT (<a href="https://huggingface.co/blog/deepseekv4" rel="noopener noreferrer">Hugging Face</a>).</p>
  <h3>Когда выбрать Яндекс Flash, когда — DeepSeek V4 Flash в AI Studio</h3>
  <table>
    <thead><tr><th>Задача</th><th>Flash</th><th>DeepSeek V4 Flash</th></tr></thead>
    <tbody>
      <tr><td>Классификация, короткий диалог</td><td>✓</td><td>избыточен</td></tr>
      <tr><td>Сверхдлинный документ</td><td>риск обрезания</td><td>✓ 1M</td></tr>
      <tr><td>Массовый поток</td><td>✓ ~5× vs старые модели Яндекса</td><td>✓ в том же биллинге</td></tr>
    </tbody>
  </table>
  <p><strong>Итог:</strong> <strong>две модели в одном каталоге</strong> Studio.</p>
</section>

<section id="importozameshchenie" class="ym-section ym-section-alt reveal">
  <h2>Импортозамещение GPT: безопасность данных и 152-ФЗ</h2>
  <p>Интерес к ИИ для бизнеса <strong>+840%</strong> с июня 2024 (SML). <strong>Коротко:</strong> Flash заменяет <strong>высокочастотные mini-GPT</strong> в <strong>РФ-облаке</strong>; reasoning — DeepSeek V4 или флагман Alice.</p>
  <p>Данные — в <strong>локальной инфраструктуре</strong> (CNews). Уточняйте договор Cloud и логирование (<code>x-data-logging-enabled</code> в партнёрских гайдах — сверка с актуальной документацией).</p>
</section>

<section id="faq-vnedrenie" class="ym-section reveal">
  <h2>FAQ по внедрению</h2>
  <div class="ym-faq-layout">
    <aside class="ym-faq-sidebar reveal-left">
      <h3 style="margin-top:0;">Вопросы</h3>
      <ul class="ym-faq-list">
        <li><a href="#faq-1">Flash vs YandexGPT</a></li>
        <li><a href="#faq-2">Сколько стоит</a></li>
        <li><a href="#faq-3">Без программистов</a></li>
        <li><a href="#faq-4">Bitrix24</a></li>
        <li><a href="#faq-5">56% для прода</a></li>
        <li><a href="#faq-6">Flash vs GPT mini</a></li>
      </ul>
    </aside>
    <div>
      <article id="faq-1" class="ym-faq-item reveal"><h3>Чем Flash отличается от YandexGPT и Alice AI LLM?</h3><p>Быстрая облегчённая модель; не замена флагмана (<a href="https://kod.ru/yandeks-vipustil-alica-ai-llm" rel="noopener noreferrer">kod.ru</a>).</p></article>
      <article id="faq-2" class="ym-faq-item reveal delay-100"><h3>Сколько стоит?</h3><p>По токенам; «5×» — vs прежние модели Яндекса, не универсальная скидка.</p></article>
      <article id="faq-3" class="ym-faq-item reveal delay-200"><h3>Без программистов?</h3><p>Классификатор/простой FAQ — Studio, Make, MCP Bitrix; сложный RAG — интеграция.</p></article>
      <article id="faq-4" class="ym-faq-item reveal"><h3>Bitrix24?</h3><p>MCP <code>https://mcp.bitrix24.tech/mcp/</code> (<a href="https://helpdesk.bitrix24.ru/open/26952788/" rel="noopener noreferrer">helpdesk</a>).</p></article>
      <article id="faq-5" class="ym-faq-item reveal delay-100"><h3>Хватит ли 56% для прода?</h3><p>Нет без своего A/B.</p></article>
      <article id="faq-6" class="ym-faq-item reveal delay-200"><h3>Flash vs GPT-5.4 mini в РФ?</h3><p>Flash при требовании данных в РФ и едином биллинге.</p></article>
      <article id="faq-7" class="ym-faq-item reveal"><h3>DeepSeek V4 Flash вместо Flash?</h3><p>Длинный контекст и агенты.</p></article>
      <article id="faq-8" class="ym-faq-item reveal delay-100"><h3>Банк?</h3><p>Пилот классификации/FAQ; критичное — с человеком.</p></article>
      <article id="faq-9" class="ym-faq-item reveal delay-200"><h3>Клиенты Flash?</h3><p>Именованных в релизе <strong>нет</strong>.</p></article>
      <article id="faq-10" class="ym-faq-item reveal"><h3>MCP Hub?</h3><p>Внешние MCP к агентам Studio.</p></article>
      <article id="faq-11" class="ym-faq-item reveal delay-100"><h3>Срок пилота?</h3><p><strong>2–4 недели</strong>.</p></article>
      <article id="faq-12" class="ym-faq-item reveal delay-200"><h3>Wordstat?</h3><p>«нейросеть для бизнеса» ~4000/мес; «чат бот» ~2010/мес.</p></article>
    </div>
  </div>
</section>

<section id="nero-network-pilot" class="ym-section ym-section-alt reveal">
  <h2>Как Nero Network внедрит пилот на Alice AI LLM Flash</h2>
  <p>Nero Network: <strong>классификатор</strong>, <strong>RAG</strong>, <strong>CRM/мессенджеры</strong> на российском стеке.</p>
  <ul>
    <li><strong>Неделя 1</strong> — классификация на Flash;</li>
    <li><strong>Неделя 2</strong> — ассистент по регламентам (сценарий 61%);</li>
    <li><strong>Недели 3–4</strong> — MCP + Bitrix24, human-in-the-loop.</li>
  </ul>
  <p><strong>Итог:</strong> Flash — ответ на <strong>60% B2B-запросов</strong> с заявленной <strong>~5×</strong> экономией vs прежние модели Яндекса и сравнением с <strong>GPT-5.4 mini</strong> в РФ. Выигрывает тот, кто считает токены и проводит A/B, а не копирует проценты из пресс-релиза.</p>
  <p><strong>Источник:</strong> <a href="https://yandex.ru/company/news/28-05-2026-03" rel="noopener noreferrer">yandex.ru/company/news/28-05-2026-03</a></p>
</section>

</div>
"""


JSON_LD = """
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Alice AI LLM Flash: как внедрить дешёвую нейросеть Яндекса в поддержку и документооборот",
      "description": "Яндекс запустил Alice AI LLM Flash в Yandex AI Studio: в 5 раз дешевле для текстов и документов. Сценарии для поддержки, RAG и CRM.",
      "datePublished": "2026-05-28",
      "dateModified": "2026-06-01",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "mainEntityOfPage": { "@type": "WebPage", "@id": "__CANONICAL_PAGE_ID__" }
    },
    {
      "@type": "SoftwareApplication",
      "name": "Alice AI LLM Flash",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "Yandex AI Studio",
      "offers": { "@type": "Offer", "priceCurrency": "RUB", "description": "Тарификация по токенам в Yandex Cloud" }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "Чем Flash отличается от YandexGPT и Alice AI LLM?", "acceptedAnswer": { "@type": "Answer", "text": "Быстрая облегчённая модель для массовых B2B-задач; не замена флагмана Alice AI LLM." }},
        { "@type": "Question", "name": "Сколько стоит Alice AI LLM Flash?", "acceptedAnswer": { "@type": "Answer", "text": "Тарификация по токенам в Yandex AI Studio; заявление «в 5 раз дешевле» относится к сравнению с прежними моделями Яндекса." }},
        { "@type": "Question", "name": "Можно ли внедрить Flash без программистов?", "acceptedAnswer": { "@type": "Answer", "text": "Простой классификатор и FAQ — через Studio, Make или MCP Bitrix24; сложный RAG требует интеграции." }},
        { "@type": "Question", "name": "Как подключить Flash к Bitrix24?", "acceptedAnswer": { "@type": "Answer", "text": "Через MCP https://mcp.bitrix24.tech/mcp/ и раздел MCP-подключений в Yandex AI Studio." }}
      ]
    }
  ]
}
</script>
"""


def build_body_html(handoff_text: str) -> str:
    alina = extract_block("АЛИНА (HERO)", handoff_text)
    boris = extract_block("БОРИС (БЛОК СТАТЬИ, НЕ HERO)", handoff_text)
    hero = extract_html_fence(alina)
    boris_html = extract_html_fence(boris)
    if not hero or not boris_html:
        raise SystemExit("Missing hero or boris HTML in handoff")

    prose = section_prose()
    prose = prose.replace("<!-- BORIS_PLACEHOLDER -->", boris_html + "\n" + cta_primary())
    prose = prose.replace("<!-- CTA_SECONDARY_PLACEHOLDER -->", cta_secondary())

    reveal = REVEAL_JS.read_text(encoding="utf-8")
    json_ld = JSON_LD.format(canonical_page_id=CANONICAL_PAGE_ID)

    return f"""<style>
{load_css()}
{PAGE_EXTRA_CSS}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{hero}
{INTRO}
{TOC}
{prose}
</main>

<script>
{reveal}
</script>
{json_ld}
"""


def build_php(body: str) -> str:
  esc_title = SEO_TITLE.replace("'", "\\'")
  esc_desc = SEO_DESC.replace("'", "\\'")
  return f"""<?php
/**
 * Template Name: Alice AI LLM Flash для бизнеса
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
{body}
<?php get_footer(); ?>
"""


def update_handoff(handoff_text: str, body: str) -> str:
    marker = "=== НАТАША (HTML СТРАНИЦЫ) ==="
    block = f"""{marker}
Статус: ✅ ГОТОВО
SLUG: {SLUG}
Размер HTML (с пробелами): {len(body)} знаков

## Структура
- `#alice-flash-hero` — hero Алины (`alice-flash-hero-canvas` + inline script)
- Введение слева + терминал/KPI справа
- `.ym-toc` — оглавление по центру
- Секции H2 с якорями (#chto-takoe-flash … #nero-network-pilot)
- `#boris-flash-roi-block` — ROI-калькулятор Бориса (`boris-flash-roi-canvas` + script) после тарифов
- CTA `#nero-cta-flash-pilot` + вторичный CTA обучения
- FAQ + JSON-LD (Article, SoftwareApplication, FAQPage)
- Reveal IntersectionObserver

ВНИМАНИЕ: контент содержит `<script>` и `<canvas>` — при публикации обернуть в `<!-- wp:html -->`

```html
{body}
```

## Передача Юре
SLUG: {SLUG}
Файл темы: `wordpress-theme/page-{SLUG}.php`
Контент содержит `<script>` (hero engine + boris ROI + reveal) и `<canvas>`. Обязательно обернуть в `<!-- wp:html -->` при публикации через редактор.
Проверить: `main#primary`, `.{PAGE_CLASS}`, canvas `alice-flash-hero-canvas`, `boris-flash-roi-canvas`.
"""
    if marker in handoff_text:
        handoff_text = re.sub(
            rf"{re.escape(marker)}.*?(?=\n=== |\Z)",
            block.strip() + "\n\n",
            handoff_text,
            flags=re.DOTALL,
        )
    else:
        handoff_text = handoff_text.rstrip() + "\n\n" + block.strip() + "\n"
    return handoff_text


def main() -> None:
    handoff_text = HANDOFF.read_text(encoding="utf-8")
    body = build_body_html(handoff_text)
    OUT_PHP.write_text(build_php(body), encoding="utf-8")
    HANDOFF.write_text(update_handoff(handoff_text, body), encoding="utf-8")
    print(f"Wrote {OUT_PHP} ({len(body)} chars body)")
    print(f"Updated {HANDOFF}")


if __name__ == "__main__":
    main()
