#!/usr/bin/env python3
"""Assemble Meta Business Agent page (Natasha)."""
from __future__ import annotations

import json
import os
import re
from pathlib import Path

ROOT = Path("/workspace")
SLUG = "meta-business-agent-whatsapp-ai-agent"
PAGE_CLASS = f"{SLUG}-page"
SEO_TITLE = "Meta Business Agent: AI-агент для WhatsApp, Instagram и продаж"
SEO_DESC = (
    "Meta Business Agent вышел глобально: AI отвечает в WhatsApp и Instagram, "
    "продаёт и бронирует встречи. Разбор функций, тарифов и как собрать аналог с CRM в РФ."
)

PRIMARY_URL = os.environ.get("PRIMARY_CTA_URL", "#")
PRIMARY_LABEL = os.environ.get("PRIMARY_CTA_LABEL", "Консультация")
SECONDARY_URL = os.environ.get("SECONDARY_CTA_URL", "#")
SECONDARY_LABEL = os.environ.get("SECONDARY_CTA_LABEL", "Обучение")
SITE_HOST = os.environ.get("PUBLIC_SITE_HOST") or os.environ.get("WP_SITE_URL", "").replace("https://", "").replace("http://", "").rstrip("/")
PAGE_URL = f"https://{SITE_HOST}/{SLUG}/" if SITE_HOST else f"/{SLUG}/"


def extract_html_block(path: Path, marker: str = "```html") -> str:
    text = path.read_text(encoding="utf-8")
    start = text.find(marker)
    if start == -1:
        raise ValueError(f"No {marker} in {path}")
    start = text.index("\n", start) + 1
    end = text.index("```", start)
    return text[start:end].strip()


def adapt_css(css: str) -> str:
    css = css.replace(".metrika-skill-page", f".{PAGE_CLASS}")
    css = css.replace("--ym-primary: #ff0000;", "--ym-primary: #25d366;")
    css = css.replace("rgba(255, 0, 0, 0.4)", "rgba(37, 211, 102, 0.35)")
    css = css.replace("rgba(255, 0, 0, 0.5)", "rgba(37, 211, 102, 0.45)")
    css = css.replace("#e60000", "#1ebe57")
    css = css.replace("rgba(255,0,0,0.2)", "rgba(37,211,102,0.2)")
    css = css.replace("rgba(255, 0, 0, 0.2)", "rgba(37, 211, 102, 0.2)")
    css = css.replace("rgba(255, 0, 0, 0.05)", "rgba(37, 211, 102, 0.08)")
    css = css.replace("rgba(255, 0, 0, 0.1)", "rgba(37, 211, 102, 0.12)")
    return css


EXTRA_CSS = """
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#mba-hero-hub {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.mba-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 900px) {
  .mba-intro-grid { grid-template-columns: 1.15fr 0.85fr; }
}
.mba-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}
.mba-intro-text p { text-align: left !important; }
.mba-intro-lead {
  font-size: 18px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.mba-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}
.mba-intro-chip {
  padding: 8px 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.mba-prose { max-width: 900px; margin: 0 auto; }
.mba-prose h2 { font-size: clamp(28px, 3vw, 36px); font-weight: 800; margin: 0 0 24px; letter-spacing: -0.5px; }
.mba-prose h3 { font-size: 22px; font-weight: 700; margin: 36px 0 16px; }
.mba-prose p, .mba-prose li { line-height: 1.7; margin-bottom: 16px; }
.mba-prose ul, .mba-prose ol { margin: 0 0 20px 20px; }
.mba-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0 32px;
  font-size: 14px;
}
.mba-prose th, .mba-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
  vertical-align: top;
}
.mba-prose th { background: #f1f5f9; font-weight: 700; }
.mba-prose hr { border: none; border-top: 1px solid var(--ym-border); margin: 48px 0; }
.mba-footnote { font-size: 13px; color: #64748b !important; font-style: italic; }
.ym-cta-panel {
  margin: 48px 0;
  padding: 32px 36px;
  background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
  border: 1px solid var(--ym-border);
  border-left: 4px solid var(--ym-primary);
  border-radius: 20px;
  box-shadow: var(--ym-shadow-sm);
}
.ym-cta-panel--final { border-left-color: var(--ym-accent); }
.ym-cta-eyebrow {
  margin: 0 0 8px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--ym-accent);
}
.ym-cta-title {
  margin: 0 0 12px;
  font-size: clamp(20px, 2.5vw, 26px);
  font-weight: 800;
  color: var(--ym-heading);
  line-height: 1.25;
}
.ym-cta-text {
  margin: 0 0 24px;
  color: #64748b;
  line-height: 1.65;
  font-size: 16px;
}
"""


