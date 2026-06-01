#!/usr/bin/env python3
"""Сборка HTML/PHP лонгрида gigacowork-ii-agenty-biznes-bez-programmistov (Наташа)."""
from __future__ import annotations

import os
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SLUG = "gigacowork-ii-agenty-biznes-bez-programmistov"
PAGE_CLASS = f"{SLUG}-page"

PRIMARY_URL = os.environ.get("PRIMARY_CTA_URL", "#nero-cta-primary")
PRIMARY_LABEL = os.environ.get("PRIMARY_CTA_LABEL", "Обсудить пилот")
SECONDARY_URL = os.environ.get("SECONDARY_CTA_URL", "#")
SECONDARY_LABEL = os.environ.get("SECONDARY_CTA_LABEL", "Обучение автоматизации")
SITE_URL = os.environ.get("WP_SITE_URL", os.environ.get("PUBLIC_SITE_HOST", "https://example.com")).rstrip("/")
if not SITE_URL.startswith("http"):
    SITE_URL = "https://" + SITE_URL

SEO_TITLE = "GigaCowork: ИИ-агенты для бизнеса без программистов — Make, MCP"
SEO_DESC = (
    "Сбер открыл GigaCowork на ЦИПР-2026: агенты по регламентам, MCP к CRM и пилоты до −81,5% рутины. "
    "Как собрать такой контур на Make, n8n и GigaChat без экосистемы банка."
)


def extract_codeblock(md_path: Path, lang: str = "html") -> str:
    text = md_path.read_text(encoding="utf-8")
    pattern = rf"```{lang}\n(.*?)```"
    m = re.search(pattern, text, re.DOTALL)
    if not m:
        raise ValueError(f"No {lang} block in {md_path}")
    return m.group(1).strip()


def load_page_css() -> str:
    css = (ROOT / "shared/longread-page-design-reference.css").read_text(encoding="utf-8")
    # strip file header comment block
    css = re.sub(r"^/\*\*.*?\*/\s*", "", css, count=1, flags=re.DOTALL)
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace(
        "--ym-primary: #ff0000;",
        "--ym-primary: #21a038;",
    )
    css = css.replace(
        "--ym-accent: #3b82f6;",
        "--ym-accent: #6366f1;",
    )
    css = css.replace(
        "--ym-shadow-lg: 0 20px 40px -10px rgba(255, 0, 0, 0.15);",
        "--ym-shadow-lg: 0 20px 40px -10px rgba(33, 160, 56, 0.18);",
    )
    css = css.replace("rgba(255, 0, 0, 0.4)", "rgba(33, 160, 56, 0.35)")
    css = css.replace("rgba(255, 0, 0, 0.5)", "rgba(33, 160, 56, 0.45)")
    css = css.replace("background: #e60000;", "background: #1a8f32;")
    css = css.replace("rgba(255,0,0,0.2)", "rgba(33,160,56,0.25)")
    css = css.replace("border-color: rgba(255, 0, 0, 0.2)", "border-color: rgba(33, 160, 56, 0.25)")
    css = css.replace("rgba(255, 0, 0, 0.05)", "rgba(33, 160, 56, 0.08)")
    return css


