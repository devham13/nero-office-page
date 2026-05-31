<?php
/**
 * Absolute-split — canvas справа через global longread-hero-layout.css (58%).
 * Inline НЕ задавать inset:0 на canvas без wrap/stage.
 */
?>
<section id="{{SECTION_ID}}" class="fullscreen-white-office {{SHELL_CLASS}}" aria-label="{{ARIA_LABEL}}">
<style>
.{{SHELL_CLASS}} {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
}
/* Canvas positioning — в nn_longread_support_styles(); при необходимости wrap: */
.{{SHELL_CLASS}} .{{CANVAS_WRAP_CLASS}} {
  position: absolute;
  left: 58%;
  right: 0;
  top: 0;
  bottom: 0;
  width: 42%;
  max-width: 46vw;
  height: 100%;
  z-index: 1;
  pointer-events: none;
}
.{{COPY_CLASS}} {
  position: absolute;
  left: clamp(16px, 4vw, 56px);
  bottom: clamp(24px, 6vh, 72px);
  max-width: min(26rem, 38vw);
  z-index: 3;
}
.{{SHELL_CLASS}} .giant-seo {
  font-size: clamp(1.5rem, 2.75vw, 2.5rem);
  font-weight: 800;
}
</style>

<canvas id="{{CANVAS_ID}}" aria-hidden="true"></canvas>
<!-- или canvas внутри .{{CANVAS_WRAP_CLASS}} для SMB -->

<div class="{{COPY_CLASS}}">
  <h1 class="giant-seo">…</h1>
  <p class="giant-seo-sub">…</p>
  <?php echo nn_hero_cta_buttons(); ?>
</div>
<!-- vl-ui-tasks / vl-ui-pill — absolute только если не grid; иначе relative -->
</section>
