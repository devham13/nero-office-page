#!/usr/bin/env python3
"""GigaCowork hero: finops-hero-grid split layout + shared hero-split-layout.css."""

from __future__ import annotations

import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
PHP = ROOT / "wordpress/page-gigacowork-ii-agenty-biznes-bez-programmistov.php"
SPLIT_CSS = (ROOT / "shared/hero-split-layout.css").read_text(encoding="utf-8")


def hero_block(cta_url: str) -> str:
    return f'''<section id="gigacowork-command-center" class="fullscreen-white-office finops-hero-shell hero-enterprise-gateway gigacowork-hero" aria-label="Hero: GigaCowork и ИИ-агенты">
<style>
.finops-hero-shell.gigacowork-hero {{
  position: relative;
  overflow: clip;
  min-height: min(100vh, 100dvh);
  box-sizing: border-box;
  padding: clamp(72px, 10vh, 100px) clamp(16px, 4vw, 48px) clamp(28px, 4vh, 48px);
  background: #ffffff;
  background-image:
    linear-gradient(rgba(33, 160, 56, 0.04) 1px, transparent 1px),
    linear-gradient(90deg, rgba(33, 160, 56, 0.04) 1px, transparent 1px);
  background-size: 48px 48px;
}}
.finops-hero-shell.gigacowork-hero .giant-seo span {{
  background: linear-gradient(90deg, #21a038, #6366f1) !important;
}}
.finops-hero-shell.gigacowork-hero .vl-ui-task span {{
  background: linear-gradient(135deg, #21a038, #6366f1) !important;
}}
.finops-hero-shell.gigacowork-hero .telegram-button {{
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 8px;
  padding: 12px 22px;
  background: #21a038;
  color: #fff !important;
  border-radius: 999px;
  font-weight: 700;
  font-size: 14px;
  text-decoration: none;
  box-shadow: 0 6px 20px rgba(33, 160, 56, 0.28);
}}
.finops-hero-shell.gigacowork-hero .telegram-button:hover {{
  transform: translateY(-2px);
}}
.finops-hero-shell.gigacowork-hero .finops-hero-stage {{
  background: linear-gradient(145deg, rgba(255,255,255,0.96) 0%, rgba(236,253,245,0.9) 100%);
}}
</style>

<div class="finops-hero-grid">
  <div class="finops-hero-main">
    <div class="vl-ui-pill" aria-label="Метрики GigaCowork">
      <span>Workspace</span>
      <span>MCP</span>
      <span>No-code</span>
      <span>−81,5% рутина</span>
    </div>
    <nav class="vl-ui-tasks" aria-label="Этапы контура GigaCowork">
      <div class="vl-ui-task"><span>1</span>Регламент → навык</div>
      <div class="vl-ui-task"><span>2</span>MCP к CRM и почте</div>
      <div class="vl-ui-task"><span>3</span>Human approval</div>
      <div class="vl-ui-task"><span>4</span>Пилот 14 дней</div>
      <div class="vl-ui-task"><span>5</span>Масштаб Make / n8n</div>
    </nav>
    <div class="finops-hero-copy hero-copy-block">
      <h1 id="gcw-hero-title" class="giant-seo">GigaCowork: ИИ-агенты для бизнеса — <span>без программистов: Make и MCP</span></h1>
      <p class="giant-seo-sub">Сбер открыл тест GigaCowork на ЦИПР-2026: регламенты на русском, MCP к CRM и пилоты до −81,5% рутины. Показываем, как собрать такой же контур без экосистемы банка.</p>
    </div>
    <div class="finops-hero-cta-wrap">
      <a class="telegram-button" href="{cta_url}">Обсудить пилот агентов</a>
    </div>
  </div>
  <div class="finops-hero-stage" aria-label="Оркестрация ИИ-агентов">
    <canvas id="hero-gigacowork-canvas" aria-hidden="true"></canvas>
  </div>
</div>
<script>
(function gigacoworkHeroEngine() {{
  const canvas = document.getElementById("hero-gigacowork-canvas");
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
    outline: "#0f172a", sber: "#21a038", indigo: "#6366f1", panel: "#ffffff", river: "#cbd5e1",
    tokenCrm: "#dbeafe", tokenDoc: "#fef9c3", tokenHr: "#ede9fe", tokenErp: "#d1fae5",
    agentYellow: "#eab308", agentGreen: "#10b981", agentBlue: "#3b82f6",
    agentPink: "#ec4899", agentPurple: "#8b5cf6", bubbleBg: "#ffffff", approve: "#22c55e"
  }};

  function drawPolyRound(ctx, x, y, w, h, radius, fill, stroke) {{
    ctx.fillStyle = fill;
    ctx.beginPath();
    if (ctx.roundRect) ctx.roundRect(x, y, w, h, radius);
    else ctx.rect(x, y, w, h);
    ctx.fill();
    if (stroke) {{ ctx.lineWidth = 2; ctx.strokeStyle = stroke; ctx.stroke(); }}
  }}

  class RegulamentStream {{
    constructor(x, y, w) {{ this.x = x; this.y = y; this.w = w; }}
    draw(ctx) {{
      ctx.strokeStyle = C.river; ctx.lineWidth = 3;
      ctx.beginPath(); ctx.moveTo(this.x, this.y);
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
          ctx.fillStyle = C.outline; ctx.font = "bold 7px sans-serif"; ctx.textAlign = "center";
          ctx.fillText(labels[k], px, py + 2);
        }}
      }}
    }}
  }}

  class SkillShelf {{
    constructor(x, y) {{ this.x = x; this.y = y; }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      const labels = ["HR", "Docs", "CRM", "API"];
      const show = Math.min(4, Math.floor((phase % 240) / 30));
      for (let i = 0; i < show; i++) {{
        const ox = this.x - 55 + i * 38;
        drawPolyRound(ctx, ox, this.y + i * 2, 34, 22, 4, C.panel, C.outline);
        ctx.fillStyle = C.outline; ctx.font = "bold 7px sans-serif"; ctx.textAlign = "center";
        ctx.fillText(labels[i], ox + 17, this.y + 16 + i * 2);
      }}
    }}
  }}

  class GigaCoworkHub {{
    constructor(x, y) {{ this.x = x; this.y = y; this.shelf = new SkillShelf(x - 70, y - 55); }}
    draw(ctx) {{
      const phase = (frame * 0.04) % 240;
      const r = 50;
      ctx.fillStyle = C.sber; ctx.strokeStyle = C.outline; ctx.lineWidth = 2;
      ctx.beginPath();
      for (let i = 0; i < 6; i++) {{
        const a = (Math.PI * 2 * i) / 6 - Math.PI / 2;
        const px = this.x + Math.cos(a) * r, py = this.y + Math.sin(a) * r;
        if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
      }}
      ctx.closePath(); ctx.fill(); ctx.stroke();
      drawPolyRound(ctx, this.x - 38, this.y - 32, 76, 64, 8, C.panel, C.outline);
      ctx.fillStyle = C.sber; ctx.font = "900 11px sans-serif"; ctx.textAlign = "center";
      ctx.fillText("Giga", this.x, this.y - 8);
      ctx.fillStyle = C.indigo; ctx.fillText("Cowork", this.x, this.y + 8);
      this.shelf.draw(ctx);
      if (phase >= 175) {{
        ctx.fillStyle = C.sber; ctx.font = "900 16px sans-serif"; ctx.fillText("−81,5%", this.x, this.y - 58);
      }}
    }}
  }}

  class McpProtocolRing {{
    constructor(hx, hy, r) {{ this.hubX = hx; this.hubY = hy; this.r = r; }}
    draw(ctx) {{
      const pulse = 0.5 + Math.sin(frame * 0.05) * 0.15;
      ctx.save(); ctx.strokeStyle = C.indigo; ctx.globalAlpha = 0.35 + pulse * 0.2;
      ctx.lineWidth = 2; ctx.setLineDash([8, 10]); ctx.lineDashOffset = -frame * 0.8;
      ctx.beginPath(); ctx.arc(this.hubX, this.hubY, this.r * pulse, 0, Math.PI * 2);
      ctx.stroke(); ctx.setLineDash([]); ctx.globalAlpha = 1; ctx.restore();
    }}
  }}

  class Agent {{
    constructor(x, y, color, stepTrig, dialogs) {{
      this.x = x; this.y = y; this.baseX = x; this.baseY = y; this.color = color;
      this.stepTrig = stepTrig; this.dialogs = dialogs; this.timer = Math.random() * 100;
    }}
    draw(ctx) {{
      this.timer += 0.03;
      const prg = (frame * 0.04) % 240;
      let isMoving = false, faceDir = 1;
      const hubX = 120, hubY = -70, targetX = hubX, targetY = hubY + 22;
      if (prg >= this.stepTrig && prg < this.stepTrig + 22) {{
        const local = prg - this.stepTrig;
        const t = local < 11 ? local / 11 : (local - 11) / 11;
        isMoving = true;
        faceDir = local < 11 ? 1 : -1;
        this.x = local < 11 ? this.baseX + (targetX - this.baseX) * t : targetX - (targetX - this.baseX) * t;
        this.y = local < 11 ? this.baseY + (targetY - this.baseY) * t + Math.sin(t * Math.PI) * -16 : targetY - (targetY - this.baseY) * t;
      }} else {{ this.x = this.baseX; this.y = this.baseY; }}
      const bob = isMoving ? Math.abs(Math.sin(this.timer * 3)) * 2 : Math.sin(this.timer * 1.5);
      ctx.save(); ctx.translate(this.x, this.y);
      drawPolyRound(ctx, -15, -12 - bob, 30, 20, 6, this.color, C.outline);
      ctx.fillStyle = this.color; ctx.beginPath(); ctx.arc(0, -28 - bob, 12, 0, Math.PI * 2);
      ctx.fill(); ctx.strokeStyle = C.outline; ctx.lineWidth = 2; ctx.stroke();
      ctx.restore();
    }}
  }}

  const entities = [], bubbles = [];
  entities.push(new RegulamentStream(-280, 90, 460));
  entities.push(new McpProtocolRing(120, -82, 88));
  entities.push(new GigaCoworkHub(120, -82));
  entities.push(new Agent(-260, 50, C.agentYellow, 18, []));
  entities.push(new Agent(-180, 110, C.agentGreen, 52, []));
  entities.push(new Agent(-90, 30, C.agentBlue, 88, []));
  entities.push(new Agent(0, 100, C.agentPink, 124, []));
  entities.push(new Agent(70, 25, C.agentPurple, 158, []));

  function engineloop() {{
    frame++;
    ctx.clearRect(0, 0, cw, ch);
    ctx.save(); ctx.translate(cx, cy); ctx.scale(scale, scale);
    entities.sort((a, b) => (a.y || 0) - (b.y || 0));
    entities.forEach((e) => e.draw(ctx));
    ctx.restore();
    requestAnimationFrame(engineloop);
  }}
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(engineloop);
  else engineloop();
}})();
</script>
</section>
'''