def critical_css() -> str:
    return """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#gigacowork-orchestra.fullscreen-white-office.gcw-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.gcw-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
  gap: 32px 40px;
  align-items: start;
  text-align: left !important;
}
.gcw-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.gcw-intro-text p { text-align: left !important; }
.gcw-intro-deco { min-width: 0; }
.gcw-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.gcw-kpi-chip {
  font-size: 12px;
  font-weight: 700;
  padding: 8px 14px;
  border-radius: 999px;
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}
.gcw-kpi-chip--accent {
  background: #eef2ff;
  color: #4338ca;
  border-color: #c7d2fe;
}
.gcw-toc-wrap { text-align: center; margin: 48px 0 24px; }
.gcw-prose { max-width: 900px; margin: 0 auto; }
.gcw-prose h2 {
  font-size: clamp(1.5rem, 3vw, 2.25rem);
  font-weight: 800;
  margin: 0 0 20px;
  letter-spacing: -0.02em;
}
.gcw-prose h3 {
  font-size: 1.25rem;
  font-weight: 700;
  margin: 32px 0 14px;
}
.gcw-prose p, .gcw-prose li { line-height: 1.65; margin-bottom: 16px; }
.gcw-prose ul, .gcw-prose ol { padding-left: 1.25rem; margin-bottom: 20px; }
.gcw-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 14px;
}
.gcw-prose th, .gcw-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.gcw-prose th { background: #f1f5f9; font-weight: 700; }
.gcw-checklist { list-style: none; padding: 0; }
.gcw-checklist li {
  position: relative;
  padding-left: 22px;
  margin-bottom: 10px;
}
.gcw-checklist li::before {
  content: "☐";
  position: absolute;
  left: 0;
  color: var(--ym-primary);
}
.ym-promo-cta { margin: 32px 0; }
.ym-promo-cta__title { font-size: 22px; font-weight: 800; color: var(--ym-heading); margin: 0 0 12px; }
.ym-promo-cta__text { margin: 0 0 20px; line-height: 1.6; color: var(--ym-text); }
.ym-promo-cta__actions { justify-content: flex-start; }
.ym-promo-cta--secondary { border-left: 4px solid var(--ym-accent); }
@media (max-width: 900px) {
  .gcw-intro-grid { grid-template-columns: 1fr; }
}
"""


def cta_primary(title: str, text: str, anchor_id: str = "nero-cta-primary") -> str:
    return f"""<aside id="{anchor_id}" class="ym-card reveal ym-promo-cta" aria-label="Предложение Nero Network">
  <h3 class="ym-promo-cta__title">{title}</h3>
  <p class="ym-promo-cta__text">{text}</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-primary" href="{PRIMARY_URL}" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
  </div>
</aside>"""


def cta_secondary(title: str, text: str) -> str:
    return f"""<aside class="ym-card reveal ym-promo-cta ym-promo-cta--secondary" aria-label="Обучение автоматизации">
  <h3 class="ym-promo-cta__title">{title}</h3>
  <p class="ym-promo-cta__text">{text}</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-secondary" href="{SECONDARY_URL}" target="_blank" rel="noopener noreferrer"><span>{SECONDARY_LABEL}</span></a>
  </div>
</aside>"""


def intro_section() -> str:
    return """
<section class="ym-section" id="intro" style="padding-top: 72px; padding-bottom: 40px;">
  <div class="ym-container">
    <div class="gcw-intro-grid reveal">
      <div class="gcw-intro-text">
        <p><strong>Коротко:</strong> 19 мая 2026 года Сбер на ЦИПР открыл тестовый доступ к GigaCowork — платформе управления корпоративными ИИ-агентами без разработчиков. Ниже — разбор продукта, пилотных цифр, MCP-интеграций и пошаговый план собрать похожий контур на Make, n8n и GigaChat API вне экосистемы банка.</p>
        <p>GigaCowork — не отдельная LLM, а слой <strong>оркестрации</strong> поверх GigaChat Enterprise. Для рынка это сигнал: «цифровые сотрудники» с governance «из коробки», а не разовые чат-боты.</p>
        <div class="gcw-kpi-chips" aria-hidden="true">
          <span class="gcw-kpi-chip">ЦИПР · 19.05.2026</span>
          <span class="gcw-kpi-chip">−81,5% рутина*</span>
          <span class="gcw-kpi-chip gcw-kpi-chip--accent">MCP · CRM · 1С</span>
        </div>
      </div>
      <div class="gcw-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">agent-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># контур без экосистемы банка</span><br>
            <span class="ym-command">reglament</span> → skill (RU)<br>
            <span class="ym-command">mcp connect</span> crm erp mail<br>
            <span class="ym-command">human approve</span> --loop<br>
            <span class="ym-command">pilot</span> --days 14 --metric time_saved
          </div>
        </div>
      </div>
    </div>
    <nav class="gcw-toc-wrap reveal delay-100" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#gigacowork-cipr">GigaCowork</a>
        <a href="#bez-it">Без IT</a>
        <a href="#piloty-roi">Пилоты ROI</a>
        <a href="#mcp-kontur">MCP</a>
        <a href="#governance">Безопасность</a>
        <a href="#sravnenie">Сравнение стеков</a>
        <a href="#plan-make">План Make/n8n</a>
        <a href="#faq">FAQ</a>
      </div>
    </nav>
  </div>
</section>
"""


