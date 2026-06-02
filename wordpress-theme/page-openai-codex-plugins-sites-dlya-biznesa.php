<?php
/**
 * Template Name: OpenAI Codex для бизнеса: плагины и Sites
 */
$page_seo_title = 'OpenAI Codex для бизнеса: плагины и Sites — аналог на Cursor и MCP';
$page_seo_description = 'Релиз Codex 2 июня 2026: ролевые плагины и Sites для офиса без разработчиков. Как повторить контур в России на Cursor, MCP, Make и n8n — governance, CRM и ROI.';

$nero_primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '#';
$nero_primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Заявка в Telegram';
$nero_secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: '#';
$nero_secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Курс по автоматизации';

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

get_header(); ?>
<style>
.breadcrumbs, .breadcrumb, .woocommerce-breadcrumb,
.rank-math-breadcrumb, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
</style>
<style>

/**
 * ЭТАЛОННЫЕ СТИЛИ ЛОНГРИДА (страница «Яндекс Метрика Skill» из эталонной темы владельца).
 *
 * Исходник темы: page-yandex-metrika-skill.php (inline <style>).
 * Для дизайнера Наташи: открывай этот файл «как есть» — не ходи на сайт за CSS.
 *
 * Как использовать на новой странице:
 * - Скопируй в тему или в блок <style>; в селекторах замени класс обёртки
 *   `.openai-codex-plugins-sites-dlya-biznesa-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.openai-codex-plugins-sites-dlya-biznesa-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #0ea5e9;
    --ym-accent: #8b5cf6;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(14, 165, 233, 0.15);
}

.openai-codex-plugins-sites-dlya-biznesa-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.openai-codex-plugins-sites-dlya-biznesa-page h1,
.openai-codex-plugins-sites-dlya-biznesa-page h2,
.openai-codex-plugins-sites-dlya-biznesa-page h3,
.openai-codex-plugins-sites-dlya-biznesa-page h4,
.openai-codex-plugins-sites-dlya-biznesa-page h5,
.openai-codex-plugins-sites-dlya-biznesa-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-plugins-sites-dlya-biznesa-page p,
.openai-codex-plugins-sites-dlya-biznesa-page li,
.openai-codex-plugins-sites-dlya-biznesa-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.openai-codex-plugins-sites-dlya-biznesa-page strong,
.openai-codex-plugins-sites-dlya-biznesa-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-plugins-sites-dlya-biznesa-page pre, .openai-codex-plugins-sites-dlya-biznesa-page code {
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
    background: radial-gradient(circle, rgba(14,165,233,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(14, 165, 233, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(14, 165, 233, 0.2);
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
    background: linear-gradient(90deg, #0ea5e9, #38bdf8);
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
    box-shadow: 0 5px 15px rgba(14,165,233,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(14, 165, 233, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(14, 165, 233, 0.5);
    background: #0284c7;
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
    border-color: rgba(14, 165, 233, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(14, 165, 233, 0.05);
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
#codex-orchestrator-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.openai-codex-intro-section { padding: clamp(48px, 6vw, 72px) 0 24px; }
.openai-codex-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
  gap: clamp(24px, 4vw, 48px);
  align-items: start;
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 20px;
}
.openai-codex-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #0ea5e9, #8b5cf6) 1;
  padding-left: clamp(16px, 3vw, 28px);
}
.openai-codex-intro-text p { text-align: left !important; font-size: clamp(16px, 1.8vw, 18px); line-height: 1.65; margin: 0 0 16px; }
.openai-codex-intro-kicker { font-size: 13px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #0ea5e9 !important; margin: 0 0 12px; }
.openai-codex-intro-deco .ym-mac-window { margin-bottom: 0; }
.openai-codex-kpi-chips { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }
.openai-codex-kpi-chips span {
  font-size: 12px; font-weight: 600; padding: 6px 12px; border-radius: 999px;
  background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af !important;
}
.openai-codex-toc-wrap { padding: 8px 0 48px; }
.openai-codex-toc-wrap .ym-toc { margin-top: 0; }
.ym-content-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-content-prose h2 { font-size: clamp(26px, 3vw, 36px); font-weight: 800; margin: 48px 0 20px; text-align: left; color: #0f172a !important; scroll-margin-top: 100px; }
.ym-content-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 14px; text-align: left; color: #0f172a !important; }
.ym-content-prose p, .ym-content-prose li { text-align: left; line-height: 1.65; }
.ym-content-prose table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 14px; }
.ym-content-prose th, .ym-content-prose td { border: 1px solid #e2e8f0; padding: 10px 12px; text-align: left; vertical-align: top; }
.ym-content-prose th { background: #f8fafc; font-weight: 700; }
.ym-content-prose ul, .ym-content-prose ol { padding-left: 1.25rem; margin: 12px 0; }
.ym-content-prose a { color: var(--ym-accent); }
.ym-lead-box {
  background: linear-gradient(135deg, #f0f9ff, #faf5ff);
  border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px 24px; margin-bottom: 24px;
}
@media (max-width: 900px) { .openai-codex-intro-grid { grid-template-columns: 1fr; } }


</style>

<main id="primary" class="site-main openai-codex-plugins-sites-dlya-biznesa-page" role="main" tabindex="-1">

<section id="codex-orchestrator-hero" class="fullscreen-white-office codex-hero-office" aria-labelledby="codex-hero-h1">
  <style>
    #codex-orchestrator-hero.fullscreen-white-office {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      background: #f8fafc;
      background-image:
        linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
      background-size: 48px 48px;
    }
    #codex-orchestrator-hero canvas#codex-orchestrator-hero-canvas {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
    }
    #codex-orchestrator-hero .vl-hero-copy {
      position: absolute;
      left: clamp(16px, 4vw, 56px);
      bottom: clamp(100px, 18vh, 200px);
      max-width: min(640px, 92vw);
      z-index: 4;
    }
    #codex-orchestrator-hero .giant-seo {
      font-size: clamp(32px, 4.8vw, 68px);
      font-weight: 900;
      line-height: 1.08;
      letter-spacing: -2px;
      color: #0f172a;
      margin: 0;
    }
    #codex-orchestrator-hero .giant-seo span {
      display: block;
      background: linear-gradient(90deg, #0ea5e9, #8b5cf6);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    #codex-orchestrator-hero .giant-seo-sub {
      font-size: clamp(15px, 1.9vw, 21px);
      line-height: 1.55;
      color: rgba(15, 23, 42, 0.72);
      margin: 18px 0 22px;
      max-width: 620px;
    }
    #codex-orchestrator-hero .telegram-button {
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
    }
    #codex-orchestrator-hero .telegram-button:hover { transform: translateY(-2px); }
    #codex-orchestrator-hero .vl-ui-pill-tr {
      position: absolute;
      top: clamp(72px, 12vh, 120px);
      right: clamp(16px, 4vw, 48px);
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-end;
      gap: 8px;
      max-width: min(420px, 90vw);
      z-index: 4;
    }
    #codex-orchestrator-hero .vl-ui-pill-tr span {
      padding: 8px 14px;
      background: rgba(255, 255, 255, 0.94);
      border: 1px solid #e2e8f0;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      color: #334155;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    #codex-orchestrator-hero .vl-ui-tasks-row {
      position: absolute;
      left: 50%;
      bottom: clamp(16px, 3vh, 36px);
      transform: translateX(-50%);
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      z-index: 4;
      max-width: 96vw;
      padding: 0 12px;
    }
    #codex-orchestrator-hero .vl-ui-task {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 16px;
      background: rgba(255, 255, 255, 0.94);
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      backdrop-filter: blur(6px);
    }
    #codex-orchestrator-hero .vl-ui-task span {
      width: 26px;
      height: 26px;
      background: linear-gradient(135deg, #0ea5e9, #8b5cf6);
      color: #fff;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 800;
      flex-shrink: 0;
    }
    @media (max-width: 768px) {
      #codex-orchestrator-hero .vl-hero-copy {
        bottom: auto;
        top: clamp(64px, 10vh, 96px);
        max-width: 94vw;
      }
      #codex-orchestrator-hero .vl-ui-pill-tr {
        top: auto;
        bottom: clamp(120px, 22vh, 180px);
        right: 12px;
        left: 12px;
        justify-content: center;
      }
      #codex-orchestrator-hero .vl-ui-tasks-row {
        flex-direction: column;
        align-items: stretch;
        bottom: 12px;
      }
    }
  </style>

  <canvas id="codex-orchestrator-hero-canvas" aria-hidden="true"></canvas>

  <div class="vl-ui-pill-tr" aria-label="Метрики Codex">
    <span>62 apps</span>
    <span>110 skills</span>
    <span>60%+ параллельных задач</span>
    <span>Sites preview</span>
  </div>

  <div class="vl-hero-copy">
    <h1 id="codex-hero-h1" class="giant-seo">
      OpenAI Codex для офиса:
      <span>плагины по ролям и Sites</span>
      — как внедрить аналог в своём бизнесе
    </h1>
    <p class="giant-seo-sub">5 млн пользователей в неделю, каждый пятый — не разработчик: ролевые AI-сценарии и внутренние веб-приложения без отдела разработки</p>
    <a class="telegram-button" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nero_primary_cta_label); ?></a>
  </div>

  <div class="vl-ui-tasks-row" aria-label="Этапы внедрения">
    <div class="vl-ui-task"><span>1</span> Ролевой плагин</div>
    <div class="vl-ui-task"><span>2</span> MCP к CRM / 1С</div>
    <div class="vl-ui-task"><span>3</span> Site preview</div>
    <div class="vl-ui-task"><span>4</span> Governance</div>
    <div class="vl-ui-task"><span>5</span> Пилот 2–4 недели</div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("codex-orchestrator-hero-canvas");
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
    cy = ch / 2 - 20;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 760) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    hub: "#e0f2fe",
    hubStroke: "#0284c7",
    slotOff: "#f1f5f9",
    slotOn: "#a5f3fc",
    mcp: "#10b981",
    site: "#8b5cf6",
    warn: "#f97316",
    bubbleBg: "#ffffff",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6"
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

  class McpPulseRing {
    constructor() {
      this.r = 200;
      this.tokens = [
        { angle: 0, kind: "crm" },
        { angle: 1.4, kind: "sheet" },
        { angle: 2.8, kind: "mcp" },
        { angle: 4.2, kind: "tg" }
      ];
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      ctx.save();
      ctx.lineWidth = 2;
      ctx.strokeStyle = "rgba(14, 165, 233, 0.35)";
      ctx.setLineDash([8, 10]);
      ctx.beginPath();
      ctx.ellipse(0, 30, this.r, this.r * 0.42, 0, 0, Math.PI * 2);
      ctx.stroke();
      ctx.setLineDash([]);

      const spin = frame * 0.012 + (prg < 60 ? prg * 0.002 : 0);
      this.tokens.forEach((t, i) => {
        const a = t.angle + spin + i * 0.3;
        const tx = Math.cos(a) * this.r;
        const ty = 30 + Math.sin(a) * this.r * 0.42;
        const col = t.kind === "mcp" ? C.mcp : t.kind === "crm" ? C.agentBlue : "#94a3b8";
        drawPolyRound(ctx, tx - 10, ty - 8, 20, 16, 4, col, C.outline);
        if (t.kind === "mcp") {
          ctx.fillStyle = "#fff";
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("MCP", tx, ty + 2);
        }
      });
      ctx.restore();
    }
  }

  class PluginOrchestratorCore {
    constructor() {
      this.slots = ["Sales", "Data", "Creative", "Ops", "Legal", "MCP"];
      this.publishWave = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      const phase =
        prg < 60 ? "ingest" : prg < 150 ? "compose" : prg < 220 ? "publish" : "reset";
      const slotOn = Math.floor((prg % 150) / 22) % 6;

      ctx.save();
      ctx.translate(0, -20);

      for (let i = 0; i < 6; i++) {
        const a = (i / 6) * Math.PI * 2 - Math.PI / 2;
        const sx = Math.cos(a) * 95;
        const sy = Math.sin(a) * 55;
        const active = phase !== "ingest" && (i <= slotOn || phase === "publish");
        drawPolyRound(
          ctx,
          sx - 22,
          sy - 12,
          44,
          24,
          6,
          active ? C.slotOn : C.slotOff,
          C.outline
        );
        ctx.fillStyle = C.outline;
        ctx.font = "bold 8px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(this.slots[i], sx, sy + 3);
      }

      drawPolyRound(ctx, -70, -55, 140, 110, 10, C.hub, C.hubStroke);

      const winW = 120;
      const winH = 78;
      drawPolyRound(ctx, -winW / 2, -winH / 2 - 8, winW, winH, 6, "#fff", C.outline);
      drawPolyRound(ctx, -winW / 2, -winH / 2 - 8, winW, 18, [6, 6, 0, 0], "#e2e8f0", C.outline);

      if (phase === "ingest") {
        drawPolyRound(ctx, -40, -20, 80, 8, 2, "#cbd5e1", null);
      } else if (phase === "compose") {
        drawPolyRound(ctx, -48, -18, 36, 28, 4, "#c4b5fd", C.outline);
        drawPolyRound(ctx, -6, -18, 36, 28, 4, "#93c5fd", C.outline);
        drawPolyRound(ctx, 18, -18, 30, 28, 4, "#a7f3d0", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px sans-serif";
        ctx.fillText("Site", 0, 8);
      } else if (phase === "publish" || phase === "reset") {
        this.publishWave = Math.min(1, this.publishWave + 0.04);
        for (let r = 0; r < 3; r++) {
          const rad = 40 + r * 22 + (frame % 30) * 0.6;
          ctx.strokeStyle = `rgba(139, 92, 246, ${0.35 - r * 0.1})`;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.arc(0, 10, rad, 0, Math.PI * 2);
          ctx.stroke();
        }
        drawPolyRound(ctx, -52, 18, 104, 22, 8, C.site, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 10px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("workspace/site-preview", 0, 32);
      }

      if (phase === "reset") this.publishWave = 0;
      ctx.restore();
    }
  }

  class GovernanceShield {
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      if (prg < 150) return;
      const pulse = 0.85 + Math.sin(frame * 0.08) * 0.08;
      ctx.save();
      ctx.translate(210, -70);
      ctx.scale(pulse, pulse);
      ctx.fillStyle = "rgba(16, 185, 129, 0.15)";
      ctx.beginPath();
      ctx.moveTo(0, -28);
      ctx.lineTo(24, -12);
      ctx.lineTo(24, 14);
      ctx.quadraticCurveTo(0, 32, -24, 14);
      ctx.lineTo(-24, -12);
      ctx.closePath();
      ctx.fill();
      ctx.strokeStyle = C.mcp;
      ctx.lineWidth = 2;
      ctx.stroke();
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("RBAC", 0, 4);
      ctx.restore();
    }
  }

  class ParallelTaskLanes {
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      if (prg < 40) return;
      const lanes = [-140, -70, 0, 70];
      ctx.save();
      ctx.translate(-260, -120);
      lanes.forEach((lx, i) => {
        const bob = Math.sin(frame * 0.05 + i) * 3;
        drawPolyRound(ctx, lx, bob, 48, 10, 3, ["#fef3c7", "#d1fae5", "#dbeafe", "#fce7f3"][i], C.outline);
      });
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("4 ветки Codex", -140, 22);
      ctx.restore();
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs, targetX, targetY) {
      this.x = x;
      this.y = y;
      this.baseX = x;
      this.baseY = y;
      this.color = color;
      this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
      this.targetX = targetX;
      this.targetY = targetY;
      this.hitAnimation = 0;
    }

    draw(ctx) {
      this.timer += 0.03;
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;
      const prg = (frame * 0.04) % 240;

      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const localPrg = prg - this.stepTrig;
        if (localPrg < 12) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          const t = localPrg / 12;
          this.x = this.baseX + (this.targetX - this.baseX) * t;
          this.y = this.baseY + (this.targetY - this.baseY) * t;
        } else if (localPrg < 18) {
          this.x = this.targetX;
          this.y = this.targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          const t = (localPrg - 18) / 10;
          this.x = this.targetX - (this.targetX - this.baseX) * t;
          this.y = this.targetY - (this.targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 ? this.color : null;
      }

      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        const rnd = this.dialogs[Math.floor(Math.random() * this.dialogs.length)];
        createBubble(this.x, this.y - 24, rnd, 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);

      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";

      let legL = 0,
        legR = 0;
      if (isMoving) {
        const walkPhase = this.timer * 6;
        legL = Math.sin(walkPhase) * 5;
        legR = Math.sin(walkPhase + Math.PI) * 5;
      }
      drawPolyRound(ctx, -10, -5 + Math.max(0, legL), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, -12, 5 + Math.max(0, legL), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, 2, -5 + Math.max(0, legR), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, 0, 5 + Math.max(0, legR), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);

      const hx = 0,
        hy = -28 - bob;
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
        ctx.moveTo(hx - 8, hy - 10);
        ctx.lineTo(hx - 12, hy - 18);
        ctx.lineTo(hx + 8, hy - 14);
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
  const ring = new McpPulseRing();
  const core = new PluginOrchestratorCore();
  const shield = new GovernanceShield();
  const lanes = new ParallelTaskLanes();

  entities.push(lanes);
  entities.push(ring);
  entities.push(core);
  entities.push(shield);

  entities.push(
    new Agent(
      -280,
      90,
      C.agentYellow,
      "1_architect",
      18,
      ["Какой плагин на продажи?", "Skill-пакет готов", "Роль без кода"],
      -120,
      -30
    )
  );
  entities.push(
    new Agent(
      -220,
      140,
      C.agentGreen,
      "2_seo",
      52,
      ["MCP к amoCRM", "Дашборд +110% WoW", "Не в личный ChatGPT"],
      -200,
      50
    )
  );
  entities.push(
    new Agent(
      -60,
      100,
      C.agentBlue,
      "3_coder",
      88,
      ["110 skills в пакете", "Собираю Site без фронта", "Параллельно 4 задачи"],
      -20,
      -50
    )
  );
  entities.push(
    new Agent(
      40,
      150,
      C.agentPink,
      "4_designer",
      124,
      ["Annotation на виджет", "Превью дашборда", "Figma → Site"],
      100,
      40
    )
  );
  entities.push(
    new Agent(
      120,
      70,
      C.agentPurple,
      "5_deployer",
      162,
      ["Governance: RBAC", "URL в workspace", "Не сливать договор в чат"],
      180,
      -40
    )
  );

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    const prg = (frame * 0.04) % 240;
    if (prg >= 8 && prg < 8.08) createBubble(-200, -60, "MCP: CRM + 1С", 240);
    if (prg >= 48 && prg < 48.08) createBubble(-40, -80, "Плагин: Sales", 240);
    if (prg >= 98 && prg < 98.08) createBubble(0, -100, "Site preview → URL", 260);
    if (prg >= 158 && prg < 158.08) createBubble(180, -90, "RBAC включён", 240);
    if (prg >= 188 && prg < 188.08) createBubble(-120, -100, "Оркестратор задач", 260);

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

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
      const by = bub.y - (bub.maxLife - bub.life) * 0.05;
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

  document.fonts.ready.then(() => engineloop());
});
</script>

<section class="openai-codex-intro-section reveal" aria-label="Введение">
  <div class="openai-codex-intro-grid">
    <div class="openai-codex-intro-text">
      <p class="openai-codex-intro-kicker">Релиз 2 июня 2026</p>
      <div class="ym-lead-box">
        <p><strong>Коротко:</strong> OpenAI расширила Codex за пределы разработки: шесть ролевых плагинов (62 приложения, 110 skills), preview Sites для внутренних дашбордов и точечные Annotations. Для российского SMB разумнее не ждать Enterprise, а собрать аналог на Cursor + MCP + Make/n8n с собственным governance — так же, как это делает Nero Network для клиентов.</p>
      </div>
      <p>Ниже — что изменилось в продукте, где ломается сценарий для РФ и как собрать «контур Codex» на своём хостинге без отдела разработки.</p>
    </div>
    <div class="openai-codex-intro-deco reveal-right delay-200">
      <div class="ym-mac-window">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">codex-workspace — snapshot</span>
        </div>
        <div class="ym-mac-body">
          <span class="ym-command">$</span> codex status --knowledge-work<br>
          <span class="ym-comment"># WAU 5M+ · plugins: 6 · sites: preview</span><br>
          <span class="ym-command">→</span> role: sales + mcp: amoCRM<br>
          <span class="ym-command">→</span> parallel_tasks: 4 active<br>
          <span class="ym-command">→</span> governance: RBAC pending
        </div>
      </div>
      <div class="openai-codex-kpi-chips" aria-label="Метрики релиза">
        <span>5M+ WAU</span><span>20% не-dev</span><span>62 apps</span><span>110 skills</span><span>Sites preview</span>
      </div>
    </div>
  </div>
</section>

<div class="openai-codex-toc-wrap reveal">
  <div class="ym-container">
    <nav class="ym-toc" aria-label="Оглавление">
      <a href="#chto-annonsirovala">Релиз Codex</a>
      <a href="#rolevye-plaginy">Плагины по ролям</a>
      <a href="#codex-sites">Codex Sites</a>
      <a href="#codex-vs-chatgpt">Codex vs ChatGPT</a>
      <a href="#povtorit-v-rossii">Аналог в РФ</a>
      <a href="#governance">Governance</a>
      <a href="#stoimost">Стоимость</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</div>

<section class="ym-section reveal">

<div class="ym-container ym-content-prose">

<h2 id="chto-annonsirovala">Что OpenAI анонсировала 2 июня 2026: Codex для knowledge work</h2>

<p><strong>Определение:</strong> Codex — агентная среда OpenAI, где модель не только отвечает в чате, а выполняет многошаговые задачи с файлами, инструментами и интеграциями. Релиз 2 июня 2026 позиционирует Codex как платформу для <strong>knowledge work</strong> — офисных ролей вне отдела разработки.</p>

<h3>Цифры: 5+ млн WAU, ~20% не разработчики</h3>

<p>По отчёту OpenAI «The Next Era of Knowledge Work» (тот же день, что и релиз плагинов):</p>

<ul>
  <li><strong>5+ млн</strong> еженедельных активных пользователей (WAU) Codex; рост <strong>более чем в 6 раз</strong> с запуска desktop-приложения в феврале 2026. — <a href="https://openai.com/index/codex-for-knowledge-work/" target="_blank" rel="noopener noreferrer">OpenAI — Codex for knowledge work</a></li>
  <li>Около <strong>20%</strong> пользователей — <strong>knowledge workers</strong> (не разработчики); этот сегмент растёт <strong>более чем в 3 раза быстрее</strong>, чем разработчики. — <a href="https://www.axios.com/2026/06/02/openai-codex-knowledge-workers" target="_blank" rel="noopener noreferrer">Axios, 02.06.2026</a></li>
  <li><strong>72%</strong> knowledge workers еженедельно создают артефакты: отчёты, мемо, контракты, PDF, таблицы, медиа. — <a href="https://www.helpnetsecurity.com/2026/06/02/openai-codex-knowledge-work/" target="_blank" rel="noopener noreferrer">Help Net Security</a></li>
  <li>Самый быстрый рост задач: <strong>data analysis +110%</strong> week-over-week, research <strong>+37%</strong>; работа с PDF и таблицами — <strong>+50% и выше</strong>.</li>
  <li><strong>Более 60%</strong> пользователей ведут <strong>несколько задач Codex параллельно</strong>.</li>
</ul>

<p>Аналитики Axios формулируют сдвиг так: OpenAI пытается переосмыслить Codex «из инструмента для разработчиков в нечто ближе к <strong>операционной системе для knowledge work</strong>». Для владельца бизнеса это сигнал: конкуренты уже строят <strong>ролевые контуры</strong> с интеграциями.</p>

<div class="ym-bento-grid reveal delay-100" aria-label="Ключевые метрики">
  <div class="ym-bento-card ym-bento-main">
    <div class="ym-stat-value">5M+</div>
    <div class="ym-stat-label">еженедельных активных пользователей Codex</div>
    <span class="ym-stat-trend">×6 с февраля 2026</span>
  </div>
  <div class="ym-bento-card ym-bento-stat">
    <div class="ym-stat-value">20%</div>
    <div class="ym-stat-label">knowledge workers (не разработчики)</div>
  </div>
  <div class="ym-bento-card ym-bento-stat">
    <div class="ym-stat-value">72%</div>
    <div class="ym-stat-label">создают артефакты еженедельно</div>
  </div>
  <div class="ym-bento-card ym-bento-wide">
    <div class="ym-stat-value">+110%</div>
    <div class="ym-stat-label">рост задач data analysis (WoW)</div>
  </div>
</div>

<h3>Плагины vs Skills vs MCP в экосистеме Codex</h3>

<p>В терминологии OpenAI <strong>плагин</strong> — упакованный набор для роли: <strong>приложения (apps)</strong>, <strong>skills</strong>, <strong>workflows</strong> и <strong>MCP</strong> как мост к внешним системам. Установка — из Codex plugin directory; на тарифах Business/Enterprise администраторы управляют app permissions. — <a href="https://openai.com/index/codex-for-every-role-tool-workflow/" target="_blank" rel="noopener noreferrer">OpenAI — Codex for every role</a></p>

<p><strong>Итог блока:</strong> Codex перестаёт быть «IDE для кода» и становится <strong>рабочим столом роли</strong> — с контролируемыми интеграциями, а не с копипастой из личного чата.</p>

<h2 id="rolevye-plaginy">Ролевые плагины Codex: продажи, аналитика, маркетинг</h2>

<p><strong>Коротко:</strong> шесть плагинов на старте, 62 приложения и 110 skills в сумме; скоро — Corporate Finance, Legal и открытая экосистема партнёрских плагинов.</p>

<h3>62 приложения и типовые сценарии (Salesforce, HubSpot, Figma, Slack)</h3>

<table>
  <thead>
    <tr><th>Плагин</th><th>Ключевые SaaS</th><th>Типовые сценарии</th></tr>
  </thead>
  <tbody>
    <tr><td>Data analytics</td><td>Snowflake, Databricks, Hex, Tableau</td><td>Дашборды, ad hoc-анализ</td></tr>
    <tr><td>Creative production</td><td>Figma, Canva, Shutterstock</td><td>Креативы, брифы, медиа</td></tr>
    <tr><td>Sales</td><td>Salesforce, HubSpot, Slack, Outreach</td><td>Пайплайн сделок, CRM-контекст</td></tr>
    <tr><td>Product design</td><td>Figma, Canva</td><td>Прототипы, UX-итерации</td></tr>
    <tr><td>Public equity / IB</td><td>FactSet, PitchBook, Moody's</td><td>Research, due diligence</td></tr>
  </tbody>
</table>

<p>— <a href="https://venturebeat.com/orchestration/openais-codex-update-lets-agents-build-interactive-enterprise-workspaces-via-sites-and-role-specific-plugins" target="_blank" rel="noopener noreferrer">VentureBeat</a>, OpenAI</p>

<ul>
  <li><strong>Zapier:</strong> Codex подтягивает контекст из Slack, Google Docs, Coda → postmortems, incident plans.</li>
  <li><strong>NVIDIA:</strong> <strong>10 000</strong> сотрудников на Codex; sandbox VM для auditability. — <a href="https://openai.com/index/nvidia/" target="_blank" rel="noopener noreferrer">OpenAI/NVIDIA</a></li>
</ul>

<h3>Кому подходит Business/Enterprise и чего ждать обычному SMB</h3>

<ul>
  <li>Плагины доступны в <strong>supported regions</strong> — не во всех странах.</li>
  <li><strong>Governance</strong> — Business и Enterprise.</li>
  <li>Тарифы <strong>Plus/Pro</strong> дают Codex, но <strong>без</strong> enterprise plugin governance и <strong>без Sites</strong>.</li>
</ul>

<p>Для компании на 20–200 человек в РФ типичный разрыв: в пресс-релизе — Salesforce и Snowflake, в реальности — <strong>amoCRM, Битрикс24, 1С, Telegram, Яндекс Таблицы</strong>. Ценность — в <strong>сборке ролевого skill + MCP</strong> под ваш стек.</p>

<h2 id="codex-sites">Codex Sites: внутренние дашборды и хабы без фронтенд-команды</h2>

<p><strong>Определение:</strong> Sites — интерактивные веб-приложения (дашборды, scenario planners, project boards), которые Codex <strong>создаёт, хостит у OpenAI</strong> и отдаёт <strong>URL в workspace</strong>.</p>

<h3>Preview, хостинг OpenAI, шаринг по URL</h3>

<ul>
  <li>Режим: <strong>preview</strong> (на июнь 2026).</li>
  <li>Доступ: <strong>Business + Enterprise</strong>.</li>
  <li>Партнёры: Wix, Base44, Replit, Lovable, Figma, Webflow, Emergent.</li>
</ul>

<p><strong>Annotations</strong> (тот же релиз): точечное выделение фрагмента и правка <strong>без пересборки</strong> всего артефакта.</p>

<h3>Ограничения для компаний в РФ (доступ, данные, партнёры Wix/Replit)</h3>

<table>
  <thead>
    <tr><th>Ограничение</th><th>Практический эффект для РФ-бизнеса</th></tr>
  </thead>
  <tbody>
    <tr><td>Хостинг на инфраструктуре OpenAI</td><td>Вопросы <strong>152-ФЗ</strong> и трансграничной передачи</td></tr>
    <tr><td>Preview, не on-prem</td><td>Нельзя развернуть Sites в закрытом контуре</td></tr>
    <tr><td>Региональная доступность</td><td>Часть функций может быть недоступна без VPN</td></tr>
    <tr><td>Западный SaaS в плагинах</td><td>Salesforce/HubSpot слабо применимы к типичному SMB</td></tr>
  </tbody>
</table>

<p><strong>Аналог для РФ:</strong> внутренний «Site» на <strong>WordPress</strong> (<code>page-{slug}.php</code>) + агент Cursor, который обновляет блоки через Make/n8n.</p>

<h2 id="codex-vs-chatgpt">Чем Codex отличается от ChatGPT и «просто нейросети в браузере»</h2>

<h3>Агент vs чат: файлы, инструменты, итерации</h3>

<table>
  <thead>
    <tr><th>Критерий</th><th>ChatGPT в браузере</th><th>Codex workspace</th></tr>
  </thead>
  <tbody>
    <tr><td>Модель ответа</td><td>Диалог, один поток</td><td>Многошаговые задачи, параллельные сессии</td></tr>
    <tr><td>Файлы и артефакты</td><td>Загрузка в чат</td><td>Рабочая среда, версии, Sites</td></tr>
    <tr><td>Интеграции</td><td>Ограниченные GPTs</td><td>Ролевые плагины, MCP, 62 apps</td></tr>
    <tr><td>Параллельность</td><td>Обычно одна ветка</td><td><strong>&gt;60%</strong> — несколько задач сразу</td></tr>
    <tr><td>Governance</td><td>Личный аккаунт = риск</td><td>Admin permissions (Business+)</td></tr>
  </tbody>
</table>

<p><strong>Коротко:</strong> ChatGPT закрывает вопрос «что ответить»; Codex — «<strong>сделай</strong> отчёт, дашборд, мемо с контекстом CRM».</p>

<section
  id="openai-codex-plugins-sites-dlya-biznesa-boris-block"
  class="boris-article-viz ym-section reveal"
  aria-label="Сравнение контуров AI для офиса"
>
<style>
#openai-codex-plugins-sites-dlya-biznesa-boris-block {
  --boris-bg: #f8fafc;
  --boris-card: #ffffff;
  --boris-border: #e2e8f0;
  --boris-text: #334155;
  --boris-heading: #0f172a;
  --boris-accent: #2563eb;
  --boris-warn: #dc2626;
  --boris-ok: #059669;
  --boris-codex: #7c3aed;
  --boris-diy: #0d9488;
  padding: clamp(48px, 6vw, 72px) 0;
  background: var(--boris-bg);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-shell {
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 clamp(16px, 3vw, 28px);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-card {
  display: grid;
  grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
  gap: clamp(24px, 4vw, 40px);
  align-items: stretch;
  background: var(--boris-card);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
  padding: clamp(24px, 4vw, 40px);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-eyebrow {
  margin: 0 0 10px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--boris-accent) !important;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-kicker {
  margin: 0 0 14px;
  font-size: clamp(22px, 2.6vw, 28px);
  line-height: 1.25;
  color: var(--boris-heading) !important;
  font-weight: 800;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-lead {
  margin: 0 0 18px;
  font-size: 15px;
  line-height: 1.65;
  color: var(--boris-text) !important;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-points {
  margin: 0 0 20px;
  padding-left: 1.15rem;
  color: var(--boris-text) !important;
  font-size: 14px;
  line-height: 1.55;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-points li { margin-bottom: 8px; }
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 16px;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: #eff6ff;
  color: #1e40af !important;
  border: 1px solid #bfdbfe;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-bridge {
  margin: 0;
  font-size: 13px;
  color: #64748b !important;
  font-style: italic;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-viz-col {
  display: flex;
  flex-direction: column;
  min-height: 420px;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 12px;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tab {
  flex: 1 1 auto;
  min-width: 90px;
  border: 1px solid var(--boris-border);
  background: #f1f5f9;
  color: var(--boris-heading) !important;
  font-size: 12px;
  font-weight: 700;
  padding: 10px 12px;
  border-radius: 12px;
  cursor: pointer;
  transition: background 0.2s, border-color 0.2s, transform 0.15s;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tab:hover {
  border-color: #94a3b8;
  transform: translateY(-1px);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tab.is-active {
  background: #fff;
  border-color: var(--boris-accent);
  box-shadow: 0 4px 14px rgba(37, 99, 235, 0.15);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tab[data-stack="codex"].is-active {
  border-color: var(--boris-codex);
  box-shadow: 0 4px 14px rgba(124, 58, 237, 0.18);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-tab[data-stack="diy"].is-active {
  border-color: var(--boris-diy);
  box-shadow: 0 4px 14px rgba(13, 148, 136, 0.18);
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-canvas-wrap {
  position: relative;
  flex: 1;
  min-height: 380px;
  border-radius: 16px;
  border: 1px solid var(--boris-border);
  background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 100%);
  overflow: hidden;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 380px;
  cursor: pointer;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-hint {
  margin: 10px 0 0;
  font-size: 12px;
  color: #64748b !important;
  text-align: center;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-legend {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 8px;
  margin-top: 12px;
  font-size: 11px;
  color: var(--boris-text) !important;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-legend span {
  display: flex;
  align-items: center;
  gap: 6px;
}
#openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  flex-shrink: 0;
}
@media (max-width: 1023px) {
  #openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-card {
    grid-template-columns: 1fr;
  }
  #openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-viz-col {
    min-height: 360px;
  }
}
@media (max-width: 767px) {
  #openai-codex-plugins-sites-dlya-biznesa-boris-block .boris-legend {
    grid-template-columns: 1fr;
  }
}
</style>

  <div class="boris-shell ym-container">
    <div class="boris-card">
      <div class="boris-copy">
        <p class="boris-eyebrow">Сравнение контуров</p>
        <h3 class="boris-kicker">Три способа дать офису «агента», а не только чат</h3>
        <p class="boris-lead">
          Нажмите вкладку или колонку на схеме: увидите, где обрывается интеграция, где появляется governance и как DIY-стек Nero Network закрывает РФ-стек без Enterprise OpenAI.
        </p>
        <ul class="boris-points">
          <li><strong>ChatGPT</strong> — ответ в диалоге, риск «теневого» чата с договорами.</li>
          <li><strong>Codex</strong> — параллельные задачи, плагины, Sites на инфраструктуре OpenAI.</li>
          <li><strong>DIY</strong> — Cursor + MCP (CRM, 1С) + Make/n8n + свой Site на вашем хостинге.</li>
        </ul>
        <div class="boris-pills" aria-hidden="true">
          <span class="boris-pill">&gt;60% — несколько задач (Axios)</span>
          <span class="boris-pill">62 apps / 110 skills</span>
          <span class="boris-pill">152-ФЗ → свой хостинг</span>
        </div>
        <p class="boris-bridge">Дальше разберём пошаговую сборку DIY-контура для российского SMB.</p>
      </div>

      <div class="boris-viz-col">
        <div class="boris-tabs" role="tablist" aria-label="Выбор контура">
          <button type="button" class="boris-tab is-active" data-stack="chat" role="tab" aria-selected="true">ChatGPT</button>
          <button type="button" class="boris-tab" data-stack="codex" role="tab" aria-selected="false">Codex</button>
          <button type="button" class="boris-tab" data-stack="diy" role="tab" aria-selected="false">DIY РФ</button>
        </div>
        <div class="boris-canvas-wrap">
          <canvas
            id="openai-codex-boris-stack-canvas"
            width="640"
            height="420"
            aria-label="Интерактивная схема: ChatGPT, Codex workspace и DIY Cursor MCP"
          ></canvas>
        </div>
        <p class="boris-hint">Клик по колонке на схеме переключает контур</p>
        <div class="boris-legend" aria-hidden="true">
          <span><i class="boris-dot" style="background:#94a3b8"></i> Один поток</span>
          <span><i class="boris-dot" style="background:#7c3aed"></i> Workspace + SaaS</span>
          <span><i class="boris-dot" style="background:#0d9488"></i> MCP + аудит</span>
        </div>
      </div>
    </div>
  </div>

<script>
(function () {
  "use strict";
  var canvas = document.getElementById("openai-codex-boris-stack-canvas");
  if (!canvas) return;
  var section = document.getElementById("openai-codex-plugins-sites-dlya-biznesa-boris-block");
  var ctx = canvas.getContext("2d");
  var stacks = ["chat", "codex", "diy"];
  var active = "chat";
  var frame = 0;
  var particles = [];
  var cw = 640, ch = 420;

  var COL = {
    chat: { main: "#64748b", soft: "#e2e8f0", label: "ChatGPT в браузере" },
    codex: { main: "#7c3aed", soft: "#ede9fe", label: "Codex workspace" },
    diy: { main: "#0d9488", soft: "#ccfbf1", label: "DIY: Cursor + MCP" }
  };

  function resize() {
    var wrap = canvas.parentElement;
    if (!wrap) return;
    var w = wrap.clientWidth || 640;
    var h = Math.max(380, Math.min(520, w * 0.62));
    canvas.width = w;
    canvas.height = h;
    cw = w;
    ch = h;
  }

  function stackIndex(s) {
    return stacks.indexOf(s);
  }

  function colX(i) {
    var pad = cw * 0.06;
    var usable = cw - pad * 2;
    return pad + (usable / 3) * (i + 0.5);
  }

  function drawRoundRect(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else ctx.rect(x, y, w, h);
    ctx.fillStyle = fill;
    ctx.fill();
    if (stroke) {
      ctx.strokeStyle = stroke;
      ctx.lineWidth = 2;
      ctx.stroke();
    }
  }

  function drawNode(x, y, label, sub, color, glow) {
    var nw = Math.min(150, cw / 3.8);
    var nh = 52;
    ctx.save();
    if (glow) {
      ctx.shadowColor = color;
      ctx.shadowBlur = 18;
    }
    drawRoundRect(x - nw / 2, y - nh / 2, nw, nh, 12, "#ffffff", color);
    ctx.shadowBlur = 0;
    ctx.fillStyle = "#0f172a";
    ctx.font = "bold 12px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(label, x, y - 4);
    if (sub) {
      ctx.fillStyle = "#64748b";
      ctx.font = "10px Inter, system-ui, sans-serif";
      ctx.fillText(sub, x, y + 14);
    }
    ctx.restore();
  }

  function drawArrow(x1, y1, x2, y2, color, dashed) {
    ctx.save();
    ctx.strokeStyle = color;
    ctx.lineWidth = 2;
    if (dashed) ctx.setLineDash([6, 6]);
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
    var ang = Math.atan2(y2 - y1, x2 - x1);
    var ax = 8;
    ctx.beginPath();
    ctx.moveTo(x2, y2);
    ctx.lineTo(x2 - ax * Math.cos(ang - 0.4), y2 - ax * Math.sin(ang - 0.4));
    ctx.lineTo(x2 - ax * Math.cos(ang + 0.4), y2 - ax * Math.sin(ang + 0.4));
    ctx.closePath();
    ctx.fillStyle = color;
    ctx.fill();
    ctx.restore();
  }

  function spawnParticle(stackKey) {
    if (stackKey !== "diy" && active !== "diy") return;
    var i = 2;
    var x0 = colX(0);
    var y0 = ch * 0.72;
    var x3 = colX(2);
    particles.push({
      t: 0,
      x: x0,
      y: y0,
      tx: x3,
      ty: ch * 0.32,
      color: COL.diy.main
    });
  }

  function drawColumn(i, key) {
    var x = colX(i);
    var isOn = active === key;
    var pal = COL[key];
    var top = ch * 0.14;
    var colW = Math.min(170, cw / 3.4);
    ctx.save();
    ctx.globalAlpha = isOn ? 1 : 0.42;
    drawRoundRect(x - colW / 2, top, colW, ch * 0.78, 16, isOn ? pal.soft : "#f8fafc", isOn ? pal.main : "#cbd5e1");
    ctx.globalAlpha = 1;
    ctx.fillStyle = isOn ? pal.main : "#94a3b8";
    ctx.font = "bold 11px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(pal.label, x, top + 22);
    ctx.restore();

    var y1 = ch * 0.32;
    var y2 = ch * 0.5;
    var y3 = ch * 0.68;

    if (key === "chat") {
      drawNode(x, y1, "Промпт", "один поток", pal.main, isOn);
      drawNode(x, y2, "Ответ в чате", "без CRM", pal.main, isOn);
      drawNode(x, y3, "Риск утечки", "личный аккаунт", "#dc2626", isOn);
      if (isOn) {
        drawArrow(x, y1 + 28, x, y2 - 28, pal.main, false);
        drawArrow(x, y2 + 28, x, y3 - 28, "#dc2626", true);
      }
    } else if (key === "codex") {
      drawNode(x, y1, "Плагины", "62 apps", pal.main, isOn);
      drawNode(x, y2, "Параллель", ">60% users", pal.main, isOn);
      drawNode(x, y3, "Sites", "хостинг OpenAI", pal.main, isOn);
      if (isOn) {
        drawArrow(x, y1 + 28, x, y2 - 28, pal.main, false);
        drawArrow(x, y2 + 28, x, y3 - 28, pal.main, false);
      }
    } else {
      drawNode(x, y1, "Cursor", "skills", pal.main, isOn);
      drawNode(x, y2, "MCP", "CRM · 1С", pal.main, isOn);
      drawNode(x, y3, "Make/n8n", "аудит логов", pal.main, isOn);
      if (isOn) {
        drawArrow(x, y1 + 28, x, y2 - 28, pal.main, false);
        drawArrow(x, y2 + 28, x, y3 - 28, pal.main, false);
        drawRoundRect(x - 36, ch * 0.78, 72, 22, 8, "#ecfdf5", pal.main);
        ctx.fillStyle = pal.main;
        ctx.font="bold 10px Inter, system-ui, sans-serif";
        ctx.fillText("свой WP-Site", x, ch * 0.78 + 14);
      }
    }
  }

  function drawBridge() {
    if (active !== "diy") return;
    var x1 = colX(0);
    var x2 = colX(2);
    var y = ch * 0.42;
    drawArrow(x1 + 60, y, x2 - 60, y, COL.diy.main, true);
    ctx.fillStyle = "#0f172a";
    ctx.font = "10px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("оркестратор-человек утверждает выход", (x1 + x2) / 2, y - 10);
  }

  function tickParticles() {
    for (var i = particles.length - 1; i >= 0; i--) {
      var p = particles[i];
      p.t += 0.018;
      p.x += (p.tx - p.x) * 0.04;
      p.y += (p.ty - p.y) * 0.04;
      ctx.beginPath();
      ctx.arc(p.x, p.y, 4, 0, Math.PI * 2);
      ctx.fillStyle = p.color;
      ctx.fill();
      if (p.t > 1.2) particles.splice(i, 1);
    }
  }

  function render() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.fillStyle = "rgba(248,250,252,0.6)";
    ctx.fillRect(0, 0, cw, ch);

    for (var i = 0; i < stacks.length; i++) {
      drawColumn(i, stacks[i]);
    }
    drawBridge();
    tickParticles();

    if (frame % 40 === 0 && active === "diy") spawnParticle("diy");

    ctx.fillStyle = "#64748b";
    ctx.font = "11px Inter, system-ui, sans-serif";
    ctx.textAlign = "left";
    var badge = active === "chat" ? "Нет audit trail" : active === "codex" ? "Admin permissions (Business+)" : "RBAC + логи MCP";
    ctx.fillText(badge, 12, ch - 14);

    requestAnimationFrame(render);
  }

  function setActive(key) {
    if (!COL[key]) return;
    active = key;
    var tabs = section ? section.querySelectorAll(".boris-tab") : [];
    for (var t = 0; t < tabs.length; t++) {
      var on = tabs[t].getAttribute("data-stack") === key;
      tabs[t].classList.toggle("is-active", on);
      tabs[t].setAttribute("aria-selected", on ? "true" : "false");
    }
  }

  function hitTest(mx, my) {
    var pad = cw * 0.06;
    var usable = cw - pad * 2;
    var colW = usable / 3;
    var idx = Math.floor((mx - pad) / colW);
    if (idx < 0 || idx > 2) return;
    setActive(stacks[idx]);
  }

  if (section) {
    section.addEventListener("click", function (e) {
      var tab = e.target.closest(".boris-tab");
      if (tab && tab.getAttribute("data-stack")) {
        setActive(tab.getAttribute("data-stack"));
      }
    });
  }

  canvas.addEventListener("click", function (e) {
    var r = canvas.getBoundingClientRect();
    var mx = (e.clientX - r.left) * (canvas.width / r.width);
    var my = (e.clientY - r.top) * (canvas.height / r.height);
    hitTest(mx, my);
  });

  window.addEventListener("resize", resize);
  resize();
  setActive("chat");
  render();
})();
</script>
</section>

<h3>Сравнение с Claude Cowork и корпоративными агентами</h3>

<p><strong>Claude Cowork / Workspace Agents</strong> — зрелая линия enterprise-агентов; релиз Codex 2 июня — ответ на Cowork. — <a href="https://techcrunch.com/2026/06/02/openai-launches-new-codex-tools-for-white-collar-work/" target="_blank" rel="noopener noreferrer">TechCrunch, 02.06.2026</a></p>

<table>
  <thead>
    <tr><th>Платформа</th><th>Сильная сторона</th><th>Слабое место для РФ-SMB</th></tr>
  </thead>
  <tbody>
    <tr><td>Codex + Sites</td><td>Экосистема плагинов, NVIDIA/Zapier</td><td>Enterprise-цена, хостинг Sites не у вас</td></tr>
    <tr><td>Claude Cowork</td><td>Корпоративные внедрения</td><td>Западный контур данных</td></tr>
    <tr><td>DIY: Cursor + MCP + Make/n8n</td><td>Ваш CRM, 1С, Telegram</td><td>Нужна сборка и обучение</td></tr>
  </tbody>
</table>

<p><strong>OpenAI Deployment Company</strong> (май 2026): <strong>$4B+</strong>, ~150 forward deployed engineers — внедрение Codex в процессы клиента. Это зеркало для Nero Network: <strong>встраивать агентов в процессы</strong> — доступнее для среднего бизнеса РФ.</p>

<h2 id="povtorit-v-rossii">Как повторить Codex в российском бизнесе: Cursor + MCP + Make/n8n</h2>

<p><strong>Тезис:</strong> «Контур Codex без Codex Enterprise» — реалистичная цель за 2–6 недель пилота при дисциплине governance.</p>

<h3>Ролевые сценарии без Enterprise OpenAI</h3>

<ol>
  <li><strong>Daily brief</strong> — сводка почты, CRM, календаря к 09:00 МСК в Telegram.</li>
  <li><strong>Weekly manager update</strong> — статус инициатив, риски, метрики.</li>
  <li><strong>Initiative brief</strong> — one-pager перед совещанием.</li>
  <li><strong>Leadership packet</strong> — слайды/мемо для руководства.</li>
  <li><strong>Workflow audit</strong> — где команда теряет время между системами.</li>
</ol>

<p>В Cursor каждый сценарий — <strong>отдельный skill</strong>, аналог <strong>110 skills</strong> в плагине OpenAI.</p>

<h3>MCP к CRM, таблицам, 1С, мессенджерам</h3>

<table>
  <thead>
    <tr><th>Западный app в плагине Codex</th><th>Замена в РФ-стеке</th></tr>
  </thead>
  <tbody>
    <tr><td>Salesforce / HubSpot</td><td>amoCRM, Битрикс24 + MCP</td></tr>
    <tr><td>Snowflake</td><td>1С, PostgreSQL + Metabase</td></tr>
    <tr><td>Slack</td><td>Telegram, корп. мессенджер</td></tr>
    <tr><td>Sites на OpenAI</td><td>WordPress-хаб, внутренний портал</td></tr>
  </tbody>
</table>

<p><strong>MCP для 1С:</strong> open-source и коммерческий ARQA — работают с <strong>Cursor/Codex/Claude</strong>. — <a href="https://arqa.cc/ru/mcp-server" target="_blank" rel="noopener noreferrer">arqa.cc</a></p>

<h3>Оркестрация Make/n8n и human-in-the-loop</h3>

<ul>
  <li><strong>Make / n8n</strong> — cron, webhooks из CRM, постановка задач агенту.</li>
  <li><strong>Human-in-the-loop</strong> — финансовые цифры подписывает человек.</li>
  <li><strong>Параллельные задачи</strong> — четыре ветки Cursor с общим wiki-контекстом.</li>
</ul>

<p><strong>Схема контура Nero Network:</strong> оркестратор-человек → агент Cursor → MCP (CRM, 1С, почта) → Make/n8n → внутренний Site (WP) → аудит логов.</p>

<aside class="ym-section ym-cta-primary reveal" aria-label="Заявка Nero Network">
  <div class="ym-container">
    <div class="ym-card" style="max-width: 920px; margin: 0 auto; padding: clamp(28px, 4vw, 40px); border-left: 4px solid var(--ym-primary);">
      <p style="margin: 0 0 8px; font-size: 13px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ym-primary) !important;">Nero Network</p>
      <h3 class="ym-section-title" style="text-align: left; font-size: clamp(22px, 3vw, 28px); margin-bottom: 12px;">Соберём ролевой контур Codex под ваш стек</h3>
      <p style="margin: 0 0 20px; color: var(--ym-text) !important; line-height: 1.6;">AI-агенты под отдел, MCP к CRM и 1С, оркестрация Make/n8n и внутренний дашборд — пилот за 2–4 недели с governance.</p>
      <div class="ym-btn-group" style="justify-content: flex-start;">
        <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_primary_cta_label); ?></span></a>
      </div>
    </div>
  </div>
</aside>

<h2 id="governance">Governance: почему нельзя сливать договоры в личный ChatGPT</h2>

<p><strong>Коротко:</strong> ускорение без контроля доступов = утечка; 2 июня 2026 рынок показал два полюса — продуктивность (OpenAI) и compliance (Zip, Workday).</p>

<h3>Кейс Zip (02.06) как контраст</h3>

<p><strong>Zip Superagents + Zip MCP</strong>: сотрудники загружают <strong>контракты в личный ChatGPT</strong>. Northwestern Mutual: <strong>1 400 часов</strong> сэкономлено одним агентом. — <a href="https://venturebeat.com/technology/zips-new-ai-agents-want-to-stop-your-finance-team-from-uploading-contracts-into-personal-chatgpt-accounts" target="_blank" rel="noopener noreferrer">VentureBeat — Zip</a></p>

<h3>RBAC, аудит, корпоративный шлюз, 152-ФЗ</h3>

<p><strong>Workday Agent Passport</strong> (02.06.2026): верификация агентов по OWASP LLM Top 10, NIST AI RMF; совместим с <strong>Codex, Cursor, Claude Code</strong>. — <a href="https://newsroom.workday.com/2026-06-02-Workday-Launches-New-Tools-for-Developers-to-Build,-Connect,-and-Verify-AI-Agents-For-HR,-Finance,-and-IT" target="_blank" rel="noopener noreferrer">Workday</a></p>

<ol>
  <li><strong>Запрет</strong> загрузки первички в личные аккаунты.</li>
  <li><strong>RBAC:</strong> какой отдел видит какие MCP.</li>
  <li><strong>Аудит:</strong> логи вызовов MCP, версии промптов.</li>
  <li><strong>152-ФЗ:</strong> on-prem / Yandex AI Studio для чувствительных данных.</li>
  <li><strong>Аттестация агента</strong> до production.</li>
</ol>

<h2 id="stoimost">Стоимость, доступность и риски внедрения</h2>

<h3>Тарифы Plus/Business/Enterprise vs сборка своего контура</h3>

<table>
  <thead>
    <tr><th>Тариф</th><th>Ориентир</th><th>Codex</th><th>Sites / governance</th></tr>
  </thead>
  <tbody>
    <tr><td>Plus</td><td>~$20/мес</td><td>Да</td><td>Нет</td></tr>
    <tr><td>Pro</td><td>~$100–200/мес</td><td>Да</td><td>Нет</td></tr>
    <tr><td>Business</td><td>~$20–25/seat</td><td>Да</td><td>Да (admin)</td></tr>
    <tr><td>Enterprise</td><td>Custom</td><td>Да</td><td>Да + расширенный контроль</td></tr>
  </tbody>
</table>

<p>— <a href="https://chatgpt.com/codex/pricing" target="_blank" rel="noopener noreferrer">chatgpt.com/codex/pricing</a></p>

<p><strong>Сравнение с DIY:</strong> Cursor + Make/n8n + российская модель + MCP часто <strong>дешевле</strong> для 30–100 сотрудников, чем Enterprise OpenAI.</p>

<h3>Российские альтернативы (Yandex AI Studio, Alice Flash)</h3>

<ul>
  <li><strong>Yandex AI Studio / Alice</strong> — для данных в РФ-облаке.</li>
  <li><strong>Cursor + MCP</strong> — остаётся «руками» команды.</li>
  <li><strong>Гибрид:</strong> чувствительное — on-prem; креатив — Codex/Claude по политике.</li>
</ul>

<h2 id="faq">FAQ: ROI, сроки пилота, кого обучать в команде</h2>

<div class="ym-faq-layout reveal">
  <aside class="ym-faq-sidebar">
    <h3 style="margin-top:0;font-size:18px;">Вопросы</h3>
    <ul class="ym-faq-list">
      <li><a href="#faq-start">С чего начать</a></li>
      <li><a href="#faq-podryadchik">Подрядчик</a></li>
      <li><a href="#faq-ai">Для AI-выдачи</a></li>
    </ul>
  </aside>
  <div>
    <div class="ym-faq-item" id="faq-start">
      <h3>С чего начать отделу продаж / операций / аналитики</h3>
      <p><strong>Продажи:</strong> MCP к amoCRM/Битрикс24 + skill «утренний пайплайн» + Telegram-дайджест.</p>
      <p><strong>Операции:</strong> daily brief + workflow audit раз в квартал.</p>
      <p><strong>Аналитика:</strong> MCP к 1С/PostgreSQL + WP-дашборд вместо Sites.</p>
      <p><strong>Срок пилота:</strong> 2 недели — один сценарий; 4–6 недель — три роли и governance.</p>
    </div>

    <aside class="ym-cta-secondary reveal" aria-label="Обучение команды">
  <div class="ym-container">
    <p style="margin: 0; padding: 20px 24px; background: linear-gradient(135deg, #f8fafc, #ffffff); border: 1px solid var(--ym-border); border-radius: 16px; line-height: 1.6;">
      <strong>Обучение команды:</strong> чтобы сценарии Cursor + MCP не остались «у одного энтузиаста», пройдите практический курс по автоматизации и агентам —
      <a href="<?php echo esc_url($nero_secondary_cta_url); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--ym-accent); font-weight: 600;"><?php echo esc_html($nero_secondary_cta_label); ?></a>.
    </p>
  </div>
</aside>

    <div class="ym-faq-item" id="faq-podryadchik">
      <h3>Когда нужен подрядчик по внедрению агентов</h3>
      <p>Имеет смысл привлекать Nero Network, если нет владельца MCP и безопасности; нужно связать <strong>1С + CRM + мессенджер</strong>; команда получила утечки из «ChatGPT для всех».</p>
      <p><strong>ROI-ориентиры:</strong> Zip — <strong>1 400 часов</strong> на одном агенте; NVIDIA — <strong>10 000</strong> сотрудников на Codex.</p>
    </div>

    <div class="ym-faq-item" id="faq-ai">
      <h3>Вопросы для AI-выдачи</h3>
      <p><strong>Что такое OpenAI Codex для бизнеса?</strong> Агентная среда с плагинами, MCP и Sites; с 2 июня 2026 — шесть ролевых плагинов.</p>
      <p><strong>Чем Codex отличается от ChatGPT?</strong> Многошаговые задачи с файлами и интеграциями vs диалог.</p>
      <p><strong>Сколько стоит Codex Sites?</strong> Business/Enterprise, не Plus.</p>
      <p><strong>Можно ли on-prem Sites?</strong> Нет, хостинг у OpenAI (preview).</p>
      <p><strong>Как повторить в России?</strong> Cursor + MCP + Make/n8n + свой портал.</p>
      <p><strong>Безопасно ли загружать договоры в ChatGPT?</strong> Нет без корпоративного контура и аудита.</p>
    </div>
  </div>
</div>

<h2 id="itog">Итог</h2>

<p>Релиз <strong>2 июня 2026</strong> закрепляет Codex как платформу <strong>knowledge work</strong>: <strong>5+ млн WAU</strong>, <strong>62 приложения</strong> и <strong>110 skills</strong>, <strong>Sites</strong> для внутренних дашбордов. Для российского среднего бизнеса выигрышный путь — <strong>сборка аналога</strong>: Cursor, MCP к CRM и 1С, Make/n8n, свой хостинг и жёсткий governance. Nero Network проектирует такие контуры под роли — от пилота до обучения команды.</p>

<p><em>Источники: OpenAI (02.06.2026), TechCrunch, VentureBeat, Axios, Help Net Security, Workday, Zip, AI-Uchi, Habr, GitHub MCP 1С, arqa.cc.</em></p>


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

<script type="application/ld+json"><?php echo wp_json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'OpenAI Codex для офиса: плагины по ролям и Sites — как внедрить аналог в своём бизнесе',
    'description' => $page_seo_description,
    'author' => ['@type' => 'Organization', 'name' => 'Nero Network'],
    'publisher' => ['@type' => 'Organization', 'name' => 'Nero Network'],
    'datePublished' => '2026-06-02',
    'dateModified' => '2026-06-02',
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => get_permalink()],
    'inLanguage' => 'ru-RU',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>
<?php get_footer(); ?>
