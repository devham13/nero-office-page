<?php
/**
 * Template Name: Meta Business Agent WhatsApp AI Agent
 * Description: Meta Business Agent — AI-агент для WhatsApp, Instagram и продаж бизнеса
 */
$page_seo_title = 'Meta Business Agent: AI-агент для WhatsApp, Instagram и продаж';
$page_seo_description = 'Meta Business Agent вышел глобально: AI отвечает в WhatsApp и Instagram, продаёт и бронирует встречи. Разбор функций, тарифов и как собрать аналог с CRM в РФ.';

$mba_primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '#';
$mba_primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Консультация';
$mba_secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: '#';
$mba_secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Обучение';

add_filter('document_title_parts', static function (array $parts) use ($page_seo_title): array {
    $parts['title'] = $page_seo_title;
    return $parts;
}, 20);

add_action('wp_head', static function () use ($page_seo_title, $page_seo_description): void {
    echo '<meta name="description" content="' . esc_attr($page_seo_description) . '" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($page_seo_title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($page_seo_description) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\n";
    echo '<meta property="og:type" content="article" />' . "\n";
}, 1);

get_header();
?>

<style>
/**
 * ЭТАЛОННЫЕ СТИЛИ ЛОНГРИДА (страница «Яндекс Метрика Skill» из эталонной темы владельца).
 *
 * Исходник темы: page-yandex-metrika-skill.php (inline <style>).
 * Для дизайнера Наташи: открывай этот файл «как есть» — не ходи на сайт за CSS.
 *
 * Как использовать на новой странице:
 * - Скопируй в тему или в блок <style>; в селекторах замени класс обёртки
 *   `.meta-business-agent-whatsapp-ai-agent-page` на свой, например `.my-slug-page` (везде, где он есть).
 * - В :root подставь --ym-primary / --ym-accent под тему (остальное можно оставить).
 * - Блоки `.ym-hero` … — из эталона Метрики; если первым идёт hero от Алины (Canvas),
 *   не дублируй второй hero — эти классы пригодятся для других страниц или опциональных секций.
 *
 * В :root добавлена переменная --ym-success (в исходном PHP использовалась в CSS, но не была объявлена).
 */

/* CRITICAL FIX FOR STICKY SIDEBAR & OVERFLOW */
body, html {
    /* max-width: 100vw; removed to fix mobile menu */
}
.site-main {
    display: block !important;
}
.meta-business-agent-whatsapp-ai-agent-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #25d366;
    --ym-accent: #3b82f6;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(255, 0, 0, 0.15);
}

.meta-business-agent-whatsapp-ai-agent-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.meta-business-agent-whatsapp-ai-agent-page h1,
.meta-business-agent-whatsapp-ai-agent-page h2,
.meta-business-agent-whatsapp-ai-agent-page h3,
.meta-business-agent-whatsapp-ai-agent-page h4,
.meta-business-agent-whatsapp-ai-agent-page h5,
.meta-business-agent-whatsapp-ai-agent-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-whatsapp-ai-agent-page p,
.meta-business-agent-whatsapp-ai-agent-page li,
.meta-business-agent-whatsapp-ai-agent-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.meta-business-agent-whatsapp-ai-agent-page strong,
.meta-business-agent-whatsapp-ai-agent-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-whatsapp-ai-agent-page pre, .meta-business-agent-whatsapp-ai-agent-page code {
    white-space: pre-wrap !important;
    word-break: break-all !important;
    overflow-x: hidden !important;
}

/* ANIMATIONS (SCROLL REVEAL) */
.reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
.reveal.active { opacity: 1; transform: translateY(0); }
.reveal-left { opacity: 0; transform: translateX(-40px); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
.reveal-left.active { opacity: 1; transform: translateX(0); }
.reveal-right { opacity: 0; transform: translateX(40px); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
.reveal-right.active { opacity: 1; transform: translateX(0); }
.reveal-scale { opacity: 0; transform: scale(0.9); transition: all 0.8s cubic-bezier(0.5, 0, 0, 1); }
.reveal-scale.active { opacity: 1; transform: scale(1); }

.delay-100 { transition-delay: 100ms; }
.delay-200 { transition-delay: 200ms; }
.delay-300 { transition-delay: 300ms; }
.delay-400 { transition-delay: 400ms; }
.delay-500 { transition-delay: 500ms; }

/* Hero Section (эталон Метрики; при странице с hero Алины — не дублировать) */
.ym-hero {
    position: relative;
    padding: 160px 20px 120px;
    text-align: center;
    background: linear-gradient(135deg, rgba(248, 250, 252, 0.95), rgba(241, 245, 249, 0.95)),
                url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M10 10h80v80h-80z" fill="none" stroke="%23ff0000" stroke-width="0.5" stroke-dasharray="2 4"/></svg>');
    border-bottom: 1px solid var(--ym-border);
    overflow: hidden;
}

.ym-hero-bg-anim {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 800px; height: 800px;
    background: radial-gradient(circle, rgba(255,0,0,0.05) 0%, rgba(248,250,252,0) 70%);
    border-radius: 50%;
    animation: pulseBg 8s infinite alternate;
    z-index: 0;
    pointer-events: none;
}
@keyframes pulseBg {
    0% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
    100% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.8; }
}

.ym-container {
    max-width: 1300px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
    padding: 0 20px;
}

.ym-hero-badge {
    display: inline-block;
    padding: 8px 16px;
    background: rgba(37, 211, 102, 0.12);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(37, 211, 102, 0.2);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.ym-hero h1 {
    font-size: 56px;
    line-height: 1.1;
    font-weight: 800;
    margin-bottom: 24px;
    letter-spacing: -1.5px;
    text-wrap: balance;
}
.ym-hero h1 span {
    background: linear-gradient(90deg, #ff0000, #ff4b4b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    color: transparent !important;
}

.ym-hero-desc {
    font-size: 20px;
    color: var(--ym-text) !important;
    max-width: 800px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

.ym-breadcrumbs {
    margin-bottom: 30px;
    font-size: 14px;
    color: #64748b;
    text-align: left;
}
.ym-breadcrumbs a {
    color: var(--ym-accent);
    text-decoration: none;
    transition: color 0.2s;
}
.ym-breadcrumbs a:hover {
    text-decoration: underline;
}

.ym-toc {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    justify-content: center;
    margin-top: 40px;
}
.ym-toc a {
    padding: 10px 20px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid var(--ym-border);
    border-radius: 30px;
    color: var(--ym-heading);
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
    backdrop-filter: blur(4px);
    box-shadow: var(--ym-shadow-sm);
}
.ym-toc a:hover {
    background: var(--ym-primary);
    color: #ffffff !important;
    border-color: var(--ym-primary);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(37,211,102,0.2);
}

.ym-article-meta {
    background: var(--ym-surface);
    border: 1px solid var(--ym-border);
    border-radius: 20px;
    padding: 30px;
    margin-top: 60px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--ym-shadow-sm);
}
.ym-author-box {
    display: flex;
    align-items: center;
    gap: 16px;
}
.ym-author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    background: #e2e8f0;
}
.ym-author-details h4 {
    margin: 0 0 4px 0;
    font-size: 18px;
    font-weight: 700;
}
.ym-author-details p {
    margin: 0;
    font-size: 14px;
    color: #64748b !important;
}
.ym-date-box {
    text-align: right;
    font-size: 14px;
    color: #64748b;
}

.ym-related-block {
    margin-top: 60px;
    padding: 40px;
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border-radius: 20px;
    border: 1px solid var(--ym-border);
}
.ym-related-title {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 24px;
    text-align: center;
}
.ym-related-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
.ym-related-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 20px;
    background: #fff;
    border: 1px solid var(--ym-border);
    border-radius: 16px;
    text-decoration: none;
    transition: all 0.3s;
}
.ym-related-card:hover {
    border-color: var(--ym-accent);
    transform: translateY(-3px);
    box-shadow: var(--ym-shadow);
}
.ym-related-card-icon {
    width: 48px; height: 48px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-size: 24px;
}
.ym-related-card-text span {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 700;
    color: #64748b;
    margin-bottom: 4px;
}
.ym-related-card-text strong {
    font-size: 16px;
    color: var(--ym-heading);
    line-height: 1.4;
}

.ym-btn-group {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.ym-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 16px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.ym-btn-primary {
    background: var(--ym-primary);
    color: #fff !important;
    box-shadow: 0 10px 20px -5px rgba(37, 211, 102, 0.35);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(37, 211, 102, 0.45);
    background: #1ebe57;
    color: #fff !important;
}
.ym-btn-secondary {
    background: var(--ym-surface);
    color: var(--ym-heading) !important;
    border: 1px solid var(--ym-border);
    box-shadow: var(--ym-shadow-sm);
}
.ym-btn-secondary:hover {
    border-color: #cbd5e1;
    transform: translateY(-3px);
    box-shadow: var(--ym-shadow);
}

.ym-section { padding: 100px 0; }
.ym-section-alt { background: var(--ym-surface); border-top: 1px solid var(--ym-border); border-bottom: 1px solid var(--ym-border); }

.ym-section-title {
    text-align: center;
    font-size: 40px;
    font-weight: 800;
    margin-bottom: 20px;
    letter-spacing: -1px;
}
.ym-section-subtitle {
    text-align: center;
    font-size: 18px;
    color: #64748b !important;
    max-width: 600px;
    margin: 0 auto 60px;
    line-height: 1.6;
}

.ym-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
.ym-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start; }
.ym-grid-2-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }

