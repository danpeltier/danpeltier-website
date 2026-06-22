<?php
// 404 page not found
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Page Not Found | Dan Peltier</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --bg:         #0b0d15;
      --bg-card:    rgba(255,255,255,0.028);
      --accent:     #4f9cf9;
      --accent-dim: rgba(79,156,249,0.12);
      --accent-2:   #a78bfa;
      --accent-3:   #34d399;
      --text:       #dde3ee;
      --text-muted: #7b8faa;
      --text-faint: #3d4a5c;
      --border:     rgba(255,255,255,0.07);
    }

    html, body {
      height: 100%;
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow: hidden;
    }

    /* ── Starfield ── */
    .stars {
      position: fixed;
      inset: 0;
      z-index: 0;
      background:
        radial-gradient(1px 1px at 12% 18%, rgba(255,255,255,0.35) 0%, transparent 100%),
        radial-gradient(1px 1px at 28% 65%, rgba(255,255,255,0.25) 0%, transparent 100%),
        radial-gradient(1.5px 1.5px at 44% 9%,  rgba(255,255,255,0.4)  0%, transparent 100%),
        radial-gradient(1px 1px at 60% 80%, rgba(255,255,255,0.2)  0%, transparent 100%),
        radial-gradient(1px 1px at 72% 35%, rgba(255,255,255,0.3)  0%, transparent 100%),
        radial-gradient(2px 2px at 85% 55%, rgba(255,255,255,0.18) 0%, transparent 100%),
        radial-gradient(1px 1px at 91% 12%, rgba(255,255,255,0.28) 0%, transparent 100%),
        radial-gradient(1px 1px at 7%  90%, rgba(255,255,255,0.22) 0%, transparent 100%),
        radial-gradient(1.5px 1.5px at 52% 47%, rgba(255,255,255,0.15) 0%, transparent 100%),
        radial-gradient(1px 1px at 37% 30%, rgba(255,255,255,0.3)  0%, transparent 100%),
        radial-gradient(1px 1px at 20% 72%, rgba(255,255,255,0.2)  0%, transparent 100%),
        radial-gradient(1px 1px at 78% 88%, rgba(255,255,255,0.25) 0%, transparent 100%);
    }

    /* ── Ambient glows ── */
    .glow-l {
      position: fixed;
      top: -20%;
      left: -15%;
      width: 55vw;
      height: 55vw;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(79,156,249,0.055) 0%, transparent 70%);
      z-index: 0;
      pointer-events: none;
    }
    .glow-r {
      position: fixed;
      bottom: -25%;
      right: -15%;
      width: 50vw;
      height: 50vw;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(167,139,250,0.045) 0%, transparent 70%);
      z-index: 0;
      pointer-events: none;
    }

    /* ── Layout ── */
    .page {
      position: relative;
      z-index: 1;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0;
      padding: 1.5rem;
      text-align: center;
    }

    /* ── 404 heading ── */
    .err-code {
      font-family: 'JetBrains Mono', monospace;
      font-size: clamp(5rem, 14vw, 9rem);
      font-weight: 700;
      line-height: 1;
      letter-spacing: -0.04em;
      background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 0.15em;
      user-select: none;
    }

    /* ── Robot ── */
    .robot-wrap {
      position: relative;
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 0.5rem;
      animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50%       { transform: translateY(-12px); }
    }

    /* Speech bubble */
    .bubble {
      position: relative;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 0.55rem 1rem;
      margin-bottom: 10px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.78rem;
      color: var(--text-muted);
      white-space: nowrap;
      backdrop-filter: blur(6px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .bubble::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-top: 8px solid rgba(255,255,255,0.07);
    }
    .bubble::before {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 50%;
      transform: translateX(-50%);
      border-left: 7px solid transparent;
      border-right: 7px solid transparent;
      border-top: 7px solid #0d101e;
      z-index: 1;
    }
    .bubble .cursor {
      display: inline-block;
      width: 7px;
      height: 1em;
      background: var(--accent);
      vertical-align: text-bottom;
      margin-left: 2px;
      animation: blink-cursor 1s step-end infinite;
    }
    @keyframes blink-cursor {
      0%, 100% { opacity: 1; } 50% { opacity: 0; }
    }

    /* Robot body */
    .robot {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* Antenna */
    .antenna {
      width: 3px;
      height: 22px;
      background: linear-gradient(to top, var(--accent), rgba(79,156,249,0.3));
      border-radius: 2px;
      position: relative;
      margin-bottom: -1px;
    }
    .antenna::before {
      content: '';
      position: absolute;
      top: -6px;
      left: 50%;
      transform: translateX(-50%);
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 8px 3px rgba(79,156,249,0.6);
      animation: pulse-dot 2s ease-in-out infinite;
    }
    @keyframes pulse-dot {
      0%, 100% { box-shadow: 0 0 8px 3px rgba(79,156,249,0.6); }
      50%       { box-shadow: 0 0 14px 5px rgba(79,156,249,0.9); }
    }

    /* Head */
    .head {
      width: 86px;
      height: 72px;
      background: #0d101e;
      border: 2px solid rgba(79,156,249,0.35);
      border-radius: 14px;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      box-shadow: 0 0 20px rgba(79,156,249,0.1), inset 0 0 12px rgba(79,156,249,0.05);
      overflow: hidden;
    }
    .head::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(79,156,249,0.5), transparent);
    }

    /* Eyes */
    .eye {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 10px 2px rgba(79,156,249,0.7);
      position: relative;
      animation: blink 5s ease-in-out infinite;
    }
    .eye::after {
      content: '';
      position: absolute;
      top: 3px;
      left: 3px;
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: rgba(255,255,255,0.5);
    }
    .eye.right { animation-delay: 0.08s; }
    @keyframes blink {
      0%, 90%, 100% { transform: scaleY(1); }
      94%           { transform: scaleY(0.08); }
    }

    /* Mouth strip */
    .mouth-strip {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 4px;
    }
    .mouth-dot {
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: rgba(167,139,250,0.7);
    }
    .mouth-dot:nth-child(2) {
      background: rgba(167,139,250,0.45);
    }
    .mouth-dot:nth-child(3) {
      background: rgba(167,139,250,0.25);
    }

    /* Neck */
    .neck {
      width: 24px;
      height: 8px;
      background: #0d101e;
      border-left: 2px solid rgba(79,156,249,0.2);
      border-right: 2px solid rgba(79,156,249,0.2);
    }

    /* Body row = arms + torso */
    .body-row {
      display: flex;
      align-items: center;
      gap: 0;
    }

    .arm {
      width: 14px;
      height: 52px;
      background: #0d101e;
      border-radius: 6px;
      border: 2px solid rgba(79,156,249,0.2);
      position: relative;
    }
    .arm.left {
      border-radius: 6px 4px 4px 6px;
      margin-right: -1px;
      animation: wave-l 4s ease-in-out infinite;
      transform-origin: top center;
    }
    .arm.right {
      border-radius: 4px 6px 6px 4px;
      margin-left: -1px;
      animation: wave-r 4s ease-in-out infinite;
      transform-origin: top center;
    }
    @keyframes wave-l {
      0%, 100% { transform: rotate(8deg); }
      50%       { transform: rotate(-8deg); }
    }
    @keyframes wave-r {
      0%, 100% { transform: rotate(-8deg); }
      50%       { transform: rotate(8deg); }
    }

    /* Torso */
    .torso {
      width: 82px;
      height: 66px;
      background: #0d101e;
      border: 2px solid rgba(79,156,249,0.3);
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 7px;
      position: relative;
      box-shadow: 0 0 18px rgba(79,156,249,0.08), inset 0 0 10px rgba(79,156,249,0.04);
    }
    .torso::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(79,156,249,0.4), transparent);
    }

    /* Panel lights */
    .panel-lights {
      display: flex;
      gap: 5px;
    }
    .plight {
      width: 8px;
      height: 8px;
      border-radius: 50%;
    }
    .plight-1 {
      background: var(--accent-3);
      box-shadow: 0 0 5px rgba(52,211,153,0.7);
      animation: blink-l1 2.7s ease-in-out infinite;
    }
    .plight-2 {
      background: var(--accent);
      box-shadow: 0 0 5px rgba(79,156,249,0.7);
       animation: blink-l2 1.9s ease-in-out infinite;
    }
    .plight-3 {
      background: var(--accent-2);
      box-shadow: 0 0 5px rgba(167,139,250,0.7);
      animation: blink-l3 3.3s ease-in-out infinite;
    }
    @keyframes blink-l1 { 0%, 100% { opacity: 1; } 50% { opacity: 0.25; } }
    @keyframes blink-l2 { 0%, 40%, 100% { opacity: 1; } 70% { opacity: 0.2; } }
    @keyframes blink-l3 { 0%, 60%, 100% { opacity: 0.4; } 30% { opacity: 1; } }

    /* Panel screen */
    .panel-screen {
      width: 44px;
      height: 16px;
      border-radius: 4px;
      background: rgba(79,156,249,0.08);
      border: 1px solid rgba(79,156,249,0.22);
      overflow: hidden;
      position: relative;
    }
    .panel-screen-bar {
      position: absolute;
      top: 0;
      left: -100%;
      width: 60%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(79,156,249,0.35), transparent);
      animation: scan 2s linear infinite;
    }
    @keyframes scan { to { left: 160%; } }

    /* Legs */
    .legs {
      display: flex;
      gap: 14px;
      margin-top: -2px;
    }
    .leg {
      width: 18px;
      height: 22px;
      background: #0d101e;
      border: 2px solid rgba(79,156,249,0.2);
      border-top: none;
      border-radius: 0 0 6px 6px;
    }
    .foot {
      display: flex;
      gap: 18px;
    }
    .boot {
      width: 24px;
      height: 9px;
      background: #0d101e;
      border: 2px solid rgba(79,156,249,0.22);
      border-top: none;
      border-radius: 0 0 5px 5px;
    }

    /* ── Caption ── */
    .caption {
      margin-top: 1.4rem;
      max-width: 400px;
    }
    .caption h2 {
      font-size: 1.15rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.45rem;
      letter-spacing: -0.01em;
    }
    .caption p {
      font-size: 0.875rem;
      color: var(--text-muted);
      line-height: 1.65;
    }

    /* ── Nav links ── */
    .nav-links {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 0.6rem;
      margin-top: 1.5rem;
    }
    .nav-link {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.45rem 1rem;
      border-radius: 8px;
      font-size: 0.82rem;
      font-weight: 500;
      text-decoration: none;
      border: 1px solid var(--border);
      color: var(--text-muted);
      background: var(--bg-card);
      transition: all 0.18s ease;
      backdrop-filter: blur(4px);
    }
    .nav-link:hover {
      color: var(--accent);
      border-color: rgba(79,156,249,0.3);
      background: rgba(79,156,249,0.07);
      transform: translateY(-1px);
    }
    .nav-link svg {
      width: 13px;
      height: 13px;
      opacity: 0.7;
    }

    /* ── Error code tag ── */
    .err-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.65rem;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--text-faint);
      margin-bottom: 0.1rem;
    }

    @media (max-width: 500px) {
      .err-code {
        font-size: 5rem;
      }
      .bubble {
        font-size: 0.7rem;
      }
    }
  </style>
