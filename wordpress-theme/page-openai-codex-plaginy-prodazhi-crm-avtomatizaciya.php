<?php
/**
 * Template Name: OpenAI Codex плагины продажи CRM
 */
$page_seo_title = 'OpenAI Codex для продаж и CRM: плагины Sites — гайд 2026';
$page_seo_description = 'Плагины Codex для продаж и CRM: Salesforce, HubSpot, amoCRM. Как SMB автоматизирует сделки через Make, n8n и MCP без разработчиков — разбор релиза 2 июня 2026.';

$nero_primary_cta_url = '%%NERO_PRIMARY_CTA_URL%%';
$nero_primary_cta_label = '%%NERO_PRIMARY_CTA_LABEL%%';
$nero_secondary_cta_url = '%%NERO_SECONDARY_CTA_URL%%';
$nero_secondary_cta_label = '%%NERO_SECONDARY_CTA_LABEL%%';

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
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page {
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

.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h1,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h2,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h3,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h4,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h5,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page p,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page li,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page strong,
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page pre, .openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page code {
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

/* Breadcrumbs hide + hero-first reset */
.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
#codex-crm-hero.codex-crm-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.openai-codex-intro-section { padding: 72px 0 40px; }
.openai-codex-intro-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 32px;
  align-items: start;
}
@media (min-width: 900px) {
  .openai-codex-intro-grid { grid-template-columns: 1.15fr 0.85fr; }
}
.openai-codex-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.openai-codex-intro-text p { text-align: left !important; }
.openai-codex-intro-lead { font-size: 18px; line-height: 1.65; margin: 0; }
.openai-codex-intro-chips {
  display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px;
}
.openai-codex-chip {
  font-size: 12px; font-weight: 600; padding: 6px 12px;
  border-radius: 999px; background: #fff; border: 1px solid var(--ym-border);
}
.ym-h3 { font-size: 24px; font-weight: 700; margin: 40px 0 16px; text-align: left; }
.ym-lead-box { font-size: 17px; line-height: 1.6; padding: 16px 20px; background: #fff; border-radius: 12px; border: 1px solid var(--ym-border); }
.ym-definition { border-left: 4px solid var(--ym-accent); }
.ym-table-wrap { overflow-x: auto; margin: 24px 0; }
.ym-table { width: 100%; border-collapse: collapse; font-size: 14px; }
.ym-table th, .ym-table td { border: 1px solid var(--ym-border); padding: 12px 14px; text-align: left; }
.ym-table th { background: #f1f5f9; font-weight: 700; }
.ym-cta-block { margin: 48px 0; }
.{PAGE_CLASS} a:not(.ym-btn) {{ color: var(--ym-accent); }}

</style>

<main id="primary" class="site-main openai-codex-plaginy-prodazhi-crm-avtomatizaciya-page" role="main" tabindex="-1">
<section id="codex-crm-hero" class="codex-crm-hero fullscreen-white-office" aria-labelledby="codex-crm-h1">
<style>
.codex-crm-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.codex-crm-hero canvas#codex-crm-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.codex-crm-hero .codex-hero-ui { position: relative; z-index: 3; pointer-events: none; }
.codex-crm-hero .codex-hero-ui a { pointer-events: auto; }
.codex-crm-hero .vl-ui-pill {
  position: absolute;
  top: clamp(16px, 3vh, 40px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  z-index: 3;
  max-width: 96vw;
}
.codex-crm-hero .vl-ui-pill span {
  padding: 10px 18px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.codex-crm-hero .vl-ui-tasks {
  position: absolute;
  left: clamp(16px, 3vw, 48px);
  top: clamp(100px, 16vh, 200px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 3;
}
.codex-crm-hero .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 18px;
  background: rgba(255,255,255,0.92);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 14px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 12px rgba(0,0,0,0.06);
}
.codex-crm-hero .vl-ui-task span {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #0ea5e9, #8b5cf6);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 800;
  flex-shrink: 0;
}
.codex-crm-hero .codex-hero-copy {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 3;
}
.codex-crm-hero .giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -2px;
  color: #0f172a;
  margin: 0;
}
.codex-crm-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0284c7, #7c3aed);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.codex-crm-hero .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 16px;
  max-width: 620px;
}
.codex-crm-hero .telegram-button {
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
.codex-crm-hero .telegram-button:hover { transform: translateY(-2px); }
@media (max-width: 900px) {
  .codex-crm-hero .vl-ui-tasks { display: none; }
  .codex-crm-hero .codex-hero-copy { bottom: 16px; }
}
</style>

<canvas id="codex-crm-hero-canvas" aria-hidden="true"></canvas>

<div class="codex-hero-ui">
  <div class="vl-ui-pill" role="list" aria-label="Метрики Codex">
    <span role="listitem">62 apps</span>
    <span role="listitem">110 skills</span>
    <span role="listitem">Human-in-the-loop</span>
    <span role="listitem">amoCRM / Bitrix24</span>
  </div>
  <div class="vl-ui-tasks" role="list" aria-label="Этапы воронки">
    <div class="vl-ui-task" role="listitem"><span>1</span> Плагин Sales</div>
    <div class="vl-ui-task" role="listitem"><span>2</span> CRM sync</div>
    <div class="vl-ui-task" role="listitem"><span>3</span> MCP-коннектор</div>
    <div class="vl-ui-task" role="listitem"><span>4</span> Sites для РОПа</div>
    <div class="vl-ui-task" role="listitem"><span>5</span> Approval → Telegram</div>
  </div>
  <div class="codex-hero-copy">
    <h1 id="codex-crm-h1" class="giant-seo">
      OpenAI Codex: плагины для продаж и CRM
      <span>как повторить автоматизацию в своём бизнесе</span>
    </h1>
    <p class="giant-seo-sub">Ролевые AI-плагины, интеграции с CRM и внутренние «Sites» без команды разработчиков — разбор релиза 2 июня 2026 и сценарии внедрения под ключ</p>
    <a class="telegram-button" href="#ym-cta-primary-title">Заявка на аудит воронки</a>
  </div>
</div>
</section>

<script>
(function codexCrmHeroEngine() {
  const canvas = document.getElementById("codex-crm-hero-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;
  const CYCLE = 240;

  function resizeCanvas() {
    const parent = canvas.parentElement;
    if (!parent) return;
    canvas.width = parent.clientWidth || window.innerWidth;
    canvas.height = parent.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw * 0.52;
    cy = ch * 0.42;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 750) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    hubBg: "#ffffff",
    hubBorder: "#cbd5e1",
    arc: "#94a3b8",
    cardLead: "#bae6fd",
    cardWarm: "#fde68a",
    cardWon: "#86efac",
    mcp: "#8b5cf6",
    risk: "#ef4444",
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

  class DealPipelineArc {
    constructor() {
      this.cards = [
        { t: 0, type: "lead" },
        { t: 0.35, type: "warm" },
        { t: 0.7, type: "won" }
      ];
    }
    pointOnArc(t) {
      const a = Math.PI * 0.15 + t * Math.PI * 0.7;
      const r = 220;
      return { x: Math.cos(a) * r - 80, y: Math.sin(a) * r + 90 };
    }
    draw(ctx) {
      ctx.lineWidth = 3;
      ctx.strokeStyle = C.arc;
      ctx.setLineDash([8, 10]);
      ctx.beginPath();
      for (let i = 0; i <= 40; i++) {
        const p = this.pointOnArc(i / 40);
        if (i === 0) ctx.moveTo(p.x, p.y);
        else ctx.lineTo(p.x, p.y);
      }
      ctx.stroke();
      ctx.setLineDash([]);
      const flow = (frame * 0.008) % 1;
      this.cards.forEach((card, idx) => {
        const tt = (card.t + flow + idx * 0.12) % 1;
        const p = this.pointOnArc(tt);
        const col = card.type === "lead" ? C.cardLead : card.type === "warm" ? C.cardWarm : C.cardWon;
        drawPolyRound(ctx, p.x - 14, p.y - 10, 28, 20, 4, col, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(card.type === "won" ? "✓" : "CRM", p.x, p.y + 3);
      });
    }
  }

  class McpConnectorNode {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.angle = 0;
    }
    draw(ctx) {
      this.angle += 0.02;
      ctx.strokeStyle = C.mcp;
      ctx.lineWidth = 2;
      for (let i = 0; i < 3; i++) {
        const a = this.angle + (i * Math.PI * 2) / 3;
        const ox = Math.cos(a) * 28;
        const oy = Math.sin(a) * 18;
        ctx.beginPath();
        ctx.moveTo(this.x, this.y);
        ctx.lineTo(this.x + ox, this.y + oy);
        ctx.stroke();
        ctx.fillStyle = C.mcp;
        ctx.beginPath();
        ctx.arc(this.x + ox, this.y + oy, 5, 0, Math.PI * 2);
        ctx.fill();
      }
      drawPolyRound(ctx, this.x - 16, this.y - 12, 32, 24, 6, "#f5f3ff", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP", this.x, this.y + 3);
    }
  }

  class PluginRoleBadge {
    constructor(x, y, label, color) {
      this.x = x;
      this.y = y;
      this.label = label;
      this.color = color;
      this.pulse = Math.random() * 100;
    }
    draw(ctx) {
      this.pulse += 0.04;
      const bob = Math.sin(this.pulse) * 2;
      drawPolyRound(ctx, this.x - 22, this.y - 10 + bob, 44, 20, 8, this.color, C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.label, this.x, this.y + 4 + bob);
    }
  }

  class SitesMiniPanel {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.alpha = 0;
    }
    draw(ctx, phase) {
      if (phase < 150) {
        this.alpha = 0;
        return;
      }
      this.alpha = Math.min(1, (phase - 150) / 30);
      ctx.globalAlpha = this.alpha;
      drawPolyRound(ctx, this.x, this.y, 70, 48, 6, "#ecfeff", C.outline);
      drawPolyRound(ctx, this.x + 6, this.y + 8, 58, 10, 2, "#cffafe", null);
      drawPolyRound(ctx, this.x + 6, this.y + 22, 40, 6, 1, "#94a3b8", null);
      drawPolyRound(ctx, this.x + 6, this.y + 32, 50, 6, 1, "#94a3b8", null);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "left";
      ctx.fillText("Sites KPI", this.x + 8, this.y + 42);
      ctx.globalAlpha = 1;
    }
  }

  class RiskDealFlag {
    constructor() {
      this.show = false;
    }
    draw(ctx, phase) {
      this.show = phase > 90 && phase < 200;
      if (!this.show) return;
      const wobble = Math.sin(frame * 0.15) * 3;
      ctx.fillStyle = C.risk;
      ctx.beginPath();
      ctx.moveTo(120 + wobble, -120);
      ctx.lineTo(132 + wobble, -95);
      ctx.lineTo(108 + wobble, -95);
      ctx.fill();
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.stroke();
      ctx.fillStyle = "#fff";
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("!", 120 + wobble, -102);
    }
  }

  class CrmOrchestratorHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.closePulse = 0;
    }
    draw(ctx) {
      const phase = (frame * 0.04) % CYCLE;
      drawPolyRound(ctx, this.x - 90, this.y - 70, 180, 140, 12, C.hubBg, C.outline);
      const stages = ["Лид", "Квалиф.", "CRM", "Sites", "Закрыто"];
      stages.forEach((label, i) => {
        const fill = phase > 40 + i * 35 ? (i === 4 && phase > 210 ? C.cardWon : "#e0f2fe") : "#f1f5f9";
        drawPolyRound(ctx, this.x - 75 + i * 32, this.y - 50, 28, 36, 4, fill, C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "6px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(label, this.x - 61 + i * 32, this.y - 28);
      });
      if (phase > 210) {
        this.closePulse = (this.closePulse + 0.08) % (Math.PI * 2);
        const r = 50 + Math.sin(this.closePulse) * 6;
        ctx.strokeStyle = C.agentGreen;
        ctx.lineWidth = 3;
        ctx.globalAlpha = 0.5 + Math.sin(this.closePulse) * 0.3;
        ctx.beginPath();
        ctx.arc(this.x, this.y + 20, r, 0, Math.PI * 2);
        ctx.stroke();
        ctx.globalAlpha = 1;
        if (phase > 212 && phase < 213) {
          createBubble(this.x, this.y - 90, "Сделка в CRM ✓", 280);
        }
      }
      return phase;
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
      const prg = (frame * 0.04) % CYCLE;
      const targetX = 20;
      const targetY = -20 + this.stepTrig * 0.15;
      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const local = prg - this.stepTrig;
        if (local < 12) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          const t = local / 12;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (local < 18) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          const t = (local - 18) / 10;
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
      let bob = Math.abs(Math.sin(this.timer * 3)) * 2;
      if (!isMoving) bob = Math.sin(this.timer * 1.5);
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
      } else if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.fillRect(hx - 8, hy - 14, 16, 10);
      }
      ctx.restore();
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const pipeline = new DealPipelineArc();
  const hub = new CrmOrchestratorHub(30, -30);
  const sitesPanel = new SitesMiniPanel(95, -55);
  const riskFlag = new RiskDealFlag();
  entities.push(pipeline);
  entities.push(new McpConnectorNode(-200, -60));
  entities.push(new PluginRoleBadge(-240, 40, "Sales", "#bae6fd"));
  entities.push(new PluginRoleBadge(-180, 80, "Data", "#ddd6fe"));
  entities.push(hub);
  entities.push(
    new Agent(-280, 70, C.agentYellow, "1_architect", 18, [
      "Сценарий воронки…",
      "Книга продаж в CRM",
      "Плагин Sales подключён"
    ])
  );
  entities.push(
    new Agent(-150, 120, C.agentGreen, "2_seo", 58, [
      "Приоритетные аккаунты",
      "Риск сделки: высокий",
      "Сигнал в воронке"
    ])
  );
  entities.push(
    new Agent(-40, 30, C.agentBlue, "3_coder", 98, [
      "MCP → amoCRM API",
      "Webhook Bitrix24",
      "Human-in-the-loop"
    ])
  );
  entities.push(
    new Agent(60, 110, C.agentPink, "4_designer", 138, [
      "Sites: KPI РОПа",
      "Дашборд без dev",
      "Preview 2 июня"
    ])
  );
  entities.push(
    new Agent(110, 20, C.agentPurple, "5_deployer", 178, [
      "Жду approval…",
      "Пуш в Telegram",
      "Follow-up черновик"
    ])
  );

  function createBubble(x, y, text, customLife) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    const prg = (frame * 0.04) % CYCLE;
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    pipeline.draw(ctx);
    entities.forEach((ent) => {
      if (ent instanceof CrmOrchestratorHub) {
        const phase = ent.draw(ctx);
        sitesPanel.draw(ctx, phase);
        riskFlag.draw(ctx, phase);
      } else if (!(ent instanceof DealPipelineArc)) {
        ent.draw(ctx);
      }
    });
    if (prg >= 20 && prg < 20.05) createBubble(-280, 40, "1. Лид из Telegram");
    if (prg >= 60 && prg < 60.05) createBubble(-150, 90, "2. CRM sync");
    if (prg >= 100 && prg < 100.05) createBubble(-40, 10, "3. MCP-коннектор");
    if (prg >= 140 && prg < 140.05) createBubble(60, 90, "4. Sites KPI");
    if (prg >= 180 && prg < 180.05) createBubble(110, 0, "5. Approval");
    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
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
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(engineloop);
  else engineloop();
})();
</script>
<section class="ym-section openai-codex-intro-section" id="intro">
  <div class="ym-container">
    <div class="openai-codex-intro-grid reveal">
      <div class="openai-codex-intro-text">
        <p class="openai-codex-intro-lead"><strong>Коротко:</strong> 2 июня 2026 OpenAI вынесла Codex в продажи, аналитику и маркетинг — шесть ролевых плагинов, 62 приложения, 110 skills и preview Sites. Для российского SMB прямой доступ к sales plugin с amoCRM и Bitrix24 недоступен, но <strong>автоматизацию продаж нейросетью</strong> и <strong>нейросеть для CRM</strong> можно собрать на Make, n8n, MCP и API российских CRM — под ключ или пилотом за 2–4 недели.</p>
      </div>
      <div class="openai-codex-intro-deco" aria-hidden="true">
        <div class="ym-mac-window openai-codex-intro-terminal">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">codex-sales-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <div><span class="ym-command">$</span> lead.telegram → crm.webhook</div>
            <div><span class="ym-command">$</span> llm.brief --hitl --152fz-min-pdn</div>
            <div><span class="ym-comment"># 62 apps · 110 skills · Sites preview</span></div>
          </div>
        </div>
        <div class="openai-codex-intro-chips">
          <span class="openai-codex-chip">5M+ WAU Codex</span>
          <span class="openai-codex-chip">20% non-dev</span>
          <span class="openai-codex-chip">Make / n8n</span>
        </div>
      </div>
    </div>
    <nav class="ym-toc reveal delay-100" aria-label="Оглавление">
      <a href="#codex-2026">Релиз 2 июня</a>
      <a href="#sales-plugin">Плагин Sales</a>
      <a href="#crm-messengers">CRM и мессенджеры</a>
      <a href="#boris-rf-sales-pipeline">Пайплайн РФ</a>
      <a href="#smb-without-enterprise">SMB без Enterprise</a>
      <a href="#implementation-scenarios">Сценарии</a>
      <a href="#limitations-152fz">152-ФЗ</a>
      <a href="#implementation-plan">План внедрения</a>
      <a href="#faq">FAQ</a>
    </nav>
  </div>
</section><section class="ym-section reveal" id="codex-2026">
  <div class="ym-container">
    <h2 class="ym-section-title">Что изменилось в Codex 2 июня 2026</h2>
    <p class="ym-lead-box reveal ym-definition"><strong>Определение:</strong> Codex — агентная среда OpenAI для задач с кодом, документами и интеграциями; релиз 2 июня 2026 добавил <strong>ролевые плагины</strong>, <strong>Annotations</strong> (точечные правки в документах, таблицах, слайдах и на сайтах) и <strong>Sites</strong> — hosted-приложения по URL внутри workspace (<a href="https://openai.com/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">канонический релиз OpenAI</a>, <a href="https://openai.com/ru-RU/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">русская версия</a>).</p>
    <p class="reveal">По данным OpenAI на дату релиза, Codex используют <strong>более 5 млн</strong> человек еженедельно; около <strong>20%</strong> аудитории — не разработчики (аналитики, маркетинг, продажи, дизайн, исследования, финансы), и эта группа растёт <strong>более чем в 3 раза быстрее</strong>, чем разработчики. TechCrunch отмечает <strong>более чем 6-кратный</strong> рост с февраля 2026 после desktop-приложения (<a href="https://techcrunch.com/2026/06/02/openai-launches-new-codex-tools-for-white-collar-work/" rel="noopener noreferrer">TechCrunch</a>).</p>
    <p class="reveal">Для владельца бизнеса и РОПа это сигнал: <strong>AI агенты для бизнеса</strong> перестают быть «игрушкой IT» и становятся слоем над CRM, почтой и мессенджерами — без найма отдельной команды фронтенда.</p>
    <h3 class="ym-h3 reveal" id="шесть-ролевых-плагинов-и-62-приложения">Шесть ролевых плагинов и 62 приложения</h3>
    <p class="reveal">OpenAI представила <strong>шесть role-specific плагинов</strong>, которые в сумме объединяют <strong>62 приложения</strong> и <strong>110 skills</strong> (готовых сценариев). Установка — через <strong>Codex plugin directory</strong>; в тарифах Business и Enterprise администраторы управляют правами приложений в настройках workspace (<a href="https://openai.com/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">OpenAI</a>).</p>
    <div class="ym-table-wrap reveal"><table class="ym-table"><tr><th>Плагин</th><th>Интеграции (из релиза)</th><th>Зачем отделу продаж</th></tr><tr><td><strong>Sales</strong></td><td>Salesforce, HubSpot, Slack, Outreach, Clay, Rox, Actively</td><td>Воронка, встречи, follow-up, риск сделки</td></tr><tr><td><strong>Data analytics</strong></td><td>Snowflake, Databricks Genie, Hex, Tableau</td><td>Отчёты и сигналы по данным</td></tr><tr><td><strong>Creative production</strong></td><td>Figma, Canva, Shutterstock, Picsart, Fal</td><td>Материалы к сделкам</td></tr><tr><td><strong>Product design</strong></td><td>прототипы, UX, коннектор <strong>Sites</strong></td><td>Внутренние интерфейсы</td></tr><tr><td><strong>Public equity investing</strong></td><td>Moody’s, FactSet, PitchBook и др.</td><td>Финансовый контекст (не SMB)</td></tr><tr><td><strong>Investment banking</strong></td><td>pitch materials, comps, diligence</td><td>Корпоративные сделки (не SMB)</td></tr></table></div>
    <p class="reveal">В roadmap OpenAI названы Corporate Finance, Private Equity, <strong>Marketing Strategy</strong>, Strategy Consulting, <strong>Legal</strong> — экосистема расширяется для партнёров в Codex и ChatGPT.</p>
    <p class="reveal">Репозиторий <a href="https://github.com/openai/role-based-plugins" rel="noopener noreferrer">openai/role-based-plugins</a> подчёркивает: плагины <strong>требуют кастомизации</strong> — placeholder connector IDs (в том числе Salesforce/Agentforce и Sites) нужно заменить на ID вашего workspace перед установкой.</p>
    <p class="reveal"><strong>Итог по плагинам:</strong> для запросов вроде «<strong>codex плагины продажи</strong>» и «<strong>Codex OpenAI для бизнеса</strong>» важно понимать: это не одна кнопка «включить CRM», а каталог коннекторов под западный enterprise-стек. Российские amoCRM, Bitrix24, Telegram и 1С в официальном sales plugin <strong>отсутствуют</strong> (<a href="https://github.com/openai/role-based-plugins/tree/main/plugins/sales" rel="noopener noreferrer">GitHub sales plugin</a>).</p>
    <h3 class="ym-h3 reveal" id="sites-внутренние-workspace-без-фронтенд-команды">Sites — внутренние workspace без фронтенд-команды</h3>
    <p class="reveal"><strong>Sites</strong> (preview) — интерактивные hosted-приложения с URL внутри workspace Codex. Доступны на <strong>Business</strong> и <strong>Enterprise</strong>: на Business Sites <strong>включены по умолчанию</strong>, на Enterprise — через <strong>RBAC</strong> в admin settings. Хостинг — у OpenAI; деплой совместим с <strong>Cloudflare Worker-compatible ES modules</strong>; типичный цикл: <strong>save version</strong> → <strong>deploy</strong>; доступ настраивается для owner/admins, всего workspace или custom groups (<a href="https://developers.openai.com/codex/sites" rel="noopener noreferrer">Sites docs</a>).</p>
    <p class="reveal">Партнёры раннего этапа: Wix, Base44, Replit, Lovable, Figma, Webflow, Emergent; в англоязычном релизе также указан <strong>Vercel</strong> — в русской версии релиза Vercel в списке нет (<a href="https://openai.com/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">OpenAI EN</a> vs <a href="https://openai.com/ru-RU/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">RU</a>).</p>
    <p class="reveal">VentureBeat формулирует позицию: Codex с плагинами и Sites — <strong>«orchestration layer above existing enterprise tools»</strong>, а не замена CRM (<a href="https://venturebeat.com/orchestration/openais-codex-update-lets-agents-build-interactive-enterprise-workspaces-via-sites-and-role-specific-plugins" rel="noopener noreferrer">VentureBeat</a>). Для SMB в РФ аналог «<strong>codex sites внутренние приложения</strong>» чаще — Metabase, отчёты Bitrix24 или self-hosted dashboard + n8n, если нет Business OpenAI в нужном регионе.</p>
    <p class="reveal"><strong>Кейсы из релиза:</strong> Zapier связывает Slack, Google Docs и Coda для postmortems, incident response и feature tickets; NVIDIA ускоряет research workflows — на блоге NVIDIA указано <strong>более 10 000</strong> сотрудников на Codex (GPT-5.5 на GB200), cloud VM sandbox, zero-data retention, read-only к прод-системам (<a href="https://blogs.nvidia.com/blog/openai-codex-gpt-5-5-ai-agents/" rel="noopener noreferrer">NVIDIA Blog</a>).</p>
  </div>
</section><section class="ym-section ym-section-alt reveal" id="sales-plugin">
  <div class="ym-container">
    <h2 class="ym-section-title">Плагин для продаж: сценарии из релиза</h2>
    <p class="ym-lead-box reveal ym-definition"><strong>Определение:</strong> Sales plugin Codex — набор skills поверх Salesforce, HubSpot, Slack, Outreach, Clay, Rox и Actively: приоритетные аккаунты, подготовка к встречам, follow-up, обновление CRM, close plans и сделки «под риском» (<a href="https://openai.com/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">OpenAI</a>).</p>
    <p class="reveal">Это прямой ответ на запрос <strong>«AI помощник отдела продаж»</strong> и <strong>«ии помощник для отдела продаж»</strong> в enterprise-сегменте. Denise Dresser, CRO OpenAI, в контексте релиза (цитата через TechCrunch): <em>«AI is becoming capable of doing increasingly meaningful work inside organizations. The challenge now is helping companies integrate these systems into the infrastructure and workflows that power their businesses.»</em> (<a href="https://techcrunch.com/2026/06/02/openai-launches-new-codex-tools-for-white-collar-work/" rel="noopener noreferrer">TechCrunch</a>)</p>
    <p class="reveal">В обзорах партнёров подчёркивается <strong>human-in-the-loop</strong>: агент <strong>не меняет CRM и не отправляет письма без подтверждения</strong> (<a href="https://www.rbc.ua/rus/news/openai-onovlyue-codex-biznes-zavdannya-teper-1779699038.html" rel="noopener noreferrer">RBC.ua</a>, <a href="https://composio.dev/learning/best-apps-for-codex-sales-teams" rel="noopener noreferrer">Composio</a>). Для РОПа это критично: <strong>автоматизация отдела продаж</strong> не равна «боту, который сам закрывает сделки».</p>
    <h3 class="ym-h3 reveal" id="приоритетные-аккаунты-и-сигналы-в-воронке">Приоритетные аккаунты и сигналы в воронке</h3>
    <p class="reveal">Sales plugin собирает сигналы из CRM и коммуникаций, чтобы менеджер видел, какие аккаунты требуют внимания сегодня. В российском контуре тот же интент закрывают: webhook amoCRM или Bitrix24 → <strong>n8n</strong> / <strong>Make</strong> → LLM (GPT, Claude, YandexGPT) → задача в CRM и уведомление в Telegram РОПу (<a href="https://neyroforge.ru/integraciya-crm-s-ii/" rel="noopener noreferrer">neyroforge.ru</a>).</p>
    <p class="reveal"><strong>Коротко:</strong> приоритизация = правила в CRM + внешний «цифровой сотрудник», который читает поля сделки и историю касаний, а не магия одного плагина из коробки.</p>
    <h3 class="ym-h3 reveal" id="follow-up-и-обновление-карточек-клиента">Follow-up и обновление карточек клиента</h3>
    <p class="reveal">После встречи или звонка Codex в западном стеке может предложить follow-up и обновить карточку в Salesforce/HubSpot. В РФ: Bitrix24 CoPilot, речевая аналитика, Make + транскрипция (Whisper или аналог) → черновик письма и поля сделки — менеджер подтверждает отправку (<a href="https://neyroforge.ru/integraciya-crm-s-ii/" rel="noopener noreferrer">neyroforge.ru</a>). Запросы <strong>«follow-up письмо нейросеть»</strong> и <strong>«подготовка к встрече с клиентом crm»</strong> закрываются одним пайплайном: контекст из CRM + запись разговора + шаблон книги продаж.</p>
    <h3 class="ym-h3 reveal" id="планы-закрытия-и-review-рискованных-сделок">Планы закрытия и review рискованных сделок</h3>
    <p class="reveal">В релизе явно названы <strong>close plans</strong> и анализ сделок <strong>«под риском»</strong> — агент сопоставляет стадию, сроки и активность с паттернами успешных сделок. Аналог без Codex: скоринг по правилам + LLM-комментарий «почему сделка зависла» в поле CRM; для <strong>«скоринг сделок нейросеть»</strong> и <strong>«сделка под риском анализ crm»</strong> достаточно 1–2 недель пилота на одной воронке.</p>
    <div class="ym-table-wrap reveal"><table class="ym-table"><tr><th>Сценарий Codex (Sales)</th><th>Аналог для amoCRM / Bitrix24</th><th>Ориентир срока</th></tr><tr><td>Бриф к встрече</td><td>Webhook + n8n + GPT → заметка в карточку</td><td>3–7 дней</td></tr><tr><td>Follow-up после Zoom</td><td>CoPilot / Make + транскрипция</td><td>5–10 дней</td></tr><tr><td>Риск сделки</td><td>Скоринг + LLM в поле «комментарий РОПу»</td><td>1–2 недели</td></tr><tr><td>Дашборд воронки</td><td>Sites (если есть Business) или Metabase / отчёт CRM</td><td>1 день – 4 недели</td></tr></table></div>
  </div>
</section><section class="ym-section reveal" id="crm-messengers">
  <div class="ym-container">
    <h2 class="ym-section-title">CRM и мессенджеры: Salesforce, HubSpot и российский контекст</h2>
    <p class="ym-lead-box reveal ym-definition"><strong>Определение:</strong> <strong>автоматизация CRM</strong> в 2026 году — это связка «CRM как источник правды + мессенджеры как канал касания + AI-слой для черновиков и аналитики», а не замена менеджера.</p>
    <p class="reveal">Sales plugin Codex заточен под <strong>Salesforce</strong> и <strong>HubSpot</strong> плюс Slack и sales engagement (Outreach, Clay, Rox, Actively). Параллельно Salesforce анонсировала <strong>Headless 360</strong> (TDX, 15 апреля 2026): <strong>60+ MCP tools</strong>, 30+ coding skills для Codex, Cursor и Claude Code (<a href="https://www.salesforce.com/news/stories/salesforce-headless-360-announcement/" rel="noopener noreferrer">Salesforce news</a>) — отдельный трек для гибридных компаний с филиалами на SF.</p>
    <p class="reveal">Запросы <strong>«salesforce hubspot интеграция ai»</strong> и <strong>«codex plugin salesforce hubspot»</strong> релевантны экспортёрам и филиалам; для типичного SMB в РФ фокус — amoCRM, Bitrix24, Telegram.</p>
    <h3 class="ym-h3 reveal" id="amocrm-и-виджеты-api">amoCRM и виджеты/API</h3>
    <p class="reveal">В каталоге Codex <strong>нет</strong> нативного amoCRM. Практический путь: API amoCRM + <strong>Make</strong> или <strong>n8n</strong> + промпт (в т.ч. сценарии «Maia» на Make) для <strong>квалификации лидов</strong> и автозаполнения полей (<a href="https://mayai.ru/integracziya-amocrm-i-make-com-poshagovaya-avtomatizacziya-otdela-prodazh/" rel="noopener noreferrer">mayai.ru</a>). Ключи <strong>«amoCRM нейросеть»</strong>, <strong>«ии агент amoCRM»</strong>, <strong>«интеграция ai с amocrm»</strong> ведут к связке виджетов, webhook и оркестратора — это зона внедрения под ключ (аудит полей, права, тест на одной воронке).</p>
    <h3 class="ym-h3 reveal" id="битрикс24-copilot-марта-ai-и-mcp">Битрикс24 CoPilot, Марта AI и MCP</h3>
    <p class="reveal">Bitrix24 развивает встроенный <strong>CoPilot</strong> и экосистему партнёров (в т.ч. решения класса «Марта AI»). Отдельно в сообществе обсуждают <strong>MCP</strong> как способ подключить внешних агентов к API CRM — тренд усиливается анонсами вроде Morgan Stanley: <strong>более 100 API переведены под MCP</strong> для внешних AI-агентов (<a href="https://www.cnbc.com/2026/06/03/ai-agents-morgan-stanley-wealth-management-funnel.html" rel="noopener noreferrer">CNBC</a>); Jim Gough (Morgan Stanley, QCon London 2026): <em>«Nobody ever got excited about an OpenAPI spec… But MCP specs? People are jumping up and down.»</em> (<a href="https://www.infoq.com/news/2026/03/morgan-stanley-apis-mcp-calm/" rel="noopener noreferrer">InfoQ</a>)</p>
    <p class="reveal">Для <strong>«битрикс24 ии copilot»</strong> и <strong>«битрикс24 mcp агент»</strong> логика та же: либо нативные функции портала, либо кастомный MCP-сервер к REST API Bitrix24 + Claude/Codex у команды с компетенцией DevOps.</p>
    <h3 class="ym-h3 reveal" id="telegram-whatsapp-open-lines">Telegram, WhatsApp, Open Lines</h3>
    <p class="reveal"><strong>Интеграция CRM и мессенджеров</strong> — самый частый коммерческий запрос в РФ: лид пишет в Telegram → <strong>чат-бот для продаж</strong> квалифицирует → карточка в amoCRM/Bitrix24 → менеджер получает <strong>AI-бриф</strong>. Open Lines в Bitrix24 и виджеты amoCRM закрывают канал; нейросеть отвечает на FAQ и собирает поля, эскалируя «тёплый» лид человеку. Запрос <strong>«telegram whatsapp crm автоматизация»</strong> не требует Codex — достаточно Make/n8n и политики 152-ФЗ (минимизация ПДн в промптах).</p>
  </div>
</section><div id="boris-rf-sales-pipeline" class="ym-boris-anchor"><section id="boris-article-viz" class="boris-rf-pipeline-wrap ym-container" aria-labelledby="boris-rf-pipeline-title">
<style>
  #boris-article-viz.boris-rf-pipeline-wrap {
    margin: 48px auto 56px;
    max-width: 1300px;
    padding: 0 20px;
  }
  #boris-article-viz .boris-rf-pipeline-card {
    display: grid;
    grid-template-columns: 1fr;
    gap: 28px;
    padding: 28px 24px 32px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(15, 23, 42, 0.06);
  }
  @media (min-width: 1024px) {
    #boris-article-viz .boris-rf-pipeline-card {
      grid-template-columns: 1.1fr 1fr;
      gap: 36px;
      padding: 36px 40px 40px;
      align-items: center;
    }
  }
  #boris-article-viz .boris-rf-eyebrow {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #64748b;
    margin: 0 0 10px;
  }
  #boris-article-viz .boris-rf-kicker {
    font-size: clamp(1.25rem, 2.2vw, 1.65rem);
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin: 0 0 12px;
  }
  #boris-article-viz .boris-rf-lead {
    font-size: 15px;
    line-height: 1.55;
    color: #475569;
    margin: 0 0 18px;
  }
  #boris-article-viz .boris-rf-bridge {
    font-size: 14px;
    color: #64748b;
    margin: 16px 0 0;
    font-style: italic;
  }
  #boris-article-viz .boris-rf-points {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
  }
  #boris-article-viz .boris-rf-points li {
    position: relative;
    padding-left: 22px;
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 1.45;
    color: #334155;
  }
  #boris-article-viz .boris-rf-points li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.45em;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
  }
  #boris-article-viz .boris-rf-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }
  #boris-article-viz .boris-rf-pill {
    font-size: 12px;
    font-weight: 600;
    padding: 6px 12px;
    border-radius: 999px;
    background: #fff;
    border: 1px solid #e2e8f0;
    color: #0f172a;
  }
  #boris-article-viz .boris-rf-pill--accent {
    border-color: rgba(255, 0, 0, 0.2);
    color: #b91c1c;
  }
  #boris-article-viz .boris-rf-stage-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 18px;
  }
  #boris-article-viz .boris-rf-stage-btn {
    font-size: 12px;
    padding: 8px 12px;
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    background: #fff;
    color: #475569;
    cursor: pointer;
    transition: background 0.2s, border-color 0.2s, color 0.2s;
  }
  #boris-article-viz .boris-rf-stage-btn:hover,
  #boris-article-viz .boris-rf-stage-btn.is-active {
    border-color: #3b82f6;
    background: #eff6ff;
    color: #1d4ed8;
    font-weight: 600;
  }
  #boris-article-viz .boris-rf-viz-panel {
    position: relative;
    min-height: 380px;
    background: #fff;
    border-radius: 18px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.8);
  }
  @media (min-width: 1024px) {
    #boris-article-viz .boris-rf-viz-panel {
      min-height: 420px;
    }
  }
  #boris-article-viz #codex-rf-pipeline-canvas {
    display: block;
    width: 100%;
    height: 100%;
    min-height: 380px;
    cursor: pointer;
  }
  #boris-article-viz .boris-rf-caption {
    position: absolute;
    left: 12px;
    right: 12px;
    bottom: 12px;
    font-size: 12px;
    text-align: center;
    color: #64748b;
    background: rgba(255, 255, 255, 0.92);
    padding: 8px 10px;
    border-radius: 10px;
    pointer-events: none;
  }
  @media (max-width: 767px) {
    #boris-article-viz .boris-rf-viz-panel { order: 2; }
    #boris-article-viz .boris-rf-copy { order: 1; }
  }
