<?php
/**
 * Template Name: Salesforce Claude Code Agentic Dev
 * Description: Лонгрид — кейс Salesforce + Claude Code, агентная разработка.
 */

require_once get_stylesheet_directory() . '/includes/nn-cta.php';

$page_seo_title = 'Salesforce и Claude Code: 13 дней вместо 231 — агентная разработка';
$page_seo_description = 'Кейс Salesforce 2026: миграция 33 API за 13 дней, +79% PR, −5% инцидентов. Как повторить агентную разработку с Claude Code, CLAUDE.md и rule-фреймворком в своём бизнесе — без штата из 10 000 разработчиков.';

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
<?php echo nn_longread_support_styles(); ?>
/**
 * ЭТАЛОННЫЕ СТИЛИ ЛОНГРИДА (страница «Яндекс Метрика Skill» из эталонной темы владельца).
 *
 * Исходник темы: page-yandex-metrika-skill.php (inline <style>).
 * Для дизайнера Наташи: открывай этот файл «как есть» — не ходи на сайт за CSS.
 *
 * Как использовать на новой странице:
 * - Скопируй в тему или в блок <style>; в селекторах замени класс обёртки
 *   `.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page { --page-class: 'salesforce-claude-code-13-dnej-agentnaya-razrabotka-page'; }
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #0176d3;
    --ym-accent: #0ea5e9;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(1, 118, 211, 0.15);
}

.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h1,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h2,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h3,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h4,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h5,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page p,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page li,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page :not(#sf-orchestration-hero):not(#sf-orchestration-hero *) span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span):not(.nn-hero-btn span),
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page strong,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page pre, .salesforce-claude-code-13-dnej-agentnaya-razrabotka-page code {
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


.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#sf-orchestration-hero.fullscreen-white-office.sf-hero-bridge {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.sf-intro-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 40px;
  align-items: start;
}
.sf-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: 24px;
}
.sf-intro-text p {
  text-align: left !important;
}
.sf-intro-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--ym-primary);
  margin: 0 0 12px;
}
.sf-intro-lead {
  font-size: 1.15rem;
  line-height: 1.55;
  margin: 0 0 14px;
}
.sf-intro-sub {
  font-size: 0.98rem;
  line-height: 1.55;
  color: #64748b !important;
  margin: 0;
}
.ym-toc-wrap {
  margin-top: 48px;
  text-align: center;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section table {
  width: 100%;
  border-collapse: collapse;
  margin: 1.5rem 0;
  font-size: 0.95rem;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section th,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section th {
  background: #f1f5f9;
  font-weight: 700;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section h2 {
  font-size: 2rem;
  font-weight: 800;
  margin: 0 0 1rem;
  scroll-margin-top: 100px;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section h3 {
  font-size: 1.35rem;
  font-weight: 700;
  margin: 2rem 0 0.75rem;
  scroll-margin-top: 100px;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section h4 {
  font-size: 1.1rem;
  margin: 1.5rem 0 0.5rem;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section p,
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section li {
  line-height: 1.65;
  margin-bottom: 1rem;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section a {
  color: var(--ym-accent);
  text-decoration: underline;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section ol {
  padding-left: 1.25rem;
}
.salesforce-claude-code-13-dnej-agentnaya-razrabotka-page .ym-content-section hr {
  border: none;
  border-top: 1px solid var(--ym-border);
  margin: 2rem 0;
}
@media (max-width: 900px) {
  .sf-intro-grid { grid-template-columns: 1fr; }
  .sf-intro-deco { order: 2; }
}

</style>

<main id="primary" class="site-main salesforce-claude-code-13-dnej-agentnaya-razrabotka-page" role="main" tabindex="-1">
<section id="sf-orchestration-hero" class="fullscreen-white-office sf-hero-bridge" aria-label="Hero: агентная оркестрация Salesforce и Claude Code">
<style>
.fullscreen-white-office.sf-hero-bridge {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #ffffff 0%, #f0f9ff 48%, #f8fafc 100%);
}
.sf-hero-bridge::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(14, 165, 233, 0.06) 1px, transparent 1px),
    linear-gradient(90deg, rgba(14, 165, 233, 0.06) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
  z-index: 0;
}
.sf-hero-bridge canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.sf-hero-metrics {
  position: absolute;
  top: clamp(16px, 3vh, 40px);
  right: clamp(16px, 4vw, 48px);
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: flex-end;
  max-width: min(420px, 90vw);
  z-index: 4;
}
.sf-hero-metrics span {
  padding: 8px 14px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 700;
  color: #0f4c81;
  box-shadow: 0 2px 10px rgba(15, 76, 129, 0.08);
}
.sf-hero-phases {
  position: absolute;
  left: clamp(12px, 3vw, 40px);
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 4;
  max-width: 220px;
}
.sf-hero-phase {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  background: rgba(255, 255, 255, 0.92);
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
}
.sf-hero-phase i {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #0ea5e9, #6366f1);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-style: normal;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.sf-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  z-index: 4;
  max-width: min(720px, 92vw);
  padding-right: 16px;
}
.giant-seo {
  font-size: clamp(28px, 4.2vw, 58px);
  font-weight: 900;
  line-height: 1.1;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0284c7, #7c3aed);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.8vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 680px;
}
.telegram-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 20px;
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
.telegram-button:hover { transform: translateY(-2px); }
@media (max-width: 900px) {
  .sf-hero-phases { top: auto; bottom: 42%; transform: none; max-width: 160px; }
  .sf-hero-phase { font-size: 11px; padding: 8px 10px; }
  .sf-hero-copy { bottom: clamp(16px, 4vh, 32px); }
}
</style>

<canvas id="sf-agent-bridge-canvas" aria-hidden="true"></canvas>

<div class="sf-hero-metrics vl-ui-pill" role="group" aria-label="Метрики кейса">
  <span>13 дней</span>
  <span>231 person-day</span>
  <span>33 API</span>
  <span>+79% PR</span>
</div>

<nav class="sf-hero-phases vl-ui-tasks" aria-label="Этапы агентной миграции">
  <div class="sf-hero-phase vl-ui-task"><i>1</i> Rule-framework</div>
  <div class="sf-hero-phase vl-ui-task"><i>2</i> Оркестрация агентов</div>
  <div class="sf-hero-phase vl-ui-task"><i>3</i> Build / fix / validate</div>
  <div class="sf-hero-phase vl-ui-task"><i>4</i> PR → ruleset</div>
  <div class="sf-hero-phase vl-ui-task"><i>5</i> Merge и метрики</div>
</nav>

<div class="sf-hero-copy">
  <h1 class="giant-seo">Salesforce и Claude Code:
    <span>миграция за 13 дней вместо 231</span>
    — как повторить агентную разработку в своём бизнесе</h1>
  <p class="giant-seo-sub">Кейс 2026: +79% pull request'ов, −5% инцидентов и rule-based фреймворк — что внедрить команде без бюджета Fortune 500</p>
  <?php echo nn_hero_cta_buttons(); ?>
</div>

<script id="sf-agent-bridge-engine">
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("sf-agent-bridge-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    if (!canvas.parentElement) return;
    canvas.width = canvas.parentElement.clientWidth || window.innerWidth;
    canvas.height = canvas.parentElement.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw / 2;
    cy = ch / 2 - 40;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 700) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    hubFill: "#f8fafc",
    hubAccent: "#0ea5e9",
    ruleGreen: "#a7f3d0",
    apiBlue: "#93c5fd",
    validate: "#10b981",
    merge: "#8b5cf6",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    grid: "rgba(14, 165, 233, 0.15)"
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

  class GridWave {
    draw(ctx) {
      const t = frame * 0.02;
      ctx.strokeStyle = C.grid;
      ctx.lineWidth = 1;
      for (let i = -4; i <= 4; i++) {
        const y = i * 55 + Math.sin(t + i) * 6;
        ctx.beginPath();
        ctx.moveTo(-400, y);
        ctx.lineTo(400, y + Math.sin(t * 1.3) * 8);
        ctx.stroke();
      }
    }
  }

  class EndpointOrbitStream {
    constructor() {
      this.nodes = Array.from({ length: 8 }, (_, i) => ({
        angle: (i / 8) * Math.PI * 2,
        label: i < 3 ? "API" : ""
      }));
    }
    draw(ctx) {
      const prg = (frame * 0.045) % 220;
      const rx = 200;
      const ry = 72;
      const speed = 0.018 + (prg > 160 ? 0.008 : 0);
      this.nodes.forEach((n, i) => {
        n.angle += speed;
        const px = Math.cos(n.angle) * rx;
        const py = Math.sin(n.angle) * ry - 30;
        const pulse = prg > 120 && prg < 175 ? 1 + Math.sin(frame * 0.2 + i) * 0.15 : 1;
        drawPolyRound(ctx, px - 14 * pulse, py - 10 * pulse, 28 * pulse, 20 * pulse, 4, C.apiBlue, C.outline);
        if (n.label) {
          ctx.fillStyle = C.outline;
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText(n.label, px, py + 3);
        }
        if (prg > 125 && prg < 170) {
          ctx.fillStyle = C.validate;
          ctx.font = "bold 10px sans-serif";
          ctx.fillText("✓", px + 10, py - 8);
        }
      });
      ctx.strokeStyle = C.hubAccent;
      ctx.lineWidth = 1.5;
      ctx.setLineDash([6, 8]);
      ctx.beginPath();
      ctx.ellipse(0, -30, rx, ry, 0, 0, Math.PI * 2);
      ctx.stroke();
      ctx.setLineDash([]);
    }
  }

  class FeedbackArc {
    draw(ctx) {
      const prg = (frame * 0.045) % 220;
      if (prg < 70 || prg > 155) return;
      const alpha = Math.min(1, (prg - 70) / 25);
      ctx.globalAlpha = alpha * 0.85;
      ctx.strokeStyle = C.merge;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.arc(90, 40, 50, Math.PI * 0.9, Math.PI * 1.6);
      ctx.stroke();
      drawPolyRound(ctx, 118, 18, 52, 16, 4, C.ruleGreen, C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("PR→rules", 144, 29);
      ctx.globalAlpha = 1;
    }
  }

  class SandboxRing {
    draw(ctx) {
      const pods = [[-160, 55], [160, 55], [-100, 95], [100, 95]];
      const prg = (frame * 0.045) % 220;
      pods.forEach((p, i) => {
        const glow = prg > 55 && prg < 130 && i === frame % 4;
        drawPolyRound(ctx, p[0] - 18, p[1] - 12, 36, 24, 4, glow ? "#e0f2fe" : "#fff", C.outline);
        if (glow) {
          ctx.fillStyle = C.validate;
          ctx.font = "9px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText("CI", p[0], p[1] + 4);
        }
      });
    }
  }

  class RuleFrameworkCore {
    constructor() {
      this.mergeFlash = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.045) % 220;
      ctx.lineJoin = "round";

      drawPolyRound(ctx, -70, -95, 140, 130, 10, C.hubFill, C.outline);
      drawPolyRound(ctx, -62, -88, 124, 22, [8, 8, 0, 0], "#e0f2fe", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("CLAUDE.md + rules/", -54, -74);

      if (prg > 25) {
        for (let i = 0; i < 4; i++) {
          drawPolyRound(ctx, -54, -58 + i * 14, 90 + (i % 2) * 20, 8, 2, i % 2 ? C.ruleGreen : "#fff", C.outline);
        }
      }

      if (prg > 90 && prg < 175) {
        ctx.strokeStyle = C.hubAccent;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(-40, -20);
        ctx.lineTo(40, -20);
        ctx.stroke();
        ctx.font = "bold 11px sans-serif";
        ctx.textAlign = "center";
        ctx.fillStyle = C.outline;
        ctx.fillText("build → fix → validate", 0, -12);
      }

      if (prg >= 175) {
        this.mergeFlash = Math.min(1, this.mergeFlash + 0.08);
        ctx.globalAlpha = this.mergeFlash;
        drawPolyRound(ctx, -48, 5, 96, 32, 6, C.merge, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 12px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("MERGED", 0, 26);
        ctx.globalAlpha = 1;
        if (prg >= 185 && prg < 215) {
          ctx.font = "900 22px Inter, sans-serif";
          ctx.fillStyle = "#0284c7";
          ctx.strokeStyle = "#fff";
          ctx.lineWidth = 3;
          ctx.strokeText("13 : 231", 0, -115);
          ctx.fillText("13 : 231", 0, -115);
          ctx.font = "bold 11px sans-serif";
          ctx.fillStyle = "#10b981";
          ctx.fillText("+79% PR  ·  −5% inc", 0, -98);
        }
      } else {
        this.mergeFlash = 0;
        ctx.font = "bold 14px sans-serif";
        ctx.textAlign = "center";
        ctx.fillStyle = "#64748b";
        ctx.fillText(prg > 40 ? "33 endpoints" : "rule sync…", 0, 20);
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
      const prg = (frame * 0.045) % 220;
      const angle = (this.stepTrig / 220) * Math.PI - Math.PI * 0.85;
      const targetX = Math.cos(angle) * 155;
      const targetY = Math.sin(angle) * 55 - 50;

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
          this.x = targetX - (targetX - this.baseX) * ((local - 14) / 8);
          this.y = targetY - (targetY - this.baseY) * ((local - 14) / 8);
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
      if (!isMoving && frame % 180 === Math.floor(this.stepTrig) && Math.random() < 0.15) {
        const rnd = this.dialogs[Math.floor(Math.random() * this.dialogs.length)];
        createBubble(this.x, this.y - 24, rnd, 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5) * 1;

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
        drawPolyRound(ctx, -20 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      }
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  entities.push(new GridWave());
  entities.push(new EndpointOrbitStream());
  entities.push(new SandboxRing());
  entities.push(new FeedbackArc());
  entities.push(new RuleFrameworkCore());
  entities.push(
    new Agent(-280, 120, C.agentYellow, "1_architect", 18, [
      "Собираю ruleset v1…",
      "Reference PR готов",
      "Структура для 33 API"
    ])
  );
  entities.push(
    new Agent(-220, 155, C.agentGreen, "2_seo", 58, [
      "Схема endpoint'ов ок",
      "Person-day vs календарь",
      "Метрики без кликбейта"
    ])
  );
  entities.push(
    new Agent(-120, 130, C.agentBlue, "3_coder", 98, [
      "Build / fix / validate",
      "Sandbox изолирован",
      "Тесты зелёные"
    ])
  );
  entities.push(
    new Agent(40, 150, C.agentPink, "4_designer", 138, [
      "PR → ruleset v2",
      "Markdown-правило добавлено",
      "Feedback в .claude/rules"
    ])
  );
  entities.push(
    new Agent(120, 115, C.agentPurple, "5_deployer", 178, [
      "Merge без blast radius",
      "13 дней — не магия",
      "Оркестрация на прод"
    ])
  );

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

    const prg = (frame * 0.045) % 220;
    if (prg >= 16 && prg < 16.08) createBubble(-280, 90, "1. Rule-framework");
    if (prg >= 56 && prg < 56.08) createBubble(-220, 125, "2. Оркестрация");
    if (prg >= 96 && prg < 96.08) createBubble(-120, 100, "3. Validate");
    if (prg >= 136 && prg < 136.08) createBubble(40, 120, "4. PR→rules");
    if (prg >= 176 && prg < 176.08) createBubble(120, 85, "5. Merge!");

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

<section class="ym-section sf-intro-section reveal" id="intro-lead">
  <div class="ym-container">
    <div class="sf-intro-grid">
      <div class="sf-intro-text">
        <p class="sf-intro-eyebrow">Агентная инженерия · май 2026</p>
        <p class="sf-intro-lead"><strong>Агентная разработка</strong> — когда ИИ-агент самостоятельно выполняет циклы планирования, правок, сборки и проверки в репозитории под контролем человека, а не только подсказывает код в чате.</p>
        <p class="sf-intro-sub">Кейс Salesforce сжал оценку миграции <strong>33 API</strong> с ~<strong>231 person-day</strong> до <strong>13 календарных дней</strong> — ниже разберём механику, оговорки и как повторить у себя без штата Fortune 500.</p>
      </div>
      <div class="sf-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">agent-loop · salesforce-case</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> claude code migrate --pilot 33-api</div>
            <div><span class="ym-comment"># rule-framework + reference PR</span></div>
            <div>build → fix → validate <span style="color:#10b981">✓</span></div>
            <div>PR → ruleset v2 <span style="color:#38bdf8">merged</span></div>
            <div style="margin-top:12px;display:flex;flex-wrap:wrap;gap:8px;">
              <span style="padding:4px 10px;background:#e0f2fe;border-radius:999px;font-size:11px;color:#0369a1;">13 дн</span>
              <span style="padding:4px 10px;background:#f1f5f9;border-radius:999px;font-size:11px;color:#334155;">231 pd</span>
              <span style="padding:4px 10px;background:#ecfdf5;border-radius:999px;font-size:11px;color:#047857;">+79% PR</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="ym-toc-wrap reveal delay-100" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#sf-metrics-table">Метрики</a>
        <a href="#checklist-7-steps">7 шагов</a>
        <a href="#sf-case">Кейс Salesforce</a>
        <a href="#claude-code-business">Claude Code</a>
        <a href="#salesforce-claude-code-boris-block">Цикл PR→rules</a>
        <a href="#agentic-vs-vibe">PEV</a>
        <a href="#rule-framework">Rules</a>
        <a href="#repeat-framework">Повторить у себя</a>
        <a href="#compare-tools">Сравнение</a>
        <a href="#roi-risks">ROI</a>
        <a href="#faq">FAQ</a>
        <a href="#nero-implementation">Внедрение</a>
      </div>
    </nav>
  </div>
</section>

<section class="ym-section ym-content-section reveal" id="sec-agentic-definition">
<div class="ym-container">
<h2 id="agentic-definition">Определение: что такое агентная разработка</h2>
<p><strong>Агентная разработка</strong> (agentic engineering) — подход, при котором ИИ-агент не только подсказывает фрагменты кода в чате, а <strong>самостоятельно выполняет циклы</strong> планирования, правок, сборки и проверки в репозитории под контролем человека. В отличие от «вайбкодинга» (быстрые правки по промпту без системы правил) агентная инженерия опирается на <strong>rule-based фреймворк</strong>, эталонные реализации, feedback из pull request'ов и изолированные среды для параллельной работы.</p>
<p><strong>Коротко:</strong> агент делает рутину по правилам команды; человек задаёт рамку, ревьюит и усиливает ruleset.</p>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-sf-metrics-table">
<div class="ym-container">
<h2 id="sf-metrics-table">Таблица: ключевые метрики кейса Salesforce (апрель 2026 vs апрель 2025)</h2>
<table>
<thead>
<tr>
<th>Показатель</th>
<th style="text-align: right;">Изменение</th>
<th>Источник / оговорка</th>
</tr>
</thead>
<tbody>
<tr>
<td>Work items на разработчика</td>
<td style="text-align: right;"><strong>+50,8%</strong></td>
<td>Внутренняя отчётность Salesforce; <strong>не аудирована</strong></td>
</tr>
<tr>
<td>Merged PR на разработчика</td>
<td style="text-align: right;"><strong>+79%</strong></td>
<td>Там же</td>
</tr>
<tr>
<td>Effective Output Score (ML-оценка ценности кода)</td>
<td style="text-align: right;"><strong>+151,3%</strong> YoY</td>
<td>Там же</td>
</tr>
<tr>
<td>Инциденты (платформа Engineering 360)</td>
<td style="text-align: right;"><strong>−5%</strong> при росте PR</td>
<td>Там же</td>
</tr>
<tr>
<td>Миграция <strong>33 API</strong></td>
<td style="text-align: right;"><strong>~231 person-day</strong> (оценка) → <strong>13 календарных дней</strong> (~<strong>18×</strong>)</td>
<td>Кейс в посте; 231 — <strong>трудозатраты</strong>, 13 — <strong>календарь</strong></td>
</tr>
</tbody>
</table>
<p>Официальный пост: <a href="https://www.salesforce.com/news/stories/how-engineering-became-agentic/" rel="noopener noreferrer" target="_blank">How Engineering Became Agentic</a> (Srinivas Tallapragada, <strong>27.05.2026</strong>). Независимая верификация цифр <strong>отсутствует</strong> (The Decoder, 30.05.2026).</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-checklist-7-steps">
<div class="ym-container">
<h2 id="checklist-7-steps">Чеклист: 7 шагов повторить модель у себя (команда 5–50 человек)</h2>
<ol>
<li><strong>Аудит SDLC</strong> — есть ли CI, тесты, code review, изоляция веток; без этого агенты ускорят хаос, а не миграцию.</li>
<li><strong>Узкий пилот</strong> — один класс задач (например, N endpoint'ов API), как у Salesforce (<strong>33 API</strong>, крупнейший PR — <strong>21 из 33</strong> endpoint'ов).</li>
<li><strong>Rule-based Markdown</strong> — правила + reference implementations, не «один промпт на всю базу».</li>
<li><strong>Цикл PR → ruleset</strong> — каждый замеченный паттерн из ревью превращается в правило для следующего агента.</li>
<li><strong>Параллельные среды</strong> — изолированные ветки/worktrees; циклы <strong>build / fix / validate</strong> без взаимного затирания.</li>
<li><strong>Human-in-the-loop</strong> — обязательный review на крупных PR; метрики: throughput PR, инциденты, coverage на <strong>своём</strong> стенде.</li>
<li><strong>Инструменты</strong> — Claude Code (миграции, многофайловые задачи) + при необходимости Cursor (ежедневная IDE); оркестрация вне IDE через MCP, Make, n8n.</li>
</ol>
<aside class="ym-card reveal ym-cta-card" id="cta-audit-pilot" aria-labelledby="cta-audit-pilot-title">
  <div class="ym-card-icon" aria-hidden="true">&#128640;</div>
  <h3 id="cta-audit-pilot-title">Аудит SDLC и пилот агентной миграции</h3>
  <p>Разберём ваш стек, выберем узкий пилот на N endpoint&rsquo;ов и настроим rule-framework под Claude Code &mdash; без копирования маркетинговых цифр Salesforce.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;margin-top:20px;">
    <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( nn_cta_url( 'primary' ) ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( nn_cta_label( 'primary' ) ); ?></span></a>
  </div>
</aside>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-sf-case">
<div class="ym-container">
<h2 id="sf-case">Кейс Salesforce: что произошло за 13 дней вместо 231</h2>
<p>В конце мая 2026 Salesforce опубликовала развёрнутый кейс перевода инженерии на <strong>агентные workflow</strong> с <strong>Claude Code</strong> как основным AI-агентом. По словам <strong>Srinivas Tallapragada</strong> (President &amp; Chief Engineering and Customer Success Officer), компания сняла <strong>лимиты токенов</strong> для инженеров и выстроила организационную модель вокруг переиспользуемых skills, subagents и rule-based фреймворка.</p>
<p>Публикация позиционируется как <strong>следующий этап</strong> после фазы copilot: в том же цикле материалов Salesforce ссылается на предыдущую работу — <strong>более 90% adoption</strong> AI среди инженеров после governance и измерений.</p>
<h3 id="sf-metrics-detail">Метрики: 33 API, +79% pull request'ов, −5% инцидентов</h3>
<p>Центральный инфоповод — миграция <strong>33 API</strong>. Классическая оценка Salesforce: <strong>~231 person-day</strong> (порядка <strong>7 person-day на endpoint</strong>) — schema mapping, тесты, документация вручную. Факт по кейсу: <strong>13 календарных дней</strong>, ускорение порядка <strong>18×</strong>.</p>
<p>Механика по описанию компании:</p>
<ul>
<li><strong>rule-based framework</strong> — Markdown-правила и reference implementations;</li>
<li><strong>feedback из PR</strong> → обновление ruleset;</li>
<li>автономные циклы <strong>build / fix / validate</strong>;</li>
<li>параллельная работа в <strong>изолированных средах</strong>.</li>
</ul>
<p>Результат миграции: <strong>5 pull request'ов</strong>; в крупнейшем — <strong>21 endpoint</strong> из 33; заявлено <strong>100% test coverage</strong>.</p>
<p>Параллельно Salesforce приводит агрегированные метрики за <strong>апрель 2026</strong> к <strong>апрелю 2025</strong>: <strong>+79%</strong> merged PR на разработчика, <strong>+50,8%</strong> work items, <strong>+151,3%</strong> Effective Output Score, <strong>−5%</strong> инцидентов на платформе Engineering 360 при росте числа PR.</p>
<p><strong>Итог блока:</strong> цифры сильные, но это <strong>внутренняя</strong> отчётность Fortune 500 — не переносите их в KPI стартапа без собственного пилота.</p>
<h3 id="sf-agentic-meaning">Что означает «агентная инженерия» в формулировке Salesforce</h3>
<p>Для Salesforce агентная инженерия — не замена разработчиков, а <strong>оркестрация</strong> Claude Code skills, <strong>AI Expert Suite</strong>, <strong>Salesforce Foundation Plugins</strong> (курируемая библиотека skills под внутренние workflow) и <strong>subagents / agent teams</strong> — параллельные потоки внутри одной задачи.</p>
<p>Tallapragada формулирует ключевой навык так: <em>«The most important skill today is knowing how to structure problems for an agentic system, when to delegate versus stay in the loop, and how to build reusable patterns your team can compound on.»</em></p>
<p>При снижении инцидентов на 5% он же утверждает: <em>«When agentic tools get applied properly, quality doesn't suffer from speed. It benefits from it.»</em> — но это утверждение привязано к их зрелости процессов и метрикам, которые снаружи не проверить.</p>
<h3 id="sf-caveats">Оговорки: данные не аудированы — как читать цифры критично</h3>
<p>Редакция <strong>The Decoder</strong> (30.05.2026) прямо пишет: <em>«None of these numbers can be independently verified»</em>. <strong>TechSphere News</strong> и другие EN-обзоры повторяют метрики с тем же дисклеймером.</p>
<p><strong>Критично для SEO и доверия читателя:</strong></p>
<table>
<thead>
<tr>
<th>Утверждает Salesforce</th>
<th>Не проверено снаружи</th>
<th>Нельзя переносить 1:1</th>
</tr>
</thead>
<tbody>
<tr>
<td>18×, 79% PR, −5% инцидентов</td>
<td>Независимый аудит</td>
<td>Масштаб кодовой базы и зрелость CI</td>
</tr>
<tr>
<td>13 календарных дней</td>
<td>Состав команды внутри 13 дней</td>
<td>Безлимит токенов и бюджет Anthropic</td>
</tr>
<tr>
<td>100% coverage на миграции</td>
<td>Методика подсчёта coverage</td>
<td>«Один промпт» без reference PR</td>
</tr>
</tbody>
</table>
<p><strong>Person-day vs calendar-day:</strong> <strong>231</strong> в официальном тексте — <strong>оценка трудозатрат (person-days)</strong>, <strong>13</strong> — <strong>календарные дни</strong>. Смешивать «231 календарный день» — ошибка (встречается в пересказах агрегаторов). Вторичные сайты вроде headsUpAI <strong>смешивают</strong> кейс 33 API с Monitoring Cloud и Cursor — <strong>этого нет</strong> в каноническом посте; такие детали в аналитику не включайте.</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-claude-code-business">
<div class="ym-container">
<h2 id="claude-code-business">Что такое Claude Code и зачем он бизнесу, а не только разработчикам</h2>
<p><strong>Claude Code</strong> — агентный инструмент Anthropic для работы <strong>в репозитории</strong>: чтение и правка файлов, запуск команд, циклы с проверками. Для владельца продукта и CFO это язык <strong>предсказуемой автоматизации разработки</strong>, а не «ещё один чат».</p>
<p>В кейсе Salesforce Claude Code — <strong>основной</strong> AI-агент инженерии; для mid-market и SMB важнее не копировать «безлимит», а понять <strong>механику</strong> и бюджет.</p>
<h3 id="claude-cli-sdk">CLI, Agent SDK и отличие от «просто чата с ИИ»</h3>
<p>Три уровня инструмента:</p>
<ol>
<li><strong>CLI Claude Code</strong> — интерактивная работа разработчика в терминале/IDE-интеграции.</li>
<li><strong>Claude Agent SDK</strong> (бывш. Claude Code SDK) — тот же <strong>agent loop</strong>, что у CLI, но для <strong>production</strong>-оркестрации (CI, внутренние сервисы, кастомные агенты). Документация: <a href="https://code.claude.com/docs/ru/agent-sdk/overview" rel="noopener noreferrer" target="_blank">Agent SDK overview</a>.</li>
<li><strong>Skills, hooks, MCP</strong> — переиспользуемый контекст команды и интеграции с внешними системами.</li>
</ol>
<p>С <strong>15.06.2026</strong> для подписок Pro/Max/Team/Enterprise вводится отдельный <strong>месячный Agent SDK credit</strong> ($20 на Pro … до $200 на Max 20x); интерактивный Claude Code <strong>не</strong> списывается в тот же лимит (<a href="https://support.claude.com/en/articles/15036540-use-the-claude-agent-sdk-with-your-claude-plan" rel="noopener noreferrer" target="_blank">справка Anthropic</a>).</p>
<p><strong>Отличие от чата:</strong> агент <strong>действует</strong> в проекте (файлы, тесты, PR), а не только генерирует текст ответа.</p>
<p>Продуктовый контекст <strong>28.05.2026</strong> — <strong>Dynamic Workflows</strong> в Claude Code (research preview): оркестрация десятков субагентов, режим ultracode, сценарии миграций. Это <strong>релиз вендора</strong>, а не подтверждение цифр Salesforce (<a href="https://claude.com/blog/introducing-dynamic-workflows-in-claude-code" rel="noopener noreferrer" target="_blank">анонс</a>).</p>
<h3 id="claude-smb">Когда имеет смысл внедрение ai в разработку в SMB / mid-market</h3>
<p>Имеет смысл, если:</p>
<ul>
<li>есть повторяемые задачи (миграции API, рефакторинг модулей, генерация тестов по эталону);</li>
<li>команда готова вести <strong>CLAUDE.md</strong> и <code>.claude/rules/</code> (рекомендация документации — <strong>≤200 строк</strong> в CLAUDE.md, детали в <a href="https://code.claude.com/docs/en/memory" rel="noopener noreferrer" target="_blank">memory</a>);</li>
<li>CFO понимает ориентиры расходов: в RU-обзоре Netology/Habr со ссылкой на оценки Anthropic фигурируют <strong>~$13/активный день</strong>, у <strong>90%</strong> пользователей <strong>&lt;$30/день</strong>, порядка <strong>$150–250/мес</strong> на разработчика — для малого бизнеса это реалистичнее, чем корпоративный «безлимит токенов».</li>
</ul>
<p>Ранний сигнал не внедрять: нет CI, слабый review, агенты с полными правами на прод без sandbox.</p>
<hr>

</div>
</section>
<section
  class="sfb-article-viz ym-section reveal"
  id="salesforce-claude-code-boris-block"
  aria-labelledby="sfb-viz-title"
>
  <style>
    #salesforce-claude-code-boris-block {
      --sfb-accent: #0176d3;
      --sfb-accent-soft: #e8f4fc;
      --sfb-anthropic: #d97757;
      --sfb-surface: #ffffff;
      --sfb-muted: #64748b;
      --sfb-border: #e2e8f0;
      --sfb-heading: #0f172a;
      padding: 48px 0 56px;
      background: linear-gradient(180deg, #f8fafc 0%, #ffffff 42%);
    }
    #salesforce-claude-code-boris-block .sfb-map {
      max-width: 1180px;
      margin: 0 auto;
      padding: 28px 32px 32px;
      background: var(--sfb-surface);
      border: 1px solid var(--sfb-border);
      border-radius: 22px;
      box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
    }
    #salesforce-claude-code-boris-block .sfb-grid {
      display: grid;
      grid-template-columns: 1.1fr 0.9fr;
      gap: 28px 36px;
      align-items: center;
    }
    #salesforce-claude-code-boris-block .sfb-eyebrow {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--sfb-accent);
      margin: 0 0 10px;
    }
    #salesforce-claude-code-boris-block .sfb-kicker {
      font-size: clamp(1.15rem, 2.2vw, 1.45rem);
      line-height: 1.25;
      color: var(--sfb-heading);
      margin: 0 0 12px;
      font-weight: 700;
    }
    #salesforce-claude-code-boris-block .sfb-lead {
      font-size: 0.95rem;
      line-height: 1.55;
      color: var(--sfb-muted);
      margin: 0 0 18px;
      max-width: 34em;
    }
    #salesforce-claude-code-boris-block .sfb-stats {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 0 0 16px;
      padding: 0;
      list-style: none;
    }
    #salesforce-claude-code-boris-block .sfb-stat {
      flex: 1 1 120px;
      min-width: 108px;
      padding: 10px 12px;
      border-radius: 12px;
      background: var(--sfb-accent-soft);
      border: 1px solid rgba(1, 118, 211, 0.12);
    }
    #salesforce-claude-code-boris-block .sfb-stat strong {
      display: block;
      font-size: 1.05rem;
      color: var(--sfb-heading);
      line-height: 1.2;
    }
    #salesforce-claude-code-boris-block .sfb-stat span {
      font-size: 0.72rem;
      color: var(--sfb-muted);
      line-height: 1.3;
    }
    #salesforce-claude-code-boris-block .sfb-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 0 0 14px;
    }
    #salesforce-claude-code-boris-block .sfb-pill {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 5px 11px;
      border-radius: 999px;
      background: #f1f5f9;
      color: #334155;
      border: 1px solid var(--sfb-border);
    }
    #salesforce-claude-code-boris-block .sfb-pill--hot {
      background: #fff7ed;
      border-color: #fed7aa;
      color: #c2410c;
    }
    #salesforce-claude-code-boris-block .sfb-bridge {
      font-size: 0.85rem;
      color: var(--sfb-muted);
      margin: 0;
      font-style: italic;
    }
    #salesforce-claude-code-boris-block .sfb-canvas-wrap {
      position: relative;
      min-height: 380px;
      max-height: 520px;
      border-radius: 16px;
      overflow: hidden;
      background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 55%, #faf5ff 100%);
      border: 1px solid var(--sfb-border);
    }
    #salesforce-claude-code-boris-block canvas {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 380px;
    }
    #salesforce-claude-code-boris-block .sfb-canvas-caption {
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: 10px;
      font-size: 0.68rem;
      text-align: center;
      color: var(--sfb-muted);
      pointer-events: none;
    }
    @media (max-width: 1023px) {
      #salesforce-claude-code-boris-block .sfb-grid {
        grid-template-columns: 1fr;
      }
      #salesforce-claude-code-boris-block .sfb-canvas-wrap {
        min-height: 340px;
      }
    }
    @media (max-width: 767px) {
      #salesforce-claude-code-boris-block .sfb-map {
        padding: 20px 18px 22px;
      }
      #salesforce-claude-code-boris-block {
        padding: 32px 0 40px;
      }
    }
  </style>

  <div class="ym-container">
    <div class="sfb-map">
      <div class="sfb-grid">
        <div class="sfb-copy">
          <p class="sfb-eyebrow">Визуализация цикла</p>
          <h3 class="sfb-kicker" id="sfb-viz-title">PR → ruleset → параллельная миграция</h3>
          <p class="sfb-lead">
            Не «один суперагент», а несколько изолированных потоков и накопление правил из ревью — так Salesforce описывает механику 33 API за 13 календарных дней.
          </p>
          <ul class="sfb-stats" role="list">
            <li class="sfb-stat">
              <strong>231 → 13</strong>
              <span>person-day vs календарь</span>
            </li>
            <li class="sfb-stat">
              <strong>5 PR</strong>
              <span>крупнейший — 21/33 endpoint</span>
            </li>
            <li class="sfb-stat">
              <strong>build / fix / validate</strong>
              <span>параллельные циклы</span>
            </li>
          </ul>
          <div class="sfb-pills" aria-hidden="true">
            <span class="sfb-pill sfb-pill--hot">CLAUDE.md + rules</span>
            <span class="sfb-pill">worktrees</span>
            <span class="sfb-pill">human review</span>
          </div>
          <p class="sfb-bridge">Дальше — чем агентная разработка отличается от вайбкодинга и цикл Plan–Execute–Verify.</p>
        </div>
        <div class="sfb-canvas-wrap">
          <canvas
            id="sf-migration-loop-canvas"
            role="img"
            aria-label="Анимация: комментарии из pull request превращаются в правила, агенты мигрируют endpoint'ы по параллельным полосам, статусы build fix validate"
          ></canvas>
          <span class="sfb-canvas-caption">Схема feedback loop · не официальная инфографика Salesforce</span>
        </div>
      </div>
    </div>
  </div>

  <script>
  (function sfMigrationLoopEngine() {
    var canvas = document.getElementById("sf-migration-loop-canvas");
    if (!canvas) return;
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var w = 0, h = 0, t = 0;

    var PAL = {
      ink: "#0f172a",
      mute: "#94a3b8",
      sf: "#0176d3",
      sfLight: "#38bdf8",
      ok: "#10b981",
      warn: "#f59e0b",
      pr: "#d97757",
      rule: "#f8fafc",
      lane: "#e2e8f0"
    };

    function resize() {
      var box = canvas.parentElement;
      if (!box) return;
      w = box.clientWidth;
      h = Math.max(340, Math.min(520, box.clientHeight || 400));
      canvas.width = Math.floor(w * dpr);
      canvas.height = Math.floor(h * dpr);
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    var lanes = [
      { y: 0, progress: 0.2, phase: 0, label: "API · схема" },
      { y: 0, progress: 0.55, phase: 1.2, label: "тесты" },
      { y: 0, progress: 0.38, phase: 2.4, label: "документация" }
    ];

    var particles = [];
    for (var i = 0; i < 8; i++) {
      particles.push({
        x: 0, y: 0, vx: 0, vy: 0,
        life: Math.random(),
        fromPr: i % 2 === 0
      });
    }

    var bfvLabels = ["build", "fix", "validate"];
    var bfvIdx = 0;

    function roundRect(x, y, rw, rh, r, fill, stroke) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, rw, rh, r);
      else ctx.rect(x, y, rw, rh);
      if (fill) { ctx.fillStyle = fill; ctx.fill(); }
      if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 1.5; ctx.stroke(); }
    }

    function drawRulesHub(cx, cy, pulse) {
      var rw = Math.min(118, w * 0.28);
      var rh = rw * 0.72;
      ctx.save();
      ctx.shadowColor = "rgba(1,118,211,0.2)";
      ctx.shadowBlur = 12 + pulse * 8;
      roundRect(cx - rw / 2, cy - rh / 2, rw, rh, 10, PAL.rule, PAL.sf);
      ctx.shadowBlur = 0;
      ctx.fillStyle = PAL.sf;
      ctx.font = "600 11px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("ruleset v" + (1 + Math.floor((t / 180) % 3)), cx, cy - 4);
      ctx.fillStyle = PAL.mute;
      ctx.font = "10px Inter, system-ui, sans-serif";
      ctx.fillText("CLAUDE.md + .claude/rules", cx, cy + 14);
      ctx.restore();
    }

    function drawPrZone(x, y) {
      roundRect(x, y, 72, 52, 8, "#fff7ed", PAL.pr);
      ctx.fillStyle = PAL.pr;
      ctx.font = "600 10px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("PR review", x + 36, y + 22);
      ctx.fillStyle = PAL.mute;
      ctx.font = "9px Inter, system-ui, sans-serif";
      ctx.fillText("feedback", x + 36, y + 36);
    }

    function drawLane(lane, idx, laneY, laneW, x0) {
      var pad = 14;
      roundRect(x0, laneY - 22, laneW, 44, 10, "#ffffff", PAL.lane);
      ctx.strokeStyle = PAL.lane;
      ctx.setLineDash([6, 6]);
      ctx.beginPath();
      ctx.moveTo(x0 + pad, laneY);
      ctx.lineTo(x0 + laneW - pad, laneY);
      ctx.stroke();
      ctx.setLineDash([]);

      var prog = (lane.progress + (t * 0.00035 + lane.phase * 0.1)) % 1;
      var ex = x0 + pad + (laneW - pad * 2) * prog;
      roundRect(ex - 18, laneY - 14, 36, 28, 6, PAL.sfLight, PAL.sf);
      ctx.fillStyle = "#fff";
      ctx.font = "600 9px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("EP", ex, laneY + 3);

      ctx.fillStyle = PAL.mute;
      ctx.font = "9px Inter, system-ui, sans-serif";
      ctx.textAlign = "left";
      ctx.fillText(lane.label, x0 + 8, laneY - 28);

      var st = bfvLabels[(bfvIdx + idx) % 3];
      ctx.fillStyle = PAL.ok;
      ctx.font = "600 8px Inter, system-ui, sans-serif";
      ctx.textAlign = "right";
      ctx.fillText(st, x0 + laneW - 8, laneY + 30);
    }

    function tickParticles(hubX, hubY, prX, prY) {
      particles.forEach(function (p, i) {
        if (p.life <= 0) {
          p.life = 1;
          p.x = prX + 36 + (Math.random() - 0.5) * 20;
          p.y = prY + 26;
          p.vx = (hubX - p.x) * 0.02;
          p.vy = (hubY - p.y) * 0.02;
        }
        p.x += p.vx;
        p.y += p.vy;
        p.life -= 0.012;
        ctx.beginPath();
        ctx.arc(p.x, p.y, 3, 0, Math.PI * 2);
        ctx.fillStyle = p.fromPr ? PAL.pr : PAL.sf;
        ctx.globalAlpha = Math.min(1, p.life * 2);
        ctx.fill();
        ctx.globalAlpha = 1;
      });
    }

    function frame() {
      t++;
      if (t % 90 === 0) bfvIdx = (bfvIdx + 1) % 3;
      ctx.clearRect(0, 0, w, h);

      var hubX = w * 0.52;
      var hubY = h * 0.38;
      var prX = w * 0.08;
      var prY = h * 0.22;
      var pulse = 0.5 + 0.5 * Math.sin(t * 0.06);

      drawPrZone(prX, prY);
      drawRulesHub(hubX, hubY, pulse);

      ctx.strokeStyle = PAL.pr;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(prX + 72, prY + 26);
      ctx.quadraticCurveTo((prX + hubX) / 2, prY - 20, hubX - 50, hubY);
      ctx.stroke();

      var laneX = w * 0.06;
      var laneW = w * 0.88;
      var laneGap = Math.min(56, (h - 120) / 3);
      lanes.forEach(function (lane, i) {
        var ly = h * 0.58 + i * laneGap;
        drawLane(lane, i, ly, laneW, laneX);
      });

      for (var a = 0; a < 3; a++) {
        var ax = hubX + 40 + Math.cos(t * 0.04 + a * 2) * 24;
        var ay = hubY + 50 + a * 18;
        ctx.beginPath();
        ctx.arc(ax, ay, 7, 0, Math.PI * 2);
        ctx.fillStyle = ["#8b5cf6", "#10b981", "#3b82f6"][a];
        ctx.fill();
        ctx.strokeStyle = PAL.ink;
        ctx.lineWidth = 1.2;
        ctx.stroke();
        ctx.strokeStyle = PAL.sf;
        ctx.beginPath();
        ctx.moveTo(hubX + 20, hubY + 10);
        ctx.lineTo(ax, ay);
        ctx.globalAlpha = 0.35;
        ctx.stroke();
        ctx.globalAlpha = 1;
      }

      tickParticles(hubX, hubY, prX, prY);

      ctx.fillStyle = PAL.mute;
      ctx.font = "10px Inter, system-ui, sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("33 endpoint · параллель", laneX, h - 18);

      requestAnimationFrame(frame);
    }

    window.addEventListener("resize", resize);
    resize();
    requestAnimationFrame(frame);
  })();
  </script>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-agentic-vs-vibe">
<div class="ym-container">
<h2 id="agentic-vs-vibe">Агентная разработка vs вайбкодинг: цикл Plan–Execute–Verify</h2>
<p><strong>Вайбкодинг</strong> — быстрые итерации «промпт → код → глазами правим». <strong>Агентная инженерия</strong> — дисциплина координации «fallible agents» без потери quality bar (формулировка <strong>Andrej Karpathy</strong> в контексте AI Ascent / Sequoia 2026): агенты ошибаются, система должна это <strong>ловить</strong> тестами и ревью.</p>
<p>Karpathy же отмечает проблему типичного кода агентов: <em>«bloated, copy-pasted, awkwardly abstracted, brittle. It works, but it is gross»</em> — при этом остаётся сторонником подхода при правильной оркестрации.</p>
<p><strong>Трёхуровневая зрелость для команды:</strong></p>
<ol>
<li>Vibe — эксперименты без правил.</li>
<li>Agentic engineering — циклы PEV, метрики PR и инцидентов.</li>
<li>Rule framework — как у Salesforce: PR → ruleset → compound.</li>
</ol>
<h3 id="pev-parallel">Параллельные автономные циклы build / fix / validate</h3>
<p>Salesforce описывает не «одного суперагента», а <strong>параллельные</strong> автономные циклы в изоляции: пока один поток чинит тесты после миграции endpoint'а, другой валидирует соседний модуль. Ключ — <strong>изолированные среды</strong>, иначе merge-конфликты съедают выигрыш 18×.</p>
<p>Для команды из 5–15 человек аналог — worktrees, feature-ветки под пачку endpoint'ов, единый ruleset в репозитории.</p>
<h3 id="orchestration">Оркестрация ai агентов без «одного суперагента»</h3>
<p><strong>Subagents</strong> в терминологии Salesforce — специализированные потоки (тесты, документация, схема). В экосистеме Anthropic — <strong>agent teams</strong> и Dynamic Workflows. Практика 2026 на Habr/vc.ru: <strong>MCP</strong> как стандарт интеграций (<a href="https://vc.ru/ai/2953134-mcp-i-budushchee-saas" rel="noopener noreferrer" target="_blank">vc.ru про MCP и SaaS</a>) — агент вызывает API, трекер, базу знаний, не дублируя всё в промпте.</p>
<p><strong>Коротко:</strong> оркестрация = правила + несколько узких агентов + человек на стыках.</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-rule-framework">
<div class="ym-container">
<h2 id="rule-framework">Rule-based фреймворк: Markdown-правила, референсы и CLAUDE.md</h2>
<p>Сердце кейса Salesforce — не «магия Claude», а <strong>rule-based framework</strong>: Markdown-правила плюс <strong>reference implementations</strong> (эталонные PR или модули). Агент сверяет новую работу с образцом, а не выдумывает стиль с нуля.</p>
<h3 id="pr-ruleset">Как feedback из PR попадает обратно в ruleset</h3>
<p>Замкнутый цикл:</p>
<ol>
<li>Агент открывает PR по правилам v1.</li>
<li>Человек оставляет комментарии: naming, границы модуля, тесты.</li>
<li>Паттерны ошибок формулируются как новые пункты Markdown-rules или <code>.claude/rules/</code>.</li>
<li>Следующий endpoint мигрируется уже по ruleset v2.</li>
</ol>
<p>Так команда <strong>накапливает</strong> качество, а не повторяет одни и те же промпты. Tallapragada называет это «reusable patterns your team can compound on».</p>
<h3 id="token-limits">Снятие лимитов токенов и организация контекста</h3>
<p>Salesforce сняла <strong>лимиты токенов</strong> для инженеров — это корпоративный рычаг, недоступный большинству SMB. Переносимый урок: <strong>организация контекста</strong> — skills, краткий CLAUDE.md, вынос деталей в rules и MCP, а не раздувание одного промпта.</p>
<p>Открытый вопрос в посте Salesforce: <strong>сильный разброс качества CLAUDE.md между командами</strong> — значит, нужен внутренний стандарт и ревью самих правил, как кода.</p>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-repeat-framework">
<div class="ym-container">
<h2 id="repeat-framework">Как повторить модель Salesforce у себя: пошаговый фреймворк для малой команды</h2>
<p>Угол «как повторить кейс salesforce» — не клонировать штат <strong>10 000</strong> инженеров, а воспроизвести <strong>механику за 2–4 недели пилота</strong>: rule-framework, PR-feedback, параллель, метрики на своём стенде.</p>
<h3 id="pilot-audit">Аудит процессов и выбор первого «узкого» проекта (миграция, рефакторинг)</h3>
<p><strong>Шаг 1.</strong> Карта SDLC: репозиторий, CI, тесты, политика веток, sandbox для агентов.</p>
<p><strong>Шаг 2.</strong> Выбор пилота по масштабу <strong>N endpoint'ов / модулей</strong> (аналог <strong>33 API</strong>, но для вас — может быть 5–10).</p>
<p><strong>Шаг 3.</strong> Подготовка 1–2 <strong>reference PR</strong> «как должно выглядеть».</p>
<p><strong>Шаг 4.</strong> Запуск параллельных агентных циклов с лимитом размера PR (у Salesforce крупнейший PR — <strong>21/33</strong> — намёк: дробить, но не мельчить до бессмысленности).</p>
<h3 id="human-loop">Роли human-in-the-loop: что не делегировать агенту</h3>
<p>Не делегировать без жёсткого review:</p>
<ul>
<li>секреты, прод-доступы, изменения IAM;</li>
<li>архитектурные развилки без ADR;</li>
<li>merge в main без зелёного CI и человека.</li>
</ul>
<p>Делегировать с правилами:</p>
<ul>
<li>шаблонная миграция по эталону;</li>
<li>дописывание тестов и документации по схеме;</li>
<li>циклы fix после падения CI.</li>
</ul>
<p><strong>George Hotz</strong> (24.05.2026) предупреждает: <em>«the adoption of AI agents into software development will be one of the most costly mistakes in the field's history»</em> и что агенты <em>«will end up hurting large organizations more than high performing individuals or small orgs»</em> — для SMB это аргумент за <strong>дисциплину</strong>, а не за отказ от ИИ.</p>
<h3 id="mcp-integrations">Интеграции Make / n8n / MCP для оркестрации вне IDE</h3>
<p>Агент в IDE не заменяет <strong>бизнес-оркестрацию</strong>: уведомления в Slack, тикеты в Jira, согласования — через <strong>MCP</strong>, Make, n8n. Production-ready MCP в 2026 обсуждается в RU-сообществе (Habr, vc.ru) как слой, где агентная разработка встречается с остальным стеком компании.</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-compare-tools">
<div class="ym-container">
<h2 id="compare-tools">Claude Code vs Cursor vs Copilot: что выбрать в 2026</h2>
<p>Сравнение <strong>claude code vs cursor</strong> — не «победитель навсегда», а <strong>роли в одной команде</strong>.</p>
<table>
<thead>
<tr>
<th>Сценарий</th>
<th>Claude Code</th>
<th>Cursor</th>
<th>Copilot</th>
</tr>
</thead>
<tbody>
<tr>
<td>Многофайловая миграция, agent loop в репо</td>
<td>Сильная сторона</td>
<td>Интеграция + Auto</td>
<td>Подсказки в строке</td>
</tr>
<tr>
<td>Ежедневная IDE, рефакторинг</td>
<td>Дополнение</td>
<td>Сильная сторона</td>
<td>Привычный assist</td>
</tr>
<tr>
<td>Production-оркестрация (CI)</td>
<td>Agent SDK</td>
<td>Automations (отдельный нарратив)</td>
<td>Ограниченнее</td>
</tr>
</tbody>
</table>
<h3 id="cursor-claude">Сценарии «Cursor + Claude Code» в одной команде</h3>
<p>Модель из RU-практики (Netology/Habr, март 2026): <strong>Cursor</strong> — ежедневная работа, автодополнение, локальный контекст; <strong>Claude Code</strong> — тяжёлые миграции, пачки файлов, автономные циклы с тестами. Ключ <strong>cursor claude code</strong> в одном пайплайне — общий ruleset в репозитории, а не два несовместимых стиля кода.</p>
<h3 id="single-tool">Когда достаточно одного инструмента</h3>
<p>Одного инструмента достаточно, если пилот узкий (один сервис, мало интеграций) и команда ≤3 человек с сильным review. При росте — разделение ролей окупается быстрее, чем спор «что купить».</p>
<p>Объявление <strong>Karpathy → Anthropic</strong> (pre-training, <strong>19.05.2026</strong>, TechCrunch) усиливает экосистему Claude, но <strong>не связано</strong> с публикацией Salesforce — не смешивайте в одном абзаце с метриками миграции.</p>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-roi-risks">
<div class="ym-container">
<h2 id="roi-risks">ROI, риски и безопасность: техдолг, sandbox и инциденты</h2>
<p><strong>ROI агентная разработка</strong> считается не по чужим 79% PR, а по <strong>своим</strong> метрикам пилота: календарь миграции N задач, стоимость подписки Anthropic, часы ревью.</p>
<h3 id="incidents-review">Почему −5% инцидентов не отменяет ревью кода человеком</h3>
<p>Salesforce фиксирует <strong>−5%</strong> инцидентов при росте PR — впечатляюще в их контексте Engineering 360. Для вас это не гарантия: агенты увеличивают <strong>объём</strong> изменений; без review растёт <strong>техдолг ai код</strong> — раздутые абстракции, копипаста, хрупкие тесты.</p>
<p>Human-in-the-loop — не бюрократия, а страховка от <strong>blast radius</strong>, о котором предупреждает сам пост Salesforce (security при действиях агентов на системах).</p>
<h3 id="enterprise-mistakes">Ошибки копирования enterprise-кейса в стартап</h3>
<p>Типичные ошибки:</p>
<ul>
<li>гнаться за <strong>18×</strong> без reference implementations;</li>
<li>копировать <strong>безлимит токенов</strong> вместо бюджета <strong>$150–250/мес</strong> на человека;</li>
<li>игнорировать <strong>person-day vs calendar-day</strong> в отчётах руководству;</li>
<li>один супер-промпт на 33 модуля без изоляции;</li>
<li>отсутствие feedback loop в ruleset.</li>
</ul>
<p><strong>Когда НЕ копировать Salesforce:</strong> нет CI/тестов, слабый code review, нет sandbox для агентов.</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-russia-practice">
<div class="ym-container">
<h2 id="russia-practice">Практика в России: установка, обучение, VPS и прокси</h2>
<p>Тема <strong>claude code установка обучение</strong> в RU — не только VPN: это <strong>permissions, hooks, MCP</strong>, политика репозитория и обучение команды читать агентный diff.</p>
<h3 id="training-tracks">Обучение команды и сертификационные треки Anthropic</h3>
<p>Фокус обучения:</p>
<ul>
<li>постановка задач агенту (структура проблемы — цитата Tallapragada);</li>
<li>ревью агентного кода и обновление rules;</li>
<li>безопасность: prompt injection, права агента, секреты вне контекста.</li>
</ul>
<p>Официальные треки Anthropic и документация Agent SDK — база; внутренние воркшопы под ваш стек (GitLab/GitHub, CI) — то, что закрывает разрыв между Habr-теорией и продом.</p>
<p class="reveal ym-training-cta" style="margin-top:1.25rem;padding:1rem 1.25rem;background:var(--ym-surface);border-left:4px solid var(--ym-accent);border-radius:0 12px 12px 0;">
  <strong>Обучение команды:</strong> если нужен структурированный вход в агентную разработку на вашем стеке,
  <a href="<?php echo esc_url( nn_cta_url( 'secondary' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( nn_cta_label( 'secondary' ) ); ?></a>
  &mdash; практика постановки задач агенту, ревью и обновления rules.
</p>
<h3 id="ru-vps">RU-контекст без VPN (VPS, безопасность репозитория)</h3>
<p>Практический контур для команд в РФ (обобщение RU-источников 2026): выделенный <strong>VPS</strong> для разработки, корпоративные политики доступа к репозиторию, запрет утечки PII в промпты, аудит логов агента. Цель — не обход ради обхода, а <strong>предсказуемая</strong> среда, где Claude Code и Cursor работают с одним ruleset.</p>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-faq">
<div class="ym-container">
<h2 id="faq">FAQ по агентной разработке и Claude Code</h2>
<h3 id="faq-cost">Сколько стоит внедрение и какие сроки ожидать?</h3>
<p>Ориентир расходов на инструмент — порядка <strong>$150–250/мес</strong> на активного разработчика (оценки Anthropic в RU-пересказе). Срок пилота «мини-Salesforce» — <strong>2–4 недели</strong> на узкую миграцию при готовом CI; не 13 дней «из коробки» без подготовки rules и reference PR.</p>
<h3 id="faq-headcount">Нужен ли штат из сотен разработчиков?</h3>
<p>Нет. Salesforce — Fortune 500; переносимый элемент — <strong>процесс</strong>, не headcount. В посте экспериментируют с командами <strong>1–3 человека</strong> вместо классического Scrum — релевантно для стартапов.</p>
<h3 id="faq-kpmg">Чем кейс Salesforce отличается от KPMG / Cowork?</h3>
<p><strong>KPMG + Claude Cowork</strong> (уже освещён отдельной страницей в ledger Nero Network) — массовое <strong>корпоративное workspace</strong> для <strong>276 000</strong> сотрудников, Digital Gateway. <strong>Salesforce + Claude Code</strong> — <strong>инженерная</strong> агентная миграция API, CLI/SDK, rule-framework в SDLC. Общий вендор Anthropic, <strong>разный сценарий</strong>; не дублируйте углы.</p>
<h3 id="faq-trust">Можно ли верить цифрам 13 и 231?</h3>
<p><strong>231</strong> — оценка <strong>person-days</strong>, <strong>13</strong> — <strong>календарные дни</strong>; метрики <strong>не аудированы</strong> (Salesforce + The Decoder). Используйте как гипотезу для пилота, не как SLA подрядчика.</p>
<h3 id="faq-cursor">Claude Code или только Cursor?</h3>
<p>Для миграций и agent loop — Claude Code (или SDK); для ежедневной IDE — часто Cursor; связка <strong>cursor claude code</strong> с единым ruleset — распространённая модель 2026.</p>
<h3 id="faq-rule">Что такое rule based ai разработка?</h3>
<p>Правила в Markdown + эталонные реализации + обновление ruleset из PR; агент следует им в циклах build/fix/validate.</p>
<hr>

</div>
</section>
<section class="ym-section ym-content-section reveal" id="sec-nero-implementation">
<div class="ym-container">
<h2 id="nero-implementation">Внедрение агентной разработки с Nero Network</h2>
<p>Для команд, которым нужен <strong>внедрение claude code под ключ</strong> без построения отдела из тысяч инженеров, логичная последовательность совпадает с кейсом Salesforce, но в масштабе <strong>5–50</strong> разработчиков (или меньше):</p>
<ol>
<li><strong>Аудит SDLC</strong> — CI, review, риски sandbox.</li>
<li><strong>Пилот</strong> — миграция или рефакторинг на N endpoint'ов по reference PR.</li>
<li><strong>CLAUDE.md, skills, hooks, MCP</strong> — rule-framework и интеграции Make/n8n.</li>
<li><strong>Обучение команды</strong> — постановка задач агенту, ревью, обновление rules.</li>
<li><strong>Метрики</strong> — PR throughput, инциденты, coverage на вашем стенде, не чужие 79%.</li>
</ol>
<p>Nero Network закрывает кластеры <strong>ai агенты для бизнеса</strong>, <strong>автоматизация разработки нейросеть</strong> и <strong>обучение команды claude code</strong> в связке с Cursor и MCP — без копирования маркетинговых цифр enterprise.</p>
<div class="ym-card reveal ym-cta-commercial" id="cta-nero-implementation" style="max-width:720px;margin:2rem auto 0;text-align:center;">
  <h3 style="font-size:1.5rem;margin-bottom:12px;">Внедрение под ключ: от аудита до метрик пилота</h3>
  <p style="margin-bottom:24px;">Аудит SDLC &rarr; пилот на N endpoint&rsquo;ов &rarr; CLAUDE.md, skills, MCP &rarr; обучение и метрики на вашем стенде.</p>
  <div class="ym-btn-group">
    <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( nn_cta_url( 'primary' ) ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( nn_cta_label( 'primary' ) ); ?></span></a>
    <?php if ( nn_cta_url( 'secondary' ) ) : ?>
    <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( nn_cta_url( 'secondary' ) ); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html( nn_cta_label( 'secondary' ) ); ?></span></a>
    <?php endif; ?>
  </div>
</div>
<hr>

</div>
</section>
<section class="ym-section-alt ym-content-section reveal" id="sec-summary">
<div class="ym-container">
<h2 id="summary">Итог</h2>
<p>Кейс Salesforce (май 2026) показал, что <strong>агентная разработка</strong> с <strong>Claude Code</strong> и rule-based фреймворком способна сжать оценку миграции <strong>33 API</strong> с <strong>~231 person-day</strong> до <strong>13 календарных дней</strong> при заявленном росте PR и снижении инцидентов — но цифры <strong>внутренние и не аудированы</strong>. Повторяемая часть для бизнеса — <strong>механика</strong>: правила, reference PR, feedback loop, параллельные циклы build/fix/validate, human review и честные метрики пилота. Инструменты Anthropic (CLI, Agent SDK, Dynamic Workflows) — рычаг; организационная дисциплина — то, что отличает «мини-Salesforce» от дорогого slop.</p>
<?php if ( getenv( 'AD_BANNER_URL' ) && getenv( 'AD_BANNER_IMAGE_URL' ) ) : ?>
<div class="ym-ad-banner reveal" style="margin:3rem auto 0;max-width:970px;text-align:center;">
<a href="<?php echo esc_url( getenv( 'AD_BANNER_URL' ) ); ?>" target="_blank" rel="noopener noreferrer">
  <img src="<?php echo esc_url( getenv( 'AD_BANNER_IMAGE_URL' ) ); ?>" width="970" height="90" alt="<?php echo esc_attr( getenv( 'AD_BANNER_ALT' ) ?: 'Рекламный баннер партнёра' ); ?>" loading="lazy" decoding="async" style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
</a>
</div>
<?php else : ?>
<!-- AD_BANNER_* не заданы в env — нижний баннер не выводить -->
<?php endif; ?>
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
      "name": "Сколько стоит внедрение и какие сроки ожидать?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ориентир расходов на инструмент — порядка $150–250/мес на активного разработчика. Срок пилота «мини-Salesforce» — 2–4 недели на узкую миграцию при готовом CI."
      }
    },
    {
      "@type": "Question",
      "name": "Нужен ли штат из сотен разработчиков?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Нет. Переносимый элемент — процесс, не headcount. В посте Salesforce экспериментируют с командами 1–3 человека."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли верить цифрам 13 и 231?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "231 — оценка person-days, 13 — календарные дни; метрики не аудированы. Используйте как гипотезу для пилота, не как SLA."
      }
    },
    {
      "@type": "Question",
      "name": "Claude Code или только Cursor?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для миграций и agent loop — Claude Code; для ежедневной IDE — часто Cursor; связка с единым ruleset — распространённая модель 2026."
      }
    },
    {
      "@type": "Question",
      "name": "Что такое rule based ai разработка?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Правила в Markdown + эталонные реализации + обновление ruleset из PR; агент следует им в циклах build/fix/validate."
      }
    },
    {
      "@type": "Question",
      "name": "Чем кейс Salesforce отличается от KPMG / Cowork?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "KPMG + Claude Cowork — корпоративное workspace для сотрудников. Salesforce + Claude Code — инженерная миграция API, CLI/SDK, rule-framework в SDLC."
      }
    }
  ]
}
</script>


<?php get_footer(); ?>
