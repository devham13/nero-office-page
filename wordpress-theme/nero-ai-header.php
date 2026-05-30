<?php
/**
 * Кастомная шапка pill-bar для лонгридов и лендингов.
 *
 * В шаблоне страницы:
 *   require_once __DIR__ . '/nero-ai-header.php';
 *   nero_ai_header_register();
 *   get_header();
 *   nero_ai_header_render();
 */

declare(strict_types=1);

if (!function_exists('nero_ai_header_register')) {
    function nero_ai_header_register(): void
    {
        add_filter('body_class', static function (array $classes): array {
            $classes[] = 'nero-custom-header';
            return $classes;
        });
    }
}

if (!function_exists('nero_ai_header_cta_url')) {
    function nero_ai_header_cta_url(): string
    {
        $from_env = getenv('PRIMARY_CTA_URL');
        if (is_string($from_env) && $from_env !== '' && $from_env !== '${PRIMARY_CTA_URL}') {
            return $from_env;
        }

        return 'https://t.me/gorbachevzd';
    }
}

if (!function_exists('nero_ai_header_nav_links')) {
    /**
     * @return array<int, array{label: string, url: string}>
     */
    function nero_ai_header_nav_links(): array
    {
        $home = trailingslashit(home_url('/'));

        return [
            ['label' => 'Услуги', 'url' => $home . '#services'],
            ['label' => 'Как работает', 'url' => $home . '#how-it-works'],
            ['label' => 'Процесс', 'url' => $home . '#process'],
            ['label' => 'Кому подходит', 'url' => $home . '#niches'],
            ['label' => 'Результат', 'url' => $home . '#nero-ai-results-section'],
            ['label' => 'FAQ', 'url' => $home . '#faq'],
        ];
    }
}

if (!function_exists('nero_ai_header_render')) {
    function nero_ai_header_render(): void
    {
        $css_path = __DIR__ . '/nero-ai-header.css';
        $js_path = __DIR__ . '/nero-ai-header.js';
        $css = is_readable($css_path) ? (string) file_get_contents($css_path) : '';
        $js = is_readable($js_path) ? (string) file_get_contents($js_path) : '';

        $cta_url = nero_ai_header_cta_url();
        $logo_url = get_site_icon_url(84);
        if (!$logo_url) {
            $logo_file = getenv('NERO_HEADER_LOGO_FILE') ?: 'neurinix-logo.jpg'; // pragma: allowlist secret
            $logo_url = get_stylesheet_directory_uri() . '/assets/images/' . ltrim($logo_file, '/');
        }
        $site_name = get_bloginfo('name') ?: '';
        $home_url = esc_url(home_url('/'));

        if ($css !== '') {
            echo '<style id="nero-ai-header-styles">' . $css . '</style>' . "\n";
        }

        ?>
<header class="nero-ai-header" id="nero-ai-header" role="banner">
  <div class="nero-ai-header-backdrop" aria-hidden="true" tabindex="-1"></div>
  <div class="nero-ai-header-shell">
    <div class="nero-ai-header-bar">
      <a class="nero-ai-header-logo" href="<?php echo $home_url; ?>" aria-label="<?php echo esc_attr($site_name . ' — на главную'); ?>">
        <img
          class="nero-ai-header-logo-img"
          src="<?php echo esc_url($logo_url); ?>"
          width="42"
          height="42"
          alt=""
          decoding="async"
        />
        <span class="nero-ai-header-logo-text"><?php echo esc_html($site_name); ?></span>
      </a>

      <nav class="nero-ai-header-nav" id="nero-ai-header-nav" aria-label="Основная навигация">
        <div class="nero-ai-header-pill">
          <?php foreach (nero_ai_header_nav_links() as $item) : ?>
            <a class="nero-ai-header-link" href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['label']); ?></a>
          <?php endforeach; ?>
          <a class="nero-ai-header-cta nero-ai-header-cta--mobile" href="<?php echo esc_url($cta_url); ?>" target="_blank" rel="noopener noreferrer">Получить AI-аудит</a>
        </div>
      </nav>

      <div class="nero-ai-header-actions">
        <a class="nero-ai-header-cta" href="<?php echo esc_url($cta_url); ?>" target="_blank" rel="noopener noreferrer">Получить AI-аудит</a>
        <button type="button" class="nero-ai-header-toggle" id="nero-ai-header-toggle" aria-expanded="false" aria-controls="nero-ai-header-nav">
          <span class="nero-ai-header-toggle-line" aria-hidden="true"></span>
          <span class="nero-ai-header-toggle-line" aria-hidden="true"></span>
          <span class="nero-ai-header-toggle-line" aria-hidden="true"></span>
          <span class="screen-reader-text">Меню</span>
        </button>
      </div>
    </div>
  </div>
</header>
        <?php

        if ($js !== '') {
            echo '<script id="nero-ai-header-script">' . $js . '</script>' . "\n";
        }
    }
}
