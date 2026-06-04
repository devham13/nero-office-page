#!/usr/bin/env python3
"""Assemble page template for Natasha (meta-business-agent).

Usage:
  python3 scripts/build-natasha-page.py           # deploy: bake CTA from env
  python3 scripts/build-natasha-page.py --for-git  # commit-safe: getenv() only
"""
from __future__ import annotations

import argparse
import re
import sys
from pathlib import Path

PROJECT = Path("/workspace")
sys.path.insert(0, str(PROJECT / "shared"))
from credentials import get_credential  # noqa: E402

parser = argparse.ArgumentParser()
parser.add_argument(
    "--for-git",
    action="store_true",
    help="Emit getenv()-based CTA vars (no secrets) for repository commits",
)
args = parser.parse_args()

slug = "meta-business-agent-whatsapp-ii-agent-prodazhi"
page_class = f"{slug}-page"
out_path = PROJECT / "wordpress-theme" / f"page-{slug}.php"

if args.for_git:
    PHP_CTA_VARS = """
$nero_primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '#cta-final';
$nero_primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Обсудить внедрение';
$nero_secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: $nero_primary_cta_url;
$nero_secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Обучение команды';
"""
else:
    _primary_url = get_credential("PRIMARY_CTA_URL") or "#cta-final"
    _secondary_url = get_credential("SECONDARY_CTA_URL") or _primary_url
    _primary_label = get_credential("PRIMARY_CTA_LABEL") or "Обсудить внедрение"
    _secondary_label = get_credential("SECONDARY_CTA_LABEL") or "Обучение команды"
    PHP_CTA_VARS = f"""
$nero_primary_cta_url = {_primary_url!r};
$nero_primary_cta_label = {_primary_label!r};
$nero_secondary_cta_url = {_secondary_url!r};
$nero_secondary_cta_label = {_secondary_label!r};
"""

page_seo_title = "Meta Business Agent в WhatsApp: ИИ-агент для продаж и CRM"
page_seo_description = (
    "Релиз Meta Business Agent в WhatsApp (июнь 2026): функции, цены, лимиты для РФ. "
    "Как внедрить ИИ-агента для продаж и поддержки в WhatsApp, Telegram, MAX и CRM за 2–4 недели — "
    "аналог, ROI, интеграции."
)

handoff = (PROJECT / ".cursor/nero-network-handoff.md").read_text(encoding="utf-8")


def extract_html_after(marker: str, which: int = 0) -> str:
    idx = handoff.find(marker)
    if idx < 0:
        return ""
    rest = handoff[idx:]
    blocks = re.findall(r"```html\n(.*?)```", rest, re.DOTALL)
    return blocks[which] if which < len(blocks) else ""


alina_parts = handoff.split("=== АЛИНА (HERO) ===")
hero_html = ""
if len(alina_parts) >= 2:
    m = re.search(r"```html\n(.*?)```", alina_parts[-1], re.DOTALL)
    if m:
        hero_html = m.group(1)
hero_html = hero_html.replace(
    'href="#cta-final"',
    'href="<?php echo esc_url($nero_primary_cta_url); ?>"',
)

boris_section = handoff.split("=== БОРИС (БЛОК СТАТЬИ, НЕ HERO) ===")[-1]
boris_blocks = re.findall(r"```html\n(.*?)```", boris_section, re.DOTALL)
boris_flow = boris_blocks[0] if len(boris_blocks) > 0 else ""
boris_compare = boris_blocks[1] if len(boris_blocks) > 1 else ""
boris_roi = boris_blocks[2] if len(boris_blocks) > 2 else ""

artur_section = handoff.split("=== АРТУР (CTA И РЕКЛАМА) ===")[1].split("=== АЛИНА")[0]
cta_blocks = re.findall(r"```html\n(.*?)```", artur_section, re.DOTALL)


