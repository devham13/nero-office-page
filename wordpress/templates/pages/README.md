# Эталонные `page-{slug}.php`

Полные шаблоны grid-split для деплоя:

```bash
python3 scripts/apply-longread-hero-template.py --page mcp-ii-agent-kontrol-kachestva-prodazh
```

| Slug | В репозитории | Примечание |
|------|---------------|------------|
| `mcp-ii-agent-kontrol-kachestva-prodazh` | `page-mcp-ii-agent-kontrol-kachestva-prodazh.php` | эталон grid-split |
| `yandex-alice-ai-llm-flash-avtomatizaciya-biznesa` | копия из `.cursor/page-yandex-alice-…php` | не в git (secret scan); перед `--page` скопировать в эту папку |

Остальные лонгриды: hero по partials в `../hero/` + global CSS; полные PHP остаются на сервере до пересборки пайплайном.