def article_sections() -> str:
    """Основные секции лонгрида (HTML из текста Жени/Артура)."""
    return f"""
<section class="ym-section ym-section-alt" id="gigacowork-cipr">
  <div class="ym-container gcw-prose reveal">
    <h2>Что такое GigaCowork и почему это новость ЦИПР-2026</h2>
    <p><strong>Определение:</strong> GigaCowork — платформа Сбера для управления командами корпоративных ИИ-агентов: регламенты описываются на естественном языке, агенты подключаются к CRM, ERP, почте и файлам через MCP-коннекторы, действия выполняются от имени сотрудника с логированием. Тестовый доступ анонсирован 19.05.2026 на форуме «Салют для бизнеса» (ЦИПР-2026); заявка подаётся через сайт «ГигаЧат Бизнес» (GigaChat Enterprise). — <a href="https://habr.com/ru/news/1038518/" target="_blank" rel="noopener noreferrer">Habr</a>, <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu" target="_blank" rel="noopener noreferrer">CNews</a></p>
    <p><strong>Итог:</strong> GigaCowork — слой <strong>оркестрации</strong> поверх GigaChat Enterprise и линейки GigaChat Ultra. Крупный игрок продаёт идею «цифровых сотрудников» с governance «из коробки».</p>
    <h3>Workspace, навыки и MCP-коннекторы в тесте</h3>
    <ol>
      <li><strong>Рабочие пространства (workspace)</strong> — изоляция отделов и проектов.</li>
      <li><strong>Навыки (skills)</strong> — регламенты и чек-листы на русском языке.</li>
      <li><strong>MCP-коннекторы</strong> — стандартизированное подключение к CRM, ERP, почте, файлам.</li>
      <li><strong>Контроль доступа</strong> — агент действует от имени сотрудника; все шаги логируются.</li>
    </ol>
    <p>Агенты <strong>сохраняются</strong>, запускаются по команде и <strong>по расписанию</strong> (пример: еженедельная сверка 1С и CRM).</p>
    <h3>Ранний доступ и «Салют для бизнеса»</h3>
    <p>Опрос «Салют для бизнеса» (29.05.2026) среди <strong>308 крупных</strong> компаний: <strong>56%</strong> планируют внедрение ИИ-агентов для офисной рутины. Лидер сценариев — <strong>документооборот и договоры</strong>.</p>
    <div class="ym-bento-grid reveal-scale delay-200">
      <div class="ym-bento-card ym-bento-main">
        <p class="ym-stat-label">Архитектура GigaCowork</p>
        <p style="font-size:18px;font-weight:700;margin:12px 0 0;">workspace → навыки → MCP → логи</p>
        <p style="margin-top:12px;font-size:14px;">Та же схема воспроизводится на Make/n8n с открытыми MCP-серверами и GigaChat API.</p>
      </div>
      <div class="ym-bento-card ym-bento-stat reveal delay-300">
        <div class="ym-stat-value">56%</div>
        <div class="ym-stat-label">компаний хотят агентов</div>
        <span class="ym-stat-trend">опрос 29.05</span>
      </div>
      <div class="ym-bento-card ym-bento-stat reveal delay-400">
        <div class="ym-stat-value">40%</div>
        <div class="ym-stat-label">автоматизация офиса</div>
      </div>
    </div>
  </div>
</section>

<section class="ym-section" id="bez-it">
  <div class="ym-container gcw-prose reveal">
    <h2>ИИ-агенты для бизнеса без разработчиков — что реально значит «без IT»</h2>
    <p><strong>Определение:</strong> владелец процесса описывает регламент на естественном языке, подключает системы через no-code/MCP; разработчик нужен только на этапе первичной настройки коннекторов и политик безопасности.</p>
    <p>Родовой спрос: «ии агент» (~38 642 показов/мес), «ии агенты для бизнеса», «цифровые сотрудники» (~11 000 — оценка Nero). Бренд <strong>gigacowork</strong> пока почти без собственной частотности.</p>
    <h3>Регламенты на русском вместо кода</h3>
    <p>GigaCowork позиционирует <strong>навыки</strong> как замену скриптам. Аналог вне Сбера — цепочки Make или n8n с human approval.</p>
    <h3>Отличие от «создать ии агента» (dev-запросы)</h3>
    <p><strong>Коротко:</strong> если нужен LangChain — другой материал. Если нужно сократить −81,5% рутины в документообороте без отдела разработки — вы в целевой аудитории.</p>
  </div>
</section>

<!-- BORIS_PLACEHOLDER -->

<section class="ym-section ym-section-alt" id="piloty-roi">
  <div class="ym-container gcw-prose reveal">
    <h2>Пилоты Сбера: цифры ROI по документам, HR и отчётности</h2>
    <p><strong>Важно:</strong> метрики ниже — <strong>внутренние пилоты Сбера</strong>, не независимый бенчмарк. Используйте цифры как <strong>верхнюю границу</strong> гипотезы.</p>
    <table>
      <thead><tr><th>Метрика</th><th>Значение</th><th>Источник</th></tr></thead>
      <tbody>
        <tr><td>Скорость обработки документов</td><td><strong>+80%</strong></td><td>Habr, CNews</td></tr>
        <tr><td>Рабочее время на задачу</td><td><strong>−81,5%</strong></td><td>Белевцев</td></tr>
        <tr><td>HR-процессы</td><td><strong>−83%</strong></td><td>CNews</td></tr>
        <tr><td>Отчётность</td><td><strong>+70%</strong></td><td>CNews</td></tr>
        <tr><td>Поиск кандидатов</td><td><strong>+93%</strong></td><td>Habr</td></tr>
      </tbody>
    </table>
    <h3>Микрокейсы с замером времени</h3>
    <ul>
      <li>Смена условий оплаты: <strong>2–3 часа → ~10 минут</strong></li>
      <li>Юридическая проверка: <strong>1–2 часа → несколько минут</strong></li>
      <li>Сверка 1С + CRM <strong>по расписанию</strong> агентом</li>
    </ul>
    <h3>Как перенести метрики на свой пилот (3–5 воронок)</h3>
    <p><strong>Шаблон замера (14 дней):</strong> один процесс → baseline → «навык» → MCP/Make → 10–20 прогонов.</p>
    <table>
      <thead><tr><th>Воронка</th><th>Что автоматизировать</th><th>Метрика</th></tr></thead>
      <tbody>
        <tr><td>HR</td><td>Скрининг, поиск в базе</td><td>Время на вакансию</td></tr>
        <tr><td>Документооборот</td><td>Сверка, шаблоны</td><td>Цикл согласования</td></tr>
        <tr><td>Отчётность</td><td>KPI из CRM + таблиц</td><td>Часы аналитика</td></tr>
        <tr><td>Поддержка</td><td>Классификация, черновики</td><td>FCR, TTR</td></tr>
        <tr><td>Закупки</td><td>Маршрут согласования</td><td>Просрочки</td></tr>
      </tbody>
    </table>
    <p><strong>Итог:</strong> достаточно <strong>−30%</strong> времени на одном процессе при контролируемых рисках, чтобы окупить стек.</p>
    {cta_primary(
        "Соберём пилот «как GigaCowork» на вашем стеке",
        "Одна воронка за 2–4 недели: Make или n8n, MCP к CRM/почте, GigaChat API и governance по чек-листу из статьи. Nero Network проектирует сценарий и метрики «до/после».",
    )}
  </div>
</section>

<section class="ym-section" id="mcp-kontur">
  <div class="ym-container gcw-prose reveal">
    <h2>MCP в корпоративном контуре: CRM, ERP, почта, документы</h2>
    <p><strong>MCP (Model Context Protocol)</strong> — открытый стандарт для подключения LLM к CRM, почте, файлам, API. В декабре 2025 передан в Linux Foundation / AAIF; <strong>97M+</strong> загрузок SDK, <strong>10 000+</strong> публичных MCP-серверов.</p>
    <h3>Model Context Protocol простыми словами для руководителя</h3>
    <p><strong>Коротко для CEO/COO:</strong> MCP — «универсальный разъём» между нейросетью и вашими системами.</p>
    <h3>Сценарии: документооборот, поддержка, отчёты</h3>
    <table>
      <thead><tr><th>Сценарий</th><th>MCP / интеграция</th><th>Human-in-the-loop</th></tr></thead>
      <tbody>
        <tr><td>Документооборот</td><td>Файлы + CRM</td><td>Юрист утверждает правки</td></tr>
        <tr><td>Поддержка</td><td>Тикеты + база знаний</td><td>Оператор отправляет ответ</td></tr>
        <tr><td>Отчёты</td><td>CRM + таблицы</td><td>Финдиректор подписывает</td></tr>
        <tr><td>HR</td><td>ATS + почта</td><td>Рекрутер приглашает</td></tr>
      </tbody>
    </table>
    <p>Конкурент-слой: <strong>Alice AI LLM Flash</strong> (28.05.2026) — модель для документов, не платформа агентов.</p>
  </div>
</section>

<section class="ym-section ym-section-alt" id="governance">
  <div class="ym-container gcw-prose reveal">
    <h2>Безопасность и governance: доступы, логи, human-in-the-loop</h2>
    <p><strong>Governance</strong> — кто запускает агента, какие системы доступны, что логируется, где обязательно согласие человека.</p>
    <ul>
      <li>Действия <strong>от имени сотрудника</strong></li>
      <li><strong>Логирование</strong> всех шагов</li>
      <li><strong>Human-in-the-loop</strong> перед необратимыми действиями</li>
      <li>Развёртывание: облако, гибрид, <strong>on-premise</strong></li>
    </ul>
    <h3>Чек-лист governance для МСБ</h3>
    <ul class="gcw-checklist">
      <li>Матрица ролей: кто создаёт «навыки», кто запускает, кто аудирует</li>
      <li>Whitelist действий агента</li>
      <li>Логи с retention по политике ПДн</li>
      <li>DPA с провайдером LLM</li>
      <li>Тест на утечку в публичные модели</li>
    </ul>
    <h3>Итеративное обучение агентов на знаниях компании</h3>
    <p>Обучение — не разовая загрузка PDF, а <strong>итерации</strong> после ошибок. Аналог в Make/n8n: версионирование сценариев + RAG. Практический курс по автоматизации на Make/n8n — в программе <a href="{SECONDARY_URL}" target="_blank" rel="noopener noreferrer">{SECONDARY_LABEL}</a>; это ускоряет итерации «навыков» без найма отдельного отдела разработки.</p>
    <p><strong>Итог:</strong> без governance автоматизация ускоряет не работу, а инциденты.</p>
    {cta_primary(
        "Аудит доступов и логов перед запуском агента",
        "Проверим матрицу ролей, whitelist действий и хранение логов под 152-ФЗ — затем запустим MVP без «ускорения инцидентов».",
        anchor_id="nero-cta-governance",
    )}
  </div>
</section>

<section class="ym-section" id="sravnenie">
  <div class="ym-container gcw-prose reveal">
    <h2>GigaCowork vs Claude Cowork vs стек Make/n8n</h2>
    <table>
      <thead><tr><th>Ось</th><th>GigaCowork</th><th>Claude Cowork</th><th>Make / n8n + GigaChat</th></tr></thead>
      <tbody>
        <tr><td>Данные в РФ</td><td>Экосистема Сбера, on-prem</td><td>Ограничения для РФ B2B</td><td>Зависит от хостинга</td></tr>
        <tr><td>No-code</td><td>Навыки на русском</td><td>Desktop + MCP</td><td>Сценарии + модули</td></tr>
        <tr><td>Команды агентов</td><td>Workspace, расписание</td><td>Cowork sessions</td><td>Оркестратор</td></tr>
        <tr><td>MCP</td><td>CRM, ERP, почта</td><td>Google, HubSpot</td><td>Открытые серверы</td></tr>
        <tr><td>ROI</td><td>Пилоты Сбера</td><td>Кейсы Anthropic</td><td>Ваш пилот 14 дней</td></tr>
        <tr><td>Стоимость (3 года)</td><td>Enterprise</td><td>Подписка + compliance</td><td>МСБ 5–15 млн ₽*</td></tr>
      </tbody>
    </table>
    <h3>Когда что выбирать</h3>
    <table>
      <thead><tr><th>Ситуация</th><th>Рекомендация</th></tr></thead>
      <tbody>
        <tr><td>Уже на GigaChat Enterprise</td><td>Тест GigaCowork</td></tr>
        <tr><td>МСБ, смешанный стек</td><td>Make/n8n + MCP + GigaChat API</td></tr>
        <tr><td>Только дешевая модель для текстов</td><td>Alice Flash / API</td></tr>
        <tr><td>Dev-команда, CI/CD</td><td>Cursor Automations</td></tr>
      </tbody>
    </table>
  </div>
</section>

<section class="ym-section ym-section-alt" id="plan-make">
  <div class="ym-container gcw-prose reveal">
    <h2>Пошаговый план: собрать аналог на Make, n8n и GigaChat API</h2>
    <p><strong>Схема:</strong> регламент → навык → MCP → человек (approval).</p>
    <div class="ym-grid-2-cards">
      <div class="ym-card reveal delay-100">
        <h3>HR</h3>
        <p>Триггер: резюме в ATS. Агент ранжирует; human приглашает на интервью. Ориентир: до +93% поиска (Сбер).</p>
      </div>
      <div class="ym-card reveal delay-200">
        <h3>Документооборот</h3>
        <p>Триггер: договор в почте. Сверка с шаблоном. Кейс: 2–3 ч → ~10 мин.</p>
      </div>
      <div class="ym-card reveal delay-300">
        <h3>Отчётность</h3>
        <p>Расписание пн 09:00. CRM + свод в таблицу. Пилот: +70% скорости.</p>
      </div>
      <div class="ym-card reveal delay-400">
        <h3>Поддержка</h3>
        <p>Новый тикет → классификация и черновик из базы знаний.</p>
      </div>
    </div>
    <h3>Чек-лист пилота на 2–4 недели</h3>
    <div class="ym-timeline">
      <div class="ym-step reveal"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>Неделя 1</h3><p>Процесс, baseline, регламент, матрица доступов.</p></div></div>
      <div class="ym-step reveal delay-100"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>Неделя 2</h3><p>MVP, 5 прогонов, правки «навыка».</p></div></div>
      <div class="ym-step reveal delay-200"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>Неделя 3</h3><p>10–20 прогонов, медиана времени, аудит логов.</p></div></div>
      <div class="ym-step reveal delay-300"><div class="ym-step-num">4</div><div class="ym-step-content"><h3>Неделя 4</h3><p>Scale / stop; документ ROI.</p></div></div>
    </div>
    {cta_secondary(
        "Освоить Make, n8n и MCP на практике",
        "Перед масштабированием агентов команде нужны навыки: регламенты в сценариях, human-in-the-loop, отладка коннекторов.",
    )}
    <p><strong>Итог:</strong> gigacowork как ориентир, Make/n8n как исполнение — без зависимости от банковской экосистемы.</p>
  </div>
</section>

{cta_primary(
    "Готовы повторить контур GigaCowork вне экосистемы банка?",
    "Обсудим вашу воронку (документы, HR, отчёты или поддержка), стек и срок пилота — с фиксацией baseline и целевой метрики на 14 дней.",
    anchor_id="nero-cta-pre-faq",
)}

<section class="ym-section" id="faq">
  <div class="ym-container reveal">
    <h2 class="ym-section-title">FAQ по GigaCowork и корпоративным ИИ-агентам</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar">
        <p style="font-weight:700;margin:0 0 16px;">Вопросы</p>
        <ul class="ym-faq-list">
          <li><a href="#faq-dev">Программисты</a></li>
          <li><a href="#faq-cost">Стоимость</a></li>
          <li><a href="#faq-bot">Чат-бот vs агент</a></li>
          <li><a href="#faq-simple">Простыми словами</a></li>
          <li><a href="#faq-diy">Без Сбера</a></li>
          <li><a href="#faq-rf">Claude vs РФ</a></li>
          <li><a href="#faq-enterprise">GigaChat Enterprise</a></li>
        </ul>
      </aside>
      <div>
        <article class="ym-faq-item" id="faq-dev"><h3>Нужны ли программисты?</h3><p>Для навыков GigaCowork Сбер заявляет управление без разработчиков. IT нужен на MCP, SSO и политиках — обычно <strong>2–10 дней</strong> на пилот. На Make/n8n бизнес ведёт сценарий; разработчик — коннекторы и on-prem.</p></article>
        <article class="ym-faq-item" id="faq-cost"><h3>Сколько стоит и как окупается?</h3><p>Прайс GigaCowork в тесте не детализирован. Ориентир рынка: малый бизнес <strong>5–15 млн ₽</strong> за 3 года (Axenix/МГУ). Окупаемость считайте на <strong>одном процессе</strong>: MVP часто <strong>сотни тысяч – 2 млн ₽</strong>.</p></article>
        <article class="ym-faq-item" id="faq-bot"><h3>Чем отличается от чат-бота?</h3><p>Чат-бот отвечает в диалоге. <strong>ИИ-агент</strong> выполняет цепочку в CRM, почте, файлах по регламенту, по расписанию, с логами и human approval.</p></article>
        <article class="ym-faq-item" id="faq-simple"><h3>Что такое GigaCowork простыми словами?</h3><p>Корпоративная «панель управления» ИИ-агентами Сбера: регламенты → навыки → MCP → контроль человеком. Тест с 19.05.2026.</p></article>
        <article class="ym-faq-item" id="faq-diy"><h3>Можно ли повторить без Сбера?</h3><p>Да: workspace / навыки / MCP / логи на Make, n8n, GigaChat API и открытых MCP-серверах.</p></article>
        <article class="ym-faq-item" id="faq-rf"><h3>GigaCowork или Claude Cowork для РФ?</h3><p>Для данных в РФ чаще GigaCowork, Yandex AI Studio или on-prem + открытый оркестратор. Claude — ориентир по UX, с ограничениями compliance.</p></article>
        <article class="ym-faq-item" id="faq-enterprise"><h3>Как связаны gigachat для бизнеса и GigaCowork?</h3><p>GigaChat Enterprise — агенты и API; GigaCowork — слой управления <strong>несколькими</strong> агентами, workspace и MCP без кода.</p></article>
      </div>
    </div>
    <p class="gcw-prose reveal" style="margin-top:48px;text-align:left;"><strong>Итог страницы:</strong> инфоповод GigaCowork подтверждает спрос на <strong>ии агенты для бизнеса</strong>. Практичный путь — 14-дневный пилот на одной воронке на Make/n8n + MCP + GigaChat API с governance из материала.</p>
  </div>
</section>
"""


