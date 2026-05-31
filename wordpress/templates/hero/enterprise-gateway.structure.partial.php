<?php
/**
 * Enterprise gateway — canvas только в .hero-visual-col
 */
?>
<section id="{{SECTION_ID}}" class="hero-enterprise-gateway fullscreen-white-office" aria-label="{{ARIA_LABEL}}">
<style>
.hero-enterprise-gateway.fullscreen-white-office {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
}
.hero-enterprise-gateway .hero-layout {
  display: grid;
  grid-template-columns: minmax(0, 0.42fr) minmax(0, 0.58fr);
  gap: clamp(24px, 3vw, 48px);
  max-width: 1440px;
  margin: 0 auto;
  align-items: center;
}
.hero-enterprise-gateway .hero-visual-col {
  position: relative;
  min-height: min(480px, 52vh);
  overflow: hidden;
  border-radius: 20px;
}
.hero-enterprise-gateway .hero-visual-col #{{CANVAS_ID}} {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}
.hero-enterprise-gateway .hero-copy-block,
.hero-enterprise-gateway .vl-ui-tasks,
.hero-enterprise-gateway .vl-ui-pill {
  position: relative;
  left: auto;
  top: auto;
  transform: none;
}
</style>

<div class="hero-layout">
  <div class="hero-content-col">
    <div class="hero-copy-block">
      <h1 class="giant-seo">…</h1>
      <p class="giant-seo-sub">…</p>
      <?php echo nn_hero_cta_buttons(); ?>
    </div>
    <!-- vl-ui-tasks, vl-ui-pill -->
  </div>
  <div class="hero-visual-col" aria-label="Визуализация">
    <div class="hero-grid-bg" aria-hidden="true"></div>
    <canvas id="{{CANVAS_ID}}"></canvas>
  </div>
</div>
</section>
