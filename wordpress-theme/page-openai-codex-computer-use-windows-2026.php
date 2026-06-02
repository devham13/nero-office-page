<?php
/**
 * Template Name: OpenAI Codex Computer Use Windows 2026
 * Description: Лонгрид Nero Network — Codex Computer Use на Windows (hero Алины + блок Бориса).
 */

$page_seo_title = 'Codex Computer Use на Windows: AI-агент для бизнеса (2026)';
$page_seo_description = 'Codex 26.527: Computer Use на Windows 11 — агент кликает в приложениях, пульт с телефона. Сценарии для бизнеса, sandbox и внедрение с Nero Network.';

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

if (!defined('PRIMARY_CTA_URL') && getenv('PRIMARY_CTA_URL')) {
    define('PRIMARY_CTA_URL', getenv('PRIMARY_CTA_URL'));
}
if (!defined('PRIMARY_CTA_LABEL') && getenv('PRIMARY_CTA_LABEL')) {
    define('PRIMARY_CTA_LABEL', getenv('PRIMARY_CTA_LABEL'));
}
if (!defined('SECONDARY_CTA_URL') && getenv('SECONDARY_CTA_URL')) {
    define('SECONDARY_CTA_URL', getenv('SECONDARY_CTA_URL'));
}
if (!defined('SECONDARY_CTA_LABEL') && getenv('SECONDARY_CTA_LABEL')) {
    define('SECONDARY_CTA_LABEL', getenv('SECONDARY_CTA_LABEL'));
}
$nero_primary_cta_url = (defined('PRIMARY_CTA_URL') && PRIMARY_CTA_URL) ? PRIMARY_CTA_URL : '';
$nero_primary_cta_label = (defined('PRIMARY_CTA_LABEL') && PRIMARY_CTA_LABEL) ? PRIMARY_CTA_LABEL : 'Пилот Codex — Telegram';
$nero_secondary_cta_url = (defined('SECONDARY_CTA_URL') && SECONDARY_CTA_URL) ? SECONDARY_CTA_URL : '';
$nero_secondary_cta_label = (defined('SECONDARY_CTA_LABEL') && SECONDARY_CTA_LABEL) ? SECONDARY_CTA_LABEL : 'Каталог сценариев';

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
 *   `.openai-codex-computer-use-windows-2026-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.openai-codex-computer-use-windows-2026-page {
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
    --ym-accent: #10b981;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(0, 120, 212, 0.15);
}

.openai-codex-computer-use-windows-2026-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.openai-codex-computer-use-windows-2026-page h1,
.openai-codex-computer-use-windows-2026-page h2,
.openai-codex-computer-use-windows-2026-page h3,
.openai-codex-computer-use-windows-2026-page h4,
.openai-codex-computer-use-windows-2026-page h5,
.openai-codex-computer-use-windows-2026-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-computer-use-windows-2026-page p,
.openai-codex-computer-use-windows-2026-page li,
.openai-codex-computer-use-windows-2026-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.openai-codex-computer-use-windows-2026-page strong,
.openai-codex-computer-use-windows-2026-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-computer-use-windows-2026-page pre, .openai-codex-computer-use-windows-2026-page code {
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
    background: linear-gradient(90deg, #0078d4, #10b981);
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
    box-shadow: 0 10px 20px -5px rgba(0, 120, 212, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(0, 120, 212, 0.5);
    background: #006cbd;
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
#codex-remote-hub.codex-remote-hub {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}

/* Boris article-scoped overrides */
.openai-codex-computer-use-windows-2026-page .ym-content-lead {
  font-size: 18px;
  line-height: 1.7;
  color: #334155;
  margin-bottom: 1.25rem;
}
.openai-codex-computer-use-windows-2026-page .ym-content-lead strong { color: #0f172a; }
.openai-codex-computer-use-windows-2026-intro {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
  gap: 32px;
  align-items: start;
  text-align: left;
  border-left: 4px solid var(--ym-primary, #2563eb);
  padding-left: 24px;
  margin-bottom: 48px;
}
.openai-codex-computer-use-windows-2026-intro-text p { text-align: left !important; }
.openai-codex-computer-use-windows-2026-intro-panel {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 20px;
  box-shadow: var(--ym-shadow-sm, 0 4px 12px rgba(15,23,42,.06));
}
.openai-codex-computer-use-windows-2026-intro-panel .ym-mac-title { color: #94a3b8 !important; }
.openai-codex-computer-use-windows-2026-page h2 {
  font-size: clamp(26px, 3.2vw, 34px);
  font-weight: 800;
  color: var(--ym-heading, #0f172a);
  margin: 0 0 20px;
  letter-spacing: -0.02em;
}
.openai-codex-computer-use-windows-2026-page h3 {
  font-size: 22px;
  font-weight: 700;
  color: var(--ym-heading, #0f172a);
  margin: 32px 0 14px;
}
.openai-codex-computer-use-windows-2026-page p,
.openai-codex-computer-use-windows-2026-page li {
  color: #475569;
  line-height: 1.7;
  font-size: 17px;
}
.openai-codex-computer-use-windows-2026-page ul { margin: 0 0 1.25rem; padding-left: 1.25rem; }
.openai-codex-computer-use-windows-2026-page .ym-table-wrap {
  overflow-x: auto;
  margin: 24px 0 32px;
  border-radius: 16px;
  border: 1px solid #e2e8f0;
  box-shadow: var(--ym-shadow-sm);
}
.openai-codex-computer-use-windows-2026-page table {
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
  background: #fff;
}
.openai-codex-computer-use-windows-2026-page th,
.openai-codex-computer-use-windows-2026-page td {
  padding: 14px 16px;
  border-bottom: 1px solid #e2e8f0;
  text-align: left;
  vertical-align: top;
}
.openai-codex-computer-use-windows-2026-page th {
  background: #f8fafc;
  font-weight: 700;
  color: #0f172a;
}
.openai-codex-computer-use-windows-2026-page .ym-def-box {
  padding: 16px 20px;
  background: #f8fafc;
  border-radius: 12px;
  border-left: 4px solid var(--ym-accent, #3b82f6);
  margin: 20px 0;
}
.openai-codex-computer-use-windows-2026-page .ym-block-outro {
  font-weight: 600;
  color: #0f172a;
  margin-top: 20px;
}
.ym-cta-card { max-width: 900px; margin: 48px auto; padding: clamp(28px, 4vw, 40px); border-radius: 20px; border: 1px solid var(--ym-border, #e2e8f0); background: var(--ym-surface, #fff); box-shadow: var(--ym-shadow, 0 12px 40px rgba(15,23,42,.08)); text-align: center; }
.ym-cta-eyebrow { margin: 0 0 8px; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--ym-primary, #2563eb); }
.ym-cta-title { margin: 0 0 12px; font-size: clamp(22px, 3vw, 28px); color: var(--ym-heading, #0f172a); }
.ym-cta-lead { margin: 0 0 24px; color: #64748b; font-size: 17px; line-height: 1.6; }
.ym-link-accent { color: var(--ym-accent, #3b82f6); font-weight: 600; text-decoration: underline; }
.ym-cta-inline { margin: 20px 0; }
@media (max-width: 900px) {
  .openai-codex-computer-use-windows-2026-intro { grid-template-columns: 1fr; }
}
</style>

<main id="primary" class="site-main openai-codex-computer-use-windows-2026-page" role="main" tabindex="-1">
<section id="codex-remote-hub" class="codex-remote-hub fullscreen-white-office" aria-labelledby="codex-hero-title">
<style>
.codex-remote-hub {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  width: 100%;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.codex-remote-hub canvas#codex-win-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.codex-hero-badge {
  position: absolute;
  top: clamp(72px, 10vh, 120px);
  left: 50%;
  transform: translateX(-50%);
  z-index: 4;
  padding: 8px 18px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: #0f766e;
  background: rgba(255, 255, 255, 0.95);
  border: 1px solid #99f6e4;
  box-shadow: 0 4px 16px rgba(15, 23, 42, 0.08);
}
.codex-hero-pill {
  position: absolute;
  top: clamp(112px, 14vh, 168px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 8px;
  z-index: 4;
  max-width: min(96vw, 720px);
}
.codex-hero-pill span {
  padding: 8px 14px;
  background: rgba(255, 255, 255, 0.92);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.codex-hero-cta-wrap {
  position: absolute;
  top: clamp(20px, 4vh, 40px);
  left: clamp(16px, 4vw, 48px);
  z-index: 4;
}
.telegram-button {
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
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.18);
}
.telegram-button:hover { transform: translateY(-2px); }
.codex-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  z-index: 4;
  max-width: min(92vw, 640px);
}
.giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0078d4, #10b981);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.8vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 620px;
}
.codex-ui-tasks {
  position: absolute;
  right: clamp(12px, 3vw, 48px);
  bottom: clamp(20px, 5vh, 64px);
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 4;
  max-width: min(88vw, 280px);
}
.codex-ui-task {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}
.codex-ui-task em {
  width: 26px;
  height: 26px;
  font-style: normal;
  background: #0078d4;
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
  .codex-ui-tasks { display: none; }
  .codex-hero-pill span:nth-child(n+3) { display: none; }
}
</style>

  <canvas id="codex-win-hero-canvas" aria-hidden="true"></canvas>

  <div class="codex-hero-cta-wrap">
    <a class="telegram-button" href="<?php echo esc_url( $nero_primary_cta_url ?: '#' ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $nero_primary_cta_label ); ?></a>
  </div>

  <p class="codex-hero-badge">29 мая 2026 · Codex 26.527 · Windows</p>
  <div class="codex-hero-pill" aria-hidden="true">
    <span>Computer Use</span>
    <span>Remote steer</span>
    <span>Sandbox</span>
    <span>GUI без API</span>
  </div>

  <div class="codex-hero-copy">
    <h1 id="codex-hero-title" class="giant-seo">OpenAI Codex на Windows: <span>Computer Use</span></h1>
    <p class="giant-seo-sub">Релиз 29 мая 2026: агент видит экран, кликает в приложениях и управляется с телефона — сценарии для бизнеса и внедрение с Nero Network</p>
  </div>

  <div class="codex-ui-tasks" aria-label="Этапы внедрения Codex">
    <div class="codex-ui-task"><em>1</em> Pairing QR на host</div>
    <div class="codex-ui-task"><em>2</em> Foreground desktop</div>
    <div class="codex-ui-task"><em>3</em> @Computer клики</div>
    <div class="codex-ui-task"><em>4</em> Approve с телефона</div>
    <div class="codex-ui-task"><em>5</em> Пилот Nero Network</div>
  </div>
</section>

<script>
(function codexWinHeroEngine() {
  const canvas = document.getElementById('codex-win-hero-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
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
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 820) * 1.35;
  }
  window.addEventListener('resize', resizeCanvas);
  resizeCanvas();

  const C = {
    outline: '#0f172a',
    winBlue: '#0078d4',
    winBg: '#ffffff',
    winBar: '#e2e8f0',
    phone: '#0f172a',
    phoneScreen: '#f1f5f9',
    beam: '#38bdf8',
    beamAlt: '#10b981',
    spot: 'rgba(0, 120, 212, 0.12)',
    agentYellow: '#eab308',
    agentGreen: '#10b981',
    agentBlue: '#3b82f6',
    agentPink: '#ec4899',
    agentPurple: '#8b5cf6',
    bubbleBg: '#ffffff',
    ok: '#22c55e'
  };

  function drawRR(ctx, x, y, w, h, r, fill, stroke) {
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) {
      ctx.lineWidth = 2;
      ctx.strokeStyle = stroke;
      ctx.stroke();
    }
  }

  class SignalBeamPath {
    constructor(x1, y1, x2, y2) {
      this.x1 = x1; this.y1 = y1; this.x2 = x2; this.y2 = y2;
    }
    draw(ctx) {
      const prg = (frame * 0.06) % 200;
      if (prg < 25 || prg > 175) return;
      const t = (prg - 25) / 150;
      ctx.save();
      ctx.setLineDash([8, 10]);
      ctx.lineDashOffset = -frame * 0.8;
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.beam;
      ctx.beginPath();
      ctx.moveTo(this.x1, this.y1);
      const mx = this.x1 + (this.x2 - this.x1) * 0.45;
      const my = this.y1 - 60;
      ctx.quadraticCurveTo(mx, my, this.x2, this.y2);
      ctx.stroke();
      const px = this.x1 + (this.x2 - this.x1) * t;
      const py = this.y1 + (this.y2 - this.y1) * t - Math.sin(t * Math.PI) * 40;
      drawRR(ctx, px - 6, py - 6, 12, 12, 3, frame % 20 < 10 ? C.beam : C.beamAlt, C.outline);
      ctx.restore();
    }
  }

  class ForegroundSpotlight {
    constructor(x, y, w, h) {
      this.x = x; this.y = y; this.w = w; this.h = h;
    }
    draw(ctx) {
      const prg = (frame * 0.06) % 200;
      if (prg < 35 || prg > 155) return;
      const pulse = 0.85 + Math.sin(frame * 0.08) * 0.15;
      ctx.save();
      ctx.globalAlpha = 0.35 * pulse;
      ctx.fillStyle = C.spot;
      ctx.beginPath();
      ctx.ellipse(this.x, this.y, this.w * pulse, this.h * pulse, 0, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }
  }

  class MobileSteerConsole {
    constructor(x, y) {
      this.x = x; this.y = y;
    }
    draw(ctx) {
      const prg = (frame * 0.06) % 200;
      drawRR(ctx, this.x, this.y, 56, 100, 10, C.phone, C.outline);
      drawRR(ctx, this.x + 6, this.y + 14, 44, 72, 6, C.phoneScreen, C.outline);
      if (prg >= 130) {
        const a = Math.min(1, (prg - 130) / 20);
        ctx.globalAlpha = a;
        drawRR(ctx, this.x + 14, this.y + 38, 28, 28, 14, C.ok, C.outline);
        ctx.fillStyle = '#fff';
        ctx.font = 'bold 16px sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText('✓', this.x + 28, this.y + 58);
        ctx.globalAlpha = 1;
      } else if (prg >= 50) {
        drawRR(ctx, this.x + 10, this.y + 28, 36, 8, 2, '#cbd5e1', null);
        drawRR(ctx, this.x + 10, this.y + 42, 28, 6, 2, '#94a3b8', null);
      }
      if (prg >= 15 && prg < 40) {
        drawRR(ctx, this.x + 8, this.y + 52, 40, 40, 4, '#fff', C.outline);
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 2;
        for (let i = 0; i < 5; i++) {
          ctx.strokeRect(this.x + 14 + (i % 3) * 10, this.y + 58 + Math.floor(i / 3) * 10, 8, 8);
        }
      }
    }
  }

  class WindowsDesktopHub {
    constructor(x, y) {
      this.x = x; this.y = y;
      this.cursorX = 0;
      this.cursorY = 0;
      this.phase = 0;
    }
    draw(ctx) {
      this.phase = (frame * 0.06) % 200;
      const p = this.phase;
      drawRR(ctx, this.x - 20, this.y + 80, 260, 18, 4, '#cbd5e1', C.outline);
      drawRR(ctx, this.x - 30, this.y + 70, 280, 14, 3, '#94a3b8', C.outline);
      drawRR(ctx, this.x, this.y, 240, 160, 8, '#1e293b', C.outline);
      drawRR(ctx, this.x + 8, this.y + 8, 224, 144, 6, C.winBg, C.outline);
      drawRR(ctx, this.x + 8, this.y + 8, 224, 22, [6, 6, 0, 0], C.winBar, C.outline);
      drawRR(ctx, this.x + 14, this.y + 14, 8, 8, 2, '#ef4444', null);
      drawRR(ctx, this.x + 26, this.y + 14, 8, 8, 2, '#facc15', null);
      drawRR(ctx, this.x + 38, this.y + 14, 8, 8, 2, '#10b981', null);

      if (p > 40) {
        drawRR(ctx, this.x + 16, this.y + 38, 95, 58, 4, '#dcfce7', C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = '8px sans-serif';
        ctx.fillText('Excel', this.x + 22, this.y + 52);
        for (let r = 0; r < 3; r++) {
          drawRR(ctx, this.x + 22, this.y + 58 + r * 10, 70, 6, 1, '#86efac', null);
        }
      }
      if (p > 70) {
        drawRR(ctx, this.x + 120, this.y + 48, 100, 70, 4, '#dbeafe', C.outline);
        ctx.fillText('CRM', this.x + 126, this.y + 62);
      }
      if (p > 95 && p < 165) {
        const t = (p - 95) / 70;
        this.cursorX = 40 + t * 140;
        this.cursorY = 70 + Math.sin(t * Math.PI * 2) * 12;
        ctx.save();
        ctx.translate(this.x + this.cursorX, this.y + this.cursorY);
        ctx.fillStyle = C.winBlue;
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(0, 14);
        ctx.lineTo(4, 10);
        ctx.lineTo(8, 16);
        ctx.lineTo(10, 14);
        ctx.lineTo(6, 8);
        ctx.lineTo(12, 8);
        ctx.closePath();
        ctx.fill();
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 1;
        ctx.stroke();
        if (Math.floor(p) % 18 < 3) {
          ctx.globalAlpha = 0.5;
          ctx.beginPath();
          ctx.arc(0, 0, 10, 0, Math.PI * 2);
          ctx.stroke();
        }
        ctx.restore();
      }
      if (p > 155) {
        ctx.font = 'bold 11px sans-serif';
        ctx.fillStyle = C.ok;
        ctx.textAlign = 'center';
        ctx.fillText('GUI OK', this.x + 120, this.y + 130);
      }
      if (p > 25 && p < 45) {
        drawRR(ctx, this.x + 80, this.y + 100, 80, 24, 4, '#f0fdf4', C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = '9px sans-serif';
        ctx.fillText('@Computer', this.x + 92, this.y + 116);
      }
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs) {
      this.x = x; this.y = y; this.baseX = x; this.baseY = y;
      this.color = color; this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
    }
    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.06) % 200;
      let isMoving = false;
      let faceDir = 1;
      let targetX = 60;
      let targetY = -20;
      if (this.role === '5_deployer') { targetX = 200; targetY = 30; }
      if (this.role === '3_coder') { targetX = 30; targetY = 10; }

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        isMoving = true;
        faceDir = local < 11 ? 1 : -1;
        const t = local < 11 ? local / 11 : (local - 11) / 11;
        this.x = (local < 11 ? this.baseX : targetX) + (local < 11 ? targetX - this.baseX : this.baseX - targetX) * t;
        this.y = (local < 11 ? this.baseY : targetY) + (local < 11 ? targetY - this.baseY : this.baseY - targetY) * t;
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
      }

      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 220);
      }

      const bob = Math.sin(this.timer * (isMoving ? 4 : 1.5)) * (isMoving ? 2 : 1);
      ctx.save();
      ctx.translate(this.x, this.y);
      let legL = 0, legR = 0;
      if (isMoving) {
        const w = this.timer * 6;
        legL = Math.sin(w) * 5;
        legR = Math.sin(w + Math.PI) * 5;
      }
      drawRR(ctx, -10, -5 + Math.max(0, legL), 8, 14, 2, C.outline, null);
      drawRR(ctx, -12, 5 + Math.max(0, legL), 12, 6, 2, C.outline, null);
      drawRR(ctx, 2, -5 + Math.max(0, legR), 8, 14, 2, C.outline, null);
      drawRR(ctx, 0, 5 + Math.max(0, legR), 12, 6, 2, C.outline, null);
      drawRR(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);
      const hx = 0, hy = -28 - bob;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(hx, hy, 12, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const hub = new WindowsDesktopHub(-120, -60);
  const phone = new MobileSteerConsole(200, -20);
  entities.push(new ForegroundSpotlight(0, 20, 140, 90));
  entities.push(new SignalBeamPath(200, 30, -40, 10));
  entities.push(hub);
  entities.push(phone);
  entities.push(new Agent(-280, 50, C.agentYellow, '1_architect', 20, ['VM под host', 'Foreground политика', 'Win11 baseline']));
  entities.push(new Agent(-200, 120, C.agentGreen, '2_seo', 45, ['Smoke GUI сценарий', 'Отчёт Excel→PDF', 'KPI по минутам']));
  entities.push(new Agent(-100, 30, C.agentBlue, '3_coder', 75, ['@Computer промпт', 'Клик в CRM', 'Без API цепочка']));
  entities.push(new Agent(-20, 110, C.agentPink, '4_designer', 105, ['Sandbox elevated', 'Allowlist apps', 'UAC не трогаем']));
  entities.push(new Agent(80, 20, C.agentPurple, '5_deployer', 135, ['Steer с телефона', 'Approve diff', 'QR paired']));

  function createBubble(x, y, text, life = 260) {
    bubbles.push({ x, y, text, life, maxLife: life });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));

    const prg = (frame * 0.06) % 200;
    if (prg >= 18 && prg < 18.08) createBubble(200, 0, 'QR pairing…');
    if (prg >= 48 && prg < 48.08) createBubble(-40, -40, 'Foreground desktop');
    if (prg >= 88 && prg < 88.08) createBubble(0, 0, '@Computer клик');
    if (prg >= 138 && prg < 138.08) createBubble(200, 10, 'Approve с телефона');

    ctx.font = 'bold 11px Inter, sans-serif';
    ctx.textAlign = 'center';
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
      drawRR(ctx, bub.x - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.outline;
      ctx.fillText(bub.text, bub.x, by - th / 2);
      ctx.globalAlpha = 1;
    }
    ctx.restore();
    requestAnimationFrame(engineloop);
  }
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(engineloop);
  else engineloop();
})();
</script>

<div class="ym-article-body">
<div class="ym-container">
<section class="ym-section reveal" id="sec-intro" aria-label="Введение">
  <div class="openai-codex-computer-use-windows-2026-intro">
    <div class="openai-codex-computer-use-windows-2026-intro-text">
      <p class="ym-content-lead"><strong>Коротко:</strong> 29 мая 2026 OpenAI выпустила Codex app <strong>26.527</strong> для Windows: агент видит активный рабочий стол, кликает в приложениях (<strong>Computer Use</strong>) и управляется с телефона через ChatGPT. Ниже — механика, ограничения foreground, сценарии для бизнеса, тарифы и сравнение с RPA, Claude и Cursor — без выдуманных обещаний «работает в фоне».</p>
    </div>
    <aside class="openai-codex-computer-use-windows-2026-intro-panel reveal-scale" aria-label="Снимок релиза">
      <div class="ym-mac-window">
        <div class="ym-mac-header"><span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span><span class="ym-mac-title">Codex 26.527 · Windows</span></div>
        <div class="ym-mac-body">
          <div class="ym-command">@Computer</div>
          <div>GUI automation · active desktop</div>
          <div class="ym-comment">remote control · iOS/Android</div>
        </div>
      </div>
    </aside>
  </div>
  <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
    <a href="#sec-release-2026">Релиз 26.527</a>
    <a href="#sec-windows-sandbox">Windows и sandbox</a>
    <a href="#sec-mobile-remote">Пульт с телефона</a>
    <a href="#sec-business-scenarios">Сценарии для бизнеса</a>
    <a href="#sec-pricing">Тарифы и пилот</a>
    <a href="#sec-risks">Риски</a>
    <a href="#sec-comparison">Сравнение</a>
    <a href="#sec-implementation">Внедрение</a>
    <a href="#sec-faq">FAQ</a>
    <a href="#sec-summary">Итог</a>
  </nav>
</section>

<section class="ym-section reveal" id="sec-release-2026">
  <h2>Что изменилось 29 мая 2026: Codex app 26.527 и Computer Use на Windows</h2>
  <div class="ym-def-box"><p><strong>Определение:</strong> <em>Computer Use</em> в Codex — режим, при котором модель управляет <strong>графическим интерфейсом</strong> Windows: видит экран, перемещает курсор, вводит текст и выполняет цепочки действий в приложениях <strong>без готового API</strong>.</p></div>
  <p>По <a href="https://developers.openai.com/codex/changelog">changelog Codex от 29.05.2026</a> в сборке <strong>26.527</strong> для Windows появились:</p>
  <ul>
    <li><strong>Computer Use</strong> — автоматизация через UI на активном рабочем столе;</li>
    <li><strong>remote control</strong> — запуск, просмотр и корректировка задач с iOS/Android ChatGPT или с Mac с установленным Codex;</li>
    <li>обновления <strong>Profile</strong>: детали профиля, usage stats, token activity.</li>
  </ul>
  <p>На macOS похожий слой computer use появился <strong>раньше</strong> — в релизе <strong>26.415 от 16.04.2026</strong> ([changelog, 2026-04-16](https://developers.openai.com/codex/changelog)). Для русскоязычной аудитории важно: Windows получил <strong>паритет по идее «агент на рабочем столе»</strong>, но <strong>не по режиму работы UI</strong> — об этом ниже.</p>
  <h3>Что такое Computer Use в Codex (экран, клики, GUI)</h3>
  <p>Агент не «читает файлы через облако» вместо вас — он <strong>действует как оператор</strong>: открывает окна, нажимает кнопки, заполняет формы. Вызов — через промпты с <code>@Computer</code> или <code>@AppName</code> после установки плагина в <strong>Settings → Computer Use → Install</strong> (<a href="https://developers.openai.com/codex/app/computer-use">документация Computer Use</a>).</p>
  <p>Целевое приложение на Windows должно быть <strong>видимо</strong> на активном desktop. Нельзя автоматизировать терминал/Codex, подтверждения UAC и чужие security prompts — это ограничение безопасности, а не «баг релиза».</p>
  <h3>Отличие от «просто чата» и от классического RPA</h3>
  <div class="ym-table-wrap"><table>
    <thead><tr><th>Подход</th><th>Как работает</th><th>Плюс</th><th>Минус</th></tr></thead>
    <tbody>
      <tr><td>ChatGPT / Codex-чат</td><td>Текст, код, файлы в контексте</td><td>Быстрый старт</td><td>Нет кликов в чужом GUI без Computer Use</td></tr>
      <tr><td><strong>Codex Computer Use</strong></td><td>Пиксели + сценарий на экране</td><td>Приложения <strong>без API</strong>, гибкие цепочки</td><td>Foreground на Windows, лимиты подписки</td></tr>
      <tr><td>Классический <strong>RPA</strong></td><td>Скрипты, селекторы, оркестратор</td><td>Стабильность в проде</td><td>Дорогая разработка и сопровождение</td></tr>
    </tbody>
  </table></div>
  <p class="ym-block-outro"><strong>Итог блока:</strong> релиз 29.05.2026 переводит Windows из статуса «только код и терминал» в статус <strong>«цифровой сотрудник за монитором»</strong> — с жёсткими правилами, где именно этот «монитор» должен быть свободен.</p>
</section>

<section class="ym-section ym-section-alt reveal" id="sec-windows-sandbox">
  <h2>Как работает агент на Windows 11: sandbox, foreground и плагин</h2>
  <h3>Установка плагина Computer Use и разрешения</h3>
  <p>Приложение Codex для Windows ставится из <strong>Microsoft Store</strong> или через <code>winget</code> (<a href="https://developers.openai.com/codex/windows">Codex on Windows</a>). Рекомендованная ОС для enterprise — <strong>Windows 11</strong>; Windows 10 — <strong>best effort</strong> (нужен ConPTY, ориентир сборки <strong>1809+</strong>).</p>
  <p>После установки: <strong>Settings → Computer Use → Install</strong>, затем настройка <strong>approvals</strong>. Computer Use — слой <strong>поверх</strong> sandbox и политик одобрения для GUI.</p>
  <h3>Почему задачи только в foreground (и что делать с VM)</h3>
  <p><strong>Коротко:</strong> на Windows computer use работает на <strong>активном рабочем столе</strong> и <strong>не может</strong> работать в фоне, пока вы пользуетесь той же сессией.</p>
  <p>Цитата из официальной документации: <em>«On Windows, computer use runs on the active desktop. It can't operate in the background while you keep using the same Windows session»</em> — <a href="https://developers.openai.com/codex/app/computer-use">Computer Use – Codex app</a>.</p>
  <p>OpenAI предлагает три рабочих паттерна:</p>
  <ol>
    <li>Держать ПК <strong>разблокированным</strong> и не трогать мышь/клавиатуру на время задачи;</li>
    <li>Управлять с <strong>телефона</strong> (remote control) — ПК остаётся «сценой», вы — режиссёр;</li>
    <li>Запустить агента в <strong>виртуальной машине</strong>, чтобы он занял <strong>отдельный</strong> desktop.</li>
  </ol>
  <p><strong>Миф из русскоязычного топа:</strong> ряд обзоров (в т.ч. <a href="https://habr.com/ru/news/1041378/">Habr News</a>) формулируют, будто Codex на Windows «работает в фоне». Это <strong>противоречит</strong> первоисточнику. В пилоте закладывайте <strong>выделенный host</strong> или VM.</p>
  <p>На <strong>Mac</strong> с апреля 2026 возможности шире — при сравнении продуктов не переносите поведение macOS на Windows автоматически (<a href="https://www.neowin.net/news/openai-rolls-out-major-codex-for-windows-update-with-computer-use-and-mobile-access/">Neowin</a>).</p>
  <h3>Elevated / unelevated / WSL2 (кратко по docs)</h3>
  <p>На native Windows Codex использует sandbox с режимами <code>elevated</code> и <code>unelevated</code>: изоляция файловой системы и сети (<a href="https://developers.openai.com/codex/windows">Codex on Windows</a>). <strong>WSL2</strong> — для dev-задач; Computer Use ориентирован на <strong>нативные GUI-приложения</strong> Windows.</p>
</section>


<section id="openai-codex-computer-use-windows-2026-boris-block" class="ym-section ym-boris-viz reveal" aria-labelledby="boris-viz-title">
<style>
.openai-codex-computer-use-windows-2026-boris-viz {
  padding: 56px 0;
  background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
}
.ym-boris-card {
  max-width: 1200px;
  margin: 0 auto;
  padding: clamp(24px, 4vw, 40px);
  border-radius: 24px;
  border: 1px solid var(--ym-border, #e2e8f0);
  background: #fff;
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
}
.ym-boris-split {
  display: grid;
  grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
  gap: clamp(24px, 4vw, 40px);
  align-items: center;
}
.ym-boris-eyebrow {
  margin: 0 0 10px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--ym-primary, #2563eb);
}
.ym-boris-kicker {
  margin: 0 0 14px;
  font-size: clamp(22px, 3vw, 28px);
  font-weight: 800;
  color: var(--ym-heading, #0f172a);
  line-height: 1.2;
}
.ym-boris-bridge {
  margin: 0 0 20px;
  color: #475569;
  font-size: 16px;
  line-height: 1.6;
}
.ym-boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin: 0 0 18px;
  padding: 0;
  list-style: none;
}
.ym-boris-pills li {
  padding: 8px 14px;
  border-radius: 999px;
  background: #eff6ff;
  border: 1px solid #bfdbfe;
  font-size: 13px;
  font-weight: 600;
  color: #1e40af;
}
.ym-boris-stats {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 12px;
}
.ym-boris-stat {
  padding: 14px;
  border-radius: 14px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
}
.ym-boris-stat strong {
  display: block;
  font-size: 20px;
  color: #0f172a;
  margin-bottom: 4px;
}
.ym-boris-stat span {
  font-size: 12px;
  color: #64748b;
  line-height: 1.4;
}
.ym-boris-canvas-wrap {
  position: relative;
  min-height: 420px;
  border-radius: 18px;
  overflow: hidden;
  background: linear-gradient(145deg, #eef2ff 0%, #f8fafc 55%, #ffffff 100%);
  border: 1px solid #e2e8f0;
}
#codex-remote-host-canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 420px;
}
@media (max-width: 1023px) {
  .ym-boris-split { grid-template-columns: 1fr; }
  .ym-boris-canvas-wrap { min-height: 360px; }
  #codex-remote-host-canvas { min-height: 360px; }
}
@media (max-width: 767px) {
  .ym-boris-stats { grid-template-columns: 1fr; }
}
</style>
<div class="ym-container">
  <div class="ym-boris-card">
    <div class="ym-boris-split">
      <div class="ym-boris-copy">
        <p class="ym-boris-eyebrow">Сцена 2 · host + пульт</p>
        <h3 class="ym-boris-kicker" id="boris-viz-title">Выделенный desktop и телефон как консоль согласований</h3>
        <p class="ym-boris-bridge">Продолжение метафоры hero: агент занял отдельный рабочий стол Windows, а руководитель одобряет шаги с телефона — без мифа про «фон» на том же экране бухгалтера.</p>
        <ul class="ym-boris-pills" aria-label="Паттерны пилота">
          <li>Foreground host</li>
          <li>QR remote</li>
          <li>VM desktop</li>
        </ul>
        <div class="ym-boris-stats">
          <div class="ym-boris-stat"><strong>1</strong><span>активный desktop на host</span></div>
          <div class="ym-boris-stat"><strong>0</strong><span>параллельной работы в той же сессии</span></div>
          <div class="ym-boris-stat"><strong>3</strong><span>паттерна: unlock · phone · VM</span></div>
        </div>
      </div>
      <div class="ym-boris-canvas-wrap" aria-hidden="true">
        <canvas id="codex-remote-host-canvas" role="img" aria-label="Анимация: Windows host с агентом на экране и телефон-пульт согласований"></canvas>
      </div>
    </div>
  </div>
</div>
<script>
(function () {
  var canvas = document.getElementById("codex-remote-host-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var w = 0, h = 0, t = 0;
  var C = {
    ink: "#0f172a",
    desk: "#ffffff",
    deskEdge: "#cbd5e1",
    win: "#f1f5f9",
    accent: "#2563eb",
    green: "#10b981",
    phone: "#1e293b",
    glow: "rgba(37, 99, 235, 0.25)"
  };
  function resize() {
    var box = canvas.parentElement;
    if (!box) return;
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    w = box.clientWidth;
    h = Math.max(box.clientHeight, 360);
    canvas.width = Math.floor(w * dpr);
    canvas.height = Math.floor(h * dpr);
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }
  function rr(x, y, wd, ht, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, wd, ht, r);
    else ctx.rect(x, y, wd, ht);
    if (fill) { ctx.fillStyle = fill; ctx.fill(); }
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
  }
  function drawMonitor(cx, cy, mw, mh, phase) {
    rr(cx - mw / 2, cy - mh / 2, mw, mh, 10, C.desk, C.ink);
    rr(cx - mw / 2 + 10, cy - mh / 2 + 10, mw - 20, mh - 42, 6, C.win, C.deskEdge);
    var appX = cx - mw / 2 + 24;
    var appY = cy - mh / 2 + 28;
    rr(appX, appY, mw - 48, mh - 70, 4, "#fff", "#e2e8f0");
    rr(appX + 12, appY + 14, 70, 10, 3, "#e2e8f0", null);
    rr(appX + 12, appY + 34, mw - 84, 12, 3, "#dbeafe", null);
    var clickX = appX + 90 + Math.sin(phase * 0.04) * 40;
    var clickY = appY + 70 + Math.cos(phase * 0.03) * 12;
    ctx.fillStyle = C.accent;
    ctx.beginPath();
    ctx.moveTo(clickX, clickY);
    ctx.lineTo(clickX + 14, clickY + 18);
    ctx.lineTo(clickX + 4, clickY + 16);
    ctx.closePath();
    ctx.fill();
    ctx.strokeStyle = C.ink;
    ctx.lineWidth = 1.5;
    ctx.stroke();
    if (Math.sin(phase * 0.08) > 0.6) {
      ctx.strokeStyle = C.glow;
      ctx.lineWidth = 8;
      ctx.beginPath();
      ctx.arc(clickX + 6, clickY + 10, 16, 0, Math.PI * 2);
      ctx.stroke();
    }
    rr(cx - 26, cy + mh / 2 - 6, 52, 10, 4, C.deskEdge, C.ink);
  }
  function drawPhone(px, py, pw, ph, pulse) {
    rr(px, py, pw, ph, 16, C.phone, C.ink);
    rr(px + 8, py + 22, pw - 16, ph - 44, 12, "#0b1220", null);
    rr(px + 14, py + 36, pw - 28, 48, 8, "#1e3a5f", null);
    var btnY = py + ph - 72;
  rr(px + 18, btnY, pw - 36, 28, 8, pulse > 0.5 ? C.green : C.accent, null);
    ctx.fillStyle = "#fff";
    ctx.font = "600 11px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("Approve", px + pw / 2, btnY + 18);
    if (pulse > 0.5) {
      ctx.strokeStyle = "rgba(16, 185, 129, 0.5)";
      ctx.lineWidth = 3;
      ctx.beginPath();
      ctx.arc(px + pw / 2, btnY + 14, 22 + pulse * 6, 0, Math.PI * 2);
      ctx.stroke();
    }
  }
  function drawVmBadge(x, y) {
    rr(x, y, 118, 28, 14, "#eff6ff", "#93c5fd");
    ctx.fillStyle = "#1d4ed8";
    ctx.font = "700 11px Inter, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("VM desktop", x + 59, y + 18);
  }
  function frame() {
    t += 1;
    ctx.clearRect(0, 0, w, h);
    var pulse = (Math.sin(t * 0.06) + 1) / 2;
    var monitorW = Math.min(340, w * 0.52);
    var monitorH = monitorW * 0.62;
    drawMonitor(w * 0.38, h * 0.52, monitorW, monitorH, t);
    drawPhone(w * 0.72, h * 0.28, Math.min(110, w * 0.18), Math.min(200, h * 0.48), pulse);
    drawVmBadge(w * 0.08, h * 0.12);
    ctx.setLineDash([6, 6]);
    ctx.strokeStyle = "#94a3b8";
    ctx.lineWidth = 1.5;
    ctx.beginPath();
    ctx.moveTo(w * 0.72 + 55, h * 0.42);
    ctx.quadraticCurveTo(w * 0.55, h * 0.35, w * 0.38, h * 0.42);
    ctx.stroke();
    ctx.setLineDash([]);
    requestAnimationFrame(frame);
  }
  window.addEventListener("resize", resize);
  resize();
  frame();
})();
</script>
</section>


<section class="ym-section reveal" id="sec-mobile-remote">
  <h2>Управление с телефона: ChatGPT mobile и удалённый пульт ПК</h2>
  <p>С <strong>29.05.2026</strong> Windows стал полноценным <strong>host</strong> для remote connections: pairing через <strong>QR</strong> в sidebar Codex (<a href="https://developers.openai.com/codex/remote-connections">Remote connections</a>).</p>
  <h3>Workflow «ПК — хост, телефон — пульт»</h3>
  <ol>
    <li>На рабочем ПК запускается длинная GUI-задача (отчёт, тест, installer check).</li>
    <li>Руководитель или QA <strong>с телефона</strong> смотрит скриншоты, одобряет шаги, правит промпт.</li>
    <li>Параллельно на основном столе <strong>не ведётся</strong> другая работа в той же сессии — либо используется VM.</li>
  </ol>
  <h3>Когда это удобно бизнесу</h3>
  <ul>
    <li><strong>Согласование</strong> чувствительных шагов без физического доступа к кабинету;</li>
    <li><strong>Смоук-тесты</strong> релиза ночью: ПК в офисе, инженер на связи с телефона;</li>
    <li><strong>Поддержка</strong>: воспроизведение UI-only бага с удалённым steer.</li>
  </ul>
</section>

<section class="ym-section ym-section-alt reveal" id="sec-business-scenarios">
  <h2>Сценарии для бизнеса: где Computer Use окупается</h2>
  <p>Боль из практики SMB: <strong>30–40% времени</strong> уходит на рутину между приложениями. Computer Use <strong>сокращает</strong> ручные клики там, где API нет или он дороже пилота.</p>
  <h3>GUI-тесты, installer checks, воспроизведение багов</h3>
  <ul>
    <li><strong>GUI-тесты</strong> Windows-приложений;</li>
    <li><strong>Installer / settings flows</strong>;</li>
    <li><strong>Reproduction UI-only багов</strong>.</li>
  </ul>
  <h3>Поддержка, отчёты, кросс-приложенческие цепочки без API</h3>
  <ul>
    <li>Выгрузка из <strong>Excel / веб-кабинета</strong> → сводка в <strong>Word/PDF</strong>;</li>
    <li>Копирование данных между <strong>CRM и таблицей</strong>;</li>
    <li>Пакетная обработка <strong>однотипных форм</strong> в legacy-ПО.</li>
  </ul>
  <h3>Что не стоит отдавать агенту</h3>
  <ul>
    <li>Задачи с <strong>параллельной</strong> работой на том же desktop;</li>
    <li>Операции с <strong>UAC</strong>, платёжными окнами;</li>
    <li>Массовую обработку <strong>ПДн</strong> без DPA;</li>
    <li>«Фоновый» мониторинг 24/7 — для этого <strong>RPA + сервер</strong>.</li>
  </ul>
  <p class="ym-block-outro"><strong>Итог:</strong> окупаемость выше в <strong>повторяемых GUI-сценариях</strong> с измеримым временем.</p>
  <!-- NATASHA:CTA_cta-mid-primary -->
<aside class="ym-cta-card reveal" id="cta-mid-primary" aria-label="Заявка на AI-аудит и пилот Codex">
  <p class="ym-cta-eyebrow">Nero Network</p>
  <h3 class="ym-cta-title">Пилот Codex Computer Use под ваш Windows-хост</h3>
  <p class="ym-cta-lead">Разберём 2–3 повторяемых GUI-сценария (отчёт, smoke-тест, баг-репродукция), настроим sandbox и связку с Make/n8n — без обещаний «агент в фоне на рабочем ПК бухгалтера».</p>
  <div class="ym-btn-group"><a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( $nero_primary_cta_label ); ?></span></a></div>
</aside>
<!-- /NATASHA:CTA_cta-mid-primary -->
</section>

<section class="ym-section reveal" id="sec-pricing">
  <h2>Тарифы ChatGPT Plus / Pro / Enterprise и корпоративный пилот</h2>
  <p>Codex входит в линейку <strong>ChatGPT Free / Go / Plus / Pro / Business / Enterprise</strong>. Лимиты — в <strong>скользящем окне 5 часов</strong> (<a href="https://developers.openai.com/codex/pricing">Codex Pricing</a>).</p>
  <h3>Лимиты Computer Use и кого пускать в пилот</h3>
  <div class="ym-table-wrap"><table>
    <thead><tr><th>Роль</th><th>Задача в пилоте</th><th>План</th></tr></thead>
    <tbody>
      <tr><td>Владелец / ops</td><td>1–2 сценария, KPI по минутам</td><td>Plus/Pro + выделенный PC</td></tr>
      <tr><td>QA</td><td>smoke GUI, installer</td><td>Pro, VM</td></tr>
      <tr><td>IT</td><td>sandbox elevated, allowlist</td><td>Business/Enterprise</td></tr>
      <tr><td>Все</td><td>обучение «не кликать на host»</td><td>внутренний гайд</td></tr>
    </tbody>
  </table></div>
  <p><strong>02.06.2026</strong> Axios: <strong>&gt;4 млн WAU</strong> Codex; knowledge workers — около <strong>1/5</strong> базы (<a href="https://www.axios.com/2026/06/02/openai-codex-knowledge-workers">Axios</a>).</p>
</section>

<section class="ym-section ym-section-alt reveal" id="sec-risks">
  <h2>Риски: безопасность, ЕЭА/UK, ошибки релиза</h2>
  <h3>Региональная недоступность (ЕЭА, UK, CH)</h3>
  <p>Computer use <strong>на старте недоступен</strong> в <strong>EEA, Великобритании и Швейцарии</strong>. <strong>РФ в списке исключений не указана</strong> — корпоративный пилот требует проверки <strong>workspace, DPA</strong> (<a href="https://developers.openai.com/codex/app/computer-use">Computer Use</a>).</p>
  <h3>Foreground-only vs Mac background</h3>
  <ul>
    <li><strong>Host Windows</strong> (физический или VM) + <strong>телефон как пульт</strong>;</li>
    <li><strong>Allowlist</strong> приложений в approvals;</li>
    <li><strong>Журнал</strong> промптов и скриншотов для аудита;</li>
    <li>Разделение <strong>Codex GUI</strong> и <strong>Make/n8n</strong>.</li>
  </ul>
</section>

<section class="ym-section reveal" id="sec-comparison">
  <h2>Codex vs Claude Computer Use vs Cursor Automations</h2>
  <div class="ym-table-wrap"><table>
    <thead><tr><th>Критерий</th><th><strong>OpenAI Codex</strong></th><th><strong>Claude Desktop</strong></th><th><strong>Cursor 3.6</strong></th><th><strong>RPA</strong></th></tr></thead>
    <tbody>
      <tr><td>GUI Windows</td><td>Да, foreground</td><td>С 10.02.2026 в обзорах</td><td><strong>Нет</strong> pixel-level</td><td>Да, селекторы</td></tr>
      <tr><td>Dev loop</td><td>Сильный</td><td>Средний</td><td><strong>Сильный</strong></td><td>Слабый</td></tr>
      <tr><td>Mobile steer</td><td>Win host с 29.05</td><td>Зависит</td><td>Нет</td><td>Редко</td></tr>
      <tr><td>Стабильность</td><td>Пилот</td><td>Пилот</td><td>Code-review</td><td>Высокая</td></tr>
    </tbody>
  </table></div>
  <p><strong>29.05.2026</strong> Cursor <strong>Auto-review</strong> — другой слой: Shell/MCP, <strong>не замена</strong> Computer Use (<a href="https://cursor.com/changelog">Cursor changelog 3.6</a>).</p>
  <ul>
    <li><strong>Codex</strong> — клики, installer, UI-only баги;</li>
    <li><strong>Cursor</strong> — репозиторий, automations в Git;</li>
    <li><strong>Make/n8n</strong> — API, расписания;</li>
    <li><strong>RPA</strong> — compliance и предсказуемые шаги.</li>
  </ul>
</section>

<section class="ym-section ym-section-alt reveal" id="sec-implementation">
  <h2>AI-агент для бизнеса без отдела разработки: от идеи к внедрению</h2>
  <h3>Автоматизация без программиста и роль «цифрового сотрудника»</h3>
  <p><strong>Цифровой сотрудник</strong> — <strong>конфигурация</strong>: Windows 11 host, sandbox, 2–3 сценария с KPI, обучение не мешать foreground-сессии.</p>
  <h3>Связка Codex + Make/n8n + обучение вайб-кодингу (Nero Network)</h3>
  <ol>
    <li><strong>Диагностика</strong> — 30–40% рутины как повторяющиеся клики;</li>
    <li><strong>Пилот 2 недели</strong> — один host, один сценарий;</li>
    <li><strong>Make/n8n</strong> — триггер → задача в Codex;</li>
    <li><strong>Cursor / вайб-кодинг</strong> — когда появляется API;</li>
    <li><strong>Сопровождение</strong> — лимиты 5h, Enterprise.</li>
  </ol>
  <p class="ym-cta-inline reveal"><a class="ym-link-accent" href="<?php echo esc_url( $nero_secondary_cta_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $nero_secondary_cta_label ); ?></a> — сверьте, какие процессы чаще всего отдают на Make/n8n или Codex до заказа пилота.</p>
  <p>Мы <strong>не продаём подписку OpenAI</strong> — продаём <strong>пилот, обучение и сопровождение</strong>.</p>
</section>

<section class="ym-section reveal" id="sec-faq">
  <h2>FAQ</h2>
  <div class="ym-faq-layout">
    <aside class="ym-faq-sidebar reveal-left">
      <ul class="ym-faq-list">
        <li><a href="#faq-win11">Windows 11</a></li>
        <li><a href="#faq-parallel">Параллельная работа</a></li>
        <li><a href="#faq-background">Фон на Windows</a></li>
        <li><a href="#faq-1c">1С и CRM</a></li>
        <li><a href="#faq-eea">ЕС и UK</a></li>
        <li><a href="#faq-repeat">Повторить сценарий</a></li>
        <li><a href="#faq-cursor">Codex vs Cursor</a></li>
      </ul>
    </aside>
    <div class="ym-faq-content">
      <article class="ym-faq-item reveal" id="faq-win11"><h3>Нужен ли Windows 11?</h3><p>Для enterprise OpenAI <strong>рекомендует Windows 11</strong>. Windows 10 — best effort. <a href="https://developers.openai.com/codex/windows">Codex on Windows</a>.</p></article>
      <article class="ym-faq-item reveal delay-100" id="faq-parallel"><h3>Можно ли параллельно работать за тем же ПК?</h3><p>В <strong>той же сессии</strong> — <strong>нет</strong>. Решения: VM, отдельный host, управление с телефона.</p></article>
      <article class="ym-faq-item reveal delay-100" id="faq-background"><h3>Работает ли Codex в фоне на Windows?</h3><p><strong>Нет</strong> по официальной документации. Осторожно с <a href="https://habr.com/ru/news/1041378/">Habr</a>.</p></article>
      <article class="ym-faq-item reveal delay-200" id="faq-1c"><h3>Заменяет ли Codex 1С, CRM, банк-клиент?</h3><p><strong>Нет.</strong> Для стабильного обмена данными — API + Make/n8n.</p></article>
      <article class="ym-faq-item reveal delay-200" id="faq-eea"><h3>Доступен ли Computer Use в ЕС и UK?</h3><p>На старте — <strong>нет</strong> (EEA, UK, CH).</p></article>
      <article class="ym-faq-item reveal delay-300" id="faq-repeat"><h3>Как повторить сценарий под мой бизнес?</h3><p>Опишите цепочку «приложение A → B → отчёт». Напишите в <a class="ym-link-accent" href="<?php echo esc_url( $nero_primary_cta_url ); ?>" target="_blank" rel="noopener noreferrer">Telegram Nero Network</a>.</p></article>
      <article class="ym-faq-item reveal delay-300" id="faq-cursor"><h3>Чем Codex отличается от Cursor Automations?</h3><p>Codex — <strong>экран и клики</strong>; Cursor 3.6 — <strong>код и auto-review</strong>.</p></article>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt reveal" id="sec-summary">
  <h2>Итог</h2>
  <p>29 мая 2026 <strong>OpenAI Codex</strong> на Windows стал практичным <strong>AI-агентом для рабочего места</strong>: Computer Use, mobile remote, sandbox. Ограничение <strong>foreground</strong> и регионы <strong>EEA/UK/CH</strong> — основа архитектуры пилота.</p>
  <p>Для бизнеса выигрыш в <strong>связке</strong>: host, Make/n8n, Cursor, сопровождение внедрения.</p>
  <!-- NATASHA:CTA_cta-final -->
<aside class="ym-cta-card reveal" id="cta-final" aria-label="Итоговый призыв к действию Nero Network">
  <p class="ym-cta-eyebrow">Nero Network</p>
  <h3 class="ym-cta-title">Готовы повторить сценарий Codex под свой бизнес?</h3>
  <p class="ym-cta-lead">Опишите цепочку «приложение A → B → отчёт» — подберём host, лимиты подписки и план внедрения: пилот, обучение, сопровождение.</p>
  <div class="ym-btn-group"><a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( $nero_primary_cta_label ); ?></span></a>
    <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $nero_secondary_cta_url ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( $nero_secondary_cta_label ); ?></span></a></div>
</aside>
<!-- /NATASHA:CTA_cta-final -->
  <p class="ym-content-meta"><em>Материал опирается на первоисточники OpenAI Developers, OpenAI/Axios и Neowin/Thurrott; Habr — с проверкой тезиса про «фон».</em></p>
</section>

<!-- NATASHA:AD_BANNER — не настроен: AD_BANNER_URL / AD_BANNER_IMAGE_URL пусты в env -->

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "OpenAI Codex на Windows: Computer Use — как внедрить AI-агента для автоматизации рабочего места",
      "description": "Codex 26.527: Computer Use на Windows 11 — агент кликает в приложениях, пульт с телефона. Сценарии для бизнеса, sandbox и внедрение с Nero Network.",
      "datePublished": "2026-06-02",
      "dateModified": "2026-06-02",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "inLanguage": "ru-RU",
      "about": ["OpenAI Codex", "Computer Use", "Windows automation", "AI agent for business"]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "Нужен ли Windows 11?", "acceptedAnswer": { "@type": "Answer", "text": "Для enterprise OpenAI рекомендует Windows 11. Windows 10 — best effort." } },
        { "@type": "Question", "name": "Можно ли параллельно работать за тем же ПК?", "acceptedAnswer": { "@type": "Answer", "text": "В той же сессии — нет. Решения: VM, отдельный host, управление с телефона." } },
        { "@type": "Question", "name": "Работает ли Codex в фоне на Windows?", "acceptedAnswer": { "@type": "Answer", "text": "Нет по официальной документации OpenAI." } },
        { "@type": "Question", "name": "Заменяет ли Codex 1С, CRM, банк-клиент?", "acceptedAnswer": { "@type": "Answer", "text": "Нет. Он автоматизирует действия в интерфейсе; для обмена данными — API и Make/n8n." } },
        { "@type": "Question", "name": "Доступен ли Computer Use в ЕС и UK?", "acceptedAnswer": { "@type": "Answer", "text": "На старте — нет (EEA, UK, CH)." } },
        { "@type": "Question", "name": "Чем Codex отличается от Cursor Automations?", "acceptedAnswer": { "@type": "Answer", "text": "Codex — экран и клики; Cursor — код, терминал, auto-review без pixel-level GUI на Windows desktop." } }
      ]
    }
  ]
}
</script>

</div>
</div>
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
<!-- /wp:html -->

<?php
get_footer();
