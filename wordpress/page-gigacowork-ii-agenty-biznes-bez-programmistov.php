<?php
/**
 * Template Name: GigaCowork ИИ-агенты без программистов
 * Description: Лонгрид gigacowork-ii-agenty-biznes-bez-programmistov (hero Canvas + MCP блок).
 */

$page_seo_title = 'GigaCowork: ИИ-агенты для бизнеса без программистов — Make, MCP';
$page_seo_description = 'Сбер открыл GigaCowork на ЦИПР-2026: агенты по регламентам, MCP к CRM и пилоты до −81,5% рутины. Как собрать такой контур на Make, n8n и GigaChat без экосистемы банка.';

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

.breadcrumbs, .breadcrumb, .breadcrumb-list, .breadcrumb-item,
nav[aria-label="Хлебные крошки"],
.woocommerce-breadcrumb, .rank-math-breadcrumb, .rank-math-breadcrumbs, .yoast-breadcrumb,
.entry-header, .page-title-section { display: none !important; }
#primary, .site-main, .site-content, #content, .content-area {
  padding-top: 0 !important;
  margin-top: 0 !important;
}
/* === Nero Network: изоляция Canvas-hero от Kadence === */
body[class*="page-template-page-"] #inner-wrap {
  max-width: none !important;
  width: 100% !important;
  padding-top: 0 !important;
  margin-top: 0 !important;
}
body[class*="page-template-page-"] #inner-wrap > main.site-main[class*="-page"] {
  display: block !important;
  max-width: none !important;
  width: 100% !important;
  margin: 0 !important;
  padding: 0 !important;
  box-shadow: none !important;
  background: transparent !important;
}
body[class*="page-template-page-"] {
  --nn-hero-text-max: min(26rem, 38vw);
  --nn-hero-gutter: clamp(20px, 4vw, 56px);
}
.hero-enterprise-gateway .hero-visual-col canvas,
.hero-enterprise-gateway #gcw-orchestra-canvas {
  position: absolute !important;
  inset: 0 !important;
  width: 100% !important;
  height: 100% !important;
  z-index: 1 !important;
  pointer-events: none !important;
}
.hero-enterprise-gateway .hero-copy-block,
.hero-enterprise-gateway .vl-ui-tasks,
.hero-enterprise-gateway .vl-ui-pill {
  position: relative !important;
  left: auto !important;
  top: auto !important;
  transform: none !important;
}

.gcw-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.15fr) minmax(260px, 0.85fr);
  gap: 32px 40px;
  align-items: start;
  text-align: left !important;
}
.gcw-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, var(--ym-primary), var(--ym-accent)) 1;
  padding-left: 24px;
}
.gcw-intro-text p { text-align: left !important; }
.gcw-intro-deco { min-width: 0; }
.gcw-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.gcw-kpi-chip {
  font-size: 12px;
  font-weight: 700;
  padding: 8px 14px;
  border-radius: 999px;
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}
.gcw-kpi-chip--accent {
  background: #eef2ff;
  color: #4338ca;
  border-color: #c7d2fe;
}
.gcw-toc-wrap { text-align: center; margin: 48px 0 24px; }
.gcw-prose { max-width: 900px; margin: 0 auto; }
.gcw-prose h2 {
  font-size: clamp(1.5rem, 3vw, 2.25rem);
  font-weight: 800;
  margin: 0 0 20px;
  letter-spacing: -0.02em;
}
.gcw-prose h3 {
  font-size: 1.25rem;
  font-weight: 700;
  margin: 32px 0 14px;
}
.gcw-prose p, .gcw-prose li { line-height: 1.65; margin-bottom: 16px; }
.gcw-prose ul, .gcw-prose ol { padding-left: 1.25rem; margin-bottom: 20px; }
.gcw-prose table {
  width: 100%;
  border-collapse: collapse;
  margin: 24px 0;
  font-size: 14px;
}
.gcw-prose th, .gcw-prose td {
  border: 1px solid var(--ym-border);
  padding: 12px 14px;
  text-align: left;
}
.gcw-prose th { background: #f1f5f9; font-weight: 700; }
.gcw-checklist { list-style: none; padding: 0; }
.gcw-checklist li {
  position: relative;
  padding-left: 22px;
  margin-bottom: 10px;
}
.gcw-checklist li::before {
  content: "☐";
  position: absolute;
  left: 0;
  color: var(--ym-primary);
}
.ym-promo-cta { margin: 32px 0; }
.ym-promo-cta__title { font-size: 22px; font-weight: 800; color: var(--ym-heading); margin: 0 0 12px; }
.ym-promo-cta__text { margin: 0 0 20px; line-height: 1.6; color: var(--ym-text); }
.ym-promo-cta__actions { justify-content: flex-start; }
.ym-promo-cta--secondary { border-left: 4px solid var(--ym-accent); }
@media (max-width: 900px) {
  .gcw-intro-grid { grid-template-columns: 1fr; }
}
/* CRITICAL FIX FOR STICKY SIDEBAR & OVERFLOW */
body, html {
    /* max-width: 100vw; removed to fix mobile menu */
}
.site-main {
    display: block !important;
}
.gigacowork-ii-agenty-biznes-bez-programmistov-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #21a038;
    --ym-accent: #6366f1;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(33, 160, 56, 0.18);
}

