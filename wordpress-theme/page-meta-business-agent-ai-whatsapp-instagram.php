<?php
/**
 * Template Name: Meta Business Agent AI WhatsApp Instagram
 * Description: Longread about Meta Business Agent — AI agent for WhatsApp and Instagram.
 */

$page_seo_title = 'Meta Business Agent: AI для WhatsApp и Instagram — гайд';
$page_seo_description = 'Meta Business Agent — платный AI-агент для WhatsApp и Instagram. Разбираем функции, цены, интеграции и как повторить автоматизацию переписки для SMB в России.';

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


$primary_cta_url = getenv('PRIMARY_CTA_URL') ?: home_url('/');
$primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Заказать AI-агента';
$secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: home_url('/');
$secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Обучающий канал';

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
 *   `.meta-business-agent-ai-whatsapp-instagram-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.meta-business-agent-ai-whatsapp-instagram-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #008069;
    --ym-accent: #e1306c;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(0, 128, 105, 0.15);
}

.meta-business-agent-ai-whatsapp-instagram-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.meta-business-agent-ai-whatsapp-instagram-page h1,
.meta-business-agent-ai-whatsapp-instagram-page h2,
.meta-business-agent-ai-whatsapp-instagram-page h3,
.meta-business-agent-ai-whatsapp-instagram-page h4,
.meta-business-agent-ai-whatsapp-instagram-page h5,
.meta-business-agent-ai-whatsapp-instagram-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-ai-whatsapp-instagram-page p,
.meta-business-agent-ai-whatsapp-instagram-page li,
.meta-business-agent-ai-whatsapp-instagram-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.meta-business-agent-ai-whatsapp-instagram-page strong,
.meta-business-agent-ai-whatsapp-instagram-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-ai-whatsapp-instagram-page pre, .meta-business-agent-ai-whatsapp-instagram-page code {
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
    background: radial-gradient(circle, rgba(0,128,105,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(0, 128, 105, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(0, 128, 105, 0.2);
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
    box-shadow: 0 5px 15px rgba(0,128,105,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(0, 128, 105, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(0, 128, 105, 0.5);
    background: #e60000;
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
    border-color: rgba(0, 128, 105, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(0, 128, 105, 0.05);
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
#mba-inbox-hub.fullscreen-white-office,
.mba-inbox-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.mba-intro-section { padding: 72px 0 48px; }
.mba-intro-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 40px;
  align-items: start;
}
.mba-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #25d366, #e1306c, #0088cc) 1;
  padding-left: 28px;
}
.mba-intro-text p {
  text-align: left !important;
  font-size: 18px;
  line-height: 1.7;
  margin: 0 0 18px;
  color: #334155 !important;
}
.mba-intro-text p.lead-strong {
  font-size: 20px;
  font-weight: 600;
  color: #0f172a !important;
}
.mba-intro-decor { min-width: 0; }
.mba-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}
.mba-intro-chip {
  padding: 8px 14px;
  border-radius: 999px;
  background: #fff;
  border: 1px solid #e2e8f0;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
}
.mba-toc-wrap { padding: 0 0 40px; }
.meta-business-agent-ai-whatsapp-instagram-page .ym-content-narrow {
  max-width: 900px;
  margin: 0 auto;
}
.meta-business-agent-ai-whatsapp-instagram-page .ym-table-wrap {
  overflow-x: auto;
  margin: 28px 0;
}
.meta-business-agent-ai-whatsapp-instagram-page table.ym-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
}
.meta-business-agent-ai-whatsapp-instagram-page table.ym-table th,
.meta-business-agent-ai-whatsapp-instagram-page table.ym-table td {
  border: 1px solid #e2e8f0;
  padding: 14px 16px;
  text-align: left;
  vertical-align: top;
}
.meta-business-agent-ai-whatsapp-instagram-page table.ym-table th {
  background: #f8fafc;
  font-weight: 700;
  color: #0f172a !important;
}
.meta-business-agent-ai-whatsapp-instagram-page ul.ym-list {
  padding-left: 1.25rem;
  margin: 16px 0;
}
.meta-business-agent-ai-whatsapp-instagram-page ul.ym-list li {
  margin-bottom: 8px;
  line-height: 1.6;
}
.meta-business-agent-ai-whatsapp-instagram-page ol.ym-list {
  padding-left: 1.25rem;
  margin: 16px 0;
}
.meta-business-agent-ai-whatsapp-instagram-page ol.ym-list li {
  margin-bottom: 10px;
  line-height: 1.6;
}
.meta-business-agent-ai-whatsapp-instagram-page h3.ym-h3 {
  font-size: 22px;
  font-weight: 700;
  margin: 36px 0 16px;
  color: #0f172a !important;
}
.meta-business-agent-ai-whatsapp-instagram-page .ym-callout {
  background: #ecfdf5;
  border-left: 4px solid #008069;
  padding: 20px 24px;
  border-radius: 0 12px 12px 0;
  margin: 24px 0;
}
@media (max-width: 900px) {
  .mba-intro-grid { grid-template-columns: 1fr; }
  .mba-intro-decor { order: 2; }
}

</style>

<main id="primary" class="site-main meta-business-agent-ai-whatsapp-instagram-page" role="main" tabindex="-1">
<section id="mba-inbox-hub" class="fullscreen-white-office mba-inbox-hero" aria-labelledby="mba-inbox-title">
<style>
.mba-inbox-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.mba-inbox-hero .mba-hero-canvas-wrap {
  position: absolute;
  inset: 0;
  z-index: 1;
}
.mba-inbox-hero #mba-inbox-hero-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
.mba-inbox-hero .mba-hero-cta-top {
  position: absolute;
  top: clamp(72px, 10vh, 120px);
  right: clamp(16px, 4vw, 60px);
  z-index: 4;
}
.mba-inbox-hero .giant-seo {
  font-size: clamp(32px, 4.8vw, 68px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
  max-width: min(820px, 92vw);
}
.mba-inbox-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #25d366, #e1306c, #0088cc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.mba-inbox-hero .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 680px;
}
.mba-inbox-hero .mba-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 60px);
  bottom: clamp(80px, 12vh, 140px);
  z-index: 3;
  max-width: min(780px, 92vw);
}
.mba-inbox-hero .telegram-button {
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
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);
}
.mba-inbox-hero .telegram-button:hover { transform: translateY(-2px); }
.mba-inbox-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(16px, 4vw, 48px);
  top: 50%;
  transform: translateY(-42%);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.mba-inbox-hero .vl-ui-task {
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
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
  backdrop-filter: blur(6px);
}
.mba-inbox-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #25d366, #0088cc);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.mba-inbox-hero .vl-ui-pill {
  position: absolute;
  bottom: clamp(24px, 4vh, 48px);
  right: clamp(16px, 4vw, 60px);
  left: auto;
  transform: none;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 10px;
  max-width: min(520px, 90vw);
  z-index: 3;
}
.mba-inbox-hero .vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
@media (max-width: 900px) {
  .mba-inbox-hero .vl-ui-tasks {
    top: auto;
    bottom: clamp(200px, 28vh, 260px);
    transform: none;
    flex-direction: row;
    flex-wrap: wrap;
    max-width: calc(100% - 32px);
  }
  .mba-inbox-hero .vl-ui-task { font-size: 12px; padding: 8px 12px; }
  .mba-inbox-hero .mba-hero-copy { bottom: clamp(24px, 5vh, 48px); }
  .mba-inbox-hero .vl-ui-pill {
    bottom: auto;
    top: clamp(120px, 16vh, 160px);
    right: 16px;
    left: 16px;
    justify-content: flex-start;
  }
  .mba-inbox-hero .mba-hero-cta-top {
    top: clamp(64px, 9vh, 88px);
    right: 16px;
    left: 16px;
  }
}
</style>

  <div class="mba-hero-canvas-wrap" aria-hidden="true">
    <canvas id="mba-inbox-hero-canvas"></canvas>
  </div>

  <div class="mba-hero-cta-top">
    <a href="<?php echo esc_url($primary_cta_url); ?>" class="telegram-button" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_html($primary_cta_label); ?> — заказать AI-агента для мессенджеров"><?php echo esc_html($primary_cta_label); ?></a>
  </div>

  <div class="vl-ui-tasks" aria-label="Этапы внедрения AI-агента">
    <div class="vl-ui-task"><span>1</span> Аудит каналов</div>
    <div class="vl-ui-task"><span>2</span> Каталог + FAQ</div>
    <div class="vl-ui-task"><span>3</span> CRM-webhook</div>
    <div class="vl-ui-task"><span>4</span> Handoff-правила</div>
    <div class="vl-ui-task"><span>5</span> Пилот диалогов</div>
  </div>

  <div class="vl-ui-pill" aria-label="Ключевые теги">
    <span>WhatsApp</span>
    <span>Instagram</span>
    <span>Telegram</span>
    <span>Task-specific AI</span>
    <span>Утренний briefing</span>
  </div>

  <div class="mba-hero-copy">
    <h1 id="mba-inbox-title" class="giant-seo">Meta Business Agent: <span>AI-агент для WhatsApp и Instagram</span> — что это значит для вашего бизнеса</h1>
    <p class="giant-seo-sub">Meta начала продавать AI-агента для переписки с клиентами. Разбираем, как повторить такую автоматизацию для WhatsApp, Instagram и Telegram — и не потерять качество сервиса</p>
  </div>
</section>

<section class="ym-section mba-intro-section" id="intro">
  <div class="ym-container">
    <div class="mba-intro-grid reveal">
      <div class="mba-intro-text">
        <p class="lead-strong"><strong>Коротко:</strong> 3 июня 2026 Meta впервые начала продавать AI-агента для переписки с клиентами в WhatsApp, Instagram и Messenger. Это не эксперимент, а коммерческий продукт с подписками и consumption-based pricing для enterprise.</p>
        <p>Для российского SMB важнее другой вывод: Meta показала эталонную модель — каталог, ответы, запись, эскалация на человека, интеграции с CRM. Такой же <strong>ai агент для бизнеса</strong> можно собрать на Telegram, WhatsApp Business API и AmoCRM/Bitrix24 без привязки к Meta One Advanced за $49.99 в месяц.</p>
      </div>
      <div class="mba-intro-decor">
        <div class="ym-mac-window reveal delay-200">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">inbox-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># Meta Business Agent → ваш стек</span><br>
            <span class="ym-command">$</span> channel audit --wa --ig --tg<br>
            <span class="ym-command">$</span> sync catalog + faq_rag<br>
            <span class="ym-command">$</span> webhook crm --amo|bitrix<br>
            <span class="ym-command">$</span> deploy task-specific-agent<br>
            <span class="ym-comment"># handoff → operator + briefing 09:00</span>
          </div>
        </div>
        <div class="mba-intro-chips">
          <span class="mba-intro-chip">3 июня 2026</span>
          <span class="mba-intro-chip">Conversations London</span>
          <span class="mba-intro-chip">Task-specific AI</span>
          <span class="mba-intro-chip">Telegram first · РФ</span>
        </div>
      </div>
    </div>
    <div class="mba-toc-wrap">
      <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
        <a href="#what-is-meta-business-agent">Что такое MBA</a>
        <a href="#how-agent-works">Как работает</a>
        <a href="#integrations">Интеграции</a>
        <a href="#pricing">Цены</a>
        <a href="#russia-alternative">Для SMB в РФ</a>
        <a href="#implementation">Внедрение</a>
        <a href="#risks">Риски</a>
        <a href="#faq">FAQ</a>
      </nav>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="what-is-meta-business-agent">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Что такое Meta Business Agent и почему это новость июня 2026</h2>
    <div class="reveal">
      <p><strong>Определение:</strong> Meta Business Agent — платный AI-агент Meta для бизнеса, который отвечает клиентам в мессенджерах, рекомендует товары, записывает на услуги и при необходимости передаёт диалог живому оператору.</p>
      <p>3 июня 2026 на конференции <strong>Conversations 2026</strong> в Лондоне компания представила <strong>Meta Business Agent</strong> как первый <strong>платный</strong> AI-агент для бизнеса в своей экосистеме. До этого Meta тестировала Business AI в пилотах — Мексика с ноября 2025, Индия в мае 2026 — но не монетизировала агента глобально.</p>
      <p><strong>Почему это важно для рынка:</strong> реклама по-прежнему даёт Meta около <strong>98% выручки</strong>, но компания диверсифицирует доходы через подписки и messaging. В Q1 2026 сегмент Family of Apps Other Revenue вырос до <strong>$885 млн (+74% год к году)</strong>.</p>
      <p><strong>Итог блока:</strong> Meta Business Agent — не очередной чат-бот с кнопками, а заявка на новый стандарт клиентского сервиса в мессенджерах. Для владельца салона, магазина или сервисной компании это сигнал: <strong>автоматизация переписки с клиентами</strong> переходит в категорию «платный продукт с измеримым ROI».</p>

      <h3 class="ym-h3" id="meta-one-pricing">Meta One Advanced и consumption-based pricing</h3>
      <p>Meta выстроила двухуровневую модель монетизации.</p>
      <p><strong>Для SMB:</strong> агент включается в <strong>отдельные тарифы WhatsApp Business Premium</strong> — ориентир рынка <strong>$5–15 в месяц</strong>. <strong>Meta One Advanced — $49.99/мес.</strong> (Essential — $14.99).</p>
      <p><strong>Для enterprise:</strong> действует <strong>consumption-based pricing</strong> — оплата по <strong>токенам</strong>, аналогично per-message модели WABA.</p>
      <p><strong>Важно для расчёта TCO:</strong> с <strong>1 июля 2025</strong> Meta тарифицирует template-сообщения WABA по категории и стране. Service-сообщения в 24-часовом окне — <strong>бесплатно</strong>. Nero Network помогает с прозрачным расчётом до запуска.</p>

      <h3 class="ym-h3" id="agent-vs-chatbot">Чем AI-агент отличается от обычного чат-бота</h3>
      <p><strong>Коротко:</strong> классический <strong>чат бот whatsapp для бизнеса</strong> следует сценариям. AI-агент понимает свободный текст, опирается на каталог и CRM, квалифицирует лиды и решает, когда передать диалог человеку.</p>
      <div class="ym-table-wrap">
        <table class="ym-table">
          <thead><tr><th>Критерий</th><th>Обычный чат-бот</th><th>AI-агент (Meta Business Agent и аналоги)</th></tr></thead>
          <tbody>
            <tr><td>Диалог</td><td>Кнопки, ветки, ключевые слова</td><td>Свободная переписка на естественном языке</td></tr>
            <tr><td>Данные</td><td>Статичный FAQ</td><td>Каталог, CRM, third-party sources</td></tr>
            <tr><td>Продажи</td><td>Ограниченные сценарии</td><td>Рекомендации, запись, квалификация лидов</td></tr>
            <tr><td>Эскалация</td><td>«Позвоните нам»</td><td>Умный handoff на оператора с контекстом</td></tr>
            <tr><td>Обучение</td><td>Переписывание сценариев</td><td>Обновление базы знаний и интеграций</td></tr>
          </tbody>
        </table>
      </div>
      <p>С <strong>15 января 2026</strong> на WABA <strong>запрещены general-purpose AI chatbots</strong>. <strong>Разрешены</strong> task-specific боты: support, sales, bookings, notifications. Meta Business Agent — <strong>собственный</strong> агент Meta и не попадает под запрет.</p>
      <p>На той же неделе, 2–3 июня 2026, вышли ещё два крупных AI-агента — но для <strong>другой аудитории</strong>:</p>
      <div class="ym-table-wrap">
        <table class="ym-table">
          <thead><tr><th>Продукт</th><th>Дата</th><th>Кому</th><th>Суть</th></tr></thead>
          <tbody>
            <tr><td><strong>Microsoft Scout</strong></td><td>2 июня, Build 2026</td><td>Сотрудник в M365</td><td>Autopilot в Teams/Outlook/SharePoint</td></tr>
            <tr><td><strong>Salesforce Agentforce Coworker</strong></td><td>2 июня 2026</td><td>Enterprise CRM</td><td>AI-teammate в Salesforce + Slack/Teams</td></tr>
            <tr><td><strong>Meta Business Agent</strong></td><td>3 июня, London</td><td>SMB + enterprise</td><td>AI <strong>для клиентов</strong> в WhatsApp/IG/Messenger</td></tr>
          </tbody>
        </table>
      </div>
      <p>Meta Business Agent — единственный из тройки, кто работает <strong>на стороне клиента</strong> в мессенджере. Владельцу салона или магазина нужен именно customer-facing агент, а не корпоративный Scout.</p>
    </div>
    <section id="boris-agent-trio-compare" class="mba-boris-block" aria-labelledby="mba-boris-kicker">
<style>
.mba-boris-block {
  --mba-meta: #008069;
  --mba-scout: #0078d4;
  --mba-coworker: #00a1e0;
  --mba-surface: #ffffff;
  --mba-muted: #64748b;
  --mba-heading: #0f172a;
  --mba-border: #e2e8f0;
  --mba-highlight: #ecfdf5;
  margin: 48px 0 56px;
  font-family: Inter, system-ui, sans-serif;
}
.mba-boris-card {
  display: grid;
  grid-template-columns: 1fr 1.15fr;
  gap: 32px;
  align-items: stretch;
  background: linear-gradient(135deg, #f8fafc 0%, #ffffff 48%, #f1f5f9 100%);
  border: 1px solid var(--mba-border);
  border-radius: 22px;
  padding: 32px 36px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
}
.mba-boris-eyebrow {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--mba-meta);
  margin-bottom: 10px;
}
.mba-boris-kicker {
  font-size: clamp(1.25rem, 2.2vw, 1.55rem);
  line-height: 1.25;
  color: var(--mba-heading);
  margin: 0 0 14px;
  font-weight: 700;
}
.mba-boris-lead {
  font-size: 15px;
  line-height: 1.65;
  color: #475569;
  margin: 0 0 20px;
}
.mba-boris-thesis {
  list-style: none;
  padding: 0;
  margin: 0 0 22px;
}
.mba-boris-thesis li {
  position: relative;
  padding-left: 18px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 1.55;
  color: #334155;
}
.mba-boris-thesis li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.55em;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--mba-meta);
}
.mba-boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}
.mba-boris-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  border: 1px solid var(--mba-border);
  background: var(--mba-surface);
  color: #334155;
}
.mba-boris-pill.is-meta { border-color: #6ee7b7; background: #ecfdf5; color: #047857; }
.mba-boris-bridge {
  margin-top: 18px;
  font-size: 13px;
  color: var(--mba-muted);
  font-style: italic;
}
.mba-boris-viz {
  position: relative;
  min-height: 420px;
  border-radius: 18px;
  background: var(--mba-surface);
  border: 1px solid var(--mba-border);
  overflow: hidden;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.8);
}
.mba-boris-viz canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 420px;
}
.mba-boris-legend {
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: 10px;
  display: flex;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
  pointer-events: none;
}
.mba-boris-legend span {
  font-size: 11px;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 999px;
  background: rgba(255,255,255,0.92);
  border: 1px solid var(--mba-border);
  color: #475569;
}
@media (max-width: 1023px) {
  .mba-boris-card { grid-template-columns: 1fr; padding: 28px 24px; }
  .mba-boris-viz { min-height: 380px; }
  .mba-boris-viz canvas { min-height: 380px; }
}
@media (max-width: 767px) {
  .mba-boris-block { margin: 36px 0 44px; }
  .mba-boris-card { padding: 22px 18px; gap: 22px; }
  .mba-boris-viz { min-height: 340px; }
  .mba-boris-viz canvas { min-height: 340px; }
}
</style>

<div class="mba-boris-card reveal">
  <div class="mba-boris-copy">
    <span class="mba-boris-eyebrow">Неделя AI-агентов · 2–3 июня 2026</span>
    <h3 class="mba-boris-kicker" id="mba-boris-kicker">Три релиза — три аудитории: кому нужен Meta Business Agent</h3>
    <p class="mba-boris-lead">Microsoft Scout и Salesforce Coworker вышли на день раньше Meta — но решают <strong>другие задачи</strong>. Для салона, магазина или сервиса нужен агент <em>на стороне клиента</em> в мессенджере, а не корпоративный autopilot.</p>
    <ul class="mba-boris-thesis">
      <li><strong>Meta Business Agent</strong> — ответы клиентам в WhatsApp, Instagram DM, Messenger; каталог, запись, handoff.</li>
      <li><strong>Microsoft Scout</strong> — личный autopilot сотрудника в Teams, Outlook, SharePoint (M365).</li>
      <li><strong>Agentforce Coworker</strong> — AI-teammate в CRM Salesforce для enterprise-поиска и действий.</li>
    </ul>
    <div class="mba-boris-pills">
      <span class="mba-boris-pill is-meta">SMB → Meta-класс</span>
      <span class="mba-boris-pill">Enterprise CRM → Coworker</span>
      <span class="mba-boris-pill">Сотрудник M365 → Scout</span>
    </div>
    <p class="mba-boris-bridge">Дальше разберём, как такой customer-facing агент работает в каналах Meta — и как повторить логику на Telegram.</p>
  </div>
  <div class="mba-boris-viz" role="img" aria-label="Интерактивное сравнение Meta Business Agent, Microsoft Scout и Salesforce Agentforce Coworker">
    <canvas id="mba-boris-agent-compare-canvas" width="640" height="420"></canvas>
    <div class="mba-boris-legend" aria-hidden="true">
      <span id="mba-boris-legend-label">Подсветка: Meta — клиент в мессенджере</span>
    </div>
  </div>
</div></section>
  </div>
</section>

<section class="ym-section" id="how-agent-works">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Как AI-агент работает в WhatsApp, Instagram и Messenger</h2>
    <div class="reveal">
      <p>Meta Business Agent доступен <strong>глобально в WhatsApp Business</strong> и расширяется на <strong>Instagram DMs</strong>; также работает в <strong>Messenger</strong> (TechCrunch, 3 июня 2026).</p>
      <p><strong>Хронология выхода:</strong></p>
      <ul class="ym-list">
        <li><strong>Октябрь–ноябрь 2025, Мексика:</strong> первый rollout «Business AI» в WhatsApp Business app.</li>
        <li><strong>Май 2026, Индия:</strong> Business AI для SMB на всех индийских языках, без кода.</li>
        <li><strong>3 июня 2026:</strong> переименование в <strong>Meta Business Agent</strong>, глобальный платный релиз.</li>
      </ul>
      <h3 class="ym-h3">Ответы на вопросы и рекомендации товаров</h3>
      <ul class="ym-list">
        <li>ответы на вопросы клиентов по товарам и услугам;</li>
        <li><strong>рекомендации товаров</strong> из каталога;</li>
        <li><strong>квалификация лидов</strong> — сбор контактов, бюджета, потребности;</li>
        <li><strong>эскалация на человека</strong>, когда AI не уверен или клиент просит оператора.</li>
      </ul>
      <p>В тесте Meta добавила <strong>ежедневные брифинги</strong> по ночным чатам — владелец утром видит, что спрашивали клиенты.</p>
      <h3 class="ym-h3">Запись, каталог и сценарии продаж</h3>
      <p>Мексиканский пилот показал минимальный порог входа: <strong>один товар в каталоге</strong> и настройка в Tools → Business AI.</p>
      <ol class="ym-list">
        <li>Клиент пишет в WhatsApp или <strong>чат бот instagram для бизнеса</strong> (DM).</li>
        <li>Агент уточняет запрос, показывает релевантные позиции из каталога.</li>
        <li>Предлагает запись на услугу или оформление заказа.</li>
        <li>При сложном кейсе — handoff на менеджера с историей диалога.</li>
      </ol>
      <p>Meta показала эталон этого потока. Nero Network <strong>reverse-engineers</strong> ту же логику на <strong>Telegram + WABA + AmoCRM/Bitrix24</strong>.</p>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="integrations">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Интеграции: Shopify, Zendesk, CRM и сторонние данные</h2>
    <div class="reveal">
      <p>Для крупных клиентов Meta строит <strong>Meta Business Agent Platform</strong> с подключением <strong>Shopify, Zendesk, Shopee</strong> (CNBC, 3 июня 2026).</p>
      <p><strong>Важная оговорка:</strong> платформа для enterprise <strong>ещё строится</strong>. Интеграции <strong>заявлены</strong>, но не «из коробки для всех» на 3 июня 2026.</p>
      <ul class="ym-list">
        <li><strong>CRM чат бот:</strong> агент должен писать лиды, сделки и теги в CRM.</li>
        <li><strong>Shopify whatsapp ai:</strong> синхронизация остатков, цен и статусов заказа.</li>
        <li><strong>Zendesk ai агент:</strong> доступ к тикетам, SLA, базе решений.</li>
      </ul>
      <p>Российский SMB часто собирает стек иначе: <strong>AmoCRM, Bitrix24, МойСклад, YClients</strong> + Telegram-бот или <strong>whatsapp business api чат бот</strong> через официального BSP.</p>
      <div class="ym-callout"><p><strong>Коротко:</strong> интеграции — условие, при котором <strong>нейросеть для обработки заявок</strong> не превращается в генератор галлюцинаций о ценах и наличии.</p></div>
    </div>
  </div>
</section>

<section class="ym-section" id="pricing">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Сколько стоит Meta Business Agent и кому подходит</h2>
    <div class="reveal">
      <p><strong>SMB с WhatsApp Business app:</strong> агент в Premium-подписке ($5–15/мес.) или <strong>Meta One Advanced ($49.99/мес.)</strong> в тестовых странах.</p>
      <p><strong>Enterprise на WABA:</strong> consumption-based pricing по токенам + per-message тарификация template-сообщений с 1 июля 2025.</p>
      <div class="ym-grid-2-cards reveal delay-100">
        <div class="ym-card">
          <h3>Кому подходит «из коробки»</h3>
          <ul class="ym-list">
            <li>бизнес в странах с полным доступом к WhatsApp Business Premium;</li>
            <li>каталог уже в Meta Business Suite;</li>
            <li>SMB в экосистеме Meta без кастомных CRM.</li>
          </ul>
        </div>
        <div class="ym-card">
          <h3>Кому нужен кастомный аналог</h3>
          <ul class="ym-list">
            <li>российский SMB с рисками ограничения WhatsApp;</li>
            <li>нестандартные интеграции (Bitrix24, YClients);</li>
            <li>прозрачный фиксированный бюджет на <strong>внедрение чат бота</strong>.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="russia-alternative">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Как повторить такого агента для SMB в России (Telegram, WhatsApp Business API)</h2>
    <div class="reveal">
      <p>Meta в Q1 2026 указала на <strong>restriction on access to WhatsApp in Russia</strong>. <strong>Стратегия для РФ:</strong> Telegram first как primary channel, WhatsApp — optional в omnichannel-стеке.</p>
      <h3 class="ym-h3">WhatsApp Business API и ограничения в РФ</h3>
      <p><strong>WhatsApp Business API чат бот</strong> — compliant-способ масштабной автоматизации. С 15 января 2026 general-purpose AI на WABA запрещены; task-specific агенты — разрешены.</p>
      <ul class="ym-list">
        <li>подключение через официального BSP;</li>
        <li>template-сообщения по категориям;</li>
        <li>task-specific AI-агент на ваших данных;</li>
        <li>webhook в CRM для лидов и эскалации.</li>
      </ul>
      <h3 class="ym-h3">Telegram-бот как альтернатива</h3>
      <p>Функциональный паритет достижим на Telegram: каталог, свободный диалог, запись, handoff, хостинг в РФ.</p>
      <p><strong>Playbook «Meta недоступен → Telegram first»:</strong></p>
      <ol class="ym-list">
        <li>Каталог и FAQ в базе знаний агента.</li>
        <li>Telegram-бот как основной канал + опционально WABA.</li>
        <li>Интеграция AmoCRM/Bitrix24: лиды, сделки, теги.</li>
        <li>Правила эскалации: когда AI зовёт человека.</li>
        <li>Утренний briefing для владельца.</li>
      </ol>
    </div>
    <div class="ym-card reveal" style="text-align:center;padding:40px 32px;margin:48px 0;border:2px solid var(--ym-primary);box-shadow:var(--ym-shadow-lg);">
  <h3 style="font-size:24px;margin-bottom:16px;">Соберём AI-агента уровня Meta Business Agent — под ваш бизнес</h3>
  <p style="font-size:16px;line-height:1.6;margin-bottom:24px;max-width:640px;margin-left:auto;margin-right:auto;">Telegram first, WhatsApp Business API, AmoCRM/Bitrix24: каталог → ответ → запись → handoff → CRM. Прозрачный расчёт TCO до запуска, task-specific архитектура и compliance для РФ.</p>
  <div class="ym-btn-group">
    <a href="<?php echo esc_url($primary_cta_url); ?>" class="ym-btn ym-btn-primary" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_html($primary_cta_label); ?> — заказать AI-агента для мессенджеров"><span><?php echo esc_html($primary_cta_label); ?></span></a>
  </div>
</div>
  </div>
</section>

<section class="ym-section" id="implementation">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Внедрение AI-агента: этапы, сроки, типичные ошибки</h2>
    <div class="reveal">
      <p><strong>Внедрение чат бота</strong> уровня Meta Business Agent — проект на 2–6 недель для SMB.</p>
      <div class="ym-timeline">
        <div class="ym-step"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>Аудит каналов (3–5 дней)</h3><p>Где клиенты пишут сегодня? Какой канал — primary?</p></div></div>
        <div class="ym-step"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>База знаний и каталог (5–10 дней)</h3><p>≥1 товар/услуга + FAQ по топ-20 вопросам.</p></div></div>
        <div class="ym-step"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>Сценарии и handoff (3–5 дней)</h3><p>Когда агент продаёт, записывает, передаёт оператору.</p></div></div>
        <div class="ym-step"><div class="ym-step-num">4</div><div class="ym-step-content"><h3>Интеграции CRM (5–10 дней)</h3><p>Webhook: новый лид → CRM, эскалация → Telegram.</p></div></div>
        <div class="ym-step"><div class="ym-step-num">5</div><div class="ym-step-content"><h3>Пилот и донастройка (7–14 дней)</h3><p>20–50 реальных диалогов, разбор ошибок.</p></div></div>
      </div>
      <div class="ym-table-wrap">
        <table class="ym-table">
          <thead><tr><th>Ошибка</th><th>Последствие</th><th>Как избежать</th></tr></thead>
          <tbody>
            <tr><td>Запуск без каталога</td><td>Неверные цены и наличие</td><td>Сначала данные, потом AI</td></tr>
            <tr><td>Нет эскалации</td><td>Раздражённые клиенты</td><td>Жёсткие триггеры handoff</td></tr>
            <tr><td>General-purpose AI на WABA</td><td>Блокировка номера</td><td>Task-specific агент</td></tr>
            <tr><td>Игнор 152-ФЗ</td><td>Штрафы, репутация</td><td>Хостинг в РФ</td></tr>
            <tr><td>Ожидание «как Meta за $5»</td><td>Разочарование в TCO</td><td>Прозрачный расчёт до запуска</td></tr>
          </tbody>
        </table>
      </div>
      <p>Nero Network ведёт <strong>внедрение чат бота</strong> под ключ: от аудита до пилота с метриками.</p>
    </div>
    <div class="ym-card reveal" style="padding:32px;margin:48px 0;background:linear-gradient(135deg,var(--ym-surface) 0%,#f1f5f9 100%);">
  <h3 style="font-size:20px;margin-bottom:12px;">Хотите разобраться во внедрении AI-агентов сами?</h3>
  <p style="font-size:15px;line-height:1.6;margin-bottom:20px;">Пошаговые материалы по автоматизации переписки, настройке handoff и интеграциям с CRM — в нашем обучающем канале. Полезно перед запуском пилота или параллельно с проектом под ключ.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;">
    <a href="<?php echo esc_url($secondary_cta_url); ?>" class="ym-btn ym-btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_html($secondary_cta_label); ?>"><span><?php echo esc_html($secondary_cta_label); ?></span></a>
  </div>
</div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="risks">
  <div class="ym-container ym-content-narrow">
    <h2 class="ym-section-title reveal">Риски: качество ответов, эскалация на человека, данные клиентов</h2>
    <div class="reveal">
      <p><strong>Качество ответов.</strong> AI-агент не заменяет экспертизу в нестандартных кейсах. Правило: агент отвечает на 70–80% типовых запросов; остальное — оператор с контекстом.</p>
      <p><strong>Эскалация на оператора.</strong> Триггеры: негатив, запрос «человек», низкая уверенность модели, сумма сделки выше порога.</p>
      <p><strong>Данные клиентов.</strong> 152-ФЗ, хранение в РФ, запрет на обучение модели на ваших диалогах без согласия.</p>
      <p><strong>Репутационный риск WhatsApp в РФ.</strong> Диверсификация на Telegram снижает зависимость от одного канала.</p>
      <div class="ym-callout"><p><strong>Итог:</strong> риски управляемы при task-specific архитектуре, handoff и compliance-by-design.</p></div>
    </div>
  </div>
</section>

<section class="ym-section" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по Meta Business Agent и AI-агентам для бизнеса</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;font-size:18px;">Вопросы</h3>
        <ul class="ym-faq-list">
          <li><a href="#faq-what">Что такое MBA?</a></li>
          <li><a href="#faq-price">Сколько стоит?</a></li>
          <li><a href="#faq-diff">Отличие от чат-бота</a></li>
          <li><a href="#faq-chatgpt">ChatGPT в WABA</a></li>
          <li><a href="#faq-russia">Доступен в России?</a></li>
          <li><a href="#faq-repeat">Повторить без Meta One</a></li>
          <li><a href="#faq-integrations">Интеграции</a></li>
          <li><a href="#faq-pricing-enterprise">Consumption pricing</a></li>
          <li><a href="#faq-telegram">Telegram или WhatsApp</a></li>
          <li><a href="#faq-timeline">Сроки внедрения</a></li>
          <li><a href="#faq-compare">MBA vs Scout vs Coworker</a></li>
          <li><a href="#faq-nero">Как поможет Nero Network</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content">
        <div class="ym-faq-item reveal" id="faq-what"><h3>Что такое Meta Business Agent?</h3><p>Платный AI-агент Meta для ответов клиентам в WhatsApp, Instagram DM и Messenger: вопросы, рекомендации товаров, запись, квалификация лидов, эскалация на человека. Глобальный релиз — 3 июня 2026.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-price"><h3>Сколько стоит Meta Business Agent?</h3><p>SMB: WhatsApp Business Premium ($5–15/мес.) или Meta One Advanced ($49.99/мес.). Enterprise: consumption-based pricing по токенам + per-message WABA.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-diff"><h3>Чем AI-агент отличается от чат-бота?</h3><p>Чат-бот — кнопки и ветки. AI-агент понимает свободный текст, использует каталог и CRM, квалифицирует лиды и передаёт сложные кейсы оператору.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-chatgpt"><h3>Можно ли использовать ChatGPT в WhatsApp Business API?</h3><p>С 15 января 2026 general-purpose AI chatbots на WABA запрещены. Разрешены task-specific боты: support, sales, bookings, notifications.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-russia"><h3>Доступен ли Meta Business Agent в России?</h3><p>Meta фиксировала restriction on access to WhatsApp in Russia. Практичнее собирать аналог на Telegram + WABA через BSP.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-repeat"><h3>Как повторить функции Meta Business Agent без Meta One?</h3><p>Каталог + AI-диалог + запись + handoff + CRM на Telegram и/или WhatsApp Business API. Nero Network собирает такой стек под ваш бизнес.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-integrations"><h3>Какие интеграции поддерживает Meta Business Agent Platform?</h3><p>Заявлены Shopify, Zendesk, Shopee; enterprise-платформа строится, на день релиза не «из коробки для всех».</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-pricing-enterprise"><h3>Что такое consumption-based pricing для enterprise?</h3><p>Оплата по токенам использования AI-агента на WhatsApp Business Platform, аналогично per-message модели API.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-telegram"><h3>Telegram или WhatsApp для AI-агента в РФ?</h3><p>Telegram — primary из-за доступности и интеграций с AmoCRM/Bitrix24. WhatsApp — optional через официальный WABA.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-timeline"><h3>Сколько длится внедрение AI-агента для SMB?</h3><p>Ориентир 2–6 недель: аудит, база знаний, сценарии, CRM, пилот.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-compare"><h3>Meta Business Agent vs Microsoft Scout vs Salesforce Coworker?</h3><p>Meta — агент для клиентов в мессенджерах. Scout — autopilot для сотрудника в M365. Coworker — AI-teammate в CRM для enterprise.</p></div>
        <div class="ym-faq-item reveal delay-100" id="faq-nero"><h3>Как Nero Network может помочь?</h3><p>Meta задала эталон customer-facing AI в мессенджерах. Nero Network reverse-engineers эту модель: Telegram + WhatsApp Business API + AmoCRM/Bitrix24, прозрачный TCO и compliance для РФ.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="conclusion">
  <div class="ym-container ym-content-narrow">
    <div class="ym-card reveal" style="padding:48px;">
      <h2 class="ym-section-title" style="margin-bottom:20px;">Заключение</h2>
      <p style="font-size:17px;line-height:1.7;">Meta Business Agent — watershed-момент: AI-агент для клиентского сервиса стал платным массовым продуктом. Для российского бизнеса прямой доступ ограничен, но <strong>product-модель</strong> ясна: always-on персонализированный сервис в мессенджере с каталогом, записью и умной эскалацией. Meta показала эталон — <strong>Nero Network соберёт аналог для вашего бизнеса</strong> на Telegram, WhatsApp Business API и вашей CRM.</p>
    </div>
  </div>
</section>

</main>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("mba-inbox-hero-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    const wrap = canvas.parentElement;
    if (!wrap) return;
    canvas.width = wrap.clientWidth || window.innerWidth;
    canvas.height = wrap.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw / 2;
    cy = ch / 2 - 20;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 960, ch / 720) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    wa: "#25d366",
    ig: "#e1306c",
    tg: "#0088cc",
    coreBg: "#ffffff",
    coreRing: "#cbd5e1",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    crmCard: "#eef2ff",
    replyGreen: "#dcfce7"
  };

  function drawPolyRound(ctx, x, y, w, h, radius, fill, stroke) {
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, radius);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) { ctx.lineWidth = 2; ctx.strokeStyle = stroke; ctx.stroke(); }
  }

  function drawArcPath(ctx, x1, y1, cxp, cyp, x2, y2, color, dashOffset) {
    ctx.save();
    ctx.strokeStyle = color;
    ctx.lineWidth = 2;
    ctx.setLineDash([6, 10]);
    ctx.lineDashOffset = -dashOffset;
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.quadraticCurveTo(cxp, cyp, x2, y2);
    ctx.stroke();
    ctx.restore();
  }

  class ArcMessageFlow {
    constructor() {
      this.channels = [
        { id: "wa", color: C.wa, sx: -280, sy: -120, cxp: -80, cyp: -180, label: "WA" },
        { id: "ig", color: C.ig, sx: 280, sy: -100, cxp: 90, cyp: -190, label: "IG" },
        { id: "tg", color: C.tg, sx: -20, sy: 200, cxp: -20, cyp: 60, label: "TG" }
      ];
    }
    draw(ctx, prg) {
      const dash = frame * 0.6;
      this.channels.forEach((ch, i) => {
        drawArcPath(ctx, ch.sx, ch.sy, ch.cxp, ch.cyp, 0, -30, ch.color, dash + i * 20);
        const t = ((prg * 0.8 + i * 55) % 240) / 240;
        const mt = Math.min(t * 1.4, 1);
        const px = ch.sx + (0 - ch.sx) * mt * 0.85 + (ch.cxp - ch.sx) * Math.sin(mt * Math.PI) * 0.15;
        const py = ch.sy + (-30 - ch.sy) * mt * 0.85 + (ch.cyp - ch.sy) * Math.sin(mt * Math.PI) * 0.15;
        if (mt < 0.95) {
          drawPolyRound(ctx, px - 8, py - 8, 16, 16, 4, ch.color, C.outline);
          ctx.fillStyle = "#fff";
          ctx.font = "bold 7px Inter, sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("?", px, py + 2);
        }
      });
    }
  }

  class ChannelOrb {
    constructor(angle, color, label) {
      this.angle = angle;
      this.color = color;
      this.label = label;
      this.orbitR = 95;
    }
    draw(ctx, prg) {
      const wobble = Math.sin(frame * 0.04 + this.angle) * 4;
      const a = this.angle + frame * 0.008;
      const ox = Math.cos(a) * (this.orbitR + wobble);
      const oy = Math.sin(a) * (this.orbitR * 0.55 + wobble * 0.5) - 30;
      ctx.save();
      ctx.translate(ox, oy);
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(0, 0, 14, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();
      ctx.fillStyle = "#fff";
      ctx.font = "bold 8px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      ctx.fillText(this.label, 0, 1);
      if (prg > 60 && prg < 120) {
        ctx.globalAlpha = 0.35 + Math.sin(frame * 0.1) * 0.15;
        ctx.beginPath();
        ctx.arc(0, 0, 22, 0, Math.PI * 2);
        ctx.strokeStyle = this.color;
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.globalAlpha = 1;
      }
      ctx.restore();
    }
  }

  class OmnichannelAiCore {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.handoffSlide = 0;
      this.briefingPulse = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      ctx.lineJoin = "round";

      drawPolyRound(ctx, this.x - 70, this.y - 55, 140, 110, 16, C.coreBg, C.outline);
      drawPolyRound(ctx, this.x - 62, this.y - 48, 124, 22, [8, 8, 0, 0], "#f1f5f9", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("AI INBOX CORE", this.x, this.y - 36);

      if (prg >= 60 && prg < 120) {
        drawPolyRound(ctx, this.x - 50, this.y - 18, 100, 14, 3, C.replyGreen, C.outline);
        drawPolyRound(ctx, this.x - 50, this.y, 45, 28, 4, "#dbeafe", C.outline);
        drawPolyRound(ctx, this.x + 5, this.y, 45, 28, 4, "#fce7f3", C.outline);
        ctx.font = "7px Inter, sans-serif";
        ctx.fillText("каталог", this.x - 28, this.y + 16);
        ctx.fillText("FAQ", this.x + 28, this.y + 16);
      }

      if (prg >= 120 && prg < 170) {
        const out = (prg - 120) / 50;
        [-1, 1].forEach((dir, i) => {
          const rx = this.x + dir * (40 + out * 90);
          const ry = this.y + 20 - out * 30;
          drawPolyRound(ctx, rx - 28, ry - 10, 56, 20, 6, C.replyGreen, C.outline);
          ctx.font = "bold 7px Inter, sans-serif";
          ctx.fillText(i === 0 ? "Ответ WA" : "Ответ IG", rx, ry + 2);
        });
      }

      if (prg >= 170) {
        const h = (prg - 170) / 70;
        this.handoffSlide = Math.min(h * 120, 120);
        this.briefingPulse = Math.sin(frame * 0.12) * 0.3 + 0.7;

        drawPolyRound(ctx, this.x + 75 + this.handoffSlide, this.y - 10, 52, 36, 6, C.crmCard, C.outline);
        ctx.font = "bold 7px Inter, sans-serif";
        ctx.textAlign = "left";
        ctx.fillText("CRM лид", this.x + 82 + this.handoffSlide, this.y + 2);
        ctx.fillText("handoff ✓", this.x + 82 + this.handoffSlide, this.y + 14);

        ctx.save();
        ctx.globalAlpha = this.briefingPulse;
        drawPolyRound(ctx, this.x - 58, this.y + 38, 116, 18, 6, "#fef3c7", C.outline);
        ctx.globalAlpha = 1;
        ctx.textAlign = "center";
        ctx.fillText("☀ briefing: 12 ночных чатов", this.x, this.y + 50);
      }

      return prg;
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs) {
      this.x = x; this.y = y; this.baseX = x; this.baseY = y;
      this.color = color; this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
      this.hitAnimation = 0;
    }

    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.04) % 240;
      let isMoving = false;
      let faceDir = 1;
      let carryType = null;
      const targetX = -20 + (this.stepTrig % 3) * 25;
      const targetY = -80 - (this.stepTrig % 2) * 15;

      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const local = prg - this.stepTrig;
        if (local < 12) {
          isMoving = true; faceDir = 1; carryType = this.color;
          const t = local / 12;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (local < 16) {
          this.x = targetX; this.y = targetY;
        } else {
          isMoving = true; faceDir = -1;
          const t = (local - 16) / 12;
          this.x = targetX + (this.baseX - targetX) * t;
          this.y = targetY + (this.baseY - targetY) * t;
        }
      } else {
        this.x = this.baseX; this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 && prg < this.stepTrig ? this.color : null;
      }

      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);

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
      ctx.beginPath(); ctx.arc(hx, hy, 12, 0, Math.PI * 2); ctx.fill();
      ctx.lineWidth = 2; ctx.strokeStyle = C.outline; ctx.stroke();
      ctx.save();
      ctx.scale(faceDir, 1);
      ctx.fillStyle = "#fff";
      ctx.beginPath(); ctx.arc(hx + 4, hy - 2, 4, 0, Math.PI * 2); ctx.fill();
      ctx.beginPath(); ctx.arc(hx - 4, hy - 2, 4, 0, Math.PI * 2); ctx.fill();
      ctx.fillStyle = C.outline;
      ctx.beginPath(); ctx.arc(hx + 5, hy - 2, 2, 0, Math.PI * 2); ctx.fill();
      ctx.beginPath(); ctx.arc(hx - 3, hy - 2, 2, 0, Math.PI * 2); ctx.fill();
      if (this.role === "1_architect") {
        ctx.strokeStyle = C.outline; ctx.lineWidth = 1;
        ctx.strokeRect(hx + 1, hy - 5, 6, 6); ctx.strokeRect(hx - 7, hy - 5, 6, 6);
      } else if (this.role === "2_seo") {
        drawPolyRound(ctx, hx - 12, hy - 14, 24, 8, [6, 6, 0, 0], C.outline, null);
      } else if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.beginPath(); ctx.moveTo(hx - 10, hy - 8); ctx.lineTo(hx - 14, hy - 18); ctx.lineTo(hx + 10, hy - 8); ctx.fill();
      } else if (this.role === "4_designer") {
        drawPolyRound(ctx, hx - 14, hy - 12, 28, 6, 3, "#f43f5e", C.outline);
      } else if (this.role === "5_deployer") {
        ctx.strokeStyle = C.outline; ctx.lineWidth = 2;
        ctx.beginPath(); ctx.arc(hx, hy, 14, Math.PI, Math.PI * 2); ctx.stroke();
      }
      ctx.restore();
      if (carryType) drawPolyRound(ctx, -20 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const arcFlow = new ArcMessageFlow();
  const aiCore = new OmnichannelAiCore(0, -30);
  entities.push(aiCore);
  entities.push(new ChannelOrb(0, C.wa, "WA"));
  entities.push(new ChannelOrb(2.1, C.ig, "IG"));
  entities.push(new ChannelOrb(4.2, C.tg, "TG"));
  entities.push(new Agent(-240, 130, C.agentYellow, "1_architect", 18, [
    "Сканирую WhatsApp...", "Какой канал primary?", "Omnichannel-карта готова", "Аудит DM Instagram"
  ]));
  entities.push(new Agent(-120, 160, C.agentGreen, "2_seo", 58, [
    "FAQ в RAG...", "Топ-20 вопросов клиентов", "База знаний загружена", "Не галлюцинируем цены!"
  ]));
  entities.push(new Agent(40, 150, C.agentBlue, "3_coder", 98, [
    "Webhook в AmoCRM", "Bitrix24 sync OK", "152-ФЗ: лог включён", "Task-specific, не ChatGPT-wrap"
  ]));
  entities.push(new Agent(160, 130, C.agentPink, "4_designer", 138, [
    "Handoff-кнопка UX", "Тон переписки SMB", "Reply-пузыри читаемы", "Эскалация на оператора"
  ]));
  entities.push(new Agent(240, 100, C.agentPurple, "5_deployer", 178, [
    "Telegram-бот на проде", "WABA template OK", "Пилот: 20 диалогов", "Briefing утром включён"
  ]));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function drawGridPulse(ctx) {
    const pulse = Math.sin(frame * 0.03) * 0.015 + 0.025;
    ctx.strokeStyle = `rgba(37, 211, 102, ${pulse})`;
    ctx.lineWidth = 1;
    for (let r = 60; r < 200; r += 35) {
      ctx.beginPath();
      ctx.ellipse(0, -30, r, r * 0.45, 0, 0, Math.PI * 2);
      ctx.stroke();
    }
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    drawGridPulse(ctx);
    const prg = (frame * 0.04) % 240;
    arcFlow.draw(ctx, prg);

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach(ent => ent.draw(ctx));

    if (prg >= 12 && prg < 12.08) createBubble(-240, 100, "1. Запрос из WhatsApp");
    if (prg >= 52 && prg < 52.08) createBubble(-120, 130, "2. FAQ + каталог");
    if (prg >= 92 && prg < 92.08) createBubble(40, 120, "3. CRM webhook");
    if (prg >= 132 && prg < 132.08) createBubble(160, 100, "4. Ответ клиенту");
    if (prg >= 172 && prg < 172.08) createBubble(240, 70, "5. Handoff → оператор");

    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    for (let i = bubbles.length - 1; i >= 0; i--) {
      const bub = bubbles[i];
      bub.life--;
      if (bub.life <= 0) { bubbles.splice(i, 1); continue; }
      let alpha = Math.min(1, bub.life / 30);
      if (bub.life > bub.maxLife - 10) alpha = (bub.maxLife - bub.life) / 10;
      ctx.globalAlpha = alpha;
      const tw = ctx.measureText(bub.text).width + 16;
      const th = 20;
      const by = bub.y - (bub.maxLife - bub.life) * 0.04;
      drawPolyRound(ctx, bub.x - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.outline;
      ctx.fillText(bub.text, bub.x, by - th / 2);
      ctx.globalAlpha = 1;
    }

    ctx.restore();
    requestAnimationFrame(engineloop);
  }

  document.fonts.ready.then(() => engineloop());
});
</script>

<script>
(function mbaBorisAgentCompareEngine() {
  var canvas = document.getElementById('mba-boris-agent-compare-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var legendEl = document.getElementById('mba-boris-legend-label');
  var frame = 0;
  var activeIdx = 0;
  var lastSwitch = 0;
  var SWITCH_MS = 3200;

  var agents = [
    {
      id: 'meta',
      name: 'Meta Business Agent',
      date: '3 июня',
      color: '#008069',
      light: '#ecfdf5',
      audience: 'Клиент в мессенджере',
      channel: 'WhatsApp · IG · Messenger',
      focus: 0.95,
      bars: [0.95, 0.15, 0.25],
      flow: true,
      legend: 'Meta — клиент в мессенджере'
    },
    {
      id: 'scout',
      name: 'Microsoft Scout',
      date: '2 июня',
      color: '#0078d4',
      light: '#eff6ff',
      audience: 'Сотрудник в M365',
      channel: 'Teams · Outlook · SharePoint',
      focus: 0.2,
      bars: [0.12, 0.92, 0.18],
      flow: false,
      legend: 'Scout — autopilot для сотрудника'
    },
    {
      id: 'coworker',
      name: 'Agentforce Coworker',
      date: '2 июня',
      color: '#00a1e0',
      light: '#ecfeff',
      audience: 'Enterprise CRM',
      channel: 'Salesforce · Slack · Teams',
      focus: 0.22,
      bars: [0.18, 0.2, 0.94],
      flow: false,
      legend: 'Coworker — AI-teammate в CRM'
    }
  ];

  var barLabels = ['Клиент', 'Сотрудник', 'CRM'];
  var particles = [];
  for (var p = 0; p < 8; p++) {
    particles.push({ t: Math.random(), speed: 0.003 + Math.random() * 0.004, lane: p % 3 });
  }

  function resize() {
    var wrap = canvas.parentElement;
    if (!wrap) return;
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var w = wrap.clientWidth;
    var h = Math.max(wrap.clientHeight, 340);
    canvas.width = Math.floor(w * dpr);
    canvas.height = Math.floor(h * dpr);
    canvas.style.width = w + 'px';
    canvas.style.height = h + 'px';
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function roundRect(x, y, w, h, r) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.lineTo(x + w - r, y); ctx.quadraticCurveTo(x + w, y, x + w, y + r); ctx.lineTo(x + w, y + h - r); ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h); ctx.lineTo(x + r, y + h); ctx.quadraticCurveTo(x, y + h, x, y + h - r); ctx.lineTo(x, y + r); ctx.quadraticCurveTo(x, y, x + r, y); }
    ctx.closePath();
  }

  function drawBar(x, y, w, h, val, color, highlight) {
    ctx.fillStyle = highlight ? '#e2e8f0' : '#f1f5f9';
    roundRect(x, y, w, h, 6);
    ctx.fill();
    var fillW = Math.max(4, w * val);
    var grad = ctx.createLinearGradient(x, y, x + fillW, y);
    grad.addColorStop(0, color);
    grad.addColorStop(1, color + 'cc');
    ctx.fillStyle = grad;
    roundRect(x, y, fillW, h, 6);
    ctx.fill();
    if (highlight) {
      ctx.strokeStyle = color;
      ctx.lineWidth = 2;
      roundRect(x, y, w, h, 6);
      ctx.stroke();
    }
  }

  function drawMetaFlow(cx, cy, cw, ch, pulse) {
    var nodes = [
      { label: 'Клиент', x: cx + 16, y: cy + ch - 52 },
      { label: 'AI-агент', x: cx + cw * 0.42, y: cy + ch - 52 },
      { label: 'Handoff', x: cx + cw * 0.68, y: cy + ch - 52 },
      { label: 'CRM', x: cx + cw - 56, y: cy + ch - 52 }
    ];
    ctx.strokeStyle = '#cbd5e1';
    ctx.lineWidth = 2;
    ctx.setLineDash([4, 4]);
    for (var i = 0; i < nodes.length - 1; i++) {
      ctx.beginPath();
      ctx.moveTo(nodes[i].x + 28, nodes[i].y + 10);
      ctx.lineTo(nodes[i + 1].x - 4, nodes[i + 1].y + 10);
      ctx.stroke();
    }
    ctx.setLineDash([]);
    particles.forEach(function(pt) {
      pt.t += pt.speed;
      if (pt.t > 1) pt.t = 0;
      var seg = pt.t * 3;
      var idx = Math.min(2, Math.floor(seg));
      var local = seg - idx;
      var a = nodes[idx];
      var b = nodes[idx + 1];
      var px = a.x + 14 + (b.x - a.x) * local;
      var py = a.y + 10 + Math.sin(frame * 0.05 + pt.lane) * 2;
      ctx.fillStyle = '#008069';
      ctx.beginPath();
      ctx.arc(px, py, 4 + pulse * 1.5, 0, Math.PI * 2);
      ctx.fill();
    });
    nodes.forEach(function(n, ni) {
      ctx.fillStyle = ni === 1 ? '#ecfdf5' : '#ffffff';
      roundRect(n.x, n.y, 52, 22, 8);
      ctx.fill();
      ctx.strokeStyle = '#008069';
      ctx.lineWidth = ni === 1 ? 2 : 1;
      roundRect(n.x, n.y, 52, 22, 8);
      ctx.stroke();
      ctx.fillStyle = '#0f172a';
      ctx.font = '600 9px Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.fillText(n.label, n.x + 26, n.y + 14);
    });
  }

  function draw() {
    var w = canvas.clientWidth;
    var h = canvas.clientHeight;
    ctx.clearRect(0, 0, w, h);

    var pad = 14;
    var colW = (w - pad * 2 - 20) / 3;
    var topY = 36;

    ctx.fillStyle = '#64748b';
    ctx.font = '600 10px Inter, system-ui, sans-serif';
    ctx.textAlign = 'left';
    ctx.fillText('Сравнение по роли агента', pad, 22);

    agents.forEach(function(ag, i) {
      var x = pad + i * (colW + 10);
      var isActive = i === activeIdx;
      var pulse = isActive ? 0.5 + 0.5 * Math.sin(frame * 0.08) : 0;

      ctx.fillStyle = isActive ? ag.light : '#ffffff';
      roundRect(x, topY, colW, h - topY - 58, 14);
      ctx.fill();
      ctx.strokeStyle = isActive ? ag.color : '#e2e8f0';
      ctx.lineWidth = isActive ? 2.5 : 1;
      roundRect(x, topY, colW, h - topY - 58, 14);
      ctx.stroke();

      ctx.fillStyle = ag.color;
      roundRect(x + 10, topY + 10, colW - 20, 4, 2);
      ctx.fill();

      ctx.fillStyle = '#0f172a';
      ctx.font = '700 11px Inter, system-ui, sans-serif';
      ctx.textAlign = 'left';
      var nameLines = ag.name.split(' ');
      ctx.fillText(nameLines.slice(0, 2).join(' '), x + 12, topY + 28);
      if (nameLines.length > 2) ctx.fillText(nameLines.slice(2).join(' '), x + 12, topY + 42);

      ctx.fillStyle = '#64748b';
      ctx.font = '500 9px Inter, system-ui, sans-serif';
      ctx.fillText(ag.date, x + 12, topY + 58);

      ctx.fillStyle = '#334155';
      ctx.font = '600 10px Inter, system-ui, sans-serif';
      ctx.fillText(ag.audience, x + 12, topY + 76, colW - 24);

      ctx.fillStyle = '#64748b';
      ctx.font = '500 9px Inter, system-ui, sans-serif';
      var chLines = ag.channel.split(' · ');
      ctx.fillText(chLines[0], x + 12, topY + 92);
      if (chLines[1]) ctx.fillText(chLines.slice(1).join(' · '), x + 12, topY + 104);

      var barX = x + 12;
      var barW = colW - 24;
      var barH = 10;
      var barStart = topY + 118;
      barLabels.forEach(function(lbl, bi) {
        ctx.fillStyle = '#94a3b8';
        ctx.font = '500 8px Inter, system-ui, sans-serif';
        ctx.fillText(lbl, barX, barStart + bi * 22 - 2);
        var animVal = ag.bars[bi] * (0.88 + 0.12 * Math.sin(frame * 0.04 + bi + i));
        drawBar(barX + 52, barStart + bi * 22 - 8, barW - 52, barH, animVal, ag.color, isActive && bi === (i === 0 ? 0 : i === 1 ? 1 : 2));
      });

      if (ag.flow && isActive) {
        drawMetaFlow(x + 4, topY + 168, colW - 8, h - topY - 230, pulse);
      } else if (ag.flow) {
        ctx.fillStyle = '#94a3b8';
        ctx.font = '500 9px Inter, system-ui, sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText('каталог → ответ → handoff', x + colW / 2, topY + h - topY - 78);
      }

      if (isActive) {
        ctx.fillStyle = ag.color;
        ctx.font = '700 9px Inter, system-ui, sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText('★ для SMB', x + colW / 2, topY + h - topY - 62);
      }
    });

    frame++;
    requestAnimationFrame(draw);
  }

  function tickSwitch() {
    var now = Date.now();
    if (now - lastSwitch > SWITCH_MS) {
      activeIdx = (activeIdx + 1) % agents.length;
      lastSwitch = now;
      if (legendEl) legendEl.textContent = 'Подсветка: ' + agents[activeIdx].legend;
    }
    requestAnimationFrame(tickSwitch);
  }

  window.addEventListener('resize', resize);
  resize();
  lastSwitch = Date.now();
  if (legendEl) legendEl.textContent = 'Подсветка: ' + agents[0].legend;
  draw();
  tickSwitch();
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, { root: null, rootMargin: '0px', threshold: 0.15 });
    revealElements.forEach(el => revealObserver.observe(el));
});
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Meta Business Agent: AI-агент для WhatsApp и Instagram — что это значит для вашего бизнеса",
      "description": "Meta Business Agent — платный AI-агент для WhatsApp и Instagram. Разбираем функции, цены, интеграции и как повторить автоматизацию переписки для SMB в России.",
      "datePublished": "2026-06-03",
      "author": {
        "@type": "Organization",
        "name": "Nero Network"
      },
      "keywords": "meta business agent, ai агент для бизнеса, чат бот whatsapp, автоматизация переписки"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Что такое Meta Business Agent?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Платный AI-агент Meta для ответов клиентам в WhatsApp, Instagram DM и Messenger."
          }
        },
        {
          "@type": "Question",
          "name": "Сколько стоит Meta Business Agent?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "SMB: WhatsApp Business Premium ($5–15/мес.) или Meta One Advanced ($49.99/мес.). Enterprise: consumption-based pricing."
          }
        },
        {
          "@type": "Question",
          "name": "Чем AI-агент отличается от чат-бота?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "AI-агент понимает свободный текст, использует каталог и CRM, квалифицирует лиды и передаёт сложные кейсы оператору."
          }
        },
        {
          "@type": "Question",
          "name": "Доступен ли Meta Business Agent в России?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Прямой доступ ограничен; практичнее собирать аналог на Telegram + WABA через BSP."
          }
        }
      ]
    },
    {
      "@type": "SoftwareApplication",
      "name": "Meta Business Agent",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "WhatsApp, Instagram, Messenger",
      "offers": {
        "@type": "Offer",
        "price": "49.99",
        "priceCurrency": "USD"
      }
    }
  ]
}
</script>


<?php
get_footer();
?>
