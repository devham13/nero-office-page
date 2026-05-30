<?php
/**
 * Template Name: AI FinOps — контроль расходов на токены
 * Description: Лонгрид AI FinOps (hero canvas + блок Бориса + reveal + JSON-LD)
 */

$page_seo_title = 'AI FinOps: контроль расходов на токены и ИИ в бизнесе';
$page_seo_description = 'FinOps для AI: контроль расходов на токены, лимиты API и окупаемость внедрения нейросетей. Уроки Microsoft и Uber для бизнеса и МСБ.';

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
 *   `.ai-finops-kontrol-rashodov-tokeny-biznes-page` на свой, например `.my-slug-page` (везде, где он есть).
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
.ai-finops-kontrol-rashodov-tokeny-biznes-page {
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
    --ym-accent: #0ea5e9;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(5, 150, 105, 0.15);
}

.ai-finops-kontrol-rashodov-tokeny-biznes-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.ai-finops-kontrol-rashodov-tokeny-biznes-page h1,
.ai-finops-kontrol-rashodov-tokeny-biznes-page h2,
.ai-finops-kontrol-rashodov-tokeny-biznes-page h3,
.ai-finops-kontrol-rashodov-tokeny-biznes-page h4,
.ai-finops-kontrol-rashodov-tokeny-biznes-page h5,
.ai-finops-kontrol-rashodov-tokeny-biznes-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.ai-finops-kontrol-rashodov-tokeny-biznes-page p,
.ai-finops-kontrol-rashodov-tokeny-biznes-page li,
.ai-finops-kontrol-rashodov-tokeny-biznes-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.ai-finops-kontrol-rashodov-tokeny-biznes-page strong,
.ai-finops-kontrol-rashodov-tokeny-biznes-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.ai-finops-kontrol-rashodov-tokeny-biznes-page pre, .ai-finops-kontrol-rashodov-tokeny-biznes-page code {
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
#finops-command-center.finops-hero-shell {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.ai-finops-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
  gap: 40px;
  align-items: start;
  margin-bottom: 48px;
}
.ai-finops-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #059669, #0ea5e9) 1;
  padding-left: 24px;
}
.ai-finops-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.65;
  color: #334155 !important;
}
.ai-finops-intro-lead { font-size: 18px !important; }
.ai-finops-intro-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 14px;
}
.ai-finops-intro-chips span {
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
  color: #0f172a !important;
}
.ym-toc-wrap { display: flex; justify-content: center; margin-top: 8px; }
.ai-finops-intro-section .ym-toc { justify-content: center; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose h3 { margin-top: 2rem; font-size: 1.35rem; }
.ym-prose table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 14px; }
.ym-prose th, .ym-prose td { border: 1px solid var(--ym-border); padding: 10px 12px; text-align: left; }
.ym-prose th { background: #f1f5f9; font-weight: 700; }
.ym-prose blockquote {
  border-left: 4px solid var(--ym-primary);
  margin: 1.5rem 0;
  padding: 0.75rem 1.25rem;
  background: #f0fdf4;
  font-size: 15px;
}
.ym-faq-answer { font-size: 15px; line-height: 1.65; }
.ym-faq-answer ul { padding-left: 1.25rem; }
@media (max-width: 900px) {
  .ai-finops-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main ai-finops-kontrol-rashodov-tokeny-biznes-page" role="main" tabindex="-1">

<section id="finops-command-center" class="fullscreen-white-office finops-hero-shell" aria-label="AI FinOps hero">
<style>
.finops-hero-shell {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #ffffff;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
#hero-finops-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.finops-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  z-index: 3;
  max-width: min(720px, 92vw);
}
.finops-hero-shell .giant-seo {
  font-size: clamp(32px, 4.8vw, 68px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
}
.finops-hero-shell .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #059669, #0ea5e9, #8b5cf6);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.finops-hero-shell .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 680px;
}
.finops-hero-cta-wrap {
  position: absolute;
  right: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  z-index: 3;
}
.finops-hero-shell .telegram-button {
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
.finops-hero-shell .telegram-button:hover { transform: translateY(-2px); }
.finops-hero-shell .vl-ui-tasks {
  position: absolute;
  left: clamp(16px, 3vw, 48px);
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.finops-hero-shell .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 16px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(0,0,0,0.06);
}
.finops-hero-shell .vl-ui-task span {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #059669, #0ea5e9);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.finops-hero-shell .vl-ui-pill {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  gap: 10px;
  z-index: 3;
  max-width: min(520px, 90vw);
}
.finops-hero-shell .vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
@media (max-width: 900px) {
  .finops-hero-shell .vl-ui-tasks { display: none; }
  .finops-hero-copy { bottom: 120px; }
}
</style>

<canvas id="hero-finops-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill" aria-label="Метрики FinOps">
  <span>98% управляют AI spend</span>
  <span>₽/операция</span>
  <span>Gateway</span>
  <span>Лимит 80%</span>
</div>

<nav class="vl-ui-tasks" aria-label="Этапы AI FinOps">
  <div class="vl-ui-task"><span>1</span> Учёт токенов и shadow AI</div>
  <div class="vl-ui-task"><span>2</span> Chargeback по командам</div>
  <div class="vl-ui-task"><span>3</span> Маршрутизация моделей</div>
  <div class="vl-ui-task"><span>4</span> Кэш и видимость spend</div>
  <div class="vl-ui-task"><span>5</span> Hard cap до масштаба</div>
</nav>

<div class="finops-hero-copy">
  <h1 class="giant-seo">AI FinOps для бизнеса: Microsoft и Uber исчерпали бюджеты на токены — <span>как внедрять нейросети без сжигания денег</span></h1>
  <p class="giant-seo-sub">Практика Nero Network: автоматизация, AI-агенты и учёт стоимости каждой операции — до масштабирования, а не после «сюрприза» в счёте</p>
</div>

<div class="finops-hero-cta-wrap">
  <a class="telegram-button" href="https://t.me/neronetwork" rel="noopener">Аудит API и FinOps → Telegram</a>
</div>
</section>


<section class="ym-section ai-finops-intro-section reveal" aria-label="Введение">
  <div class="ym-container">
    <div class="ai-finops-intro-grid">
      <div class="ai-finops-intro-text">
        <p class="ai-finops-intro-lead"><strong>Коротко:</strong> в 2026 году расходы на нейросети в бизнесе перестали быть «экспериментом в углу IT». Токены API, агенты и массовые лицензии съедают бюджеты быстрее, чем пилоты приносят измеримый ROI.</p>
        <p>AI FinOps — дисциплина учёта, лимитов и unit-экономики <strong>до</strong> масштабирования, а не после сюрприза в счёте. Ниже — кейсы Microsoft и Uber, практики gateway и ответы на частые вопросы.</p>
      </div>
      <div class="ai-finops-intro-deco" aria-hidden="true">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot"></span><span class="ym-mac-dot"></span><span class="ym-mac-dot"></span>
            <span style="margin-left:8px;font-size:11px;color:#94a3b8;">finops-snapshot.sh</span>
          </div>
          <div class="ym-mac-body">
            <p class="ym-command">$ finops status --team=all</p>
            <p class="ym-comment"># 98% manage AI spend · 53% visibility gap</p>
            <p class="ym-command">→ gateway.route(mini|flagship)</p>
            <p class="ym-command">→ chargeback.tag(team_id, feature)</p>
            <p class="ym-comment"># alert @ 80% · hard cap @ 100%</p>
          </div>
        </div>
        <div class="ai-finops-intro-chips">
          <span>₽/операция</span><span>Gateway</span><span>LiteLLM</span><span>Make/n8n</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc-wrap" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#pochemu-scheta-tokeny-2026">Почему растут счета</a>
        <a href="#ai-finops-opredelenie">Что такое AI FinOps</a>
        <a href="#rashody-neyroseti-biznes">Статьи расходов</a>
        <a href="#unit-ekonomika-ii">Unit-экономика</a>
        <a href="#praktiki-kontrol-gateway">Практики контроля</a>
        <a href="#ai-agenty-avtomatizaciya">Агенты и автоматизация</a>
        <a href="#rossiyskiy-kontekst-msb">Контекст РФ</a>
        <a href="#faq-ai-finops">FAQ</a>
        <a href="#itog-ai-finops">Итог</a>
      </div>
    </nav>
  </div>
</section>

<section id="pochemu-scheta-tokeny-2026" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Почему в 2026 году счета за токены обгоняют пилоты и ФОТ</h2>
    <div class="ym-prose">
<h3>Microsoft отзывает Claude Code — финансовый мотив, не только UX</h3>
<p>Подразделение <strong>Experiences + Devices</strong> Microsoft (Windows, Microsoft 365, Outlook, Teams, Surface) <strong>сворачивает внутренний доступ к Claude Code до 30 июня 2026</strong> — последний день финансового года компании. Инженеров переводят на <strong>GitHub Copilot CLI</strong>.</p>
<p>Официальная линия — конвергенция на «свой» agentic CLI и интеграцию с репозиториями Microsoft. Источники <a href="https://www.theverge.com/tech/930447/microsoft-claude-code-discontinued-notepad">The Verge (14.05.2026)</a> добавляют <strong>финансовый мотив</strong>: токенная модель Claude Code оказалась «слишком популярной» и бьёт по OPEX перед FY2027.</p>
<p><strong>Важно для бизнеса:</strong> партнёрство Microsoft с Anthropic (Azure AI Foundry, модели в Copilot) <strong>не отменяется</strong> — режется именно прямой dev-доступ к Claude Code для тысяч внутренних разработчиков. Урок: даже гигант с переговорной силой <strong>пересматривает экономику инструмента</strong>, когда счёт за токены растёт быстрее планов.</p>
<p><strong>Rajesh Jha</strong> (EVP Experiences + Devices), по внутренней записке через The Verge: Claude Code был «важной частью обучения», но Copilot CLI — продукт, который Microsoft «может формировать напрямую с GitHub» под свои repo, security и workflows.</p>
<h3>Uber и корпорации: AI-бюджет к апрелю vs планы на год</h3>
<p><strong>Uber</strong> — якорный кейс «бюджет на год за квартал». CTO <strong>Praveen Neppalli Naga</strong> (цитата через Axios / The Information, пересказ <a href="https://habr.com/ru/news/1029038/">Habr</a>): <em>«I'm back to the drawing board because the budget I thought I would need is blown away already»</em> — весь запланированный на <strong>2026</strong> AI-бюджет израсходован <strong>к началу/середине апреля</strong>.</p>
<p>Драйверы роста:
- массовое внедрение <strong>Claude Code</strong> (~<strong>5 000</strong> инженеров);
- внутренние лидерборды по использованию;
- оценки <strong>$500–2 000 на инженера в месяц</strong> только на API/токены;
- ~<strong>11%</strong> pull request и ~<strong>11%</strong> backend-изменений — от AI-агентов при росте AI-затрат <strong>~6× с 2024</strong>.</p>
<p>COO <strong>Andrew Macdonald</strong> (вторичные СМИ): сложно связать рост токенов с <strong>новыми фичами для пользователей</strong> — давление на ROI, не только на сокращение costs. R&amp;D Uber в <strong>2025</strong>: <strong>$3,4 млрд</strong> (+9% г/г).</p>
<p><strong>Определение для владельца бизнеса:</strong> те же механики (токены × частота × цепочки агентов) работают и без 5 000 разработчиков — в чат-боте для отдела продаж, в «пилоте ChatGPT для всех» и в сценариях <strong>Make/n8n</strong> без лимитов.</p>
<h3>FinOps Foundation: 98% команд уже управляют AI spend</h3>
<p>По <strong>State of FinOps 2026</strong> (FinOps Foundation, <strong>1 192</strong> респондента, совокупный cloud spend <strong>$83+ млрд</strong>):</p>
<ul>
<li><strong>98%</strong> организаций <strong>управляют AI spend</strong> — два года назад это было <strong>31%</strong>;</li>
<li><strong>FinOps for AI</strong> — топ-приоритет и самый востребованный навык;</li>
<li>при этом <strong>53,4%</strong> испытывают проблемы с <strong>видимостью</strong> AI-расходов;</li>
<li><strong>~40%</strong> не могут <strong>квантифицировать ROI</strong>;</li>
<li>доля «не измеряем ROI» снизилась с <strong>27% до 18%</strong> (<a href="https://siliconangle.com/2026/05/28/finops-ai-spending-boardroom-strategy-finopsx/">Dave Vellante, theCUBE / SiliconANGLE, 28.05.2026</a>);</li>
<li><strong>78%</strong> FinOps-команд отчитываются <strong>CTO/CIO</strong> (+18% к 2023).</li>
</ul>
<p><strong>FinOps X 2026</strong> пройдёт <strong>8–11 июня</strong> в San Diego — треки <em>FinOps for AI / Token Economics</em>, <em>Agentic FinOps</em>, <em>Optimization for Value</em>, <em>FOCUS</em> (нормализация billing data; у компаний с spend <strong>$100M+</strong> — <strong>68%</strong> используют или тестируют FOCUS). Программа: <a href="https://x.finops.org/">x.finops.org</a>, первичные данные: <a href="https://data.finops.org/">data.finops.org</a>.</p>
<p><strong>Коротко:</strong> рынок уже не спрашивает «нужен ли учёт AI» — спрашивает, <strong>видите ли вы ROI</strong> и кто отвечает за токены в P&amp;L.</p>
    </div>
  </div>
</section>
<section id="ai-finops-opredelenie" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Что такое AI FinOps и чем отличается от «облачного» FinOps</h2>
    <div class="ym-prose">
<p><strong>Определение:</strong> <strong>AI FinOps</strong> — операционная дисциплина управления совокупными расходами на искусственный интеллект: инференс, токены API, GPU, SaaS с AI-фичами, лицензии, возмещения с корпоративных карт и внутренние сервисы. Это не только «резать облако», а <strong>decision support</strong> по инвестициям в AI (<a href="https://www.techtarget.com/searchenterpriseai/feature/FinOps-can-manage-AI-computing-costs-experts-say">TechTarget, 01.04.2026</a>).</p>
<p><strong>Rob Martin</strong> (Fellow, FinOps Foundation): AI costs «show up everywhere» — cloud, SaaS, licensing, <strong>corporate card reimbursements</strong>; FinOps должен видеть <strong>совокупный AI spend</strong>.</p>
<p><strong>Chirag Mehta</strong> (Constellation Research): AI spend формируется <strong>раньше</strong> и динамичнее, чем waste в классическом облаке — FinOps for AI = <strong>operational discipline</strong>, не только экономия.</p>
<p>Классический FinOps оптимизировал VM и резервирования. AI FinOps добавляет <strong>tokenomics</strong>: модель, промпт, RAG, маршрутизация, лимиты <strong>до</strong> масштабирования (<strong>shift-left</strong>).</p>
<h3>Учёт по операциям, командам и продуктам (chargeback)</h3>
<p><strong>Chargeback</strong> в AI FinOps — не бухгалтерская формальность, а ответ на вопрос «кто сжёг бюджет». Практика:</p>
<ul>
<li>теги на каждый запрос: <code>team_id</code>, <code>feature</code>, <code>workflow</code>;</li>
<li>отчётность по командам и продуктам;</li>
<li>связка с P&amp;L: маркетинг, поддержка, разработка видят <strong>свою</strong> долю токенов.</li>
</ul>
<p>В AWS для Bedrock с <strong>апреля 2026</strong> доступна <strong>IAM cost allocation</strong>: поле <code>line_item_iam_principal</code> в CUR 2.0, теги <code>iamPrincipal/team</code> (<a href="https://aws.amazon.com/about-aws/whats-new/2026/04/bedrock-iam-cost-allocation/">AWS What's New</a>).</p>
<h3>ROI, TCO и «стоимость операции» вместо бесконечных пилотов (RBC-угол)</h3>
<p><strong>PwC Global CEO Survey 2026</strong> (4 000+ CEO): <strong>56%</strong> не увидели <strong>ни роста выручки, ни снижения затрат</strong> от AI.</p>
<p>Российский тезис <a href="https://companies.rbc.ru/news/6RWGo850QX/perestante-schitat-ii-pilotyi-schitajte-skolko-stoit-operatsiya/">РБК Компании, 27.05.2026</a>: «проиграют те, кто считает успех <strong>числом пилотов</strong>» — метрика = <strong>стоимость операции</strong>, производительность, цена сбоя, срок окупаемости, а не витрина POC.</p>
<p><strong>Shawn Lund</strong> (Deloitte), TechTarget: нужны <strong>tokenomics</strong>, observability, <strong>routing layer</strong> к cheapest capable model, caching — «рычаги», которые включают по мере зрелости.</p>
    </div>
  </div>
</section>
<section id="ai-finops-kontrol-rashodov-tokeny-bizness-boris-block" class="boris-article-viz ym-section" aria-labelledby="boris-finops-viz-title">
<style>
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block {
  padding: 72px 0;
  background: #f8fafc;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-finops-wrap {
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 24px;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-finops-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
  padding: 32px 36px;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-finops-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(0, 0.85fr);
  gap: 36px;
  align-items: center;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-eyebrow {
  margin: 0 0 10px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: #64748b;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-kicker {
  margin: 0 0 14px;
  font-size: clamp(22px, 2.4vw, 28px);
  font-weight: 800;
  line-height: 1.2;
  color: #0f172a !important;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-lead {
  margin: 0 0 18px;
  font-size: 15px;
  line-height: 1.65;
  color: #475569;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-points {
  margin: 0 0 20px;
  padding: 0;
  list-style: none;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-points li {
  position: relative;
  padding: 0 0 10px 22px;
  font-size: 14px;
  line-height: 1.55;
  color: #334155;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-points li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.55em;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: linear-gradient(135deg, #10b981, #3b82f6);
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 14px;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #0f172a;
  background: #f1f5f9;
  border: 1px solid #e2e8f0;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-pill strong {
  color: #059669;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-pill--warn strong {
  color: #d97706;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-bridge {
  margin: 0;
  font-size: 13px;
  color: #64748b;
  font-style: italic;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-canvas-shell {
  position: relative;
  min-height: 420px;
  max-height: 68vh;
  border-radius: 18px;
  background: linear-gradient(165deg, #f8fafc 0%, #eef2ff 55%, #f0fdf4 100%);
  border: 1px solid #e2e8f0;
  overflow: hidden;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block #boris-finops-gateway-canvas {
  display: block;
  width: 100%;
  height: 100%;
  min-height: 420px;
}
#ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-caption {
  margin: 14px 0 0;
  font-size: 12px;
  line-height: 1.5;
  color: #64748b;
  text-align: center;
}
@media (max-width: 1023px) {
  #ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-finops-grid {
    grid-template-columns: 1fr;
    gap: 28px;
  }
  #ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-canvas-shell {
    min-height: 360px;
  }
  #ai-finops-kontrol-rashodov-tokeny-bizness-boris-block #boris-finops-gateway-canvas {
    min-height: 360px;
  }
}
@media (max-width: 767px) {
  #ai-finops-kontrol-rashodov-tokeny-bizness-boris-block {
    padding: 48px 0;
  }
  #ai-finops-kontrol-rashodov-tokeny-bizness-boris-block .boris-finops-card {
    padding: 24px 20px;
  }
}
</style>
<div class="boris-finops-wrap">
  <div class="boris-finops-card reveal">
    <div class="boris-finops-grid">
      <div class="boris-finops-copy">
        <p class="boris-eyebrow">Визуализация · AI FinOps</p>
        <h3 id="boris-finops-viz-title" class="boris-kicker">Мост учёта: от запроса к строке в P&amp;L</h3>
        <p class="boris-lead">Пока hero показывает, как бюджет «утекает» без контроля, здесь — контур решения: единый gateway, маршрутизация на дешёвую модель и chargeback по командам.</p>
        <ul class="boris-points">
          <li><strong>Запросы</strong> сотрудников и агентов проходят через один proxy — не раздаём ключи в чаты.</li>
          <li><strong>Маршрутизация:</strong> рутина → mini/haiku, сложное → флагман; agent loop — лимит шагов.</li>
          <li><strong>Теги</strong> <code>team_id</code>, <code>feature</code>, <code>workflow</code> → отчёт и ₽/операция в P&amp;L.</li>
        </ul>
        <div class="boris-pills" aria-hidden="true">
          <span class="boris-pill"><strong>98%</strong> manage AI spend</span>
          <span class="boris-pill boris-pill--warn"><strong>80%</strong> алерт бюджета</span>
          <span class="boris-pill">кэш −25–50%</span>
        </div>
        <p class="boris-bridge">Дальше разберём, из каких статей складываются расходы на нейросети в бизнесе.</p>
      </div>
      <div class="boris-finops-stage">
        <div class="boris-canvas-shell" role="img" aria-label="Анимация: поток запросов через AI FinOps gateway к моделям и отчёту P&amp;L">
          <canvas id="boris-finops-gateway-canvas" width="640" height="420"></canvas>
        </div>
        <p class="boris-caption">Схема FinOps-контура: запрос → gateway → (кэш?) → модель → тег → строка отчёта. Анимация циклическая.</p>
      </div>
    </div>
  </div>
</div>
<script>
(function () {
  var canvas = document.getElementById("boris-finops-gateway-canvas");
  if (!canvas) return;
  var ctx = canvas.getContext("2d");
  var cw = 0, ch = 0, frame = 0, dpr = 1;

  var PAL = {
    ink: "#0f172a",
    muted: "#64748b",
    line: "#cbd5e1",
    gateway: "#3b82f6",
    gatewayLight: "#93c5fd",
    cache: "#10b981",
    cheap: "#22c55e",
    flagship: "#8b5cf6",
    warn: "#f59e0b",
    danger: "#ef4444",
    tag: "#f1f5f9",
    pnl: "#0f172a"
  };

  function resize() {
    var shell = canvas.parentElement;
    if (!shell) return;
    dpr = Math.min(window.devicePixelRatio || 1, 2);
    cw = shell.clientWidth;
    ch = Math.max(360, Math.min(shell.clientHeight || 420, window.innerHeight * 0.68));
    canvas.width = Math.floor(cw * dpr);
    canvas.height = Math.floor(ch * dpr);
    canvas.style.width = cw + "px";
    canvas.style.height = ch + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
  }

  function rr(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); ctx.closePath(); }
    if (fill) { ctx.fillStyle = fill; ctx.fill(); }
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
  }

  function drawLabel(x, y, text, color) {
    ctx.font = "600 11px Inter, system-ui, sans-serif";
    ctx.fillStyle = color || PAL.muted;
    ctx.textAlign = "center";
    ctx.fillText(text, x, y);
  }

  var nodes = [];
  function layoutNodes() {
    var pad = 28;
    var midY = ch * 0.52;
    nodes = [
      { id: "req", x: pad + 36, y: midY, label: "Запросы" },
      { id: "gw", x: cw * 0.32, y: midY, label: "Gateway" },
      { id: "cache", x: cw * 0.48, y: midY - ch * 0.14, label: "Кэш?" },
      { id: "cheap", x: cw * 0.62, y: midY - ch * 0.12, label: "Mini" },
      { id: "flag", x: cw * 0.62, y: midY + ch * 0.12, label: "Флагман" },
      { id: "tag", x: cw * 0.78, y: midY, label: "Теги" },
      { id: "pnl", x: cw - pad - 44, y: midY, label: "P&L" }
    ];
  }

  function drawGatewayNode(n) {
    var s = 38;
    rr(n.x - s, n.y - s, s * 2, s * 2, 12, "#ffffff", PAL.gateway);
    ctx.fillStyle = PAL.gateway;
    ctx.beginPath();
    ctx.moveTo(n.x - 10, n.y + 4);
    ctx.lineTo(n.x - 2, n.y - 8);
    ctx.lineTo(n.x + 10, n.y + 4);
    ctx.closePath();
    ctx.fill();
    drawLabel(n.x, n.y + s + 16, n.label, PAL.ink);
  }

  function drawBoxNode(n, color) {
    var w = 52, h = 34;
    rr(n.x - w / 2, n.y - h / 2, w, h, 8, "#ffffff", color);
    ctx.fillStyle = color;
    ctx.font = "700 10px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(n.label, n.x, n.y);
    ctx.textBaseline = "alphabetic";
  }

  function drawPnlNode(n) {
    var w = 56, h = 70;
    rr(n.x - w / 2, n.y - h / 2, w, h, 8, PAL.pnl, PAL.ink);
    ctx.fillStyle = "#38bdf8";
    for (var i = 0; i < 4; i++) {
      var bh = 8 + ((frame * 0.08 + i * 1.7) % 3) * 6;
      ctx.fillRect(n.x - 16 + i * 9, n.y + 14 - bh, 6, bh);
    }
    drawLabel(n.x, n.y + h / 2 + 18, n.label, PAL.ink);
  }

  function drawEdges() {
    ctx.strokeStyle = PAL.line;
    ctx.lineWidth = 2;
    ctx.setLineDash([6, 6]);
    var pairs = [[0, 1], [1, 2], [1, 3], [1, 4], [3, 5], [4, 5], [5, 6], [2, 3]];
    for (var i = 0; i < pairs.length; i++) {
      var a = nodes[pairs[i][0]], b = nodes[pairs[i][1]];
      ctx.beginPath();
      ctx.moveTo(a.x, a.y);
      ctx.lineTo(b.x, b.y);
      ctx.stroke();
    }
    ctx.setLineDash([]);
  }

  function TokenPacket(start, end, color, speed) {
    this.start = start;
    this.end = end;
    this.color = color;
    this.speed = speed || 0.018;
    this.t = Math.random();
  }
  TokenPacket.prototype.step = function () {
    this.t += this.speed;
    if (this.t > 1) this.t = 0;
    var a = nodes[this.start], b = nodes[this.end];
    var x = a.x + (b.x - a.x) * this.t;
    var y = a.y + (b.y - a.y) * this.t + Math.sin(this.t * Math.PI) * -8;
    ctx.fillStyle = this.color;
    ctx.beginPath();
    ctx.arc(x, y, 5, 0, Math.PI * 2);
    ctx.fill();
    ctx.fillStyle = "#ffffff";
    ctx.font = "9px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("₽", x, y + 3);
  };

  var packets = [
    new TokenPacket(0, 1, PAL.gateway, 0.022),
    new TokenPacket(1, 3, PAL.cheap, 0.02),
    new TokenPacket(1, 4, PAL.flagship, 0.014),
    new TokenPacket(1, 2, PAL.cache, 0.016),
    new TokenPacket(3, 5, PAL.cheap, 0.018),
    new TokenPacket(4, 5, PAL.flagship, 0.015),
    new TokenPacket(5, 6, PAL.warn, 0.02)
  ];

  function drawBudgetMeter() {
    var bx = cw - 120, by = 24, bw = 88, bh = 8;
    var pct = 0.55 + 0.25 * Math.sin(frame * 0.03);
    rr(bx, by, bw, bh, 4, "#e2e8f0", null);
    var fillW = bw * pct;
    var col = pct > 0.8 ? PAL.danger : pct > 0.65 ? PAL.warn : PAL.cache;
    rr(bx, by, fillW, bh, 4, col, null);
    ctx.font = "600 10px Inter, system-ui, sans-serif";
    ctx.fillStyle = PAL.muted;
    ctx.textAlign = "left";
    ctx.fillText("Бюджет API · " + Math.round(pct * 100) + "%", bx, by - 6);
  }

  function draw() {
    ctx.clearRect(0, 0, cw, ch);
    layoutNodes();
    drawEdges();
    drawBoxNode(nodes[0], PAL.muted);
    drawGatewayNode(nodes[1]);
    drawBoxNode(nodes[2], PAL.cache);
    drawBoxNode(nodes[3], PAL.cheap);
    drawBoxNode(nodes[4], PAL.flagship);
    rr(nodes[5].x - 36, nodes[5].y - 18, 72, 36, 8, PAL.tag, PAL.line);
    ctx.fillStyle = PAL.ink;
    ctx.font = "600 10px Inter, system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.fillText("team · feature", nodes[5].x, nodes[5].y - 2);
    ctx.fillStyle = PAL.muted;
    ctx.fillText("workflow", nodes[5].x, nodes[5].y + 10);
    drawPnlNode(nodes[6]);
    for (var i = 0; i < packets.length; i++) packets[i].step();
    drawBudgetMeter();
    frame++;
    requestAnimationFrame(draw);
  }

  window.addEventListener("resize", resize);
  resize();
  requestAnimationFrame(draw);
})();
</script>
</section>
<section id="rashody-neyroseti-biznes" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Из чего складываются расходы на нейросети в бизнесе</h2>
    <div class="ym-prose">
