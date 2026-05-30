<?php
/**
 * Template Name: Copilot Computer Use MCP Agenty Bez API
 * Description: Longread — computer-using agents Copilot + federated MCP (Nero Network Office Page).
 */

$page_seo_title = 'Computer-using агенты Copilot и MCP — автоматизация без API';
$page_seo_description = 'Microsoft открыл GA UI-агентов и federated MCP в M365 Copilot. Как автоматизировать 1С и CRM без API, чем отличается от RPA и что делать в РФ с Make и Cursor.';

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
 *   `.copilot-computer-use-mcp-agenty-bez-api-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.copilot-computer-use-mcp-agenty-bez-api-page {
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
    --ym-accent: #3b82f6;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(0, 120, 212, 0.15);
}

.copilot-computer-use-mcp-agenty-bez-api-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.copilot-computer-use-mcp-agenty-bez-api-page h1,
.copilot-computer-use-mcp-agenty-bez-api-page h2,
.copilot-computer-use-mcp-agenty-bez-api-page h3,
.copilot-computer-use-mcp-agenty-bez-api-page h4,
.copilot-computer-use-mcp-agenty-bez-api-page h5,
.copilot-computer-use-mcp-agenty-bez-api-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.copilot-computer-use-mcp-agenty-bez-api-page p,
.copilot-computer-use-mcp-agenty-bez-api-page li,
.copilot-computer-use-mcp-agenty-bez-api-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.copilot-computer-use-mcp-agenty-bez-api-page strong,
.copilot-computer-use-mcp-agenty-bez-api-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.copilot-computer-use-mcp-agenty-bez-api-page pre, .copilot-computer-use-mcp-agenty-bez-api-page code {
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
.copilot-mcp-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.copilot-computer-use-intro {
  padding: 72px 0 32px;
  background: var(--ym-bg);
}
.copilot-computer-use-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 900px) {
  .copilot-computer-use-intro-grid {
    grid-template-columns: 1.1fr 0.9fr;
    gap: 48px;
  }
}
.copilot-computer-use-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.copilot-computer-use-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  margin: 0 0 16px;
}
.copilot-computer-use-intro-lead {
  font-size: 19px !important;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.copilot-computer-use-intro-deco .ym-mac-window { margin-bottom: 0; }
.copilot-computer-use-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.copilot-computer-use-kpi-chips span {
  padding: 8px 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.ym-content-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; color: var(--ym-heading) !important; }
.ym-content-prose h4 { font-size: 18px; font-weight: 700; margin: 24px 0 12px; }
.ym-content-prose p { margin: 0 0 16px; line-height: 1.65; }
.ym-content-prose ul, .ym-content-prose ol { margin: 0 0 20px 20px; }
.ym-content-prose li { margin-bottom: 8px; }
.ym-content-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0 28px;
  font-size: 14px;
}
.ym-content-prose th, .ym-content-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.ym-content-prose th { background: #f1f5f9; font-weight: 700; }
.ym-content-prose a { color: var(--ym-accent); }
.ym-content-prose blockquote {
  margin: 20px 0;
  padding: 16px 20px;
  border-left: 4px solid var(--ym-primary);
  background: #f8fafc;
  font-style: italic;
}
.ym-cta-block { padding: 24px 0; }
.ym-cta-block .ym-section-title { margin-bottom: 12px; }

</style>
<main id="primary" class="site-main copilot-computer-use-mcp-agenty-bez-api-page" role="main" tabindex="-1">
<section class="copilot-mcp-hero fullscreen-white-office" id="copilot-mcp-hero" aria-label="Computer-using агенты и MCP">
<style>
.copilot-mcp-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #ffffff 0%, #f1f5f9 45%, #eef2ff 100%);
}
.copilot-mcp-hero.fullscreen-white-office::before {
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
.copilot-mcp-hero #copilot-mcp-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  display: block;
}
.copilot-mcp-hero .hero-copy-stack {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 4;
  pointer-events: none;
}
.copilot-mcp-hero .hero-copy-stack a { pointer-events: auto; }
.copilot-mcp-hero .giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
}
.copilot-mcp-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0078d4, #8b5cf6);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.copilot-mcp-hero .giant-seo-sub {
  font-size: clamp(15px, 1.8vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 600px;
}
.copilot-mcp-hero .telegram-button {
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
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);
}
.copilot-mcp-hero .telegram-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(15, 23, 42, 0.2);
}
.copilot-mcp-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(12px, 3vw, 48px);
  top: clamp(72px, 12vh, 140px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
  max-width: 280px;
}
.copilot-mcp-hero .vl-ui-task {
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
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}
.copilot-mcp-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #0078d4, #6366f1);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.copilot-mcp-hero .vl-ui-pill {
  position: absolute;
  top: clamp(16px, 3vh, 36px);
  right: clamp(16px, 4vw, 48px);
  left: auto;
  transform: none;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 8px;
  z-index: 3;
  max-width: min(520px, 90vw);
}
.copilot-mcp-hero .vl-ui-pill span {
  padding: 8px 14px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
@media (max-width: 900px) {
  .copilot-mcp-hero .vl-ui-tasks { display: none; }
  .copilot-mcp-hero .hero-copy-stack { bottom: 20px; }
}
</style>

<canvas id="copilot-mcp-hero-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill" role="list">
  <span>GA 13.05.2026</span>
  <span>5 credits/step</span>
  <span>MCP live</span>
  <span>1С без API</span>
</div>

<nav class="vl-ui-tasks" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Аудит «без API»</div>
  <div class="vl-ui-task"><span>2</span> Federated MCP</div>
  <div class="vl-ui-task"><span>3</span> Computer use в legacy</div>
  <div class="vl-ui-task"><span>4</span> HITL и DLP</div>
  <div class="vl-ui-task"><span>5</span> Пилот Make/Cursor</div>
</nav>

<div class="hero-copy-stack">
  <h1 class="giant-seo">Computer-using агенты и MCP в Copilot: <span>как автоматизировать бизнес без API</span></h1>
  <p class="giant-seo-sub">Microsoft открыл GA UI-агентов и live-коннекторы MCP — разбираем, что это значит для российского бизнеса и как внедрить похожее с Make, Cursor и MCP</p>
  <a class="telegram-button" href="https://t.me/neronetwork" target="_blank" rel="noopener noreferrer">Аудит процесса в Telegram →</a>
</div>
</section>

<script>
(function () {
  const canvas = document.getElementById("copilot-mcp-hero-canvas");
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
    cx = cw * 0.52;
    cy = ch * 0.42;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 700) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    mcpBlue: "#0078d4",
    mcpGlow: "#38bdf8",
    legacyAmber: "#f59e0b",
    hitlGreen: "#10b981",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    panelBg: "#f8fafc",
    pulseMint: "#a7f3d0",
    pulseViolet: "#c4b5fd"
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

  class DataPulseStream {
    constructor(y) {
      this.y = y;
      this.phase = 0;
    }
    draw(ctx) {
      this.phase = (frame * 0.45) % 360;
      const baseY = this.y;
      for (let lane = 0; lane < 3; lane++) {
        const ly = baseY + lane * 22;
        ctx.strokeStyle = lane === 1 ? C.mcpBlue : "#94a3b8";
        ctx.lineWidth = lane === 1 ? 2.5 : 1.5;
        ctx.setLineDash([6, 10]);
        ctx.beginPath();
        ctx.moveTo(-320, ly);
        ctx.bezierCurveTo(-120, ly - 8, 40, ly + 8, 220, ly);
        ctx.stroke();
        ctx.setLineDash([]);
        for (let i = 0; i < 4; i++) {
          const t = ((this.phase + i * 90 + lane * 40) % 360) / 360;
          const px = -300 + t * 520;
          const py = ly + Math.sin(t * Math.PI * 2) * 4;
          drawRR(ctx, px - 6, py - 6, 12, 12, 3, lane === 0 ? C.pulseMint : lane === 2 ? C.pulseViolet : C.mcpGlow, C.outline);
          if (lane === 1 && i === 0) {
            ctx.fillStyle = C.outline;
            ctx.font = "bold 7px sans-serif";
            ctx.textAlign = "center";
            ctx.fillText("MCP", px, py + 3);
          }
        }
      }
    }
  }

  class McpSatellite {
    constructor(x, y, label) {
      this.x = x;
      this.y = y;
      this.label = label;
      this.pulse = 0;
    }
    draw(ctx) {
      this.pulse = 0.6 + Math.sin(frame * 0.08 + this.x) * 0.4;
      const r = 18 + this.pulse * 3;
      ctx.strokeStyle = C.mcpGlow;
      ctx.lineWidth = 1.5;
      ctx.globalAlpha = 0.35 + this.pulse * 0.2;
      ctx.beginPath();
      ctx.arc(this.x, this.y, r + 6, 0, Math.PI * 2);
      ctx.stroke();
      ctx.globalAlpha = 1;
      drawRR(ctx, this.x - 16, this.y - 12, 32, 24, 6, C.panelBg, C.outline);
      drawRR(ctx, this.x - 12, this.y - 8, 24, 6, 2, C.mcpBlue, null);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.label, this.x, this.y + 10);
    }
  }

  class LegacyBridgeConsole {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.cycle = 0;
      this.cursorX = 0;
      this.cursorY = 0;
      this.syncFlash = 0;
    }
    draw(ctx) {
      this.cycle = (frame * 0.035) % 280;
      const prg = this.cycle;
      drawRR(ctx, this.x - 140, this.y - 90, 280, 200, 12, "#e2e8f0", C.outline);
      drawRR(ctx, this.x - 130, this.y - 80, 120, 170, 8, C.panelBg, C.outline);
      drawRR(ctx, this.x + 10, this.y - 80, 120, 170, 8, "#fff7ed", C.outline);

      ctx.fillStyle = C.mcpBlue;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("Federated MCP", this.x - 120, this.y - 68);
      ctx.fillStyle = C.legacyAmber;
      ctx.fillText("Legacy UI · 1С", this.x + 20, this.y - 68);

      const hubOn = prg > 20;
      if (hubOn) {
        drawRR(ctx, this.x - 115, this.y - 55, 90, 50, 4, C.pulseMint, C.outline);
        for (let i = 0; i < 4; i++) {
          drawRR(ctx, this.x - 108 + i * 22, this.y - 48, 16, 4, 1, "#cbd5e1", null);
        }
      }

      const uiPhase = prg > 80 && prg < 200;
      if (uiPhase) {
        drawRR(ctx, this.x + 25, this.y - 50, 90, 55, 4, "#fff", C.outline);
        drawRR(ctx, this.x + 30, this.y - 42, 35, 8, 2, C.legacyAmber, null);
        drawRR(ctx, this.x + 70, this.y - 42, 35, 8, 2, "#fde68a", null);
        const clickProg = (prg - 80) % 40;
        this.cursorX = this.x + 55 + Math.sin(clickProg * 0.3) * 25;
        this.cursorY = this.y - 15 + Math.cos(clickProg * 0.25) * 12;
        ctx.fillStyle = C.outline;
        ctx.beginPath();
        ctx.moveTo(this.cursorX, this.cursorY);
        ctx.lineTo(this.cursorX + 10, this.cursorY + 14);
        ctx.lineTo(this.cursorX + 2, this.cursorY + 12);
        ctx.closePath();
        ctx.fill();
        if (clickProg > 30 && clickProg < 32) {
          ctx.strokeStyle = C.hitlGreen;
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.arc(this.cursorX, this.cursorY, 14, 0, Math.PI * 2);
          ctx.stroke();
        }
      }

      if (prg > 200) {
        this.syncFlash = Math.min(1, (prg - 200) / 30);
        ctx.save();
        ctx.globalAlpha = this.syncFlash * 0.5;
        drawRR(ctx, this.x - 125, this.y - 75, 250, 155, 8, C.hitlGreen, null);
        ctx.restore();
        ctx.fillStyle = C.hitlGreen;
        ctx.font = "bold 11px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("MCP ↔ UI sync", this.x, this.y + 95);
      } else {
        this.syncFlash = 0;
      }
    }
  }

  class EmailIntake {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const drift = Math.sin(frame * 0.04) * 4;
      drawRR(ctx, this.x - 18, this.y - 12 + drift, 36, 24, 4, "#fff", C.outline);
      ctx.fillStyle = C.outline;
      ctx.beginPath();
      ctx.moveTo(this.x - 14, this.y - 6 + drift);
      ctx.lineTo(this.x, this.y + 2 + drift);
      ctx.lineTo(this.x + 14, this.y - 6 + drift);
      ctx.closePath();
      ctx.stroke();
    }
  }

  class AllowListBadge {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const wob = Math.sin(frame * 0.06) * 2;
      drawRR(ctx, this.x - 28, this.y - 18 + wob, 56, 36, 8, "#ecfdf5", C.outline);
      ctx.strokeStyle = C.hitlGreen;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.arc(this.x - 8, this.y + wob, 8, 0, Math.PI * 2);
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(this.x - 12, this.y + wob);
      ctx.lineTo(this.x - 5, this.y + 7 + wob);
      ctx.lineTo(this.x + 4, this.y - 6 + wob);
      ctx.stroke();
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("allow-list", this.x + 10, this.y + 14 + wob);
    }
  }

  class CreditMeter {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      drawRR(ctx, this.x - 30, this.y - 10, 60, 28, 6, C.panelBg, C.outline);
      const fill = 0.35 + (Math.sin(frame * 0.05) * 0.5 + 0.5) * 0.5;
      drawRR(ctx, this.x - 26, this.y - 4, 52 * fill, 8, 2, C.mcpBlue, null);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("5 cr/step", this.x, this.y + 12);
    }
  }

  class Agent {
    constructor(x, y, color, role, phaseStart, dialogs) {
      this.x = x;
      this.y = y;
      this.baseX = x;
      this.baseY = y;
      this.color = color;
      this.role = role;
      this.phaseStart = phaseStart;
      this.dialogs = dialogs;
      this.timer = Math.random() * 100;
    }
    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.035) % 280;
      let isMoving = false;
      let faceDir = 1;
      const targets = [
        { x: -90, y: -30 },
        { x: -40, y: 20 },
        { x: 30, y: -20 },
        { x: 80, y: 30 },
        { x: 120, y: -10 }
      ];
      const idx = ["1_architect", "2_seo", "3_coder", "4_designer", "5_deployer"].indexOf(this.role);
      const tgt = targets[idx] || targets[0];
      const windowLen = 22;
      if (prg >= this.phaseStart && prg < this.phaseStart + windowLen) {
        const local = prg - this.phaseStart;
        isMoving = true;
        const t = local / windowLen;
        this.x = this.baseX + (tgt.x - this.baseX) * t;
        this.y = this.baseY + (tgt.y - this.baseY) * t;
        faceDir = tgt.x > this.baseX ? 1 : -1;
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
      }
      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 220);
      }
      const bob = isMoving ? Math.abs(Math.sin(this.timer * 4)) * 2 : Math.sin(this.timer * 1.2);
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";
      let legL = 0, legR = 0;
      if (isMoving) {
        legL = Math.sin(this.timer * 5) * 4;
        legR = Math.sin(this.timer * 5 + Math.PI) * 4;
      }
      drawRR(ctx, -10, -4 + Math.max(0, legL), 8, 12, 2, C.outline, null);
      drawRR(ctx, 2, -4 + Math.max(0, legR), 8, 12, 2, C.outline, null);
      drawRR(ctx, -14, -14 - bob, 28, 18, 6, this.color, C.outline);
      const hx = 0, hy = -26 - bob;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(hx, hy, 11, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();
      ctx.save();
      ctx.scale(faceDir, 1);
      ctx.fillStyle = "#fff";
      ctx.beginPath();
      ctx.arc(hx + 4, hy - 2, 3.5, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 4, hy - 2, 3.5, 0, Math.PI * 2);
      ctx.fill();
      ctx.fillStyle = C.outline;
      ctx.beginPath();
      ctx.arc(hx + 4, hy - 2, 1.5, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 3, hy - 2, 1.5, 0, Math.PI * 2);
      ctx.fill();
      if (this.role === "3_coder") {
        drawRR(ctx, hx - 8, hy - 16, 16, 6, 2, C.mcpBlue, C.outline);
      }
      if (this.role === "4_designer") {
        ctx.strokeStyle = C.hitlGreen;
        ctx.strokeRect(hx - 10, hy - 18, 20, 8);
      }
      ctx.restore();
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const stream = new DataPulseStream(55);
  const bridge = new LegacyBridgeConsole(0, -40);
  entities.push(stream);
  entities.push(new EmailIntake(-200, -70));
  entities.push(new McpSatellite(-55, -25, "HubSpot"));
  entities.push(new McpSatellite(-55, 15, "Notion"));
  entities.push(bridge);
  entities.push(new AllowListBadge(150, -75));
  entities.push(new CreditMeter(165, 75));
  entities.push(new Agent(-240, 50, C.agentYellow, "1_architect", 12, ["Карта: API или UI?", "Аудит без API", "Процесс на схеме"]));
  entities.push(new Agent(-170, 95, C.agentGreen, "2_seo", 45, ["Ключ: mcp для бизнеса", "Цифровые сотрудники", "Хвост computer use"]));
  entities.push(new Agent(-60, 35, C.agentBlue, "3_coder", 85, ["MCP live-запрос", "Vision-клик в 1С", "Cursor + Make"]));
  entities.push(new Agent(40, 100, C.agentPink, "4_designer", 125, ["Allow-list URL", "HITL на проводке", "DLP-периметр"]));
  entities.push(new Agent(110, 25, C.agentPurple, "5_deployer", 165, ["Пилот в РФ", "5 credits/step", "Graebel-логика"]));

  function createBubble(x, y, text, life) {
    bubbles.push({ x, y, text, life, maxLife: life });
  }

  function engineLoop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));

    const prg = (frame * 0.035) % 280;
    if (prg > 8 && prg < 8.2) createBubble(-200, -85, "Письмо без структуры", 200);
    if (prg > 35 && prg < 35.2) createBubble(-55, -40, "Live MCP · read-only", 200);
    if (prg > 95 && prg < 95.2) createBubble(30, -55, "Клик в legacy UI", 200);
    if (prg > 155 && prg < 155.2) createBubble(150, -90, "HITL: одобрено", 200);
    if (prg > 215 && prg < 215.2) createBubble(0, 100, "Два крыла синхронны", 240);

    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    for (let i = bubbles.length - 1; i >= 0; i--) {
      const b = bubbles[i];
      b.life--;
      if (b.life <= 0) {
        bubbles.splice(i, 1);
        continue;
      }
      let alpha = Math.min(1, b.life / 25);
      if (b.life > b.maxLife - 8) alpha = (b.maxLife - b.life) / 8;
      ctx.globalAlpha = alpha;
      const tw = ctx.measureText(b.text).width + 14;
      const th = 20;
      const by = b.y - (b.maxLife - b.life) * 0.04;
      drawRR(ctx, b.x - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.outline;
      ctx.fillText(b.text, b.x, by - th / 2);
      ctx.globalAlpha = 1;
    }
    ctx.restore();
    requestAnimationFrame(engineLoop);
  }

  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(engineLoop);
  } else {
    engineLoop();
  }
})();
</script>

<section class="copilot-computer-use-intro reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="copilot-computer-use-intro-grid">
      <div class="copilot-computer-use-intro-text">
        <p class="copilot-computer-use-intro-lead">В мае 2026 Microsoft вывела в GA «агентов с компьютерным зрением» в Copilot Studio и расширила federated MCP-коннекторы в Microsoft 365 Copilot. Вместе это закрывает две боли SMB: legacy без API (UI) и live-данные из SaaS без индексации в облако Microsoft.</p>
        <p>Для российского бизнеса прямой стек M365 не всегда доступен — ниже разбор фактов, TCO, безопасности и практичного аналога на Make, Cursor и MCP.</p>
      </div>
      <div class="copilot-computer-use-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">copilot · mcp · legacy-ui</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> audit_process --no-api</div>
            <div><span class="ym-comment"># ветка: MCP live → HubSpot</span></div>
            <div><span class="ym-command">$</span> computer_use --steps 4 --credits 20</div>
            <div><span class="ym-comment"># ветка: UI legacy → 1С-клиент</span></div>
            <div><span class="ym-command">$</span> hitl --on-low-confidence</div>
          </div>
        </div>
        <div class="copilot-computer-use-kpi-chips" aria-hidden="true">
          <span>GA 13.05.2026</span>
          <span>5 credits/step</span>
          <span>MCP federated</span>
          <span>1С без API</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-300" aria-label="Оглавление">
      <a href="#may-2026-ga-mcp">Май 2026 GA</a>
      <a href="#computer-using-agents">Computer use</a>
      <a href="#federated-mcp">Federated MCP</a>
      <a href="#copilot-vs-make">Copilot vs Make</a>
      <a href="#security-dlp-hitl">Безопасность</a>
      <a href="#russia-context">Россия</a>
      <a href="#implementation-steps">Внедрение</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</section>


<section class="ym-section reveal" id="may-2026-ga-mcp">
  <div class="ym-container">
    <h2 class="ym-section-title">Что изменилось в мае 2026: computer-using agents (GA) и MCP-коннекторы</h2>
    <div class="ym-content-prose">
<h3>Определение</h3>
<p><strong>Computer-using agent</strong> — ИИ-агент, который управляет интерфейсом как человек: видит экран (vision), рассуждает и выполняет клики, ввод текста и навигацию в браузере или на рабочем столе Windows. <strong>Federated MCP-коннектор</strong> — подключение по протоколу Model Context Protocol (MCP), при котором данные <strong>не копируются</strong> в индекс Microsoft 365: Copilot запрашивает их в runtime от имени пользователя с его правами в источнике.</p>
<h3>GA 13.05.2026 и майский дайджест M365 Copilot</h3>
<p>13 мая 2026 Microsoft объявила <strong>general availability</strong> computer-using agents в <strong>Copilot Studio</strong> для всех <strong>коммерческих</strong> регионов Power Platform. Исключены sovereign clouds (GCC, GCC High, DoD). Источник: <a href="https://techcommunity.microsoft.com/blog/copilot-studio-blog/computer-using-agents-in-microsoft-copilot-studio-are-now-generally-available/4519427">Tech Community — GA computer-using agents</a>.</p>
<p>Параллельно в майском дайджесте Microsoft 365 Copilot (обновление от <strong>29.05.2026</strong>) описаны <strong>federated connectors</strong> на MCP: live-данные из внешних систем без полной индексации в M365. Источник: <a href="https://techcommunity.microsoft.com/blog/microsoft365copilotblog/what%E2%80%99s-new-in-microsoft-365-copilot--may-2026/4522010">What's new in Microsoft 365 Copilot — May 2026</a>.</p>
<p>Для рынка <strong>ai агенты для бизнеса</strong> это смена рамки: корпоративный вендор легитимизировал не только чат с документами, но и <strong>автоматизацию без api</strong> там, где интеграции невозможны или слишком дороги.</p>
<h3>UI-автоматизация vs классическое API</h3>
<table>
<thead>
<tr>
<th>Подход</th>
<th>Когда работает</th>
<th>Ограничения</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>REST/API, webhooks</strong></td>
<td>Есть документированный API, стабильная схема</td>
<td>Нет у старого 1С-клиента, закрытых порталов, части CRM</td>
</tr>
<tr>
<td><strong>Классический RPA</strong></td>
<td>Фиксированный UI, селекторы</td>
<td>Ломается при смене вёрстки, слабая вариативность входа (письма, сканы)</td>
</tr>
<tr>
<td><strong>Computer use + MCP</strong></td>
<td>Legacy UI + live-данные из SaaS с MCP</td>
<td>Credits, лицензии M365, governance, не все типы приложений</td>
</tr>
</tbody>
</table>
<p><strong>Итог блока:</strong> Microsoft предлагает <strong>два крыла</strong> одной стратегии: MCP даёт <strong>актуальные</strong> данные (HubSpot, Notion и др.), computer use — <strong>действия</strong> в системах без API.</p>
<h3>Ключевые продуктовые связки</h3>
<ul>
<li><strong>Copilot Studio</strong> — создание и запуск агентов, в том числе с инструментом Computer use.</li>
<li><strong>M365 Copilot</strong> — чат и агент Researcher с federated MCP.</li>
<li><strong>Agent-to-agent (A2A)</strong> в Copilot Studio — <strong>GA</strong> по корпоративному блогу мая 2026: агенты делегируют задачи друг другу. Work IQ API для кастомных интеграций — пока <strong>public preview</strong>, не путать с A2A внутри Studio.</li>
</ul>
<hr>
    </div>
  </div>
</section>


<section class="ym-section ym-section-alt reveal" id="computer-using-agents">
  <div class="ym-container">
    <h2 class="ym-section-title">Computer-using agents: как работают «агенты с компьютерным зрением»</h2>
    <div class="ym-content-prose">
<h3>Определение</h3>
<p><strong>Computer use</strong> в Copilot Studio — инструмент агента с <strong>generative orchestration</strong> (classic orchestration не поддерживается). Агент получает vision + reasoning и виртуальные «мышь/клавиатуру» для веба и <strong>Windows desktop</strong>. Документация: <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/computer-use">Learn — computer use</a>.</p>
<h3>Модели (OpenAI CUA, Claude Sonnet 4.5) и лимиты</h3>
<p>На GA доступны:</p>
<ul>
<li><strong>OpenAI Computer-Using Agent (CUA)</strong> — standard.</li>
<li><strong>Anthropic Claude Sonnet 4.5</strong> — standard; для Anthropic администратор должен включить external models.</li>
<li>Experimental/premium: Claude Sonnet 4.6, Claude Opus 4.6 (дороже по credits).</li>
</ul>
<p>Обновление моделей в Learn — <strong>27.05.2026</strong>.</p>
<p><strong>Ценообразование (Copilot Credits):</strong></p>
<ul>
<li><strong>5 credits за step</strong> (standard: CUA, Sonnet 4.5/4.6).</li>
<li><strong>15 credits/step</strong> — premium (Claude Opus 4.6).</li>
<li>Step = одна логическая операция (клики, ввод, навигация внутри шага).</li>
<li>Пример Microsoft: timesheet из <strong>4 шагов</strong> = <strong>20 credits</strong> (standard) или <strong>60</strong> (premium).</li>
</ul>
<p>Пакеты: capacity pack <strong>25 000 credits / $200/мес</strong> (~$0,008/credit); pay-as-you-go порядка <strong>~$0,01/credit</strong> (вторичные гайды по лицензированию). Ориентир TechHQ: <strong>~$0,04/step</strong> на prepaid standard; workflow из 4 шагов ≈ <strong>$0,16</strong> — для высокого объёма нужен cost model до пилота.</p>
<p>Источники: <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/computer-use">Learn Licensing</a>, <a href="https://www.microsoft.com/en-us/microsoft-365/copilot/pricing/copilot-studio">Copilot Studio pricing</a>.</p>
<h3>Отличие от RPA и когда выбирать UI-агента</h3>
<p><strong>Коротко:</strong> RPA — «жёсткие руки» по селекторам; computer-using agent — «руки + мозг», адаптация к смене UI и неструктурированному входу.</p>
<p>На Habr (обзор трендов 2026) computer use называют новым фронтиром; связка <strong>RPA как исполнитель + LLM-агент как оркестратор + MCP как протокол</strong> — практичный гибрид для enterprise (<a href="https://habr.com/ru/articles/1041274/">Habr 1041274</a>; <a href="https://habr.com/ru/companies/rgs_it/articles/1019918/">РГС IT — RPA + агенты</a>).</p>
<p><strong>Выбирайте UI-агента (computer use), если:</strong></p>
<ul>
<li>нет API у целевой системы;</li>
<li>вход вариативен (email, PDF, разные формы);</li>
<li>классический RPA уже «сыпался» на изменениях интерфейса.</li>
</ul>
<p><strong>Оставайтесь на API/MCP/RPA, если:</strong></p>
<ul>
<li>есть стабильный API или MCP-сервер к 1С;</li>
<li>процесс детерминирован и дешевле в credits;</li>
<li>нужен жёсткий детерминизм для регуляторики без vision.</li>
</ul>
<h3>Кейс Graebel Service Order Agent</h3>
<p><strong>Компания:</strong> Graebel (~1 500 сотрудников), global talent mobility, тысячи релокаций в год. Источники: <a href="https://www.microsoft.com/en/customers/story/26190-graebel-dynamics-365-finance">Microsoft customer story</a>, Tech Community GA.</p>
<p><strong>Проблема:</strong> заявки приходят <strong>неструктурированными email</strong>; ввод в proprietary <strong>Global Connect</strong> вручную; <strong>нет API</strong>; классический RPA не справлялся с вариативностью писем.</p>
<p><strong>Решение:</strong></p>
<ol>
<li>Мониторинг почты + <strong>Azure Content Understanding</strong> (структурирование, confidence scoring).</li>
<li>Валидация по business rules и compliance.</li>
<li><strong>Computer use</strong> в Copilot Studio для работы в Global Connect <strong>через UI</strong>.</li>
<li><strong>Human-in-the-loop (HITL)</strong> на исключениях и низкой уверенности.</li>
<li>Power Automate flows как связка этапов.</li>
</ol>
<p><strong>Статус:</strong> решение <strong>live</strong>, задумано на <strong>30+ категорий</strong> relocation services. Заявленные эффекты без процентов в первоисточнике: меньше ручного труда, быстрее обработка, стабильнее качество данных, «blueprint» для других процессов.</p>
<p>Цитата <strong>Matt Brownlee</strong>, CRO Graebel (GA, 13.05.2026): «By adopting Microsoft Copilot Studio and AI agents, we've moved beyond traditional automation to a more intelligent, scalable operating model.»</p>
<p><strong>Шаблон для РФ:</strong> email → структурирование → правила → <strong>UI legacy (1С-клиент, внутренний портал)</strong> → HITL. Не приписывайте проценты ROI, если их нет в вашем пилоте.</p>
<h3>Enterprise-возможности GA</h3>
<ul>
<li>Выбор модели, <strong>Azure Key Vault</strong> для паролей.</li>
<li><strong>Purview</strong> + audit logs Dataverse.</li>
<li>Allow-list URL и приложений; access control блокирует <strong>действия</strong> вне списка (открытие сайта может не блокироваться — см. Learn).</li>
<li>Run history: что агент видел и куда кликал.</li>
<li><strong>Windows 365 Cloud PC pools</strong> — изолированное исполнение.</li>
<li>Maker credentials vs end-user credentials; dedicated machines, least privilege.</li>
</ul>
<p><strong>Ограничения:</strong> не все password fields и типы приложений (Electron, Java, Citrix и др.) поддерживаются одинаково — проверяйте по <a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/computer-use">Learn</a>.</p>
<hr>
    </div>
  </div>
</section>

<div class="ym-container"><section class="boris-article-viz reveal" id="copilot-computer-use-boris-block" aria-labelledby="boris-graebel-pipeline-title">
<style>
#copilot-computer-use-boris-block {
  --boris-bg: #f8fafc;
  --boris-surface: #ffffff;
  --boris-text: #334155;
  --boris-heading: #0f172a;
  --boris-border: #e2e8f0;
  --boris-ms-blue: #0078d4;
  --boris-ms-light: #deecf9;
  --boris-mcp: #7c3aed;
  --boris-ui: #0ea5e9;
  --boris-hitl: #10b981;
  --boris-credit: #f59e0b;
  margin: 48px 0 56px;
  font-family: Inter, system-ui, sans-serif;
}
#copilot-computer-use-boris-block .boris-viz-card {
  max-width: 1300px;
  margin: 0 auto;
  padding: clamp(24px, 4vw, 40px);
  background: var(--boris-surface);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
}
#copilot-computer-use-boris-block .boris-split {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: center;
}
@media (min-width: 1024px) {
  #copilot-computer-use-boris-block .boris-split {
    grid-template-columns: 0.95fr 1.05fr;
    gap: 36px;
  }
}
#copilot-computer-use-boris-block .boris-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--boris-ms-blue);
  margin: 0 0 10px;
}
#copilot-computer-use-boris-block .boris-kicker {
  font-size: clamp(20px, 2.4vw, 26px);
  font-weight: 800;
  line-height: 1.25;
  color: var(--boris-heading);
  margin: 0 0 12px;
}
#copilot-computer-use-boris-block .boris-lead {
  font-size: 15px;
  line-height: 1.55;
  color: var(--boris-text);
  margin: 0 0 18px;
}
#copilot-computer-use-boris-block .boris-theses {
  list-style: none;
  padding: 0;
  margin: 0 0 20px;
}
#copilot-computer-use-boris-block .boris-theses li {
  position: relative;
  padding-left: 18px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 1.45;
  color: var(--boris-text);
}
#copilot-computer-use-boris-block .boris-theses li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.55em;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--boris-ms-blue);
}
#copilot-computer-use-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 14px;
}
#copilot-computer-use-boris-block .boris-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: var(--boris-ms-light);
  color: #004578;
  border: 1px solid #c7e0f4;
}
#copilot-computer-use-boris-block .boris-pill--mcp {
  background: #ede9fe;
  color: #5b21b6;
  border-color: #ddd6fe;
}
#copilot-computer-use-boris-block .boris-bridge {
  font-size: 13px;
  color: #64748b;
  margin: 0;
  font-style: italic;
}
#copilot-computer-use-boris-block .boris-canvas-wrap {
  position: relative;
  width: 100%;
  min-height: 380px;
  max-height: 68vh;
  height: clamp(380px, 42vw, 520px);
  border-radius: 16px;
  background: linear-gradient(145deg, #f1f5f9 0%, #ffffff 55%, #eef2ff 100%);
  border: 1px solid var(--boris-border);
  overflow: hidden;
}
#copilot-computer-use-boris-block #boris-graebel-pipeline-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#copilot-computer-use-boris-block .boris-canvas-caption {
  position: absolute;
  bottom: 10px;
  left: 12px;
  right: 12px;
  font-size: 11px;
  color: #64748b;
  text-align: center;
  pointer-events: none;
}
</style>

  <div class="ym-container boris-viz-card">
    <div class="boris-split">
      <div class="boris-copy">
        <p class="boris-eyebrow">Кейс Graebel · шаблон для 1С и CRM</p>
        <h3 class="boris-kicker" id="boris-graebel-pipeline-title">Пайплайн «без API»: от письма до HITL</h3>
        <p class="boris-lead">Анимация показывает, как computer-using агент закрывает legacy там, где нет интеграции — параллельно live-данные идут через MCP, без копии в Graph.</p>
        <ul class="boris-theses">
          <li><strong>Вход:</strong> email / PDF → структурирование и confidence</li>
          <li><strong>Правила:</strong> compliance до кликов в UI</li>
          <li><strong>UI-агент:</strong> Global Connect, 1С-клиент или портал</li>
          <li><strong>HITL:</strong> человек на низкой уверенности</li>
        </ul>
        <div class="boris-pills" aria-hidden="true">
          <span class="boris-pill">5 credits / step</span>
          <span class="boris-pill">4 шага ≈ 20 credits</span>
          <span class="boris-pill boris-pill--mcp">MCP live · read-only</span>
        </div>
        <p class="boris-bridge">Дальше разберём federated MCP-коннекторы и отличие от synced-индекса.</p>
      </div>
      <div class="boris-canvas-wrap" role="img" aria-label="Схема: почта, структурирование, правила, UI legacy, HITL и параллельный MCP к HubSpot и Notion">
        <canvas id="boris-graebel-pipeline-canvas" width="640" height="480"></canvas>
        <span class="boris-canvas-caption">Цикл ~12 с · схема по материалам Microsoft Graebel GA, май 2026</span>
      </div>
    </div>
  </div>

<script>
(function borisGraebelPipelineEngine() {
  var canvas = document.getElementById("boris-graebel-pipeline-canvas");
  if (!canvas) return;
  var wrap = canvas.parentElement;
  var ctx = canvas.getContext("2d");
  var dpr = 1, W = 0, H = 0, frame = 0, credits = 0, creditTarget = 20;

  var PAL = {
    ink: "#0f172a",
    muted: "#64748b",
    line: "#cbd5e1",
    ms: "#0078d4",
    msSoft: "#deecf9",
    mcp: "#7c3aed",
    ui: "#0ea5e9",
    hitl: "#10b981",
    warn: "#f59e0b",
    mail: "#f97316",
    paper: "#ffffff"
  };

  function resize() {
    if (!wrap) return;
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    W = wrap.clientWidth;
    H = wrap.clientHeight;
    canvas.width = Math.floor(W * dpr);
    canvas.height = Math.floor(H * dpr);
    canvas.style.width = W + "px";
    canvas.style.height = H + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function rr(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    if (fill) { ctx.fillStyle = fill; ctx.fill(); }
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 1.5; ctx.stroke(); }
  }

  function label(x, y, text, color, size) {
    ctx.font = (size || 11) + "px Inter, system-ui, sans-serif";
    ctx.fillStyle = color || PAL.muted;
    ctx.textAlign = "center";
    ctx.fillText(text, x, y);
  }

  var stations = [
    { id: "mail", title: "Почта", sub: "вход" },
    { id: "struct", title: "OCR", sub: "поля" },
    { id: "rules", title: "Правила", sub: "compliance" },
    { id: "ui", title: "UI legacy", sub: "computer use" },
    { id: "hitl", title: "HITL", sub: "человек" }
  ];

  var mcpNodes = [
    { name: "HubSpot", angle: -0.9 },
    { name: "Notion", angle: -0.35 },
    { name: "1С MCP", angle: 0.35 }
  ];

  function stationLayout() {
    var padX = W * 0.06;
    var trackY = H * 0.58;
    var step = (W - padX * 2) / (stations.length - 1);
    return stations.map(function(s, i) {
      return { x: padX + i * step, y: trackY, w: 56, h: 48, meta: s };
    });
  }

  function drawMcpHub(cx, cy, pulse) {
    rr(cx - 36, cy - 22, 72, 44, 10, "#ede9fe", PAL.mcp);
    label(cx, cy + 4, "MCP live", PAL.mcp, 10);
    label(cx, cy + 16, "runtime", "#5b21b6", 9);
    mcpNodes.forEach(function(n, i) {
      var a = n.angle + Math.sin(frame * 0.02 + i) * 0.05;
      var r = H * 0.22;
      var nx = cx + Math.cos(a) * r;
      var ny = cy + Math.sin(a) * r * 0.55 - 20;
      ctx.strokeStyle = "rgba(124, 58, 237, " + (0.35 + pulse * 0.25) + ")";
      ctx.setLineDash([4, 6]);
      ctx.lineWidth = 1.5;
      ctx.beginPath();
      ctx.moveTo(cx, cy);
      ctx.lineTo(nx, ny);
      ctx.stroke();
      ctx.setLineDash([]);
      rr(nx - 28, ny - 14, 56, 28, 8, PAL.paper, PAL.mcp);
      label(nx, ny + 4, n.name, "#5b21b6", 9);
      var dotPhase = (frame * 0.04 + i * 40) % 60;
      if (dotPhase < 30) {
        var t = dotPhase / 30;
        var dx = cx + (nx - cx) * t;
        var dy = cy + (ny - cy) * t;
        ctx.fillStyle = PAL.mcp;
        ctx.beginPath();
        ctx.arc(dx, dy, 3, 0, Math.PI * 2);
        ctx.fill();
      }
    });
  }

  function drawStation(st, idx, active) {
    var m = st.meta;
    var colors = { mail: PAL.mail, struct: PAL.ms, rules: PAL.warn, ui: PAL.ui, hitl: PAL.hitl };
    var c = colors[m.id] || PAL.ms;
    var glow = active ? 6 : 0;
    if (glow) {
      ctx.shadowColor = c;
      ctx.shadowBlur = glow;
    }
    rr(st.x - st.w / 2, st.y - st.h / 2, st.w, st.h, 10, active ? PAL.msSoft : PAL.paper, active ? c : PAL.line);
    ctx.shadowBlur = 0;
    if (m.id === "mail") {
      rr(st.x - 10, st.y - 8, 20, 14, 3, "#fff7ed", PAL.mail);
      ctx.fillStyle = PAL.mail;
      ctx.beginPath();
      ctx.moveTo(st.x - 8, st.y - 4);
      ctx.lineTo(st.x, st.y + 2);
      ctx.lineTo(st.x + 8, st.y - 4);
      ctx.closePath();
      ctx.fill();
    } else if (m.id === "struct") {
      for (var li = 0; li < 3; li++) {
        rr(st.x - 14, st.y - 6 + li * 7, 20 + (li % 2) * 8, 4, 2, "#94a3b8", null);
      }
    } else if (m.id === "rules") {
      ctx.strokeStyle = PAL.warn;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(st.x - 8, st.y + 6);
      ctx.lineTo(st.x, st.y - 8);
      ctx.lineTo(st.x + 8, st.y + 6);
      ctx.closePath();
      ctx.stroke();
    } else if (m.id === "ui") {
      rr(st.x - 16, st.y - 12, 32, 22, 4, "#e0f2fe", PAL.ui);
      rr(st.x - 14, st.y - 10, 28, 4, 2, PAL.ui, null);
      var cx = st.x + Math.sin(frame * 0.08) * 6;
      var cy = st.y + 4 + Math.cos(frame * 0.1) * 3;
      ctx.fillStyle = PAL.ink;
      ctx.beginPath();
      ctx.moveTo(cx, cy);
      ctx.lineTo(cx + 8, cy + 10);
      ctx.lineTo(cx + 2, cy + 10);
      ctx.closePath();
      ctx.fill();
    } else if (m.id === "hitl") {
      ctx.strokeStyle = PAL.hitl;
      ctx.lineWidth = 2.5;
      ctx.beginPath();
      ctx.arc(st.x - 4, st.y, 8, 0, Math.PI * 2);
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(st.x + 6, st.y - 2);
      ctx.lineTo(st.x + 14, st.y + 8);
      ctx.stroke();
    }
    label(st.x, st.y + st.h / 2 + 14, m.title, PAL.ink, 11);
    label(st.x, st.y + st.h / 2 + 26, m.sub, PAL.muted, 9);
  }

  function drawPacket(x, y, alpha) {
    ctx.globalAlpha = alpha;
    rr(x - 12, y - 8, 24, 16, 4, "#fff7ed", PAL.mail);
    ctx.globalAlpha = 1;
  }

  function drawCreditBadge() {
    var bx = W - 118;
    var by = 16;
    rr(bx, by, 102, 36, 10, PAL.paper, PAL.line);
    label(bx + 51, by + 14, "Copilot Credits", PAL.muted, 9);
    var showCr = Math.min(creditTarget, Math.floor(credits));
    label(bx + 51, by + 28, showCr + " / " + creditTarget, PAL.warn, 12);
  }

  function drawTrack(layout) {
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 3;
    ctx.lineCap = "round";
    ctx.beginPath();
    ctx.moveTo(layout[0].x, layout[0].y);
    for (var i = 1; i < layout.length; i++) ctx.lineTo(layout[i].x, layout[i].y);
    ctx.stroke();
    var prog = (frame % 720) / 720;
    var seg = prog * (layout.length - 1);
    var si = Math.floor(seg);
    var t = seg - si;
    if (si >= layout.length - 1) { si = layout.length - 2; t = 1; }
    var px = layout[si].x + (layout[si + 1].x - layout[si].x) * t;
    var py = layout[si].y + (layout[si + 1].y - layout[si].y) * t - 22;
    drawPacket(px, py, 0.95);
    credits = (si + t) * 5;
    var activeIdx = Math.min(stations.length - 1, Math.round(seg));
    layout.forEach(function(st, i) { drawStation(st, i, i === activeIdx); });
  }

  function draw() {
    ctx.clearRect(0, 0, W, H);
    var pulse = 0.5 + 0.5 * Math.sin(frame * 0.05);
    drawMcpHub(W * 0.5, H * 0.2, pulse);
    var layout = stationLayout();
    drawTrack(layout);
    drawCreditBadge();
    label(W * 0.5, H - 8, "Federated MCP · без индекса в M365", PAL.muted, 10);
    frame++;
    requestAnimationFrame(draw);
  }

  resize();
  window.addEventListener("resize", resize);
  if (typeof IntersectionObserver !== "undefined") {
    var obs = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting && !canvas.dataset.borisRunning) {
          canvas.dataset.borisRunning = "1";
          draw();
        }
      });
    }, { threshold: 0.15 });
    obs.observe(canvas);
  } else {
    draw();
  }
})();
</script>
</section></div>

<section class="ym-section reveal" id="federated-mcp">
  <div class="ym-container">
    <h2 class="ym-section-title">Federated MCP-коннекторы: live-данные HubSpot, Notion и legacy</h2>
    <div class="ym-content-prose">
<h3>Определение</h3>
<p><strong>Synced connector</strong> индексирует данные в Microsoft Graph. <strong>Federated connector (MCP)</strong> отдаёт данные <strong>в момент запроса</strong>, read-only (поиск/получение, без записи через этот канал), с <strong>учётными данными пользователя</strong> и его правами в источнике. Обзор: <a href="https://learn.microsoft.com/en-us/microsoft-365/copilot/connectors/federated-connectors-overview">Federated connectors overview</a>.</p>
<h3>Партнёры MCP (HubSpot, Notion, LSEG, Moody's)</h3>
<p>Microsoft-published federated (список Learn на <strong>30.04.2026</strong>): <strong>Canva</strong>, Google Calendar, Google Contacts, <strong>HubSpot</strong>, Intercom, Linear, <strong>LSEG</strong>, <strong>Moody's</strong>, <strong>Notion</strong>.</p>
<p>Точки входа: <strong>Copilot Chat</strong>, агент <strong>Researcher</strong>; LSEG и Moody's также в <strong>Excel</strong> (майский дайджест 2026).</p>
<p>Для <strong>mcp для бизнеса</strong> и <strong>mcp автоматизация</strong> это означает: CRM и knowledge base подключаются как <strong>живой контекст</strong>, а не как «ещё одна копия в облаке Microsoft».</p>
<h3>1С, внутренние CRM и custom connectors без своего API</h3>
<p><strong>Важно разделять:</strong></p>
<table>
<thead>
<tr>
<th>Слой</th>
<th>Что даёт</th>
<th>Пример</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>MCP к 1С</strong></td>
<td>API/метаданные, отчёты, без «клика по форме»</td>
<td>OyaAIProd/mcp-1c, 1С:Шина + MCP (<a href="https://companies.rbc.ru/news/FmFwJNaFm5/kak-ii-agentyi-menyayut-rabotu-s-dannyimi-v-1s/">РБК Companies</a>)</td>
</tr>
<tr>
<td><strong>Computer use</strong></td>
<td>Действия в <strong>клиенте 1С</strong> или старом web без API</td>
<td>Copilot Studio GA</td>
</tr>
<tr>
<td><strong>ИИ агент для crm</strong></td>
<td>Гибрид: MCP где есть API + UI где нет</td>
<td>Пайплайн Nero</td>
</tr>
</tbody>
</table>
<p>Организации могут строить <strong>custom federated MCP</strong> для LOB — в майском дайджесте Microsoft упоминает масштаб «hundreds of SaaS» через MCP в экосистеме Work IQ.</p>
<p><strong>Админка:</strong> Microsoft 365 Admin Center → Copilot connectors → Your Connections; tenant-level enable/disable; <strong>staged rollout</strong> по группам Entra ID; PowerShell bulk enable/disable; при появлении нового коннектора — <strong>7 календарных дней</strong> только для админов.</p>
<h3>Сравнение: synced vs federated</h3>
<table>
<thead>
<tr>
<th>Критерий</th>
<th>Synced</th>
<th>Federated (MCP)</th>
</tr>
</thead>
<tbody>
<tr>
<td>Хранение данных у Microsoft</td>
<td>Индекс в Graph</td>
<td>Нет копии, runtime</td>
</tr>
<tr>
<td>Актуальность</td>
<td>Зависит от синхронизации</td>
<td>Live</td>
</tr>
<tr>
<td>Запись в источник</td>
<td>Зависит от коннектора</td>
<td>Read-only в federated</td>
</tr>
<tr>
<td>Безопасность</td>
<td>DLP на индекс</td>
<td>Права пользователя в источнике</td>
</tr>
</tbody>
</table>
<p><strong>Итог:</strong> для <strong>ии агент для crm</strong> с HubSpot/Notion — federated MCP; для <strong>1С без API</strong> в толстом клиенте — computer use или гибрид с RPA.</p>
<hr>
    </div>
  </div>
</section>


<section class="ym-section ym-section-alt reveal" id="copilot-vs-make">
  <div class="ym-container">
    <h2 class="ym-section-title">Copilot Studio vs Make, n8n и Cursor для российского SMB</h2>
    <div class="ym-content-prose">
<h3>Лицензии M365, credits и реальная стоимость</h3>
<p><strong>Copilot Studio</strong> и <strong>M365 Copilot</strong> — отдельные строки TCO. Computer use масштабируется через <strong>Copilot Credits</strong> (см. таблицу steps выше). Для SMB в РФ часто критичны:</p>
<ul>
<li>доступность оплаты и лицензий Microsoft в контуре компании;</li>
<li>необходимость <strong>M365 Copilot</strong> для части сценариев M365 Chat/Researcher;</li>
<li>прогнозируемый <strong>cost model</strong> до production (шаги × credits × $/credit).</li>
</ul>
<p><strong>Не смешивайте</strong> с «бесплатным Cursor» или подпиской только на LLM: UI-агент в enterprise — это оркестрация, аудит, изоляция, credits.</p>
<h3>Cursor 3.5 Automations и MCP вне экосистемы Microsoft</h3>
<p><strong>20.05.2026</strong> Cursor выпустил <strong>Automations</strong>: сценарии в <strong>multi-repo</strong> и <strong>no-repo</strong> без привязки к M365 (<a href="https://cursor.com/changelog/05-20-26">changelog 05-20-26</a>).</p>
<table>
<thead>
<tr>
<th>Стек</th>
<th>Сильные стороны</th>
<th>Слабые для «офиса без разработчиков»</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Copilot Studio + M365</strong></td>
<td>GA computer use, Purview, Entra, federated MCP в M365</td>
<td>Лицензии, зависимость от Microsoft</td>
</tr>
<tr>
<td><strong>Cursor + MCP</strong></td>
<td>Кастомный код, свои MCP-серверы, 1С/внутренние API</td>
<td>Нужны разработчики или партнёр по внедрению</td>
</tr>
<tr>
<td><strong>Make / n8n</strong></td>
<td><strong>make com автоматизация</strong>, визуальные сценарии, 1000+ коннекторов</td>
<td>UI-legacy — через браузерные модули, RPA-плагины или вызов внешнего агента</td>
</tr>
</tbody>
</table>
<p><strong>Практика Nero Network для РФ:</strong> <strong>Make/n8n</strong> — оркестрация и интеграции; <strong>Cursor</strong> — кастомные MCP и автоматизации репозитория; <strong>MCP к 1С</strong> — где есть метаданные/API; <strong>browser automation + vision</strong> — аналог computer use без Copilot Studio.</p>
<h3>Copilot агенты для бизнеса vs «цифровые сотрудники»</h3>
<p>Тренд <strong>цифровые сотрудники</strong> (в Wordstat — высокий родовой кластер) совпадает с позицией вендоров: агенты не заменяют ERP, а закрывают <strong>узкие процессы</strong> с HITL. Microsoft добавляет <strong>контрактный GA</strong> computer use; Anthropic Computer Use — beta (paid); Google Gemini Computer Use — public preview (вторичные обзоры, сверять с вендорами).</p>
<hr>
    </div>
  </div>
</section>

<aside class="ym-cta-block reveal" id="cta-primary-audit" aria-labelledby="cta-primary-audit-title">
  <div class="ym-container">
    <div class="ym-card" style="padding: clamp(28px, 4vw, 40px); border-left: 4px solid var(--ym-primary);">
      <h3 id="cta-primary-audit-title" class="ym-section-title" style="font-size: clamp(22px, 3vw, 28px); text-align: left; margin-bottom: 12px;">Аудит процесса «без API» под ваш стек</h3>
      <p style="margin: 0 0 20px; color: var(--ym-text); line-height: 1.6;">Разберём один процесс: где хватит <strong>MCP</strong>, где нужен UI-агент или browser automation, где обязателен <strong>human-in-the-loop</strong>. Пилот в периметре РФ — без обязательного M365.</p>
      <div class="ym-btn-group" style="justify-content: flex-start;">
        <a class="ym-btn ym-btn-primary" href="${PRIMARY_CTA_URL}" target="_blank" rel="noopener noreferrer"><span>${PRIMARY_CTA_LABEL}</span></a>
      </div>
    </div>
  </div>
</aside>

<section class="ym-section reveal" id="security-dlp-hitl">
  <div class="ym-container">
    <h2 class="ym-section-title">Безопасность, DLP и human-in-the-loop</h2>
    <div class="ym-content-prose">
<h3>Риски computer-use и политики для SMB</h3>
<p><strong>Computer use</strong> увеличивает поверхность риска: агент <strong>видит</strong> экран и <strong>действует</strong> от имени учётной записи.</p>
<p>Минимальный чеклист:</p>
<ol>
<li><strong>Allow-list</strong> URL и приложений.</li>
<li><strong>Выделенная машина</strong> или Windows 365 Cloud PC pool — не личный ноутбук директора.</li>
<li><strong>Maker vs end-user credentials</strong> — кто «владелец» сессии.</li>
<li><strong>HITL</strong> на финансовых проводках, персональных данных, low confidence.</li>
<li><strong>Run history</strong> и аудит (Purview, Dataverse logs).</li>
<li><strong>Least privilege</strong> — отдельная УЗ агента без лишних ролей.</li>
</ol>
<p>Password fields и нестандартные клиенты — тестировать на пилоте, не на production с первого дня.</p>
<h3>Периметр данных и согласование с ИБ</h3>
<p>Для <strong>внедрение ai агентов в компанию</strong> в РФ добавьте:</p>
<ul>
<li><strong>152-ФЗ</strong>: где обрабатываются ПДн (облако Microsoft vs on-prem MCP к 1С).</li>
<li><strong>Generative AI data movement</strong> вне US — может требовать включения админом (<a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/manage-data-movement-outside-us">Learn data movement</a>).</li>
<li><strong>Federated MCP</strong>: данные остаются в источнике — плюс для ИБ, если запрещена лишняя копия в Graph.</li>
<li><strong>On-prem / private cloud</strong> — альтернативы вроде MWS AI Force (см. ниже).</li>
</ul>
<p><strong>Итог:</strong> безопасность — не приложение к проекту, а условие <strong>масштабирования</strong> цифровых сотрудников.</p>
<hr>
    </div>
  </div>
</section>


<section class="ym-section ym-section-alt reveal" id="russia-context">
  <div class="ym-container">
    <h2 class="ym-section-title">Российский контекст: альтернативы и что повторить без M365</h2>
    <div class="ym-content-prose">
<h3>GigaCowork, MWS AI Force, Alice Flash (без выдуманных цифр)</h3>
<table>
<thead>
<tr>
<th>Продукт</th>
<th>Что заявлено (май 2026)</th>
<th>Computer-use / UI без API</th>
<th>MCP</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Сбер GigaCowork</strong></td>
<td>Платформа ИИ-агентов, навыки, коннекторы <strong>по MCP</strong>, действия от имени сотрудника</td>
<td><strong>Не заявлено</strong></td>
<td>Да</td>
</tr>
<tr>
<td><strong>MWS AI «ИИ-команда»</strong></td>
<td>Агенты по текстовому описанию, on-prem/private cloud, FastMCP</td>
<td><strong>Не заявлено</strong></td>
<td>Да</td>
</tr>
<tr>
<td><strong>Яндекс Alice AI LLM Flash</strong></td>
<td>Быстрая <strong>модель</strong> в Yandex AI Studio (~5× дешевле предыдущих моделей Яндекса; в <strong>56%</strong> бизнес-сценариев сопоставима с GPT-5.4 mini — <strong>заявление Яндекса</strong>, 28.05.2026)</td>
<td><strong>Нет</strong> (это LLM)</td>
<td>Экосистема MCP для 1С — отдельно</td>
</tr>
</tbody>
</table>
<p>Источники: <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu">CNews GigaCowork</a>, <a href="https://www.vedomosti.ru/technologies/trendsrub/news/2026/05/21/1198966-mws-vipustila-modul">Ведомости MWS</a>, <a href="https://www.cnews.ru/news/line/2026-05-28_yandeks_zapustil_bystruyu">CNews Alice Flash</a>.</p>
<p><strong>Андрей Белевцев</strong> (Сбер, ЦИПР-2026): ИИ-агенты как «новые сотрудники»; GigaCowork для делегирования рутины (перепечатки пресс-службы).</p>
<p><strong>Артур Самигуллин</strong> (Yandex AI Studio): Alice Flash — модели «под запросы бизнеса», данные в РФ.</p>
<p><strong>Вывод:</strong> на май 2026 в РФ <strong>нет заявленного GA-аналога</strong> enterprise computer-using agent уровня Microsoft. Ближе по духу к «собрать под себя» — <strong>Cursor + Make/n8n + MCP к 1С + при необходимости RPA</strong>.</p>
<h3>Microsoft Build 2026 / Windows Agent Runtime (осторожно, preview)</h3>
<p><strong>Build 2–3 июня 2026:</strong> анонс <strong>Windows Agent Runtime (preview)</strong>. Insiders — ориентир <strong>июнь 2026</strong>; сначала text agents на structured data (JSON, XML, PDF); <strong>vision/UI agents — roadmap 2027</strong>; sandbox, capability grants, Agent Store. <strong>Не подменяйте</strong> этим уже <strong>GA</strong> Copilot Studio computer use.</p>
<p><strong>Windows 365 for Agents</strong> — public preview (<strong>US only</strong>), Intune-managed Cloud PC для агентов: <a href="https://techcommunity.microsoft.com/blog/windows-itpro-blog/windows-365-for-agents-now-in-public-preview-run-ai-agents-securely-at-scale/4513479">Tech Community</a>.</p>
<h3>Автоматизация бизнес процессов нейросеть в документообороте</h3>
<p>Для <strong>нейросеть для документооборота</strong> связка май 2026: <strong>Content Understanding / OCR</strong> → правила → <strong>MCP</strong> к DMS/CRM или <strong>UI-agent</strong> в legacy. Это повторяет логику Graebel без обязательного Copilot, если стек российский.</p>
<hr>
    </div>
  </div>
</section>


<section class="ym-section reveal" id="implementation-steps">
  <div class="ym-container">
    <h2 class="ym-section-title">Пошаговое внедрение: аудит процесса, пилот, масштабирование</h2>
    <div class="ym-content-prose">
<h3>Карта процесса «без API»</h3>
<p><strong>Шаг 1 — аудит (1–2 недели):</strong></p>
<table>
<thead>
<tr>
<th>Вопрос</th>
<th>Ветка решения</th>
</tr>
</thead>
<tbody>
<tr>
<td>Есть API или MCP?</td>
<td>MCP + Make/n8n</td>
</tr>
<tr>
<td>Только UI в desktop/web?</td>
<td>Computer use или Playwright + vision</td>
</tr>
<tr>
<td>Вход — email/PDF/сканы?</td>
<td>OCR/Content Understanding + HITL</td>
</tr>
<tr>
<td>Нужна запись в систему?</td>
<td>UI-agent или API; federated MCP — read-only</td>
</tr>
<tr>
<td>Регуляторика/ПДн?</td>
<td>On-prem MCP, выделенная среда, HITL</td>
</tr>
</tbody>
</table>
<p><strong>Шаг 2 — пилот одного процесса</strong> (4–8 недель): один owner, метрики «время на заявку», «% ручных исключений», <strong>не</strong> фантазийный ROI в процентах.</p>
<p><strong>Шаг 3 — масштаб:</strong> политики ИБ, cost model по шагам/credits (если Copilot) или по API-вызовам (если Cursor/Make).</p>
<h3>Пилот на Make + MCP + no-code</h3>
<p>Пример <strong>гибрида без M365</strong>:</p>
<ol>
<li><strong>Make</strong>: триггер (почта, форма, webhook).</li>
<li><strong>LLM</strong>: классификация и извлечение полей (аналог Content Understanding).</li>
<li><strong>MCP-сервер к 1С</strong> — чтение/запись там, где есть API метаданных.</li>
<li><strong>Browser automation</strong> (Make, Playwright, отдельный агент) — UI там, где API нет.</li>
<li><strong>HITL</strong> в Telegram/почте/таск-трекере на исключениях.</li>
</ol>
<p>Так вы воспроизводите <strong>логику Graebel</strong> в периметре РФ без лицензии на весь M365.</p>
<h3>TCO: ориентир для калькулятора</h3>
<table>
<thead>
<tr>
<th>Сценарий</th>
<th>Шагов</th>
<th>Credits (standard)</th>
<th>Ориентир $ (prepaid ~$0,008/cr)</th>
</tr>
</thead>
<tbody>
<tr>
<td>Простой ввод (3 шага)</td>
<td>3</td>
<td>15</td>
<td>~$0,12</td>
</tr>
<tr>
<td>Graebel-like (4 шага UI)</td>
<td>4</td>
<td>20</td>
<td>~$0,16</td>
</tr>
<tr>
<td>Сложный мультиэкран (10 шагов)</td>
<td>10</td>
<td>50</td>
<td>~$0,40</td>
</tr>
</tbody>
</table>
<p><em>Цифры ориентировочные; фактический счёт — по договору Microsoft и объёму.</em></p>
<p>Сравнивайте с <strong>одним пилотом</strong> на Make + Cursor (фиксированные часы внедрения + подписки), без заявлений «в 10 раз дешевле» без замеров.</p>
<hr>
    </div>
  </div>
</section>

<aside class="ym-cta-block reveal" id="cta-secondary-training" aria-labelledby="cta-secondary-training-title">
  <div class="ym-container">
    <div class="ym-card" style="padding: clamp(24px, 3vw, 32px); background: var(--ym-bg);">
      <h3 id="cta-secondary-training-title" style="font-size: 20px; font-weight: 700; margin: 0 0 10px; color: var(--ym-heading);">Освоить Make, Cursor и MCP на практике</h3>
      <p style="margin: 0 0 16px; color: var(--ym-text); line-height: 1.6;">Если команда хочет не только заказать внедрение, но и <strong>внедрение ai агентов</strong> своими силами — начните с обучающей программы по автоматизации и no-code.</p>
      <p style="margin: 0;"><a class="ym-btn ym-btn-secondary" href="${SECONDARY_CTA_URL}" target="_blank" rel="noopener noreferrer">${SECONDARY_CTA_LABEL}</a></p>
    </div>
  </div>
</aside>

<section class="ym-section ym-section-alt reveal" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <p class="ym-section-subtitle">Ответы для сниппетов и AI-поиска</p>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="font-size:18px;margin:0 0 16px;">Вопросы</h3>
        <ul class="ym-faq-list"><li><a href="#faq-1">Что такое computer-using agent в Copilot Studio?</a></li><li><a href="#faq-2">Чем computer use отличается от RPA?</a></li><li><a href="#faq-3">Сколько стоит один шаг computer use?</a></li><li><a href="#faq-4">Что такое federated MCP в M365 Copilot?</a></li><li><a href="#faq-5">Какие MCP-коннекторы опубликовал Microsoft?</a></li><li><a href="#faq-6">Можно ли автоматизировать 1С без API?</a></li><li><a href="#faq-7">Подходит ли Copilot Studio российскому SMB?</a></li><li><a href="#faq-8">Что такое A2A в Copilot Studio?</a></li><li><a href="#faq-9">Безопасно ли давать агенту пароли?</a></li><li><a href="#faq-10">Есть ли в России аналог computer use GA?</a></li><li><a href="#faq-11">Что анонсировали на Build 2026?</a></li><li><a href="#faq-12">С чего начать внедрение ai агентов в компанию?</a></li></ul>
      </aside>
      <div><article class="ym-faq-item reveal" id="faq-1"><h3>Что такое computer-using agent в Copilot Studio?</h3><p>ИИ-агент с инструментом Computer use: vision, рассуждение и управление UI в браузере и Windows. GA с 13.05.2026 в коммерческих регионах Power Platform.</p></article><article class="ym-faq-item reveal" id="faq-2"><h3>Чем computer use отличается от RPA?</h3><p>RPA опирается на селекторы и жёсткие сценарии; computer use адаптируется к изменениям UI и неструктурированному входу за счёт моделей (CUA, Claude).</p></article><article class="ym-faq-item reveal" id="faq-3"><h3>Сколько стоит один шаг computer use?</h3><p>5 Copilot Credits (standard) или 15 (premium Opus). Пакет 25 000 credits ≈ $200/мес.</p></article><article class="ym-faq-item reveal" id="faq-4"><h3>Что такое federated MCP в M365 Copilot?</h3><p>Подключение по MCP без индексации данных в M365; read-only запросы в runtime с правами пользователя.</p></article><article class="ym-faq-item reveal" id="faq-5"><h3>Какие MCP-коннекторы опубликовал Microsoft?</h3><p>Canva, Google Calendar/Contacts, HubSpot, Intercom, Linear, LSEG, Moody's, Notion (список Learn, 30.04.2026).</p></article><article class="ym-faq-item reveal" id="faq-6"><h3>Можно ли автоматизировать 1С без API?</h3><p>Да: либо computer use (UI), либо MCP там, где есть API метаданных, либо гибрид. Это разные слои — не путайте «клик в клиенте» и «запрос к базе через MCP».</p></article><article class="ym-faq-item reveal" id="faq-7"><h3>Подходит ли Copilot Studio российскому SMB?</h3><p>Зависит от лицензий M365, бюджета на credits и ИБ. Часто рациональнее пилот на Make/Cursor/MCP с тем же процессным дизайном.</p></article><article class="ym-faq-item reveal" id="faq-8"><h3>Что такое A2A в Copilot Studio?</h3><p>Agent-to-agent: агенты делегируют задачи друг другу; в блоге Microsoft (май 2026) — GA в Studio. Work IQ API для внешних разработчиков — preview.</p></article><article class="ym-faq-item reveal" id="faq-9"><h3>Безопасно ли давать агенту пароли?</h3><p>Используйте Key Vault, выделенные УЗ, allow-list, Cloud PC pools и HITL; проверяйте поддержку вашего типа приложения в Learn.</p></article><article class="ym-faq-item reveal" id="faq-10"><h3>Есть ли в России аналог computer use GA?</h3><p>На май 2026 у GigaCowork и MWS заявлены MCP и оркестрация, но не GA UI-automation уровня Microsoft. Alice Flash — модель, не UI-агент.</p></article><article class="ym-faq-item reveal" id="faq-11"><h3>Что анонсировали на Build 2026?</h3><p>Windows Agent Runtime (preview): text agents в 2026, vision/UI — в roadmap 2027. Это не замена уже GA Copilot Studio computer use.</p></article><article class="ym-faq-item reveal" id="faq-12"><h3>С чего начать внедрение ai агентов в компанию?</h3><p>Аудит одного процесса: API / MCP / только UI / почта → пилот с метриками и HITL → политики ИБ и cost model.</p></article></div>
    </div>
  </div>
</section>


<section class="ym-section ym-section-alt reveal" id="itog">
  <div class="ym-container">
    <h2 class="ym-section-title">Итог</h2>
    <div class="ym-content-prose">
<p>Май 2026 закрепил <strong>два крыла</strong> корпоративной автоматизации Microsoft: <strong>federated MCP</strong> для live-данных и <strong>computer-using agents</strong> для legacy <strong>без API</strong>. Кейс Graebel показывает рабочий шаблон: неструктурированный вход → структурирование → правила → UI → HITL. Для российского SMB прямой путь — не всегда M365; воспроизводимая сборка — <strong>Make/n8n + Cursor + MCP к 1С + browser/UI automation</strong> с тем же governance. Следующий шаг — аудит одного процесса и пилот с измеримыми метриками, без обещаний процентов экономии без замеров.</p>
    </div>
  </div>
</section>

<!-- AD_BANNER: env not set — hidden until AD_BANNER_* secrets -->
<aside class="ym-ad-banner reveal" aria-label="Рекламный баннер партнёра" hidden>
  <div class="ym-container" style="text-align: center; padding: 24px 0 48px;">
    <a href="${AD_BANNER_URL}" target="_blank" rel="noopener noreferrer">
      <img src="${AD_BANNER_IMAGE_URL}" width="970" height="90" alt="${AD_BANNER_ALT}" loading="lazy" decoding="async" style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
    </a>
  </div>
</aside>

<section class="ym-section reveal">
  <div class="ym-container">
    <p class="ym-content-prose" style="font-size:14px;color:#64748b!important;text-align:center;margin:0;">
      Материал подготовлен редакцией Nero Network; факты Microsoft — по ссылкам Learn и Tech Community на дату research 30.05.2026.
    </p>
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
  "headline": "Computer-using агенты и MCP в Copilot: как автоматизировать бизнес без API",
  "description": "Microsoft открыл GA UI-агентов и federated MCP в M365 Copilot. Как автоматизировать 1С и CRM без API, чем отличается от RPA и что делать в РФ с Make и Cursor.",
  "author": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "datePublished": "2026-05-30",
  "dateModified": "2026-05-30",
  "inLanguage": "ru-RU",
  "keywords": "ai агенты для бизнеса, автоматизация без api, mcp для бизнеса, copilot studio, computer use агент"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Что такое computer-using agent в Copilot Studio?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ИИ-агент с инструментом Computer use: vision, рассуждение и управление UI в браузере и Windows. GA с 13.05.2026 в коммерческих регионах Power Platform."
      }
    },
    {
      "@type": "Question",
      "name": "Чем computer use отличается от RPA?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "RPA опирается на селекторы и жёсткие сценарии; computer use адаптируется к изменениям UI и неструктурированному входу за счёт моделей (CUA, Claude)."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько стоит один шаг computer use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "5 Copilot Credits (standard) или 15 (premium Opus). Пакет 25 000 credits ≈ $200/мес."
      }
    },
    {
      "@type": "Question",
      "name": "Что такое federated MCP в M365 Copilot?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Подключение по MCP без индексации данных в M365; read-only запросы в runtime с правами пользователя."
      }
    },
    {
      "@type": "Question",
      "name": "Какие MCP-коннекторы опубликовал Microsoft?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Canva, Google Calendar/Contacts, HubSpot, Intercom, Linear, LSEG, Moody's, Notion (список Learn, 30.04.2026)."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли автоматизировать 1С без API?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да: либо computer use (UI), либо MCP там, где есть API метаданных, либо гибрид. Это разные слои — не путайте «клик в клиенте» и «запрос к базе через MCP»."
      }
    },
    {
      "@type": "Question",
      "name": "Подходит ли Copilot Studio российскому SMB?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Зависит от лицензий M365, бюджета на credits и ИБ. Часто рациональнее пилот на Make/Cursor/MCP с тем же процессным дизайном."
      }
    },
    {
      "@type": "Question",
      "name": "Что такое A2A в Copilot Studio?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Agent-to-agent: агенты делегируют задачи друг другу; в блоге Microsoft (май 2026) — GA в Studio. Work IQ API для внешних разработчиков — preview."
      }
    },
    {
      "@type": "Question",
      "name": "Безопасно ли давать агенту пароли?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Используйте Key Vault, выделенные УЗ, allow-list, Cloud PC pools и HITL; проверяйте поддержку вашего типа приложения в Learn."
      }
    },
    {
      "@type": "Question",
      "name": "Есть ли в России аналог computer use GA?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "На май 2026 у GigaCowork и MWS заявлены MCP и оркестрация, но не GA UI-automation уровня Microsoft. Alice Flash — модель, не UI-агент."
      }
    },
    {
      "@type": "Question",
      "name": "Что анонсировали на Build 2026?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Windows Agent Runtime (preview): text agents в 2026, vision/UI — в roadmap 2027. Это не замена уже GA Copilot Studio computer use."
      }
    },
    {
      "@type": "Question",
      "name": "С чего начать внедрение ai агентов в компанию?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Аудит одного процесса: API / MCP / только UI / почта → пилот с метриками и HITL → политики ИБ и cost model."
      }
    }
  ]
}
</script>
<!-- /wp:html -->

<?php
get_footer();
