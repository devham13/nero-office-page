<?php
/**
 * Opus 4.8 — grid-split через .opus48-hero-body + .opus48-hero-stage
 */
?>
<section id="{{SECTION_ID}}" class="fullscreen-white-office opus48-orchestra-hero" aria-label="{{ARIA_LABEL}}">
<style>
.opus48-orchestra-hero {
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
}
.opus48-hero-body {
  display: grid;
  grid-template-columns: minmax(0, 0.4fr) minmax(0, 0.6fr);
  gap: clamp(20px, 3vw, 40px);
  max-width: 1440px;
  margin: 0 auto;
  align-items: stretch;
}
.opus48-hero-stage {
  position: relative;
  min-height: min(52vh, 520px);
  overflow: hidden;
  border-radius: 20px;
}
#{{CANVAS_ID}} {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}
</style>

<div class="opus48-hero-body">
  <div class="opus48-hero-main">
    <!-- copy, tasks, pills — position: relative -->
  </div>
  <div class="opus48-hero-stage" aria-hidden="true">
    <canvas id="{{CANVAS_ID}}"></canvas>
  </div>
</div>
</section>