def cta_primary(*, php: bool = False) -> str:
    if php:
        return '''<aside id="ym-cta-primary" class="ym-cta-panel reveal" aria-label="Предложение: AI-канал в мессенджерах">
  <div class="ym-cta-panel-inner">
    <p class="ym-cta-eyebrow">Практика для РФ</p>
    <h3 class="ym-cta-title">Соберите AI-канал как у Meta — в Telegram, MAX и CRM</h3>
    <p class="ym-cta-text">Meta показала эталон функций; для российского бизнеса важнее устойчивые каналы. Разберём ваши мессенджеры, базу знаний, правила эскалации и интеграции с AmoCRM или Bitrix24 — что автоматизировать в первую очередь и какой бюджет заложить.</p>
    <div class="ym-btn-group" style="justify-content:flex-start;">
      <a href="<?php echo esc_url($mba_primary_cta_url); ?>" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_primary_cta_label); ?></span></a>
    </div>
  </div>
</aside>'''
    return f'''<aside id="ym-cta-primary" class="ym-cta-panel reveal" aria-label="Предложение: AI-канал в мессенджерах">
  <div class="ym-cta-panel-inner">
    <p class="ym-cta-eyebrow">Практика для РФ</p>
    <h3 class="ym-cta-title">Соберите AI-канал как у Meta — в Telegram, MAX и CRM</h3>
    <p class="ym-cta-text">Meta показала эталон функций; для российского бизнеса важнее устойчивые каналы. Разберём ваши мессенджеры, базу знаний, правила эскалации и интеграции с AmoCRM или Bitrix24 — что автоматизировать в первую очередь и какой бюджет заложить.</p>
    <div class="ym-btn-group" style="justify-content:flex-start;">
      <a href="{PRIMARY_URL}" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
    </div>
  </div>
</aside>'''


def cta_secondary(*, php: bool = False) -> str:
    if php:
        return '''<aside class="ym-related-block reveal" aria-label="Обучение внедрению AI-агентов">
  <p class="ym-related-title" style="text-align:left;font-size:20px;margin-bottom:12px;">С чего начать внедрение</p>
  <p style="margin:0 0 20px;color:#64748b;line-height:1.6;">База знаний, промпт, KPI и тест на 50–100 диалогов — это не «магия платформы», а последовательность шагов. Посмотрите, какие процессы в вашем бизнесе можно автоматизировать до выбора BotHelp, n8n или собственного стека.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;">
    <a href="<?php echo esc_url($mba_secondary_cta_url); ?>" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_secondary_cta_label); ?></span></a>
  </div>
</aside>'''
    return f'''<aside class="ym-related-block reveal" aria-label="Обучение внедрению AI-агентов">
  <p class="ym-related-title" style="text-align:left;font-size:20px;margin-bottom:12px;">С чего начать внедрение</p>
  <p style="margin:0 0 20px;color:#64748b;line-height:1.6;">База знаний, промпт, KPI и тест на 50–100 диалогов — это не «магия платформы», а последовательность шагов. Посмотрите, какие процессы в вашем бизнесе можно автоматизировать до выбора BotHelp, n8n или собственного стека.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;">
    <a href="{SECONDARY_URL}" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span>{SECONDARY_LABEL}</span></a>
  </div>
</aside>'''


def cta_final(*, php: bool = False) -> str:
    if php:
        return '''<aside class="ym-cta-panel ym-cta-panel--final reveal" aria-label="Следующий шаг по AI-агентам">
  <div class="ym-cta-panel-inner" style="text-align:center;">
    <p class="ym-cta-eyebrow">Итог по Meta Business Agent</p>
    <h3 class="ym-cta-title">Внедрите AI-канал продаж и поддержки под ваши правила</h3>
    <p class="ym-cta-text">Эталон Meta — в Telegram, MAX и CRM с контролем данных и предсказуемым бюджетом. Начните с аудита каналов или посмотрите, что автоматизировать в ваших процессах.</p>
    <div class="ym-btn-group">
      <a href="<?php echo esc_url($mba_primary_cta_url); ?>" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_primary_cta_label); ?></span></a>
      <a href="<?php echo esc_url($mba_secondary_cta_url); ?>" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_secondary_cta_label); ?></span></a>
    </div>
  </div>
</aside>'''
    return f'''<aside class="ym-cta-panel ym-cta-panel--final reveal" aria-label="Следующий шаг по AI-агентам">
  <div class="ym-cta-panel-inner" style="text-align:center;">
    <p class="ym-cta-eyebrow">Итог по Meta Business Agent</p>
    <h3 class="ym-cta-title">Внедрите AI-канал продаж и поддержки под ваши правила</h3>
    <p class="ym-cta-text">Эталон Meta — в Telegram, MAX и CRM с контролем данных и предсказуемым бюджетом. Начните с аудита каналов или посмотрите, что автоматизировать в ваших процессах.</p>
    <div class="ym-btn-group">
      <a href="{PRIMARY_URL}" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span>{PRIMARY_LABEL}</span></a>
      <a href="{SECONDARY_URL}" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span>{SECONDARY_LABEL}</span></a>
    </div>
  </div>
</aside>'''