</style>

  <div class="boris-rf-pipeline-card">
    <div class="boris-rf-copy">
      <p class="boris-rf-eyebrow">Сценарий для РФ · без sales plugin Codex</p>
      <h3 id="boris-rf-pipeline-title" class="boris-rf-kicker">Цепочка: лид в Telegram → CRM → AI-бриф → менеджер</h3>
      <p class="boris-rf-lead">Тот же интент, что у плагина Sales в Codex — приоритет, контекст и human-in-the-loop — но на стеке amoCRM / Bitrix24 + Make или n8n.</p>
      <ul class="boris-rf-points">
        <li><strong>Лид</strong> — бот квалифицирует в мессенджере, не трогая сделку без правил.</li>
        <li><strong>CRM</strong> — карточка, стадия и ответственный как источник правды.</li>
        <li><strong>AI</strong> — черновик брифа, follow-up или сигнал «сделка под риском».</li>
        <li><strong>Менеджер</strong> — подтверждает отправку и закрытие (approval).</li>
      </ul>
      <div class="boris-rf-pills" role="list">
        <span class="boris-rf-pill boris-rf-pill--accent" role="listitem">Пилот 5–7 дней</span>
        <span class="boris-rf-pill" role="listitem">Make / n8n</span>
        <span class="boris-rf-pill" role="listitem">152-ФЗ: минимум ПДн в промпте</span>
      </div>
      <div class="boris-rf-stage-tabs" role="tablist" aria-label="Этапы пайплайна">
        <button type="button" class="boris-rf-stage-btn is-active" data-stage="0" role="tab" aria-selected="true">① Лид</button>
        <button type="button" class="boris-rf-stage-btn" data-stage="1" role="tab" aria-selected="false">② CRM</button>
        <button type="button" class="boris-rf-stage-btn" data-stage="2" role="tab" aria-selected="false">③ AI-бриф</button>
        <button type="button" class="boris-rf-stage-btn" data-stage="3" role="tab" aria-selected="false">④ Менеджер</button>
      </div>
      <p class="boris-rf-bridge">Дальше разберём, как собрать тот же слой на Make/n8n без Enterprise Codex.</p>
    </div>

    <div class="boris-rf-viz-panel">
      <canvas id="codex-rf-pipeline-canvas" role="img" aria-label="Анимированная схема: лид в Telegram, CRM, AI-бриф, задача менеджеру. Клик или кнопки переключают активный этап."></canvas>
      <p class="boris-rf-caption" id="boris-rf-caption">Клик по узлу или кнопкам слева — подсветка этапа · частицы = поток данных</p>
    </div>
  </div>

