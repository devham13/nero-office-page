<?php
/**
 * Template Name: MCP ИИ-агент контроль качества продаж
 * Description: Лонгрид Nero Network — MCP, CRM, контроль демовстреч (slug: mcp-ii-agent-kontrol-kachestva-prodazh)
 */

$page_seo_title = 'ИИ-агент на MCP: контроль качества продаж и +28% к выручке';
$page_seo_description = 'Кейс Аспро.Cloud: MCP-агент разбирает 100% демовстреч по чек-листу, CRM и Telegram. Как повторить связку MCP + CRM + Zoom для отдела продаж — пошагово.';

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

<!-- wp:html -->
<style>
/**
 * ЭТАЛОННЫЕ СТИЛИ ЛОНГРИДА (страница «Яндекс Метрика Skill» из эталонной темы владельца).
 *
 * Исходник темы: page-yandex-metrika-skill.php (inline <style>).
 * Для дизайнера Наташи: открывай этот файл «как есть» — не ходи на сайт за CSS.
 *
 * Как использовать на новой странице:
 * - Скопируй в тему или в блок <style>; в селекторах замени класс обёртки
 *   `.mcp-ii-agent-kontrol-kachestva-prodazh-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.mcp-ii-agent-kontrol-kachestva-prodazh-page {
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
    --ym-shadow-lg: 0 20px 40px -10px rgba(14, 165, 233, 0.18);
}

.mcp-ii-agent-kontrol-kachestva-prodazh-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.mcp-ii-agent-kontrol-kachestva-prodazh-page h1,
.mcp-ii-agent-kontrol-kachestva-prodazh-page h2,
.mcp-ii-agent-kontrol-kachestva-prodazh-page h3,
.mcp-ii-agent-kontrol-kachestva-prodazh-page h4,
.mcp-ii-agent-kontrol-kachestva-prodazh-page h5,
.mcp-ii-agent-kontrol-kachestva-prodazh-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.mcp-ii-agent-kontrol-kachestva-prodazh-page p,
.mcp-ii-agent-kontrol-kachestva-prodazh-page li,
.mcp-ii-agent-kontrol-kachestva-prodazh-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.mcp-ii-agent-kontrol-kachestva-prodazh-page strong,
.mcp-ii-agent-kontrol-kachestva-prodazh-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.mcp-ii-agent-kontrol-kachestva-prodazh-page pre, .mcp-ii-agent-kontrol-kachestva-prodazh-page code {
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
    background: radial-gradient(circle, rgba(14, 165, 233,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: linear-gradient(90deg, #0ea5e9, #0ea5e9);
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
    box-shadow: 0 5px 15px rgba(14, 165, 233,0.2);
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
    background: #0ea5e9;
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
#mcp-qc-hero-dispatch.fullscreen-white-office.mcp-qc-hero-wrap {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.mcp-ii-intro-section { padding: 56px 0 24px; }
.mcp-ii-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 20px;
}
@media (min-width: 900px) {
  .mcp-ii-intro-grid { grid-template-columns: 1.1fr 0.9fr; align-items: start; }
}
.mcp-ii-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #0ea5e9, #8b5cf6) 1;
  padding-left: 24px;
}
.mcp-ii-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.mcp-ii-intro-lead { font-size: 19px !important; font-weight: 600; color: #0f172a !important; }
.mcp-ii-intro-deco .ym-mac-window { margin-bottom: 0; }
.mcp-ii-toc-wrap { padding: 8px 20px 48px; }
.mcp-ii-toc-wrap .ym-toc { margin-top: 0; }
.ym-content-prose { max-width: 820px; margin: 0 auto; }
.ym-content-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; color: #0f172a !important; }
.ym-content-prose p, .ym-content-prose li { font-size: 16px; line-height: 1.7; margin-bottom: 16px; }
.ym-content-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; font-size: 15px; }
.ym-content-prose th, .ym-content-prose td { border: 1px solid var(--ym-border); padding: 12px 14px; text-align: left; }
.ym-content-prose th { background: #f1f5f9; font-weight: 700; }
.ym-content-prose strong { color: #0f172a !important; }
.ym-content-prose ul, .ym-content-prose ol { padding-left: 1.25em; margin-bottom: 20px; }
.ym-split-block { display: grid; grid-template-columns: 1fr; gap: 28px; align-items: start; }
@media (min-width: 900px) { .ym-split-block { grid-template-columns: 1fr 1fr; } }
.ym-cta-band .ym-card { border: 1px solid var(--ym-border); border-radius: 20px; padding: 32px; background: var(--ym-surface); box-shadow: var(--ym-shadow); }

</style>

<main id="primary" class="site-main mcp-ii-agent-kontrol-kachestva-prodazh-page" role="main" tabindex="-1" style="padding-top:0">
<section id="mcp-qc-hero-dispatch" class="fullscreen-white-office mcp-qc-hero-wrap" aria-label="Hero: ИИ-агент MCP и контроль качества продаж">
<style>
.fullscreen-white-office.mcp-qc-hero-wrap {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 48%, #eef2ff 100%);
}
.mcp-qc-hero-wrap::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(circle at 1px 1px, rgba(15, 23, 42, 0.06) 1px, transparent 0);
  background-size: 28px 28px;
  pointer-events: none;
  z-index: 0;
}
#mcp-qc-sales-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.mcp-qc-copy-block {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 4;
}
.giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.06;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0ea5e9, #8b5cf6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.8vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 620px;
}
.telegram-button.mcp-qc-cta {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 22px;
  padding: 12px 22px;
  background: #0f172a;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  transition: transform 0.2s;
  z-index: 4;
  position: relative;
}
.telegram-button.mcp-qc-cta:hover { transform: translateY(-2px); }
.mcp-qc-stages-left.vl-ui-tasks {
  position: absolute;
  left: clamp(12px, 3vw, 48px);
  top: clamp(72px, 12vh, 140px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.mcp-qc-metrics-top.vl-ui-pill {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  left: auto;
  bottom: auto;
  transform: none;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 10px;
  max-width: min(420px, 90vw);
  z-index: 3;
}
.vl-ui-task {
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
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
}
.vl-ui-task span {
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
.vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 700;
  color: #334155;
  box-shadow: 0 2px 10px rgba(15, 23, 42, 0.05);
}
@media (max-width: 900px) {
  .mcp-qc-stages-left.vl-ui-tasks { display: none; }
  .mcp-qc-copy-block { bottom: 18vh; }
}
</style>

<canvas id="mcp-qc-sales-hero-canvas" aria-hidden="true"></canvas>

<div class="mcp-qc-metrics-top vl-ui-pill" role="list" aria-label="Метрики кейса">
  <span role="listitem">100% демо</span>
  <span role="listitem">−50% время РОПа</span>
  <span role="listitem">+28% выручка</span>
</div>

<nav class="mcp-qc-stages-left vl-ui-tasks" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Транскрипт Zoom</div>
  <div class="vl-ui-task"><span>2</span> LLM + чек-лист</div>
  <div class="vl-ui-task"><span>3</span> MCP в CRM</div>
  <div class="vl-ui-task"><span>4</span> Telegram РОПу</div>
  <div class="vl-ui-task"><span>5</span> Калибровка KPI</div>
</nav>

<div class="mcp-qc-copy-block">
  <h1 class="giant-seo">ИИ-агент на MCP: контроль качества продаж и <span>+28% к выручке</span> — как повторить</h1>
  <p class="giant-seo-sub">Кейс Аспро.Cloud: 100% разбор демовстреч, CRM и Telegram без ручного прослушивания — пошаговая схема для вашего отдела продаж</p>
  <a class="telegram-button mcp-qc-cta" href="#" rel="noopener">Обсудить внедрение в Telegram</a>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("mcp-qc-sales-hero-canvas");
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
    cy = ch / 2 - 20;
    scale = cw < 768 ? cw / 620 : Math.min(cw / 1050, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    lane: "#cbd5e1",
    laneWave: "#94a3b8",
    chip: "#e0f2fe",
    chipAlt: "#ddd6fe",
    hubBg: "#ffffff",
    hubSide: "#e2e8f0",
    good: "#10b981",
    improve: "#f59e0b",
    mcp: "#6366f1",
    tg: "#0ea5e9",
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

  class WaveformLane {
    constructor(y, speed, chipColor) {
      this.y = y;
      this.speed = speed;
      this.chipColor = chipColor;
    }
    draw(ctx, prg) {
      const w = 420;
      const x0 = -w / 2;
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.lane;
      ctx.beginPath();
      for (let i = 0; i <= w; i += 8) {
        const wx = x0 + i;
        const wy = this.y + Math.sin((i + frame * 2) * 0.04) * 6;
        if (i === 0) ctx.moveTo(wx, wy);
        else ctx.lineTo(wx, wy);
      }
      ctx.stroke();
      const active = prg < 165;
      if (!active) return;
      for (let n = 0; n < 3; n++) {
        const offset = (frame * this.speed + n * 95) % 340;
        const cxChip = x0 + offset - 40;
        if (cxChip > x0 + 30 && cxChip < x0 + w - 30) {
          drawPolyRound(ctx, cxChip - 18, this.y - 10, 36, 18, 4, n % 2 ? this.chipColor : C.chipAlt, C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("TXT", cxChip, this.y + 2);
        }
      }
    }
  }

  class ChecklistScanner {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, fillRatio) {
      drawPolyRound(ctx, this.x, this.y, 44, 52, 6, "#f8fafc", C.outline);
      for (let i = 0; i < 4; i++) {
        const on = fillRatio > i * 0.22;
        drawPolyRound(ctx, this.x + 8, this.y + 10 + i * 11, 28, 6, 2, on ? C.good : "#e2e8f0", C.outline);
      }
    }
  }

  class CrmMcpHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.stampScale = 0;
      this.ringR = 0;
      this.tgPing = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.045) % CYCLE;
      ctx.lineJoin = "round";
      drawPolyRound(ctx, this.x - 110, this.y - 90, 220, 180, 12, C.hubBg, C.outline);
      drawPolyRound(ctx, this.x - 110, this.y - 90, 220, 28, [12, 12, 0, 0], C.hubSide, C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 10px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("Сделка · MCP", this.x - 96, this.y - 72);

      const fill = Math.min(1, Math.max(0, (prg - 40) / 70));
      for (let i = 0; i < 5; i++) {
        const barW = 150 * Math.min(1, Math.max(0, fill - i * 0.15));
        drawPolyRound(ctx, this.x - 90, this.y - 48 + i * 22, barW, 12, 3, i < 2 ? "#bbf7d0" : "#fde68a", C.outline);
      }

      if (prg > 95) {
        const glow = Math.min(1, (prg - 95) / 40);
        for (let s = 0; s < 5; s++) {
          const ang = -Math.PI / 2 + s * (Math.PI * 2 / 5);
          const sx = this.x + Math.cos(ang) * 118;
          const sy = this.y + Math.sin(ang) * 88;
          drawPolyRound(ctx, sx - 14, sy - 14, 28, 28, 8, "#eef2ff", C.outline);
          ctx.fillStyle = C.mcp;
          ctx.font = "bold 8px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("MCP", sx, sy + 3);
          if (glow > 0.3) {
            ctx.strokeStyle = C.mcp;
            ctx.globalAlpha = glow * 0.5;
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(this.x, this.y);
            ctx.lineTo(sx, sy);
            ctx.stroke();
            ctx.globalAlpha = 1;
          }
        }
      }

      if (prg > 155) {
        const t = (prg - 155) / 25;
        this.stampScale = Math.min(1, t * 1.2);
        this.ringR = Math.min(55, t * 70);
        this.tgPing = Math.sin(frame * 0.2) * 4;
        ctx.save();
        ctx.translate(this.x + 72, this.y - 58 + this.tgPing);
        drawPolyRound(ctx, -16, -12, 32, 24, 6, C.tg, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 9px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("TG", 0, 4);
        ctx.restore();
        ctx.strokeStyle = C.good;
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(this.x, this.y + 20, this.ringR, 0, Math.PI * 2);
        ctx.globalAlpha = 0.35;
        ctx.stroke();
        ctx.globalAlpha = 1;
        ctx.save();
        ctx.translate(this.x, this.y + 24);
        ctx.scale(this.stampScale, this.stampScale);
        drawPolyRound(ctx, -42, -18, 84, 36, 8, C.good, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 12px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("QC ✓", 0, 5);
        ctx.restore();
        ctx.font = "900 22px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillStyle = C.good;
        ctx.strokeStyle = "#fff";
        ctx.lineWidth = 3;
        ctx.strokeText("+28%", this.x, this.y - 108 - t * 8);
        ctx.fillText("+28%", this.x, this.y - 108 - t * 8);
      } else {
        this.stampScale = 0;
        this.ringR = 0;
      }
    }
  }

  class KpiPulseRing {
    draw(ctx, prg) {
      if (prg < 150 || prg > 210) return;
      const pulse = 0.5 + Math.sin(frame * 0.08) * 0.5;
      ctx.strokeStyle = `rgba(14, 165, 233, ${0.15 * pulse})`;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.arc(0, -30, 160 + pulse * 12, 0, Math.PI * 2);
      ctx.stroke();
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
    draw(ctx, prg) {
      this.timer += 0.03;
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;
      const hubX = 0;
      const hubY = -50;
      const roleOffset = { "1_architect": [-70, 30], "2_seo": [-40, 55], "3_coder": [10, 40], "4_designer": [50, 55], "5_deployer": [75, 25] };
      const [txOff, tyOff] = roleOffset[this.role] || [0, 0];
      const targetX = hubX + txOff;
      const targetY = hubY + tyOff;

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 11) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          this.x = this.baseX + (targetX - this.baseX) * (local / 11);
          this.y = this.baseY + (targetY - this.baseY) * (local / 11);
        } else if (local < 14) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          const back = (local - 14) / 8;
          this.x = targetX - (targetX - this.baseX) * back;
          this.y = targetY - (targetY - this.baseY) * back;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 ? this.color : null;
      }

      if (!isMoving && frame % 190 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";
      let legL = 0, legR = 0;
      if (isMoving) {
        const w = this.timer * 6;
        legL = Math.sin(w) * 5;
        legR = Math.sin(w + Math.PI) * 5;
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
        ctx.lineTo(hx + 10, hy - 12);
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
      if (carryType) drawPolyRound(ctx, -20 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const prgFn = () => (frame * 0.045) % CYCLE;

  const lanes = [
    new WaveformLane(-95, 0.55, C.chip),
    new WaveformLane(15, 0.48, "#cffafe"),
    new WaveformLane(125, 0.62, C.chipAlt)
  ];
  const hub = new CrmMcpHub(0, -50);
  const scanner = new ChecklistScanner(-155, -20);
  const kpiRing = new KpiPulseRing();

  entities.push(
    new Agent(-240, 100, C.agentYellow, "1_architect", 18, ["Чек-лист 16 пунктов", "Шкала 0–1", "Критерии демо"]),
    new Agent(-200, 160, C.agentGreen, "2_seo", 58, ["Охват 100%", "KPI в Sheets", "+28% в отчёте"]),
    new Agent(-120, 70, C.agentBlue, "3_coder", 98, ["MCP → CRM", "Preview режим", "Bearer API-key"]),
    new Agent(40, 150, C.agentPink, "4_designer", 138, ["Good / Improve", "Карточка сделки", "Шаблон письма"]),
    new Agent(120, 85, C.agentPurple, "5_deployer", 178, ["Make после Zoom", "n8n триггер", "ОС за минуты"])
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
    const prg = prgFn();

    kpiRing.draw(ctx, prg);
    lanes.forEach((ln) => ln.draw(ctx, prg));
    scanner.draw(ctx, Math.min(1, Math.max(0, (prg - 25) / 80)));
    hub.draw(ctx);
    entities.forEach((a) => a.draw(ctx, prg));

    if (prg >= 16 && prg < 16.08) createBubble(-240, 70, "1. Ingest Zoom");
    if (prg >= 56 && prg < 56.08) createBubble(-200, 130, "2. Оценка LLM");
    if (prg >= 96 && prg < 96.08) createBubble(-120, 40, "3. Write-back MCP");
    if (prg >= 136 && prg < 136.08) createBubble(40, 120, "4. Отчёт UX");
    if (prg >= 176 && prg < 176.08) createBubble(120, 55, "5. Seal + Telegram");

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

<section class="mcp-ii-intro-section reveal" aria-label="Введение">
  <div class="mcp-ii-intro-grid">
    <div class="mcp-ii-intro-text">
      <p class="mcp-ii-intro-lead"><strong>Коротко:</strong> российский B2B-вендор Аспро.Cloud автоматизировал разбор демовстреч через связку Zoom → LLM → MCP в CRM и за месяц зафиксировал рост выручки на 28% при освобождении более половины времени руководителя отдела продаж.</p>
      <p>Ниже — разбор архитектуры, калибровки, альтернатив и пошаговая схема повторения без привязки к одному вендору CRM.</p>
    </div>
    <div class="mcp-ii-intro-deco reveal delay-200">
      <div class="ym-mac-window">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">mcp-pipeline · qc-agent</span>
        </div>
        <div class="ym-mac-body">
          <div><span class="ym-command">$</span> zoom transcript → llm checklist</div>
          <div><span class="ym-command">$</span> mcp write-back --preview</div>
          <div class="ym-comment"># 100% демо · ОС за минуты</div>
          <div><span class="ym-command">$</span> telegram notify rop</div>
        </div>
      </div>
      <div class="ym-bento-grid" style="grid-template-columns:repeat(3,1fr);margin-top:16px;">
        <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">+28%</div><div class="ym-stat-label">выручка</div></div>
        <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">100%</div><div class="ym-stat-label">демо в разборе</div></div>
        <div class="ym-bento-card ym-bento-stat"><div class="ym-stat-value">−50%</div><div class="ym-stat-label">время РОПа</div></div>
      </div>
    </div>
  </div>
</section>
<div class="mcp-ii-toc-wrap reveal">
  <nav class="ym-toc" aria-label="Оглавление">
    <a href="#zachem-ropu">Зачем РОПу MCP</a>
    <a href="#mcp-crm">MCP + CRM</a>
    <a href="#kontrol-kachestva">Контроль демо</a>
    <a href="#rechevaya-analitika">Речевая аналитика</a>
    <a href="#poshagovoe-vnedrenie">6 шагов</a>
    <a href="#roi-kpi">ROI и риски</a>
    <a href="#faq">FAQ</a>
    <a href="#cta-nero-network">Внедрение</a>
  </nav>
</div>


<section class="ym-section reveal" id="zachem-ropu">
  <div class="ym-container">
    <h2 class="ym-section-title">Зачем РОПу ИИ-агент на MCP</h2>
    <p class="ym-section-subtitle">Операционная дыра между объёмом демо и способностью руководителя давать своевременную оценку качества.</p>
    <div class="ym-content-prose">
      <p><strong>Определение:</strong> ИИ-агент для отдела продаж — это не чат-бот в мессенджере, а цепочка: расшифровка встречи → оценка по чек-листу → запись результата в CRM и уведомление руководителю. Протокол <strong>MCP (Model Context Protocol)</strong> даёт агенту стандартизированный доступ к CRM так же, как к файлам или API, без «ручного копирования» оценок.</p>
      <h3>Боль обратной связи и выборочного контроля</h3>
      <p>Типичная ситуация в B2B с длинным циклом сделки: менеджеры проводят <strong>демонстрации в Zoom</strong>, запись и транскрипт есть, но руководитель физически не успевает прослушать всё. Контроль качества сводится к выборочным встречам — часто только по клиентам категории A. Обратная связь менеджеру запаздывает на <strong>1–2 дня</strong>.</p>
      <p>По обзору Sostav, <strong>39%</strong> компаний в России уже используют ИИ-агентов в коммерческих процессах, <strong>82%</strong> планируют внедрение в горизонте <strong>1–3 лет</strong> (<a href="https://www.sostav.ru/blogs/289090/86563" rel="noopener noreferrer" target="_blank">sostav.ru</a>).</p>
      <h3>Цифры кейса Аспро.Cloud: +28%, −50% времени РОПа, 100% встреч</h3>
      <p>Канонический кейс опубликован на РБК <strong>29 мая 2026</strong> (<a href="https://companies.rbc.ru/news/q4pJpuueSQ/kak-ii-agent-osvobodil-50-vremeni-ropa-i-podnyal-vyiruchku-na-28/" rel="noopener noreferrer" target="_blank">companies.rbc.ru</a>). Исходная нагрузка: <strong>3 менеджера</strong>, около <strong>5 демо в день</strong> на человека — порядка <strong>7,5 часов видео в день</strong>.</p>
      <table>
        <thead><tr><th>Показатель</th><th>До</th><th>После</th></tr></thead>
        <tbody>
          <tr><td>Охват встреч</td><td>Выборочный контроль</td><td><strong>100%</strong> демовстреч</td></tr>
          <tr><td>Обратная связь</td><td><strong>1–2 дня</strong></td><td><strong>Несколько минут</strong></td></tr>
          <tr><td>Время РОПа</td><td>Высокая доля прослушивания</td><td>Освобождено <strong>более 50%</strong></td></tr>
          <tr><td>Выручка</td><td>—</td><td><strong>+28% за месяц</strong></td></tr>
        </tbody>
      </table>
      <p><strong>Итог блока:</strong> ИИ-агент на MCP закрывает операционную дыру между объёмом демо и способностью РОПа давать своевременную <strong>оценку качества звонков</strong> и демовстреч.</p>
    </div>
  </div>
</section>
<!-- CTA-1 PRIMARY -->
<aside class="ym-cta-band reveal" aria-labelledby="cta-mid-title">
  <div class="ym-card" style="max-width:720px;margin:32px auto;text-align:center;">
    <h3 id="cta-mid-title" class="ym-section-title" style="font-size:28px;margin-bottom:12px;">Повторить 100% разбор демо под ваш отдел продаж</h3>
    <p class="ym-section-subtitle" style="margin-bottom:24px;">Связка Zoom → LLM → MCP в CRM и отчёт в Telegram — без привязки к одному вендору CRM.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}?utm_source=longread&amp;utm_medium=cta&amp;utm_campaign=mcp-ii-agent-kontrol-kachestva-prodazh&amp;utm_content=mid-after-zachem-ropu"><span>Заявка на аудит контроля демо и звонков</span></a>
    </div>
  </div>
</aside>
<!-- /CTA-1 -->
<section class="ym-section ym-section-alt reveal" id="mcp-crm">
  <div class="ym-container">
    <h2 class="ym-section-title">MCP в связке CRM и телефонии</h2>
    <p class="ym-section-subtitle">MCP — открытый протокол контекста между LLM и внешними системами (CRM, таблицы, мессенджеры).</p>
    <div class="ym-content-prose">
      <p><strong>Коротко:</strong> в кейсе Аспро агент <strong>записывает</strong> оценку в сделку через официальный MCP-сервер продукта, а не только «советует в чате».</p>
      <h3>Слой LLM + CRM: не интеграция «ради галочки»</h3>
      <ol>
        <li><strong>Транскрипт Zoom</strong> (встроенная расшифровка встречи).</li>
        <li><strong>LLM</strong> анализирует текст по чек-листу.</li>
        <li>Результаты в <strong>Google Sheets</strong>, <strong>комментарий к сделке в Аспро.Cloud</strong> и <strong>еженедельный отчёт в Telegram</strong>.</li>
      </ol>
      <p>Права ИИ в CRM через MCP <strong>не шире</strong>, чем у API-ключа; для изменений — <strong>режим preview</strong>. Endpoint: <code>https://mcp.aspro.cloud/mcp</code> (<a href="https://aspro.cloud/help/articles/10556-10557--ai-mcp/" rel="noopener noreferrer" target="_blank">документация Аспро</a>).</p>
      <h3>MCP Hub Yandex AI Studio vs экосистема Anthropic</h3>
      <p><strong>Российский контур:</strong> <a href="https://aistudio.yandex.ru/docs/ru/ai-studio/concepts/mcp-hub/" rel="noopener noreferrer" target="_blank">MCP Hub</a> в Yandex AI Studio. <strong>Глобальный контур:</strong> покупка Anthropic <strong>Stainless</strong> (18.05.2026). Спецификация MCP RC <strong>2026-07-28</strong> — stateless HTTP (<a href="https://blog.modelcontextprotocol.io/posts/2026-07-28-release-candidate/" rel="noopener noreferrer" target="_blank">blog.modelcontextprotocol.io</a>).</p>
<p>Контекст рынка genAI в РФ (из материалов Аспро, «Яков и Партнёры»): <strong>71%</strong> крупных российских компаний уже применяли genAI в бизнесе в <strong>2025</strong>, объём рынка — <strong>58 млрд ₽</strong> (около пятикратного роста к 2024) (<a href="https://companies.rbc.ru/news/0WKkybHDMt/v-asprocloud-k-zadacham-i-sdelkam-poyavilsya-ii-dostup-cherez-protokol-mcp/" rel="noopener noreferrer" target="_blank">companies.rbc.ru</a>).</p>
    </div>
  </div>
</section>
<section id="mcp-ii-agent-kontrol-kachestva-prodazh-boris-block" class="boris-article-viz reveal" aria-labelledby="boris-mcp-qa-title">
<style>
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block {
  --boris-bg: #f8fafc;
  --boris-surface: #ffffff;
  --boris-text: #334155;
  --boris-heading: #0f172a;
  --boris-border: #e2e8f0;
  --boris-accent: #2563eb;
  --boris-mcp: #7c3aed;
  --boris-ok: #10b981;
  --boris-warn: #f59e0b;
  margin: 48px 0;
  font-family: Inter, system-ui, sans-serif;
  color: var(--boris-text);
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-shell {
  max-width: 1180px;
  margin: 0 auto;
  padding: 0 20px;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-card {
  background: var(--boris-surface);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
  padding: 28px 32px 32px;
  background-image: linear-gradient(135deg, rgba(37, 99, 235, 0.04) 0%, rgba(124, 58, 237, 0.03) 100%);
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: stretch;
}
@media (min-width: 1024px) {
  #mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-grid {
    grid-template-columns: 55fr 45fr;
    gap: 36px;
  }
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--boris-mcp);
  margin: 0 0 10px;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-kicker {
  font-size: clamp(1.25rem, 2.2vw, 1.5rem);
  font-weight: 700;
  color: var(--boris-heading);
  line-height: 1.25;
  margin: 0 0 12px;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-lead {
  font-size: 15px;
  line-height: 1.55;
  margin: 0 0 18px;
  max-width: 36em;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-stats {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin: 0 0 16px;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  background: #eff6ff;
  color: #1e40af;
  border: 1px solid #dbeafe;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-pill--ok {
  background: #ecfdf5;
  color: #047857;
  border-color: #a7f3d0;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-pill strong {
  font-weight: 800;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-bullets {
  margin: 0;
  padding-left: 1.15em;
  font-size: 14px;
  line-height: 1.6;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-bullets li {
  margin-bottom: 6px;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-bridge {
  font-size: 13px;
  color: #64748b;
  margin: 14px 0 0;
  font-style: italic;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-canvas-wrap {
  position: relative;
  min-height: 380px;
  max-height: 70vh;
  height: clamp(380px, 42vw, 520px);
  border-radius: 18px;
  border: 1px solid var(--boris-border);
  background: linear-gradient(180deg, #ffffff 0%, #f1f5f9 100%);
  overflow: hidden;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block #mcp-boris-checklist-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-caption {
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: 10px;
  text-align: center;
  font-size: 11px;
  color: #64748b;
  pointer-events: none;
  background: rgba(255, 255, 255,  0.85);
  border-radius: 8px;
  padding: 4px 8px;
}
@media (max-width: 767px) {
  #mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-card {
    padding: 22px 18px 24px;
  }
  #mcp-ii-agent-kontrol-kachestva-prodazh-boris-block .boris-canvas-wrap {
    min-height: 320px;
    height: 360px;
  }
}
</style>
<div class="boris-shell">
  <div class="boris-card">
    <div class="boris-grid">
      <div class="boris-copy">
        <p class="boris-eyebrow">Мост контроля · не hero</p>
        <h3 id="boris-mcp-qa-title" class="boris-kicker">От транскрипта Zoom до поля в CRM — за минуты</h3>
        <p class="boris-lead">Связка из кейса Аспро: LLM сверяет демо с <strong>16 критериями</strong> (шкала 0 / 0,5 / 1), агент через <strong>MCP</strong> пишет в сделку, РОП видит свод в Telegram — без выборочного прослушивания.</p>
        <div class="boris-stats" aria-hidden="true">
          <span class="boris-pill boris-pill--ok"><strong>100%</strong> демо</span>
          <span class="boris-pill"><strong>16</strong> критериев</span>
          <span class="boris-pill"><strong>MCP</strong> → CRM</span>
        </div>
        <ul class="boris-bullets">
          <li>Транскрипт встречи — вход, не «чат ради чата».</li>
          <li>Калибровка 2–4 недели: ИИ и РОП в одной шкале.</li>
          <li>Preview перед записью в сделку — безопасный write-back.</li>
        </ul>
        <p class="boris-bridge">Дальше — чек-лист, калибровка и 100% охват Zoom в следующем разделе.</p>
      </div>
      <div class="boris-canvas-wrap" role="img" aria-label="Анимация: транскрипт демо, оценка по чек-листу, запись в CRM через MCP и уведомление в Telegram">
        <canvas id="mcp-boris-checklist-canvas" width="640" height="480"></canvas>
        <p class="boris-caption">Zoom → LLM (чек-лист) → MCP → CRM · параллельно Telegram</p>
      </div>
    </div>
  </div>
</div>
<script id="mcp-boris-qa-engine">
(function () {
  "use strict";
  var canvas = document.getElementById("mcp-boris-checklist-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var wrap = canvas.parentElement;
  var frame = 0;
  var phase = 0;

  var PAL = {
    ink: "#0f172a",
    muted: "#94a3b8",
    zoom: "#2563eb",
    llm: "#7c3aed",
    mcp: "#0d9488",
    crm: "#059669",
    tg: "#0284c7",
    ok: "#10b981",
    mid: "#f59e0b",
    low: "#ef4444",
    card: "#ffffff",
    line: "#e2e8f0"
  };

  function resize() {
    if (!wrap) return;
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var w = wrap.clientWidth;
    var h = wrap.clientHeight;
    canvas.width = Math.floor(w * dpr);
    canvas.height = Math.floor(h * dpr);
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function rr(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    if (fill) { ctx.fillStyle = fill; ctx.fill(); }
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
  }

  function drawLabel(x, y, text, color) {
    ctx.fillStyle = color || PAL.muted;
    ctx.font = "600 11px Inter, system-ui, sans-serif";
    ctx.fillText(text, x, y);
  }

  function drawTranscript(x, y, w, h, scroll) {
    rr(x, y, w, h, 10, PAL.card, PAL.ink);
    rr(x + 10, y + 10, w - 20, 22, 6, PAL.zoom, null);
    ctx.fillStyle = "#fff";
    ctx.font = "700 11px Inter, sans-serif";
    ctx.fillText("Zoom · транскрипт", x + 16, y + 25);
    for (var i = 0; i < 5; i++) {
      var lw = w - 36 - (i % 3) * 18;
      rr(x + 14, y + 44 + i * 14 - (scroll % 14), lw, 8, 3, "#cbd5e1", null);
    }
  }

  function drawChecklist(x, y, w, h, tick) {
    rr(x, y, w, h, 10, "#faf5ff", PAL.llm);
    drawLabel(x + 12, y + 18, "Чек-лист · 16 критериев", PAL.llm);
    var barW = w - 28;
    for (var i = 0; i < 8; i++) {
      var by = y + 28 + i * 16;
      rr(x + 12, by, barW, 10, 4, PAL.line, null);
      var score = ((tick + i * 17) % 3);
      var fill = score === 2 ? PAL.ok : score === 1 ? PAL.mid : PAL.low;
      var pct = score === 2 ? 1 : score === 1 ? 0.5 : 0.15;
      rr(x + 12, by, barW * pct, 10, 4, fill, null);
    }
    ctx.fillStyle = PAL.ink;
    ctx.font = "600 10px Inter, sans-serif";
    ctx.fillText("Good / Improve / Work on", x + 12, y + h - 10);
  }

  function drawMcpHub(cx, cy, pulse) {
    var r = 28 + Math.sin(pulse) * 3;
    ctx.strokeStyle = PAL.mcp;
    ctx.lineWidth = 2;
    ctx.setLineDash([4, 4]);
    ctx.beginPath();
    ctx.arc(cx, cy, r + 12, 0, Math.PI * 2);
    ctx.stroke();
    ctx.setLineDash([]);
    rr(cx - r, cy - r, r * 2, r * 2, r, PAL.card, PAL.mcp);
    ctx.fillStyle = PAL.mcp;
    ctx.font = "800 12px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("MCP", cx, cy + 4);
    ctx.textAlign = "left";
  }

  function drawCrmCard(x, y, w, h, flash) {
    rr(x, y, w, h, 10, PAL.card, PAL.crm);
    drawLabel(x + 12, y + 20, "CRM · сделка", PAL.crm);
    rr(x + 12, y + 30, w - 24, 36, 6, flash > 0 ? "#d1fae5" : "#f1f5f9", PAL.line);
    ctx.fillStyle = PAL.ink;
    ctx.font = "600 10px Inter, sans-serif";
    ctx.fillText("Оценка: " + (72 + (frame % 20)) + "% · комментарий ИИ", x + 18, y + 52);
    rr(x + 12, y + 74, w - 24, 8, 3, PAL.crm, null);
  }

  function drawTelegram(x, y, ping) {
    rr(x, y, 44, 44, 22, PAL.tg, PAL.ink);
    ctx.fillStyle = "#fff";
    ctx.font="700 9px Inter,sans-serif";
    ctx.textAlign="center";
    ctx.fillText("TG", x + 22, y + 26);
    ctx.textAlign="left";
    if (ping > 0.5) {
      rr(x + 32, y - 4, 14, 14, 7, PAL.low, null);
      ctx.fillStyle = "#fff";
      ctx.font = "700 9px Inter,sans-serif";
      ctx.fillText("1", x + 37, y + 6);
    }
  }

  function drawPacket(x1, y1, x2, y2, t, color) {
    var px = x1 + (x2 - x1) * t;
    var py = y1 + (y2 - y1) * t - Math.sin(t * Math.PI) * 18;
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.arc(px, py, 5, 0, Math.PI * 2);
    ctx.fill();
  }

  function render() {
    var w = wrap ? wrap.clientWidth : 640;
    var h = wrap ? wrap.clientHeight : 480;
    ctx.clearRect(0, 0, w, h);

    phase = (frame * 0.008) % 1;
    var scroll = frame * 0.4;

    var pad = 16;
    var colW = (w - pad * 3) / 2;
    var topY = pad + 8;
    var midH = h * 0.42;

    drawTranscript(pad, topY, colW, midH, scroll);
    drawChecklist(pad + colW + pad, topY, colW, midH, frame);

    var hubX = w * 0.5;
    var hubY = topY + midH + 36;
    drawMcpHub(hubX, hubY, frame * 0.06);

    var crmX = pad;
    var crmY = hubY + 44;
    var crmW = w - pad * 2;
    var crmH = h - crmY - pad - 24;
    var flash = phase > 0.55 && phase < 0.85 ? 1 : 0;
    drawCrmCard(crmX, crmY, crmW, Math.max(90, crmH), flash);

    drawTelegram(w - pad - 48, crmY + 8, Math.sin(frame * 0.08) * 0.5 + 0.5);

    var t1 = (phase * 1.2) % 1;
    var t2 = ((phase + 0.35) * 1.2) % 1;
    drawPacket(pad + colW * 0.5, topY + midH, hubX, hubY - 20, t1, PAL.llm);
    drawPacket(hubX, hubY + 28, crmX + crmW * 0.5, crmY, t2, PAL.mcp);

    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 1.5;
    ctx.beginPath();
    ctx.moveTo(pad + colW * 0.5, topY + midH);
    ctx.lineTo(hubX, hubY - 32);
    ctx.lineTo(crmX + crmW * 0.35, crmY);
    ctx.stroke();

    frame++;
    requestAnimationFrame(render);
  }

  window.addEventListener("resize", resize);
  resize();
  render();
})();
</script>
</section>
<section class="ym-section reveal" id="kontrol-kachestva">
  <div class="ym-container">
    <h2 class="ym-section-title">Контроль качества демовстреч нейросетью</h2>
    <div class="ym-split-block">
      <div class="ym-content-prose">
        <p><strong>Определение:</strong> систематическая оценка записи/транскрипта по чек-листу с фиксацией в CRM — не разовый разбор «лучших и худших» звонков.</p>
        <h3>Чек-лист, шкала оценок и калибровка промпта</h3>
        <p>Чек-лист из <strong>16 критериев</strong>, шкала <strong>0 / 0,5 / 1</strong>; отчёт — <strong>Good / Improve / Work on</strong>. Первые недели параллельно оценивали РОП и ИИ; модель <strong>занижала</strong> требования без калибровки.</p>
        <ul>
          <li>Две таблицы: оценки РОП и ИИ по одним встречам.</li>
          <li>Считать расхождение по критериям.</li>
          <li>Корректировать промпт (few-shot).</li>
          <li>KPI — только после стабилизации.</li>
        </ul>
        <h3>100% охват Zoom-транскриптов</h3>
        <p>Источник — <strong>встроенная расшифровка Zoom</strong>. Менеджеры получают ОС по каждой встрече; РОП переключается на агрегированные отчёты.</p>
      </div>
      <div class="ym-card reveal delay-200">
        <div class="ym-card-icon" aria-hidden="true">✓</div>
        <h3>Калибровка 2–4 недели</h3>
        <p>Любую ИИ-автоматизацию, где результат влияет на деньги, верифицируют вручную на старте — урок кейса Аспро.</p>
        <div class="ym-stat-trend">16 критериев · 0/0.5/1</div>
      </div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt reveal" id="rechevaya-analitika">
  <div class="ym-container">
    <h2 class="ym-section-title">Речевая аналитика и анализ звонков нейросетью</h2>
    <div class="ym-content-prose">
      <p><strong>Коротко:</strong> для телефонии — готовые SaaS с STT и QA; для демо B2B в Zoom — транскрипт + LLM + MCP.</p>
      <h3>Цепочка STT → LLM</h3>
      <ol>
        <li>Запись с АТС или софтфона.</li>
        <li><strong>STT</strong> (распознавание речи).</li>
        <li><strong>LLM</strong> или правила — чек-лист, тональность.</li>
        <li>Выгрузка в CRM и дашборды ОКК.</li>
      </ol>
      <h3>Сравнение: Ringostat, Rechka.ai, Habr-кейс</h3>
      <table>
        <thead><tr><th>Решение</th><th>Что заявляют</th><th>Когда уместно</th></tr></thead>
        <tbody>
          <tr><td><strong>Ringostat AI Supervisor</strong></td><td>ОКК в 3–7 раз дешевле при 100% охвате</td><td>Телефония + готовый QA</td></tr>
          <tr><td><strong>Rechka.ai</strong></td><td>STT 92–96%, от ~60 000 ₽/мес</td><td>Быстрый старт колл-центра</td></tr>
          <tr><td><strong>Habr (WhisperX + NeMo)</strong></td><td>Охват 99% vs 10% вручную</td><td>Свой стек, есть разработка</td></tr>
        </tbody>
      </table>
      <p><strong>Уникальный зазор:</strong> связка <strong>MCP</strong> с <strong>автозаписью в CRM агентом</strong> и демовстречи B2B с ROI в выручке.</p>
    </div>
  </div>
</section>

<section class="ym-section reveal" id="poshagovoe-vnedrenie">
  <div class="ym-container">
    <h2 class="ym-section-title">Пошаговое внедрение: 6 шагов</h2>
    <p class="ym-section-subtitle">Zoom transcript → LLM → Sheets/KPI → MCP write-back → Telegram</p>
    <div class="ym-timeline reveal">
      <div class="ym-step"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>Чек-лист и KPI</h3><p>16 критериев, шкала 0/0,5/1, блоки Good / Improve / Work on.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>Источник транскриптов</h3><p>Zoom для демо; АТС + STT для телефонии. Юридика записи — см. блок рисков.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>Промпт и LLM</h3><p>Структурированный JSON: баллы, цитаты, рекомендации, черновик письма.</p></div></div>
      <div class="ym-step"><div class="ym-step-num">4</div><div class="ym-step-content"><h3>Калибровка 2–4 недели</h3><p><strong>Не</strong> привязывать к зарплате до стабилизации расхождений.</p></div></div>
<!-- CTA-2 SECONDARY -->
<aside class="ym-cta-inline reveal" aria-labelledby="cta-training-title">
  <div class="ym-card" style="margin:28px 0;padding:28px 32px;">
    <h4 id="cta-training-title" style="margin:0 0 10px;font-size:20px;">Нужна опора на этапе калибровки и Make/n8n?</h4>
    <p style="margin:0 0 16px;">Разбор промптов, чек-листа и оркестрации — в программе обучения автоматизации и вайбкодингу: от настройки MCP до безопасного write-back в CRM.</p>
    <a class="ym-btn ym-btn-secondary" href="${SECONDARY_CTA_URL}?utm_source=longread&amp;utm_medium=cta&amp;utm_campaign=mcp-ii-agent-kontrol-kachestva-prodazh&amp;utm_content=secondary-calibration-training">${SECONDARY_CTA_LABEL}</a>
  </div>
</aside>
<!-- /CTA-2 -->
      <div class="ym-step"><div class="ym-step-num">5</div><div class="ym-step-content"><h3>MCP + CRM + preview</h3><p>MCP-сервер CRM, минимальные права API. Cursor 3.6 Auto-review для Shell/MCP/Fetch (<a href="https://cursor.com/changelog/auto-review" rel="noopener noreferrer" target="_blank">changelog</a>).</p></div></div>
      <div class="ym-step"><div class="ym-step-num">6</div><div class="ym-step-content"><h3>Отчётность</h3><p>Sheets/BI, Telegram-дайджест, триггер Make/n8n: транскрипт → LLM → MCP → сообщение менеджеру.</p></div></div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt reveal" id="roi-kpi">
  <div class="ym-container">
    <h2 class="ym-section-title">ROI, KPI и риски</h2>
    <div class="ym-content-prose">
      <h3>Экономика: время РОПа и выручка</h3>
      <p>ROI из кейса: <strong>+28% выручки</strong>, <strong>&gt;50%</strong> времени руководителя, <strong>100%</strong> встреч, ОС с дней до минут.</p>
      <table>
        <thead><tr><th>Критерий</th><th>Коробка</th><th>Агент + MCP</th></tr></thead>
        <tbody>
          <tr><td>Охват</td><td>Часто 100% звонков</td><td>100% при настроенном источнике</td></tr>
          <tr><td>Запись в CRM агентом</td><td>Зависит от интеграции</td><td>Через MCP / API</td></tr>
          <tr><td>Владение чек-листом</td><td>Вендор</td><td>Ваша команда</td></tr>
        </tbody>
      </table>
      <h3>Юридика записи демо и звонков в РФ</h3>
      <ul>
        <li><strong>152-ФЗ:</strong> голос и транскрипты — персональные данные.</li>
        <li>Уведомление о записи; с <strong>01.09.2025</strong> — отдельное согласие на ПДн.</li>
        <li>Демо в Zoom: предупреждение в приглашении и на записи.</li>
      </ul>
      <p><strong>Безопасность MCP:</strong> права агента = права API-ключа; preview перед изменением сделок.</p>
    </div>
  </div>
</section>

<section class="ym-section reveal" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left"><h3 style="margin-top:0">Вопросы</h3><ul class="ym-faq-list"><li><a href="#faq-mcp">Что такое MCP простыми словами?</a></li><li><a href="#faq-saas">Чем ИИ-агент на MCP отличается от SaaS а…</a></li><li><a href="#faq-zp">Можно ли сразу привязать оценки ИИ к зар…</a></li><li><a href="#faq-stt">Нужен ли отдельный STT, если есть Zoom?</a></li><li><a href="#faq-yandex">MCP Hub Yandex или зарубежный MCP?</a></li><li><a href="#faq-preview">Как защитить CRM от ошибочной записи?</a></li><li><a href="#faq-cost">Сколько стоит повторить кейс?</a></li><li><a href="#faq-aspro">Подходит ли только для Аспро.Cloud?</a></li></ul></aside>
      <div><article class="ym-faq-item reveal" id="faq-mcp"><h3>Что такое MCP простыми словами?</h3><p>Открытый протокол, через который LLM-агент подключается к CRM, базам и API по единым правилам — как «USB для ИИ-интеграций».</p></article><article class="ym-faq-item reveal" id="faq-saas"><h3>Чем ИИ-агент на MCP отличается от SaaS анализа звонков?</h3><p>SaaS закрывает STT+QA в своём контуре; MCP+CRM позволяет вашей LLM и чек-листу писать в сделку после Zoom-демо.</p></article><article class="ym-faq-item reveal" id="faq-zp"><h3>Можно ли сразу привязать оценки ИИ к зарплате?</h3><p>Нет — без калибровки 2–4 недели модель занижала требования в кейсе Аспро.</p></article><article class="ym-faq-item reveal" id="faq-stt"><h3>Нужен ли отдельный STT, если есть Zoom?</h3><p>Для демо — достаточно расшифровки Zoom; для телефонии — STT или платформа с записью.</p></article><article class="ym-faq-item reveal" id="faq-yandex"><h3>MCP Hub Yandex или зарубежный MCP?</h3><p>При IAM и локализации — Yandex AI Studio; при глобальном стеке — экосистема Anthropic.</p></article><article class="ym-faq-item reveal" id="faq-preview"><h3>Как защитить CRM от ошибочной записи?</h3><p>Минимальные права API, режим preview, ручное подтверждение, Auto-review в Cursor.</p></article><article class="ym-faq-item reveal" id="faq-cost"><h3>Сколько стоит повторить кейс?</h3><p>Ориентир Rechka — от ~60 000 ₽/мес за ОКК; кастом MCP+Make/n8n зависит от LLM и интеграции.</p></article><article class="ym-faq-item reveal" id="faq-aspro"><h3>Подходит ли только для Аспро.Cloud?</h3><p>Нет — любая CRM с MCP/API и стек Nero Network: Make/n8n + MCP + LLM + Telegram.</p></article></div>
    </div>
  </div>
</section>

<!-- CTA-3 PRIMARY FINAL -->
<section class="ym-section ym-section-alt reveal" id="cta-nero-network" aria-labelledby="cta-final-title">
  <div class="ym-container" style="max-width:800px;margin:0 auto;padding:0 20px;">
    <h2 id="cta-final-title" class="ym-section-title">CTA: внедрение с Nero Network</h2>
    <p class="ym-section-subtitle">Повторить связку <strong>MCP + CRM + Zoom/телефония</strong> под ваш отдел продаж — без привязки к одному вендору CRM.</p>
    <div class="ym-card">
      <ul style="margin:0 0 24px;padding-left:1.2em;line-height:1.7;">
        <li>чек-лист и этап <strong>калибровки</strong> под вашу шкалу РОПа;</li>
        <li>оркестрацию на <strong>Make</strong> или <strong>n8n</strong>;</li>
        <li>подключение <strong>MCP-сервера</strong> вашей CRM и безопасный write-back;</li>
        <li>отчёты в <strong>Telegram</strong> и свод KPI.</li>
      </ul>
      <p style="margin:0 0 20px;"><strong>Следующий шаг:</strong> аудит текущего контроля демо и звонков — объём встреч, источники транскриптов, готовность CRM к MCP (в т.ч. Yandex MCP Hub).</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}?utm_source=longread&amp;utm_medium=cta&amp;utm_campaign=mcp-ii-agent-kontrol-kachestva-prodazh&amp;utm_content=final-audit-cta"><span>Заявка на аудит контроля демо и звонков</span></a>
      </div>
    </div>
  </div>
</section>
<!-- /CTA-3 -->
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
  "@graph": [
    {
      "@type": "Article",
      "headline": "ИИ-агент на MCP: контроль качества продаж и +28% к выручке",
      "description": "Кейс Аспро.Cloud: MCP-агент разбирает 100% демовстреч по чек-листу, CRM и Telegram.",
      "author": {"@type": "Organization", "name": "Nero Network"},
      "datePublished": "2026-05-31",
      "inLanguage": "ru-RU"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {"@type": "Question", "name": "Что такое MCP простыми словами?", "acceptedAnswer": {"@type": "Answer", "text": "Открытый протокол доступа LLM к CRM и API."}},
        {"@type": "Question", "name": "Можно ли сразу привязать оценки ИИ к зарплате?", "acceptedAnswer": {"@type": "Answer", "text": "Нет, нужна калибровка 2–4 недели."}}
      ]
    }
  ]
}
</script>

<!-- /wp:html -->

<?php
get_footer();