def intro_section() -> str:
    return '''<section class="ym-section" id="intro" aria-label="Введение">
  <div class="ym-container">
    <div class="mba-intro-grid reveal">
      <div class="mba-intro-text">
        <p class="mba-intro-lead"><strong>Коротко:</strong> 3 июня 2026 Meta вывела Meta Business Agent на весь мир — AI, который отвечает клиентам в WhatsApp, Instagram Direct и Messenger, продаёт из каталога, бронирует встречи и передаёт сложные диалоги человеку.</p>
        <p>Для российского бизнеса это не инструкция «подключите Meta», а чеклист требований к собственному AI-каналу в Telegram, MAX и CRM.</p>
        <div class="mba-intro-chips" role="list" aria-label="Ключевые метрики">
          <span class="mba-intro-chip" role="listitem">1M+ бизнесов</span>
          <span class="mba-intro-chip" role="listitem">1B+ диалогов/день</span>
          <span class="mba-intro-chip" role="listitem">Ответ &lt; 30 сек</span>
          <span class="mba-intro-chip" role="listitem">Free start</span>
        </div>
      </div>
      <div class="ym-mac-window reveal-right delay-200">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">agent-pipeline.sh</span>
        </div>
        <div class="ym-mac-body">
          <span class="ym-command">$</span> connect --channels wa,ig,msg,tg<br>
          <span class="ym-comment"># RAG + каталог + CRM</span><br>
          <span class="ym-command">$</span> qualify-lead --budget --timeline<br>
          <span class="ym-command">$</span> escalate --if confidence&lt;0.7<br>
          <span class="ym-comment"># KPI: TTR, NPS, cost/dialog</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      <a href="#chto-takoe">Что такое агент</a>
      <a href="#kak-rabotaet">Как работает</a>
      <a href="#kak-nastroit">Настройка</a>
      <a href="#sravnenie">Сравнение</a>
      <a href="#keisy">Кейсы</a>
      <a href="#vnedrenie">Внедрение</a>
      <a href="#riski">Риски</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</section>'''