<script>
(function () {
  var SECTION = document.getElementById("boris-article-viz");
  var canvas = document.getElementById("codex-rf-pipeline-canvas");
  if (!SECTION || !canvas) return;
  var ctx = canvas.getContext("2d");
  var captionEl = document.getElementById("boris-rf-caption");
  var buttons = SECTION.querySelectorAll(".boris-rf-stage-btn");

  var STAGES = [
    { id: 0, label: "Telegram / WhatsApp", short: "Лид", color: "#0ea5e9", caption: "Бот собирает бюджет, срок, ЛПР — тёплый лид уходит в CRM" },
    { id: 1, label: "amoCRM · Bitrix24", short: "CRM", color: "#8b5cf6", caption: "Webhook фиксирует поля, стадию и ответственного" },
    { id: 2, label: "LLM + Make/n8n", short: "AI", color: "#10b981", caption: "Черновик брифа, риск сделки, follow-up — без автосмены CRM" },
    { id: 3, label: "Менеджер + РОП", short: "HITL", color: "#f59e0b", caption: "Approval: письмо и смена стадии только после подтверждения" }
  ];

  var activeStage = 0;
  var frame = 0;
  var particles = [];
  var nodes = [];

  function resize() {
    var panel = canvas.parentElement;
    var w = panel.clientWidth || 600;
    var h = Math.max(380, Math.min(520, panel.clientHeight || 420));
    canvas.width = w * (window.devicePixelRatio || 1);
    canvas.height = h * (window.devicePixelRatio || 1);
    canvas.style.width = w + "px";
    canvas.style.height = h + "px";
    ctx.setTransform(window.devicePixelRatio || 1, 0, 0, window.devicePixelRatio || 1, 0, 0);
    layoutNodes(w, h);
  }

  function layoutNodes(w, h) {
    var padX = w < 500 ? 36 : 56;
    var y = h * 0.42;
    var span = w - padX * 2;
    nodes = STAGES.map(function (s, i) {
      return {
        x: padX + (span * i) / (STAGES.length - 1),
        y: y,
        r: w < 500 ? 28 : 34,
        stage: s
      };
    });
  }

  function setStage(idx) {
    activeStage = Math.max(0, Math.min(3, idx));
    buttons.forEach(function (btn) {
      var on = parseInt(btn.getAttribute("data-stage"), 10) === activeStage;
      btn.classList.toggle("is-active", on);
      btn.setAttribute("aria-selected", on ? "true" : "false");
    });
    if (captionEl) captionEl.textContent = STAGES[activeStage].caption;
  }

  function spawnParticle() {
    var from = activeStage;
    var to = (from + 1) % 4;
    if (!nodes[from] || !nodes[to]) return;
    particles.push({
      x: nodes[from].x,
      y: nodes[from].y,
      tx: nodes[to].x,
      ty: nodes[to].y,
      t: 0,
      speed: 0.012 + Math.random() * 0.008,
      hue: STAGES[from].color
    });
    if (particles.length > 48) particles.shift();
  }

  function drawRoundedRect(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else { ctx.moveTo(x + r, y); ctx.arcTo(x + w, y, x + w, y + h, r); ctx.arcTo(x + w, y + h, x, y + h, r); ctx.arcTo(x, y + h, x, y, r); ctx.arcTo(x, y, x + w, y, r); }
    ctx.fillStyle = fill;
    ctx.fill();
    if (stroke) { ctx.strokeStyle = stroke; ctx.lineWidth = 2; ctx.stroke(); }
  }

  function drawNode(n, i) {
    var s = n.stage;
    var isActive = i === activeStage;
    var isNext = i === (activeStage + 1) % 4;
    var pulse = isActive ? 0.08 * Math.sin(frame * 0.06) : 0;
    var r = n.r + (isActive ? 6 + pulse * 20 : 0);

    ctx.save();
    if (isActive) {
      ctx.shadowColor = s.color;
      ctx.shadowBlur = 18;
    }
    drawRoundedRect(n.x - r, n.y - r, r * 2, r * 2, 14, "#ffffff", isActive ? s.color : "#cbd5e1");
    ctx.shadowBlur = 0;

    ctx.fillStyle = isActive || isNext ? s.color : "#94a3b8";
    ctx.font = (r < 30 ? "18px" : "22px") + " system-ui, sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    var icons = ["💬", "📋", "✨", "✓"];
    ctx.fillText(icons[i], n.x, n.y - 2);

    ctx.fillStyle = "#0f172a";
    ctx.font = "600 11px system-ui, sans-serif";
    ctx.fillText(s.short, n.x, n.y + r + 16);
    ctx.font = "500 10px system-ui, sans-serif";
    ctx.fillStyle = "#64748b";
    var label = s.label;
    if (label.length > 18 && canvas.width / (window.devicePixelRatio || 1) < 520) {
      label = s.short;
    }
    ctx.fillText(label, n.x, n.y + r + 30);
    ctx.restore();
  }

  function drawLinks() {
    for (var i = 0; i < nodes.length - 1; i++) {
      var a = nodes[i], b = nodes[i + 1];
      var lit = i === activeStage;
      ctx.beginPath();
      ctx.moveTo(a.x + a.r + 4, a.y);
      ctx.lineTo(b.x - b.r - 4, b.y);
      ctx.strokeStyle = lit ? STAGES[i].color : "#e2e8f0";
      ctx.lineWidth = lit ? 3 : 2;
      if (lit) ctx.setLineDash([]);
      else ctx.setLineDash([6, 6]);
      ctx.stroke();
      ctx.setLineDash([]);
    }
  }

  function drawParticles() {
    particles.forEach(function (p) {
      p.t += p.speed;
      if (p.t >= 1) { p.t = 0; p.x = p.tx; p.y = p.ty; return; }
      var x = p.x + (p.tx - p.x) * p.t;
      var y = p.y + (p.ty - p.y) * p.t - Math.sin(p.t * Math.PI) * 12;
      ctx.beginPath();
      ctx.arc(x, y, 5, 0, Math.PI * 2);
      ctx.fillStyle = p.hue;
      ctx.fill();
    });
  }

  function draw() {
    var w = canvas.width / (window.devicePixelRatio || 1);
    var h = canvas.height / (window.devicePixelRatio || 1);
    ctx.clearRect(0, 0, w, h);

    ctx.fillStyle = "#f1f5f9";
    ctx.fillRect(0, 0, w, h * 0.22);
    drawRoundedRect(16, 14, w - 32, h * 0.18, 10, "#ffffff", "#e2e8f0");
    ctx.fillStyle = "#64748b";
    ctx.font = "600 11px system-ui, sans-serif";
    ctx.textAlign = "left";
    ctx.fillText("Оркестратор: Make.com или n8n (self-hosted)", 28, 32);
    ctx.fillStyle = "#0f172a";
    ctx.font = "700 13px system-ui, sans-serif";
    ctx.fillText("Human-in-the-loop на этапе «Менеджер»", 28, 50);

    drawLinks();
    nodes.forEach(drawNode);
    drawParticles();

    frame++;
    if (frame % 18 === 0) spawnParticle();
    requestAnimationFrame(draw);
  }

  function hitTest(mx, my) {
    for (var i = 0; i < nodes.length; i++) {
      var n = nodes[i];
      var dx = mx - n.x, dy = my - n.y;
      if (dx * dx + dy * dy <= (n.r + 12) * (n.r + 12)) return i;
    }
    return -1;
  }

  canvas.addEventListener("click", function (e) {
    var rect = canvas.getBoundingClientRect();
    var idx = hitTest(e.clientX - rect.left, e.clientY - rect.top);
    if (idx >= 0) setStage(idx);
  });

  buttons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      setStage(parseInt(btn.getAttribute("data-stage"), 10));
    });
  });

  var autoTimer = setInterval(function () {
    if (document.hidden) return;
    setStage((activeStage + 1) % 4);
  }, 4500);

  SECTION.addEventListener("mouseenter", function () { clearInterval(autoTimer); });
  SECTION.addEventListener("focusin", function () { clearInterval(autoTimer); });

  window.addEventListener("resize", resize);
  resize();
  setStage(0);
  draw();
})();
</script>
</section></div><section class="ym-section ym-section-alt reveal" id="smb-without-enterprise">
  <div class="ym-container">
    <h2 class="ym-section-title">Как SMB повторяет логику Codex без Enterprise-тарифа</h2>
    <p class="ym-lead-box reveal"><strong>Коротко:</strong> ролевые плагины и Sites привязаны к <strong>ChatGPT Business / Enterprise</strong> и <strong>поддерживаемым регионам</strong> OpenAI. SMB в РФ строит <strong>цифровых сотрудников</strong> на связке LLM + оркестратор + CRM API — с тем же human-in-the-loop.</p>
    <h3 class="ym-h3 reveal" id="make-com-vs-n8n-когда-что-выбрать">Make.com vs n8n — когда что выбрать</h3>
    <div class="ym-table-wrap reveal"><table class="ym-table"><tr><th>Критерий</th><th>Make.com</th><th>n8n</th></tr><tr><td>Старт без кода</td><td>Быстрее для маркетолога/РОПа</td><td>Нужнее технарь или подрядчик</td></tr><tr><td>amoCRM</td><td>Много готовых сценариев</td><td>Гибче кастом</td></tr><tr><td>152-ФЗ / on-prem</td><td>Облако Make (EU/US) — оценка ПДн</td><td>Self-hosted n8n на своём сервере</td></tr><tr><td>Стоимость (ориентир)</td><td>от ~$9–29+/мес по тарифам Make + токены LLM</td><td>сервер + токены; гибче для малой команды</td></tr></table></div>
    <p class="reveal">По обзорам внедрений amoCRM + Make для малой команды часто укладываются <strong>$5–10/мес</strong> на токены LLM при пилоте (<a href="https://mayai.ru/integracziya-amocrm-i-make-com-poshagovaya-avtomatizacziya-otdela-prodazh/" rel="noopener noreferrer">mayai.ru</a>). <strong>ChatGPT Business</strong> с 2 апреля 2026 — <strong>$20/пользователь/мес</strong> при годовой оплате (было $25); помесячно <strong>$25</strong> (<a href="https://openai.com/index/codex-flexible-pricing-for-teams/" rel="noopener noreferrer">OpenAI pricing blog</a>). <strong>Codex-only seats</strong> — pay-as-you-go по токенам, без фиксированной seat fee (<a href="https://chatgpt.com/codex/pricing/" rel="noopener noreferrer">Codex pricing</a>).</p>
    <p class="reveal"><strong>TCO (только цифры из источников):</strong> команда 5 менеджеров на Business ≈ $100/мес только seats + время настройки коннекторов; стек Make + amoCRM + API LLM часто дешевле на лицензиях, но требует интегратора. Промо OpenAI (апрель 2026): до <strong>$500 credits</strong> на workspace за новых Codex-only участников — условия на <a href="https://openai.com/index/codex-flexible-pricing-for-teams/" rel="noopener noreferrer">блоге OpenAI</a> (проверять актуальность).</p>
    <h3 class="ym-h3 reveal" id="mcp-как-универсальный-порт-к-crm">MCP как «универсальный порт» к CRM</h3>
    <p class="reveal"><strong>MCP</strong> (Model Context Protocol) — стандарт подключения инструментов к агентам. Codex расширяется через Zapier MCP на тысячи приложений (<a href="https://zapier.com/blog/automate-codex-zapier-mcp/" rel="noopener noreferrer">Zapier</a>); Salesforce даёт `@salesforce/mcp` для Codex (<a href="https://github.com/salesforcecli/mcp" rel="noopener noreferrer">GitHub salesforcecli/mcp</a>). Для amoCRM — кастомный MCP к REST API или сценарии без MCP через webhook.</p>
    <p class="reveal">Запросы <strong>«mcp протокол crm»</strong> и <strong>«mcp интеграция crm»</strong> — для продвинутых команд; для владельца SMB достаточно понимать: MCP — «розетка», а не готовая воронка. Nero Network на пилоте часто начинает с Make/n8n, а MCP добавляет на втором этапе, если нужен единый агент для нескольких систем.</p>
    <h3 class="ym-h3 reveal" id="стек-llm-оркестратор-crm-api">Стек: LLM + оркестратор + CRM API</h3>
    <p class="reveal">Типовая схема <strong>внедрения нейросети в бизнес</strong> без Codex:</p>
    <p class="reveal">1. <strong>CRM</strong> (amoCRM / Bitrix24) — поля, стадии, ответственные.