.ym-card {
    background: var(--ym-surface);
    border-radius: 20px;
    padding: 40px;
    box-shadow: var(--ym-shadow-sm);
    border: 1px solid var(--ym-border);
    transition: all 0.4s ease;
    height: 100%;
}
.ym-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--ym-shadow-lg);
    border-color: rgba(37, 211, 102, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(37, 211, 102, 0.08);
    color: var(--ym-primary) !important;
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 24px;
    transition: all 0.3s ease;
}
.ym-card:hover .ym-card-icon {
    background: var(--ym-primary);
    color: #fff !important;
    transform: scale(1.1) rotate(5deg);
}
.ym-card h3 { font-size: 22px; font-weight: 700; margin-bottom: 16px; }
.ym-card p { color: #64748b !important; line-height: 1.6; font-size: 15px; margin: 0; }

.ym-mac-window {
    background: var(--ym-code-bg);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--ym-shadow-lg);
    font-family: 'Fira Code', 'Courier New', monospace;
    font-size: 14px;
    margin-bottom: 30px;
    border: 1px solid #1e293b;
}
.ym-mac-header {
    background: #1e293b;
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid #334155;
}
.ym-mac-dot { width: 12px; height: 12px; border-radius: 50%; }
.ym-mac-dot.r { background: #ff5f56; }
.ym-mac-dot.y { background: #ffbd2e; }
.ym-mac-dot.g { background: #27c93f; }
.ym-mac-title { color: #94a3b8 !important; font-size: 12px; font-family: 'Inter', sans-serif; margin-left: 10px; font-weight: 500; }
.ym-mac-body { padding: 24px; color: #e2e8f0 !important; overflow-x: auto; line-height: 1.6; }
.ym-command { color: #10b981 !important; }
.ym-comment { color: #64748b !important; font-style: italic; }

.ym-timeline {
    position: relative;
    padding-left: 40px;
}
.ym-timeline::before {
    content: '';
    position: absolute;
    left: 19px; top: 0; bottom: 0;
    width: 2px;
    background: var(--ym-border);
}
.ym-step {
    position: relative;
    margin-bottom: 40px;
}
.ym-step:last-child { margin-bottom: 0; }
.ym-step-num {
    position: absolute;
    left: -40px; top: 0;
    width: 40px; height: 40px;
    background: var(--ym-surface);
    border: 2px solid var(--ym-primary);
    color: var(--ym-primary) !important;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700;
    font-size: 18px;
    z-index: 2;
    box-shadow: 0 0 0 4px var(--ym-bg);
}
.ym-step-content {
    background: var(--ym-surface);
    padding: 30px;
    border-radius: 16px;
    box-shadow: var(--ym-shadow-sm);
    border: 1px solid var(--ym-border);
    margin-left: 20px;
}
.ym-step-content h3 { font-size: 20px; font-weight: 700; margin-bottom: 12px; }

.ym-prompt-card {
    background: var(--ym-bg);
    border: 1px solid var(--ym-border);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
}
.ym-prompt-card::before {
    content: 'Промпт';
    position: absolute;
    top: 0; right: 0;
    background: rgba(59, 130, 246, 0.1);
    color: var(--ym-accent) !important;
    padding: 4px 12px;
    font-size: 12px;
    font-weight: 600;
    border-bottom-left-radius: 12px;
}
.ym-prompt-text {
    font-size: 16px;
    font-style: italic;
    color: #1e293b !important;
    margin-bottom: 16px;
    line-height: 1.5;
}
.ym-prompt-result {
    display: flex; gap: 12px; align-items: center;
    background: var(--ym-surface);
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 14px;
    color: #64748b !important;
    border: 1px solid var(--ym-border);
}
.ym-prompt-result svg { color: var(--ym-success); width: 20px; height: 20px; flex-shrink: 0; }

.ym-faq-layout {
    display: grid;
    grid-template-columns: 350px 1fr;
    gap: 60px;
    align-items: start;
}
.ym-faq-sidebar {
    position: sticky;
    top: 100px;
    background: var(--ym-surface);
    padding: 30px;
    border-radius: 20px;
    box-shadow: var(--ym-shadow);
    border: 1px solid var(--ym-border);
}
.ym-faq-list { list-style: none; padding: 0; margin: 0; }
.ym-faq-list li { margin-bottom: 12px; }
.ym-faq-list a {
    display: block;
    padding: 12px 16px;
    color: #64748b !important;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.2s;
}
.ym-faq-list a:hover { background: #f1f5f9; color: var(--ym-heading) !important; }
.ym-faq-item {
    background: var(--ym-surface);
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 24px;
    box-shadow: var(--ym-shadow-sm);
    border: 1px solid var(--ym-border);
}
.ym-faq-item h3 { font-size: 20px; margin-bottom: 16px; color: var(--ym-heading) !important; font-weight: 700;}
.ym-faq-item p { color: #475569 !important; line-height: 1.6; }

.ym-bento-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: minmax(140px, auto);
    gap: 20px;
    margin-top: 40px;
}
.ym-bento-card {
    background: var(--ym-surface);
    border-radius: 24px;
    padding: 24px;
    border: 1px solid var(--ym-border);
    box-shadow: var(--ym-shadow-sm);
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}
.ym-bento-main {
    grid-column: span 2;
    grid-row: span 2;
    background: linear-gradient(145deg, #ffffff, #f8fafc);
}
.ym-bento-stat {
    grid-column: span 1;
    grid-row: span 1;
}
.ym-bento-wide {
    grid-column: span 2;
    grid-row: span 1;
}
.ym-stat-value {
    font-size: 36px;
    font-weight: 800;
    color: var(--ym-heading) !important;
    margin-bottom: 8px;
    line-height: 1;
}
.ym-stat-label {
    font-size: 14px;
    color: #64748b !important;
    font-weight: 500;
}
.ym-stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 13px;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 20px;
    background: rgba(16, 185, 129, 0.1);
    color: var(--ym-success) !important;
    margin-top: 12px;
    align-self: flex-start;
}

.ym-hero-image-wrap {
    margin-top: 60px;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--ym-shadow-lg);
    position: relative;
    aspect-ratio: 16/9;
}
.ym-hero-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.ym-hero-image-wrap::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, transparent 40%);
    pointer-events: none;
}

@media (max-width: 1024px) {
    .ym-faq-layout { grid-template-columns: 1fr; }
    .ym-faq-sidebar { position: static; margin-bottom: 40px; }
    .ym-bento-grid { grid-template-columns: repeat(2, 1fr); }
    .ym-bento-main { grid-column: span 2; }
}
@media (max-width: 768px) {
    .ym-hero h1 { font-size: 40px; }
    .ym-grid-3, .ym-grid-2, .ym-grid-2-cards, .ym-related-grid { grid-template-columns: 1fr; }
    .ym-section { padding: 60px 0; }
    .ym-bento-grid { grid-template-columns: 1fr; }
    .ym-bento-main, .ym-bento-stat, .ym-bento-wide { grid-column: span 1; }
    .ym-hero-image-wrap { margin-top: 40px; aspect-ratio: 4/3; }
}


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

</style>

<main id="primary" class="site-main meta-business-agent-whatsapp-ai-agent-page" role="main" tabindex="-1">

<section id="mba-hero-hub" class="mba-hero fullscreen-white-office" aria-label="Meta Business Agent — омниканальный AI-агент">
<style>
.mba-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #ffffff 0%, #f0fdf4 38%, #f8fafc 100%);
}
.mba-hero.fullscreen-white-office::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
  z-index: 0;
}
.mba-hero canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.mba-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 3;
}
.mba-hero .giant-seo {
  font-size: clamp(32px, 4.8vw, 68px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
}
.mba-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #25d366, #e1306c, #0084ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.mba-hero .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 620px;
}
.mba-hero-cta {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  z-index: 3;
}
.mba-hero .telegram-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  background: #0f172a;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  transition: transform 0.2s;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
}
.mba-hero .telegram-button:hover { transform: translateY(-2px); }
.mba-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(16px, 3vw, 48px);
  top: clamp(80px, 12vh, 160px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.mba-hero .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  backdrop-filter: blur(6px);
}
.mba-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #25d366, #0084ff);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.mba-hero .vl-ui-pill {
  position: absolute;
  top: clamp(18px, 3vh, 40px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  z-index: 3;
  max-width: 96vw;
}
.mba-hero .vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}
@media (max-width: 768px) {
  .mba-hero .vl-ui-tasks { display: none; }
  .mba-hero-copy { bottom: 16px; }
  .mba-hero-cta { top: auto; bottom: 140px; right: 16px; }
  .mba-hero .vl-ui-pill { top: 12px; }
}
</style>

