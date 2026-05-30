<?php
/**
 * Template Name: Tokenmaxxing — контроль расходов на AI-токены
 */
$page_seo_title = 'Tokenmaxxing: контроль расходов на AI-токены в бизнесе';
$page_seo_description = 'Uber и Microsoft режут AI-бюджеты: что такое tokenmaxxing, как ввести квоты на токены, маршрутизацию LLM и измеримый ROI. TokenOps, FinOps и практика без перерасхода.';

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

require_once __DIR__ . '/nero-ai-header.php';
nero_ai_header_register();

get_header();
nero_ai_header_render();
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
 *   `.kontrol-rashodov-ai-tokenov-tokenmaxxing-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #059669;
    --ym-accent: #6366f1;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(5, 150, 105, 0.15);
}

.kontrol-rashodov-ai-tokenov-tokenmaxxing-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h1,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h2,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h3,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h4,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h5,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page p,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page li,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page strong,
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.kontrol-rashodov-ai-tokenov-tokenmaxxing-page pre, .kontrol-rashodov-ai-tokenov-tokenmaxxing-page code {
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
    background: radial-gradient(circle, rgba(5, 150, 105,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(5, 150, 105, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(5, 150, 105, 0.2);
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
    background: linear-gradient(90deg, #059669, #059669);
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
    box-shadow: 0 5px 15px rgba(5, 150, 105,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(5, 150, 105, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(5, 150, 105, 0.5);
    background: #059669;
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
    border-color: rgba(5, 150, 105, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(5, 150, 105, 0.05);
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
#hero-tokenops.hero-enterprise-gateway {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
  padding-top: clamp(80px, 11vh, 120px);
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
}
.hero-enterprise-gateway .hero-layout {
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
.hero-enterprise-gateway .hero-content-col {
  display: flex;
  flex-direction: column;
  gap: clamp(16px, 2.5vh, 24px);
  min-width: 0;
}
.hero-enterprise-gateway .hero-visual-col {
  position: relative;
  min-height: min(480px, 52vh);
  border-radius: 24px;
  overflow: hidden;
  background: linear-gradient(145deg, rgba(255,255,255,0.92) 0%, rgba(238,242,255,0.85) 100%);
  border: 1px solid #e2e8f0;
  box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}
.hero-enterprise-gateway .hero-visual-col .hero-grid-bg {
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
.hero-enterprise-gateway .hero-copy-block,
.hero-enterprise-gateway .vl-ui-tasks,
.hero-enterprise-gateway .vl-ui-pill {
  position: relative;
  left: auto;
  right: auto;
  top: auto;
  bottom: auto;
  max-width: 100%;
  transform: none;
}
.hero-enterprise-gateway .hero-copy-block { z-index: auto; }
@media (max-width: 900px) {
  #hero-tokenops.hero-enterprise-gateway {
    min-height: auto;
    padding-top: clamp(88px, 14vw, 112px);
  }
  .hero-enterprise-gateway .hero-layout {
    grid-template-columns: 1fr;
    gap: 20px;
    padding-bottom: 32px;
  }
  .hero-enterprise-gateway .hero-visual-col {
    order: 2;
    min-height: min(280px, 38vh);
  }
  .hero-enterprise-gateway .hero-content-col { order: 1; }
}
.kontrol-rashodov-intro-section { padding: 72px 0 40px; }
.kontrol-rashodov-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr);
  gap: 32px 40px;
  align-items: start;
}
.kontrol-rashodov-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #059669, #6366f1) 1;
  padding-left: 24px;
}
.kontrol-rashodov-intro-text p {
  text-align: left !important;
  font-size: 1.05rem;
  line-height: 1.65;
  margin: 0 0 14px;
}
.kontrol-rashodov-intro-lead { font-size: 1.12rem !important; color: #0f172a !important; }
.kontrol-rashodov-intro-deco { min-width: 0; }
.kontrol-rashodov-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.kontrol-rashodov-kpi-chips span {
  padding: 8px 14px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  background: #fff;
  border: 1px solid #e2e8f0;
  color: #334155 !important;
}
.ym-toc-wrap { padding: 8px 0 48px; text-align: center; }
.ym-prose { max-width: 900px; margin: 0 auto; }
.ym-prose h3 { font-size: 1.35rem; font-weight: 700; margin: 32px 0 12px; color: #0f172a !important; }
.ym-prose h4 { font-size: 1.1rem; font-weight: 700; margin: 24px 0 10px; }
.ym-prose p, .ym-prose li { line-height: 1.65; }
.ym-prose table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 0.95rem; }
.ym-prose table th, .ym-prose table td {
  border: 1px solid #e2e8f0;
  padding: 10px 12px;
  text-align: left;
}
.ym-prose table th { background: #f1f5f9; font-weight: 700; }
.ym-prose pre {
  background: #0f172a;
  color: #e2e8f0;
  padding: 16px 20px;
  border-radius: 12px;
  overflow-x: auto;
}
.ym-prose a { color: #6366f1; }
.article-cta { margin: clamp(28px, 4vw, 40px) 0; padding: clamp(20px, 3vw, 28px); border-radius: 16px; border: 1px solid rgba(15, 23, 42, 0.08); background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%); box-shadow: var(--ym-shadow-sm); }
.article-cta--secondary { background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%); }
.article-cta__eyebrow { margin: 0 0 8px; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #059669; }
.article-cta__title { margin: 0 0 10px; font-size: clamp(20px, 2.4vw, 24px); line-height: 1.25; color: #0f172a !important; }
.article-cta__text { margin: 0 0 16px; color: #475569 !important; line-height: 1.6; }
.article-cta__button, .article-cta__link { display: inline-flex; align-items: center; padding: 12px 18px; border-radius: 999px; background: #0f172a; color: #fff !important; font-weight: 700; text-decoration: none; }
.article-cta__link { background: #6366f1; }
.article-cta__button:hover, .article-cta__link:hover { opacity: 0.92; }
.article-cta-note { margin: clamp(24px, 3vw, 32px) 0; padding: 14px 18px; border-left: 4px solid #6366f1; background: #f8fafc; color: #334155 !important; }
@media (max-width: 900px) {
  .kontrol-rashodov-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main kontrol-rashodov-ai-tokenov-tokenmaxxing-page" role="main" tabindex="-1">
<section id="hero-tokenops" class="hero-enterprise-gateway fullscreen-white-office tokops-hero" aria-label="Tokenmaxxing и контроль AI-бюджета">
<style>
  .hero-enterprise-gateway.fullscreen-white-office {
    position: relative;
    overflow: hidden;
    min-height: 100vh;
    width: 100%;
    background: linear-gradient(165deg, #ffffff 0%, #f8fafc 45%, #eef2ff 100%);
    font-family: Inter, system-ui, -apple-system, sans-serif;
  }
  .hero-enterprise-gateway .hero-copy-block { max-width: 100%; }
  .hero-enterprise-gateway .giant-seo {
    font-size: clamp(32px, 4.8vw, 68px);
    font-weight: 900;
    line-height: 1.08;
    letter-spacing: -2px;
    color: #0f172a;
    margin: 0;
  }
  .hero-enterprise-gateway .giant-seo span {
    display: block;
    background: linear-gradient(90deg, #059669, #6366f1);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .hero-enterprise-gateway .giant-seo-sub {
    font-size: clamp(15px, 1.9vw, 21px);
    line-height: 1.55;
    color: rgba(15, 23, 42, 0.72);
    margin-top: 18px;
    max-width: 680px;
  }
  .hero-enterprise-gateway .telegram-button {
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
    box-shadow: 0 6px 20px rgba(15, 23, 42, 0.12);
  }
  .hero-enterprise-gateway .telegram-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(15, 23, 42, 0.18);
  }
  .hero-enterprise-gateway .vl-ui-tasks {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .hero-enterprise-gateway .vl-ui-task {
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
  .hero-enterprise-gateway .vl-ui-task span {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #059669, #6366f1);
    color: #fff;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
    flex-shrink: 0;
  }
  .hero-enterprise-gateway .vl-ui-pill {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 10px;
  }
  .hero-enterprise-gateway .vl-ui-pill span {
    padding: 9px 16px;
    background: rgba(255, 255, 255, 0.94);
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
    color: #334155;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }
</style>

  <div class="hero-layout">
    <div class="hero-content-col">
      <div class="vl-ui-tasks" role="list" aria-label="Этапы TokenOps">
        <div class="vl-ui-task" role="listitem"><span>1</span> Аудит токенов и ключей</div>
        <div class="vl-ui-task" role="listitem"><span>2</span> Квоты и LLM gateway</div>
        <div class="vl-ui-task" role="listitem"><span>3</span> Маршрутизация моделей</div>
        <div class="vl-ui-task" role="listitem"><span>4</span> Cost-per-outcome</div>
        <div class="vl-ui-task" role="listitem"><span>5</span> Пилот без лидербордов</div>
      </div>

      <div class="hero-copy-block">
        <h1 class="giant-seo">Tokenmaxxing и кризис AI-бюджетов: <span>как бизнесу контролировать расходы на нейросети</span> и не сжечь годовой лимит за квартал</h1>
        <p class="giant-seo-sub">Uber и Microsoft уже режут доступ к дорогим моделям — покажем, как внедрить AI-агентов с лимитами, маршрутизацией и измеримым результатом</p>
        <a class="telegram-button" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Обсудить аудит TokenOps в Telegram</a>
      </div>

      <div class="vl-ui-pill" aria-label="Теги темы">
        <span>TokenOps</span>
        <span>AI FinOps</span>
        <span>LLM gateway</span>
        <span>Make / n8n</span>
      </div>
    </div>

    <div class="hero-visual-col" aria-label="Анимация: TokenOps и контроль AI-бюджета">
      <div class="hero-grid-bg" aria-hidden="true"></div>
      <canvas id="hero-tokenops-canvas" role="img" aria-label="Анимация: TokenOps и контроль AI-бюджета"></canvas>
    </div>
  </div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("hero-tokenops-canvas");
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
    meterRing: "#e2e8f0",
    burn: "#f97316",
    danger: "#ef4444",
    safe: "#10b981",
    cheap: "#38bdf8",
    costly: "#a78bfa",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    tokenPkt: "#fef3c7",
    shadow: "#94a3b8"
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

  class TokenStreamArc {
    constructor(ox, oy, radius) {
      this.ox = ox;
      this.oy = oy;
      this.radius = radius;
    }
    pointAt(t) {
      const a = -Math.PI * 0.92 + t * Math.PI * 1.05;
      return {
        x: this.ox + Math.cos(a) * this.radius,
        y: this.oy + Math.sin(a) * this.radius * 0.55,
        a
      };
    }
    draw(ctx) {
      ctx.save();
      ctx.lineWidth = 3;
      ctx.strokeStyle = "rgba(99, 102, 241, 0.35)";
      ctx.setLineDash([10, 12]);
      const dashOff = (frame * 0.6) % 22;
      ctx.lineDashOffset = -dashOff;
      ctx.beginPath();
      for (let i = 0; i <= 32; i++) {
        const p = this.pointAt(i / 32);
        if (i === 0) ctx.moveTo(p.x, p.y);
        else ctx.lineTo(p.x, p.y);
      }
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.restore();

      const prg = (frame * 0.035) % 220;
      const colors = [C.tokenPkt, C.cheap, C.costly, C.shadow];
      for (let n = 0; n < 4; n++) {
        let t = ((frame * 0.018 + n * 0.22) % 1);
        if (prg > 130) t = Math.min(t, 0.55 + (prg - 130) / 200);
        const p = this.pointAt(t);
        drawPolyRound(ctx, p.x - 8, p.y - 8, 16, 16, 3, colors[n], C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("T", p.x, p.y + 3);
      }
    }
  }

  class RouteFork {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, active) {
      if (!active) return;
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(-30, 10);
      ctx.lineTo(0, -18);
      ctx.lineTo(30, 10);
      ctx.stroke();
      drawPolyRound(ctx, -48, 8, 36, 14, 3, C.cheap, C.outline);
      drawPolyRound(ctx, 12, 8, 36, 14, 3, C.costly, C.outline);
      ctx.font = "bold 7px sans-serif";
      ctx.fillStyle = C.outline;
      ctx.textAlign = "center";
      ctx.fillText("Haiku", -30, 18);
      ctx.fillText("Opus", 30, 18);
      ctx.restore();
    }
  }

  class KilledLeaderboard {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, prg) {
      const fade = prg < 75 ? 1 : Math.max(0, 1 - (prg - 75) / 25);
      if (fade <= 0.02) return;
      ctx.save();
      ctx.globalAlpha = fade;
      drawPolyRound(ctx, this.x, this.y, 110, 52, 6, "#fff7ed", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("KiroRank / Claudeonomics", this.x + 8, this.y + 14);
      for (let i = 0; i < 3; i++) {
        drawPolyRound(ctx, this.x + 8, this.y + 20 + i * 10, 70, 6, 2, "#fed7aa", null);
      }
      if (prg > 55) {
        ctx.strokeStyle = C.danger;
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.moveTo(this.x + 4, this.y + 8);
        ctx.lineTo(this.x + 106, this.y + 44);
        ctx.stroke();
      }
      ctx.restore();
    }
  }

  class PooledCreditsBasin {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, level) {
      drawPolyRound(ctx, this.x, this.y, 90, 36, 8, "#f1f5f9", C.outline);
      drawPolyRound(ctx, this.x + 6, this.y + 36 - level, 78, level, 4, C.safe, null);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("pooled credits", this.x + 45, this.y + 14);
    }
  }

  class TokenQuotaMeter {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.outcomePulse = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.035) % 220;
      let burn = Math.min(1, prg / 90);
      if (prg > 90 && prg < 150) burn = 0.92 - (prg - 90) * 0.004;
      if (prg >= 150) burn = Math.max(0.35, 0.85 - (prg - 150) * 0.02);

      const r = 72;
      ctx.lineWidth = 10;
      ctx.strokeStyle = C.meterRing;
      ctx.beginPath();
      ctx.arc(this.x, this.y, r, 0, Math.PI * 2);
      ctx.stroke();

      const col = burn > 0.82 ? C.danger : burn > 0.55 ? C.burn : C.safe;
      ctx.strokeStyle = col;
      ctx.beginPath();
      ctx.arc(this.x, this.y, r, -Math.PI / 2, -Math.PI / 2 + burn * Math.PI * 2);
      ctx.stroke();

      drawPolyRound(ctx, this.x - 55, this.y - 38, 110, 76, 10, "#ffffff", C.outline);
      ctx.fillStyle = C.outline;
      ctx.textAlign = "center";
      ctx.font = "bold 11px sans-serif";
      if (prg < 70) ctx.fillText("BURN: " + Math.round(burn * 100) + "%", this.x, this.y - 6);
      else if (prg < 150) ctx.fillText("ROUTING ON", this.x, this.y - 6);
      else {
        this.outcomePulse = Math.sin(frame * 0.12) * 4;
        ctx.fillStyle = C.safe;
        ctx.font = "bold 12px sans-serif";
        ctx.fillText("OUTCOME ✓", this.x, this.y - 6 + this.outcomePulse);
      }
      ctx.font = "8px sans-serif";
      ctx.fillStyle = "#64748b";
      ctx.fillText("годовой лимит / квартал", this.x, this.y + 12);

      if (prg >= 165 && prg < 195) {
        ctx.save();
        const a = 1 - Math.abs(prg - 180) / 15;
        ctx.globalAlpha = Math.max(0, a);
        ctx.strokeStyle = C.safe;
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(this.x, this.y, r + 14 + this.outcomePulse, 0, Math.PI * 2);
        ctx.stroke();
        ctx.restore();
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
      const prg = (frame * 0.035) % 220;
      const targetX = -20 + (this.stepTrig % 3) * 18;
      const targetY = -95 + Math.floor(this.stepTrig / 60) * 8;

      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const localPrg = prg - this.stepTrig;
        if (localPrg < 12) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          const t = localPrg / 12;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (localPrg < 18) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          const t = (localPrg - 18) / 10;
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
        carryType = prg >= this.stepTrig - 8 ? this.color : null;
      }

      if (!isMoving) {
        const wave = Math.sin(frame * 0.04 + this.baseX * 0.01) * 6;
        if (Math.abs(wave) > 5) this.hitAnimation = wave;
        else this.hitAnimation = 0;
        if (frame % 220 === Math.floor(this.stepTrig) && Math.random() < 0.35) {
          const rnd = this.dialogs[Math.floor(Math.random() * this.dialogs.length)];
          createBubble(this.x, this.y - 24, rnd, 260);
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
        ctx.fillRect(hx - 8, hy - 10, 16, 10);
        if (this.hitAnimation) {
          ctx.strokeStyle = C.outline;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.moveTo(12, 0);
          ctx.lineTo(22, -8 + this.hitAnimation);
          ctx.stroke();
        }
      } else if (this.role === "4_designer") {
        drawPolyRound(ctx, hx - 10, hy - 12, 20, 6, 3, "#f43f5e", C.outline);
      } else if (this.role === "5_deployer") {
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.arc(hx, hy, 14, Math.PI, Math.PI * 2);
        ctx.stroke();
      }
      ctx.restore();

      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 14, 14, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const stream = new TokenStreamArc(-120, 50, 280);
  const meter = new TokenQuotaMeter(0, -70);
  const fork = new RouteFork(-40, -10);
  const board = new KilledLeaderboard(200, -120);
  const pool = new PooledCreditsBasin(-220, 30);

  entities.push(stream);
  entities.push(pool);
  entities.push(board);
  entities.push(meter);
  entities.push(fork);
  entities.push(new Agent(-260, 80, C.agentYellow, "1_architect", 18, [
    "Снимаю baseline…",
    "Где теневые ключи?",
    "FinOps-карта готова"
  ]));
  entities.push(new Agent(-150, 120, C.agentGreen, "2_seo", 52, [
    "Теги по командам",
    "Chargeback на отдел",
    "Showback в дашборд"
  ]));
  entities.push(new Agent(-40, 95, C.agentBlue, "3_coder", 88, [
    "LiteLLM: cap 80%",
    "Дешёвая модель — рутина",
    "Gateway без сюрпризов"
  ]));
  entities.push(new Agent(90, 110, C.agentPink, "4_designer", 124, [
    "Квота на агентов",
    "Pooled credits ОК",
    "Tier для support"
  ]));
  entities.push(new Agent(200, 75, C.agentPurple, "5_deployer", 162, [
    "Алерт: лимит 100%",
    "Стоп runaway n8n",
    "Outcome, не токены!"
  ]));

  function createBubble(x, y, text, customLife = 300) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function drawAmbientParticles(ctx) {
    const prg = (frame * 0.035) % 220;
    if (prg < 40) return;
    for (let i = 0; i < 6; i++) {
      const px = -280 + ((frame * 0.2 + i * 40) % 560);
      const py = 60 + Math.sin(frame * 0.05 + i) * 20;
      ctx.globalAlpha = 0.25;
      drawPolyRound(ctx, px, py, 6, 6, 2, C.shadow, null);
      ctx.globalAlpha = 1;
    }
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    const prg = (frame * 0.035) % 220;

    const agents = entities.filter((e) => e.role);
    agents.sort((a, b) => a.y - b.y);
    stream.draw(ctx);
    pool.draw(ctx, 12 + Math.min(22, prg * 0.12));
    board.draw(ctx, prg);
    meter.draw(ctx);
    fork.draw(ctx, prg >= 72 && prg < 165);
    agents.forEach((e) => e.draw(ctx));

    drawAmbientParticles(ctx);

    if (prg >= 16 && prg < 16.08) createBubble(-260, 40, "1. Аудит расходов");
    if (prg >= 54 && prg < 54.08) createBubble(-150, 80, "2. Атрибуция");
    if (prg >= 90 && prg < 90.08) createBubble(-40, 60, "3. Routing LLM");
    if (prg >= 126 && prg < 126.08) createBubble(90, 70, "4. Квоты");
    if (prg >= 164 && prg < 164.08) createBubble(200, 30, "5. Cap & outcome");
    if (prg >= 178 && prg < 178.08) createBubble(0, -140, "Tokenmaxxing OFF");

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

<section class="ym-section kontrol-rashodov-intro-section reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="kontrol-rashodov-intro-grid">
      <div class="kontrol-rashodov-intro-text">
        <p class="kontrol-rashodov-intro-lead"><strong>Коротко:</strong> в конце мая 2026 крупнейшие компании США перешли от «безлимитного ИИ» к жёсткому <strong>контролю расходов на нейросети</strong> — квотам, маршрутизации моделей и метрикам результата, а не сырым токенам.</p>
        <p>Ниже — что такое <strong>tokenmaxxing</strong>, как устроены <strong>AI FinOps</strong> и <strong>TokenOps</strong>, и пошаговый план внедрения <strong>лимитов на нейросети</strong> с измеримым ROI — без выдуманных цифр.</p>
      </div>
      <div class="kontrol-rashodov-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">tokenops-cli · baseline</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> finops scan --keys all</div>
            <div><span class="ym-comment"># Uber: бюджет coding tools → апрель</span></div>
            <div><span class="ym-command">$</span> gateway route --tier haiku</div>
            <div><span class="ym-comment"># pooled credits · cap 80%</span></div>
            <div><span class="ym-command">$</span> metric outcome --not tokens</div>
          </div>
        </div>
        <div class="kontrol-rashodov-kpi-chips" aria-label="Ключевые метрики">
          <span>TokenOps</span><span>~18% → shipped</span><span>Copilot 01.06.2026</span><span>LiteLLM gateway</span>
        </div>
      </div>
    </div>
  </div>
</section>


<div class="ym-toc-wrap reveal delay-100">
  <div class="ym-container">
    <nav class="ym-toc" aria-label="Оглавление"><a href="#tokenmaxxing-novost">Tokenmaxxing и новость дня: почему корпорации режут AI-бюджеты</a><a href="#skolko-stoyat-tokeny-2026">Сколько стоят токены в 2026: от чата к агентам</a><a href="#ai-finops-tokenops">AI FinOps и TokenOps: дисциплина вместо «сжигания токенов ради KPI»</a><a href="#governance-limity">Governance: лимиты, роли и pooled credits</a><a href="#tekhnicheskaya-ekonomika">Техническая экономика: маршрутизация моделей и LLM gateway</a><a href="#roi-metriki">ROI и метрики: от токенов к cost-per-outcome</a><a href="#poshagovyj-plan">Пошаговый план внедрения с лимитами</a><a href="#faq">FAQ</a></nav>
  </div>
</div>

<section id="tokenmaxxing-novost" class="ym-section reveal"><div class="ym-container"><h2 class="ym-section-title">Tokenmaxxing и новость дня: почему корпорации режут AI-бюджеты</h2><div class="ym-prose reveal delay-100"><p><strong>Определение (контекст 29.05.2026):</strong> корпоративная Америка вошла в фазу <strong>«рационирования AI»</strong> — компании исчерпывают годовые бюджеты на нейросети за квартал, ограничивают доступ к дорогим моделям и переводят сотрудников на более дешёвые внутренние инструменты. Об этом, со ссылкой на <strong>Wall Street Journal</strong>, пишет сводка <strong>News18</strong> от 29 мая 2026: среди примеров — <strong>Uber</strong>, <strong>Meta</strong>, <strong>Microsoft</strong>, <strong>Salesforce</strong>, <strong>DoorDash</strong> и другие игроки, которые ужесточают контроль <strong>расходов на AI-токены</strong> (<a href="https://www.news18.com/world/corporate-america-is-starting-to-ration-ai-as-costs-explode-despite-the-boom-whats-happening-ws-el-10120040.html">News18</a>).</p>
<p>В том же нарративе фигурирует масштаб индустрии: <strong>Google</strong> обрабатывает <strong>3,2 квадриллиона</strong> токенов в месяц — примерно в <strong>7 раз</strong> больше, чем год назад (по данным WSJ, пересказ News18). Это не абстрактная статистика: она показывает, почему <strong>управление расходами на токены</strong> стало задачей уровня CFO, а не только IT.</p>
<p>Русскоязычная аудитория получила тот же инфоповод 29.05.2026 через <strong>Habr</strong>, <strong>mentoday.ru</strong> и отраслевые пересказы <strong>Axios</strong> — в том числе кейс enterprise-клиента без лимитов на Claude (<a href="https://habr.com/ru/news/1041104/">Habr</a>).</p>
<h3>Что такое tokenmaxxing и чем он отличается от продуктивности</h3>
<p><strong>Tokenmaxxing</strong> в медиа май 2026 — это <strong>максимизация потребления токенов</strong> как суррогат продуктивности: лидерборды, KPI и внутренняя «гонка» без связи с бизнес-результатом. Термин закрепился в материале <strong>Axios</strong> от 28.05.2026 о корпоративных расходах и ROI (<a href="https://www.axios.com/2026/05/28/ai-spending-roi-enterprise-costs">Axios</a>).</p>
<p><strong>Важно развести два смысла:</strong></p>
<table>
<thead>
<tr>
<th>Смысл</th>
<th>Суть</th>
<th>Пример</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Вредный tokenmaxxing</strong></td>
<td>Больше токенов ≠ больше ценности; метрика подменяет outcome</td>
<td>Лидерборды Amazon <strong>KiroRank</strong>, Meta <strong>Claudeonomics</strong></td>
</tr>
<tr>
<td><strong>Полезная «эффективность токена»</strong></td>
<td>Минимум токенов при максимуме результата</td>
<td>Подход <strong>TechTarget</strong> / CIO: governance и tiering моделей (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>)</td>
</tr>
</tbody>
</table>
<p>CEO <strong>Micro1</strong> <strong>Ali Ansari</strong> (цитата Axios) описывает происходящее как «healthy swing» — здоровый откат <strong>от</strong> AI overuse и tokenmaxxing. <strong>Sophia Velastegui</strong> (ex-CAO Microsoft, Axios/News18) предупреждает: люди автоматизируют <strong>неприятные</strong>, а не <strong>самые ценные</strong> для компании задачи — подход «тысячи цветов» не даёт ROI. <strong>Anuj Kapur</strong> (CEO CloudBees, Axios) добавляет: компании ссылаются на AI при сокращениях, но <strong>не могут</strong> показать, что нейросети окупают счета (<a href="https://www.axios.com/2026/05/28/ai-spending-roi-enterprise-costs">Axios</a>).</p>
<p><strong>Итог:</strong> контроль расходов на нейросети — это не «запретить ИИ», а перестать платить за <strong>активность</strong> вместо <strong>результата</strong>.</p>
<h3>Кейсы 29.05.2026: Uber, Microsoft, Meta, Amazon и «гонка токенов»</h3>
<p><strong>Кейс $500 млн за месяц (без лимитов).</strong> По <strong>Axios</strong>, консультант по AI сообщил: один enterprise-клиент потратил <strong>$500 млн за один месяц</strong> на Claude из‑за отсутствия spending caps и usage limits; рост связан с неограниченным доступом, длинными контекстами и агентными цепочками. <strong>Отрасль клиента и детали агентов в первоисточнике не раскрыты</strong> — в управленческих решениях опирайтесь на механику (лимиты, атрибуция), а не на домыслы (<a href="https://www.axios.com/2026/05/28/ai-spending-roi-enterprise-costs">Axios</a>; <a href="https://habr.com/ru/news/1041104/">Habr</a>).</p>
<p><strong>Uber и Claude Code.</strong> CTO Uber <strong>Praveen Neppalli Naga</strong> (The Information, цитируется Habr): годовой AI-бюджет на coding tools <strong>исчерпан к апрелю 2026</strong>; доля инженеров на agentic-функциях Claude Code выросла <strong>с 32% (февраль) до 84% (март)</strong>; около <strong>5 000</strong> инженеров получили доступ с декабря 2025. В медиа фигурируют диапазоны <strong>$500–$2 000/мес на инженера</strong> по API; у Naga в пересказах — <strong>$1 200 за 2 часа</strong> на демо (вторичные источники, The Information). COO Uber <strong>Andrew MacDonald</strong> (май 2026): связь «больше токенов → больше продуктивности» <strong>пока не доказана</strong> (<a href="https://habr.com/ru/news/1041104/">Habr</a>; <a href="https://africa.businessinsider.com/news/the-tokenmaxxing-backlash-has-begun/7hgmfxb">Business Insider Africa</a>).</p>
<p><strong>Microsoft.</strong> <strong>The Verge</strong> (14.05.2026): Microsoft сворачивает большую часть внутренних лицензий <strong>Claude Code</strong> в Experiences + Devices к <strong>30.06.2026</strong> (конец FY), направляет на <strong>GitHub Copilot CLI</strong>; официально — консолидация toolchain, неофициально — срез OPEX на token-based billing (<a href="https://www.theverge.com/tech/930447/microsoft-claude-code-discontinued-notepad">The Verge</a>).</p>
<p><strong>Amazon.</strong> По пересказам <strong>Financial Times</strong> (май 2026): внутренний лидерборд <strong>KiroRank</strong> на платформе <strong>Kiro</strong> снят после tokenmaxxing — накручивания AI-активности; фокус смещён на <strong>«normalised deployments»</strong> (полезный деплой, не сырой объём токенов). SVP <strong>Dave Treadwell</strong>: <em>«Please don't use AI just for the sake of using AI.»</em> (<a href="https://www.firstpost.com/tech/amazon-no-longer-tracks-employees-ai-activity-following-takenmaxxing-concerns-14016590.html">Firstpost</a>). В контексте adoption Amazon целится в <strong>&gt;80%</strong> разработчиков с еженедельным использованием AI — давление на внедрение остаётся, но метрика меняется (<a href="https://the-decoder.com/tokenmaxxing-spreads-at-amazon-as-employees-game-internal-ai-leaderboards/">The Decoder</a>).</p>
<p><strong>Meta.</strong> <strong>The Information</strong> (апрель 2026, вторично): лидерборд <strong>Claudeonomics</strong> — <strong>60 трлн токенов за 30 дней</strong>, топ-пользователь ~<strong>281 млрд токенов/день</strong>; закрыт после утечки. CTO Meta <strong>Andrew Bosworth</strong> (вторичные цитаты): при <strong>10×</strong> продуктивности расход <strong>$500K</strong> на токены может быть оправдан; формально performance reviews завязаны на <strong>«AI-driven impact»</strong>, не на сырой объём (<a href="https://www.trendingtopics.eu/tokenmaxxing-every-unnecessary-token-generated-is-a-direct-tax-on-productivity/">Trending Topics</a>).</p>
<p><strong>Коротко:</strong> гиганты показали анти-паттерн — <strong>лидерборды по токенам</strong>. Среднему бизнесу нужен другой стандарт: <strong>cost-per-outcome</strong>, а не cost-per-token.</p>
<hr /></div></div></section>
<section id="skolko-stoyat-tokeny-2026" class="ym-section ym-section-alt reveal"><div class="ym-container"><h2 class="ym-section-title">Сколько стоят токены в 2026: от чата к агентам</h2><div class="ym-prose reveal delay-100"><p><strong>Определение:</strong> <strong>расходы на AI-токены в бизнесе</strong> — это не только подписки ChatGPT Enterprise или Claude Team. Это API-вызовы, агентные цепочки, Copilot-сессии, сценарии <strong>Make</strong>/<strong>n8n</strong> с LLM-нодами и «теневые» ключи сотрудников.</p>
<h3>Почему агентный ИИ разгоняет счёт сильнее Copilot-чата</h3>
<p><strong>Axios</strong> и отраслевые эксперты фиксируют: агентные workflow и auto-escalation <strong>умножают</strong> счёт; enterprise-планы <strong>не «all you can eat»</strong>; типичный перерасход — простые запросы (например, погода) на дорогих моделях (цитата CTO в Axios) (<a href="https://www.axios.com/2026/05/28/ai-spending-roi-enterprise-costs">Axios</a>).</p>
<p><strong>WSJ → News18:</strong> для продвинутых AI coding tools только <strong>~18% расхода токенов</strong> доходит до <strong>готового ПО у реальных пользователей</strong>; остальное — тесты, отладка, ревью, переделки (<a href="https://www.news18.com/world/corporate-america-is-starting-to-ration-ai-as-costs-explode-despite-the-boom-whats-happening-ws-el-10120040.html">News18</a>).</p>
<p><strong>Не путать</strong> с другим «18%»: <strong>Entelligence.AI</strong> (агрегат 2 444 компаний, вторичка) — <strong>18 центов с каждого доллара</strong> token fees дают ценность пользователю; 44¢ — фикс AI-багов, 27¢ — rework (<a href="https://www.kucoin.com/news/flash/uber-and-microsoft-highlight-rising-ai-token-costs-and-diminishing-returns">KuCoin News</a>). Это <strong>другая методология</strong>, не WSJ «shipped product».</p>
<p><strong>Jellyfish</strong> (TechTarget, 29.04.2026): топ-10% потребителей Claude Code сжигают <strong>~10×</strong> токенов медианного разработчика при <strong>~2×</strong> output — симптом плохой постановки задач, а не «гениальности» (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>).</p>
<h3>Сигналы перерасхода: когда AI-счёт съедает квартальный бюджет</h3>
<p>Признаки, что пора вводить <strong>лимиты на нейросети для сотрудников</strong> и <strong>TokenOps</strong>:</p>
<ol>
<li><strong>Годовой бюджет исчерпан за квартал</strong> — как у Uber по coding tools (Naga, The Information/Habr).</li>
<li><strong>Рост доли пользователей агентных функций</strong> без роста shipped-метрик (Uber: 32% → 84% инженеров на Claude Code).</li>
<li><strong>Пилоты не переходят в production</strong> — в отраслевых обзорах Q2 2026 фигурирует рост конверсии пилотов <strong>18% → 31%</strong> (Digital Applied / Beri.net); это <strong>отдельный</strong> трек, не смешивать с WSJ «18% shipped» без оговорки (<a href="https://www.digitalapplied.com/blog/state-of-agentic-ai-q2-2026-quarterly-report">Digital Applied</a>).</li>
<li><strong>Ночные runaway-сценарии</strong> в Make/n8n без cap на workflow (см. раздел про оркестрацию).</li>
<li><strong>Теневой ИИ</strong> — личные подписки и API keys без chargeback (<strong>Dion Hinchliffe</strong>, Futurum/TechTarget: token usage = новый shadow IT).</li>
</ol>
<p><strong>Итог:</strong> если <strong>расходы на ИИ в компании</strong> растут быстрее выручки или маржи — нужен не запрет, а <strong>видимость</strong> и <strong>потолки</strong>.</p>
<aside class="article-cta article-cta--primary" role="complementary" aria-label="Призыв к действию: аудит AI FinOps">
  <p class="article-cta__eyebrow">Nero Network</p>
  <h3 class="article-cta__title">Нужен внешний импульс по TokenOps?</h3>
  <p class="article-cta__text">Проведём <strong>аудит AI FinOps / TokenOps</strong>: инвентаризация подписок и ключей, политика моделей, пилот на одном отделе, связка Make&nbsp;/&nbsp;n8n&nbsp;/&nbsp;MCP через gateway — без перерасхода токенов.</p>
  <a class="article-cta__button" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Написать в Telegram — обсудить аудит</a>
</aside>

<hr /></div>
<section id="kontrol-rashodov-boris-block" class="boris-tokenops-strip" aria-label="Визуализация потока токенов и бюджета TokenOps">
<style>
#kontrol-rashodov-boris-block.boris-tokenops-strip {
  margin: 48px 0 56px;
  font-family: Inter, system-ui, -apple-system, sans-serif;
  color: #0f172a;
}
#kontrol-rashodov-boris-block .boris-tokenops-card {
  max-width: 1300px;
  margin: 0 auto;
  padding: 32px 28px;
  background: linear-gradient(135deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
  border: 1px solid #e2e8f0;
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
}
#kontrol-rashodov-boris-block .boris-tokenops-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
  gap: 28px 36px;
  align-items: center;
}
#kontrol-rashodov-boris-block .boris-eyebrow {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: #0369a1;
  margin-bottom: 10px;
}
#kontrol-rashodov-boris-block .boris-kicker {
  margin: 0 0 12px;
  font-size: clamp(1.15rem, 2.2vw, 1.45rem);
  line-height: 1.25;
  font-weight: 800;
  color: #0f172a;
}
#kontrol-rashodov-boris-block .boris-lead {
  margin: 0 0 18px;
  font-size: 0.95rem;
  line-height: 1.55;
  color: #475569;
}
#kontrol-rashodov-boris-block .boris-stats {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 16px;
}
#kontrol-rashodov-boris-block .boris-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  background: #fff;
  border: 1px solid #e2e8f0;
  color: #334155;
}
#kontrol-rashodov-boris-block .boris-pill strong {
  color: #0f172a;
}
#kontrol-rashodov-boris-block .boris-pill--warn {
  border-color: #fecaca;
  background: #fef2f2;
}
#kontrol-rashodov-boris-block .boris-pill--ok {
  border-color: #bbf7d0;
  background: #f0fdf4;
}
#kontrol-rashodov-boris-block .boris-points {
  margin: 0;
  padding-left: 1.1rem;
  font-size: 0.9rem;
  line-height: 1.5;
  color: #334155;
}
#kontrol-rashodov-boris-block .boris-points li {
  margin-bottom: 6px;
}
#kontrol-rashodov-boris-block .boris-bridge {
  margin: 16px 0 0;
  font-size: 0.85rem;
  color: #64748b;
  font-style: italic;
}
#kontrol-rashodov-boris-block .boris-canvas-wrap {
  position: relative;
  min-height: 400px;
  border-radius: 18px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  overflow: hidden;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.9);
}
#kontrol-rashodov-boris-block #tokenops-flow-gauge-canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 400px;
}
#kontrol-rashodov-boris-block .boris-canvas-caption {
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: 10px;
  display: flex;
  justify-content: space-between;
  gap: 8px;
  font-size: 10px;
  font-weight: 600;
  color: #94a3b8;
  pointer-events: none;
}
@media (max-width: 1023px) {
  #kontrol-rashodov-boris-block .boris-tokenops-grid {
    grid-template-columns: 1fr;
  }
  #kontrol-rashodov-boris-block .boris-canvas-wrap {
    min-height: 360px;
  }
}
@media (max-width: 767px) {
  #kontrol-rashodov-boris-block .boris-tokenops-card {
    padding: 22px 18px;
  }
  #kontrol-rashodov-boris-block .boris-canvas-wrap,
  #kontrol-rashodov-boris-block #tokenops-flow-gauge-canvas {
    min-height: 320px;
  }
}
</style>

<div class="ym-container boris-tokenops-card">
  <div class="boris-tokenops-grid">
    <div class="boris-tokenops-copy">
      <span class="boris-eyebrow">TokenOps · FinOps</span>
      <h3 class="boris-kicker">Чат дешевле — агентный цикл сжигает котёл быстрее</h3>
      <p class="boris-lead">Схема потока: рутинные запросы идут по «лёгкой» ветке, агентные цепочки и длинный контекст бьют по годовому бюджету за квартал — пока не сработает маршрутизация и потолок.</p>
      <div class="boris-stats">
        <span class="boris-pill"><strong>Чат</strong> · низкий burn</span>
        <span class="boris-pill boris-pill--warn"><strong>Агент</strong> · ×10 burn</span>
        <span class="boris-pill boris-pill--ok"><strong>Routing</strong> · −38% пик</span>
      </div>
      <ul class="boris-points">
        <li>Годовой <strong>pooled credits</strong> — один котёл на компанию, не «безлимит на сотрудника».</li>
        <li>При перегреве gauge включается <strong>tiering</strong>: дорогая модель только для reasoning.</li>
        <li>Метрика для CFO — не токены, а <strong>cost-per-outcome</strong>.</li>
      </ul>
      <p class="boris-bridge">Дальше разберём AI FinOps и TokenOps: Inform → Optimize → Operate.</p>
    </div>
    <div class="boris-canvas-wrap" role="img" aria-label="Анимация: поток токенов чат и агент, gauge бюджета, переключение маршрутизации">
      <canvas id="tokenops-flow-gauge-canvas" width="640" height="400"></canvas>
      <div class="boris-canvas-caption">
        <span>← Чат / Copilot</span>
        <span>Котёл токенов</span>
        <span>Агенты Make·n8n →</span>
      </div>
    </div>
  </div>
</div>

<script>
(function tokenopsFlowGaugeEngine() {
  var canvas = document.getElementById("tokenops-flow-gauge-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var wrap = canvas.parentElement;
  var W = 640, H = 400, frame = 0, phase = 0, phaseT = 0;

  var C = {
    ink: "#0f172a",
    muted: "#94a3b8",
    chat: "#3b82f6",
    agent: "#f97316",
    danger: "#ef4444",
    ok: "#10b981",
    warn: "#eab308",
    surface: "#f8fafc",
    line: "#e2e8f0",
    pool: "#dbeafe"
  };

  function resize() {
    if (!wrap) return;
    var r = wrap.getBoundingClientRect();
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    W = Math.max(280, r.width);
    H = Math.max(320, r.height);
    canvas.width = W * dpr;
    canvas.height = H * dpr;
    canvas.style.width = W + "px";
    canvas.style.height = H + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function roundRect(x, y, w, h, r) {
    ctx.beginPath();
  if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    ctx.closePath();
  }

  var particles = [];
  function spawnParticle(lane, burst) {
    var n = burst ? 8 : 2;
    for (var i = 0; i < n; i++) {
      particles.push({
        lane: lane,
        x: lane === "chat" ? W * 0.08 : W * 0.92,
        y: H * (0.42 + Math.random() * 0.22),
        vx: (lane === "chat" ? 1.2 : -2.8) * (0.7 + Math.random() * 0.6),
        vy: (Math.random() - 0.5) * 0.4,
        life: burst ? 50 + Math.random() * 30 : 80 + Math.random() * 40,
        size: lane === "chat" ? 2 + Math.random() * 2 : 3 + Math.random() * 4,
        hot: lane === "agent"
      });
    }
  }

  function drawGauge(cx, cy, r, fill, label, sub, color) {
    ctx.lineWidth = 14;
    ctx.strokeStyle = C.line;
    ctx.beginPath();
    ctx.arc(cx, cy, r, Math.PI, 0, false);
    ctx.stroke();
    ctx.strokeStyle = color;
    ctx.beginPath();
    ctx.arc(cx, cy, r, Math.PI, Math.PI + fill * Math.PI, false);
    ctx.stroke();
    ctx.fillStyle = C.ink;
    ctx.font = "700 13px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(label, cx, cy - 6);
    ctx.fillStyle = C.muted;
    ctx.font = "600 10px Inter, system-ui, sans-serif";
    ctx.fillText(sub, cx, cy + 10);
  }

  function drawMiniBar(x, y, w, h, pct, title) {
    roundRect(x, y, w, h, 6);
    ctx.fillStyle = "#fff";
    ctx.fill();
    ctx.strokeStyle = C.line;
    ctx.lineWidth = 1;
    ctx.stroke();
    var fw = (w - 16) * Math.min(1, pct);
    roundRect(x + 8, y + h - 18, w - 16, 10, 4);
    ctx.fillStyle = C.line;
    ctx.fill();
    ctx.fillStyle = pct > 0.85 ? C.danger : pct > 0.6 ? C.warn : C.ok;
    roundRect(x + 8, y + h - 18, fw, 10, 4);
    ctx.fill();
    ctx.fillStyle = C.ink;
    ctx.font = "600 10px Inter, system-ui, sans-serif";
    ctx.textAlign = "left";
    ctx.fillText(title, x + 8, y + 14);
    ctx.textAlign = "right";
    ctx.fillStyle = C.muted;
    ctx.fillText(Math.round(pct * 100) + "%", x + w - 8, y + 14);
  }

  function drawRoutingValve(x, y, open) {
    roundRect(x, y, 56, 36, 8);
    ctx.fillStyle = open ? "#ecfdf5" : "#fff7ed";
    ctx.fill();
    ctx.strokeStyle = open ? C.ok : C.agent;
    ctx.lineWidth = 2;
    ctx.stroke();
    ctx.fillStyle = C.ink;
    ctx.font = "700 9px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText(open ? "LITE" : "OPUS", x + 28, y + 16);
    ctx.fillStyle = C.muted;
    ctx.font = "600 8px Inter, system-ui, sans-serif";
    ctx.fillText("routing", x + 28, y + 28);
    ctx.beginPath();
    ctx.fillStyle = open ? C.ok : C.agent;
    ctx.arc(x + 28, y + 42, open ? 5 : 4, 0, Math.PI * 2);
    ctx.fill();
  }

  function tickPhases() {
    phaseT++;
    if (phaseT > 140) { phaseT = 0; phase = (phase + 1) % 4; }
    if (phase === 0 && phaseT % 18 === 0) spawnParticle("chat", false);
    if (phase === 1 && phaseT % 6 === 0) spawnParticle("agent", true);
    if (phase === 2 && phaseT % 8 === 0) { spawnParticle("agent", true); spawnParticle("chat", false); }
    if (phase === 3 && phaseT % 14 === 0) spawnParticle("chat", false);
  }

  function poolLevel() {
    if (phase === 0) return 0.42 + Math.sin(frame * 0.02) * 0.03;
    if (phase === 1) return 0.72 + Math.min(0.2, phaseT * 0.004);
    if (phase === 2) return 0.94;
    return 0.58 - Math.min(0.25, phaseT * 0.003);
  }

  function draw() {
    frame++;
    tickPhases();
    ctx.clearRect(0, 0, W, H);
    ctx.fillStyle = C.surface;
    ctx.fillRect(0, 0, W, H);

    var poolY = H * 0.78;
    var poolH = H * 0.14;
    var lvl = poolLevel();
    roundRect(W * 0.12, poolY, W * 0.76, poolH, 10);
    ctx.fillStyle = "#fff";
    ctx.fill();
    ctx.strokeStyle = C.line;
    ctx.stroke();
    ctx.fillStyle = C.pool;
    roundRect(W * 0.12 + 4, poolY + poolH * (1 - lvl) + 4, W * 0.76 - 8, poolH * lvl - 8, 6);
    ctx.fill();
    if (lvl > 0.88) {
      ctx.fillStyle = "rgba(239,68,68,0.15)";
      roundRect(W * 0.12, poolY, W * 0.76, poolH, 10);
      ctx.fill();
    }
    ctx.fillStyle = C.ink;
    ctx.font = "700 11px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("Pooled credits · годовой котёл", W * 0.5, poolY - 8);
    ctx.fillStyle = lvl > 0.85 ? C.danger : C.muted;
    ctx.font = "600 10px Inter, system-ui, sans-serif";
    ctx.fillText(Math.round(lvl * 100) + "% израсходовано", W * 0.5, poolY + poolH / 2 + 4);

    drawGauge(W * 0.5, H * 0.36, Math.min(W, H) * 0.17, lvl,
      lvl > 0.85 ? "CAP" : "TokenOps",
      phase === 3 ? "routing ON" : phase === 1 ? "agent spike" : "steady",
      lvl > 0.85 ? C.danger : phase === 3 ? C.ok : C.chat);

    drawMiniBar(W * 0.06, H * 0.12, W * 0.22, 44, phase === 1 ? 0.88 : 0.52, "Dev");
    drawMiniBar(W * 0.39, H * 0.12, W * 0.22, 44, phase === 2 ? 0.96 : 0.61, "Mkt");
    drawMiniBar(W * 0.72, H * 0.12, W * 0.22, 44, phase === 1 ? 0.79 : 0.48, "Support");

    var valveOpen = phase === 3 || (phase === 2 && phaseT > 60);
    drawRoutingValve(W * 0.5 - 28, H * 0.52, valveOpen);

    ctx.strokeStyle = C.line;
    ctx.lineWidth = 2;
    ctx.setLineDash([6, 6]);
    ctx.beginPath();
    ctx.moveTo(W * 0.15, H * 0.55);
    ctx.lineTo(W * 0.42, H * 0.55);
    ctx.moveTo(W * 0.58, H * 0.55);
    ctx.lineTo(W * 0.85, H * 0.55);
    ctx.stroke();
    ctx.setLineDash([]);

    for (var i = particles.length - 1; i >= 0; i--) {
      var p = particles[i];
      p.x += p.vx;
      p.y += p.vy;
      p.life--;
      var towardPool = Math.abs(p.x - W * 0.5) < W * 0.22;
      if (towardPool) p.vy += 0.02;
      ctx.globalAlpha = Math.min(1, p.life / 40);
      ctx.fillStyle = p.hot ? C.agent : C.chat;
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
      ctx.fill();
      if (p.life <= 0 || p.x < 0 || p.x > W) particles.splice(i, 1);
    }
    ctx.globalAlpha = 1;

    if (phase === 2 && phaseT % 24 < 12) {
      ctx.fillStyle = C.danger;
      ctx.font = "700 11px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("Лимит · алерт FinOps", W * 0.5, H * 0.2);
    }

    requestAnimationFrame(draw);
  }

  window.addEventListener("resize", resize);
  if (typeof ResizeObserver !== "undefined" && wrap) {
    new ResizeObserver(resize).observe(wrap);
  }
  resize();
  draw();
})();
</script>
</section>
</div></section>
<section id="ai-finops-tokenops" class="ym-section reveal"><div class="ym-container"><h2 class="ym-section-title">AI FinOps и TokenOps: дисциплина вместо «сжигания токенов ради KPI»</h2><div class="ym-prose reveal delay-100"><p><strong>AI FinOps</strong> — перенос облачной дисциплины FinOps на стек LLM: информирование, оптимизация, эксплуатация. <strong>TokenOps</strong> — операционный слой: квоты, ключи, маршрутизация, атрибуция по командам и сценариям.</p>
<h3>Inform — Optimize — Operate для LLM</h3>
<table>
<thead>
<tr>
<th>Фаза</th>
<th>Вопрос</th>
<th>Практика</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Inform</strong></td>
<td>Кто и сколько тратит?</td>
<td>Инвентаризация подписок, API keys, gateway-логов</td>
</tr>
<tr>
<td><strong>Optimize</strong></td>
<td>Где «дыры»?</td>
<td>Model routing, кэш, лимиты контекста, запрет дорогих моделей для рутины</td>
</tr>
<tr>
<td><strong>Operate</strong></td>
<td>Как удерживать режим?</td>
<td>Политики, алерты, chargeback, обучение без лидербордов по токенам</td>
</tr>
</tbody>
</table>
<p><strong>Finout</strong> (май 2026) в блоге про «AI cost disasters» выделяет уроки для FinOps-команд: без <strong>Virtual Tags</strong> и единого <strong>MegaBill</strong> AI-расходы «размазываются» между OpenAI, Anthropic, Bedrock, Copilot (<a href="https://www.finout.io/blog/what-the-latest-ai-cost-disasters-are-teaching-finops-teams-5-lessons-from-the-trenches">Finout</a>).</p>
<h3>TokenOps vs облачный FinOps: что считать по-другому</h3>
<p>В облаке вы платите за инстансы с относительно предсказуемым idle. В LLM:</p>
<ul>
<li><strong>Счёт непропорционален длине контекста</strong> и числу итераций агента.</li>
<li><strong>Один «успешный» демо</strong> может стоить <strong>$1 200 за 2 часа</strong> (пересказ про Uber CTO — не норма для продакшена, но сигнал риска).</li>
<li><strong>Провайдеры</strong> меняют биллинг: с <strong>01.06.2026</strong> GitHub Copilot переходит на <strong>фактические токены</strong> (см. ниже).</li>
</ul>
<p><strong>TokenOps-инструменты</strong>, которые реально внедряют под оркестрацию:</p>
<ul>
<li><strong>LiteLLM</strong> (OSS): virtual keys, <code>max_budget</code>, team/org budgets, блокировка при превышении, model routing — self-host, стыкуется с OpenAI-compatible клиентами и HTTP-вызовами из <strong>n8n</strong> (<a href="https://docs.litellm.ai/docs/proxy/virtual_keys">LiteLLM docs</a>).</li>
<li><strong>Portkey</strong>: managed gateway, cost-by-team/app, guardrails; позиционируется для Claude Code/Cursor и enterprise (<a href="https://portkey.ai/buyers-guide/leading-llm-gateway-platforms">Portkey</a>).</li>
<li><strong>Finout</strong>: атрибуция без идеального tagging у провайдера.</li>
<li><strong>Lanai Token Tuner</strong>, Kong, Braintrust, Dynatrace — в обзорах как слой «token spend → workflow/outcome» (<a href="https://thenewstack.io/lanai-token-tuner-tokenmaxxing/">The New Stack</a>).</li>
</ul>
<p><strong>Коротко:</strong> <strong>управление расходами на токены</strong> начинается с <strong>единой точки учёта</strong>, а не с Excel по счетам Anthropic.</p>
<hr /></div></div></section>
<section id="governance-limity" class="ym-section ym-section-alt reveal"><div class="ym-container"><h2 class="ym-section-title">Governance: лимиты, роли и pooled credits</h2><div class="ym-prose reveal delay-100"><p><strong>Governance</strong> — это политика: какие модели, какие роли, какие сценарии, какой <strong>потолок</strong> и что происходит при его превышении.</p>
<h3>Квоты по ролям (ChatGPT Enterprise, корпоративные шлюзы)</h3>
<p>Практика <strong>лимитов на нейросети для сотрудников</strong>:</p>
<ul>
<li><strong>RBAC:</strong> разработчик ≠ маркетинг ≠ support; у каждого — свой tier моделей.</li>
<li><strong>Виртуальные ключи</strong> с <code>max_budget</code> (LiteLLM) или аналог в managed gateway.</li>
<li><strong>Запрет</strong> frontier-моделей для задач, где достаточно «лёгкой» модели.</li>
</ul>
<p>В <strong>российском контексте</strong> тренд 2026 — от «у каждого своя подписка» к <strong>единому корпоративному порталу</strong> с RBAC, квотами и биллингом (прогноз Selectel/GlowByte, <a href="https://habr.com/ru/companies/selectel/articles/1013862/">Habr/Selectel</a>). Кейс <strong>Sminex</strong>: единый proxy + OPENWEBUI, виртуальные ключи с лимитами, <strong>Langfuse</strong> cost-per-trace; заявленный эффект отдельных ассистентов (до <strong>7 млн ₽/год</strong> — <strong>только их цифра</strong>, не обобщать) (<a href="https://habr.com/ru/companies/sminex_developer/articles/1037438/">Habr/Sminex</a>).</p>
<p><strong>152-ФЗ и compute crunch:</strong> отправка ПДн в зарубежные API — отдельный риск; self-host и локальные агрегаторы — hedge, не замена FinOps (<a href="https://habr.com/ru/articles/1024850/">Habr</a>).</p>
<h3>Chargeback и showback: кто платит за токены команды</h3>
<p><strong>Dion Hinchliffe</strong> (Futurum, TechTarget): без <strong>chargeback</strong> потребление токенов = <strong>новый shadow IT</strong>; метрика будущего — <strong>agentic work unit</strong>, не сырые токены (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>).</p>
<p><strong>Showback</strong> (показать затраты без списания) подходит для пилота; <strong>chargeback</strong> (списать на cost center) — когда зрелость учёта достаточна.</p>
<p><strong>Nicholas Arcolano</strong> (Jellyfish, TechTarget): экстремальный расход токенов ≠ хорошая инженерия; связывать spend с <strong>merged PR / shipped features</strong>.</p>
<h3>GitHub Copilot и переход на usage-based billing</h3>
<p>С <strong>01.06.2026</strong> все планы Copilot переходят на <strong>GitHub AI Credits</strong> по <strong>фактическим токенам</strong> (input/output/cached); seat-цены <strong>не меняются</strong>, но agentic-сессии больше не «равны» короткому чату (<a href="https://github.blog/news-insights/company-news/github-copilot-is-moving-to-usage-based-billing/">GitHub Blog</a>).</p>
<p><strong>Pooled credits</strong> на org/enterprise: бюджеты на уровне enterprise, cost center, user; при исчерпании пула — cap или доп. usage по API-тарифам. Промо-кредиты для Business/Enterprise на июнь–август 2026 (<a href="https://github.blog/news-insights/company-news/github-copilot-is-moving-to-usage-based-billing/">GitHub Blog</a>; <a href="https://github.com/github/docs/blob/main/content/copilot/concepts/billing/usage-based-billing-for-organizations-and-enterprises.md">docs</a>).</p>
<p><strong>Аналогия для не-GitHub команд:</strong> общий <strong>котёл токенов</strong> на компанию + лимиты по отделам — проще объяснить финансам, чем «у каждого безлимитный Claude».</p>
<hr /></div></div></section>
<section id="tekhnicheskaya-ekonomika" class="ym-section reveal"><div class="ym-container"><h2 class="ym-section-title">Техническая экономика: маршрутизация моделей и LLM gateway</h2><div class="ym-prose reveal delay-100"><p><strong>Маршрутизация LLM-моделей</strong> — самый быстрый рычаг <strong>оптимизации расходов на ChatGPT и Claude</strong> после прозрачности учёта.</p>
<h3>Tiering: дешёвая модель для рутины, дорогая — для reasoning</h3>
<p><strong>Brian Fending</strong> (Ordovera, TechTarget): model routing (Opus/Haiku/без frontier) режет token spend <strong>до ~60%</strong> на mixed workloads — <strong>его заявление</strong>, не независимый бенчмарк; используйте как гипотезу для пилота, не как гарантию (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>).</p>
<p>Правило tiering:</p>
<ul>
<li><strong>Рутина</strong> (классификация, черновик, извлечение полей) — дешевая / локальная модель.</li>
<li><strong>Reasoning</strong> (архитектура, сложный код, стратегия) — frontier по запросу и с лимитом.</li>
</ul>
<h3>Кэш, контекст и batch: снижение input/output без потери качества</h3>
<ul>
<li><strong>Prompt caching</strong> (где поддерживает провайдер) снижает повторную оплату одного и того же контекста.</li>
<li><strong>Укорочение контекста</strong> — главный рычаг при агентных цепочках (кейс $500M связан с длинными контекстами, Axios).</li>
<li><strong>Batch-режимы</strong> для не срочных задач — отдельная линия оптимизации (проверяйте SLA).</li>
</ul>
<h3>LiteLLM, Portkey, Finout — что выбирать под Make/n8n</h3>
<table>
<thead>
<tr>
<th>Инструмент</th>
<th>Когда</th>
<th>Связка с Make/n8n</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>LiteLLM</strong></td>
<td>Нужен self-host, полный контроль бюджетов</td>
<td>HTTP Request → ваш proxy; отдельные virtual keys на workflow</td>
</tr>
<tr>
<td><strong>Portkey</strong></td>
<td>Managed gateway, guardrails «из коробки»</td>
<td>API endpoint смены для всех LLM-нод</td>
</tr>
<tr>
<td><strong>Finout</strong></td>
<td>Уже есть облачный FinOps, много провайдеров</td>
<td>Дашборд + теги; сценарии n8n видны через ключи/gateway</td>
</tr>
</tbody>
</table>
<p><strong>Make / n8n / Zapier</strong> скрывают построчную стоимость AI-шагов в логах сценария. Рекомендуемый паттерн (<a href="https://aicostboard.com/blog/posts/track-ai-costs-n8n-make-zapier">AI Cost Board</a>; <a href="https://community.n8n.io/t/introducing-alephant-n8n-nodes-ai-gateway-cost-control-usage-analytics-and-agent-tools/296465">n8n community / Alephant</a>):</p>
<ol>
<li><strong>Отдельные API keys на workflow</strong> (не один «общий» ключ на всю компанию).</li>
<li><strong>Gateway</strong> (Helicone, TrueFoundry, Alephant, LiteLLM) между сценарием и провайдером.</li>
<li><strong>Cost-scanner</strong> по execution metadata (<code>ai_languageModel</code> в n8n).</li>
<li><strong>Pre-flight budget check</strong> (IF-нода / Alephant) перед длинным агентным циклом.</li>
</ol>
<p><strong>MCP</strong> (Q2 2026): рост реестров серверов (Atlassian, GitHub, Stripe и др.) снижает «налог интеграции» для агентов, но <strong>не снимает</strong> token governance — наоборот, без лимитов <strong>усиливает</strong> расход (<a href="https://www.digitalapplied.com/blog/state-of-agentic-ai-q2-2026-quarterly-report">Digital Applied</a>). Политика: какие MCP-серверы разрешены, <strong>max iterations</strong>, запрет «бесконечного» tool loop.</p>
<hr /></div></div></section>
<section id="roi-metriki" class="ym-section ym-section-alt reveal"><div class="ym-container"><h2 class="ym-section-title">ROI и метрики: от токенов к cost-per-outcome</h2><div class="ym-prose reveal delay-100"><p><strong>ROI нейросетей в компании</strong> нельзя считать по счёту токенов. Нужен <strong>cost-per-outcome</strong>: стоимость закрытого тикета, merged PR, квалифицированного лида, опубликованной статьи.</p>
<h3>Формула ROI и пилот за 3 месяца</h3>
<p><strong>Коротко — формула для пилота:</strong></p>
<pre><code>ROI_пилота = (Δценность_outcome − Δзатраты_токены − Δтрудозатраты) / (затраты_токены + внедрение)
</code></pre>
<p><strong>Δценность</strong> измеряйте в единицах бизнеса: время цикла, конверсия, дефекты, выручка на FTE — не в токенах.</p>
<p><strong>Пилот 90 дней:</strong></p>
<ol>
<li><strong>Недели 1–2:</strong> baseline — текущие подписки, ключи, 3–5 типовых workflow.</li>
<li><strong>Недели 3–6:</strong> gateway + квоты на одном отделе; A/B tiering моделей.</li>
<li><strong>Недели 7–12:</strong> chargeback/showback, масштабирование политик, обучение.</li>
</ol>
<p>Не обещайте «+300% ROI» без ваших данных — опирайтесь на <strong>измеримые outcome</strong> пилота.</p>
<h3>Метрики вместо лидербордов: shipped product, DORA, качество</h3>
<table>
<thead>
<tr>
<th>Метрика</th>
<th>Что показывает</th>
<th>Источник / оговорка</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>% токенов → shipped code</strong></td>
<td>Эффективность coding AI</td>
<td>WSJ ~<strong>18%</strong> у реальных пользователей (<a href="https://www.news18.com/world/corporate-america-is-starting-to-ration-ai-as-costs-explode-despite-the-boom-whats-happening-ws-el-10120040.html">News18</a>)</td>
</tr>
<tr>
<td><strong>¢ ценности на $1 token fees</strong></td>
<td>Экономика «на доллар»</td>
<td>Entelligence <strong>18¢</strong> — другая база (<a href="https://www.kucoin.com/news/flash/uber-and-microsoft-highlight-rising-ai-token-costs-and-diminishing-returns">KuCoin</a>)</td>
</tr>
<tr>
<td><strong>Топ-10% vs медиана по токенам</strong></td>
<td>Tokenmaxxing в команде</td>
<td>Jellyfish <strong>~10×</strong> tokens, <strong>~2×</strong> output (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>)</td>
</tr>
<tr>
<td><strong>Merged PR / deployment</strong></td>
<td>Инженерный outcome</td>
<td>Arcolano / Jellyfish, TechTarget</td>
</tr>
<tr>
<td><strong>Agentic work unit</strong></td>
<td>Единица полезной работы агента</td>
<td>Hinchliffe, TechTarget</td>
</tr>
</tbody>
</table>
<p><strong>Анти-паттерн:</strong> лидерборд «кто сжёг больше токенов» — путь к <strong>перерасходу бюджета на нейросети</strong>, как у Amazon KiroRank и Meta Claudeonomics.</p>
<p><strong>Позиция Nero Network:</strong> <strong>минимизация токена при максимуме outcome</strong> — это и есть здоровый «tokenmaxxing» в смысле TechTarget, без гонки за объёмом.</p>
<p class="article-cta-note"><strong>Следующий шаг:</strong> <a href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Заказать аудит TokenOps в Telegram</a> — разберём baseline и пилот на 90 дней.</p>

<hr /></div></div></section>
<section id="poshagovyj-plan" class="ym-section reveal"><div class="ym-container"><h2 class="ym-section-title">Пошаговый план внедрения с лимитами</h2><div class="ym-prose reveal delay-100"><p>Дорожная карта <strong>внедрения AI-агентов для бизнеса</strong> с контролем бюджета — <strong>2–4 недели</strong> на базовый контур, <strong>3 месяца</strong> на зрелый TokenOps (для среднего бизнеса, не копия playbook Fortune-500).</p>
<h3>Аудит: инвентаризация подписок, API и «теневого» ИИ</h3>
<p><strong>Неделя 1 — корпоративный аудит AI-расходов:</strong></p>
<ul>
<li>Список <strong>корпоративных</strong> и <strong>личных</strong> подписок (ChatGPT, Claude, Copilot, Midjourney API и т.д.).</li>
<li>Все <strong>API keys</strong> и кто их владелец.</li>
<li>Сценарии <strong>Make / n8n / Zapier</strong> с AI-нодами (ID workflow, частота, модель).</li>
<li>Риски <strong>152-ФЗ</strong>: какие данные уходят в зарубежные API.</li>
</ul>
<p><strong>Результат аудита:</strong> карта «кто → что → сколько стоит → какой outcome» — основа <strong>политики использования нейросетей в компании</strong>.</p>
<h3>Политики, мониторинг, оркестрация (Make, n8n, MCP)</h3>
<p><strong>Недели 2–3 — технический контур:</strong></p>
<ol>
<li>Развернуть <strong>LiteLLM</strong> или подключить <strong>Portkey</strong> / аналог.</li>
<li>Выдать <strong>virtual keys</strong> по командам и по критичным workflow.</li>
<li>Включить <strong>model routing</strong> и hard cap при 80%/100% бюджета.</li>
<li>Подключить <strong>Finout</strong> или дашборд gateway — <strong>showback</strong> по отделам.</li>
<li>Для <strong>Make/n8n</strong>: только вызовы через gateway; <strong>отдельный ключ на сценарий</strong>; pre-flight check.</li>
<li>Для <strong>MCP</strong>: whitelist серверов, лимит итераций, запрет произвольных внешних MCP без review.</li>
</ol>
<p><strong>Flowwow</strong> (Habr): FinOps-боты и алерты в корп. мессенджере, <strong>20–30%</strong> экономии облака при зрелом FinOps — <strong>их опыт по облаку</strong>, не прямое обещание для LLM, но паттерн алертов применим (<a href="https://habr.com/ru/companies/flowwow/articles/1035250/">Habr/Flowwow</a>).</p>
<h3>Обучение команд и масштабирование без tokenmaxxing</h3>
<p><strong>Неделя 4+ — люди и процессы:</strong></p>
<ul>
<li>Обучение <strong>вайбкодингу с лимитами</strong>: когда агент уместен, когда — шаблон или дешёвая модель.</li>
<li>Снятие <strong>лидербордов по токенам</strong>; внедрение <strong>review по outcome</strong> (PR, тикеты, KPI отдела).</li>
<li>Playbook: «дорогая модель только по тикету / approval».</li>
</ul>
<p><strong>Практика без tokenmaxxing:</strong> дисциплина, которую Uber и Microsoft выстраивают сейчас, в вашем масштабе начинается с обучения и пилота — не с «магической экономии 80%». Подробный разбор с практикой — в <a href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">курсе Nero Network по автоматизации и вайбкодингу</a> (лимиты, tiering, gateway).</p>
<aside class="article-cta article-cta--secondary" role="complementary" aria-label="Призыв к действию: обучение команд">
  <p class="article-cta__eyebrow">Обучение</p>
  <h3 class="article-cta__title">Вайбкодинг и агенты — с лимитами, а не с лидербордами</h3>
  <p class="article-cta__text">Разберём, когда агент уместен, когда достаточно шаблона или дешёвой модели, и как встроить <strong>review по outcome</strong> вместо гонки за токенами.</p>
  <a class="article-cta__link" href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">Перейти к обучению автоматизации и вайбкодингу</a>
</aside>

<hr /></div></div></section>
<section id="faq" class="ym-section ym-section-alt reveal"><div class="ym-container"><h2 class="ym-section-title">FAQ</h2><div class="ym-faq-layout"><aside class="ym-faq-sidebar reveal-left"><h3 style="margin:0 0 16px;font-size:18px;">Вопросы</h3><ul class="ym-faq-list"><li><a href="#faq-0">Что такое tokenmaxxing простыми словами?</a></li><li><a href="#faq-1">Чем tokenmaxxing отличается от vibe coding?</a></li><li><a href="#faq-2">Нужен ли отдельный бюджет на Claude Code и Copilot?</a></li><li><a href="#faq-3">LiteLLM или Portkey — что выбрать?</a></li><li><a href="#faq-4">Нужен ли Finout малому и среднему бизнесу?</a></li><li><a href="#faq-5">Что меняется 1 июня 2026 в GitHub Copilot?</a></li><li><a href="#faq-6">Как контролировать расходы на нейросети в российской компани…</a></li><li><a href="#faq-7">Как измерить ROI от внедрения ИИ без самообмана?</a></li></ul></aside><div class='ym-faq-content'>
<article id="faq-0" class="ym-faq-item reveal delay-100"><h3>Что такое tokenmaxxing простыми словами?</h3><p><strong>Tokenmaxxing</strong> — максимизация потребления AI-токенов ради метрик активности (лидерборды, KPI), а не ради бизнес-результата. Термин массово пошёл в медиа <strong>28–29.05.2026</strong> (Axios, WSJ/News18). Полезный противоположный подход — <strong>эффективность токена</strong>: меньше токенов на тот же outcome (<a href="https://www.techtarget.com/searchcio/feature/Tokenmaxxing-How-CIOs-extract-maximum-value-AI-tokens">TechTarget</a>).</p></article>
<article id="faq-1" class="ym-faq-item reveal delay-200"><h3>Чем tokenmaxxing отличается от vibe coding?</h3><p><strong>Vibe coding</strong> — стиль разработки с ИИ «в потоке». <strong>Tokenmaxxing</strong> — <strong>искажение метрик</strong>: когда объём токенов становится целью. Можно вайбкодить с лимитами и tiering; проблема — <strong>без governance</strong> и лидербордов.</p></article>
<article id="faq-2" class="ym-faq-item reveal delay-300"><h3>Нужен ли отдельный бюджет на Claude Code и Copilot?</h3><p>Да, если инструменты coding/agentic — отдельная линия OPEX. Uber <strong>исчерпил годовой бюджет</strong> на coding tools к апрелю 2026 (Naga). Microsoft <strong>сворачивает Claude Code</strong> в пользу Copilot CLI к 30.06.2026. С <strong>01.06.2026</strong> Copilot биллится по <strong>фактическим токенам</strong> и <strong>pooled credits</strong> — планируйте <strong>общий котёл</strong> + лимиты по командам (<a href="https://github.blog/news-insights/company-news/github-copilot-is-moving-to-usage-based-billing/">GitHub Blog</a>).</p></article>
<article id="faq-3" class="ym-faq-item reveal delay-100"><h3>LiteLLM или Portkey — что выбрать?</h3><p><strong>LiteLLM</strong> — если нужен self-host, virtual keys и жёсткие <code>max_budget</code> под полный контроль. <strong>Portkey</strong> — если приоритет managed gateway и guardrails с быстрым стартом. Оба стыкуются с оркестрацией через HTTP; для <strong>Make/n8n</strong> критичны <strong>отдельные ключи на workflow</strong> (<a href="https://docs.litellm.ai/docs/proxy/virtual_keys">LiteLLM</a>; <a href="https://portkey.ai/buyers-guide/leading-llm-gateway-platforms">Portkey</a>).</p></article>
<article id="faq-4" class="ym-faq-item reveal delay-200"><h3>Нужен ли Finout малому и среднему бизнесу?</h3><p>Finout оправдан при <strong>множестве провайдеров</strong> и зрелом FinOps. Для старта часто достаточно <strong>gateway + дашборд</strong> (LiteLLM/Portkey) и <strong>showback</strong> по отделам. Finout добавляет ценность, когда AI-расходы смешаны с облаком и нужны <strong>Virtual Tags</strong> (<a href="https://www.finout.io/blog/what-the-latest-ai-cost-disasters-are-teaching-finops-teams-5-lessons-from-the-trenches">Finout</a>).</p></article>
<article id="faq-5" class="ym-faq-item reveal delay-300"><h3>Что меняется 1 июня 2026 в GitHub Copilot?</h3><p>Переход на <strong>GitHub AI Credits</strong> по usage (input/output/cached), <strong>pooled credits</strong> на org/enterprise, бюджеты по cost center и user, cap при исчерпании пула (<a href="https://github.blog/news-insights/company-news/github-copilot-is-moving-to-usage-based-billing/">GitHub Blog</a>).</p></article>
<article id="faq-6" class="ym-faq-item reveal delay-100"><h3>Как контролировать расходы на нейросети в российской компании?</h3><ol>
<li><strong>Единый корпоративный шлюз</strong> вместо личных подписок (тренд Selectel; кейс Sminex с proxy, квотами, Langfuse).</li>
<li><strong>Квоты и RBAC</strong> на виртуальных ключах.</li>
<li><strong>Учёт 152-ФЗ</strong> — минимизация ПДн в зарубежные API, локальные модели где нужно.</li>
<li><strong>Make/n8n</strong> только через gateway с лимитами.</li>
<li>RU-обзор инфоповода 29.05.2026: <a href="https://www.mentoday.ru/technics/news/29-05-2026/ii-stanovitsya-doroje-sotrudnikov-amerikanskie-kompanii-rezko-menyayut-politiku-ispolzovaniya-neirosetei/">mentoday.ru</a>.</li>
</ol></article>
<article id="faq-7" class="ym-faq-item reveal delay-200"><h3>Как измерить ROI от внедрения ИИ без самообмана?</h3><p>Связывайте spend с <strong>outcome</strong>: merged PR, закрытые тикеты, лиды, время цикла. Не используйте <strong>сырые токены</strong> в performance review. Ориентиры из отрасли: WSJ <strong>~18%</strong> токенов coding AI → shipped code у пользователей; не путать с Entelligence <strong>18¢/$</strong> (<a href="https://www.news18.com/world/corporate-america-is-starting-to-ration-ai-as-costs-explode-despite-the-boom-whats-happening-ws-el-10120040.html">News18</a>).</p>
<p><strong>Итог:</strong> <strong>контроль расходов на нейросети</strong> в 2026 — это <strong>TokenOps + governance + cost-per-outcome</strong>. Tokenmaxxing в плохом смысле — тревожный сигнал; в хорошем — искусство <strong>вытянуть максимум результата из каждого токена</strong>. Начните с аудита и лимитов на одном отделе — до того, как ваш «Uber внутри компании» исчерпает бюджет в апреле, а не в декабре.</p></article>
</div></div></section>
<section class="ym-section reveal">
  <div class="ym-container">
    <div class="ym-prose" style="text-align:left;">
      <p><strong>Итог:</strong> <strong>контроль расходов на нейросети</strong> в 2026 — это <strong>TokenOps + governance + cost-per-outcome</strong>. Tokenmaxxing в плохом смысле — тревожный сигнал; в хорошем — искусство <strong>вытянуть максимум результата из каждого токена</strong>. Начните с аудита и лимитов на одном отделе — до того, как ваш «Uber внутри компании» исчерпает бюджет в апреле, а не в декабре.</p>
    </div>
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
  "headline": "Tokenmaxxing и кризис AI-бюджетов: как бизнесу контролировать расходы на нейросети",
  "description": "Uber и Microsoft режут AI-бюджеты: что такое tokenmaxxing, как ввести квоты на токены, маршрутизацию LLM и измеримый ROI. TokenOps, FinOps и практика без перерасхода.",
  "author": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "datePublished": "2026-05-29",
  "dateModified": "2026-05-29",
  "inLanguage": "ru-RU"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Что такое tokenmaxxing простыми словами?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Tokenmaxxing — максимизация потребления AI-токенов ради метрик активности (лидерборды, KPI), а не ради бизнес-результата. Термин массово пошёл в медиа 28–29.05.2026 (Axios, WSJ/News18). Полезный противоположный подход — эффективность токена: меньше токенов на тот же outcome (TechTarget)."
      }
    },
    {
      "@type": "Question",
      "name": "Чем tokenmaxxing отличается от vibe coding?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Vibe coding — стиль разработки с ИИ «в потоке». Tokenmaxxing — искажение метрик: когда объём токенов становится целью. Можно вайбкодить с лимитами и tiering; проблема — без governance и лидербордов."
      }
    },
    {
      "@type": "Question",
      "name": "Нужен ли отдельный бюджет на Claude Code и Copilot?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да, если инструменты coding/agentic — отдельная линия OPEX. Uber исчерпил годовой бюджет на coding tools к апрелю 2026 (Naga). Microsoft сворачивает Claude Code в пользу Copilot CLI к 30.06.2026. С 01.06.2026 Copilot биллится по фактическим токенам и pooled credits — планируйте общий котёл + лимиты по командам (GitHub Blog)."
      }
    },
    {
      "@type": "Question",
      "name": "LiteLLM или Portkey — что выбрать?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "LiteLLM — если нужен self-host, virtual keys и жёсткие max_budget под полный контроль. Portkey — если приоритет managed gateway и guardrails с быстрым стартом. Оба стыкуются с оркестрацией через HTTP; для Make/n8n критичны отдельные ключи на workflow (LiteLLM; Portkey)."
      }
    },
    {
      "@type": "Question",
      "name": "Нужен ли Finout малому и среднему бизнесу?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Finout оправдан при множестве провайдеров и зрелом FinOps. Для старта часто достаточно gateway + дашборд (LiteLLM/Portkey) и showback по отделам. Finout добавляет ценность, когда AI-расходы смешаны с облаком и нужны Virtual Tags (Finout)."
      }
    },
    {
      "@type": "Question",
      "name": "Что меняется 1 июня 2026 в GitHub Copilot?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Переход на GitHub AI Credits по usage (input/output/cached), pooled credits на org/enterprise, бюджеты по cost center и user, cap при исчерпании пула (GitHub Blog)."
      }
    },
    {
      "@type": "Question",
      "name": "Как контролировать расходы на нейросети в российской компании?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Единый корпоративный шлюз вместо личных подписок (тренд Selectel; кейс Sminex с proxy, квотами, Langfuse).\nКвоты и RBAC на виртуальных ключах.\nУчёт 152-ФЗ — минимизация ПДн в зарубежные API, локальные модели где нужно.\nMake/n8n только через gateway с лимитами.\nRU-обзор инфоповода 29.05.2026: mentoday.ru."
      }
    },
    {
      "@type": "Question",
      "name": "Как измерить ROI от внедрения ИИ без самообмана?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Связывайте spend с outcome: merged PR, закрытые тикеты, лиды, время цикла. Не используйте сырые токены в performance review. Ориентиры из отрасли: WSJ ~18% токенов coding AI → shipped code у пользователей; не путать с Entelligence 18¢/$ (News18).\n\nИтог: контроль расходов на нейросети в 2026 — это TokenOps + governance + cost-per-outcome. Tokenmaxxing в плохом смысле — тревожный сигнал; в хорошем — искусство вытянуть максимум результата из каждого токена. Начните с аудита и лимитов на одном отделе — до того, как ваш «Uber внутри компании» исчерпает бюджет в апреле, а не в декабре."
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