<h3>Токены API, агенты, инфраструктура, интеграция, обучение</h3>
<table>
<thead>
<tr>
<th>Статья</th>
<th>Что входит</th>
<th>Типичный рост</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Токены API</strong></td>
<td>ChatGPT, Claude, Gemini, open-source через хостинг</td>
<td>Линейно с числом запросов и длиной контекста</td>
</tr>
<tr>
<td><strong>AI-агенты</strong></td>
<td>Многошаговые циклы (coding agents, support bots)</td>
<td><strong>Мультипликативно</strong> — каждый шаг = новый вызов модели</td>
</tr>
<tr>
<td><strong>Инфраструктура</strong></td>
<td>GPU, векторные БД, эмбеддинги</td>
<td>Пики при RAG и batch-обработке</td>
</tr>
<tr>
<td><strong>Интеграция</strong></td>
<td>CRM, ERP, Make/n8n, MCP-серверы</td>
<td>Разовые + поддержка</td>
</tr>
<tr>
<td><strong>Обучение и change</strong></td>
<td>Промпт-инжиниринг, FinOps-процессы</td>
<td>Скрытая статья «люди + время»</td>
</tr>
</tbody>
</table>
<p>По <a href="https://habr.com/ru/news/1029038/">Habr 1029038</a>: compute и API в корпорациях уже <strong>сопоставляются с ФОТ или превышают</strong> его — Uber и Microsoft стали публичными якорями.</p>
<h3>Скрытые статьи: переработки, shadow AI, дубли подписок</h3>
<ul>
<li><strong>Shadow AI:</strong> сотрудники платят с личных карт или заводят отдельные workspace — FinOps «не видит» <strong>до 53,4%</strong> проблем видимости в опросе Foundation.</li>
<li><strong>Дубли подписок:</strong> ChatGPT Team + Copilot + Claude Pro в разных отделах без gateway.</li>
<li><strong>Переработки:</strong> agent loops без лимита шагов — один «простой» запрос пользователя превращается в десятки вызовов API.</li>
</ul>
<p><strong>Итог:</strong> контроль расходов на искусственный интеллект начинается с <strong>инвентаризации всех каналов spend</strong>, не только с «официального» API-ключа IT.</p>
    </div>
  </div>
