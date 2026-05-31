// Вставить в hero <script> для grid-split / grid-split-opus.
// resizeCanvas() — parent = canvas.parentElement (.hero-stage)

function resizeCanvas() {
  const parent = canvas.parentElement;
  if (!parent) return;
  canvas.width = parent.clientWidth || window.innerWidth;
  canvas.height = parent.clientHeight || window.innerHeight;
  cw = canvas.width;
  ch = canvas.height;
  cx = cw * 0.52;
  cy = ch / 2 - 20;
  scale = cw < 768 ? cw / 620 : Math.min(cw / 900, ch / 820) * 1.05;
}
window.addEventListener("resize", resizeCanvas);
resizeCanvas();