<canvas id="mba-omni-hub-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill" role="list" aria-label="Метрики Meta Business Agent">
  <span>1M+ бизнесов</span>
  <span>1B+ диалогов/день</span>
  <span>Ответ &lt; 30 сек</span>
  <span>Free start</span>
</div>

<div class="mba-hero-cta">
  <a href="#ym-cta-primary" class="telegram-button">Внедрение в Telegram и CRM</a>
</div>

<nav class="vl-ui-tasks" aria-label="Этапы внедрения AI-агента">
  <div class="vl-ui-task"><span>1</span> Подключение каналов</div>
  <div class="vl-ui-task"><span>2</span> RAG + каталог</div>
  <div class="vl-ui-task"><span>3</span> Квалификация лида</div>
  <div class="vl-ui-task"><span>4</span> CRM / эскалация</div>
  <div class="vl-ui-task"><span>5</span> Briefing 24/7</div>
</nav>

<div class="mba-hero-copy">
  <h1 class="giant-seo">Meta Business Agent: AI-агент для WhatsApp, Instagram и продаж бизнеса</h1>
  <p class="giant-seo-sub">Глобальный запуск Meta — как превратить мессенджеры в канал лидов и поддержки 24/7 и что внедрить у себя</p>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("mba-omni-hub-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    if (!canvas.parentElement) return;
    canvas.width = canvas.parentElement.clientWidth || window.innerWidth;
    canvas.height = canvas.parentElement.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw / 2;
    cy = ch / 2 + 20;
    scale = cw < 768 ? cw / 620 : Math.min(cw / 1100, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    wa: "#25d366",
    igA: "#f58529",
    igB: "#dd2a7b",
    igC: "#8134af",
    msg: "#0084ff",
    hub: "#f8fafc",
    hubAccent: "#6366f1",
    bubbleIn: "#dcfce7",
    bubbleOut: "#dbeafe",
    lead: "#22c55e",
    crm: "#0ea5e9",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff"
  };

  function drawPolyRound(ctx, x, y, w, h, radius, fill, stroke) {
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, radius);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) {
      ctx.lineWidth = 2;
      ctx.strokeStyle = stroke;
      ctx.stroke();
    }
  }

  class ArcMessageFlow {
    constructor() {
      this.arcs = [
        { fromX: -280, fromY: -120, color: C.wa, phase: 0 },
        { fromX: -300, fromY: 40, color: C.msg, phase: 80 },
        { fromX: -260, fromY: 160, color: C.igB, phase: 160 }
      ];
    }
    draw(ctx) {
      const cycle = (frame * 0.06) % 240;
      this.arcs.forEach((arc, idx) => {
        const t = ((cycle + arc.phase) % 240) / 240;
        const midX = -80 + idx * 8;
        const midY = -20 + idx * 30;
        const endX = 40;
        const endY = -30 + idx * 12;
        const px = (1 - t) * (1 - t) * arc.fromX + 2 * (1 - t) * t * midX + t * t * endX;
        const py = (1 - t) * (1 - t) * arc.fromY + 2 * (1 - t) * t * midY + t * t * endY;

        ctx.save();
        ctx.setLineDash([6, 10]);
        ctx.lineWidth = 2;
        ctx.strokeStyle = arc.color + "55";
        ctx.beginPath();
        ctx.moveTo(arc.fromX, arc.fromY);
        ctx.quadraticCurveTo(midX, midY, endX, endY);
        ctx.stroke();
        ctx.setLineDash([]);

        drawPolyRound(ctx, px - 14, py - 10, 28, 20, 8, idx % 2 ? C.bubbleIn : C.bubbleOut, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(idx === 0 ? "WA" : idx === 1 ? "MSG" : "IG", px, py + 2);
        ctx.restore();
      });
    }
  }

  class ChannelPylon {
    constructor(x, y, label, color) {
      this.x = x;
      this.y = y;
      this.label = label;
      this.color = color;
    }
    draw(ctx) {
      const pulse = Math.sin(frame * 0.08 + this.x) * 3;
      drawPolyRound(ctx, this.x - 18, this.y - 50, 36, 70, 6, "#ffffff", C.outline);
      drawPolyRound(ctx, this.x - 10, this.y - 42, 20, 14, 4, this.color, C.outline);
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(this.x, this.y - 50);
      ctx.lineTo(this.x, this.y - 70 - pulse);
      ctx.stroke();
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(this.x, this.y - 74 - pulse, 5, 0, Math.PI * 2);
      ctx.fill();
      ctx.stroke();
      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.label, this.x, this.y + 30);
    }
  }

  class ConversationNexus {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.phase = 0;
      this.leadY = 0;
      this.escalate = 0;
    }
    draw(ctx) {
      this.phase = (frame * 0.06) % 240;
      const p = this.phase;
      ctx.lineJoin = "round";

      drawPolyRound(ctx, this.x - 110, this.y - 90, 220, 180, 14, C.hub, C.outline);
      drawPolyRound(ctx, this.x - 100, this.y - 80, 200, 28, [8, 8, 0, 0], "#e2e8f0", C.outline);
      ctx.fillStyle = C.hubAccent;
      ctx.font = "bold 10px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("META BUSINESS AGENT", this.x, this.y - 62);

      if (p < 60) {
        ctx.fillStyle = "#64748b";
        ctx.font = "9px sans-serif";
        ctx.fillText("Входящие по дугам…", this.x, this.y - 35);
        for (let i = 0; i < 3; i++) {
          drawPolyRound(ctx, this.x - 80 + i * 55, this.y - 20, 48, 22, 6, C.bubbleIn, C.outline);
        }
      } else if (p < 120) {
        drawPolyRound(ctx, this.x - 85, this.y - 30, 170, 50, 6, "#eef2ff", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "8px sans-serif";
        ctx.fillText("RAG: каталог + FAQ", this.x, this.y - 8);
        drawPolyRound(ctx, this.x - 70, this.y + 10, 50, 40, 4, "#bbf7d0", C.outline);
        drawPolyRound(ctx, this.x - 5, this.y + 10, 50, 40, 4, "#bfdbfe", C.outline);
        drawPolyRound(ctx, this.x + 60, this.y + 10, 50, 40, 4, "#fde68a", C.outline);
      } else if (p < 180) {
        const score = Math.min(1, (p - 120) / 50);
        drawPolyRound(ctx, this.x - 80, this.y - 15, 160, 12, 4, "#e2e8f0", C.outline);
        drawPolyRound(ctx, this.x - 80, this.y - 15, 160 * score, 12, 4, C.lead, null);
        ctx.fillStyle = C.outline;
        ctx.font="bold 9px sans-serif";
        ctx.fillText("Лид: " + Math.round(score * 100) + "%", this.x, this.y + 20);
      } else if (p < 220) {
        this.leadY += (220 - p) * 0.02;
        drawPolyRound(ctx, this.x + 95, this.y - 10 + this.leadY * 0.3, 70, 50, 6, "#ffffff", C.crm);
        ctx.fillStyle = C.crm;
        ctx.font = "bold 8px sans-serif";
        ctx.fillText("CRM", this.x + 130, this.y + 15 + this.leadY * 0.3);
        const alpha = 0.4 + Math.sin(frame * 0.2) * 0.3;
        ctx.globalAlpha = alpha;
        ctx.fillStyle = C.lead;
        ctx.font = "bold 14px sans-serif";
        ctx.fillText("+ ЛИД", this.x + 130, this.y - 5 + this.leadY * 0.3);
        ctx.globalAlpha = 1;
      } else {
        this.escalate = (p - 220) / 20;
        drawPolyRound(ctx, this.x - 40, this.y + 55, 80, 22, 6, "#fff7ed", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "8px sans-serif";
        ctx.fillText("Эскалация → оператор", this.x, this.y + 69);
        ctx.strokeStyle = "#f97316";
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(this.x + 50, this.y + 40);
        ctx.lineTo(this.x + 90 + this.escalate * 40, this.y + 70);
        ctx.stroke();
        if (p > 235) {
          this.leadY = 0;
          this.escalate = 0;
        }
      }
    }
  }

  class TypingParticleField {
    draw(ctx) {
      for (let i = 0; i < 12; i++) {
        const px = -200 + (i * 37 + frame * 0.4) % 400;
        const py = 120 + Math.sin(frame * 0.05 + i) * 25;
        ctx.fillStyle = i % 3 === 0 ? C.wa : i % 3 === 1 ? C.msg : C.igB;
        ctx.globalAlpha = 0.25 + Math.sin(frame * 0.1 + i) * 0.15;
        ctx.beginPath();
        ctx.arc(px, py, 2 + (i % 3), 0, Math.PI * 2);
        ctx.fill();
      }
      ctx.globalAlpha = 1;
    }
  }

  class BriefingTicker {
    draw(ctx) {
      const offset = (frame * 1.2) % 320;
      ctx.save();
      ctx.beginPath();
      ctx.rect(-200, 95, 400, 18);
      ctx.clip();
      ctx.fillStyle = "#64748b";
      ctx.font = "8px sans-serif";
      ctx.textAlign = "left";
      const text = "Briefing 24/7 · 12 ночных чатов · 3 горячих лида · эскалаций: 1 · avg ответ 18 сек    ";
      ctx.fillText(text + text, -offset, 107);
      ctx.restore();
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs) {
      this.x = x;
      this.y = y;
      this.baseX = x;
      this.baseY = y;
      this.color = color;
      this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
      this.hitAnimation = 0;
    }

    draw(ctx) {
      this.timer += 0.03;
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;
      const prg = (frame * 0.06) % 240;
      const targets = {
        "1_architect": { x: -250, y: -80 },
        "2_seo": { x: -120, y: 50 },
        "3_coder": { x: 30, y: -60 },
        "4_designer": { x: 80, y: 40 },
        "5_deployer": { x: 150, y: -20 }
      };
      const tgt = targets[this.role] || { x: 40, y: -30 };
      const targetX = tgt.x;
      const targetY = tgt.y;

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 11) {
          isMoving = true;
          faceDir = targetX > this.baseX ? 1 : -1;
          carryType = this.color;
          this.x = this.baseX + (targetX - this.baseX) * (local / 11);
          this.y = this.baseY + (targetY - this.baseY) * (local / 11);
        } else if (local < 14) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = this.baseX < targetX ? -1 : 1;
          this.x = targetX - (targetX - this.baseX) * ((local - 14) / 8);
          this.y = targetY - (targetY - this.baseY) * ((local - 14) / 8);
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        if (prg >= this.stepTrig - 8) carryType = this.color;
      }

      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 22, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      const bob = isMoving ? Math.abs(Math.sin(this.timer * 3)) * 2 : Math.sin(this.timer * 1.5);
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";
      let legL = 0, legR = 0;
      if (isMoving) {
        const wp = this.timer * 6;
        legL = Math.sin(wp) * 5;
        legR = Math.sin(wp + Math.PI) * 5;
      }
      drawPolyRound(ctx, -10, -5 + Math.max(0, legL), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, -12, 5 + Math.max(0, legL), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, 2, -5 + Math.max(0, legR), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, 0, 5 + Math.max(0, legR), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);
      const hx = 0, hy = -28 - bob;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(hx, hy, 12, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();
      ctx.save();
      ctx.scale(faceDir, 1);
      ctx.fillStyle = "#fff";
      ctx.beginPath();
      ctx.arc(hx + 4, hy - 2, 4, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 4, hy - 2, 4, 0, Math.PI * 2);
      ctx.fill();
      ctx.fillStyle = C.outline;
      ctx.beginPath();
      ctx.arc(hx + 5, hy - 2, 2, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 3, hy - 2, 2, 0, Math.PI * 2);
      ctx.fill();
      if (this.role === "1_architect") {
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 1;
        ctx.strokeRect(hx + 1, hy - 5, 6, 6);
        ctx.strokeRect(hx - 7, hy - 5, 6, 6);
      } else if (this.role === "2_seo") {
        drawPolyRound(ctx, hx - 12, hy - 14, 24, 8, [6, 6, 0, 0], C.outline, null);
      } else if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.beginPath();
        ctx.moveTo(hx - 10, hy - 8);
        ctx.lineTo(hx - 14, hy - 18);
        ctx.lineTo(hx + 10, hy - 8);
        ctx.fill();
      } else if (this.role === "4_designer") {
        drawPolyRound(ctx, hx - 14, hy - 12, 28, 6, 3, "#f43f5e", C.outline);
      } else if (this.role === "5_deployer") {
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(hx, hy, 14, Math.PI, Math.PI * 2);
        ctx.stroke();
      }
      ctx.restore();
      if (carryType) {
        drawPolyRound(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      }
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];

  entities.push(new TypingParticleField());
  entities.push(new ArcMessageFlow());
  entities.push(new ChannelPylon(-280, -100, "WhatsApp", C.wa));
  entities.push(new ChannelPylon(-290, 50, "Messenger", C.msg));
  entities.push(new ChannelPylon(-270, 180, "Instagram", C.igB));
  entities.push(new ConversationNexus(50, -20));
  entities.push(new BriefingTicker());
  entities.push(new Agent(-340, 60, C.agentYellow, "1_architect", 12, [
    "Маршрут WA→хаб", "Омниканал live", "Webhook каналов"
  ]));
  entities.push(new Agent(-220, 140, C.agentGreen, "2_seo", 52, [
    "Интенты в RAG", "FAQ на 3 языках", "LSI для мессенджеров"
  ]));
  entities.push(new Agent(-100, 30, C.agentBlue, "3_coder", 92, [
    "CRM webhook", "Ответ < 30 сек", "Guardrails эскалации"
  ]));
  entities.push(new Agent(10, 120, C.agentPink, "4_designer", 132, [
    "Тон бренда в чате", "Пузырь ответа UI", "Каталог карточек"
  ]));
  entities.push(new Agent(120, 20, C.agentPurple, "5_deployer", 172, [
    "Запуск 24/7", "Briefing в waitlist", "Token billing ок?"
  ]));

  function createBubble(x, y, text, customLife = 300) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

    const prg = (frame * 0.06) % 240;
    if (prg >= 10 && prg < 10.06) createBubble(-280, -120, "1. Каналы подключены");
    if (prg >= 50 && prg < 50.06) createBubble(-200, 20, "2. RAG + каталог");
    if (prg >= 90 && prg < 90.06) createBubble(-60, -40, "3. Квалификация лида");
    if (prg >= 130 && prg < 130.06) createBubble(60, 30, "4. Синхрон CRM");
    if (prg >= 175 && prg < 175.06) createBubble(120, -50, "5. Briefing готов");

    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    for (let i = bubbles.length - 1; i >= 0; i--) {
      const bub = bubbles[i];
      bub.life--;
      if (bub.life <= 0) {
        bubbles.splice(i, 1);
        continue;
      }
      let alpha = Math.min(1, bub.life / 30);
      if (bub.life > bub.maxLife - 10) alpha = (bub.maxLife - bub.life) / 10;
      ctx.globalAlpha = alpha;
      const tw = ctx.measureText(bub.text).width + 16;
      const th = 20;
      const bx = bub.x;
      const by = bub.y - (bub.maxLife - bub.life) * 0.04;
      drawPolyRound(ctx, bx - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.outline;
      ctx.fillText(bub.text, bx, by - th / 2);
      ctx.globalAlpha = 1;
    }
    ctx.restore();
    requestAnimationFrame(engineloop);
  }

  document.fonts.ready.then(() => engineloop());
});
</script>
</section>