</section>
<section id="unit-ekonomika-ii" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Unit-экономика внедрения ИИ: как считать до масштабирования</h2>
    <div class="ym-prose">
<h3>Baseline, payback period, пессимистичный сценарий ROI</h3>
<p><strong>Формула стоимости операции</strong> (упрощённо):</p>
<blockquote>
<p><strong>₽/операция</strong> = (токены ввод + токены вывод) × цена токена + доля инфраструктуры + доля интеграции / число успешных операций в месяц</p>
</blockquote>
<p>До масштабирования зафиксируйте:
- <strong>baseline</strong> — как решали задачу без ИИ (время, ошибки, конверсия);
- <strong>payback period</strong> — за сколько месяцев экономия на процессе покрывает TCO внедрения;
- <strong>пессимистичный ROI</strong> — рост токенов ×2–3 (как у Uber <strong>~6×</strong> AI-затрат с 2024).</p>
<p>Рекомендация FinOps-гайдов 2026: <strong>30 дней аудита</strong> в staging с полным логированием запросов <strong>перед</strong> production-лимитами.</p>
<h3>Таблица: «дешёвый пилот без учёта» vs «FinOps с первого дня»</h3>
<table>
<thead>
<tr>
<th>Параметр</th>
<th>«Дешёкий пилот без учёта»</th>
<th>«Внедрение с FinOps с дня 1»</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Бюджет</strong></td>
<td>Общий лимит «на попробовать»</td>
<td>Лимит <strong>на операцию</strong> + per-team cap</td>
</tr>
<tr>
<td><strong>Метрика</strong></td>
<td>Кол-во пилотов / пользователей</td>
<td><strong>₽/операция</strong>, ROI по процессу</td>
</tr>
<tr>
<td><strong>Риск</strong></td>
<td>Как Uber: бюджет на год за ~4 мес.</td>
<td>Алерты на <strong>80%</strong>, стоп на 100%</td>
</tr>
<tr>
<td><strong>Масштаб</strong></td>
<td>«Дали ChatGPT всем»</td>
<td>Gateway + теги + владелец процесса</td>
</tr>
<tr>
<td><strong>Итог (RU-рынок)</strong></td>
<td><strong>55%</strong> проектов остаются пилотами (2025)</td>
<td>Целевой переход в <strong>15%</strong> промышленного внедрения</td>
</tr>
</tbody>
</table>
<p>Источник долей <strong>55% / 30% / 15%</strong> (пилоты / масштабирование / промышленное): <a href="https://companies.rbc.ru/news/6RWGo850QX/perestante-schitat-ii-pilotyi-schitajte-skolko-stoit-operatsiya/">РБК</a>, подтверждение — <a href="https://events.kommersant.ru/events/ii-vse-tut/">Коммерсантъ Events / MWS AI</a>, <a href="https://www.megaresearch.ru/new_reality/ispolzovanie-generativnogo-iskusstvennogo-intellekta-v-biznese-rynok-perehodit-ot-pilotnyh-proektov-k-masshtabnym-vnedreniyam">Megaresearch</a>.</p>
<p><strong>Окупаемость внедрения ИИ</strong> измеряется не презентацией POC, а тем, снизилась ли <strong>стоимость операции</strong> на реальном потоке заявок, тикетов или документов.</p>
    </div>
  </div>