.gigacowork-ii-agenty-biznes-bez-programmistov-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.gigacowork-ii-agenty-biznes-bez-programmistov-page h1,
.gigacowork-ii-agenty-biznes-bez-programmistov-page h2,
.gigacowork-ii-agenty-biznes-bez-programmistov-page h3,
.gigacowork-ii-agenty-biznes-bez-programmistov-page h4,
.gigacowork-ii-agenty-biznes-bez-programmistov-page h5,
.gigacowork-ii-agenty-biznes-bez-programmistov-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.gigacowork-ii-agenty-biznes-bez-programmistov-page p,
.gigacowork-ii-agenty-biznes-bez-programmistov-page li,
.gigacowork-ii-agenty-biznes-bez-programmistov-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.gigacowork-ii-agenty-biznes-bez-programmistov-page strong,
.gigacowork-ii-agenty-biznes-bez-programmistov-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.gigacowork-ii-agenty-biznes-bez-programmistov-page pre, .gigacowork-ii-agenty-biznes-bez-programmistov-page code {
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
    box-shadow: 0 5px 15px rgba(33,160,56,0.25);
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
    box-shadow: 0 10px 20px -5px rgba(33, 160, 56, 0.35);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(33, 160, 56, 0.45);
    background: #1a8f32;
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
    border-color: rgba(33, 160, 56, 0.25);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(33, 160, 56, 0.08);
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

</style>

<main id="primary" class="site-main gigacowork-ii-agenty-biznes-bez-programmistov-page" role="main" tabindex="-1">
<section id="gigacowork-enterprise-hero" class="hero-enterprise-gateway fullscreen-white-office" aria-label="Hero: GigaCowork и ИИ-агенты">
<style>
.hero-enterprise-gateway.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  min-height: 100dvh;
  width: 100%;
  padding-top: clamp(80px, 11vh, 120px);
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  background: linear-gradient(165deg, #ffffff 0%, #f8fafc 45%, #ecfdf5 100%);
  font-family: Inter, system-ui, -apple-system, sans-serif;
}
.hero-enterprise-gateway .hero-layout {
  flex: 1;
  display: grid;
  grid-template-columns: minmax(0, 0.42fr) minmax(0, 0.58fr);
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
  max-width: var(--nn-hero-text-max, 26rem);
}
.hero-enterprise-gateway .hero-visual-col {
  position: relative;
  min-height: min(480px, 52vh);
  border-radius: 24px;
  overflow: hidden;
  background: linear-gradient(145deg, rgba(255,255,255,0.96) 0%, rgba(236,253,245,0.9) 100%);
  border: 1px solid #e2e8f0;
  box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}
.hero-enterprise-gateway .hero-grid-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
  background-image:
    linear-gradient(rgba(33, 160, 56, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(33, 160, 56, 0.05) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}
.hero-enterprise-gateway .giant-seo {
  font-size: clamp(1.625rem, 3.25vw, 2.75rem);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -0.04em;
  color: #0f172a;
  margin: 0;
  max-width: 100%;
  word-wrap: break-word;
}
.hero-enterprise-gateway .giant-seo span {
  display: block;
  margin-top: 0.15em;
  background: linear-gradient(90deg, #21a038, #6366f1);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
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
  background: #21a038;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  transition: transform 0.2s, box-shadow 0.2s;
  box-shadow: 0 6px 20px rgba(33, 160, 56, 0.28);
}
.hero-enterprise-gateway .telegram-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 28px rgba(33, 160, 56, 0.35);
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
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
}
.hero-enterprise-gateway .vl-ui-task span {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #21a038, #6366f1);
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
@media (max-width: 960px) {
  .hero-enterprise-gateway .hero-layout {
    grid-template-columns: 1fr;
    gap: 20px;
    padding-bottom: 32px;
  }
  .hero-enterprise-gateway .hero-content-col { order: 1; max-width: 100%; }
  .hero-enterprise-gateway .hero-visual-col {
    order: 2;
    min-height: min(280px, 38vh);
  }
}
</style>

<div class="hero-layout">
  <div class="hero-content-col">
    <div class="vl-ui-tasks" aria-label="Этапы контура GigaCowork">
      <div class="vl-ui-task"><span>1</span>Регламент → навык</div>
      <div class="vl-ui-task"><span>2</span>MCP к CRM и почте</div>
      <div class="vl-ui-task"><span>3</span>Human approval</div>
      <div class="vl-ui-task"><span>4</span>Пилот 14 дней</div>
      <div class="vl-ui-task"><span>5</span>Масштаб Make / n8n</div>
    </div>

    <div class="hero-copy-block">
      <h1 id="gcw-hero-title" class="giant-seo">GigaCowork: ИИ-агенты для бизнеса <span>без программистов — Make и MCP</span></h1>
      <p class="giant-seo-sub">Сбер открыл тест GigaCowork на ЦИПР-2026: регламенты на русском, MCP к CRM и пилоты до −81,5% рутины. Показываем, как собрать такой же контур без экосистемы банка.</p>
      <a class="telegram-button" href="https://t.me/gorbachevzd">Обсудить пилот агентов</a>  <!-- pragma: allowlist secret -->
    </div>

    <div class="vl-ui-pill" aria-label="Метрики и теги">
      <span>Workspace</span>
      <span>MCP</span>
      <span>No-code</span>
      <span>−81,5% рутина</span>
    </div>
  </div>

  <div class="hero-visual-col" aria-label="Оркестрация ИИ-агентов">
    <div class="hero-grid-bg" aria-hidden="true"></div>
    <canvas id="gcw-orchestra-canvas" aria-hidden="true"></canvas>
  </div>
</div>
<script>
(function gigacoworkHeroEngine() {
  const canvas = document.getElementById("gcw-orchestra-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    const parent = canvas.parentElement;
    if (!parent) return;
    canvas.width = parent.clientWidth || 640;
    canvas.height = parent.clientHeight || 480;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw * 0.52;
    cy = ch / 2 - 16;
    scale = cw < 520 ? cw / 520 : Math.min(cw / 900, ch / 700) * 1.25;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    sber: "#21a038",
    indigo: "#6366f1",
    panel: "#ffffff",
    river: "#cbd5e1",
    tokenCrm: "#dbeafe",
    tokenDoc: "#fef9c3",
    tokenHr: "#ede9fe",
    tokenErp: "#d1fae5",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    approve: "#22c55e"
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

  class RegulamentStream {
    constructor(x, y, w) {
      this.x = x; this.y = y; this.w = w;
    }
    draw(ctx) {
      const phase = (frame * 0.04) % 240;
      ctx.strokeStyle = C.river;
      ctx.lineWidth = 3;
      ctx.beginPath();
      ctx.moveTo(this.x, this.y);
      for (let i = 0; i <= this.w; i += 20) {
        const wave = Math.sin((i + frame * 0.6) * 0.04) * 10;
        ctx.lineTo(this.x + i, this.y + wave);
      }
      ctx.stroke();
      const colors = [C.tokenDoc, C.tokenCrm, C.tokenHr, C.tokenErp];
      const labels = ["DOC", "CRM", "HR", "ERP"];
      for (let k = 0; k < 4; k++) {
        const t = (frame * 0.35 + k * 70) % (this.w + 80);
        const px = this.x + t - 40;
        const py = this.y + Math.sin((px + frame) * 0.05) * 8;
        if (px > this.x - 20 && px < this.x + this.w) {
          drawPolyRound(ctx, px - 8, py - 10, 16, 20, 3, colors[k], C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText(labels[k], px, py + 2);
        }
      }
      if (phase > 8 && phase < 12) createBubble(this.x + 80, this.y - 28, "Регламент → навык", 220);
    }
  }

  class McpProtocolRing {
    constructor(hubX, hubY, r) {
      this.hubX = hubX; this.hubY = hubY; this.r = r;
    }
    draw(ctx) {
      const pulse = 0.5 + Math.sin(frame * 0.05) * 0.15;
      ctx.save();
      ctx.strokeStyle = C.indigo;
      ctx.globalAlpha = 0.35 + pulse * 0.2;
      ctx.lineWidth = 2;
      ctx.setLineDash([8, 10]);
      ctx.lineDashOffset = -frame * 0.8;
      ctx.beginPath();
      ctx.arc(this.hubX, this.hubY, this.r * pulse, 0, Math.PI * 2);
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.globalAlpha = 1;
      ctx.fillStyle = C.indigo;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP", this.hubX, this.hubY - this.r * pulse - 6);
      ctx.restore();
    }
  }

  class SkillShelf {
    constructor(x, y) {
      this.x = x; this.y = y;
    }
    draw(ctx) {
      const phase = (frame * 0.04) % 240;
      const labels = ["HR", "Docs", "Отчёты", "CRM"];
      const show = Math.min(4, Math.floor((phase % 240) / 30));
      for (let i = 0; i < show; i++) {
        const ox = this.x - 55 + i * 38;
        drawPolyRound(ctx, ox, this.y + i * 2, 34, 22, 4, C.panel, C.outline);
        ctx.fillStyle = i % 2 ? C.indigo : C.sber;
        ctx.globalAlpha = 0.22;
        drawPolyRound(ctx, ox + 4, this.y + 4 + i * 2, 26, 6, 2, i % 2 ? C.indigo : C.sber, null);
        ctx.globalAlpha = 1;
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(labels[i], ox + 17, this.y + 16 + i * 2);
      }
    }
  }

  class HumanApprovalGate {
    constructor(x, y) {
      this.x = x; this.y = y;
    }
    draw(ctx) {
      const phase = (frame * 0.04) % 240;
      if (phase < 115 || phase > 195) return;
      const local = phase - 115;
      const sy = this.y - 40 + Math.min(1, local / 25) * 35;
      ctx.save();
      ctx.globalAlpha = Math.min(1, local / 15);
      ctx.translate(this.x, sy);
      drawPolyRound(ctx, -22, -14, 44, 28, 6, C.approve, C.outline);
      ctx.fillStyle = "#fff";
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("HITL OK", 0, 2);
      ctx.restore();
      if (local > 20 && local < 24) createBubble(this.x, sy - 30, "Human approval перед CRM", 240);
    }
  }

  class GigaCoworkHub {
    constructor(x, y) {
      this.x = x; this.y = y;
      this.shelf = new SkillShelf(x - 70, y - 55);
    }
    draw(ctx) {
      const phase = (frame * 0.04) % 240;
      const r = 50;
      ctx.fillStyle = C.sber;
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {
        const a = (Math.PI * 2 * i) / 6 - Math.PI / 2;
        const px = this.x + Math.cos(a) * r;
        const py = this.y + Math.sin(a) * r;
        if (i === 0) ctx.moveTo(px, py);
        else ctx.lineTo(px, py);
      }
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
      drawPolyRound(ctx, this.x - 38, this.y - 32, 76, 64, 8, C.panel, C.outline);
      ctx.fillStyle = C.sber;
      ctx.font = "900 11px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("Giga", this.x, this.y - 8);
      ctx.fillStyle = C.indigo;
      ctx.fillText("Cowork", this.x, this.y + 8);
      this.shelf.draw(ctx);
      if (phase >= 175) {
        ctx.fillStyle = C.sber;
        ctx.font = "900 16px sans-serif";
        ctx.fillText("−81,5%", this.x, this.y - 58);
        ctx.font = "bold 9px sans-serif";
        ctx.fillStyle = C.outline;
        ctx.fillText("пилот рутины", this.x, this.y - 44);
        if (phase > 177 && phase < 181) createBubble(this.x, this.y - 72, "Пилот: документы + HR", 260);
      }
    }
  }

  class Agent {
    constructor(x, y, color, role, stepTrig, dialogs) {
      this.x = x; this.y = y;
      this.baseX = x; this.baseY = y;
      this.color = color;
      this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
    }
    draw(ctx) {
      this.timer += 0.03;
      const prg = (frame * 0.04) % 240;
      let isMoving = false;
      let faceDir = 1;
      const hubX = 120;
      const hubY = -70;
      const targetX = hubX + (this.stepTrig % 3) * 8 - 8;
      const targetY = hubY + 22;
      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const local = prg - this.stepTrig;
        if (local < 11) {
          isMoving = true;
          faceDir = 1;
          const t = local / 11;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t + Math.sin(t * Math.PI) * -16;
        } else {
          isMoving = true;
          faceDir = -1;
          const t = (local - 11) / 11;
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX;
        this.y = this.baseY;
      }
      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {
        createBubble(this.x, this.y - 22, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 240);
      }
      let bob = isMoving ? Math.abs(Math.sin(this.timer * 3)) * 2 : Math.sin(this.timer * 1.5);
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
      ctx.restore();
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const river = new RegulamentStream(-300, 95, 480);
  const hub = new GigaCoworkHub(120, -82);
  const ring = new McpProtocolRing(120, -82, 88);
  const gate = new HumanApprovalGate(195, -115);
  entities.push(river, ring, hub, gate);
  entities.push(new Agent(-280, 55, C.agentYellow, "1", 18, ["Регламент на русском", "Навык без кода", "Workspace"]));
  entities.push(new Agent(-200, 115, C.agentGreen, "2", 52, ["MCP → CRM", "Коннектор почты", "Логи с дня 1"]));
  entities.push(new Agent(-110, 35, C.agentBlue, "3", 88, ["Make / n8n", "GigaChat API", "Пилот 14 дней"]));
  entities.push(new Agent(-30, 105, C.agentPink, "4", 124, ["Human-in-the-loop", "152-ФЗ whitelist", "On-prem опция"]));
  entities.push(new Agent(50, 30, C.agentPurple, "5", 158, ["−81,5% рутина", "+80% документы", "Масштаб агентов"]));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function drawStackOrbs(ctx) {
    const items = [
      { label: "Make", x: -190, c: C.indigo },
      { label: "n8n", x: -130, c: "#ec4899" },
      { label: "MCP", x: -70, c: C.sber },
      { label: "API", x: -10, c: "#0ea5e9" }
    ];
    items.forEach((f, i) => {
      const bob = Math.sin(frame * 0.04 + i) * 4;
      ctx.fillStyle = f.c;
      ctx.globalAlpha = f.label === "MCP" ? 1 : 0.5;
      ctx.beginPath();
      ctx.arc(f.x, -145 + bob, f.label === "MCP" ? 13 : 10, 0, Math.PI * 2);
      ctx.fill();
      ctx.globalAlpha = 1;
      ctx.fillStyle = "#fff";
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(f.label, f.x, -142 + bob);
    });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));
    drawStackOrbs(ctx);
    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    for (let i = bubbles.length - 1; i >= 0; i--) {
      const bub = bubbles[i];
      bub.life--;
      if (bub.life <= 0) { bubbles.splice(i, 1); continue; }
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
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(engineloop);
  else engineloop();
})();
</script>
</section>



<section class="ym-section" id="intro" style="padding-top: 72px; padding-bottom: 40px;">
  <div class="ym-container">
    <div class="gcw-intro-grid reveal">
      <div class="gcw-intro-text">
        <p><strong>Коротко:</strong> 19 мая 2026 года Сбер на ЦИПР открыл тестовый доступ к GigaCowork — платформе управления корпоративными ИИ-агентами без разработчиков. Ниже — разбор продукта, пилотных цифр, MCP-интеграций и пошаговый план собрать похожий контур на Make, n8n и GigaChat API вне экосистемы банка.</p>
        <p>GigaCowork — не отдельная LLM, а слой <strong>оркестрации</strong> поверх GigaChat Enterprise. Для рынка это сигнал: «цифровые сотрудники» с governance «из коробки», а не разовые чат-боты.</p>
        <div class="gcw-kpi-chips" aria-hidden="true">
          <span class="gcw-kpi-chip">ЦИПР · 19.05.2026</span>
          <span class="gcw-kpi-chip">−81,5% рутина*</span>
          <span class="gcw-kpi-chip gcw-kpi-chip--accent">MCP · CRM · 1С</span>
        </div>
      </div>
      <div class="gcw-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">agent-pipeline.sh</span>
          </div>
          <div class="ym-mac-body">
            <span class="ym-comment"># контур без экосистемы банка</span><br>
            <span class="ym-command">reglament</span> → skill (RU)<br>
            <span class="ym-command">mcp connect</span> crm erp mail<br>
            <span class="ym-command">human approve</span> --loop<br>
            <span class="ym-command">pilot</span> --days 14 --metric time_saved
          </div>
        </div>
      </div>
    </div>
    <nav class="gcw-toc-wrap reveal delay-100" aria-label="Оглавление">
      <div class="ym-toc">
        <a href="#gigacowork-cipr">GigaCowork</a>
        <a href="#bez-it">Без IT</a>
        <a href="#piloty-roi">Пилоты ROI</a>
        <a href="#mcp-kontur">MCP</a>
        <a href="#governance">Безопасность</a>
        <a href="#sravnenie">Сравнение стеков</a>
        <a href="#plan-make">План Make/n8n</a>
        <a href="#faq">FAQ</a>
      </div>
    </nav>
  </div>
</section>


<section class="ym-section ym-section-alt" id="gigacowork-cipr">
  <div class="ym-container gcw-prose reveal">
    <h2>Что такое GigaCowork и почему это новость ЦИПР-2026</h2>
    <p><strong>Определение:</strong> GigaCowork — платформа Сбера для управления командами корпоративных ИИ-агентов: регламенты описываются на естественном языке, агенты подключаются к CRM, ERP, почте и файлам через MCP-коннекторы, действия выполняются от имени сотрудника с логированием. Тестовый доступ анонсирован 19.05.2026 на форуме «Салют для бизнеса» (ЦИПР-2026); заявка подаётся через сайт «ГигаЧат Бизнес» (GigaChat Enterprise). — <a href="https://habr.com/ru/news/1038518/" target="_blank" rel="noopener noreferrer">Habr</a>, <a href="https://www.cnews.ru/news/line/2026-05-19_sber_otkryl_dostup_k_testirovaniyu" target="_blank" rel="noopener noreferrer">CNews</a></p>
    <p><strong>Итог:</strong> GigaCowork — слой <strong>оркестрации</strong> поверх GigaChat Enterprise и линейки GigaChat Ultra. Крупный игрок продаёт идею «цифровых сотрудников» с governance «из коробки».</p>
    <h3>Workspace, навыки и MCP-коннекторы в тесте</h3>
    <ol>
      <li><strong>Рабочие пространства (workspace)</strong> — изоляция отделов и проектов.</li>
      <li><strong>Навыки (skills)</strong> — регламенты и чек-листы на русском языке.</li>
      <li><strong>MCP-коннекторы</strong> — стандартизированное подключение к CRM, ERP, почте, файлам.</li>
      <li><strong>Контроль доступа</strong> — агент действует от имени сотрудника; все шаги логируются.</li>
    </ol>
    <p>Агенты <strong>сохраняются</strong>, запускаются по команде и <strong>по расписанию</strong> (пример: еженедельная сверка 1С и CRM).</p>
    <h3>Ранний доступ и «Салют для бизнеса»</h3>
    <p>Опрос «Салют для бизнеса» (29.05.2026) среди <strong>308 крупных</strong> компаний: <strong>56%</strong> планируют внедрение ИИ-агентов для офисной рутины. Лидер сценариев — <strong>документооборот и договоры</strong>.</p>
    <div class="ym-bento-grid reveal-scale delay-200">
      <div class="ym-bento-card ym-bento-main">
        <p class="ym-stat-label">Архитектура GigaCowork</p>
        <p style="font-size:18px;font-weight:700;margin:12px 0 0;">workspace → навыки → MCP → логи</p>
        <p style="margin-top:12px;font-size:14px;">Та же схема воспроизводится на Make/n8n с открытыми MCP-серверами и GigaChat API.</p>
      </div>
      <div class="ym-bento-card ym-bento-stat reveal delay-300">
        <div class="ym-stat-value">56%</div>
        <div class="ym-stat-label">компаний хотят агентов</div>
        <span class="ym-stat-trend">опрос 29.05</span>
      </div>
      <div class="ym-bento-card ym-bento-stat reveal delay-400">
        <div class="ym-stat-value">40%</div>
        <div class="ym-stat-label">автоматизация офиса</div>
      </div>
    </div>
  </div>
</section>

<section class="ym-section" id="bez-it">
  <div class="ym-container gcw-prose reveal">
    <h2>ИИ-агенты для бизнеса без разработчиков — что реально значит «без IT»</h2>
    <p><strong>Определение:</strong> владелец процесса описывает регламент на естественном языке, подключает системы через no-code/MCP; разработчик нужен только на этапе первичной настройки коннекторов и политик безопасности. Такой подход — это <strong>ии агенты без программирования</strong> и централизованное <strong>управление ии агентами</strong> в одном workspace.</p>
    <p>Родовой спрос: «ии агент» (~38 642 показов/мес), «ии агенты для бизнеса», «цифровые сотрудники» (~11 000 — оценка Nero). Бренд <strong>gigacowork</strong> пока почти без собственной частотности.</p>
    <h3>Регламенты на русском вместо кода</h3>
    <p>GigaCowork позиционирует <strong>навыки</strong> как замену скриптам. Аналог вне Сбера — цепочки Make или n8n с human approval.</p>
    <h3>Отличие от «создать ии агента» (dev-запросы)</h3>
    <p><strong>Коротко:</strong> если нужен LangChain — другой материал. Если нужно сократить −81,5% рутины в документообороте без отдела разработки — вы в целевой аудитории.</p>
  </div>
</section>

<section id="gigacowork-boris-block" class="gigacowork-boris-viz reveal" aria-label="Визуализация MCP-контура агентов">
<style>
#gigacowork-boris-block {
  --boris-bg: #f8fafc;
  --boris-surface: #ffffff;
  --boris-text: #334155;
  --boris-heading: #0f172a;
  --boris-border: #e2e8f0;
  --boris-accent: #10b981;
  --boris-mcp: #3b82f6;
  --boris-warn: #f59e0b;
  margin: 48px 0 56px;
  font-family: Inter, system-ui, sans-serif;
}
#gigacowork-boris-block .boris-map {
  background: var(--boris-surface);
  border: 1px solid var(--boris-border);
  border-radius: 22px;
  box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
  padding: 28px 32px 32px;
  max-width: 100%;
}
#gigacowork-boris-block .boris-split {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.95fr);
  gap: 28px 36px;
  align-items: center;
}
#gigacowork-boris-block .boris-eyebrow {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: var(--boris-mcp);
  margin: 0 0 10px;
}
#gigacowork-boris-block .boris-kicker {
  font-size: clamp(1.15rem, 2.2vw, 1.45rem);
  font-weight: 800;
  color: var(--boris-heading);
  line-height: 1.25;
  margin: 0 0 14px;
}
#gigacowork-boris-block .boris-lead {
  font-size: 15px;
  line-height: 1.55;
  color: var(--boris-text);
  margin: 0 0 18px;
}
#gigacowork-boris-block .boris-points {
  list-style: none;
  padding: 0;
  margin: 0 0 20px;
}
#gigacowork-boris-block .boris-points li {
  position: relative;
  padding-left: 18px;
  margin-bottom: 10px;
  font-size: 14px;
  line-height: 1.45;
  color: var(--boris-text);
}
#gigacowork-boris-block .boris-points li::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0.55em;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--boris-accent);
}
#gigacowork-boris-block .boris-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 16px;
}
#gigacowork-boris-block .boris-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 999px;
  background: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}