def json_ld() -> str:
    page_url = f"{SITE_URL}/{SLUG}/"
    return f"""<script type="application/ld+json">
{{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": {SEO_TITLE!r},
  "description": {SEO_DESC!r},
  "datePublished": "2026-06-01",
  "dateModified": "2026-06-01",
  "author": {{
    "@type": "Organization",
    "name": "Nero Network"
  }},
  "publisher": {{
    "@type": "Organization",
    "name": "Nero Network"
  }},
  "mainEntityOfPage": {{
    "@type": "WebPage",
    "@id": {page_url!r}
  }},
  "inLanguage": "ru-RU",
  "keywords": "gigacowork, ии агенты для бизнеса, mcp автоматизация, make n8n"
}}
</script>"""


def reveal_script() -> str:
    return (ROOT / "shared/longread-page-reveal.js").read_text(encoding="utf-8")


def build_html_body() -> str:
    hero = extract_codeblock(ROOT / ".cursor/nero-network-fragments/alina.md")
    boris = extract_codeblock(ROOT / ".cursor/nero-network-fragments/boris.md")
    # hero CTA anchor
    hero = hero.replace('href="#nero-cta-primary"', f'href="{PRIMARY_URL}"')
    articles = article_sections().replace("<!-- BORIS_PLACEHOLDER -->", boris)
    css = critical_css() + load_page_css()
    return f"""<style>
{css}
</style>

<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">
{hero}
{intro_section()}
{articles}
</main>

<script>
{reveal_script()}
</script>
{json_ld()}
"""