# Content blocks - condensed HTML from Zhenya longread
CONTENT_S1 = '''<section class="ym-section ym-section-alt" id="chto-takoe">
  <div class="ym-container mba-prose reveal">
    <h2>Что такое Meta Business Agent и чем он не обычный чат-бот</h2>
    <p><strong>Определение:</strong> Meta Business Agent — AI-агент для бизнеса, встроенный в мессенджеры Meta (WhatsApp, Instagram DMs, Messenger). Он не ограничивается сценарными кнопками: понимает контекст диалога, рекомендует товары, квалифицирует лиды, бронирует встречи и эскалирует сложные кейсы на живого сотрудника.</p>
    <p>Обычный чат-бот для бизнеса работает по заранее заданным веткам: «нажмите 1 — заказ, 2 — поддержка». Rule-based боты вроде ManyChat добавляют AI как дополнение (отдельный тариф), но ядро остаётся сценарным. Meta Business Agent и современные AI-агенты (в том числе российские решения BotHelp, riabot, Botseller) опираются на conversational AI: RAG по базе знаний, автономные действия и интеграции с CRM.</p>
    <p>По данным Albato и Habr, отличие агента от чат-бота в 2026 году — в способности <strong>действовать</strong>, а не только отвечать: записать в календарь, создать лид в CRM, передать диалог менеджеру по правилам.</p>
    <h3>Глобальный запуск 3 июня 2026 — что объявила Meta</h3>
    <p><strong>3 июня 2026</strong> на конференции <strong>Conversations 2026 в Лондоне</strong> Meta представила Meta Business Agent — глобальный релиз AI-агента для WhatsApp, Instagram Direct и Messenger. Анонс опубликован на Meta Newsroom, Meta for Business и WhatsApp for Business (<a href="https://about.fb.com/news/2026/06/meta-business-agent/" target="_blank" rel="noopener noreferrer">источник</a>).</p>
    <p>Ранее продукт тестировался почти <strong>два года</strong> под названием <strong>Business AI</strong> с <strong>октября 2024</strong> в пилотных странах — <strong>Индия, Мексика, Бразилия</strong> (<a href="https://techcrunch.com/2026/06/03/metas-ai-agent-for-whatsapp-business-is-now-available-globally/" target="_blank" rel="noopener noreferrer">TechCrunch</a>, <a href="https://www.neowin.net/news/meta-rolls-out-meta-business-agent-globally-on-whatsapp-instagram-and-messenger/" target="_blank" rel="noopener noreferrer">Neowin</a>).</p>
    <div class="ym-bento-grid reveal-scale">
      <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">1M+</div><div class="ym-stat-label">бизнесов на агенте</div></div>
      <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">1B+</div><div class="ym-stat-label">диалогов в день</div></div>
      <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">3,5 млрд</div><div class="ym-stat-label">пользователей Meta-приложений</div></div>
      <div class="ym-bento-card ym-bento-wide"><div class="ym-stat-label">Настройка за минуты или enterprise-масштаб «10X / 100X» обработки обращений</div></div>
    </div>
    <h3>Ответы клиентам, каталог, запись и квалификация лидов</h3>
    <p><strong>Доступно при глобальном запуске (GA):</strong> ответы на вопросы, рекомендации из каталога, бронирование встреч, квалификация лидов, закрытие продаж, локальные языки в тоне бренда, расширение на Instagram.</p>
    <p><strong>В тесте / waitlist:</strong> утренний briefing по ночным чатам, roadmap market research, календарь, competitive intelligence.</p>
    <h3>Эскалация на оператора и контроль сложных кейсов</h3>
    <p>Одна из ключевых функций GA — <strong>эскалация на живого сотрудника по правилам владельца бизнеса</strong>. Агент берёт рутину (FAQ, каталог, первичная квалификация), а спорные, юридически значимые или эмоционально сложные диалоги передаёт менеджеру.</p>
  </div>
</section>'''

CONTENT_S2_START = '''<section class="ym-section" id="kak-rabotaet">
  <div class="ym-container mba-prose reveal">
    <h2>Как AI-агент работает в WhatsApp, Instagram и Messenger</h2>
    <h3>WhatsApp Business: автоответы, продажи и поддержка 24/7</h3>
    <p>WhatsApp — основной канал Meta Business Agent. Глобальный запуск превращает WhatsApp в рабочий инструмент SMB: клиент пишет → AI отвечает → рекомендует из каталога → бронирует встречу или оформляет лид → при необходимости передаёт диалог человеку.</p>
    <p>На enterprise-уровне Meta Business Agent Platform интегрируется с Shopify, Zendesk, Shopee и «сотнями» систем (<a href="https://www.cio.com/article/4181469/meta-wants-to-turn-a-billion-customer-chats-into-enterprise-ai-agents.html" target="_blank" rel="noopener noreferrer">CIO</a>).</p>
    <h3>Instagram Direct и Messenger — единый канал для SMB</h3>
    <p>Глобальный релиз впервые расширяет агента на <strong>Instagram Direct</strong>. Для международного SMB это омниканальность «из коробки»: один агент — три точки входа.</p>
    <h3>Ограничения для бизнеса в РФ и зачем смотреть на Telegram</h3>
    <p><strong>Meta Business Agent официально не анонсирован для РФ</strong> как отдельный рынок. WhatsApp в России нестабилен: ограничения РКН, удаление доменов из НСДИ. <strong>Январь 2026:</strong> Telegram впервые обогнал WhatsApp в РФ — <strong>95,98 млн</strong> vs <strong>89,42 млн</strong> пользователей (Mediascope, по <a href="https://vc.ru/services/2860819-chem-zamenit-whatsapp-dlya-obshcheniya-s-klientami" target="_blank" rel="noopener noreferrer">vc.ru</a>).</p>
    <p><strong>Instagram*</strong> и <strong>Facebook*</strong> — экстремистские организации в РФ. <strong>Практический вывод:</strong> ставка только на Meta Business Agent / WhatsApp — <strong>высокий операционный риск</strong> для российского SMB. Meta показала эталон функций — соберите такой же AI-канал в Telegram и MAX с привязкой к AmoCRM, Bitrix24 или Kommo.</p>
  </div>
</section>'''