def normalize_cta_hrefs(html: str) -> str:
    """Force CTA links through PHP variables (git-safe, no baked URLs)."""
    # Attribute order varies (style before href); avoid [^>]* when href may contain ?>.

    def _fix_btn(pattern: str, href_var: str, label_var: str, source: str) -> str:
        def repl(match: re.Match[str]) -> str:
            tag = match.group(0)
            tag = re.sub(r'href="[^"]*"', f'href="<?php echo esc_url({href_var}); ?>"', tag, count=1)
            tag = re.sub(
                r"<span>[^<]*</span>",
                f"<span><?php echo esc_html({label_var}); ?></span>",
                tag,
                count=1,
            )
            return tag

        return re.sub(pattern, repl, source, flags=re.DOTALL)

    html = _fix_btn(
        r'<a class="ym-btn ym-btn-primary".*?</a>',
        "$nero_primary_cta_url",
        "$nero_primary_cta_label",
        html,
    )
    html = _fix_btn(
        r'<a class="ym-btn ym-btn-secondary".*?</a>',
        "$nero_secondary_cta_url",
        "$nero_secondary_cta_label",
        html,
    )
    return html


def php_cta_html(html: str) -> str:
    """Convert Artur CTA markup to PHP-backed URLs and labels."""
    return normalize_cta_hrefs(html)


def php_cta_inline_secondary(html: str) -> str:
    html = re.sub(
        r'(<a href=")[^"]*(" target="_blank" rel="noopener noreferrer">)[^<]*(</a>)',
        r'\1<?php echo esc_url($nero_secondary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nero_secondary_cta_label); ?>\3',
        html,
        count=1,
    )
    return html


cta_mid = php_cta_html(cta_blocks[0]) if cta_blocks else ""
cta_inline = (
    php_cta_inline_secondary(cta_blocks[1]) if len(cta_blocks) > 1 else ""
)
cta_sidebar = php_cta_html(cta_blocks[2]) if len(cta_blocks) > 2 else ""
cta_banner = php_cta_html(cta_blocks[3]) if len(cta_blocks) > 3 else ""
cta_final = php_cta_html(cta_blocks[4]) if len(cta_blocks) > 4 else ""
# Final block: restore secondary button after generic replace
if cta_final:
    cta_final = re.sub(
        r'(<a class="ym-btn ym-btn-secondary"[^>]*href=")[^"]*(")',
        r'\1<?php echo esc_url($nero_secondary_cta_url); ?>"',
        cta_final,
        count=1,
    )
    cta_final = re.sub(
        r'(<a class="ym-btn ym-btn-secondary"[^>]*><span>)[^<]*(</span>)',
        r'\1<?php echo esc_html($nero_secondary_cta_label); ?>\2',
        cta_final,
        count=1,
    )

css = (PROJECT / "shared/longread-page-design-reference.css").read_text(encoding="utf-8")
# Strip file header comment block for smaller output
css = re.sub(r"/\*\*[\s\S]*?\*/\s*", "", css, count=1)
css = css.replace(".metrika-skill-page", f".{page_class}")
css = css.replace("--ym-primary: #ff0000", "--ym-primary: #22c55e")
css = css.replace("--ym-accent: #3b82f6", "--ym-accent: #2563eb")
css = css.replace("rgba(255, 0, 0", "rgba(34, 197, 94")
css = css.replace("#ff0000", "#22c55e")
css = css.replace("#ff4b4b", "#16a34a")
css = css.replace("#e60000", "#15803d")

