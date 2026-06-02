# Session Handoff

## 2026-06-02 — openai-codex-plugins-sites-dlya-biznesa

- Юра: опубликовано через SFTP + WP-CLI (post ID 66), тема kadence.
- URL: [REDACTED]openai-codex-plugins-sites-dlya-biznesa/
- Проверка: HTTP 200, main#primary, hero/boris canvas, script, meta description (wp_head в шаблоне).
- Шаблон: `wordpress-theme/page-openai-codex-plugins-sites-dlya-biznesa.php`
- QA (Макс): PASS — HTTP 200, main#primary, canvas×2, CTA без битых маркеров; некритично: skip-link `#main` vs `#primary`.
- SEO (Лёня): B+, перепубликация не нужна; title + суффикс сайта, нет og:image/FAQPage schema.

## 2026-05-28 — kpmg-claude-vnedrenie-ai-276-tysyach

- Юра: ❌ БЛОКЕР — SSH/FTP timeout из Cloud Agent; шаблон готов локально, live URL 404.
- Следующий шаг: повторить публикацию с self-hosted worker или локальной машины с доступом к 185.224.139.10:21/22.