CONTENT_S3 = '''<section class="ym-section ym-section-alt" id="kak-nastroit">
  <div class="ym-container mba-prose reveal">
    <h2>Как настроить AI-агента для мессенджеров у себя</h2>
    <div class="ym-grid-2 reveal">
      <div class="ym-card">
        <div class="ym-card-icon">🌐</div>
        <h3>Путь Meta (вне РФ)</h3>
        <ol>
          <li>Подключить WhatsApp Business / Instagram Pro / Messenger</li>
          <li>Активировать Meta Business Agent (бесплатный старт)</li>
          <li>Настроить тон, каталог, правила эскалации</li>
          <li>Enterprise — Platform с Shopify, Zendesk, Shopee</li>
        </ol>
      </div>
      <div class="ym-card">
        <div class="ym-card-icon">🇷🇺</div>
        <h3>Путь «свой агент» (РФ)</h3>
        <ol>
          <li>Каналы: Telegram, MAX, VK, сайт-виджет</li>
          <li>Платформа: BotHelp, riabot, Botseller, BotBeri или n8n + LLM</li>
          <li>База знаний → промпт → квалификация → CRM</li>
          <li>Тест 50–100 диалогов перед запуском</li>
        </ol>
      </div>
    </div>
    <h3>Telegram-бот для продаж и поддержки — пошаговая логика</h3>
    <div class="ym-timeline">
      <div class="ym-step"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>База знаний</h3><p>FAQ, прайс, условия доставки, скрипты продаж.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>Платформа</h3><p>BotHelp, riabot, Botseller, BotBeri — Telegram + MAX + CRM.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>Квалификация</h3><p>Бюджет, срок, город, тип запроса.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">4</div><div class="ym-step-content"><h3>CRM и календарь</h3><p>Запись на встречи, передача в AmoCRM / Bitrix24.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">5</div><div class="ym-step-content"><h3>Эскалация</h3><p>Жалобы, возвраты, нестандартные запросы → менеджер.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">6</div><div class="ym-step-content"><h3>Briefing</h3><p>DIY-аналог waitlist-функции Meta через webhook + Telegram.</p></div></div>
    </div>
    <h3>Подключение CRM, каталога и календаря бронирования</h3>
    <p>Meta Business Agent Platform интегрируется с <strong>Shopify, Zendesk, Shopee</strong>. Для российского стека: <strong>AmoCRM, Bitrix24, Kommo</strong> через BotHelp, Botseller, Viora, n8n; каталог — Sheets, 1С, CMS; календарь — Calendly-аналоги или модули CRM.</p>
  </div>
</section>'''

CONTENT_S4 = '''<section class="ym-section" id="sravnenie">
  <div class="ym-container mba-prose reveal">
    <h2>Meta Business Agent vs собственный AI-агент, ManyChat и Make/n8n</h2>
    <h3>Тарифы Meta, token-billing и Meta One subscription</h3>
    <p><strong>Старт Meta Business Agent — бесплатный</strong>; в ближайшие месяцы — платные подписки. Enterprise: token-based billing отдельно от стоимости сообщений. Meta One: Essential <strong>$14.99/мес</strong>, Advanced <strong>$49.99/мес</strong>. Публичного прайс-листа Business Agent на 5 июня 2026 нет.</p>
    <h3>ManyChat, BotHelp и GPT-агенты на Make/n8n</h3>
    <table>
      <thead><tr><th>Критерий</th><th>Meta Business Agent</th><th>ManyChat</th><th>BotHelp / RU AI</th><th>n8n + LLM</th></tr></thead>
      <tbody>
        <tr><td>Тип</td><td>Conversational AI в Meta</td><td>Rule-based + AI ~$29/мес</td><td>RAG + действия</td><td>Self-hosted</td></tr>
        <tr><td>Каналы</td><td>WA, IG, Messenger</td><td>IG, Messenger, WA</td><td>Telegram, VK, MAX</td><td>Любые API</td></tr>
        <tr><td>CRM</td><td>Shopify, Zendesk, Shopee</td><td>Ограниченные</td><td>AmoCRM, Bitrix24</td><td>Webhook</td></tr>
        <tr><td>Цена</td><td>Free → subscription + tokens</td><td>Подписка + AI</td><td>от 2 990 ₽/мес</td><td>Open-source + API</td></tr>
        <tr><td>РФ-риски</td><td>Высокие</td><td>Средние</td><td>Низкие для TG/MAX</td><td>Зависит от хостинга</td></tr>
      </tbody>
    </table>
    <h3>Когда выгоднее свой агент + CRM вместо платформы Meta</h3>
    <p><strong>Свой агент выгоднее, если:</strong> аудитория в Telegram/MAX, нужны расходы в рублях, ФЗ-152, интеграции WB/Ozon, WhatsApp нестабилен.</p>
    <p><strong>Meta Business Agent выгоднее, если:</strong> аудитория за пределами РФ в WA/IG, нужен быстрый старт, стек на Shopify/Zendesk.</p>
  </div>
</section>'''