2. <strong>Оркестратор</strong> (Make / n8n) — триггеры, ветвления, human approval.
3. <strong>LLM</strong> (OpenAI API, Claude, <strong>YandexGPT</strong> при жёстком 152-ФЗ) — черновики, классификация, резюме звонка.
4. <strong>Канал</strong> (Telegram, почта, Open Lines) — вход лидов и уведомления РОПу.</p>
    <p class="reveal">The Decoder (02.06.2026) отмечает: у Anthropic <strong>похожие плагины выходили раньше</strong> — сравнение скорости enterprise-фич, не повод копировать угол «мега-корпорация внедрила AI на 276k сотрудников» (<a href="https://the-decoder.com/openai-expands-codex-with-role-specific-plugins-to-build-a-general-purpose-app-for-non-developers/" rel="noopener noreferrer">the-decoder.com</a>). Для Cowork Anthropic в enterprise подчёркивают RBAC и MCP permissions (<a href="https://thenewstack.io/anthropic-takes-claude-cowork-out-of-preview-and-straight-into-the-enterprise/" rel="noopener noreferrer">The New Stack</a>) — параллель Codex, но не тема этой страницы.</p>
  </div>
</section><section class="ym-section reveal" id="implementation-scenarios">
  <div class="ym-container">
    <h2 class="ym-section-title">Сценарии внедрения: от квалификации лида до дашборда</h2>
    <h3 class="ym-h3 reveal" id="первая-линия-24-7-и-передача-тёплого-лида">Первая линия 24/7 и передача тёплого лида</h3>
    <p class="reveal"><strong>Чат-бот для продаж</strong> в Telegram: FAQ, сбор бюджета/срока/ЛПР, запись в CRM, тег «квалифицирован». <strong>Квалификация лидов ии</strong> не заменяет менеджера на закрытии — снимает рутину первой линии. Кейс amoCRM + Make описан пошагово на <a href="https://mayai.ru/integracziya-amocrm-i-make-com-poshagovaya-avtomatizacziya-otdela-prodazh/" rel="noopener noreferrer">mayai.ru</a> (срок пилота часто <strong>5–7 дней</strong> с подрядчиком).</p>
    <h3 class="ym-h3 reveal" id="автозаполнение-карточки-после-звонка-чата">Автозаполнение карточки после звонка/чата</h3>
    <p class="reveal">Триггер: завершён звонок или чат → транскрипция → LLM извлекает поля по скрипту → менеджер подтверждает → запись в CRM. Снижает «ручную CRM» — главную боль, на которую указывает инфоповод Codex для продаж.</p>
    <h3 class="ym-h3 reveal" id="мини-sites-kpi-воронка-отчёт-для-ропа">Мини-Sites: KPI, воронка, отчёт для РОПа</h3>
    <p class="reveal"><strong>Внутренние дашборды без разработчиков</strong> в мире Codex — это Sites (preview). В РФ альтернативы: встроенные отчёты Bitrix24, Metabase, Google Looker Studio + выгрузка из CRM, либо лёгкий dashboard на n8n + БД. Sites оправдан, если уже есть Business OpenAI и нужен интерактивный <strong>review hub</strong> или scenario planner; для ежедневной воронки РОПу часто <strong>достаточно CRM + Telegram-дайджест</strong> — экономия на Enterprise и трансграничной передаче данных.</p>
    <div class="ym-table-wrap reveal"><table class="ym-table"><tr><th>Когда Sites уместен</th><th>Когда хватит CRM + бота</th></tr><tr><td>Кросс-функциональный hub для product/sales</td><td>Одна воронка, один РОП</td></tr><tr><td>Нужен интерактив «что если» по плану квартала</td><td>KPI уже в Bitrix24</td></tr><tr><td>Есть админ OpenAI и compliance OK</td><td>Нет Business в регионе / 152-ФЗ жёсткий</td></tr></table></div>
  </div>
