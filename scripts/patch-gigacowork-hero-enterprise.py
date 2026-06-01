#!/usr/bin/env python3
"""Replace GigaCowork hero with hero-enterprise-gateway layout (KPMG template)."""

from __future__ import annotations

import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
PHP = ROOT / "wordpress/page-gigacowork-ii-agenty-biznes-bez-programmistov.php"

ISOLATION_CSS = """
/* === Nero Network: изоляция Canvas-hero от Kadence === */
body[class*="page-template-page-"] #inner-wrap {
  max-width: none !important;
  width: 100% !important;
  padding-top: 0 !important;
  margin-top: 0 !important;
}
body[class*="page-template-page-"] #inner-wrap > main.site-main[class*="-page"] {
  display: block !important;
  max-width: none !important;
  width: 100% !important;
  margin: 0 !important;
  padding: 0 !important;
  box-shadow: none !important;
  background: transparent !important;
}
body[class*="page-template-page-"] {
  --nn-hero-text-max: min(26rem, 38vw);
  --nn-hero-gutter: clamp(20px, 4vw, 56px);
}
.hero-enterprise-gateway .hero-visual-col canvas,
.hero-enterprise-gateway #gcw-orchestra-canvas {
  position: absolute !important;
  inset: 0 !important;
  width: 100% !important;
  height: 100% !important;
  z-index: 1 !important;
  pointer-events: none !important;
}
.hero-enterprise-gateway .hero-copy-block,
.hero-enterprise-gateway .vl-ui-tasks,
.hero-enterprise-gateway .vl-ui-pill {
  position: relative !important;
  left: auto !important;
  top: auto !important;
  transform: none !important;
}
"""


