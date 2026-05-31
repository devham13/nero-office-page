# Система hero-layout для лонгридов meta-journal

Единый источник правды для **наложения текста на canvas** и **двойного скролла**. Главная страница сайта **не** входит в эту схему.

## Что деплоить (и только это для «починки layout»)

| Артефакт | Назначение |
|----------|------------|
| `wordpress/includes/longread-hero-layout.css` | Глобальные правила Kadence, overflow, зоны canvas, grid-split / enterprise / absolute |
| `wordpress/includes/nn-cta.php` | `nn_longread_support_styles()` читает CSS с диска; CTA hero |
| `scripts/apply-longread-hero-template.py` | **Единственная** команда массового применения layout на прод |

**Запрещено** для исправления hero/scroll на уже опубликованных страницах:

- `scripts/patch-hero-inline-layout.py`
- `scripts/patch-hero-layout-scroll.py`
- regex-патчи inline CSS в `page-*.php` на сервере

Исключение: новая страница или полная пересборка hero — по **структурным** шаблонам ниже, затем публикация целого `page-{slug}.php`.

## Подключение на странице (Наташа)

В начале общего `<style>` страницы:

```php
<?php echo nn_longread_support_styles(); ?>
```

Дополнительные hero-стили Алины — **только** тематические (цвета, декор). Не дублировать:

- `overflow: hidden` на hero-shell (только `clip`)
- `inset: 0` на canvas без `.hero-stage` / `.hero-visual-col`
- `font-size: clamp(32px, …, 68px)` на H1
- `position: absolute` + `left/right` на copy, если layout = **grid-split** или **enterprise-gateway**

## Три типа layout

Параметры canvas: `shared/longread-hero-canvas.defaults.json`.

### 1. `grid-split` (MCP, Alice, AI FinOps, Claude SMB)

- Обёртка: `.mcp-qc-hero-wrap` / `.alice-flash-hero`
- Сетка: `.mcp-qc-hero-grid` / `.alice-hero-grid` → `0.4fr` / `0.6fr`
- Canvas в `.mcp-qc-hero-stage` / `.alice-hero-stage`, `resizeCanvas()` от **родителя stage**
- JS: `cx = cw * 0.52`, `scale ≈ 1.05` (см. defaults)
- Эталоны:
  - в репо: `wordpress/templates/pages/page-mcp-ii-agent-kontrol-kachestva-prodazh.php`
  - Alice (grid-split): `.cursor/page-yandex-alice-ai-llm-flash-avtomatizaciya-biznesa.php` → скопировать в `templates/pages/` перед `--page` (см. `wordpress/templates/pages/README.md`)
- Каркас: `wordpress/templates/hero/grid-split.structure.partial.php`

### 2. `enterprise-gateway` (KPMG, Cursor, Tokenmaxxing)

- Класс секции: `.hero-enterprise-gateway`
- `.hero-layout` → `0.42fr` / `0.58fr`
- Canvas **только** внутри `.hero-visual-col` (`inset: 0`, width 100%)
- Не позиционировать canvas от `left: 58%` относительно всей section
- Каркас: `wordpress/templates/hero/enterprise-gateway.structure.partial.php`

### 3. `absolute-split` (SMB, Copilot, Salesforce, $500M FinOps-office)

- Shell: `.finops-hero-shell`, `.smb-workflow-hero`, `.sf-hero-bridge`, …
- Глобальный CSS задаёт canvas **справа** (`--nn-hero-canvas-left: 58%`)
- Copy: `max-width: min(26rem, 38vw)`, якорь слева
- JS: `cx = cw * 0.78` (центр анимации в правой зоне)
- Inline в шаблоне **не** переопределять canvas на `inset: 0` full-bleed
- Каркас: `wordpress/templates/hero/absolute-split.structure.partial.php`

### Вариант: `grid-split-opus` (Claude Opus 4.8)

Как grid-split, но классы `.opus48-orchestra-hero`, `.opus48-hero-body`, `.opus48-hero-stage`.

## Алина: выбор layout

| Тема страницы | Рекомендуемый layout |
|---------------|----------------------|
| MCP / CRM / много UI-панелей слева | `grid-split` |
| Alice / Flash / аналогичная плотность UI | `grid-split` |
| Enterprise / gateway / «портал» | `enterprise-gateway` |
| FinOps / office / bridge / SMB лента | `absolute-split` |
| Opus / orchestra / workflows | `grid-split-opus` |

Перед сдачей hero сверить чеклист в `skills/animator-alina/SKILL.md` (§ Hero layout).

## Юра / директор

После правки layout:

```bash
python3 scripts/apply-longread-hero-template.py
python3 scripts/verify-hero-layout.py
```

Полная замена страницы (редко):

```bash
python3 scripts/apply-longread-hero-template.py --page mcp-ii-agent-kontrol-kachestva-prodazh
```

## Типичные регрессии

| Симптом | Причина | Решение |
|---------|---------|---------|
| Текст на canvas | absolute copy + full-bleed canvas | Перейти на grid-split или сузить copy + canvas 58% |
| Два скролла | `overflow: hidden` на hero/main | `overflow: clip`, см. global CSS |
| Патч «ничего не изменил» | Старый patch-скрипт | Только `apply-longread-hero-template.py` + пересборка hero по шаблону |
| `inset: auto !important` сбрасывает canvas | Устаревший nn-cta | Задеплоить `nn-cta.php` из репо |

См. также `shared/agent-pipeline-pitfalls.md` §6а, §7а.