</section><div class="ym-container">
<aside class="ym-cta-block ym-cta-block--primary reveal" aria-labelledby="ym-cta-primary-title">
  <div class="ym-card" style="text-align:center; border-color: rgba(255,0,0,0.15);">
    <div class="ym-card-icon" style="margin:0 auto 20px;" aria-hidden="true">⚡</div>
    <h3 id="ym-cta-primary-title" style="font-size:24px; margin-bottom:12px;">Повторить сценарии Codex в amoCRM или Bitrix24</h3>
    <p style="color:#64748b; margin-bottom:24px; max-width:640px; margin-left:auto; margin-right:auto;">Аудит трёх процессов отдела продаж, пилот на Make/n8n за 5–7 дней и внедрение AI-агентов под ключ — с human-in-the-loop и учётом 152-ФЗ.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url . '?utm_source=longread&utm_medium=cta&utm_campaign=openai-codex-plaginy-prodazhi-crm-avtomatizaciya&utm_content=primary-mid' ); ?>" rel="noopener">Заявка на консультацию — <?php echo esc_html( $nero_primary_cta_label ); ?></a>
    </div>
    <p style="font-size:13px; color:#94a3b8; margin-top:16px; margin-bottom:0;">Без обязательств: разберём воронку и предложим один пилотный сценарий под вашу CRM.</p>
  </div>