def hero_block(cta_url: str) -> str:
    return f'''<section id="gigacowork-enterprise-hero" class="hero-enterprise-gateway fullscreen-white-office" aria-label="Hero: GigaCowork и ИИ-агенты">
<style>
.hero-enterprise-gateway.fullscreen-white-office {{
  position: relative;
  overflow: hidden;
  min-height: 100vh;
  min-height: 100dvh;
  width: 100%;
  padding-top: clamp(80px, 11vh, 120px);
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  background: linear-gradient(165deg, #ffffff 0%, #f8fafc 45%, #ecfdf5 100%);
  font-family: Inter, system-ui, -apple-system, sans-serif;
}}
.hero-enterprise-gateway .hero-layout {{
  flex: 1;
  display: grid;
  grid-template-columns: minmax(0, 0.42fr) minmax(0, 0.58fr);
  gap: clamp(20px, 4vw, 48px);
  align-items: center;
  width: 100%;
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 clamp(16px, 4vw, 56px) clamp(28px, 5vh, 56px);
  position: relative;
  z-index: 2;
}}
.hero-enterprise-gateway .hero-content-col {{
  display: flex;
  flex-direction: column;
  gap: clamp(16px, 2.5vh, 24px);
  min-width: 0;
  max-width: var(--nn-hero-text-max, 26rem);
}}
.hero-enterprise-gateway .hero-visual-col {{
  position: relative;
  min-height: min(480px, 52vh);
  border-radius: 24px;
  overflow: hidden;
  background: linear-gradient(145deg, rgba(255,255,255,0.96) 0%, rgba(236,253,245,0.9) 100%);
  border: 1px solid #e2e8f0;
  box-shadow: 0 20px 50px rgba(15, 23, 42, 0.08);
}}
.hero-enterprise-gateway .hero-grid-bg {{
  position: absolute;
  inset: 0;
  z-index: 0;
  background-image:
    linear-gradient(rgba(33, 160, 56, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(33, 160, 56, 0.05) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
}}
.hero-enterprise-gateway .giant-seo {{
  font-size: clamp(1.625rem, 3.25vw, 2.75rem);
  font-weight: 900;
  line-height: 1.08;
  letter-spacing: -0.04em;
  color: #0f172a;
  margin: 0;
  max-width: 100%;
  word-wrap: break-word;
}}
.hero-enterprise-gateway .giant-seo span {{
  display: block;
  margin-top: 0.15em;
  background: linear-gradient(90deg, #21a038, #6366f1);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}}
.hero-enterprise-gateway .giant-seo-sub {{
  font-size: clamp(15px, 1.9vw, 21px);
  line-height: 1.55;
  color: rgba(15, 23, 42, 0.72);
  margin-top: 18px;
  max-width: 680px;
}}
.hero-enterprise-gateway .telegram-button {{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 22px;
  padding: 12px 22px;
  background: #21a038;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  transition: transform 0.2s, box-shadow 0.2s;
  box-shadow: 0 6px 20px rgba(33, 160, 56, 0.28);
}}
.hero-enterprise-gateway .telegram-button:hover {{
  transform: translateY(-2px);
  box-shadow: 0 10px 28px rgba(33, 160, 56, 0.35);
}}
.hero-enterprise-gateway .vl-ui-tasks {{
  display: flex;
  flex-direction: column;
  gap: 10px;
}}
.hero-enterprise-gateway .vl-ui-task {{
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  font-size: 13px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
}}
.hero-enterprise-gateway .vl-ui-task span {{
  width: 28px;
  height: 28px;
  background: linear-gradient(135deg, #21a038, #6366f1);
  color: #fff;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: 800;
  flex-shrink: 0;
}}
.hero-enterprise-gateway .vl-ui-pill {{
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  gap: 10px;
}}
.hero-enterprise-gateway .vl-ui-pill span {{
  padding: 9px 16px;
  background: rgba(255, 255, 255, 0.94);
  border: 1px solid #e2e8f0;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}}
@media (max-width: 960px) {{
  .hero-enterprise-gateway .hero-layout {{
    grid-template-columns: 1fr;
    gap: 20px;
    padding-bottom: 32px;
  }}
  .hero-enterprise-gateway .hero-content-col {{ order: 1; max-width: 100%; }}
  .hero-enterprise-gateway .hero-visual-col {{
    order: 2;
    min-height: min(280px, 38vh);
  }}
}}
</style>

<div class="hero-layout">
  <div class="hero-content-col">
    <div class="vl-ui-tasks" aria-label="Этапы контура GigaCowork">
      <div class="vl-ui-task"><span>1</span>Регламент → навык</div>
      <div class="vl-ui-task"><span>2</span>MCP к CRM и почте</div>
      <div class="vl-ui-task"><span>3</span>Human approval</div>
      <div class="vl-ui-task"><span>4</span>Пилот 14 дней</div>
      <div class="vl-ui-task"><span>5</span>Масштаб Make / n8n</div>
    </div>

    <div class="hero-copy-block">
      <h1 id="gcw-hero-title" class="giant-seo">GigaCowork: ИИ-агенты для бизнеса <span>без программистов — Make и MCP</span></h1>
      <p class="giant-seo-sub">Сбер открыл тест GigaCowork на ЦИПР-2026: регламенты на русском, MCP к CRM и пилоты до −81,5% рутины. Показываем, как собрать такой же контур без экосистемы банка.</p>
      <a class="telegram-button" href="{cta_url}">Обсудить пилот агентов</a>
    </div>

    <div class="vl-ui-pill" aria-label="Метрики и теги">
      <span>Workspace</span>
      <span>MCP</span>
      <span>No-code</span>
      <span>−81,5% рутина</span>
    </div>
  </div>

  <div class="hero-visual-col" aria-label="Оркестрация ИИ-агентов">
    <div class="hero-grid-bg" aria-hidden="true"></div>
    <canvas id="gcw-orchestra-canvas" aria-hidden="true"></canvas>
  </div>
</div>
<script>
(function gigacoworkHeroEngine() {{
  const canvas = document.getElementById("gcw-orchestra-canvas");
  if (!canvas) return;
  const ctx = canvas.getContext("2d");
  let cw = 0, ch = 0, scale = 1, cx = 0, cy = 0, frame = 0;

  function resizeCanvas() {{
    const parent = canvas.parentElement;
    if (!parent) return;
    canvas.width = parent.clientWidth || 640;
    canvas.height = parent.clientHeight || 480;
    cw = canvas.width;
    ch = canvas.height;
    cx = cw * 0.52;
    cy = ch / 2 - 16;
    scale = cw < 520 ? cw / 520 : Math.min(cw / 900, ch / 700) * 1.25;
  }}
  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  const C = {{
    outline: "#0f172a",
    sber: "#21a038",
    indigo: "#6366f1",
    panel: "#ffffff",
    river: "#cbd5e1",
    tokenCrm: "#dbeafe",
    tokenDoc: "#fef9c3",
    tokenHr: "#ede9fe",
    tokenErp: "#d1fae5",
    agentYellow: "#eab308",
    agentGreen: "#10b981",
    agentBlue: "#3b82f6",
    agentPink: "#ec4899",
    agentPurple: "#8b5cf6",
    bubbleBg: "#ffffff",
    approve: "#22c55e"
  }};

  function drawPolyRound(ctx, x, y, w, h, radius, fill, stroke) {{
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, radius);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) {{
      ctx.lineWidth = 2;
      ctx.strokeStyle = stroke;
      ctx.stroke();
    }}
  }}

  class RegulamentStream {{
    constructor(x, y, w) {{
      this.x = x; this.y = y; this.w = w;
    }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      ctx.strokeStyle = C.river;
      ctx.lineWidth = 3;
      ctx.beginPath();
      ctx.moveTo(this.x, this.y);
      for (let i = 0; i <= this.w; i += 20) {{
        const wave = Math.sin((i + frame * 0.6) * 0.04) * 10;
        ctx.lineTo(this.x + i, this.y + wave);
      }}
      ctx.stroke();
      const colors = [C.tokenDoc, C.tokenCrm, C.tokenHr, C.tokenErp];
      const labels = ["DOC", "CRM", "HR", "ERP"];
      for (let k = 0; k < 4; k++) {{
        const t = (frame * 0.35 + k * 70) % (this.w + 80);
        const px = this.x + t - 40;
        const py = this.y + Math.sin((px + frame) * 0.05) * 8;
        if (px > this.x - 20 && px < this.x + this.w) {{
          drawPolyRound(ctx, px - 8, py - 10, 16, 20, 3, colors[k], C.outline);
          ctx.fillStyle = C.outline;
          ctx.font = "bold 7px sans-serif";
          ctx.textAlign = "center";
          ctx.fillText(labels[k], px, py + 2);
        }}
      }}
      if (phase > 8 && phase < 12) createBubble(this.x + 80, this.y - 28, "Регламент → навык", 220);
    }}
  }}

  class McpProtocolRing {{
    constructor(hubX, hubY, r) {{
      this.hubX = hubX; this.hubY = hubY; this.r = r;
    }}
    draw(ctx) {{
      const pulse = 0.5 + Math.sin(frame * 0.05) * 0.15;
      ctx.save();
      ctx.strokeStyle = C.indigo;
      ctx.globalAlpha = 0.35 + pulse * 0.2;
      ctx.lineWidth = 2;
      ctx.setLineDash([8, 10]);
      ctx.lineDashOffset = -frame * 0.8;
      ctx.beginPath();
      ctx.arc(this.hubX, this.hubY, this.r * pulse, 0, Math.PI * 2);
      ctx.stroke();
      ctx.setLineDash([]);
      ctx.globalAlpha = 1;
      ctx.fillStyle = C.indigo;
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("MCP", this.hubX, this.hubY - this.r * pulse - 6);
      ctx.restore();
    }}
  }}

  class SkillShelf {{
    constructor(x, y) {{
      this.x = x; this.y = y;
    }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      const labels = ["HR", "Docs", "Отчёты", "CRM"];
      const show = Math.min(4, Math.floor((phase % 240) / 30));
      for (let i = 0; i < show; i++) {{
        const ox = this.x - 55 + i * 38;
        drawPolyRound(ctx, ox, this.y + i * 2, 34, 22, 4, C.panel, C.outline);
        ctx.fillStyle = i % 2 ? C.indigo : C.sber;
        ctx.globalAlpha = 0.22;
        drawPolyRound(ctx, ox + 4, this.y + 4 + i * 2, 26, 6, 2, i % 2 ? C.indigo : C.sber, null);
        ctx.globalAlpha = 1;
        ctx.fillStyle = C.outline;
        ctx.font = "bold 7px sans-serif";
        ctx.textAlign = "center";
        ctx.fillText(labels[i], ox + 17, this.y + 16 + i * 2);
      }}
    }}
  }}

  class HumanApprovalGate {{
    constructor(x, y) {{
      this.x = x; this.y = y;
    }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      if (phase < 115 || phase > 195) return;
      const local = phase - 115;
      const sy = this.y - 40 + Math.min(1, local / 25) * 35;
      ctx.save();
      ctx.globalAlpha = Math.min(1, local / 15);
      ctx.translate(this.x, sy);
      drawPolyRound(ctx, -22, -14, 44, 28, 6, C.approve, C.outline);
      ctx.fillStyle = "#fff";
      ctx.font = "bold 9px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("HITL OK", 0, 2);
      ctx.restore();
      if (local > 20 && local < 24) createBubble(this.x, sy - 30, "Human approval перед CRM", 240);
    }}
  }}

  class GigaCoworkHub {{
    constructor(x, y) {{
      this.x = x; this.y = y;
      this.shelf = new SkillShelf(x - 70, y - 55);
    }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      const r = 50;
      ctx.fillStyle = C.sber;
      ctx.strokeStyle = C.outline;
      ctx.lineWidth = 2;
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {{
        const a = (Math.PI * 2 * i) / 6 - Math.PI / 2;
        const px = this.x + Math.cos(a) * r;
        const py = this.y + Math.sin(a) * r;
        if (i === 0) ctx.moveTo(px, py);
        else ctx.lineTo(px, py);
      }}
      ctx.closePath();
      ctx.fill();
      ctx.stroke();
      drawPolyRound(ctx, this.x - 38, this.y - 32, 76, 64, 8, C.panel, C.outline);
      ctx.fillStyle = C.sber;
      ctx.font = "900 11px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText("Giga", this.x, this.y - 8);
      ctx.fillStyle = C.indigo;
      ctx.fillText("Cowork", this.x, this.y + 8);
      this.shelf.draw(ctx);
      if (phase >= 175) {{
        ctx.fillStyle = C.sber;
        ctx.font = "900 16px sans-serif";
        ctx.fillText("−81,5%", this.x, this.y - 58);
        ctx.font = "bold 9px sans-serif";
        ctx.fillStyle = C.outline;
        ctx.fillText("пилот рутины", this.x, this.y - 44);
        if (phase > 177 && phase < 181) createBubble(this.x, this.y - 72, "Пилот: документы + HR", 260);
      }}
    }}
  }}

  class Agent {{
    constructor(x, y, color, role, stepTrig, dialogs) {{
      this.x = x; this.y = y;
      this.baseX = x; this.baseY = y;
      this.color = color;
      this.role = role;
      this.timer = Math.random() * 100;
      this.stepTrig = stepTrig;
      this.dialogs = dialogs;
    }}
    draw(ctx) {{
      this.timer += 0.03;
      const prg = (frame * 0.04) % 240;
      let isMoving = false;
      let faceDir = 1;
      const hubX = 120;
      const hubY = -70;
      const targetX = hubX + (this.stepTrig % 3) * 8 - 8;
      const targetY = hubY + 22;
      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {{
        const local = prg - this.stepTrig;
        if (local < 11) {{
          isMoving = true;
          faceDir = 1;
          const t = local / 11;
          this.x = this.baseX + (targetX - this.baseX) * t;
          this.y = this.baseY + (targetY - this.baseY) * t + Math.sin(t * Math.PI) * -16;
        }} else {{
          isMoving = true;
          faceDir = -1;
          const t = (local - 11) / 11;
          this.x = targetX - (targetX - this.baseX) * t;
          this.y = targetY - (targetY - this.baseY) * t;
        }}
      }} else {{
        this.x = this.baseX;
        this.y = this.baseY;
      }}
      if (!isMoving && frame % 220 === 0 && Math.random() < 0.12) {{
        createBubble(this.x, this.y - 22, this.dialogs[Math.floor(Math.random() * this.dialogs.length)], 240);
      }}
      let bob = isMoving ? Math.abs(Math.sin(this.timer * 3)) * 2 : Math.sin(this.timer * 1.5);
      ctx.save();
      ctx.translate(this.x, this.y);
      ctx.lineJoin = "round";
      let legL = 0, legR = 0;
      if (isMoving) {{
        const w = this.timer * 6;
        legL = Math.sin(w) * 5;
        legR = Math.sin(w + Math.PI) * 5;
      }}
      drawPolyRound(ctx, -10, -5 + Math.max(0, legL), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, -12, 5 + Math.max(0, legL), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, 2, -5 + Math.max(0, legR), 8, 14, 2, C.outline, null);
      drawPolyRound(ctx, 0, 5 + Math.max(0, legR), 12, 6, 2, C.outline, null);
      drawPolyRound(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);
      const hx = 0, hy = -28 - bob;
      ctx.fillStyle = this.color;
      ctx.beginPath();
      ctx.arc(hx, hy, 12, 0, Math.PI * 2);
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = C.outline;
      ctx.stroke();
      ctx.save();
      ctx.scale(faceDir, 1);
      ctx.fillStyle = "#fff";
      ctx.beginPath();
      ctx.arc(hx + 4, hy - 2, 4, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 4, hy - 2, 4, 0, Math.PI * 2);
      ctx.fill();
      ctx.fillStyle = C.outline;
      ctx.beginPath();
      ctx.arc(hx + 5, hy - 2, 2, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(hx - 3, hy - 2, 2, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
      ctx.restore();
    }}
  }}

  const entities = [];
  const bubbles = [];
  const river = new RegulamentStream(-300, 95, 480);
  const hub = new GigaCoworkHub(120, -82);
  const ring = new McpProtocolRing(120, -82, 88);
  const gate = new HumanApprovalGate(195, -115);
  entities.push(river, ring, hub, gate);
  entities.push(new Agent(-280, 55, C.agentYellow, "1", 18, ["Регламент на русском", "Навык без кода", "Workspace"]));
  entities.push(new Agent(-200, 115, C.agentGreen, "2", 52, ["MCP → CRM", "Коннектор почты", "Логи с дня 1"]));
  entities.push(new Agent(-110, 35, C.agentBlue, "3", 88, ["Make / n8n", "GigaChat API", "Пилот 14 дней"]));
  entities.push(new Agent(-30, 105, C.agentPink, "4", 124, ["Human-in-the-loop", "152-ФЗ whitelist", "On-prem опция"]));
  entities.push(new Agent(50, 30, C.agentPurple, "5", 158, ["−81,5% рутина", "+80% документы", "Масштаб агентов"]));

  function createBubble(x, y, text, customLife = 280) {{
    bubbles.push({{ x, y, text, life: customLife, maxLife: customLife }});
  }}

  function drawStackOrbs(ctx) {{
    const items = [
      {{ label: "Make", x: -190, c: C.indigo }},
      {{ label: "n8n", x: -130, c: "#ec4899" }},
      {{ label: "MCP", x: -70, c: C.sber }},
      {{ label: "API", x: -10, c: "#0ea5e9" }}
    ];
    items.forEach((f, i) => {{
      const bob = Math.sin(frame * 0.04 + i) * 4;
      ctx.fillStyle = f.c;
      ctx.globalAlpha = f.label === "MCP" ? 1 : 0.5;
      ctx.beginPath();
      ctx.arc(f.x, -145 + bob, f.label === "MCP" ? 13 : 10, 0, Math.PI * 2);
      ctx.fill();
      ctx.globalAlpha = 1;
      ctx.fillStyle = "#fff";
      ctx.font = "bold 7px sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(f.label, f.x, -142 + bob);
    }});
  }}

  function engineloop() {{
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((ent) => ent.draw(ctx));
    drawStackOrbs(ctx);
    ctx.font = "bold 11px Inter, sans-serif";
    ctx.textAlign = "center";
    for (let i = bubbles.length - 1; i >= 0; i--) {{
      const bub = bubbles[i];
      bub.life--;
      if (bub.life <= 0) {{ bubbles.splice(i, 1); continue; }}
      let alpha = Math.min(1, bub.life / 30);
      if (bub.life > bub.maxLife - 10) alpha = (bub.maxLife - bub.life) / 10;
      ctx.globalAlpha = alpha;
      const tw = ctx.measureText(bub.text).width + 16;
      const th = 20;
      const bx = bub.x;
      const by = bub.y - (bub.maxLife - bub.life) * 0.04;
      drawPolyRound(ctx, bx - tw / 2, by - th, tw, th, 6, C.bubbleBg, C.outline);
      ctx.fillStyle = C.outline;
      ctx.fillText(bub.text, bx, by - th / 2);
      ctx.globalAlpha = 1;
    }}
    ctx.restore();
    requestAnimationFrame(engineloop);
  }}
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(engineloop);
  else engineloop();
}})();
</script>
</section>
'''


