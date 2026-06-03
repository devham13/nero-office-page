<?php
/**
 * Template Name: Безопасное внедрение генеративного ИИ в бизнес
 */
$page_seo_title = 'Генеративный ИИ в бизнесе без утечек: безопасное внедрение';
$page_seo_description = '42,5% компаний боятся утечек при genAI. Исследование УЦСБ и «Солар»: контур, политики, AI-шлюзы, human-in-the-loop — как внедрить без теневого ИИ.';

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


/* CRITICAL FIX FOR STICKY SIDEBAR & OVERFLOW */
body, html {
    /* max-width: 100vw; removed to fix mobile menu */
}
.site-main {
    display: block !important;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #ff0000;
    --ym-accent: #3b82f6;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(255, 0, 0, 0.15);
}

.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h1,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h2,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h3,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h4,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h5,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page p,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page li,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page strong,
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page pre, .bezopasnoe-vnedrenie-generativnogo-ii-biznes-page code {
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
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .genai-perimeter-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page :root {
  --ym-primary: #059669;
  --ym-accent: #0ea5e9;
}
.bezopasnoe-intro-section { padding: clamp(48px, 6vw, 80px) 0 40px; }
.bezopasnoe-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 28px;
  align-items: start;
}
@media (min-width: 900px) {
  .bezopasnoe-intro-grid { grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr); gap: 40px; }
}
.bezopasnoe-intro-text {
  text-align: left !important;
  border-left: 4px solid var(--ym-primary);
  padding-left: clamp(16px, 3vw, 28px);
}
.bezopasnoe-intro-text p {
  text-align: left !important;
  font-size: 17px;
  line-height: 1.7;
  color: var(--ym-text) !important;
  margin: 0 0 14px;
}
.bezopasnoe-intro-text p:last-child { margin-bottom: 0; }
.ym-toc-wrap { margin-top: 48px; text-align: center; }
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose {
  max-width: 900px;
  margin: 0 auto;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose h2 {
  font-size: clamp(26px, 3vw, 36px);
  font-weight: 800;
  margin: 0 0 20px;
  letter-spacing: -0.5px;
  scroll-margin-top: 100px;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose h3 {
  font-size: 20px;
  font-weight: 700;
  margin: 32px 0 14px;
  scroll-margin-top: 100px;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose p, .bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose li {
  line-height: 1.7;
  margin-bottom: 16px;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 15px;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose th, .bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 16px;
  text-align: left;
}
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose th { background: #f1f5f9; font-weight: 700; }
.bezopasnoe-vnedrenie-generativnogo-ii-biznes-page .ym-prose a { color: var(--ym-accent); }
.ym-cta-band { padding: 60px 0; }


</style>

<main id="primary" class="site-main bezopasnoe-vnedrenie-generativnogo-ii-biznes-page" role="main" tabindex="-1">

<section id="genai-perimeter-hero" class="fullscreen-white-office genai-perimeter-hero" aria-label="Безопасное внедрение генеративного ИИ">
<style>
.genai-perimeter-hero {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: linear-gradient(165deg, #f8fafc 0%, #ffffff 45%, #f1f5f9 100%);
}
.genai-perimeter-hero::before {
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
.genai-perimeter-hero canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}
.genai-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(720px, 92vw);
  z-index: 3;
}
.genai-hero-cta-top {
  position: absolute;
  top: clamp(20px, 4vh, 48px);
  right: clamp(16px, 4vw, 56px);
  z-index: 3;
}
.giant-seo {
  font-size: clamp(32px, 4.6vw, 68px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
}
.giant-seo span {
  display: block;
  background: linear-gradient(90deg, #059669, #0ea5e9);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 680px;
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
  transition: transform 0.2s, box-shadow 0.2s;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);
}
.telegram-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 20px rgba(15, 23, 42, 0.2);
}
.vl-ui-pill {
  position: absolute;
  top: clamp(20px, 4vh, 52px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  z-index: 3;
  max-width: 96vw;
}
.vl-ui-pill span {
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.vl-ui-tasks {
  position: absolute;
  right: clamp(12px, 3vw, 48px);
  bottom: clamp(100px, 18vh, 200px);
  display: flex;
  flex-direction: column;
  gap: 8px;
  z-index: 3;
}
.vl-ui-task {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}
.vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #059669, #0ea5e9);
  color: #fff;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
@media (max-width: 900px) {
  .vl-ui-tasks { display: none; }
  .genai-hero-copy { bottom: clamp(16px, 4vh, 40px); }
}
</style>

<canvas id="bezopasnoe-genai-hero-canvas" aria-hidden="true"></canvas>

<div class="vl-ui-pill" role="list">
  <span>42,5% — барьер утечек</span>
  <span>Трафик в LLM ×30</span>
  <span>Human-in-the-loop</span>
  <span>Roadmap 90 дней</span>
</div>

<div class="genai-hero-cta-top">
  <a class="telegram-button" href="#cta-safe-genai-audit" target="_blank" rel="noopener noreferrer">Обсудить безопасный контур</a>
</div>

<div class="genai-hero-copy">
  <h1 class="giant-seo">Генеративный ИИ в бизнесе <span>без утечки данных</span></h1>
  <p class="giant-seo-sub">42,5% компаний называют утечку главным барьером — покажем, как выстроить корпоративный контур, политики и автоматизацию с Nero Network</p>
</div>

<div class="vl-ui-tasks" role="list">
  <div class="vl-ui-task"><span>1</span> Аудит теневого ИИ</div>
  <div class="vl-ui-task"><span>2</span> Регламент и политика</div>
  <div class="vl-ui-task"><span>3</span> AI-шлюз в контуре</div>
  <div class="vl-ui-task"><span>4</span> Обучение сотрудников</div>
  <div class="vl-ui-task"><span>5</span> Пилот Make/n8n/MCP</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("bezopasnoe-genai-hero-canvas");
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
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 820) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    shield: "#e2e8f0",
    shieldActive: "#10b981",
    leak: "#ef4444",
    warn: "#f59e0b",
    safe: "#22c55e",
    hub: "#f8fafc",
    hubBorder: "#0ea5e9",
    river: "#fecaca",
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

  class PerimeterRing {
    constructor(x, y, r) {
      this.x = x;
      this.y = y;
      this.r = r;
      this.pulse = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.042) % 240;
      this.pulse = prg > 205 ? (prg - 205) / 35 : Math.sin(frame * 0.04) * 0.15 + 0.85;
      ctx.save();
      ctx.translate(this.x, this.y);
      for (let i = 0; i < 6; i++) {
        const a = (Math.PI / 3) * i + frame * 0.008;
        const x1 = Math.cos(a) * this.r * this.pulse;
        const y1 = Math.sin(a) * this.r * this.pulse;
        const a2 = a + Math.PI / 3;
        const x2 = Math.cos(a2) * this.r * this.pulse;
        const y2 = Math.sin(a2) * this.r * this.pulse;
        ctx.strokeStyle = prg > 205 ? C.shieldActive : "#cbd5e1";
        ctx.lineWidth = prg > 205 ? 3 : 2;
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.stroke();
      }
      ctx.restore();
    }
  }

  class ShadowPromptRiver {
    constructor() {
      this.packets = [];
      for (let i = 0; i < 8; i++) {
        this.packets.push({ offset: i * 38, tier: i % 3 });
      }
    }
    draw(ctx) {
      const prg = (frame * 0.042) % 240;
      const speed = 0.55;
      ctx.lineWidth = 2;
      ctx.strokeStyle = "#fca5a5";
      ctx.setLineDash([6, 8]);
      ctx.beginPath();
      ctx.moveTo(-320, 90);
      ctx.quadraticCurveTo(-80, 40, 40, 10);
      ctx.stroke();
      ctx.setLineDash([]);

      this.packets.forEach((p) => {
        let t = ((frame * speed + p.offset) % 280) / 280;
        if (prg > 195) t = Math.min(t, 0.35);
        const px = -320 + t * 360;
        const py = 90 - t * t * 75 + Math.sin(t * 8) * 4;
        const blocked = prg > 55 && prg < 120 && t > 0.45 && t < 0.72;
        const approved = prg >= 170 && t > 0.75;
        const col = approved ? C.safe : blocked ? C.warn : C.leak;
        drawPolyRound(ctx, px - 10, py - 8, 20, 14, 3, col, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(blocked ? "!" : approved ? "✓" : "?", px, py + 2);
      });
    }
  }

  class DataTagScanner {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const prg = (frame * 0.042) % 240;
      const active = prg >= 48 && prg < 125;
      const sweep = active ? Math.sin(frame * 0.12) * 25 : 0;
      drawPolyRound(ctx, this.x, this.y, 50, 36, 6, active ? "#ecfdf5" : "#f1f5f9", C.outline);
      ctx.strokeStyle = active ? C.hubBorder : "#94a3b8";
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(this.x + 8, this.y + 18);
      ctx.lineTo(this.x + 42 + sweep * 0.2, this.y + 18);
      ctx.stroke();
      const tags = ["Красный", "Жёлтый", "Зелёный"];
      tags.forEach((t, i) => {
        const tc = [C.leak, C.warn, C.safe][i];
        drawPolyRound(ctx, this.x + 6 + i * 15, this.y + 24, 12, 6, 2, tc, null);
      });
    }
  }

  class PolicyLedger {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const prg = (frame * 0.042) % 240;
      const lines = prg > 100 ? 4 : prg > 70 ? 2 : 1;
      drawPolyRound(ctx, this.x, this.y, 44, 52, 4, "#fff", C.outline);
      for (let i = 0; i < lines; i++) {
        drawPolyRound(ctx, this.x + 6, this.y + 8 + i * 10, 32 - i * 4, 5, 1, "#cbd5e1", null);
      }
    }
  }

  class CorporateAIGateway {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.phase = 0;
      this.sealScale = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.042) % 240;
      this.phase = prg;
      const scan = prg >= 45 && prg < 130;
      const sealed = prg >= 208;

      ctx.save();
      ctx.translate(this.x, this.y);

      for (let i = 0; i < 6; i++) {
        const a = (Math.PI / 3) * i - Math.PI / 6;
        const hx = Math.cos(a) * 55;
        const hy = Math.sin(a) * 55;
        drawPolyRound(ctx, hx - 28, hy - 28, 56, 56, 8, scan ? "#ecfdf5" : C.hub, C.outline);
      }

      drawPolyRound(ctx, -40, -40, 80, 80, 12, "#fff", C.hubBorder);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 11px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("AI", 0, -6);
      ctx.fillText("ШЛЮЗ", 0, 8);

      if (scan) {
        const beam = (prg % 20) / 20;
        ctx.fillStyle = "rgba(14, 165, 233, 0.25)";
        ctx.fillRect(-38, -38 + beam * 76, 76, 4);
      }

      if (sealed) {
        this.sealScale = Math.min(1, this.sealScale + 0.06);
        ctx.save();
        ctx.scale(this.sealScale, this.sealScale);
        ctx.strokeStyle = C.shieldActive;
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(0, 55, 22, 0, Math.PI * 2);
        ctx.stroke();
        ctx.fillStyle = C.shieldActive;
        ctx.font = "bold 10px sans-serif";
        ctx.fillText("КОНТУР", 0, 58);
        ctx.beginPath();
        ctx.moveTo(-8, 52);
        ctx.lineTo(-2, 58);
        ctx.lineTo(10, 46);
        ctx.stroke();
        ctx.restore();
      } else {
        this.sealScale = 0;
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
    }

    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.042) % 240;
      let isMoving = false;
      let faceDir = 1;
      let carryType = null;

      const hubX = 20;
      const hubY = -30;
      const angle = (this.stepTrig / 240) * Math.PI * 2;
      const targetX = hubX + Math.cos(angle) * 95;
      const targetY = hubY + Math.sin(angle) * 55;

      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const local = prg - this.stepTrig;
        if (local < 12) {
          isMoving = true;
          faceDir = targetX > this.baseX ? 1 : -1;
          carryType = this.color;
          const t = local / 12;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (local < 18) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -faceDir;
          const t = (local - 18) / 10;
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
        ctx.strokeRect(hx + 1, hy - 5, 6, 6);
        ctx.strokeRect(hx - 7, hy - 5, 6, 6);
      } else if (this.role === "2_seo") {
        drawPolyRound(ctx, hx - 12, hy - 14, 24, 8, [6, 6, 0, 0], C.outline, null);
      } else if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.fillRect(hx - 8, hy - 10, 16, 3);
        ctx.fillRect(hx - 8, hy - 4, 12, 3);
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
  const river = new ShadowPromptRiver();

  entities.push(new PerimeterRing(20, -20, 130));
  entities.push(new CorporateAIGateway(20, -30));
  entities.push(new DataTagScanner(-200, -60));
  entities.push(new PolicyLedger(200, 70));
  entities.push(
    new Agent(-280, 80, C.agentYellow, "1_architect", 18, [
      "Зоны: зелёный/жёлтый/красный",
      "Политика ИИ — черновик",
      "Контур с первого дня"
    ])
  );
  entities.push(
    new Agent(-240, -100, C.agentGreen, "2_seo", 58, [
      "42,5% — барьер утечек",
      "Теневой промпт в логе",
      "Классификация данных"
    ])
  );
  entities.push(
    new Agent(-120, 120, C.agentBlue, "3_coder", 98, [
      "DLP на AI-шлюзе",
      "Маскирую ПДн в промпте",
      "Закрытый API только"
    ])
  );
  entities.push(
    new Agent(140, 110, C.agentPink, "4_designer", 138, [
      "Human-in-the-loop",
      "Обучение без теневого чата",
      "Антипаттерны промптов"
    ])
  );
  entities.push(
    new Agent(220, -90, C.agentPurple, "5_deployer", 178, [
      "Пилот в Make/n8n",
      "Контур запечатан",
      "CRM без публичного LLM"
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

    river.draw(ctx);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));

    const prg = (frame * 0.042) % 240;
    if (prg >= 12 && prg < 12.08) createBubble(-260, 40, "Теневой трафик ×30", 240);
    if (prg >= 52 && prg < 52.08) createBubble(-180, -70, "Скан: красный → жёлтый", 240);
    if (prg >= 92 && prg < 92.08) createBubble(-100, 100, "AI-шлюз фильтрует", 240);
    if (prg >= 132 && prg < 132.08) createBubble(150, 90, "Обучение + approve", 240);
    if (prg >= 172 && prg < 172.08) createBubble(60, -50, "Зелёный выход в CRM", 240);
    if (prg >= 212 && prg < 212.08) createBubble(20, -80, "Контур закрыт ✓", 300);

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
</section>

<section class="ym-section bezopasnoe-intro-section" id="intro">
  <div class="ym-container">
    <div class="bezopasnoe-intro-grid reveal">
      <div class="bezopasnoe-intro-text">
        <p><strong>Коротко:</strong> 3 июня 2026 года УЦСБ и ГК «Солар» опубликовали опрос 102 российских компаний: почти 60% уже используют ИИ, но <strong>42,5%</strong> тех, кто ещё не внедрил genAI в рабочую среду, называют <strong>утечку данных</strong> главным барьером.</p>
        <p>Ниже — как перейти от страха и «теневого» ChatGPT к управляемому корпоративному контуру: политики, AI Security, human-in-the-loop и автоматизация в Make/n8n/MCP без утечек в публичные модели.</p>
      </div>
      <div class="bezopasnoe-intro-decor reveal delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">ai-security-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-comment"># Снимок контура</span></div>
            <div><span class="ym-command">audit</span> shadow_ai_traffic</div>
            <div><span class="ym-command">classify</span> green | yellow | red</div>
            <div><span class="ym-command">route</span> --gateway corp_llm</div>
            <div><span class="ym-command">approve</span> human_in_the_loop</div>
            <div><span class="ym-comment"># KPI: 42.5% → managed</span></div>
          </div>
        </div>
        <div class="ym-bento-grid" style="margin-top: 16px; grid-template-columns: repeat(2, 1fr);">
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-300">
            <div class="ym-stat-value">42,5%</div>
            <div class="ym-stat-label">барьер «утечки»</div>
          </div>
          <div class="ym-bento-card ym-bento-stat reveal-scale delay-400">
            <div class="ym-stat-value">×30</div>
            <div class="ym-stat-label">трафик в публичные LLM</div>
          </div>
        </div>
      </div>
    </div>
    <nav class="ym-toc-wrap reveal delay-200" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#pochemu-kompanii-tormozyat-genai">Барьеры genAI</a>
        <a href="#tenevoy-ii">Теневой ИИ</a>
        <a href="#korporativnyy-kontur">Корпоративный контур</a>
        <a href="#politika-ii">Политика и обучение</a>
        <a href="#human-in-the-loop">Human-in-the-loop</a>
        <a href="#prakticheskoe-vnedrenie">Внедрение 90 дней</a>
        <a href="#faq-bezopasnoe-vnedrenie">FAQ</a>
      </div>
    </nav>
  </div>
</section>


<section class="ym-section ym-section-alt" id="pochemu-kompanii-tormozyat-genai">
  <div class="ym-container ym-prose reveal">
    <h2>Почему компании тормозят genAI: утечки как главный барьер (исследование УЦСБ × «Солар», 102 компании)</h2>
    <p><strong>Определение:</strong> <em>Безопасное внедрение генеративного ИИ</em> — это внедрение LLM и агентов в бизнес-процессы с заранее заданными правилами классификации данных, контролем промптов и ответов, обучением сотрудников и техническим контуром (шлюз, on-prem или корпоративное облако), а не разовая покупка «ещё одного чат-бота».</p>
    <p>3 июня 2026 года ComNews опубликовал результаты совместного исследования <strong>УЦСБ</strong> и <strong>ГК «Солар»</strong>: опрошены <strong>102 компании</strong> из <strong>10 отраслей</strong>.</p>
    <h3 id="cifry-issledovaniya">Цифры: 59,6% уже используют ИИ, 33,3% — LLM, 42,5% — страх утечек</h3>
    <p>По данным исследования (<a href="https://www.comnews.ru/content/245648/2026-06-03/2026-w23/1010/risk-utechki-dannykh-stal-glavnym-barerom-dlya-vnedreniya-generativnogo-ii-biznese" target="_blank" rel="noopener noreferrer">ComNews, 03.06.2026</a>):</p>
    <ul>
      <li><strong>59,6%</strong> компаний уже используют различные формы ИИ в работе;</li>
      <li><strong>33,3%</strong> работают с <strong>LLM</strong> и их комбинациями;</li>
      <li><strong>32,3%</strong> пока не применяют ИИ, но изучают или планируют внедрение;</li>
      <li>лишь <strong>3%</strong> заявили о полностью автоматизированных решениях на базе ИИ.</li>
    </ul>
    <p>Параллельно около <strong>40%</strong> ИТ- и ИБ-специалистов уже работают в <strong>гибридном режиме</strong>.</p>
    <div class="ym-bento-grid reveal">
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">42,5%</div>
        <div class="ym-stat-label">утечки и конфиденциальность</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">35%</div>
        <div class="ym-stat-label">нехватка компетенций</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">32,5%</div>
        <div class="ym-stat-label">нет сценариев</div>
      </div>
      <div class="ym-bento-card ym-bento-stat">
        <div class="ym-stat-value">40%</div>
        <div class="ym-stat-label">уже в гибридном режиме</div>
      </div>
    </div>
    <h3 id="drugie-barery">Другие барьеры: компетенции (35%), отсутствие сценариев (32,5%)</h3>
    <table>
      <thead><tr><th>Барьер</th><th>Доля среди не внедривших ИИ</th></tr></thead>
      <tbody>
        <tr><td>Утечки и конфиденциальность</td><td><strong>42,5%</strong></td></tr>
        <tr><td>Нехватка компетенций</td><td><strong>35%</strong></td></tr>
        <tr><td>Нет понятных экономически обоснованных сценариев</td><td><strong>32,5%</strong></td></tr>
        <tr><td>Регуляторная неопределённость</td><td><strong>25%</strong></td></tr>
        <tr><td>Высокая стоимость</td><td><strong>20%</strong></td></tr>
      </tbody>
    </table>
    <h3 id="citaty-ekspertov">Цитаты экспертов: AI Security, защита ИИ-трафика (Тодышев, Вассунов)</h3>
    <p><strong>Евгений Тодышев</strong> (УЦСБ): «Компании видят высокий потенциал в ИИ, но хотят чётко понимать, как не потерять данные и контроль… бизнес остро нуждается в <strong>обучении сотрудников</strong> и внутренних политиках <strong>AI Security</strong>.»</p>
    <p><strong>Иван Вассунов</strong> («Солар»): в <strong>2025 году</strong> трафик в публичные LLM вырос <strong>в 30 раз</strong>, при этом только <strong>25%</strong> компаний разработали политики ИБ для работы сотрудников с ИИ.</p>
  </div>
</section>

<section class="ym-section" id="tenevoy-ii">
  <div class="ym-container ym-prose reveal">
    <h2>Что ломается при «теневом» ИИ: публичные чат-боты и коммерческая тайна</h2>
    <p><strong>Определение:</strong> <em>Теневой ИИ в компании</em> — использование публичных GenAI-сервисов без утверждённых правил и без учёта <strong>ФЗ-152</strong>, <strong>ФЗ-98</strong> и внутренних регламентов.</p>
    <h3 id="rost-trafika">Рост трафика в публичные LLM и риск промптов с PII</h3>
    <p>Исследование «Солар» (<strong>150 организаций</strong>, февраль 2026): объём чувствительных данных в публичные ИИ за <strong>2025 год</strong> вырос <strong>в 30 раз</strong>; около <strong>60%</strong> компаний без формализованных правил; <strong>46%</strong> конфиденциальных промптов уходит через <strong>ChatGPT</strong>.</p>
    <p><strong>Lasso Security</strong>: <strong>13%</strong> промптов содержат чувствительные организационные данные.</p>
    <p><strong>Verizon DBIR 2026</strong>: доля сотрудников, регулярно использующих ИИ, выросла с <strong>15% до 45%</strong>; <strong>67%</strong> — через некорпоративные аккаунты.</p>
    <h3 id="keisy-community-bank">Кейсы: Community Bank, Verizon/Lasso</h3>
    <p><strong>Community Bank (май 2026)</strong> — обработка непубличных данных через <strong>несанкционированное ИИ-приложение</strong>; инцидент признан <strong>material</strong> (<a href="https://www.sec.gov/Archives/edgar/data/1605301/000160530126000021/cbfv-20260507.htm" target="_blank" rel="noopener noreferrer">SEC Form 8-K</a>).</p>
    <h3 id="pochemu-zaprety-ne-rabotayut">Почему запреты без альтернативы не работают</h3>
    <p><strong>Илья Рыбальченко</strong>, ICS Consulting: «Запреты не работают… запрет использовать публичные ИИ повышает трение и выталкивает практику в серую зону».</p>
    <p><strong>Коротко:</strong> стратегия «запрет публичных чатов gpt в офисе» без <strong>зелёной зоны</strong> — утверждённых инструментов, обучения и сценариев — увеличивает <strong>теневой ии</strong>, а не снижает риски.</p>
  </div>
</section>

<section
  class="boris-genai-perimeter ym-section"
  id="bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block"
  aria-labelledby="boris-perimeter-title"
>
<style>
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block {
  --boris-accent: #2563eb;
  --boris-safe: #10b981;
  --boris-risk: #ef4444;
  --boris-surface: #ffffff;
  --boris-muted: #64748b;
  --boris-heading: #0f172a;
  --boris-border: #e2e8f0;
  padding: clamp(48px, 6vw, 72px) 0;
  background: #f8fafc;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-genai-perimeter__card {
  max-width: 1300px;
  margin: 0 auto;
  padding: clamp(24px, 4vw, 40px);
  background: var(--boris-surface);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 12px 40px rgba(15, 23, 42, 0.06);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-genai-perimeter__grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: clamp(24px, 4vw, 36px);
  align-items: stretch;
}
@media (min-width: 1024px) {
  #bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-genai-perimeter__grid {
    grid-template-columns: minmax(0, 0.58fr) minmax(0, 0.42fr);
    gap: 32px;
  }
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--boris-accent);
  margin: 0 0 10px;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-kicker {
  font-size: clamp(20px, 2.4vw, 26px);
  font-weight: 800;
  line-height: 1.25;
  color: var(--boris-heading);
  margin: 0 0 14px;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-lead {
  font-size: 15px;
  line-height: 1.65;
  color: var(--boris-muted);
  margin: 0 0 20px;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin: 0 0 18px;
  padding: 0;
  list-style: none;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 14px;
  border-radius: 999px;
  background: #f1f5f9;
  border: 1px solid var(--boris-border);
  font-size: 13px;
  color: var(--boris-heading);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-pill strong {
  font-weight: 800;
  color: var(--boris-accent);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-bridge {
  font-size: 14px;
  color: var(--boris-muted);
  margin: 0;
  padding-top: 8px;
  border-top: 1px dashed var(--boris-border);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-canvas-wrap {
  position: relative;
  min-height: 380px;
  max-height: 70vh;
  height: clamp(380px, 42vw, 520px);
  border-radius: 16px;
  overflow: hidden;
  background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 48%, #ecfdf5 100%);
  border: 1px solid var(--boris-border);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block #genai-perimeter-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-canvas-legend {
  position: absolute;
  left: 12px;
  bottom: 12px;
  right: 12px;
  display: flex;
  flex-wrap: wrap;
  gap: 8px 14px;
  font-size: 11px;
  color: #475569;
  pointer-events: none;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-legend-item {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 10px;
  background: rgba(255, 255, 255, 0.88);
  border-radius: 8px;
  border: 1px solid var(--boris-border);
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
}
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-dot--shadow { background: #94a3b8; }
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-dot--gate { background: #2563eb; }
#bezopasnoe-vnedrenie-generativnogo-ii-biznes-boris-block .boris-dot--corp { background: #10b981; }
</style>

  <div class="ym-container boris-genai-perimeter__card">
    <div class="boris-genai-perimeter__grid">
      <div class="boris-genai-perimeter__copy">
        <p class="boris-eyebrow">Визуализация контура</p>
        <h3 class="boris-kicker" id="boris-perimeter-title">От теневого промпта к корпоративному агенту</h3>
        <p class="boris-lead">
          Запреты выталкивают практику в серую зону. Управляемый путь — не «закрыть ChatGPT», а провести запросы через шлюз: классификация, DLP и только затем — утверждённый сценарий в контуре.
        </p>
        <ul class="boris-pills" role="list">
          <li class="boris-pill"><strong>×30</strong> рост чувствительного трафика в публичные LLM</li>
          <li class="boris-pill"><strong>13%</strong> промптов с организационными данными</li>
          <li class="boris-pill"><strong>42,5%</strong> барьер «утечки» в опросе УЦСБ × «Солар»</li>
        </ul>
        <p class="boris-bridge">Дальше разберём, как собрать on-prem, AI-шлюз и разделение сред dev / prod.</p>
      </div>
      <div class="boris-canvas-wrap" aria-hidden="true">
        <canvas id="genai-perimeter-canvas" width="640" height="480"></canvas>
        <div class="boris-canvas-legend">
          <span class="boris-legend-item"><span class="boris-dot boris-dot--shadow"></span> Теневой промпт</span>
          <span class="boris-legend-item"><span class="boris-dot boris-dot--gate"></span> AI-шлюз / DLP</span>
          <span class="boris-legend-item"><span class="boris-dot boris-dot--corp"></span> Корпоративный контур</span>
        </div>
      </div>
    </div>
  </div>

<script>
(function genaiPerimeterEngine() {
  var canvas = document.getElementById('genai-perimeter-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var cw = 0, ch = 0, frame = 0;
  var packets = [];
  var sparks = [];

  var C = {
    outline: '#0f172a',
    shadow: '#94a3b8',
    risk: '#ef4444',
    warn: '#f59e0b',
    gate: '#2563eb',
    safe: '#10b981',
    corpBg: '#ecfdf5',
    panel: '#ffffff'
  };

  function resize() {
    var parent = canvas.parentElement;
    if (!parent) return;
    cw = parent.clientWidth || 640;
    ch = parent.clientHeight || 480;
    canvas.width = cw;
    canvas.height = ch;
  }

  function rr(x, y, w, h, r, fill, stroke) {
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) {
      ctx.strokeStyle = stroke;
      ctx.lineWidth = 2;
      ctx.stroke();
    }
  }

  function gateX() { return cw * 0.48; }
  function corpX() { return cw * 0.72; }

  function ShadowLane() {
    rr(8, ch * 0.12, cw * 0.38, ch * 0.76, 12, 'rgba(148,163,184,0.12)', C.outline);
    ctx.fillStyle = '#64748b';
    ctx.font = '600 11px Inter, system-ui, sans-serif';
    ctx.fillText('Теневая зона', 20, ch * 0.2);
  }

  function PerimeterGateway(beam) {
    var gx = gateX() - 28;
    var gy = ch * 0.18;
    var gh = ch * 0.64;
    rr(gx, gy, 56, gh, 10, C.panel, C.outline);
    rr(gx + 8, gy + 12, 40, gh - 24, 6, '#eff6ff', C.gate);
    ctx.fillStyle = C.gate;
    ctx.font = '700 10px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('AI', gx + 28, gy + gh * 0.42);
    ctx.fillText('шлюз', gx + 28, gy + gh * 0.42 + 14);
    ctx.textAlign = 'left';
    var scanY = gy + 20 + (Math.sin(frame * 0.06) * 0.5 + 0.5) * (gh - 40);
    ctx.fillStyle = 'rgba(37,99,235,' + (0.25 + beam * 0.45) + ')';
    ctx.fillRect(gx + 4, scanY, 48, 4);
  }

  function CorporateBay() {
    var cx = corpX() - 20;
    var cy = ch * 0.14;
    var cw2 = cw - cx - 12;
    var ch2 = ch * 0.72;
    rr(cx, cy, cw2, ch2, 12, C.corpBg, C.safe);
    ctx.fillStyle = C.safe;
    ctx.font = '600 11px Inter, system-ui, sans-serif';
    ctx.fillText('Корп. контур', cx + 14, cy + 22);
    rr(cx + 14, cy + ch2 - 52, cw2 - 28, 36, 8, C.panel, C.safe);
    ctx.fillStyle = '#047857';
    ctx.font = '600 10px Inter, system-ui, sans-serif';
    ctx.fillText('Human-in-the-loop', cx + 22, cy + ch2 - 28);
  }

  function spawnPacket() {
    if (packets.length > 14) return;
    packets.push({
      x: 24 + Math.random() * (cw * 0.28),
      y: ch * 0.25 + Math.random() * (ch * 0.5),
      vx: 0.6 + Math.random() * 0.5,
      phase: 'shadow',
      label: Math.random() > 0.5 ? 'PII' : 'код',
      life: 0
    });
  }

  function drawPacket(p) {
    var col = p.phase === 'shadow' ? C.shadow : (p.phase === 'blocked' ? C.risk : (p.phase === 'scan' ? C.warn : C.safe));
    rr(p.x - 14, p.y - 10, 28, 20, 6, col, C.outline);
    ctx.fillStyle = '#fff';
    ctx.font = '700 8px Inter, system-ui, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText(p.label, p.x, p.y + 3);
    ctx.textAlign = 'left';
  }

  function tickPackets() {
    for (var i = packets.length - 1; i >= 0; i--) {
      var p = packets[i];
      p.life++;
      if (p.phase === 'shadow') {
        p.x += p.vx;
        if (p.x > gateX() - 40) {
          p.phase = 'scan';
          sparks.push({ x: gateX(), y: p.y, t: 0, ok: p.label !== 'PII' || Math.random() > 0.35 });
        }
      } else if (p.phase === 'scan') {
        p.x += 0.25;
        if (p.life % 18 === 0) {
          var approved = p.label !== 'PII' || Math.random() > 0.4;
          p.phase = approved ? 'corp' : 'blocked';
          if (!approved) p.vx = -1.2;
        }
      } else if (p.phase === 'corp') {
        p.x += 0.9;
        p.y += Math.sin(frame * 0.05 + i) * 0.15;
        if (p.x > cw - 40) packets.splice(i, 1);
      } else if (p.phase === 'blocked') {
        p.x += p.vx;
        p.y += Math.sin(frame * 0.08) * 0.3;
        if (p.x < 10) packets.splice(i, 1);
      }
      if (p.x > cw + 20) packets.splice(i, 1);
    }
  }

  function drawSparks() {
    for (var i = sparks.length - 1; i >= 0; i--) {
      var s = sparks[i];
      s.t++;
      ctx.beginPath();
      ctx.arc(s.x, s.y, 4 + s.t * 0.4, 0, Math.PI * 2);
      ctx.fillStyle = s.ok ? 'rgba(16,185,129,0.35)' : 'rgba(239,68,68,0.35)';
      ctx.fill();
      if (s.t > 12) sparks.splice(i, 1);
    }
  }

  function loop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ShadowLane();
    CorporateBay();
    var beam = (Math.sin(frame * 0.08) + 1) / 2;
    PerimeterGateway(beam);
    if (frame % 45 === 0) spawnPacket();
    tickPackets();
    for (var j = 0; j < packets.length; j++) drawPacket(packets[j]);
    drawSparks();
    requestAnimationFrame(loop);
  }

  window.addEventListener('resize', resize);
  resize();
  loop();
})();
</script>
</section>

<section class="ym-section ym-section-alt ym-cta-band" id="cta-safe-genai-audit" aria-labelledby="cta-safe-genai-audit-title">
  <div class="ym-container">
    <div class="ym-card reveal" style="max-width: 920px; margin: 0 auto; padding: clamp(32px, 5vw, 48px); text-align: center;">
      <p class="ym-section-subtitle" style="margin: 0 auto 12px; font-size: 13px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: var(--ym-accent);">Nero Network</p>
      <h3 id="cta-safe-genai-audit-title" style="font-size: clamp(22px, 3vw, 28px); font-weight: 800; margin: 0 0 16px; color: var(--ym-heading);">Уберите теневой ChatGPT — без утечек в публичные модели</h3>
      <p style="color: #64748b; line-height: 1.65; margin: 0 0 28px; max-width: 640px; margin-left: auto; margin-right: auto;">Поможем пройти путь за 90 дней: диагностика теневого ИИ, регламент зелёный/жёлтый/красный, пилот в Make/n8n/MCP с human-in-the-loop — по цифрам исследования УЦСБ и «Солар».</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="#cta-safe-genai-audit" target="_blank" rel="noopener noreferrer"><span>Обсудить безопасный контур</span></a>
      </div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="korporativnyy-kontur">
  <div class="ym-container ym-prose reveal">
    <h2>Корпоративный контур генеративного ИИ: on-prem, закрытые модели, AI-шлюзы</h2>
    <p><strong>Определение:</strong> <em>Корпоративный контур ии</em> — изолированная среда, где запросы к LLM проходят через <strong>ai шлюз</strong>, логируются и фильтруются DLP.</p>
    <h3 id="dlp-filtratsiya">DLP и фильтрация промптов/ответов</h3>
    <p>Вендоры <strong>AI Gateway</strong> закрывают маскирование ПДн и RBAC — но покупатель часто остаётся один с change management. Важно разделять <strong>продукт</strong>, <strong>процесс</strong> и <strong>внедрение под ключ</strong>.</p>
    <h3 id="razdelenie-sred">Разделение сред: dev / prod / персональные устройства</h3>
    <p><strong>prod</strong> — только утверждённые модели; <strong>dev</strong> — тестовые данные без ПДн; личные устройства — зона максимального риска.</p>
    <h3 id="fz152-komplaens">ФЗ-152, комплаенс и коммерческая тайна в эпоху genAI</h3>
    <p>Тема <strong>«фз 152 и нейросети»</strong> перестала быть только для госсектора. <strong>Итог:</strong> внедрение — одновременно ИТ-, ИБ- и HR/комплаенс-проект.</p>
  </div>
</section>

<section class="ym-section" id="politika-ii">
  <div class="ym-container ym-prose reveal">
    <h2>Политика использования ИИ и обучение сотрудников</h2>
    <h3 id="chto-razresheno">Что разрешено, что запрещено, куда эскалировать инцидент</h3>
    <table>
      <thead><tr><th>Уровень данных</th><th>Примеры</th><th>Разрешённые инструменты</th></tr></thead>
      <tbody>
        <tr><td><strong>Зелёный</strong></td><td>обезличенные FAQ</td><td>корпоративный чат, агенты в контуре</td></tr>
        <tr><td><strong>Жёлтый</strong></td><td>внутренние процессы без ПДн</td><td>только через ai шлюз</td></tr>
        <tr><td><strong>Красный</strong></td><td>ПДн, договоры, код</td><td>запрет публичных LLM; human-in-the-loop</td></tr>
      </tbody>
    </table>
    <h3 id="chek-list-hr">Чек-лист для HR, ИБ и руководителей</h3>
    <ol>
      <li>Есть ли утверждённая <strong>политика использования ии</strong>?</li>
      <li>Обучены ли сотрудники безопасной работе с ИИ?</li>
      <li>Есть ли <strong>законная альтернатива</strong> личному ChatGPT?</li>
      <li>Включён ли <strong>аудит промптов</strong> на корпоративном шлюзе?</li>
      <li>Назначены ли владельцы сценариев?</li>
      <li>Проведён ли пилот с метриками?</li>
      <li>Согласован ли roadmap с <strong>AI Security</strong>?</li>
    </ol>
    <h3 id="snizhenie-tenevogo-ii">Снижение теневого ИИ через понятные инструменты</h3>
    <p>Nero Network закрывает пробел обзоров: <strong>диагностика теневого ИИ → регламент → обучение → утверждённые агенты</strong> в Make/n8n/MCP вместо личного ChatGPT.</p>
    <aside class="ym-card reveal" style="margin: 32px 0; padding: clamp(24px, 4vw, 36px); border-left: 4px solid var(--ym-accent);" aria-labelledby="cta-training-title">
  <h3 id="cta-training-title" style="font-size: 20px; font-weight: 700; margin: 0 0 12px; color: var(--ym-heading);">Обучение сотрудников — снимаем барьер 35% «нехватка компетенций»</h3>
  <p style="color: #64748b; line-height: 1.6; margin: 0 0 20px;">Воркшопы по безопасным промптам, антипаттернам утечек и работе с утверждёнными инструментами — в связке с политикой ИИ, а не вместо неё.</p>
  <a class="ym-btn ym-btn-secondary" href="#cta-training-title" target="_blank" rel="noopener noreferrer"><span>Записаться на обучение</span></a>
</aside>
  </div>
</section>

<section class="ym-section ym-section-alt" id="human-in-the-loop">
  <div class="ym-container ym-prose reveal">
    <h2>Human-in-the-loop и гибридный режим: когда человек обязателен</h2>
    <h3 id="kritichnye-processy">Критичные процессы: финансы, юристы, персональные данные</h3>
    <p>Для договоров, финансов, ПДн, публикаций и <strong>исходного кода</strong> human-in-the-loop обязателен. Community Bank напоминает: material incident возможен без «взлома».</p>
    <h3 id="audit-promptov">Аудит промптов и логирование</h3>
    <p><strong>Аудит промптов</strong> — доказательная база для ИБ и комплаенса.</p>
    <h3 id="metriki-kachestva">Метрики качества и ответственности</h3>
    <ul>
      <li>доля запросов через корпоративный контур vs публичные сервисы;</li>
      <li>число инцидентов DLP;</li>
      <li>время цикла «черновик ИИ → approve»;</li>
      <li>удовлетворённость пользователей;</li>
      <li>экономический эффект по сценарию.</li>
    </ul>
  </div>
</section>

<section class="ym-section" id="prakticheskoe-vnedrenie">
  <div class="ym-container ym-prose reveal">
    <h2>Практическое внедрение: CRM, документооборот, агенты Make/n8n/MCP в контуре</h2>
    <h3 id="stsenarii-bez-utechek">Сценарии без утечек: закрытые API, корпоративные ключи</h3>
    <p>Черновики в CRM с approve, RAG в контуре, классификация обращений, агенты на Make/n8n с LLM только через корпоративный endpoint.</p>
    <h3 id="roadmap-90-dney">От пилота к масштабу: roadmap на 90 дней</h3>
    <table>
      <thead><tr><th>Фаза</th><th>Срок</th><th>Действия</th></tr></thead>
      <tbody>
        <tr><td><strong>Диагностика</strong></td><td>недели 1–2</td><td>интервью ИБ/ИТ; оценка теневого трафика</td></tr>
        <tr><td><strong>Регламент</strong></td><td>недели 3–4</td><td>зелёный/жёлтый/красный; политика</td></tr>
        <tr><td><strong>Обучение</strong></td><td>недели 5–6</td><td>воркшопы; антипаттерны промптов</td></tr>
        <tr><td><strong>Пилот</strong></td><td>недели 7–10</td><td>1–2 сценария в Make/n8n/MCP</td></tr>
        <tr><td><strong>Масштаб</strong></td><td>недели 11–13</td><td>второй отдел; интеграция CRM</td></tr>
      </tbody>
    </table>
    <h3 id="chem-otlichaetsya-nero">Чем Nero Network отличается от «ещё одного чат-бота»</h3>
    <p>Nero Network проектирует <strong>корпоративный контур</strong>, внедряет <strong>автоматизацию make n8n mcp без утечек</strong> и оставляет <strong>human-in-the-loop</strong> там, где это требуют ИБ.</p>
    <p><strong>Итог блока:</strong> безопасное внедрение — мост между цифрами ComNews и ежедневной работой команды.</p>
  </div>
</section>

<section class="ym-section ym-cta-band" id="cta-roadmap" aria-labelledby="cta-roadmap-title">
  <div class="ym-container">
    <div class="ym-bento-card ym-bento-wide reveal" style="padding: clamp(32px, 5vw, 48px); text-align: center;">
      <h3 id="cta-roadmap-title" style="font-size: clamp(22px, 3vw, 28px); font-weight: 800; margin: 0 0 12px; color: var(--ym-heading);">Готовы к пилоту в закрытом контуре?</h3>
      <p style="color: #64748b; line-height: 1.65; margin: 0 0 24px; max-width: 680px; margin-left: auto; margin-right: auto;">Обсудим один сценарий (CRM, документооборот, поддержка) с метриками ROI и контролем ИБ — без «ещё одного чат-бота на сайте».</p>
      <div class="ym-btn-group">
        <a class="ym-btn ym-btn-primary" href="#cta-safe-genai-audit" target="_blank" rel="noopener noreferrer"><span>Обсудить безопасный контур</span></a>
      </div>
    </div>
  </div>
</section>

<section class="ym-section ym-section-alt" id="faq-bezopasnoe-vnedrenie">
  <div class="ym-container">
    <h2 class="ym-section-title reveal">FAQ по безопасному внедрению генеративного ИИ</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar reveal-left">
        <h3 style="margin-top:0;">Вопросы</h3>
        <ul class="ym-faq-list">
          <li><a href="#faq-chatgpt">ChatGPT для работы?</a></li>
          <li><a href="#faq-onprem">Нужен ли on-prem?</a></li>
          <li><a href="#faq-roi">Как измерить ROI?</a></li>
          <li><a href="#faq-dogovor">Договор с LLM</a></li>
          <li><a href="#faq-start">С чего начать?</a></li>
        </ul>
      </aside>
      <div class="ym-faq-content">
        <article class="ym-faq-item reveal" id="faq-chatgpt">
          <h3>Можно ли использовать ChatGPT для рабочих задач?</h3>
          <p>Для зелёных данных — только если разрешено политикой. Для жёлтых и красных — через корпоративный ии или ai шлюз.</p>
        </article>
        <article class="ym-faq-item reveal delay-100" id="faq-onprem">
          <h3>Нужен ли on-prem для всех компаний?</h3>
          <p>Нет. Многим достаточно гибрида: корпоративное облако + шлюз + DLP + human in the loop.</p>
        </article>
        <article class="ym-faq-item reveal delay-200" id="faq-roi">
          <h3>Как измерить ROI при ограничениях ИБ?</h3>
          <p>Считайте пилот по одному процессу: время, доля автоматизации с approve, отсутствие инцидентов DLP.</p>
        </article>
        <article class="ym-faq-item reveal delay-300" id="faq-dogovor">
          <h3>Что проверить в договоре с поставщиком LLM?</h3>
          <p>Обучение на промптах, регион данных (ФЗ-152), SLA, защита от промпт-инъекций, private endpoint.</p>
        </article>
        <article class="ym-faq-item reveal delay-400" id="faq-start">
          <h3>С чего начать, если ИБ блокирует любой genAI?</h3>
          <p>Диагностика теневого ИИ → политика + обучение + один пилот в закрытом контуре.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="ym-section" id="zaklyuchenie">
  <div class="ym-container ym-prose reveal">
    <h2>Заключение</h2>
    <p>Опрос <strong>УЦСБ × «Солар»</strong> (102 компании, ComNews, <strong>03.06.2026</strong>) показывает: genAI уже частично здесь, но внедрение тормозят страх утечек (<strong>42,5%</strong>), нехватка навыков (<strong>35%</strong>) и отсутствие сценариев (<strong>32,5%</strong>).</p>
    <p>Выход — <strong>корпоративный контур</strong>, <strong>политика</strong>, <strong>обучение</strong>, <strong>human-in-the-loop</strong> и агенты в Make/n8n/MCP. Nero Network помогает пройти путь за <strong>90 дней</strong>.</p>
    <p><strong>Источники:</strong>
      <a href="https://www.comnews.ru/content/245648/2026-06-03/2026-w23/1010/risk-utechki-dannykh-stal-glavnym-barerom-dlya-vnedreniya-generativnogo-ii-biznese" target="_blank" rel="noopener noreferrer">ComNews</a> ·
      <a href="https://www.cnews.ru/news/top/2026-02-04_sotrudniki_rossijskih_kompanij" target="_blank" rel="noopener noreferrer">CNews</a> ·
      <a href="https://ics-consulting.ru/2026/04/07/bans_dont_work/" target="_blank" rel="noopener noreferrer">ICS Consulting</a>
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
  "@graph": [
    {
      "@type": "Article",
      "headline": "Генеративный ИИ в бизнесе без утечек: безопасное внедрение",
      "description": "42,5% компаний боятся утечек при genAI. Исследование УЦСБ и «Солар»: контур, политики, AI-шлюзы, human-in-the-loop — как внедрить без теневого ИИ.",
      "datePublished": "2026-06-03",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "mainEntityOfPage": ""
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "Можно ли использовать ChatGPT для рабочих задач?", "acceptedAnswer": { "@type": "Answer", "text": "Для зелёных данных — только по политике; для жёлтых и красных — через корпоративный контур или AI-шлюз." }},
        { "@type": "Question", "name": "Нужен ли on-prem для всех компаний?", "acceptedAnswer": { "@type": "Answer", "text": "Нет; часто достаточно гибрида: корпоративное облако, шлюз, DLP и human-in-the-loop." }},
        { "@type": "Question", "name": "Как измерить ROI при ограничениях ИБ?", "acceptedAnswer": { "@type": "Answer", "text": "Пилот по одному процессу: время, доля автоматизации с approve, отсутствие инцидентов DLP." }}
      ]
    }
  ]
}
</script>

<?php get_footer(); ?>