#gigacowork-boris-block .boris-pill--mcp {
  background: #eff6ff;
  color: #1d4ed8;
  border-color: #bfdbfe;
}
#gigacowork-boris-block .boris-bridge {
  font-size: 13px;
  color: #64748b;
  margin: 0;
  border-left: 3px solid var(--boris-accent);
  padding-left: 12px;
}
#gigacowork-boris-block .boris-canvas-wrap {
  position: relative;
  min-height: 400px;
  max-height: 65vh;
  height: clamp(380px, 42vw, 520px);
  border-radius: 18px;
  background: linear-gradient(165deg, #f1f5f9 0%, #ffffff 55%, #eff6ff 100%);
  border: 1px solid var(--boris-border);
  overflow: hidden;
}
#gigacowork-boris-block #gigacowork-boris-mcp-canvas {
  display: block;
  width: 100%;
  height: 100%;
}
#gigacowork-boris-block .boris-canvas-caption {
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: 10px;
  display: flex;
  justify-content: space-between;
  gap: 8px;
  font-size: 10px;
  font-weight: 600;
  color: #64748b;
  pointer-events: none;
}
@media (max-width: 1023px) {
  #gigacowork-boris-block .boris-split {
    grid-template-columns: 1fr;
  }
  #gigacowork-boris-block .boris-canvas-wrap {
    min-height: 360px;
    max-height: 480px;
  }
}
@media (max-width: 767px) {
  #gigacowork-boris-block .boris-map {
    padding: 22px 18px 24px;
  }
}
</style>
<div class="ym-container">
  <div class="boris-map">
    <div class="boris-split">
      <div class="boris-copy">
        <p class="boris-eyebrow">MCP · интеграции</p>
        <h3 class="boris-kicker">Разъём между агентом и вашими системами</h3>
        <p class="boris-lead">GigaCowork заявляет MCP к CRM, ERP, почте и файлам — не «ещё один чат», а шина контекста. Ниже в статье разберём пилоты; здесь — как выглядит поток данных до согласования человеком.</p>
        <ul class="boris-points">
          <li>Один MCP-сервер — одинаковый доступ для GigaChat, Make/n8n и локальной LLM</li>
          <li>Навык (регламент) задаёт, какие инструменты агент может вызвать</li>
          <li>Human-in-the-loop: действие в CRM только после «Одобрить»</li>
        </ul>
        <div class="boris-pills" aria-hidden="true">
          <span class="boris-pill">−81,5% рутина*</span>
          <span class="boris-pill boris-pill--mcp">10k+ MCP-серверов</span>
          <span class="boris-pill">логи с 1-го дня</span>
        </div>
        <p class="boris-bridge">Дальше — цифры пилотов Сбера и сценарии документооборота, поддержки и HR.</p>
      </div>
      <div class="boris-canvas-wrap">
        <canvas id="gigacowork-boris-mcp-canvas" role="img" aria-label="Анимация: MCP-хаб соединяет CRM, ERP, почту и 1С; агент ждёт одобрения человека"></canvas>
        <div class="boris-canvas-caption">
          <span>регламент → навык</span>
          <span>MCP → системы</span>
          <span>человек → approval</span>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