<aside class="ym-cta-inline reveal" aria-label="Консультация по AI FinOps">
  <div class="ym-card" style="border-left:4px solid var(--ym-primary);padding:1.5rem 1.75rem;margin:2rem 0;">
    <p style="margin:0 0 8px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#64748b;">Nero Network · AI FinOps</p>
    <h3 style="margin:0 0 12px;font-size:22px;font-weight:800;color:var(--ym-heading);">Аудит расходов на API и FinOps с первого дня</h3>
    <p style="margin:0 0 16px;color:#64748b;line-height:1.6;font-size:15px;">30 дней логов, shadow AI, gateway, лимиты и метрика ₽/операция — до масштабирования Make/n8n/MCP и AI-агентов.</p>
    <p style="margin:0;font-weight:600;color:var(--ym-heading);">Свяжитесь с Nero Network для консультации по внедрению с прозрачной экономикой.</p>
  </div>
</aside>
</section>
<section id="praktiki-kontrol-gateway" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Практики контроля: gateway, лимиты, маршрутизация моделей, кэш</h2>
    <div class="ym-prose">
<h3>LiteLLM / PortKey / Bedrock attribution — что доступно МСБ</h3>
<table>
<thead>
<tr>
<th>Уровень</th>
<th>Инструмент</th>
<th>Для кого</th>
<th>Суть</th>
</tr>
</thead>
<tbody>
<tr>
<td>Enterprise</td>
<td><a href="https://support.claude.com/en/articles/13703965-claude-enterprise-analytics-api-reference-guide">Anthropic Enterprise Analytics API</a> (май 2026)</td>
<td>Claude Enterprise</td>
<td>Per-user USD/token, Claude Code sessions, cost per commit/PR</td>
</tr>
<tr>
<td>AWS</td>
<td><a href="https://aws.amazon.com/about-aws/whats-new/2026/04/bedrock-iam-cost-allocation/">Bedrock IAM cost allocation</a></td>
<td>Клиенты AWS</td>
<td>Attribution по IAM principal и тегам команд</td>
</tr>
<tr>
<td>OSS gateway</td>
<td><a href="https://github.com/BerriAI/litellm">LiteLLM</a></td>
<td>МСБ с DevOps</td>
<td>Self-host proxy, 100+ провайдеров, virtual keys, budgets — <strong>без per-token surcharge</strong> провайдера gateway</td>
</tr>
<tr>
<td>Managed gateway</td>
<td><a href="https://portkey.ai">Portkey</a></td>
<td>МСБ без своего DevOps</td>
<td>Guardrails, semantic cache, team budgets; на высоких объёмах — surcharge vs self-host</td>
</tr>
<tr>
<td>FinOps-фокус</td>
<td>Tokenr, Helicone, NeuralRouting</td>
<td>Продуктовые команды</td>
<td>Cost-per-feature, алерты 80% бюджета, anomaly detection</td>
</tr>
</tbody>
</table>
<p><strong>Семь практик для МСБ</strong> (сводка исследования):</p>
<ol>
<li><strong>Единый gateway</strong> (LiteLLM/PortKey) — один API-ключ на команду, не раздача ключей в чаты.</li>
<li><strong>Теги на каждый запрос</strong> → chargeback.</li>
<li><strong>Маршрутизация:</strong> рутина → mini/haiku; сложное → флагман; agent loops — <strong>лимит шагов</strong>.</li>
<li><strong>Кэш</strong> (semantic / prompt): экономия <strong>25–50%</strong> на повторяющихся запросах (отраслевые обзоры gateway).</li>
<li><strong>Hard caps:</strong> per-user, per-feature, global monthly; алерт на <strong>80%</strong>, стоп на <strong>100%</strong>.</li>
<li><strong>Метрика «стоимость операции»</strong>, не «токены ради токенов».</li>
<li><strong>30 дней аудита</strong> перед production-лимитами.</li>
</ol>
<h3>Когда отключать флагманскую модель и когда кэшировать контекст</h3>
<p><strong>Отключать флагман</strong> (или не давать к нему доступ по умолчанию), когда:
- задача классификации, извлечения сущностей, черновика с шаблоном;
- объём запросов &gt;500/день на однотипные промпты;
- цепочка агента уходит в &gt;5 шагов без контроля.</p>
<p><strong>Кэшировать контекст</strong>, когда:
- повторяются одни и те же базы знаний (политики, каталоги);
- RAG отдаёт стабильные чанки;
- в автоматизации <strong>Make/n8n</strong> один сценарий дергает API сотни раз в час.</p>
<p>Схема для команды: <strong>запрос → gateway → (кэш?) → модель → тег → строка в отчёте P&amp;L</strong>.</p>
    </div>
  </div>
