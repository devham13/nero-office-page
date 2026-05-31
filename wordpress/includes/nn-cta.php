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

    function nn_longread_layout_css_path(): string
    {
        return __DIR__ . '/longread-hero-layout.css';
    }

    /**
     * Глобальные стили hero/scroll для всех page-*.php.
     * Источник правды: wordpress/includes/longread-hero-layout.css
     * (см. shared/longread-hero-layout-system.md).
     */
    function nn_longread_support_styles(): string
    {
        $path = nn_longread_layout_css_path();
        if (is_readable($path)) {
            return (string) file_get_contents($path);
        }

        return '/* ERROR: missing ' . basename($path) . ' — deploy from repo wordpress/includes/ */';
    }
}