(function gigacoworkBorisMcpEngine() {
  const canvas = document.getElementById("gigacowork-boris-mcp-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, frame = 0, scale = 1;

  const C = {
    outline: "#0f172a",
    hub: "#3b82f6",
    hubLight: "#93c5fd",
    line: "#94a3b8",
    pulse: "#10b981",
    pulseAlt: "#f59e0b",
    nodeBg: "#ffffff",
    nodeBorder: "#cbd5e1",
    approval: "#fef3c7",
    approvalBorder: "#f59e0b",
    text: "#475569",
    agentColors: ["#eab308", "#10b981", "#3b82f6", "#ec4899", "#8b5cf6"]
  };

  const nodes = [
    { id: "crm", label: "CRM", angle: -1.15, color: "#dbeafe" },
    { id: "erp", label: "ERP", angle: -0.35, color: "#e0e7ff" },
    { id: "mail", label: "Почта", angle: 0.45, color: "#fce7f3" },
    { id: "files", label: "1С / файлы", angle: 1.25, color: "#ecfdf5" }
  ];

  const pulses = [];
  const skillPills = [
    { text: "навык: договор", phase: 0 },
    { text: "MCP read", phase: 40 },
    { text: "human ✓", phase: 90 }
  ];

  function resize() {
    const wrap = canvas.parentElement;
    if (!wrap) return;
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    cw = wrap.clientWidth;
    ch = wrap.clientHeight;
    canvas.width = Math.floor(cw * dpr);
    canvas.height = Math.floor(ch * dpr);
    canvas.style.width = cw + "px";
    canvas.style.height = ch + "px";
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    scale = cw < 420 ? cw / 420 : Math.min(cw / 560, 1);
  }

  function hubPos() {
    return { x: cw * 0.5, y: ch * 0.48 };
  }

  function nodePos(angle) {
    const hub = hubPos();
    const r = Math.min(cw, ch) * (0.34 + 0.04 * Math.sin(frame * 0.02));
    return {
      x: hub.x + Math.cos(angle) * r,
      y: hub.y + Math.sin(angle) * r * 0.85
    };
  }

  function drawRoundRect(x, y, w, h, r, fill, stroke) {
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else ctx.rect(x, y, w, h);
    ctx.fillStyle = fill;
    ctx.fill();
    if (stroke) {
      ctx.strokeStyle = stroke;
      ctx.lineWidth = 2;
      ctx.stroke();
    }
  }

  class McpHub {
    draw() {
      const hub = hubPos();
      const r = 36 * scale;
      const pulse = 4 + Math.sin(frame * 0.08) * 3;
      ctx.beginPath();
      ctx.arc(hub.x, hub.y, r + pulse, 0, Math.PI * 2);
      ctx.fillStyle = "rgba(59, 130, 246, 0.12)";
      ctx.fill();
      drawRoundRect(hub.x - r, hub.y - r, r * 2, r * 2, 12, C.hub, C.outline);
      ctx.fillStyle = "#fff";
      ctx.font = "bold " + Math.round(11 * scale) + "px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP", hub.x, hub.y - 4 * scale);
      ctx.font = Math.round(9 * scale) + "px Inter, sans-serif";
      ctx.fillText("HUB", hub.x, hub.y + 10 * scale);
    }
  }

  class ConnectorNode {
    constructor(cfg) {
      this.cfg = cfg;
    }
    draw() {
      const p = nodePos(this.cfg.angle);
      const w = 72 * scale;
      const h = 40 * scale;
      drawRoundRect(p.x - w / 2, p.y - h / 2, w, h, 8, this.cfg.color || C.nodeBg, C.nodeBorder);
      ctx.fillStyle = C.text;
      ctx.font = "600 " + Math.round(10 * scale) + "px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.cfg.label, p.x, p.y + 4 * scale);
      const hub = hubPos();
      ctx.strokeStyle = C.line;
      ctx.lineWidth = 1.5;
      ctx.setLineDash([6, 6]);
      ctx.lineDashOffset = -frame * 0.6;
      ctx.beginPath();
      ctx.moveTo(hub.x, hub.y);
      ctx.lineTo(p.x, p.y);
      ctx.stroke();
      ctx.setLineDash([]);
    }
  }

  class DataPulse {
    constructor(fromAngle, delay) {
      this.fromAngle = fromAngle;
      this.t = delay;
      this.speed = 0.012 + Math.random() * 0.006;
    }
    update() {
      this.t += this.speed;
      if (this.t > 1) this.t = 0;
    }
    draw() {
      const hub = hubPos();
      const from = nodePos(this.fromAngle);
      const x = from.x + (hub.x - from.x) * this.t;
      const y = from.y + (hub.y - from.y) * this.t;
      ctx.beginPath();
      ctx.arc(x, y, 5 * scale, 0, Math.PI * 2);
      ctx.fillStyle = this.t > 0.55 ? C.pulseAlt : C.pulse;
      ctx.fill();
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 1;
      ctx.stroke();
    }
  }

  class ApprovalGate {
    draw() {
      const hub = hubPos();
      const x = hub.x;
      const y = ch * 0.78;
      const w = 120 * scale;
      const h = 44 * scale;
      const blink = frame % 120 < 60;
      drawRoundRect(x - w / 2, y - h / 2, w, h, 10, blink ? C.approval : "#fff7ed", C.approvalBorder);
      ctx.fillStyle = C.outline;
      ctx.font = "600 " + Math.round(10 * scale) + "px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(blink ? "Одобрить → CRM" : "Ждёт человека", x, y + 4 * scale);
      ctx.strokeStyle = C.approvalBorder;
      ctx.lineWidth = 2;
      ctx.beginPath();
      ctx.moveTo(hub.x, hub.y + 36 * scale);
      ctx.lineTo(x, y - h / 2);
      ctx.stroke();
    }
  }

  class MicroAgent {
    constructor(colorIndex, x, y) {
      this.color = C.agentColors[colorIndex % 5];
      this.x = x;
      this.y = y;
      this.bob = Math.random() * Math.PI * 2;
    }
    draw() {
      const by = this.y + Math.sin(frame * 0.06 + this.bob) * 3;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(this.x, by, 10 * scale, 0, Math.PI * 2);
      ctx.fill();
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.stroke();
      ctx.fillStyle = "#fff";
      ctx.beginPath();
      ctx.arc(this.x - 3 * scale, by - 2 * scale, 2 * scale, 0, Math.PI * 2);
      ctx.arc(this.x + 3 * scale, by - 2 * scale, 2 * scale, 0, Math.PI * 2);
      ctx.fill();
    }
  }

  const hub = new McpHub();
  const connectors = nodes.map((n) => new ConnectorNode(n));
  const gate = new ApprovalGate();
  const agents = [
    new MicroAgent(0, 0, 0),
    new MicroAgent(2, 0, 0)
  ];

  nodes.forEach((n, i) => {
    pulses.push(new DataPulse(n.angle, i * 0.22));
  });

  function drawSkillPills() {
    const hub = hubPos();
    skillPills.forEach((pill, i) => {
      const phase = (frame + pill.phase) % 140;
      if (phase > 100) return;
      const alpha = phase < 20 ? phase / 20 : phase > 80 ? (100 - phase) / 20 : 1;
      const x = hub.x - 90 * scale + i * 58 * scale;
      const y = hub.y - 70 * scale - Math.sin(frame * 0.05 + i) * 4;
      ctx.globalAlpha = alpha;
      drawRoundRect(x, y, 52 * scale, 18 * scale, 9, "#ffffff", C.nodeBorder);
      ctx.fillStyle = C.text;
      ctx.font = Math.round(8 * scale) + "px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(pill.text, x + 26 * scale, y + 12 * scale);
      ctx.globalAlpha = 1;
    });
  }

  function positionAgents() {
    const hub = hubPos();
    agents[0].x = hub.x - 55 * scale;
    agents[0].y = hub.y + 55 * scale;
    agents[1].x = hub.x + 50 * scale;
    agents[1].y = hub.y + 50 * scale;
  }

  function loop() {
    ctx.clearRect(0, 0, cw, ch);
    positionAgents();
    connectors.forEach((c) => c.draw());
    hub.draw();
    pulses.forEach((p) => {
      p.update();
      p.draw();
    });
    drawSkillPills();
    agents.forEach((a) => a.draw());
    gate.draw();
    frame++;
    requestAnimationFrame(loop);
  }

  window.addEventListener("resize", resize);
  resize();
  loop();
})();
</script>
</section>