CONTENT_S5 = '''<section class="ym-section ym-section-alt" id="keisy">
  <div class="ym-container mba-prose reveal">
    <h2>Кейсы: лиды, продажи, каталог и эскалация</h2>
    <div class="ym-grid-3">
      <div class="ym-card"><div class="ym-card-icon">🎯</div><h3>Лиды без расширения штата</h3><p>AI уточняет потребность, бюджет, срок; лид попадает в CRM с тегами. Менеджер подключается к «тёплым» обращениям.</p></div>
      <div class="ym-card"><div class="ym-card-icon">🛒</div><h3>Каталог и запись</h3><p>Агент предлагает 2–3 позиции, уточняет доставку, оформляет заказ или запись. Снижает no-show напоминаниями.</p></div>
      <div class="ym-card"><div class="ym-card-icon">👤</div><h3>Эскалация</h3><p>Жалобы, VIP, нестандартные скидки — правила передачи человеку задаёт владелец бизнеса.</p></div>
    </div>
  </div>
</section>'''

CONTENT_S6_START = '''<section class="ym-section" id="vnedrenie">
  <div class="ym-container mba-prose reveal">
    <h2>Внедрение AI-агентов в бизнес-процессы</h2>
    <h3>Интеграции Shopify, Zendesk, Shopee — что доступно на старте</h3>
    <p>Meta Business Agent Platform — agentic-платформа для кастомизации и деплоя агентов; по данным Meta, <strong>платформа уже live</strong>. Для РФ-аналога: CRM, каталог, календарь, аналитика (Яндекс.Метрика, цели в CRM).</p>
    <h3>Обучение агента на базе знаний компании</h3>
    <p>Внедрение начинается с <strong>базы знаний</strong>: FAQ, описания товаров, политика возвратов, запрещённые темы, тон бренда. Агент ≠ чат-бот: RAG + действия.</p>'''

CONTENT_S6_END = '''<h3>KPI: время ответа, конверсия, NPS поддержки</h3>
    <ul>
      <li><strong>Время первого ответа</strong> — цель &lt; 30 секунд</li>
      <li><strong>Доля автоматически закрытых диалогов</strong></li>
      <li><strong>Конверсия лид → сделка</strong></li>
      <li><strong>NPS поддержки</strong></li>
      <li><strong>Стоимость диалога</strong> — особенно при token billing Meta</li>
    </ul>
  </div>
</section>'''

CONTENT_S7 = '''<section class="ym-section ym-section-alt" id="riski">
  <div class="ym-container mba-prose reveal">
    <h2>Риски: качество ответов, персональные данные и бренд</h2>
    <h3>Галлюцинации и контроль тона бренда</h3>
    <p>Guardrails: отвечать только из базы знаний, запрет на скидки без подтверждения, тест 50–100 диалогов перед запуском.</p>
    <h3>ПДн клиентов в мессенджерах и хранение диалогов</h3>
    <p>Персональные данные подпадают под ФЗ-152. Meta хранит данные в своём облаке — для РФ с локализацией аргумент в пользу self-hosted n8n или российских платформ.</p>
    <h3>Когда AI не должен отвечать без человека</h3>
    <ul>
      <li>Жалобы и претензии, возвраты и компенсации</li>
      <li>Юридические и медицинские вопросы</li>
      <li>Индивидуальные скидки, эмоционально заряженные диалоги</li>
      <li>Низкая уверенность агента (confidence below threshold)</li>
    </ul>
  </div>
</section>'''

