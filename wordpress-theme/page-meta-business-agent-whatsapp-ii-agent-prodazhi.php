<?php
/**
 * Template Name: Meta Business Agent WhatsApp II Agent Prodazhi
 * Description: Longread — Meta Business Agent в WhatsApp, внедрение ИИ-агента для продаж.
 */

$page_seo_title = 'Meta Business Agent в WhatsApp: ИИ-агент для продаж и CRM';
$page_seo_description = 'Релиз Meta Business Agent в WhatsApp (июнь 2026): функции, цены, лимиты для РФ. Как внедрить ИИ-агента для продаж и поддержки в WhatsApp, Telegram, MAX и CRM за 2–4 недели — аналог, ROI, интеграции.';

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


$nero_primary_cta_url = getenv('PRIMARY_CTA_URL') ?: '#cta-final';
$nero_primary_cta_label = getenv('PRIMARY_CTA_LABEL') ?: 'Обсудить внедрение';
$nero_secondary_cta_url = getenv('SECONDARY_CTA_URL') ?: $nero_primary_cta_url;
$nero_secondary_cta_label = getenv('SECONDARY_CTA_LABEL') ?: 'Обучение команды';


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
.meta-business-agent-whatsapp-ii-agent-prodazhi-page {
    overflow-x: hidden;
}

/* METRIKA SKILL PREMIUM THEME & ANIMATIONS */
:root {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #22c55e;
    --ym-accent: #2563eb;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(34, 197, 94, 0.15);
}