<section class="ym-section ym-section-alt" id="piloty-roi">
  <div class="ym-container gcw-prose reveal">
    <h2>Пилоты Сбера: цифры ROI по документам, HR и отчётности</h2>
    <p><strong>Важно:</strong> метрики ниже — <strong>внутренние пилоты Сбера</strong>, не независимый бенчмарк. Используйте цифры как <strong>верхнюю границу</strong> гипотезы.</p>
    <table>
      <thead><tr><th>Метрика</th><th>Значение</th><th>Источник</th></tr></thead>
      <tbody>
        <tr><td>Скорость обработки документов</td><td><strong>+80%</strong></td><td>Habr, CNews</td></tr>
        <tr><td>Рабочее время на задачу</td><td><strong>−81,5%</strong></td><td>Белевцев</td></tr>
        <tr><td>HR-процессы</td><td><strong>−83%</strong></td><td>CNews</td></tr>
        <tr><td>Отчётность</td><td><strong>+70%</strong></td><td>CNews</td></tr>
        <tr><td>Поиск кандидатов</td><td><strong>+93%</strong></td><td>Habr</td></tr>
      </tbody>
    </table>
    <h3>Микрокейсы с замером времени</h3>
    <ul>
      <li>Смена условий оплаты: <strong>2–3 часа → ~10 минут</strong></li>
      <li>Юридическая проверка: <strong>1–2 часа → несколько минут</strong></li>
      <li>Сверка 1С + CRM <strong>по расписанию</strong> агентом</li>
    </ul>
    <h3>Как перенести метрики на свой пилот (3–5 воронок)</h3>
    <p><strong>Шаблон замера (14 дней):</strong> один процесс → baseline → «навык» → MCP/Make → 10–20 прогонов.</p>
    <table>
      <thead><tr><th>Воронка</th><th>Что автоматизировать</th><th>Метрика</th></tr></thead>
      <tbody>
        <tr><td>HR</td><td>Скрининг, поиск в базе</td><td>Время на вакансию</td></tr>
        <tr><td>Документооборот</td><td>Сверка, шаблоны</td><td>Цикл согласования</td></tr>
        <tr><td>Отчётность</td><td>KPI из CRM + таблиц</td><td>Часы аналитика</td></tr>
        <tr><td>Поддержка</td><td>Классификация, черновики</td><td>FCR, TTR</td></tr>
        <tr><td>Закупки</td><td>Маршрут согласования</td><td>Просрочки</td></tr>
      </tbody>
    </table>
    <p><strong>Итог:</strong> достаточно <strong>−30%</strong> времени на одном процессе при контролируемых рисках, чтобы окупить стек.</p>
    <aside id="nero-cta-primary" class="ym-card reveal ym-promo-cta" aria-label="Предложение Nero Network">
  <h3 class="ym-promo-cta__title">Соберём пилот «как GigaCowork» на вашем стеке</h3>
  <p class="ym-promo-cta__text">Одна воронка за 2–4 недели: Make или n8n, MCP к CRM/почте, GigaChat API и governance по чек-листу из статьи. Nero Network проектирует сценарий и метрики «до/после».</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-primary" href="https://t.me/gorbachevzd" target="_blank" rel="noopener noreferrer"><span>Получить AI-аудит</span></a>  <!-- pragma: allowlist secret -->
  </div>
