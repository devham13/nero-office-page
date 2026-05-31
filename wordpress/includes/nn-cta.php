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
            'primary_url'   => 'https://t.me/gorbachevzd',
            'primary_label' => 'Обсудить внедрение',
            'secondary_url' => 'https://t.me/gorbachevzd',
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

    function nn_hero_cta_buttons(): string
    {
        $primary_url   = nn_cta_url('primary');
        $secondary_url = nn_cta_url('secondary');
        $primary_label = nn_cta_label('primary');
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
/* Nero Network: hero isolation from Kadence + page-wide longread rules */
.fullscreen-white-office,
.hero-enterprise-gateway,
section[id$="-hero"] {
  isolation: isolate;
  position: relative;
  z-index: 1;
}
.fullscreen-white-office .giant-seo,
.hero-enterprise-gateway .giant-seo,
section[id$="-hero"] .giant-seo {
  color: #0f172a !important;
}
.fullscreen-white-office .giant-seo-sub,
.hero-enterprise-gateway .giant-seo-sub,
section[id$="-hero"] .giant-seo-sub {
  color: rgba(15, 23, 42, 0.72) !important;
}
.fullscreen-white-office .giant-seo span,
.hero-enterprise-gateway .giant-seo span,
section[id$="-hero"] .giant-seo span {
  display: block;
  background: linear-gradient(90deg, #0284c7, #7c3aed) !important;
  -webkit-background-clip: text !important;
  background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  color: transparent !important;
}
.nn-hero-cta-group {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 20px;
  position: relative;
  z-index: 5;
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
.fullscreen-white-office canvas,
.hero-enterprise-gateway canvas,
section[id$="-hero"] canvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
CSS;
    }
}