.meta-business-agent-whatsapp-ii-agent-prodazhi-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.meta-business-agent-whatsapp-ii-agent-prodazhi-page h1,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page h2,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page h3,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page h4,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page h5,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-whatsapp-ii-agent-prodazhi-page p,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page li,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.meta-business-agent-whatsapp-ii-agent-prodazhi-page strong,
.meta-business-agent-whatsapp-ii-agent-prodazhi-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.meta-business-agent-whatsapp-ii-agent-prodazhi-page pre, .meta-business-agent-whatsapp-ii-agent-prodazhi-page code {
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
    background: rgba(34, 197, 94, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(34, 197, 94, 0.2);
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
    background: linear-gradient(90deg, #22c55e, #16a34a);
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
    box-shadow: 0 10px 20px -5px rgba(34, 197, 94, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(34, 197, 94, 0.5);
    background: #15803d;
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
    border-color: rgba(34, 197, 94, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(34, 197, 94, 0.05);
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
#meta-ba-hero.meta-ba-hero.fullscreen-white-office {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.meta-ba-hero .hero-copy-block {
  background: linear-gradient(135deg, rgba(248,250,252,0.97) 0%, rgba(248,250,252,0.88) 100%);
  backdrop-filter: blur(8px);
  padding: clamp(16px, 3vw, 28px);
  border-radius: 20px;
  border: 1px solid rgba(226, 232, 240, 0.9);
  box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
  max-width: min(680px, 92vw);
}
.meta-ba-hero .vl-ui-pill,
.meta-ba-hero .vl-ui-tasks {
  pointer-events: none;
}
@media (max-width: 900px) {
  .meta-ba-hero .vl-ui-pill { display: none; }
  .meta-ba-hero .vl-ui-tasks {
    position: relative;
    right: auto;
    bottom: auto;
    left: auto;
    margin: 16px;
    order: 3;
  }
  #meta-ba-hero.meta-ba-hero.fullscreen-white-office {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    padding-top: 72px;
    min-height: auto;
    padding-bottom: 24px;
  }
  .meta-ba-hero .hero-copy-block {
    position: relative;
    top: auto;
    bottom: auto;
    left: auto;
    margin: 0 16px 16px;
    order: 1;
  }
  .meta-ba-hero #meta-ba-hero-canvas {
    position: absolute;
    inset: 0;
    height: 280px;
    opacity: 0.35;
  }
}
.meta-ba-intro-wrap { padding: 48px 0 24px; }
.meta-ba-intro-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: start;
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 20px;
}
.meta-ba-intro-text {
  text-align: left !important;
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #22c55e, #2563eb) 1;
  padding-left: 24px;
}
.meta-ba-intro-text p { text-align: left !important; }
.meta-ba-intro-lead { font-size: 18px; line-height: 1.65; color: #334155 !important; margin: 0 0 16px; }
.meta-ba-intro-sub { font-size: 15px; line-height: 1.6; color: #64748b !important; margin: 0; }
.meta-ba-toc-wrap { text-align: center; padding: 8px 20px 40px; }
.meta-ba-prose { max-width: 900px; margin: 0 auto; }
.meta-ba-prose h2 { font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; margin: 0 0 20px; color: #0f172a !important; }
.meta-ba-prose h3 { font-size: 1.15rem; font-weight: 700; margin: 28px 0 12px; color: #0f172a !important; }
.meta-ba-prose p, .meta-ba-prose li { line-height: 1.65; margin-bottom: 16px; }
.meta-ba-prose ul { padding-left: 1.25rem; margin-bottom: 20px; }
.meta-ba-prose table { width: 100%; border-collapse: collapse; margin: 24px 0; font-size: 14px; }
.meta-ba-prose th, .meta-ba-prose td { border: 1px solid #e2e8f0; padding: 12px 14px; text-align: left; vertical-align: top; }
.meta-ba-prose th { background: #f8fafc; font-weight: 700; }
.meta-ba-prose hr { border: 0; border-top: 1px solid #e2e8f0; margin: 32px 0; }
.meta-ba-prose a { color: #2563eb; }
.boris-viz-wrap { margin: 48px 0; }
.boris-viz-wrap .ym-container { padding: 0; max-width: 1300px; margin: 0 auto; padding-left: 20px; padding-right: 20px; }
@media (max-width: 900px) {
  .meta-ba-intro-grid { grid-template-columns: 1fr; }
}

</style>

<main id="primary" class="site-main meta-business-agent-whatsapp-ii-agent-prodazhi-page" role="main" tabindex="-1">
<span id="main" tabindex="-1" class="ym-skip-target" aria-hidden="true" style="position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0"></span>

<section id="meta-ba-hero" class="fullscreen-white-office meta-ba-hero" aria-label="ИИ-агент в мессенджерах">
<style>
.meta-ba-hero.fullscreen-white-office {
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}
.meta-ba-hero #meta-ba-hero-canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.meta-ba-hero .hero-copy-block {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(640px, 92vw);
  z-index: 4;
}
.meta-ba-hero .giant-seo {
  font-size: clamp(32px, 4.8vw, 64px);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -1.5px;
  color: #0f172a;
  margin: 0;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
}
.meta-ba-hero .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #22c55e, #3b82f6, #8b5cf6);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.meta-ba-hero .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 20px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 16px 0 0;
  max-width: 620px;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
}
.meta-ba-hero .telegram-button {
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
  font-family: system-ui, sans-serif;
}
.meta-ba-hero .telegram-button:hover { transform: translateY(-2px); }
.meta-ba-hero .vl-ui-tasks {
  position: absolute;
  right: clamp(12px, 3vw, 48px);
  bottom: clamp(80px, 12vh, 160px);
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 4;
}
.meta-ba-hero .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 18px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(15,23,42,0.06);
  font-family: system-ui, sans-serif;
}
.meta-ba-hero .vl-ui-task span {
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #22c55e, #3b82f6);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 800;
  flex-shrink: 0;
}
.meta-ba-hero .vl-ui-pill {
  position: absolute;
  top: clamp(72px, 10vh, 120px);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
  z-index: 4;
  max-width: 96vw;
}
.meta-ba-hero .vl-ui-pill span {
  padding: 10px 18px;
  background: rgba(255,255,255,0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 10px rgba(15,23,42,0.05);
  font-family: system-ui, sans-serif;
}
@media (max-width: 900px) {
  .meta-ba-hero .hero-copy-block {
    bottom: auto;
    top: clamp(100px, 14vh, 140px);
    left: 16px;
    right: 16px;
    max-width: none;
  }
  .meta-ba-hero .vl-ui-tasks {
    right: 16px;
    left: 16px;
    bottom: 24px;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-end;
  }
  .meta-ba-hero .vl-ui-task { flex: 1 1 calc(50% - 8px); min-width: 140px; font-size: 12px; }
  .meta-ba-hero .vl-ui-pill { top: 64px; }
}
</style>
<canvas id="meta-ba-hero-canvas" aria-hidden="true"></canvas>
<div class="vl-ui-pill" role="list" aria-label="Метрики агента">
  <span>Ответ 24/7</span>
  <span>Лид в CRM</span>
  <span>Эскалация</span>
</div>
<div class="hero-copy-block">
  <h1 class="giant-seo">Meta Business Agent в WhatsApp: <span>как внедрить ИИ-агента для продаж и поддержки</span></h1>
  <p class="giant-seo-sub">Meta сделала WhatsApp CRM с ИИ-агентом для всего мира — покажем, как собрать такой же агент для вашего бизнеса в WhatsApp, Telegram и CRM за 2–4 недели</p>
  <a class="telegram-button" href="<?php echo esc_url($nero_primary_cta_url); ?>">Обсудить внедрение →</a>
</div>
<nav class="vl-ui-tasks" aria-label="Этапы внедрения">
  <div class="vl-ui-task"><span>1</span> Сценарии и база знаний</div>
  <div class="vl-ui-task"><span>2</span> WhatsApp · Telegram · MAX</div>
  <div class="vl-ui-task"><span>3</span> amoCRM / Bitrix24 + n8n</div>
  <div class="vl-ui-task"><span>4</span> Пилот и ROI-метрики</div>
</nav>
<script>
(function metaBaHeroEngine() {
  const canvas = document.getElementById("meta-ba-hero-canvas");
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
    scale = cw < 768 ? cw / 520 : Math.min(cw / 1100, ch / 760) * 1.35;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    wa: "#22c55e",
    tg: "#3b82f6",
    max: "#8b5cf6",
    hub: "#ffffff",
    hubRing: "#e2e8f0",
    crm: "#f97316",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    msgCard: "#f1f5f9"
  };

  function drawRR(ctx, x, y, w, h, r, fill, stroke) {
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) { ctx.lineWidth = 2; ctx.strokeStyle = stroke; ctx.stroke(); }
  }

  class MessageOrbitRail {
    constructor() {
      this.rings = [
        { r: 200, speed: 0.018, hue: C.wa },
        { r: 260, speed: 0.014, hue: C.tg },
        { r: 320, speed: 0.011, hue: C.max }
      ];
    }
    draw(ctx) {
      this.rings.forEach((ring, idx) => {
        ctx.save();
        ctx.strokeStyle = ring.hue;
        ctx.globalAlpha = 0.22;
        ctx.lineWidth = 2;
        ctx.setLineDash([8, 12]);
        ctx.beginPath();
        ctx.ellipse(0, 20, ring.r, ring.r * 0.38, 0, 0, Math.PI * 2);
        ctx.stroke();
        ctx.setLineDash([]);
        ctx.globalAlpha = 1;
        const t = frame * ring.speed + idx * 2.1;
        for (let k = 0; k < 3; k++) {
          const ang = t + (k * Math.PI * 2) / 3;
          const px = Math.cos(ang) * ring.r;
          const py = 20 + Math.sin(ang) * ring.r * 0.38;
          drawRR(ctx, px - 18, py - 10, 36, 20, 6, C.msgCard, C.outline);
          drawRR(ctx, px - 12, py - 4, 22, 4, 1, ring.hue, null);
          drawRR(ctx, px - 12, py + 2, 14, 3, 1, "#cbd5e1", null);
        }
        ctx.restore();
      });
    }
  }

  class OmniAgentHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.phase = 0;
      this.crmGlow = 0;
      this.handoff = 0;
    }
    draw(ctx) {
      this.phase = (frame * 0.035) % 240;
      const pulse = 0.5 + Math.sin(frame * 0.08) * 0.15;
      ctx.lineJoin = "round";

      drawRR(ctx, this.x - 110, this.y - 70, 220, 150, 16, C.hub, C.outline);
      drawRR(ctx, this.x - 100, this.y - 58, 200, 28, [8, 8, 0, 0], "#f1f5f9", C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 11px system-ui,sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("ИИ-агент · омниканал", this.x, this.y - 40);

      const channels = [
        { dx: -55, color: C.wa, label: "WA" },
        { dx: 0, color: C.tg, label: "TG" },
        { dx: 55, color: C.max, label: "MAX" }
      ];
      channels.forEach((ch, i) => {
        const active = this.phase > 40 + i * 25 && this.phase < 200;
        const s = active ? 1 + pulse * 0.12 : 1;
        ctx.save();
        ctx.translate(this.x + ch.dx, this.y + 5);
        ctx.scale(s, s);
        drawRR(ctx, -22, -22, 44, 44, 12, ch.color, C.outline);
        ctx.fillStyle = "#fff";
        ctx.font = "bold 10px system-ui,sans-serif";
        ctx.fillText(ch.label, 0, 4);
        ctx.restore();
      });

      if (this.phase > 90 && this.phase < 180) {
        drawRR(ctx, this.x - 35, this.y + 35, 70, 36, 8, "#fff7ed", C.outline);
        ctx.fillStyle = C.crm;
        ctx.font = "bold 9px system-ui,sans-serif";
        ctx.fillText("amoCRM", this.x, this.y + 52);
        this.crmGlow = Math.min(1, this.crmGlow + 0.05);
        ctx.globalAlpha = this.crmGlow * 0.35;
        drawRR(ctx, this.x - 42, this.y + 28, 84, 48, 10, C.crm, null);
        ctx.globalAlpha = 1;
      } else {
        this.crmGlow *= 0.92;
      }

      if (this.phase > 175) {
        this.handoff = Math.min(1, this.handoff + 0.04);
        const hx = this.x + 75;
        const hy = this.y + 10 - this.handoff * 30;
        drawRR(ctx, hx - 16, hy - 20, 32, 36, 8, C.agentBlue, C.outline);
        ctx.fillStyle = "#fff";
        ctx.beginPath();
        ctx.arc(hx, hy - 28, 10, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = C.outline;
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.strokeStyle = C.outline;
        ctx.beginPath();
        ctx.moveTo(this.x + 40, this.y + 15);
        ctx.lineTo(hx - 10, hy);
        ctx.stroke();
      } else {
        this.handoff *= 0.9;
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
      this.hitAnimation = 0;
    }
    draw(ctx) {
      this.timer += 0.03;
      let isMoving = false, carryType = null, faceDir = 1;
      const prg = (frame * 0.035) % 240;
      const targetX = 20;
      const targetY = -30 + this.stepTrig * 0.35;
      if (prg >= this.stepTrig && prg < this.stepTrig + 28) {
        const local = prg - this.stepTrig;
        if (local < 12) {
          isMoving = true; faceDir = 1; carryType = this.color;
          const t = local / 12;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t;
        } else if (local < 18) {
          this.x = targetX; this.y = targetY;
        } else {
          isMoving = true; faceDir = -1;
          const t = (local - 18) / 10;
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }
      } else {
        this.x = this.baseX; this.y = this.baseY;
        carryType = prg >= this.stepTrig - 12 ? this.color : null;
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
        legL = Math.sin(w) * 5; legR = Math.sin(w + Math.PI) * 5;
      }
      drawRR(ctx, -10, -5 + Math.max(0, legL), 8, 14, 2, C.outline, null);
      drawRR(ctx, -12, 5 + Math.max(0, legL), 12, 6, 2, C.outline, null);
      drawRR(ctx, 2, -5 + Math.max(0, legR), 8, 14, 2, C.outline, null);
      drawRR(ctx, 0, 5 + Math.max(0, legR), 12, 6, 2, C.outline, null);
      drawRR(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);
      const hx = 0, hy = -28 - bob;
      ctx.fillStyle = this.color;
      ctx.beginPath(); ctx.arc(hx, hy, 12, 0, Math.PI * 2); ctx.fill();
      ctx.lineWidth = 2; ctx.strokeStyle = C.outline; ctx.stroke();
      ctx.save();
      ctx.scale(faceDir, 1);
      ctx.fillStyle = "#fff";
      ctx.beginPath(); ctx.arc(hx + 4, hy - 2, 4, 0, Math.PI * 2); ctx.fill();
      ctx.beginPath(); ctx.arc(hx - 4, hy - 2, 4, 0, Math.PI * 2); ctx.fill();
      ctx.fillStyle = C.outline;
      ctx.beginPath(); ctx.arc(hx + 5, hy - 2, 2, 0, Math.PI * 2); ctx.fill();
      ctx.beginPath(); ctx.arc(hx - 3, hy - 2, 2, 0, Math.PI * 2); ctx.fill();
      if (this.role === "3_coder") {
        ctx.fillStyle = C.outline;
        ctx.fillRect(hx - 8, hy - 16, 16, 8);
      }
      ctx.restore();
      if (carryType) drawRR(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const orbit = new MessageOrbitRail();
  const hub = new OmniAgentHub(0, -20);
  entities.push(orbit);
  entities.push(hub);
  entities.push(new Agent(-280, 80, C.agentYellow, "1_architect", 18, ["Карта 20 диалогов", "Сценарий записи", "Тон бренда"]));
  entities.push(new Agent(-160, -40, C.agentGreen, "2_seo", 58, ["FAQ в базе", "Без галлюцинаций", "Ответ за 3 сек"]));
  entities.push(new Agent(-40, 100, C.agentBlue, "3_coder", 98, ["Webhook amoCRM", "Guardrails", "Порог эскалации"]));
  entities.push(new Agent(100, -20, C.agentPink, "4_designer", 138, ["Каталог в чате", "Кнопка записи", "Карточка лида"]));
  entities.push(new Agent(200, 70, C.agentPurple, "5_deployer", 178, ["Пилот в Telegram", "MAX подключён", "Go-live 2 нед"]));

  function createBubble(x, y, text, life) {
    bubbles.push({ x, y, text, life, maxLife: life });
  }

  const sparkles = Array.from({ length: 24 }, () => ({
    x: Math.random() * 800 - 400,
    y: Math.random() * 400 - 200,
    sp: 0.2 + Math.random() * 0.4,
    ph: Math.random() * Math.PI * 2
  }));

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    sparkles.forEach((s) => {
      s.ph += s.sp * 0.02;
      ctx.globalAlpha = 0.15 + Math.sin(s.ph) * 0.1;
      ctx.fillStyle = [C.wa, C.tg, C.max][Math.floor(s.ph * 3) % 3];
      ctx.beginPath();
      ctx.arc(s.x, s.y, 2, 0, Math.PI * 2);
      ctx.fill();
    });
    ctx.globalAlpha = 1;

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));

    const prg = (frame * 0.035) % 240;
    if (prg >= 16 && prg < 16.08) createBubble(-200, -60, "Входящий WhatsApp");
    if (prg >= 56 && prg < 56.08) createBubble(-120, 40, "Квалификация лида");
    if (prg >= 96 && prg < 96.08) createBubble(0, -80, "Запись в YCLIENTS");
    if (prg >= 136 && prg < 136.08) createBubble(80, 20, "Синхронизация CRM");
    if (prg >= 176 && prg < 176.08) createBubble(120, -40, "Эскалация менеджеру");

    ctx.font = "bold 11px system-ui,sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.lineJoin = "round";
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
      drawRR(ctx, bx - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
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



<section class="meta-ba-intro-wrap reveal" aria-label="Введение">
  <div class="meta-ba-intro-grid">
    <div class="meta-ba-intro-text">
      <p class="meta-ba-intro-lead"><strong>Коротко:</strong> 3 июня 2026 Meta вывела Business Agent глобально в WhatsApp, Messenger и Instagram. Для российского SMB разумнее собрать <strong>аналог</strong> в Telegram, MAX и CRM с измеримым ROI.</p>
      <p class="meta-ba-intro-sub">Ниже — что изменилось в релизе, чем агент отличается от чатбота, ограничения для РФ, этапы внедрения за 2–4 недели, сравнение путей и FAQ.</p>
    </div>
    <div class="meta-ba-intro-deco">
      <div class="ym-mac-window reveal-right">
        <div class="ym-mac-header">
          <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
          <span class="ym-mac-title">agent-pipeline.sh</span>
        </div>
        <div class="ym-mac-body">
          <span class="ym-comment"># Контур Nero Network</span><br>
          <span class="ym-command">$</span> каналы → telegram,max,whatsapp-api<br>
          <span class="ym-command">$</span> crm → amoCRM,bitrix24<br>
          <span class="ym-command">$</span> orchestrate → n8n,make<br>
          <span class="ym-command">$</span> deploy --weeks 2-4 --roi track
        </div>
      </div>
    </div>
  </div>
</section>
<div class="meta-ba-toc-wrap">
  <nav class="ym-toc reveal" aria-label="Оглавление">
    <a href="#meta-agent-2026">Релиз Meta</a>
    <a href="#chatbot-vs-agent">Чатбот vs агент</a>
    <a href="#rf-analog">Аналог для РФ</a>
    <a href="#vnedrenie-2-4-nedeli">Внедрение</a>
    <a href="#sravnenie-putey">Сравнение</a>
    <a href="#stoimost-roi">ROI</a>
    <a href="#keisy">Кейсы</a>
    <a href="#faq-ii-agenty">FAQ</a>
  </nav>
</div>



<section id="meta-agent-2026" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Meta Business Agent в WhatsApp — что изменилось с 3 июня 2026</h2>
    <p><strong>Определение.</strong> Meta Business Agent — встроенный ИИ-ассистент для бизнес-аккаунтов в мессенджерах Meta: отвечает клиентам от имени компании, опирается на данные бизнеса и правила владельца, при необходимости передаёт диалог человеку.</p>
    <p>3 июня 2026 на конференции Conversations в Лондоне Meta объявила <strong>глобальный rollout</strong> агента на <strong>WhatsApp, Messenger и Instagram</strong>. Базовая активация заявлена как <strong>бесплатная</strong>; платные подписки обещают «в ближайшие месяцы» (<a href="https://about.fb.com/news/2026/06/meta-business-agent/" target="_blank" rel="noopener noreferrer">about.fb.com</a>).</p>
    <p>По данным релиза, в пилотах (Индия, Мексика, Бразилия) агентом пользовались <strong>более 1 млн</strong> бизнесов; на WhatsApp, Messenger и Instagram — <strong>более 1 млрд</strong> активных диалогов «бизнес — клиент» в сутки.</p>
    <h3>Возможности: ответы 24/7, лиды, запись, эскалация на человека</h3>
    <ul>
      <li>ответы по базе знаний и политикам бизнеса <strong>круглосуточно</strong>;</li>
      <li>рекомендации из <strong>каталога</strong> товаров и услуг;</li>
      <li><strong>запись и бронирование</strong> (слоты, услуги);</li>
      <li><strong>квалификация лидов</strong> и сопровождение до сделки;</li>
      <li><strong>эскалация на менеджера</strong> по правилам владельца.</li>
    </ul>
    <p>Расширенные функции — <strong>утренний брифинг</strong>, market research, календарь — на дату релиза в статусе <strong>теста и waitlist</strong>.</p>
    <h3>Business Agent Platform, токены и waitlist — для кого доступно</h3>
    <p>Параллельно Meta продвигает <strong>Business Agent Platform</strong> — agentic-платформу для кастомных агентов enterprise: интеграции с Shopify, Zendesk, Shopee. Для крупного бизнеса на WhatsApp Business Platform тарификация <strong>по потреблению (tokens)</strong>. Агент войдёт в подписку <strong>Meta One</strong>.</p>
    <p><strong>Итог блока:</strong> для глобального SMB — «включил и пользуешься»; для enterprise — платформа, токены, waitlist.</p>
  </div>
</section>



<section id="chatbot-vs-agent" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Чем Meta Business Agent отличается от обычного чат-бота</h2>
    <p>Запросы <strong>«чат бот для бизнеса»</strong> (~21 500 показов/мес в РФ) и <strong>«чатбот»</strong> (~7 371) остаются родовым кластером. Релиз Meta задаёт новый референс «как должно работать в мессенджере».</p>
    <h3>Сценарный бот vs ИИ-агент с CRM и каталогом</h3>
    <table>
      <thead><tr><th>Критерий</th><th>Сценарный чатбот</th><th>ИИ-агент (Meta или аналог)</th></tr></thead>
      <tbody>
        <tr><td>Диалог</td><td>Жёсткие ветки, кнопки</td><td>Понимание свободной формулировки в рамках политики</td></tr>
        <tr><td>Данные</td><td>Часто изолирован от CRM</td><td>Каталог, статусы заказов, слоты записи</td></tr>
        <tr><td>Цель</td><td>FAQ, сбор контакта</td><td>Лид, запись, продажа, эскалация</td></tr>
        <tr><td>Риск</td><td>«Застрял в меню»</td><td>Галлюцинации → нужны guardrails</td></tr>
      </tbody>
    </table>
    <h3>Когда хватает WhatsApp Business App, а когда нужен API</h3>
    <p><strong>WhatsApp Business App</strong> достаточно при до ~50–100 диалогов в день без жёсткой интеграции с CRM.</p>
    <p><strong>API + агент</strong> нужен при нескольких каналах, автоматизации продаж и эскалации с историей в CRM. С 15 января 2026 в WhatsApp Business API запрещены general-purpose AI-ассистенты; разрешены purpose-driven сценарии.</p>
  </div>
</section>



<section id="rf-analog" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Ограничения для бизнеса в России и зачем собирать «аналог»</h2>
    <p><strong>Коротко:</strong> глобальный релиз Meta (3.06.2026) и российская реальность 2026 (блокировки, MAX, 152-ФЗ) расходятся. Практичный путь — <strong>аналог</strong> в доступных каналах + CRM + оркестрация (Make/n8n).</p>
    <h3>WhatsApp, Telegram, MAX — что реально подключить в 2026</h3>
    <p><strong>12 февраля 2026</strong> РКН подтвердил блокировку WhatsApp; Meta заявила о переводе пользователей на <strong>MAX</strong>. Для бизнеса <strong>Meta Business Agent</strong> как «включил в один клик» — не универсальное решение для РФ.</p>
    <p>Стратегия <strong>омниканала</strong>: Telegram, MAX, при необходимости WhatsApp — с учётом рисков блокировок и политики платформы.</p>
    <h3>ПДн, хранение переписки, эскалация на менеджера</h3>
    <ul>
      <li><strong>152-ФЗ:</strong> согласия, цели обработки, хранение в РФ;</li>
      <li><strong>Хранение переписки:</strong> CRM и ретеншен;</li>
      <li><strong>Эскалация:</strong> триггеры → очередь в CRM + уведомление менеджеру.</li>
    </ul>
  </div>
</section>


<div class="ym-container"><section class="boris-viz-wrap" id="boris-meta-agent-flow" aria-labelledby="boris-flow-title">
<style>
#boris-meta-agent-flow{--boris-accent:#2563eb;--boris-accent-soft:#dbeafe;--boris-surface:#fff;--boris-muted:#64748b;--boris-heading:#0f172a;--boris-border:#e2e8f0;--boris-success:#10b981;margin:48px 0;font-family:Inter,system-ui,sans-serif}
#boris-meta-agent-flow .boris-viz-card{background:var(--boris-surface);border:1px solid var(--boris-border);border-radius:22px;box-shadow:0 18px 50px rgba(15,23,42,.06);padding:28px 32px 32px}
#boris-meta-agent-flow .boris-viz-grid{display:grid;grid-template-columns:1fr 1.05fr;gap:28px 36px;align-items:center}
#boris-meta-agent-flow .boris-eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--boris-accent);margin:0 0 10px}
#boris-meta-agent-flow .boris-kicker{font-size:clamp(1.25rem,2.2vw,1.5rem);font-weight:700;color:var(--boris-heading);margin:0 0 12px;line-height:1.25}
#boris-meta-agent-flow .boris-lead{font-size:15px;line-height:1.6;color:var(--boris-muted);margin:0 0 18px}
#boris-meta-agent-flow .boris-pills{display:flex;flex-wrap:wrap;gap:8px;margin:0 0 16px;padding:0;list-style:none}
#boris-meta-agent-flow .boris-pills li{font-size:12px;font-weight:600;padding:6px 12px;border-radius:999px;background:#f1f5f9;color:#334155;border:1px solid var(--boris-border)}
#boris-meta-agent-flow .boris-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
#boris-meta-agent-flow .boris-stat{background:#f8fafc;border-radius:14px;padding:12px 10px;text-align:center;border:1px solid var(--boris-border)}
#boris-meta-agent-flow .boris-stat strong{display:block;font-size:18px;color:var(--boris-heading)}
#boris-meta-agent-flow .boris-stat span{font-size:11px;color:var(--boris-muted);line-height:1.3}
#boris-meta-agent-flow .boris-flow-stage{position:relative;min-height:340px;background:linear-gradient(135deg,#f8fafc 0%,#eff6ff 100%);border-radius:18px;border:1px solid var(--boris-border);padding:20px 16px 16px;overflow:hidden}
#boris-meta-agent-flow .boris-flow-nodes{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;position:relative;z-index:2}
#boris-meta-agent-flow .boris-node{text-align:center;padding:12px 6px;border-radius:14px;background:#fff;border:2px solid transparent;transition:border-color .35s,box-shadow .35s,transform .35s;cursor:default}
#boris-meta-agent-flow .boris-node.is-active{border-color:var(--boris-accent);box-shadow:0 8px 24px rgba(37,99,235,.18);transform:translateY(-2px)}
#boris-meta-agent-flow .boris-node-icon{font-size:26px;line-height:1;margin-bottom:6px}
#boris-meta-agent-flow .boris-node-label{font-size:11px;font-weight:700;color:var(--boris-heading);line-height:1.2}
#boris-meta-agent-flow .boris-node-sub{font-size:10px;color:var(--boris-muted);margin-top:4px;line-height:1.25}
#boris-meta-agent-flow .boris-flow-arrows{position:absolute;left:12%;right:12%;top:42%;height:4px;z-index:1}
#boris-meta-agent-flow .boris-flow-arrows::before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,transparent,var(--boris-accent),transparent);opacity:.25;border-radius:4px}
#boris-meta-agent-flow .boris-packet{position:absolute;top:50%;width:14px;height:14px;margin-top:-7px;border-radius:50%;background:var(--boris-accent);box-shadow:0 0 0 4px var(--boris-accent-soft);left:8%;animation:borisPacketMove 8s ease-in-out infinite}
#boris-meta-agent-flow .boris-flow-log{margin-top:14px;font-size:12px;line-height:1.45;color:#334155;background:#fff;border-radius:12px;border:1px solid var(--boris-border);padding:10px 12px;min-height:52px}
#boris-meta-agent-flow .boris-flow-log em{font-style:normal;color:var(--boris-accent);font-weight:600}
#boris-meta-agent-flow .boris-channel-tabs{display:flex;gap:6px;margin-bottom:12px;flex-wrap:wrap}
#boris-meta-agent-flow .boris-channel-tabs button{font:inherit;font-size:11px;font-weight:600;padding:6px 10px;border-radius:8px;border:1px solid var(--boris-border);background:#fff;color:#475569;cursor:pointer;transition:all .2s}
#boris-meta-agent-flow .boris-channel-tabs button[aria-pressed="true"]{background:var(--boris-accent);color:#fff;border-color:var(--boris-accent)}
@keyframes borisPacketMove{0%,100%{left:8%;opacity:.6}25%{left:33%;opacity:1}50%{left:58%;opacity:1}75%{left:83%;opacity:1}}
@media(max-width:1023px){#boris-meta-agent-flow .boris-viz-grid{grid-template-columns:1fr}}
@media(max-width:640px){#boris-meta-agent-flow .boris-flow-nodes{grid-template-columns:repeat(2,1fr);row-gap:12px}#boris-meta-agent-flow .boris-stats{grid-template-columns:1fr}#boris-meta-agent-flow .boris-flow-arrows{display:none}}
</style>
<div class="boris-viz-card">
<div class="boris-viz-grid">
<div class="boris-viz-copy">
<p class="boris-eyebrow">Архитектура · РФ 2026</p>
<h3 class="boris-kicker" id="boris-flow-title">Контур «аналога» Meta Agent без привязки к экосистеме</h3>
<p class="boris-lead">Один диалог клиента проходит через доступные каналы, purpose-driven ИИ и вашу CRM — с эскалацией на менеджера по правилам.</p>
<ul class="boris-pills" aria-label="Каналы">
<li>Telegram</li><li>MAX</li><li>WhatsApp API*</li><li>Make / n8n</li>
</ul>
<div class="boris-stats">
<div class="boris-stat"><strong>&lt;30 с</strong><span>цель первого ответа</span></div>
<div class="boris-stat"><strong>65%+</strong><span>без оператора (ориентир РБК)</span></div>
<div class="boris-stat"><strong>152-ФЗ</strong><span>логи и хранение в РФ</span></div>
</div>
</div>
<div class="boris-flow-stage" aria-live="polite">
<div class="boris-channel-tabs" role="group" aria-label="Канал входа">
<button type="button" data-channel="telegram" aria-pressed="true">Telegram</button>
<button type="button" data-channel="max" aria-pressed="false">MAX</button>
<button type="button" data-channel="whatsapp" aria-pressed="false">WhatsApp</button>
</div>
<div class="boris-flow-arrows" aria-hidden="true"><span class="boris-packet"></span></div>
<div class="boris-flow-nodes">
<div class="boris-node is-active" data-step="0"><div class="boris-node-icon" aria-hidden="true">👤</div><div class="boris-node-label">Клиент</div><div class="boris-node-sub">вопрос, заказ, запись</div></div>
<div class="boris-node" data-step="1"><div class="boris-node-icon" aria-hidden="true">💬</div><div class="boris-node-label">Мессенджер</div><div class="boris-node-sub" id="boris-channel-label">Telegram</div></div>
<div class="boris-node" data-step="2"><div class="boris-node-icon" aria-hidden="true">🤖</div><div class="boris-node-label">ИИ-агент</div><div class="boris-node-sub">база + guardrails</div></div>
<div class="boris-node" data-step="3"><div class="boris-node-icon" aria-hidden="true">📊</div><div class="boris-node-label">CRM</div><div class="boris-node-sub">лид · сделка · эскалация</div></div>
</div>
<p class="boris-flow-log" id="boris-flow-log"><em>Клиент</em> пишет в Telegram: «Есть слот на завтра?»</p>
</div>
</div>
</div>
<script>
(function(){
var root=document.getElementById("boris-meta-agent-flow");
if(!root)return;
var nodes=root.querySelectorAll(".boris-node");
var logEl=document.getElementById("boris-flow-log");
var chLabel=document.getElementById("boris-channel-label");
var tabs=root.querySelectorAll(".boris-channel-tabs button");
var channel="telegram";
var logs={
telegram:["<em>Клиент</em> в Telegram: «Есть слот на завтра?»","<em>Мессенджер</em> принял сообщение, webhook в Make/n8n","<em>ИИ-агент</em> сверил YCLIENTS, предложил 2 слота","<em>CRM</em>: лид + запись; менеджер уведомлён в Telegram"],
max:["<em>Клиент</em> в MAX: «Статус заказа №1842»","<em>Мессенджер</em> MAX → оркестратор","<em>ИИ-агент</em> запросил 1С/МойСклад, ответил по факту","<em>CRM</em>: обновлена сделка, тег «самообслуживание»"],
whatsapp:["<em>Клиент</em> в WhatsApp*: «Хочу менеджера»","<em>Мессенджер</em> API (purpose-driven с 15.01.2026)","<em>ИИ-агент</em> низкая уверенность → эскалация","<em>CRM</em>: очередь оператору + история диалога"]
};
var names={telegram:"Telegram",max:"MAX",whatsapp:"WhatsApp API"};
var step=0,timer;
function render(){
nodes.forEach(function(n,i){n.classList.toggle("is-active",i===step);});
if(logEl&&logs[channel])logEl.innerHTML=logs[channel][step];
}
function cycle(){step=(step+1)%4;render();}
function start(){clearInterval(timer);step=0;render();timer=setInterval(cycle,2200);}
tabs.forEach(function(btn){
btn.addEventListener("click",function(){
channel=btn.getAttribute("data-channel")||"telegram";
tabs.forEach(function(b){b.setAttribute("aria-pressed",b===btn?"true":"false");});
if(chLabel)chLabel.textContent=names[channel]||channel;
start();
});
});
start();
})();
</script>
</section>
</div>


<section id="vnedrenie-2-4-nedeli" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Как внедрить ИИ-агента для продаж и поддержки за 2–4 недели</h2>
    <p>Ориентир Nero Network для SMB: <strong>2–4 недели</strong> от брифа до промышленного контура.</p>
    <h3>Этап 1: сценарии, база знаний, тон бренда</h3>
    <p>Карта 20–40 типовых диалогов, база знаний, тон бренда, KPI пилота: время первого ответа, % закрытых без человека, конверсия в запись.</p>
    <h3>Этап 2: интеграция amoCRM / Bitrix24 / YCLIENTS / 1С</h3>
    <p>Создание лида/сделки, коннекторы YCLIENTS, 1С / МойСклад — остатки и статусы по scope.</p>
    <h3>Этап 3: Make.com / n8n, тесты, обучение команды</h3>
    <p>Оркестрация в Make.com или n8n, A/B на формулировках, обучение менеджеров, мониторинг токенов LLM.</p>
    <p class="ym-cta-inline reveal" id="cta-secondary-training" data-cta-slot="secondary-training"><strong>Обучение команды:</strong> после запуска агента менеджерам нужны правила подхвата диалогов и правки базы знаний — <a href="<?php echo esc_url($nero_secondary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nero_secondary_cta_label); ?></a>.</p>

    <p><strong>Итог этапа:</strong> чат-бот в мессенджерах + CRM + измеримые метрики.</p>
  </div>
</section>



<section id="sravnenie-putey" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Сравнение: Meta Business Agent vs конструктор vs кастом</h2>
    <table>
      <thead><tr><th>Путь</th><th>Плюсы</th><th>Минусы</th><th>Кому подходит</th></tr></thead>
      <tbody>
        <tr><td><strong>Meta Business Agent</strong></td><td>Нативно в WhatsApp/IG/Messenger</td><td>РФ/блокировки, привязка к Meta</td><td>Экспорт, глобальный рынок</td></tr>
        <tr><td><strong>Конструктор</strong></td><td>Быстрый MVP</td><td>Потолок кастомизации</td><td>Малый поток</td></tr>
        <tr><td><strong>Кастом под ключ</strong></td><td>Telegram + MAX + CRM, 152-ФЗ</td><td>2–4 недели, бюджет выше SaaS</td><td>SMB с CRM</td></tr>
      </tbody>
    </table>
    <p><strong>Уникальный угол:</strong> Meta Agent — <strong>чек-лист функций</strong>, а не обязательный продукт.</p>
  </div>
</section>


<div class="ym-container"><section class="boris-viz-wrap" id="boris-meta-agent-compare" aria-labelledby="boris-compare-title">
<style>
#boris-meta-agent-compare{--boris-accent:#2563eb;--boris-warn:#f59e0b;--boris-surface:#fff;--boris-muted:#64748b;--boris-heading:#0f172a;--boris-border:#e2e8f0;margin:48px 0;font-family:Inter,system-ui,sans-serif}
#boris-meta-agent-compare .boris-viz-card{background:var(--boris-surface);border:1px solid var(--boris-border);border-radius:22px;box-shadow:0 18px 50px rgba(15,23,42,.06);padding:28px 32px}
#boris-meta-agent-compare .boris-eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--boris-accent);margin:0 0 8px}
#boris-meta-agent-compare .boris-kicker{font-size:clamp(1.2rem,2vw,1.45rem);font-weight:700;color:var(--boris-heading);margin:0 0 8px}
#boris-meta-agent-compare .boris-lead{font-size:15px;color:var(--boris-muted);margin:0 0 20px;line-height:1.55;max-width:720px}
#boris-meta-agent-compare .boris-compare-toggle{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:18px}
#boris-meta-agent-compare .boris-compare-toggle button{font:inherit;font-size:13px;font-weight:600;padding:10px 16px;border-radius:12px;border:1px solid var(--boris-border);background:#f8fafc;color:#334155;cursor:pointer;transition:all .2s}
#boris-meta-agent-compare .boris-compare-toggle button[aria-pressed="true"]{background:var(--boris-accent);color:#fff;border-color:var(--boris-accent);box-shadow:0 6px 20px rgba(37,99,235,.25)}
#boris-meta-agent-compare .boris-table-wrap{overflow-x:auto;border-radius:16px;border:1px solid var(--boris-border)}
#boris-meta-agent-compare table{width:100%;border-collapse:collapse;font-size:14px;min-width:520px}
#boris-meta-agent-compare th,#boris-meta-agent-compare td{padding:12px 14px;text-align:left;border-bottom:1px solid var(--boris-border);vertical-align:top}
#boris-meta-agent-compare th{background:#f8fafc;font-size:12px;text-transform:uppercase;letter-spacing:.04em;color:var(--boris-muted)}
#boris-meta-agent-compare tr:last-child td{border-bottom:0}
#boris-meta-agent-compare .boris-col-meta,#boris-meta-agent-compare .boris-col-custom{transition:background .25s}
#boris-meta-agent-compare[data-focus="meta"] .boris-col-meta{background:#eff6ff}
#boris-meta-agent-compare[data-focus="custom"] .boris-col-custom{background:#ecfdf5}
#boris-meta-agent-compare[data-focus="both"] .boris-col-meta{background:#eff6ff}
#boris-meta-agent-compare[data-focus="both"] .boris-col-custom{background:#ecfdf5}
#boris-meta-agent-compare .boris-badge{display:inline-block;font-size:11px;font-weight:700;padding:3px 8px;border-radius:6px;margin-left:6px}
#boris-meta-agent-compare .boris-badge--ok{background:#d1fae5;color:#065f46}
#boris-meta-agent-compare .boris-badge--warn{background:#fef3c7;color:#92400e}
#boris-meta-agent-compare .boris-badge--no{background:#fee2e2;color:#991b1b}
#boris-meta-agent-compare .boris-row-detail{display:none;font-size:13px;color:var(--boris-muted);margin-top:6px;line-height:1.45}
#boris-meta-agent-compare tr.is-expanded .boris-row-detail{display:block}
#boris-meta-agent-compare tbody tr[data-row]{cursor:pointer}
#boris-meta-agent-compare tbody tr[data-row]:hover td{background:#fafafa}
#boris-meta-agent-compare .boris-hint{font-size:12px;color:#94a3b8;margin-top:12px}
</style>
<div class="boris-viz-card">
<p class="boris-eyebrow">Сравнение путей</p>
<h3 class="boris-kicker" id="boris-compare-title">Meta Business Agent vs аналог для России</h3>
<p class="boris-lead">Meta Agent — чек-лист функций. Для SMB в РФ чаще выигрывает связка Telegram / MAX + CRM + кастомный агент за 2–4 недели.</p>
<div class="boris-compare-toggle" role="group" aria-label="Подсветка колонок">
<button type="button" data-focus="meta" aria-pressed="false">Подсветить Meta</button>
<button type="button" data-focus="custom" aria-pressed="true">Подсветить аналог</button>
<button type="button" data-focus="both" aria-pressed="false">Обе колонки</button>
</div>
<div class="boris-table-wrap">
<table>
<thead>
<tr><th scope="col">Критерий</th><th scope="col" class="boris-col-meta">Meta Business Agent</th><th scope="col" class="boris-col-custom">Свой аналог (РФ)</th></tr>
</thead>
<tbody>
<tr data-row="1"><th scope="row">Каналы</th>
<td class="boris-col-meta">WhatsApp, IG, Messenger <span class="boris-badge boris-badge--ok">нативно</span><div class="boris-row-detail">Глобальный rollout 3.06.2026; в РФ — риски блокировок.</div></td>
<td class="boris-col-custom">Telegram, MAX, CRM <span class="boris-badge boris-badge--ok">омниканал</span><div class="boris-row-detail">WhatsApp по API — только purpose-driven; приоритет Telegram + MAX в 2026.</div></td></tr>
<tr data-row="2"><th scope="row">CRM / 1С</th>
<td class="boris-col-meta">Shopify, Zendesk (enterprise) <span class="boris-badge boris-badge--warn">платформа</span><div class="boris-row-detail">Токены и waitlist на расширенные интеграции.</div></td>
<td class="boris-col-custom">amoCRM, Bitrix24, YCLIENTS <span class="boris-badge boris-badge--ok">в scope</span><div class="boris-row-detail">Make/n8n: лид, слоты, остатки — без «придуманного» наличия.</div></td></tr>
<tr data-row="3"><th scope="row">Политика AI</th>
<td class="boris-col-meta">Свой агент Meta в экосистеме <span class="boris-badge boris-badge--warn">монополия</span><div class="boris-row-detail">С 15.01.2026 сторонним general-purpose ботам в API — запрет.</div></td>
<td class="boris-col-custom">Узкий бизнес-сценарий <span class="boris-badge boris-badge--ok">guardrails</span><div class="boris-row-detail">Эскалация по уверенности, 152-ФЗ, логи в РФ.</div></td></tr>
<tr data-row="4"><th scope="row">Срок запуска</th>
<td class="boris-col-meta">Быстрый старт (глобально) <span class="boris-badge boris-badge--ok">дни</span><div class="boris-row-detail">Бесплатная база; Meta One — позже.</div></td>
<td class="boris-col-custom">2–4 недели под ключ <span class="boris-badge boris-badge--ok">пилот</span><div class="boris-row-detail">Сценарии → CRM → тесты → обучение команды.</div></td></tr>
<tr data-row="5"><th scope="row">Стоимость роста</th>
<td class="boris-col-meta">Токены / consumption <span class="boris-badge boris-badge--warn">рост счёта</span><div class="boris-row-detail">Enterprise WhatsApp — по потреблению, как исходящие.</div></td>
<td class="boris-col-custom">LLM + каналы прозрачно <span class="boris-badge boris-badge--ok">контроль</span><div class="boris-row-detail">Ориентир кейса РБК: 20–30 ₽/обращение vs 500+ ₽ до автоматизации.</div></td></tr>
</tbody>
</table>
</div>
<p class="boris-hint">Нажмите на строку, чтобы раскрыть детали. Кнопки сверху подсвечивают колонку для вашего контекста.</p>
</div>
<script>
(function(){
var root=document.getElementById("boris-meta-agent-compare");
if(!root)return;
var toggles=root.querySelectorAll(".boris-compare-toggle button");
toggles.forEach(function(btn){
btn.addEventListener("click",function(){
var f=btn.getAttribute("data-focus")||"custom";
root.setAttribute("data-focus",f);
toggles.forEach(function(b){b.setAttribute("aria-pressed",b===btn?"true":"false");});
});
});
root.setAttribute("data-focus","custom");
root.querySelectorAll("tbody tr[data-row]").forEach(function(row){
row.addEventListener("click",function(){row.classList.toggle("is-expanded");});
});
})();
</script>
</section>
</div>

<div class="ym-container"><aside class="ym-card reveal ym-cta-mid" id="cta-mid-primary" data-cta-slot="mid-primary" aria-labelledby="cta-mid-primary-title">
  <div class="ym-card-icon" aria-hidden="true">🤖</div>
  <h3 id="cta-mid-primary-title">Соберём ИИ-агента под ваш бизнес за 2–4 недели</h3>
  <p>Telegram, MAX, WhatsApp и CRM (amoCRM, Bitrix24, YCLIENTS) — сценарии продаж и поддержки, guardrails, 152-ФЗ и эскалация на менеджера. Бриф → пилот → промышленный контур.</p>
  <div class="ym-btn-group" style="justify-content:flex-start;margin-top:20px;">
    <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_primary_cta_label); ?></span></a>
  </div>
  <p class="ym-cta-note" style="margin-top:12px;font-size:14px;color:#64748b;">Ответим в рабочее время: оценим каналы, интеграции и метрики пилота.</p>
</aside>
</div>


<section id="stoimost-roi" class="ym-section ym-section-alt reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Стоимость и окупаемость для SMB</h2>
    <h3>SaaS vs разработка под ключ — таблица бюджетов</h3>
    <table>
      <thead><tr><th>Статья</th><th>Конструктор SaaS</th><th>Кастом 2–4 недели</th></tr></thead>
      <tbody>
        <tr><td>Старт</td><td>Низкий ежемесячный платёж</td><td>Проект + интеграции</td></tr>
        <tr><td>LLM-токены</td><td>Часто в тарифе с лимитом</td><td>Прозрачный учёт</td></tr>
        <tr><td>CRM/1С</td><td>Доп. модули</td><td>В scope проекта</td></tr>
      </tbody>
    </table>
    <h3>Метрики ROI: лиды, время ответа, конверсия в запись</h3>
    <p>Кейс «Марта AI» в Bitrix24 (РБК Тренды): <strong>более 65%</strong> запросов без оператора; стоимость обращения <strong>с 500+ ₽ до 20–30 ₽</strong>; расходы на поддержку <strong>−42%</strong>.</p>
    <p>Контрбаланс: только ~11% пилотов переведены в промэксплуатацию; Gartner — отмена более 40% agent-проектов к 2027.</p>
  </div>
</section>


<div class="ym-container"><section class="boris-viz-wrap" id="boris-meta-agent-roi" aria-labelledby="boris-roi-title">
<style>
#boris-meta-agent-roi{--boris-accent:#2563eb;--boris-surface:#fff;--boris-muted:#64748b;--boris-heading:#0f172a;--boris-border:#e2e8f0;--boris-success:#10b981;margin:48px 0;font-family:Inter,system-ui,sans-serif}
#boris-meta-agent-roi .boris-viz-card{background:var(--boris-surface);border:1px solid var(--boris-border);border-radius:22px;box-shadow:0 18px 50px rgba(15,23,42,.06);padding:28px 32px}
#boris-meta-agent-roi .boris-viz-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;align-items:start}
#boris-meta-agent-roi .boris-eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--boris-accent);margin:0 0 10px}
#boris-meta-agent-roi .boris-kicker{font-size:clamp(1.25rem,2.2vw,1.5rem);font-weight:700;color:var(--boris-heading);margin:0 0 10px}
#boris-meta-agent-roi .boris-lead{font-size:15px;color:var(--boris-muted);line-height:1.55;margin:0 0 16px}
#boris-meta-agent-roi .boris-field{margin-bottom:18px}
#boris-meta-agent-roi .boris-field label{display:flex;justify-content:space-between;font-size:13px;font-weight:600;color:var(--boris-heading);margin-bottom:8px}
#boris-meta-agent-roi .boris-field output{font-variant-numeric:tabular-nums;color:var(--boris-accent)}
#boris-meta-agent-roi input[type=range]{width:100%;accent-color:var(--boris-accent)}
#boris-meta-agent-roi .boris-result-panel{background:linear-gradient(145deg,#f0fdf4,#eff6ff);border:1px solid var(--boris-border);border-radius:18px;padding:22px}
#boris-meta-agent-roi .boris-result-big{font-size:clamp(2rem,4vw,2.75rem);font-weight:800;color:var(--boris-heading);line-height:1.1;margin:0 0 4px}
#boris-meta-agent-roi .boris-result-sub{font-size:14px;color:var(--boris-muted);margin:0 0 18px}
#boris-meta-agent-roi .boris-bars{display:grid;gap:12px}
#boris-meta-agent-roi .boris-bar-row{font-size:12px;color:var(--boris-muted)}
#boris-meta-agent-roi .boris-bar-row strong{color:var(--boris-heading);float:right}
#boris-meta-agent-roi .boris-bar-track{height:10px;background:#e2e8f0;border-radius:999px;overflow:hidden;margin-top:6px}
#boris-meta-agent-roi .boris-bar-fill{height:100%;border-radius:999px;transition:width .4s ease}
#boris-meta-agent-roi .boris-bar-fill--before{background:#94a3b8}
#boris-meta-agent-roi .boris-bar-fill--after{background:var(--boris-success)}
#boris-meta-agent-roi .boris-ref{font-size:11px;color:#94a3b8;margin-top:14px;line-height:1.4}
@media(max-width:900px){#boris-meta-agent-roi .boris-viz-grid{grid-template-columns:1fr}}
</style>
<div class="boris-viz-card">
<div class="boris-viz-grid">
<div class="boris-viz-copy">
<p class="boris-eyebrow">Окупаемость · пилот</p>
<h3 class="boris-kicker" id="boris-roi-title">Калькулятор ROI ИИ-агента в CRM</h3>
<p class="boris-lead">Смоделируйте экономию на линии поддержки и продаж. Ориентиры взяты из кейса «Марта AI» (РБК Тренды, 2026): 65%+ без оператора, 20–30 ₽ vs 500+ ₽ за обращение.</p>
<div class="boris-field">
<label for="boris-roi-dialogs">Обращений в месяц <output id="boris-out-dialogs">800</output></label>
<input type="range" id="boris-roi-dialogs" min="100" max="5000" step="50" value="800">
</div>
<div class="boris-field">
<label for="boris-roi-cost">Стоимость обращения без агента, ₽ <output id="boris-out-cost">500</output></label>
<input type="range" id="boris-roi-cost" min="150" max="1200" step="25" value="500">
</div>
<div class="boris-field">
<label for="boris-roi-auto">Доля закрытий без оператора, % <output id="boris-out-auto">65</output></label>
<input type="range" id="boris-roi-auto" min="20" max="85" step="5" value="65">
</div>
<div class="boris-field">
<label for="boris-roi-agent-cost">Стоимость с агентом, ₽/обращение <output id="boris-out-agent">25</output></label>
<input type="range" id="boris-roi-agent-cost" min="10" max="80" step="5" value="25">
</div>
</div>
<div class="boris-result-panel" aria-live="polite">
<p class="boris-result-big" id="boris-roi-savings">0 ₽</p>
<p class="boris-result-sub">экономия в месяц (оценка)</p>
<div class="boris-bars">
<div class="boris-bar-row">Было (все вручную) <strong id="boris-roi-total-before">0 ₽</strong><div class="boris-bar-track"><div class="boris-bar-fill boris-bar-fill--before" id="boris-bar-before" style="width:100%"></div></div></div>
<div class="boris-bar-row">Стало (смешанный контур) <strong id="boris-roi-total-after">0 ₽</strong><div class="boris-bar-track"><div class="boris-bar-fill boris-bar-fill--after" id="boris-bar-after" style="width:0%"></div></div></div>
</div>
<p class="boris-ref">Не финансовая гарантия: для точного ROI нужен пилот с метриками (время ответа, конверсия в запись, эскалации). Источник ориентиров: trends.rbc.ru, кейс Bitrix24.</p>
</div>
</div>
</div>
<script>
(function(){
var d=document.getElementById("boris-roi-dialogs");
var c=document.getElementById("boris-roi-cost");
var a=document.getElementById("boris-roi-auto");
var ac=document.getElementById("boris-roi-agent-cost");
if(!d||!c||!a||!ac)return;
function fmt(n){return new Intl.NumberFormat("ru-RU").format(Math.round(n))+" ₽";}
function calc(){
var dialogs=+d.value, cost=+c.value, autoPct=+a.value/100, agentCost=+ac.value;
document.getElementById("boris-out-dialogs").textContent=fmt(dialogs).replace(" ₽","");
document.getElementById("boris-out-cost").textContent=fmt(cost).replace(" ₽","");
document.getElementById("boris-out-auto").textContent=Math.round(autoPct*100);
document.getElementById("boris-out-agent").textContent=agentCost;
var before=dialogs*cost;
var automated=Math.round(dialogs*autoPct);
var manual=dialogs-automated;
var after=automated*agentCost+manual*cost;
var savings=Math.max(0,before-after);
document.getElementById("boris-roi-savings").textContent=fmt(savings);
document.getElementById("boris-roi-total-before").textContent=fmt(before);
document.getElementById("boris-roi-total-after").textContent=fmt(after);
var pct=before?Math.min(100,Math.round(after/before*100)):0;
document.getElementById("boris-bar-after").style.width=pct+"%";
}
[d,c,a,ac].forEach(function(el){el.addEventListener("input",calc);});
calc();
})();
</script>
</section>
</div>


<section id="keisy" class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <h2>Кейсы: ритейл, услуги, B2B в мессенджерах</h2>
    <p><strong>Ритейл.</strong> Статус заказа, наличие, апселл; менеджер при претензии.</p>
    <p><strong>Услуги.</strong> Запись через YCLIENTS: слоты, напоминания; канал — Telegram и MAX.</p>
    <p><strong>B2B.</strong> Квалификация, лид в Bitrix24, КП менеджеру; тон деловой, без «галлюцинаций» о скидках.</p>
  </div>
</section>


<div class="ym-section-alt reveal" id="cta-banner-strip" data-cta-slot="banner-strip" role="complementary" aria-label="Предложение Nero Network">
  <div class="ym-container">
    <div class="ym-bento-card ym-bento-wide" style="flex-direction:row;align-items:center;gap:24px;flex-wrap:wrap;padding:28px 32px;">
      <div style="flex:1;min-width:240px;">
        <strong style="display:block;font-size:20px;color:var(--ym-heading);margin-bottom:8px;">Meta Agent — чек-лист. Ваш агент — в Telegram и CRM</strong>
        <span style="color:#64748b;font-size:15px;">Не ждите доступности Meta в РФ: соберите аналог с измеримым ROI.</span>
      </div>
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_primary_cta_label); ?></span></a>
    </div>
  </div>
</div>



<section id="faq-ii-agenty" class="ym-section ym-section-alt reveal">
  <div class="ym-container">
    <h2 class="ym-section-title">FAQ по ИИ-агентам в мессенджерах</h2>
    <div class="ym-faq-layout">
      <aside class="ym-faq-sidebar ym-cta-sidebar reveal" id="cta-sidebar-sticky" data-cta-slot="sidebar-sticky" aria-labelledby="cta-sidebar-title">
  <p class="ym-cta-eyebrow" style="font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--ym-accent);margin:0 0 8px;">Nero Network</p>
  <h3 id="cta-sidebar-title" style="font-size:20px;margin:0 0 12px;">Внедрение ИИ-агента под ключ</h3>
  <ul style="margin:0 0 16px;padding-left:18px;color:#475569;font-size:15px;line-height:1.5;">
    <li>2–4 недели до промконтура</li>
    <li>Telegram · MAX · CRM</li>
    <li>ROI: лиды, запись, эскалация</li>
  </ul>
  <a class="ym-btn ym-btn-primary" style="width:100%;justify-content:center;" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_primary_cta_label); ?></span></a>
</aside>

      <div class="ym-faq-list-content">
        <article class="ym-faq-item reveal" id="faq-meta">
          <h3>Можно ли без Meta и только в Telegram/MAX?</h3>
          <p><strong>Да</strong> — для большинства российских SMB это рекомендуемая стратегия в 2026: Telegram, MAX, CRM — единый источник правды. Meta Business Agent — ориентир по функциям.</p>
        </article>
        <article class="ym-faq-item reveal delay-100" id="faq-cost">
          <h3>Сколько стоит поддержка и токены LLM</h3>
          <p>Зависит от объёма диалогов и модели. Ориентир из РФ: <strong>20–30 ₽</strong> на закрытое обращение vs <strong>500+ ₽</strong> до автоматизации.</p>
        </article>
        <article class="ym-faq-item reveal delay-200" id="faq-hallucinations">
          <h3>Как не потерять клиента при «галлюцинациях» агента</h3>
          <p>Жёсткий system prompt, ответ только из базы + API CRM, порог уверенности → эскалация, логи и QA, purpose-driven сценарии.</p>
        </article>
      </div>
    </div>
  </div>
</section>


<section class="ym-section reveal" id="cta-final" data-cta-slot="final" aria-labelledby="cta-final-title">
  <div class="ym-container" style="text-align:center;max-width:880px;">
    <h2 id="cta-final-title">Следующий шаг: агент в мессенджерах и CRM</h2>
    <p style="font-size:18px;color:#475569;margin:16px auto 28px;line-height:1.6;">Релиз Meta Business Agent показал, что клиенты ждут ответ 24/7, запись и передачу менеджеру. Для российского SMB это реализуется в Telegram, MAX и amoCRM/Bitrix24 за 2–4 недели — без зависимости от экосистемы Meta.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nero_primary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_primary_cta_label); ?></span></a>
      <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url($nero_secondary_cta_url); ?>" target="_blank" rel="noopener noreferrer"><span><?php echo esc_html($nero_secondary_cta_label); ?></span></a>
    </div>
    <p style="margin-top:20px;font-size:14px;color:#94a3b8;">Подпишитесь на канал и задайте вопрос по вашему сценарию — подскажем по интеграциям и метрикам пилота.</p>
  </div>
</section>



<section class="ym-section reveal">
  <div class="ym-container meta-ba-prose">
    <p><strong>Итог.</strong> Релиз <strong>Meta Business Agent</strong> 3 июня 2026 задаёт планку: ИИ в мессенджере должен продавать, записывать и передавать человеку. Для России разумнее <strong>внедрение чат бота</strong> и <strong>ии агентов для бизнеса</strong> в Telegram, MAX и CRM за <strong>2–4 недели</strong> — с ROI по метрикам РБК и без зависимости от экосистемы Meta.</p>
  </div>
</section>


</main>

<script>
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
      "headline": "Meta Business Agent в WhatsApp: как внедрить ИИ-агента для продаж и поддержки",
      "description": "Релиз Meta Business Agent в WhatsApp (июнь 2026): функции, цены, лимиты для РФ. Как внедрить ИИ-агента в WhatsApp, Telegram, MAX и CRM.",
      "author": {"@type": "Organization", "name": "Nero Network"},
      "datePublished": "2026-06-04",
      "inLanguage": "ru-RU"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {"@type": "Question", "name": "Можно ли без Meta и только в Telegram/MAX?", "acceptedAnswer": {"@type": "Answer", "text": "Да — для большинства российских SMB это рекомендуемая стратегия в 2026."}},
        {"@type": "Question", "name": "Сколько стоит поддержка и токены LLM?", "acceptedAnswer": {"@type": "Answer", "text": "Зависит от объёма диалогов; ориентир 20–30 ₽ на закрытое обращение при зрелом агенте."}},
        {"@type": "Question", "name": "Как не потерять клиента при галлюцинациях агента?", "acceptedAnswer": {"@type": "Answer", "text": "Guardrails, база знаний, порог уверенности и эскалация на менеджера."}}
      ]
    }
  ]
}
</script>

<?php
get_footer();