</aside>
  </div>
</section>

<section class="ym-section" id="mcp-kontur">
  <div class="ym-container gcw-prose reveal">
    <h2>MCP в корпоративном контуре: CRM, ERP, почта, документы</h2>
    <p><strong>MCP (Model Context Protocol)</strong> — открытый стандарт для подключения LLM к CRM, почте, файлам, API. В декабре 2025 передан в Linux Foundation / AAIF; <strong>97M+</strong> загрузок SDK, <strong>10 000+</strong> публичных MCP-серверов.</p>
    <h3>Model Context Protocol простыми словами для руководителя</h3>
    <p><strong>Коротко для CEO/COO:</strong> MCP — «универсальный разъём» между нейросетью и вашими системами.</p>
    <h3>Сценарии: документооборот, поддержка, отчёты</h3>
    <table>
      <thead><tr><th>Сценарий</th><th>MCP / интеграция</th><th>Human-in-the-loop</th></tr></thead>
      <tbody>
        <tr><td>Документооборот</td><td>Файлы + CRM</td><td>Юрист утверждает правки</td></tr>
        <tr><td>Поддержка</td><td>Тикеты + база знаний</td><td>Оператор отправляет ответ</td></tr>
        <tr><td>Отчёты</td><td>CRM + таблицы</td><td>Финдиректор подписывает</td></tr>
        <tr><td>HR</td><td>ATS + почта</td><td>Рекрутер приглашает</td></tr>
      </tbody>
    </table>
    <p>Конкурент-слой: <strong>Alice AI LLM Flash</strong> (28.05.2026) — модель для документов, не платформа агентов.</p>
  </div>
