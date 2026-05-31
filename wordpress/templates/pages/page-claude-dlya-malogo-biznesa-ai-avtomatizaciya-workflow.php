<?php
/**
 * Template Name: Claude для малого бизнеса — AI workflow
 * Description: Лонгрид Claude for Small Business — 15 AI-workflow, MCP, Make/n8n для SMB.
 */


require_once get_stylesheet_directory() . '/includes/nn-cta.php';
$page_seo_title = 'Claude для малого бизнеса: 15 AI-workflow и как повторить в РФ';
$page_seo_description = 'Claude for Small Business (13.05.2026): 15 AI-workflow для финансов, продаж и HR. Как повторить на Make, n8n, MCP, amoCRM и 1С без QuickBooks.';

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




body, html {
    
}
.site-main {
    display: block !important;
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page {
    overflow-x: clip;
    overflow-y: visible;
}


.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page {
    --ym-bg: #f8fafc;
    --ym-surface: #ffffff;
    --ym-text: #334155;
    --ym-heading: #0f172a;
    --ym-border: #e2e8f0;
    --ym-primary: #d97706;
    --ym-accent: #7c3aed;
    --ym-code-bg: #0f172a;
    --ym-code-text: #38bdf8;
    --ym-success: #10b981;
    --ym-shadow-sm: 0 4px 6px -1px rgba(15, 23, 42, 0.05);
    --ym-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
    --ym-shadow-lg: 0 20px 40px -10px rgba(217, 119, 6, 0.15);
}

.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page {
    background-color: var(--ym-bg);
    color: var(--ym-text);
    font-family: 'Inter', sans-serif;
    padding-bottom: 100px;
}

.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap h1,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap h2,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap h3,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap h4,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap h5,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page h6 {
    color: #0f172a !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap p,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap li,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap span:not(.ym-mac-dot):not(.ym-comment):not(.ym-command):not(.ym-btn-primary span),
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-section strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-prose strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-content-section strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .claude-intro-section strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ai-finops-intro-section strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page [class*='-intro-section'] strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-faq-section strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-toc-wrap strong,
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page em {
    color: #334155 !important;
    word-wrap: break-word;
    overflow-wrap: anywhere;
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page pre, .claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page code {
    white-space: pre-wrap !important;
    word-break: break-all !important;
    overflow-x: hidden !important;
}


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
    background: rgba(217, 119, 6, 0.1);
    color: var(--ym-primary) !important;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 24px;
    border: 1px solid rgba(217, 119, 6, 0.2);
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
    background: linear-gradient(90deg, #d97706, #8b5cf6);
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
    box-shadow: 0 10px 20px -5px rgba(217, 119, 6, 0.4);
}
.ym-btn-primary span { color: #fff !important; }
.ym-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px -5px rgba(217, 119, 6, 0.5);
    background: #b45309;
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
    max-width: min(26rem, 38vw);
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
    border-color: rgba(217, 119, 6, 0.2);
}
.ym-card-icon {
    width: 60px; height: 60px;
    background: rgba(217, 119, 6, 0.05);
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
#smb-workflow-hero.smb-workflow-hero {
  min-height: 100vh;
  min-height: 100dvh;
  position: relative;
}
.claude-intro-section { padding: 56px 0 24px; }
.claude-intro-grid {
  display: grid;
  grid-template-columns: minmax(0, 1.2fr) minmax(260px, 0.8fr);
  gap: clamp(24px, 4vw, 40px);
  align-items: start;
}
.claude-intro-text {
  border-left: 4px solid transparent;
  border-image: linear-gradient(180deg, #d97706, #7c3aed) 1;
  padding-left: clamp(16px, 3vw, 24px);
  text-align: left !important;
}
.claude-intro-text p { text-align: left !important; }
.claude-intro-deco .ym-mac-window { margin-bottom: 0; }
.claude-kpi-chips {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 16px;
}
.claude-kpi-chips span {
  padding: 8px 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 999px;
  font-size: 13px;
  font-weight: 600;
  color: var(--ym-heading) !important;
}
.ym-toc-wrap { padding: 8px 0 48px; text-align: center; }
.ym-prose { max-width: 900px; margin: 0 auto; text-align: left; }
.ym-prose .ym-lead-text { font-size: 17px; line-height: 1.75; margin-bottom: 20px; }
.ym-h3 { font-size: 24px; font-weight: 700; margin: 36px 0 16px; color: var(--ym-heading) !important; }
.ym-list { margin: 0 0 24px 1.2em; line-height: 1.7; }
.ym-list-ordered { list-style: decimal; }
.ym-table-wrap { overflow-x: auto; margin: 24px 0 32px; }
.ym-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 14px;
  background: var(--ym-surface);
  border: 1px solid var(--ym-border);
  border-radius: 12px;
  overflow: hidden;
}
.ym-table th, .ym-table td {
  padding: 12px 16px;
  border-bottom: 1px solid var(--ym-border);
  text-align: left;
  vertical-align: top;
}
.ym-table th { background: #f1f5f9; font-weight: 700; }
.ym-faq-geo { margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--ym-border); }
.ym-faq-geo h4 { font-size: 18px; margin: 20px 0 8px; }
.ym-sources-list { list-style: none; padding: 0; margin: 0; }
.ym-sources-list li { margin-bottom: 12px; }
@media (max-width: 900px) {
  .claude-intro-grid { grid-template-columns: 1fr; }
}


.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-panel { margin: 48px 0; padding: 0; }
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-card {
  padding: clamp(24px, 4vw, 40px);
  border: 1px solid var(--ym-border, #e2e8f0);
  border-radius: 20px;
  background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
  box-shadow: var(--ym-shadow, 0 12px 40px rgba(15, 23, 42, 0.08));
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-card--secondary {
  background: #ffffff;
  border-left: 4px solid var(--ym-accent, #7c3aed);
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-title {
  margin: 0 0 12px;
  font-size: clamp(22px, 3vw, 28px);
  color: var(--ym-heading, #0f172a);
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-cta-lead {
  margin: 0 0 20px;
  color: var(--ym-text, #334155);
  line-height: 1.6;
}
.claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page .ym-ad-banner-wrap {
  margin: 56px auto 32px;
  text-align: center;
}

</style>

<main id="primary" class="site-main claude-dlya-malogo-biznesa-ai-avtomatizaciya-workflow-page" role="main" tabindex="-1">

<section id="smb-workflow-hero" class="fullscreen-white-office smb-workflow-hero" aria-label="Hero: Claude для малого бизнеса">
<style>
.smb-workflow-hero {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  box-sizing: border-box;
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
  background: #f8fafc;
  background-image:
    linear-gradient(rgba(148, 163, 184, 0.12) 1px, transparent 1px),
    linear-gradient(90deg, rgba(148, 163, 184, 0.12) 1px, transparent 1px);
  background-size: 48px 48px;
}
.smb-hero-grid {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: minmax(0, 0.4fr) minmax(0, 0.6fr);
  gap: clamp(20px, 3vw, 40px);
  align-items: center;
  max-width: 1440px;
  margin: 0 auto;
  min-height: min(72vh, 720px);
}
.smb-hero-main {
  display: flex;
  flex-direction: column;
  gap: clamp(14px, 2vh, 24px);
  min-width: 0;
}
.smb-hero-stage {
  position: relative;
  min-height: min(56vh, 560px);
  height: 100%;
  border-radius: 20px;
  overflow: hidden;
  background: rgba(255, 255, 255, 0.55);
  border: 1px solid rgba(226, 232, 240, 0.95);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.85), 0 20px 50px rgba(15, 23, 42, 0.06);
}
#smb-workflow-hub-canvas {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.smb-hero-copy {
  position: relative;
  max-width: 100%;
  z-index: 4;
}
.smb-workflow-hero .giant-seo {
  font-size: clamp(1.5rem, 2.75vw, 2.5rem);
  font-weight: 800;
  line-height: 1.12;
  letter-spacing: -0.02em;
  color: #0f172a;
  margin: 0;
  text-wrap: balance;
}
.smb-workflow-hero .giant-seo span {
  display: block;
  margin-top: 0.12em;
  background: linear-gradient(90deg, #d97706, #7c3aed);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.smb-workflow-hero .giant-seo-sub {
  font-size: clamp(15px, 1.65vw, 19px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin: 14px 0 0;
  max-width: 42ch;
  text-wrap: pretty;
}
.smb-workflow-hero .nn-hero-cta-group { margin-top: 16px; }
.smb-workflow-hero .vl-ui-tasks {
  position: relative;
  left: auto;
  bottom: auto;
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 8px;
  z-index: 3;
  max-width: 100%;
}
.smb-workflow-hero .vl-ui-task {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.06);
}
.smb-workflow-hero .vl-ui-task span {
  width: 26px;
  height: 26px;
  background: linear-gradient(135deg, #f97316, #8b5cf6);
  color: #fff;
  border-radius: 7px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}
.smb-workflow-hero .vl-ui-pill {
  position: relative;
  top: auto;
  right: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  gap: 8px;
  z-index: 3;
  max-width: 100%;
}
.smb-workflow-hero .vl-ui-pill span {
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
  .smb-hero-grid {
    grid-template-columns: 1fr;
    min-height: auto;
  }
  .smb-hero-stage {
    order: -1;
    min-height: min(42vh, 360px);
  }
  .smb-workflow-hero .vl-ui-tasks {
    grid-template-columns: 1fr;
    display: none;
  }
}
</style>

<div class="smb-hero-grid">
  <div class="smb-hero-main">
    <div class="vl-ui-pill" aria-label="Теги темы">
      <span>15 workflow</span>
      <span>MCP</span>
      <span>approve-before-send</span>
      <span>Make / n8n</span>
      <span>РФ-стек</span>
    </div>
    <nav class="vl-ui-tasks" aria-label="Этапы AI-workflow">
      <div class="vl-ui-task"><span>1</span> Скан коннекторов</div>
      <div class="vl-ui-task"><span>2</span> Маршрут по MCP</div>
      <div class="vl-ui-task"><span>3</span> Сборка сценария</div>
      <div class="vl-ui-task"><span>4</span> Approve владельца</div>
      <div class="vl-ui-task"><span>5</span> Handoff в CRM/1С</div>
    </nav>
    <div class="smb-hero-copy">
      <h1 class="giant-seo">Claude для малого бизнеса: <span>15 AI-workflow и коннекторы</span> — как повторить у себя</h1>
      <p class="giant-seo-sub">Anthropic встроил Claude в QuickBooks, HubSpot и Google Workspace — разбираем запуск 13 мая 2026 и как собрать такую же автоматизацию на Make, n8n и MCP для российского SMB</p>
      <?php echo nn_hero_cta_buttons(); ?>
    </div>
  </div>
  <div class="smb-hero-stage" aria-hidden="true">
    <canvas id="smb-workflow-hub-canvas"></canvas>
  </div>
</div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("smb-workflow-hub-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");

  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {
    const wrap = canvas.parentElement;
    if (!wrap) return;
    canvas.width = wrap.clientWidth || window.innerWidth;
    canvas.height = wrap.clientHeight || window.innerHeight;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw * 0.52;
    cy = ch * 0.5;
    scale = cw < 768 ? cw / 520 : Math.min(cw / 900, ch / 750) * 1.05;
  }
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {
    outline: "#0f172a",
    hubFill: "#ffffff",
    hubRing: "#c4b5fd",
    rail: "#94a3b8",
    railActive: "#8b5cf6",
    packetQB: "#22c55e",
    packetCRM: "#f97316",
    packetMCP: "#3b82f6",
    approve: "#10b981",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    ruStack: "#e0f2fe"
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

  class McpConnectorRail {
    constructor() {
      this.phaseOffset = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      const pulse = 0.35 + 0.25 * Math.sin(frame * 0.06);
      ctx.lineWidth = 3;
      ctx.lineCap = "round";
      const arcs = [
        { sx: -280, sy: 40, cx: -80, cy: -120, ex: 40, ey: -90 },
        { sx: 280, sy: 30, cx: 100, cy: -100, ex: 50, ey: -85 },
        { sx: -220, sy: 120, cx: 0, cy: 160, ex: 120, ey: 100 }
      ];
      arcs.forEach((a, i) => {
        ctx.strokeStyle = prg > 40 + i * 15 ? C.railActive : C.rail;
        ctx.globalAlpha = prg > 40 + i * 15 ? 1 : 0.45;
        ctx.beginPath();
        ctx.moveTo(a.sx, a.sy);
        ctx.quadraticCurveTo(a.cx, a.cy, a.ex, a.ey);
        ctx.stroke();
        const t = ((frame * 0.025 + i * 0.33) % 1);
        const px = (1 - t) * (1 - t) * a.sx + 2 * (1 - t) * t * a.cx + t * t * a.ex;
        const py = (1 - t) * (1 - t) * a.sy + 2 * (1 - t) * t * a.cy + t * t * a.ey;
        const colors = [C.packetQB, C.packetCRM, C.packetMCP];
        if (prg > 35 && prg < 200) {
          drawPolyRound(ctx, px - 8, py - 8, 16, 16, 3, colors[i % 3], C.outline);
        }
      });
      ctx.globalAlpha = 1;
      this.phaseOffset = pulse;
    }
  }

  class WorkflowRouterHub {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.slotFill = 0;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      ctx.lineJoin = "round";
      const r = 72;
      drawPolyRound(ctx, this.x - r, this.y - r, r * 2, r * 2, 20, C.hubFill, C.outline);
      ctx.strokeStyle = C.hubRing;
      ctx.lineWidth = 2;
      for (let i = 0; i < 15; i++) {
        const ang = (i / 15) * Math.PI * 2 - Math.PI / 2;
        const lit = prg > 50 && i < Math.floor((prg - 50) / 8);
        const dotR = lit ? 5 : 3;
        ctx.fillStyle = lit ? C.railActive : "#cbd5e1";
        ctx.beginPath();
        ctx.arc(this.x + Math.cos(ang) * 58, this.y + Math.sin(ang) * 58, dotR, 0, Math.PI * 2);
        ctx.fill();
      }
      if (prg > 110 && prg < 200) {
        const build = Math.min(1, (prg - 110) / 40);
        drawPolyRound(ctx, this.x - 55, this.y - 25, 110, 50, 6, "#fef3c7", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 9px Inter, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText("/close-month", this.x, this.y + 2);
        ctx.globalAlpha = build;
        drawPolyRound(ctx, this.x - 40, this.y - 18, 80, 8, 2, "#fde68a", null);
        ctx.globalAlpha = 1;
      }
      if (prg >= 200) {
        const fly = (prg - 200) / 40;
        const tx = 200 + fly * 80;
        const ty = 60 - fly * 30;
        drawPolyRound(ctx, tx - 35, ty - 20, 70, 40, 5, "#a7f3d0", C.outline);
        ctx.font = "bold 8px sans-serif";
        ctx.textAlign = "center";
        ctx.fillStyle = C.outline;
        ctx.fillText("✓ approved", tx, ty + 4);
      }
    }
  }

  class ConnectorNode {
    constructor(x, y, label, color) {
      this.x = x;
      this.y = y;
      this.label = label;
      this.color = color;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      const glow = prg < 60 && Math.sin(frame * 0.1 + this.x) > 0;
      drawPolyRound(ctx, this.x - 28, this.y - 18, 56, 36, 6, glow ? "#ecfdf5" : "#f1f5f9", C.outline);
      drawPolyRound(ctx, this.x - 20, this.y - 10, 14, 14, 3, this.color, C.outline);
      ctx.fillStyle = C.outline;
      ctx.font = "bold 8px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(this.label, this.x + 6, this.y + 6);
    }
  }

  class ApproveGate {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      const open = prg >= 165 && prg < 205;
      const flash = open && frame % 20 < 10;
      drawPolyRound(ctx, this.x - 42, this.y - 28, 84, 56, 8, flash ? "#d1fae5" : "#ffffff", C.outline);
      ctx.fillStyle = open ? C.approve : "#64748b";
      ctx.font = "bold 10px Inter, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(open ? "APPROVE ✓" : "HOLD", this.x, this.y - 4);
      ctx.font = "8px Inter, sans-serif";
      ctx.fillStyle = "#475569";
      ctx.fillText("before send", this.x, this.y + 10);
    }
  }

  class RuStackBridge {
    constructor(x, y) {
      this.x = x;
      this.y = y;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      drawPolyRound(ctx, this.x - 70, this.y - 35, 140, 70, 10, C.ruStack, C.outline);
      const stacks = ["amo", "1С", "TG"];
      stacks.forEach((s, i) => {
        drawPolyRound(ctx, this.x - 50 + i * 38, this.y - 12, 32, 28, 4, "#fff", C.outline);
        ctx.fillStyle = C.outline;
        ctx.font = "bold 8px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(s, this.x - 34 + i * 38, this.y + 4);
      });
      if (prg >= 200) {
        ctx.strokeStyle = C.approve;
        ctx.lineWidth = 2;
        ctx.setLineDash([6, 4]);
        ctx.beginPath();
        ctx.moveTo(50, -85);
        ctx.lineTo(this.x - 70, this.y);
        ctx.stroke();
        ctx.setLineDash([]);
      }
    }
  }

  class SlashTicket {
    constructor(x, y, text, phaseStart) {
      this.x = x;
      this.y = y;
      this.text = text;
      this.phaseStart = phaseStart;
    }
    draw(ctx) {
      const prg = (frame * 0.04) % 240;
      if (prg < this.phaseStart || prg > this.phaseStart + 35) return;
      const bob = Math.sin(frame * 0.08) * 4;
      drawPolyRound(ctx, this.x - 42, this.y + bob - 10, 84, 22, 4, "#fff7ed", C.outline);
      ctx.fillStyle = "#c2410c";
      ctx.font = "bold 8px monospace";
      ctx.textAlign = "center";
      ctx.fillText(this.text, this.x, this.y + bob + 2);
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
      const prg = (frame * 0.04) % 240;
      const targetX = 20 + (this.stepTrig % 3) * 8;
      const targetY = -70 - (this.stepTrig % 5) * 6;

      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {
        const localPrg = prg - this.stepTrig;
        if (localPrg < 11) {
          isMoving = true;
          faceDir = 1;
          carryType = this.color;
          this.x = this.baseX + (targetX - this.baseX) * (localPrg / 11);
          this.y = this.baseY + (targetY - this.baseY) * (localPrg / 11);
        } else if (localPrg < 16) {
          this.x = targetX;
          this.y = targetY;
        } else {
          isMoving = true;
          faceDir = -1;
          this.x = targetX - (targetX - this.baseX) * ((localPrg - 16) / 6);
          this.y = targetY - (targetY - this.baseY) * ((localPrg - 16) / 6);
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
        ctx.beginPath();
        ctx.moveTo(hx - 8, hy - 10);
        ctx.lineTo(hx - 14, hy - 18);
        ctx.lineTo(hx + 10, hy - 12);
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
      if (carryType) drawPolyRound(ctx, -18 * faceDir, -18 - bob, 16, 16, 2, carryType, C.outline);
      ctx.restore();
    }
  }

  const entities = [];
  const bubbles = [];
  const rail = new McpConnectorRail();
  const hub = new WorkflowRouterHub(30, -95);
  const gate = new ApproveGate(-120, -40);
  const bridge = new RuStackBridge(210, 55);

  entities.push(rail);
  entities.push(new ConnectorNode(-260, -60, "QB", C.packetQB));
  entities.push(new ConnectorNode(250, -50, "CRM", C.packetCRM));
  entities.push(new ConnectorNode(-200, 130, "M365", "#6366f1"));
  entities.push(new ConnectorNode(230, 110, "MCP", C.packetMCP));
  entities.push(hub);
  entities.push(gate);
  entities.push(bridge);
  entities.push(new SlashTicket(-180, -130, "/plan-payroll", 25));
  entities.push(new SlashTicket(160, -140, "/call-list", 70));
  entities.push(new SlashTicket(-40, 150, "/monday-brief", 115));

  entities.push(new Agent(-300, 80, C.agentYellow, "1_architect", 22, [
    "Карта 15 workflow…",
    "Слой Cowork на столе",
    "MCP-схема для SMB"
  ]));
  entities.push(new Agent(-140, 150, C.agentGreen, "2_seo", 58, [
    "Кластер «нейросети для бизнеса»",
    "QuickBooks в сниппете",
    "GEO: approve-before-send"
  ]));
  entities.push(new Agent(-20, 20, C.agentBlue, "3_coder", 98, [
    "Webhook на Make…",
    "n8n self-host OK",
    "MCP-сервер к 1С"
  ]));
  entities.push(new Agent(100, 130, C.agentPink, "4_designer", 138, [
    "Кнопка approve в CRM",
    "UX утреннего дайджеста",
    "Панель этапов готова"
  ]));
  entities.push(new Agent(180, 10, C.agentPurple, "5_deployer", 178, [
    "Пилот в amoCRM",
    "Без автосписаний!",
    "Handoff в Telegram"
  ]));

  function createBubble(x, y, text, customLife = 280) {
    bubbles.push({ x, y, text, life: customLife, maxLife: customLife });
  }

  function engineloop() {
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);

    if (frame % 240 === 1) {
      /* orbit wave on grid — env pulse */
    }
    const prg = (frame * 0.04) % 240;
    if (Math.abs(prg - 18) < 0.06) createBubble(-250, -80, "Скан: HubSpot + QB");
    if (Math.abs(prg - 75) < 0.06) createBubble(0, -130, "Пакет едет по MCP-рельсе");
    if (Math.abs(prg - 125) < 0.06) createBubble(30, -60, "Черновик /close-month");
    if (Math.abs(prg - 172) < 0.06) createBubble(-120, -70, "✓ Approve перед send");
    if (Math.abs(prg - 210) < 0.06) createBubble(210, 20, "Мост → amoCRM + 1С");

    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));

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
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
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

<section class="claude-intro-section reveal" id="vvedenie">
  <div class="ym-container">
    <div class="claude-intro-grid">
      <div class="claude-intro-text">
        <p><strong>Коротко:</strong> 13 мая 2026 Anthropic представила <strong>Claude for Small Business</strong> — не отдельную подписку, а режим в <strong>Claude Cowork</strong> (десктоп): 15 готовых agentic workflow, 15 building-block skills и MCP-коннекторы к QuickBooks, HubSpot, PayPal и другим сервисам. Формула продукта: Claude готовит черновики и сводки, <strong>владелец утверждает</strong> перед отправкой, публикацией или оплатой.</p>
<p>Для русскоязычного SMB вопрос звучит иначе: <strong>нейросети для бизнеса</strong> уже не равны «чату в браузере». Нужен <strong>операционный слой</strong> — как у Anthropic, но на <strong>amoCRM, Битрикс24, 1С, Telegram</strong> и связке <strong>Make / n8n / MCP</strong>, если западный стек недоступен. Ниже — разбор релиза по фактам первоисточников и карта, <strong>как повторить 15 сценариев</strong> без QuickBooks и HubSpot.</p>
      </div>
      <div class="claude-intro-deco reveal-right delay-200">
        <div class="ym-mac-window">
          <div class="ym-mac-header">
            <span class="ym-mac-dot r"></span><span class="ym-mac-dot y"></span><span class="ym-mac-dot g"></span>
            <span class="ym-mac-title">cowork — smb-workflow</span>
          </div>
          <div class="ym-mac-body">
            <div class="ym-command">/monday-brief</div>
            <div class="ym-comment"># cash + pipeline + calendar</div>
            <div class="ym-command">/close-month → approve</div>
            <div class="ym-comment"># QB ↔ PayPal → бухгалтеру</div>
            <div class="ym-command">handoff → amoCRM · 1С · TG</div>
          </div>
        </div>
        <div class="claude-kpi-chips" aria-hidden="true">
          <span>15 workflow</span><span>MCP</span><span>approve</span><span>Make/n8n</span>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="ym-toc-wrap reveal" aria-label="Оглавление">
  <div class="ym-container">
    <nav class="ym-toc">      <a href="#chto-takoe-claude-for-small-business">Что такое Claude SMB</a>
      <a href="#pyatnadcat-ai-workflow-anthropic">15 AI-workflow</a>
      <a href="#konnektory-i-mcp">MCP и коннекторы</a>
      <a href="#korobka-anthropic-vs-kastom">Коробка vs Make/n8n</a>
      <a href="#kak-povtorit-dlya-rossiyskogo-smb">Повторить в РФ</a>
      <a href="#bezopasnost-approve-before-send">Безопасность</a>
      <a href="#stoimost-tarify-cowork">Тарифы и окупаемость</a>
      <a href="#faq-nejroseti-ai-agenty">FAQ</a>
      <a href="#vnedrenie-pod-klyuch">Внедрение под ключ</a>
      <a href="#istochniki">Источники</a>
    </nav>
  </div>
</section>


<section class="ym-section reveal" id="chto-takoe-claude-for-small-business"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Что такое Claude for Small Business и почему это важно в мае 2026</h2>
<h3 class="ym-h3" id="релиз-13-мая-2026-и-отличие-от-просто-чата">Релиз 13 мая 2026 и отличие от «просто чата»</h3>
<p class="ym-lead-text"><strong>Определение:</strong> <em>Claude for Small Business</em> — плагин в экосистеме Cowork, который превращает Claude из собеседника в <strong>исполнителя многошаговых задач</strong> с доступом к вашим системам (бухгалтерия, CRM, почта, дизайн) при сохранении <strong>human-in-the-loop</strong>.</p>
<p class="ym-lead-text">По <a href="https://www.anthropic.com/news/claude-for-small-business" target="_blank" rel="noopener noreferrer">каноническому анонсу Anthropic</a> (13.05.2026) малый бизнес в США даёт <strong>~44% ВВП</strong> и <strong>~половину частной занятости</strong>, но внедрение AI отстаёт от enterprise. В опросе компании <strong>50% владельцев</strong> называют <strong>безопасность данных</strong> главным барьером. Релиз бьёт в боль «AI застрял в чате»: вместо копипаста из диалога — <strong>slash-команды</strong> вроде <code>/close-month</code> или <code>/call-list</code>, которые тянут данные из подключённых систем.</p>
<p class="ym-lead-text">Волна внимания усиливается к концу мая 2026: <strong>Claude SMB Tour</strong> (бесплатные полудневные воркшопы, 100 мест на город), партнёрство <strong>PayPal × Anthropic</strong> и бесплатный курс <strong>AI Fluency for Small Business</strong>. Для материала про <strong>AI для малого бизнеса</strong> это сигнал: рынок переходит от экспериментов к <strong>готовым workflow</strong>.</p>
<h3 class="ym-h3" id="claude-cowork-как-операционный-слой-не-отдельная-подписка">Claude Cowork как операционный слой, не отдельная подписка</h3>
<p class="ym-lead-text"><strong>Коротко:</strong> SMB-пакет <strong>не продаётся отдельным SKU</strong>. Нужны <strong>платный план Claude</strong> (Pro / Team / Max), <strong>десктопное приложение Cowork</strong> и подписки на SaaS-партнёров (QuickBooks, HubSpot и т.д.).</p>
<p class="ym-lead-text">С <strong>16 января 2026</strong> Cowork доступен на плане <strong>Pro</strong>, не только Max (<a href="https://support.claude.com/en/articles/11049762-choose-a-claude-plan" target="_blank" rel="noopener noreferrer">Help Center Anthropic</a>). При этом <strong>agentic Cowork</strong> расходует лимиты <strong>в 5–20 раз быстрее</strong>, чем обычный чат (оценка интеграторов, <a href="https://automatonagency.com/insights/claude-cowork-pricing" target="_blank" rel="noopener noreferrer">Automaton Agency</a>) — для ежедневных multi-step сценариев часто нужен <strong>Max</strong>, а не минимальный Pro.</p>
<p class="ym-lead-text">На Team/Enterprise по умолчанию <strong>не обучают модель на ваших данных</strong>; права в QuickBooks/Drive <strong>сохраняются как у пользователя</strong> — это часть trust-модели из пресс-релиза.</p>
<h3 class="ym-h3" id="15-готовых-agentic-workflow-и-15-skills-карта-по-отделам">15 готовых agentic workflow и 15 skills — карта по отделам</h3>
<p class="ym-lead-text">Anthropic публикует <strong>15 slash-команд</strong> и <strong>15 building-block skills</strong> (активируются «под капотом»): cash-flow forecasting, lead triage, invoice chasing, contract review, customer sentiment, tax prep, hiring packet builder, business-pulse, month-end-prep, content-strategy, ticket-deflector и др. — <a href="https://claude.com/plugins/small-business" target="_blank" rel="noopener noreferrer">страница плагина</a>.</p>
<p class="ym-lead-text">Роутер в Cowork <strong>выбирает сценарий</strong>; операции с деньгами и клиентами идут с <strong>approve before send</strong>. Если коннектор не подключён, workflow <strong>деградируют gracefully</strong> (официально на plugin page). Onboarding: команда <code>/smb-onboard</code>.</p>
<p class="ym-lead-text"><strong>Итог по разделу:</strong> Claude for Small Business — эталон <strong>«готовых AI workflow для бизнеса»</strong> с западным стеком; для России ценность — <strong>перенос логики сценариев</strong>, а не копирование биллинга в долларах.</p>
</div></div></section>
<section class="ym-section ym-section-alt reveal" id="pyatnadcat-ai-workflow-anthropic"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">15 AI-workflow Anthropic: финансы, продажи, маркетинг, HR и сервис</h2>
<p class="ym-lead-text">Ниже — официальные имена команд и зоны ответственности (<a href="https://claude.com/resources/tutorials/how-to-install-the-claude-for-small-business-plugin" target="_blank" rel="noopener noreferrer">tutorial Anthropic</a>, <a href="https://claude.com/solutions/small-business" target="_blank" rel="noopener noreferrer">solutions page</a>).</p>
<section
  class="boris-smb-workflow-map reveal"
  id="claude-dlya-malogo-biznesa-boris-block"
  aria-labelledby="boris-smb-workflow-map-title"
>
  <style>
    #claude-dlya-malogo-biznesa-boris-block {
      margin: 56px 0;
      font-family: Inter, system-ui, -apple-system, sans-serif;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-map-shell {
      max-width: 1300px;
      margin: 0 auto;
      padding: clamp(24px, 4vw, 40px);
      background: linear-gradient(145deg, #ffffff 0%, #f8fafc 55%, #f1f5f9 100%);
      border: 1px solid #e2e8f0;
      border-radius: 22px;
      box-shadow: 0 18px 48px rgba(15, 23, 42, 0.07);
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-map-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(280px, 0.85fr);
      gap: clamp(20px, 3vw, 36px);
      align-items: stretch;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-eyebrow {
      display: inline-block;
      margin: 0 0 10px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #64748b;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-kicker {
      margin: 0 0 12px;
      font-size: clamp(20px, 2.4vw, 26px);
      line-height: 1.25;
      color: #0f172a;
      font-weight: 700;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-lead {
      margin: 0 0 18px;
      font-size: 15px;
      line-height: 1.6;
      color: #334155;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 0 0 20px;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      color: #0f172a;
      background: #fff;
      border: 1px solid #e2e8f0;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-pill strong {
      color: #2563eb;
      font-weight: 800;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-bullets {
      margin: 0;
      padding: 0;
      list-style: none;
      display: grid;
      gap: 10px;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-bullets li {
      position: relative;
      padding-left: 18px;
      font-size: 14px;
      line-height: 1.5;
      color: #475569;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-bullets li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0.55em;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #10b981;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-bridge {
      margin: 18px 0 0;
      font-size: 13px;
      color: #64748b;
      font-style: italic;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-canvas-wrap {
      position: relative;
      min-height: 420px;
      border-radius: 18px;
      overflow: hidden;
      background: #fff;
      border: 1px solid #e2e8f0;
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.8);
    }
    #claude-dlya-malogo-biznesa-boris-block canvas {
      display: block;
      width: 100%;
      height: 100%;
      min-height: 420px;
    }
    #claude-dlya-malogo-biznesa-boris-block .boris-canvas-caption {
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: 10px;
      padding: 8px 12px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.92);
      border: 1px solid #e2e8f0;
      font-size: 11px;
      color: #475569;
      text-align: center;
      pointer-events: none;
    }
    @media (max-width: 1023px) {
      #claude-dlya-malogo-biznesa-boris-block .boris-map-grid {
        grid-template-columns: 1fr;
      }
      #claude-dlya-malogo-biznesa-boris-block .boris-canvas-wrap {
        min-height: 380px;
      }
    }
  </style>

  <div class="ym-container boris-map-shell">
    <div class="boris-map-grid">
      <div class="boris-copy">
        <p class="boris-eyebrow">Карта сценариев · май 2026</p>
        <h3 class="boris-kicker" id="boris-smb-workflow-map-title">
          15 AI-workflow Anthropic и точка approve
        </h3>
        <p class="boris-lead">
          Slash-команды сгруппированы по отделам: финансы, продажи, маркетинг и «business pulse».
          Операции с деньгами и клиентами проходят через <strong>human-in-the-loop</strong> — без автосписаний и массовых правок в CRM.
        </p>
        <div class="boris-pills" aria-hidden="true">
          <span class="boris-pill"><strong>15</strong> workflow</span>
          <span class="boris-pill"><strong>4</strong> зоны</span>
          <span class="boris-pill">approve-before-send</span>
        </div>
        <ul class="boris-bullets">
          <li>Финансы: payroll, month-end, cash-flow, налоги</li>
          <li>Продажи: lead triage, invoice chaser, contract review</li>
          <li>Маркетинг: кампании HubSpot → Canva, CRM-гигиена</li>
          <li>Пульс: Monday/Friday brief, жалобы, квартальный срез</li>
        </ul>
        <p class="boris-bridge">Дальше разберём каждую зону по таблицам и коннекторам.</p>
      </div>

      <div class="boris-canvas-wrap">
        <canvas
          id="smb-fifteen-workflow-matrix-canvas"
          role="img"
          aria-label="Анимированная схема: 15 workflow по отделам и шлюз утверждения перед отправкой"
        ></canvas>
        <p class="boris-canvas-caption" id="boris-smb-canvas-live-caption">
          Подсветка: финансы · данные → черновик → утверждение владельца
        </p>
      </div>
    </div>
  </div>

  <script>
  (function () {
    var canvas = document.getElementById("smb-fifteen-workflow-matrix-canvas");
    if (!canvas) return;
    var caption = document.getElementById("boris-smb-canvas-live-caption");
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 0, H = 0, frame = 0;

    var palette = {
      ink: "#0f172a",
      muted: "#64748b",
      line: "#cbd5e1",
      fin: "#0ea5e9",
      sales: "#8b5cf6",
      mkt: "#f59e0b",
      ops: "#10b981",
      gate: "#ef4444",
      gateOk: "#22c55e",
      card: "#ffffff",
      cardHi: "#eff6ff"
    };

    var zones = [
      { key: "fin", label: "Финансы", color: palette.fin, x: 0.08, y: 0.1, w: 0.4, h: 0.36 },
      { key: "sales", label: "Продажи", color: palette.sales, x: 0.52, y: 0.1, w: 0.4, h: 0.36 },
      { key: "mkt", label: "Маркетинг", color: palette.mkt, x: 0.08, y: 0.52, w: 0.4, h: 0.22 },
      { key: "ops", label: "Пульс / HR", color: palette.ops, x: 0.52, y: 0.52, w: 0.4, h: 0.22 }
    ];

    var workflows = [
      { zone: "fin", cmd: "/plan-payroll", short: "payroll" },
      { zone: "fin", cmd: "/month-heads-up", short: "heads-up" },
      { zone: "fin", cmd: "/close-month", short: "close" },
      { zone: "fin", cmd: "/price-check", short: "margin" },
      { zone: "fin", cmd: "/tax-prep", short: "tax" },
      { zone: "sales", cmd: "/call-list", short: "leads" },
      { zone: "sales", cmd: "/sales-brief", short: "brief" },
      { zone: "sales", cmd: "/review-contract", short: "contract" },
      { zone: "mkt", cmd: "/run-campaign", short: "campaign" },
      { zone: "mkt", cmd: "/customer-pulse", short: "pulse" },
      { zone: "mkt", cmd: "/crm-cleanup", short: "crm" },
      { zone: "ops", cmd: "/monday-brief", short: "mon" },
      { zone: "ops", cmd: "/friday-brief", short: "fri" },
      { zone: "ops", cmd: "/quarterly", short: "Q" },
      { zone: "ops", cmd: "/handle-complaint", short: "support" }
    ];

    var nodes = [];
    var gate = { x: 0, y: 0, r: 0 };
    var activeIdx = 0;
    var phase = 0;

    function zoneByKey(key) {
      for (var i = 0; i < zones.length; i++) {
        if (zones[i].key === key) return zones[i];
      }
      return zones[0];
    }

    function layoutNodes() {
      nodes = [];
      var perZone = { fin: 0, sales: 0, mkt: 0, ops: 0 };
      workflows.forEach(function (wf, i) {
        var z = zoneByKey(wf.zone);
        var idx = perZone[wf.zone]++;
        var cols = wf.zone === "fin" || wf.zone === "sales" ? 2 : 2;
        var row = Math.floor(idx / cols);
        var col = idx % cols;
        var padX = 14;
        var padY = 28;
        var cellW = (z.w * W - padX * 2) / cols;
        var cellH = wf.zone === "fin" || wf.zone === "sales" ? 34 : 30;
        var nx = z.x * W + padX + col * cellW + cellW * 0.5;
        var ny = z.y * H + padY + row * cellH + cellH * 0.35;
        nodes.push({
          wf: wf,
          x: nx,
          y: ny,
          r: wf.zone === "fin" || wf.zone === "sales" ? 11 : 10,
          zone: z
        });
      });
      gate.x = W * 0.5;
      gate.y = H * 0.48;
      gate.r = Math.min(W, H) * 0.09;
    }

    function resize() {
      var wrap = canvas.parentElement;
      if (!wrap) return;
      var rect = wrap.getBoundingClientRect();
      W = Math.max(280, rect.width);
      H = Math.max(380, rect.height);
      canvas.width = W * dpr;
      canvas.height = H * dpr;
      canvas.style.width = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      layoutNodes();
    }

    function roundRect(x, y, w, h, r) {
      ctx.beginPath();
      if (ctx.roundRect) ctx.roundRect(x, y, w, h, r);
      else {
        ctx.moveTo(x + r, y);
        ctx.arcTo(x + w, y, x + w, y + h, r);
        ctx.arcTo(x + w, y + h, x, y + h, r);
        ctx.arcTo(x, y + h, x, y, r);
        ctx.arcTo(x, y, x + w, y, r);
      }
      ctx.closePath();
    }

    function drawZones() {
      zones.forEach(function (z) {
        var x = z.x * W + 6;
        var y = z.y * H + 4;
        var w = z.w * W - 12;
        var h = z.h * H - 8;
        ctx.fillStyle = "rgba(255,255,255,0.85)";
        roundRect(x, y, w, h, 12);
        ctx.fill();
        ctx.strokeStyle = z.color;
        ctx.lineWidth = 2;
        ctx.stroke();
        ctx.fillStyle = z.color;
        ctx.font = "600 11px Inter, system-ui, sans-serif";
        ctx.fillText(z.label, x + 10, y + 16);
      });
    }

    function drawApproveGate(t) {
      var pulse = 0.5 + 0.5 * Math.sin(t * 0.06);
      var grd = ctx.createRadialGradient(gate.x, gate.y, 4, gate.x, gate.y, gate.r * 1.4);
      grd.addColorStop(0, "rgba(239,68,68,0.15)");
      grd.addColorStop(1, "rgba(239,68,68,0)");
      ctx.fillStyle = grd;
      ctx.beginPath();
      ctx.arc(gate.x, gate.y, gate.r * 1.35, 0, Math.PI * 2);
      ctx.fill();

      ctx.fillStyle = "#fff";
      ctx.strokeStyle = phase > 120 ? palette.gateOk : palette.gate;
      ctx.lineWidth = 2.5;
      ctx.beginPath();
      ctx.arc(gate.x, gate.y, gate.r, 0, Math.PI * 2);
      ctx.fill();
      ctx.stroke();

      ctx.fillStyle = palette.ink;
      ctx.font = "700 10px Inter, system-ui, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("APPROVE", gate.x, gate.y - 4);
      ctx.font = "500 9px Inter, system-ui, sans-serif";
      ctx.fillStyle = palette.muted;
      ctx.fillText("перед send / pay", gate.x, gate.y + 10);
      ctx.textAlign = "left";

      var steps = ["Данные", "Черновик", "✓ Владелец", "Действие"];
      var sx = gate.x - gate.r * 1.55;
      var sy = gate.y + gate.r + 22;
      steps.forEach(function (label, i) {
        var px = sx + i * (gate.r * 0.95);
        var on = Math.floor((t + i * 25) / 45) % 4 === i;
        ctx.fillStyle = on ? palette.cardHi : "#f8fafc";
        ctx.strokeStyle = on ? palette.fin : palette.line;
        roundRect(px, sy, gate.r * 0.82, 22, 6);
        ctx.fill();
        ctx.stroke();
        ctx.fillStyle = on ? palette.ink : palette.muted;
        ctx.font = (on ? "600" : "500") + " 8px Inter, system-ui, sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(label, px + gate.r * 0.41, sy + 14);
      });
      ctx.textAlign = "left";
    }

    function drawFlowParticle(from, to, prog, color) {
      var x = from.x + (to.x - from.x) * prog;
      var y = from.y + (to.y - from.y) * prog;
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.arc(x, y, 4, 0, Math.PI * 2);
      ctx.fill();
    }

    function drawNodes(t) {
      var hi = activeIdx % nodes.length;
      var pulse = 0.5 + 0.5 * Math.sin(t * 0.08);
      nodes.forEach(function (n, i) {
        var isHi = i === hi;
        var z = n.zone;
        ctx.fillStyle = isHi ? z.color : palette.card;
        ctx.strokeStyle = isHi ? palette.ink : palette.line;
        ctx.lineWidth = isHi ? 2 : 1;
        ctx.beginPath();
        ctx.arc(n.x, n.y, n.r + (isHi ? 2 * pulse : 0), 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();
        if (isHi) {
          ctx.fillStyle = "#fff";
          ctx.font = "600 7px Inter, system-ui, sans-serif";
          ctx.textAlign = "center";
          ctx.fillText(n.wf.short, n.x, n.y + 2.5);
          ctx.textAlign = "left";
        }
      });

      var active = nodes[hi];
      if (active) {
        var prog = (t % 90) / 90;
        drawFlowParticle(
          { x: active.x, y: active.y },
          { x: gate.x, y: gate.y - gate.r * 0.2 },
          prog,
          active.zone.color
        );
        if (caption) {
          caption.textContent =
            "Подсветка: " +
            active.zone.label +
            " · " +
            active.wf.cmd +
            " → черновик → утверждение → действие";
        }
      }
    }

    function drawConnectors() {
      ctx.strokeStyle = "rgba(148,163,184,0.35)";
      ctx.lineWidth = 1;
      nodes.forEach(function (n) {
        ctx.beginPath();
        ctx.moveTo(n.x, n.y);
        ctx.lineTo(gate.x, gate.y);
        ctx.stroke();
      });
    }

    function tick() {
      frame++;
      if (frame % 75 === 0) activeIdx = (activeIdx + 1) % nodes.length;
      if (frame % 240 === 0) phase = (phase + 1) % 200;

      ctx.clearRect(0, 0, W, H);
      ctx.fillStyle = "#f8fafc";
      ctx.fillRect(0, 0, W, H);

      drawZones();
      drawConnectors();
      drawApproveGate(frame);
      drawNodes(frame);

      requestAnimationFrame(tick);
    }

    window.addEventListener("resize", resize);
    resize();
    requestAnimationFrame(tick);
  })();
  </script>
</section>
<h3 class="ym-h3" id="финансы-payroll-month-end-close-cash-flow-сверка-quickbookspaypal">Финансы — payroll, month-end close, cash-flow, сверка QuickBooks/PayPal</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Команда</th>
<th>Назначение</th>
<th>Коннекторы</th>
</tr></thead><tbody>
<tr>
<td><code>/plan-payroll</code></td>
<td>30-дневный cash forecast, просрочки, черновики напоминаний</td>
<td>QuickBooks, PayPal</td>
</tr>
<tr>
<td><code>/month-heads-up</code></td>
<td>«Узкая» неделя до month-end, риски</td>
<td>cash-flow skill</td>
</tr>
<tr>
<td><code>/close-month</code></td>
<td>Сверка QB↔PayPal, P&L narrative, пакет бухгалтеру</td>
<td>QB, PayPal, Google Drive</td>
</tr>
<tr>
<td><code>/price-check</code></td>
<td>Маржа, ценообразование</td>
<td>QB / PayPal</td>
</tr>
<tr>
<td><code>/tax-prep</code></td>
<td>Подготовка к налоговому сезону</td>
<td>QuickBooks</td>
</tr>
</tbody></table></div>
<p class="ym-lead-text">Для запросов вроде <strong>«month-end close автоматизация AI»</strong> или <strong>«автоматизация payroll нейросеть»</strong> смысл один: не «нейросеть считает налоги сама», а <strong>сборка данных + черновик + сверка + approve</strong> перед проводками.</p>
<h3 class="ym-h3" id="продажи-lead-triage-invoice-chaser-contract-review">Продажи — lead triage, invoice chaser, contract review</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Команда</th>
<th>Назначение</th>
<th>Коннекторы</th>
</tr></thead><tbody>
<tr>
<td><code>/call-list</code></td>
<td>Скоринг лидов, call cards</td>
<td>HubSpot</td>
</tr>
<tr>
<td><code>/sales-brief</code></td>
<td>Топ/аутсайдеры продаж, контент-план</td>
<td>QB или PayPal</td>
</tr>
<tr>
<td><code>/review-contract</code></td>
<td>Риски в договорах, redlines</td>
<td>DocuSign</td>
</tr>
</tbody></table></div>
<p class="ym-lead-text"><strong>Lead triage автоматизация CRM</strong> в коробке Anthropic завязана на <strong>HubSpot как первый CRM-коннектор Claude</strong> (заявление HubSpot на launch, <a href="https://www.digitalapplied.com/blog/claude-for-small-business-quickbooks-hubspot" target="_blank" rel="noopener noreferrer">обзор digitalapplied</a>). <strong>Invoice chaser</strong> и договорная проверка — типичные <strong>AI агенты для бизнеса</strong> с обязательной точкой подтверждения.</p>
<h3 class="ym-h3" id="маркетинг-кампании-hubspot-canva-контент-стратегия">Маркетинг — кампании HubSpot → Canva, контент-стратегия</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Команда</th>
<th>Назначение</th>
<th>Коннекторы</th>
</tr></thead><tbody>
<tr>
<td><code>/run-campaign</code></td>
<td>Slow season → оффер → Canva → stage в HubSpot</td>
<td>QB, HubSpot, Canva</td>
</tr>
<tr>
<td><code>/customer-pulse-check</code></td>
<td>Сентимент, тренды обращений</td>
<td>HubSpot, почта</td>
</tr>
<tr>
<td><code>/crm-cleanup</code></td>
<td>Гигиена CRM</td>
<td>HubSpot</td>
</tr>
</tbody></table></div>
<p class="ym-lead-text">Здесь закрывается кластер <strong>«нейросети для бизнеса примеры»</strong> в маркетинге: не генерация «постов ради постов», а связка <strong>данные CRM + визуал + стадия воронки</strong>.</p>
<h3 class="ym-h3" id="hr-и-business-pulse-утренний-дайджест-мониторинг-показателей">HR и «business pulse» — утренний дайджест, мониторинг показателей</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Команда</th>
<th>Назначение</th>
</tr></thead><tbody>
<tr>
<td><code>/monday-brief</code></td>
<td>Cash + pipeline + календарь + top-3 (подключено что есть; Slack в демо стека)</td>
</tr>
<tr>
<td><code>/friday-brief</code></td>
<td>Итоги недели vs прошлая</td>
<td>PayPal / HubSpot</td>
</tr>
<tr>
<td><code>/quarterly-review</code></td>
<td>Квартальный срез</td>
<td>multi-connector</td>
</tr>
<tr>
<td><code>/handle-complaint</code></td>
<td>Ответ по email + история заказа</td>
<td>Gmail/Outlook, CRM</td>
</tr>
</tbody></table></div>
<p class="ym-lead-text"><strong>Business pulse</strong> — ежедневный/еженедельный <strong>дайджест владельца</strong>: тот же интент, что у запроса <strong>«цифровые сотрудники для бизнеса»</strong>, но без передачи финальных решений машине.</p>
</div></div></section>
<section class="ym-section reveal" id="konnektory-i-mcp"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Коннекторы и MCP: как Claude подключается к QuickBooks, HubSpot, M365</h2>
<h3 class="ym-h3" id="что-дают-mcp-коннекторы-vs-обычные-интеграции">Что дают MCP-коннекторы vs обычные интеграции</h3>
<p class="ym-lead-text"><strong>Model Context Protocol (MCP)</strong> в 2026 — стандарт «последней мили» для агентов: единый способ дать модели <strong>читать и вызывать действия</strong> в внешних системах с журналированием. Anthropic передала MCP в <strong>AAIF/Linux Foundation</strong>; экосистема расширяется (в т.ч. Google в Gemini). По обзору <a href="https://www.digitalapplied.com/blog/mcp-adoption-statistics-2026-model-context-protocol" target="_blank" rel="noopener noreferrer">digitalapplied</a>, <strong>~41%</strong> software-организаций уже в production с MCP (Stacklok, 2026 — вторичная статистика в обзоре).</p>
<p class="ym-lead-text">Для бизнеса разница простая: обычная интеграция «CRM → почта» фиксирована; <strong>MCP для бизнеса</strong> позволяет агенту <strong>динамически</strong> выбирать инструменты (прочитать счёт, создать задачу, сгенерировать отчёт) в рамках политики доступа.</p>
<h3 class="ym-h3" id="slack-docusign-google-workspace-границы-и-approve">Slack, DocuSign, Google Workspace — границы и approve</h3>
<p class="ym-lead-text"><strong>Ядро на launch</strong> (пресс-релиз): Intuit QuickBooks, PayPal, HubSpot, Canva, DocuSign, Google Workspace, Microsoft 365.</p>
<p class="ym-lead-text"><strong>Расширение</strong> на solutions/plugin: Slack, Square, Stripe, Webflow, Gmail, Google Drive, Google Calendar. <strong>Slack</strong> в демо Monday brief — в стеке; статус май 2026 — <strong>поддерживается</strong>, не «coming soon». Расширение каталога Anthropic обещает в 2026 без публичных дат.</p>
<p class="ym-lead-text">Любая запись наружу (письмо клиенту, платёж, публикация) — через <strong>approve-before-send</strong>: зеркало для запросов <strong>«human in the loop автоматизация»</strong> и <strong>«безопасность AI автоматизации бизнес»</strong>.</p>
<h3 class="ym-h3" id="почему-в-рф-quickbookshubspot-часто-недоступны-что-ставить-вместо">Почему в РФ QuickBooks/HubSpot часто недоступны — что ставить вместо</h3>
<p class="ym-lead-text"><strong>Коротко:</strong> Claude.ai — <strong>геоблок</strong> и <strong>Stripe без российских карт</strong>; Cowork/SMB официально заточен под US-стек (<a href="https://companies.rbc.ru/news/ZWXpmF3EWX/claude-ai-v-rossii-kak-polzovatsya-servisom-i-kupit-podpisku-v-2026/" target="_blank" rel="noopener noreferrer">обзоры RBC/vc.ru</a>). У большинства российского SMB нет QuickBooks/PayPal/HubSpot — нужны <strong>1С, ЮKassa, amoCRM, Битрикс24, Telegram</strong>.</p>
<p class="ym-lead-text">Русскоязычные пересказы релиза (13.05) есть, но <strong>playbook «15 workflow → 1С/amoCRM»</strong> в топе почти не закрыт — наш угол материала.</p>
</div></div></section>
<section class="ym-section ym-section-alt reveal" id="korobka-anthropic-vs-kastom"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Коробка Anthropic vs кастом: Make, n8n, Zapier и Cursor</h2>
<h3 class="ym-h3" id="когда-достаточно-коробки-когда-нужен-self-hosted-n8n-152-фз">Когда достаточно «коробки», когда нужен self-hosted n8n (152-ФЗ)</h3>
<p class="ym-lead-text"><strong>Коробка</strong> уместна, если: команда в США/ЕС, стек уже на QB+HubSpot+M365, владелец готов к <strong>десктопу Cowork</strong> и лимитам Max.</p>
<p class="ym-lead-text"><strong>Кастом</strong> (Make, n8n, Albato + <strong>GigaChat / YandexGPT</strong>) — когда важны <strong>152-ФЗ</strong>, хранение данных в РФ, <strong>свой журнал действий агента</strong> и запрет автосписаний без кнопки в Telegram/CRM. Типовой SaaS-стек в РФ — <strong>от ~2 500 ₽/мес</strong>, кастомная интеграция <strong>от ~200 000 ₽</strong> (2–6 нед.) — <a href="https://ai-journal.ru/vnedrenie-ii-v-biznes/" target="_blank" rel="noopener noreferrer">ai-journal.ru</a>.</p>
<h3 class="ym-h3" id="сравнительная-таблица-make-n8n-zapier-для-smb">Сравнительная таблица Make / n8n / Zapier для SMB</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Платформа</th>
<th>Ориентир цены (источник)</th>
<th>Сильная сторона</th>
<th>Слабость vs Claude SMB</th>
</tr></thead><tbody>
<tr>
<td><strong>Claude SMB + Cowork</strong></td>
<td>Pro <strong>$20/мес</strong>, Max <strong>$100–200/мес</strong> + SaaS-партнёры (<a href="https://claude.com/pricing" target="_blank" rel="noopener noreferrer">Anthropic pricing</a>)</td>
<td>15 готовых ops-workflow, единый UI</td>
<td>US-стек, гео, лимиты agentic</td>
</tr>
<tr>
<td><strong>Zapier + Agents</strong></td>
<td>Professional <strong>от $19,99/мес</strong> + Agents Pro <strong>$33,33/мес</strong> (annual) (<a href="https://zapier.com/blog/best-ai-agents/" target="_blank" rel="noopener noreferrer">Zapier blog</a>)</td>
<td>9000+ apps, MCP-мост, audit logs</td>
<td>Нужна сборка сценариев</td>
</tr>
<tr>
<td><strong>Make / n8n</strong></td>
<td>Make — no-code тарифы; n8n — self-host для compliance</td>
<td>Гибкость, РФ-коннекторы через Albato/API</td>
<td>Нет «15 команд из коробки»</td>
</tr>
<tr>
<td><strong>Microsoft 365 Copilot</strong></td>
<td>Add-on <strong>~$30/user/mo</strong> annual (<a href="https://learn.microsoft.com/en-us/answers/questions/5867184/pricing-for-microsoft-365-co-pilot" target="_blank" rel="noopener noreferrer">Microsoft Learn Q&A</a>); промо Business <strong>~$18</strong> до 30.06.2026</td>
<td>Нативно Word/Excel/Teams</td>
<td>Не QB/HubSpot-специфичные SMB-workflow</td>
</tr>
<tr>
<td><strong>HubSpot Breeze Agents</strong></td>
<td>В <strong>Professional+</strong> CRM; кредиты/outcome (<a href="https://knowledge.hubspot.com/ai/understand-breeze" target="_blank" rel="noopener noreferrer">HubSpot KB, 31.03.2026</a>)</td>
<td>CRM-native маркетинг+sales</td>
<td>Не закрывает бухгалтерию 1С</td>
</tr>
</tbody></table></div>
<p class="ym-lead-text">Запросы <strong>«Make n8n сравнение»</strong>, <strong>«Zapier Make n8n что выбрать»</strong> — про <strong>владение данными и TCO</strong>, не про бренд нейросети.</p>
<h3 class="ym-h3" id="cursor-mcp-собрать-свой-слой-автоматизации-контраст-с-deploycoenterprise">Cursor + MCP: собрать свой слой автоматизации (контраст с DeployCo/enterprise)</h3>
<p class="ym-lead-text"><strong>OpenAI DeployCo</strong> (11.05.2026) — ставка на enterprise Forward Deployed Engineers; <strong>Claude SMB</strong> — противоположный полюс: владелец магазина без отдела разработки.</p>
<p class="ym-lead-text">Для технической команды в мае 2026 актуален <strong>Cursor Automations + MCP</strong> (<a href="https://cursor.com/changelog" target="_blank" rel="noopener noreferrer">changelog Cursor</a>): тот же протокол MCP, другой UI — «операции в Cowork / разработка агентов в IDE». <strong>Cursor MCP автоматизация</strong> — путь собрать <strong>свои</strong> slash-аналоги на webhook + approve в Slack/Telegram.</p>
</div></div></section>
<section class="ym-section reveal" id="kak-povtorit-dlya-rossiyskogo-smb"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Как повторить сценарии для российского SMB: amoCRM, Битрикс24, 1С, мессенджеры</h2>
<h3 class="ym-h3" id="lead-triage-и-ai-бот-в-amocrm">Lead triage и AI-бот в amoCRM</h3>
<p class="ym-lead-text"><strong>Аналог <code>/call-list</code>:</strong> webhook нового лида → LLM (GigaChat/YandexGPT/Claude API через легальный доступ) → скоринг + call card в карточке → <strong>задача менеджеру</strong>, не автозвонок.</p>
<p class="ym-lead-text">Ключи: <strong>amoCRM AI бот</strong>, <strong>AI бот для amoCRM интеграция</strong>, <strong>автоматизация CRM нейросетью</strong>. Сборка: amoCRM + Make/n8n + <a href="https://blog.albato.ru/kak-nastroit-ii-agenta-chek-list-iz-10-shagov/" target="_blank" rel="noopener noreferrer">чек-лист Albato</a> (10 шагов агента).</p>
<h3 class="ym-h3" id="ai-агенты-и-мартаbitrixgpt-в-битрикс24-mcp-во-внешние-системы">AI-агенты и Марта/BitrixGPT в Битрикс24 + MCP во внешние системы</h3>
<p class="ym-lead-text"><strong>Битрикс24 AI агент</strong> и встроенные сценарии закрывают <code>/handle-complaint</code>, <code>/crm-cleanup</code> частично. Для <strong>MCP amoCRM</strong> / <strong>MCP сервер 1С</strong> — вынести «тяжёлую» логику во внешний MCP-сервер, Bitrix — оркестратор задач и approve.</p>
<h3 class="ym-h3" id="mcp-и-нейросети-для-1с-и-документооборота">MCP и нейросети для 1С и документооборота</h3>
<p class="ym-lead-text">Запросы <strong>«нейросеть для документооборота»</strong>, <strong>«AI проверка договоров»</strong>, <strong>«автоматизация 1С нейросеть»</strong> — зона <code>/review-contract</code> и <code>/close-month</code>: чтение регламентов, сравнение с шаблоном, <strong>redlines без автоподписи</strong>.</p>
<p class="ym-lead-text"><strong>MCP сервер 1С</strong> (community/интегратор) + self-hosted n8n — типовой паттерн при <strong>152-ФЗ</strong>: модель не хранит базу, работает через API с маскированием ПДн.</p>
<h3 class="ym-h3" id="gigachat-yandexgpt-там-где-западный-стек-недоступен">GigaChat / YandexGPT там, где западный стек недоступен</h3>
<p class="ym-lead-text"><strong>GigaChat для бизнеса автоматизация</strong> и YandexGPT API — легальный контур для РФ. Матрица <strong>15→15</strong>: слева slash Anthropic, справа — российский триггер (расписание/webhook) + <strong>точка approve</strong> (кнопка в Telegram, статус в CRM).</p>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th>Anthropic</th>
<th>Российский эквивалент (логика)</th>
</tr></thead><tbody>
<tr>
<td><code>/plan-payroll</code></td>
<td>1С + платёжный шлюз → прогноз кассы → черновик напоминания в Telegram</td>
</tr>
<tr>
<td><code>/close-month</code></td>
<td>Сверка 1С ↔ эквайринг → отчёт бухгалтеру в Drive/Диадок</td>
</tr>
<tr>
<td><code>/call-list</code></td>
<td>amoCRM lead scoring</td>
</tr>
<tr>
<td><code>/run-campaign</code></td>
<td>Битрикс + Canva-аналог + рассылка</td>
</tr>
<tr>
<td><code>/monday-brief</code></td>
<td>Сводка из CRM + касса + календарь</td>
</tr>
</tbody></table></div>
</div></div></section>
<section class="ym-section ym-section-alt reveal" id="bezopasnost-approve-before-send"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Безопасность: approve-before-send, права доступа и human-in-the-loop</h2>
<h3 class="ym-h3" id="модель-доверия-что-claude-читает-что-пишет-где-нужно-подтверждение">Модель доверия: что Claude читает, что пишет, где нужно подтверждение</h3>
<p class="ym-lead-text">Anthropic: <em>«Claude делает работу; вы утверждаете перед отправкой, публикацией или оплатой»</em>. Задачи инициирует <strong>владелец</strong>; права в SaaS <strong>не расширяются</strong> сверх учётки пользователя.</p>
<p class="ym-lead-text">Для РФ добавьте: журнал действий агента, роли «только чтение» для LLM, <strong>запрет автосписаний</strong> — зеркало trust-модели на ожиданиях регулятора.</p>
<h3 class="ym-h3" id="ошибки-и-эскалации-когда-автоматизацию-останавливать">Ошибки и эскалации — когда автоматизацию останавливать</h3>
<p class="ym-lead-text">Останавливать сценарий, если: модель <strong>галлюцинирует цифры</strong> в P&L; CRM <strong>массово меняет стадии</strong>; договор ушёл без юриста; платёж без второго фактора.</p>
<p class="ym-lead-text"><strong>Итог:</strong> <strong>approve before send AI</strong> — не опция, а <strong>архитектурное правило</strong> для <strong>внедрение AI в бизнес</strong> любого масштаба.</p>
<h3 class="ym-h3" id="chek-list-vnedreniya-4-nedeli">Чек-лист внедрения для владельца малого бизнеса (4 недели)</h3>
<p class="ym-lead-text">Адаптация rollout-логики из decision frameworks (US-only стек → универсальная схема):</p>
<ol class="ym-list ym-list-ordered">
<li><strong>Неделя 1:</strong> аналог <code>/monday-brief</code> — одна утренняя сводка, без исходящих писем.</li>
<li><strong>Неделя 2:</strong> invoice chaser — только черновики напоминаний.</li>
<li><strong>Неделя 3:</strong> lead triage — скоринг без смены ответственного.</li>
<li><strong>Неделя 4:</strong> один маркетинговый workflow с approve в CRM.</li>
</ol>
<p class="ym-lead-text">Метрика: время владельца на «клеркскую» работу ↓, ошибки эскалации ↑ на первом этапе — норма.</p>
<?php
$nn_secondary_url   = nn_cta_url('secondary') ?: '';
$nn_secondary_label = nn_cta_label('secondary');
if ($nn_secondary_url) :
?>
<aside class="ym-cta-panel reveal" id="cta-secondary-obuchenie" aria-labelledby="cta-secondary-obuchenie-title">
  <div class="ym-card ym-cta-card ym-cta-card--secondary">
    <h3 class="ym-cta-title" id="cta-secondary-obuchenie-title">Закрепить чек-лист на практике</h3>
    <p class="ym-cta-lead">После пилота на Make или n8n команда держит сценарии сама: разбор MCP-коннекторов, сборка approve в Telegram/CRM и поддержка без ежедневного подрядчика.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-secondary" href="<?php echo esc_url($nn_secondary_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nn_secondary_label); ?></a>
    </div>
  </div>
</aside>
<?php endif; ?>
</div></div></section>
<section class="ym-section reveal" id="stoimost-tarify-cowork"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Стоимость, тарифы Cowork/Pro/Max и окупаемость для SMB</h2>
<h3 class="ym-h3" id="что-входит-в-подписку-vs-без-доплаты-к-тарифу">Что входит в подписку vs «без доплаты к тарифу»</h3>
<p class="ym-lead-text">FAQ solutions: пакет SMB <strong>без отдельной надбавки</strong> к Claude; нужны <strong>Claude Pro</strong> (индивидуалы) или <strong>Claude Team</strong> (команда) + <strong>десктоп Cowork</strong> + SaaS-партнёры.</p>
<p class="ym-lead-text"><strong>Pro:</strong> <strong>$20/мес</strong> ($200/год). <strong>Max 5x:</strong> <strong>$100/мес</strong>. <strong>Max 20x:</strong> <strong>$200/мес</strong> — <a href="https://support.claude.com/en/articles/11049762-choose-a-claude-plan" target="_blank" rel="noopener noreferrer">Help Center</a>.</p>
<p class="ym-lead-text">Плюс HubSpot, QuickBooks, DocuSign и т.д. — отдельные счета. <strong>Окупаемость</strong> считайте по часам владельца × ставка, не по цене только LLM.</p>
<h3 class="ym-h3" id="smb-tour-и-курс-ai-fluency-контекст-почему-сейчас">SMB Tour и курс AI Fluency — контекст «почему сейчас»</h3>
<ul class="ym-list">
<li><strong>AI Fluency for Small Business:</strong> <strong>9 уроков</strong>, ~<strong>54 мин</strong> видео, сертификат, <strong>бесплатно</strong>, on-demand с 13.05.2026 — <a href="https://anthropic.skilljar.com/ai-fluency-for-small-businesses" target="_blank" rel="noopener noreferrer">Skilljar</a>.</li>
<li>Опрос PayPal (в PR): <strong>82%</strong> SMB считают AI essential; <strong>73%</strong> — нет инструментов/обучения — <a href="https://newsroom.paypal-corp.com/2026-05-PayPal-partners-with-Anthropic-to-Close-the-AI-Gap-for-Small-Businesses" target="_blank" rel="noopener noreferrer">PayPal newsroom</a>.</li>
<li><strong>SMB Tour:</strong> Chicago <strong>14.05.2026</strong>; июнь: Hamilton Township NJ <strong>03.06</strong>, Baton Rouge <strong>10.06</strong>, Birmingham <strong>12.06</strong>, Salt Lake City <strong>16.06</strong>, Baltimore <strong>18.06</strong>, San Jose <strong>22.06</strong>, Indianapolis <strong>26.06</strong>; осенью 2026 — новые US-города. <strong>Европа/РФ-тур не анонсированы.</strong> Участникам — <strong>1 месяц Claude Max</strong>.</li>
</ul>
<p class="ym-lead-text"><strong>Контекст B2B:</strong> Ramp AI Index (май 2026) — доля бизнесов на Ramp с платежами Anthropic <strong>34,4%</strong> vs OpenAI <strong>32,3%</strong> (апрель 2026), впервые обгон; AI-adoption среди бизнесов Ramp <strong>50,6%</strong> — <a href="https://ramp.com/leading-indicators/ai-index-may-2026" target="_blank" rel="noopener noreferrer">ramp.com</a>. Это транзакционные данные корпкарт США, не глобальная доля рынка.</p>
</div></div></section>
<section class="ym-section ym-section-alt reveal" id="faq-nejroseti-ai-agenty"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">FAQ — нейросети и AI-агенты для малого бизнеса</h2>
<h3 class="ym-h3" id="с-чего-начать-без-программиста">С чего начать без программиста</h3>
<ol class="ym-list ym-list-ordered">
<li>Выберите <strong>один</strong> болезненный процесс (утренняя сводка или напоминания по счетам).</li>
<li>Подключите <strong>no-code</strong> (Make/Albato) + CRM.</li>
<li>Включите <strong>approve</strong> на любое исходящее действие.</li>
<li>Пройдите бесплатный <strong>AI Fluency</strong> (если доступен) или русскоязычный чек-лист интегратора.</li>
</ol>
<h3 class="ym-h3" id="нужен-ли-отдельный-разработчик-для-mcp">Нужен ли отдельный разработчик для MCP</h3>
<p class="ym-lead-text">Для <strong>готовых коннекторов</strong> Anthropic — нет. Для <strong>1С / кастом MCP / self-hosted n8n</strong> — да, на этапе пилота (2–6 нед., бюджеты от ~200 000 ₽ по рынку РФ). Дальше сценарии поддерживает аналитик с Make.</p>
<h3 class="ym-h3" id="claude-for-small-business-vs-microsoft-copilot-hubspot-breeze-кратко">Claude for Small Business vs Microsoft Copilot / HubSpot Breeze (кратко)</h3>
<div class="ym-table-wrap reveal"><table class="ym-table">
<thead><tr>
<th></th>
<th>Claude SMB</th>
<th>M365 Copilot</th>
<th>HubSpot Breeze</th>
</tr></thead><tbody>
<tr>
<td>Фокус</td>
<td>15 ops-workflow, QB/HubSpot</td>
<td>Документы, Teams</td>
<td>CRM-маркетинг</td>
</tr>
<tr>
<td>Цена LLM-слоя</td>
<td>от $20 + Max часто нужен</td>
<td>~$18–30/user</td>
<td>В тарифе CRM Pro+</td>
</tr>
<tr>
<td>РФ-стек</td>
<td>Плохо без обходов</td>
<td>M365 если есть</td>
<td>HubSpot редко</td>
</tr>
</tbody></table></div>
<h3 class="ym-h3" id="частые-вопросы-geo-блок">Частые вопросы (GEO-блок)</h3>
<p class="ym-lead-text"><strong>Что такое Claude for Small Business?</strong> Режим в Claude Cowork с 15 готовыми AI-workflow и MCP к бухгалтерии, CRM и офисным приложениям; владелец утверждает критические действия.</p>
<p class="ym-lead-text"><strong>Какие лучшие нейросети для бизнеса в 2026?</strong> Зависит от стека: для US-SMB — Claude SMB; для РФ — <strong>GigaChat/YandexGPT + CRM + Make/n8n</strong>; для Microsoft-цеха — Copilot.</p>
<p class="ym-lead-text"><strong>Нужны ли AI агенты для бизнеса отдельно от чата?</strong> Да, если цель — <strong>автоматизация бизнеса с помощью нейросетей</strong> в цикле «данные → черновик → approve», а не разовые промпты.</p>
<p class="ym-lead-text"><strong>Можно ли бесплатно?</strong> Курс AI Fluency — бесплатно; Claude Pro — платно; российские LLM часто имеют бесплатные tier с лимитами.</p>
<p class="ym-lead-text"><strong>Чем отличается внедрение AI агентов в компанию от покупки Copilot?</strong> Агенты = сценарии + интеграции + политика approve; Copilot = ассистент внутри офисных файлов без QB-специфичных workflow.</p>
</div></div></section>
<section class="ym-section reveal" id="vnedrenie-pod-klyuch"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Внедрение под ключ — когда звать интегратора Nero Network</h2>
<p class="ym-lead-text"><strong>Коротко:</strong> звоните интегратору, если за 4 недели self-service не закрыли <strong>сверку денег + CRM + договоры</strong> с желаемым уровнем доверия.</p>
<?php
$nn_primary_url   = nn_cta_url('primary');
$nn_primary_label = nn_cta_label('primary');
if ($nn_primary_url) :
?>
<aside class="ym-cta-panel reveal" id="cta-primary-vnedrenie" aria-labelledby="cta-primary-vnedrenie-title">
  <div class="ym-card ym-cta-card">
    <h3 class="ym-cta-title" id="cta-primary-vnedrenie-title">Внедрение AI-workflow под ваш CRM, 1С и мессенджеры</h3>
    <p class="ym-cta-lead">Сверим ваши процессы с 15 сценариями Anthropic, запустим пилот на 1–2 workflow (lead triage, month-end, утренняя сводка) и настроим approve-before-send без автосписаний и массовых правок в CRM.</p>
    <div class="ym-btn-group">
      <a class="ym-btn ym-btn-primary" href="<?php echo esc_url($nn_primary_url); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($nn_primary_label); ?></a>
    </div>
  </div>
</aside>
<?php endif; ?>
<p class="ym-lead-text">Nero Network закрывает коммерческий кластер <strong>«внедрение AI в бизнес»</strong>:</p>
<ul class="ym-list">
<li><strong>Аудит процессов</strong> — какие из 15 Anthropic-сценариев дают ROI на вашем стеке.</li>
<li><strong>Пилот 1–2 workflow</strong> — например lead triage + month-end пакет.</li>
<li><strong>Обучение вайбкодингу и MCP</strong> — чтобы команда не зависела от одного подрядчика.</li>
</ul>
<p class="ym-lead-text">Цитата <strong>Daniela Amodei</strong> (Anthropic): <em>«People run the business, and Claude helps take the late-night work off their plates.»</em> В российском SMB тот же принцип: <strong>люди принимают решения</strong>, нейросеть снимает клеркскую нагрузку — на ваших коннекторах.</p>
<p class="ym-lead-text"><strong>Передача:</strong> после лонгрида — Артур (CTA), Алина/Борис (визуал), Наташа (вёрстка), Юра (публикация).</p>
</div></div></section>
<section class="ym-section ym-section-alt reveal" id="istochniki"><div class="ym-container"><div class="ym-prose reveal"><h2 class="ym-section-title">Источники (сводка для проверки фактов)</h2>
<ul class="ym-list">
<li><a href="https://www.anthropic.com/news/claude-for-small-business" target="_blank" rel="noopener noreferrer">Anthropic — Claude for Small Business, 13.05.2026</a></li>
<li><a href="https://claude.com/solutions/small-business" target="_blank" rel="noopener noreferrer">Claude solutions / plugin / tutorial</a></li>
<li><a href="https://newsroom.paypal-corp.com/2026-05-PayPal-partners-with-Anthropic-to-Close-the-AI-Gap-for-Small-Businesses" target="_blank" rel="noopener noreferrer">PayPal × Anthropic PR</a></li>
<li><a href="https://ramp.com/leading-indicators/ai-index-may-2026" target="_blank" rel="noopener noreferrer">Ramp AI Index, май 2026</a></li>
<li><a href="https://support.claude.com/en/articles/11049762-choose-a-claude-plan" target="_blank" rel="noopener noreferrer">Anthropic — планы Pro/Max</a></li>
<li><a href="https://ai-journal.ru/vnedrenie-ii-v-biznes/" target="_blank" rel="noopener noreferrer">Внедрение ИИ в бизнес — бюджеты РФ</a></li>
</ul>
</div></div></section>

<?php
$nn_banner_url = getenv('AD_BANNER_URL') ?: '';
$nn_banner_img = getenv('AD_BANNER_IMAGE_URL') ?: '';
$nn_banner_alt = getenv('AD_BANNER_ALT') ?: 'Рекламный баннер партнёра';
if ($nn_banner_url && $nn_banner_img) :
?>
<div class="ym-ad-banner-wrap reveal" id="cta-ad-banner-bottom">
  <a href="<?php echo esc_url($nn_banner_url); ?>" target="_blank" rel="noopener noreferrer">
    <img src="<?php echo esc_url($nn_banner_img); ?>" width="970" height="90" alt="<?php echo esc_attr($nn_banner_alt); ?>" loading="lazy" decoding="async" style="max-width:100%; height:auto; border-radius:12px; box-shadow:var(--ym-shadow-sm);">
  </a>
</div>
<?php endif; ?>

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
      "headline": "Claude для малого бизнеса: 15 AI-workflow и коннекторы — как повторить у себя",
      "description": "Claude for Small Business (13.05.2026): 15 AI-workflow для финансов, продаж и HR. Как повторить на Make, n8n, MCP, amoCRM и 1С без QuickBooks.",
      "datePublished": "2026-05-30",
      "dateModified": "2026-05-30",
      "author": { "@type": "Organization", "name": "Nero Network" },
      "publisher": { "@type": "Organization", "name": "Nero Network" },
      "inLanguage": "ru-RU"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Что такое Claude for Small Business?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Режим в Claude Cowork с 15 готовыми AI-workflow и MCP к бухгалтерии, CRM и офисным приложениям; владелец утверждает критические действия."
          }
        },
        {
          "@type": "Question",
          "name": "С чего начать внедрение AI в малом бизнесе без программиста?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Выберите один процесс, подключите no-code (Make/Albato) и CRM, включите approve на исходящие действия."
          }
        },
        {
          "@type": "Question",
          "name": "Нужен ли разработчик для MCP?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Для готовых коннекторов Anthropic — нет; для 1С и кастом MCP на этапе пилота — обычно да."
          }
        }
      ]
    }
  ]
}
</script>

<?php
get_footer();
