<?php
/**
 * Template Name: Cursor 3.5 Automations no-repo
 * Description: Cursor 3.5 Automations — no-repo / multi-repo, Slack, Stripe, MCP.
 */

$page_seo_title = 'Cursor 3.5 Automations без репо: агенты Slack, Stripe';
$page_seo_description = 'Cursor 3.5: Automations в Agents Window, no-repo и multi-repo. Шаблоны Slack, Stripe, Databricks. Настройка без репозитория и связка с Make, MCP, n8n.';

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
 *   `.cursor-35-automations-no-repo-agenty-biznesa-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.cursor-35-automations-no-repo-agenty-biznesa-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #6366f1;
    --ym-accent: #06b6d4;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(99, 102, 241, 0.15);
}

.cursor-35-automations-no-repo-agenty-biznesa-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.cursor-35-automations-no-repo-agenty-biznesa-page h1,
.cursor-35-automations-no-repo-agenty-biznesa-page h2,
.cursor-35-automations-no-repo-agenty-biznesa-page h3,
.cursor-35-automations-no-repo-agenty-biznesa-page h4,
.cursor-35-automations-no-repo-agenty-biznesa-page h5,
.cursor-35-automations-no-repo-agenty-biznesa-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.cursor-35-automations-no-repo-agenty-biznesa-page p,
.cursor-35-automations-no-repo-agenty-biznesa-page li,
.cursor-35-automations-no-repo-agenty-biznesa-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.cursor-35-automations-no-repo-agenty-biznesa-page strong,
.cursor-35-automations-no-repo-agenty-biznesa-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.cursor-35-automations-no-repo-agenty-biznesa-page pre, .cursor-35-automations-no-repo-agenty-biznesa-page code {
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
    background: radial-gradient(circle, rgba(99,102,241,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(99, 102, 241, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(99, 102, 241, 0.2);
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
    background: linear-gradient(90deg, #6366f1, #ff4b4b);
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
    box-shadow: 0 5px 15px rgba(99,102,241,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(99, 102, 241, 0.5);
    background: #4f46e5;
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
    border-color: rgba(99, 102, 241, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(99, 102, 241, 0.05);
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
#cursor-norepo-hero.hero-enterprise-gateway {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
  padding-top: clamp(80px, 11vh, 120px);
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
}
#cursor-norepo-hero .hero-layout {
  flex: 1;
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1.05fr);
  gap: clamp(20px, 4vw, 48px);
  align-items: center;
  width: 100%;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 clamp(16px, 4vw, 56px) clamp(28px, 5vh, 56px);
  position: relative;
  z-index: 2;
}
#cursor-norepo-hero .hero-content-col {
  display: flex;
  flex-direction: column;
  gap: clamp(16px, 2.5vh, 24px);
  min-width: 0;
}
#cursor-norepo-hero .hero-visual-col {
  position: relative;
  min-height: min(480px, 52vh);
  border-radius: 24px;
  overflow: hidden;
  background: linear-gradient(145deg, rgba(255,255,255,0.92) 0%, rgba(238,242,255,0.85) 100%);
  border: 1px solid #e2e8f0;
  box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}
#cursor-norepo-hero .hero-visual-col .hero-grid-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
  opacity: 0.55;
}
#cursor-norepo-hero #cursor-35-norepo-signal-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
#cursor-norepo-hero .hero-copy-block,
#cursor-norepo-hero .vl-ui-tasks,
#cursor-norepo-hero .vl-ui-pill {
  position: relative;
  left: auto;
  right: auto;
  top: auto;
  bottom: auto;
  max-width: 100%;
  transform: none;
}
#cursor-norepo-hero .hero-copy-block { z-index: auto; }
@media (max-width: 900px) {
  #cursor-norepo-hero.hero-enterprise-gateway {
    min-height: auto;
    padding-top: clamp(88px, 14vw, 112px);
  }
  #cursor-norepo-hero .hero-layout {
    grid-template-columns: 1fr;
    gap: 20px;
    padding-bottom: 32px;
  }
  #cursor-norepo-hero .hero-visual-col {
    order: 2;
    min-height: min(280px, 38vh);
  }
  #cursor-norepo-hero .hero-content-col { order: 1; }
}
.c35-intro-section { padding-top: 48px; padding-bottom: 40px; }
.c35-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(260px, 0.9fr);
  gap: clamp(24px, 4vw, 48px);
  align-items: start;
}
.c35-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: clamp(16px, 3vw, 28px);
}
.c35-intro-text p { text-align: left !important; }
.c35-intro-lead { font-size: 18px; line-height: 1.65; margin: 0 0 16px; }
.c35-intro-chips {
  display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px;
}
.c35-intro-chips span {
  font-size: 12px; font-weight: 600; padding: 6px 12px;
  border-radius: 999px; background: var(--ym-surface);
  border: 1px solid var(--ym-border); color: var(--ym-text);
}
.c35-intro-section .ym-toc { margin-top: 36px; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose h2 { font-size: clamp(26px, 3vw, 36px); font-weight: 800; margin: 0 0 24px; letter-spacing: -0.5px; }
.ym-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; }
.ym-prose p, .ym-prose li { font-size: 16px; line-height: 1.7; margin-bottom: 16px; }
.ym-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; font-size: 15px; }
.ym-prose th, .ym-prose td { border: 1px solid var(--ym-border); padding: 12px 14px; text-align: left; }
.ym-prose th { background: #f1f5f9; font-weight: 700; }
.ym-prose a { color: var(--ym-accent); }
.ym-prose hr { border: none; border-top: 1px solid var(--ym-border); margin: 40px 0; }
.ym-cta-insert { padding: 0; }
.ym-cta-insert .ym-section { padding: 60px 0; }
@media (max-width: 900px) {
  .c35-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main cursor-35-automations-no-repo-agenty-biznesa-page" role="main" tabindex="-1">
<section id="cursor-norepo-hero" class="hero-enterprise-gateway fullscreen-white-office cursor-norepo-hero" aria-label="Hero: Cursor 3.5 no-repo automations">
  <style>
    #cursor-norepo-hero.hero-enterprise-gateway.fullscreen-white-office {
      position: relative;
      overflow: hidden;
      width: 100%;
      background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 48%, #eef2ff 100%);
      font-family: Inter, system-ui, -apple-system, sans-serif;
    }
    #cursor-norepo-hero .hero-copy-block { max-width: 100%; }
    #cursor-norepo-hero .giant-seo {
      font-size: clamp(32px, 4.6vw, 68px);
      font-weight: 900;
      line-height: 1.08;
      letter-spacing: -2px;
      color: #0f172a;
      margin: 0;
    }
    #cursor-norepo-hero .giant-seo span {
      display: block;
      background: linear-gradient(90deg, #6366f1, #06b6d4);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    #cursor-norepo-hero .giant-seo-sub {
      font-size: clamp(15px, 1.9vw, 21px);
      line-height: 1.55;
      color: rgba(15, 23, 42, 0.72);
      margin-top: 18px;
      max-width: 680px;
    }
    #cursor-norepo-hero .telegram-button {
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
      transition: transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
    }
    #cursor-norepo-hero .telegram-button:hover { transform: translateY(-2px); }
    #cursor-norepo-hero .vl-ui-tasks {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    #cursor-norepo-hero .vl-ui-task {
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
    #cursor-norepo-hero .vl-ui-task span {
      width: 26px;
      height: 26px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: #fff;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 800;
      flex-shrink: 0;
    }
    #cursor-norepo-hero .vl-ui-pill {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      gap: 10px;
    }
    #cursor-norepo-hero .vl-ui-pill span {
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
      #cursor-norepo-hero .vl-ui-tasks { display: none; }
    }
  </style>

  <div class="hero-layout">
    <div class="hero-content-col">
      <nav class="vl-ui-tasks" aria-label="Этапы no-repo мониторинга">
        <div class="vl-ui-task"><span>1</span> Webhook / cron без Git</div>
        <div class="vl-ui-task"><span>2</span> MCP и OAuth tools</div>
        <div class="vl-ui-task"><span>3</span> Дайджест Slack</div>
        <div class="vl-ui-task"><span>4</span> Read-only Stripe</div>
        <div class="vl-ui-task"><span>5</span> Broadcast + approve</div>
      </nav>

      <div class="hero-copy-block">
        <h1 class="giant-seo">Cursor 3.5: автоматизации без репозитория — <span>как AI-агенты мониторят Slack, Stripe и здоровье клиентов</span></h1>
        <p class="giant-seo-sub">Multi-repo и no-repo в Agents Window: готовые шаблоны для метрик, поддержки и финансов — и как повторить это в вашем бизнесе с Make, MCP и Cursor</p>
        <a class="telegram-button" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Telegram</a>
      </div>

      <div class="vl-ui-pill" aria-label="Теги темы">
        <span>No-repo</span>
        <span>Slack digest</span>
        <span>Stripe MRR</span>
        <span>MCP OAuth</span>
        <span>Agents Window</span>
      </div>
    </div>

    <div class="hero-visual-col" aria-label="Анимация: агенты мониторят Slack, Stripe и метрики без репозитория">
      <div class="hero-grid-bg" aria-hidden="true"></div>
      <canvas id="cursor-35-norepo-signal-canvas" role="img" aria-label="Анимация: агенты мониторят Slack, Stripe и метрики без репозитория"></canvas>
    </div>
  </div>

  <script>
  document.addEventListener("DOMContentLoaded", () => {
    const canvas = document.getElementById("cursor-35-norepo-signal-canvas");
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
      scale = cw < 768 ? cw / 620 : Math.min(cw / 1050, ch / 820) * 1.35;
    }
    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    const C = {
      outline: "#0f172a",
      panel: "#ffffff",
      panelEdge: "#e2e8f0",
      slack: "#4a154b",
      stripe: "#635bff",
      health: "#10b981",
      hub: "#f8fafc",
      ring: "#94a3b8",
      pulse: "#38bdf8",
      agentYellow: "#eab308",
      agentGreen: "#10b981",
      agentBlue: "#3b82f6",
      agentPink: "#ec4899",
      agentPurple: "#8b5cf6",
      bubbleBg: "#ffffff",
      warn: "#f97316"
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

    class SignalPulseRing {
      constructor() {
        this.radius = 155;
        this.packetAngles = [0.2, 1.4, 2.8, 4.1, 5.3];
        this.packetColors = ["#a78bfa", "#38bdf8", "#34d399", "#fbbf24", "#f472b6"];
      }
      draw(ctx) {
        const cycle = (frame * 0.04) % 240;
        ctx.save();
        ctx.strokeStyle = C.ring;
        ctx.lineWidth = 2;
        ctx.setLineDash([8, 10]);
        ctx.beginPath();
        ctx.arc(0, 10, this.radius, 0, Math.PI * 2);
        ctx.stroke();
        ctx.setLineDash([]);

        this.packetAngles.forEach((base, i) => {
          const ang = base + frame * 0.018 + i * 0.4;
          const px = Math.cos(ang) * this.radius;
          const py = 10 + Math.sin(ang) * this.radius * 0.55;
          drawPolyRound(ctx, px - 7, py - 7, 14, 14, 3, this.packetColors[i], C.outline);
          if (cycle > 40 && cycle < 180) {
            ctx.strokeStyle = C.pulse;
            ctx.globalAlpha = 0.35;
            ctx.beginPath();
            ctx.moveTo(px, py);
            ctx.lineTo(0, -30);
            ctx.stroke();
            ctx.globalAlpha = 1;
          }
        });
        ctx.restore();
      }
    }

    class AgentsWindowHub {
      constructor() {
        this.phase = 0;
      }
      drawPanel(ctx, x, y, w, h, title, accent, fillLevel) {
        drawPolyRound(ctx, x, y, w, h, 6, C.panel, C.outline);
        drawPolyRound(ctx, x, y, w, 22, [6, 6, 0, 0], accent, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.textAlign = "left";
        ctx.fillText(title, x + 8, y + 14);
        const barY = y + 30;
        drawPolyRound(ctx, x + 8, barY, w - 16, h - 38, 3, "#f1f5f9", null);
        const bw = (w - 24) * Math.min(1, fillLevel);
        if (bw > 2) drawPolyRound(ctx, x + 12, barY + 6, bw, 8, 2, accent, null);
        for (let i = 0; i < 3; i++) {
          drawPolyRound(ctx, x + 12, barY + 20 + i * 10, w - 24 - i * 8, 5, 1, "#cbd5e1", null);
        }
      }
      draw(ctx) {
        const cycle = (frame * 0.04) % 240;
        let slackLv = 0, stripeLv = 0, healthLv = 0;
        if (cycle > 25) slackLv = Math.min(1, (cycle - 25) / 50);
        if (cycle > 70) stripeLv = Math.min(1, (cycle - 70) / 45);
        if (cycle > 110) healthLv = Math.min(1, (cycle - 110) / 40);

        drawPolyRound(ctx, -120, -95, 240, 200, 10, C.hub, C.outline);
        this.drawPanel(ctx, -110, -85, 70, 75, "Slack", C.slack, slackLv);
        this.drawPanel(ctx, -35, -85, 70, 75, "Stripe", C.stripe, stripeLv);
        this.drawPanel(ctx, 40, -85, 70, 75, "Health", C.health, healthLv);

        if (cycle > 155 && cycle < 200) {
          const wave = (cycle - 155) / 45;
          ctx.strokeStyle = C.health;
          ctx.lineWidth = 3;
          ctx.globalAlpha = 0.5 * (1 - wave);
          ctx.beginPath();
          ctx.arc(0, -50, 30 + wave * 90, 0, Math.PI * 2);
          ctx.stroke();
          ctx.globalAlpha = 1;
        }
      }
    }

    class WebhookBeacon {
      draw(ctx) {
        const blink = frame % 50 < 25;
        drawPolyRound(ctx, -220, -120, 12, 50, 3, "#e2e8f0", C.outline);
        drawPolyRound(ctx, -228, -128, 28, 12, 4, blink ? C.warn : "#fbbf24", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 8px sans-serif";
        ctx.fillText("hook", -218, -118);
      }
    }

    class McpConnectorArc {
      draw(ctx) {
        const cycle = (frame * 0.04) % 240;
        ctx.strokeStyle = C.agentBlue;
        ctx.lineWidth = 2;
        for (let i = 0; i < 3; i++) {
          const t = (cycle / 240 + i * 0.2) % 1;
          ctx.globalAlpha = 0.35 + 0.5 * Math.sin(t * Math.PI);
          ctx.beginPath();
          ctx.moveTo(-180 + i * 25, 80);
          ctx.quadraticCurveTo(-90 + i * 15, 20, 0, -20);
          ctx.stroke();
        }
        ctx.globalAlpha = 1;
        [-160, -135, -110].forEach((nx, i) => {
          drawPolyRound(ctx, nx, 72, 18, 18, 4, ["#dbeafe", "#cffafe", "#e0e7ff"][i], C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "7px sans-serif";
          ctx.fillText("MCP", nx + 3, 84);
        });
      }
    }

    class NoRepoSeal {
      draw(ctx) {
        drawPolyRound(ctx, 165, -130, 52, 52, 26, "#fff", C.outline);
        ctx.strokeStyle = "#ef4444";
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.moveTo(175, -120);
        ctx.lineTo(207, -88);
        ctx.stroke();
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("no", 191, -108);
        ctx.fillText("repo", 191, -96);
      }
    }

    class DigestOutflow {
      draw(ctx) {
        const cycle = (frame * 0.04) % 240;
        if (cycle < 165) return;
        const t = (cycle - 165) / 75;
        const bx = 120 + t * 100;
        const by = -60 + Math.sin(t * 6) * 8;
        drawPolyRound(ctx, bx, by, 48, 28, 6, C.slack, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 8px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("digest", bx + 24, by + 17);
        if (t > 0.75) {
          ctx.fillStyle = C.health;
          ctx.font = "bold 14px sans-serif";
          ctx.fillText("✓", bx + 58, by + 12);
        }
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

        if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
          const local = prg - this.stepTrig;
          if (local < 11) {
            isMoving = true;
            faceDir = this.targetX > this.baseX ? 1 : -1;
            carryType = this.color;
            this.x = this.baseX + (this.targetX - this.baseX) * (local / 11);
            this.y = this.baseY + (this.targetY - this.baseY) * (local / 11);
          } else if (local < 16) {
            this.x = this.targetX;
            this.y = this.targetY;
          } else {
            isMoving = true;
            faceDir = this.targetX > this.baseX ? -1 : 1;
            this.x = this.targetX - (this.targetX - this.baseX) * ((local - 16) / 6);
            this.y = this.targetY - (this.targetY - this.baseY) * ((local - 16) / 6);
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
          drawPolyRound(ctx, -18 * faceDir, -18 - bob, 14, 14, 2, carryType, C.outline);
        }
        ctx.restore();
      }
    }

    const entities = [];
    const bubbles = [];

    entities.push(new SignalPulseRing());
    entities.push(new AgentsWindowHub());
    entities.push(new WebhookBeacon());
    entities.push(new McpConnectorArc());
    entities.push(new NoRepoSeal());
    entities.push(new DigestOutflow());

    entities.push(new Agent(-250, 90, C.agentYellow, "1_architect", 18, [
      "Webhook без Git",
      "Cron в Agents Window",
      "Триггер без clone"
    ], -210, -95));
    entities.push(new Agent(-170, 130, C.agentGreen, "2_seo", 48, [
      "Приоритет #product",
      "DM в digest",
      "Каналы без repo"
    ], -75, -55));
    entities.push(new Agent(-60, 100, C.agentBlue, "3_coder", 88, [
      "MCP OAuth tools",
      "Read-only Stripe key",
      "Auto-run allowlist"
    ], -150, 55));
    entities.push(new Agent(40, 125, C.agentPink, "4_designer", 128, [
      "MRR read-only",
      "Churn в панели",
      "Не трогаем secret"
    ], 5, -50));
    entities.push(new Agent(120, 85, C.agentPurple, "5_deployer", 168, [
      "Broadcast в Slack",
      "Human approve",
      "Max Mode cloud run"
    ], 140, -70));

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

      const prg = (frame * 0.04) % 240;
      if (prg >= 17 && prg < 17.08) createBubble(-210, -110, "1. Webhook");
      if (prg >= 47 && prg < 47.08) createBubble(-75, -70, "2. Slack digest");
      if (prg >= 87 && prg < 87.08) createBubble(-150, 30, "3. MCP connect");
      if (prg >= 127 && prg < 127.08) createBubble(5, -65, "4. Stripe MRR");
      if (prg >= 167 && prg < 167.08) createBubble(150, -85, "5. Broadcast ✓");

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

<section class="ym-section c35-intro-section" id="intro">
  <div class="ym-container">
    <div class="c35-intro-grid reveal">
      <div class="c35-intro-text">
        <p class="c35-intro-lead"><strong>Коротко:</strong> 20 мая 2026 Cursor вынес <strong>Automations</strong> в <strong>Agents Window</strong>, добавил <strong>no-repo</strong> и <strong>multi-repo</strong>. Для бизнеса без своего Git — готовые шаблоны мониторинга Slack, Stripe, Databricks и customer health с оплатой как у cloud agents и обязательным <strong>Max Mode</strong>.</p>
        <p>Этот лонгрид — пошаговый разбор релиза, Marketplace-шаблонов, MCP, сравнения с Make/n8n/Copilot и практики внедрения для SMB на русском.</p>
      </div>
      <div class="c35-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">agents-window — no-repo</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># триггер без Git</span><br>
            <span class="ym-command">cron</span> slack-digest → mcp stripe read-only<br>
            <span class="ym-command">webhook</span> make → cursor cloud agent<br>
            <span class="ym-comment"># human approve в Slack</span>
          </div>
        </div>
        <div class="c35-intro-chips">
          <span>No-repo</span><span>Slack</span><span>Stripe</span><span>MCP</span><span>Max Mode</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      <a href="#cursor-35-news">Что нового в Cursor 3.5 (20 мая 2026)</a><a href="#no-repo-automations">No-repo automations: агенты без привязки к</a><a href="#marketplace-shablony">Пять шаблонов Marketplace (готовые сценари</a><a href="#multi-repo">Multi-repo: один агент</a><a href="#mcp-cursor">MCP в Cursor 3.5: как агент «видит» внешни</a><a href="#cursor-vs-make">Cursor vs Make / n8n / Copilot: что выбрат</a><a href="#tarify-roi">Тарифы, лимиты и ROI для SMB</a><a href="#povtorit-biznes">Как повторить сценарий в своём бизнесе (Ma</a><a href="#faq-geo">FAQ (GEO-блок для сниппетов)</a>
    </nav>
  </div>
</section>

<section class="ym-section" id="cursor-35-news">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Что нового в Cursor 3.5 (20 мая 2026) — Automations в Agents Window</h2>
<h3>Релиз и ссылка на changelog</h3>
<p><strong>Определение:</strong> <em>Cursor Automations</em> — фоновые сценарии на базе <strong>cloud agents</strong>: по расписанию, webhook или вручную агент выполняет инструкции, подключается к внешним системам через <strong>MCP</strong> и OAuth, а при наличии репозитория может открывать PR и комментировать код.</p>
<p>20 мая 2026 в <a href="https://cursor.com/changelog/05-20-26" target="_blank" rel="noopener noreferrer">changelog Cursor 3.5</a> команда объявила перенос <strong>Automations</strong> в <strong>Agents Window</strong> — единое окно, где видны и разовые агенты, и повторяющиеся автоматизации. Два принципиальных режима:</p>
<ul>
<li><strong>No-repo</strong> — автоматизация <strong>не клонирует репозиторий</strong>; подходят Slack, MCP, webhooks, Linear, PagerDuty (<a href="https://cursor.com/docs/cloud-agent/automations" target="_blank" rel="noopener noreferrer">документация</a>).</li>
<li><strong>Multi-repo</strong> — одна автоматизация работает с <strong>несколькими</strong> кодовыми базами (типичный кейс: backend + SDK + design system).</li>
</ul>
<p>Для запросов вроде <em>cursor 3.5 automations</em> и <em>cursor agents window</em> это главный инфоповод мая: <strong>cursor автоматизация</strong> перестаёт означать только «ИИ в редакторе» — появляется слой <strong>операционных агентов</strong> для метрик, поддержки и финансов.</p>
<p>В русскоязычном обзоре <a href="https://neuro-ai.ru/news/cursor-dobavil-avtomatizacii-v-okno-agentov-i-razreshil-zapuskat-zadachi-bez-repozitorija.html" target="_blank" rel="noopener noreferrer">neuro-ai.ru</a> (22.05.2026) отмечен сдвиг позиционирования: Cursor из «IDE с ИИ» движется к <strong>агентной среде</strong> с внешними сигналами — и одновременно к вопросу <strong>ответственности</strong> за качество ответов в поддержке и финансах.</p>
<h3>Акция −50% на agent runs (7 дней с 20.05)</h3>
<p><strong>Коротко:</strong> семь дней с 20.05.2026 — скидка <strong>50% на agent runs</strong> только для <strong>новых</strong> automations (окно примерно до 27.05.2026).</p>
<p>Источник — <a href="https://cursor.com/changelog/05-20-26" target="_blank" rel="noopener noreferrer">официальный changelog</a>; уточнения в <a href="https://forum.cursor.com/t/improvements-to-cursor-automations/161149" target="_blank" rel="noopener noreferrer">треде на forum.cursor.com</a>. Для SMB, оценивающих <em>cursor automations тарифы</em>, промо снижает порог эксперимента с no-repo дайджестами, но <strong>не отменяет</strong> постоянную модель биллинга (см. блок про тарифы).</p>
<p><strong>Итог блока:</strong> релиз 3.5 = Automations в Agents Window + no-repo + multi-repo + Marketplace-шаблоны; для <em>внедрение ai агентов для бизнеса</em> это сигнал, что мониторинг Slack/Stripe можно запускать <strong>без своего репозитория</strong>.</p>
<hr>
</div>
</div>
</section>

<section class="ym-section ym-section-alt" id="no-repo-automations">
<div class="ym-container">
<div class="ym-prose reveal"><h2>No-repo automations: агенты без привязки к коду</h2>
<h3>Зачем бизнесу мониторинг без репозитория</h3>
<p><strong>Определение:</strong> <em>No-repo automation</em> — сценарий, при котором Cursor <strong>не клонирует Git</strong>; агент опирается на подключённые инструменты (Slack, Stripe, Databricks SQL, Granola и др.) и текст инструкций.</p>
<p>Для предпринимателей и маркетологов барьер «нужен свой код / repo» долго отсекал <strong>cursor автоматизация</strong> от операционных задач. No-repo снимает его: <em>автоматизации без репозитория cursor</em> и <em>агент мониторинг метрик без кода</em> — не маркетинговые лозунги, а режим в продукте.</p>
<p>Инструменты «Open pull request», «Comment on pull request», «Request reviewers» <strong>недоступны</strong> без репозитория (<a href="https://cursor.com/docs/cloud-agent/automations" target="_blank" rel="noopener noreferrer">docs</a>). Зато доступны сценарии, которые раньше отдавали Zapier/n8n: дайджест Slack, read-only финансовый отчёт, health-check аккаунтов.</p>
<p>Обзор <a href="https://pondero.ai/coding/guides/cursor-v35-automations-setup-may-2026/" target="_blank" rel="noopener noreferrer">Pondero</a> формулирует жёстко (не официальная позиция Cursor): no-repo ставит Automations в <strong>прямую конкуренцию с Zapier и n8n</strong> на чистых workflow-задачах.</p>
<h3>Триггеры: расписание, webhook, Run Now</h3>
<p>Триггеры no-repo и repo-сценариев (<a href="https://cursor.com/docs/cloud-agent/automations" target="_blank" rel="noopener noreferrer">документация</a>):</p>
<table>
<thead>
<tr>
<th>Триггер</th>
<th>Типичное применение</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Cron / schedule</strong></td>
<td>Утренний Slack-digest, еженедельный MRR</td>
</tr>
<tr>
<td><strong>Webhook</strong></td>
<td>Событие из CRM, Make, n8n</td>
</tr>
<tr>
<td><strong>Run Now</strong></td>
<td>Ручной прогон перед совещанием</td>
</tr>
<tr>
<td><strong>Slack / Linear / PagerDuty</strong></td>
<td>Сигнал из рабочего чата или инцидента</td>
</tr>
</tbody>
</table>
<p>Для Slack/cron Cursor <strong>по умолчанию</strong> не привязывает repo; для GitHub/GitLab — <strong>repo обязателен</strong>. Это важно при проектировании <em>мониторинг slack ai агент</em>: канал → агент → отчёт, без ветки <code>main</code>.</p>
<h3>Подключение Slack, Stripe, Databricks через OAuth/MCP</h3>
<p>Подключение идёт через <strong>OAuth</strong> и <strong>MCP</strong> (Model Context Protocol): агент «видит» внешние системы как tools. Для Stripe в гайдах рекомендуют <strong>restricted API key</strong> с правами Read на Charges, Customers, Invoices, Subscriptions — отчёт <strong>read-only</strong> (<a href="https://pondero.ai/coding/guides/cursor-v35-automations-setup-may-2026/" target="_blank" rel="noopener noreferrer">Pondero</a>).</p>
<p><strong>Коротко:</strong> <em>cursor mcp автоматизация</em> = единый слой доступа; без настроенного MCP no-repo-шаблон из Marketplace не оживёт.</p>
<hr>
</div>
</div>
</section>

<section id="boris-article-viz" class="boris-article-viz ym-section" aria-labelledby="boris-kicker-title">
<style>
#boris-article-viz {
  --boris-bg: #f8fafc;
  --boris-card: #ffffff;
  --boris-border: #e2e8f0;
  --boris-text: #334155;
  --boris-muted: #64748b;
  --boris-accent: #2563eb;
  --boris-make: #7c3aed;
  --boris-n8n: #ea580c;
  --boris-cursor: #0f172a;
  --boris-ok: #059669;
  margin: clamp(32px, 5vw, 48px) 0;
}
#boris-article-viz .boris-card {
  background: var(--boris-bg);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
  padding: clamp(24px, 4vw, 40px);
  max-width: 100%;
}
#boris-article-viz .boris-split {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
  gap: clamp(20px, 3vw, 36px);
  align-items: center;
}
#boris-article-viz .boris-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--boris-accent);
  margin: 0 0 10px;
}
#boris-article-viz .boris-kicker {
  font-size: clamp(20px, 2.4vw, 26px);
  line-height: 1.25;
  color: #0f172a;
  margin: 0 0 12px;
  font-weight: 700;
}
#boris-article-viz .boris-lead {
  font-size: 15px;
  line-height: 1.55;
  color: var(--boris-text);
  margin: 0 0 18px;
  max-width: 42ch;
}
#boris-article-viz .boris-points {
  list-style: none;
  padding: 0;
  margin: 0 0 20px;
}
#boris-article-viz .boris-points li {
  position: relative;
  padding-left: 18px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 1.45;
  color: var(--boris-text);
}
#boris-article-viz .boris-points li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.55em;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--boris-accent);
}
#boris-article-viz .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 14px;
}
#boris-article-viz .boris-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: var(--boris-card);
  border: 1px solid var(--boris-border);
  color: var(--boris-muted);
}
#boris-article-viz .boris-pill strong {
  color: #0f172a;
}
#boris-article-viz .boris-bridge {
  font-size: 13px;
  color: var(--boris-muted);
  margin: 0;
  font-style: italic;
}
#boris-article-viz .boris-canvas-wrap {
  position: relative;
  background: var(--boris-card);
  border: 1px solid var(--boris-border);
  border-radius: 18px;
  min-height: 380px;
  max-height: 520px;
  overflow: hidden;
}
#boris-article-viz #boris-hybrid-flow-canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 380px;
}
#boris-article-viz .boris-caption {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 10px 14px;
  font-size: 11px;
  line-height: 1.35;
  text-align: center;
  color: var(--boris-muted);
  background: linear-gradient(transparent, rgba(255,255,255,0.95) 35%);
  pointer-events: none;
}
@media (max-width: 768px) {
  #boris-article-viz .boris-split {
    grid-template-columns: 1fr;
  }
  #boris-article-viz .boris-canvas-wrap {
    min-height: 340px;
  }
  #boris-article-viz #boris-hybrid-flow-canvas {
    min-height: 340px;
  }
}
</style>

  <div class="ym-container">
    <div class="boris-card">
      <div class="boris-split">
        <div class="boris-copy">
          <p class="boris-eyebrow">Гибридный стек · no-repo</p>
          <h3 id="boris-kicker-title" class="boris-kicker">Make или n8n запускает — Cursor рассуждает без репозитория</h3>
          <p class="boris-lead">Триггер остаётся в привычном no-code; webhook передаёт событие в cloud agent; отчёт уходит в Slack только после approve человека.</p>
          <ul class="boris-points">
            <li><strong>Слой 1:</strong> cron, CRM или сценарий Make/n8n</li>
            <li><strong>Слой 2:</strong> webhook → Automations (MCP, OAuth, без Git)</li>
            <li><strong>Слой 3:</strong> read-only дайджест и подпись владельца промпта</li>
          </ul>
          <div class="boris-pills" aria-hidden="true">
            <span class="boris-pill"><strong>Make</strong> MCP</span>
            <span class="boris-pill"><strong>n8n</strong> self-host</span>
            <span class="boris-pill"><strong>0</strong> repo clone</span>
          </div>
          <p class="boris-bridge">Дальше разберём пять готовых шаблонов Marketplace — Slack, Stripe и customer health из коробки.</p>
        </div>
        <div class="boris-canvas-wrap" role="img" aria-label="Анимированная схема: Make или n8n, webhook, Cursor no-repo, утверждение в Slack">
          <canvas id="boris-hybrid-flow-canvas" width="640" height="400"></canvas>
          <p class="boris-caption">Make / n8n → webhook → Cursor no-repo → human approve в Slack</p>
        </div>
      </div>
    </div>
  </div>

<script>
(function borisHybridFlowEngine() {
  var canvas = document.getElementById("boris-hybrid-flow-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var wrap = canvas.parentElement;
  var cw = 0, ch = 0, frame = 0, dpr = 1;
  var packets = [];
  var phase = 0;

  var PAL = {
    line: "#cbd5e1",
    make: "#7c3aed",
    n8n: "#ea580c",
    webhook: "#f59e0b",
    cursor: "#2563eb",
    slack: "#059669",
    text: "#0f172a",
    muted: "#64748b",
    glow: "rgba(37, 99, 235, 0.18)"
  };

  function resize() {
    if (!wrap) return;
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    var w = wrap.clientWidth || 640;
    var h = Math.max(340, Math.min(520, wrap.clientHeight || 400));
    canvas.width = Math.floor(w * dpr);
    canvas.height = Math.floor(h * dpr);
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    cw = w;
    ch = h;
  }

  function roundRect(x, y, w, h, r) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.lineTo(x + w - r, y); ctx.quadraticCurveTo(x + w, y, x + w, y + r); ctx.lineTo(x + w, y + h - r); ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h); ctx.lineTo(x + r, y + h); ctx.quadraticCurveTo(x, y + h, x, y + h - r); ctx.lineTo(x, y + r); ctx.quadraticCurveTo(x, y, x + r, y); }
    ctx.closePath();
  }

  function drawNode(x, y, w, h, label, sub, color, pulse) {
    var p = pulse ? 0.08 * Math.sin(frame * 0.08) : 0;
    ctx.save();
    if (pulse) {
      ctx.shadowColor = color;
      ctx.shadowBlur = 12 + p * 40;
    }
    roundRect(x, y, w, h, 12);
    ctx.fillStyle = "#ffffff";
    ctx.fill();
    ctx.strokeStyle = color;
    ctx.lineWidth = 2;
    ctx.stroke();
    ctx.shadowBlur = 0;
    ctx.fillStyle = PAL.text;
    ctx.font = "600 13px system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(label, x + w / 2, y + h * 0.42);
    ctx.fillStyle = PAL.muted;
    ctx.font = "11px system-ui, sans-serif";
    ctx.fillText(sub, x + w / 2, y + h * 0.68);
    ctx.restore();
  }

  function drawMakeBlocks(x, y, w, h) {
    var cols = 3, gap = 6, bw = (w - gap * (cols - 1)) / cols;
    for (var i = 0; i < cols; i++) {
      var by = y + 14 + (i % 2) * 8;
      roundRect(x + i * (bw + gap), by, bw, h - 28, 6);
      ctx.fillStyle = i === 1 ? "#ede9fe" : "#f5f3ff";
      ctx.fill();
      ctx.strokeStyle = PAL.make;
      ctx.lineWidth = 1.5;
      ctx.stroke();
    }
  }

  function drawWebhook(x, y, r, active) {
    ctx.beginPath();
    ctx.arc(x, y, r, 0, Math.PI * 2);
    ctx.fillStyle = active ? "#fef3c7" : "#fffbeb";
    ctx.fill();
    ctx.strokeStyle = PAL.webhook;
    ctx.lineWidth = active ? 3 : 2;
    ctx.stroke();
    if (active) {
      ctx.beginPath();
      ctx.arc(x, y, r + 6 + 4 * Math.sin(frame * 0.2), 0, Math.PI * 2);
      ctx.strokeStyle = "rgba(245, 158, 11, 0.45)";
      ctx.lineWidth = 2;
      ctx.stroke();
    }
    ctx.fillStyle = PAL.text;
    ctx.font = "600 10px system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("POST", x, y + 3);
  }

  function drawCursorHub(cx, cy, r, thinking) {
    ctx.save();
    if (thinking) {
      ctx.fillStyle = PAL.glow;
      ctx.beginPath();
      ctx.arc(cx, cy, r + 18, 0, Math.PI * 2);
      ctx.fill();
    }
    ctx.beginPath();
    ctx.arc(cx, cy, r, 0, Math.PI * 2);
    ctx.fillStyle = "#eff6ff";
    ctx.fill();
    ctx.strokeStyle = PAL.cursor;
    ctx.lineWidth = 2.5;
    ctx.stroke();
    ctx.fillStyle = PAL.cursor;
    ctx.font = "700 11px system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("no-repo", cx, cy + 4);
    for (var t = 0; t < 3; t++) {
      var ang = frame * 0.03 + (t * Math.PI * 2) / 3;
      var tx = cx + Math.cos(ang) * (r + 14);
      var ty = cy + Math.sin(ang) * (r + 14);
      ctx.beginPath();
      ctx.arc(tx, ty, 5, 0, Math.PI * 2);
      ctx.fillStyle = ["#93c5fd", "#a7f3d0", "#fde68a"][t];
      ctx.fill();
      ctx.strokeStyle = PAL.cursor;
      ctx.lineWidth = 1;
      ctx.stroke();
    }
    ctx.restore();
  }

  function drawSlackApprove(x, y, w, h, showCheck) {
    roundRect(x, y, w, h, 10);
    ctx.fillStyle = "#ecfdf5";
    ctx.fill();
    ctx.strokeStyle = PAL.slack;
    ctx.lineWidth = 2;
    ctx.stroke();
    ctx.fillStyle = PAL.slack;
    ctx.font = "600 12px system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("Slack", x + w / 2, y + h * 0.38);
    ctx.fillStyle = PAL.muted;
    ctx.font = "10px system-ui, sans-serif";
    ctx.fillText("human approve", x + w / 2, y + h * 0.58);
    if (showCheck) {
      var cx = x + w - 18, cy = y + 16;
      ctx.beginPath();
      ctx.arc(cx, cy, 10, 0, Math.PI * 2);
      ctx.fillStyle = PAL.slack;
      ctx.fill();
      ctx.strokeStyle = "#fff";
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(cx - 4, cy);
      ctx.lineTo(cx - 1, cy + 4);
      ctx.lineTo(cx + 5, cy - 3);
      ctx.stroke();
    }
  }

  function drawArrow(x1, y1, x2, y2, dashOffset) {
    ctx.save();
    ctx.setLineDash([8, 6]);
    ctx.lineDashOffset = -dashOffset;
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 2;
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
    ctx.setLineDash([]);
    var ang = Math.atan2(y2 - y1, x2 - x1);
    var ax = x2 - Math.cos(ang) * 8;
    var ay = y2 - Math.sin(ang) * 8;
    ctx.beginPath();
    ctx.moveTo(x2, y2);
    ctx.lineTo(ax - Math.cos(ang - 0.4) * 10, ay - Math.sin(ang - 0.4) * 10);
    ctx.lineTo(ax - Math.cos(ang + 0.4) * 10, ay - Math.sin(ang + 0.4) * 10);
    ctx.closePath();
    ctx.fillStyle = PAL.line;
    ctx.fill();
    ctx.restore();
  }

  function spawnPacket(fromX, fromY, toX, toY) {
    packets.push({ x: fromX, y: fromY, tx: toX, ty: toY, t: 0, hue: PAL.cursor });
  }

  function tickPackets() {
    for (var i = packets.length - 1; i >= 0; i--) {
      var p = packets[i];
      p.t += 0.022;
      if (p.t >= 1) { packets.splice(i, 1); continue; }
      var ease = p.t * p.t * (3 - 2 * p.t);
      p.x = p.x + (p.tx - p.x) * ease * 0.12;
      p.y = p.y + (p.ty - p.y) * ease * 0.12;
      ctx.beginPath();
      ctx.arc(p.x, p.y, 5, 0, Math.PI * 2);
      ctx.fillStyle = p.hue;
      ctx.fill();
      ctx.fillStyle = "#fff";
      ctx.font = "8px monospace";
      ctx.textAlign = "center";
      ctx.fillText("{ }", p.x, p.y + 3);
    }
  }

  function loop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    var pad = 16;
    var nodeH = Math.min(88, ch * 0.22);
    var yMid = ch * 0.48;
    var w1 = cw * 0.2;
    var w2 = cw * 0.14;
    var w3 = cw * 0.18;
    var w4 = cw * 0.16;
    var x1 = pad;
    var x2 = x1 + w1 + cw * 0.06;
    var x3 = x2 + w2 + cw * 0.05;
    var x4 = x3 + w3 + cw * 0.05;
    var dash = frame * 0.6;

    phase = (frame % 420) / 420;
    var webhookActive = phase > 0.15 && phase < 0.55;
    var cursorThink = phase > 0.35 && phase < 0.75;
    var showApprove = phase > 0.62;

    drawNode(x1, yMid - nodeH / 2, w1, nodeH, "Make / n8n", "триггер · CRM", PAL.make, phase < 0.25);
    drawMakeBlocks(x1 + 8, yMid - nodeH / 2, w1 - 16, nodeH);

    var whX = x2 + w2 / 2;
    var whY = yMid;
    drawWebhook(whX, whY, Math.min(22, w2 * 0.35), webhookActive);

    drawNode(x3, yMid - nodeH / 2, w3, nodeH, "Cursor", "Automations", PAL.cursor, false);
    drawCursorHub(x3 + w3 / 2, yMid, Math.min(28, w3 * 0.22), cursorThink);

    drawSlackApprove(x4, yMid - nodeH / 2, w4, nodeH, showApprove);

    drawArrow(x1 + w1, yMid, x2, yMid, dash);
    drawArrow(x2 + w2, yMid, x3, yMid, dash);
    drawArrow(x3 + w3, yMid, x4 + 8, yMid, dash);

    if (frame % 90 === 45 && packets.length < 4) {
      spawnPacket(x1 + w1, yMid, whX, whY);
    }
    if (webhookActive && frame % 60 === 30 && packets.length < 5) {
      spawnPacket(whX, whY, x3 + w3 * 0.3, yMid);
    }
    if (cursorThink && frame % 80 === 20 && packets.length < 5) {
      spawnPacket(x3 + w3, yMid, x4 + 12, yMid);
    }

    tickPackets();

    ctx.fillStyle = PAL.muted;
    ctx.font = "10px system-ui, sans-serif";
    ctx.textAlign = "left";
    ctx.fillText("без clone Git", x3 + 4, yMid + nodeH / 2 + 18);

    requestAnimationFrame(loop);
  }

  window.addEventListener("resize", resize);
  resize();
  loop();
})();
</script>
</section>

<section class="ym-section" id="marketplace-shablony">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Пять шаблонов Marketplace (готовые сценарии)</h2>
<p>Каталог: <a href="https://cursor.com/marketplace/automations" target="_blank" rel="noopener noreferrer">cursor.com/marketplace/automations</a>. В релизе 3.5 для no-repo добавлены пять шаблонов (<a href="https://cursor.com/changelog/05-20-26" target="_blank" rel="noopener noreferrer">changelog</a>).</p>
<h3>Slack digest — приоритизация каналов и DM</h3>
<p>Шаблон <strong>Slack digest</strong> агрегирует активность каналов и личных сообщений, помогает приоритизировать, что требует ответа. Ключи: <em>slack digest agent cursor</em>, <em>мониторинг slack ai агент</em>. Подходит агентствам и продуктовым командам с высоким потоком в Slack.</p>
<p>Сторонняя оценка (<a href="https://www.meritforgeai.com/ai-coding/cursor-3-5-no-repo-automations-monitoring-agents-may-2026/" target="_blank" rel="noopener noreferrer">MeritForge</a>): ежедневный digest ~50K tokens → порядка <strong>«&lt; $1/мес»</strong> на Composer 2.5 standard tier после скидки — <strong>не официальная</strong> цифра Cursor, сверяйте по своему usage.</p>
<h3>Product finance — MRR и Stripe</h3>
<p><strong>Product finance</strong> подключает Stripe, формирует read-only отчёт: MRR, подписки, churn (<a href="https://pondero.ai/coding/guides/cursor-v35-automations-setup-may-2026/" target="_blank" rel="noopener noreferrer">Pondero</a>). Запрос <em>отчет stripe mrr автоматизация</em> закрывается без Excel-ручника, если финдиректор <strong>утверждает</strong> промпт и ключи.</p>
<p><strong>RU-практика (угол Nero Network):</strong> в РФ Stripe часто дополняют или заменяют <strong>ЮKassa</strong>, CRM и Google Sheets; логика шаблона переносится на те же MCP/webhook-цепочки.</p>
<h3>Product analytics — дайджест из warehouse</h3>
<p><strong>Product analytics</strong> тянет дайджест из <strong>Databricks</strong> (warehouse). Для российского SMB аналог — связка <strong>Яндекс Метрика / Amplitude</strong> + выгрузка в Sheets + no-repo агент с инструкцией «что считать аномалией».</p>
<h3>Product FAQ — первый ответ в Slack</h3>
<p><strong>Product FAQ</strong> даёт <strong>первый черновик ответа</strong> в Slack по базе знаний — снижает нагрузку на поддержку. В связке с <em>нейросеть для бизнеса автоматизация</em> важно прописать: агент <strong>не отправляет</strong> клиенту без human approve.</p>
<h3>Customer health — сигналы по аккаунтам</h3>
<p>Шаблон <a href="https://cursor.com/marketplace/automations/customer-health-monitoring-agent" target="_blank" rel="noopener noreferrer">Customer Health</a>:</p>
<ul>
<li>триггер: <strong>каждый понедельник 13:00 UTC</strong>;</li>
<li>MCP: <strong>Granola</strong>, Slack, Linear, <strong>Databricks SQL</strong>;</li>
<li>вывод: отчёт в Slack;</li>
<li>режим <strong>read-only</strong>, запрет <strong>выдумывать</strong> риски и аккаунты.</li>
</ul>
<p>Для <em>customer health agent cursor</em> это эталон «агент не фантазирует цифры» — критично для B2B и <em>ai агенты для бизнеса</em> с длинным циклом сделки.</p>
<p><strong>Итог:</strong> <em>cursor marketplace шаблоны агентов</em> — витрина; под ваш стек нужна настройка OAuth, промптов и ответственного за подпись отчёта.</p>
<hr>
</div>
</div>
</section>

<aside class="ym-section ym-cta-insert reveal" data-cta="primary-audit" aria-labelledby="ym-cta-primary-audit-title">
  <div class="ym-container">
    <div class="ym-card" style="border-left:4px solid var(--ym-primary);padding:clamp(24px,4vw,36px);">
      <p style="margin:0 0 8px;font-size:14px;font-weight:700;color:var(--ym-primary);text-transform:uppercase;letter-spacing:.08em;">Nero Network</p>
      <h3 id="ym-cta-primary-audit-title" style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);text-align:left;">Аудит 1–2 шаблонов Cursor 3.5 под ваш стек</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);max-width:58ch;text-align:left;">Разберём Slack, Stripe, CRM и мессенджеры: что подключить через MCP, кто утверждает отчёты и где связать Make или n8n — <strong>за 48 часов</strong>, без обязательного своего репозитория.</p>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Заказать аудит no-repo</a>
      </div>
    </div>
  </div>
</aside>

<section class="ym-section ym-section-alt" id="multi-repo">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Multi-repo: один агент — несколько кодовых баз</h2>
<h3>Когда нужен multi-repo (backend + SDK, design system)</h3>
<p><strong>Определение:</strong> <em>Multi-repo automation</em> — один cloud agent обслуживает <strong>несколько репозиториев</strong> в рамках одной задачи (например, API в <code>backend</code>, клиент в <code>sdk</code>, токены в <code>design-system</code>).</p>
<p>Кейс из экосистемы: «We run Cursor Automations across public Slack channels at Amplitude. <strong>Multi-repo support is what makes them actually useful</strong>» — цитата в <a href="https://releasebot.io/updates/cursor" target="_blank" rel="noopener noreferrer">Releasebot</a> (первоисточник соц./кейс Amplitude; перепроверять).</p>
<p>Соседний релиз <strong>19.05.2026</strong> — <a href="https://cursor.com/changelog/05-19-26" target="_blank" rel="noopener noreferrer">Jira + Cloud Agents</a>: назначение work item на Cursor или <code>@Cursor</code> в комментарии → cloud agent → PR и статус в Jira. Требования: <strong>Cursor admin</strong>, <strong>Jira Commercial Cloud + Rovo</strong>; планы <strong>Teams и Enterprise</strong> (<a href="https://cursor.com/docs/integrations/jira" target="_blank" rel="noopener noreferrer">интеграция</a>). Сценарий «недели релизов»: тикет в Jira → PR в multi-repo → утренний no-repo digest в Slack.</p>
<h3>Отличие от no-repo (код vs инструменты)</h3>
<table>
<thead>
<tr>
<th>Критерий</th>
<th>No-repo</th>
<th>Multi-repo</th>
</tr>
</thead>
<tbody>
<tr>
<td>Git-клон</td>
<td>Нет</td>
<td>Да, несколько repo</td>
</tr>
<tr>
<td>PR / code review tools</td>
<td>Недоступны</td>
<td>Доступны</td>
</tr>
<tr>
<td>Типичный пользователь</td>
<td>Маркетинг, финансы, поддержка</td>
<td>Разработка, DevOps</td>
</tr>
<tr>
<td>Ключи</td>
<td><em>no-repo automations cursor</em></td>
<td><em>multi-repo cursor</em></td>
</tr>
</tbody>
</table>
<p>Сторонний лимит (<a href="https://www.meritforgeai.com/ai-coding/cursor-3-5-no-repo-automations-monitoring-agents-may-2026/" target="_blank" rel="noopener noreferrer">MeritForge</a>): soft cap <strong>5 repos</strong> на multi-repo automation — уточняйте в актуальных docs.</p>
<hr>
</div>
</div>
</section>

<section class="ym-section" id="mcp-cursor">
<div class="ym-container">
<div class="ym-prose reveal"><h2>MCP в Cursor 3.5: как агент «видит» внешние системы</h2>
<h3>Настройка <code>.cursor/mcp.json</code> и Tools &amp; MCP</h3>
<p><strong>MCP (Model Context Protocol)</strong> — стандарт подключения tools: CRM, аналитика, Make-сценарии. Настройка: файл <strong><code>.cursor/mcp.json</code></strong> и раздел <strong>Tools &amp; MCP</strong> в IDE. Ключи кластера: <em>cursor mcp настройка</em>, <em>cursor mcp</em>, <em>make mcp server cursor</em>.</p>
<p><strong>Make MCP Server</strong> (<a href="https://developers.make.com/mcp-server" target="_blank" rel="noopener noreferrer">developers.make.com/mcp-server</a>): сценарии Make как tools для Claude/Cursor; bidirectional управление аккаунтом; OAuth, таймауты. Анонс <strong>next generation Make AI Agents</strong> (<a href="https://www.make.com/en/blog/announcing-next-generation-make-ai-agents" target="_blank" rel="noopener noreferrer">блог Make</a>, 11.02.2026): агенты на том же canvas, <strong>Reasoning Panel</strong>, <strong>Library of Agents</strong>. Patrik Simek, CTO Make: «<strong>Nothing runs behind the scenes</strong>» — прозрачность решений.</p>
<h3>Auto-run allowlist для автономных прогонов</h3>
<p>Для <em>cursor mcp автоматизация</em> без постоянного клика «разрешить» настраивают <strong>auto-run allowlist</strong> — список безопасных tool-вызовов. Баланс: автономность vs контроль (особенно Stripe и Slack с PII).</p>
<h3>Cloud Agents и командные MCP (Teams)</h3>
<p><strong>Automations</strong> создают <strong>cloud agents</strong>; тарификация = <strong>cloud agent usage</strong>; <strong>всегда Max Mode</strong> (отключить нельзя) (<a href="https://cursor.com/docs/cloud-agent/automations" target="_blank" rel="noopener noreferrer">docs</a>). <strong>Team Owned</strong> → списание с командного пула; <strong>Private / Team Visible</strong> → с создателя.</p>
<p>Composer 2.5: <strong>$0.50 / $2.50</strong> за 1M input/output tokens (<a href="https://cursor.com/docs/models-and-pricing" target="_blank" rel="noopener noreferrer">pricing</a>). Планы: Pro <strong>$20/мес</strong>; Teams <strong>$40/user/мес</strong> ($20 API на пользователя, <strong>не пулится</strong>; + <strong>Cursor Token Rate $0.25/1M</strong> на non-Auto); Enterprise — pooled usage.</p>
<hr>
</div>
</div>
</section>

<section class="ym-section ym-section-alt" id="cursor-vs-make">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Cursor vs Make / n8n / Copilot: что выбрать в 2026</h2>
<h3>Make AI Agents + Make MCP Server</h3>
<table>
<thead>
<tr>
<th>Платформа</th>
<th>Сильная сторона</th>
<th>Слабое для no-code маркетолога</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Cursor no-repo</strong></td>
<td>Reasoning + текст инструкций + код при необходимости</td>
<td>Нужен Cursor, Max Mode, англ. docs</td>
</tr>
<tr>
<td><strong>Make AI Agents</strong></td>
<td>Визуальный canvas, ops-прозрачность</td>
<td>5 operations за вызов агента (сторонняя оценка: <a href="https://templates4make.co/news/2026-05-17-make-com-ai-agents-public-launch.html" target="_blank" rel="noopener noreferrer">templates4make</a>)</td>
</tr>
<tr>
<td><strong>n8n</strong></td>
<td>Self-host, сложные цепочки</td>
<td>Меньше «агентного» reasoning из коробки</td>
</tr>
</tbody>
</table>
<p><em>make com ai агенты</em> — зрелая оркестрация; <em>cursor agents automations</em> — агентная среда с MCP. <strong>Гибрид Nero Network:</strong> n8n/Make = триггер → webhook → Cursor no-repo.</p>
<h3>n8n для self-host и сложных цепочек</h3>
<p>Для <em>n8n ai агент автоматизация</em> и 152-ФЗ иногда выбирают self-hosted n8n, а «мозг» отчёта — Cursor с read-only ключами. Сравнение с Zapier — в <a href="https://pondero.ai/coding/guides/cursor-v35-automations-setup-may-2026/" target="_blank" rel="noopener noreferrer">Pondero</a>.</p>
<h3>Copilot Studio computer-use (enterprise UI)</h3>
<p><strong>13.05.2026</strong> — GA <strong>computer-using agents</strong> в Microsoft Copilot Studio (<a href="https://techcommunity.microsoft.com/blog/copilot-studio-blog/computer-using-agents-in-microsoft-copilot-studio-are-now-generally-available/4519427" target="_blank" rel="noopener noreferrer">Tech Community</a>): клики по UI веб/Windows <strong>без API</strong>; модели <strong>OpenAI CUA</strong> и <strong>Claude Sonnet 4.5</strong>; <strong>5 Copilot Credits за шаг</strong> (standard), <strong>15</strong> — premium; governance: Key Vault, Purview, human-in-the-loop.</p>
<p>Кейс <strong>Graebel</strong>: агент читает письма, вводит заказы в legacy <strong>Global Connect через UI</strong>. Mustapha Lazrek (Microsoft): GA — сдвиг к <strong>governable, enterprise-ready</strong> AI work.</p>
<p><strong>Контраст с Cursor:</strong> no-repo = API/MCP; Copilot computer-use = там, где API нет (legacy). Для SMB без M365 Copilot избыточен; для Cursor + Make — достаточно.</p>
<p><strong>Таблица: 3 платформы × типовой сценарий SMB</strong></p>
<table>
<thead>
<tr>
<th>Сценарий</th>
<th>Cursor no-repo</th>
<th>Make</th>
<th>Copilot CUA</th>
</tr>
</thead>
<tbody>
<tr>
<td>Утренний Slack-digest</td>
<td>★★★</td>
<td>★★★</td>
<td>★</td>
</tr>
<tr>
<td>MRR / Stripe read-only</td>
<td>★★★</td>
<td>★★</td>
<td>★</td>
</tr>
<tr>
<td>PR из Jira</td>
<td>★★★ (Teams+)</td>
<td>★★</td>
<td>★★</td>
</tr>
<tr>
<td>Legacy UI без API</td>
<td>★</td>
<td>★★</td>
<td>★★★</td>
</tr>
</tbody>
</table>
<hr>
</div>
</div>
</section>

<section class="ym-section" id="tarify-roi">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Тарифы, лимиты и ROI для SMB</h2>
<h3>Individual vs Teams</h3>
<p>Cloud Agents / Automations — на <strong>paid individual</strong> планах и выше (<a href="https://cursor.com/docs/models-and-pricing" target="_blank" rel="noopener noreferrer">pricing</a>). Jira-интеграция — <strong>Teams/Enterprise</strong>, не Individual.</p>
<h3>Оценка стоимости ежедневных no-repo прогонов</h3>
<p><strong>Коротко:</strong> считайте <strong>токены Max Mode</strong> + периодические прогоны; промо −50% только на <strong>новые</strong> automations первую неделю.</p>
<p>Ориентиры (смешанные источники, не гарантия):</p>
<ul>
<li>ежедневный Slack-digest ~50K tokens → порядка <strong>&lt; $1/мес</strong> на Composer 2.5 (<a href="https://www.meritforgeai.com/ai-coding/cursor-3-5-no-repo-automations-monitoring-agents-may-2026/" target="_blank" rel="noopener noreferrer">MeritForge</a>);</li>
<li>Make: операции + tool calls (<a href="https://templates4make.co/news/2026-05-17-make-com-ai-agents-public-launch.html" target="_blank" rel="noopener noreferrer">templates4make</a>);</li>
<li>Copilot: credits × шаги UI.</li>
</ul>
<p>Для <em>автоматизация без кода</em> ROI = (часы аналитика + ошибки опоздания) − (подписка + токены + настройка).</p>
<p><strong>Итог:</strong> <em>cursor automations тарифы teams</em> — смотрите Teams, если нужны общие automations, Jira и governance.</p>
<hr>
</div>
</div>
</section>

<section class="ym-section ym-section-alt" id="povtorit-biznes">
<div class="ym-container">
<div class="ym-prose reveal"><h2>Как повторить сценарий в своём бизнесе (Make, MCP, вайбкодинг)</h2>
<h3>Карта: CRM → мессенджер → отчёт</h3>
<p><strong>Три слоя (позиция Nero Network):</strong></p>
<ol>
<li><strong>Триггер</strong> — Make/n8n/cron/webhook (<em>автоматизация бизнес процессов</em>).</li>
<li><strong>Reasoning</strong> — Cursor no-repo с MCP (Slack, Stripe, CRM).</li>
<li><strong>Human approve</strong> — финальный пост в Slack/Telegram подписывает человек.</li>
</ol>
<p>Пример «недели релизов»: Jira (19.05) → PR → понедельник <strong>Customer health</strong> в Slack → среда <strong>Product finance</strong> в Telegram.</p>
<p>Шаблоны Cursor 3.5 — <strong>витрина</strong>; ваш контур — <strong>Cursor + Make MCP + n8n</strong> под CRM, мессенджеры и отчёты <strong>без обязательного своего репозитория</strong>.</p>
<p>Если команде не хватает навыков настройки MCP и промптов, имеет смысл пройти <a href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">обучение вайбкодингу и Cursor</a> перед промышленным запуском no-repo.</p>

<h3>Типовые ошибки внедрения</h3>
<ol>
<li><strong>Нет владельца отчёта</strong> — агент публикует финансы без approve (<a href="https://neuro-ai.ru/news/cursor-dobavil-avtomatizacii-v-okno-agentov-i-razreshil-zapuskat-zadachi-bez-repozitorija.html" target="_blank" rel="noopener noreferrer">neuro-ai.ru</a>).</li>
<li><strong>Избыточные права API</strong> — нужен restricted Stripe key, не secret.</li>
<li><strong>Путаница no-repo и multi-repo</strong> — маркетологу не нужен Git; разработчику для PR — нужен.</li>
<li><strong>Игнор Max Mode</strong> — бюджет «съедают» длинные промпты и частые cron.</li>
<li><strong>Ожидание Zapier-простоты</strong> без настройки MCP — шаблон Marketplace не подключён.</li>
</ol>
<p>Ключи: <em>настроить automation cursor пошагово</em>, <em>обучение cursor автоматизация</em>, <em>вайбкодинг cursor</em>.</p>
<aside class="ym-cta-insert reveal" data-cta="secondary-learn" aria-labelledby="ym-cta-secondary-learn-title">
  <div class="ym-container">
    <div class="ym-card" style="background:linear-gradient(135deg,#eff6ff 0%,#f8fafc 100%);padding:clamp(20px,3vw,28px);border-radius:16px;border:1px solid var(--ym-border);">
      <h3 id="ym-cta-secondary-learn-title" style="margin:0 0 10px;font-size:20px;color:var(--ym-heading);text-align:left;">Освоить вайбкодинг и Cursor Automations</h3>
      <p style="margin:0 0 16px;color:var(--ym-text);text-align:left;">Промпты, MCP, auto-run allowlist и ответственность за вывод агента — с практикой под ваши процессы (<em>обучение cursor автоматизация</em>, <em>вайбкодинг cursor</em>).</p>
      <a class="ym-btn ym-btn-secondary" href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Обучение вайбкодингу и Cursor</a>
    </div>
  </div>
</aside></div>
</div>
</section>

<aside class="ym-section ym-section-alt ym-cta-insert reveal" data-cta="primary-close" aria-labelledby="ym-cta-primary-close-title">
  <div class="ym-container" style="text-align:center;">
    <h3 id="ym-cta-primary-close-title" class="ym-section-title" style="margin-bottom:12px;">Следующий шаг: аудит шаблонов под CRM, мессенджер и платёжку</h3>
    <p class="ym-section-subtitle" style="margin-bottom:24px;">Cursor 3.5 даёт витрину; внедрение и governance — ваша зона ответственности. Поможем собрать no-repo + Make MCP за 48 часов.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Заказать аудит no-repo</a>
      <a class="ym-btn ym-btn-secondary" href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Обучение вайбкодингу и Cursor</a>
    </div>
  </div>
</aside>

<section class="ym-section" id="faq-geo">
<div class="ym-container">
<div class="ym-prose reveal"><h2>FAQ (GEO-блок для сниппетов)</h2>
<h3>Нужен ли Git-репозиторий для Automations?</h3>
<p><strong>Нет</strong> для no-repo: Slack, MCP, webhooks, Linear, PagerDuty работают без клонирования (<a href="https://cursor.com/docs/cloud-agent/automations" target="_blank" rel="noopener noreferrer">docs</a>). Для GitHub/GitLab-триггеров и PR — <strong>да</strong>.</p>
<h3>Можно ли создать свой Blank automation?</h3>
<p>Да. В Marketplace и через <strong>Blank automation</strong> задаёте инструкции, триггеры и tools. Ключ <em>cursor.com/automations</em> ведёт в продуктовый раздел.</p>
<h3>Чем no-repo отличается от Zapier?</h3>
<p>Zapier — фиксированные шаги-if-then; Cursor no-repo — <strong>LLM-reasoning</strong> + MCP + текстовые инструкции, read-only отчёты и дайджесты. PR и код — только с repo. Сравнение: <a href="https://pondero.ai/coding/guides/cursor-v35-automations-setup-may-2026/" target="_blank" rel="noopener noreferrer">Pondero</a>.</p>
<h3>Сколько стоят ежедневные automations?</h3>
<p>Зависит от модели, длины контекста и частоты; биллинг = <strong>cloud agent usage</strong>, <strong>Max Mode</strong> обязателен. Ориентир digest ~50K tokens/день — см. сторонние калькуляторы и <a href="https://cursor.com/docs/models-and-pricing" target="_blank" rel="noopener noreferrer">pricing Cursor</a>.</p>
<h3>Работает ли Jira с Individual-планом?</h3>
<p>Нет. Jira + Cloud Agents — <strong>Teams и Enterprise</strong>, admin Cursor, Jira Commercial Cloud + Rovo (<a href="https://cursor.com/docs/integrations/jira" target="_blank" rel="noopener noreferrer">docs</a>).</p>
<h3>Можно ли связать Make и Cursor?</h3>
<p>Да, через <strong>Make MCP Server</strong> и webhooks: Make запускает сценарий, Cursor no-repo формирует отчёт.</p>
<h3>Кто отвечает за ошибку агента в Slack?</h3>
<p>Организация должна назначить <strong>владельца промпта</strong> и правило human-in-the-loop; агент не заменяет юридическую ответственность за финансовые и клиентские сообщения.</p>
<h3>Есть ли русскоязычные гайды по 3.5?</h3>
<p>Короткие обзоры: <a href="https://neuro-ai.ru/news/cursor-dobavil-avtomatizacii-v-okno-agentov-i-razreshil-zapuskat-zadachi-bez-repozitorija.html" target="_blank" rel="noopener noreferrer">neuro-ai.ru</a>, <a href="https://ailibri.com/blog/cursor-zapustil-ai-agentov-kotorye-rabotaiut-kruglosutochno-i-ubiraiut-rutinu-ra" target="_blank" rel="noopener noreferrer">ailibri.com</a> — без глубины Make/MCP/таблиц; данный лонгрид закрывает пробел <em>внедрение ai агентов для бизнеса</em> на русском.</p>
<hr>
<p><strong>Итог лонгрида:</strong> Cursor 3.5 делает <strong>ai агенты для бизнеса</strong> доступными без репозитория — через Marketplace, MCP и Agents Window. Multi-repo и Jira закрывают разработку; Make/n8n/Copilot — соседи или триггеры. Следующий шаг — аудит 1–2 шаблонов под ваш стек (CRM, мессенджер, платёжка) и настройка ответственности за вывод агента.</p></div>
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
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Нужен ли Git-репозиторий для Automations?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Нет для no-repo: Slack, MCP, webhooks, Linear, PagerDuty работают без клонирования. Для GitHub/GitLab-триггеров и PR — да."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли создать свой Blank automation?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да. В Marketplace и через Blank automation задаёте инструкции, триггеры и tools."
      }
    },
    {
      "@type": "Question",
      "name": "Чем no-repo отличается от Zapier?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Zapier — фиксированные шаги; Cursor no-repo — LLM-reasoning + MCP + текстовые инструкции. PR и код — только с repo."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько стоят ежедневные automations?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Зависит от модели и частоты; биллинг = cloud agent usage, Max Mode обязателен."
      }
    },
    {
      "@type": "Question",
      "name": "Работает ли Jira с Individual-планом?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Нет. Jira + Cloud Agents — Teams и Enterprise."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли связать Make и Cursor?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да, через Make MCP Server и webhooks."
      }
    },
    {
      "@type": "Question",
      "name": "Кто отвечает за ошибку агента в Slack?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Организация назначает владельца промпта и human-in-the-loop."
      }
    },
    {
      "@type": "Question",
      "name": "Есть ли русскоязычные гайды по 3.5?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Короткие обзоры есть; данный лонгрид закрывает пробел внедрения ai агентов для бизнеса на русском."
      }
    }
  ]
}
</script>


<?php get_footer(); ?>
