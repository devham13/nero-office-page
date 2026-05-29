<?php
/**
 * Глобальный подвал сайта (Контакты + Ресурсы).
 * Подключается из MU-плагина или page-{slug}.php перед get_footer().
 */

if (!function_exists('nero_network_footer_links')) {
    /**
     * @return array{resources: array<string, string>, contacts: array<string, string>, telegram_channel: string, telegram_personal: string}
     */
    function nero_network_footer_links(): array
    {
        $blog = getenv('FOOTER_BLOG_URL');
        if (!$blog && function_exists('home_url')) {
            $blog = home_url('/');
        }
        $blog = $blog ?: '/';

        $tg_channel = getenv('FOOTER_TELEGRAM_CHANNEL_URL') ?: getenv('HERO_TELEGRAM_URL');
        if (!$tg_channel) {
            $tg_channel = 'https://t.me/' . 'Neurinix'; // pragma: allowlist secret
        }

        return [
            'blog'              => $blog,
            'telegram_channel'  => $tg_channel,
            'telegram_personal' => getenv('FOOTER_CONTACT_TELEGRAM_URL') ?: 'https://t.me/gorbachevzd',
            'vk'                => getenv('FOOTER_CONTACT_VK_URL') ?: 'https://vk.com/yuriy__gorbachev',
            'max'               => getenv('FOOTER_CONTACT_MAX_URL') ?: 'https://max.ru/u/f9LHodD0cOIac1V9aeitpc3a3rZz5W7wHgXkh2Q8ebSLSbPL_SCZgEZ3yrs',
        ];
    }
}

if (!function_exists('nero_network_render_site_footer')) {
    function nero_network_render_site_footer(): void
    {
        static $rendered = false;
        if ($rendered) {
            return;
        }
        $rendered = true;

        $links = nero_network_footer_links();
        $site_name = function_exists('get_bloginfo') ? (string) get_bloginfo('name') : '';
        if ($site_name === '') {
            $site_name = (string) (getenv('FOOTER_SITE_NAME') ?: '');
        }
        $year      = (string) gmdate('Y');
        ?>
<style id="nero-network-site-footer-css">
  #colophon .site-footer-wrap .site-bottom-footer-wrap { display: none !important; }
  .nn-site-footer {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    background: #ffffff;
    color: #334155;
    border-top: 1px solid #e2e8f0;
    margin-top: 0;
  }
  .nn-site-footer a { color: #64748b; text-decoration: none; transition: color 0.2s; }
  .nn-site-footer a:hover { color: #0f172a; }
  .nn-site-footer__inner {
    max-width: 1290px;
    margin: 0 auto;
    padding: clamp(40px, 6vw, 64px) clamp(20px, 4vw, 48px) clamp(28px, 4vw, 40px);
  }
  .nn-site-footer__grid {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(0, 0.9fr) minmax(0, 0.9fr);
    gap: clamp(28px, 4vw, 48px);
    align-items: start;
  }
  .nn-site-footer__brand-title {
    font-size: clamp(28px, 3vw, 36px);
    font-weight: 800;
    letter-spacing: -0.04em;
    color: #0f172a;
    margin: 0 0 12px;
    line-height: 1;
  }
  .nn-site-footer__brand-title .nn-accent-m { color: #2563eb; }
  .nn-site-footer__brand-title .nn-accent-i { color: #ec4899; }
  .nn-site-footer__tagline {
    margin: 0 0 20px;
    font-size: 14px;
    line-height: 1.6;
    color: #64748b;
    max-width: 36ch;
  }
  .nn-site-footer__copy {
    margin: 20px 0 0;
    font-size: 13px;
    color: #94a3b8;
  }
  .nn-site-footer__heading {
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 16px;
  }
  .nn-site-footer__list {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }
  .nn-site-footer__list a { font-size: 14px; font-weight: 500; }
  .nn-site-footer__actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 14px;
    margin-top: clamp(32px, 5vw, 48px);
    padding-top: clamp(24px, 3vw, 32px);
    border-top: 1px solid #f1f5f9;
  }
  .nn-site-footer__btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 28px;
    border-radius: 999px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none !important;
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .nn-site-footer__btn:hover { transform: translateY(-1px); }
  .nn-site-footer__btn--ghost {
    background: #f1f5f9;
    color: #0f172a !important;
    border: 1px solid #e2e8f0;
  }
  .nn-site-footer__btn--primary {
    background: #2563eb;
    color: #ffffff !important;
    box-shadow: 0 10px 28px rgba(37, 99, 235, 0.25);
  }
  .nn-site-footer__btn--primary:hover { color: #ffffff !important; }
  @media (max-width: 900px) {
    .nn-site-footer__grid { grid-template-columns: 1fr; gap: 28px; }
    .nn-site-footer__actions { flex-direction: column; align-items: stretch; }
    .nn-site-footer__btn { width: 100%; }
  }
</style>
<footer class="nn-site-footer" aria-label="Подвал сайта">
  <div class="nn-site-footer__inner">
    <div class="nn-site-footer__grid">
      <div class="nn-site-footer__brand">
        <p class="nn-site-footer__brand-title"><?php echo esc_html($site_name); ?></p>
        <p class="nn-site-footer__tagline">
          <?php echo esc_html($site_name); ?> — автоматизация, нейросети и AI-инструменты для бизнеса и контента.
        </p>
        <p class="nn-site-footer__copy">&copy; <?php echo esc_html($year); ?> <?php echo esc_html($site_name); ?>. All rights reserved.</p>
      </div>
      <div class="nn-site-footer__col">
        <h2 class="nn-site-footer__heading">Ресурсы</h2>
        <ul class="nn-site-footer__list">
          <li><a href="<?php echo esc_url($links['blog']); ?>">Блог</a></li>
          <li><a href="<?php echo esc_url($links['telegram_channel']); ?>" target="_blank" rel="noopener noreferrer">Telegram-канал</a></li>
        </ul>
      </div>
      <div class="nn-site-footer__col">
        <h2 class="nn-site-footer__heading">Контакты</h2>
        <ul class="nn-site-footer__list">
          <li><a href="<?php echo esc_url($links['telegram_personal']); ?>" target="_blank" rel="noopener noreferrer">Telegram</a></li>
          <li><a href="<?php echo esc_url($links['vk']); ?>" target="_blank" rel="noopener noreferrer">ВКонтакте</a></li>
          <li><a href="<?php echo esc_url($links['max']); ?>" target="_blank" rel="noopener noreferrer">MAX</a></li>
        </ul>
      </div>
    </div>
    <div class="nn-site-footer__actions">
      <a class="nn-site-footer__btn nn-site-footer__btn--ghost" href="<?php echo esc_url($links['telegram_channel']); ?>" target="_blank" rel="noopener noreferrer">В Telegram</a>
      <a class="nn-site-footer__btn nn-site-footer__btn--primary" href="<?php echo esc_url($links['blog']); ?>">На главную блога</a>
    </div>
  </div>
</footer>
        <?php
    }
}