def main() -> None:
    text = PHP.read_text(encoding="utf-8")
    cta_m = re.search(r'class="telegram-button"\s+href="([^"]+)"', text)
    cta_url = cta_m.group(1) if cta_m else "#"

    main = text.find('<main id="primary"')
    if main < 0:
        raise SystemExit("<main> not found")
    start = text.find('<section id="gigacowork-orchestra"', main)
    if start < 0:
        start = text.find('<section id="gigacowork-enterprise-hero"', main)
    if start < 0:
        raise SystemExit("Hero section not found after <main>")
    end = text.find("</section>", start)
    if end < 0:
        raise SystemExit("</section> not found for hero")
    end += len("</section>")

    if "Nero Network: изоляция Canvas-hero" not in text:
        anchor = "#primary, .site-main, .site-content, #content, .content-area {"
        pos = text.find(anchor)
        if pos < 0:
            raise SystemExit("CSS anchor not found")
        insert_at = text.find("}", pos) + 1
        text = text[:insert_at] + ISOLATION_CSS + text[insert_at:]
        if insert_at <= start:
            offset = len(ISOLATION_CSS)
            start += offset
            end += offset

    text = text[:start] + hero_block(cta_url) + "\n" + text[end:]
    PHP.write_text(text, encoding="utf-8")
    print(f"Patched hero in {PHP} (CTA preserved)")


if __name__ == "__main__":
    main()
