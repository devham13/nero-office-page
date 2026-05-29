<?php
/**
 * Plugin Name: Nero Network Site Footer
 * Description: Глобальный подвал с колонками «Ресурсы» и «Контакты» на всех страницах.
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

$nero_footer_inc = __DIR__ . '/nero-network-site-footer-inc.php';
if (is_readable($nero_footer_inc)) {
    require_once $nero_footer_inc;
}

if (!function_exists('nero_network_render_site_footer')) {
    return;
}

add_action('kadence_before_footer', 'nero_network_render_site_footer', 5);
add_action('wp_footer', static function (): void {
    if (!did_action('kadence_before_footer')) {
        nero_network_render_site_footer();
    }
}, 8);