</aside></div><section class="ym-section ym-section-alt reveal" id="limitations-152fz">
  <div class="ym-container">
    <h2 class="ym-section-title">Ограничения, 152-ФЗ и безопасность данных</h2>
    <p class="reveal">Role plugins работают в <strong>поддерживаемых регионах</strong> OpenAI (<a href="https://openai.com/index/codex-for-every-role-tool-workflow/" rel="noopener noreferrer">официальный релиз</a>). Sites — только <strong>Business/Enterprise</strong>, хостинг OpenAI (вопрос трансграничной передачи ПДн). Для РФ это не абстракция: персональные данные клиентов в промптах облачной LLM нужно минимизировать, маскировать, хранить договоры и политики.</p>
    <h3 class="ym-h3 reveal" id="персональные-данные-в-рф">Персональные данные в РФ</h3>
    <p class="reveal">Практика интеграторов: <strong>YandexGPT</strong> + on-prem <strong>n8n</strong> + минимизация ПДн в промптах (<a href="https://promaren.ru/blog/2025/11/17/integraciya-yandexgpt-s-bitrix24-i-amocrm-3-shaga-k-uspehu/" rel="noopener noreferrer">promaren.ru</a>). Запрос <strong>«yandexgpt amocrm»</strong> — про compliance, не про «модель посвежее».</p>
    <h3 class="ym-h3 reveal" id="права-админов-и-разрешения-приложений">Права админов и разрешения приложений</h3>
    <p class="reveal">В Business/Enterprise админы контролируют, какие из 62 приложений доступны workspace — аналог RBAC в enterprise-агентах. При внедрении через Make/n8n настраивают отдельные API-ключи, роли в CRM и шаг <strong>approval</strong> перед отправкой письма или сменой стадии — как в human-in-the-loop у Codex.</p>
    <p class="reveal"><strong>Итог:</strong> <strong>внедрение AI агентов под ключ</strong> для продаж в РФ = юридическая рамка + технический стек + обучение РОПа, а не покупка одного плагина.</p>
  </div>
