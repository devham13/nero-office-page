<?php
/**
 * Template Name: Claude Opus 4.8 Dynamic Workflows
 * Description: Лонгрид Nero Network — Opus 4.8 и Dynamic Workflows для бизнеса.
 */

$page_seo_title = 'Claude Opus 4.8 и Dynamic Workflows: гайд для бизнеса';
$page_seo_description = 'Релиз Anthropic 28.05.2026: Opus 4.8, Dynamic Workflows и сотни субагентов в Claude Code. Как автоматизировать разработку через API, Cursor, Make и MCP — без лишнего штата.';

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
 *   `.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #7c3aed;
    --ym-accent: #d97706;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(124, 58, 237, 0.15);
}

.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h1,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h2,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h3,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h4,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h5,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page p,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page li,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page strong,
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page pre, .claude-opus-4-8-dynamic-workflows-dlya-biznesa-page code {
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
    background: radial-gradient(circle, rgba(124, 58, 237,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(124, 58, 237, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(124, 58, 237, 0.2);
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
    background: linear-gradient(90deg, #7c3aed, #d97706);
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
    box-shadow: 0 5px 15px rgba(124, 58, 237,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(124, 58, 237, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(124, 58, 237, 0.5);
    background: #6d28d9;
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
    border-color: rgba(124, 58, 237, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(124, 58, 237, 0.05);
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
#opus48-orchestra-hero, .opus48-orchestra-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-section {
  padding: clamp(48px, 6vw, 80px) 0 clamp(32px, 4vw, 48px);
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
  gap: clamp(24px, 4vw, 48px);
  align-items: start;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #7c3aed, #d97706) 1;
  padding-left: clamp(16px, 2vw, 24px);
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.7;
  margin: 0 0 16px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-kicker {
  font-size: 13px;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #7c3aed !important;
  margin: 0 0 12px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-deco .ym-mac-window {
  margin-bottom: 0;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chip {
  padding: 8px 14px;
  border-radius: 999px;
  background: #fff;
  border: 1px solid var(--ym-border);
  font-size: 12px;
  font-weight: 600;
  color: #334155 !important;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-toc-wrap {
  text-align: center;
  padding-bottom: 20px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-content-prose {
  max-width: 900px;
  margin: 0 auto;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-content-prose h2 {
  font-size: clamp(28px, 3vw, 36px);
  font-weight: 800;
  margin: 0 0 20px;
  letter-spacing: -0.5px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-content-prose h3 {
  font-size: 22px;
  font-weight: 700;
  margin: 32px 0 14px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-content-prose p, .claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-content-prose li {
  font-size: 16px;
  line-height: 1.7;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-table-wrap {
  overflow-x: auto;
  margin: 24px 0;
  border-radius: 16px;
  border: 1px solid var(--ym-border);
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-table-wrap table {
  width: 100%;
  border-collapse: collapse;
  font-size: 14px;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-table-wrap th, .claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-table-wrap td {
  padding: 12px 16px;
  border-bottom: 1px solid var(--ym-border);
  text-align: left;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-table-wrap th {
  background: #f1f5f9;
  font-weight: 700;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-checklist {
  list-style: none;
  padding: 0;
  margin: 20px 0;
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-checklist li {
  padding: 10px 0 10px 28px;
  position: relative;
  border-bottom: 1px dashed var(--ym-border);
}
.claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .ym-checklist li::before {
  content: "☐";
  position: absolute;
  left: 0;
  color: #7c3aed;
  font-weight: 700;
}
@media (max-width: 900px) {
  .claude-opus-4-8-dynamic-workflows-dlya-biznesa-page .claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main claude-opus-4-8-dynamic-workflows-dlya-biznesa-page" role="main" tabindex="-1">
<section id="opus48-orchestra-hero" class="fullscreen-white-office opus48-orchestra-hero" aria-label="Claude Opus 4.8 и Dynamic Workflows — оркестрация субагентов">
  <style>
    .opus48-orchestra-hero {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      background: #f8fafc;
      background-image:
        radial-gradient(circle at 50% 38%, rgba(139, 92, 246, 0.06) 0%, transparent 55%),
        linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
      background-size: auto, 48px 48px, 48px 48px;
    }
    .opus48-orchestra-hero #opus48-orchestra-hero-canvas {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
    }
    .opus48-orchestra-hero .opus48-hero-copy {
      position: absolute;
      left: clamp(16px, 4vw, 56px);
      bottom: clamp(24px, 6vh, 72px);
      max-width: min(720px, 92vw);
      z-index: 3;
    }
    .opus48-orchestra-hero .giant-seo {
      font-size: clamp(32px, 4.6vw, 64px);
      font-weight: 900;
      line-height: 1.1;
      letter-spacing: -1.5px;
      color: #0f172a;
      margin: 0;
    }
    .opus48-orchestra-hero .giant-seo span {
      display: block;
      margin-top: 0.15em;
      background: linear-gradient(90deg, #d97706, #7c3aed);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .opus48-orchestra-hero .giant-seo-sub {
      font-size: clamp(15px, 1.9vw, 20px);
      line-height: 1.55;
      color: rgba(15, 23, 42, 0.72);
      margin: 18px 0 0;
      max-width: 680px;
    }
    .opus48-orchestra-hero .telegram-button {
      position: absolute;
      top: clamp(16px, 3vh, 32px);
      right: clamp(16px, 4vw, 48px);
      z-index: 4;
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
      box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
    }
    .opus48-orchestra-hero .telegram-button:hover { transform: translateY(-2px); }
    .opus48-orchestra-hero .opus48-hero-steps {
      position: absolute;
      left: clamp(12px, 3vw, 40px);
      top: clamp(72px, 12vh, 140px);
      display: flex;
      flex-direction: column;
      gap: 10px;
      z-index: 3;
      max-width: 280px;
    }
    .opus48-orchestra-hero .vl-ui-task {
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
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    }
    .opus48-orchestra-hero .vl-ui-task span {
      width: 28px;
      height: 28px;
      background: linear-gradient(135deg, #7c3aed, #d97706);
      color: #fff;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 800;
      flex-shrink: 0;
    }
    .opus48-orchestra-hero .opus48-hero-pill {
      position: absolute;
      top: clamp(16px, 3vh, 36px);
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      z-index: 3;
      max-width: 96vw;
    }
    .opus48-orchestra-hero .opus48-hero-pill span {
      padding: 9px 16px;
      background: rgba(255, 255, 255, 0.94);
      border: 1px solid #e2e8f0;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      color: #334155;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }
    @media (max-width: 900px) {
      .opus48-orchestra-hero .opus48-hero-steps {
        top: auto;
        bottom: calc(clamp(200px, 38vh, 320px));
        flex-direction: row;
        flex-wrap: wrap;
        max-width: calc(100vw - 32px);
      }
      .opus48-orchestra-hero .vl-ui-task { font-size: 11px; padding: 8px 12px; }
      .opus48-orchestra-hero .opus48-hero-copy { bottom: clamp(16px, 4vh, 40px); }
    }
  </style>

  <canvas id="opus48-orchestra-hero-canvas" aria-hidden="true"></canvas>

  <a class="telegram-button" href="https://t.me/neronetwork" target="_blank" rel="noopener noreferrer">Telegram Nero Network</a>

  <div class="opus48-hero-pill vl-ui-pill" role="list">
    <span role="listitem">Opus 4.8</span>
    <span role="listitem">Dynamic Workflows</span>
    <span role="listitem">effort xhigh</span>
    <span role="listitem">Make + MCP</span>
  </div>

  <div class="opus48-hero-steps vl-ui-tasks" aria-label="Этапы оркестрации">
    <div class="vl-ui-task"><span>1</span> Kickoff workflow</div>
    <div class="vl-ui-task"><span>2</span> Параллельные субагенты</div>
    <div class="vl-ui-task"><span>3</span> Adversarial verify</div>
    <div class="vl-ui-task"><span>4</span> Merge + MCP</div>
  </div>

  <div class="opus48-hero-copy">
    <h1 class="giant-seo">
      Claude Opus 4.8 и Dynamic Workflows:
      <span>как сотни AI-субагентов автоматизируют разработку и процессы в бизнесе</span>
    </h1>
    <p class="giant-seo-sub">Разбор релиза Anthropic от 28 мая 2026: параллельные субагенты, миграции кода и что внедрить в Make, Cursor и MCP уже сейчас</p>
  </div>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const canvas = document.getElementById("opus48-orchestra-hero-canvas");
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
      cy = ch * 0.42;
      scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 800) * 1.35;
    }
    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    const C = {
      outline: "#0f172a",
      hubFill: "#ede9fe",
      hubStroke: "#7c3aed",
      orbit: "#cbd5e1",
      orbitActive: "#8b5cf6",
      taskChip: "#fef3c7",
      verify: "#f97316",
      merge: "#10b981",
      agentYellow: "#eab308",
      agentGreen: "#10b981",
      agentBlue: "#3b82f6",
      agentPink: "#ec4899",
      agentPurple: "#8b5cf6",
      bubbleBg: "#ffffff",
      mcpMake: "#7c3aed",
      mcpCursor: "#0ea5e9"
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

    function drawHex(ctx, x, y, r, fill, stroke) {
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {
        const a = (Math.PI / 3) * i - Math.PI / 6;
        const px = x + Math.cos(a) * r;
        const py = y + Math.sin(a) * r * 0.85;
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

    class RadialTaskStream {
      constructor() {
        this.lanes = [
          { r: 95, speed: 0.018, offset: 0, color: "#fde68a" },
          { r: 130, speed: 0.014, offset: 1.2, color: "#bfdbfe" },
          { r: 165, speed: 0.011, offset: 2.4, color: "#ddd6fe" }
        ];
      }
      draw(ctx) {
        const prg = (frame * 0.04) % 240;
        this.lanes.forEach((lane, li) => {
          ctx.save();
          ctx.strokeStyle = prg > 60 && prg < 150 ? C.orbitActive : C.orbit;
          ctx.lineWidth = li === 1 ? 2.5 : 1.5;
          ctx.setLineDash([6, 10]);
          ctx.beginPath();
          ctx.ellipse(0, -70, lane.r, lane.r * 0.55, 0, Math.PI * 0.15, Math.PI * 0.85);
          ctx.stroke();
          ctx.setLineDash([]);
          const t = frame * lane.speed + lane.offset;
          for (let k = 0; k < 4; k++) {
            const ang = Math.PI * 0.2 + ((t + k * 0.45) % 2.2);
            const px = Math.cos(ang) * lane.r;
            const py = -70 + Math.sin(ang) * lane.r * 0.55;
            drawPolyRound(ctx, px - 7, py - 7, 14, 14, 3, lane.color, C.outline);
          }
          ctx.restore();
        });
      }
    }

    class WorkflowConductorCore {
      constructor(x, y) {
        this.x = x;
        this.y = y;
        this.mergeFlash = 0;
      }
      draw(ctx) {
        const prg = (frame * 0.04) % 240;
        drawHex(ctx, this.x, this.y, 42, C.hubFill, C.hubStroke);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("DW", this.x, this.y - 2);
        ctx.font = "600 7px Inter, sans-serif";
        ctx.fillStyle = "#64748b";
        ctx.fillText("Opus 4.8", this.x, this.y + 10);

        const swarmN = prg < 70 ? Math.floor(prg / 8) : prg < 150 ? 8 + Math.floor((prg - 70) / 10) : 14;
        for (let i = 0; i < swarmN; i++) {
          const a = (frame * 0.03 + i * 0.45) % (Math.PI * 2);
          const dist = 55 + (i % 3) * 18 + Math.sin(frame * 0.05 + i) * 6;
          const sx = this.x + Math.cos(a) * dist;
          const sy = this.y + Math.sin(a) * dist * 0.5;
          ctx.fillStyle = i % 2 ? C.agentBlue : C.agentPurple;
          ctx.beginPath();
          ctx.arc(sx, sy, 4, 0, Math.PI * 2);
          ctx.fill();
          ctx.strokeStyle = C.outline;
          ctx.lineWidth = 1;
          ctx.stroke();
        }

        if (prg >= 150 && prg < 190) {
          const pulse = 0.6 + Math.sin(frame * 0.12) * 0.25;
          ctx.strokeStyle = C.verify;
          ctx.lineWidth = 3;
          ctx.globalAlpha = pulse;
          ctx.beginPath();
          ctx.ellipse(this.x, this.y, 78, 48, 0, 0, Math.PI * 2);
          ctx.stroke();
          ctx.globalAlpha = 1;
        }

        if (prg >= 190) {
          this.mergeFlash = Math.min(1, this.mergeFlash + 0.04);
          const alpha = this.mergeFlash;
          ctx.save();
          ctx.globalAlpha = alpha;
          drawPolyRound(ctx, this.x - 28, this.y - 38, 56, 22, 6, C.merge, C.outline);
          ctx.fillStyle = "#fff";
          ctx.font = "bold 10px Inter, sans-serif";
          ctx.fillText("MERGE ✓", this.x, this.y - 24);
          ctx.restore();
        } else {
          this.mergeFlash = 0;
        }
      }
    }

    class EffortGauge {
      constructor(x, y) {
        this.x = x;
        this.y = y;
      }
      draw(ctx) {
        drawPolyRound(ctx, this.x, this.y, 52, 36, 6, "#fff", C.outline);
        ctx.fillStyle = "#64748b";
        ctx.font = "600 7px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("effort", this.x + 26, this.y + 10);
        const prg = (frame * 0.04) % 240;
        const level = prg > 120 ? 0.92 : prg > 40 ? 0.65 : 0.35;
        drawPolyRound(ctx, this.x + 6, this.y + 16, 40 * level, 8, 2, C.verify, null);
        ctx.fillStyle = C.outline;
        ctx.fillText(prg > 120 ? "xhigh" : "high", this.x + 26, this.y + 30);
      }
    }

    class McpBridgePanel {
      constructor(x, y) {
        this.x = x;
        this.y = y;
      }
      draw(ctx) {
        drawPolyRound(ctx, this.x, this.y, 88, 40, 6, "#fff", C.outline);
        drawPolyRound(ctx, this.x + 6, this.y + 8, 34, 24, 4, C.mcpMake, C.outline);
        drawPolyRound(ctx, this.x + 48, this.y + 8, 34, 24, 4, C.mcpCursor, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 7px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("Make", this.x + 23, this.y + 22);
        ctx.fillText("Cursor", this.x + 65, this.y + 22);
        const blink = frame % 40 < 20;
        if (blink) {
          ctx.strokeStyle = C.merge;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.moveTo(this.x + 40, this.y + 20);
          ctx.lineTo(this.x + 48, this.y + 20);
          ctx.stroke();
        }
      }
    }

    class WorkflowScriptRibbon {
      draw(ctx) {
        const prg = (frame * 0.04) % 240;
        if (prg < 25) return;
        const w = Math.min(120, (prg - 25) * 2);
        drawPolyRound(ctx, -200, -150, w, 14, 3, "#f1f5f9", C.outline);
        ctx.fillStyle = "#94a3b8";
        for (let i = 0; i < 3; i++) {
          drawPolyRound(ctx, -194 + i * 18, -146, 12, 4, 1, "#cbd5e1", null);
        }
      }
    }

    class Agent {
      constructor(x, y, color, role, stepTrig, orbitDeg, dialogs) {
        this.baseX = x;
        this.baseY = y;
        this.x = x;
        this.y = y;
        this.color = color;
        this.role = role;
        this.stepTrig = stepTrig;
        this.orbitDeg = orbitDeg;
        this.dialogs = dialogs;
        this.timer = Math.random() * 100;
        this.hitAnimation = 0;
      }

      draw(ctx) {
        this.timer += 0.03;
        const prg = (frame * 0.04) % 240;
        let isMoving = false;
        let faceDir = 1;
        let carryType = null;

        const orbitR = 88;
        const rad = (this.orbitDeg * Math.PI) / 180;
        const targetX = Math.cos(rad) * orbitR;
        const targetY = -70 + Math.sin(rad) * orbitR * 0.52;

        if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
          const local = prg - this.stepTrig;
          if (local < 11) {
            isMoving = true;
            faceDir = 1;
            carryType = this.color;
            const t = local / 11;
            this.x = this.baseX + (targetX - this.baseX) * t;
            this.y = this.baseY + (targetY - this.baseY) * t;
          } else if (local < 14) {
            this.x = targetX;
            this.y = targetY;
          } else {
            isMoving = true;
            faceDir = -1;
            const t = (local - 14) / 8;
            this.x = targetX + (this.baseX - targetX) * t;
            this.y = targetY + (this.baseY - targetY) * t;
          }
        } else {
          this.x = this.baseX;
          this.y = this.baseY;
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
          const walkPhase = this.timer * 6;
          legL = Math.sin(walkPhase) * 5;
          legR = Math.sin(walkPhase + Math.PI) * 5;
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
          drawPolyRound(ctx, -18 * faceDir, -18 - bob, 14, 14, 2, carryType, C.outline);
        }
        ctx.restore();
      }
    }

    const entities = [];
    const bubbles = [];
    const radial = new RadialTaskStream();
    const core = new WorkflowConductorCore(0, -72);
    const effort = new EffortGauge(-210, -120);
    const mcp = new McpBridgePanel(165, 55);
    const ribbon = new WorkflowScriptRibbon();

    entities.push(radial);
    entities.push(ribbon);
    entities.push(core);
    entities.push(effort);
    entities.push(mcp);

    entities.push(
      new Agent(-240, 95, C.agentYellow, "1_architect", 18, 215, [
        "Create a workflow…",
        "Kickoff: миграция модуля",
        "Скрипт оркестрации готов"
      ])
    );
    entities.push(
      new Agent(-120, 130, C.agentGreen, "2_seo", 58, 195, [
        "Discovery по монорепе",
        "Мёртвый код найден",
        "Параллельный review"
      ])
    );
    entities.push(
      new Agent(10, 125, C.agentBlue, "3_coder", 98, 165, [
        "Субагент: рефакторинг",
        "Ветка миграции",
        "Тесты 99,8% — ждём merge"
      ])
    );
    entities.push(
      new Agent(130, 110, C.agentPink, "4_designer", 138, 145, [
        "MCP: Make → CRM",
        "Cursor: daily dev",
        "Три контура связаны"
      ])
    );
    entities.push(
      new Agent(220, 90, C.agentPurple, "5_deployer", 178, 125, [
        "Adversarial verify…",
        "Human review PR",
        "Merge после verify"
      ])
    );

    function createBubble(x, y, text, customLife = 280) {
      bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
    }

    function drawAmbientWave(ctx) {
      const prg = (frame * 0.04) % 240;
      if (prg < 30) return;
      ctx.strokeStyle = "rgba(124, 58, 237, 0.12)";
      ctx.lineWidth = 1;
      for (let w = 0; w < 3; w++) {
        const rr = 200 + w * 35 + Math.sin(frame * 0.02 + w) * 8;
        ctx.beginPath();
        ctx.ellipse(0, -70, rr, rr * 0.4, 0, 0, Math.PI * 2);
        ctx.stroke();
      }
    }

    function engineloop() {
      frame++;
      ctx.clearRect(0, 0, cw, ch);
      ctx.save();
      ctx.translate(cx, cy);
      ctx.scale(scale, scale);

      drawAmbientWave(ctx);
      entities.sort((a, b) => (a.y || 0) - (b.y || 0));
      entities.forEach((ent) => ent.draw(ctx));

      const prg = (frame * 0.04) % 240;
      if (prg >= 16 && prg < 16.08) createBubble(-240, 55, "1. Kickoff workflow");
      if (prg >= 56 && prg < 56.08) createBubble(-120, 90, "2. Сотни субагентов");
      if (prg >= 96 && prg < 96.08) createBubble(10, 85, "3. Параллельный код");
      if (prg >= 136 && prg < 136.08) createBubble(130, 70, "4. MCP-мост");
      if (prg >= 156 && prg < 156.08) createBubble(0, -130, "Adversarial verify");
      if (prg >= 196 && prg < 196.08) createBubble(220, 50, "5. Merge готов");

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
<section class="ym-section claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-section reveal" id="intro">
  <div class="ym-container">
    <div class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-grid">
      <div class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-text reveal-left">
        <p class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-kicker">Релиз 28 мая 2026</p>
        <p>28 мая 2026 года Anthropic одновременно усилила флагманскую модель и вынесла в research preview механизм, который меняет правила игры для команд с кодом и тяжёлыми операционными процессами.</p>
        <p><strong>Claude Opus 4.8</strong> — инкремент над 4.7 с акцентом на честность и качество кода; <strong>Dynamic Workflows</strong> в Claude Code — способ запускать десятки и сотни параллельных субагентов под оркестрационным скриптом, а не вручную «кормить» чат задачами.</p>
        <div class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chips" aria-hidden="true">
          <span class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chip">$5 / $25 за 1M токенов</span>
          <span class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chip">Dynamic Workflows</span>
          <span class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-kpi-chip">Make + MCP</span>
        </div>
      </div>
      <div class="claude-opus-4-8-dynamic-workflows-dlya-biznesa-intro-deco reveal-right delay-100">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">claude code · workflow</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-comment"># три контура для SMB</div>
            <div><span class="ym-command">A)</span> Claude Code + Opus 4.8 → миграции</div>
            <div><span class="ym-command">B)</span> Cursor 3.5 → daily dev</div>
            <div><span class="ym-command">C)</span> Make AI Agents + MCP → ops</div>
          </div>
        </div>
      </div>
    </div>
    <div class="ym-toc-wrap reveal delay-200">
      <nav class="ym-toc" aria-label="Оглавление">
        <a href="#chto-anonsiroval">Релиз Opus 4.8</a>
        <a href="#dynamic-workflows">Dynamic Workflows</a>
        <a href="#claude-code-biznes">Для бизнеса</a>
        <a href="#orkestraciya-agentov">Оркестрация</a>
        <a href="#avtomatizaciya-razrabotki">Cursor и Make</a>
        <a href="#plan-vnedreniya">План 7–14 дней</a>
        <a href="#faq">FAQ</a>
        <a href="#itog">Итог</a>
      </nav>
    </div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" id="chto-anonsiroval">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Что анонсировал Anthropic 28 мая 2026: Claude Opus 4.8 в двух словах</h2>
    <p><strong>Определение:</strong> <em>Claude Opus 4.8</em> — обновление линейки Opus (API ID <code>claude-opus-4-8</code>), которое Anthropic описывает как «скромное, но ощутимое» улучшение над 4.7 при <strong>неизменной</strong> базовой цене обычного режима. В тот же день анонсированы <strong>effort control</strong> (claude.ai, Cowork), обновления <strong>Messages API</strong> (system entries внутри <code>messages</code> для смены инструкций mid-task без сброса prompt cache) и <strong>Dynamic Workflows</strong> в Claude Code.</p>
    <p>Источник: <a href="https://www.anthropic.com/news/claude-opus-4-8" target="_blank" rel="noopener noreferrer">релиз Anthropic, 28.05.2026</a>.</p>
    <h3 id="opus-vs-47">Чем Opus 4.8 отличается от 4.7 (бенчмарки, effort, контекст)</h3>
    <p>Главный нарратив релиза — не «ещё +5% в таблице ради слайда», а <strong>честность модели</strong>: по заявлению Anthropic, Opus 4.8 примерно <strong>в 4 раза реже</strong> пропускает дефекты в собственном коде без комментария и чаще явно отмечает неопределённость.</p>
    <div class="ym-bento-grid reveal-scale">
      <div class="ym-bento-card ym-bento-main">
        <div class="ym-stat-value">69,2%</div>
        <div class="ym-stat-label">SWE-Bench Pro</div>
        <span class="ym-stat-trend">vs 4.7: 64,3%</span>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">83,4%</div>
        <div class="ym-stat-label">OSWorld-Verified</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">74,6%</div>
        <div class="ym-stat-label">Terminal-Bench 2.1</div>
      </div>
      <div class="ym-bento-card ym-bento-wide">
        <p style="margin:0;font-size:15px;line-height:1.6;">Fast mode ~<strong>2,5×</strong> скорости при <strong>$10 / $50</strong> за 1M токенов. Effort по умолчанию <strong>high</strong>; для тяжёлого кода — <strong>xhigh</strong> / ultracode.</p>
      </div>
    </div>
    <div class="ym-table-wrap">
      <table>
        <thead><tr><th>Бенчмарк</th><th>Opus 4.8</th><th>Сравнение</th></tr></thead>
        <tbody>
          <tr><td>SWE-Bench Pro</td><td><strong>69,2%</strong></td><td>Opus 4.7: 64,3%; GPT-5.5: 58,6%</td></tr>
          <tr><td>OSWorld-Verified</td><td><strong>83,4%</strong></td><td>У 4.7 пересчитано → 82,3%</td></tr>
          <tr><td>Terminal-Bench 2.1</td><td><strong>74,6%</strong></td><td>GPT-5.5 78,2% (разные harness)</td></tr>
          <tr><td>Humanity's Last Exam</td><td><strong>49,8%</strong> / <strong>57,9%</strong></td><td>без tools / с tools</td></tr>
          <tr><td>GDPval-AA</td><td><strong>1890</strong></td><td>GPT-5.5: 1769</td></tr>
          <tr><td>Online-Mind2Web</td><td><strong>84%</strong></td><td>«meaningful jump»</td></tr>
        </tbody>
      </table>
    </div>
    <p><strong>Итог по сравнению:</strong> Opus 4.8 сильна в агентных сценариях разработки; на <strong>Terminal-Bench 2.1</strong> при сопоставимом harness лидирует GPT-5.5.</p>
    <h3 id="komu-reliz">Кому релиз важен: разработчики, продакты, владельцы SMB</h3>
    <ul>
      <li><strong>Разработчики и техлиды:</strong> миграции, security audit, рефакторинг монореп.</li>
      <li><strong>Продакты и аналитики:</strong> меньше «галлюцинированной» уверенности в отчётах.</li>
      <li><strong>Владельцы SMB:</strong> связка Claude API + Make AI Agents + MCP для CRM и ops.</li>
    </ul>
  </div>
</section>
<section class="ym-section reveal" id="dynamic-workflows">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Dynamic Workflows в Claude Code: параллельные субагенты и миграции «от kickoff до merge»</h2>
    <p><strong>Определение:</strong> <em>Dynamic Workflows</em> — режим research preview, в котором Claude <strong>сам пишет оркестрационные скрипты</strong>, запускает <strong>десятки–сотни</strong> параллельных субагентов, <strong>проверяет</strong> результат до ответа пользователю. Задачи длятся <strong>часы–дни</strong>; прогресс <strong>сохраняется</strong> при обрыве сессии.</p>
    <p>Ken Takao (Lead Systems Engineer, Anthropic): <em>«Dynamic workflows fill the gap between firing off a single subagent and building out a full agent team»</em> — <a href="https://claude.com/blog/introducing-dynamic-workflows-in-claude-code" target="_blank" rel="noopener noreferrer">пост Dynamic Workflows</a>.</p>
  </div>
</section>
<section
  id="claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block"
  class="boris-article-viz ym-section reveal"
  aria-labelledby="boris-orchestra-title"
>
  <div class="ym-container">
    <div class="boris-orchestra-card">
      <div class="boris-orchestra-split">
        <div class="boris-orchestra-copy reveal-left">
          <p class="boris-eyebrow">Визуализация · Dynamic Workflows</p>
          <h3 id="boris-orchestra-title" class="boris-kicker">
            От одного промпта к рою субагентов — с контрольной точкой перед merge
          </h3>
          <p class="boris-lead">
            Claude пишет оркестрационный скрипт, распараллеливает задачи и не отдаёт результат, пока не пройдёт проверка. Дальше разберём ultracode и лимиты usage.
          </p>
          <ul class="boris-points" role="list">
            <li><strong>Kickoff</strong> — цель: миграция, аудит или bug hunt по всей базе</li>
            <li><strong>Субагенты</strong> — десятки–сотни параллельных веток (не один чат)</li>
            <li><strong>Verify</strong> — adversarial refutation до ответа вам</li>
            <li><strong>Merge</strong> — человеческий review и CI остаются обязательными</li>
          </ul>
          <div class="boris-pills" aria-hidden="true">
            <span class="boris-pill boris-pill--accent">workflow-скрипт</span>
            <span class="boris-pill">xhigh / ultracode</span>
            <span class="boris-pill boris-pill--ok">kickoff → merge</span>
          </div>
        </div>
        <div class="boris-orchestra-stage reveal-right delay-100">
          <canvas
            id="opus-orchestra-map-canvas"
            class="boris-orchestra-canvas"
            role="img"
            aria-label="Схема Dynamic Workflows: оркестратор, субагенты, проверка и слияние"
          ></canvas>
          <div class="boris-stage-legend" aria-hidden="true">
            <span><i class="boris-dot boris-dot--script"></i> Скрипт</span>
            <span><i class="boris-dot boris-dot--agent"></i> Субагент</span>
            <span><i class="boris-dot boris-dot--verify"></i> Verify</span>
            <span><i class="boris-dot boris-dot--merge"></i> Merge</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block {
      padding: clamp(48px, 6vw, 72px) 0;
      background: transparent;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
      padding: clamp(24px, 4vw, 40px);
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-split {
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
      gap: clamp(20px, 3vw, 36px);
      align-items: center;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-eyebrow {
      margin: 0 0 10px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #64748b;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-kicker {
      margin: 0 0 14px;
      font-size: clamp(22px, 2.4vw, 28px);
      line-height: 1.25;
      font-weight: 800;
      color: #0f172a;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-lead {
      margin: 0 0 18px;
      font-size: 15px;
      line-height: 1.65;
      color: #334155;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-points {
      margin: 0 0 20px;
      padding-left: 1.15rem;
      color: #334155;
      font-size: 14px;
      line-height: 1.55;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-points li {
      margin-bottom: 8px;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-pill {
      display: inline-flex;
      align-items: center;
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      color: #0f172a;
      background: #fff;
      border: 1px solid #e2e8f0;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-pill--accent {
      border-color: #c4b5fd;
      background: #ede9fe;
      color: #5b21b6;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-pill--ok {
      border-color: #6ee7b7;
      background: #ecfdf5;
      color: #047857;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-stage {
      position: relative;
      min-height: min(520px, 68vh);
      max-height: 720px;
      border-radius: 18px;
      background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 100%);
      border: 1px solid #e2e8f0;
      overflow: hidden;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-canvas {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 380px;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-stage-legend {
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: 10px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px 14px;
      padding: 8px 10px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.92);
      border: 1px solid #e2e8f0;
      font-size: 11px;
      font-weight: 600;
      color: #475569;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-dot {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      margin-right: 5px;
      vertical-align: middle;
    }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-dot--script { background: #8b5cf6; }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-dot--agent { background: #3b82f6; }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-dot--verify { background: #10b981; }
    #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-dot--merge { background: #f59e0b; }
    @media (max-width: 1023px) {
      #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-split {
        grid-template-columns: 1fr;
      }
      #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-stage {
        min-height: 400px;
        max-height: 560px;
      }
    }
    @media (max-width: 767px) {
      #claude-opus-4-8-dynamic-workflows-dlya-biznesa-boris-block .boris-orchestra-card {
        padding: 20px 16px;
      }
    }
  </style>

  <script id="opus-orchestra-map-engine">
  (function opusOrchestraMapEngine() {
    const canvas = document.getElementById("opus-orchestra-map-canvas");
    if (!canvas) return;
    const ctx = canvas.getContext("2d");
    let cw = 0, ch = 0, frame = 0, dpr = 1;

    const PAL = {
      ink: "#0f172a",
      muted: "#94a3b8",
      grid: "rgba(148, 163, 184, 0.18)",
      script: "#8b5cf6",
      scriptGlow: "rgba(139, 92, 246, 0.25)",
      agent: "#3b82f6",
      agentAlt: "#06b6d4",
      verify: "#10b981",
      merge: "#f59e0b",
      pulse: "#d97706",
      line: "#cbd5e1"
    };

    function resize() {
      const parent = canvas.parentElement;
      if (!parent) return;
      dpr = Math.min(window.devicePixelRatio || 1, 2);
      const w = parent.clientWidth;
      const h = Math.max(parent.clientHeight, 380);
      canvas.width = Math.floor(w * dpr);
      canvas.height = Math.floor(h * dpr);
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      cw = w;
      ch = h;
    }

    function roundRect(x, y, w, h, r, fill, stroke) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
      else ctx.rect(x, y, w, h);
      if (fill) { ctx.fillStyle = fill; ctx.fill(); }
      if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
    }

    class OrchestratorHub {
      constructor(x, y) { this.x = x; this.y = y; this.phase = 0; }
      draw() {
        this.phase = (frame * 0.04) % (Math.PI * 2);
        const r = 34 + Math.sin(this.phase) * 3;
        ctx.save();
        ctx.strokeStyle = PAL.scriptGlow;
        ctx.lineWidth = 10;
        ctx.beginPath();
        ctx.arc(this.x, this.y, r + 14, 0, Math.PI * 2);
        ctx.stroke();
        roundRect(this.x - 42, this.y - 28, 84, 56, 14, "#fff", PAL.ink);
        roundRect(this.x - 34, this.y - 18, 68, 10, 3, PAL.script, null);
        roundRect(this.x - 34, this.y - 2, 48, 6, 2, PAL.muted, null);
        roundRect(this.x - 34, this.y + 8, 56, 6, 2, PAL.muted, null);
        ctx.fillStyle = PAL.ink;
        ctx.font = "600 11px Inter, system-ui, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("workflow", this.x, this.y + 26);
        ctx.restore();
      }
    }

    class SubagentNode {
      constructor(x, y, hue) {
        this.x = x; this.y = y; this.hue = hue;
        this.bob = Math.random() * Math.PI * 2;
        this.busy = Math.random();
      }
      draw() {
        const dy = Math.sin(frame * 0.06 + this.bob) * 4;
        const size = 14 + Math.sin(frame * 0.08 + this.busy * 10) * 2;
        ctx.save();
        ctx.translate(this.x, this.y + dy);
        ctx.fillStyle = this.hue;
        ctx.strokeStyle = PAL.ink;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(0, 0, size, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();
        ctx.fillStyle = "#fff";
        ctx.beginPath();
        ctx.arc(-4, -2, 3, 0, Math.PI * 2);
        ctx.arc(4, -2, 3, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }
    }

    class VerifyGate {
      constructor(x, y) { this.x = x; this.y = y; }
      draw() {
        const pulse = 0.85 + Math.sin(frame * 0.1) * 0.15;
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.globalAlpha = pulse;
        ctx.fillStyle = "#ecfdf5";
        ctx.strokeStyle = PAL.verify;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(0, -36);
        ctx.lineTo(32, -8);
        ctx.lineTo(32, 28);
        ctx.lineTo(-32, 28);
        ctx.lineTo(-32, -8);
        ctx.closePath();
        ctx.fill();
        ctx.stroke();
        ctx.strokeStyle = PAL.verify;
        ctx.lineWidth = 3;
        ctx.lineCap = "round";
        ctx.beginPath();
        ctx.moveTo(-12, 4);
        ctx.lineTo(-2, 14);
        ctx.lineTo(14, -8);
        ctx.stroke();
        ctx.globalAlpha = 1;
        ctx.fillStyle = PAL.ink;
        ctx.font = "600 10px Inter, system-ui, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("verify", 0, 44);
        ctx.restore();
      }
    }

    class MergeDock {
      constructor(x, y) { this.x = x; this.y = y; }
      draw() {
        roundRect(this.x - 38, this.y - 22, 76, 44, 10, "#fffbeb", PAL.merge);
        ctx.strokeStyle = PAL.merge;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(this.x - 14, this.y - 4);
        ctx.lineTo(this.x, this.y - 14);
        ctx.lineTo(this.x + 14, this.y - 4);
        ctx.moveTo(this.x - 14, this.y + 6);
        ctx.lineTo(this.x, this.y + 16);
        ctx.lineTo(this.x + 14, this.y + 6);
        ctx.stroke();
        ctx.fillStyle = PAL.ink;
        ctx.font = "600 10px Inter, system-ui, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("merge", this.x, this.y + 34);
      }
    }

  const particles = [];
    function spawnParticle(x1, y1, x2, y2) {
      particles.push({ x1, y1, x2, y2, t: Math.random(), speed: 0.008 + Math.random() * 0.012, hue: Math.random() > 0.5 ? PAL.agent : PAL.agentAlt });
    }

    function drawGrid() {
      ctx.strokeStyle = PAL.grid;
      ctx.lineWidth = 1;
      const step = 32;
      for (let x = 0; x < cw; x += step) {
        ctx.beginPath();
        ctx.moveTo(x, 0);
        ctx.lineTo(x, ch);
        ctx.stroke();
      }
      for (let y = 0; y < ch; y += step) {
        ctx.beginPath();
        ctx.moveTo(0, y);
        ctx.lineTo(cw, y);
        ctx.stroke();
      }
    }

    function drawEdge(x1, y1, x2, y2, active) {
      ctx.strokeStyle = active ? PAL.script : PAL.line;
      ctx.lineWidth = active ? 2.5 : 1.5;
      ctx.setLineDash(active ? [8, 6] : []);
      ctx.lineDashOffset = -frame * (active ? 1.2 : 0.4);
      ctx.beginPath();
      ctx.moveTo(x1, y1);
      const cx = (x1 + x2) / 2;
      const cy = (y1 + y2) / 2 - 24;
      ctx.quadraticCurveTo(cx, cy, x2, y2);
      ctx.stroke();
      ctx.setLineDash([]);
    }

    let hub, verify, merge, agents = [];

    function layout() {
      const pad = 24;
      const hubX = cw * 0.22;
      const hubY = ch * 0.48;
      hub = new OrchestratorHub(hubX, hubY);
      verify = new VerifyGate(cw * 0.58, ch * 0.42);
      merge = new MergeDock(cw * 0.82, ch * 0.52);
      agents = [];
      const count = cw < 400 ? 6 : cw < 700 ? 9 : 12;
      for (let i = 0; i < count; i++) {
        const angle = -0.9 + (i / (count - 1)) * 1.8;
        const radius = Math.min(cw, ch) * 0.28;
        const ax = hubX + Math.cos(angle) * radius + 40;
        const ay = hubY + Math.sin(angle) * radius * 0.55;
        agents.push(new SubagentNode(ax, ay, i % 3 === 0 ? PAL.agentAlt : PAL.agent));
      }
      if (particles.length < 24) {
        agents.forEach((a) => {
          spawnParticle(hubX + 30, hubY, a.x, a.y);
          spawnParticle(a.x, a.y, verify.x - 20, verify.y);
        });
        spawnParticle(verify.x + 20, verify.y, merge.x - 30, merge.y);
      }
    }

    function tickParticles() {
      for (let i = particles.length - 1; i >= 0; i--) {
        const p = particles[i];
        p.t += p.speed;
        if (p.t >= 1) {
          particles.splice(i, 1);
          spawnParticle(p.x1, p.y1, p.x2, p.y2);
          continue;
        }
        const t = p.t;
        const cx = (p.x1 + p.x2) / 2;
        const cy = (p.y1 + p.y2) / 2 - 24;
        const x = (1 - t) * (1 - t) * p.x1 + 2 * (1 - t) * t * cx + t * t * p.x2;
        const y = (1 - t) * (1 - t) * p.y1 + 2 * (1 - t) * t * cy + t * t * p.y2;
        ctx.fillStyle = p.hue;
        ctx.beginPath();
        ctx.arc(x, y, 4, 0, Math.PI * 2);
        ctx.fill();
      }
      if (particles.length < 18 && frame % 20 === 0 && hub && agents[0]) {
        spawnParticle(hub.x + 30, hub.y, agents[Math.floor(Math.random() * agents.length)].x, agents[0].y);
      }
    }

    function draw() {
      ctx.clearRect(0, 0, cw, ch);
      drawGrid();
      if (!hub) return;
      agents.forEach((a) => drawEdge(hub.x + 36, hub.y, a.x - 10, a.y, true));
      agents.forEach((a) => drawEdge(a.x + 10, a.y, verify.x - 28, verify.y, frame % 120 < 80));
      drawEdge(verify.x + 28, verify.y, merge.x - 36, merge.y, true);
      hub.draw();
      agents.forEach((a) => a.draw());
      verify.draw();
      merge.draw();
      tickParticles();
      frame++;
      requestAnimationFrame(draw);
    }

    window.addEventListener("resize", () => { resize(); layout(); });
    resize();
    layout();
    if (particles.length === 0) layout();
    requestAnimationFrame(draw);
  })();
  </script>
</section>
<section class="ym-section ym-section-alt reveal">
  <div class="ym-container ym-content-prose">
    <h3 id="kak-rabotayut-dw">Как работают Dynamic Workflows и ultracode (RU-контекст)</h3>
    <ol>
      <li>Пользователь формулирует цель (миграция, аудит, охота за багами).</li>
      <li>Claude генерирует <strong>workflow-скрипт</strong> и распараллеливает субагентов.</li>
      <li>Результаты <strong>верифицируются</strong> до финального ответа.</li>
      <li>Состояние workflow переживает обрыв.</li>
    </ol>
    <p><strong>Запуск:</strong> фраза <strong>«Create a workflow»</strong> или <strong>ultracode</strong> в effort menu (<strong>xhigh</strong>). Лимиты «1000 агентов / 16 concurrent» в официальном посте Anthropic <strong>не подтверждены</strong>.</p>
    <h3 id="kak-vklyuchit">Как включить: Max, Team, Enterprise, лимиты usage</h3>
    <div class="ym-table-wrap">
      <table>
        <thead><tr><th>Параметр</th><th>Факт из источника</th></tr></thead>
        <tbody>
          <tr><td>Площадки</td><td>Claude Code CLI, Desktop, VS Code; API, Bedrock, Vertex, Foundry</td></tr>
          <tr><td>Тарифы</td><td>Max, Team, Enterprise (если включил admin)</td></tr>
          <tr><td>По умолчанию</td><td>Max и Team — включено; Enterprise — выключено</td></tr>
          <tr><td>Usage</td><td>Существенно выше обычной сессии</td></tr>
          <tr><td>Первый запуск</td><td>Требуется подтверждение пользователя</td></tr>
        </tbody>
      </table>
    </div>
    <h3 id="scenarii-dw">Сценарии: миграция кодовой базы, security audit, рефакторинг</h3>
    <ul>
      <li><strong>Codebase-wide bug hunt</strong> и <strong>security audit</strong>.</li>
      <li><strong>Миграции и modernization</strong> — от плана до merge.</li>
      <li><strong>Пример Bun (Zig→Rust):</strong> ~750k LOC, 99,8% тестов, 11 дней до merge — <strong>не продакшен</strong>.</li>
    </ul>
  </div>
</section>
<section class="ym-section reveal" id="claude-code-biznes">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Claude Code и Opus для бизнеса без «армии разработчиков»</h2>
    <p><strong>Коротко:</strong> Opus 4.8 и workflows не заменяют архитектора, но сокращают ручной объём там, где раньше нужна была команда на миграцию или аудит.</p>
    <div class="ym-grid-2-cards reveal">
      <div class="ym-card"><h3>Без оркестрации</h3><p>Недели ручного ревью legacy, команда на миграцию, риск регрессий, часы копипаста из чата.</p></div>
      <div class="ym-card"><h3>С Opus 4.8 + workflows</h3><p>Дни параллельного обхода с верификацией, скрипт + субагенты, effort high/xhigh для отчётов.</p></div>
    </div>
    <h3 id="cifrovye-sotrudniki">Связка с цифровыми сотрудниками и AI-агентами в операционке</h3>
    <p><strong>Цифровой сотрудник в ops</strong> — Make AI Agents GA (~17.05.2026) с MCP. <strong>Цифровой «техлид» в репо</strong> — Claude Code Dynamic Workflows + Opus 4.8. Не смешивайте контуры в одном MCP-токене с полным доступом к продакшену.</p>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" id="orkestraciya-agentov">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Оркестрация AI-агентов: от одного чата к сотням субагентов</h2>
    <h3 id="parallel-vs-chat">Параллельные субагенты vs один ассистент</h3>
    <div class="ym-table-wrap">
      <table>
        <thead><tr><th>Режим</th><th>Когда уместен</th><th>Ограничение</th></tr></thead>
        <tbody>
          <tr><td>Один чат</td><td>Быстрый фикс, текст</td><td>Узкое «окно» на большую кодовую базу</td></tr>
          <tr><td>Ручные субагенты</td><td>Cursor <code>/multitask</code></td><td>Координация на пользователе</td></tr>
          <tr><td><strong>Dynamic Workflows</strong></td><td>Миграция, аудит, review</td><td>Высокий usage, нужен ревью merge</td></tr>
        </tbody>
      </table>
    </div>
    <p><strong>Cursor 3.3</strong> — Build in Parallel, async subagents. <strong>Cursor 3.5</strong> — Automations, multi-repo, no-repo monitoring.</p>
    <h3 id="effort-control">Контроль усилий (effort) и качества результата</h3>
    <ul>
      <li><strong>High</strong> — рутинный код и документы.</li>
      <li><strong>Extra / xhigh</strong> — критичные миграции.</li>
      <li><strong>ultracode</strong> — полный workflow (максимальный расход).</li>
    </ul>
    <p><strong>Чек-лист качества перед merge:</strong> human review diff, CI/CD, сверка с независимыми бенчмарками.</p>
  </div>
</section>
<section class="ym-section reveal" id="avtomatizaciya-razrabotki">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Автоматизация разработки: что повторить в Cursor, Claude API и Make</h2>
    <h3 id="cursor-parallel">Cursor 3.5 parallel agents — где пересечение и отличия</h3>
    <p>Cursor — IDE-first, worktrees, automations. Claude Code workflows — оркестрационный скрипт + верификация Anthropic, часы–дни работы. Типичный <strong>dual-stack</strong>: Cursor для фич, Claude Code — для квартальной миграции.</p>
    <h3 id="make-mcp">Make AI Agents + MCP: сценарии для маркетинга и ops</h3>
    <p>Публикация контента, лиды из CRM, отчёты — Make AI Agents с MCP как мост к Claude Desktop/Cursor. Миграции — в Claude Code/API, не в Make.</p>
    <h3 id="vibecoding-claude">Вайбкодинг с Claude: быстрый прототип без классического dev-cycle</h3>
    <p>Вайбкодинг с Opus 4.8 выигрывает от <strong>честности модели</strong>. Риск — merge без ревью. Минимальный стандарт: feature branch, тесты, ограниченный MCP scope.</p>
    <p><strong>Claude API для автоматизации:</strong> Messages API с system entries в <code>messages</code> — смена инструкций mid-task без сброса prompt cache.</p>
    <div class="ym-prompt-card reveal delay-100" id="cta-vibecoding-learn" role="note">
  <p class="ym-prompt-text" style="margin: 0 0 12px;">
    <strong>Освоить вайбкодинг и оркестрацию агентов в команде?</strong>
    Программа с разбором Claude Code, Cursor и Make — без найма «армии разработчиков» на старте.
  </p>
  <p style="margin: 0;">
    <a class="ym-btn ym-btn-secondary"
       href="<?php echo esc_url( (string) getenv( 'SECONDARY_CTA_URL' ) ); ?>"
       <?php if ( getenv( 'SECONDARY_CTA_URL' ) ) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
      <span><?php echo esc_html( getenv( 'SECONDARY_CTA_LABEL' ) ?: 'Обучение автоматизации и вайбкодингу' ); ?></span>
    </a>
  </p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" id="plan-vnedreniya">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Пошаговый план внедрения для команды (7–14 дней)</h2>
    <div class="ym-timeline">
      <div class="ym-step reveal"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>День 1–3: пилот</h3><p>Один модуль или процесс; Claude Code или API; baseline токенов; один сценарий Make с отдельным MCP.</p></div></div>
      <div class="ym-step reveal delay-100"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>День 4–7: политики</h3><p>PR + reviewer; Enterprise: статус workflows; разнести секреты dev/ops MCP; логирование tool calls.</p></div></div>
      <div class="ym-step reveal delay-200"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>День 8–14: масштаб</h3><p>Make на второй отдел; Cursor automations; ретроспектива usage и ultracode.</p></div></div>
    </div>
    <p><strong>CTA-логика для внедрения с подрядчиком:</strong> пилот «миграция модуля / аудит репо / связка Make+MCP» — измеримый результат за две недели.</p>
  </div>
</section>
<aside class="ym-section reveal" id="cta-pilot-opus48" aria-labelledby="cta-pilot-opus48-title">
  <div class="ym-container">
    <div class="ym-card reveal-scale" style="text-align: center; padding: clamp(32px, 5vw, 48px);">
      <h2 id="cta-pilot-opus48-title" class="ym-section-title" style="font-size: clamp(26px, 3vw, 34px); margin-bottom: 12px;">Пилот за 7–14 дней: Opus 4.8 + workflows + Make/MCP</h2>
      <p style="max-width: 720px; margin: 0 auto 28px; color: var(--ym-text); line-height: 1.65;">
        Миграция одного модуля, security audit репозитория или связка Make AI Agents с MCP под ваши CRM и ops — с измеримым результатом, а не разовым чтением пресс-релиза.
      </p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary"
           href="<?php echo esc_url( (string) getenv( 'PRIMARY_CTA_URL' ) ); ?>"
           <?php if ( getenv( 'PRIMARY_CTA_URL' ) ) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
          <span><?php echo esc_html( getenv( 'PRIMARY_CTA_LABEL' ) ?: 'Обсудить пилот с Nero Network' ); ?></span>
        </a>
      </div>
    </div>
  </div>
</aside>
<section class="ym-section reveal" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ: цена, токены, риски и безопасность MCP</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;">Разделы</h3>
        <ul class="ym-faq-list">
          <li><a href="#faq-cena">Цена и тарифы</a></li>
          <li><a href="#faq-risk">Риски и NSA</a></li>
          <li><a href="#faq-kogda-net">Когда не запускать</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content reveal-right">
        <div class="ym-faq-item" id="faq-cena">
          <h3>Сколько стоит Opus 4.8 и Dynamic Workflows?</h3>
          <p><strong>Ответ:</strong> <strong>$5 / 1M input</strong>, <strong>$25 / 1M output</strong>; fast mode <strong>$10 / $50</strong>. Workflows на Max/Team/Enterprise; usage существенно выше; первый workflow — с подтверждением.</p>
        </div>
        <div class="ym-faq-item" id="faq-risk">
          <h3>Риски автономных агентов и NSA по MCP</h3>
          <p><strong>20.05.2026</strong> NSA AISC — CSI по MCP. Чек-лист: least privilege, валидация I/O, аудит tool calls, изоляция MCP, сегментация контекста.</p>
        </div>
        <div class="ym-faq-item" id="faq-kogda-net">
          <h3>Когда не стоит запускать сотни субагентов</h3>
          <p>Нет политики merge и CI; первый опыт — начните с одного субагента; Enterprise без решения admin; задача решается одним промптом; нет бюджета на xhigh.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" id="itog">
  <div class="ym-container ym-content-prose">
    <h2 class="ym-section-title">Итог: что внедрить уже сейчас (чек-лист для предпринимателя)</h2>
    <p><strong>Коротко:</strong> три контура: (A) Claude Code + Opus 4.8 + Dynamic Workflows; (B) Cursor 3.5; (C) Make + MCP.</p>
    <ul class="ym-checklist">
      <li>Прочитать <a href="https://www.anthropic.com/news/claude-opus-4-8" target="_blank" rel="noopener noreferrer">релиз Opus 4.8</a> и <a href="https://claude.com/blog/introducing-dynamic-workflows-in-claude-code" target="_blank" rel="noopener noreferrer">пост Dynamic Workflows</a>.</li>
      <li>Назначить пилот: один модуль репо или один Make-сценарий с MCP.</li>
      <li>Зафиксировать effort: high для рутины, xhigh только для миграций.</li>
      <li>Включить human review merge и CI.</li>
      <li>Enterprise — согласовать с admin статус workflows.</li>
      <li>NSA CSI: отдельные MCP-токены, аудит, изоляция.</li>
      <li>Не использовать неподтверждённые лимиты «1000 агентов».</li>
    </ul>
    <p><strong>Итог:</strong> Claude Opus 4.8 делает ставку на честность и качество агентной разработки; Dynamic Workflows переносят оркестрацию на скрипт Claude. Для лидов Nero Network — пилотное внедрение AI-агентов, связка Make/MCP и обучение вайбкодингу.</p>
  </div>
</section>
<?php if ( getenv( 'AD_BANNER_URL' ) && getenv( 'AD_BANNER_IMAGE_URL' ) ) : ?>
<section class="ym-section ym-section-alt reveal" id="partner-banner" aria-label="Партнёрский баннер">
  <div class="ym-container" style="text-align: center;">
    <a href="<?php echo esc_url( (string) getenv( 'AD_BANNER_URL' ) ); ?>" target="_blank" rel="noopener noreferrer">
      <img src="<?php echo esc_url( (string) getenv( 'AD_BANNER_IMAGE_URL' ) ); ?>"
           width="970" height="90"
           alt="<?php echo esc_attr( getenv( 'AD_BANNER_ALT' ) ?: 'Партнёрское предложение' ); ?>"
           loading="lazy" decoding="async"
           style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
    </a>
  </div>
</section>
<?php endif; ?>
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
      "headline": "Claude Opus 4.8 и Dynamic Workflows: как сотни AI-субагентов автоматизируют разработку и процессы в бизнесе",
      "description": "Релиз Anthropic 28.05.2026: Opus 4.8, Dynamic Workflows и сотни субагентов в Claude Code. Как автоматизировать разработку через API, Cursor, Make и MCP.",
      "datePublished": "2026-05-29",
      "dateModified": "2026-05-29",
      "author": {"@type": "Organization", "name": "Nero Network"},
      "publisher": {"@type": "Organization", "name": "Nero Network"},
      "inLanguage": "ru-RU",
      "keywords": "claude opus 4.8, dynamic workflows, claude code, ai агенты для разработки"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {"@type": "Question", "name": "Сколько стоит Opus 4.8 в API?", "acceptedAnswer": {"@type": "Answer", "text": "$5 / 1M input и $25 / 1M output в обычном режиме; fast mode $10 / $50 за 1M."}},
        {"@type": "Question", "name": "Dynamic Workflows входят в подписку?", "acceptedAnswer": {"@type": "Answer", "text": "Доступны на Max, Team и Enterprise при включении admin; потребление usage существенно выше обычной сессии."}},
        {"@type": "Question", "name": "Когда не стоит запускать сотни субагентов?", "acceptedAnswer": {"@type": "Answer", "text": "Когда нет политики merge и CI, нет бюджета на xhigh, или задача решается одним промптом."}}
      ]
    }
  ]
}
</script>


<?php
get_footer();