</section>
<section id="ai-agenty-avtomatizaciya" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">AI-агенты и автоматизация (Make, n8n, MCP) с прозрачной экономикой</h2>
    <div class="ym-prose">
<h3>Лимиты на цепочки агентов и стоимость одного сценария</h3>
<p><strong>AI агенты для бизнеса</strong> — главный мультипликатор счёта: каждый «ход» агента — отдельный вызов API. Для автоматизации с нейросетями для бизнеса задайте:</p>
<ul>
<li><strong>лимит шагов</strong> в agent loop;</li>
<li><strong>стоимость одного run</strong> сценария n8n/Make (webhook + токены + внешние API);</li>
<li><strong>metering</strong> через узел учёта или webhook в gateway.</li>
</ul>
<p><strong>MCP</strong> (Model Context Protocol) упрощает подключение инструментов, но <strong>не снимает</strong> учёт: каждый tool call может порождать новые токены. FinOps-контур должен охватывать и IDE-агентов, и no-code цепочки.</p>
<p>Контраст: OpenAI запустила <strong>Deployment Company</strong> — forward-deployed внедрение в enterprise (<a href="https://openai.com/index/openai-launches-the-deployment-company/">OpenAI</a>). Спрос на внедрение растёт, но <strong>без экономики</strong> масштаб = счёт, как у Uber.</p>
<h3>Кейс Nero Network: внедрение + аудит API + обучение команды</h3>
<p>Практика <strong>Nero Network</strong> для предпринимателей и среднего бизнеса:</p>
<ol>
<li><strong>Аудит расходов на API</strong> — 30 дней логов, shadow AI, дубли подписок.</li>
<li><strong>Проектирование</strong> — gateway, теги, маршрутизация, кэш, hard caps.</li>
<li><strong>Внедрение AI-агентов и автоматизации</strong> (Make, n8n, MCP) с <strong>прозрачной unit-экономикой</strong> каждого сценария.</li>
<li><strong>Обучение команды</strong> — не «жечь токены» в промптах и агентах; chargeback по отделам.</li>
</ol>
<p>Цель — не повторить сценарий «ИИ съел бюджет / непонятно, окупается ли», а выйти на измеримую <strong>₽/операцию</strong> до масштабирования.</p>
    <aside class="ym-cta-inline reveal" aria-label="Обучение FinOps и автоматизации">
  <div class="ym-card" style="padding:1.5rem 1.75rem;margin:2rem 0;background:var(--ym-surface);border:1px solid var(--ym-border);">
    <p style="margin:0 0 8px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#64748b;">Обучение команды</p>
    <h3 style="margin:0 0 12px;font-size:20px;font-weight:800;color:var(--ym-heading);">Не «жечь токены» в промптах и агентах</h3>
    <p style="margin:0;color:#64748b;line-height:1.6;font-size:15px;">FinOps-практики для автоматизации: лимиты цепочек, chargeback по отделам, маршрутизация моделей. Уточните программу обучения у Nero Network.</p>
  </div>