</section><section class="ym-section reveal" id="implementation-plan">
  <div class="ym-container">
    <h2 class="ym-section-title">Пошаговый план внедрения под ключ</h2>
    <p class="reveal">Nero Network ведёт проекты по схеме: аудит → пилот → масштабирование. Ниже — ориентир для <strong>автоматизация b2b продаж 2026</strong> на фоне релиза Codex (как эталон процессов, не как обязательный продукт).</p>
    <h3 class="ym-h3 reveal" id="аудит-воронки-и-книги-продаж">Аудит воронки и книги продаж</h3>
    <p class="reveal">- 3 процесса с максимальной рутиной (квалификация, follow-up, риск сделки).
- Карта полей CRM и дублей в мессенджерах.
- Матрица «сценарий → инструмент → ответственный».</p>
    <h3 class="ym-h3 reveal" id="пилот-2-4-недели-на-одном-сценарии">Пилот 2–4 недели на одном сценарии</h3>
    <p class="reveal">Один поток, например <strong>Telegram → amoCRM → AI-бриф → задача менеджеру</strong>. Критерии успеха: время ответа, % заполненных полей, принятие черновиков менеджерами. Срок <strong>5–7 дней</strong> на MVP возможен при готовой CRM-дисциплине (<a href="https://mayai.ru/integracziya-amocrm-i-make-com-poshagovaya-avtomatizacziya-otdela-prodazh/" rel="noopener noreferrer">практика mayai.ru</a>).</p>
    <h3 class="ym-h3 reveal" id="масштабирование-и-обучение-команды">Масштабирование и обучение команды</h3>
    <p class="reveal">Второй и третий сценарии, регламент human-in-the-loop, метрики для РОПа (конверсия этапов, не «магия AI»). При росте — MCP, отдельные дашборды, связка с западным Salesforce для филиала.</p>
    <p class="reveal"><strong>Коммерческий CTA:</strong> аудит трёх процессов отдела продаж, пилот на Make/n8n, обучение РОПа — в привязке к инфоповоду 2 июня 2026, без абстрактного «внедрите AI когда-нибудь».</p>
  </div>
