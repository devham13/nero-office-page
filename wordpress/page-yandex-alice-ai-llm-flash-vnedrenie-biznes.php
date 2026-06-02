<?php
/**
 * Template Name: Alice AI LLM Flash — внедрение для бизнеса
 * Description: Лонгрид Nero Network — Yandex AI Studio, Alice AI LLM Flash.
 */

$page_seo_title = 'Alice AI LLM Flash: внедрение нейросети Яндекса для бизнеса';
$page_seo_description = 'Alice AI LLM Flash в Yandex AI Studio: поддержка и документы дешевле, 152-ФЗ, RAG и CRM. Сравнение с GPT-5.4 mini и внедрение под ваш процесс — Nero Network.';

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
 *   `.yandex-alice-ai-llm-flash-vnedrenie-biznes-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page {
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

.yandex-alice-ai-llm-flash-vnedrenie-biznes-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h1,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h2,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h3,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h4,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h5,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page p,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page li,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page strong,
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.yandex-alice-ai-llm-flash-vnedrenie-biznes-page pre, .yandex-alice-ai-llm-flash-vnedrenie-biznes-page code {
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
    background: linear-gradient(90deg, #fc3f1d, #ff4b4b);
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
    box-shadow: 0 10px 20px -5px rgba(252, 63, 29, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(252, 63, 29, 0.5);
    background: #e0351a;
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
#alice-flash-hero.fullscreen-white-office.af-hero-studio {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.yandex-intro-section { padding: 56px 0 24px; }
.yandex-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
  gap: 32px 40px;
  align-items: start;
}
.yandex-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #fc3f1d, #8b5cf6) 1;
  padding-left: 24px;
}
.yandex-intro-text p { text-align: left !important; }
.yandex-intro-lead {
  font-size: 18px;
  line-height: 1.65;
  font-weight: 500;
  color: var(--ym-heading) !important;
  margin: 0 0 16px;
}
.yandex-intro-kpis {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 20px;
}
.yandex-intro-kpi {
  font-size: 12px;
  font-weight: 700;
  padding: 8px 14px;
  border-radius: 999px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  color: var(--ym-heading) !important;
}
.yandex-toc-wrap { padding: 8px 0 48px; text-align: center; }
.yandex-toc-wrap .ym-toc { margin-top: 0; }
.ym-prose { max-width: 900px; margin: 0 auto; }
.ym-prose h3 { font-size: 22px; font-weight: 700; margin: 32px 0 16px; }
.ym-prose p, .ym-prose li { line-height: 1.65; font-size: 16px; }
.ym-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 15px;
}
.ym-prose table th, .ym-prose table td {
  border: 1px solid var(--ym-border);
  padding: 12px 16px;
  text-align: left;
}
.ym-prose table th { background: #f1f5f9; font-weight: 700; }
.ym-prose hr { border: none; border-top: 1px solid var(--ym-border); margin: 40px 0; }
.ym-prose strong { color: var(--ym-heading) !important; }
.ym-callout {
  background: linear-gradient(135deg, #fff7ed, #f0f9ff);
  border: 1px solid var(--ym-border);
  border-radius: 16px;
  padding: 20px 24px;
  margin: 24px 0;
  font-size: 15px;
}
.ym-cta-card {
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 20px;
  padding: 36px 40px;
  margin: 40px auto;
  max-width: 900px;
  box-shadow: var(--ym-shadow);
}
.ym-cta-card--primary {
  border-color: rgba(252, 63, 29, 0.25);
  background: linear-gradient(145deg, #ffffff, #fff7ed);
}
.ym-cta-card--secondary { background: #f8fafc; }
.ym-cta-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--ym-primary) !important;
  margin: 0 0 8px;
}
.ym-cta-lead { font-size: 17px; line-height: 1.55; margin-bottom: 16px; }
.ym-cta-list { margin: 0 0 24px; padding-left: 20px; }
.ym-cta-list li { margin-bottom: 8px; }
.ym-cta-note { font-size: 13px; color: #64748b !important; margin: 16px 0 0; }
.ym-lead-form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-bottom: 20px;
}
.ym-lead-field { display: flex; flex-direction: column; gap: 6px; font-size: 14px; font-weight: 600; }
.ym-lead-field--full { grid-column: 1 / -1; }
.ym-lead-field input, .ym-lead-field textarea {
  padding: 12px 14px;
  border: 1px solid var(--ym-border);
  border-radius: 10px;
  font-size: 15px;
  font-family: inherit;
}
.ym-lead-actions { justify-content: flex-start; }
.ym-cta-strip {
  background: linear-gradient(90deg, #0f172a, #1e293b);
  border-radius: 16px;
  padding: 28px 32px;
  margin: 48px auto;
  max-width: 900px;
}
.ym-cta-strip-inner {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}
.ym-cta-strip-title { color: #f8fafc !important; margin: 0; font-size: 18px; }
.ym-cta-strip .ym-btn-primary { background: #fc3f1d; }
.ym-cta-strip .ym-btn-secondary {
  background: transparent;
  color: #f8fafc !important;
  border-color: rgba(248, 250, 252, 0.35);
}
.ym-sources {
  max-width: 900px;
  margin: 0 auto;
  padding: 40px 0 20px;
  font-size: 14px;
  color: #64748b !important;
}
.ym-sources a { color: var(--ym-accent) !important; }
@media (max-width: 900px) {
  .yandex-intro-grid { grid-template-columns: 1fr; }
  .ym-lead-form-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main yandex-alice-ai-llm-flash-vnedrenie-biznes-page" role="main" tabindex="-1">
<section id="alice-flash-hero" class="fullscreen-white-office af-hero-studio" aria-labelledby="alice-flash-hero-title">
<style>
.fullscreen-white-office.af-hero-studio {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.af-hero-studio::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse 70% 50% at 55% 42%, rgba(252, 211, 77, 0.12), transparent 55%),
    radial-gradient(ellipse 40% 35% at 20% 80%, rgba(59, 130, 246, 0.08), transparent 50%);
  pointer-events: none;
  z-index: 0;
}
.af-hero-studio canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.af-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(720px, 92vw);
  z-index: 3;
}
.af-hero-pill-row {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  justify-content: flex-end;
  max-width: min(520px, 90vw);
  z-index: 3;
}
.af-hero-pill-row span {
  padding: 8px 14px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #fc3f1d, #8b5cf6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 680px;
}
.telegram-button {
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
.telegram-button:hover { transform: translateY(-2px); }
.vl-ui-tasks.af-hero-steps {
  position: absolute;
  left: clamp(16px, 3vw, 48px);
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 10px;
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
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
  backdrop-filter: blur(6px);
}
.vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #fc3f1d, #f97316);
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
  .vl-ui-tasks.af-hero-steps { display: none; }
  .af-hero-copy { bottom: 20px; }
}
</style>

<canvas id="alice-flash-dispatch-hero-canvas" aria-hidden="true"></canvas>

<div class="af-hero-pill-row" aria-label="Метки темы">
  <span>Flash</span>
  <span>AI Studio</span>
  <span>RAG</span>
  <span>~5×</span>
  <span>контур РФ</span>
</div>

<nav class="vl-ui-tasks af-hero-steps" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Поток обращений</div>
  <div class="vl-ui-task"><span>2</span> Flash-классификация</div>
  <div class="vl-ui-task"><span>3</span> RAG по базе</div>
  <div class="vl-ui-task"><span>4</span> Маршрут в CRM</div>
  <div class="vl-ui-task"><span>5</span> Контур 152-ФЗ</div>
</nav>

<div class="af-hero-copy">
  <h1 id="alice-flash-hero-title" class="giant-seo">
    Alice AI LLM Flash от Яндекса:
    <span>как внедрить нейросеть для бизнеса</span>
  </h1>
  <p class="giant-seo-sub">Яндекс обещает задачи с текстами и документами в 5 раз дешевле: покажем, как повторить сценарии поддержки, модерации и RAG на Yandex AI Studio под ваш процесс</p>
  <a class="telegram-button" href="#cta-nero-yandex-flash">Заявка на внедрение Flash</a>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("alice-flash-dispatch-hero-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;
  const CYCLE = 280;

  function resizeCanvas() {
    if (!canvas.parentElement) return;
    canvas.width = canvas.parentElement.clientWidth || window.innerWidth;
    canvas.height = canvas.parentElement.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw / 2;
    cy = ch / 2 + 20;
    scale = cw < 768 ? cw / 620 : Math.min(cw / 1050, ch / 820) * 1.45;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    flashCore: "#fc3f1d",
    flashGlow: "#fbbf24",
    riverTicket: "#fef3c7",
    riverDoc: "#dbeafe",
    ragGreen: "#a7f3d0",
    shield: "#3b82f6",
    bubbleBg: "#ffffff",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    crmNode: "#e2e8f0"
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

  function riverPoint(t, lane, offset) {
    const x = -300 + ((t * 380 + offset) % 380);
    const arc = Math.sin(t * Math.PI * 1.6 + lane * 0.7) * 22;
    const y = 55 + lane * 38 + arc;
    return { x, y };
  }

  class TicketDocumentRiver {
    draw(ctx) {
      ctx.lineWidth = 2;
      ctx.strokeStyle = "rgba(51, 65, 85, 0.35)";
      ctx.setLineDash([6, 8]);
      for (let lane = 0; lane < 2; lane++) {
        ctx.beginPath();
        for (let i = 0; i <= 20; i++) {
          const t = i / 20;
          const p = riverPoint(t, lane, frame * 0.25);
          if (i === 0) ctx.moveTo(p.x, p.y);
          else ctx.lineTo(p.x, p.y);
        }
        ctx.stroke();
      }
      ctx.setLineDash([]);
      for (let lane = 0; lane < 2; lane++) {
        for (let k = 0; k < 3; k++) {
          const t = ((frame * 0.004 + k * 0.28 + lane * 0.11) % 1);
          const p = riverPoint(t, lane, 0);
          const isDoc = lane === 1;
          drawPolyRound(
            ctx,
            p.x - 10,
            p.y - 12,
            isDoc ? 18 : 16,
            isDoc ? 22 : 14,
            3,
            isDoc ? C.riverDoc : C.riverTicket,
            C.outline
          );
          if (isDoc) {
            ctx.fillStyle = C.outline;
            ctx.fillRect(p.x - 6, p.y - 6, 10, 2);
            ctx.fillRect(p.x - 6, p.y - 1, 8, 2);
          } else {
            ctx.fillStyle = C.flashCore;
            ctx.beginPath();
            ctx.arc(p.x, p.y - 4, 3, 0, Math.PI * 2);
            ctx.fill();
          }
        }
      }
    }
  }

  class AliceFlashCore {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.syncPulse = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.045) % CYCLE;
      const flashActive = prg > 70 && prg < 200;
      const syncFinale = prg > 220;

      if (syncFinale && prg < 222) this.syncPulse = 0;
      if (syncFinale) this.syncPulse += 0.08;

      const pulse = flashActive ? 1 + Math.sin(frame * 0.35) * 0.06 : 1;
      const r = 52 * pulse;

      ctx.save();
      ctx.translate(this.x, this.y);
      if (flashActive) {
        ctx.globalAlpha = 0.25 + Math.sin(frame * 0.4) * 0.15;
        ctx.fillStyle = C.flashGlow;
        ctx.beginPath();
        ctx.arc(0, 0, r + 28, 0, Math.PI * 2);
        ctx.fill();
        ctx.globalAlpha = 1;
      }

      drawPolyRound(ctx, -r, -r * 0.85, r * 2, r * 1.7, 14, "#fff", C.outline);
      const grad = ctx.createRadialGradient(0, 0, 8, 0, 0, r);
      grad.addColorStop(0, C.flashGlow);
      grad.addColorStop(1, C.flashCore);
      ctx.fillStyle = grad;
      ctx.beginPath();
      ctx.arc(0, 0, r * 0.72, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();

      ctx.fillStyle = C.outline;
      ctx.font = "bold 11px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("FLASH", 0, -4);
      ctx.font = "9px Inter, sans-serif";
      ctx.fillText("Alice AI", 0, 10);

      if (prg > 95 && prg < 185) {
        const labels = ["L1", "RAG", "CRM"];
        labels.forEach((lb, i) => {
          const a = -0.8 + i * 0.8;
          const lx = Math.cos(a) * (r + 22);
          const ly = Math.sin(a) * (r + 14);
          drawPolyRound(ctx, lx - 14, ly - 8, 28, 16, 4, C.ragGreen, C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "bold 8px sans-serif";
          ctx.fillText(lb, lx, ly + 3);
        });
      }

      if (syncFinale) {
        const wave = this.syncPulse * 40;
        ctx.strokeStyle = C.flashCore;
        ctx.lineWidth = 3;
        ctx.globalAlpha = Math.max(0, 1 - this.syncPulse / 3.5);
        ctx.beginPath();
        ctx.arc(0, 0, r + 20 + wave, 0, Math.PI * 2);
        ctx.stroke();
        ctx.globalAlpha = 1;
        if (prg > 248 && prg < 248.2) {
          createBubble(0, -r - 40, "FLASH SYNC → CRM", 220);
        }
      }
      ctx.restore();
    }
  }

  class SovereignContourRing {
    draw(ctx) {
      const prg = (frame * 0.045) % CYCLE;
      const alpha = 0.35 + (prg > 200 ? 0.35 : 0);
      ctx.save();
      ctx.translate(40, -55);
      ctx.strokeStyle = C.shield;
      ctx.globalAlpha = alpha;
      ctx.lineWidth = 2;
      ctx.setLineDash([10, 6]);
      ctx.beginPath();
      ctx.arc(0, 0, 95 + Math.sin(frame * 0.05) * 3, 0, Math.PI * 2);
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.globalAlpha = 1;
      ctx.fillStyle = C.shield;
      ctx.font = "bold 9px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("152-ФЗ · РФ", 0, -108);
      ctx.restore();
    }
  }

  class RagKnowledgeShelf {
    draw(ctx) {
      const bob = Math.sin(frame * 0.04) * 3;
      drawPolyRound(ctx, -200, -130 + bob, 70, 50, 6, "#fff", C.outline);
      for (let i = 0; i < 4; i++) {
        drawPolyRound(ctx, -192, -118 + bob + i * 10, 54, 6, 1, C.ragGreen, null);
      }
      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("RAG", -188, -138 + bob);
    }
  }

  class CrmGatewayNodes {
    draw(ctx) {
      const nodes = [
        { x: 200, y: 30, label: "CRM" },
        { x: 230, y: 85, label: "API" },
        { x: 175, y: 100, label: "MCP" }
      ];
      const prg = (frame * 0.045) % CYCLE;
      const lit = prg > 210;
      nodes.forEach((n, i) => {
        const glow = lit && (frame + i * 15) % 40 < 20;
        drawPolyRound(ctx, n.x - 22, n.y - 14, 44, 28, 6, glow ? C.ragGreen : C.crmNode, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(n.label, n.x, n.y + 4);
        if (lit) {
          ctx.strokeStyle = C.flashCore;
          ctx.lineWidth = 1.5;
          ctx.beginPath();
          ctx.moveTo(55, -20);
          ctx.lineTo(n.x - 22, n.y);
          ctx.stroke();
        }
      });
    }
  }

  class FlashSparkField {
    draw(ctx) {
      const prg = (frame * 0.045) % CYCLE;
      if (prg < 75 || prg > 205) return;
      for (let i = 0; i < 6; i++) {
        const ang = (frame * 0.08 + i) * 1.3;
        const dist = 70 + (i % 3) * 18;
        const sx = 40 + Math.cos(ang) * dist;
        const sy = -55 + Math.sin(ang) * dist * 0.6;
        ctx.fillStyle = frame % 6 < 3 ? C.flashGlow : C.flashCore;
        ctx.beginPath();
        ctx.moveTo(sx, sy);
        ctx.lineTo(sx + 6, sy + 10);
        ctx.lineTo(sx - 4, sy + 8);
        ctx.fill();
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
      const prg = (frame * 0.045) % CYCLE;
      const targetX = 25 + (this.stepTrig % 3) * 8;
      const targetY = -75 - (this.stepTrig % 4) * 6;

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
        carryType = prg >= this.stepTrig - 12 ? this.color : null;
      }

      if (!isMoving) {
        for (let lane = 0; lane < 2; lane++) {
          for (let k = 0; k < 3; k++) {
            const t = ((frame * 0.004 + k * 0.28) % 1);
            const p = riverPoint(t, lane, 0);
            if (Math.hypot(p.x - this.x, p.y - this.y) < 22) {
              this.hitAnimation = Math.sin(frame * 0.3) * 6;
            }
          }
        }
        if (frame % 220 === 0 && Math.random() < 0.12) {
          createBubble(this.x, this.y - 24, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 240);
        }
      } else {
        this.hitAnimation = 0;
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
        ctx.moveTo(hx - 10, hy - 8);
        ctx.lineTo(hx - 14, hy - 18);
        ctx.lineTo(hx + 10, hy - 8);
        ctx.fill();
        if (this.hitAnimation) {
          drawPolyRound(ctx, 16, -12 + this.hitAnimation, 10, 8, 2, "#94a3b8", C.outline);
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
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 14, 14, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  entities.push(new TicketDocumentRiver());
  entities.push(new RagKnowledgeShelf());
  entities.push(new SovereignContourRing());
  entities.push(new AliceFlashCore(40, -55));
  entities.push(new FlashSparkField());
  entities.push(new CrmGatewayNodes());
  entities.push(
    new Agent(-280, 70, C.agentYellow, "1_architect", 18, [
      "Поток тикетов растёт",
      "Сценарий: L1 поддержка",
      "Узкий пилот — 2 недели"
    ])
  );
  entities.push(
    new Agent(-160, 130, C.agentGreen, "2_seo", 58, [
      "Классификация 56% кейсов",
      "Тема: возврат / доставка",
      "Метки для CRM"
    ])
  );
  entities.push(
    new Agent(-60, 25, C.agentBlue, "3_coder", 98, [
      "API Studio подключён",
      "MCP → amoCRM",
      "Токены: сверить в Cloud"
    ])
  );
  entities.push(
    new Agent(40, 120, C.agentPink, "4_designer", 138, [
      "Ответ с цитатой RAG",
      "Черновик для оператора",
      "UI карточки тикета"
    ])
  );
  entities.push(
    new Agent(120, 35, C.agentPurple, "5_deployer", 178, [
      "Маршрут в Битрикс24",
      "Контур РФ — без западного API",
      "Flash SYNC готов"
    ])
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
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

    const prg = (frame * 0.045) % CYCLE;
    if (prg >= 20 && prg < 20.08) createBubble(-280, 40, "Поток: тикеты + PDF", 260);
    if (prg >= 78 && prg < 78.08) createBubble(40, -100, "Flash: классификация", 260);
    if (prg >= 125 && prg < 125.08) createBubble(-200, -150, "RAG: ответ с цитатой", 260);
    if (prg >= 168 && prg < 168.08) createBubble(200, 10, "Маршрут → CRM", 260);
    if (prg >= 205 && prg < 205.08) createBubble(40, -130, "Контур РФ активен", 260);

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

<section class="yandex-intro-section" aria-label="Введение">
  <div class="ym-container yandex-intro-grid reveal">
    <div class="yandex-intro-text">
      <p class="yandex-intro-lead">Новости и внедрение</p>
      <p><strong>Коротко:</strong> 28 мая 2026 Яндекс представил <strong>Alice AI LLM Flash</strong> — быструю LLM для массовых текстовых и документных задач в <strong>Yandex AI Studio</strong>. По данным компании, около <strong>60%</strong> b2b-запросов к её моделям — именно работа с текстами и документами; Flash позиционируется как ответ на этот спрос с экономикой <strong>«почти в 5 раз дешевле»</strong> по сравнению с предыдущими решениями Яндекса для бизнеса. Ниже — как перевести релиз в рабочие сценарии: поддержка, RAG, CRM и голос — без выдуманных тарифов и с опорой на официальные источники.</p>
      <div class="yandex-intro-kpis" role="list">
        <span class="yandex-intro-kpi" role="listitem">28.05.2026 · AI2Business</span>
        <span class="yandex-intro-kpi" role="listitem">~60% b2b — тексты</span>
        <span class="yandex-intro-kpi" role="listitem">~5× экономика Flash</span>
        <span class="yandex-intro-kpi" role="listitem">152-ФЗ · контур РФ</span>
      </div>
    </div>
    <div class="ym-mac-window reveal delay-200" aria-hidden="true">
      <div class="ym-mac-header">
        <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
        <span class="ym-mac-title">yandex-ai-studio — flash-pipeline</span>
      </div>
      <div class="ym-mac-body">
        <div><span class="ym-command">$</span> classify --model alice-flash</div>
        <div><span class="ym-comment"># тикет → метка → RAG → CRM</span></div>
        <div><span class="ym-command">$</span> rag.search --cite reglament_v3.pdf</div>
        <div><span class="ym-command">$</span> crm.push --target bitrix24</div>
        <div><span class="ym-comment"># пилот: 2–4 нед · один сценарий</span></div>
      </div>
    </div>
  </div>
</section>

<section class="yandex-toc-wrap" aria-label="Оглавление">
  <div class="ym-container">
    <nav class="ym-toc reveal" aria-label="Содержание статьи">
    <a href="#h2-chto-izmenilos-28-maya-2026">Релиз 28.05.2026</a>
    <a href="#h2-yandex-ai-studio">Yandex AI Studio</a>
    <a href="#h2-alice-flash-vs-gpt">Flash vs GPT-5.4 mini</a>
    <a href="#h2-scenarii-podderzhki">Поддержка и контакт-центр</a>
    <a href="#h2-dokumenty-teksty">Документы и тексты</a>
    <a href="#h2-rag-baza-znanij">RAG и база знаний</a>
    <a href="#h2-integracii-crm">CRM и интеграции</a>
    <a href="#h2-golosovye-agenty">Голосовые агенты</a>
    <a href="#h2-deepseek-v4-flash">DeepSeek 1M</a>
    <a href="#h2-poshagovoe-vnedrenie">Пилот → прод</a>
    <a href="#h2-usluga-nero-network">Услуга Nero Network</a>
    <a href="#h2-faq">FAQ</a>
    </nav>
  </div>
</section>

<section class="ym-section reveal" aria-labelledby="h2-chto-izmenilos-28-maya-2026">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-chto-izmenilos-28-maya-2026">Что изменилось 28 мая 2026 — Alice AI LLM Flash и AI2Business</h2>
    <div class="ym-prose"><p><strong>Определение:</strong> <strong>Alice AI LLM Flash</strong> — линейка быстрой большой языковой модели Яндекса, анонсированная на конференции <strong>AI2Business</strong> 28.05.2026; модель доступна в <strong>Yandex AI Studio</strong> для корпоративных сценариев с высоким объёмом однотипных текстовых операций. Источник: <a href="https://yandex.ru/company/news/28-05-2026-03">релиз Яндекса</a>.</p>
<h3>Зачем Яндексу отдельная «flash»-модель для B2B</h3>
<p>Российский B2B уже массово использует LLM, но не все задачи требуют «тяжёлого» флагмана. Flash закрывает слой <strong>скорости и стоимости</strong> там, где важны потоки: модерация, маршрутизация обращений, типовые диалоги, пакетная обработка документов. Артур Самигуллин, руководитель Yandex AI Studio, в релизе говорит о выходе Яндекса на рынок моделей, <strong>«созданных специально под запросы бизнеса»</strong> — Flash в этом ряду инструмент «массового контура», а не замена премиальной <strong>Alice AI LLM</strong> для сложного RAG.</p>
<p>Для владельца продукта это означает: не «одна нейросеть на всё», а <strong>матрица моделей</strong> в Model Gallery — Flash для L1/L2, флагман или <strong>DeepSeek V4 Flash</strong> (контекст <strong>1 млн токенов</strong>) для агентных и длинных документов.</p>
<h3>60% b2b-запросов — тексты и документы</h3>
<p>Яндекс публикует ориентир: <strong>примерно 60%</strong> запросов к моделям со стороны бизнеса — работа с <strong>текстами и документами</strong>. Это объясняет фокус Flash на модерацию, классификацию в техподдержке, клиентские диалоги и обработку больших потоков однотипных данных; в пресс-материалах называются банки, ритейл и телеком (<a href="https://www.vedomosti.ru/technologies/industries_and_markets/news/2026/05/28/1200947-biznesa-alice">Ведомости</a>).</p>
<p><strong>Итог блока:</strong> если ваша нейросеть для бизнеса в основном «читает и пишет» — Flash попадает в ядро спроса; если нужен миллион токенов в одном проходе — смотрите DeepSeek V4 Flash в том же релизе.</p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" aria-labelledby="h2-yandex-ai-studio">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-yandex-ai-studio">Yandex AI Studio: где доступна модель и что входит в платформу</h2>
    <div class="ym-prose"><p><strong>Коротко:</strong> Flash уже в <strong>Yandex AI Studio</strong> — единой среде для API, агентов, RAG и интеграций в <strong>Yandex Cloud</strong>. Продуктовая витрина: <a href="https://aistudio.yandex.ru/">aistudio.yandex.ru</a>.</p>
<h3>Model Gallery, API и роли в Yandex Cloud</h3>
<p>Модели выбираются в <strong>Model Gallery</strong>; вызов — через <strong>OpenAI-совместимый chat API</strong>, официальный <strong>Python SDK</strong> <code>yandex-ai-studio-sdk</code> и облачные роли IAM. Для разработчиков это снижает порог: можно подключить LangChain-обёртки и существующие пайплайны без смены стека (<a href="https://github.com/yandex-cloud/yandex-ai-studio-sdk">GitHub SDK</a>).</p>
<p>Важно для внедрения: доступ к RAG через MCP требует корректных ролей у сервисного аккаунта (например, <strong><code>serverless.mcpGateways.invoker</code></strong> — иначе 403), что типично всплывает на этапе пилота, а не в демо-чате (<a href="https://habr.com/ru/companies/reksoft/articles/1016026/">кейс REKSOFT на Habr</a>).</p>
<h3>Agent Atelier и Workflows без «тяжёлой» разработки</h3>
<p><strong>Agent Atelier</strong> и <strong>Workflows</strong> позволяют собирать агентов и цепочки без полноценной разработки с нуля — в духе no-code, который в обзорах платформ (Just AI, март 2026) отмечают как развитие AI Studio с осени 2025. Для SMB это путь к прототипу за дни, а не месяцы — при условии, что заранее выбран <strong>один узкий сценарий</strong> (например, классификация тикетов, а не «весь контакт-центр сразу»).</p>
<h3>MCP Hub и подключение внешних систем</h3>
<p><strong>MCP Hub</strong> даёт создавать MCP-серверы с инструментами на HTTPS, Cloud Functions и Workflows; агент подключает их как <code>type: mcp</code> (SSE endpoint, политика <code>require_approval</code>: always/never) — <a href="https://aistudio.yandex.ru/docs/ru/ai-studio/concepts/agents/tools/mcp-tool">документация MCP-tool</a>. Для Nero Network это стандартный слой связки <strong>CRM, телефонии, внутренних API</strong> с агентом без «зоопарка» кастомных коннекторов на каждый сервис.</p>
</div>
  </div>
</section><section class="boris-rag-section reveal" id="yandex-alice-flash-boris-rag-block" aria-labelledby="boris-rag-kicker-title">
  <style>
    #yandex-alice-flash-boris-rag-block {
      --boris-bg: #ffffff;
      --boris-panel: #f8fafc;
      --boris-border: #e2e8f0;
      --boris-text: #334155;
      --boris-heading: #0f172a;
      --boris-yandex: #fc3f1d;
      --boris-flash: #ff6b35;
      --boris-rag: #0ea5e9;
      --boris-crm: #10b981;
      --boris-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
      margin: 48px 0 56px;
      font-family: Inter, system-ui, sans-serif;
    }
    #yandex-alice-flash-boris-rag-block .boris-rag-map {
      max-width: 1180px;
      margin: 0 auto;
      padding: 32px 36px 28px;
      background: var(--boris-bg);
      border: 1px solid var(--boris-border);
      border-radius: 22px;
      box-shadow: var(--boris-shadow);
    }
    #yandex-alice-flash-boris-rag-block .boris-rag-split {
      display: grid;
      grid-template-columns: minmax(0, 1.05fr) minmax(280px, 0.95fr);
      gap: 28px 36px;
      align-items: center;
    }
    #yandex-alice-flash-boris-rag-block .boris-eyebrow {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--boris-yandex);
      margin: 0 0 10px;
    }
    #yandex-alice-flash-boris-rag-block .boris-kicker {
      font-size: clamp(1.25rem, 2.2vw, 1.55rem);
      font-weight: 800;
      line-height: 1.25;
      color: var(--boris-heading);
      margin: 0 0 12px;
    }
    #yandex-alice-flash-boris-rag-block .boris-lead {
      font-size: 15px;
      line-height: 1.55;
      color: var(--boris-text);
      margin: 0 0 18px;
    }
    #yandex-alice-flash-boris-rag-block .boris-steps {
      list-style: none;
      padding: 0;
      margin: 0 0 20px;
    }
    #yandex-alice-flash-boris-rag-block .boris-steps li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 14px;
      line-height: 1.45;
      color: var(--boris-text);
      margin-bottom: 10px;
    }
    #yandex-alice-flash-boris-rag-block .boris-step-dot {
      flex-shrink: 0;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      margin-top: 6px;
      background: var(--boris-rag);
    }
    #yandex-alice-flash-boris-rag-block .boris-steps li:nth-child(1) .boris-step-dot { background: var(--boris-flash); }
    #yandex-alice-flash-boris-rag-block .boris-steps li:nth-child(2) .boris-step-dot { background: var(--boris-rag); }
    #yandex-alice-flash-boris-rag-block .boris-steps li:nth-child(3) .boris-step-dot { background: var(--boris-crm); }
    #yandex-alice-flash-boris-rag-block .boris-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }
    #yandex-alice-flash-boris-rag-block .boris-pill {
      font-size: 12px;
      font-weight: 600;
      padding: 6px 12px;
      border-radius: 999px;
      background: var(--boris-panel);
      border: 1px solid var(--boris-border);
      color: var(--boris-heading);
    }
    #yandex-alice-flash-boris-rag-block .boris-pill--flash {
      border-color: rgba(255, 107, 53, 0.35);
      background: #fff7ed;
    }
    #yandex-alice-flash-boris-rag-block .boris-pill--rag {
      border-color: rgba(14, 165, 233, 0.35);
      background: #f0f9ff;
    }
    #yandex-alice-flash-boris-rag-block .boris-pill--crm {
      border-color: rgba(16, 185, 129, 0.35);
      background: #ecfdf5;
    }
    #yandex-alice-flash-boris-rag-block .boris-canvas-wrap {
      position: relative;
      background: linear-gradient(145deg, #f8fafc 0%, #eef2ff 55%, #f0fdf4 100%);
      border-radius: 18px;
      border: 1px solid var(--boris-border);
      min-height: 380px;
      overflow: hidden;
    }
    #yandex-alice-flash-boris-rag-block #yandex-flash-boris-rag-canvas {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 380px;
    }
    #yandex-alice-flash-boris-rag-block .boris-bridge {
      margin: 20px 0 0;
      padding-top: 16px;
      border-top: 1px dashed var(--boris-border);
      font-size: 13px;
      color: #64748b;
      grid-column: 1 / -1;
    }
    @media (max-width: 1023px) {
      #yandex-alice-flash-boris-rag-block .boris-rag-split {
        grid-template-columns: 1fr;
      }
      #yandex-alice-flash-boris-rag-block .boris-canvas-wrap {
        min-height: 340px;
      }
      #yandex-alice-flash-boris-rag-block #yandex-flash-boris-rag-canvas {
        min-height: 340px;
      }
    }
    @media (max-width: 767px) {
      #yandex-alice-flash-boris-rag-block .boris-rag-map {
        padding: 22px 18px 20px;
      }
    }
  </style>

  <div class="ym-container boris-rag-map">
    <div class="boris-rag-split">
      <div class="boris-rag-copy">
        <p class="boris-eyebrow">Схема внедрения</p>
        <h3 class="boris-kicker" id="boris-rag-kicker-title">От обращения до карточки CRM — один контур на Flash</h3>
        <p class="boris-lead">После hero с потоком тикетов логичный следующий шаг: не «ещё одна нейросеть», а <strong>связанный пайплайн</strong> в Yandex AI Studio — классификация, ответ с цитатой из базы знаний и запись в amoCRM или Битрикс24.</p>
        <ul class="boris-steps" aria-label="Этапы пайплайна">
          <li><span class="boris-step-dot" aria-hidden="true"></span><span><strong>Flash</strong> — метка темы, приоритет, маршрут в очередь (без «обещаний» клиенту).</span></li>
          <li><span class="boris-step-dot" aria-hidden="true"></span><span><strong>RAG</strong> — vector store + AI Search: ответ с опорой на регламент, не на веса модели.</span></li>
          <li><span class="boris-step-dot" aria-hidden="true"></span><span><strong>CRM</strong> — webhook / MCP: поля сделки, суммаризация, эскалация на оператора.</span></li>
        </ul>
        <div class="boris-pills" role="list">
          <span class="boris-pill boris-pill--flash" role="listitem">Alice AI LLM Flash</span>
          <span class="boris-pill boris-pill--rag" role="listitem">RAG + MCP Hub</span>
          <span class="boris-pill boris-pill--crm" role="listitem">amoCRM · Битрикс24</span>
        </div>
      </div>
      <div class="boris-canvas-wrap" aria-hidden="false" aria-label="Анимация: обращение проходит классификацию Flash, RAG и запись в CRM">
        <canvas id="yandex-flash-boris-rag-canvas" width="640" height="380"></canvas>
      </div>
      <p class="boris-bridge">Дальше в статье — сравнение Flash с GPT-5.4 mini и сценарии первой линии поддержки.</p>
    </div>
  </div>

  <script id="yandex-flash-boris-rag-engine">
  (function () {
    var canvas = document.getElementById("yandex-flash-boris-rag-canvas");
    if (!canvas) return;
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 0, H = 0, frame = 0;
    var tickets = [];
    var particles = [];
    var phase = 0;

    var PAL = {
      ink: "#0f172a",
      muted: "#64748b",
      flash: "#ff6b35",
      flashBg: "#fff7ed",
      rag: "#0ea5e9",
      ragBg: "#e0f2fe",
      crm: "#10b981",
      crmBg: "#d1fae5",
      line: "#cbd5e1",
      doc: "#f1f5f9",
      white: "#ffffff"
    };

    function resize() {
      var wrap = canvas.parentElement;
      if (!wrap) return;
      W = wrap.clientWidth;
      H = Math.max(340, wrap.clientHeight || 380);
      canvas.width = Math.floor(W * dpr);
      canvas.height = Math.floor(H * dpr);
      canvas.style.width = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      initTickets();
    }

    function initTickets() {
      tickets = [];
      for (var i = 0; i < 5; i++) {
        tickets.push({
          t: i * 0.18,
          label: ["Возврат", "Доставка", "Тариф", "Оплата", "Аккаунт"][i % 5],
          hue: i % 3
        });
      }
    }

    function roundRect(x, y, w, h, r, fill, stroke) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
      else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
      if (fill) { ctx.fillStyle = fill; ctx.fill(); }
      if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
    }

    function drawNode(x, y, w, h, title, sub, color, bg) {
      roundRect(x, y, w, h, 14, bg, PAL.ink);
      ctx.fillStyle = color;
      ctx.font = "bold 13px Inter, system-ui, sans-serif";
      ctx.fillText(title, x + 14, y + 26);
      ctx.fillStyle = PAL.muted;
      ctx.font = "11px Inter, system-ui, sans-serif";
      ctx.fillText(sub, x + 14, y + 44);
    }

    function drawArrow(x1, y1, x2, y2, color, dash) {
      ctx.save();
      ctx.strokeStyle = color;
      ctx.lineWidth = 2;
      if (dash) ctx.setLineDash([6, 6]);
      ctx.beginPath();
      ctx.moveTo(x1, y1);
      ctx.lineTo(x2, y2);
      ctx.stroke();
      ctx.setLineDash([]);
      var ang = Math.atan2(y2 - y1, x2 - x1);
      var ax = x2 - Math.cos(ang) * 10;
      var ay = y2 - Math.sin(ang) * 10;
      ctx.beginPath();
      ctx.moveTo(x2, y2);
      ctx.lineTo(ax - Math.cos(ang - 0.45) * 8, ay - Math.sin(ang - 0.45) * 8);
      ctx.lineTo(ax - Math.cos(ang + 0.45) * 8, ay - Math.sin(ang + 0.45) * 8);
      ctx.closePath();
      ctx.fillStyle = color;
      ctx.fill();
      ctx.restore();
    }

    function drawDocs(cx, cy, pulse) {
      var sizes = [[-28, -8, 36, 44], [-8, -18, 40, 48], [12, -4, 34, 42]];
      for (var d = 0; d < sizes.length; d++) {
        var s = sizes[d];
        var ox = cx + s[0] + Math.sin(frame * 0.04 + d) * 2;
        var oy = cy + s[1];
        roundRect(ox, oy, s[2], s[3], 4, PAL.doc, PAL.line);
        ctx.fillStyle = PAL.rag;
        ctx.globalAlpha = 0.35 + pulse * 0.4;
        roundRect(ox + 6, oy + 10, s[2] - 12, 4, 2, PAL.rag, null);
        ctx.globalAlpha = 1;
      }
    }

    function drawCrmCard(x, y, w, h, progress) {
      roundRect(x, y, w, h, 12, PAL.white, PAL.crm);
      ctx.fillStyle = PAL.crm;
      ctx.font = "bold 12px Inter, system-ui, sans-serif";
      ctx.fillText("Сделка #1842", x + 12, y + 22);
      ctx.fillStyle = PAL.muted;
      ctx.font = "10px Inter, system-ui, sans-serif";
      ctx.fillText("Тема: " + (progress > 0.5 ? "Возврат · L1" : "…"), x + 12, y + 38);
      var barW = (w - 24) * Math.min(1, progress);
      roundRect(x + 12, y + h - 22, w - 24, 8, 4, "#e2e8f0", null);
      roundRect(x + 12, y + h - 22, barW, 8, 4, PAL.crm, null);
    }

    function spawnParticle(x, y, color) {
      particles.push({ x: x, y: y, vx: (Math.random() - 0.5) * 1.2, vy: -0.8 - Math.random(), life: 40, color: color });
      if (particles.length > 24) particles.shift();
    }

    function tickParticles() {
      for (var i = particles.length - 1; i >= 0; i--) {
        var p = particles[i];
        p.x += p.vx;
        p.y += p.vy;
        p.life--;
        ctx.globalAlpha = p.life / 40;
        ctx.fillStyle = p.color;
        ctx.beginPath();
        ctx.arc(p.x, p.y, 3, 0, Math.PI * 2);
        ctx.fill();
        ctx.globalAlpha = 1;
        if (p.life <= 0) particles.splice(i, 1);
      }
    }

    function draw() {
      ctx.clearRect(0, 0, W, H);
      var pad = Math.max(16, W * 0.04);
      var nodeW = Math.min(118, (W - pad * 2) / 4.2);
      var nodeH = 58;
      var yMid = H * 0.52;
      var xFlash = pad + nodeW * 0.1;
      var xRag = W * 0.5 - nodeW / 2;
      var xCrm = W - pad - nodeW - nodeW * 0.1;
      var cycle = (frame % 420) / 420;
      phase = cycle;

      drawNode(xFlash, yMid - nodeH / 2, nodeW, nodeH, "Flash", "классификация", PAL.flash, PAL.flashBg);
      drawNode(xRag, yMid - nodeH / 2 - 8, nodeW + 8, nodeH + 16, "RAG", "AI Search · цитата", PAL.rag, PAL.ragBg);
      drawDocs(xRag + nodeW * 0.35, yMid - 52, 0.5 + 0.5 * Math.sin(frame * 0.08));
      drawNode(xCrm, yMid - nodeH / 2, nodeW, nodeH, "CRM", "amo · Б24", PAL.crm, PAL.crmBg);

      var ax1 = xFlash + nodeW;
      var ax2 = xRag;
      var ax3 = xRag + nodeW + 8;
      var ax4 = xCrm;
      drawArrow(ax1, yMid, ax2, yMid, PAL.flash, false);
      drawArrow(ax3, yMid, ax4, yMid, PAL.rag, false);

      if (W > 520) {
        drawArrow(pad, yMid - 70, xFlash, yMid - 20, PAL.muted, true);
        ctx.fillStyle = PAL.muted;
        ctx.font="10px Inter, system-ui, sans-serif";
        ctx.fillText("входящие", pad, yMid - 78);
      }

      for (var i = 0; i < tickets.length; i++) {
        var tk = tickets[i];
        var prog = ((cycle + tk.t) % 1);
        var px, py = yMid - 28;
        if (prog < 0.28) {
          px = pad + prog / 0.28 * (xFlash - pad);
        } else if (prog < 0.55) {
          var p2 = (prog - 0.28) / 0.27;
          px = xFlash + nodeW * 0.3 + p2 * (xRag - xFlash - nodeW * 0.2);
          if (p2 > 0.92 && frame % 18 === 0) spawnParticle(px, py + 12, PAL.rag);
        } else {
          var p3 = (prog - 0.55) / 0.45;
          px = xRag + nodeW + p3 * (xCrm - xRag - nodeW);
          if (p3 > 0.88 && frame % 20 === 0) spawnParticle(px, py + 12, PAL.crm);
        }
        var tw = 52, th = 22;
        roundRect(px - tw / 2, py, tw, th, 6, PAL.white, PAL.ink);
        ctx.fillStyle = PAL.ink;
        ctx.font = "9px Inter, system-ui, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(tk.label, px, py + 14);
        ctx.textAlign = "left";
      }

      drawCrmCard(xCrm, yMid + nodeH / 2 + 18, nodeW + 4, 56, Math.max(0, (cycle - 0.6) / 0.4));

      ctx.fillStyle = PAL.muted;
      ctx.font = "10px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("152-ФЗ · контур Yandex Cloud", W / 2, H - 14);
      ctx.textAlign = "left";

      tickParticles();
      frame++;
      requestAnimationFrame(draw);
    }

    window.addEventListener("resize", resize);
    resize();
    requestAnimationFrame(draw);
  })();
  </script>
</section>
<section class="ym-section reveal" aria-labelledby="h2-alice-flash-vs-gpt">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-alice-flash-vs-gpt">Alice AI LLM Flash vs GPT-5.4 mini: цена, качество, 152-ФЗ</h2>
    <div class="ym-prose"><p><strong>Определение:</strong> сравнение в материалах Яндекса — <strong>слепое попарное</strong> тестирование на бизнес-задачах против <strong>GPT-5.4 mini</strong>, плюс заявление о <strong>сопоставимой стоимости</strong> Flash при акценте на безопасность данных и стабильную работу в РФ.</p>
<h3>Слепое сравнение 56% / 73% / 66% / 61% — как читать цифры</h3>
<p>По <a href="https://yandex.ru/company/news/28-05-2026-03">официальному релизу</a>:</p>
<table>
<thead>
<tr>
<th>Метрика</th>
<th style="text-align: right;">Результат Flash</th>
</tr>
</thead>
<tbody>
<tr>
<td>Все бизнес-задачи (в среднем)</td>
<td style="text-align: right;"><strong>56%</strong> побед</td>
</tr>
<tr>
<td>Диалоги</td>
<td style="text-align: right;"><strong>73%</strong></td>
</tr>
<tr>
<td>Обобщение и структурирование</td>
<td style="text-align: right;"><strong>66%</strong></td>
</tr>
<tr>
<td>Поиск по файлам и базе знаний</td>
<td style="text-align: right;"><strong>61%</strong></td>
</tr>
</tbody>
</table>
<p>Это <strong>внутренний бенчмарк Яндекса</strong>, не независимый аудит; отдельного white paper по Flash на дату исследования <strong>не опубликовано</strong> — только проценты в релизе и перепечатках СМИ. Для закупки разумно: зафиксировать <strong>свой</strong> A/B на выборке реальных тикетов и документов, а не переносить 56% на ваш домен без проверки.</p>
<p>Для флагманской <strong>Alice AI LLM</strong> (не Flash) на <a href="https://ya.ru/ai/aliceai">ya.ru/ai/aliceai</a> описана методология <strong>side-by-side</strong> на тысячах задач; для бизнес-потока там же приводятся победы над DeepSeek V3.1 и YandexGPT 5.1 Pro — это <strong>другая модель</strong>, но полезный ориентир по качеству «старшей» линейки.</p>
<h3>«В 5 раз дешевле» — что именно сравнивает Яндекс</h3>
<p>Формулировка релиза: задачи с текстами и документами стали <strong>«почти в 5 раз дешевле, чем ранее»</strong> — имеются в виду <strong>предыдущие решения Яндекса для бизнеса</strong>, а не прямое сравнение с зарубежным API «в лоб» (<a href="https://www.cnews.ru/news/line/2026-05-28_yandeks_zapustil_bystruyu">CNews</a> пересказывает ту же логику).</p>
<p><strong>Публичной таблицы ₽/токен именно для Alice AI LLM Flash</strong> в открытом пресс-релизе <strong>нет</strong>. Актуальные цены — в консоли Yandex Cloud / тарификации AI Studio. Для ориентира по <strong>флагманской Alice AI LLM</strong> (не Flash) в блоге Yandex Cloud от 25.11.2025: <strong>0,50 ₽ / 1000 входящих токенов</strong>, <strong>2,00 ₽ / 1000 исходящих</strong> (синхронный режим, с НДС); на кириллице заявлено ~4–5 символов на токен против ~2–3 у типичных опенсорс — экономия <strong>1,5–2×</strong> при той же номинальной тарификации (<a href="https://yandex.cloud/ru/blog/alice-ai-november-2025">блог ноября 2025</a>).</p>
<p>⚠️ <strong>Не использовать без проверки в консоли:</strong> агрегаторные цифры вроде «100 ₽ / 1M вход, 200 ₽ / 1M выход» для Flash из блогов третьих лиц — это <strong>не первоисточник Яндекса</strong>.</p>
<h3>Российский контур данных и отказ от западных API</h3>
<p>Для процессов с <strong>персональными данными</strong> и регуляторикой <strong>152-ФЗ</strong> российский контур Yandex Cloud снимает риски трансграничной передачи в западные LLM. Flash при этом заявлена <strong>сопоставимой по стоимости</strong> с GPT-5.4 mini — как аргумент TCO, а не как замена юридической экспертизы: политики хранения, логирования и доступа к промптам всё равно проектируются на внедрении.</p>
<p><strong>Итог:</strong> сравнивайте <strong>TCO пилота</strong> (токены + интеграция + операторы) и <strong>качество на ваших данных</strong>; маркетинговые «5×» и «56%» — старт разговора, не договор SLA.</p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" aria-labelledby="h2-scenarii-podderzhki">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-scenarii-podderzhki">Сценарии для поддержки и контакт-центра</h2>
    <div class="ym-prose"><p>Яндекс в релизе прямо называет сценарии Flash: <strong>модерация контента</strong>, <strong>классификация обращений</strong> в техподдержку, <strong>клиентские диалоги</strong>, обработка больших потоков однотипных данных.</p>
<h3>AI чат-бот первой линии и эскалация на оператора</h3>
<p>Типовая архитектура: Flash отвечает на FAQ и уточняющие вопросы по регламенту; при низкой уверенности или триггерах (жалоба, возврат, юридический риск) — <strong>эскалация</strong> в очередь оператора с <strong>суммаризацией</strong> диалога. Качество диалогов в бенчмарке Яндекса — <strong>73%</strong> побед над GPT-5.4 mini в слепом сравнении; на практике критичны промпт, RAG и запрет «выдумывать» условия договора.</p>
<h3>Классификация и маршрутизация тикетов</h3>
<p>Классификация — один из самых «дешёвых» по риску сценариев: модель не обещает клиенту скидку, а только ставит метку (отдел, приоритет, тема). Это хороший <strong>первый пилот</strong> на 2–4 недели: измеряются точность маршрутизации и экономия времени диспетчера.</p>
<h3>Модерация и типовые диалоги с клиентами</h3>
<p>Модерация UGC, отзывов и пользовательского контента масштабируется на Flash именно из-за объёма: здесь важны <strong>латентность и цена токена</strong>, а не «литературный» стиль. Для публичных ответов бренда чаще оставляют человека в контуре или гибрид: черновик от модели, публикация после проверки.</p>
</div>
  </div>
</section>
<section class="ym-section reveal" aria-labelledby="h2-dokumenty-teksty">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-dokumenty-teksty">Документы, тексты и внутренние процессы</h2>
    <div class="ym-prose"><h3>Обработка заявок, КП и регламентов</h3>
<p>Flash подходит для извлечения полей из заявок, черновиков КП по шаблону, проверки комплектности пакета документов. Ограничение: без <strong>RAG</strong> модель не знает ваших актуальных прайсов — только то, что в промпте или вложении в рамках контекста.</p>
<h3>Суммаризация переписки и заполнение полей CRM</h3>
<p>Сценарий «диалог → структура для CRM» попадает в категорию <strong>обобщение и структурирование</strong> (<strong>66%</strong> в бенчмарке). Интеграция: webhook из <strong>amoCRM</strong> / <strong>Битрикс24</strong> → Cloud Function / n8n → API AI Studio → обратная запись полей. Nero Network на внедрении фиксирует <strong>маппинг полей</strong> и права API-ключей до продакшена.</p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" aria-labelledby="h2-rag-baza-znanij">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-rag-baza-znanij">RAG и корпоративная база знаний на AI Search</h2>
    <div class="ym-prose"><p><strong>Определение:</strong> <strong>RAG</strong> (Retrieval-Augmented Generation) — ответ модели с опорой на <strong>проиндексированные</strong> корпоративные документы, а не только на веса модели.</p>
<h3>Загрузка документов, индекс и «ответы с цитатой»</h3>
<p>В AI Studio RAG строится через <strong>vector store</strong>, поиск и агентные инструменты; для сложных цепочек в релизе 28.05 параллельно анонсирован <strong>DeepSeek V4 Flash</strong> с контекстом <strong>1 млн токенов</strong>, в витрине — для тяжёлых RAG с последовательной обработкой. <strong>Alice AI LLM Flash</strong> в бенчмарке сильнее на <strong>поиске по файлам и БЗ (61%)</strong> — но для «премиум»-качества на сложных базах часто тестируют и <strong>флагманскую Alice AI LLM</strong> (у Just AI в бета-тесте — агенты и RAG, <a href="https://yandex.cloud/ru/blog/alice-ai-november-2025">блог нояб. 2025</a>).</p>
<h3>Когда RAG обязателен, а когда достаточно промпта</h3>
<table>
<thead>
<tr>
<th>Ситуация</th>
<th>Подход</th>
</tr>
</thead>
<tbody>
<tr>
<td>Стабильный FAQ < 20 страниц</td>
<td>Промпт + короткий контекст</td>
</tr>
<tr>
<td>Регламенты, инструкции, прайсы, сотни файлов</td>
<td>RAG + политика обновления индекса</td>
</tr>
<tr>
<td>Один договор на 500+ страниц</td>
<td>Рассмотреть <strong>DeepSeek V4 Flash</strong> (1M токенов)</td>
</tr>
</tbody>
</table>
<h3>Ошибки внедрения (галлюцинации, устаревшие регламенты)</h3>
<p>Частые провалы: индекс не обновляется после смены тарифов; в RAG попадают черновики; нет <strong>цитирования</strong> источника в ответе оператору. Чек-лист: владелец базы знаний, SLA переиндексации, тестовые вопросы с эталонными ответами, запрет отвечать при низком score retrieval.</p>
<p>Практика MCP + vector store и IAM — <a href="https://habr.com/ru/companies/reksoft/articles/1016026/">Habr REKSOFT</a>.</p>
</div>
  </div>
</section>
<section class="ym-section reveal" aria-labelledby="h2-integracii-crm">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-integracii-crm">Интеграции: CRM, телефония, Make/n8n</h2>
    <div class="ym-prose"><h3>Битрикс24 и amoCRM — типовые паттерны</h3>
<p>Паттерн 1: <strong>входящее обращение</strong> → классификация Flash → сделка/лид с метками. Паттерн 2: <strong>исходящее</strong> — суммаризация звонка/чата в карточку. Паттерн 3: <strong>внутренний ассистент</strong> сотрудника в портале CRM через iframe или бота.</p>
<h3>Middleware, webhooks и безопасность API-ключей</h3>
<p>Ключи API — только на сервере (Cloud Functions, свой backend), не во фронте и не в публичных сценариях Make без секрет-хранилища. Логи промптов с ПДн — политика ретенции и маскирование.</p>
<h3>Оркестрация сценариев в n8n/Make</h3>
<p><strong>Make</strong> и <strong>n8n</strong> удобны для пилота без тяжёлой разработки: триггер CRM → запрос к OpenAI-совместимому endpoint AI Studio → ветвление по JSON-ответу. Nero Network передаёт клиенту схему, чтобы команда могла <strong>сопровождать</strong> сценарий после запуска — в отличие от «чёрного ящика под ключ».</p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" aria-labelledby="h2-golosovye-agenty">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-golosovye-agenty">Голосовые агенты: новый интерфейс после AI2Business</h2>
    <div class="ym-prose"><p>На AI2Business Яндекс показал <strong>low-code интерфейс</strong> голосовых агентов: создание <strong>за минуты</strong> против <strong>дней и недель</strong> ручной разработки; ускорение <strong>«в десятки раз»</strong> — оценка компании (<a href="https://www.vedomosti.ru/technologies/industries_and_markets/news/2026/05/28/1200947-biznesa-alice">Ведомости</a>, <a href="https://retail-life.ru/rossijskie-kompanii-smogut-sozdavat-golosovyh-ii-agentov-za-neskolko-minut/">retail-life.ru</a>).</p>
<h3>Realtime API и SpeechKit</h3>
<p>Стек: <strong>Yandex Speech Realtime</strong>, промпт + инструменты (поиск, БЗ), каталог голосов / <strong>Brand Voice Lite</strong>. Телефония — <strong>SIP</strong>, трафик на AI Studio; режим SIP — <strong>Preview</strong>, подключение <strong>экспертами Yandex Cloud по запросу в поддержку</strong> (не self-service).</p>
<h3>Кейсы АЗС и HoReCa (по публичным заявлениям Яндекса)</h3>
<p>В пилотах участвуют <strong>сеть АЗС</strong> и <strong>одна из крупнейших ресторанных сетей</strong> — <strong>без публичных названий и KPI</strong> в официальных сообщениях: на АЗС — голосовая покупка топлива; в HoReCa — голосовой заказ через киоски. Елена Белоброва (Yandex B2B Tech) отмечает снижение порога входа для <strong>МСБ</strong>.</p>
<p>Для Nero Network голос — <strong>второй этап</strong> после отладки текстового контура и RAG; иначе растёт стоимость ошибки в реальном времени.</p>
</div>
  </div>
</section>
<section class="ym-section reveal" aria-labelledby="h2-deepseek-v4-flash">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-deepseek-v4-flash">DeepSeek V4 Flash в Yandex Cloud — когда нужен контекст 1M токенов</h2>
    <div class="ym-prose"><p>В том же релизе 28.05.2026: <strong>первая в российском облаке</strong> модель с контекстом <strong>1 млн токенов</strong>; сценарии — корпоративные агенты, большие документы, многошаговые задачи, код. <strong>В 1,5 раза дешевле</strong> предыдущей <strong>DeepSeek V3.2</strong> в Yandex AI Studio (<a href="https://yandex.ru/company/news/28-05-2026-03">релиз</a>).</p>
<h3>Отличие от Alice Flash для агентных сценариев</h3>
<table>
<thead>
<tr>
<th>Критерий</th>
<th>Alice AI LLM Flash</th>
<th>DeepSeek V4 Flash</th>
</tr>
</thead>
<tbody>
<tr>
<td>Сильная сторона</td>
<td>Массовые тексты, L1, модерация, классификация</td>
<td>Длинный контекст, тяжёлые агенты, большие RAG</td>
</tr>
<tr>
<td>Контекст</td>
<td>Стандартный для flash-класса</td>
<td><strong>1M токенов</strong></td>
</tr>
<tr>
<td>Экономика (официально)</td>
<td>~<strong>5×</strong> к прошлым решениям Яндекса для текстов</td>
<td><strong>1,5×</strong> к V3.2 в Studio</td>
</tr>
</tbody>
</table>
<p><strong>Итог:</strong> не выбирайте одну модель «навсегда» — разделите потоки в Model Gallery.</p>
</div>
  </div>
</section>
<section class="ym-section ym-section-alt reveal" aria-labelledby="h2-poshagovoe-vnedrenie">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-poshagovoe-vnedrenie">Пошаговое внедрение: пилот → прод → масштаб</h2>
    <div class="ym-prose"><h3>Аудит процессов и выбор одного «узкого» сценария</h3>
<p>Шаг 1: карта обращений (объём, повторяемость, доля шаблонных). Шаг 2: выбор сценария с измеримым ROI — чаще <strong>классификация</strong> или <strong>FAQ с RAG</strong>, не «полная замена контакт-центра». Шаг 3: baseline <strong>2–4 недели</strong> до включения модели.</p>
<h3>Метрики: AHT, FCR, стоимость токена, доля автозакрытия</h3>
<ul>
<li><strong>AHT</strong> — среднее время обработки  </li>
<li><strong>FCR</strong> — решение с первого контакта  </li>
<li><strong>Стоимость токена</strong> — по факту из консоли Cloud (Flash — сверить вручную)  </li>
<li><strong>Доля автозакрытия</strong> — с потолком по риску (эскалация обязательна)</li>
</ul>
<p>Сравните Flash со <strong>старой моделью</strong> Яндекса в A/B — это честнее, чем переносить 56% из пресс-релиза.</p>
<h3>Роли: владелец продукта, интегратор, безопасность</h3>
<p>Владелец продукта — KPI и приёмка; интегратор (Nero Network / внутренняя команда) — API, MCP, CRM; ИБ — ПДн, логи, DPIA при необходимости.</p>
<!-- ARTUR_CTA:SECONDARY id=after-pilot-h2 -->
<aside class="ym-cta-card ym-cta-card--secondary reveal" id="cta-secondary-training" aria-labelledby="cta-secondary-title">
  <p class="ym-cta-eyebrow">Обучение команды</p>
  <h3 id="cta-secondary-title">Освоить Yandex AI Studio и MCP до пилота</h3>
  <p>Если команда ещё не работала с агентами, RAG и интеграциями в Make/n8n — начните с практики: так пилот на Flash не превратится в «чёрный ящик» для IT.</p>
  <div class="ym-btn-group">
    <a class="ym-btn ym-btn-secondary" href="#cta-secondary-training" rel="noopener noreferrer">Курс и обучение</a>
  </div>
</aside>
<!-- /ARTUR_CTA:SECONDARY -->

</div>
  </div>
</section>
<section class="ym-section reveal" aria-labelledby="h2-usluga-nero-network">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-usluga-nero-network">Услуга Nero Network — проектирование и внедрение под ваш стек</h2>
    <div class="ym-prose"><p>Nero Network закрывает разрыв между <strong>новостью 28 мая</strong> и <strong>работающим контуром у клиента</strong>:</p>
<ul>
<li>проектирование на <strong>Yandex AI Studio</strong> с <strong>Alice AI LLM Flash</strong>;  </li>
<li><strong>чат-бот поддержки</strong> с эскалацией и суммаризацией;  </li>
<li><strong>RAG</strong> по базе знаний (vector store, MCP, IAM);  </li>
<li>интеграции <strong>amoCRM</strong>, <strong>Битрикс24</strong>, телефония, <strong>Make/n8n</strong>;  </li>
<li>обучение команды (вайбкодинг, Cursor, MCP) — не только «сдал и ушёл».</li>
</ul>
<p>Отстройка от универсальных интеграторов: <strong>узкий фокус</strong> на свежем стеке Яндекса, пилот <strong>2–4 недели</strong>, честная матрица <strong>Flash vs DeepSeek 1M vs флагман</strong>, без выдуманных цен Flash.</p>
<h3>Чат-бот поддержки, RAG, CRM/телефония «под ключ»</h3>
<p>Типовой пакет: аудит → пилот на Flash → RAG → CRM → (опционально) голос через SIP Preview с сопровождением Cloud. Оффер: <strong>«внедрим как у Яндекса — под ваш процесс»</strong>.</p>
<!-- ARTUR_CTA:PRIMARY id=after-nero-service-h2 -->
<section class="ym-cta-card ym-cta-card--primary reveal" id="cta-nero-yandex-flash" aria-labelledby="cta-primary-title">
  <p class="ym-cta-eyebrow">Услуга Nero Network</p>
  <h3 id="cta-primary-title">Внедрим как у Яндекса — для вашего бизнеса</h3>
  <p class="ym-cta-lead">Проектируем и запускаем контур на <strong>Yandex AI Studio</strong> с <strong>Alice AI LLM Flash</strong>: первая линия поддержки, RAG по базе знаний, интеграции <strong>amoCRM</strong> / <strong>Битрикс24</strong> и телефонии — под ваш процесс, не «демо в вакууме».</p>
  <ul class="ym-cta-list">
    <li>Чат-бот поддержки с эскалацией и суммаризацией</li>
    <li>RAG: vector store, MCP, роли IAM</li>
    <li>CRM, webhooks, Make/n8n</li>
    <li>Пилот 2–4 недели на одном сценарии</li>
  </ul>
  <form class="ym-lead-form" action="#cta-nero-yandex-flash" method="get" aria-label="Заявка на внедрение Alice AI LLM Flash">
    <div class="ym-lead-form-grid">
      <label class="ym-lead-field">Имя <input type="text" name="name" autocomplete="name" required placeholder="Как к вам обращаться"></label>
      <label class="ym-lead-field">Телефон или Telegram <input type="text" name="contact" autocomplete="tel" required placeholder="+7 … или @username"></label>
      <label class="ym-lead-field ym-lead-field--full">Задача <textarea name="task" rows="3" placeholder="Поддержка, RAG, CRM, голос — что в приоритете?"></textarea></label>
    </div>
    <div class="ym-btn-group ym-lead-actions">
      <button type="submit" class="ym-btn ym-btn-primary"><span>Оставить заявку</span></button>
      <a class="ym-btn ym-btn-secondary" href="#cta-nero-yandex-flash" rel="noopener noreferrer">Написать в мессенджер</a>
    </div>
    <p class="ym-cta-note">Отправляя форму, вы соглашаетесь на обработку контактов для связи по заявке. Данные клиентов в пилоте — только в согласованном контуре Yandex Cloud.</p>
  </form>
</section>
<!-- /ARTUR_CTA:PRIMARY -->

</div>
  </div>
</section>

<section class="ym-section ym-section-alt reveal" id="h2-faq" aria-labelledby="h2-faq-title">
  <div class="ym-container">
    <h2 class="ym-section-title" id="h2-faq-title">FAQ — вопросы под сниппеты и GEO</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;font-size:18px;">Быстрые ответы</h3>
        <ul class="ym-faq-list"><li><a href="#faq-1">Чем Alice AI LLM Flash отличается от Alice AI LLM?</a></li><li><a href="#faq-2">Где посмотреть цену Flash?</a></li><li><a href="#faq-3">Нужен ли отдельный договор Yandex Cloud?</a></li><li><a href="#faq-4">Можно ли оставить западную LLM для части задач?</a></li><li><a href="#faq-5">Сколько длится пилот?</a></li><li><a href="#faq-6">Какие цифры качества можно цитировать?</a></li><li><a href="#faq-7">Когда брать DeepSeek V4 Flash вместо Flash?</a></li><li><a href="#faq-8">Голосовой агент — можно подключить SIP самому?</a></li><li><a href="#faq-9">Что такое MCP Hub в двух словах?</a></li><li><a href="#faq-10">Кто конкуренты по внедрению в РФ?</a></li></ul>
      </aside>
      <div class="ym-faq-content"><article class="ym-faq-item reveal" id="faq-1"><h3>Чем Alice AI LLM Flash отличается от Alice AI LLM?</h3><p><br>
Flash — быстрая линейка для <strong>массовых</strong> текстовых и документных задач и потоков; флагманская Alice AI LLM — выше по качеству на сложных задачах и RAG «премиум». Обе в AI Studio; выбор — по сценарию и TCO.</p></article><article class="ym-faq-item reveal" id="faq-2"><h3>Где посмотреть цену Flash?</h3><p><br>
В <strong>консоли Yandex Cloud</strong> / тарификации AI Studio. В пресс-релизе 28.05.2026 <strong>нет</strong> публичной таблицы ₽/токен для Flash; есть формулировки «почти в 5 раз дешевле» к <strong>прежним решениям Яндекса</strong> и сопоставимость с GPT-5.4 mini.</p></article><article class="ym-faq-item reveal" id="faq-3"><h3>Нужен ли отдельный договор Yandex Cloud?</h3><p><br>
Работа идёт в контуре <strong>Yandex Cloud</strong>; юридические условия — по договору облака и политикам AI Studio. Детали — у аккаунт-менеджера Cloud.</p></article><article class="ym-faq-item reveal" id="faq-4"><h3>Можно ли оставить западную LLM для части задач?</h3><p><br>
Технически — да, но для ПДн и 152-ФЗ чаще выбирают <strong>российский контур</strong>; Flash позиционируется как альтернатива по цене/качеству в РФ без зависимости от западных API в критичных процессах.</p></article><article class="ym-faq-item reveal" id="faq-5"><h3>Сколько длится пилот?</h3><p><br>
Ориентир Nero Network: <strong>2–4 недели</strong> на один сценарий (классификация, FAQ+RAG, суммаризация в CRM).</p></article><article class="ym-faq-item reveal" id="faq-6"><h3>Какие цифры качества можно цитировать?</h3><p><br>
Слепое сравнение с GPT-5.4 mini: <strong>56% / 73% / 66% / 61%</strong> — <a href="https://yandex.ru/company/news/28-05-2026-03">релиз Яндекса</a>. Это внутренний бенчмарк; для SLA нужен свой тест.</p></article><article class="ym-faq-item reveal" id="faq-7"><h3>Когда брать DeepSeek V4 Flash вместо Flash?</h3><p><br>
Когда нужен <strong>контекст 1 млн токенов</strong>, тяжёлые агенты, большие документы или сложный многошаговый RAG — <a href="https://yandex.ru/company/news/28-05-2026-03">тот же релиз</a>.</p></article><article class="ym-faq-item reveal" id="faq-8"><h3>Голосовой агент — можно подключить SIP самому?</h3><p><br>
SIP в AI Studio — <strong>Preview</strong>; подключение через <strong>экспертов Yandex Cloud по запросу</strong>, не self-service (<a href="https://retail-life.ru/rossijskie-kompanii-smogut-sozdavat-golosovyh-ii-agentov-za-neskolko-minut/">retail-life.ru</a>).</p></article><article class="ym-faq-item reveal" id="faq-9"><h3>Что такое MCP Hub в двух словах?</h3><p><br>
Стандарт подключения <strong>внешних инструментов</strong> к агенту (CRM, поиск, функции) через MCP-серверы в AI Studio.</p></article><article class="ym-faq-item reveal" id="faq-10"><h3>Кто конкуренты по внедрению в РФ?</h3><p><br>
В выдаче — DYNAMICSUN (Yandex GPT), Just AI, Korus (свои agent-платформы), CRM-интеграторы; Nero Network делает акцент на <strong>Flash + AI Studio + CRM/телефония + обучение команды</strong>.</p></article></div>
    </div>
  </div>
</section>
<!-- ARTUR_CTA:FINAL id=before-sources -->
<div class="ym-cta-strip reveal" id="cta-final-strip" role="complementary" aria-label="Итоговое предложение Nero Network">
  <div class="ym-cta-strip-inner">
    <p class="ym-cta-strip-title"><strong>Alice AI LLM Flash</strong> уже в Studio — осталось встроить в поддержку и CRM.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="#cta-nero-yandex-flash" rel="noopener noreferrer"><span>Оставить заявку</span></a>
      <a class="ym-btn ym-btn-secondary" href="/" rel="noopener noreferrer">Курс и обучение</a>
    </div>
  </div>
</div>
<!-- /ARTUR_CTA:FINAL -->
<div class="ym-container ym-sources reveal"><p><strong>Источники:</strong> <a href="https://yandex.ru/company/news/28-05-2026-03">yandex.ru/company/news/28-05-2026-03</a>, <a href="https://www.vedomosti.ru/technologies/industries_and_markets/news/2026/05/28/1200947-biznesa-alice">Ведомости</a>, <a href="https://www.cnews.ru/news/line/2026-05-28_yandeks_zapustil_bystruyu">CNews</a>, <a href="https://yandex.cloud/ru/blog/alice-ai-november-2025">блог Alice AI LLM</a>, <a href="https://ya.ru/ai/aliceai">ya.ru/ai/aliceai</a>, <a href="https://aistudio.yandex.ru/docs/ru/ai-studio/concepts/agents/tools/mcp-tool">документация MCP</a>, <a href="https://habr.com/ru/companies/reksoft/articles/1016026/">Habr REKSOFT</a>, <a href="https://github.com/yandex-cloud/yandex-ai-studio-sdk">GitHub SDK</a>.</p></div>
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
      "headline": "Alice AI LLM Flash: внедрение нейросети Яндекса для бизнеса",
      "description": "Alice AI LLM Flash в Yandex AI Studio: поддержка и документы дешевле, 152-ФЗ, RAG и CRM. Сравнение с GPT-5.4 mini и внедрение под ваш процесс — Nero Network.",
      "author": {
        "@type": "Organization",
        "name": "Nero Network"
      },
      "about": [
        "Alice AI LLM Flash",
        "Yandex AI Studio",
        "нейросеть для бизнеса"
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Чем Alice AI LLM Flash отличается от Alice AI LLM?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Flash — быстрая линейка для массовых текстовых задач; флагман — для сложного RAG и качества."
          }
        },
        {
          "@type": "Question",
          "name": "Где посмотреть цену Flash?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "В консоли Yandex Cloud / тарификации AI Studio."
          }
        },
        {
          "@type": "Question",
          "name": "Сколько длится пилот?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ориентир Nero Network: 2–4 недели на один сценарий."
          }
        }
      ]
    },
    {
      "@type": "SoftwareApplication",
      "name": "Alice AI LLM Flash",
      "applicationCategory": "BusinessApplication",
      "operatingSystem": "Yandex Cloud"
    }
  ]
}
</script>

<!-- /wp:html -->

<?php
get_footer();

