# Hero enterprise-gateway: заголовок слева, анимация справа

Эталон live: slug `cursor-35-automations-no-repo-agenty-biznesa`, `kpmg-claude-vnedrenie-ai-276-tysyach`.

## CSS

Скопировать блок из **`shared/hero-enterprise-grid.css`**, заменив `#REPLACE_HERO_ID` на id секции hero (например `#hero-tokenops`).

Дополнительно в `<style>` страницы — селектор canvas:

```css
.hero-enterprise-gateway #YOUR-CANVAS-ID {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
```

## Разметка hero

```html
<section id="HERO_ID" class="hero-enterprise-gateway fullscreen-white-office" aria-label="…">
  <style>/* типографика .giant-seo, .vl-ui-task, .telegram-button — в inline style секции */</style>

  <div class="hero-layout">
    <div class="hero-content-col">
      <div class="vl-ui-tasks" aria-label="Этапы">…</div>
      <div class="hero-copy-block">
        <h1 class="giant-seo">… <span>акцент</span></h1>
        <p class="giant-seo-sub">…</p>
        <a class="telegram-button" href="…">CTA</a>
      </div>
      <div class="vl-ui-pill" aria-label="Теги">…</div>
    </div>
    <div class="hero-visual-col" aria-label="Анимация">
      <div class="hero-grid-bg" aria-hidden="true"></div>
      <canvas id="CANVAS_ID"></canvas>
    </div>
  </div>

  <script>/* resizeCanvas: parent = canvas.parentElement (hero-visual-col) */</script>
</section>
```

## Запреты

- Не использовать только `position:absolute` на весь viewport (паттерн `hero-tokops-fullscreen.css` — устарел для новых страниц).
- Не класть pills по центру поверх H1.
- В каждом шаблоне: сброс `#primary, .site-main { padding-top: 0 !important; }`.

## Canvas engine

`resizeCanvas()` должен брать размеры от **`hero-visual-col`**, не от `<section>`:

```js
const parent = canvas.parentElement; // .hero-visual-col
```