</section><div class="ym-container">
<aside class="ym-cta-block ym-cta-block--secondary reveal" aria-labelledby="ym-cta-secondary-title">
  <div class="ym-prompt-card" style="margin-bottom:0;">
    <h3 id="ym-cta-secondary-title" style="font-size:18px; margin:0 0 10px;">Обучение команды после пилота</h3>
    <p style="margin:0 0 16px; color:#475569;">Регламент human-in-the-loop, промпты под книгу продаж и самостоятельная поддержка сценариев на Make/n8n — в программе <strong><?php echo esc_html( $nero_secondary_cta_label ); ?></strong>.</p>
    <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $nero_secondary_cta_url . '?utm_source=longread&utm_medium=cta&utm_campaign=openai-codex-plaginy-prodazhi-crm-avtomatizaciya&utm_content=secondary-training' ); ?>" rel="noopener" style="display:inline-flex;">Подробнее об обучении</a>
  </div>
</aside></div>
<section class="ym-section ym-section-alt" id="faq">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ</h2>
    <div class="ym-faq-layout reveal">
      <aside class="ym-faq-sidebar">
        <p style="font-weight:700;margin-bottom:16px;">Вопросы</p>
        <ul class="ym-faq-list"><li><a href="#заменит-ли-codex-менеджеров-по-продажам">Заменит ли Codex менеджеров по продажам?</a></li><li><a href="#нужен-ли-разработчик-для-make-n8n-crm">Нужен ли разработчик для Make/n8n + CRM?</a></li><li><a href="#чем-sites-отличается-от-обычного-лендинга">Чем Sites отличается от обычного лендинга?</a></li><li><a href="#доступен-ли-codex-с-amocrm-из-коробки">Доступен ли Codex с amoCRM из коробки?</a></li><li><a href="#сколько-стоит-путь-как-у-openai-для-команды">Сколько стоит путь «как у OpenAI» для команды?</a></li><li><a href="#чем-это-отличается-от-корпорации-внедрила-claude-на-сотни-ты">Чем это отличается от «корпорации внедрила Claude на сотни тысяч сотрудников»?</a></li></ul>
      </aside>
      <div class="ym-faq-content"><article class="ym-faq-item reveal" id="заменит-ли-codex-менеджеров-по-продажам"><h3>Заменит ли Codex менеджеров по продажам?</h3><p class="reveal">Нет. OpenAI и партнёры позиционируют агентов как слой над CRM и коммуникациями; письма и изменения в CRM — с подтверждением человека. <strong>Автоматизация продаж нейросетью</strong> снимает подготовку, черновики и сигналы риска; закрытие и переговоры остаются за менеджером.</p></article><article class="ym-faq-item reveal" id="нужен-ли-разработчик-для-make-n8n-crm"><h3>Нужен ли разработчик для Make/n8n + CRM?</h3><p class="reveal">Для простых сценариев — нет: Make тянет маркетолог или РОП с шаблоном. Для MCP, on-prem n8n, сложных веток и 152-ФЗ — нужен интегратор (внутренний или под ключ). Репозиторий role-based-plugins прямо требует <strong>кастомизации</strong> коннекторов.</p></article><article class="ym-faq-item reveal" id="чем-sites-отличается-от-обычного-лендинга"><h3>Чем Sites отличается от обычного лендинга?</h3><p class="reveal">Sites — интерактивное приложение в workspace Codex (фильтры, сценарии, внутренние данные), с деплоем как Cloudflare Worker-compatible модуль и RBAC. Лендинг — публичная маркетинговая страница. Для KPI продаж чаще достаточно отчёта в CRM или дашборда + Telegram-дайджеста.</p></article><article class="ym-faq-item reveal" id="доступен-ли-codex-с-amocrm-из-коробки"><h3>Доступен ли Codex с amoCRM из коробки?</h3><p class="reveal">Нет в официальном sales plugin (<a href="https://github.com/openai/role-based-plugins/tree/main/plugins/sales" rel="noopener noreferrer">GitHub</a>). Интеграция — API + Make/n8n/MCP.</p></article><article class="ym-faq-item reveal" id="сколько-стоит-путь-как-у-openai-для-команды"><h3>Сколько стоит путь «как у OpenAI» для команды?</h3><p class="reveal">Business <strong>$20/пользователь/мес</strong> (год) + настройка; альтернатива Make + токены LLM часто ниже по лицензиям, выше по времени интегратора (<a href="https://openai.com/index/codex-flexible-pricing-for-teams/" rel="noopener noreferrer">OpenAI</a>, <a href="https://mayai.ru/integracziya-amocrm-i-make-com-poshagovaya-avtomatizacziya-otdela-prodazh/" rel="noopener noreferrer">mayai.ru</a>). Отдельной публичной цены только на Sites нет — они в составе Business/Enterprise preview.</p></article><article class="ym-faq-item reveal" id="чем-это-отличается-от-корпорации-внедрила-claude-на-сотни-ты"><h3>Чем это отличается от «корпорации внедрила Claude на сотни тысяч сотрудников»?</h3><p class="reveal">Там фокус на change management в гиганте. Здесь — <strong>практические сценарии SMB</strong>: amoCRM, Bitrix24, Telegram, Make/n8n, пилот за недели.</p></article></div>
    </div>
  </div>
</section><div class="ym-container">
<aside class="ym-cta-block ym-cta-block--primary ym-cta-block--final reveal" aria-labelledby="ym-cta-final-title">
  <div class="ym-card" style="background: linear-gradient(135deg, #fff 0%, #fef2f2 100%); text-align:center;">
    <h3 id="ym-cta-final-title" style="font-size:26px; margin-bottom:12px;">Готовы автоматизировать продажи без Enterprise Codex?</h3>
    <p style="color:#475569; margin-bottom:24px; max-width:700px; margin-left:auto; margin-right:auto;">Nero Network спроектирует цепочку «лид → CRM → AI-бриф → задача менеджеру» и обучит РОПа работе с черновиками и approval.</p>
    <div class="ym-btn-group" style="justify-content:center;">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url( $nero_primary_cta_url . '?utm_source=longread&utm_medium=cta&utm_campaign=openai-codex-plaginy-prodazhi-crm-avtomatizaciya&utm_content=primary-final' ); ?>" rel="noopener"><?php echo esc_html( $nero_primary_cta_label ); ?></a>
      <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url( $nero_secondary_cta_url . '?utm_source=longread&utm_medium=cta&utm_campaign=openai-codex-plaginy-prodazhi-crm-avtomatizaciya&utm_content=secondary-training' ); ?>" rel="noopener"><?php echo esc_html( $nero_secondary_cta_label ); ?></a>
    </div>
  </div>
</aside></div>
<section class="ym-section" id="conclusion">
  <div class="ym-container">
    <p class="reveal ym-lead-box"><strong>Итог страницы:</strong> релиз Codex 2 июня 2026 показывает, куда движется рынок <strong>AI агентов для бизнеса</strong> в продажах. Российская компания может получить тот же эффект — приоритет аккаунтов, follow-up, риск сделки, дашборд РОПа — через <strong>нейросеть для CRM</strong> на Make, n8n и MCP, с соблюдением 152-ФЗ. Nero Network проектирует и внедряет такие цепочки под ключ: от аудита воронки до обучения команды.</p>
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
<script type="application/ld+json">{"@context": "https://schema.org", "@type": "Article", "headline": "OpenAI Codex: плагины для продаж и CRM — как повторить автоматизацию в своём бизнесе", "description": "Плагины Codex для продаж и CRM: Salesforce, HubSpot, amoCRM. Как SMB автоматизирует сделки через Make, n8n и MCP без разработчиков — разбор релиза 2 июня 2026.", "datePublished": "2026-06-04", "dateModified": "2026-06-04", "author": {"@type": "Organization", "name": "Nero Network"}, "publisher": {"@type": "Organization", "name": "Nero Network"}, "inLanguage": "ru-RU", "about": ["OpenAI Codex", "CRM automation", "AI sales agents"]}</script>
<?php get_footer(); ?>
