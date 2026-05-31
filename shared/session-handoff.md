# Session Handoff

## 2026-05-31 — hero layout (все лонгриды)

- Выполнено на прод: `python3 scripts/apply-longread-hero-template.py` (global: `nn-cta.php`, `longread-hero-layout.css`).
- Перезалиты grid-split эталоны: `page-mcp-ii-agent-kontrol-kachestva-prodazh.php`, `page-yandex-alice-ai-llm-flash-avtomatizaciya-biznesa.php`.
- QA: `verify-hero-layout.py` — **11/11 OK** (наложение/скролл/canvas zone).
- Дальше: новые страницы только по `shared/longread-hero-layout-system.md`; patch-hero-* не использовать.

## 2026-05-28 — kpmg-claude-vnedrenie-ai-276-tysyach

- Юра: ❌ БЛОКЕР — SSH/FTP timeout из Cloud Agent; шаблон готов локально, live URL 404.
- Следующий шаг: повторить публикацию с self-hosted worker или локальной машины с доступом к 185.224.139.10:21/22.

