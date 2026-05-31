# Hero layout — структурные эталоны

Фрагменты для **Алины** (HTML/JS каркас) и **Наташи** (вставка в `page-{slug}.php`).

Полная документация: `shared/longread-hero-layout-system.md`  
Параметры canvas по slug: `shared/longread-hero-canvas.defaults.json`

| Файл | Layout |
|------|--------|
| `grid-split.structure.partial.php` | MCP / Alice |
| `grid-split-opus.structure.partial.php` | Opus 4.8 |
| `enterprise-gateway.structure.partial.php` | KPMG / Cursor / Tokenmaxxing |
| `absolute-split.structure.partial.php` | FinOps / SMB / SF / Copilot |
| `grid-split.resize-js.snippet.js` | resize + cx/scale для grid-split |

Готовые страницы-эталоны grid-split:

- `../pages/page-mcp-ii-agent-kontrol-kachestva-prodazh.php`
- `../pages/page-yandex-alice-ai-llm-flash-avtomatizaciya-biznesa.php`

**Не копировать** старые hero с `position:absolute` на copy и `inset:0` canvas на весь экран — это до-шаблонная версия.
