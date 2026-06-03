<?php
/**
 * Template Name: Yandex Нейроаналитик AI аналитика 2026
 * Description: Лонгрид о Нейроаналитике DataLens (июнь 2026) — hero Алины, блок Бориса, CTA.
 */

$page_seo_title = 'Нейроаналитик Яндекса: AI-аналитика данных в DataLens 2026';
$page_seo_description = 'Нейроаналитик DataLens (июнь 2026): сырые данные, чат на русском, ИИ на дашборде. Сравнение с Power BI и внедрение AI-аналитики в CRM и Make.';

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

$primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '';
$primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Обсудить внедрение';
$secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: '';
$secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Узнать больше';

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
 *   `.yandex-neyroanalitik-ai-analitika-dannyh-2026-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #fc3f1d;
    --ym-accent: #3b82f6;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(252, 63, 29, 0.15);
}

.yandex-neyroanalitik-ai-analitika-dannyh-2026-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h1,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h2,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h3,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h4,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h5,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page p,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page li,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page strong,
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.yandex-neyroanalitik-ai-analitika-dannyh-2026-page pre, .yandex-neyroanalitik-ai-analitika-dannyh-2026-page code {
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
    background: radial-gradient(circle, rgba(252,63,29,0.05) 0%, rgba(248,250,252,0) 70%);
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
    background: rgba(252, 63, 29, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(252, 63, 29, 0.2);
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
    box-shadow: 0 5px 15px rgba(252,63,29,0.2);
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
    box-shadow: 0 10px 20px -5px rgba(252, 63, 29, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(252, 63, 29, 0.5);
    background: #e11d00;
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
    border-color: rgba(252, 63, 29, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(252, 63, 29, 0.05);
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
#neuro-insight-hero.neuro-hero-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.yandex-neyroanalitik-intro-section { padding: 56px 0 32px; }
.yandex-neyroanalitik-intro-grid {
  display: grid;
  grid-template-columns: 1fr minmax(260px, 0.85fr);
  gap: 40px;
  align-items: start;
}
.yandex-neyroanalitik-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}
.yandex-neyroanalitik-intro-text p {
  text-align: left !important;
  font-size: 1.05rem;
  line-height: 1.65;
  margin: 0 0 16px;
}
.yandex-neyroanalitik-intro-deco .ym-mac-window { margin-bottom: 0; }
.yandex-neyroanalitik-toc-wrap { padding: 8px 0 48px; text-align: center; }
.yandex-neyroanalitik-toc-wrap .ym-toc { margin-top: 0; }
.ym-prose-main { max-width: 100%; text-align: left !important; }
.ym-prose-main p, .ym-prose-main li { text-align: left !important; }
.ym-prose-main table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 14px;
}
.ym-prose-main th, .ym-prose-main td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
  vertical-align: top;
}
.ym-prose-main th { background: #f1f5f9; font-weight: 700; }
.ym-prose-main pre {
  background: var(--ym-code-bg);
  color: #e2e8f0 !important;
  padding: 20px;
  border-radius: 12px;
  overflow-x: auto;
}
.ym-prose-main h3 { font-size: 1.35rem; margin: 32px 0 16px; font-weight: 700; }
.ym-prose-main h4 { font-size: 1.1rem; margin: 24px 0 12px; }
.ym-cta-primary, .ym-cta-secondary {
  margin: 40px 0;
  padding: 32px;
  border-radius: 20px;
  border: 1px solid var(--ym-border);
  background: var(--ym-surface);
  box-shadow: var(--ym-shadow);
}
.ym-cta-primary .ym-card-icon {
  width: 48px; height: 48px;
  background: rgba(252, 63, 29, 0.1);
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  color: var(--ym-primary);
  margin-bottom: 16px;
}
.ym-page-outro {
  padding: 48px 0 80px;
  text-align: left;
  max-width: 900px;
  margin: 0 auto;
}
@media (max-width: 900px) {
  .yandex-neyroanalitik-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main yandex-neyroanalitik-ai-analitika-dannyh-2026-page" role="main" tabindex="-1">
<section id="neuro-insight-hero" class="neuro-hero-office fullscreen-white-office" aria-labelledby="neuro-hero-h1">
  <style>
    #neuro-insight-hero.neuro-hero-office {
      position: relative;
      overflow: hidden;
      min-height: 100vh;
      background: #ffffff;
      background-image:
        radial-gradient(circle at 75% 15%, rgba(59, 130, 246, 0.08), transparent 42%),
        radial-gradient(circle at 20% 80%, rgba(139, 92, 246, 0.06), transparent 38%),
        linear-gradient(180deg, #f8fafc 0%, #ffffff 55%);
    }
    #neuro-insight-hero .neuro-hero-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(148, 163, 184, 0.12) 1px, transparent 1px),
        linear-gradient(90deg, rgba(148, 163, 184, 0.12) 1px, transparent 1px);
      background-size: 48px 48px;
      mask-image: radial-gradient(ellipse 80% 70% at 55% 45%, #000 20%, transparent 75%);
      pointer-events: none;
      z-index: 0;
    }
    #neuro-insight-hero #hero-neuroanalitik-canvas {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }
    #neuro-insight-hero .neuro-hero-copy {
      position: absolute;
      left: clamp(16px, 4vw, 56px);
      bottom: clamp(24px, 6vh, 72px);
      max-width: min(640px, 92vw);
      z-index: 4;
    }
    #neuro-insight-hero .giant-seo {
      font-size: clamp(32px, 4.8vw, 68px);
      font-weight: 900;
      line-height: 1.08;
      letter-spacing: -2px;
      color: #0f172a;
      margin: 0;
    }
    #neuro-insight-hero .giant-seo span {
      display: block;
      background: linear-gradient(90deg, #2563eb, #8b5cf6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    #neuro-insight-hero .giant-seo-sub {
      font-size: clamp(15px, 1.9vw, 21px);
      line-height: 1.55;
      color: rgba(15, 23, 42, 0.72);
      margin: 18px 0 0;
      max-width: 620px;
    }
    #neuro-insight-hero .telegram-button {
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
    }
    #neuro-insight-hero .telegram-button:hover { transform: translateY(-2px); }
    #neuro-insight-hero .vl-ui-tasks.neuro-hero-steps {
      position: absolute;
      left: clamp(12px, 3vw, 48px);
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      flex-direction: column;
      gap: 10px;
      z-index: 3;
    }
    #neuro-insight-hero .vl-ui-task {
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
      backdrop-filter: blur(6px);
    }
    #neuro-insight-hero .vl-ui-task span {
      width: 26px;
      height: 26px;
      background: linear-gradient(135deg, #2563eb, #8b5cf6);
      color: #fff;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 800;
      flex-shrink: 0;
    }
    #neuro-insight-hero .vl-ui-pill.neuro-hero-pill {
      position: absolute;
      top: clamp(16px, 3vh, 48px);
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
    #neuro-insight-hero .vl-ui-pill span {
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
      #neuro-insight-hero .vl-ui-tasks.neuro-hero-steps { display: none; }
      #neuro-insight-hero .neuro-hero-copy { bottom: clamp(16px, 4vh, 40px); }
    }
  </style>

  <div class="neuro-hero-grid" aria-hidden="true"></div>
  <canvas id="hero-neuroanalitik-canvas" aria-hidden="true"></canvas>

  <div class="vl-ui-pill neuro-hero-pill" aria-label="Теги темы">
    <span>DataLens</span>
    <span>Без SQL</span>
    <span>RLS</span>
    <span>Июнь 2026</span>
  </div>

  <nav class="vl-ui-tasks neuro-hero-steps" aria-label="Этапы AI-аналитики">
    <div class="vl-ui-task"><span>1</span> Вопрос на русском</div>
    <div class="vl-ui-task"><span>2</span> Сырые данные</div>
    <div class="vl-ui-task"><span>3</span> SQL и визуал</div>
    <div class="vl-ui-task"><span>4</span> Дашборд + ИИ-виджет</div>
    <div class="vl-ui-task"><span>5</span> Инсайт для бизнеса</div>
  </nav>

  <div class="neuro-hero-copy">
    <h1 id="neuro-hero-h1" class="giant-seo">
      Нейроаналитик Яндекса:
      <span>AI-аналитика на русском языке для бизнеса</span>
    </h1>
    <p class="giant-seo-sub">Задавайте вопросы данным в чате — получайте графики и инсайты без SQL; покажем, как внедрить такое у вас</p>
    <a class="telegram-button" href="<?php echo esc_url( $primary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer">Обсудить внедрение</a>
  </div>
</section>

<script>
(function neuroHeroEngine() {
  const canvas = document.getElementById("hero-neuroanalitik-canvas");
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
    cx = cw * 0.58;
    cy = ch * 0.46;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    panel: "#ffffff",
    panelEdge: "#e2e8f0",
    river: "#cbd5e1",
    riverGlow: "#93c5fd",
    sql: "#6366f1",
    chartBar: "#10b981",
    chartLine: "#2563eb",
    insight: "#f97316",
    shield: "#38bdf8",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    packetRu: "#fef3c7",
    packetSql: "#e0e7ff"
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

  function bezierPoint(p0, p1, p2, t) {
    const u = 1 - t;
    return {
      x: u * u * p0.x + 2 * u * t * p1.x + t * t * p2.x,
      y: u * u * p0.y + 2 * u * t * p1.y + t * t * p2.y
    };
  }

  class DataRiverArc {
    constructor(side) {
      this.side = side;
      this.p0 = side === "left"
        ? { x: -320, y: 90 }
        : { x: 280, y: 120 };
      this.p1 = side === "left"
        ? { x: -120, y: -40 }
        : { x: 80, y: -20 };
      this.p2 = { x: -20, y: -55 };
    }
    draw(ctx) {
      ctx.save();
      ctx.lineWidth = 3;
      ctx.strokeStyle = C.river;
      ctx.setLineDash([8, 10]);
      ctx.lineDashOffset = -frame * 0.6;
      ctx.beginPath();
      ctx.moveTo(this.p0.x, this.p0.y);
      ctx.quadraticCurveTo(this.p1.x, this.p1.y, this.p2.x, this.p2.y);
      ctx.stroke();
      ctx.setLineDash([]);
      const phase = (frame * 0.022 + (this.side === "right" ? 0.35 : 0)) % 1;
      const pt = bezierPoint(this.p0, this.p1, this.p2, phase);
      drawPolyRound(ctx, pt.x - 10, pt.y - 8, 20, 16, 4, this.side === "left" ? C.packetRu : C.packetSql, C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.side === "left" ? "RU?" : "SQL", pt.x, pt.y + 2);
      ctx.restore();
    }
  }

  class RlsShield {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const pulse = 1 + Math.sin(frame * 0.08) * 0.06;
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.scale(pulse, pulse);
      ctx.fillStyle = "rgba(56, 189, 248, 0.15)";
      ctx.beginPath();
      ctx.moveTo(0, -22);
      ctx.lineTo(18, -8);
      ctx.lineTo(14, 16);
      ctx.lineTo(-14, 16);
      ctx.lineTo(-18, -8);
      ctx.closePath();
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.shield;
      ctx.stroke();
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("RLS", 0, 4);
      ctx.restore();
    }
  }

  class HolocubeDashboard {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.pulseR = 0;
    }
    draw(ctx) {
      const cycle = (frame * 0.042) % 220;
      ctx.lineJoin = "round";
      const size = 88;
      const hx = this.x;
      const hy = this.y;

      drawPolyRound(ctx, hx - size, hy - size * 0.55, size * 2, size * 1.15, 10, C.panel, C.outline);
      drawPolyRound(ctx, hx - size + 8, hy - size * 0.48, size * 2 - 16, 22, 6, "#f1f5f9", C.panelEdge);

      if (cycle < 52) {
        drawPolyRound(ctx, hx - 70, hy - 20, 140, 36, 6, "#eff6ff", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.textAlign = "left";
        ctx.fillText("Выручка в Казани за май?", hx - 62, hy);
        drawPolyRound(ctx, hx - 70, hy + 22, 100, 24, 5, C.packetRu, C.outline);
        ctx.fillText("Сырые поля...", hx - 62, hy + 38);
      } else if (cycle < 108) {
        const lines = ["SELECT city,", "  SUM(revenue)", "FROM sales_raw", "GROUP BY 1"];
        ctx.fillStyle = C.sql;
        ctx.font = "bold 8px monospace";
        ctx.textAlign = "left";
        lines.forEach((ln, i) => ctx.fillText(ln, hx - 62, hy - 18 + i * 12));
        if (cycle % 8 < 4) {
          ctx.fillStyle = C.insight;
          ctx.fillRect(hx + 42, hy - 22 + (cycle % 40) * 0.3, 3, 10);
        }
      } else if (cycle < 168) {
        const h = 12 + ((cycle - 108) / 60) * 48;
        [0, 1, 2, 3].forEach((i) => {
          const bh = h * (0.45 + i * 0.15);
          drawPolyRound(ctx, hx - 55 + i * 28, hy + 35 - bh, 18, bh, 3, i % 2 ? C.chartBar : C.chartLine, C.outline);
        });
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("Чарт", hx, hy - 28);
      } else {
        this.pulseR = Math.min(70, (cycle - 168) * 2.2);
        ctx.strokeStyle = "rgba(249, 115, 22, 0.35)";
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(hx, hy + 10, this.pulseR, 0, Math.PI * 2);
        ctx.stroke();
        ctx.fillStyle = C.insight;
        ctx.font = "900 14px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("Инсайт готов", hx, hy + 14);
      }

      const ringAngle = frame * 0.04;
      ctx.save();
      ctx.translate(hx + size - 18, hy - size * 0.35);
      ctx.rotate(ringAngle);
      ctx.strokeStyle = C.agentPurple;
      ctx.lineWidth = 2;
      ctx.strokeRect(-8, -8, 16, 16);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 6px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("AI", 0, 3);
      ctx.restore();
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs, target) {
      this.x = x;
      this.y = y;
      this.baseX = x;
      this.baseY = y;
      this.color = color;
      this.role = role;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
      this.target = target;
      this.timer = Math.random() * 100;
      this.hitAnimation = 0;
    }

    draw(ctx) {
      this.timer += 0.03;
      let isMoving = false;
      let carryType = null;
      let faceDir = 1;
      const prg = (frame * 0.042) % 220;
      const targetX = this.target.x;
      const targetY = this.target.y;

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
        const wave = Math.sin(frame * 0.05 + this.baseX * 0.01) * 12;
        if (Math.abs(wave) < 4) this.hitAnimation = Math.sin(frame * 0.25) * 5;
        else this.hitAnimation = 0;
        if (frame % 220 === Math.floor(this.stepTrig) && Math.random() < 0.12) {
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
        ctx.fillRect(hx - 8, hy - 14, 16, 10);
        if (this.hitAnimation) {
          ctx.strokeStyle = C.outline;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.moveTo(12, 0);
          ctx.lineTo(22, -8 + this.hitAnimation);
          ctx.stroke();
        }
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
  const holo = new HolocubeDashboard(-10, -75);
  entities.push(new DataRiverArc("left"));
  entities.push(new DataRiverArc("right"));
  entities.push(new RlsShield(-200, -95));
  entities.push(holo);
  entities.push(new Agent(-280, 55, C.agentYellow, "1_architect", 18, ["Схема датасета...", "Поля и связи", "Метаданные ок"], { x: -50, y: -35 }));
  entities.push(new Agent(-210, 130, C.agentGreen, "2_seo", 58, ["ROMI по каналам?", "Выручка по городу", "Вопрос на русском"], { x: -30, y: 5 }));
  entities.push(new Agent(-90, 25, C.agentBlue, "3_coder", 98, ["Генерирую SQL...", "JOIN без дублей", "Text-to-SQL готов"], { x: 10, y: -25 }));
  entities.push(new Agent(40, 115, C.agentPink, "4_designer", 138, ["Линейный тренд", "Heatmap складов", "Тип чарта выбран"], { x: 25, y: 15 }));
  entities.push(new Agent(120, 15, C.agentPurple, "5_deployer", 178, ["ИИ-виджет live", "Дашборд опубликован", "600 запросов/мес"], { x: 45, y: -10 }));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function drawGridPulse(ctx) {
    const waveY = Math.sin(frame * 0.03) * 8;
    ctx.strokeStyle = "rgba(37, 99, 235, 0.08)";
    ctx.lineWidth = 1;
    for (let i = -3; i <= 3; i++) {
      ctx.beginPath();
      ctx.moveTo(-400, 80 + i * 40 + waveY);
      ctx.lineTo(120, -120 + i * 25);
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
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

    const prg = (frame * 0.042) % 220;
    if (prg >= 17 && prg < 17.05) createBubble(-280, 20, "1. Сырые данные");
    if (prg >= 57 && prg < 57.05) createBubble(-210, 95, "2. Вопрос RU");
    if (prg >= 97 && prg < 97.05) createBubble(-90, -5, "3. SQL агент");
    if (prg >= 137 && prg < 137.05) createBubble(40, 80, "4. Визуал");
    if (prg >= 177 && prg < 177.05) createBubble(120, -20, "5. Инсайт на дашборде");
    if (prg >= 170 && prg < 170.05) createBubble(-10, -120, "ИИ-виджет обновлён");

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

  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(engineloop);
  } else {
    engineloop();
  }
})();
</script>
<section class="yandex-neyroanalitik-intro-section ym-section" aria-label="Введение">
  <div class="ym-container">
    <div class="yandex-neyroanalitik-intro-grid reveal">
      <div class="yandex-neyroanalitik-intro-text">
        <p><strong>Коротко:</strong> 2 июня 2026 Yandex B2B Tech расширила Нейроаналитик в DataLens: агент работает с сырыми корпоративными данными, строит графики по вопросу на русском языке и показывает ИИ-подсказки на дашборде.</p>
        <p>Ниже — что это значит для бизнеса, как устроен продукт, чем он отличается от Power BI Copilot и как повторить сценарий у себя без обязательной миграции в Yandex Cloud.</p>
      </div>
      <div class="yandex-neyroanalitik-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">neuroanalitik — запрос</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># NL → SQL → график</span><br>
            <span class="ym-command">user:</span> Выручка менеджера в Казани за май?<br>
            <span class="ym-comment"># RLS: только ваши строки</span><br>
            <span class="ym-command">agent:</span> SELECT … GROUP BY city → chart
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="yandex-neyroanalitik-toc-wrap">
  <div class="ym-container reveal">
    <nav class="ym-toc" aria-label="Оглавление">
      <a href="#chto-takoe-neyroanalitik">Что такое Нейроаналитик в Yandex DataLens</a>
      <a href="#chto-novogo-iyun-2026">Что нового в июне 2026</a>
      <a href="#bez-sql-dlya-biznesa">Как это работает для бизнеса без SQL</a>
      <a href="#ai-analitika-dannyh">AI-аналитика данных</a>
      <a href="#avtomatizaciya-otchetov">Автоматизация отчётов и дашбордов с ИИ</a>
      <a href="#text-to-sql-russkiy">Запросы на русском и Text-to-SQL</a>
      <a href="#vizualizaciya-neyroset">Визуализация данных нейросетью</a>
      <a href="#sravnenie-datalens">Сравнение</a>
      <a href="#vnedrenie-ai-analitiki">Внедрение AI-аналитики у себя</a>
      <a href="#ogranicheniya-tarify">Ограничения, тарифы и доступность для SMB</a>
      <a href="#riski-fz152">Риски, ФЗ-152 и локальные модели</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</div>
<section id="chto-takoe-neyroanalitik" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Что такое Нейроаналитик в Yandex DataLens</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Определение:</strong> Нейроаналитик — набор AI-помощников внутри Yandex DataLens, которые переводят вопросы на естественном языке в выборки, визуализации, вычисляемые поля и текстовые выводы. Продукт встроен в экосистему Yandex Cloud и опирается на Yandex Cloud AI Studio; по данным официальной документации (обновление 2 июня 2026), запросы и данные не покидают контур облака, не логируются для дообучения моделей и могут быть отключены администратором на уровне экземпляра, дашборда или отчёта.</p>
<p>Для маркетолога, руководителя отдела продаж или владельца e-commerce Нейроаналитик закрывает типичную боль: «аналитик занят неделю, а мне нужен ответ сегодня». Вместо ручной подготовки отчёта или написания SQL вы формулируете вопрос по-русски — например, о динамике выручки менеджера в конкретном городе за месяц — и получаете график с пояснением. Именно такой сценарий описан в пресс-релизе Yandex B2B Tech от 2 июня 2026 (<a href="https://kod.ru/yandex-datalens-neyroanalitik-obnovlenie">kod.ru</a>, <a href="https://www.computerra.ru/347435/yandex-b2b-tech-rasshirila-funktsionalnost-nejroanalitika/">computerra.ru</a>).</p>
<h3>Нейроаналитик 1.0 и 2.0 — чем отличаются режимы</h3>
<p>По <a href="https://yandex.cloud/ru/docs/datalens/concepts/neuroanalyst">документации Yandex Cloud</a> в DataLens сосуществуют несколько режимов:</p>
<table>
<thead>
<tr>
<th>Режим / модуль</th>
<th>Назначение</th>
<th>Типичный пользователь</th>
</tr>
</thead>
<tbody>
<tr>
<td>Помощник в вычисляемых полях</td>
<td>Формулы и поля на датасете</td>
<td>Аналитик, BI-специалист</td>
</tr>
<tr>
<td>Нейроаналитик на дашборде (1.0)</td>
<td>Вопросы по уже собранному дашборду</td>
<td>Менеджер, маркетолог</td>
</tr>
<tr>
<td><strong>Нейроаналитик 2.0</strong></td>
<td>Агент подбирает похожий чарт и <strong>строит новый по датасету</strong></td>
<td>Руководитель, product</td>
</tr>
<tr>
<td>Editor (JS)</td>
<td>Генерация и правка кода визуализаций</td>
<td>Разработчик отчётов</td>
</tr>
<tr>
<td>Отчёты</td>
<td>Текстовые выводы и структура отчёта</td>
<td>Финансы, операционный блок</td>
</tr>
</tbody>
</table>
<p><strong>Итог:</strong> версия «1.0» в бытовом смысле — это чат «поверх готовой витрины». <strong>2.0</strong> и обновление июня 2026 сдвигают фокус к агенту, который сам находит поля в датасете и собирает визуализацию — ближе к западному тренду «talk to your data» по сырым и полусырым данным, а не только по свёрстанному дашборду.</p>
<h3>Где в интерфейсе чат, дашборд, Editor и отчёты</h3>
<p>Практическая карта для внедрения в команде:</p>
<ol>
<li><strong>Датасет</strong> — источник правды: подключения к БД, 1С через коннекторы, CSV, API. Без чистого датасета ни чат, ни агент не дадут стабильных ответов.</li>
<li><strong>Дашборд</strong> — публикуемая витрина; с июня 2026 на нём же появился <strong>ИИ-виджет</strong> (см. ниже).</li>
<li><strong>Чат Нейроаналитика</strong> — боковая панель или встроенный диалог: NL-запрос → SQL/агрегация → чарт + текст.</li>
<li><strong>DataLens Editor</strong> — когда нужна нестандартная визуализация; ИИ помогает с JS, но ответственность за код остаётся у специалиста.</li>
<li><strong>Отчёты</strong> — narrative layer для совета директоров и еженедельных писем.</li>
</ol>
<p><strong>Коротко:</strong> Нейроаналитик — не отдельное приложение, а слой поверх уже настроенного DataLens. Компании без зрелой BI-модели сначала платят «налог на данные» (подключения, справочники, RLS), и только потом получают магию чата.</p></div>
    </div>
  </div>
</section>

<section id="chto-novogo-iyun-2026" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Что нового в июне 2026: сырые данные и ИИ-виджет</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Определение релиза:</strong> главный сдвиг 2 июня 2026 — Нейроаналитик перестал быть только «чатом по готовому дашборду». Агент <strong>обращается к сырым корпоративным данным</strong>, сам находит нужные поля, строит визуализацию и текстовые выводы. Параллельно на дашборде появился <strong>виджет ИИ-подсказок</strong>, который обновляется при каждом открытии без повторного промпта.</p>
<h3>Запросы к датасетам без готового дашборда</h3>
<p>Раньше типичный путь выглядел так: аналитик собирает дашборд → бизнес задаёт вопросы только в рамках уже выведенных метрик. Июньский релиз разрывает это ограничение: вопрос можно адресовать <strong>напрямую датасету</strong> — агент подбирает поля, агрегации и тип графика.</p>
<p>Важные ограничения, которые стоит проговорить команде:</p>
<ul>
<li><strong>Права доступа (RLS):</strong> ответы ограничены настройками пользователя в экземпляре DataLens — агент не «обходит» политики безопасности (<a href="https://kod.ru/yandex-datalens-neyroanalitik-obnovlenie">kod.ru</a>).</li>
<li><strong>Качество метаданных:</strong> если поля названы <code>field_01</code>, модель чаще ошибается; нужны человекочитаемые описания и семантический слой.</li>
<li><strong>Лимит 600 AI-запросов на пользователя в месяц</strong> (возможно увеличение по запросу в поддержку) — для активных отделов продаж это операционный потолок (<a href="https://yandex.cloud/ru/docs/datalens/concepts/neuroanalyst">yandex.cloud/docs</a>).</li>
</ul>
<h3>ИИ-подсказки на дашборде — как настраиваются</h3>
<p>По <a href="https://www.computerra.ru/347435/yandex-b2b-tech-rasshirila-funktsionalnost-nejroanalitika/">Computerra</a>: администратор или автор дашборда <strong>один раз</strong> задаёт инструкцию на естественном языке — например, «покажи, есть ли просроченные отгрузки по складам на сегодня». При каждом открытии дашборда виджет показывает <strong>актуальный статус</strong> по живым данным. Целевая аудитория — нетехнические роли: операторы склада, сменные менеджеры, линейный персонал, которым не нужно осваивать фильтры DataLens.</p>
<p><strong>Практический совет:</strong> формулируйте инструкцию как измеримый KPI, а не как «расскажи что интересного». Плохо: «дай инсайты». Хорошо: «если доля брака по SKU за 7 дней выше 3%, выдели красным и перечисли топ-5 SKU».</p>
<h3>Road map: поиск дашбордов и база знаний (цитата Yandex Cloud)</h3>
<p><strong>Иван Пузыревский</strong>, технический директор платформы Yandex Cloud (июнь 2026, <a href="https://www.computerra.ru/347435/yandex-b2b-tech-rasshirila-funktsionalnost-nejroanalitika/">Computerra</a>): цель — модель, где пользователь работает с данными через <strong>единый интерфейс</strong>, задавая вопросы и получая визуализации, а <strong>механистический труд остаётся агентам</strong>. В планах — <strong>поиск дашбордов</strong> и ответы по DataLens с опорой на <strong>документацию сервиса и внутреннюю базу знаний компании</strong>.</p>
<p>Это согласуется с более ранней формулировкой (ноябрь 2025, <a href="https://www.cnews.ru/news/line/2025-11-28_yandex_b2b_tech_obnovila_nejroanalitika">CNews</a>): «Нейроаналитик — первый шаг к <strong>автономной аналитике</strong>»; следующий этап — <strong>проактивный мониторинг</strong> аномалий <strong>до</strong> вопроса бизнеса. Июнь 2026 — шаг к «сырым данным + проактивному виджету»; полноценная автономия — в road map.</p></div>
    </div>
  </div>
</section>

<section id="yandex-neyroanalitik-boris-block" class="boris-neuroanalitik-viz reveal" aria-labelledby="boris-neuroanalitik-title">
  <style>
    #yandex-neyroanalitik-boris-block {
      --boris-accent: #fc3f1d;
      --boris-accent-soft: rgba(252, 63, 29, 0.12);
      --boris-blue: #3b82f6;
      --boris-green: #10b981;
      --boris-slate: #0f172a;
      --boris-muted: #64748b;
      --boris-surface: #ffffff;
      --boris-map-bg: #f8fafc;
      padding: 48px 0 56px;
      background: var(--boris-surface);
      border-top: 1px solid #e2e8f0;
      border-bottom: 1px solid #e2e8f0;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-shell {
      max-width: 1300px;
      margin: 0 auto;
      padding: 0 24px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-map {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr);
      gap: 32px 40px;
      align-items: stretch;
      background: var(--boris-map-bg);
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      padding: 32px 36px;
      box-shadow: 0 4px 24px rgba(15, 23, 42, 0.06);
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-eyebrow {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--boris-accent);
      margin: 0 0 10px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-kicker {
      font-size: clamp(1.25rem, 2.2vw, 1.65rem);
      font-weight: 800;
      line-height: 1.25;
      color: var(--boris-slate);
      margin: 0 0 12px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-lead {
      font-size: 1rem;
      line-height: 1.6;
      color: var(--boris-muted);
      margin: 0 0 20px;
      max-width: 36em;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-steps {
      list-style: none;
      margin: 0 0 22px;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-steps li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 0.92rem;
      line-height: 1.45;
      color: #334155;
    }
    #yandex-neyroanalitik-boris-block .boris-step-num {
      flex-shrink: 0;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--boris-accent-soft);
      color: var(--boris-accent);
      font-size: 11px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 16px;
    }
    #yandex-neyroanalitik-boris-block .boris-pill {
      font-size: 12px;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--boris-surface);
      border: 1px solid #e2e8f0;
      color: var(--boris-slate);
    }
    #yandex-neyroanalitik-boris-block .boris-pill strong {
      color: var(--boris-accent);
      font-weight: 800;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-bridge {
      font-size: 0.88rem;
      color: var(--boris-muted);
      margin: 0;
      padding-top: 4px;
      border-top: 1px dashed #cbd5e1;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-stage-wrap {
      display: flex;
      flex-direction: column;
      min-height: 420px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-stage {
      flex: 1;
      position: relative;
      background: var(--boris-surface);
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      min-height: 380px;
    }
    #yandex-neyroanalitik-boris-block #boris-neuroanalitik-pipeline-canvas {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 380px;
    }
    #yandex-neyroanalitik-boris-block .boris-neuro-caption {
      font-size: 11px;
      color: #94a3b8;
      text-align: center;
      margin: 10px 0 0;
    }
    @media (max-width: 1023px) {
      #yandex-neyroanalitik-boris-block .boris-neuro-map {
        grid-template-columns: 1fr;
        padding: 28px 24px;
      }
      #yandex-neyroanalitik-boris-block .boris-neuro-stage-wrap {
        min-height: 360px;
      }
    }
    @media (max-width: 767px) {
      #yandex-neyroanalitik-boris-block {
        padding: 32px 0 40px;
      }
      #yandex-neyroanalitik-boris-block .boris-neuro-shell {
        padding: 0 16px;
      }
      #yandex-neyroanalitik-boris-block .boris-neuro-map {
        padding: 22px 18px;
        gap: 20px;
      }
    }
  </style>

  <div class="boris-neuro-shell ym-container">
    <div class="boris-neuro-map">
      <div class="boris-neuro-copy">
        <p class="boris-neuro-eyebrow">Схема под капотом</p>
        <h3 class="boris-neuro-kicker" id="boris-neuroanalitik-title">От вопроса в чате до графика на дашборде</h3>
        <p class="boris-neuro-lead">Июньский релиз сдвигает цепочку: NL-запрос на русском → агент в контуре облака → выборка из корпоративных данных с RLS → визуализация и текстовый вывод. Ниже — та же логика, что у самописного стека Nero (Make/n8n + LLM + CRM/БД).</p>
        <ol class="boris-neuro-steps">
          <li><span class="boris-step-num">1</span><span><strong>Чат</strong> — вопрос менеджера или виджет на дашборде</span></li>
          <li><span class="boris-step-num">2</span><span><strong>Агент</strong> — text-to-SQL, подбор полей, проверка прав</span></li>
          <li><span class="boris-step-num">3</span><span><strong>БД / датасет</strong> — сырые данные, не только готовая витрина</span></li>
          <li><span class="boris-step-num">4</span><span><strong>График</strong> — чарт + инсайт для решения сегодня</span></li>
        </ol>
        <div class="boris-neuro-pills" aria-hidden="true">
          <span class="boris-pill"><strong>22.07.25</strong> запуск · ~30%</span>
          <span class="boris-pill"><strong>28.11.25</strong> 10–20 чартов</span>
          <span class="boris-pill"><strong>02.06.26</strong> сырые данные</span>
        </div>
        <p class="boris-neuro-bridge">Дальше разберём, как задавать типовые вопросы без SQL и что наследует агент от прав пользователя.</p>
      </div>
      <div class="boris-neuro-stage-wrap">
        <div class="boris-neuro-stage" role="img" aria-label="Анимированная схема: чат, агент, база данных, график и шкала релизов DataLens">
          <canvas id="boris-neuroanalitik-pipeline-canvas" width="640" height="420"></canvas>
        </div>
        <p class="boris-neuro-caption">Анимация цикла запроса · подсветка этапов и вех релизов</p>
      </div>
    </div>
  </div>

  <script>
  (function borisNeuroanalitikPipelineEngine() {
    var canvas = document.getElementById('boris-neuroanalitik-pipeline-canvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 640, H = 420;
    var frame = 0;
    var phase = 0;
    var packetT = 0;
    var timelineIdx = 0;
    var timelineTimer = 0;

    var COLORS = {
      outline: '#0f172a',
      muted: '#64748b',
      accent: '#fc3f1d',
      blue: '#3b82f6',
      green: '#10b981',
      violet: '#8b5cf6',
      surface: '#ffffff',
      line: '#cbd5e1',
      glow: 'rgba(252, 63, 29, 0.35)',
      timelineBg: '#e2e8f0',
      timelineActive: '#fc3f1d'
    };

    var NODES = [
      { id: 'chat', label: 'Чат', sub: 'NL-вопрос', x: 0.12, color: COLORS.accent },
      { id: 'agent', label: 'Агент', sub: 'SQL + RLS', x: 0.37, color: COLORS.blue },
      { id: 'db', label: 'БД', sub: 'датасет', x: 0.62, color: COLORS.violet },
      { id: 'chart', label: 'График', sub: 'инсайт', x: 0.87, color: COLORS.green }
    ];

    var TIMELINE = [
      { date: '22.07.2025', title: 'Запуск', fact: '~30% отчётов' },
      { date: '28.11.2025', title: 'Объём', fact: '10–20 графиков' },
      { date: '02.06.2026', title: 'Сырые данные', fact: 'виджет ИИ' }
    ];

    function resize() {
      var parent = canvas.parentElement;
      if (!parent) return;
      var rect = parent.getBoundingClientRect();
      var cssW = Math.max(rect.width, 280);
      var cssH = Math.max(rect.height, 360);
      canvas.style.width = cssW + 'px';
      canvas.style.height = cssH + 'px';
      W = Math.floor(cssW * dpr);
      H = Math.floor(cssH * dpr);
      canvas.width = W;
      canvas.height = H;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    function nodePixel(n) {
      var padX = 48;
      var yMain = cssH() * 0.42;
      return {
        x: padX + (cssW() - padX * 2) * n.x,
        y: yMain,
        r: Math.min(cssW(), cssH()) * 0.055
      };
    }

    function cssW() { return W / dpr; }
    function cssH() { return H / dpr; }

    function roundRect(x, y, w, h, r, fill, stroke) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
      else { ctx.moveTo(x + r, y); ctx.lineTo(x + w - r, y); ctx.quadraticCurveTo(x + w, y, x + w, y + r); ctx.lineTo(x + w, y + h - r); ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h); ctx.lineTo(x + r, y + h); ctx.quadraticCurveTo(x, y + h, x, y + h - r); ctx.lineTo(x, y + r); ctx.quadraticCurveTo(x, y, x + r, y); }
      ctx.closePath();
      if (fill) { ctx.fillStyle = fill; ctx.fill(); }
      if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
    }

    function drawChatIcon(cx, cy, s, active) {
      var w = s * 1.4, h = s * 1.0;
      roundRect(cx - w/2, cy - h/2, w, h, 8, active ? '#fff5f3' : COLORS.surface, COLORS.outline);
      ctx.beginPath();
      ctx.moveTo(cx - w*0.15, cy + h/2);
      ctx.lineTo(cx - w*0.15, cy + h/2 + 10);
      ctx.lineTo(cx + w*0.1, cy + h/2);
      ctx.fillStyle = COLORS.surface;
      ctx.fill();
      ctx.strokeStyle = COLORS.outline;
      ctx.lineWidth = 2;
      ctx.stroke();
      ctx.fillStyle = active ? COLORS.accent : COLORS.muted;
      ctx.font = '600 ' + Math.max(9, s * 0.35) + 'px Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.fillText('?', cx, cy + 3);
    }

    function drawAgentIcon(cx, cy, s, active) {
      roundRect(cx - s, cy - s, s * 2, s * 2, s * 0.4, active ? '#eff6ff' : COLORS.surface, COLORS.outline);
      ctx.strokeStyle = active ? COLORS.blue : COLORS.muted;
      ctx.lineWidth = 2;
      for (var i = -1; i <= 1; i++) {
        ctx.beginPath();
        ctx.arc(cx + i * s * 0.45, cy, s * 0.22, 0, Math.PI * 2);
        ctx.stroke();
      }
      ctx.beginPath();
      ctx.moveTo(cx - s * 0.6, cy + s * 0.5);
      ctx.lineTo(cx + s * 0.6, cy + s * 0.5);
      ctx.stroke();
    }

    function drawDbIcon(cx, cy, s, active) {
      var ew = s * 1.1, eh = s * 0.35;
      ctx.fillStyle = active ? '#f5f3ff' : COLORS.surface;
      ctx.strokeStyle = COLORS.outline;
      ctx.lineWidth = 2;
      for (var i = 0; i < 3; i++) {
        var oy = cy - s + i * (s * 0.55);
        ctx.beginPath();
        ctx.ellipse(cx, oy, ew, eh, 0, 0, Math.PI * 2);
        if (i === 0) ctx.fill();
        ctx.stroke();
      }
      ctx.fillStyle = active ? COLORS.violet : COLORS.muted;
      ctx.fillRect(cx - ew * 0.5, cy - s * 0.2, ew, s * 1.1);
      ctx.strokeRect(cx - ew * 0.5, cy - s * 0.2, ew, s * 1.1);
    }

    function drawChartIcon(cx, cy, s, active, grow) {
      roundRect(cx - s * 1.1, cy - s, s * 2.2, s * 2, 6, active ? '#ecfdf5' : COLORS.surface, COLORS.outline);
      var bars = [0.45, 0.75, 0.55, 0.95];
      var bw = s * 0.35;
      var baseY = cy + s * 0.65;
      bars.forEach(function (h, i) {
        var bh = s * h * (grow || 0.3);
        ctx.fillStyle = i === 3 && active ? COLORS.green : (active ? '#86efac' : '#cbd5e1');
        ctx.fillRect(cx - s * 0.75 + i * (bw + 6), baseY - bh, bw, bh);
      });
    }

    function drawConnector(x1, x2, y, pulse) {
      ctx.strokeStyle = COLORS.line;
      ctx.lineWidth = 2;
      ctx.setLineDash([6, 6]);
      ctx.lineDashOffset = -frame * 0.8;
      ctx.beginPath();
      ctx.moveTo(x1, y);
      ctx.lineTo(x2, y);
      ctx.stroke();
      ctx.setLineDash([]);
      if (pulse > 0) {
        var px = x1 + (x2 - x1) * pulse;
        ctx.beginPath();
        ctx.arc(px, y, 6, 0, Math.PI * 2);
        ctx.fillStyle = COLORS.accent;
        ctx.fill();
        ctx.shadowColor = COLORS.glow;
        ctx.shadowBlur = 12;
        ctx.fill();
        ctx.shadowBlur = 0;
      }
    }

    function drawNode(n, idx, active) {
      var p = nodePixel(n);
      var s = p.r;
      if (active) {
        ctx.beginPath();
        ctx.arc(p.x, p.y, s + 14, 0, Math.PI * 2);
        ctx.fillStyle = n.color + '22';
        ctx.fill();
      }
      if (idx === 0) drawChatIcon(p.x, p.y, s, active);
      else if (idx === 1) drawAgentIcon(p.x, p.y, s, active);
      else if (idx === 2) drawDbIcon(p.x, p.y, s, active);
      else drawChartIcon(p.x, p.y, s, active, active ? Math.min(1, packetT * 1.2) : 0.35);

      ctx.fillStyle = COLORS.outline;
      ctx.font = '700 ' + Math.max(11, s * 0.42) + 'px Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.fillText(n.label, p.x, p.y + s + 18);
      ctx.fillStyle = COLORS.muted;
      ctx.font = '500 ' + Math.max(9, s * 0.32) + 'px Inter, system-ui, sans-serif';
      ctx.fillText(n.sub, p.x, p.y + s + 32);
      return p;
    }

    function drawTimeline() {
      var left = 40;
      var right = cssW() - 40;
      var y = cssH() - 52;
      var w = right - left;
      ctx.strokeStyle = COLORS.timelineBg;
      ctx.lineWidth = 4;
      ctx.lineCap = 'round';
      ctx.beginPath();
      ctx.moveTo(left, y);
      ctx.lineTo(right, y);
      ctx.stroke();
      var prog = (timelineIdx + (timelineTimer % 180) / 180) / TIMELINE.length;
      ctx.strokeStyle = COLORS.timelineActive;
      ctx.beginPath();
      ctx.moveTo(left, y);
      ctx.lineTo(left + w * Math.min(prog, 1), y);
      ctx.stroke();

      TIMELINE.forEach(function (item, i) {
        var tx = left + (w * i) / (TIMELINE.length - 1);
        var on = i <= timelineIdx;
        ctx.beginPath();
        ctx.arc(tx, y, on ? 7 : 5, 0, Math.PI * 2);
        ctx.fillStyle = on ? COLORS.timelineActive : COLORS.surface;
        ctx.fill();
        ctx.strokeStyle = on ? COLORS.timelineActive : COLORS.muted;
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.fillStyle = on ? COLORS.outline : COLORS.muted;
        ctx.font = (on ? '700 ' : '500 ') + '10px Inter, system-ui, sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(item.date, tx, y - 14);
        ctx.font = (on ? '600 ' : '500 ') + '9px Inter, system-ui, sans-serif';
        ctx.fillText(item.title, tx, y + 22);
        if (on && i === timelineIdx) {
          ctx.fillStyle = COLORS.accent;
          ctx.fillText(item.fact, tx, y + 34);
        }
      });
    }

    function drawQuestionBubble() {
      if (phase !== 0) return;
      var p = nodePixel(NODES[0]);
      var alpha = 0.5 + 0.5 * Math.sin(frame * 0.08);
      ctx.globalAlpha = alpha;
      roundRect(p.x - 55, p.y - 72, 110, 28, 8, COLORS.surface, COLORS.outline);
      ctx.fillStyle = COLORS.outline;
      ctx.font = '500 10px Inter, system-ui, sans-serif';
      ctx.textAlign = 'center';
      ctx.fillText('Выручка в Казани за май?', p.x, p.y - 54);
      ctx.globalAlpha = 1;
    }

    function tick() {
      frame++;
      if (frame % 140 === 0) {
        phase = (phase + 1) % 4;
        packetT = 0;
      }
      packetT = Math.min(1, packetT + 0.028);
      timelineTimer++;
      if (timelineTimer % 220 === 0) {
        timelineIdx = (timelineIdx + 1) % TIMELINE.length;
      }

      ctx.clearRect(0, 0, cssW(), cssH());
      ctx.fillStyle = COLORS.surface;
      ctx.fillRect(0, 0, cssW(), cssH());

      var positions = [];
      NODES.forEach(function (n, i) {
        positions.push(drawNode(n, i, phase === i));
      });

      for (var c = 0; c < positions.length - 1; c++) {
        var pulse = (phase === c) ? packetT : (phase > c ? 1 : 0);
        drawConnector(positions[c].x + positions[c].r + 8, positions[c + 1].x - positions[c + 1].r - 8, positions[c].y, pulse);
      }

      drawQuestionBubble();
      drawTimeline();
      requestAnimationFrame(tick);
    }

    window.addEventListener('resize', resize);
    resize();
    requestAnimationFrame(tick);
  })();
  </script>
</section>

<section id="bez-sql-dlya-biznesa" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Как это работает для бизнеса без SQL</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Коротко:</strong> AI-аналитика для бизнеса — это не отмена SQL, а перенос его генерации на модель. Пользователь пишет по-русски; система строит запрос, проверяет права и возвращает график.</p>
<h3>Типовые вопросы в чате (выручка, регион, менеджер)</h3>
<p>Примеры формулировок, которые стоит заложить в пилот (без выдуманных цифр — только шаблоны запросов):</p>
<table>
<thead>
<tr>
<th>Отрасль</th>
<th>Пример вопроса на русском</th>
<th>Ожидаемый артефакт</th>
</tr>
</thead>
<tbody>
<tr>
<td>E-commerce</td>
<td>«Какая маржа по топ-20 SKU за последние 7 дней в сравнении с прошлой неделей?»</td>
<td>Столбчатая диаграмма + таблица</td>
</tr>
<tr>
<td>Логистика</td>
<td>«По каким складам выросла доля просроченных отгрузок за месяц?»</td>
<td>Карта / heatmap по складам</td>
</tr>
<tr>
<td>Маркетинг</td>
<td>«ROMI по каналам за квартал: где отрицательный?»</td>
<td>Комбинированный чарт + список каналов</td>
</tr>
<tr>
<td>Продажи</td>
<td>«Динамика выручки менеджера Иванова в Казани за май»</td>
<td>Линейный график (кейс из релиза июня 2026)</td>
</tr>
<tr>
<td>Склад</td>
<td>«Сколько позиций ниже минимального остатка на сегодня?»</td>
<td>Число + таблица SKU (сценарий для ИИ-виджета)</td>
</tr>
</tbody>
</table>
<p><strong>Итог:</strong> чем ближе вопрос к <strong>именованным сущностям</strong> в вашей модели (менеджер, город, SKU, канал), тем выше точность. Размытые запросы («почему падают продажи») требуют либо уточняющего диалога, либо заранее описанных метрик.</p>
<h3>Права доступа и безопасность в контуре Yandex Cloud</h3>
<p>Три уровня, которые нужно объяснить ИБ и юристам:</p>
<ol>
<li><strong>RLS в DataLens</strong> — пользователь видит только строки своей роли/подразделения; агент наследует те же ограничения.</li>
<li><strong>Данные не уходят в публичные LLM</strong> — обработка в контуре Yandex Cloud; по документации — без логирования для дообучения.</li>
<li><strong>Админ-выключатель</strong> — можно запретить генерацию инсайтов на экземпляре, отдельном дашборде или отчёте.</li>
</ol>
<p>Дополнительно: на уровне экземпляра настраивается <strong>пользовательский промпт</strong> (вкладка «Настройки AI»), который добавляется к системному — удобно для глоссария компании («под выручкой мы понимаем…»).</p></div>
    </div>
  </div>
</section>

<section id="ai-analitika-dannyh" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">AI-аналитика данных: родовой смысл и польза</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Определение:</strong> AI-аналитика данных — использование больших языковых моделей и агентов для перевода бизнес-вопросов в SQL/API-запросы, визуализации и narrative-выводы с контролем прав и качества данных.</p>
<h3>От «смотреть отчёт» к «спросить отчёт»</h3>
<p>Классический BI: раз в неделю аналитик обновляет дашборд, руководитель смотрит PDF. AI-аналитика: руководитель <strong>спрашивает</strong> в чате, агент <strong>собирает</strong> ответ из актуальных данных. Сдвиг парадигмы совпадает с глобальным опросом <strong>AI+BI Analytics 2025 Global Report</strong> (цитируется <a href="https://www.cnews.ru/news/line/2025-11-28_yandex_b2b_tech_obnovila_nejroanalitika">CNews</a>, ноябрь 2025):</p>
<ul>
<li><strong>43%</strong> организаций уже используют ИИ-аналитику в процессах;</li>
<li><strong>56%</strong> называют главной целью <strong>качество решений</strong>;</li>
<li><strong>24%</strong> планируют <strong>утроить</strong> число сотрудников с доступом к ИИ-аналитике за год.</li>
</ul>
<p>По данным исследований, цитируемым в <a href="https://www.computerra.ru/347435/yandex-b2b-tech-rasshirila-funktsionalnost-nejroanalitika/">Computerra</a> (июнь 2026, без первичной ссылки в источнике): до <strong>20 часов в неделю</strong> уходит на доступ и объединение данных; <strong>92%</strong> аналитиков хотели бы меньше этой рутины; <strong>65%</strong> тратят на подготовку <strong>≥50%</strong> рабочего времени. Даже если точные цифры варьируются по отраслям, направление для SMB очевидно: <strong>автоматизация отчётов AI</strong> окупается не «заменой аналитика», а высвобождением его на моделирование и гипотезы.</p>
<h3>Кому подходит: маркетинг, e-commerce, логистика, склад</h3>
<table>
<thead>
<tr>
<th>Роль</th>
<th>Задача</th>
<th>Почему AI-аналитика</th>
</tr>
</thead>
<tbody>
<tr>
<td>Маркетолог</td>
<td>ROMI, когорты, каналы</td>
<td>Много ad-hoc вопросов, мало времени на SQL</td>
</tr>
<tr>
<td>E-commerce</td>
<td>Маржа, остатки, корзина</td>
<td>Высокая частота решений</td>
</tr>
<tr>
<td>Логистика</td>
<td>SLA, маршруты, склады</td>
<td>Операционные дашборды + виджет для смен</td>
</tr>
<tr>
<td>Склад</td>
<td>Остатки, просрочки</td>
<td>Нетехнические пользователи → ИИ-виджет</td>
</tr>
</tbody>
</table>
<p>Отдельная статистика Yandex B2B Tech (<a href="https://kod.ru/yandex-ai-agent-works-for-business">kod.ru</a>, уточнять дату публикации): за три месяца число компаний с ИИ в DataLens выросло <strong>в 3 раза</strong>; <strong>каждый пятый</strong> корпоративный пользователь делегирует агенту поиск инсайтов; отрасли — IT 40%, ритейл 25%, финтех 10%; <strong>73%</strong> кейсов — расчёт метрик, <strong>50%</strong> — гипотезы и закономерности.</p></div>
    </div>
  </div>
</section>

<section id="avtomatizaciya-otchetov" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Автоматизация отчётов и дашбордов с ИИ</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Коротко:</strong> автоматизация отчётов AI снижает ручную сборку слайдов и Excel, но не отменяет проектирование метрик и контроль качества ответов.</p>
<h3>Baseline июля 2025 (~30% ускорения) vs релиз июня 2026 — не смешивать</h3>
<table>
<thead>
<tr>
<th>Дата</th>
<th>Событие</th>
<th>Измеримый эффект / факт</th>
<th>Источник</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>22.07.2025</strong></td>
<td>Запуск Нейроаналитика, чат в DataLens, on-prem, лист ожидания</td>
<td><strong>~30%</strong> ускорение отчётов и проверки гипотез (среднее); <strong>4000+</strong> сотрудников Яндекса за 2 недели пилота; кейсы Яндекс Еда, Yandex Cloud Research</td>
<td><a href="https://yandex.ru/company/news/22-07-2025-04">yandex.ru/company/news</a></td>
</tr>
<tr>
<td><strong>28.11.2025</strong></td>
<td>Режим большого объёма</td>
<td>До <strong>10–20 графиков</strong> одновременно; адаптация ответа под роль (CFO vs маркетолог); <strong>1500+</strong> компаний; в Go — аналитика по <strong>58,4 млн</strong> MAU</td>
<td><a href="https://www.cnews.ru/news/line/2025-11-28_yandex_b2b_tech_obnovila_nejroanalitika">cnews.ru</a></td>
</tr>
<tr>
<td><strong>02.06.2026</strong></td>
<td>Сырые данные + ИИ-виджет на дашборде</td>
<td>Агент по датасету без готового дашборда; проактивные подсказки</td>
<td><a href="https://kod.ru/yandex-datalens-neyroanalitik-obnovlenie">kod.ru</a></td>
</tr>
</tbody>
</table>
<p><strong>Важно для контента и продаж:</strong> цифра <strong>~30%</strong> относится к <strong>июльскому baseline 2025</strong>, а не к июньскому релизу 2026. В коммерческих презентациях их нельзя смешивать без пометки даты.</p>
<h3>Когда хватает DataLens, когда нужен свой стек</h3>
<p><strong>Хватает DataLens</strong>, если:</p>
<ul>
<li>вы уже в Yandex Cloud или готовы мигрировать BI;</li>
<li>есть аналитик на <strong>датасеты и RLS</strong>;</li>
<li>устраивает лимит <strong>600 запросов/мес</strong> на активного пользователя чата;</li>
<li>нужен <strong>русский NL</strong> «из коробки» и on-prem у enterprise.</li>
</ul>
<p><strong>Нужен свой стек</strong> (CRM, 1С, Google Sheets, PostgreSQL + Make/n8n + YandexGPT/GigaChat), если:</p>
<ul>
<li>нет Yandex Cloud, но есть операционные данные в amoCRM, Bitrix, 1С;</li>
<li>нужен <strong>Telegram-бот</strong> или веб-чат для поля, а не только десктоп BI;</li>
<li>критична интеграция с <strong>MCP</strong> и сторонними агентами (<a href="https://osipenkov.ru/neuroanalyst-yandex-datalens/">практика BI-эксперта Сергея Осипенкова</a>, сентябрь 2025);</li>
<li>SMB не готов платить за seats и «налог на внедрение» без гарантированного ROI.</li>
</ul>
<aside class="ym-card reveal ym-cta-secondary" aria-labelledby="cta-secondary-title">
  <h3 id="cta-secondary-title">Освоить Make, n8n и вайбкодинг</h3>
  <p>Если вы строите свой стек (Telegram-бот, оркестратор, text-to-SQL), начните с практики: сценарии автоматизации, промпты и разбор типовых ошибок агентов.</p>
  <p style="margin-top:16px;margin-bottom:0;"><a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $secondary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $secondary_cta_label ); ?></a></p>
</aside></div>
    </div>
  </div>
</section>

<section id="text-to-sql-russkiy" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Запросы на русском и Text-to-SQL</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Определение:</strong> Text-to-SQL (генерация SQL нейросетью) — преобразование фразы на естественном языке в SQL с последующим выполнением на БД и визуализацией результата.</p>
<h3>GigaChat / YandexGPT и сторонние генераторы SQL</h3>
<table>
<thead>
<tr>
<th>Инструмент</th>
<th>Сильная сторона</th>
<th>Ограничение</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>YandexGPT</strong> в контуре YC</td>
<td>Встроен в Нейроаналитик, RLS, визуализация</td>
<td>Привязка к DataLens</td>
</tr>
<tr>
<td><strong>GigaChat</strong> (<a href="https://giga.chat/help/articles/how-to-write-sql-query">справка SQL</a>)</td>
<td>Русский, корпоративный API Сбера</td>
<td>Нет готового BI-агента с дашбордом «как в DataLens» — нужна своя сборка (<a href="https://developers.sber.ru/help/gigachat-api/business-analytics">developers.sber.ru</a>)</td>
</tr>
<tr>
<td><strong>Vanna 2.x</strong> (OSS)</td>
<td>Гибкий LLM, RLS в агенте 2.0</td>
<td>Репозиторий <strong>archived</strong> (март 2026) — продакшен на свой форк</td>
</tr>
<tr>
<td><strong>Power BI Copilot</strong></td>
<td>DAX внутри семантической модели</td>
<td>Слабее на немоделированных данных</td>
</tr>
</tbody>
</table>
<p>Запрос к данным на русском языке — конкурентное преимущество Нейроаналитика для РФ: не нужно переводить бизнес-вопрос на английский для промпта.</p>
<h3>Риски галлюцинаций и роль семантического слоя</h3>
<p>Отраслевой консенсус 2026 (<a href="https://www.holistics.io/bi-tools/semantic-layer/">Holistics</a>, <a href="https://promethium.ai/guides/text-to-sql-comparison-2026-enterprise-solutions/">Promethium</a>):</p>
<ul>
<li><strong>BI-Copilot’ы</strong> (Power BI, DataLens на зрелой модели) сильны <strong>внутри семантического слоя</strong> — заранее описанные метрики, связи, KPI.</li>
<li><strong>Text-to-SQL</strong> удобен для <strong>ad-hoc</strong> по сырым таблицам, но без validation layer выше риск неверных JOIN и агрегаций.</li>
</ul>
<p><strong>Практика:</strong> слой «бизнес-метрик» (даже в Google Sheets или dbt-lite) + автоматическая проверка SQL (read-only user, лимит строк, explain) + human-in-the-loop для финансовых отчётов.</p></div>
    </div>
  </div>
</section>

<section id="vizualizaciya-neyroset" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Визуализация данных нейросетью</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Коротко:</strong> нейросеть выбирает тип чарта и подписи по контексту вопроса; пользователь уточняет в диалоге.</p>
<h3>Автовыбор типа чарта</h3>
<p>В режиме ноября 2025 Нейроаналитик умел отдавать <strong>до 10–20 графиков</strong> в одном ответе с адаптацией narrative под роль (<a href="https://www.cnews.ru/news/line/2025-11-28_yandex_b2b_tech_obnovila_nejroanalitika">CNews</a>). Июнь 2026 добавляет построение <strong>нового</strong> чарта по датасету (2.0) — ближе к «построить график по вопросу в чате» без ручного перетаскивания полей в конструкторе.</p>
<h3>Julius, Powerdrill и BI-ассистенты — краткое сравнение форматов</h3>
<table>
<thead>
<tr>
<th>Продукт</th>
<th>Формат</th>
<th>Отличие от DataLens</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Yandex DataLens</strong></td>
<td>BI + агент + RLS в YC</td>
<td>Российский контур, on-prem</td>
</tr>
<tr>
<td><strong>Julius / Powerdrill</strong></td>
<td>Загрузка файлов / облачные таблицы</td>
<td>Быстрый старт без корпоративного BI, слабее enterprise RLS</td>
</tr>
<tr>
<td><strong>ThoughtSpot Spotter 3</strong></td>
<td>Agentic research, MCP (май 2026)</td>
<td>Зарубежный SaaS, не ФЗ-152 «из коробки»</td>
</tr>
<tr>
<td><strong>Самописный бот</strong></td>
<td>Telegram / веб + QuickChart</td>
<td>Полный контроль, своя ответственность за качество</td>
</tr>
</tbody>
</table>
<p><strong>Итог:</strong> для визуализации данных нейросетью в enterprise выбирают либо <strong>встроенный BI-агент</strong> (DataLens, Power BI Copilot, Metabase Metabot), либо <strong>лёгкий чат поверх файла</strong> — разные уровни зрелости данных.</p></div>
    </div>
  </div>
</section>

<section id="sravnenie-datalens" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Сравнение: DataLens vs Power BI Copilot и аналоги</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><table>
<thead>
<tr>
<th>Решение</th>
<th>Сильная сторона</th>
<th>Слабое место</th>
<th>Для кого</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Yandex Нейроаналитик</strong></td>
<td>Русский NL, RLS, данные в YC, on-prem</td>
<td>Экосистема YC; 600 запросов/мес; нужна BI-модель</td>
<td>Уже на DataLens / Yandex Cloud</td>
</tr>
<tr>
<td><strong>Power BI + Copilot</strong></td>
<td>DAX, зрелый enterprise</td>
<td>Западный стек; слабее на немоделированных данных</td>
<td>Microsoft 365 / Azure</td>
</tr>
<tr>
<td><strong>Metabase Metabot</strong></td>
<td>Semantic layer, MCP, self-hosted (<a href="https://www.metabase.com/docs/latest/ai/overview">docs</a>)</td>
<td>Нужен Metabase + модели</td>
<td>Self-hosted BI</td>
</tr>
<tr>
<td><strong>GigaChat API</strong></td>
<td>SQL на русском</td>
<td>Нет готового дашборда</td>
<td>Кастомная разработка</td>
</tr>
<tr>
<td><strong>ThoughtSpot Spotter 3</strong></td>
<td>Agentic + MCP</td>
<td>Не RU-контур</td>
<td>Global enterprise</td>
</tr>
</tbody>
</table>
<h3>Экосистема Яндекса vs Microsoft</h3>
<p><strong>DataLens vs Power BI Copilot</strong> — не «кто умнее», а <strong>где лежат данные и модель</strong>. Power BI выигрывает в организациях с годами инвестиций в DAX и Azure. Нейроаналитик — в компаниях с <strong>российским облаком</strong>, Директом, Метрикой и требованием <strong>не вывозить</strong> сырые персональные данные в западные SaaS.</p>
<h3>Российские альтернативы (AiST, PIX BI, Bot 101) — обзорно</h3>
<p>В выдаче встречаются каталоги (<a href="https://deeplist.ru/tools/3249/">deeplist.ru</a>) и обзоры с <strong>on-prem</strong> и AI Studio. Для лонгрида достаточно принципа: <strong>сравнивайте по чеклисту</strong> — русский NL, RLS, лимиты запросов, стоимость seats, интеграция с 1С/CRM, on-prem. Nero Network позиционирует <strong>кастомный агент</strong> там, где готового коробочного продукта нет, но есть операционная боль.</p></div>
    </div>
  </div>
</section>

<section id="vnedrenie-ai-analitiki" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Внедрение AI-аналитики у себя</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Уникальный угол материала:</strong> июньский релиз Яндекса — <strong>эталон UX</strong> («вопрос → график → инсайт»). Внедрение у клиента повторяет сценарий на <strong>его</strong> данных: amoCRM, Bitrix, 1С, PostgreSQL, Google Sheets — через Make/n8n, отечественные LLM и при необходимости MCP, <strong>без</strong> обязательной миграции в DataLens.</p>
<h3>Архитектура «чат → агент → CRM/БД → график»</h3>
<pre><code>Пользователь (Telegram / веб)
        ↓ NL-вопрос на русском
Оркестратор (n8n / Make)
        ↓
LLM (YandexGPT / GigaChat) + schema RAG (описание таблиц)
        ↓ SQL / API (read-only)
CRM / 1С / PostgreSQL / Sheets
        ↓
Визуализация (QuickChart, canvas, PNG в чат)
</code></pre>
<p>Контраст с закрытым контуром Yandex Cloud: у самописного стека <strong>вы</strong> отвечаете за ФЗ-152, логи и ключи API.</p>
<h3>Make, n8n, MCP и отечественные LLM</h3>
<ul>
<li><strong>Make / n8n</strong> — сценарии «вопрос в Telegram → HTTP к LLM → запрос к БД → ответ с картинкой».</li>
<li><strong>MCP</strong> — стандарт подключения агентов Cursor и внешних tools к Metabase, файлам, API (<a href="https://www.metabase.com/docs/latest/ai/overview">Metabase AI</a>); перспектива, которую отмечает <a href="https://osipenkov.ru/neuroanalyst-yandex-datalens/">osipenkov.ru</a> для DataLens.</li>
<li><strong>YandexGPT / GigaChat</strong> — генерация SQL и summary на русском; для ПДн — <strong>локальная</strong> или контрактная обработка без публичных API.</li>
</ul>
<h3>Пилот за 2–8 недель: KPI и метрики</h3>
<table>
<thead>
<tr>
<th>Неделя</th>
<th>Действие</th>
<th>KPI</th>
</tr>
</thead>
<tbody>
<tr>
<td>1–2</td>
<td>Инвентаризация источников, read-only доступ, 10 тестовых вопросов на русском</td>
<td>8/10 ответов «приемлемо» экспертом</td>
</tr>
<tr>
<td>3–4</td>
<td>Семантический слой (глоссарий метрик), Telegram-бот для пилотной группы</td>
<td>Median time-to-answer &lt; 2 мин</td>
</tr>
<tr>
<td>5–8</td>
<td>RLS по ролям, мониторинг галлюцинаций, обучение пользователей</td>
<td>−X часов ручных отчётов / нед (зафиксировать baseline)</td>
</tr>
</tbody>
</table>
<p>Чеклист перед продакшеном: не отправлять <strong>ПДн</strong> в публичные LLM; журналировать запросы; лимит строк в выборке; согласование с ИБ.</p>
<aside class="ym-card reveal ym-cta-primary" aria-labelledby="cta-primary-title">
  <div class="ym-card-icon" aria-hidden="true">
    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
  <h3 id="cta-primary-title">Внедрить AI-аналитику на ваших данных</h3>
  <p>Разберём CRM, 1С, таблицы и БД: спроектируем чат на русском, пилот за 2–8 недель и контур под ФЗ-152 — без обязательной миграции в DataLens.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;margin-top:24px;">
    <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $primary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( $primary_cta_label ); ?></span></a>
  </div>
</aside></div>
    </div>
  </div>
</section>

<section id="ogranicheniya-tarify" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Ограничения, тарифы и доступность для SMB</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Коротко:</strong> с 1 декабря 2025 действует единый план DataLens с включённым Нейроаналитиком в расширенном плане: <strong>1 место бесплатно</strong>, дополнительные — платно; trial <strong>30 дней</strong> (<a href="https://github.com/yandex-cloud/docs/blob/master/en/datalens/pricing-changes.md">pricing-changes</a>). Ранее в обзорах фигурировал тариф <strong>Business</strong> около <strong>990 ₽/мес за активного пользователя</strong> (<a href="https://osipenkov.ru/neuroanalyst-yandex-datalens/">osipenkov.ru</a>, сентябрь 2025 — сверять с актуальной страницей тарифов).</p>
<h3>Yandex Cloud, регион, on-premises</h3>
<p>SMB <strong>без</strong> выстроенных датасетов в DataLens не получает «магию из коробки»: нужны подключения, модель данных, биллинг Yandex Cloud. Enterprise может рассматривать <strong>on-prem</strong> (упоминалось в анонсе июля 2025). <strong>Лист ожидания</strong> на ранних этапах — проверять актуальный статус в <a href="https://yandex.cloud/ru/docs/datalens/concepts/neuroanalyst">документации</a>.</p>
<p><strong>Честный вывод:</strong> для микробизнеса с одной таблицей в Google Sheets чаще дешевле пилот на <strong>n8n + YandexGPT</strong>, чем полноценный DataLens. Для среднего бизнеса с десятками пользователей BI — DataLens может быть экономичнее самописа.</p></div>
    </div>
  </div>
</section>

<section id="riski-fz152" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Риски, ФЗ-152 и локальные модели</h2>
    <div class="ym-prose ym-grid-2-cards">
      <div class="ym-prose-main"><p><strong>Определение:</strong> персональные данные в аналитике — любые идентификаторы клиентов, сотрудников, контрагентов в выборках и логах чата.</p>
<h3>Что не уходит в публичные LLM</h3>
<p>В контуре Нейроаналитика (по официальной документации): данные и запросы <strong>не покидают Yandex Cloud</strong>, <strong>не логируются</strong> для дообучения. При самописном стеке <strong>запрещайте</strong> копировать выгрузки с ПДн в ChatGPT / Claude без DPA и оценки трансграничной передачи.</p>
<p>Практики compliance:</p>
<ul>
<li>псевдонимизация в витринах для чата;</li>
<li>отдельные роли read-only;</li>
<li>хранение логов промптов в РФ;</li>
<li><strong>локальная LLM</strong> для чувствительных контуров (<a href="https://yandex.cloud/ru/docs/datalens/concepts/neuroanalyst">запрос «локальная llm корпоративные данные»</a> — ориентир для сравнения с on-prem).</li>
</ul></div>
    </div>
  </div>
</section>

<section id="faq" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;font-size:18px;">Вопросы</h3>
        <ul class="ym-faq-list">
        <li><a href="#faq-1">Нужен ли аналитик, если есть Нейроаналитик?</a></li>
        <li><a href="#faq-2">Можно ли повторить функционал без Yandex Cloud?</a></li>
        <li><a href="#faq-3">Чем июнь 2026 отличается от запуска 2025?</a></li>
        <li><a href="#faq-4">Чем Нейроаналитик отличается от ChatGPT с Excel?</a></li>
        <li><a href="#faq-5">Сколько стоит аналог на Make?</a></li>
        <li><a href="#faq-6">Сколько AI-запросов можно делать в месяц?</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content">
      <article class="ym-faq-item reveal" id="faq-1">
        <h3>Нужен ли аналитик, если есть Нейроаналитик?</h3>
        <p><strong>Короткий ответ:</strong> да, но роль меняется. Агент снимает рутину отчётов и ad-hoc SQL; аналитик проектирует датасеты, RLS, семантический слой и проверяет спорные ответы. Без модели данных ИИ усиливает хаос, а не скорость.</p>
      </article>
      <article class="ym-faq-item reveal" id="faq-2">
        <h3>Можно ли повторить функционал без Yandex Cloud?</h3>
        <p><strong>Да.</strong> Архитектура: чат (Telegram/веб) → оркестратор (Make/n8n) → LLM + описание схемы → read-only SQL/API → график. Минус — вы сами строите governance; плюс — данные остаются в CRM/1С/СУБД клиента.</p>
      </article>
      <article class="ym-faq-item reveal" id="faq-3">
        <h3>Чем июнь 2026 отличается от запуска 2025?</h3>
        <table>
<thead>
<tr>
<th></th>
<th>Июль 2025</th>
<th>Июнь 2026</th>
</tr>
</thead>
<tbody>
<tr>
<td>Фокус</td>
<td>Чат в DataLens, ~30% ускорение отчётов</td>
<td><strong>Сырые данные</strong>, ИИ-виджет на дашборде</td>
</tr>
<tr>
<td>Дашборд</td>
<td>Вопросы по готовой витрине</td>
<td>Запросы к <strong>датасету</strong> без обязательного дашборда</td>
</tr>
<tr>
<td>Проактивность</td>
<td>В основном по запросу</td>
<td>Виджет с инструкцией при каждом открытии</td>
</tr>
</tbody>
</table>
      </article>
      <article class="ym-faq-item reveal" id="faq-4">
        <h3>Чем Нейроаналитик отличается от ChatGPT с Excel?</h3>
        <p>ChatGPT не видит вашу <strong>живую</strong> корпоративную БД с <strong>RLS</strong> и не гарантирует отсутствие утечки при загрузке файлов. Нейроаналитик выполняет запрос <strong>внутри</strong> DataLens с правами пользователя. Excel+ChatGPT — прототип; DataLens — операционный контур (при зрелой настройке).</p>
      </article>
      <article class="ym-faq-item reveal" id="faq-5">
        <h3>Сколько стоит аналог на Make?</h3>
        <p>Зависит от объёма запросов и LLM. Ориентир для пилота: лицензии Make/n8n + API YandexGPT/GigaChat + часы интегратора (<strong>2–8 недель</strong> по таблице выше) — часто ниже годового BI для 5–15 пользователей, если не нужен полный DataLens.</p>
      </article>
      <article class="ym-faq-item reveal" id="faq-6">
        <h3>Сколько AI-запросов можно делать в месяц?</h3>
        <p>По документации Yandex Cloud — <strong>600 на пользователя</strong> в месяц, с возможностью увеличения по запросу.</p>
      </article>
      </div>
    </div>
  </div>
</section>
<section class="ym-page-outro ym-container reveal">
  <div class="ym-prose-main"><p><strong>Итог страницы:</strong> Нейроаналитик в DataLens (июнь 2026) — сильный ориентир для <strong>AI-аналитики данных</strong> на русском языке в контуре Yandex Cloud. Для компаний вне этой экосистемы разумный путь — повторить UX «спросить данные — получить график» на своих источниках с контролем ФЗ-152 и пилотом за 2–8 недель. Nero Network помогает спроектировать такой контур: CRM, 1С, таблицы, Make/n8n, отечественные LLM и MCP при необходимости.</p></div>
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
  "@graph": [
    {
      "@type": "Article",
      "headline": "Нейроаналитик Яндекса: AI-аналитика на русском языке для бизнеса",
      "description": "Нейроаналитик DataLens (июнь 2026): сырые данные, чат на русском, ИИ на дашборде. Сравнение с Power BI и внедрение AI-аналитики.",
      "datePublished": "2026-06-03",
      "dateModified": "2026-06-03",
      "inLanguage": "ru-RU",
      "author": { "@type": "Organization", "name": "Nero Network" }
    },
    {
      "@type": "SoftwareApplication",
      "name": "Yandex DataLens Нейроаналитик",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "Web",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "RUB" }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Нужен ли аналитик, если есть Нейроаналитик?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да, но роль меняется: агент снимает рутину, аналитик проектирует датасеты, RLS и семантический слой."
          }
        },
        {
          "@type": "Question",
          "name": "Можно ли повторить функционал без Yandex Cloud?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Да: чат → оркестратор Make/n8n → LLM + схема → read-only SQL/API → график."
          }
        },
        {
          "@type": "Question",
          "name": "Чем июнь 2026 отличается от запуска 2025?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Июнь 2026 добавляет доступ к сырым данным и ИИ-виджет на дашборде; июль 2025 — baseline чата и ~30% ускорения отчётов."
          }
        }
      ]
    }
  ]
}
</script>


<?php
get_footer();