extra_css = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#meta-ba-hero.meta-ba-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.meta-ba-hero .hero-copy-block {
  background: linear-gradient(135deg, rgba(248,250,252,0.97) 0%, rgba(248,250,252,0.88) 100%);
  backdrop-filter: blur(8px);
  padding: clamp(16px, 3vw, 28px);
  border-radius: 20px;
  border: 1px solid rgba(226, 232, 240, 0.9);
  box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
  max-width: min(680px, 92vw);
}
.meta-ba-hero .vl-ui-pill,
.meta-ba-hero .vl-ui-tasks {
  pointer-events: none;
}
@media (max-width: 900px) {
  .meta-ba-hero .vl-ui-pill { display: none; }
  .meta-ba-hero .vl-ui-tasks {
    position: relative;
    right: auto;
    bottom: auto;
    left: auto;
    margin: 16px;
    order: 3;
  }
  #meta-ba-hero.meta-ba-hero.fullscreen-white-office {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding-top: 72px;
    min-height: auto;
    padding-bottom: 24px;
  }
  .meta-ba-hero .hero-copy-block {
    position: relative;
    top: auto;
    bottom: auto;
    left: auto;
    margin: 0 16px 16px;
    order: 1;
  }
  .meta-ba-hero #meta-ba-hero-canvas {
    position: absolute;
    inset: 0;
    height: 280px;
    opacity: 0.35;
  }
}
.meta-ba-intro-wrap { padding: 48px 0 24px; }
.meta-ba-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: start;
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 20px;
}
.meta-ba-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #22c55e, #2563eb) 1;
  padding-left: 24px;
}
.meta-ba-intro-text p { text-align: left !important; }
.meta-ba-intro-lead { font-size: 18px; line-height: 1.65; color: #334155 !important; margin: 0 0 16px; }
.meta-ba-intro-sub { font-size: 15px; line-height: 1.6; color: #64748b !important; margin: 0; }
.meta-ba-toc-wrap { text-align: center; padding: 8px 20px 40px; }
.meta-ba-prose { max-width: 900px; margin: 0 auto; }
.meta-ba-prose h2 { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; margin: 0 0 20px; color: #0f172a !important; }
.meta-ba-prose h3 { font-size: 1.15rem; font-weight: 700; margin: 28px 0 12px; color: #0f172a !important; }
.meta-ba-prose p, .meta-ba-prose li { line-height: 1.65; margin-bottom: 16px; }
.meta-ba-prose ul { padding-left: 1.25rem; margin-bottom: 20px; }
.meta-ba-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; font-size: 14px; }
.meta-ba-prose th, .meta-ba-prose td { border: 1px solid #e2e8f0; padding: 12px 14px; text-align: left; vertical-align: top; }
.meta-ba-prose th { background: #f8fafc; font-weight: 700; }
.meta-ba-prose hr { border: 0; border-top: 1px solid #e2e8f0; margin: 32px 0; }
.meta-ba-prose a { color: #2563eb; }
.boris-viz-wrap { margin: 48px 0; }
.boris-viz-wrap .ym-container { padding: 0; max-width: 1300px; margin: 0 auto; padding-left: 20px; padding-right: 20px; }
@media (max-width: 900px) {
  .meta-ba-intro-grid { grid-template-columns: 1fr; }
}
"""

reveal_js = (PROJECT / "shared/longread-page-reveal.js").read_text(encoding="utf-8")
reveal_js = re.sub(r"/\*\*[\s\S]*?\*/\s*", "", reveal_js, count=1)

# Content sections (from Zhenya longread)
sections = {}

sections["meta-agent-2026"] = """
<section id="meta-agent-2026" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Meta Business Agent в WhatsApp — что изменилось с 3 июня 2026</h2>
    <p><strong>Определение.</strong> Meta Business Agent — встроенный ИИ-ассистент для бизнес-аккаунтов в мессенджерах Meta: отвечает клиентам от имени компании, опирается на данные бизнеса и правила владельца, при необходимости передаёт диалог человеку.</p>
    <p>3 июня 2026 на конференции Conversations в Лондоне Meta объявила <strong>глобальный rollout</strong> агента на <strong>WhatsApp, Messenger и Instagram</strong>. Базовая активация заявлена как <strong>бесплатная</strong>; платные подписки обещают «в ближайшие месяцы» (<a href="https://about.fb.com/news/2026/06/meta-business-agent/" target="_blank" rel="noopener noreferrer">about.fb.com</a>).</p>
    <p>По данным релиза, в пилотах (Индия, Мексика, Бразилия) агентом пользовались <strong>более 1 млн</strong> бизнесов; на WhatsApp, Messenger и Instagram — <strong>более 1 млрд</strong> активных диалогов «бизнес — клиент» в сутки.</p>
    <h3>Возможности: ответы 24/7, лиды, запись, эскалация на человека</h3>
    <ul>
      <li>ответы по базе знаний и политикам бизнеса <strong>круглосуточно</strong>;</li>
      <li>рекомендации из <strong>каталога</strong> товаров и услуг;</li>
      <li><strong>запись и бронирование</strong> (слоты, услуги);</li>
      <li><strong>квалификация лидов</strong> и сопровождение до сделки;</li>
      <li><strong>эскалация на менеджера</strong> по правилам владельца.</li>
    </ul>
    <p>Расширенные функции — <strong>утренний брифинг</strong>, market research, календарь — на дату релиза в статусе <strong>теста и waitlist</strong>.</p>
    <h3>Business Agent Platform, токены и waitlist — для кого доступно</h3>
    <p>Параллельно Meta продвигает <strong>Business Agent Platform</strong> — agentic-платформу для кастомных агентов enterprise: интеграции с Shopify, Zendesk, Shopee. Для крупного бизнеса на WhatsApp Business Platform тарификация <strong>по потреблению (tokens)</strong>. Агент войдёт в подписку <strong>Meta One</strong>.</p>
    <p><strong>Итог блока:</strong> для глобального SMB — «включил и пользуешься»; для enterprise — платформа, токены, waitlist.</p>
  </div>
</section>
"""

sections["chatbot-vs-agent"] = """
<section id="chatbot-vs-agent" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Чем Meta Business Agent отличается от обычного чат-бота</h2>
    <p>Запросы <strong>«чат бот для бизнеса»</strong> (~21 500 показов/мес в РФ) и <strong>«чатбот»</strong> (~7 371) остаются родовым кластером. Релиз Meta задаёт новый референс «как должно работать в мессенджере».</p>
    <h3>Сценарный бот vs ИИ-агент с CRM и каталогом</h3>
    <table>
      <thead><tr><th>Критерий</th><th>Сценарный чатбот</th><th>ИИ-агент (Meta или аналог)</th></tr></thead>
      <tbody>
        <tr><td>Диалог</td><td>Жёсткие ветки, кнопки</td><td>Понимание свободной формулировки в рамках политики</td></tr>
        <tr><td>Данные</td><td>Часто изолирован от CRM</td><td>Каталог, статусы заказов, слоты записи</td></tr>
        <tr><td>Цель</td><td>FAQ, сбор контакта</td><td>Лид, запись, продажа, эскалация</td></tr>
        <tr><td>Риск</td><td>«Застрял в меню»</td><td>Галлюцинации → нужны guardrails</td></tr>
      </tbody>
    </table>
    <h3>Когда хватает WhatsApp Business App, а когда нужен API</h3>
    <p><strong>WhatsApp Business App</strong> достаточно при до ~50–100 диалогов в день без жёсткой интеграции с CRM.</p>
    <p><strong>API + агент</strong> нужен при нескольких каналах, автоматизации продаж и эскалации с историей в CRM. С 15 января 2026 в WhatsApp Business API запрещены general-purpose AI-ассистенты; разрешены purpose-driven сценарии.</p>
  </div>
</section>
"""

sections["rf-analog"] = """
<section id="rf-analog" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Ограничения для бизнеса в России и зачем собирать «аналог»</h2>
    <p><strong>Коротко:</strong> глобальный релиз Meta (3.06.2026) и российская реальность 2026 (блокировки, MAX, 152-ФЗ) расходятся. Практичный путь — <strong>аналог</strong> в доступных каналах + CRM + оркестрация (Make/n8n).</p>
    <h3>WhatsApp, Telegram, MAX — что реально подключить в 2026</h3>
    <p><strong>12 февраля 2026</strong> РКН подтвердил блокировку WhatsApp; Meta заявила о переводе пользователей на <strong>MAX</strong>. Для бизнеса <strong>Meta Business Agent</strong> как «включил в один клик» — не универсальное решение для РФ.</p>
    <p>Стратегия <strong>омниканала</strong>: Telegram, MAX, при необходимости WhatsApp — с учётом рисков блокировок и политики платформы.</p>
    <h3>ПДн, хранение переписки, эскалация на менеджера</h3>
    <ul>
      <li><strong>152-ФЗ:</strong> согласия, цели обработки, хранение в РФ;</li>
      <li><strong>Хранение переписки:</strong> CRM и ретеншен;</li>
      <li><strong>Эскалация:</strong> триггеры → очередь в CRM + уведомление менеджеру.</li>
    </ul>
  </div>
</section>
"""

sections["vnedrenie"] = """
<section id="vnedrenie-2-4-nedeli" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Как внедрить ИИ-агента для продаж и поддержки за 2–4 недели</h2>
    <p>Ориентир Nero Network для SMB: <strong>2–4 недели</strong> от брифа до промышленного контура.</p>
    <h3>Этап 1: сценарии, база знаний, тон бренда</h3>
    <p>Карта 20–40 типовых диалогов, база знаний, тон бренда, KPI пилота: время первого ответа, % закрытых без человека, конверсия в запись.</p>
    <h3>Этап 2: интеграция amoCRM / Bitrix24 / YCLIENTS / 1С</h3>
    <p>Создание лида/сделки, коннекторы YCLIENTS, 1С / МойСклад — остатки и статусы по scope.</p>
    <h3>Этап 3: Make.com / n8n, тесты, обучение команды</h3>
    <p>Оркестрация в Make.com или n8n, A/B на формулировках, обучение менеджеров, мониторинг токенов LLM.</p>
    {cta_inline}
    <p><strong>Итог этапа:</strong> чат-бот в мессенджерах + CRM + измеримые метрики.</p>
  </div>
</section>
""".format(cta_inline=cta_inline)

sections["sravnenie"] = """
<section id="sravnenie-putey" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Сравнение: Meta Business Agent vs конструктор vs кастом</h2>
    <table>
      <thead><tr><th>Путь</th><th>Плюсы</th><th>Минусы</th><th>Кому подходит</th></tr></thead>
      <tbody>
        <tr><td><strong>Meta Business Agent</strong></td><td>Нативно в WhatsApp/IG/Messenger</td><td>РФ/блокировки, привязка к Meta</td><td>Экспорт, глобальный рынок</td></tr>
        <tr><td><strong>Конструктор</strong></td><td>Быстрый MVP</td><td>Потолок кастомизации</td><td>Малый поток</td></tr>
        <tr><td><strong>Кастом под ключ</strong></td><td>Telegram + MAX + CRM, 152-ФЗ</td><td>2–4 недели, бюджет выше SaaS</td><td>SMB с CRM</td></tr>
      </tbody>
    </table>
    <p><strong>Уникальный угол:</strong> Meta Agent — <strong>чек-лист функций</strong>, а не обязательный продукт.</p>
  </div>
</section>
"""

sections["stoimost"] = """
<section id="stoimost-roi" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Стоимость и окупаемость для SMB</h2>
    <h3>SaaS vs разработка под ключ — таблица бюджетов</h3>
    <table>
      <thead><tr><th>Статья</th><th>Конструктор SaaS</th><th>Кастом 2–4 недели</th></tr></thead>
      <tbody>
        <tr><td>Старт</td><td>Низкий ежемесячный платёж</td><td>Проект + интеграции</td></tr>
        <tr><td>LLM-токены</td><td>Часто в тарифе с лимитом</td><td>Прозрачный учёт</td></tr>
        <tr><td>CRM/1С</td><td>Доп. модули</td><td>В scope проекта</td></tr>
      </tbody>
    </table>
    <h3>Метрики ROI: лиды, время ответа, конверсия в запись</h3>
    <p>Кейс «Марта AI» в Bitrix24 (РБК Тренды): <strong>более 65%</strong> запросов без оператора; стоимость обращения <strong>с 500+ ₽ до 20–30 ₽</strong>; расходы на поддержку <strong>−42%</strong>.</p>
    <p>Контрбаланс: только ~11% пилотов переведены в промэксплуатацию; Gartner — отмена более 40% agent-проектов к 2027.</p>
  </div>
</section>
"""

sections["keisy"] = """
<section id="keisy" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Кейсы: ритейл, услуги, B2B в мессенджерах</h2>
    <p><strong>Ритейл.</strong> Статус заказа, наличие, апселл; менеджер при претензии.</p>
    <p><strong>Услуги.</strong> Запись через YCLIENTS: слоты, напоминания; канал — Telegram и MAX.</p>
    <p><strong>B2B.</strong> Квалификация, лид в Bitrix24, КП менеджеру; тон деловой, без «галлюцинаций» о скидках.</p>
  </div>
</section>
"""

sections["faq"] = """
<section id="faq-ii-agenty" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ по ИИ-агентам в мессенджерах</h2>
    <div class="ym-faq-layout">
      {cta_sidebar}
      <div class="ym-faq-list-content">
        <article class="ym-faq-item reveal" id="faq-meta">
          <h3>Можно ли без Meta и только в Telegram/MAX?</h3>
          <p><strong>Да</strong> — для большинства российских SMB это рекомендуемая стратегия в 2026: Telegram, MAX, CRM — единый источник правды. Meta Business Agent — ориентир по функциям.</p>
        </article>
        <article class="ym-faq-item reveal delay-100" id="faq-cost">
          <h3>Сколько стоит поддержка и токены LLM</h3>
          <p>Зависит от объёма диалогов и модели. Ориентир из РФ: <strong>20–30 ₽</strong> на закрытое обращение vs <strong>500+ ₽</strong> до автоматизации.</p>
        </article>
        <article class="ym-faq-item reveal delay-200" id="faq-hallucinations">
          <h3>Как не потерять клиента при «галлюцинациях» агента</h3>
          <p>Жёсткий system prompt, ответ только из базы + API CRM, порог уверенности → эскалация, логи и QA, purpose-driven сценарии.</p>
        </article>
      </div>
    </div>
  </div>
</section>
""".format(cta_sidebar=cta_sidebar)

intro = """
<section class="meta-ba-intro-wrap reveal" aria-label="Введение">
  <div class="meta-ba-intro-grid">
    <div class="meta-ba-intro-text">
      <p class="meta-ba-intro-lead"><strong>Коротко:</strong> 3 июня 2026 Meta вывела Business Agent глобально в WhatsApp, Messenger и Instagram. Для российского SMB разумнее собрать <strong>аналог</strong> в Telegram, MAX и CRM с измеримым ROI.</p>
      <p class="meta-ba-intro-sub">Ниже — что изменилось в релизе, чем агент отличается от чатбота, ограничения для РФ, этапы внедрения за 2–4 недели, сравнение путей и FAQ.</p>
    </div>
    <div class="meta-ba-intro-deco">
      <div class="ym-mac-window reveal-right">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">agent-pipeline.sh</span>
        </div>
        <div class="ym-mac-body">
          <span class="ym-comment"># Контур Nero Network</span><br>
          <span class="ym-command">$</span> каналы → telegram,max,whatsapp-api<br>
          <span class="ym-command">$</span> crm → amoCRM,bitrix24<br>
          <span class="ym-command">$</span> orchestrate → n8n,make<br>
          <span class="ym-command">$</span> deploy --weeks 2-4 --roi track
        </div>
      </div>
    </div>
  </div>
</section>
<div class="meta-ba-toc-wrap">
  <nav class="ym-toc reveal" aria-label="Оглавление">
    <a href="#meta-agent-2026">Релиз Meta</a>
    <a href="#chatbot-vs-agent">Чатбот vs агент</a>
    <a href="#rf-analog">Аналог для РФ</a>
    <a href="#vnedrenie-2-4-nedeli">Внедрение</a>
    <a href="#sravnenie-putey">Сравнение</a>
    <a href="#stoimost-roi">ROI</a>
    <a href="#keisy">Кейсы</a>
    <a href="#faq-ii-agenty">FAQ</a>
  </nav>
</div>
"""

conclusion = """
<section class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <p><strong>Итог.</strong> Релиз <strong>Meta Business Agent</strong> 3 июня 2026 задаёт планку: ИИ в мессенджере должен продавать, записывать и передавать человеку. Для России разумнее <strong>внедрение чат бота</strong> и <strong>ии агентов для бизнеса</strong> в Telegram, MAX и CRM за <strong>2–4 недели</strong> — с ROI по метрикам РБК и без зависимости от экосистемы Meta.</p>
  </div>
</section>
"""

json_ld = """{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Meta Business Agent в WhatsApp: как внедрить ИИ-агента для продаж и поддержки",
      "description": "Релиз Meta Business Agent в WhatsApp (июнь 2026): функции, цены, лимиты для РФ. Как внедрить ИИ-агента в WhatsApp, Telegram, MAX и CRM.",
      "author": {"@type": "Organization", "name": "Nero Network"},
      "datePublished": "2026-06-04",
      "inLanguage": "ru-RU"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {"@type": "Question", "name": "Можно ли без Meta и только в Telegram/MAX?", "acceptedAnswer": {"@type": "Answer", "text": "Да — для большинства российских SMB это рекомендуемая стратегия в 2026."}},
        {"@type": "Question", "name": "Сколько стоит поддержка и токены LLM?", "acceptedAnswer": {"@type": "Answer", "text": "Зависит от объёма диалогов; ориентир 20–30 ₽ на закрытое обращение при зрелом агенте."}},
        {"@type": "Question", "name": "Как не потерять клиента при галлюцинациях агента?", "acceptedAnswer": {"@type": "Answer", "text": "Guardrails, база знаний, порог уверенности и эскалация на менеджера."}}
      ]
    }
  ]
}"""

if args.for_git:
    hero_html = normalize_cta_hrefs(hero_html)

php = f"""<?php
/**
 * Template Name: Meta Business Agent WhatsApp II Agent Prodazhi
 * Description: Longread — Meta Business Agent в WhatsApp, внедрение ИИ-агента для продаж.
 */

$page_seo_title = '{page_seo_title}';
$page_seo_description = '{page_seo_description}';

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

{PHP_CTA_VARS}

get_header();
?>

<style>
{css}
{extra_css}
</style>

<main id="primary" class="site-main {page_class}" role="main" tabindex="-1">
<span id="main" tabindex="-1" class="ym-skip-target" aria-hidden="true" style="position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0"></span>

{hero_html}

{intro}

{sections["meta-agent-2026"]}

{sections["chatbot-vs-agent"]}

{sections["rf-analog"]}

<div class="ym-container">{boris_flow}</div>

{sections["vnedrenie"]}

{sections["sravnenie"]}

<div class="ym-container">{boris_compare}</div>

<div class="ym-container">{cta_mid}</div>

{sections["stoimost"]}

<div class="ym-container">{boris_roi}</div>

{sections["keisy"]}

{cta_banner}

{sections["faq"]}

{cta_final}

{conclusion}

</main>

<script>
{reveal_js}
</script>

<script type="application/ld+json">
{json_ld}
</script>

<?php
get_footer();
"""

out_path.parent.mkdir(parents=True, exist_ok=True)
out_path.write_text(php, encoding="utf-8")
size = out_path.stat().st_size
mode = "git-safe" if args.for_git else "deploy"
print(f"Wrote {out_path} ({size} bytes, {mode})")