</head>
<body>

<div class="stars"></div>
<div class="glow-l"></div>
<div class="glow-r"></div>

<div class="page">

  <!-- Big 404 -->
  <div class="err-tag">Error</div>
  <div class="err-code">404</div>

  <!-- Robot -->
  <div class="robot-wrap">
    <!-- Speech bubble -->
    <div class="bubble" id="bubble-text">Hmm... I can't find that page.<span class="cursor"></span></div>

    <!-- Robot -->
    <div class="robot">
      <div class="antenna"></div>
      <div class="head">
        <div class="eye left"></div>
        <div class="eye right"></div>
        <div class="mouth-strip">
          <div class="mouth-dot"></div>
          <div class="mouth-dot"></div>
          <div class="mouth-dot"></div>
        </div>
      </div>
      <div class="neck"></div>
      <div class="body-row">
        <div class="arm left"></div>
        <div class="torso">
          <div class="panel-lights">
            <div class="plight plight-1"></div>
            <div class="plight plight-2"></div>
            <div class="plight plight-3"></div>
          </div>
          <div class="panel-screen">
            <div class="panel-screen-bar"></div>
          </div>
        </div>
        <div class="arm right"></div>
      </div>
      <div class="legs">
        <div class="leg"></div>
        <div class="leg"></div>
      </div>
      <div class="foot">
        <div class="boot"></div>
        <div class="boot"></div>
      </div>
    </div>
  </div>

  <!-- Caption -->
  <div class="caption">
    <h2>Page not found</h2>
    <p>The page you're looking for doesn't exist or may have been moved. Head back to one of these:</p>
  </div>

  <!-- Navigation -->
  <nav class="nav-links">
    <a class="nav-link" href="/api/home">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12L12 3l9 9"/><path d="M9 21V12h6v9"/></svg>
      Homepage
    </a>
    <a class="nav-link" href="/api/resume">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="8" y1="8" x2="16" y2="8"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="16" x2="12" y2="16"/></svg>
      Resume
    </a>
    <a class="nav-link" href="/api/portfolio">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
      Portfolio
    </a>
    <a class="nav-link" href="/api/playground">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
      Playground
    </a>
  </nav>

</div>

<script>
  // Cycle through a few robot quips
  var quips = [
    'Hmm... I can\'t find that page.',
    'Scanning database... nope, nothing.',
    'ERROR_404: page.exists() === false',
    'Did you try turning it off and on?',
    'My circuits are confused too.',
  ];
  var i = 0;
  var el = document.querySelector('#bubble-text');
  setInterval(function () {
    i = (i + 1) % quips.length;
    el.innerHTML = quips[i] + '<span class="cursor"></span>';
  }, 4000);
</script>
</body>
</html>
