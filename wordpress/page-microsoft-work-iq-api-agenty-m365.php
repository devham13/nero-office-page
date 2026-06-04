<?php
/**
 * Template Name: Microsoft Work IQ API
 */
$page_seo_title = 'Microsoft Work IQ API: AI-агенты в M365, MCP и Copilot Credits';
$page_seo_description = 'Анонс Work IQ API (GA 16 июня 2026): Chat, Context, Tools и Workspaces для AI-агентов в Microsoft 365. Разбор MCP, Copilot Credits, Copilot Studio и как внедрить аналог для бизнеса в РФ.';

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
 *   `.microsoft-work-iq-api-agenty-m365-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.microsoft-work-iq-api-agenty-m365-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #0078d4;
    --ym-accent: #5b5fc7;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(0, 120, 212, 0.15);
}

.microsoft-work-iq-api-agenty-m365-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.microsoft-work-iq-api-agenty-m365-page h1,
.microsoft-work-iq-api-agenty-m365-page h2,
.microsoft-work-iq-api-agenty-m365-page h3,
.microsoft-work-iq-api-agenty-m365-page h4,
.microsoft-work-iq-api-agenty-m365-page h5,
.microsoft-work-iq-api-agenty-m365-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.microsoft-work-iq-api-agenty-m365-page p,
.microsoft-work-iq-api-agenty-m365-page li,
.microsoft-work-iq-api-agenty-m365-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.microsoft-work-iq-api-agenty-m365-page strong,
.microsoft-work-iq-api-agenty-m365-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.microsoft-work-iq-api-agenty-m365-page pre, .microsoft-work-iq-api-agenty-m365-page code {
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
    background: radial-gradient(circle, rgba(0,120,212,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(0, 120, 212, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(0, 120, 212, 0.2);
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
    background: linear-gradient(90deg, #0078d4, #ff4b4b);
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
    box-shadow: 0 5px 15px rgba(0,120,212,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(0, 120, 212, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(0, 120, 212, 0.5);
    background: #106ebe;
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
    border-color: rgba(0, 120, 212, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(0, 120, 212, 0.05);
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
#workiq-hero.fullscreen-white-office.workiq-hero-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.workiq-intro-section { padding: clamp(48px, 6vw, 72px) 0 24px; }
.workiq-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: start;
}
@media (min-width: 900px) {
  .workiq-intro-grid { grid-template-columns: 1.2fr 0.9fr; gap: 40px; }
}
.workiq-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #0078d4, #5b5fc7) 1;
  padding-left: clamp(16px, 3vw, 24px);
}
.workiq-intro-text p { text-align: left !important; }
.workiq-intro-deco .ym-mac-window { margin-bottom: 0; }
.workiq-toc-wrap { padding: 8px 0 48px; text-align: center; }
.workiq-longread .ym-content-table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 15px;
}
.workiq-longread .ym-content-table th,
.workiq-longread .ym-content-table td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.workiq-longread .ym-content-table th { background: #f1f5f9; }
.workiq-longread h2 { font-size: clamp(28px, 3.5vw, 36px); margin: 0 0 20px; }
.workiq-longread h3 { font-size: clamp(20px, 2.5vw, 24px); margin: 32px 0 16px; }
.workiq-longread p, .workiq-longread li { line-height: 1.7; }
.workiq-longread blockquote {
  margin: 20px 0;
  padding: 16px 20px;
  border-left: 4px solid var(--ym-accent);
  background: #f8fafc;
  border-radius: 0 12px 12px 0;
}
.workiq-longread hr { border: none; border-top: 1px solid var(--ym-border); margin: 40px 0; }
.workiq-longread ul { padding-left: 1.25em; }
.workiq-conclusion {
  padding: 48px 0 80px;
  text-align: left;
  max-width: 900px;
  margin: 0 auto;
}

</style>

<main id="primary" class="site-main microsoft-work-iq-api-agenty-m365-page" role="main" tabindex="-1">
<section id="workiq-hero" class="fullscreen-white-office workiq-hero-office" aria-label="Microsoft Work IQ API hero">
<style>
.fullscreen-white-office.workiq-hero-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #f8fafc 0%, #ffffff 45%, #eef2ff 100%);
}
.workiq-hero-office::before {
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
#workiq-m365-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.workiq-hero-copy {
  position: absolute;
  right: clamp(16px, 5vw, 72px);
  top: clamp(72px, 12vh, 140px);
  max-width: min(560px, 42vw);
  z-index: 4;
  text-align: left;
}
.giant-seo {
  font-size: clamp(32px, 4.2vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0078d4, #5b5fc7, #8764b8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.8vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 520px;
}
.telegram-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 24px;
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
.telegram-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 28px rgba(0, 120, 212, 0.25);
}
.vl-ui-tasks.workiq-steps-left {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 8vh, 120px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 18px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 14px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
}
.vl-ui-task span {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #0078d4, #5b5fc7);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 800;
  flex-shrink: 0;
}
.vl-ui-pill.workiq-pill-top {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  top: clamp(20px, 4vh, 48px);
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  z-index: 3;
  transform: none;
}
.vl-ui-pill.workiq-pill-top span {
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
  .workiq-hero-copy {
    right: 16px;
    left: 16px;
    max-width: none;
    top: auto;
    bottom: 200px;
  }
  .vl-ui-tasks.workiq-steps-left {
    bottom: 16px;
    left: 16px;
    right: 16px;
  }
  .vl-ui-pill.workiq-pill-top {
    top: 12px;
    left: 12px;
    right: 12px;
  }
}
</style>

<canvas id="workiq-m365-hero-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill workiq-pill-top" role="list" aria-label="Домены Work IQ API">
  <span role="listitem">Chat API</span>
  <span role="listitem">Context API</span>
  <span role="listitem">Tools API</span>
  <span role="listitem">Workspaces</span>
</div>

<div class="vl-ui-tasks workiq-steps-left" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Собрать контекст M365</div>
  <div class="vl-ui-task"><span>2</span> Подключить MCP tools</div>
  <div class="vl-ui-task"><span>3</span> Запустить агента + Credits</div>
  <div class="vl-ui-task"><span>4</span> GA 16.06.2026</div>
</div>

<div class="workiq-hero-copy">
  <h1 class="giant-seo">Microsoft Work IQ API: <span>как внедрить AI-агентов в Microsoft 365 с MCP</span></h1>
  <p class="giant-seo-sub">GA 16 июня 2026 — контекст почты, Teams и файлов, 10 MCP-инструментов и расчёт Copilot Credits для корпоративных агентов</p>
  <a class="telegram-button wiq-hero-cta" href="[PRIMARY_CTA_URL]" rel="noopener noreferrer">[PRIMARY_CTA_LABEL]</a>
</div>
</section>

<script>
/**
 * Work IQ M365 Hero Engine — диспетчерская MCP (не vibecoding factory).
 * canvas#workiq-m365-hero-canvas
 */
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("workiq-m365-hero-canvas");
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
    cx = cw * 0.38;
    cy = ch * 0.52;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    msBlue: "#0078d4",
    msPurple: "#5b5fc7",
    msTeal: "#0e9384",
    hubFill: "#ffffff",
    hubStroke: "#cbd5e1",
    packetMail: "#93c5fd",
    packetTeams: "#a7f3d0",
    packetFile: "#fde68a",
    creditGreen: "#16a34a",
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

  class ContextOrbitalStream {
    constructor() {
      this.lanes = [
        { r: 200, speed: 0.018, types: ["mail", "teams", "file"] },
        { r: 260, speed: -0.012, types: ["file", "mail", "teams"] },
        { r: 320, speed: 0.009, types: ["teams", "file", "mail"] }
      ];
    }
    draw(ctx) {
      this.lanes.forEach((lane, li) => {
        for (let i = 0; i < 5; i++) {
          const ang = frame * lane.speed + (i / 5) * Math.PI * 2 + li * 0.7;
          const px = Math.cos(ang) * lane.r;
          const py = Math.sin(ang) * lane.r * 0.55;
          const t = lane.types[i % 3];
          const col = t === "mail" ? C.packetMail : t === "teams" ? C.packetTeams : C.packetFile;
          drawPolyRound(ctx, px - 8, py - 6, 16, 12, 3, col, C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "bold 7px Inter, sans-serif";
          ctx.textAlign = "center";
          ctx.fillText(t === "mail" ? "@" : t === "teams" ? "T" : "F", px, py + 2);
        }
        ctx.strokeStyle = "rgba(0,120,212,0.12)";
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.ellipse(0, 0, lane.r, lane.r * 0.55, 0, 0, Math.PI * 2);
        ctx.stroke();
      });
    }
  }

  class ApiDomainQuad {
    draw(ctx, phase) {
      const nodes = [
        { label: "Chat", x: -280, y: -120, on: phase > 20 },
        { label: "Context", x: 280, y: -100, on: phase > 45 },
        { label: "Tools", x: -260, y: 140, on: phase > 70 },
        { label: "WS", x: 270, y: 130, on: phase > 95 }
      ];
      nodes.forEach((n) => {
        const glow = n.on ? 1 : 0.35;
        ctx.globalAlpha = glow;
        drawPolyRound(ctx, n.x - 36, n.y - 18, 72, 36, 10, n.on ? "#e0f2fe" : "#f1f5f9", C.outline);
        ctx.globalAlpha = 1;
        ctx.fillStyle = n.on ? C.msBlue : "#64748b";
        ctx.font = "bold 11px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(n.label, n.x, n.y + 4);
        if (n.on && frame % 40 < 20) {
          ctx.strokeStyle = C.msBlue;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.moveTo(n.x, n.y);
          ctx.lineTo(0, -20);
          ctx.stroke();
        }
      });
    }
  }

  class CopilotCreditsTicker {
    draw(ctx, phase) {
      if (phase < 130) return;
      const t = ((frame * 0.04) % 240);
      const amounts = ["$0.20", "$0.45", "$0.75", "$1.50"];
      const idx = Math.floor((t - 130) / 28) % amounts.length;
      const bob = Math.sin(frame * 0.08) * 4;
      drawPolyRound(ctx, 200, -160 + bob, 110, 44, 12, "#ecfdf5", C.outline);
      ctx.fillStyle = C.creditGreen;
      ctx.font = "900 18px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(amounts[idx], 255, -134 + bob);
      ctx.fillStyle = "#334155";
      ctx.font = "600 9px Inter, sans-serif";
      ctx.fillText("Copilot Credits", 255, -118 + bob);
    }
  }

  class EntraShieldBadge {
    draw(ctx, phase) {
      const pulse = phase > 100 ? 0.85 + Math.sin(frame * 0.12) * 0.15 : 0.4;
      ctx.globalAlpha = pulse;
      ctx.strokeStyle = C.msPurple;
      ctx.lineWidth = 3;
      ctx.beginPath();
      ctx.moveTo(0, -200);
      ctx.lineTo(28, -178);
      ctx.lineTo(28, -148);
      ctx.quadraticCurveTo(0, -120, -28, -148);
      ctx.lineTo(-28, -178);
      ctx.closePath();
      ctx.stroke();
      ctx.fillStyle = "rgba(91,95,199,0.08)";
      ctx.fill();
      ctx.globalAlpha = 1;
      ctx.fillStyle = C.msPurple;
      ctx.font = "bold 9px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("Entra ID", 0, -158);
    }
  }

  class McpHubCore {
    constructor() {
      this.toolCount = 0;
    }
    draw(ctx) {
      const phase = (frame * 0.04) % 240;
      if (phase < 55) this.toolCount = 0;
      else if (phase < 135) this.toolCount = Math.min(10, Math.floor((phase - 55) / 8) + 1);
      else this.toolCount = 10;

      const hubPulse = 1 + Math.sin(frame * 0.06) * 0.03;
      ctx.save();
      ctx.scale(hubPulse, hubPulse);

      ctx.fillStyle = "rgba(0,120,212,0.06)";
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {
        const a = (Math.PI / 3) * i - Math.PI / 2;
        const hx = Math.cos(a) * 72;
        const hy = Math.sin(a) * 72 - 20;
        if (i === 0) ctx.moveTo(hx, hy);
        else ctx.lineTo(hx, hy);
      }
      ctx.closePath();
      ctx.fill();

      drawPolyRound(ctx, -55, -75, 110, 110, 16, C.hubFill, C.outline);
      ctx.fillStyle = C.msBlue;
      ctx.font = "900 14px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP", 0, -18);
      ctx.font = "600 10px Inter, sans-serif";
      ctx.fillStyle = "#334155";
      ctx.fillText(this.toolCount + "/10 tools", 0, 0);

      for (let i = 0; i < 10; i++) {
        const a = (Math.PI * 2 * i) / 10 - Math.PI / 2;
        const on = i < this.toolCount;
        const tx = Math.cos(a) * 95;
        const ty = Math.sin(a) * 95 - 20;
        drawPolyRound(ctx, tx - 10, ty - 8, 20, 16, 4, on ? C.msTeal : "#e2e8f0", C.outline);
        if (on && frame % 30 < 15) {
          ctx.strokeStyle = C.msTeal;
          ctx.lineWidth = 1;
          ctx.beginPath();
          ctx.moveTo(tx, ty);
          ctx.lineTo(0, -20);
          ctx.stroke();
        }
      }

      if (phase >= 190) {
        const gaAlpha = 0.7 + Math.sin(frame * 0.2) * 0.3;
        ctx.globalAlpha = gaAlpha;
        drawPolyRound(ctx, -58, -118, 116, 28, 14, C.msBlue, null);
        ctx.fillStyle = "#fff";
        ctx.font = "800 11px Inter, sans-serif";
        ctx.fillText("GA · 16.06.2026", 0, -100);
        ctx.globalAlpha = 1;
      }
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
      this.hubAngle = (stepTrig / 200) * Math.PI * 2;
    }

    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.04) % 240;
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;

      const hubR = 55;
      const targetX = Math.cos(this.hubAngle) * hubR;
      const targetY = Math.sin(this.hubAngle) * hubR * 0.6 - 30;

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
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 ? this.color : null;
      }

      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      const bob = isMoving ? Math.abs(Math.sin(this.timer * 3)) * 2 : Math.sin(this.timer * 1.5);
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
        ctx.moveTo(hx - 8, hy - 10);
        ctx.lineTo(hx - 14, hy - 18);
        ctx.lineTo(hx, hy - 20);
        ctx.lineTo(hx + 12, hy - 16);
        ctx.lineTo(hx + 8, hy - 8);
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
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const phaseRef = { v: 0 };

  const stream = new ContextOrbitalStream();
  const hub = new McpHubCore();
  const quad = new ApiDomainQuad();
  const credits = new CopilotCreditsTicker();
  const shield = new EntraShieldBadge();

  entities.push(stream);
  entities.push(quad);
  entities.push(shield);
  entities.push(hub);
  entities.push(credits);

  entities.push(
    new Agent(-220, 80, C.agentYellow, "1_architect", 18, [
      "Матрица A2A/MCP/REST",
      "Governance Agent 365",
      "Архитектура tenant"
    ])
  );
  entities.push(
    new Agent(-120, 200, C.agentGreen, "2_seo", 58, [
      "Light → heavy Credits",
      "0,1 credit за Tool",
      "FinOps к GA"
    ])
  );
  entities.push(
    new Agent(40, 220, C.agentBlue, "3_coder", 98, [
      "10 MCP tools online",
      "Progressive disclosure",
      "Foundry + Work IQ"
    ])
  );
  entities.push(
    new Agent(160, 100, C.agentPink, "4_designer", 138, [
      "Copilot Studio UX",
      "Агент в Teams",
      "Low-code сценарий"
    ])
  );
  entities.push(
    new Agent(220, -40, C.agentPurple, "5_deployer", 178, [
      "Delegated auth OBO",
      "Пилот к 16.06",
      "GA Work IQ API"
    ])
  );

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    const phase = (frame * 0.04) % 240;
    phaseRef.v = phase;

    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    stream.draw(ctx);
    quad.draw(ctx, phase);
    shield.draw(ctx, phase);
    hub.draw(ctx);
    credits.draw(ctx, phase);

    entities
      .filter((e) => e instanceof Agent)
      .sort((a, b) => a.y - b.y)
      .forEach((a) => a.draw(ctx));

    if (phase >= 12 && phase < 12.08) createBubble(-200, -40, "1. Контекст почты и Teams");
    if (phase >= 52 && phase < 52.08) createBubble(-80, 120, "2. MCP progressive disclosure");
    if (phase >= 92 && phase < 92.08) createBubble(100, 160, "3. Агент + Copilot Credits");
    if (phase >= 192 && phase < 192.08) createBubble(0, -130, "4. GA Work IQ · 16.06");

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
      const by = bub.y - (bub.maxLife - bub.life) * 0.04;
      drawPolyRound(ctx, bub.x - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.bubbleBg;
      ctx.beginPath();
      ctx.moveTo(bub.x - 4, by);
      ctx.lineTo(bub.x + 4, by);
      ctx.lineTo(bub.x, by + 5);
      ctx.fill();
      ctx.stroke();
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
<section class="workiq-intro-section" aria-label="Введение">
  <div class="ym-container">
    <div class="workiq-intro-grid reveal">
      <div class="workiq-intro-text"><p><strong>Коротко:</strong> 2 июня 2026 Microsoft анонсировала <strong>Work IQ API</strong> с выходом в GA <strong>16 июня 2026</strong>. Это единая «поверхность» для <strong>корпоративных AI-агентов</strong> в Microsoft 365: четыре домена API (Chat, Context, Tools, Workspaces), <strong>10 универсальных MCP-инструментов</strong> и биллинг через <strong>Copilot Credits</strong>. Для бизнеса это не «ещё один чатбот», а инфраструктура <strong>цифровых сотрудников</strong> с доступом к почте, Teams и файлам под governance ИТ.</p>
<p>Если вы ищете <strong>ии агенты для бизнеса</strong> или <strong>внедрение искусственного интеллекта в компании</strong>, Work IQ — свежий ориентир от вендора. Ниже — разбор для владельцев процессов, маркетологов и интеграторов: что меняется с GA, сколько стоят вызовы, как связаны <strong>Copilot Studio</strong>, <strong>Foundry</strong> и MCP, и что делать в РФ, где <strong>Microsoft 365 Copilot Business</strong> официально недоступен.</p></div>
      <div class="workiq-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">work-iq-api · GA 16.06.2026</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># 4 домена API</span><br>
            <span class="ym-command">Chat</span> · <span class="ym-command">Context</span> · <span class="ym-command">Tools</span> · <span class="ym-command">Workspaces</span><br><br>
            <span class="ym-comment"># MCP progressive disclosure</span><br>
            <span class="ym-command">tools_active=10/10</span><br>
            <span class="ym-command">credits_tool=0.1</span> · <span class="ym-command">chat=$0.20–1.50</span>
          </div>
        </div>
        <div class="ym-bento-grid" style="margin-top:20px;grid-template-columns:1fr 1fr;">
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-300">
            <div class="ym-stat-value">16.06</div>
            <div class="ym-stat-label">GA Work IQ API</div>
          </div>
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-400">
            <div class="ym-stat-value">10</div>
            <div class="ym-stat-label">MCP tools</div>
          </div>
        </div>
      </div>
    </div>
    <div class="workiq-toc-wrap"><nav class="ym-toc" aria-label="Оглавление"><a href="#work-iq-chto-takoe">Что такое Work IQ</a><a href="#work-iq-mcp">MCP и протоколы</a><a href="#work-iq-credits">Copilot Credits</a><a href="#work-iq-studio-foundry">Studio и Foundry</a><a href="#work-iq-kontekst">Контекст M365</a><a href="#work-iq-vnedrenie">Внедрение</a><a href="#work-iq-cifrovye">Цифровые сотрудники</a><a href="#work-iq-rossiya">Россия и SMB</a><a href="#work-iq-nero">Nero Network</a><a href="#work-iq-faq">FAQ</a></nav></div>
  </div>
</section>
<section id="work-iq-chto-takoe" class="ym-section reveal">
  <div class="ym-container workiq-longread">
    <h2>Что такое Microsoft Work IQ API и зачем он бизнесу</h2>
    <div class="ym-prose"><p><strong>Определение.</strong> <strong>Work IQ API</strong> — набор программных интерфейсов Microsoft для агентов, которым нужен <strong>контекст организации</strong> (почта, календарь, файлы, Teams) и <strong>действия</strong> в M365, а не ответы «из головы» модели.</p>
<p>По словам <strong>Charles Lamanna</strong> (EVP Copilot, Agents, and Platform, Microsoft): <em>«Software is moving from applications built for people to agents that can reason, retrieve context, and even act on a user's behalf. That shift calls for a different kind of API surface.»</em> — <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog, 02.06.2026</a></p>
<p>Work IQ входит в экосистему <strong>Microsoft IQ</strong> (июнь 2026): workplace-слой рядом с <strong>Fabric IQ</strong> (метрики) и <strong>Foundry IQ</strong> (корпоративные знания + web). На Build 2026 Microsoft подала <strong>Agent Platform</strong> и персонального агента <strong>Scout</strong> в M365 на том же контексте — <a href="https://www.microsoft.com/en-us/ai/microsoft-iq">Microsoft IQ</a>, <a href="https://blogs.microsoft.com/blog/2026/06/02/microsoft-build-2026-be-yourself-at-work/">Official Microsoft Blog Build 2026</a>.</p>
<h3>Четыре домена API: Chat, Context, Tools, Workspaces</h3>
<table class="ym-content-table">
<thead>
<tr>
<th>Домен</th>
<th>Назначение для агента</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Chat</strong></td>
<td>Программный доступ к ответу уровня M365 Copilot (с цитатами) и к агентам в Copilot</td>
</tr>
<tr>
<td><strong>Context</strong></td>
<td>«Сырой» agent-ready контекст <strong>без</strong> синтеза ответа — для вашего оркестратора</td>
</tr>
<tr>
<td><strong>Tools</strong></td>
<td>Действия в M365 через ограниченный набор глаголов + resource paths (почта, встречи, файлы)</td>
</tr>
<tr>
<td><strong>Workspaces</strong></td>
<td>Tenant-bound хранилище промежуточного состояния long-running агентов (Cowork, Scout и др.)</td>
</tr>
</tbody>
</table>
<p>Источник: <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog, анонс Work IQ API</a></p>
<p><strong>Итог:</strong> агент получает не «интеграцию с Graph на десятках эндпоинтов», а <strong>четыре понятных слоя</strong> — спросить (Chat), прочитать контекст (Context), сделать (Tools), помнить состояние (Workspaces).</p>
<h3>Дата GA 16 июня 2026 и чем отличается от «просто Copilot»</h3>
<ul>
<li><strong>Анонс:</strong> 2 июня 2026; <strong>GA Work IQ API — 16 июня 2026.</strong> Публичный preview доступен на GitHub до GA.</li>
<li><strong>Microsoft 365 Copilot</strong> для пользователя — чат и агенты в интерфейсе M365.</li>
<li><strong>Work IQ API</strong> — способ <strong>подключить своих или сторонних агентов</strong> к тем же данным и политикам: кастомные приложения, Foundry, Copilot Studio, оркестраторы.</li>
</ul>
<p>Внутри Microsoft Work IQ внедряли как <strong>инфраструктуру без «big bang» rollout</strong> — улучшение Copilot и агентов «на фоне», builders подключают Graph через API/MCP без ручного «зоопарка» коннекторов — <a href="https://www.microsoft.com/insidetrack/blog/how-work-iq-is-supercharging-our-ai-usage-at-microsoft/">Inside Track</a>.</p>
<p>Для запросов <strong>microsoft 365 copilot</strong> и <strong>агенты microsoft 365</strong> вывод простой: Copilot — продукт для людей; Work IQ — <strong>платформа для агентов</strong>, которые действуют от имени сотрудника (delegated auth).</p>
<hr></div>
  </div>
</section><section id="work-iq-mcp" class="ym-section ym-section-alt reveal">
  <div class="ym-container workiq-longread">
    <h2>MCP в Work IQ: 10 инструментов и progressive disclosure</h2>
    <div class="ym-prose"><h3>Model Context Protocol простыми словами</h3>
<p><strong>MCP (Model Context Protocol)</strong> — открытый протокол, через который LLM и IDE «видят» инструменты и данные. В Work IQ Microsoft сворачивает сотни data-specific tools в <strong>10 универсальных MCP-инструментов</strong> с <strong>progressive disclosure</strong> (детали раскрываются по ходу диалога агента).</p>
<p>Заявленный эффект: меньше round-trips, выше throughput, меньше токенов на tool-calling — <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog</a>.</p>
<p>Для тренда <strong>mcp агенты</strong> и <strong>model context protocol</strong> это важно: вендор задаёт эталон <strong>«узкий набор tools + раскрытие по мере надобности»</strong>, а не бесконечный каталог API.</p>
<h3>A2A vs MCP vs REST — когда что выбирать</h3>
<p>По <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">Work IQ API overview (Learn)</a> доступны <strong>три протокола</strong>:</p>
<table class="ym-content-table">
<thead>
<tr>
<th>Протокол</th>
<th>Когда использовать</th>
<th>Примеры сценариев</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>A2A</strong></td>
<td>Делегирование <strong>между агентами</strong> (v0.3 и v1.0 через заголовок <code>A2A-Version</code>)</td>
<td>Foundry-агент → Work IQ; multi-agent цепочки</td>
</tr>
<tr>
<td><strong>MCP</strong></td>
<td>Local через Work IQ CLI + <strong>remote MCP server</strong>; IDE, Copilot Studio, внешний LLM</td>
<td>Разработка, low-code агенты, Make/n8n с MCP Toolboxes</td>
</tr>
<tr>
<td><strong>REST</strong></td>
<td>Request/response для сервисных агентов</td>
<td>Веб-сервис, CRM-webhooks (часть REST на Learn помечена «coming soon» на 03.06.2026)</td>
</tr>
</tbody>
</table>
<p><strong>Коротко для интегратора:</strong><br>
- Нужен <strong>оркестратор агентов</strong> — смотрите <strong>A2A</strong>.<br>
- Нужен <strong>Copilot Studio / Cursor / Make</strong> — <strong>MCP</strong>.<br>
- Нужен классический бэкенд без MCP — <strong>REST</strong> (с учётом статуса GA).</p>
<p>Параллель из экосистемы Make: <em>«Enterprise-grade AI requires purpose-built tools, deterministic execution, strict scoping, observability, and managed governance»</em> — <a href="https://www.make.com/en/how-to-guides/mcp-toolboxes">Make MCP Toolboxes</a>. Work IQ делает то же на стороне M365.</p>
<hr></div>
  </div>
</section><section id="microsoft-work-iq-api-agenty-m365-boris-block" class="boris-article-viz ym-section" aria-labelledby="boris-protocol-heading">
  <style>
    #microsoft-work-iq-api-agenty-m365-boris-block {
      padding: clamp(32px, 5vw, 56px) 0;
      background: linear-gradient(180deg, #fff 0%, #f8fafc 100%);
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-map {
      max-width: 1180px;
      margin: 0 auto;
      padding: clamp(24px, 4vw, 40px);
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 18px 48px rgba(15, 23, 42, 0.06);
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 28px;
      align-items: center;
    }
    @media (min-width: 1024px) {
      #microsoft-work-iq-api-agenty-m365-boris-block .boris-grid {
        grid-template-columns: 1.15fr 1fr;
        gap: 36px;
      }
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-eyebrow {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: #64748b;
      margin: 0 0 10px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-kicker {
      margin: 0 0 14px;
      font-size: clamp(22px, 2.8vw, 28px);
      line-height: 1.25;
      color: #0f172a;
      font-weight: 700;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-lead {
      margin: 0 0 18px;
      color: #475569;
      line-height: 1.65;
      font-size: 15px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-theses {
      margin: 0 0 20px;
      padding: 0;
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-theses li {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      font-size: 14px;
      line-height: 1.5;
      color: #334155;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-theses li::before {
      content: "";
      flex-shrink: 0;
      width: 8px;
      height: 8px;
      margin-top: 7px;
      border-radius: 50%;
      background: #3b82f6;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 14px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill {
      border: 1px solid #cbd5e1;
      background: #fff;
      color: #334155;
      font-size: 12px;
      font-weight: 600;
      padding: 8px 14px;
      border-radius: 999px;
      cursor: pointer;
      transition: border-color 0.2s, background 0.2s, color 0.2s, transform 0.15s;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill:hover {
      border-color: #94a3b8;
      transform: translateY(-1px);
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill.is-active {
      border-color: transparent;
      color: #fff;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill[data-proto="a2a"].is-active { background: #8b5cf6; }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill[data-proto="mcp"].is-active { background: #0ea5e9; }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-pill[data-proto="rest"].is-active { background: #10b981; }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-bridge {
      margin: 0;
      font-size: 13px;
      color: #64748b;
      line-height: 1.5;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-stats {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 16px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-stat {
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 10px 14px;
      min-width: 120px;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-stat strong {
      display: block;
      font-size: 15px;
      color: #0f172a;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-stat span {
      font-size: 11px;
      color: #64748b;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-canvas-wrap {
      position: relative;
      min-height: 380px;
      max-height: 520px;
      height: clamp(380px, 48vw, 480px);
      border-radius: 18px;
      background: #fff;
      border: 1px solid #e2e8f0;
      overflow: hidden;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block canvas {
      display: block;
      width: 100%;
      height: 100%;
    }
    #microsoft-work-iq-api-agenty-m365-boris-block .boris-hint {
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: 10px;
      text-align: center;
      font-size: 11px;
      color: #94a3b8;
      pointer-events: none;
    }
  </style>

  <div class="ym-container">
    <div class="boris-map">
      <div class="boris-grid">
        <div class="boris-copy">
          <p class="boris-eyebrow">Интерактив · протоколы Work IQ</p>
          <h3 id="boris-protocol-heading" class="boris-kicker">Куда направить агента: A2A, MCP или REST</h3>
          <p class="boris-lead">Microsoft даёт три «языка» подключения. Выберите сценарий — на схеме подсветится маршрут и рекомендуемый протокол.</p>
          <ul class="boris-theses">
            <li><strong>A2A</strong> — цепочки агентов (Foundry → Work IQ, multi-agent).</li>
            <li><strong>MCP</strong> — Studio, IDE, Make/n8n с MCP Toolboxes.</li>
            <li><strong>REST</strong> — сервисные интеграции и webhooks (часть REST — «coming soon»).</li>
          </ul>
          <div class="boris-pills" role="tablist" aria-label="Сценарии протоколов">
            <button type="button" class="boris-pill is-active" data-proto="a2a" data-scenario="0" role="tab" aria-selected="true">Foundry → Work IQ</button>
            <button type="button" class="boris-pill" data-proto="mcp" data-scenario="1" role="tab" aria-selected="false">Copilot Studio / Make</button>
            <button type="button" class="boris-pill" data-proto="rest" data-scenario="2" role="tab" aria-selected="false">CRM и webhooks</button>
          </div>
          <p class="boris-bridge">Дальше разберём, сколько это стоит в <strong>Copilot Credits</strong> — light/medium/heavy и 0,1 credit за Tool.</p>
          <div class="boris-stats" aria-hidden="false">
            <div class="boris-stat"><strong>10</strong><span>MCP tools · progressive disclosure</span></div>
            <div class="boris-stat"><strong>0,1</strong><span>credit / вызов Tool API</span></div>
            <div class="boris-stat"><strong>$0,20–1,50</strong><span>Chat/Context за вызов</span></div>
          </div>
        </div>
        <div class="boris-canvas-wrap">
          <canvas id="work-iq-protocol-matrix-canvas" width="640" height="480" aria-label="Анимация маршрутов A2A, MCP и REST"></canvas>
          <p class="boris-hint">Клик по сценарию слева · автопереключение каждые 6 с</p>
        </div>
      </div>
    </div>
  </div>

  <script>
  (function () {
    var canvas = document.getElementById("work-iq-protocol-matrix-canvas");
    if (!canvas) return;
    var section = document.getElementById("microsoft-work-iq-api-agenty-m365-boris-block");
    var ctx = canvas.getContext("2d");
    var cw = 640, ch = 480, frame = 0, activeScenario = 0, autoTimer = 0;

    var COLORS = {
      a2a: { main: "#8b5cf6", soft: "#ede9fe" },
      mcp: { main: "#0ea5e9", soft: "#e0f2fe" },
      rest: { main: "#10b981", soft: "#d1fae5" },
      ink: "#0f172a",
      muted: "#94a3b8",
      line: "#e2e8f0"
    };

    var scenarios = [
      { id: "a2a", label: "A2A", sub: "Foundry-агент → Work IQ", from: "foundry", to: "workiq" },
      { id: "mcp", label: "MCP", sub: "10 tools · Studio / Make", from: "client", to: "workiq" },
      { id: "rest", label: "REST", sub: "CRM · сервисный бэкенд", from: "crm", to: "workiq" }
    ];

    var nodes = {
      foundry: { x: 0.18, y: 0.32, r: 36, title: "Foundry", sub: "pro-code" },
      client: { x: 0.18, y: 0.32, r: 36, title: "IDE / Make", sub: "MCP client" },
      crm: { x: 0.18, y: 0.32, r: 36, title: "CRM / API", sub: "webhook" },
      workiq: { x: 0.72, y: 0.42, r: 52, title: "Work IQ", sub: "4 домена" },
      hubA2A: { x: 0.46, y: 0.22, r: 28, title: "A2A", sub: "v0.3 / v1.0" },
      hubMCP: { x: 0.46, y: 0.42, r: 28, title: "MCP", sub: "10 tools" },
      hubREST: { x: 0.46, y: 0.62, r: 28, title: "REST", sub: "R/R" }
    };

    var packets = [];

    function resize() {
      var wrap = canvas.parentElement;
      if (!wrap) return;
      var w = wrap.clientWidth || 640;
      var h = wrap.clientHeight || 480;
      var dpr = Math.min(window.devicePixelRatio || 1, 2);
      canvas.width = Math.floor(w * dpr);
      canvas.height = Math.floor(h * dpr);
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      cw = w;
      ch = h;
    }

    function nodePos(key) {
      var n = nodes[key];
      return { x: n.x * cw, y: n.y * ch, r: n.r * (cw < 400 ? 0.85 : 1) };
    }

    function spawnPacket(proto) {
      var sc = scenarios[activeScenario];
      var path = [];
      var from = nodePos(sc.from);
      var hubKey = "hub" + proto.toUpperCase();
      if (proto === "a2a") hubKey = "hubA2A";
      if (proto === "mcp") hubKey = "hubMCP";
      if (proto === "rest") hubKey = "hubREST";
      var hub = nodePos(hubKey);
      var to = nodePos("workiq");
      path.push(from, hub, to);
      packets.push({
        path: path,
        t: 0,
        speed: 0.012 + Math.random() * 0.006,
        color: COLORS[proto].main
      });
    }

    function drawHub(x, y, r, title, sub, color, lit) {
      ctx.beginPath();
      ctx.arc(x, y, r, 0, Math.PI * 2);
      ctx.fillStyle = lit ? color.soft : "#fff";
      ctx.fill();
      ctx.lineWidth = lit ? 3 : 2;
      ctx.strokeStyle = lit ? color.main : COLORS.line;
      ctx.stroke();
      ctx.fillStyle = COLORS.ink;
      ctx.font = "bold " + Math.round(13 * (cw / 640)) + "px system-ui,sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(title, x, y - 4);
      ctx.fillStyle = COLORS.muted;
      ctx.font = Math.round(10 * (cw / 640)) + "px system-ui,sans-serif";
      ctx.fillText(sub, x, y + 12);
    }

    function drawWorkIQ(x, y, r) {
      var g = ctx.createRadialGradient(x - 10, y - 10, 4, x, y, r);
      g.addColorStop(0, "#dbeafe");
      g.addColorStop(1, "#eff6ff");
      ctx.beginPath();
      ctx.arc(x, y, r, 0, Math.PI * 2);
      ctx.fillStyle = g;
      ctx.fill();
      ctx.lineWidth = 3;
      ctx.strokeStyle = "#2563eb";
      ctx.stroke();
      ctx.fillStyle = COLORS.ink;
      ctx.font = "bold " + Math.round(15 * (cw / 640)) + "px system-ui,sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("Work IQ", x, y - 6);
      ctx.font = Math.round(10 * (cw / 640)) + "px system-ui,sans-serif";
      ctx.fillStyle = "#475569";
      ctx.fillText("Chat · Context · Tools · WS", x, y + 14);
    }

    function drawLink(a, b, color, alpha, dash) {
      ctx.beginPath();
      ctx.moveTo(a.x, a.y);
      ctx.lineTo(b.x, b.y);
      ctx.strokeStyle = color;
      ctx.globalAlpha = alpha;
      ctx.lineWidth = litWidth();
      if (dash) ctx.setLineDash([6, 6]);
      else ctx.setLineDash([]);
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.globalAlpha = 1;
    }

    function litWidth() {
      return cw < 500 ? 2 : 2.5;
    }

    function drawScene() {
      ctx.clearRect(0, 0, cw, ch);
      var sc = scenarios[activeScenario];
      var proto = sc.id;

      drawHub(nodePos("hubA2A").x, nodePos("hubA2A").y, nodePos("hubA2A").r, nodes.hubA2A.title, nodes.hubA2A.sub, COLORS.a2a, proto === "a2a");
      drawHub(nodePos("hubMCP").x, nodePos("hubMCP").y, nodePos("hubMCP").r, nodes.hubMCP.title, nodes.hubMCP.sub, COLORS.mcp, proto === "mcp");
      drawHub(nodePos("hubREST").x, nodePos("hubREST").y, nodePos("hubREST").r, nodes.hubREST.title, nodes.hubREST.sub, COLORS.rest, proto === "rest");

      var leftKey = sc.from;
      var left = nodePos(leftKey);
      drawHub(left.x, left.y, left.r, nodes[leftKey].title, nodes[leftKey].sub, COLORS[proto], true);

      var wiq = nodePos("workiq");
      drawWorkIQ(wiq.x, wiq.y, wiq.r);

      var hubKey = proto === "a2a" ? "hubA2A" : proto === "mcp" ? "hubMCP" : "hubREST";
      var hub = nodePos(hubKey);

      [["hubA2A", COLORS.a2a], ["hubMCP", COLORS.mcp], ["hubREST", COLORS.rest]].forEach(function (pair) {
        var h = nodePos(pair[0]);
        var on = pair[0] === hubKey;
        drawLink(left, h, pair[1].main, on ? 0.35 : 0.12, !on);
        drawLink(h, wiq, pair[1].main, on ? 0.55 : 0.1, !on);
      });

      if (frame % 45 === 0) spawnPacket(proto);

      packets.forEach(function (p, i) {
        p.t += p.speed;
        if (p.t >= 1) {
          packets.splice(i, 1);
          return;
        }
        var seg = p.t * (p.path.length - 1);
        var idx = Math.floor(seg);
        var frac = seg - idx;
        if (idx >= p.path.length - 1) return;
        var a = p.path[idx];
        var b = p.path[idx + 1];
        var x = a.x + (b.x - a.x) * frac;
        var y = a.y + (b.y - a.y) * frac;
        ctx.beginPath();
        ctx.arc(x, y, 5, 0, Math.PI * 2);
        ctx.fillStyle = p.color;
        ctx.fill();
        ctx.beginPath();
        ctx.arc(x, y, 10, 0, Math.PI * 2);
        ctx.fillStyle = p.color + "33";
        ctx.fill();
      });

      ctx.fillStyle = COLORS.ink;
      ctx.font = "600 " + Math.round(12 * (cw / 640)) + "px system-ui,sans-serif";
      ctx.textAlign = "left";
      ctx.fillText(sc.label + " · " + sc.sub, 16, ch - 18);
    }

    function setScenario(idx) {
      activeScenario = idx % scenarios.length;
      packets.length = 0;
      autoTimer = 0;
      if (!section) return;
      var pills = section.querySelectorAll(".boris-pill");
      pills.forEach(function (btn, i) {
        var on = i === activeScenario;
        btn.classList.toggle("is-active", on);
        btn.setAttribute("aria-selected", on ? "true" : "false");
      });
    }

    function tick() {
      frame++;
      autoTimer++;
      if (autoTimer > 360) {
        setScenario(activeScenario + 1);
      }
      drawScene();
      requestAnimationFrame(tick);
    }

    if (section) {
      section.querySelectorAll(".boris-pill").forEach(function (btn) {
        btn.addEventListener("click", function () {
          setScenario(parseInt(btn.getAttribute("data-scenario"), 10) || 0);
        });
      });
    }

    window.addEventListener("resize", resize);
    resize();
    setScenario(0);
    requestAnimationFrame(tick);
  })();
  </script>
</section><section id="work-iq-credits" class="ym-section reveal">
  <div class="ym-container workiq-longread">
    <h2>Copilot Credits: сколько стоят вызовы агентов</h2>
    <div class="ym-prose"><p><strong>Определение.</strong> С <strong>16.06.2026</strong> отдельного SKU/подписки на Work IQ API <strong>нет</strong>. Платите при <strong>собственных агентах/приложениях</strong> или third-party агентах, которые граундятся в M365 через Work IQ — <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">Work IQ GA licensing</a>.</p>
<h3>Light / medium / heavy сценарии и примеры $0.20–$1.50</h3>
<p>Два компонента биллинга:</p>
<ol>
<li><strong>Переменный</strong> (Chat/Context): grounding, retrieval, reasoning.</li>
<li><strong>Фиксированный</strong> для Tools: <strong>0,1 Copilot Credit за вызов</strong> Tool API.</li>
</ol>
<p>Иллюстративные диапазоны <strong>за один вызов</strong> Chat/Context (зависит от сложности):</p>
<table class="ym-content-table">
<thead>
<tr>
<th>Сценарий</th>
<th>Диапазон за вызов (USD)</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Light</strong></td>
<td>$0,20–$0,40</td>
</tr>
<tr>
<td><strong>Medium</strong></td>
<td>$0,30–$0,75</td>
</tr>
<tr>
<td><strong>Heavy</strong></td>
<td>$0,50–$1,50</td>
</tr>
</tbody>
</table>
<p>Источник: <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">Work IQ GA licensing</a></p>
<h3>Как считать бюджет на пилот и прод</h3>
<p><strong>Чеклист FinOps к GA:</strong></p>
<ol>
<li>Оцените <strong>число вызовов Tools</strong> в месяц × <strong>0,1 credit</strong>.</li>
<li>Разложите Chat/Context на light/medium/heavy (например, FAQ-бот = light, отчёт с grounding = heavy).</li>
<li>С <strong>середины июня 2026</strong> в <strong>M365 admin center</strong> — новый дашборд: prepaid vs pay-as-you-go Copilot Credits, лимиты tenant/group/user — <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog</a>. Work IQ — <strong>первый продукт</strong> в этом опыте.</li>
</ol>
<p><strong>Copilot Studio (отдельно от Work IQ API):</strong> пак <strong>25 000 Copilot Credits за $200/мес</strong>; pay-as-you-go без upfront. Примеры ставок Studio: generative answer <strong>2 credits</strong>, agent action <strong>5</strong>, tenant graph grounding <strong>10 credits</strong> — <a href="https://www.microsoft.com/en-us/microsoft-365-copilot/pricing/copilot-studio">Copilot Studio pricing</a>, <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/requirements-messages-management">Billing rates Learn</a>.</p>
<p><strong>Agent 365</strong> (control plane, GA с 01.05.2026): <strong>$15/user/мес</strong> (или в <strong>M365 E7 ~$99/user/мес</strong>) — это <strong>governance и наблюдаемость</strong>, не execution. Исполнение (Studio, Foundry, Work IQ Credits) — отдельно — <a href="https://www.microsoft.com/en-us/microsoft-agent-365">Microsoft Agent 365</a>.</p>
<hr></div>
  </div>
</section><section id="work-iq-studio-foundry" class="ym-section ym-section-alt reveal">
  <div class="ym-container workiq-longread">
    <h2>Copilot Studio, Foundry и pro-code агенты</h2>
    <div class="ym-prose"><h3>Декларативные агенты в Copilot Studio</h3>
<p><strong>Copilot Studio</strong> — low-code слой для <strong>корпоративных ai агентов</strong> в Teams и M365. Work IQ MCP-серверы в Studio по Learn требуют <strong>лицензию Microsoft 365 Copilot на пользователя</strong> — <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/use-work-iq">Work IQ MCP overview</a>.</p>
<p>Подходит, когда владелец процесса — не разработчик, а <strong>операционный эксперт</strong> (продажи, HR, поддержка).</p>
<h3>Foundry + Work IQ для разработчиков</h3>
<p><strong>Azure AI Foundry</strong> + Work IQ — pro-code: агент с tool Work IQ через <strong>A2A</strong>, delegated auth (Entra ID, OBO). <strong>App-only не поддерживается</strong>; sensitivity labels и compliance применяются автоматически — <a href="https://learn.microsoft.com/en-us/azure/foundry/agents/how-to/tools/work-iq">Foundry + Work IQ</a>, <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">API overview</a>.</p>
<p><strong>Важный нюанс лицензий (не упрощать):</strong><br>
- <strong>MCP в Copilot Studio</strong> → нужен <strong>M365 Copilot</strong> на пользователя.<br>
- <strong>Прямые вызовы Work IQ API</strong> для кастомных агентов → consumption через Credits <strong>без отдельного per-user SKU на API</strong> (licensing news).<br>
- <strong>Developer Blog (03.06.2026):</strong> на GA доступ к API в consumption-модели <strong>не привязан к лицензии M365 Copilot</strong>; для licensed Copilot users Work IQ встроен в Copilot-опыт, кастомные агенты тарифицируются consumptively — <a href="https://devblogs.microsoft.com/microsoft365dev/work-iq-production-ready-intelligence-for-every-agent/">M365 Developer Blog</a>.</p>
<p><strong>Итог:</strong> Studio — для <strong>copilot studio агент</strong> под бизнес-линию; Foundry — для <strong>агенты microsoft 365</strong> с кодом и A2A.</p>
<hr></div>
  </div>
</section><section id="work-iq-kontekst" class="ym-section reveal">
  <div class="ym-container workiq-longread">
    <h2>Контекст организации: почта, Teams, файлы</h2>
    <div class="ym-prose"><h3>Зачем агенту контекст M365, а не «чат без данных»</h3>
<p><strong>Корпоративный ai ассистент</strong> без доступа к письмам, файлам и календарю — это публичный ChatGPT с риском галлюцинаций. Work IQ закрывает боль <strong>«нужен контекст организации»</strong>: агент цитирует источники (Chat), читает сырой контекст (Context), выполняет ограниченные действия (Tools).</p>
<p>Обзор для IT-аудитории: <em>«Work IQ is Microsoft's clearest statement yet that the next productivity platform will be less about humans clicking through apps and more about agents operating inside a governed corporate nervous system.»</em> — <a href="https://windowsforum.com/threads/microsoft-work-iq-apis-ga-june-16-2026-build-governed-enterprise-agents-in-m365.421598/">Windows Forum</a></p>
<h3>CRM, почта, Teams: Graph и коннекторы</h3>
<p>Для <strong>интеграция ai с microsoft 365</strong> и <strong>интеграция ai с crm и почтой</strong> схема такая:</p>
<ul>
<li>Work IQ Tools — <strong>глаголы + resource paths</strong> внутри M365.</li>
<li>CRM (Dynamics, внешние системы) — часто через <strong>REST</strong>, Copilot connectors или оркестратор (Make/n8n), который вызывает Work IQ для «офисного» контекста.</li>
<li><strong>Агенты для teams</strong> — естественная точка входа через Copilot Studio и Teams-каналы.</li>
</ul>
<p>Безопасность: только <strong>delegated auth</strong> (Entra ID, OBO) — агент действует <strong>от имени пользователя</strong> с его правами.</p>
<hr></div>
  </div>
</section><section id="work-iq-vnedrenie" class="ym-section ym-section-alt reveal">
  <div class="ym-container workiq-longread">
    <h2>Внедрение AI-агентов: пошаговый план для компании</h2>
    <div class="ym-prose"><h3>Аудит процессов и выбор первого агента</h3>
<p><strong>Внедрение ai в компанию</strong> и <strong>внедрение искусственного интеллекта</strong> в 2026 году начинаются не с лицензий, а с процесса:</p>
<ol>
<li><strong>Список повторяющихся задач</strong> (почта, согласования, отчёты, поиск по файлам).</li>
<li><strong>Один пилот</strong> с измеримым KPI (время ответа, доля автозакрытия тикета).</li>
<li>Выбор стека: <strong>Studio</strong> (декларативно) vs <strong>Foundry</strong> (pro-code) vs <strong>сторонний агент + Work IQ API</strong>.</li>
</ol>
<p>С <strong>01.07.2026</strong> Microsoft закрепляет SMB SKU <strong>Microsoft 365 Business Standard/Premium with Copilot</strong> (без промо-циклов) — <a href="https://learn.microsoft.com/ru-ru/partner-center/announcements/2026-june">Partner Center, июнь 2026 (RU)</a>.</p>
<h3>Governance, ИТ и безопасность</h3>
<p><strong>Governance ai агенты</strong> и <strong>корпоративные ai агенты</strong> требуют:</p>
<ul>
<li>Реестр агентов (<strong>Agent 365</strong> с 01.05.2026).</li>
<li>Лимиты Copilot Credits в admin center.</li>
<li>Владельцы процессов и обучение (не только ИТ).</li>
</ul>
<p><strong>Work Trend Index 2026</strong> (20 000 knowledge workers, 10 рынков, фев–апр 2026):</p>
<ul>
<li><strong>67%</strong> влияния AI связывают с <strong>организационными</strong> факторами vs <strong>32%</strong> — с личной установкой.</li>
<li><strong>Frontier Professionals</strong> — <strong>16%</strong> AI-пользователей; у них <strong>80%</strong> делают работу, недоступную год назад (vs <strong>58%</strong> в среднем).</li>
<li><strong>65%</strong> боятся отстать; <strong>45%</strong> безопаснее «не перестраивать работу».</li>
</ul>
<p>Источник: <a href="https://www.microsoft.com/en-us/worklab/work-trend-index/agents-human-agency-and-the-opportunity-for-every-organization">Work Trend Index, Worklab</a></p>
<p><strong>Вывод:</strong> успех <strong>внедрения ИИ</strong> — на <strong>67%</strong> про организацию (политики, обучение, владельцы), а не про «купили Copilot».</p>
<hr></div>
  </div>
</section><aside class="ym-cta-panel reveal ym-section-alt" aria-label="Обучение и автоматизация">
  <div class="ym-container">
    <div class="ym-card" style="max-width:920px;margin:0 auto;padding:clamp(24px,4vw,40px);">
      <p class="ym-section-subtitle" style="text-align:left;margin-bottom:12px;">Практика внедрения</p>
      <h3 style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);">67% успеха ИИ — про организацию, не про лицензию</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);line-height:1.65;">Перед пилотом Work IQ или «своего контура» на Make/n8n полезно увидеть, какие процессы реально автоматизируются без «универсального агента» — и кого обучать владельцем сценария.</p>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-secondary" href="[SECONDARY_CTA_URL]?utm_source=meta-journal&utm_medium=longread&utm_campaign=microsoft-work-iq-api-agenty-m365" target="_blank" rel="noopener noreferrer"><span>[SECONDARY_CTA_LABEL]</span></a>
      </div>
    </div>
  </div>
</aside><section id="work-iq-cifrovye" class="ym-section reveal">
  <div class="ym-container workiq-longread">
    <h2>Цифровые сотрудники и корпоративные AI-агенты в 2026</h2>
    <div class="ym-prose"><h3>От чатбота к агенту с действиями</h3>
<p>Запросы <strong>цифровые сотрудники</strong> (~11k показов/мес в прошлых замерах офиса) и <strong>ии агенты для бизнеса</strong> сходятся к одной модели:</p>
<table class="ym-content-table">
<thead>
<tr>
<th>Уровень</th>
<th>Поведение</th>
</tr>
</thead>
<tbody>
<tr>
<td>Чатбот</td>
<td>Отвечает по FAQ</td>
</tr>
<tr>
<td>Ассистент</td>
<td>Ищет в документах</td>
</tr>
<tr>
<td><strong>Агент</strong></td>
<td>Читает контекст <strong>и выполняет действия</strong> (Tools)</td>
</tr>
</tbody>
</table>
<p>Work IQ + Scout/Cowork — референс «агент с памятью и workspace» от Microsoft.</p>
<p>Кейс с Habr (ритейл, март 2026): <em>«Специализация &gt; универсальность. Три узких агента с 90% точностью эффективнее одного „умного“ с 65%.»</em> — <a href="https://habr.com/ru/articles/1008598/">Habr</a></p>
<h3>Ошибки внедрения: что показывает практика</h3>
<ul>
<li><strong>Один «универсальный» агент</strong> вместо трёх узких сценариев.</li>
<li><strong>Нет лимитов Credits</strong> → неожиданный счёт после GA.</li>
<li><strong>Игнорирование delegated auth</strong> → агент «видит всё» или ничего.</li>
<li><strong>Ожидание мгновенного ROI</strong> при <strong>45%</strong> сотрудников, предпочитающих не менять способ работы (WTI 2026).</li>
</ul>
<p>Microsoft Inside Track советует: <em>«Treat the technology as infrastructure, not a feature… Use Work IQ to move from assistance to action with agents.»</em> — <a href="https://www.microsoft.com/insidetrack/blog/how-work-iq-is-supercharging-our-ai-usage-at-microsoft/">Inside Track</a></p>
<hr></div>
  </div>
</section><section id="work-iq-rossiya" class="ym-section ym-section-alt reveal">
  <div class="ym-container workiq-longread">
    <h2>Россия и SMB: если нет полного M365 Copilot</h2>
    <div class="ym-prose"><h3>RAG + Make/n8n + Telegram как альтернатива</h3>
<p>На <strong>microsoft.com/ru-ru</strong> для <strong>Copilot Business</strong> указано: продукт <strong>недоступен для вашей страны</strong> — <a href="https://www.microsoft.com/ru-ru/microsoft-365/copilot/business">Microsoft 365 Copilot RU</a>. Корпоративный доступ часто идёт через зарубежные юрлица и реселлеров — правовая «серая зона», не официальный канал Microsoft РФ (<a href="https://gptmag.ru/microsoft-copilot-pro-2-may-2026/">GPTmag</a>, <a href="https://korusconsulting.ru/infohub/microsoft-copilot/">Korus Consulting</a>).</p>
<p><strong>Два трека для РФ:</strong></p>
<table class="ym-content-table">
<thead>
<tr>
<th>Трек</th>
<th>Для кого</th>
<th>Стек</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>A</strong></td>
<td>Tenant M365 за рубежом, compliance OK</td>
<td>Work IQ API по правилам Microsoft + Agent 365</td>
</tr>
<tr>
<td><strong>B</strong></td>
<td><strong>Контур без Copilot SKU</strong></td>
<td>RAG + <strong>make com автоматизация</strong> / <strong>n8n ai агент</strong> + Telegram / Яндекс 360 / 1С</td>
</tr>
</tbody>
</table>
<p>Принципы те же, что у Work IQ: <strong>ограниченный набор tools</strong>, progressive disclosure, FinOps-лимиты. Русскоязычные гайды по Make+MCP: <a href="https://mayai.ru/make-com-i-mcp-kak-vnedrit-agentov-dlya-avtomatizaczii-kontenta/">mayai.ru</a> — без привязки к Work IQ как эталону «почта+файлы+календарь».</p>
<h3>Свой «Work IQ» на открытых API</h3>
<p><strong>Корпоративный ai ассистент</strong> для SMB можно собрать без E7:</p>
<ol>
<li><strong>Контекст:</strong> почта (IMAP/API), диск, CRM, мессенджер.</li>
<li><strong>Оркестратор:</strong> Make или n8n с MCP Toolboxes.</li>
<li><strong>Модель:</strong> облачная или on-prem RAG.</li>
<li><strong>Governance:</strong> лимиты вызовов, логи, роли — аналог admin center Credits.</li>
</ol>
<p>Связка с <strong>чат бот для бизнеса</strong> (родовой спрос ~21 500 показов в примерах Search API): чатбот отвечает; <strong>цифровой сотрудник</strong> — отвечает <strong>и действует</strong>.</p>
<hr></div>
  </div>
</section><aside class="ym-cta-panel reveal" aria-label="Консультация Nero Network">
  <div class="ym-container">
    <div class="ym-card" style="max-width:920px;margin:0 auto;padding:clamp(24px,4vw,40px);border-left:4px solid var(--ym-primary);">
      <h3 style="margin:0 0 12px;font-size:clamp(22px,3vw,28px);color:var(--ym-heading);">Собрать паритет Work IQ без Copilot SKU в РФ</h3>
      <p style="margin:0 0 20px;color:var(--ym-text);line-height:1.65;">RAG + Make/n8n + governance: ограниченный набор tools, FinOps-лимиты и первый цифровой сотрудник с KPI — как у Microsoft, но под ваш контур (почта, CRM, Telegram, 1С).</p>
      <ul style="margin:0 0 20px;padding-left:1.2em;color:var(--ym-text);line-height:1.6;">
        <li>Матрица A2A / MCP / REST под ваш стек</li>
        <li>TCO: Credits + Agent 365 vs фиксированный проект</li>
        <li>Чеклист к GA 16.06.2026 или трек B без M365 Copilot</li>
      </ul>
      <div class="ym-btn-group" style="justify-content:flex-start;">
        <a class="ym-btn ym-btn-primary" href="[PRIMARY_CTA_URL]?utm_source=meta-journal&utm_medium=longread&utm_campaign=microsoft-work-iq-api-agenty-m365" target="_blank" rel="noopener noreferrer"><span>[PRIMARY_CTA_LABEL]</span></a>
      </div>
    </div>
  </div>
</aside><section id="work-iq-nero" class="ym-section reveal">
  <div class="ym-container workiq-longread">
    <h2>Сравнение с тем, что делает Nero Network</h2>
    <div class="ym-prose"><p><strong>Угол страницы (не KPMG/Claude):</strong> Microsoft выкатила <strong>Work IQ</strong> для M365; Nero Network помогает <strong>собрать паритет</strong> для вашего контура — MCP, Make/n8n, обучение, <strong>автоматизация бизнеса нейросети</strong> без «зоопарка» API.</p>
<h3>Внедрение под ключ: MCP, обучение, Make</h3>
<p>Услуги интегратора закрывают пробелы официальной документации:</p>
<ul>
<li>Матрица <strong>A2A / MCP / REST</strong> под ваш стек.</li>
<li><strong>TCO:</strong> Credits + Agent 365 + Copilot vs фиксированный проект «свой контур».</li>
<li><strong>Чеклист к 16.06.2026:</strong> preview → GA, лимиты в admin center, первый агент в Studio или Foundry.</li>
<li>Обучение владельцев агентов (организационные <strong>67%</strong> успеха по WTI).</li>
</ul>
<h3>Чеклист перед заявкой</h3>
<ul>
<li>[ ] Есть tenant M365 или осознанный трек B (без Copilot SKU)?</li>
<li>[ ] Выбран первый сценарий (один процесс, не «весь отдел»)?</li>
<li>[ ] Посчитаны Credits (light/medium/heavy + 0,1/tool)?</li>
<li>[ ] Назначены владелец процесса и ИТ (delegated auth, labels)?</li>
<li>[ ] План пилота 4–8 недель с метрикой?</li>
</ul>
<hr></div>
  </div>
</section><aside class="ym-cta-panel reveal ym-section-alt" aria-label="Заявка на внедрение">
  <div class="ym-container">
    <div class="ym-card" style="max-width:960px;margin:0 auto;padding:clamp(28px,5vw,48px);text-align:center;">
      <h3 style="margin:0 0 12px;font-size:clamp(24px,3.5vw,32px);color:var(--ym-heading);">Внедрение AI-агентов под ключ к GA Work IQ</h3>
      <p style="margin:0 auto 24px;max-width:720px;color:var(--ym-text);line-height:1.65;">Аудит процесса → пилот 4–8 недель → первый агент в Studio/Foundry или на Make/n8n. Без «зоопарка» API и с обучением владельцев процессов.</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="[PRIMARY_CTA_URL]?utm_source=meta-journal&utm_medium=longread&utm_campaign=microsoft-work-iq-api-agenty-m365" target="_blank" rel="noopener noreferrer"><span>[PRIMARY_CTA_LABEL]</span></a>
        <a class="ym-btn ym-btn-secondary" href="[SECONDARY_CTA_URL]?utm_source=meta-journal&utm_medium=longread&utm_campaign=microsoft-work-iq-api-agenty-m365" target="_blank" rel="noopener noreferrer"><span>[SECONDARY_CTA_LABEL]</span></a>
      </div>
      <p style="margin:16px 0 0;font-size:14px;color:#64748b;">Ответим с ориентиром по срокам, стеку и бюджету Credits/проекта.</p>
    </div>
  </div>
</aside><section id="work-iq-faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <p class="ym-section-subtitle" style="text-align:left;margin-bottom:16px;">Быстрые ответы</p>
        <ul class="ym-faq-list"><li><a href="#faq-1">**Что такое Work IQ API?</a></li>
<li><a href="#faq-2">Когда выходит Work IQ API в GA?</a></li>
<li><a href="#faq-3">Сколько стоят Copilot Credits за вызов агента?</a></li>
<li><a href="#faq-4">Чем MCP в Work IQ отличается от обычного REST?</a></li>
<li><a href="#faq-5">Можно ли внедрить AI-агентов без Microsoft 365 E5?</a></li>
<li><a href="#faq-6">Как связаны Copilot Studio и Work IQ?</a></li>
<li><a href="#faq-7">Что такое цифровой сотрудник в 2026 году?</a></li>
<li><a href="#faq-8">Безопасно ли давать агенту доступ к почте и файлам?</a></li>
</ul>
      </aside>
      <div class="ym-faq-content"><article class="ym-faq-item reveal" id="faq-1">
      <h3>**Что такое Work IQ API?</h3>
      <div><p>**<br>
Набор API Microsoft (Chat, Context, Tools, Workspaces) для агентов с доступом к данным и действиям в M365 под Entra ID и политиками compliance.</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-2">
      <h3>Когда выходит Work IQ API в GA?</h3>
      <div><p>**</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-3">
      <h3>Сколько стоят Copilot Credits за вызов агента?</h3>
      <div><p><strong><br>
Tools: </strong>0,1 credit<strong> за вызов. Chat/Context: ориентир </strong>$0,20–$1,50** за вызов в зависимости от light/medium/heavy — <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">licensing news</a>.</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-4">
      <h3>Чем MCP в Work IQ отличается от обычного REST?</h3>
      <div><p><strong><br>
MCP даёт </strong>10 универсальных tools** с progressive disclosure; REST — классический request/response для сервисов (часть REST — «coming soon» на момент 03.06.2026).</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-5">
      <h3>Можно ли внедрить AI-агентов без Microsoft 365 E5?</h3>
      <div><p><strong><br>
Да: прямые вызовы Work IQ API тарифицируются </strong>Credits<strong>, не обязательно E7. </strong>Agent 365<strong> ($15/user) — опциональный control plane. MCP в </strong>Copilot Studio<strong> требует </strong>M365 Copilot** на пользователя.</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-6">
      <h3>Как связаны Copilot Studio и Work IQ?</h3>
      <div><p>**<br>
Studio — low-code агенты; Work IQ — контекст и tools. MCP-серверы Work IQ в Studio требуют лицензию Copilot; кастомные агенты через API — consumption по Credits.</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-7">
      <h3>Что такое цифровой сотрудник в 2026 году?</h3>
      <div><p><strong><br>
AI-агент с </strong>контекстом организации<strong> и </strong>правом действий** (не только чат), под governance ИТ.</p></div>
    </article>
<article class="ym-faq-item reveal" id="faq-8">
      <h3>Безопасно ли давать агенту доступ к почте и файлам?</h3>
      <div><p><strong><br>
При </strong>delegated auth** агент видит только то, что разрешено пользователю; app-only не поддерживается; применяются sensitivity labels — <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">API overview</a>.</p>
<hr></div>
    </article>
</div>
    </div>
  </div>
</section><section class="workiq-conclusion reveal"><div class="ym-container"><p><strong>Итог:</strong> агент получает не «интеграцию с Graph на десятках эндпоинтов», а <strong>четыре понятных слоя</strong> — спросить (Chat), прочитать контекст (Context), сделать (Tools), помнить состояние (Workspaces).</p>
<h3>Дата GA 16 июня 2026 и чем отличается от «просто Copilot»</h3>
<ul>
<li><strong>Анонс:</strong> 2 июня 2026; <strong>GA Work IQ API — 16 июня 2026.</strong> Публичный preview доступен на GitHub до GA.</li>
<li><strong>Microsoft 365 Copilot</strong> для пользователя — чат и агенты в интерфейсе M365.</li>
<li><strong>Work IQ API</strong> — способ <strong>подключить своих или сторонних агентов</strong> к тем же данным и политикам: кастомные приложения, Foundry, Copilot Studio, оркестраторы.</li>
</ul>
<p>Внутри Microsoft Work IQ внедряли как <strong>инфраструктуру без «big bang» rollout</strong> — улучшение Copilot и агентов «на фоне», builders подключают Graph через API/MCP без ручного «зоопарка» коннекторов — <a href="https://www.microsoft.com/insidetrack/blog/how-work-iq-is-supercharging-our-ai-usage-at-microsoft/">Inside Track</a>.</p>
<p>Для запросов <strong>microsoft 365 copilot</strong> и <strong>агенты microsoft 365</strong> вывод простой: Copilot — продукт для людей; Work IQ — <strong>платформа для агентов</strong>, которые действуют от имени сотрудника (delegated auth).</p>
<hr>
<h2>MCP в Work IQ: 10 инструментов и progressive disclosure</h2>
<h3>Model Context Protocol простыми словами</h3>
<p><strong>MCP (Model Context Protocol)</strong> — открытый протокол, через который LLM и IDE «видят» инструменты и данные. В Work IQ Microsoft сворачивает сотни data-specific tools в <strong>10 универсальных MCP-инструментов</strong> с <strong>progressive disclosure</strong> (детали раскрываются по ходу диалога агента).</p>
<p>Заявленный эффект: меньше round-trips, выше throughput, меньше токенов на tool-calling — <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog</a>.</p>
<p>Для тренда <strong>mcp агенты</strong> и <strong>model context protocol</strong> это важно: вендор задаёт эталон <strong>«узкий набор tools + раскрытие по мере надобности»</strong>, а не бесконечный каталог API.</p>
<h3>A2A vs MCP vs REST — когда что выбирать</h3>
<p>По <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">Work IQ API overview (Learn)</a> доступны <strong>три протокола</strong>:</p>
<table>
<thead>
<tr>
<th>Протокол</th>
<th>Когда использовать</th>
<th>Примеры сценариев</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>A2A</strong></td>
<td>Делегирование <strong>между агентами</strong> (v0.3 и v1.0 через заголовок <code>A2A-Version</code>)</td>
<td>Foundry-агент → Work IQ; multi-agent цепочки</td>
</tr>
<tr>
<td><strong>MCP</strong></td>
<td>Local через Work IQ CLI + <strong>remote MCP server</strong>; IDE, Copilot Studio, внешний LLM</td>
<td>Разработка, low-code агенты, Make/n8n с MCP Toolboxes</td>
</tr>
<tr>
<td><strong>REST</strong></td>
<td>Request/response для сервисных агентов</td>
<td>Веб-сервис, CRM-webhooks (часть REST на Learn помечена «coming soon» на 03.06.2026)</td>
</tr>
</tbody>
</table>
<p><strong>Коротко для интегратора:</strong><br>
- Нужен <strong>оркестратор агентов</strong> — смотрите <strong>A2A</strong>.<br>
- Нужен <strong>Copilot Studio / Cursor / Make</strong> — <strong>MCP</strong>.<br>
- Нужен классический бэкенд без MCP — <strong>REST</strong> (с учётом статуса GA).</p>
<p>Параллель из экосистемы Make: <em>«Enterprise-grade AI requires purpose-built tools, deterministic execution, strict scoping, observability, and managed governance»</em> — <a href="https://www.make.com/en/how-to-guides/mcp-toolboxes">Make MCP Toolboxes</a>. Work IQ делает то же на стороне M365.</p>
<hr>
<h2>Copilot Credits: сколько стоят вызовы агентов</h2>
<p><strong>Определение.</strong> С <strong>16.06.2026</strong> отдельного SKU/подписки на Work IQ API <strong>нет</strong>. Платите при <strong>собственных агентах/приложениях</strong> или third-party агентах, которые граундятся в M365 через Work IQ — <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">Work IQ GA licensing</a>.</p>
<h3>Light / medium / heavy сценарии и примеры $0.20–$1.50</h3>
<p>Два компонента биллинга:</p>
<ol>
<li><strong>Переменный</strong> (Chat/Context): grounding, retrieval, reasoning.</li>
<li><strong>Фиксированный</strong> для Tools: <strong>0,1 Copilot Credit за вызов</strong> Tool API.</li>
</ol>
<p>Иллюстративные диапазоны <strong>за один вызов</strong> Chat/Context (зависит от сложности):</p>
<table>
<thead>
<tr>
<th>Сценарий</th>
<th>Диапазон за вызов (USD)</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Light</strong></td>
<td>$0,20–$0,40</td>
</tr>
<tr>
<td><strong>Medium</strong></td>
<td>$0,30–$0,75</td>
</tr>
<tr>
<td><strong>Heavy</strong></td>
<td>$0,50–$1,50</td>
</tr>
</tbody>
</table>
<p>Источник: <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">Work IQ GA licensing</a></p>
<h3>Как считать бюджет на пилот и прод</h3>
<p><strong>Чеклист FinOps к GA:</strong></p>
<ol>
<li>Оцените <strong>число вызовов Tools</strong> в месяц × <strong>0,1 credit</strong>.</li>
<li>Разложите Chat/Context на light/medium/heavy (например, FAQ-бот = light, отчёт с grounding = heavy).</li>
<li>С <strong>середины июня 2026</strong> в <strong>M365 admin center</strong> — новый дашборд: prepaid vs pay-as-you-go Copilot Credits, лимиты tenant/group/user — <a href="https://www.microsoft.com/en-us/microsoft-365/blog/2026/06/02/announcing-the-new-work-iq-apis/">Microsoft 365 Blog</a>. Work IQ — <strong>первый продукт</strong> в этом опыте.</li>
</ol>
<p><strong>Copilot Studio (отдельно от Work IQ API):</strong> пак <strong>25 000 Copilot Credits за $200/мес</strong>; pay-as-you-go без upfront. Примеры ставок Studio: generative answer <strong>2 credits</strong>, agent action <strong>5</strong>, tenant graph grounding <strong>10 credits</strong> — <a href="https://www.microsoft.com/en-us/microsoft-365-copilot/pricing/copilot-studio">Copilot Studio pricing</a>, <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/requirements-messages-management">Billing rates Learn</a>.</p>
<p><strong>Agent 365</strong> (control plane, GA с 01.05.2026): <strong>$15/user/мес</strong> (или в <strong>M365 E7 ~$99/user/мес</strong>) — это <strong>governance и наблюдаемость</strong>, не execution. Исполнение (Studio, Foundry, Work IQ Credits) — отдельно — <a href="https://www.microsoft.com/en-us/microsoft-agent-365">Microsoft Agent 365</a>.</p>
<hr>
<h2>Copilot Studio, Foundry и pro-code агенты</h2>
<h3>Декларативные агенты в Copilot Studio</h3>
<p><strong>Copilot Studio</strong> — low-code слой для <strong>корпоративных ai агентов</strong> в Teams и M365. Work IQ MCP-серверы в Studio по Learn требуют <strong>лицензию Microsoft 365 Copilot на пользователя</strong> — <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/use-work-iq">Work IQ MCP overview</a>.</p>
<p>Подходит, когда владелец процесса — не разработчик, а <strong>операционный эксперт</strong> (продажи, HR, поддержка).</p>
<h3>Foundry + Work IQ для разработчиков</h3>
<p><strong>Azure AI Foundry</strong> + Work IQ — pro-code: агент с tool Work IQ через <strong>A2A</strong>, delegated auth (Entra ID, OBO). <strong>App-only не поддерживается</strong>; sensitivity labels и compliance применяются автоматически — <a href="https://learn.microsoft.com/en-us/azure/foundry/agents/how-to/tools/work-iq">Foundry + Work IQ</a>, <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">API overview</a>.</p>
<p><strong>Важный нюанс лицензий (не упрощать):</strong><br>
- <strong>MCP в Copilot Studio</strong> → нужен <strong>M365 Copilot</strong> на пользователя.<br>
- <strong>Прямые вызовы Work IQ API</strong> для кастомных агентов → consumption через Credits <strong>без отдельного per-user SKU на API</strong> (licensing news).<br>
- <strong>Developer Blog (03.06.2026):</strong> на GA доступ к API в consumption-модели <strong>не привязан к лицензии M365 Copilot</strong>; для licensed Copilot users Work IQ встроен в Copilot-опыт, кастомные агенты тарифицируются consumptively — <a href="https://devblogs.microsoft.com/microsoft365dev/work-iq-production-ready-intelligence-for-every-agent/">M365 Developer Blog</a>.</p>
<p><strong>Итог:</strong> Studio — для <strong>copilot studio агент</strong> под бизнес-линию; Foundry — для <strong>агенты microsoft 365</strong> с кодом и A2A.</p>
<hr>
<h2>Контекст организации: почта, Teams, файлы</h2>
<h3>Зачем агенту контекст M365, а не «чат без данных»</h3>
<p><strong>Корпоративный ai ассистент</strong> без доступа к письмам, файлам и календарю — это публичный ChatGPT с риском галлюцинаций. Work IQ закрывает боль <strong>«нужен контекст организации»</strong>: агент цитирует источники (Chat), читает сырой контекст (Context), выполняет ограниченные действия (Tools).</p>
<p>Обзор для IT-аудитории: <em>«Work IQ is Microsoft's clearest statement yet that the next productivity platform will be less about humans clicking through apps and more about agents operating inside a governed corporate nervous system.»</em> — <a href="https://windowsforum.com/threads/microsoft-work-iq-apis-ga-june-16-2026-build-governed-enterprise-agents-in-m365.421598/">Windows Forum</a></p>
<h3>CRM, почта, Teams: Graph и коннекторы</h3>
<p>Для <strong>интеграция ai с microsoft 365</strong> и <strong>интеграция ai с crm и почтой</strong> схема такая:</p>
<ul>
<li>Work IQ Tools — <strong>глаголы + resource paths</strong> внутри M365.</li>
<li>CRM (Dynamics, внешние системы) — часто через <strong>REST</strong>, Copilot connectors или оркестратор (Make/n8n), который вызывает Work IQ для «офисного» контекста.</li>
<li><strong>Агенты для teams</strong> — естественная точка входа через Copilot Studio и Teams-каналы.</li>
</ul>
<p>Безопасность: только <strong>delegated auth</strong> (Entra ID, OBO) — агент действует <strong>от имени пользователя</strong> с его правами.</p>
<hr>
<h2>Внедрение AI-агентов: пошаговый план для компании</h2>
<h3>Аудит процессов и выбор первого агента</h3>
<p><strong>Внедрение ai в компанию</strong> и <strong>внедрение искусственного интеллекта</strong> в 2026 году начинаются не с лицензий, а с процесса:</p>
<ol>
<li><strong>Список повторяющихся задач</strong> (почта, согласования, отчёты, поиск по файлам).</li>
<li><strong>Один пилот</strong> с измеримым KPI (время ответа, доля автозакрытия тикета).</li>
<li>Выбор стека: <strong>Studio</strong> (декларативно) vs <strong>Foundry</strong> (pro-code) vs <strong>сторонний агент + Work IQ API</strong>.</li>
</ol>
<p>С <strong>01.07.2026</strong> Microsoft закрепляет SMB SKU <strong>Microsoft 365 Business Standard/Premium with Copilot</strong> (без промо-циклов) — <a href="https://learn.microsoft.com/ru-ru/partner-center/announcements/2026-june">Partner Center, июнь 2026 (RU)</a>.</p>
<h3>Governance, ИТ и безопасность</h3>
<p><strong>Governance ai агенты</strong> и <strong>корпоративные ai агенты</strong> требуют:</p>
<ul>
<li>Реестр агентов (<strong>Agent 365</strong> с 01.05.2026).</li>
<li>Лимиты Copilot Credits в admin center.</li>
<li>Владельцы процессов и обучение (не только ИТ).</li>
</ul>
<p><strong>Work Trend Index 2026</strong> (20 000 knowledge workers, 10 рынков, фев–апр 2026):</p>
<ul>
<li><strong>67%</strong> влияния AI связывают с <strong>организационными</strong> факторами vs <strong>32%</strong> — с личной установкой.</li>
<li><strong>Frontier Professionals</strong> — <strong>16%</strong> AI-пользователей; у них <strong>80%</strong> делают работу, недоступную год назад (vs <strong>58%</strong> в среднем).</li>
<li><strong>65%</strong> боятся отстать; <strong>45%</strong> безопаснее «не перестраивать работу».</li>
</ul>
<p>Источник: <a href="https://www.microsoft.com/en-us/worklab/work-trend-index/agents-human-agency-and-the-opportunity-for-every-organization">Work Trend Index, Worklab</a></p>
<p><strong>Вывод:</strong> успех <strong>внедрения ИИ</strong> — на <strong>67%</strong> про организацию (политики, обучение, владельцы), а не про «купили Copilot».</p>
<hr>
<h2>Цифровые сотрудники и корпоративные AI-агенты в 2026</h2>
<h3>От чатбота к агенту с действиями</h3>
<p>Запросы <strong>цифровые сотрудники</strong> (~11k показов/мес в прошлых замерах офиса) и <strong>ии агенты для бизнеса</strong> сходятся к одной модели:</p>
<table>
<thead>
<tr>
<th>Уровень</th>
<th>Поведение</th>
</tr>
</thead>
<tbody>
<tr>
<td>Чатбот</td>
<td>Отвечает по FAQ</td>
</tr>
<tr>
<td>Ассистент</td>
<td>Ищет в документах</td>
</tr>
<tr>
<td><strong>Агент</strong></td>
<td>Читает контекст <strong>и выполняет действия</strong> (Tools)</td>
</tr>
</tbody>
</table>
<p>Work IQ + Scout/Cowork — референс «агент с памятью и workspace» от Microsoft.</p>
<p>Кейс с Habr (ритейл, март 2026): <em>«Специализация &gt; универсальность. Три узких агента с 90% точностью эффективнее одного „умного“ с 65%.»</em> — <a href="https://habr.com/ru/articles/1008598/">Habr</a></p>
<h3>Ошибки внедрения: что показывает практика</h3>
<ul>
<li><strong>Один «универсальный» агент</strong> вместо трёх узких сценариев.</li>
<li><strong>Нет лимитов Credits</strong> → неожиданный счёт после GA.</li>
<li><strong>Игнорирование delegated auth</strong> → агент «видит всё» или ничего.</li>
<li><strong>Ожидание мгновенного ROI</strong> при <strong>45%</strong> сотрудников, предпочитающих не менять способ работы (WTI 2026).</li>
</ul>
<p>Microsoft Inside Track советует: <em>«Treat the technology as infrastructure, not a feature… Use Work IQ to move from assistance to action with agents.»</em> — <a href="https://www.microsoft.com/insidetrack/blog/how-work-iq-is-supercharging-our-ai-usage-at-microsoft/">Inside Track</a></p>
<hr>
<h2>Россия и SMB: если нет полного M365 Copilot</h2>
<h3>RAG + Make/n8n + Telegram как альтернатива</h3>
<p>На <strong>microsoft.com/ru-ru</strong> для <strong>Copilot Business</strong> указано: продукт <strong>недоступен для вашей страны</strong> — <a href="https://www.microsoft.com/ru-ru/microsoft-365/copilot/business">Microsoft 365 Copilot RU</a>. Корпоративный доступ часто идёт через зарубежные юрлица и реселлеров — правовая «серая зона», не официальный канал Microsoft РФ (<a href="https://gptmag.ru/microsoft-copilot-pro-2-may-2026/">GPTmag</a>, <a href="https://korusconsulting.ru/infohub/microsoft-copilot/">Korus Consulting</a>).</p>
<p><strong>Два трека для РФ:</strong></p>
<table>
<thead>
<tr>
<th>Трек</th>
<th>Для кого</th>
<th>Стек</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>A</strong></td>
<td>Tenant M365 за рубежом, compliance OK</td>
<td>Work IQ API по правилам Microsoft + Agent 365</td>
</tr>
<tr>
<td><strong>B</strong></td>
<td><strong>Контур без Copilot SKU</strong></td>
<td>RAG + <strong>make com автоматизация</strong> / <strong>n8n ai агент</strong> + Telegram / Яндекс 360 / 1С</td>
</tr>
</tbody>
</table>
<p>Принципы те же, что у Work IQ: <strong>ограниченный набор tools</strong>, progressive disclosure, FinOps-лимиты. Русскоязычные гайды по Make+MCP: <a href="https://mayai.ru/make-com-i-mcp-kak-vnedrit-agentov-dlya-avtomatizaczii-kontenta/">mayai.ru</a> — без привязки к Work IQ как эталону «почта+файлы+календарь».</p>
<h3>Свой «Work IQ» на открытых API</h3>
<p><strong>Корпоративный ai ассистент</strong> для SMB можно собрать без E7:</p>
<ol>
<li><strong>Контекст:</strong> почта (IMAP/API), диск, CRM, мессенджер.</li>
<li><strong>Оркестратор:</strong> Make или n8n с MCP Toolboxes.</li>
<li><strong>Модель:</strong> облачная или on-prem RAG.</li>
<li><strong>Governance:</strong> лимиты вызовов, логи, роли — аналог admin center Credits.</li>
</ol>
<p>Связка с <strong>чат бот для бизнеса</strong> (родовой спрос ~21 500 показов в примерах Search API): чатбот отвечает; <strong>цифровой сотрудник</strong> — отвечает <strong>и действует</strong>.</p>
<hr>
<h2>Сравнение с тем, что делает Nero Network</h2>
<p><strong>Угол страницы (не KPMG/Claude):</strong> Microsoft выкатила <strong>Work IQ</strong> для M365; Nero Network помогает <strong>собрать паритет</strong> для вашего контура — MCP, Make/n8n, обучение, <strong>автоматизация бизнеса нейросети</strong> без «зоопарка» API.</p>
<h3>Внедрение под ключ: MCP, обучение, Make</h3>
<p>Услуги интегратора закрывают пробелы официальной документации:</p>
<ul>
<li>Матрица <strong>A2A / MCP / REST</strong> под ваш стек.</li>
<li><strong>TCO:</strong> Credits + Agent 365 + Copilot vs фиксированный проект «свой контур».</li>
<li><strong>Чеклист к 16.06.2026:</strong> preview → GA, лимиты в admin center, первый агент в Studio или Foundry.</li>
<li>Обучение владельцев агентов (организационные <strong>67%</strong> успеха по WTI).</li>
</ul>
<h3>Чеклист перед заявкой</h3>
<ul>
<li>[ ] Есть tenant M365 или осознанный трек B (без Copilot SKU)?</li>
<li>[ ] Выбран первый сценарий (один процесс, не «весь отдел»)?</li>
<li>[ ] Посчитаны Credits (light/medium/heavy + 0,1/tool)?</li>
<li>[ ] Назначены владелец процесса и ИТ (delegated auth, labels)?</li>
<li>[ ] План пилота 4–8 недель с метрикой?</li>
</ul>
<hr>
<h2>FAQ</h2>
<p><strong>Что такое Work IQ API?</strong><br>
Набор API Microsoft (Chat, Context, Tools, Workspaces) для агентов с доступом к данным и действиям в M365 под Entra ID и политиками compliance.</p>
<p><strong>Когда выходит Work IQ API в GA?</strong><br>
<strong>16 июня 2026</strong> (анонс 2 июня 2026).</p>
<p><strong>Сколько стоят Copilot Credits за вызов агента?</strong><br>
Tools: <strong>0,1 credit</strong> за вызов. Chat/Context: ориентир <strong>$0,20–$1,50</strong> за вызов в зависимости от light/medium/heavy — <a href="https://www.microsoft.com/en-us/licensing/news/work-iq-general-availability">licensing news</a>.</p>
<p><strong>Чем MCP в Work IQ отличается от обычного REST?</strong><br>
MCP даёт <strong>10 универсальных tools</strong> с progressive disclosure; REST — классический request/response для сервисов (часть REST — «coming soon» на момент 03.06.2026).</p>
<p><strong>Можно ли внедрить AI-агентов без Microsoft 365 E5?</strong><br>
Да: прямые вызовы Work IQ API тарифицируются <strong>Credits</strong>, не обязательно E7. <strong>Agent 365</strong> ($15/user) — опциональный control plane. MCP в <strong>Copilot Studio</strong> требует <strong>M365 Copilot</strong> на пользователя.</p>
<p><strong>Как связаны Copilot Studio и Work IQ?</strong><br>
Studio — low-code агенты; Work IQ — контекст и tools. MCP-серверы Work IQ в Studio требуют лицензию Copilot; кастомные агенты через API — consumption по Credits.</p>
<p><strong>Что такое цифровой сотрудник в 2026 году?</strong><br>
AI-агент с <strong>контекстом организации</strong> и <strong>правом действий</strong> (не только чат), под governance ИТ.</p>
<p><strong>Безопасно ли давать агенту доступ к почте и файлам?</strong><br>
При <strong>delegated auth</strong> агент видит только то, что разрешено пользователю; app-only не поддерживается; применяются sensitivity labels — <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/extensibility/work-iq/api-overview">API overview</a>.</p>
<hr>
<p><strong>Итог:</strong> Work IQ API — инфоповод июня 2026 и практический стандарт <strong>корпоративных агентов в M365</strong>. Для <strong>внедрения искусственного интеллекта</strong> в компании с GA <strong>16.06</strong> успейте пилот, FinOps по Credits и governance; в РФ — либо легальный tenant M365, либо <strong>паритетный контур</strong> на Make/n8n + RAG. Nero Network помогает пройти путь без «зоопарка» интеграций — от аудита до первого <strong>цифрового сотрудника</strong> с измеримым KPI.</p></div></section>
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
echo wp_json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'Microsoft Work IQ API: как внедрить AI-агентов в Microsoft 365 с MCP',
    'description' => $page_seo_description,
    'author' => ['@type' => 'Organization', 'name' => 'Nero Network'],
    'datePublished' => '2026-06-04',
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => get_permalink()],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
</script>
<script type="application/ld+json">
<?php
echo wp_json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Что такое Work IQ API?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Набор API Microsoft (Chat, Context, Tools, Workspaces) для агентов с доступом к данным и действиям в M365 под Entra ID и политиками compliance.']],
        ['@type' => 'Question', 'name' => 'Когда выходит Work IQ API в GA?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => '16 июня 2026 (анонс 2 июня 2026).']],
        ['@type' => 'Question', 'name' => 'Сколько стоят Copilot Credits за вызов агента?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Tools: 0,1 credit за вызов. Chat/Context: ориентир $0,20–$1,50 за вызов в зависимости от light/medium/heavy.']],
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
</script>

<?php get_footer(); ?>
