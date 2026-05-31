<?php
/**
 * CTA helpers for Nero Network longread page templates.
 * Env / wp-config constants override defaults (homepage-aligned).
 */
declare(strict_types=1);

if (!function_exists('nn_cta_defaults')) {
    function nn_cta_defaults(): array
    {
        return [
            'primary_url'     => 'https://t.me/gorbachevzd',
            'primary_label'   => 'Обсудить внедрение',
            'secondary_url'   => 'https://t.me/gorbachevzd',
            'secondary_label' => 'Обсудить проект',
        ];
    }

    /**
     * @param 'primary_url'|'primary_label'|'secondary_url'|'secondary_label' $key
     */
    function nn_cta_value(string $key): string
    {
        $env_map = [
            'primary_url'     => 'PRIMARY_CTA_URL',
            'primary_label'   => 'PRIMARY_CTA_LABEL',
            'secondary_url'   => 'SECONDARY_CTA_URL',
            'secondary_label' => 'SECONDARY_CTA_LABEL',
        ];
        $env_name = $env_map[$key] ?? '';
        if ($env_name !== '') {
            $from_env = getenv($env_name);
            if ($from_env !== false && $from_env !== '') {
                return $from_env;
            }
            if (defined($env_name)) {
                $const = constant($env_name);
                if (is_string($const) && $const !== '') {
                    return $const;
                }
            }
        }
        return nn_cta_defaults()[$key] ?? '';
    }

    function nn_cta_url(string $which = 'primary'): string
    {
        return nn_cta_value($which === 'secondary' ? 'secondary_url' : 'primary_url');
    }

    function nn_cta_label(string $which = 'primary'): string
    {
        return nn_cta_value($which === 'secondary' ? 'secondary_label' : 'primary_label');
    }

    /**
     * Single CTA button for footer / ym-btn-group blocks.
     */
    function nn_cta_button(string $label = '', string $which = 'primary'): string
    {
        $url   = nn_cta_url($which);
        $text  = $label !== '' ? $label : nn_cta_label($which);
        $class = $which === 'secondary' ? 'ym-btn ym-btn-secondary' : 'ym-btn ym-btn-primary';

        return sprintf(
            '<a class="%s" href="%s" target="_blank" rel="noopener noreferrer"><span>%s</span></a>',
            esc_attr($class),
            esc_url($url),
            esc_html($text)
        );
    }

    function nn_hero_cta_buttons(): string
    {
        $primary_url     = nn_cta_url('primary');
        $secondary_url   = nn_cta_url('secondary');
        $primary_label   = nn_cta_label('primary');
        $secondary_label = nn_cta_label('secondary');

        ob_start();
        ?>
<div class="nn-hero-cta-group" role="group" aria-label="Связаться с Nero Network">
  <a class="nn-hero-btn nn-hero-btn-primary" href="<?php echo esc_url($primary_url); ?>" target="_blank" rel="noopener noreferrer">
    <span><?php echo esc_html($primary_label); ?></span>
  </a>
  <a class="nn-hero-btn nn-hero-btn-secondary" href="<?php echo esc_url($secondary_url); ?>" target="_blank" rel="noopener noreferrer">
    <span><?php echo esc_html($secondary_label); ?></span>
  </a>
</div>
        <?php
        return (string) ob_get_clean();
    }

    function nn_longread_support_styles(): string
    {
        return <<<'CSS'
/* === Nero Network: изоляция Canvas-hero от Kadence и правил лонгрида === */

/* Kadence: inner-wrap не должен сжимать/накрывать кастомный main */
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
body[class*="page-template-page-"] .content-area,
body[class*="page-template-page-"] #inner-wrap.content-area {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}

/* Одна прокрутка страницы (без вложенного скролла у main/hero) */
main.site-main[class*="-page"],
.site-main[class*="-page"] {
  overflow-x: clip !important;
  overflow-y: visible !important;
  height: auto !important;
  max-height: none !important;
}

/* Hero — без внутренней прокрутки */
.fullscreen-white-office,
.hero-enterprise-gateway,
.smb-workflow-hero,
.finops-hero-shell,
[class*="-hero-shell"],
section[id$="-hero"],
main.site-main[class*="-page"] > section:first-of-type:has(canvas) {
  position: relative !important;
  isolation: isolate !important;
  overflow: clip !important;
  overflow-x: clip !important;
  overflow-y: clip !important;
  width: 100% !important;
  max-width: none !important;
  margin-left: 0 !important;
  margin-right: 0 !important;
  min-height: min(100vh, 100dvh) !important;
  max-height: none !important;
  height: auto !important;
  z-index: 0;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
}

/* Canvas — правая зона, текст слева не перекрывается */
section.fullscreen-white-office > canvas,
section[id$="-hero"] > canvas,
.finops-hero-shell > canvas,
.hero-enterprise-gateway > canvas,
.fullscreen-white-office > [id*="canvas"]:not([id*="boris"]),
.smb-workflow-hero .smb-hero-canvas-wrap,
.smb-workflow-hero > [class*="canvas-wrap"],
[class*="-hero-shell"] > canvas:first-of-type,
.hero-enterprise-gateway > canvas {
  position: absolute !important;
  left: 44% !important;
  right: 0 !important;
  top: 0 !important;
  bottom: 0 !important;
  width: 56% !important;
  height: 100% !important;
  inset: auto !important;
  display: block !important;
  z-index: 1 !important;
  pointer-events: none !important;
}

/* Текст hero — левая колонка */
.finops-hero-copy,
.sf-hero-copy,
.smb-hero-copy,
.alice-hero-copy,
.opus48-hero-copy,
.hero-copy-block,
.hero-copy-stack,
[class*="-hero-copy"] {
  left: clamp(16px, 3vw, 48px) !important;
  right: auto !important;
  max-width: min(460px, 40vw) !important;
  width: min(460px, 40vw) !important;
  box-sizing: border-box !important;
  padding-right: 16px !important;
  z-index: 6 !important;
}
.finops-hero-shell .giant-seo,
.smb-workflow-hero .giant-seo,
section[id$="-hero"] .giant-seo,
.hero-enterprise-gateway .giant-seo,
.fullscreen-white-office .giant-seo {
  max-width: 100% !important;
  word-wrap: break-word !important;
  overflow-wrap: anywhere !important;
}
.finops-hero-shell .giant-seo-sub,
.smb-workflow-hero .giant-seo-sub,
section[id$="-hero"] .giant-seo-sub {
  max-width: 100% !important;
}

/* Этапы слева — уже, не заходят на canvas */
.fullscreen-white-office .vl-ui-tasks,
.finops-hero-shell .vl-ui-tasks,
.smb-workflow-hero .vl-ui-tasks,
.hero-enterprise-gateway .vl-ui-tasks,
.sf-hero-phases {
  left: clamp(12px, 2vw, 32px) !important;
  max-width: min(220px, 36vw) !important;
  z-index: 4 !important;
}

@media (max-width: 960px) {
  section.fullscreen-white-office > canvas,
  section[id$="-hero"] > canvas,
  .finops-hero-shell > canvas,
  .smb-workflow-hero .smb-hero-canvas-wrap {
    left: 0 !important;
    width: 100% !important;
    opacity: 0.4;
  }
  .finops-hero-copy,
  .sf-hero-copy,
  .smb-hero-copy,
  [class*="-hero-copy"],
  .hero-copy-block {
    width: min(92vw, 520px) !important;
    max-width: 92vw !important;
  }
}

/* Типографика hero — перебивает Kadence h1 {32px} и .xxx-page span */
.giant-seo,
.fullscreen-white-office .giant-seo,
.smb-workflow-hero .giant-seo,
.finops-hero-shell .giant-seo,
.hero-enterprise-gateway .giant-seo,
section[id$="-hero"] .giant-seo {
  font-size: clamp(28px, 4.2vw, 68px) !important;
  line-height: 1.08 !important;
  font-weight: 900 !important;
  letter-spacing: -0.03em !important;
  color: #0f172a !important;
}
.giant-seo-sub,
.fullscreen-white-office .giant-seo-sub,
.smb-workflow-hero .giant-seo-sub,
.finops-hero-shell .giant-seo-sub,
.hero-enterprise-gateway .giant-seo-sub,
section[id$="-hero"] .giant-seo-sub {
  font-size: clamp(15px, 1.9vw, 21px) !important;
  line-height: 1.55 !important;
  color: rgba(15, 23, 42, 0.72) !important;
}
.giant-seo span,
.fullscreen-white-office .giant-seo span,
.smb-workflow-hero .giant-seo span,
.finops-hero-shell .giant-seo span,
.hero-enterprise-gateway .giant-seo span,
section[id$="-hero"] .giant-seo span {
  display: block !important;
  background: linear-gradient(90deg, #0284c7, #7c3aed) !important;
  -webkit-background-clip: text !important;
  background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  color: transparent !important;
}

/* UI-панели hero поверх canvas */
.smb-hero-copy,
.sf-hero-copy,
.finops-hero-copy,
.hero-copy-block,
.fullscreen-white-office .vl-ui-tasks,
.fullscreen-white-office .vl-ui-pill,
.smb-workflow-hero .vl-ui-tasks,
.smb-workflow-hero .vl-ui-pill,
.finops-hero-shell .vl-ui-tasks,
.finops-hero-shell .vl-ui-pill,
.nn-hero-cta-group {
  position: relative !important;
  z-index: 5 !important;
}
.smb-workflow-hero .vl-ui-task span,
.finops-hero-shell .vl-ui-task span,
.fullscreen-white-office .vl-ui-task span,
.hero-enterprise-gateway .vl-ui-task span {
  color: #fff !important;
  -webkit-text-fill-color: #fff !important;
}
.smb-workflow-hero .vl-ui-pill span,
.finops-hero-shell .vl-ui-pill span,
.fullscreen-white-office .vl-ui-pill span {
  color: #334155 !important;
  -webkit-text-fill-color: initial !important;
}

/* Эталон Метрики .ym-hero — не показывать поверх Canvas-hero */
.fullscreen-white-office .ym-hero,
.fullscreen-white-office .ym-hero-bg-anim,
section[id$="-hero"] .ym-hero,
[class*="-hero-shell"] .ym-hero {
  display: none !important;
}

.nn-hero-cta-group {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 20px;
}
.nn-hero-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 22px;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none !important;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.nn-hero-btn-primary {
  background: #0f172a;
  color: #fff !important;
  box-shadow: 0 4px 14px rgba(15, 23, 42, 0.2);
}
.nn-hero-btn-primary span { color: #fff !important; }
.nn-hero-btn-secondary {
  background: rgba(255, 255, 255, 0.95);
  color: #0f172a !important;
  border: 1px solid #e2e8f0;
}
.nn-hero-btn-secondary span { color: #0f172a !important; }
.nn-hero-btn:hover { transform: translateY(-2px); }
CSS;
    }
}