</aside>
    </div>
  </div>
</section>
<section id="rossiyskiy-kontekst-msb" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Российский контекст: пилоты 55% / промышленное 15% и что делать МСБ</h2>
    <div class="ym-prose">
<p>Рынок generative AI в РФ оценивается примерно в <strong>~58 млрд ₽</strong>. При этом:</p>
<ul>
<li>ощутимый эффект на уровне <strong>всей компании</strong> — у <strong>13%</strong> организаций;</li>
<li>быстрый рост выручки — у <strong>5%</strong> проектов;</li>
<li>структура 2025: <strong>55%</strong> пилоты, <strong>30%</strong> масштабирование, <strong>15%</strong> промышленное внедрение — «рынок экспериментов».</li>
</ul>
<p>Кейсы с измеримой экономикой <strong>до</strong> запуска (по материалам РБК): доставка <strong>250 млн ₽</strong> эффекта/год при бюджете проекта <strong>50+ млн ₽</strong>; пилот ИИ-ассистентов девелопера — <strong>−30%</strong> трудозатрат за <strong>4</strong> месяца.</p>
<p><strong>Что делать МСБ:</strong></p>
<ul>
<li>не гнаться за числом пилотов — считать <strong>стоимость операции</strong>;</li>
<li>внедрять <strong>учёт расходов на нейросети</strong> через доступный стек (LiteLLM self-host <strong>или</strong> Portkey);</li>
<li>для Claude-only enterprise — отдельно смотреть <strong>Enterprise Analytics</strong>;</li>
<li>для остальных — <strong>обязательный</strong> proxy + metering в автоматизации.</li>
</ul>
<p>Узкий запрос «<strong>нейросеть для бизнеса сколько стоит</strong>» закрывается не прайсом подписки, а <strong>полной стоимостью владения</strong>: токены + интеграции + риск неконтролируемого масштаба.</p>
    </div>
  </div>
</section>
<section id="faq-ai-finops" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar">
        <p class="ym-faq-sidebar-title">Вопросы</p>
        <nav class="ym-faq-list" aria-label="Вопросы FAQ">
<a href="#faq-q1">Как посчитать стоимость одной операции с нейросетью?</a>
<a href="#faq-q2">Что такое chargeback по командам в AI FinOps?</a>
<a href="#faq-q3">Как снизить расходы на ChatGPT и API без отказа от ИИ?</a>
<a href="#faq-q4">Нужен ли отдельный FinOps-специалист или достаточно процесса?</a>
        </nav>
      </aside>
      <div class="ym-faq-content">
