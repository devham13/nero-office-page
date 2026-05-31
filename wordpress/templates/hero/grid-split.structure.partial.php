<?php
/**
 * Grid-split hero (40% copy / 60% stage). Плейсхолдеры заменить при сборке.
 *
 * PREFIX        — mcp-qc | alice (классы PREFIX-hero-grid, PREFIX-hero-stage, …)
 * SECTION_ID    — id секции hero
 * WRAP_CLASS    — mcp-qc-hero-wrap | alice-flash-hero
 * CANVAS_ID     — id canvas
 * ARIA_LABEL    — aria-label секции
 */
?>
<section id="{{SECTION_ID}}" class="fullscreen-white-office {{WRAP_CLASS}}" aria-label="{{ARIA_LABEL}}">
<style>
/* Только тема/декор; split/overflow/canvas — nn_longread_support_styles() + эталон в templates/pages/ */
.{{WRAP_CLASS}} {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  box-sizing: border-box;
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
}
.{{PREFIX}}-hero-grid {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: minmax(0, 0.4fr) minmax(0, 0.6fr);
  gap: clamp(20px, 3vw, 40px);
  align-items: center;
  max-width: 1440px;
  margin: 0 auto;
  min-height: min(72vh, 720px);
}
.{{PREFIX}}-hero-stage {
  position: relative;
  min-height: min(56vh, 560px);
  overflow: hidden;
  border-radius: 20px;
}
#{{CANVAS_ID}} {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.{{PREFIX}}-hero-main .giant-seo {
  font-size: clamp(1.5rem, 2.75vw, 2.5rem);
  font-weight: 800;
  line-height: 1.12;
}
@media (max-width: 900px) {
  .{{PREFIX}}-hero-grid { grid-template-columns: 1fr; min-height: auto; }
  .{{PREFIX}}-hero-stage { order: -1; min-height: min(42vh, 360px); }
}
</style>

<div class="{{PREFIX}}-hero-grid">
  <div class="{{PREFIX}}-hero-main">
    <!-- metrics / vl-ui-pill -->
    <!-- vl-ui-tasks (position: relative в тематическом CSS) -->
    <div class="{{PREFIX}}-copy-block">
      <h1 class="giant-seo">…</h1>
      <p class="giant-seo-sub">…</p>
      <?php echo nn_hero_cta_buttons(); ?>
    </div>
  </div>
  <div class="{{PREFIX}}-hero-stage" aria-hidden="true">
    <canvas id="{{CANVAS_ID}}"></canvas>
  </div>
</div>
</section>