<section class="ym-section" id="intro" aria-label="Введение">
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
</section>

<section class="ym-section ym-section-alt" id="chto-takoe">
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
</section>

<section class="ym-section" id="kak-rabotaet">
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
</section>

<div class="ym-container"><section id="meta-business-agent-whatsapp-ai-agent-boris-block" class="boris-article-viz reveal" aria-label="Омниканальный AI-агент: мессенджеры и CRM">
<style>
#meta-business-agent-whatsapp-ai-agent-boris-block {
  margin: 56px 0;
  padding: 0;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-viz-card {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  padding: 32px 28px;
  background: linear-gradient(145deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
  border: 1px solid #e2e8f0;
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.06);
}
@media (min-width: 1024px) {
  #meta-business-agent-whatsapp-ai-agent-boris-block .boris-viz-card {
    grid-template-columns: 1.1fr 0.9fr;
    gap: 36px;
    padding: 40px 40px;
    align-items: center;
  }
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-eyebrow {
  margin: 0 0 10px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: #3b82f6;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-kicker {
  margin: 0 0 14px;
  font-size: clamp(20px, 2.4vw, 26px);
  font-weight: 800;
  line-height: 1.25;
  color: #0f172a;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-lead {
  margin: 0 0 20px;
  font-size: 15px;
  line-height: 1.65;
  color: #64748b;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-stats {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px;
  margin: 0 0 18px;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-stat {
  padding: 14px 16px;
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-stat strong {
  display: block;
  font-size: 20px;
  font-weight: 800;
  color: #0f172a;
  line-height: 1.2;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-stat span {
  font-size: 12px;
  color: #64748b;
  line-height: 1.4;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin: 0 0 16px;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-pill {
  padding: 6px 12px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 999px;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-bridge {
  margin: 0;
  font-size: 13px;
  font-weight: 600;
  color: #3b82f6;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-canvas-wrap {
  position: relative;
  min-height: 380px;
  height: clamp(380px, 52vw, 520px);
  border-radius: 18px;
  overflow: hidden;
  background: #fff;
  border: 1px solid #e2e8f0;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.8);
}
#meta-business-agent-whatsapp-ai-agent-boris-block canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#meta-business-agent-whatsapp-ai-agent-boris-block .boris-canvas-caption {
  position: absolute;
  left: 14px;
  right: 14px;
  bottom: 12px;
  padding: 8px 12px;
  font-size: 11px;
  font-weight: 600;
  color: #64748b;
  text-align: center;
  background: rgba(255,255,255,0.92);
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  backdrop-filter: blur(6px);
  pointer-events: none;
}
</style>

<div class="boris-viz-card">
  <div class="boris-viz-copy">
    <p class="boris-eyebrow">Омниканал + CRM</p>
    <h3 class="boris-kicker">Один AI-агент — несколько входов, один контур лидов</h3>
    <p class="boris-lead">Meta Business Agent объединяет WhatsApp, Instagram и Messenger. В российском стеке тот же принцип: Telegram и MAX на входе, AI на квалификации, CRM на сделке — эскалация на менеджера по правилам.</p>
    <div class="boris-stats">
      <div class="boris-stat">
        <strong>&lt; 30 с</strong>
        <span>цель первого ответа агента 24/7</span>
      </div>
      <div class="boris-stat">
        <strong>3 → 1</strong>
        <span>канала Meta сходятся в одном агенте</span>
      </div>
    </div>
    <div class="boris-pills">
      <span class="boris-pill">WhatsApp</span>
      <span class="boris-pill">Instagram DM</span>
      <span class="boris-pill">Telegram</span>
      <span class="boris-pill">AmoCRM / Bitrix24</span>
    </div>
    <p class="boris-bridge">Дальше разберём, как собрать такой контур у себя →</p>
  </div>
  <div class="boris-canvas-wrap">
    <canvas id="meta-business-agent-boris-canvas" aria-hidden="true"></canvas>
    <p class="boris-canvas-caption">Сообщение → AI-квалификация → лид в CRM · сложный кейс → оператор</p>
  </div>
</div>

<script>
(function metaBusinessAgentBorisEngine() {
  var canvas = document.getElementById('meta-business-agent-boris-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var cw = 0, ch = 0, frame = 0;
  var packets = [];
  var hubPulse = 0;

  var COLORS = {
    outline: '#0f172a',
    wa: '#25D366',
    ig: '#E1306C',
    msg: '#0084FF',
    tg: '#229ED9',
    ai: '#3b82f6',
    crm: '#10b981',
    human: '#f59e0b',
    line: '#cbd5e1',
    bg: '#f8fafc',
    card: '#ffffff',
    text: '#64748b',
    dark: '#0f172a'
  };

  var channels = [
    { id: 'wa', label: 'WA', color: COLORS.wa, x: 0.12, y: 0.22 },
    { id: 'ig', label: 'IG', color: COLORS.ig, x: 0.12, y: 0.42 },
    { id: 'msg', label: 'MSG', color: COLORS.msg, x: 0.12, y: 0.62 },
    { id: 'tg', label: 'TG', color: COLORS.tg, x: 0.12, y: 0.82 }
  ];

  function resize() {
    var wrap = canvas.parentElement;
    if (!wrap) return;
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    cw = wrap.clientWidth;
    ch = wrap.clientHeight;
    canvas.width = Math.floor(cw * dpr);
    canvas.height = Math.floor(ch * dpr);
    canvas.style.width = cw + 'px';
    canvas.style.height = ch + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function roundRect(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    ctx.closePath();
    if (fill) { ctx.fillStyle = fill; ctx.fill(); }
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
  }

  function drawChannel(ch) {
    var x = ch.x * cw;
    var y = ch.y * ch;
    var size = Math.min(cw, ch) * 0.09;
    roundRect(x - size / 2, y - size / 2, size, size, 12, COLORS.card, COLORS.outline);
    ctx.fillStyle = ch.color;
    ctx.beginPath();
    ctx.arc(x, y, size * 0.22, 0, Math.PI * 2);
    ctx.fill();
    ctx.fillStyle = COLORS.dark;
    ctx.font = '600 ' + Math.max(10, size * 0.22) + 'px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(ch.label, x, y + size * 0.38);
  }

  function drawHub() {
    var hx = cw * 0.48;
    var hy = ch * 0.5;
    var r = Math.min(cw, ch) * 0.14 + Math.sin(hubPulse) * 3;
    var grad = ctx.createRadialGradient(hx, hy, r * 0.2, hx, hy, r);
    grad.addColorStop(0, '#60a5fa');
    grad.addColorStop(1, COLORS.ai);
    roundRect(hx - r, hy - r, r * 2, r * 2, r, grad, COLORS.outline);
    ctx.fillStyle = '#fff';
    ctx.font = '800 ' + Math.max(11, r * 0.28) + 'px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText('AI', hx, hy - 4);
    ctx.font = '600 ' + Math.max(9, r * 0.18) + 'px Inter, system-ui, sans-serif';
    ctx.fillText('агент', hx, hy + r * 0.32);
    return { x: hx, y: hy, r: r };
  }

  function drawCrm() {
    var x = cw * 0.82;
    var y = ch * 0.42;
    var w = cw * 0.22;
    var h = ch * 0.28;
    roundRect(x - w / 2, y - h / 2, w, h, 14, COLORS.card, COLORS.outline);
    ctx.fillStyle = COLORS.crm;
    ctx.fillRect(x - w / 2 + 12, y - h / 2 + 12, w - 24, 8);
    ctx.fillStyle = COLORS.line;
    for (var i = 0; i < 3; i++) {
      ctx.fillRect(x - w / 2 + 12, y - h / 2 + 30 + i * 16, w - 24, 6);
    }
    ctx.fillStyle = COLORS.dark;
    ctx.font = '700 ' + Math.max(10, w * 0.1) + 'px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('CRM', x, y + h / 2 - 14);
    return { x: x, y: y };
  }

  function drawHuman() {
    var x = cw * 0.82;
    var y = ch * 0.78;
    var size = Math.min(cw, ch) * 0.08;
    roundRect(x - size, y - size * 0.7, size * 2, size * 1.4, 12, '#fff7ed', COLORS.human);
    ctx.fillStyle = COLORS.human;
    ctx.beginPath();
    ctx.arc(x, y - size * 0.15, size * 0.35, 0, Math.PI * 2);
    ctx.fill();
    ctx.fillStyle = COLORS.dark;
    ctx.font = '600 ' + Math.max(9, size * 0.28) + 'px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('оператор', x, y + size * 0.55);
    return { x: x, y: y };
  }

  function drawFlowLine(x1, y1, x2, y2, color, dash) {
    ctx.save();
    ctx.strokeStyle = color;
    ctx.lineWidth = 2;
    if (dash) ctx.setLineDash([6, 6]);
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    var mx = (x1 + x2) / 2;
    ctx.bezierCurveTo(mx, y1, mx, y2, x2, y2);
    ctx.stroke();
    ctx.restore();
  }

  function spawnPacket() {
    var ch = channels[Math.floor(Math.random() * channels.length)];
    var hub = { x: cw * 0.48, y: ch * 0.5 };
    var toCrm = Math.random() > 0.22;
    packets.push({
      color: ch.color,
      sx: ch.x * cw,
      sy: ch.y * ch,
      tx: toCrm ? cw * 0.82 : cw * 0.82,
      ty: toCrm ? ch * 0.42 : ch * 0.78,
      t: 0,
      speed: 0.008 + Math.random() * 0.006,
      viaHub: true,
      phase: 0,
      toCrm: toCrm,
      label: toCrm ? 'лид' : 'эскалация'
    });
  }

  function drawPacket(p) {
    var x, y;
    if (p.phase === 0) {
      var t = p.t;
      x = p.sx + (cw * 0.48 - p.sx) * t;
      y = p.sy + (ch * 0.5 - p.sy) * t;
    } else {
      var t2 = p.t;
      x = cw * 0.48 + (p.tx - cw * 0.48) * t2;
      y = ch * 0.5 + (p.ty - ch * 0.5) * t2;
    }
    roundRect(x - 14, y - 8, 28, 16, 6, p.color, COLORS.outline);
    if (p.phase === 1 && p.t > 0.5) {
      ctx.fillStyle = '#fff';
      ctx.font = '600 8px Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(p.label, x, y);
    }
  }

  function drawLabels() {
    ctx.fillStyle = COLORS.text;
    ctx.font = '600 11px Inter, system-ui, sans-serif';
    ctx.textAlign = 'left';
    ctx.fillText('каналы', cw * 0.04, ch * 0.1);
    ctx.textAlign = 'center';
    ctx.fillText('маршрутизация', cw * 0.48, ch * 0.1);
    ctx.fillText('действия', cw * 0.82, ch * 0.1);
  }

  function tick() {
    frame++;
    hubPulse = frame * 0.04;
    ctx.clearRect(0, 0, cw, ch);
    ctx.fillStyle = COLORS.bg;
    ctx.fillRect(0, 0, cw, ch);

    channels.forEach(function(ch) {
      drawChannel(ch);
      drawFlowLine(ch.x * cw, ch.y * ch, cw * 0.48, ch * 0.5, COLORS.line, false);
    });

    var hub = drawHub();
    var crm = drawCrm();
    var human = drawHuman();

    drawFlowLine(hub.x + hub.r * 0.6, hub.y - hub.r * 0.3, crm.x - cw * 0.08, crm.y, COLORS.crm, false);
    drawFlowLine(hub.x + hub.r * 0.6, hub.y + hub.r * 0.3, human.x - cw * 0.06, human.y, COLORS.human, true);

    if (frame % 55 === 0) spawnPacket();

    for (var i = packets.length - 1; i >= 0; i--) {
      var p = packets[i];
      p.t += p.speed;
      if (p.phase === 0 && p.t >= 1) {
        p.phase = 1;
        p.t = 0;
      }
      if (p.t >= 1 && p.phase === 1) {
        packets.splice(i, 1);
        continue;
      }
      drawPacket(p);
    }

    drawLabels();
    requestAnimationFrame(tick);
  }

  window.addEventListener('resize', resize);
  resize();
  tick();
})();
</script>
</section></div>

<aside id="ym-cta-primary" class="ym-cta-panel reveal" aria-label="Предложение: AI-канал в мессенджерах">
  <div class="ym-cta-panel-inner">
    <p class="ym-cta-eyebrow">Практика для РФ</p>
    <h3 class="ym-cta-title">Соберите AI-канал как у Meta — в Telegram, MAX и CRM</h3>
    <p class="ym-cta-text">Meta показала эталон функций; для российского бизнеса важнее устойчивые каналы. Разберём ваши мессенджеры, базу знаний, правила эскалации и интеграции с AmoCRM или Bitrix24 — что автоматизировать в первую очередь и какой бюджет заложить.</p>
    <div class="ym-btn-group" style="justify-content:flex-start;">
      <a href="<?php echo esc_url($mba_primary_cta_url); ?>" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_primary_cta_label); ?></span></a>
    </div>
  </div>
</aside>

<section class="ym-section ym-section-alt" id="kak-nastroit">
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
</section>

<section class="ym-section" id="sravnenie">
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
</section>

<section class="ym-section ym-section-alt" id="keisy">
  <div class="ym-container mba-prose reveal">
    <h2>Кейсы: лиды, продажи, каталог и эскалация</h2>
    <div class="ym-grid-3">
      <div class="ym-card"><div class="ym-card-icon">🎯</div><h3>Лиды без расширения штата</h3><p>AI уточняет потребность, бюджет, срок; лид попадает в CRM с тегами. Менеджер подключается к «тёплым» обращениям.</p></div>
      <div class="ym-card"><div class="ym-card-icon">🛒</div><h3>Каталог и запись</h3><p>Агент предлагает 2–3 позиции, уточняет доставку, оформляет заказ или запись. Снижает no-show напоминаниями.</p></div>
      <div class="ym-card"><div class="ym-card-icon">👤</div><h3>Эскалация</h3><p>Жалобы, VIP, нестандартные скидки — правила передачи человеку задаёт владелец бизнеса.</p></div>
    </div>
  </div>
</section>

<section class="ym-section" id="vnedrenie">
  <div class="ym-container mba-prose reveal">
    <h2>Внедрение AI-агентов в бизнес-процессы</h2>
    <h3>Интеграции Shopify, Zendesk, Shopee — что доступно на старте</h3>
    <p>Meta Business Agent Platform — agentic-платформа для кастомизации и деплоя агентов; по данным Meta, <strong>платформа уже live</strong>. Для РФ-аналога: CRM, каталог, календарь, аналитика (Яндекс.Метрика, цели в CRM).</p>
    <h3>Обучение агента на базе знаний компании</h3>
    <p>Внедрение начинается с <strong>базы знаний</strong>: FAQ, описания товаров, политика возвратов, запрещённые темы, тон бренда. Агент ≠ чат-бот: RAG + действия.</p>

<aside class="ym-related-block reveal" aria-label="Обучение внедрению AI-агентов">
  <p class="ym-related-title" style="text-align:left;font-size:20px;margin-bottom:12px;">С чего начать внедрение</p>
  <p style="margin:0 0 20px;color:#64748b;line-height:1.6;">База знаний, промпт, KPI и тест на 50–100 диалогов — это не «магия платформы», а последовательность шагов. Посмотрите, какие процессы в вашем бизнесе можно автоматизировать до выбора BotHelp, n8n или собственного стека.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;">
    <a href="<?php echo esc_url($mba_secondary_cta_url); ?>" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_secondary_cta_label); ?></span></a>
  </div>
</aside>

<h3>KPI: время ответа, конверсия, NPS поддержки</h3>
    <ul>
      <li><strong>Время первого ответа</strong> — цель &lt; 30 секунд</li>
      <li><strong>Доля автоматически закрытых диалогов</strong></li>
      <li><strong>Конверсия лид → сделка</strong></li>
      <li><strong>NPS поддержки</strong></li>
      <li><strong>Стоимость диалога</strong> — особенно при token billing Meta</li>
    </ul>
  </div>
</section>

<section class="ym-section ym-section-alt" id="riski">
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
</section>

<section class="ym-section" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по Meta Business Agent и AI в мессенджерах</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <ul class="ym-faq-list"><li><a href="#faq-free">Бесплатный ли старт Meta Business Agent?</a></li>
<li><a href="#faq-rf">Можно ли российскому бизнесу использовать Meta Business Agent сейчас?</a></li>
<li><a href="#faq-tg">Можно ли заменить WhatsApp на Telegram в России?</a></li>
<li><a href="#faq-diff">Чем AI-агент отличается от обычного чат-бота?</a></li>
<li><a href="#faq-cost">Сколько стоит свой AI-агент с CRM?</a></li>
<li><a href="#faq-dev">Нужен ли программист для внедрения?</a></li>
<li><a href="#faq-tg-biz">Telegram Business vs обычный бот vs AI-агент</a></li></ul>
      </aside>
      <div><article class="ym-faq-item reveal" id="faq-free"><h3>Бесплатный ли старт Meta Business Agent?</h3><p><strong>Да.</strong> Meta объявила <strong>бесплатный старт</strong> при глобальном запуске 3 июня 2026. Платные подписки появятся «в ближайшие месяцы»; для крупных клиентов — <strong>token-based billing</strong> отдельно от стоимости сообщений.</p></article>
<article class="ym-faq-item reveal" id="faq-rf"><h3>Можно ли российскому бизнесу использовать Meta Business Agent сейчас?</h3><p>Официального анонса для РФ нет. WhatsApp нестабилен, Instagram* и Facebook* — экстремистские организации в РФ. Практичная стратегия: внедрить аналог в <strong>Telegram + MAX + CRM</strong>.</p></article>
<article class="ym-faq-item reveal" id="faq-tg"><h3>Можно ли заменить WhatsApp на Telegram в России?</h3><p><strong>Да.</strong> Январь 2026: Telegram <strong>95,98 млн</strong> vs WhatsApp <strong>89,42 млн</strong> в РФ. Telegram + MAX устойчивее для AI-агента продаж и поддержки.</p></article>
<article class="ym-faq-item reveal" id="faq-diff"><h3>Чем AI-агент отличается от обычного чат-бота?</h3><p>Чат-бот следует сценарию. AI-агент понимает свободный текст, рекомендует товары, квалифицирует лиды, бронирует встречи, эскалирует на человека и интегрируется с CRM.</p></article>
<article class="ym-faq-item reveal" id="faq-cost"><h3>Сколько стоит свой AI-агент с CRM?</h3><p>BotBeri — от <strong>2 990 ₽/мес</strong>; Botseller — от <strong>500 ₽</strong> на баланс; n8n + LLM — open-source + API моделей. Meta: бесплатный старт, далее подписка + token billing.</p></article>
<article class="ym-faq-item reveal" id="faq-dev"><h3>Нужен ли программист для внедрения?</h3><p>Для no-code (BotHelp, BotBeri, Botseller) — достаточно маркетолога с базой знаний. Для n8n + LLM — нужен разработчик или подрядчик.</p></article>
<article class="ym-faq-item reveal" id="faq-tg-biz"><h3>Telegram Business vs обычный бот vs AI-агент</h3><p><strong>Telegram Business</strong> — профиль без AI. <strong>Обычный бот</strong> — сценарии. <strong>AI-агент</strong> — свободный диалог, каталог, лиды, CRM, эскалация 24/7.</p></article></div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="conclusion">
  <div class="ym-container mba-prose reveal">
    <p><strong>Итог:</strong> Meta Business Agent — эталон AI-канала продаж и поддержки в мессенджерах: 1M+ бизнесов, 1B+ диалогов в день, бесплатный старт и roadmap до «полного управления daily operations». Для российского бизнеса разумная стратегия — <strong>внедрение как у Meta, но под ваши каналы и законы РФ</strong>: Telegram, MAX, CRM, контроль данных и предсказуемый бюджет.</p>
  </div>
</section>

<aside class="ym-cta-panel ym-cta-panel--final reveal" aria-label="Следующий шаг по AI-агентам">
  <div class="ym-cta-panel-inner" style="text-align:center;">
    <p class="ym-cta-eyebrow">Итог по Meta Business Agent</p>
    <h3 class="ym-cta-title">Внедрите AI-канал продаж и поддержки под ваши правила</h3>
    <p class="ym-cta-text">Эталон Meta — в Telegram, MAX и CRM с контролем данных и предсказуемым бюджетом. Начните с аудита каналов или посмотрите, что автоматизировать в ваших процессах.</p>
    <div class="ym-btn-group">
      <a href="<?php echo esc_url($mba_primary_cta_url); ?>" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_primary_cta_label); ?></span></a>
      <a href="<?php echo esc_url($mba_secondary_cta_url); ?>" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($mba_secondary_cta_label); ?></span></a>
    </div>
  </div>
</aside>

<p class="ym-container mba-footnote reveal">*Instagram и Facebook — продукты Meta, признанные экстремистскими организациями на территории РФ.</p>

</main>

<script>
/**
 * Scroll reveal для классов .reveal, .reveal-left, .reveal-right, .reveal-scale
 * (как в конце page-yandex-metrika-skill.php).
 * Подключай после разметки лонгрида Наташи.
 */
document.addEventListener('DOMContentLoaded', function() {
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    });

    revealElements.forEach(el => revealObserver.observe(el));
});

</script>

<script type="application/ld+json">
<?php
$mba_json_ld = json_decode(<<<'MBA_JSON_LD'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Meta Business Agent: AI-агент для WhatsApp, Instagram и продаж",
      "description": "Meta Business Agent вышел глобально: AI отвечает в WhatsApp и Instagram, продаёт и бронирует встречи. Разбор функций, тарифов и как собрать аналог с CRM в РФ.",
      "datePublished": "2026-06-05",
      "author": {
        "@type": "Organization",
        "name": "Nero Network"
      }
    },
    {
      "@type": "SoftwareApplication",
      "name": "Meta Business Agent",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "WhatsApp, Instagram, Messenger",
      "description": "AI-агент Meta для ответов клиентам, продаж и поддержки в мессенджерах"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Бесплатный ли старт Meta Business Agent?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да. Meta объявила бесплатный старт при глобальном запуске 3 июня 2026. Платные подписки появятся «в ближайшие месяцы»; для крупных клиентов — token-based billing отдельно от стоимости сообщений."
          }
        },
        {
          "@type": "Question",
          "name": "Можно ли российскому бизнесу использовать Meta Business Agent сейчас?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Официального анонса для РФ нет. WhatsApp нестабилен, Instagram* и Facebook* — экстремистские организации в РФ. Практичная стратегия: внедрить аналог в Telegram + MAX + CRM."
          }
        },
        {
          "@type": "Question",
          "name": "Можно ли заменить WhatsApp на Telegram в России?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да. Январь 2026: Telegram 95,98 млн vs WhatsApp 89,42 млн в РФ. Telegram + MAX устойчивее для AI-агента продаж и поддержки."
          }
        },
        {
          "@type": "Question",
          "name": "Чем AI-агент отличается от обычного чат-бота?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Чат-бот следует сценарию. AI-агент понимает свободный текст, рекомендует товары, квалифицирует лиды, бронирует встречи, эскалирует на человека и интегрируется с CRM."
          }
        },
        {
          "@type": "Question",
          "name": "Сколько стоит свой AI-агент с CRM?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "BotBeri — от 2 990 ₽/мес; Botseller — от 500 ₽ на баланс; n8n + LLM — open-source + API моделей. Meta: бесплатный старт, далее подписка + token billing."
          }
        },
        {
          "@type": "Question",
          "name": "Нужен ли программист для внедрения?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Для no-code (BotHelp, BotBeri, Botseller) — достаточно маркетолога с базой знаний. Для n8n + LLM — нужен разработчик или подрядчик."
          }
        },
        {
          "@type": "Question",
          "name": "Telegram Business vs обычный бот vs AI-агент",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Telegram Business — профиль без AI. Обычный бот — сценарии. AI-агент — свободный диалог, каталог, лиды, CRM, эскалация 24/7."
          }
        }
      ]
    }
  ]
}
MBA_JSON_LD, true);
$mba_json_ld['@graph'][0]['url'] = get_permalink();
echo wp_json_encode($mba_json_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>

<?php get_footer(); ?>