FAQ_ITEMS = [
    ("faq-free", "Бесплатный ли старт Meta Business Agent?", "<p><strong>Да.</strong> Meta объявила <strong>бесплатный старт</strong> при глобальном запуске 3 июня 2026. Платные подписки появятся «в ближайшие месяцы»; для крупных клиентов — <strong>token-based billing</strong> отдельно от стоимости сообщений.</p>"),
    ("faq-rf", "Можно ли российскому бизнесу использовать Meta Business Agent сейчас?", "<p>Официального анонса для РФ нет. WhatsApp нестабилен, Instagram* и Facebook* — экстремистские организации в РФ. Практичная стратегия: внедрить аналог в <strong>Telegram + MAX + CRM</strong>.</p>"),
    ("faq-tg", "Можно ли заменить WhatsApp на Telegram в России?", "<p><strong>Да.</strong> Январь 2026: Telegram <strong>95,98 млн</strong> vs WhatsApp <strong>89,42 млн</strong> в РФ. Telegram + MAX устойчивее для AI-агента продаж и поддержки.</p>"),
    ("faq-diff", "Чем AI-агент отличается от обычного чат-бота?", "<p>Чат-бот следует сценарию. AI-агент понимает свободный текст, рекомендует товары, квалифицирует лиды, бронирует встречи, эскалирует на человека и интегрируется с CRM.</p>"),
    ("faq-cost", "Сколько стоит свой AI-агент с CRM?", "<p>BotBeri — от <strong>2 990 ₽/мес</strong>; Botseller — от <strong>500 ₽</strong> на баланс; n8n + LLM — open-source + API моделей. Meta: бесплатный старт, далее подписка + token billing.</p>"),
    ("faq-dev", "Нужен ли программист для внедрения?", "<p>Для no-code (BotHelp, BotBeri, Botseller) — достаточно маркетолога с базой знаний. Для n8n + LLM — нужен разработчик или подрядчик.</p>"),
    ("faq-tg-biz", "Telegram Business vs обычный бот vs AI-агент", "<p><strong>Telegram Business</strong> — профиль без AI. <strong>Обычный бот</strong> — сценарии. <strong>AI-агент</strong> — свободный диалог, каталог, лиды, CRM, эскалация 24/7.</p>"),
]


def faq_section() -> str:
    sidebar = "\n".join(f'<li><a href="#{fid}">{q}</a></li>' for fid, q, _ in FAQ_ITEMS)
    items = "\n".join(
        f'<article class="ym-faq-item reveal" id="{fid}"><h3>{q}</h3>{body}</article>'
        for fid, q, body in FAQ_ITEMS
    )
    return f'''<section class="ym-section" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по Meta Business Agent и AI в мессенджерах</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <ul class="ym-faq-list">{sidebar}</ul>
      </aside>
      <div>{items}</div>
    </div>
  </div>
</section>'''


def conclusion_block() -> str:
    return '''<section class="ym-section ym-section-alt" id="conclusion">
  <div class="ym-container mba-prose reveal">
    <p><strong>Итог:</strong> Meta Business Agent — эталон AI-канала продаж и поддержки в мессенджерах: 1M+ бизнесов, 1B+ диалогов в день, бесплатный старт и roadmap до «полного управления daily operations». Для российского бизнеса разумная стратегия — <strong>внедрение как у Meta, но под ваши каналы и законы РФ</strong>: Telegram, MAX, CRM, контроль данных и предсказуемый бюджет.</p>
  </div>
</section>'''


def json_ld_graph() -> list:
    faq_entities = [
        {"@type": "Question", "name": q, "acceptedAnswer": {"@type": "Answer", "text": re.sub(r"<[^>]+>", "", body)}}
        for _, q, body in FAQ_ITEMS
    ]
    return [
        {
            "@type": "Article",
            "headline": SEO_TITLE,
            "description": SEO_DESC,
            "datePublished": "2026-06-05",
            "author": {"@type": "Organization", "name": "Nero Network"},
        },
        {
            "@type": "SoftwareApplication",
            "name": "Meta Business Agent",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "WhatsApp, Instagram, Messenger",
            "description": "AI-агент Meta для ответов клиентам, продаж и поддержки в мессенджерах",
        },
        {"@type": "FAQPage", "mainEntity": faq_entities},
    ]


def json_ld(*, php: bool = False) -> str:
    data = {"@context": "https://schema.org", "@graph": json_ld_graph()}
    if php:
        payload = json.dumps(data, ensure_ascii=False, indent=2)
        return f'''<script type="application/ld+json">
<?php
$mba_json_ld = json_decode(<<<'MBA_JSON_LD'
{payload}
MBA_JSON_LD, true);
$mba_json_ld['@graph'][0]['url'] = get_permalink();
echo wp_json_encode($mba_json_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>'''
    data["@graph"][0]["url"] = PAGE_URL
    return f'<script type="application/ld+json">\n{json.dumps(data, ensure_ascii=False, indent=2)}\n</script>'


