<?php
/**
 * Template Name: GigaCowork — ИИ-агенты без программистов
 * Description: Лонгрид Nero Network — GigaCowork, MCP, аналог вне экосистемы Сбера
 */

$page_seo_title = 'GigaCowork Сбера: ИИ-агенты для бизнеса без кода — аналог';
$page_seo_description = 'Разбор GigaCowork: агенты по регламентам без программистов, MCP к CRM и ERP, метрики пилота Сбера. Как внедрить аналог вне экосистемы — Make, n8n, консалтинг Nero Network.';

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
 *   `.sber-gigacowork-ii-agenty-bez-razrabotchikov-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #21a038;
    --ym-accent: #2563eb;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(33, 160, 56, 0.15);
}

.sber-gigacowork-ii-agenty-bez-razrabotchikov-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h1,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h2,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h3,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h4,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h5,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page p,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page li,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page strong,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page pre, .sber-gigacowork-ii-agenty-bez-razrabotchikov-page code {
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
    background: rgba(33, 160, 56, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(33, 160, 56, 0.2);
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
    box-shadow: 0 5px 15px rgba(255,0,0,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(33, 160, 56, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(33, 160, 56, 0.5);
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
    border-color: rgba(33, 160, 56, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(33, 160, 56, 0.05);
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
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-article-body {
  max-width: 900px;
  margin: 0 auto;
  text-align: left !important;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-article-body p,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-article-body li {
  text-align: left !important;
  line-height: 1.7;
  font-size: 17px;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-section {
  padding: 56px 0 32px !important;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
  gap: 32px 40px;
  align-items: start;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 20px;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-lead,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-sub {
  text-align: left !important;
  margin: 0 0 14px;
  font-size: 17px;
  line-height: 1.65;
  color: var(--ym-text) !important;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 14px;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-chips span {
  padding: 6px 12px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-toc {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  margin-top: 40px;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-toc-link {
  padding: 10px 16px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
  text-decoration: none;
  transition: border-color 0.2s, box-shadow 0.2s;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-toc-link:hover {
  border-color: var(--ym-primary);
  box-shadow: var(--ym-shadow-sm);
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-table-wrap {
  overflow-x: auto;
  margin: 24px 0;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-table th,
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-table td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left !important;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-table th {
  background: var(--ym-surface);
  font-weight: 700;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-h3 {
  margin: 28px 0 12px;
  font-size: 1.25rem;
  font-weight: 700;
}
.sber-gigacowork-ii-agenty-bez-razrabotchikov-page .ym-cta-card {
  margin: 32px auto;
  max-width: 900px;
}
@media (max-width: 900px) {
  .sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-grid { grid-template-columns: 1fr; }
}
#gigacowork-orchestra-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}

</style>

<main id="primary" class="site-main sber-gigacowork-ii-agenty-bez-razrabotchikov-page" role="main" tabindex="-1">
<span id="main" class="screen-reader-text" tabindex="-1" aria-hidden="true"></span>

<section id="gigacowork-orchestra-hero" class="fullscreen-white-office gigacowork-hero-office" aria-label="Hero: GigaCowork и ИИ-агенты">
<style>
#gigacowork-orchestra-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
#gigacowork-orchestra-hero .hero-canvas-wrap {
  position: absolute;
  inset: 0;
  z-index: 1;
}
#gigacowork-orchestra-hero canvas#gigacowork-orchestra-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#gigacowork-orchestra-hero .hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 3;
  pointer-events: none;
}
#gigacowork-orchestra-hero .giant-seo {
  font-family: Inter, system-ui, sans-serif;
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
  pointer-events: auto;
}
#gigacowork-orchestra-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #059669, #7c3aed);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
#gigacowork-orchestra-hero .giant-seo-sub {
  font-family: Inter, system-ui, sans-serif;
  font-size: clamp(15px, 1.9vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 620px;
  pointer-events: auto;
}
#gigacowork-orchestra-hero .hero-cta-top {
  position: absolute;
  top: clamp(16px, 3vh, 40px);
  left: clamp(16px, 4vw, 56px);
  z-index: 4;
}
#gigacowork-orchestra-hero .telegram-button {
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
  font-family: Inter, system-ui, sans-serif;
  transition: transform 0.2s;
  pointer-events: auto;
}
#gigacowork-orchestra-hero .telegram-button:hover { transform: translateY(-2px); }
#gigacowork-orchestra-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(12px, 3vw, 48px);
  top: 50%;
  transform: translateY(-42%);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
  pointer-events: none;
}
#gigacowork-orchestra-hero .vl-ui-task {
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
  font-family: Inter, system-ui, sans-serif;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
  backdrop-filter: blur(6px);
}
#gigacowork-orchestra-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #10b981, #8b5cf6);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
#gigacowork-orchestra-hero .vl-ui-pill {
  position: absolute;
  top: clamp(16px, 3vh, 40px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  z-index: 3;
  pointer-events: none;
  max-width: 96vw;
}
#gigacowork-orchestra-hero .vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  font-family: Inter, system-ui, sans-serif;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
@media (max-width: 900px) {
  #gigacowork-orchestra-hero .vl-ui-tasks { display: none; }
  #gigacowork-orchestra-hero .hero-copy { bottom: 16px; }
}
</style>

<div class="hero-canvas-wrap">
  <canvas id="gigacowork-orchestra-canvas" aria-hidden="true"></canvas>
</div>

<div class="hero-cta-top">
  <a class="telegram-button" href="https://t.me/nero_network" rel="noopener noreferrer">Telegram Nero Network</a>
</div>

<div class="vl-ui-pill" aria-label="Теги темы">
  <span>No-code</span>
  <span>MCP</span>
  <span>152-ФЗ</span>
  <span>Make / n8n</span>
</div>

<div class="vl-ui-tasks" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Регламент → навык</div>
  <div class="vl-ui-task"><span>2</span> Роли и политики</div>
  <div class="vl-ui-task"><span>3</span> MCP-коннекторы</div>
  <div class="vl-ui-task"><span>4</span> Human-in-the-loop</div>
  <div class="vl-ui-task"><span>5</span> Синк CRM / ERP</div>
</div>

<div class="hero-copy">
  <h1 class="giant-seo">GigaCowork от Сбера: ИИ-агенты для бизнеса без программистов
    <span>как внедрить аналог у себя</span>
  </h1>
  <p class="giant-seo-sub">Переводим регламенты и рутину в команду ИИ-агентов с интеграцией в CRM, ERP и мессенджеры — без штата разработчиков и без привязки к экосистеме Сбера</p>
</div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("gigacowork-orchestra-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    const parent = canvas.parentElement;
    if (!parent) return;
    canvas.width = parent.clientWidth || window.innerWidth;
    canvas.height = parent.clientHeight || window.innerHeight;
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
    paper: "#f8fafc",
    paperEdge: "#cbd5e1",
    skill: "#a7f3d0",
    skillCore: "#10b981",
    mcp: "#38bdf8",
    hub: "#e0e7ff",
    hubStroke: "#6366f1",
    crm: "#fef3c7",
    erp: "#ddd6fe",
    ok: "#22c55e",
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

  function arcPoint(t) {
    const a = -Math.PI * 0.85 + t * Math.PI * 0.95;
    const r = 200;
    return { x: -220 + Math.cos(a) * r, y: 30 + Math.sin(a) * r * 0.55 };
  }

  class PolicyArchive {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.glow = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.035) % 240;
      if (prg < 40) this.glow = Math.sin(frame * 0.12) * 0.3 + 0.4;
      else this.glow *= 0.95;
      drawPolyRound(ctx, this.x, this.y, 90, 120, 6, "#fff", C.outline);
      for (let i = 0; i < 4; i++) {
        drawPolyRound(ctx, this.x + 10, this.y + 12 + i * 22, 70, 16, 2, i % 2 ? C.paper : "#e2e8f0", C.outline);
        ctx.fillStyle = C.outline;
        ctx.fillRect(this.x + 16, this.y + 18 + i * 22, 40, 2);
        ctx.fillRect(this.x + 16, this.y + 22 + i * 22, 28, 2);
      }
      ctx.font = "bold 9px Inter, sans-serif";
      ctx.fillStyle = C.outline;
      ctx.textAlign = "center";
      ctx.fillText("РЕГЛАМЕНТ", this.x + 45, this.y - 8);
      if (this.glow > 0.1) {
        ctx.save();
        ctx.globalAlpha = this.glow * 0.35;
        ctx.fillStyle = C.skillCore;
        ctx.beginPath();
        ctx.arc(this.x + 45, this.y + 60, 55, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }
    }
  }

  class RegulationFlowArc {
    constructor() {
      this.tokens = [0, 0.35, 0.7];
    }
    draw(ctx) {
      ctx.save();
      ctx.strokeStyle = "#94a3b8";
      ctx.lineWidth = 3;
      ctx.setLineDash([8, 10]);
      ctx.beginPath();
      for (let t = 0; t <= 1; t += 0.02) {
        const p = arcPoint(t);
        if (t === 0) ctx.moveTo(p.x, p.y);
        else ctx.lineTo(p.x, p.y);
      }
      ctx.stroke();
      ctx.setLineDash([]);
      const prg = (frame * 0.035) % 240;
      this.tokens.forEach((off, idx) => {
        let tt = (off + frame * 0.004) % 1;
        if (prg > 60 && prg < 130) tt = Math.min(1, tt + 0.002);
        const p = arcPoint(tt);
        const isCrystal = prg > 55 && idx === 1;
        drawPolyRound(ctx, p.x - 10, p.y - 8, 20, 16, 3, isCrystal ? C.skill : C.paper, C.outline);
        if (isCrystal) {
          ctx.fillStyle = C.skillCore;
          ctx.beginPath();
          ctx.moveTo(p.x, p.y - 12);
          ctx.lineTo(p.x + 8, p.y);
          ctx.lineTo(p.x, p.y + 10);
          ctx.lineTo(p.x - 8, p.y);
          ctx.fill();
        }
      });
      ctx.restore();
    }
  }

  class McpOrchestrationHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.syncPulse = 0;
      this.portPhase = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.035) % 240;
      if (prg > 155 && prg < 200) this.syncPulse = (prg - 155) / 45;
      else if (prg >= 200) this.syncPulse = 1 - (prg - 200) / 40;
      else this.syncPulse *= 0.92;
      this.portPhase = Math.min(1, Math.max(0, (prg - 95) / 50));

      const r = 52;
      ctx.save();
      ctx.translate(this.x, this.y);
      for (let i = 0; i < 6; i++) {
        const ang = (i / 6) * Math.PI * 2 - Math.PI / 2;
        const px = Math.cos(ang) * (r + 22);
        const py = Math.sin(ang) * (r + 22);
        const lit = this.portPhase > i / 6;
        drawPolyRound(ctx, px - 10, py - 8, 20, 16, 4, lit ? "#dbeafe" : "#f1f5f9", C.outline);
        if (lit) {
          ctx.fillStyle = C.mcp;
          ctx.beginPath();
          ctx.arc(px, py, 3 + Math.sin(frame * 0.2 + i) * 1.5, 0, Math.PI * 2);
          ctx.fill();
        }
        ctx.font = "bold 7px Inter, sans-serif";
        ctx.fillStyle = C.outline;
        ctx.textAlign = "center";
        ctx.fillText("MCP", px, py + 18);
      }
      drawPolyRound(ctx, -r, -r, r * 2, r * 2, 12, C.hub, C.hubStroke);
      ctx.font = "bold 11px Inter, sans-serif";
      ctx.fillStyle = C.outline;
      ctx.textAlign = "center";
      ctx.fillText("ОРКЕСТР", 0, -4);
      ctx.fillText("АГЕНТОВ", 0, 10);
      if (this.syncPulse > 0.05) {
        ctx.strokeStyle = C.mcp;
        ctx.lineWidth = 2;
        ctx.globalAlpha = 0.35 * (1 - this.syncPulse * 0.5);
        ctx.beginPath();
        ctx.arc(0, 0, r + 20 + this.syncPulse * 60, 0, Math.PI * 2);
        ctx.stroke();
        ctx.globalAlpha = 1;
      }
      const orbitN = 8;
      for (let o = 0; o < orbitN; o++) {
        const oa = frame * 0.04 + (o / orbitN) * Math.PI * 2;
        if (prg > 70 && prg < 160) {
          ctx.fillStyle = C.skillCore;
          ctx.globalAlpha = 0.5;
          ctx.beginPath();
          ctx.arc(Math.cos(oa) * (r + 8), Math.sin(oa) * (r + 8), 3, 0, Math.PI * 2);
          ctx.fill();
          ctx.globalAlpha = 1;
        }
      }
      ctx.restore();
    }
  }

  class CrmErpBridge {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.flash = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.035) % 240;
      if (prg > 168) this.flash = Math.min(1, this.flash + 0.08);
      else this.flash *= 0.9;
      drawPolyRound(ctx, this.x, this.y, 88, 56, 6, "#fff", C.outline);
      drawPolyRound(ctx, this.x + 6, this.y + 8, 36, 40, 4, C.crm, C.outline);
      drawPolyRound(ctx, this.x + 46, this.y + 8, 36, 40, 4, C.erp, C.outline);
      ctx.font = "bold 8px Inter, sans-serif";
      ctx.fillStyle = C.outline;
      ctx.textAlign = "center";
      ctx.fillText("CRM", this.x + 24, this.y + 30);
      ctx.fillText("ERP", this.x + 64, this.y + 30);
      if (this.flash > 0.2) {
        ctx.fillStyle = C.ok;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.fillText("синхронизация ✓", this.x + 44, this.y + 52);
        ctx.strokeStyle = C.ok;
        ctx.lineWidth = 2;
        ctx.globalAlpha = 0.4 * this.flash;
        ctx.beginPath();
        ctx.moveTo(this.x - 30, this.y + 28);
        ctx.lineTo(this.x - 80, this.y + 28);
        ctx.stroke();
        ctx.globalAlpha = 1;
      }
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
      const prg = (frame * 0.035) % 240;
      const hubX = 40;
      const hubY = -20;
      const roleOffset = { "1_architect": [-70, 40], "2_seo": [-40, -50], "3_coder": [30, -55], "4_designer": [55, 20], "5_deployer": [75, -10] };
      const off = roleOffset[this.role] || [0, 0];
      const targetX = hubX + off[0];
      const targetY = hubY + off[1];

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 11) {
          isMoving = true;
          faceDir = 1;
          carryType = this.stepTrig < 100 ? C.paper : C.skill;
          this.x = this.baseX + (targetX - this.baseX) * (local / 11);
          this.y = this.baseY + (targetY - this.baseY) * (local / 11);
        } else if (local < 16) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          this.x = targetX - (targetX - this.baseX) * ((local - 16) / 6);
          this.y = targetY - (targetY - this.baseY) * ((local - 16) / 6);
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 && prg < this.stepTrig ? C.skill : null;
      }

      if (!isMoving) {
        const tokens = [0, 0.35, 0.7].map((off) => arcPoint((off + frame * 0.004) % 1));
        tokens.forEach((p) => {
          if (Math.hypot(p.x - this.x, p.y - this.y) < 22) this.hitAnimation = Math.sin(frame * 0.25) * 6;
        });
        if (frame % 220 === 0 && Math.random() < 0.12) {
          createBubble(this.x, this.y - 22, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
        }
      } else {
        this.hitAnimation = 0;
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
        drawPolyRound(ctx, hx, hy - 8, 15, 3, 1, C.outline, null);
      } else if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.beginPath();
        ctx.moveTo(hx - 10, hy - 8);
        ctx.lineTo(hx - 14, hy - 18);
        ctx.lineTo(hx - 4, hy - 12);
        ctx.lineTo(hx, hy - 20);
        ctx.lineTo(hx + 4, hy - 12);
        ctx.lineTo(hx + 12, hy - 16);
        ctx.lineTo(hx + 10, hy - 8);
        ctx.fill();
        if (this.hitAnimation) {
          ctx.lineWidth = 2;
          ctx.strokeStyle = C.outline;
          ctx.beginPath();
          ctx.moveTo(12, 0);
          ctx.lineTo(22, -8 + this.hitAnimation);
          ctx.stroke();
          drawPolyRound(ctx, 18, -12 + this.hitAnimation, 10, 8, 2, C.mcp, C.outline);
        }
      } else if (this.role === "4_designer") {
        drawPolyRound(ctx, hx - 14, hy - 12, 28, 6, 3, "#f43f5e", C.outline);
        drawPolyRound(ctx, hx - 2, hy - 15, 4, 4, 2, C.outline, null);
      } else if (this.role === "5_deployer") {
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(hx, hy, 14, Math.PI, Math.PI * 2);
        ctx.stroke();
        drawPolyRound(ctx, hx - 16, hy - 2, 4, 8, 2, C.outline, null);
        drawPolyRound(ctx, hx + 12, hy - 2, 4, 8, 2, C.outline, null);
      }
      ctx.restore();
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const hub = new McpOrchestrationHub(30, -30);
  entities.push(new PolicyArchive(-280, -50));
  entities.push(new RegulationFlowArc());
  entities.push(hub);
  entities.push(new CrmErpBridge(200, -20));
  entities.push(new Agent(-300, 80, C.agentYellow, "1_architect", 18, ["Регламент → skill", "Роли в пространстве", "Чек-лист для агента", "Без кода — по тексту"]));
  entities.push(new Agent(-240, -90, C.agentGreen, "2_seo", 52, ["Интент CRM", "GEO: цифровой сотрудник", "LSI: MCP + ERP", "Метрики пилота"]));
  entities.push(new Agent(-120, 100, C.agentBlue, "3_coder", 98, ["Коннектор MCP", "RBAC и логи", "Human-in-the-loop", "152-ФЗ в контуре"]));
  entities.push(new Agent(40, 110, C.agentPink, "4_designer", 138, ["Окно согласования", "UX human-in-the-loop", "Онбординг отдела", "Панель этапов"]));
  entities.push(new Agent(120, -100, C.agentPurple, "5_deployer", 178, ["Синк с 1С", "Битрикс + Telegram", "Пилот 4–8 недель", "Make / n8n оркестр"]));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));

    const prg = (frame * 0.035) % 240;
    if (prg >= 12 && prg < 12.08) createBubble(-280, -70, "1. Регламент в архиве");
    if (prg >= 58 && prg < 58.08) createBubble(-180, 10, "2. Навык кристаллизуется");
    if (prg >= 102 && prg < 102.08) createBubble(-40, -40, "3. Агент у хаба");
    if (prg >= 128 && prg < 128.08) createBubble(30, -80, "4. MCP-порт открыт");
    if (prg >= 175 && prg < 175.08) createBubble(200, -50, "5. CRM · ERP синхронизированы");

    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.lineJoin = "round";
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
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      drawPolyRound(ctx, bx - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.bubbleBg;
      ctx.beginPath();
      ctx.moveTo(bx - 4, by);
      ctx.lineTo(bx + 4, by);
      ctx.lineTo(bx, by + 5);
      ctx.fill();
      ctx.stroke();
      ctx.fillStyle = C.outline;
      ctx.fillText(bub.text, bx, by - th / 2);
      ctx.globalAlpha = 1;
    }
    ctx.restore();
    requestAnimationFrame(engineloop);
  }

  document.fonts.ready.then(() => engineloop()).catch(() => engineloop());
});
</script>

<section class="ym-section sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-section reveal">
  <div class="ym-container">
    <div class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-grid">
      <div class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-text">
        <p class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-lead"><strong>Коротко:</strong> 19 мая 2026 Сбер открыл ранний доступ к <strong>GigaCowork</strong> — платформе, где <strong>корпоративные ИИ-агенты</strong> настраиваются по <strong>регламентам</strong> без штата разработчиков и подключаются к CRM, ERP и мессенджерам через <strong>MCP</strong>.</p>
        <p class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-sub">Ниже — разбор продукта, цифры пилотов с оговорками и пошаговая схема <strong>аналога вне экосистемы Сбера</strong> (Make, n8n, open-модели, внедрение под ваш стек).</p>
      </div>
      <div class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot"></span><span class="ym-mac-dot"></span><span class="ym-mac-dot"></span>
            <span style="margin-left:8px;font-size:11px;color:#94a3b8;">gigacowork-pipeline</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-command">$ регламент → skill_agent.md</div>
            <div class="ym-command">$ mcp connect --crm bitrix --erp 1c</div>
            <div class="ym-comment"># пилот: 4–8 нед · human-in-the-loop</div>
            <div class="ym-command">$ orchestrator run --make|n8n</div>
          </div>
        </div>
        <div class="sber-gigacowork-ii-agenty-bez-razrabotchikov-page-intro-chips">
          <span>−30–50% анализ</span><span>2–3 ч → 10 мин</span><span>MCP · 152-ФЗ</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
    <a class="ym-toc-link" href="#chto-takoe-gigacowork">Что такое GigaCowork</a>
    <a class="ym-toc-link" href="#otlichie-gigachat">Отличие от GigaChat</a>
    <a class="ym-toc-link" href="#reglament-navyk">Регламент → навык</a>
    <a class="ym-toc-link" href="#keisy-sbera">Кейсы и метрики</a>
    <a class="ym-toc-link" href="#integracii-mcp">MCP и интеграции</a>
    <a class="ym-toc-link" href="#bezopasnost">152-ФЗ и безопасность</a>
    <a class="ym-toc-link" href="#alternativy">Альтернативы</a>
    <a class="ym-toc-link" href="#stoimost-roi">TCO и ROI</a>
    <a class="ym-toc-link" href="#faq">FAQ</a>
    <a class="ym-toc-link" href="#itog">Дорожная карта</a>
    </nav>
  </div>
</section>

<section id="chto-takoe-gigacowork" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="chto-takoe-gigacowork-title" class="ym-section-title">Что такое GigaCowork и почему о нём говорят в июне 2026</h2>
    <p><strong>Определение:</strong> <strong>GigaCowork</strong> — слой <strong>оркестрации ИИ-агентов</strong> для всей компании: рабочие пространства, «навыки» из текстовых регламентов, коннекторы к корпоративным системам и совместная работа человека с агентом в одном окне. Это не замена корпоративной LLM, а надстройка над ней.</p>
<h3 class="ym-h3">Запуск на ЦИПР и «Салют для бизнеса»</h3>
<p>19.05.2026 на <strong>ЦИПР</strong> (Нижний Новгород) линейка <strong>«Салют для бизнеса»</strong> объявила <strong>ранний доступ к тестированию</strong> GigaCowork. Заявка подаётся через сайт <strong>GigaChat Business</strong> (<a href="https://enterprise.giga.chat/">enterprise.giga.chat</a>); об этом же пишут <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews от 19.05.2026</a> и <a href="https://habr.com/ru/news/1038518/">Habr</a>.</p>
<p><strong>Итог по срокам:</strong> продукт в стадии раннего теста; публичные метрики — из пилотов Сбера, а не из независимого аудита.</p>
<h3 class="ym-h3">Кому адресована платформа (МСБ, средний бизнес, бэк-офис)</h3>
<p>Позиционирование — <strong>компании</strong>, которым нужны <strong>ИИ-агенты для бизнеса</strong> без перестройки ИТ: бэк-офис, юридический блок, бухгалтерия, HR, аналитика. На сессии ЦИПР-2026 Сбер озвучил масштаб внутренней практики: порядка <strong>1000</strong> инициатив с ИИ-агентами и <strong>40%</strong> обращений в контакт-центры, обрабатываемых агентами (<a href="https://primpress.ru/article/134773">Primpress</a>).</p>
<p><strong>Цифровые сотрудники</strong> в этом контексте — не один чат-бот, а <strong>команда агентов</strong> с ролями, расписанием и доступом к данным в CRM/ERP.</p>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Параметр</th>
<th>GigaCowork</th>
<th>Обычный чат-бот</th>
</tr>
</thead>
<tbody>
<tr>
<td>Единица работы</td>
<td>Сквозной процесс по регламенту</td>
<td>Один диалог / один сценарий</td>
</tr>
<tr>
<td>Знания</td>
<td>Текстовые навыки из инструкций сотрудников</td>
<td>FAQ или жёсткий скрипт</td>
</tr>
<tr>
<td>Интеграции</td>
<td>MCP к CRM, ERP, почте, файлам</td>
<td>Часто только виджет на сайте</td>
</tr>
<tr>
<td>Масштаб</td>
<td>Мультиагентность, рабочие пространства</td>
<td>Точечная автоматизация</td>
</tr>
</tbody>
</table></div>
<hr>
  </div>
</section>
<section id="otlichie-gigachat" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="otlichie-gigachat-title" class="ym-section-title">Чем GigaCowork отличается от GigaChat Enterprise и обычного чат-бота</h2>
    <p><strong>GigaChat Enterprise</strong> / <strong>GigaChat Business</strong> (март 2026) — корпоративная <strong>LLM-платформа</strong>: модели в контуре, <strong>152-ФЗ</strong>, варианты SaaS / гибрид / ПАК (<a href="https://enterprise.giga.chat/">enterprise.giga.chat</a>, <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews 03.03.2026</a>). <strong>GigaCowork</strong> добавляет <strong>управление агентами</strong>: оркестрация, навыки из регламентов, запуск по расписанию, MCP-коннекторы (<a href="https://habr.com/ru/news/1038518/">Habr</a>).</p>
<h3 class="ym-h3">Оркестрация агентов vs один диалог</h3>
<p><strong>Владимир Толмачев</strong> («Салют для бизнеса») формулирует проблему так: точечные агенты не встраиваются в <strong>сквозной процесс</strong> — люди вручную переносят данные между системами; нужно «единое окно» совместной работы (<a href="https://habr.com/ru/news/1038518/">Habr</a>, <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>). Обзор на <a href="https://vc.ru/ai/2948125-sber-zapustil-gigacowork-dlya-biznesa">vc.ru</a> называет GigaCowork «первым прямым российским ответом Claude Cowork», но отмечает: <strong>методологический слой пока не опубликован</strong>.</p>
<h3 class="ym-h3">Навыки из регламентов сотрудников</h3>
<p><strong>Андрей Белевцев</strong> (Сбер): «Сотрудник описывает процесс на том же языке, на котором он живёт в регламентах компании — и этот процесс становится навыком ИИ-агента» (<a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>). <strong>Андрей Кутуков</strong> подчёркивает: агенту нужна полная «должностная инструкция»; платформа доступна в <strong>облаке, гибриде и on-premise</strong> (<a href="https://www.ng.ru/news/839567.html">НГ</a>).</p>
<p>Для владельца бизнеса это означает: <strong>автоматизация бизнес-процессов нейросетью</strong> начинается не с кода, а с <strong>качества регламента</strong>.</p>
<hr>
  </div>
</section>
<section id="reglament-navyk" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="reglament-navyk-title" class="ym-section-title">Как устроена логика «регламент → навык агента» без программистов</h2>
    <p><strong>Коротко:</strong> <strong>ИИ-агенты без программистов</strong> возможны, если процесс уже описан чек-листом, а интеграции вынесены в <strong>no-code / low-code</strong> слой (коннекторы MCP, Make, n8n).</p>
<h3 class="ym-h3">Роли, политики и естественный язык</h3>
<p>Официальная архитектура GigaCowork (<a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>, <a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>):</p>
<ol>
<li><strong>Рабочие пространства</strong> — изоляция отделов и политик.</li>
<li><strong>Навыки</strong> — текстовые инструкции, регламенты, чек-листы.</li>
<li><strong>Коннекторы</strong> — CRM, ERP, почта, файлы через <strong>Model Context Protocol (MCP)</strong>.</li>
<li><strong>Контроль доступа</strong> — действия от имени сотрудника, запустившего задачу, с <strong>логированием</strong>.</li>
</ol>
<p><strong>Дмитрий Трофимов</strong> (Сбер): <strong>70% проблем внедрения ИИ — организационные</strong>, не технические; GenAI нужно строить как продукт (<a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>). <strong>Руслан Мельников</strong> (Aston): начинать «от боли», а не от лозунга «давайте ИИ» (там же).</p>
<h3 class="ym-h3">Типовые ошибки при первом пилоте</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Ошибка</th>
<th>Последствие</th>
<th>Что делать вместо</th>
</tr>
</thead>
<tbody>
<tr>
<td>Регламент из 2 абзацев</td>
<td>Агент «фантазирует» шаги</td>
<td>Развернуть чек-лист как для стажёра</td>
</tr>
<tr>
<td>Сразу 10 процессов</td>
<td>Нет метрик, хаос в доступах</td>
<td>Один пилот 4–8 недель</td>
</tr>
<tr>
<td>Нет human-in-the-loop</td>
<td>Риски по договорам и ПДн</td>
<td>Подтверждение человеком на критичных шагах</td>
</tr>
<tr>
<td>Игнор логов</td>
<td>Невозможен аудит</td>
<td>RBAC + журнал действий агента</td>
</tr>
</tbody>
</table></div>
<p><strong>Автоматизация без разработчиков</strong> на практике = <strong>владелец процесса</strong> пишет навык + <strong>интегратор</strong> один раз настраивает MCP/Make/n8n.</p>
<hr>
  </div>
</section>
<section id="sber-gigacowork-boris-block" class="boris-gigacowork-viz" aria-labelledby="boris-gigacowork-title">
  <style>
    #sber-gigacowork-boris-block {
      margin: 48px auto;
      max-width: 100%;
      font-family: Inter, system-ui, -apple-system, sans-serif;
      color: #0f172a;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__card {
      background: linear-gradient(145deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
      padding: 28px 32px 32px;
      overflow: hidden;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__grid {
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
      gap: 28px 36px;
      align-items: center;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__eyebrow {
      margin: 0 0 10px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #2563eb;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__title {
      margin: 0 0 12px;
      font-size: clamp(1.25rem, 2.2vw, 1.5rem);
      font-weight: 800;
      line-height: 1.25;
      color: #0f172a;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__lead {
      margin: 0 0 18px;
      font-size: 15px;
      line-height: 1.55;
      color: #475569;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__list {
      margin: 0 0 20px;
      padding: 0;
      list-style: none;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__list li {
      position: relative;
      padding: 0 0 10px 18px;
      font-size: 14px;
      line-height: 1.45;
      color: #334155;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__list li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0.55em;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #21a038;
      box-shadow: 0 0 0 3px rgba(33, 160, 56, 0.2);
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 14px;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      font-size: 12px;
      font-weight: 600;
      color: #0f172a;
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 999px;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__pill strong {
      color: #2563eb;
      font-weight: 800;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__bridge {
      margin: 0;
      font-size: 13px;
      color: #64748b;
      font-style: italic;
    }
    #sber-gigacowork-boris-block .boris-gigacowork-viz__canvas-wrap {
      position: relative;
      min-height: 400px;
      height: clamp(380px, 52vw, 520px);
      border-radius: 18px;
      background: #fff;
      border: 1px solid #e2e8f0;
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }
    #sber-gigacowork-boris-block canvas#gigacowork-mcp-topology-canvas {
      display: block;
      width: 100%;
      height: 100%;
      border-radius: 18px;
    }
    @media (max-width: 1023px) {
      #sber-gigacowork-boris-block .boris-gigacowork-viz__grid {
        grid-template-columns: 1fr;
      }
      #sber-gigacowork-boris-block .boris-gigacowork-viz__canvas-wrap {
        min-height: 360px;
        height: 400px;
      }
    }
    @media (max-width: 767px) {
      #sber-gigacowork-boris-block .boris-gigacowork-viz__card {
        padding: 22px 18px 24px;
      }
    }
  </style>

  <div class="boris-gigacowork-viz__card ym-container">
    <div class="boris-gigacowork-viz__grid">
      <div class="boris-gigacowork-viz__copy">
        <p class="boris-gigacowork-viz__eyebrow">Схема без кода</p>
        <h3 id="boris-gigacowork-title" class="boris-gigacowork-viz__title">Регламент → навык → MCP: куда уходит задача агента</h3>
        <p class="boris-gigacowork-viz__lead">Не конвейер «коробок», а <strong>карта интеграций</strong>: владелец процесса описывает навык, оркестратор запускает агента, коннекторы MCP читают CRM и 1С, согласование уходит в Telegram — каждый шаг пишется в журнал.</p>
        <ul class="boris-gigacowork-viz__list">
          <li>Центр — оркестратор (GigaCowork или Make/n8n)</li>
          <li>Узлы — CRM, ERP/1С, почта, мессенджер, аудит</li>
          <li>Пульсирующие «пакеты» — human-in-the-loop на критичных шагах</li>
        </ul>
        <div class="boris-gigacowork-viz__pills" aria-hidden="true">
          <span class="boris-gigacowork-viz__pill"><strong>4</strong> коннектора</span>
          <span class="boris-gigacowork-viz__pill"><strong>1</strong> навык из регламента</span>
          <span class="boris-gigacowork-viz__pill">лог <strong>RBAC</strong></span>
        </div>
        <p class="boris-gigacowork-viz__bridge">Дальше — цифры пилота Сбера и оговорки, когда метрики не переносятся на ваш процесс.</p>
      </div>
      <div class="boris-gigacowork-viz__canvas-wrap" role="img" aria-label="Анимированная схема: оркестратор ИИ-агентов и потоки данных через MCP к CRM, 1С, ERP и Telegram">
        <canvas id="gigacowork-mcp-topology-canvas" width="640" height="480"></canvas>
      </div>
    </div>
  </div>

  <script>
  (function () {
    var canvas = document.getElementById("gigacowork-mcp-topology-canvas");
    if (!canvas) return;
    var ctx = canvas.getContext("2d");
    var wrap = canvas.parentElement;
    var frame = 0;
    var dpr = 1;
    var W = 640, H = 480, cx = 320, cy = 240;

    var COL = {
      ink: "#0f172a",
      muted: "#64748b",
      line: "#cbd5e1",
      hub: "#2563eb",
      hubLight: "#dbeafe",
      green: "#21a038",
      amber: "#f59e0b",
      pink: "#ec4899",
      violet: "#8b5cf6",
      packet: "#0ea5e9",
      log: "#10b981",
      white: "#ffffff"
    };

    var nodes = [
      { id: "reg", label: "Регламент", sub: "чек-лист", x: 0.14, y: 0.22, color: COL.amber },
      { id: "skill", label: "Навык", sub: "skill", x: 0.14, y: 0.78, color: COL.violet },
      { id: "hub", label: "Оркестратор", sub: "агенты", x: 0.5, y: 0.5, color: COL.hub, hub: true },
      { id: "crm", label: "CRM", sub: "сделки", x: 0.86, y: 0.18, color: COL.green },
      { id: "erp", label: "1С / ERP", sub: "учёт", x: 0.86, y: 0.5, color: COL.ink },
      { id: "tg", label: "Telegram", sub: "HITL", x: 0.86, y: 0.82, color: COL.pink },
      { id: "log", label: "Журнал", sub: "152-ФЗ", x: 0.5, y: 0.88, color: COL.log }
    ];

    var edges = [
      ["reg", "skill"], ["reg", "hub"], ["skill", "hub"],
      ["hub", "crm"], ["hub", "erp"], ["hub", "tg"], ["hub", "log"],
      ["crm", "log"], ["erp", "log"], ["tg", "log"]
    ];

    var packets = [];
    function seedPackets() {
      packets = [];
      for (var i = 0; i < edges.length; i++) {
        packets.push({
          edge: i,
          t: (i * 0.17) % 1,
          speed: 0.004 + (i % 3) * 0.0015,
          hitl: edges[i][1] === "tg"
        });
      }
    }
    seedPackets();

    function resize() {
      if (!wrap) return;
      dpr = Math.min(window.devicePixelRatio || 1, 2);
      var rect = wrap.getBoundingClientRect();
      W = Math.max(280, rect.width);
      H = Math.max(320, rect.height);
      canvas.width = Math.floor(W * dpr);
      canvas.height = Math.floor(H * dpr);
      canvas.style.width = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      cx = W / 2;
      cy = H / 2;
    }

    function nodePos(n) {
      return { x: n.x * W, y: n.y * H };
    }
    function getNode(id) {
      for (var i = 0; i < nodes.length; i++) if (nodes[i].id === id) return nodes[i];
      return null;
    }

    function roundRect(x, y, w, h, r) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
      else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
      ctx.closePath();
    }

    function drawGrid() {
      ctx.strokeStyle = "rgba(148, 163, 184, 0.25)";
      ctx.lineWidth = 1;
      var step = 32;
      for (var gx = 0; gx < W; gx += step) {
        ctx.beginPath(); ctx.moveTo(gx, 0); ctx.lineTo(gx, H); ctx.stroke();
      }
      for (var gy = 0; gy < H; gy += step) {
        ctx.beginPath(); ctx.moveTo(0, gy); ctx.lineTo(W, gy); ctx.stroke();
      }
    }

    function drawEdge(a, b, alpha) {
      var pa = nodePos(a), pb = nodePos(b);
      var mx = (pa.x + pb.x) / 2, my = (pa.y + pb.y) / 2 - 18;
      ctx.strokeStyle = "rgba(37, 99, 235, " + (alpha || 0.35) + ")";
      ctx.lineWidth = 2;
      ctx.setLineDash([6, 8]);
      ctx.beginPath();
      ctx.moveTo(pa.x, pa.y);
      ctx.quadraticCurveTo(mx, my, pb.x, pb.y);
      ctx.stroke();
      ctx.setLineDash([]);
    }

    function drawNode(n) {
      var p = nodePos(n);
      var r = n.hub ? 44 : 34;
      ctx.fillStyle = n.hub ? COL.hubLight : COL.white;
      roundRect(p.x - r, p.y - r, r * 2, r * 2, n.hub ? 14 : 10);
      ctx.fill();
      ctx.strokeStyle = n.color;
      ctx.lineWidth = n.hub ? 3 : 2;
      ctx.stroke();
      if (n.hub) {
        var pulse = 0.5 + 0.5 * Math.sin(frame * 0.04);
        ctx.strokeStyle = "rgba(37, 99, 235, " + (0.15 + pulse * 0.2) + ")";
        ctx.lineWidth = 8;
        roundRect(p.x - r - 6, p.y - r - 6, (r + 6) * 2, (r + 6) * 2, 16);
        ctx.stroke();
      }
      ctx.fillStyle = COL.ink;
      ctx.font = (n.hub ? "bold 13px" : "600 12px") + " Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.textBaseline = "middle";
      ctx.fillText(n.label, p.x, p.y - (n.hub ? 4 : 2));
      ctx.fillStyle = COL.muted;
      ctx.font = "10px Inter, sans-serif";
      ctx.fillText(n.sub, p.x, p.y + (n.hub ? 14 : 12));
    }

    function pointOnEdge(ei, t) {
      var e = edges[ei];
      var a = getNode(e[0]), b = getNode(e[1]);
      var pa = nodePos(a), pb = nodePos(b);
      var mx = (pa.x + pb.x) / 2, my = (pa.y + pb.y) / 2 - 18;
      var u = 1 - t;
      return {
        x: u * u * pa.x + 2 * u * t * mx + t * t * pb.x,
        y: u * u * pa.y + 2 * u * t * my + t * t * pb.y
      };
    }

    function drawPacket(pkt) {
      var pt = pointOnEdge(pkt.edge, pkt.t);
      ctx.fillStyle = pkt.hitl ? COL.pink : COL.packet;
      ctx.beginPath();
      ctx.arc(pt.x, pt.y, pkt.hitl ? 7 : 5, 0, Math.PI * 2);
      ctx.fill();
      ctx.strokeStyle = COL.white;
      ctx.lineWidth = 2;
      ctx.stroke();
      if (pkt.hitl && Math.sin(frame * 0.08) > 0.6) {
        ctx.fillStyle = COL.ink;
        ctx.font = "9px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("✓ человек", pt.x, pt.y - 14);
      }
    }

    function drawMiniAgents() {
      var hub = getNode("hub");
      if (!hub) return;
      var hp = nodePos(hub);
      var roles = [COL.amber, COL.green, COL.packet, COL.violet, COL.pink];
      for (var i = 0; i < 5; i++) {
        var ang = (frame * 0.02 + i * (Math.PI * 2 / 5));
        var orbit = 58 + Math.sin(frame * 0.03 + i) * 4;
        var ax = hp.x + Math.cos(ang) * orbit;
        var ay = hp.y + Math.sin(ang) * orbit * 0.65;
        ctx.fillStyle = roles[i];
        ctx.beginPath();
        ctx.arc(ax, ay, 5, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = COL.ink;
        ctx.lineWidth = 1.5;
        ctx.stroke();
      }
    }

    function drawCaption() {
      ctx.fillStyle = "rgba(15, 23, 42, 0.75)";
      ctx.font = "11px Inter, sans-serif";
      ctx.textAlign = "left";
      var bubble = "Поток: регламент → навык → MCP → системы";
      var bw = ctx.measureText(bubble).width + 20;
      roundRect(12, H - 36, bw, 24, 8);
      ctx.fill();
      ctx.fillStyle = "#fff";
      ctx.fillText(bubble, 22, H - 22);
    }

    function tick() {
      frame++;
      ctx.clearRect(0, 0, W, H);
      drawGrid();
      for (var e = 0; e < edges.length; e++) {
        var na = getNode(edges[e][0]), nb = getNode(edges[e][1]);
        if (na && nb) drawEdge(na, nb, 0.28 + 0.12 * Math.sin(frame * 0.02 + e));
      }
      for (var n = 0; n < nodes.length; n++) drawNode(nodes[n]);
      drawMiniAgents();
      for (var p = 0; p < packets.length; p++) {
        packets[p].t += packets[p].speed;
        if (packets[p].t > 1) packets[p].t -= 1;
        drawPacket(packets[p]);
      }
      drawCaption();
      requestAnimationFrame(tick);
    }

    window.addEventListener("resize", resize);
    resize();
    tick();
  })();
  </script>
</section>
<section id="keisy-sbera" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="keisy-sbera-title" class="ym-section-title">Кейсы Сбера: документы, аналитика, HR — цифры пилота и ограничения</h2>
    <p>Заявленные метрики (<strong>май 2026</strong>, <strong>Андрей Белевцев</strong>, внутренние кейсы Сбера — <a href="https://habr.com/ru/news/1038518/">Habr</a>, <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>, TAdviser):</p>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Направление</th>
<th>Заявленный эффект</th>
</tr>
</thead>
<tbody>
<tr>
<td>Анализ / контекст</td>
<td>−30–50% времени</td>
</tr>
<tr>
<td>Документооборот</td>
<td>+80% скорость обработки</td>
</tr>
<tr>
<td>Рабочее время сотрудника</td>
<td>81,5% экономия (в заявленных сценариях)</td>
</tr>
<tr>
<td>HR</td>
<td>83% оптимизация; 93% — поиск кандидатов</td>
</tr>
<tr>
<td>Отчётность</td>
<td>+70%</td>
</tr>
</tbody>
</table></div>
<p><strong>Оговорка:</strong> цифры <strong>не прошли независимый аудит</strong>; для вашей компании нужен <strong>свой пилот</strong> по схеме: описание процесса → прототип → замер → масштаб (<a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>).</p>
<h3 class="ym-h3">Документооборот и сокращение времени (80%, 2–3 ч → 10 мин)</h3>
<p>Операционный кейс бэк-офиса (<a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>): изменение условий оплаты по договору — <strong>2–3 часа</strong> вручную против <strong>~10 минут</strong> с агентом и проверкой человеком. Дополнительно: юрпроверка договоров (минуты vs 1–2 ч), сверка <strong>1С + CRM</strong> по расписанию.</p>
<p>Для запросов <strong>«нейросеть документооборот бизнес»</strong> / <strong>«ИИ для документооборота»</strong> важен не процент «с потолка», а <strong>измеримый участок</strong> (время на один тип договора × объём в месяц).</p>
<h3 class="ym-h3">Аналитика и рекрутинг (30–50%, 93%)</h3>
<p>Метрики по аналитике и HR отражают <strong>узкие внутренние сценарии</strong> Сбера. <strong>ИИ-агент HR / рекрутинг</strong> имеет смысл, если описаны источники кандидатов, критерии отбора и этапы согласования с рекрутером.</p>
<h3 class="ym-h3">Когда метрики не переносятся на вашу компанию</h3>
<ul>
<li>Другой объём документов и качество сканов.</li>
<li>Нет интеграции с вашей <strong>1С / Битрикс24 / amoCRM</strong>.</li>
<li>Регламенты устарели или противоречат друг другу.</li>
<li>Нет ответственного за <strong>методологию пилота</strong> (роль «владельца продукта» GenAI).</li>
</ul>
<p><strong>Белевцев</strong> (<a href="https://primpress.ru/article/134773">Primpress</a>): год назад «все говорили про ИИ-агентов», но разработка на стыке IT и Data Science была недоступна многим — <strong>платформа управления агентами</strong> как раз снимает этот барьер, но <strong>не снимает</strong> необходимость дисциплины в процессах.</p>
<hr>
  </div>
</section>
<section id="integracii-mcp" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="integracii-mcp-title" class="ym-section-title">Интеграции: MCP, ERP, CRM и мессенджеры в корпоративном контуре</h2>
    <p><strong>Model Context Protocol (MCP)</strong> — открытый протокол, через который агент <strong>безопасно</strong> вызывает инструменты: чтение CRM, запись в ERP, работа с файлами. В GigaCowork MCP заявлен для CRM, ERP, почты и файлов (<a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews</a>, <a href="https://www.ng.ru/news/839567.html">НГ</a>).</p>
<h3 class="ym-h3">MCP к ERP/CRM — что это даёт на практике</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Без MCP</th>
<th>С MCP</th>
</tr>
</thead>
<tbody>
<tr>
<td>Копирование данных между окнами</td>
<td>Агент запрашивает карточку сделки / счёт</td>
</tr>
<tr>
<td>Ошибки при ручном вводе</td>
<td>Единый контур данных</td>
</tr>
<tr>
<td>«Чат отдельно, 1С отдельно»</td>
<td>Сверки и отчёты по расписанию</td>
</tr>
</tbody>
</table></div>
<p>Запросы <strong>«mcp интеграция crm»</strong>, <strong>«mcp erp»</strong> растут вместе с экосистемой HubSpot, Salesforce и российскими внедрениями; для РФ-компаний критичны <strong>Битрикс24</strong>, <strong>1С</strong>, <strong>Telegram</strong> как канал согласований.</p>
<h3 class="ym-h3">Сценарии: CRM + Telegram + 1С / Битрикс</h3>
<p>Типовой <strong>сквозной сценарий</strong> (вне Сбера, стек Nero Network):</p>
<ol>
<li>Триггер в <strong>CRM</strong> (статус сделки / просрочка оплаты).</li>
<li>Агент собирает контекст из <strong>1С</strong> и регламента.</li>
<li>Черновик письма или акта — в <strong>почту</strong>; согласование — в <strong>Telegram</strong> (human-in-the-loop).</li>
<li>Финальная запись — обратно в CRM с <strong>логом</strong> действий.</li>
</ol>
<p>Практика <strong>n8n + MCP + CRM</strong> разбирается в сообществе (<a href="https://habr.com/ru/articles/1041270/">Habr: n8n и MCP</a>) — полезный ориентир для <strong>self-hosted</strong> и компаний без vendor lock-in к одному банку.</p>
<hr>
  </div>
</section>
<aside class="ym-cta-card ym-cta-card--primary reveal" aria-labelledby="cta-primary-gigacowork">
  <div class="ym-card" style="border-left: 4px solid var(--ym-primary); max-width: 100%;">
    <p class="ym-cta-eyebrow" style="margin: 0 0 8px; font-size: 13px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ym-primary);">Услуга Nero Network</p>
    <h3 id="cta-primary-gigacowork" style="margin: 0 0 12px; font-size: 22px; font-weight: 800; color: var(--ym-heading);">Аудит готовности к ИИ-агентам и пилот MCP + CRM</h3>
    <p style="margin: 0 0 20px; color: #64748b; line-height: 1.6; font-size: 15px;">Повторите логику GigaCowork на своём стеке: один процесс (договор, сверка 1С, HR), карта MCP-интеграций под Битрикс24 / 1С / Telegram, пилот 4–8 недель с human-in-the-loop и логированием под 152-ФЗ — без vendor lock-in к экосистеме Сбера.</p>
    <ul style="margin: 0 0 24px; padding-left: 1.2em; color: #475569; font-size: 14px; line-height: 1.55;">
      <li>Разбор регламента и чек-листа навыка агента</li>
      <li>Схема коннекторов MCP к вашей CRM и учёту</li>
      <li>Оценка TCO и метрик «до/после» на одном типе задачи</li>
    </ul>
    <div class="ym-btn-group" style="justify-content: flex-start;">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( getenv('PRIMARY_CTA_URL') ?: 'https://t.me/nero_network' ); ?>" rel="noopener noreferrer"><span><?php echo esc_html( getenv('PRIMARY_CTA_LABEL') ?: 'Заказать аудит' ); ?></span></a>
    </div>
  </div>
</aside>
<section id="bezopasnost" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="bezopasnost-title" class="ym-section-title">Безопасность: 152-ФЗ, доступы, логирование и гибридное развёртывание</h2>
    <p><strong>Андрей Кутуков</strong> (<a href="https://www.ng.ru/news/839567.html">НГ</a>): при обучении агента важны <strong>управление доступами и логирование</strong> — «мы это изначально закладываем в GigaCowork». Для линейки GigaChat Business заявлены хранение данных в РФ и <strong>152-ФЗ</strong> (<a href="https://enterprise.giga.chat/">enterprise.giga.chat</a>).</p>
<h3 class="ym-h3">Облако vs гибрид</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Модель</th>
<th>Когда выбирают</th>
<th>Риски</th>
</tr>
</thead>
<tbody>
<tr>
<td>SaaS</td>
<td>Быстрый старт, малый штат ИТ</td>
<td>Зависимость от провайдера</td>
</tr>
<tr>
<td>Гибрид</td>
<td>Модель в облаке, данные в периметре</td>
<td>Сложнее архитектура</td>
</tr>
<tr>
<td>On-premise / ПАК</td>
<td>Жёсткий compliance, госсектор</td>
<td>Выше TCO внедрения</td>
</tr>
</tbody>
</table></div>
<p>Подключение к <strong>разным LLM</strong> и системам в периметре заказчика подтверждает <strong>Кутуков</strong> (<a href="https://www.ng.ru/news/839567.html">НГ</a>).</p>
<h3 class="ym-h3">Аудит действий агентов</h3>
<p>Чек-лист для владельца (<strong>152-ФЗ и корпоративные ИИ-агенты</strong>):</p>
<ul>
<li>Где хранятся <strong>промпты</strong> и логи (РФ / облако провайдера)?</li>
<li>Какие <strong>ПДн</strong> попадают в контекст агента из CRM?</li>
<li>Кто может <strong>запускать</strong> агента от имени другого сотрудника?</li>
<li>Есть ли <strong>ретеншн</strong> логов и процедура расследования инцидента?</li>
</ul>
<p><strong>Логирование действий ИИ-агента</strong> — не опция для юротдела и бухгалтерии, а условие масштабирования после пилота.</p>
<hr>
  </div>
</section>
<section id="alternativy" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="alternativy-title" class="ym-section-title">Альтернативы для компаний вне экосистемы Сбера</h2>
    <p>Не каждой компании нужен <strong>GigaCowork</strong> как коробка: важна <strong>логика</strong> — регламент → навык → MCP → оркестратор. Ниже — <strong>аналог gigacowork без Сбера</strong> и российские платформы мая 2026.</p>
<h3 class="ym-h3">Make.com, n8n и open-модели</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Инструмент</th>
<th>Сильная сторона</th>
<th>Ограничение</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Make.com</strong></td>
<td>Быстрые сценарии, SaaS-интеграции</td>
<td>Зависимость от облака, тарифы на операции</td>
</tr>
<tr>
<td><strong>n8n</strong></td>
<td>Self-hosted, MCP, human-in-the-loop</td>
<td>Нужен админ контура</td>
</tr>
<tr>
<td><strong>Open-модели</strong></td>
<td>Нет привязки к одному вендору LLM</td>
<td>Качество и поддержка — на вас</td>
</tr>
</tbody>
</table></div>
<p>Связка <strong>Make / n8n + MCP + CRM</strong> повторяет архитектуру GigaCowork без единого брендированного «корпоративного окна».</p>
<h3 class="ym-h3">Российские платформы: Napoleon «Оркестр», MWS AI Force и др.</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Платформа</th>
<th>Дата / источник</th>
<th>УТП</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Napoleon «Оркестр»</strong></td>
<td>04.05.2026, <a href="https://www.cnews.ru/news/line/2026-05-04_v_napoleon_ai_sozdali_vizualnyj">CNews</a></td>
<td>Визуальный конструктор, 200+ LLM через «Наполеон Гейт», on-prem, 152-ФЗ/ФСТЭК; заявлено −30–60% рутины</td>
</tr>
<tr>
<td><strong>Авандок.ИИ</strong> (Корус)</td>
<td>27.05.2026, <a href="https://www.cnews.ru/news/line/2026-05-27_korus_konsalting_vypustil">CNews</a></td>
<td>Low-code, MCP-коннекторы, model-agnostic, on-prem</td>
</tr>
<tr>
<td><strong>MWS AI Agents / AI Force</strong></td>
<td><a href="https://mts.ai/product/ai-agents-platform/">mts.ai</a></td>
<td>Агент создаёт агентов по тексту, корпоративный контур</td>
</tr>
<tr>
<td><strong>Нейро42</strong></td>
<td><a href="https://neuro42.ru/platform/">neuro42.ru</a></td>
<td>Low-code, on-prem, MAX/Telegram</td>
</tr>
</tbody>
</table></div>
<p>Сравнение по <strong>vendor lock-in</strong>, <strong>MCP</strong>, <strong>on-prem</strong>, <strong>no-code vs low-code</strong> и типовой <strong>CRM в РФ</strong> — основа выбора; пресс-релизы не заменяют пилот на вашем процессе.</p>
<h3 class="ym-h3">Vendor lock-in и критерии выбора</h3>
<p><strong>Критерии:</strong></p>
<ol>
<li>Можно ли уйти с платформы, сохранив <strong>регламенты</strong> (навыки) и интеграции?</li>
<li>Есть ли <strong>MCP</strong> или открытый API к вашей CRM/1С?</li>
<li>Соответствие <strong>152-ФЗ</strong> и требованиям отрасли.</li>
<li>Стоимость <strong>владения</strong> (лицензии + внедрение + поддержка) vs один FTE на рутину.</li>
</ol>
<p><strong>Платформа ИИ-агентов для компании</strong> — это не только UI, а <strong>оркестратор + политики + интеграции</strong>.</p>
<hr>
  </div>
</section>
<section id="stoimost-roi" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="stoimost-roi-title" class="ym-section-title">Стоимость и ROI: TCO внедрения ИИ-агентов в 2026</h2>
    <p>Прямого прайса GigaCowork в открытом доступе на момент раннего теста нет — расчёт идёт через <strong>TCO</strong>: лицензии LLM/платформы, интеграции, обучение владельцев процессов, поддержка.</p>
<h3 class="ym-h3">Пилот vs масштабирование</h3>
<p>Рекомендуемая методология (<a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>):</p>
<ol>
<li><strong>4–8 недель</strong> — один процесс (договор, сверка, HR-скрининг).</li>
<li>Метрики «до/после» на <strong>одинаковом</strong> объёме задач.</li>
<li>Масштабирование только при стабильном <strong>human-in-the-loop</strong>.</li>
</ol>
<p>Кейс «Нордик» (чат-бот GigaChat): порядка <strong>5 месяцев</strong> внедрения, сопоставимо с наймом специалиста (<a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>) — ориентир для <strong>ROI</strong>, не гарантия.</p>
<h3 class="ym-h3">Скрытые затраты (интеграции, обучение, поддержка)</h3>
<div class="ym-table-wrap"><table class="ym-table">
<thead>
<tr>
<th>Статья</th>
<th>Что часто забывают</th>
</tr>
</thead>
<tbody>
<tr>
<td>MCP / API</td>
<td>Разработка или настройка коннекторов к 1С/Битрикс</td>
</tr>
<tr>
<td>Регламенты</td>
<td>Время методолога и владельца процесса</td>
</tr>
<tr>
<td>Безопасность</td>
<td>Аудит, DLP, согласование с ИБ</td>
</tr>
<tr>
<td>Обучение</td>
<td>Смена привычек («агент как коллега»)</td>
</tr>
<tr>
<td>Поддержка</td>
<td>Обновление навыков при смене законов/тарифов</td>
</tr>
</tbody>
</table></div>
<p>Запросы <strong>«сколько стоит внедрение ИИ-агентов»</strong>, <strong>«roi ии агентов бизнес»</strong> закрываются только <strong>калькулятором под ваш процесс</strong>: экономия минут × ставка часа − TCO платформы.</p>
<hr>
  </div>
</section>
<aside class="ym-cta-card ym-cta-card--secondary reveal delay-100" aria-labelledby="cta-secondary-gigacowork">
  <div class="ym-card" style="background: var(--ym-bg); max-width: 100%;">
    <h3 id="cta-secondary-gigacowork" style="margin: 0 0 10px; font-size: 18px; font-weight: 700; color: var(--ym-heading);">Освоить внедрение без штата разработчиков</h3>
    <p style="margin: 0 0 16px; color: #64748b; line-height: 1.6; font-size: 15px;">Перед масштабированием пилота полезно пройти обучение: регламент → skill агента → Make/n8n + MCP → контроль доступов. Так вы снизите скрытые затраты на интеграции и обучение команды из блока TCO.</p>
    <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( getenv('SECONDARY_CTA_URL') ?: 'https://t.me/nero_network' ); ?>" rel="noopener noreferrer"><?php echo esc_html( getenv('SECONDARY_CTA_LABEL') ?: 'Узнать об обучении' ); ?></a>
  </div>
</aside>
<section id="faq" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="faq-title" class="ym-section-title">FAQ — частые вопросы по GigaCowork и внедрению аналога</h2>
    <h3 class="ym-h3">Нужны ли разработчики?</h3>
<p>Для <strong>настройки навыков по регламенту</strong> — нет, если платформа no-code/low-code. Для <strong>MCP, 1С, нестандартного ERP</strong> — обычно нужен интегратор на этапе пилота (1–2 месяца), далее — силами админа или партнёра.</p>
<h3 class="ym-h3">Можно ли без Сбера и GigaCowork?</h3>
<p>Да. Схема: <strong>аудит регламента → текстовый skill → MCP-коннекторы → оркестратор (n8n/Make) → CRM/1С/Telegram</strong> с проверкой человеком. Это основной коммерческий угол для компаний вне экосистемы Сбера.</p>
<h3 class="ym-h3">Сколько длится пилот?</h3>
<p>Ориентир <strong>4–8 недель</strong> на один процесс при готовом регламенте; <strong>5+ месяцев</strong>, если параллельно строится интеграция с 1С и согласования с ИБ (по аналогии с корпоративными кейсами GigaChat).</p>
<h3 class="ym-h3">Чем GigaCowork отличается от GigaChat Enterprise?</h3>
<p><strong>Enterprise/Business</strong> — модель и корпоративный контур LLM; <strong>GigaCowork</strong> — <strong>оркестрация агентов</strong>, навыки, MCP, мультиагентность (<a href="https://habr.com/ru/news/1038518/">Habr</a>).</p>
<h3 class="ym-h3">Безопасны ли данные для 152-ФЗ?</h3>
<p>У Сбера заявлены РФ-хостинг и compliance для Business-линейки; для <strong>своего стека</strong> нужен отдельный аудит: где логи, промпты и выгрузки из CRM.</p>
<h3 class="ym-h3">Какие метрики Сбера реалистичны для МСБ?</h3>
<p>Использовать как <strong>вдохновение</strong>, не как KPI в договоре с подрядчиком. Свой пилот с замером «2–3 ч → 10 мин» на <strong>вашем</strong> типе договора — единственная честная цифра.</p>
<h3 class="ym-h3">Что выбрать: Napoleon, MWS, Авандок или «сборку» на n8n?</h3>
<p>Зависит от <strong>lock-in</strong>, on-prem, наличия MCP и вашей CRM. Сборка на <strong>n8n/Make</strong> гибче, но требует зрелости ИТ; коробка быстрее стартует при готовых коннекторах.</p>
<hr>
  </div>
</section>
<section id="itog" class="ym-section reveal">
  <div class="ym-container ym-article-body">
    <h2 id="itog-title" class="ym-section-title">Итог: дорожная карта внедрения аналога GigaCowork у себя</h2>
    <p><strong>Коротко — 7 шагов:</strong></p>
<ol>
<li>Выбрать <strong>один болезненный процесс</strong> (договор, сверка, HR-скрининг) — принцип «от боли» (<a href="https://eastrussia.ru/news/sber-otkryl-testovyy-dostup-k-platforme-gigacowork-sisteme-upravleniya-ii-agentami-dlya-vsey-kompani/">EastRussia</a>).</li>
<li>Оформить <strong>регламент</strong> как навык агента (чек-лист, роли, исключения).</li>
<li>Спроектировать <strong>MCP/интеграции</strong> к CRM, 1С, Битрикс, Telegram.</li>
<li>Выбрать <strong>оркестратор</strong>: корпоративная платформа (Napoleon, MWS, Авандок, GigaCowork) или <strong>Make/n8n</strong> + open LLM.</li>
<li>Запустить <strong>пилот 4–8 недель</strong> с логированием и human-in-the-loop.</li>
<li>Замерить <strong>ROI</strong> (время × объём − TCO).</li>
<li>Масштабировать на соседние отделы только после стабильных метрик.</li>
</ol>
<p>Сбер с запуском <strong>GigaCowork</strong> легитимизировал запрос <strong>«корпоративные ИИ-агенты без программистов»</strong> для массового B2B. Для компаний <strong>вне экосистемы Сбера</strong> выигрывает связка <strong>своих регламентов + MCP + Make/n8n</strong> и экспертное <strong>внедрение ИИ-агентов</strong> под российский стек CRM и учёта.</p>
<p><strong>Nero Network</strong> помогает пройти путь без vendor lock-in: аудит регламента, карта MCP-интеграций под <strong>Битрикс24 / 1С / Telegram</strong>, пилот оркестрации на <strong>Make, n8n и MCP</strong> и масштабирование команды <strong>цифровых сотрудников</strong> с учётом <strong>152-ФЗ</strong> и аудита действий агентов.</p>
  </div>
</section>

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
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "GigaCowork Сбера: ИИ-агенты для бизнеса без кода — аналог",
  "description": "Разбор GigaCowork: агенты по регламентам без программистов, MCP к CRM и ERP, метрики пилота Сбера. Как внедрить аналог вне экосистемы — Make, n8n, консалтинг Nero Network.",
  "inLanguage": "ru-RU",
  "author": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "about": [
    "GigaCowork",
    "ИИ-агенты для бизнеса",
    "MCP",
    "автоматизация без разработчиков"
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Нужны ли разработчики?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для настройки навыков по регламенту — нет, если платформа no-code/low-code. Для MCP, 1С, нестандартного ERP — обычно нужен интегратор на этапе пилота (1–2 месяца), далее — силами админа или партнёра."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли без Сбера и GigaCowork?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да. Схема: аудит регламента → текстовый skill → MCP-коннекторы → оркестратор (n8n/Make) → CRM/1С/Telegram с проверкой человеком."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько длится пилот?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ориентир 4–8 недель на один процесс при готовом регламенте; 5+ месяцев, если параллельно строится интеграция с 1С и согласования с ИБ."
      }
    },
    {
      "@type": "Question",
      "name": "Чем GigaCowork отличается от GigaChat Enterprise?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Enterprise/Business — модель и корпоративный контур LLM; GigaCowork — оркестрация агентов, навыки, MCP, мультиагентность."
      }
    },
    {
      "@type": "Question",
      "name": "Безопасны ли данные для 152-ФЗ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "У Сбера заявлены РФ-хостинг и compliance для Business-линейки; для своего стека нужен отдельный аудит: где логи, промпты и выгрузки из CRM."
      }
    },
    {
      "@type": "Question",
      "name": "Какие метрики Сбера реалистичны для МСБ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Использовать как вдохновение, не как KPI в договоре с подрядчиком. Свой пилот с замером «2–3 ч → 10 мин» на вашем типе договора — единственная честная цифра."
      }
    },
    {
      "@type": "Question",
      "name": "Что выбрать: Napoleon, MWS, Авандок или «сборку» на n8n?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Зависит от lock-in, on-prem, наличия MCP и вашей CRM. Сборка на n8n/Make гибче, но требует зрелости ИТ; коробка быстрее стартует при готовых коннекторах."
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