</section>

<section class="ym-section ym-section-alt" id="governance">
  <div class="ym-container gcw-prose reveal">
    <h2>Безопасность и governance: доступы, логи, human-in-the-loop</h2>
    <p><strong>Governance</strong> — кто запускает агента, какие системы доступны, что логируется, где обязательно согласие человека.</p>
    <ul>
      <li>Действия <strong>от имени сотрудника</strong></li>
      <li><strong>Логирование</strong> всех шагов</li>
      <li><strong>Human-in-the-loop</strong> перед необратимыми действиями</li>
      <li>Развёртывание: облако, гибрид, <strong>on-premise</strong></li>
    </ul>
    <h3>Чек-лист governance для МСБ</h3>
    <ul class="gcw-checklist">
      <li>Матрица ролей: кто создаёт «навыки», кто запускает, кто аудирует</li>
      <li>Whitelist действий агента</li>
      <li>Логи с retention по политике ПДн</li>
      <li>DPA с провайдером LLM</li>
      <li>Тест на утечку в публичные модели</li>
    </ul>
    <h3>Итеративное обучение агентов на знаниях компании</h3>
    <p>Обучение — не разовая загрузка PDF, а <strong>итерации</strong> после ошибок. Аналог в Make/n8n: версионирование сценариев + RAG. Практический курс по автоматизации на Make/n8n — в программе <a href="https://meta-journal.ru/" target="_blank" rel="noopener noreferrer">Посмотреть, что можно автоматизировать</a>; это ускоряет итерации «навыков» без найма отдельного отдела разработки.</p>  <!-- pragma: allowlist secret -->
    <p><strong>Итог:</strong> без governance автоматизация ускоряет не работу, а инциденты.</p>
    <aside id="nero-cta-governance" class="ym-card reveal ym-promo-cta" aria-label="Предложение Nero Network">
  <h3 class="ym-promo-cta__title">Аудит доступов и логов перед запуском агента</h3>
  <p class="ym-promo-cta__text">Проверим матрицу ролей, whitelist действий и хранение логов под 152-ФЗ — затем запустим MVP без «ускорения инцидентов».</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-primary" href="https://t.me/gorbachevzd" target="_blank" rel="noopener noreferrer"><span>Получить AI-аудит</span></a>  <!-- pragma: allowlist secret -->
  </div>
</aside>
  </div>
</section>

<section class="ym-section" id="sravnenie">
  <div class="ym-container gcw-prose reveal">
    <h2>GigaCowork vs Claude Cowork vs стек Make/n8n</h2>
    <table>
      <thead><tr><th>Ось</th><th>GigaCowork</th><th>Claude Cowork</th><th>Make / n8n + GigaChat</th></tr></thead>
      <tbody>
        <tr><td>Данные в РФ</td><td>Экосистема Сбера, on-prem</td><td>Ограничения для РФ B2B</td><td>Зависит от хостинга</td></tr>
        <tr><td>No-code</td><td>Навыки на русском</td><td>Desktop + MCP</td><td>Сценарии + модули</td></tr>
        <tr><td>Команды агентов</td><td>Workspace, расписание</td><td>Cowork sessions</td><td>Оркестратор</td></tr>
        <tr><td>MCP</td><td>CRM, ERP, почта</td><td>Google, HubSpot</td><td>Открытые серверы</td></tr>
        <tr><td>ROI</td><td>Пилоты Сбера</td><td>Кейсы Anthropic</td><td>Ваш пилот 14 дней</td></tr>
        <tr><td>Стоимость (3 года)</td><td>Enterprise</td><td>Подписка + compliance</td><td>МСБ 5–15 млн ₽*</td></tr>
      </tbody>
    </table>
    <h3>Когда что выбирать</h3>
    <table>
      <thead><tr><th>Ситуация</th><th>Рекомендация</th></tr></thead>
      <tbody>
        <tr><td>Уже на GigaChat Enterprise</td><td>Тест GigaCowork</td></tr>
        <tr><td>МСБ, смешанный стек</td><td>Make/n8n + MCP + GigaChat API</td></tr>
        <tr><td>Только дешевая модель для текстов</td><td>Alice Flash / API</td></tr>
        <tr><td>Dev-команда, CI/CD</td><td>Cursor Automations</td></tr>
      </tbody>
    </table>
  </div>
</section>

<section class="ym-section ym-section-alt" id="plan-make">
  <div class="ym-container gcw-prose reveal">
    <h2>Пошаговый план: собрать аналог на Make, n8n и GigaChat API</h2>
    <p><strong>Схема:</strong> регламент → навык → MCP → человек (approval).</p>
    <div class="ym-grid-2-cards">
      <div class="ym-card reveal delay-100">
        <h3>HR</h3>
        <p>Триггер: резюме в ATS. Агент ранжирует; human приглашает на интервью. Ориентир: до +93% поиска (Сбер).</p>
      </div>
      <div class="ym-card reveal delay-200">
        <h3>Документооборот</h3>
        <p>Триггер: договор в почте. Сверка с шаблоном. Кейс: 2–3 ч → ~10 мин.</p>
      </div>
      <div class="ym-card reveal delay-300">
        <h3>Отчётность</h3>
        <p>Расписание пн 09:00. CRM + свод в таблицу. Пилот: +70% скорости.</p>
      </div>
      <div class="ym-card reveal delay-400">
        <h3>Поддержка</h3>
        <p>Новый тикет → классификация и черновик из базы знаний.</p>
      </div>
    </div>
    <h3>Чек-лист пилота на 2–4 недели</h3>
    <div class="ym-timeline">
      <div class="ym-step reveal"><div class="ym-step-num">1</div><div class="ym-step-content"><h3>Неделя 1</h3><p>Процесс, baseline, регламент, матрица доступов.</p></div></div>
      <div class="ym-step reveal delay-100"><div class="ym-step-num">2</div><div class="ym-step-content"><h3>Неделя 2</h3><p>MVP, 5 прогонов, правки «навыка».</p></div></div>
      <div class="ym-step reveal delay-200"><div class="ym-step-num">3</div><div class="ym-step-content"><h3>Неделя 3</h3><p>10–20 прогонов, медиана времени, аудит логов.</p></div></div>
      <div class="ym-step reveal delay-300"><div class="ym-step-num">4</div><div class="ym-step-content"><h3>Неделя 4</h3><p>Scale / stop; документ ROI.</p></div></div>
    </div>
    <aside class="ym-card reveal ym-promo-cta ym-promo-cta--secondary" aria-label="Обучение автоматизации">
  <h3 class="ym-promo-cta__title">Освоить Make, n8n и MCP на практике</h3>
  <p class="ym-promo-cta__text">Перед масштабированием агентов команде нужны навыки: регламенты в сценариях, human-in-the-loop, отладка коннекторов.</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-secondary" href="https://meta-journal.ru/" target="_blank" rel="noopener noreferrer"><span>Посмотреть, что можно автоматизировать</span></a>  <!-- pragma: allowlist secret -->
  </div>