<article class="ym-faq-item reveal" id="faq-q1">
  <h3>Как посчитать стоимость одной операции с нейросетью?</h3>
  <div class="ym-faq-answer"><p>Зафиксируйте границы операции (закрытый тикет, сгенерированный документ, успешный run сценария). Соберите за 30 дней: суммарные токены (ввод+вывод) × тариф провайдера + доля инфраструктуры и интеграции. Разделите на число <strong>успешных</strong> операций. Добавьте пессимистичный коэффициент ×2 на рост частоты. Источник методологии «операция, не пилот»: <a href="https://companies.rbc.ru/news/6RWGo850QX/perestante-schitat-ii-pilotyi-schitajte-skolko-stoit-operatsiya/">РБК, 27.05.2026</a>.</p></div>
</article>
<article class="ym-faq-item reveal" id="faq-q2">
  <h3>Что такое chargeback по командам в AI FinOps?</h3>
  <div class="ym-faq-answer"><p>Это распределение AI-затрат по подразделениям и продуктам на основе тегов (<code>team_id</code>, <code>feature</code>, <code>workflow</code>) и отчётов gateway/облака. Цель — прозрачность для CTO/CIO (<strong>78%</strong> FinOps-команд уже отчитываются на этот уровень) и ответственность владельцев процессов, а не «один общий счёт IT».</p></div>
</article>
<article class="ym-faq-item reveal" id="faq-q3">
  <h3>Как снизить расходы на ChatGPT и API без отказа от ИИ?</h3>
  <div class="ym-faq-answer"><ul>
<li>единый <strong>gateway</strong> с лимитами и маршрутизацией на более дешёвые модели для рутины;</li>
<li><strong>кэш</strong> повторяющегося контекста (<strong>25–50%</strong> экономии в обзорах gateway);</li>
<li><strong>hard caps</strong> и алерты на <strong>80%</strong> бюджета;</li>
<li>запрет раздачи персональных API-ключей;</li>
<li>учёт <strong>стоимости операции</strong>, а не безлимитных экспериментов.</li>
</ul></div>
</article>
<article class="ym-faq-item reveal" id="faq-q4">
  <h3>Нужен ли отдельный FinOps-специалист или достаточно процесса?</h3>
  <div class="ym-faq-answer"><p>На <strong>98%</strong> зрелых организаций FinOps for AI уже встроен в функцию — чаще это <strong>процесс + инструменты + владелец</strong> (продукт/IT/финансы), а не обязательно отдельная ставка. Для МСБ достаточно: gateway, 30-дневный аудит, метрики ₽/операция, ежемесячный разбор с владельцами автоматизаций. Отдельный специалист оправдан при spend уровня enterprise и мультиоблаке.</p></div>
</article>
      </div>
    </div>
  </div>
</section>
<section id="itog-ai-finops" class="ym-section reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">Итог</h2>
    <div class="ym-prose">
<p><strong>Расходы на нейросети в бизнесе</strong> в 2026 году — предмет boardroom-уровня: Microsoft сворачивает Claude Code из-за OPEX, Uber исчерпал годовой AI-бюджет за месяцы, <strong>98%</strong> FinOps-команд уже управляют AI spend, но <strong>56%</strong> CEO (PwC) не видят эффекта в P&amp;L. <strong>AI FinOps</strong> и <strong>unit-экономика внедрения ИИ</strong> — способ внедрять нейросети и агентов <strong>с прозрачной экономикой</strong>: лимиты, маршрутизация, chargeback, стоимость операции. Для российского МСБ ставка — не догнать хайп, а не остаться в <strong>55%</strong> вечных пилотов без окупаемости.</p>
<p><strong>Готовы считать операцию, а не пилоты?</strong> Запросите консультацию по внедрению ИИ с прозрачной unit-экономикой: аудит API, gateway, hard caps и окупаемость на реальных процессах.</p>
    <div class="ym-btn-group reveal" style="margin:2.5rem 0 1rem;" role="region" aria-label="Итоговый призыв к действию">
  <p style="flex:1 1 100%;text-align:center;margin:0 0 1rem;font-size:18px;font-weight:600;color:var(--ym-heading);max-width:640px;margin-left:auto;margin-right:auto;">Готовы считать операцию, а не пилоты?</p>
  <span class="ym-btn ym-btn-primary" style="cursor:default;"><span>Консультация: аудит API и unit-экономика</span></span>
</div>
    </div>
  </div>
</section>

</main>