def reveal_script() -> str:
    return Path("/workspace/shared/longread-page-reveal.js").read_text(encoding="utf-8")


def build_body_html(*, php: bool = False) -> str:
    hero = extract_html_block(ROOT / ".cursor/nero-network-fragments/alina.md")
    boris = extract_html_block(ROOT / ".cursor/nero-network-fragments/boris.md")
    ref_css = adapt_css((ROOT / "shared/longread-page-design-reference.css").read_text(encoding="utf-8"))

    parts = [
        f"<style>\n{ref_css}\n{EXTRA_CSS}\n</style>",
        f'<main id="primary" class="site-main {PAGE_CLASS}" role="main" tabindex="-1">',
        hero,
        intro_section(),
        CONTENT_S1,
        CONTENT_S2_START,
        f'<div class="ym-container">{boris}</div>',
        cta_primary(php=php),
        CONTENT_S3,
        CONTENT_S4,
        CONTENT_S5,
        CONTENT_S6_START,
        cta_secondary(php=php),
        CONTENT_S6_END,
        CONTENT_S7,
        faq_section(),
        conclusion_block(),
        cta_final(php=php),
        '<p class="ym-container mba-footnote reveal">*Instagram и Facebook — продукты Meta, признанные экстремистскими организациями на территории РФ.</p>',
        "</main>",
        f"<script>\n{reveal_script()}\n</script>",
        json_ld(php=php),
    ]
    return "\n\n".join(parts)


def build_php(body: str) -> str:
    esc_title = SEO_TITLE.replace("'", "\\'")
    esc_desc = SEO_DESC.replace("'", "\\'")
    return f'''<?php
/**
 * Template Name: Meta Business Agent WhatsApp AI Agent
 * Description: Meta Business Agent — AI-агент для WhatsApp, Instagram и продаж бизнеса
 */
$page_seo_title = '{esc_title}';
$page_seo_description = '{esc_desc}';

$mba_primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '#';
$mba_primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Консультация';
$mba_secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: '#';
$mba_secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Обучение';

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
'''


def main() -> None:
    body_handoff = build_body_html(php=False)
    body_php = build_body_html(php=True)
    php = build_php(body_php)

    php_path = ROOT / "wordpress-theme" / f"page-{SLUG}.php"
    php_path.write_text(php, encoding="utf-8")

    handoff_path = ROOT / ".cursor/nero-network-handoff.md"
    handoff = handoff_path.read_text(encoding="utf-8")
    marker = "=== НАТАША (HTML СТРАНИЦЫ) ==="
    if marker in handoff:
        handoff = handoff[: handoff.index(marker)]

    natasha_block = f"""
{marker}
Статус: ✅ ГОТОВО
SLUG: {SLUG}
ВНИМАНИЕ: контент содержит <script> и <canvas> — при публикации обернуть в <!-- wp:html -->

## Структура страницы
- Hero Алины (`#mba-hero-hub`, canvas `mba-omni-hub-canvas`)
- Введение + TOC (`#intro`)
- H2 секции: `#chto-takoe`, `#kak-rabotaet`, блок Бориса, `#ym-cta-primary`, `#kak-nastroit`, `#sravnenie`, `#keisy`, `#vnedrenie`, вторичный CTA, `#riski`, `#faq`, финальный dual-CTA
- Canvas Бориса: `meta-business-agent-boris-canvas`
- JSON-LD: Article + SoftwareApplication + FAQPage

{body_handoff}

## Передача Юре
SLUG: {SLUG}
Шаблон: `/workspace/wordpress-theme/page-{SLUG}.php`
ВНИМАНИЕ: контент содержит <script> (hero engine + boris engine + reveal) и <canvas>. Обязательно обернуть в <!-- wp:html --> при публикации через контент; при деплое PHP-шаблона — как есть.
"""
    handoff_path.write_text(handoff.rstrip() + "\n" + natasha_block, encoding="utf-8")

    print(f"HTML size: {len(body_handoff)} chars")
    print(f"PHP path: {php_path}")
    print(f"canvas hero: {'mba-omni-hub-canvas' in body_handoff}")
    print(f"canvas boris: {'meta-business-agent-boris-canvas' in body_handoff}")
    print(f"script count: {body_handoff.count('<script')}")


if __name__ == "__main__":
    main()