</aside>
    <p><strong>Итог:</strong> gigacowork как ориентир, Make/n8n как исполнение — без зависимости от банковской экосистемы.</p>
  </div>
</section>

<aside id="nero-cta-pre-faq" class="ym-card reveal ym-promo-cta" aria-label="Предложение Nero Network">
  <h3 class="ym-promo-cta__title">Готовы повторить контур GigaCowork вне экосистемы банка?</h3>
  <p class="ym-promo-cta__text">Обсудим вашу воронку (документы, HR, отчёты или поддержка), стек и срок пилота — с фиксацией baseline и целевой метрики на 14 дней.</p>
  <div class="ym-btn-group ym-promo-cta__actions">
    <a class="ym-btn ym-btn-primary" href="https://t.me/gorbachevzd" target="_blank" rel="noopener noreferrer"><span>Получить AI-аудит</span></a>  <!-- pragma: allowlist secret -->
  </div>
</aside>

<section class="ym-section" id="faq">
  <div class="ym-container reveal">
    <h2 class="ym-section-title">FAQ по GigaCowork и корпоративным ИИ-агентам</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar">
        <p style="font-weight:700;margin:0 0 16px;">Вопросы</p>
        <ul class="ym-faq-list">
          <li><a href="#faq-dev">Программисты</a></li>
          <li><a href="#faq-cost">Стоимость</a></li>
          <li><a href="#faq-bot">Чат-бот vs агент</a></li>
          <li><a href="#faq-simple">Простыми словами</a></li>
          <li><a href="#faq-diy">Без Сбера</a></li>
          <li><a href="#faq-rf">Claude vs РФ</a></li>
          <li><a href="#faq-enterprise">GigaChat Enterprise</a></li>
        </ul>
      </aside>
      <div>
        <article class="ym-faq-item" id="faq-dev"><h3>Нужны ли программисты?</h3><p>Для навыков GigaCowork Сбер заявляет управление без разработчиков. IT нужен на MCP, SSO и политиках — обычно <strong>2–10 дней</strong> на пилот. На Make/n8n бизнес ведёт сценарий; разработчик — коннекторы и on-prem.</p></article>
        <article class="ym-faq-item" id="faq-cost"><h3>Сколько стоит и как окупается?</h3><p>Прайс GigaCowork в тесте не детализирован. Ориентир рынка: малый бизнес <strong>5–15 млн ₽</strong> за 3 года (Axenix/МГУ). Окупаемость считайте на <strong>одном процессе</strong>: MVP часто <strong>сотни тысяч – 2 млн ₽</strong>.</p></article>
        <article class="ym-faq-item" id="faq-bot"><h3>Чем отличается от чат-бота?</h3><p>Чат-бот отвечает в диалоге. <strong>ИИ-агент</strong> выполняет цепочку в CRM, почте, файлах по регламенту, по расписанию, с логами и human approval.</p></article>
        <article class="ym-faq-item" id="faq-simple"><h3>Что такое GigaCowork простыми словами?</h3><p>Корпоративная «панель управления» ИИ-агентами Сбера: регламенты → навыки → MCP → контроль человеком. Тест с 19.05.2026.</p></article>
        <article class="ym-faq-item" id="faq-diy"><h3>Можно ли повторить без Сбера?</h3><p>Да: workspace / навыки / MCP / логи на Make, n8n, GigaChat API и открытых MCP-серверах.</p></article>
        <article class="ym-faq-item" id="faq-rf"><h3>GigaCowork или Claude Cowork для РФ?</h3><p>Для данных в РФ чаще GigaCowork, Yandex AI Studio или on-prem + открытый оркестратор. Claude — ориентир по UX, с ограничениями compliance.</p></article>
        <article class="ym-faq-item" id="faq-enterprise"><h3>Как связаны gigachat для бизнеса и GigaCowork?</h3><p>GigaChat Enterprise — агенты и API; GigaCowork — слой управления <strong>несколькими</strong> агентами, workspace и MCP без кода.</p></article>
      </div>
    </div>
    <p class="gcw-prose reveal" style="margin-top:48px;text-align:left;"><strong>Итог страницы:</strong> инфоповод GigaCowork подтверждает спрос на <strong>ии агенты для бизнеса</strong>. Практичный путь — 14-дневный пилот на одной воронке на Make/n8n + MCP + GigaChat API с governance из материала.</p>
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
  "headline": "GigaCowork: ИИ-агенты для бизнеса без программистов — Make, MCP",
  "description": "Сбер открыл GigaCowork на ЦИПР-2026: агенты по регламентам, MCP к CRM и пилоты до −81,5% рутины. Как собрать такой контур на Make, n8n и GigaChat без экосистемы банка.",
  "datePublished": "2026-06-01",
  "dateModified": "2026-06-01",
  "author": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Nero Network"
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://meta-journal.ru/gigacowork-ii-agenty-biznes-bez-programmistov/"  <!-- pragma: allowlist secret -->
  },
  "inLanguage": "ru-RU",
  "keywords": "gigacowork, ии агенты для бизнеса, mcp автоматизация, make n8n"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Нужны ли программисты для ИИ-агентов в бизнесе?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для навыков GigaCowork Сбер заявляет управление без разработчиков. IT нужен на MCP, SSO и политиках — обычно 2–10 дней на пилот. На Make/n8n бизнес ведёт сценарий; разработчик — коннекторы и on-prem."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько стоит внедрение ИИ-агентов и как окупается?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ориентир рынка: малый бизнес 5–15 млн ₽ за 3 года. Окупаемость считайте на одном процессе: MVP часто сотни тысяч – 2 млн ₽."
      }
    },
    {
      "@type": "Question",
      "name": "Чем ИИ-агент отличается от чат-бота?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Чат-бот отвечает в диалоге. ИИ-агент выполняет цепочку в CRM, почте, файлах по регламенту, по расписанию, с логами и human approval."
      }
    },
    {
      "@type": "Question",
      "name": "Что такое GigaCowork простыми словами?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Корпоративная панель управления ИИ-агентами Сбера: регламенты → навыки → MCP → контроль человеком. Тест с 19.05.2026."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли повторить GigaCowork без экосистемы Сбера?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да: workspace, навыки, MCP и логи на Make, n8n, GigaChat API и открытых MCP-серверах."
      }
    },
    {
      "@type": "Question",
      "name": "GigaCowork или Claude Cowork для компаний в РФ?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Для данных в РФ чаще GigaCowork, Yandex AI Studio или on-prem с открытым оркестратором. Claude — ориентир по UX с ограничениями compliance."
      }
    },
    {
      "@type": "Question",
      "name": "Как связаны GigaChat для бизнеса и GigaCowork?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "GigaChat Enterprise — агенты и API; GigaCowork — слой управления несколькими агентами, workspace и MCP без кода."
      }
    }
  ]
}
</script>


<?php
get_footer();