<script id="hero-finops-engine">
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("hero-finops-canvas");
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
    mint: "#10b981",
    sky: "#0ea5e9",
    amber: "#f59e0b",
    red: "#ef4444",
    violet: "#8b5cf6",
    panel: "#f8fafc",
    line: "#cbd5e1",
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

  class TokenStreamArc {
    constructor(cx, cy, r) {
      this.cx = cx;
      this.cy = cy;
      this.r = r;
      this.chips = [];
      for (let i = 0; i < 8; i++) {
        this.chips.push({ offset: i / 8, cheap: i % 3 === 0 });
      }
    }
    draw(ctx, prg, reroute) {
      const startA = Math.PI * 0.15;
      const endA = Math.PI * 1.85;
      ctx.lineWidth = 3;
      ctx.strokeStyle = reroute ? C.mint : C.line;
      ctx.setLineDash([8, 10]);
      ctx.beginPath();
      ctx.arc(this.cx, this.cy, this.r, startA, endA);
      ctx.stroke();
      ctx.setLineDash([]);

      const speed = reroute ? 0.45 : 0.28;
      this.chips.forEach((chip, i) => {
        let t = (chip.offset + frame * speed * 0.004) % 1;
        const a = startA + t * (endA - startA);
        const px = this.cx + Math.cos(a) * this.r;
        const py = this.cy + Math.sin(a) * this.r;
        const col = reroute && chip.cheap ? C.mint : chip.cheap ? C.sky : C.violet;
        drawPolyRound(ctx, px - 9, py - 6, 18, 12, 3, col, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("TK", px, py + 2);
      });
    }
  }

  class BudgetGaugeTower {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.lockFlash = 0;
    }
    draw(ctx, fillRatio, alert80, capped) {
      const w = 88;
      const h = 200;
      drawPolyRound(ctx, this.x - w / 2, this.y, w, h, 10, C.panel, C.outline);
      const pad = 8;
      const innerH = h - pad * 2;
      const fillH = innerH * Math.min(1, fillRatio);
      const fillY = this.y + pad + innerH - fillH;
      let grad = ctx.createLinearGradient(0, this.y + h, 0, this.y);
      if (capped) {
        grad.addColorStop(0, C.red);
        grad.addColorStop(0.5, C.amber);
        grad.addColorStop(1, C.mint);
      } else if (alert80) {
        grad.addColorStop(0, C.amber);
        grad.addColorStop(1, C.mint);
      } else {
        grad.addColorStop(0, C.mint);
        grad.addColorStop(1, C.sky);
      }
      drawPolyRound(ctx, this.x - w / 2 + pad, fillY, w - pad * 2, fillH, 6, grad, null);

      ctx.fillStyle = C.outline;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("AI BUDGET", this.x, this.y - 12);
      ctx.font = "bold 11px sans-serif";
      const pct = Math.round(fillRatio * 100);
      ctx.fillText(pct + "%", this.x, this.y + h / 2 + 4);

      if (alert80) {
        ctx.strokeStyle = C.amber;
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(this.x, this.y - 28, 14 + Math.sin(frame * 0.2) * 2, 0, Math.PI * 2);
        ctx.stroke();
        ctx.fillStyle = C.amber;
        ctx.font = "bold 10px sans-serif";
        ctx.fillText("80%", this.x, this.y - 24);
      }
      if (capped) {
        this.lockFlash = (this.lockFlash + 1) % 40;
        drawPolyRound(ctx, this.x - 18, this.y + h / 2 - 20, 36, 28, 4, C.red, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 9px sans-serif";
        ctx.fillText("CAP", this.x, this.y + h / 2 - 4);
      }
    }
  }

  class ApiGatewayHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.blink = 0;
    }
    draw(ctx, active) {
      drawPolyRound(ctx, this.x, this.y, 100, 56, 8, "#fff", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("GATEWAY", this.x + 50, this.y + 14);
      for (let i = 0; i < 4; i++) {
        const lit = active && (frame + i * 15) % 60 < 30;
        drawPolyRound(ctx, this.x + 12 + i * 22, this.y + 24, 14, 22, 3, lit ? C.mint : "#e2e8f0", C.outline);
      }
      if (active) {
        ctx.strokeStyle = C.sky;
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(this.x - 30, this.y + 28);
        ctx.lineTo(this.x, this.y + 28);
        ctx.stroke();
        ctx.fillStyle = C.sky;
        ctx.font = "bold 7px sans-serif";
        ctx.fillText("mini", this.x - 42, this.y + 22);
      }
    }
  }

  class ChargebackLedger {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, phase) {
      const teams = ["mkt", "dev", "ops"];
      teams.forEach((t, i) => {
        const slide = phase > 0.25 ? Math.min(1, (phase - 0.25 - i * 0.08) * 4) : 0;
        const ox = slide * 12;
        drawPolyRound(ctx, this.x + ox, this.y + i * 22, 72, 18, 3, "#fff", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px monospace";
        ctx.textAlign = "left";
        ctx.fillText(t + " · TK", this.x + 6 + ox, this.y + 12 + i * 22);
      });
    }
  }

  class AlertBeacon {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx, on) {
      if (!on) return;
      const pulse = 0.5 + Math.sin(frame * 0.25) * 0.5;
      ctx.globalAlpha = 0.25 + pulse * 0.35;
      ctx.fillStyle = C.amber;
      ctx.beginPath();
      ctx.arc(this.x, this.y, 22 + pulse * 8, 0, Math.PI * 2);
      ctx.fill();
      ctx.globalAlpha = 1;
      drawPolyRound(ctx, this.x - 8, this.y - 10, 16, 20, 4, C.amber, C.outline);
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
      const targetX = 95;
      const targetY = -55 + this.stepTrig * 0.35;

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 9) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          this.x = this.baseX + (targetX - this.baseX) * (local / 9);
          this.y = this.baseY + (targetY - this.baseY) * (local / 9);
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
        createBubble(this.x, this.y - 22, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 260);
      }

      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);

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
      ctx.restore();
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 14, 14, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const arc = new TokenStreamArc(0, 20, 155);
  const gauge = new BudgetGaugeTower(0, -70);
  const gateway = new ApiGatewayHub(130, -15);
  const ledger = new ChargebackLedger(-175, -50);
  const beacon = new AlertBeacon(55, -115);

  entities.push(arc, gauge, gateway, ledger, beacon);
  entities.push(new Agent(-220, 55, C.agentYellow, "1_architect", 18, ["Baseline ₽/операцию", "Лимит до масштаба", "FinOps с дня 1"]));
  entities.push(new Agent(-150, 120, C.agentGreen, "2_seo", 52, ["Тег team_id", "Chargeback маркетингу", "Shadow AI в отчёте?"]));
  entities.push(new Agent(-70, 35, C.agentBlue, "3_coder", 88, ["Рутина → mini", "Агент loop ×12", "Gateway режет счёт"]));
  entities.push(new Agent(10, 115, C.agentPink, "4_designer", 128, ["Кэш −40% spend", "Видимость 53% дыр", "Токены vs ФОТ"]));
  entities.push(new Agent(55, 25, C.agentPurple, "5_deployer", 168, ["Алерт 80%!", "Hard cap сейчас", "Как Uber за 4 мес."]));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    const prg = (frame * 0.055) % 240;
    const fillRatio = 0.15 + (prg / 240) * 0.9;
    const alert80 = fillRatio >= 0.8 && fillRatio < 0.98;
    const capped = fillRatio >= 0.98 || prg > 200;
    const reroute = capped;

    arc.draw(ctx, prg, reroute);
    ledger.draw(ctx, fillRatio);
    gauge.draw(ctx, fillRatio, alert80, capped);
    beacon.draw(ctx, alert80 || capped);
    gateway.draw(ctx, prg > 70);

    entities.filter(e => e instanceof Agent).forEach(a => a.draw(ctx, prg));

    if (prg >= 16 && prg < 16.08) createBubble(-210, -30, "1. Учёт токенов");
    if (prg >= 50 && prg < 50.08) createBubble(-140, 70, "2. Chargeback");
    if (prg >= 86 && prg < 86.08) createBubble(-60, -20, "3. Маршрутизация");
    if (prg >= 124 && prg < 124.08) createBubble(25, 75, "4. Кэш −40%");
    if (prg >= 166 && prg < 166.08) createBubble(60, -15, "5. Hard cap!");

    if (alert80 && prg % 40 < 0.1) createBubble(55, -140, "80% бюджета — стоп роста");
    if (capped && prg % 50 < 0.1) createBubble(130, -40, "Поток на mini-модель");

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
      const by = bub.y - (bub.maxLife - bub.life) * 0.04;
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

<script>
/**
 * Scroll reveal для классов .reveal, .reveal-left, .reveal-right, .reveal-scale
 * (как в конце page-yandex-metrika-skill.php).
 * Подключай после разметки лонгрида Наташи.
 */
document.addEventListener('DOMContentLoaded', function () {
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
      "headline": "AI FinOps для бизнеса: контроль расходов на токены и ИИ",
      "description": "FinOps для AI: контроль расходов на токены, лимиты API и окупаемость внедрения нейросетей. Уроки Microsoft и Uber для бизнеса и МСБ.",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "inLanguage": "ru-RU",
      "about": ["AI FinOps", "расходы на нейросети в бизнесе", "стоимость токенов", "unit-экономика внедрения ИИ"]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Как посчитать стоимость одной операции с нейросетью?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Зафиксируйте границы операции, соберите за 30 дней токены и затраты, разделите на число успешных операций и добавьте пессимистичный коэффициент на рост частоты."
          }
        },
        {
          "@type": "Question",
          "name": "Что такое chargeback по командам в AI FinOps?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Распределение AI-затрат по подразделениям на основе тегов team_id, feature, workflow и отчётов gateway."
          }
        },
        {
          "@type": "Question",
          "name": "Как снизить расходы на ChatGPT и API без отказа от ИИ?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Единый gateway, маршрутизация на дешёвые модели, кэш, hard caps и учёт стоимости операции."
          }
        },
        {
          "@type": "Question",
          "name": "Нужен ли отдельный FinOps-специалист или достаточно процесса?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Для МСБ достаточно процесса, gateway, 30-дневного аудита и метрик ₽/операция; отдельная ставка оправдана при enterprise spend."
          }
        }
      ]
    }
  ]
}
</script>

<?php
get_footer();
