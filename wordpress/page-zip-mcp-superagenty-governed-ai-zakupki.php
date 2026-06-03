<?php
/**
 * Template Name: Zip Superagents и MCP — governed AI для закупок
 * Description: Лонгрид Nero Network Office — Zip Superagents, MCP, governance.
 */
$page_seo_title = 'Zip Superagents и MCP: AI-агенты для закупок с аудитом';
$page_seo_description = 'Кейс Zip 2 июня 2026: пять Superagents и enterprise MCP к Claude и ChatGPT с OAuth и audit trail. Как внедрить governed AI для закупок, договоров и CRM в РФ без утечек в личный ChatGPT.';

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
 *   `.zip-mcp-superagenty-governed-ai-zakupki-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.zip-mcp-superagenty-governed-ai-zakupki-page {
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
    --ym-accent: #6366f1;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(255, 0, 0, 0.15);
}

.zip-mcp-superagenty-governed-ai-zakupki-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.zip-mcp-superagenty-governed-ai-zakupki-page h1,
.zip-mcp-superagenty-governed-ai-zakupki-page h2,
.zip-mcp-superagenty-governed-ai-zakupki-page h3,
.zip-mcp-superagenty-governed-ai-zakupki-page h4,
.zip-mcp-superagenty-governed-ai-zakupki-page h5,
.zip-mcp-superagenty-governed-ai-zakupki-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.zip-mcp-superagenty-governed-ai-zakupki-page p,
.zip-mcp-superagenty-governed-ai-zakupki-page li,
.zip-mcp-superagenty-governed-ai-zakupki-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.zip-mcp-superagenty-governed-ai-zakupki-page strong,
.zip-mcp-superagenty-governed-ai-zakupki-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.zip-mcp-superagenty-governed-ai-zakupki-page pre, .zip-mcp-superagenty-governed-ai-zakupki-page code {
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
    background: rgba(255, 0, 0, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(255, 0, 0, 0.2);
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
    box-shadow: 0 10px 20px -5px rgba(255, 0, 0, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(255, 0, 0, 0.5);
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
    border-color: rgba(255, 0, 0, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(255, 0, 0, 0.05);
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



#zip-governed-hero-section,
.zip-governed-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }

.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose h3 { margin-top: 2rem; font-size: 1.35rem; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 15px; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose th, .zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose td { border: 1px solid var(--ym-border); padding: 10px 14px; text-align: left; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose th { background: #f1f5f9; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose hr { border: none; border-top: 1px solid var(--ym-border); margin: 2rem 0; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose a { color: var(--ym-accent); }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose code { background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 0.9em; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose pre { background: var(--ym-code-bg); color: #e2e8f0; padding: 16px; border-radius: 12px; overflow-x: auto; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-prose pre code { background: transparent; color: inherit; }

.zip-mcp-superagenty-governed-ai-zakupki-page-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr);
  gap: 40px;
  align-items: start;
  margin-bottom: 48px;
}
.zip-mcp-superagenty-governed-ai-zakupki-page-intro-text {
  text-align: left !important;
  border-left: 4px solid;
  border-image: linear-gradient(180deg, #0ea5e9, #6366f1) 1;
  padding-left: 24px;
}
.zip-mcp-superagenty-governed-ai-zakupki-page-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.zip-mcp-superagenty-governed-ai-zakupki-page-intro-lead { font-size: 19px !important; font-weight: 500; }
.zip-mcp-superagenty-governed-ai-zakupki-page-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 16px;
}
.zip-mcp-superagenty-governed-ai-zakupki-page-intro-chips span {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: #fff;
  border: 1px solid var(--ym-border);
  color: #0f172a !important;
}
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-cta-block { margin: 48px 0; }
.zip-mcp-superagenty-governed-ai-zakupki-page .ym-cta-block--secondary .ym-card { border-left: 4px solid var(--ym-accent); }
@media (max-width: 900px) {
  .zip-mcp-superagenty-governed-ai-zakupki-page-intro-grid { grid-template-columns: 1fr; }
}


</style>

<main id="primary" class="site-main zip-mcp-superagenty-governed-ai-zakupki-page" role="main" tabindex="-1">
<span id="main" class="screen-reader-text" tabindex="-1">Основное содержимое</span>

<section id="zip-governed-hero-section" class="zip-governed-hero fullscreen-white-office" aria-label="Hero: Zip Superagents и governed MCP">
<style>
.zip-governed-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 48%, #eef2ff 100%);
}
.zip-governed-hero.fullscreen-white-office::before {
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
#zip-governed-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.zip-governed-hero .zip-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(720px, 58vw);
  z-index: 4;
}
.zip-governed-hero .giant-seo {
  font-size: clamp(32px, 4.6vw, 68px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
  font-family: Inter, system-ui, sans-serif;
}
.zip-governed-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0ea5e9, #8b5cf6);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.zip-governed-hero .giant-seo-sub {
  font-size: clamp(15px, 1.85vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 680px;
  font-family: Inter, system-ui, sans-serif;
}
.zip-governed-hero .zip-hero-cta {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  z-index: 4;
}
.zip-governed-hero .telegram-button {
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
  font-family: Inter, system-ui, sans-serif;
}
.zip-governed-hero .telegram-button:hover { transform: translateY(-2px); }
.zip-governed-hero .vl-ui-pill {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  left: clamp(16px, 4vw, 56px);
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  z-index: 4;
  max-width: min(520px, 90vw);
}
.zip-governed-hero .vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  font-family: Inter, system-ui, sans-serif;
}
.zip-governed-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(200px, 28vh, 320px);
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 4;
}
.zip-governed-hero .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
  backdrop-filter: blur(6px);
  font-family: Inter, system-ui, sans-serif;
}
.zip-governed-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
@media (max-width: 900px) {
  .zip-governed-hero .vl-ui-tasks { display: none; }
  .zip-governed-hero .zip-hero-copy { max-width: 92vw; }
}
</style>

<canvas id="zip-governed-hero-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill" aria-label="Теги governed MCP">
  <span>OAuth</span>
  <span>RBAC</span>
  <span>Audit trail</span>
  <span>152-ФЗ</span>
  <span>Make/n8n</span>
</div>

<div class="zip-hero-cta">
  <a class="telegram-button" href="#contact-nero" target="_blank" rel="noopener noreferrer" rel="noopener">Связаться с Nero Network</a>
</div>

<div class="vl-ui-tasks" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Аудит теневого ИИ</div>
  <div class="vl-ui-task"><span>2</span> MCP gateway + OAuth</div>
  <div class="vl-ui-task"><span>3</span> Superagent-пилот</div>
  <div class="vl-ui-task"><span>4</span> HITL и audit trail</div>
  <div class="vl-ui-task"><span>5</span> Масштаб в 1С/CRM</div>
</div>

<div class="zip-hero-copy">
  <h1 class="giant-seo">Zip Superagents и MCP: <span>управляемые AI-агенты для закупок</span> без утечки в ChatGPT</h1>
  <p class="giant-seo-sub">Кейс 2 июня 2026: пять Superagents, enterprise MCP к Claude и ChatGPT с OAuth и audit trail — и как повторить governed-автоматизацию для CRM, договоров и финансов в российском бизнесе</p>
</div>

<script id="zip-governed-hero-script">
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("zip-governed-hero-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;
  const CYCLE = 220;

  function resizeCanvas() {
    const parent = canvas.parentElement;
    if (!parent) return;
    canvas.width = parent.clientWidth || window.innerWidth;
    canvas.height = parent.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw / 2;
    cy = ch / 2 + 20;
    scale = cw < 768 ? cw / 620 : Math.min(cw / 1050, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    hubBase: "#e0e7ff",
    hubStroke: "#6366f1",
    stream: "#94a3b8",
    packetContract: "#fde68a",
    packetInvoice: "#bfdbfe",
    packetPolicy: "#bbf7d0",
    shadow: "#fecaca",
    shadowWin: "#fff1f2",
    oauth: "#22c55e",
    audit: "#0ea5e9",
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

  function hubPhase() {
    return (frame * 0.045) % CYCLE;
  }

  class PolicyStream {
    draw(ctx) {
      const lanes = [
        { yOff: 55, col: C.packetContract, label: "договор" },
        { yOff: 95, col: C.packetInvoice, label: "счёт" },
        { yOff: 135, col: C.packetPolicy, label: "политика" }
      ];
      const prg = hubPhase();
      lanes.forEach((lane, idx) => {
        ctx.strokeStyle = "rgba(148, 163, 184, 0.45)";
        ctx.lineWidth = 2;
        ctx.setLineDash([6, 8]);
        ctx.beginPath();
        ctx.moveTo(-420, lane.yOff);
        ctx.quadraticCurveTo(-80, lane.yOff - 35 + idx * 8, 40, -20);
        ctx.stroke();
        ctx.setLineDash([]);

        const t = ((frame * 0.35 + idx * 70) % 280) / 280;
        const px = -420 + t * 460;
        const py = lane.yOff + Math.sin(t * Math.PI) * -30 - t * (lane.yOff + 18);
        const blocked = prg > 45 && prg < 120 && t > 0.55;
        if (blocked && t > 0.62) return;

        drawPolyRound(ctx, px - 10, py - 8, 20, 16, 3, lane.col, C.outline);
        if (prg > 120 && t > 0.7) {
          ctx.fillStyle = C.oauth;
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("✓", px, py + 2);
        }
      });
    }
  }

  class ShadowLeakPanel {
    draw(ctx) {
      const prg = hubPhase();
      const leak = prg < 130;
      const alpha = leak ? 0.85 + Math.sin(frame * 0.08) * 0.1 : 0.15;
      ctx.save();
      ctx.globalAlpha = alpha;
      drawPolyRound(ctx, -320, -150, 110, 80, 6, C.shadowWin, C.outline);
      drawPolyRound(ctx, -310, -140, 90, 16, [4, 4, 0, 0], "#fecdd3", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("ChatGPT ⚠", -300, -128);

      const drift = (frame * 0.4) % 40;
      for (let i = 0; i < 3; i++) {
        const dx = -280 + i * 22 + Math.sin(frame * 0.05 + i) * 6;
        const dy = -105 + drift * 0.3 + i * 12;
        drawPolyRound(ctx, dx, dy, 14, 18, 2, C.shadow, C.outline);
      }
      if (leak && frame % 90 < 45) {
        ctx.fillStyle = "#ef4444";
        ctx.font = "bold 9px sans-serif";
        ctx.fillText("теневой канал", -295, -88);
      }
      ctx.restore();
    }
  }

  class OAuthGateRing {
    constructor(hub) {
      this.hub = hub;
    }
    draw(ctx) {
      const prg = hubPhase();
      if (prg < 95) return;
      const pulse = 0.5 + Math.sin(frame * 0.12) * 0.5;
      const r = 95 + (prg > 100 && prg < 150 ? pulse * 8 : 0);
      ctx.save();
      ctx.translate(this.hub.x, this.hub.y);
      ctx.strokeStyle = prg > 100 ? C.oauth : C.stream;
      ctx.lineWidth = 3;
      ctx.setLineDash([10, 6]);
      ctx.beginPath();
      ctx.arc(0, 0, r, frame * 0.02, frame * 0.02 + Math.PI * 1.6);
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.fillStyle = C.oauth;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("OAuth", 0, -r - 8);
      ctx.restore();
    }
  }

  class AuditScrollTape {
    constructor(hub) {
      this.hub = hub;
    }
    draw(ctx) {
      const prg = hubPhase();
      if (prg < 135) return;
      const x = this.hub.x + 115;
      const y = this.hub.y - 55;
      drawPolyRound(ctx, x, y, 95, 110, 6, "#f8fafc", C.outline);
      ctx.save();
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x + 4, y + 4, 87, 102, 4);
      else ctx.rect(x + 4, y + 4, 87, 102);
      ctx.clip();
      const offset = (frame * 1.2) % 24;
      for (let i = 0; i < 7; i++) {
        const ly = y + 12 + i * 14 - offset;
        ctx.fillStyle = i % 2 === 0 ? "#cbd5e1" : "#e2e8f0";
        drawPolyRound(ctx, x + 10, ly, 70, 8, 2, ctx.fillStyle, null);
      }
      ctx.restore();
      ctx.fillStyle = C.audit;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("audit trail", x + 10, y - 6);
    }
  }

  class OrchestrationHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    drawHex(ctx, x, y, r, fill, stroke) {
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {
        const a = (Math.PI / 3) * i - Math.PI / 6;
        const px = x + Math.cos(a) * r;
        const py = y + Math.sin(a) * r;
        if (i === 0) ctx.moveTo(px, py);
        else ctx.lineTo(px, py);
      }
      ctx.closePath();
      ctx.fillStyle = fill;
      ctx.fill();
      if (stroke) {
        ctx.lineWidth = 2;
        ctx.strokeStyle = stroke;
        ctx.stroke();
      }
    }
    draw(ctx) {
      const prg = hubPhase();
      const glow = prg > 50 ? 0.6 + Math.sin(frame * 0.08) * 0.2 : 0.2;
      ctx.save();
      ctx.globalAlpha = glow;
      this.drawHex(ctx, this.x, this.y, 72, C.hubBase, C.hubStroke);
      ctx.globalAlpha = 1;

      ctx.fillStyle = C.hubStroke;
      ctx.font = "bold 10px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP HUB", this.x, this.y - 4);

      const ports = ["Claude", "GPT", "1С", "CRM"];
      ports.forEach((name, i) => {
        const ang = (Math.PI / 2) * i - Math.PI / 4 + frame * 0.008;
        const px = this.x + Math.cos(ang) * 58;
        const py = this.y + Math.sin(ang) * 58;
        drawPolyRound(ctx, px - 14, py - 8, 28, 16, 4, "#fff", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "7px sans-serif";
        ctx.fillText(name, px, py + 2);
      });

      if (prg > 175) {
        const sealPulse = 1 + Math.sin(frame * 0.2) * 0.08;
        ctx.save();
        ctx.translate(this.x, this.y + 38);
        ctx.scale(sealPulse, sealPulse);
        drawPolyRound(ctx, -42, -14, 84, 28, 8, C.oauth, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 11px sans-serif";
        ctx.fillText("GOVERNED ✓", 0, 4);
        ctx.restore();
      }
      ctx.restore();
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs, targetOffsetX) {
      this.x = x;
      this.y = y;
      this.baseX = x;
      this.baseY = y;
      this.color = color;
      this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
      this.targetOffsetX = targetOffsetX;
      this.hitAnimation = 0;
    }

    draw(ctx) {
      this.timer += 0.03;
      const prg = hubPhase();
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;
      const targetX = this.targetOffsetX;
      const targetY = -95;

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 11) {
          isMoving = true;
          faceDir = targetX > this.baseX ? 1 : -1;
          carryType = this.color;
          const t = local / 11;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (local < 16) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = targetX > this.baseX ? -1 : 1;
          const t = (local - 16) / 6;
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 ? this.color : null;
      }

      if (!isMoving && frame % 200 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);

      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";

      let legL = 0, legR = 0;
      if (isMoving) {
        const walk = this.timer * 6;
        legL = Math.sin(walk) * 5;
        legR = Math.sin(walk + Math.PI) * 5;
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
        ctx.fillRect(hx - 8, hy - 10, 16, 6);
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
  const hub = new OrchestrationHub(20, -30);
  entities.push(new PolicyStream());
  entities.push(new ShadowLeakPanel());
  entities.push(hub);
  entities.push(new OAuthGateRing(hub));
  entities.push(new AuditScrollTape(hub));

  entities.push(new Agent(-300, 120, C.agentYellow, "1_architect", 25, [
    "Карта политик intake…",
    "RBAC-матрица готова",
    "Схема Superagents"
  ], -55));
  entities.push(new Agent(-220, 160, C.agentGreen, "2_seo", 65, [
    "Audit trail пишется",
    "OAuth scope сужен",
    "Теневой чат — стоп"
  ], -15));
  entities.push(new Agent(-140, 100, C.agentBlue, "3_coder", 105, [
    "MCP tool: suppliers",
    "Коннектор к 1С",
    "Read-only на пилоте"
  ], 25));
  entities.push(new Agent(-60, 150, C.agentPink, "4_designer", 145, [
    "Redline по playbook",
    "HITL → legal",
    "Отклонения списком"
  ], 55));
  entities.push(new Agent(10, 110, C.agentPurple, "5_deployer", 185, [
    "Печать governed",
    "Заявка в контур",
    "Без личного GPT"
  ], 85));

  function createBubble(x, y, text, customLife = 300) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function drawAmbientGrid(ctx) {
    const prg = hubPhase();
    if (prg < 50) return;
    for (let i = 0; i < 5; i++) {
      const ang = frame * 0.015 + (i * Math.PI * 2) / 5;
      const rx = 20 + Math.cos(ang) * (80 + i * 6);
      const ry = -30 + Math.sin(ang) * (50 + i * 4);
      ctx.fillStyle = "rgba(99, 102, 241, 0.25)";
      ctx.beginPath();
      ctx.arc(rx, ry, 3, 0, Math.PI * 2);
      ctx.fill();
    }
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    drawAmbientGrid(ctx);

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

    const prg = hubPhase();
    if (prg >= 24 && prg < 24.08) createBubble(-300, 80, "1. Теневой ChatGPT");
    if (prg >= 64 && prg < 64.08) createBubble(-220, 120, "2. OAuth + RBAC");
    if (prg >= 104 && prg < 104.08) createBubble(-140, 60, "3. MCP → ERP");
    if (prg >= 144 && prg < 144.08) createBubble(-60, 110, "4. HITL legal");
    if (prg >= 184 && prg < 184.08) createBubble(10, 70, "5. Approved ✓");

    if (prg >= 48 && prg < 48.06) createBubble(-180, -60, "Договор не в личный чат");
    if (prg >= 108 && prg < 108.06) createBubble(20, -80, "Vendor-hosted MCP");
    if (prg >= 158 && prg < 158.06) createBubble(130, -20, "Журнал #8842");
    if (prg >= 198 && prg < 198.06) createBubble(20, 10, "Governed-канал открыт");

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
</section>

<section class="ym-section zip-mcp-superagenty-governed-ai-zakupki-page-intro-section reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="zip-mcp-superagenty-governed-ai-zakupki-page-intro-grid">
      <div class="zip-mcp-superagenty-governed-ai-zakupki-page-intro-text">
        <p class="zip-mcp-superagenty-governed-ai-zakupki-page-intro-lead">Zip 2 июня 2026 показал, как <strong>ai агенты для бизнеса</strong> в закупках работают не в личном ChatGPT, а через <strong>enterprise MCP</strong> с OAuth, RBAC и полным audit trail. Ниже — разбор протокола, governance и пошаговый план для российского стека Bitrix, 1С, Make и n8n.</p>
        <p>Лонгрид для CFO, закупок, IT и интеграторов: от новости Superagents до практики <strong>внедрения ai в компанию</strong> без утечки договоров в теневой чат.</p>
      </div>
      <div class="zip-mcp-superagenty-governed-ai-zakupki-page-intro-deco" aria-hidden="true">
        <div class="ym-mac-window reveal-scale delay-200">
          <div class="ym-mac-header">
            <span class="ym-mac-dot red"></span>
            <span class="ym-mac-dot yellow"></span>
            <span class="ym-mac-dot green"></span>
            <span style="margin-left:8px;font-size:12px;color:#94a3b8;">governed-mcp-pipeline</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-command">audit: tool.supplier.lookup → OK</div>
            <div class="ym-command">oauth: scope=read_requests</div>
            <div class="ym-comment"># Superagents: Intake → Contract → AP</div>
            <div class="ym-command">hitl: legal_review pending</div>
            <div class="ym-comment"># 152-ФЗ: DLP before public LLM</div>
          </div>
        </div>
        <div class="zip-mcp-superagenty-governed-ai-zakupki-page-intro-chips">
          <span>OAuth</span><span>RBAC</span><span>Audit trail</span><span>MCP gateway</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      <a href="#zip-announce">Что анонсировал Zip 2 июня 2026</a><a href="#mcp-explained">Что такое MCP и зачем он бизнесу вместо «е</a><a href="#shadow-ai">Почему финансы и закупки грузят договоры в</a><a href="#governed-ai">Governed AI</a><a href="#zip-architecture">Архитектура Zip</a><a href="#zip-cases">Кейсы и цифры</a><a href="#rf-stack">Как повторить governed-слой в России</a><a href="#implementation-plan">Пошаговый план внедрения MCP + агентов для</a><a href="#faq">FAQ</a>
    </nav>
  </div>
</section>

<section id="zip-announce" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Что анонсировал Zip 2 июня 2026: Superagents и procurement-native MCP</h2>
    <div class="ym-prose"><p>Контент секции «Что анонсировал Zip 2 июня 2026: Superagents и procurement-native MCP».</p></div>
  </div>
</section>

<section id="mcp-explained" class="ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Что такое MCP и зачем он бизнесу вместо «ещё одной интеграции»</h2>
    <div class="ym-prose"><h3>Model Context Protocol простыми словами</h3>
<p><strong>Определение:</strong> <strong>Model Context Protocol (MCP)</strong> — открытый протокол от Anthropic (ноябрь 2024), с декабря 2025 переданный в <strong>Agentic AI Foundation</strong> при Linux Foundation. MCP стандартизирует, как LLM и агенты <strong>безопасно вызывают инструменты и читают контекст</strong> из корпоративных систем — не через копипаст из Excel в чат, а через <strong>mcp сервер</strong> с явными правами.</p>
<p>Масштаб экосистемы (март 2026, по заявлению при передаче в AAIF): <strong>97M+ monthly SDK downloads</strong> (Python + TypeScript, <strong>месячные</strong>, не cumulative), <strong>10 000+</strong> публичных MCP-серверов; рост порядка <strong>970× за 18 месяцев</strong>. — <a target="_blank" rel="noopener noreferrer" href="https://blog.modelcontextprotocol.io/posts/2025-12-09-mcp-joins-agentic-ai-foundation/">MCP blog</a>, <a target="_blank" rel="noopener noreferrer" href="https://www.linuxfoundation.org/press/linux-foundation-announces-the-formation-of-the-agentic-ai-foundation">Linux Foundation press</a></p>
<p>Для запроса <strong>«mcp для бизнеса»</strong> суть в другом: <strong>97M загрузок SDK ≠ готовый enterprise compliance</strong>. Протокол решает <strong>совместимость</strong>; политики, OAuth, журналирование и 152-ФЗ — зона архитектуры компании и интегратора.</p>
<h3>MCP vs кастомные API и RPA</h3>
<table>
<thead>
<tr>
<th>Подход</th>
<th>Плюс</th>
<th>Минус для закупок/финансов</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Кастомные API-обвязки под каждый чат</strong></td>
<td>Гибкость</td>
<td>N интеграций × M ассистентов; нет единого audit</td>
</tr>
<tr>
<td><strong>RPA «кликер»</strong></td>
<td>Быстрый UI-скрипт</td>
<td>Хрупко при смене интерфейса; слабый контекст договора</td>
</tr>
<tr>
<td><strong>MCP</strong></td>
<td>Один <strong>mcp сервер</strong> — много клиентов (Claude, ChatGPT, Cursor)</td>
<td>Нужен gateway, RBAC, мониторинг</td>
</tr>
</tbody>
</table>
<p><strong>Коротко:</strong> MCP — «шина контекста» между <strong>нейросетью для документов</strong> и ERP/CRM/CLM, а не замена 1С или SAP. Zip как <strong>orchestration layer</strong> ($2.2B оценка, Series D 2024, ~$371M raised) сидит <strong>над</strong> SAP, Coupa, ServiceNow, CLM — не заменяет ERP. — <a target="_blank" rel="noopener noreferrer" href="https://venturebeat.com/technology/zips-new-ai-agents-want-to-stop-your-finance-team-from-uploading-contracts-into-personal-chatgpt-accounts">VentureBeat</a></p>
<p>Российские обзоры (<a target="_blank" rel="noopener noreferrer" href="https://gptmag.ru/mcp-dlya-ai-agentov-v-biznese/">gptmag.ru</a>, <a target="_blank" rel="noopener noreferrer" href="https://www.vedomosti.ru/press_releases/2026/02/25/ot-api-k-mcp-kak-novii-protokol-menyaet-arhitekturu-korporativnogo-ii">Ведомости</a>) объясняют протокол, но редко связывают его с <strong>договорами, AP и audit trail</strong> — здесь и зазор для практического <strong>внедрения ai в компанию</strong> под РФ-стек.</p>
<hr></div>
  </div>
</section>

<section id="zip-mcp-boris-article-viz" class="boris-zip-mcp-block reveal" aria-labelledby="boris-zip-mcp-kicker">
<style>
  #zip-mcp-boris-article-viz {
    margin: 56px 0;
    font-family: Inter, system-ui, -apple-system, sans-serif;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-card {
    max-width: 1300px;
    margin: 0 auto;
    padding: 32px 36px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-grid {
    display: grid;
    grid-template-columns: minmax(0, 0.58fr) minmax(280px, 0.42fr);
    gap: 28px 36px;
    align-items: stretch;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-eyebrow {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #64748b;
    margin: 0 0 10px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-kicker {
    font-size: clamp(1.25rem, 2.2vw, 1.55rem);
    font-weight: 700;
    color: #0f172a !important;
    line-height: 1.25;
    margin: 0 0 14px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-lead {
    font-size: 15px;
    line-height: 1.55;
    color: #475569 !important;
    margin: 0 0 18px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-points {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-points li {
    position: relative;
    padding-left: 18px;
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 1.45;
    color: #334155 !important;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-points li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.55em;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #3b82f6;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 16px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-pill {
    font-size: 12px;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 999px;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #0f172a !important;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-pill--risk {
    border-color: #fecaca;
    background: #fef2f2;
    color: #b91c1c !important;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-pill--ok {
    border-color: #bbf7d0;
    background: #f0fdf4;
    color: #15803d !important;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-bridge {
    font-size: 13px;
    color: #64748b !important;
    margin: 0;
    padding-top: 12px;
    border-top: 1px dashed #e2e8f0;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-canvas-wrap {
    position: relative;
    min-height: 420px;
    border-radius: 16px;
    overflow: hidden;
    background: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
    border: 1px solid #e2e8f0;
  }
  #zip-mcp-boris-article-viz canvas#zip-mcp-shadow-governed-canvas {
    display: block;
    width: 100%;
    height: 100%;
    min-height: 420px;
  }
  #zip-mcp-boris-article-viz .boris-zip-mcp-canvas-caption {
    position: absolute;
    left: 12px;
    right: 12px;
    bottom: 10px;
    display: flex;
    justify-content: space-between;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    pointer-events: none;
    color: #64748b;
  }
  @media (max-width: 1023px) {
    #zip-mcp-boris-article-viz .boris-zip-mcp-grid {
      grid-template-columns: 1fr;
    }
    #zip-mcp-boris-article-viz .boris-zip-mcp-canvas-wrap {
      min-height: 360px;
    }
    #zip-mcp-boris-article-viz canvas#zip-mcp-shadow-governed-canvas {
      min-height: 360px;
    }
  }
  @media (max-width: 767px) {
    #zip-mcp-boris-article-viz .boris-zip-mcp-card {
      padding: 24px 20px;
    }
  }
</style>

  <div class="ym-container boris-zip-mcp-card">
    <div class="boris-zip-mcp-grid">
      <div class="boris-zip-mcp-copy">
        <p class="boris-zip-mcp-eyebrow">Контраст к hero · governance</p>
        <h3 id="boris-zip-mcp-kicker" class="boris-zip-mcp-kicker">Два канала: договор в личный чат или действие через MCP</h3>
        <p class="boris-zip-mcp-lead">Слева на схеме — типичный <strong>теневой</strong> сценарий: файл уходит в облако модели без журнала. Справа — <strong>governed MCP</strong>: OAuth, RBAC и audit trail до ERP/CRM.</p>
        <ul class="boris-zip-mcp-points">
          <li>Личный ChatGPT: нет единого audit trail, риск SOX/152‑ФЗ</li>
          <li>Enterprise MCP: tool call вместо копипаста договора в окно чата</li>
          <li>High-impact шаги — детерминированные правила, не «угадывание» LLM</li>
        </ul>
        <div class="boris-zip-mcp-pills" aria-hidden="true">
          <span class="boris-zip-mcp-pill boris-zip-mcp-pill--risk">Теневой ИИ</span>
          <span class="boris-zip-mcp-pill">Нет OAuth</span>
          <span class="boris-zip-mcp-pill boris-zip-mcp-pill--ok">MCP + audit</span>
          <span class="boris-zip-mcp-pill boris-zip-mcp-pill--ok">HITL</span>
        </div>
        <p class="boris-zip-mcp-bridge">Дальше разберём, почему закупки и юристы уже грузят договоры в личный ChatGPT — и чем это грозит в РФ.</p>
      </div>
      <div class="boris-zip-mcp-canvas-wrap" role="img" aria-label="Анимация: сравнение теневого ChatGPT и governed MCP с audit trail">
        <canvas id="zip-mcp-shadow-governed-canvas" width="640" height="420"></canvas>
        <div class="boris-zip-mcp-canvas-caption">
          <span>Теневой чат</span>
          <span>Governed MCP</span>
        </div>
      </div>
    </div>
  </div>

<script>
(function () {
  "use strict";
  var canvas = document.getElementById("zip-mcp-shadow-governed-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var wrap = canvas.parentElement;
  var W = 640, H = 420, dpr = 1;
  var frame = 0;
  var auditLines = [];
  var phase = 0;

  var PAL = {
    ink: "#0f172a",
    muted: "#64748b",
    line: "#cbd5e1",
    risk: "#ef4444",
    riskBg: "#fef2f2",
    ok: "#10b981",
    okBg: "#ecfdf5",
    chat: "#f1f5f9",
    gateway: "#dbeafe",
    doc: "#fff7ed",
    docBorder: "#fdba74",
    audit: "#38bdf8"
  };

  function resize() {
    if (!wrap) return;
    var rect = wrap.getBoundingClientRect();
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    W = Math.max(280, Math.floor(rect.width));
    H = Math.max(320, Math.floor(rect.height));
    canvas.width = W * dpr;
    canvas.height = H * dpr;
    canvas.style.width = W + "px";
    canvas.style.height = H + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function rr(x, y, w, h, r) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    ctx.closePath();
  }

  function label(text, x, y, color, size) {
    ctx.fillStyle = color || PAL.muted;
    ctx.font = (size || 11) + "px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(text, x, y);
  }

  function drawShadowPanel(cx, cy, pw, ph, t) {
    var x = cx - pw * 0.5;
    var y = cy - ph * 0.5;
    rr(x, y, pw, ph, 12);
    ctx.fillStyle = "#ffffff";
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 1.5;
    ctx.fill();
    ctx.stroke();
    label("Теневой ChatGPT", cx, y + 18, PAL.risk, 12);

    var chatW = pw * 0.72;
    var chatH = ph * 0.42;
    var chatX = cx - chatW / 2;
    var chatY = y + ph * 0.28;
    rr(chatX, chatY, chatW, chatH, 10);
    ctx.fillStyle = PAL.chat;
    ctx.fill();
    ctx.strokeStyle = PAL.risk;
    ctx.lineWidth = t < 0.45 ? 2 : 1;
    ctx.stroke();

    var docX = x + pw * 0.12;
    var docY = y + ph * 0.12 + Math.sin(t * 6) * 3;
    var docTargetX = chatX + chatW * 0.35;
    var docTargetY = chatY + chatH * 0.35;
    var prog = Math.min(1, t / 0.38);
    var dx = docX + (docTargetX - docX) * prog;
    var dy = docY + (docTargetY - docY) * prog;

    rr(dx, dy, 36, 44, 4);
    ctx.fillStyle = PAL.doc;
    ctx.fill();
    ctx.strokeStyle = PAL.docBorder;
    ctx.stroke();
    ctx.fillStyle = PAL.docBorder;
    ctx.fillRect(dx + 6, dy + 10, 24, 3);
    ctx.fillRect(dx + 6, dy + 18, 18, 3);

    if (t > 0.32 && t < 0.55) {
      var pulse = 0.5 + 0.5 * Math.sin(frame * 0.2);
      ctx.globalAlpha = 0.35 + pulse * 0.35;
      rr(chatX - 4, chatY - 4, chatW + 8, chatH + 8, 12);
      ctx.strokeStyle = PAL.risk;
      ctx.lineWidth = 2;
      ctx.stroke();
      ctx.globalAlpha = 1;
      label("нет audit trail", cx, chatY + chatH + 22, PAL.risk, 10);
    }
  }

  function drawGovernedPanel(cx, cy, pw, ph, t) {
    var x = cx - pw * 0.5;
    var y = cy - ph * 0.5;
    rr(x, y, pw, ph, 12);
    ctx.fillStyle = "#ffffff";
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 1.5;
    ctx.fill();
    ctx.stroke();
    label("Governed MCP", cx, y + 18, PAL.ok, 12);

    var gwW = pw * 0.55;
    var gwH = 28;
    var gwX = cx - gwW / 2;
    var gwY = y + ph * 0.26;
    rr(gwX, gwY, gwW, gwH, 8);
    ctx.fillStyle = PAL.gateway;
    ctx.fill();
    ctx.strokeStyle = "#3b82f6";
    ctx.stroke();
    label("OAuth · RBAC", cx, gwY + 18, "#1d4ed8", 10);

    var erpY = y + ph * 0.72;
    rr(x + pw * 0.1, erpY, pw * 0.35, 36, 6);
    ctx.fillStyle = PAL.okBg;
    ctx.fill();
    ctx.strokeStyle = PAL.ok;
    ctx.stroke();
    label("1С / CRM", x + pw * 0.275, erpY + 22, PAL.ink, 9);

    rr(x + pw * 0.55, erpY, pw * 0.35, 36, 6);
    ctx.fillStyle = PAL.okBg;
    ctx.fill();
    ctx.strokeStyle = PAL.ok;
    ctx.stroke();
    label("audit log", x + pw * 0.725, erpY + 22, PAL.ink, 9);

    if (t > 0.08) {
      ctx.strokeStyle = PAL.ok;
      ctx.lineWidth = 2;
      ctx.setLineDash([4, 4]);
      ctx.beginPath();
      ctx.moveTo(cx, gwY + gwH);
      ctx.lineTo(x + pw * 0.275, erpY);
      ctx.moveTo(cx, gwY + gwH);
      ctx.lineTo(x + pw * 0.725, erpY);
      ctx.stroke();
      ctx.setLineDash([]);
    }

    var logX = x + pw * 0.52;
    var logY = y + ph * 0.38;
    rr(logX, logY, pw * 0.4, ph * 0.28, 6);
    ctx.fillStyle = "#0f172a";
    ctx.fill();
    ctx.font = "9px ui-monospace, monospace";
    ctx.textAlign = "left";
    var show = Math.floor(t * 12);
    for (var i = 0; i < Math.min(show, auditLines.length); i++) {
      ctx.fillStyle = i % 2 ? PAL.audit : "#94a3b8";
      ctx.fillText(auditLines[i], logX + 8, logY + 16 + i * 14);
    }
  }

  function drawDivider(midX, h) {
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 1;
    ctx.setLineDash([6, 8]);
    ctx.beginPath();
    ctx.moveTo(midX, 36);
    ctx.lineTo(midX, h - 24);
    ctx.stroke();
    ctx.setLineDash([]);
  }

  function drawArrow(midX, cy, active) {
    if (!active) return;
    var a = 0.4 + 0.4 * Math.sin(frame * 0.15);
    ctx.globalAlpha = a;
    ctx.fillStyle = "#3b82f6";
    ctx.beginPath();
    ctx.moveTo(midX, cy - 14);
    ctx.lineTo(midX + 12, cy);
    ctx.lineTo(midX, cy + 14);
    ctx.lineTo(midX - 12, cy);
    ctx.closePath();
    ctx.fill();
    ctx.globalAlpha = 1;
    label("замена канала", midX, cy + 32, "#3b82f6", 10);
  }

  function tick() {
    frame++;
    phase = (frame % 360) / 360;
    var t = phase;
    ctx.clearRect(0, 0, W, H);

    var pad = 16;
    var mid = W * 0.5;
    var panelW = W * 0.46;
    var panelH = H - pad * 2;
    var leftCx = W * 0.25;
    var rightCx = W * 0.75;
    var cy = H * 0.5;

    drawDivider(mid, H);
    drawShadowPanel(leftCx, cy, panelW, panelH, t);
    drawGovernedPanel(rightCx, cy, panelW, panelH, Math.max(0, t - 0.12));
    drawArrow(mid, cy * 0.92, t > 0.42 && t < 0.72);

    requestAnimationFrame(tick);
  }

  auditLines = [
    "tool: supplier.lookup",
    "scope: read_requests",
    "user: fin@corp · OK",
    "hitl: pending legal",
    "zdr: subprocessors OK"
  ];

  window.addEventListener("resize", resize);
  resize();
  tick();
})();
</script>
</section>

<section id="shadow-ai" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Почему финансы и закупки грузят договоры в личный ChatGPT — и чем это грозит</h2>
    <div class="ym-prose"><h3>Теневой ИИ в компании</h3>
<p>Co-Founder &amp; CTO Zip <strong>Lu Cheng</strong> формулирует боль так: работа с ИИ в enterprise «уже происходит, с или без governance». — <a target="_blank" rel="noopener noreferrer" href="https://www.businesswire.com/news/home/20260602279324/en/Zip-Launches-AI-Superagents-and-Procurement-Native-MCP-Delivering-the-First-Governed-AI-Platform-for-Finance-and-Procurement">Business Wire</a></p>
<p>В России картина узнаваема: юристы и закупки используют <strong>промпты для договоров</strong> в ChatGPT (<a target="_blank" rel="noopener noreferrer" href="https://securegpt.ru/blog/prompty-chatgpt-dlya-dogovorov">обзоры вроде securegpt.ru</a>), пока IT не выдал <strong>ai для договоров</strong> внутри контура. Параллельно усложняется «серый» доступ: массовые схемы перепродажи ломаются из‑за правил OpenAI (2025–2026), корпоративный Business требует иностранного юрлица — стимул к <strong>теневому chatgpt в компании</strong>. — <a target="_blank" rel="noopener noreferrer" href="https://06news.ru/newsone/5938926/openai-izmenila-pravila-raboty-s-dannymi-polzovatelej-chatgpt.html">контекст OpenAI</a>, <a target="_blank" rel="noopener noreferrer" href="https://companies.rbc.ru/news/EIvC1zAPWT/kak-oplatit-chatgpt-iz-rossii-v-2026-godu-vse-rabochie-sposobyi/">РБК</a></p>
<p>Zip в <a target="_blank" rel="noopener noreferrer" href="https://venturebeat.com/technology/zips-new-ai-agents-want-to-stop-your-finance-team-from-uploading-contracts-into-personal-chatgpt-accounts">VentureBeat</a> описывает риск: сотрудники загружают spend-данные и контракты в личный ChatGPT/Claude/Gemini — без <strong>audit trail</strong>, с риском утечки и несоответствия SOX.</p>
<h3>SOX, GDPR и 152-ФЗ в российском контексте</h3>
<p><strong>Международный контур:</strong> нарушения SOX теоретически до <strong>$25M</strong> штрафов, delisting; GDPR — трансграничная передача и согласия.</p>
<p><strong>РФ:</strong> системы с персональными данными почти неизбежно попадают под <strong>152-ФЗ</strong>; передача в зарубежные LLM без правовых оснований — штрафы <strong>1–18 млн ₽</strong>, с 2025 при повторе — оборотные до <strong>3% выручки</strong>. — <a target="_blank" rel="noopener noreferrer" href="https://companies.rbc.ru/news/rCPofKZUjW/kak-152-fz-prevraschaet-ii-instrument-v-dorogostoyaschij-proekt/">РБК Компании</a>, <a target="_blank" rel="noopener noreferrer" href="https://gptmag.ru/bezopasnost-dannyh-pri-rabote-s-ii/">GPTmag 2026</a></p>
<p><strong>Практика для закупок:</strong> черновик redline можно делать в on-prem или российской LLM; в публичный чат — только <strong>обезличенные</strong> фрагменты или выводы после DLP. <strong>MCP</strong> здесь — способ не копировать договор в окно чата, а дать ассистенту <strong>действие</strong> в согласованном контуре (заявка, справочник поставщиков, статус счёта).</p>
<p><strong>Итог:</strong> боль не в «ИИ плохой», а в <strong>отсутствии governed-канала</strong>. Zip продаёт замену теневому сценарию; в РФ аналог собирают на <strong>Bitrix/amoCRM/1С + MCP gateway</strong>.</p>
<hr></div>
  </div>
</section>

<section id="governed-ai" class="ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Governed AI: OAuth, RBAC, audit trail и human-in-the-loop</h2>
    <div class="ym-prose"><p><strong>Определение governed AI:</strong> искусственный интеллект в процессах компании, где каждое действие агента проходит через <strong>идентификацию (OAuth)</strong>, <strong>роли (RBAC)</strong>, <strong>журнал (audit trail)</strong> и <strong>контроль человека (human-in-the-loop)</strong> на критичных шагах.</p>
<h3>Кто отвечает за ошибку агента</h3>
<p>В enterprise-модели Zip (как у ERP): <strong>ответственность за бизнес-решение остаётся у компании</strong> — агент ускоряет подготовку, но approval matrix и политики не отменяются. High-impact шаги в Superagents — <strong>не LLM</strong>, а детерминированные правила. Это ответ на FAQ «кто виноват, если агент ошибся»: юридически — процесс согласования и политика; технически — trace в audit trail.</p>
<h3>Паттерн enterprise MCP (без позиционирования «мы Zip»)</h3>
<p>Эталонный стек для российского интегратора (Nero Network и аналоги):</p>
<ol>
<li><strong>Identity:</strong> OAuth scopes на каждый инструмент MCP (чтение заявки ≠ подписание договора).</li>
<li><strong>Policy engine:</strong> лимиты, списки поставщиков, 152-ФЗ / маскирование ПДн.</li>
<li><strong>Audit:</strong> кто, когда, какой промпт-контекст, какой tool call, какой документ.</li>
<li><strong>HITL:</strong> redline и платежи — только после человека.</li>
<li><strong>Subprocessors:</strong> отдельные договоры с LLM-vendor, ZDR где возможно.</li>
</ol>
<p>Zip MCP — <strong>vendor-hosted</strong>: сервер у вендора Zip, клиент — Claude/ChatGPT. В РФ чаще нужен <strong>self-hosted gateway</strong> (Make, n8n, свой middleware) к <strong>1С / Bitrix24</strong>.</p>
<p>Gartner даёт двойной контекст: к <strong>концу 2026</strong> до <strong>40%</strong> enterprise apps получат task-specific agents (было &lt;5% в 2025); при этом <strong>&gt;40%</strong> agentic AI projects <strong>отменят к 2027</strong> из‑за cost, ROI, risk controls. — <a target="_blank" rel="noopener noreferrer" href="https://www.gartner.com/en/newsroom/press-releases/2025-08-26-gartner-predicts-40-percent-of-enterprise-apps-will-feature-task-specific-ai-agents-by-2026-up-from-less-than-5-percent-in-2025">Gartner 26.08.2025</a>, <a target="_blank" rel="noopener noreferrer" href="https://www.gartner.com/en/newsroom/press-releases/2025-06-25-gartner-predicts-over-40-percent-of-agentic-ai-projects-will-be-canceled-by-end-of-2027">Gartner 25.06.2025</a></p>
<p><strong>Вывод:</strong> выигрывают не «самые умные модели», а <strong>governance-first</strong> внедрения — ровно то, что Zip продаёт вместе с Superagents.</p>
<hr></div>
  </div>
</section>

<section id="zip-architecture" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Архитектура Zip: orchestration layer, LangGraph и чем отличается от SAP Joule / Coupa</h2>
    <div class="ym-prose"><p>CEO Zip <strong>Rujul Zaparde</strong> в <a target="_blank" rel="noopener noreferrer" href="https://venturebeat.com/technology/zips-new-ai-agents-want-to-stop-your-finance-team-from-uploading-contracts-into-personal-chatgpt-accounts">VentureBeat</a>: «большинство компаний не живут на одной procurement-платформе… AI настолько хорош, насколько хороши данные… Zip сидит над всеми инструментами». Ошибка рынка — «считать закупки чисто model problem»; нужны политики, цепочки согласований — <strong>context layer</strong>, который Zip строил шесть лет.</p>
<h3>Orchestration vs point solutions</h3>
<table>
<thead>
<tr>
<th>Игрок</th>
<th>Фокус 2026</th>
<th>MCP к внешнему Claude/ChatGPT</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>SAP</strong> (Sapphire 2026)</td>
<td>Autonomous Spend Management, <strong>50+ Joule Assistants</strong> в Ariba/S/4</td>
<td>Сильны внутри SAP-стека; мало про внешние ассистенты</td>
</tr>
<tr>
<td><strong>Coupa</strong> (Inspire, май 2026)</td>
<td><strong>Compose</strong> + <strong>Catalyst</strong>, Navi Agent Studio, dataset $10T транзакций</td>
<td>Акцент на своей платформе, не procurement-native MCP наружу</td>
</tr>
<tr>
<td><strong>Zip</strong></td>
<td>5 Superagents + <strong>vendor MCP</strong> + FDE</td>
<td>Кросс-системная оркестрация + governance в preferred AI tool</td>
</tr>
</tbody>
</table>
<p>Источники: <a target="_blank" rel="noopener noreferrer" href="https://news.sap.com/2026/05/enabling-autonomous-spend-management-ai-connected-processes/">SAP News</a>, <a target="_blank" rel="noopener noreferrer" href="https://www.prnewswire.com/news-releases/coupa-launches-coupa-compose-and-catalyst-to-accelerate-agentic-ai-value-and-delivery-at-inspire-2026-302769893.html">Coupa PR</a></p>
<h3>LangGraph под капотом Superagents</h3>
<p>Инженерный блог Zip описывает <strong>composable agents</strong>: prompt + tools + output format в App Studio; pipeline на <strong>LangGraph</strong>:</p>
<p><code>PreprocessingNode → OrchestrationNode (ReAct) → FinalLlmCallNode → PostProcessingNode</code></p>
<p>Разделение <strong>research vs synthesis</strong>; инструменты — vector search, API PR/контрактов, policy library. — <a target="_blank" rel="noopener noreferrer" href="https://ziphq.com/engineering-blog/custom-agents-composable-ai-platform">Engineering blog Zip</a></p>
<p>Для <strong>автоматизации закупок</strong> в РФ это означает: не один «магический промпт», а <strong>конвейер</strong> с проверяемыми узлами — проще сертифицировать и отлаживать.</p>
<p><strong>Коротко:</strong> SAP/Coupa усиливают <strong>свой</strong> замок; Zip — <strong>мост</strong> между системами и ChatGPT/Claude. Повторить мост можно на <strong>Make/n8n + mcp 1с + CRM</strong>.</p>
<hr></div>
  </div>
</section>

<section id="zip-cases" class="ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Кейсы и цифры: Block, UCI Health, Forrester ROI — что можно цитировать честно</h2>
    <div class="ym-prose"><h3>Методология cost avoidance vs обещания клиенту</h3>
<p><strong>UCI Health</strong> (цитата CPO Susanna Rustad): «более <strong>$20 млн</strong> cost avoidance and value recapture» на <strong>одном</strong> IT infrastructure initiative; AI-benchmarking для переговоров, переговоры вела команда закупок. — <a target="_blank" rel="noopener noreferrer" href="https://www.businesswire.com/news/home/20260602279324/en/Zip-Launches-AI-Superagents-and-Procurement-Native-MCP-Delivering-the-First-Governed-AI-Platform-for-Finance-and-Procurement">Business Wire</a></p>
<p>Это <strong>не</strong> обещание «каждый клиент сэкономит $20M» — один проект, методология benchmarking.</p>
<p><strong>Block, Snowflake</strong> — launch customers <strong>AI Spend Automation</strong>; CPO Block <strong>Mithun Sharma</strong> про mandate на AI в procurement и «fully governed AI agents» + forward-deployed engineers. — Business Wire</p>
<p><strong>OpenAI</strong> — 10+ агентов на Zip; <strong>Anthropic</strong> удвоила объём закупок через Zip при flat headcount. — VentureBeat</p>
<p><strong>Портфель Zip:</strong> клиенты сэкономили <strong>&gt;$10 млрд</strong> через AI suite — <strong>агрегат вендора</strong>, не гарантия для читателя.</p>
<h3>Forrester TEI (2026, commissioned by Zip)</h3>
<p>Composite enterprise $10–45B revenue → <strong>386% ROI за 3 года</strong>, <strong>$5.8M NPV</strong>, payback <strong>&lt;6 месяцев</strong> (97 дней в детализации блога); 3.3% optimization на spend in scope; <strong>70%</strong> сокращение cycle time на заявках. Использовать только со ссылкой на <a target="_blank" rel="noopener noreferrer" href="https://zip.com/resources/forrester-total-economic-impact-zip">Forrester TEI / Zip</a>, <a target="_blank" rel="noopener noreferrer" href="https://zip.com/blog/forrester-tei-zip-procurement-roi">блог Zip</a>.</p>
<p><strong>Для roi внедрения ai</strong> в РФ: закладывайте пилот 2–8 недель, метрики cycle time и доли tail-spend под контролем, а не копируйте 386% в КП.</p>
<p><strong>Итог блока:</strong> цифры Zip — аргумент <strong>зрелости категории</strong>; ваш ROI считается на своём контуре данных.</p>
<hr></div>
  </div>
</section>

<section id="rf-stack" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Как повторить governed-слой в России: MCP к Bitrix, amoCRM, 1С, Make и n8n</h2>
    <div class="ym-prose"><p>Zip в РФ недоступен как продукт; доступен <strong>reference model</strong> для <strong>ai агенты crm</strong>, закупок и <strong>автоматизация документооборота ai</strong>.</p>
<h3>Self-hosted gateway и контур данных</h3>
<ol>
<li><strong>MCP gateway</strong> (self-hosted или в VPC РФ): единая точка OAuth, rate limit, логирование.</li>
<li><strong>Коннекторы:</strong> <strong>bitrix mcp</strong> / amoCRM (сделки, компании), <strong>mcp 1с</strong> (заявки, номенклатура, статусы счетов — read-only на пилоте).</li>
<li><strong>LLM-контур:</strong> российская облачная модель или on-prem для черновиков; Claude/ChatGPT — только через gateway с маскированием.</li>
<li><strong>DLP:</strong> запрет исходников договоров с ПДн в публичный чат.</li>
</ol>
<p>Стек Nero: <strong>make com mcp</strong>, <strong>n8n mcp server</strong>, Cursor MCP для разработки сценариев — без «голого» копирования в чат.</p>
<h3>CRM-агенты и заявки на закупку</h3>
<p>Сценарии пилота:</p>
<ul>
<li><strong>Intake-аналог:</strong> сотрудник в Telegram/Bitrix описывает потребность → агент создаёт черновик заявки, подставляет preferred suppliers.</li>
<li><strong>Contract-аналог:</strong> сравнение с playbook, список отклонений для юриста (HITL).</li>
<li><strong>AP-аналог:</strong> сопоставление счёта и PO, маршрут на исключения.</li>
</ul>
<p><strong>Коротко:</strong> не продавайте «мы Zip» — продавайте <strong>тот же паттерн</strong>: orchestration + MCP + audit.</p>
<hr></div>
  </div>
</section>

<aside class="ym-cta-block reveal" aria-label="Призыв к действию">
  <div class="ym-container">
    <div class="ym-card" style="text-align:center; border-color: rgba(14,165,233,0.2);">
      <p style="font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ym-primary) !important; font-weight: 600; margin: 0 0 12px;">Nero Network</p>
      <h3 style="font-size: 24px; margin-bottom: 12px;">Нужен governed MCP под закупки, 1С и CRM?</h3>
      <p style="max-width: 640px; margin: 0 auto 24px;">Аудит теневого ИИ, self-hosted gateway, пилот Superagent-аналога на Bitrix/amoCRM/1С — без утечки договоров в личный ChatGPT.</p>
      <div class="ym-btn-group" style="justify-content: center;">
        <a class="ym-btn ym-btn-primary" href="#contact-nero" target="_blank" rel="noopener noreferrer"><span>Связаться с Nero Network</span></a>
      </div>
    </div>
  </div>
</aside>

<section id="implementation-plan" class="ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Пошаговый план внедрения MCP + агентов для закупок и договоров</h2>
    <div class="ym-prose"><h3>Интент, политики, пилот, масштабирование</h3>
<p><strong>Шаг 1. Инвентаризация теневого ИИ (1–2 нед.)</strong><br>
Опрос финансов, юристов, закупок: где уже ChatGPT/Claude для <strong>нейросеть для документов</strong> и Excel. Фиксируем риски 152-ФЗ.</p>
<p><strong>Шаг 2. Политики и матрица (2 нед.)</strong><br>
Что можно в LLM, что только в MCP-tool; кто approver; формат <strong>audit trail искусственный интеллект</strong> для внутреннего аудита.</p>
<p><strong>Шаг 3. Архитектура (2–3 нед.)</strong><br>
Выбор <strong>mcp сервер</strong> vs набор API; OAuth scopes; интеграция 1С/Bitrix/почта+договоры.</p>
<p><strong>Шаг 4. Пилот одного потока (4–8 нед.)</strong><br>
Например tail-spend заявки или маршрутизация AP — один Superagent-аналог, метрики cycle time.</p>
<p><strong>Шаг 5. MCP к ассистенту (параллельно)</strong><br>
Подключение Claude/ChatGPT/Cursor к gateway — сценарий «submit request из чата» как у Zip, но на ваших данных.</p>
<p><strong>Шаг 6. Масштабирование</strong><br>
Config-агент для узких мест workflow; обучение закупок; пересмотр <strong>roi внедрения ai</strong> по факту пилота.</p>
<p><strong>Итог:</strong> <strong>внедрение ai в компанию</strong> с MCP — это проект governance, а не покупка подписки на модель.</p>
<hr></div>
  </div>
</section>

<aside class="ym-cta-block ym-cta-block--secondary reveal delay-100" aria-label="Обучение по автоматизации">
  <div class="ym-container">
    <div class="ym-card" style="padding: 28px 32px;">
      <h3 style="font-size: 20px; margin-bottom: 10px;">Освоить Make, n8n и MCP на практике</h3>
      <p style="margin-bottom: 16px;">Перед масштабированием пилота полезно пройти структурированное обучение: сценарии оркестрации, OAuth-scopes и отладка агентов без «голого» чата.</p>
      <a class="ym-btn ym-btn-secondary" href="#training-nero" target="_blank" rel="noopener noreferrer">Курс по Make и MCP</a>
    </div>
  </div>
</aside>

<section id="faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ: Claude и ChatGPT, безопасность, стоимость, поддержка Nero Network</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <p class="ym-section-subtitle" style="text-align:left;margin-bottom:16px;">Быстрые ответы</p>
        <ul class="ym-faq-list">
          <li><a href="#faq-mcp-one">Что такое MCP в одном предложении?</a></li>
          <li><a href="#faq-claude-chatgpt">Claude или ChatGPT — что выбрать как MCP-клиент?</a></li>
          <li><a href="#faq-mcp-per-dept">Нужен ли отдельный MCP на каждый отдел?</a></li>
          <li><a href="#faq-make-n8n">Make/n8n vs «голый» чат-бот</a></li>
          <li><a href="#faq-sdk-compliance">Почему 97M загрузок MCP SDK не означают готовность к SOX/152-ФЗ?</a></li>
          <li><a href="#faq-roi-386">Можно ли обещать клиенту 386% ROI как у Zip?</a></li>
          <li><a href="#faq-nero">Кто помогает собрать governed MCP в России?</a></li>
          <li><a href="#faq-start-tomorrow">С чего начать завтра без бюджета «как у Unicorn»?</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content">
        <article id="faq-mcp-one" class="ym-faq-item reveal">
          <h3>Что такое MCP в одном предложении?</h3>
          <p>Открытый протокол, чтобы AI-ассистенты вызывали корпоративные инструменты по правилам компании, с единым <strong>mcp сервер</strong> вместо ручной загрузки файлов в чат.</p>
        </article>
        <article id="faq-claude-chatgpt" class="ym-faq-item reveal">
          <h3>Claude или ChatGPT — что выбрать как MCP-клиент?</h3>
          <p>Оба поддерживаются экосистемой; Zip отдаёт <strong>vendor-hosted MCP</strong> сразу к обоим. В РФ выбор зависит от <strong>контура данных</strong>, договора с вендором и доступности API, не от модного бренда. Технически важнее <strong>oauth mcp</strong> и scope, чем логотип клиента.</p>
        </article>
        <article id="faq-mcp-per-dept" class="ym-faq-item reveal">
          <h3>Нужен ли отдельный MCP на каждый отдел?</h3>
          <p>Обычно — <strong>один gateway</strong>, разные RBAC-роли и наборы tools. Отдельные серверы оправданы при жёстком разделении контуров (холдинг, ГОЗ, медданные).</p>
        </article>
        <article id="faq-make-n8n" class="ym-faq-item reveal">
          <h3>Make/n8n vs «голый» чат-бот</h3>
          <p>Чат без MCP повторяет <strong>теневой</strong> сценарий: файлы уходят в облако модели. <strong>Make com mcp</strong> / <strong>n8n mcp</strong> дают оркестрацию, логи, повторяемые сценарии и стык с 1С/CRM — ближе к Zip orchestration, чем к промпту в браузере.</p>
        </article>
        <article id="faq-sdk-compliance" class="ym-faq-item reveal">
          <h3>Почему 97M загрузок MCP SDK не означают готовность к SOX/152-ФЗ?</h3>
          <p>SDK — про разработку клиентов; compliance — про ваши политики, DLP, договоры, <strong>human in the loop ai</strong> и хранение журналов.</p>
        </article>
        <article id="faq-roi-386" class="ym-faq-item reveal">
          <h3>Можно ли обещать клиенту 386% ROI как у Zip?</h3>
          <p>Нет, если только вы не провели свой TEI. Цифра Forrester — <strong>composite</strong> для крупного enterprise на платформе Zip (<a href="https://zip.com/resources/forrester-total-economic-impact-zip" target="_blank" rel="noopener noreferrer">источник</a>).</p>
        </article>
        <article id="faq-nero" class="ym-faq-item reveal">
          <h3>Кто помогает собрать governed MCP в России?</h3>
          <p>Интеграторы уровня <strong>Nero Network</strong> (Make, n8n, Cursor, агенты): аудит теневого ИИ, gateway, пилот к Bitrix/amoCRM/1С, обучение закупок. Zip используйте как <strong>архитектурный референс</strong>, не как поставщика лицензии.</p>
        </article>
        <article id="faq-start-tomorrow" class="ym-faq-item reveal">
          <h3>С чего начать завтра без бюджета «как у Unicorn»?</h3>
          <p>Запретить загрузку исходников договоров с ПДн в публичный ChatGPT, запустить <strong>один</strong> MCP-read-only к справочнику поставщиков или статусам заявок, назначить владельца политики ИИ.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<aside class="ym-cta-block ym-cta-block--final reveal" aria-label="Призыв к действию">
  <div class="ym-container">
    <div class="ym-card" style="text-align:center; border-color: rgba(14,165,233,0.2);">
      <p style="font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--ym-primary) !important; font-weight: 600; margin: 0 0 12px;">Nero Network</p>
      <h3 style="font-size: 24px; margin-bottom: 12px;">Нужен governed MCP под закупки, 1С и CRM?</h3>
      <p style="max-width: 640px; margin: 0 auto 24px;">Аудит теневого ИИ, self-hosted gateway, пилот Superagent-аналога на Bitrix/amoCRM/1С — без утечки договоров в личный ChatGPT.</p>
      <div class="ym-btn-group" style="justify-content: center;">
        <a class="ym-btn ym-btn-primary" href="#contact-nero" target="_blank" rel="noopener noreferrer"><span>Связаться с Nero Network</span></a>
      </div>
    </div>
  </div>
</aside>

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

<script type="application/ld+json">{"@context": "https://schema.org", "@type": "Article", "headline": "Zip Superagents и MCP: AI-агенты для закупок с аудитом", "description": "Кейс Zip 2 июня 2026: пять Superagents и enterprise MCP к Claude и ChatGPT с OAuth и audit trail. Как внедрить governed AI для закупок, договоров и CRM в РФ без утечек в личный ChatGPT.", "author": {"@type": "Organization", "name": "Nero Network"}, "datePublished": "2026-06-03", "inLanguage": "ru-RU"}</script>
<script type="application/ld+json">{"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Что такое MCP в одном предложении?", "acceptedAnswer": {"@type": "Answer", "text": "Открытый протокол, чтобы AI-ассистенты вызывали корпоративные инструменты по правилам компании, с единым mcp сервер вместо ручной загрузки файлов в чат."}}, {"@type": "Question", "name": "Claude или ChatGPT — что выбрать как MCP-клиент?", "acceptedAnswer": {"@type": "Answer", "text": "Оба поддерживаются экосистемой; Zip отдаёт vendor-hosted MCP сразу к обоим. В РФ выбор зависит от контура данных, договора с вендором и доступности API, не от модного бренда. Технически важнее oauth mcp и scope, чем логотип клиента."}}, {"@type": "Question", "name": "Нужен ли отдельный MCP на каждый отдел?", "acceptedAnswer": {"@type": "Answer", "text": "Обычно — один gateway, разные RBAC-роли и наборы tools. Отдельные серверы оправданы при жёстком разделении контуров (холдинг, ГОЗ, медданные)."}}, {"@type": "Question", "name": "Make/n8n vs «голый» чат-бот", "acceptedAnswer": {"@type": "Answer", "text": "Чат без MCP повторяет теневой сценарий: файлы уходят в облако модели. Make com mcp / n8n mcp дают оркестрацию, логи, повторяемые сценарии и стык с 1С/CRM — ближе к Zip orchestration, чем к промпту в браузере."}}, {"@type": "Question", "name": "Почему 97M загрузок MCP SDK не означают готовность к SOX/152-ФЗ?", "acceptedAnswer": {"@type": "Answer", "text": "SDK — про разработку клиентов; compliance — про ваши политики, DLP, договоры, human in the loop ai и хранение журналов."}}, {"@type": "Question", "name": "Можно ли обещать клиенту 386% ROI как у Zip?", "acceptedAnswer": {"@type": "Answer", "text": "Нет, если только вы не провели свой TEI. Цифра Forrester — composite для крупного enterprise на платформе Zip (источник)."}}, {"@type": "Question", "name": "Кто помогает собрать governed MCP в России?", "acceptedAnswer": {"@type": "Answer", "text": "Интеграторы уровня Nero Network (Make, n8n, Cursor, агенты): аудит теневого ИИ, gateway, пилот к Bitrix/amoCRM/1С, обучение закупок. Zip используйте как архитектурный референс, не как поставщика лицензии."}}, {"@type": "Question", "name": "С чего начать завтра без бюджета «как у Unicorn»?", "acceptedAnswer": {"@type": "Answer", "text": "Запретить загрузку исходников договоров с ПДн в публичный ChatGPT, запустить один MCP-read-only к справочнику поставщиков или статусам заявок, назначить владельца политики ИИ."}}]}</script>

<?php
get_footer();