def inject_split_css(text: str) -> str:
    if "hero-split-layout.css" in text or "section.fullscreen-white-office > canvas:not" in text:
        # remove old partial isolation block
        text = re.sub(
            r"/\* === Nero Network: изоляция Canvas-hero от Kadence === \*/.*?"
            r"\.hero-enterprise-gateway \.vl-ui-pill \{\s*position: relative[^}]+\}\s*",
            "",
            text,
            count=1,
            flags=re.S,
        )
    marker = "#primary, .site-main, .site-content, #content, .content-area {"
    pos = text.find(marker)
    if pos < 0:
        raise SystemExit("CSS anchor not found")
    insert_at = text.find("}", pos) + 1
    return text[:insert_at] + "\n" + SPLIT_CSS + "\n" + text[insert_at:]


def main() -> None:
    text = PHP.read_text(encoding="utf-8")
    cta_m = re.search(r'class="telegram-button"\s+href="([^"]+)"', text)
    cta_url = cta_m.group(1) if cta_m else "#"

    main_idx = text.find('<main id="primary"')
    if main_idx < 0:
        raise SystemExit("<main> not found")

    start = text.find("<section", main_idx)
    for sid in ("gigacowork-command-center", "gigacowork-enterprise-hero", "gigacowork-orchestra"):
        i = text.find(f'id="{sid}"', main_idx)
        if i >= 0:
            start = text.rfind("<section", main_idx, i + 1)
            break
    end = text.find("</section>", start) + len("</section>")

    text = inject_split_css(text)
    # re-find after css inject
    main_idx = text.find('<main id="primary"')
    start = text.find("<section", main_idx)
    for sid in ("gigacowork-command-center", "gigacowork-enterprise-hero", "gigacowork-orchestra"):
        i = text.find(f'id="{sid}"', main_idx)
        if i >= 0:
            start = text.rfind("<section", main_idx, i + 1)
            break
    end = text.find("</section>", start) + len("</section>")

    text = text[:start] + hero_block(cta_url) + "\n" + text[end:]
    PHP.write_text(text, encoding="utf-8")
    print(f"Patched {PHP} (finops-hero-grid + hero-split-layout.css)")


if __name__ == "__main__":
    main()