def build_php(html_body: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    return f"""<?php
/**
 * Template Name: GigaCowork ИИ-агенты без программистов
 * Description: Лонгрид gigacowork-ii-agenty-biznes-bez-programmistov (hero Canvas + MCP блок).
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
    handoff_path = ROOT / ".cursor/nero-network-handoff.md"
    text = handoff_path.read_text(encoding="utf-8")
    block = f"""
=== НАТАША (HTML СТРАНИЦЫ) ===
Статус: ✅ ГОТОВО
SLUG: {SLUG}
Размер HTML (с пробелами): {len(html_body)} знаков

## Структура
- Hero Алины (`#gigacowork-orchestra`, canvas `gcw-orchestra-canvas`)
- Intro grid + terminal + `.ym-toc`
- Секции: gigacowork-cipr, bez-it, **Борис MCP** (`#gigacowork-boris-block`), piloty-roi, mcp-kontur, governance, sravnenie, plan-make, FAQ
- CTA Артура: 3× PRIMARY, 1× SECONDARY карточка, 1× inline SECONDARY
- JSON-LD Article + reveal.js

ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

{html_body}

## Передача Юре
SLUG: {SLUG}
Шаблон в репозитории: wordpress/page-{SLUG}.php
Контент содержит <script> (hero engine + boris MCP + reveal) и <canvas>. Обязательно обернуть в <!-- wp:html --> при публикации.
"""
    if "=== НАТАША (HTML СТРАНИЦЫ) ===" in text:
        text = re.sub(
            r"\n=== НАТАША \(HTML СТРАНИЦЫ\) ===.*",
            block,
            text,
            flags=re.DOTALL,
        )
    else:
        text = text.rstrip() + "\n" + block
    handoff_path.write_text(text, encoding="utf-8")


def main() -> None:
    html_body = build_html_body()
    php_path = ROOT / f"wordpress/page-{SLUG}.php"
    php_path.write_text(build_php(html_body), encoding="utf-8")
    update_handoff(html_body)
    print(f"HTML size: {len(html_body)} chars")
    print(f"PHP: {php_path}")
    assert 'id="primary"' in html_body
    assert "gcw-orchestra-canvas" in html_body
    assert "gigacowork-boris-mcp-canvas" in html_body
    print("OK: main#primary, hero canvas, boris canvas")


if __name__ == "__main__":
    main()
