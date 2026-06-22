<?php
// resume
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resume | Dan Peltier, Frontend UX/UI Developer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after {
      box-sizing: border-box; margin: 0; padding: 0;
    }

    :root {
      --bg:             #0b0d15;
      --bg-card:        rgba(255,255,255,0.028);
      --bg-card-hover:  rgba(255,255,255,0.052);
      --bg-sidebar:     #0d101a;
      --accent:         #4f9cf9;
      --accent-dim:     rgba(79,156,249,0.1);
      --accent-glow:    rgba(79,156,249,0.22);
      --accent-2:       #a78bfa;
      --accent-2-dim:   rgba(167,139,250,0.1);
      --accent-3:       #34d399;
      --accent-3-dim:   rgba(52,211,153,0.1);
      --text:           #dde3ee;
      --text-muted:     #7b8faa;
      --text-faint:     #3d4a5c;
      --border:         rgba(255,255,255,0.06);
      --border-hover:   rgba(255,255,255,0.11);
      --sidebar-w:      260px;
      --radius:         10px;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.65;
      overflow-x: hidden;
    }

    /* ── Scroll progress bar ── */
    #progress-bar {
      position: fixed;
      top: 0;
      left: 0;
      height: 2px;
      width: 0%;
      background: linear-gradient(90deg, var(--accent), var(--accent-2));
      z-index: 999;
      transition: width 0.08s linear;
    }

    /* ── Sidebar ── */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: var(--sidebar-w);
      height: 100vh;
      background: var(--bg-sidebar);
      border-right: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      padding: 2rem 1.5rem;
      z-index: 300;
      overflow-y: auto;
    }

    .sidebar-brand {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.68rem;
      color: var(--accent);
      letter-spacing: 0.18em;
      text-transform: uppercase;
      margin-bottom: 0.3rem;
    }
    .sidebar-sub {
      font-size: 0.72rem;
      color: var(--text-faint);
      margin-bottom: 2.5rem;
      line-height: 1.4;
    }

    .nav-section-label {
      font-size: 0.62rem;
      font-weight: 600;
      letter-spacing: 0.13em;
      text-transform: uppercase;
      color: var(--text-faint);
      margin-bottom: 0.6rem;
    }

    .nav-section-label > div {
      display: flex;
      align-items: center;
      gap: 0.55rem;
      text-transform: none;
    }

    .nav-section-label > ul {
      margin: .5rem 0 0 1rem;
    }

    .nav-list .nav-section-label {
      padding: 0.48rem 0.7rem;
      border-radius: 7px;
      text-decoration: none;
      color: var(--text-muted);
      font-size: 0.84rem;
      font-weight: 500;
      transition: all 0.18s ease;
      border: 1px solid transparent;
    }

    .nav-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .nav-list a {
      display: flex;
      align-items: center;
      gap: 0.55rem;
      padding: 0.48rem 0.7rem;
      border-radius: 7px;
      text-decoration: none;
      color: var(--text-muted);
      font-size: 0.84rem;
      font-weight: 500;
      transition: all 0.18s ease;
      border: 1px solid transparent;
    }
    .nav-list a svg, .nav-section-label svg {
      width: 13px;
      height: 13px;
      flex-shrink: 0;
      opacity: 0.65;
    }
    .nav-list a:hover {
      color: var(--text);
      background: var(--accent-dim);
      border-color: rgba(79,156,249,0.12);
    }
    .nav-list a.active {
      color: var(--accent);
      background: var(--accent-dim);
      border-color: rgba(79,156,249,0.18);
    }
    .nav-list a.active svg {
      opacity: 1;
    }

    .sidebar-footer {
      margin-top: auto;
      padding-top: 1.5rem;
      border-top: 1px solid var(--border);
      font-size: 0.72rem;
      color: var(--text-faint);
      line-height: 1.6;
    }

    /* ── Mobile header ── */
    .mobile-header {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 54px;
      background: rgba(11,13,21,0.94);
      backdrop-filter: blur(14px) saturate(1.4);
      border-bottom: 1px solid var(--border);
      align-items: center;
      justify-content: space-between;
      padding: 0 1.25rem;
      z-index: 400;
    }
    .mobile-brand {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.75rem;
      color: var(--accent);
      letter-spacing: 0.12em;
    }
    .hamburger {
      background: none;
      border: none;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      gap: 5px;
      padding: 4px;
    }
    .hamburger span {
      display: block;
      width: 20px;
      height: 1.5px;
      background: var(--text);
      border-radius: 2px;
      transition: all 0.28s ease;
    }
    .hamburger.open span:nth-child(1) {
      transform: translateY(6.5px) rotate(45deg);
    }
    .hamburger.open span:nth-child(2) {
      opacity: 0;
      transform: scaleX(0);
    }
    .hamburger.open span:nth-child(3) {
      transform: translateY(-6.5px) rotate(-45deg);
    }

    .mobile-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.55);
      z-index: 250;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    /* ── Main layout ── */
    .main-content {
      margin-left: var(--sidebar-w);
    }

    /* ── Hero ── */
    .hero {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5rem 4.5rem;
      position: relative;
      overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute;
      top: -20%;
      right: -10%;
      width: 55%;
      height: 75%;
      background: radial-gradient(ellipse at center, rgba(79,156,249,0.065) 0%, transparent 70%);
      pointer-events: none;
    }
    .hero::after {
      content: '';
      position: absolute;
      bottom: -15%;
      right: 8%;
      width: 38%;
      height: 55%;
      background: radial-gradient(ellipse at center, rgba(167,139,250,0.05) 0%, transparent 70%);
      pointer-events: none;
    }

    .hero-eyebrow {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.72rem;
      color: var(--accent);
      letter-spacing: 0.22em;
      text-transform: uppercase;
      margin-bottom: 1.3rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      opacity: 0;
      animation: fadeUp 0.6s ease 0.15s forwards;
    }
    .hero-eyebrow::before {
      content: '';
      display: inline-block;
      width: 28px;
      height: 1px;
      background: var(--accent);
      opacity: 0.6;
    }

    .hero-name {
      font-size: clamp(2.6rem, 6vw, 4.8rem);
      font-weight: 700;
      letter-spacing: -0.025em;
      line-height: 1.04;
      margin-bottom: 0.85rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.35s forwards;
    }
    .hero-name span {
      background: linear-gradient(140deg, #ffffff 40%, rgba(79,156,249,0.75) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-title {
      font-size: clamp(0.95rem, 2.2vw, 1.2rem);
      color: var(--text-muted);
      font-weight: 400;
      margin-bottom: 1.75rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.5s forwards;
    }
    .hero-title strong {
      color: var(--accent-2);
      font-weight: 600;
    }

    .hero-desc {
      max-width: 560px;
      color: var(--text-muted);
      font-size: 0.97rem;
      line-height: 1.8;
      margin-bottom: 2.25rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.65s forwards;
    }

    .hero-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 3rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.8s forwards;
    }
    .pill {
      padding: 0.28rem 0.8rem;
      border-radius: 100px;
      font-size: 0.74rem;
      font-weight: 500;
      border: 1px solid;
      transition: all 0.2s ease;
      cursor: default;
    }
    .pill:hover {
      transform: translateY(-1px);
      filter: brightness(1.15);
    }
    .pill-b {
      background: var(--accent-dim);
      border-color: rgba(79,156,249,0.22);
      color: var(--accent);

    }
    .pill-p {
      background: var(--accent-2-dim);
      border-color: rgba(167,139,250,0.22);
      color: var(--accent-2);
    }
    .pill-g {
      background: var(--accent-3-dim);
      border-color: rgba(52,211,153,0.22);
      color: var(--accent-3);
    }

    .hero-cue {
      display: flex;
      align-items: center;
      gap: 0.7rem;
      color: var(--text-faint);
      font-size: 0.78rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 1s forwards;
    }
    .hero-cue-line {
      width: 36px;
      height: 1px;
      background: var(--text-faint);
    }

    /* ── Sections ── */
    section {
      padding: 5rem 4.5rem;
      border-top: 1px solid var(--border);
    }

    .sec-label {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.68rem;
      color: var(--accent);
      letter-spacing: 0.22em;
      text-transform: uppercase;
      margin-bottom: 0.4rem;
    }
    .sec-title {
      font-size: clamp(1.5rem, 3vw, 2.1rem);
      font-weight: 700;
      letter-spacing: -0.02em;
      color: var(--text);
      margin-bottom: 2.5rem;
    }

    .quote-holder {
      max-width: 34rem;
      margin: 0 auto 2.5rem;
    }

    .quote {
      font-family: 'JetBrains Mono', monospace;
      font-size: 1.25rem;
      color: var(--accent);
      letter-spacing: 0.22em;
      text-align: center;
    }

    .quote-by {
      margin-top: 1rem;
      text-align: right;
    }

    /* ── Reveal animation ── */
    .reveal {
      opacity: 0;
      transform: translateY(22px);
      transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ── Skills ── */
    .skills-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 1.1rem;
    }
    .skill-cat {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.2rem 1.25rem;
      transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }
    .skill-cat:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
      transform: translateY(-2px);
    }
    .skill-cat-head {
      display: flex;
      align-items: center;
      gap: 0.45rem;
      font-size: 0.68rem;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      margin-bottom: 0.9rem;
    }
    .skill-cat-head .dot {
      width: 5px;
      height: 5px;
      border-radius: 50%;
      flex-shrink: 0;
    }
    .tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.35rem;
    }
    .tag {
      font-size: 0.76rem;
      padding: 0.18rem 0.6rem;
      border-radius: 4px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      color: var(--text-muted);
      font-weight: 500;
      transition: all 0.18s ease;
    }
    .tag:hover {
      background: rgba(255,255,255,0.08);
      color: var(--text);
    }

    /* ── Timeline ── */
    .timeline {
      position: relative;
      padding-left: 1.25rem;
    }
    .timeline::before {
      content: '';
      position: absolute;
      left: 0;
      top: 10px;
      bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, var(--accent) 0%, rgba(79,156,249,0.15) 60%, transparent 100%);
    }

    .t-item {
      position: relative;
      padding-left: 1.6rem;
      margin-bottom: 3rem;
    }
    .t-item::before {
      content: '';
      position: absolute;
      left: -1.26rem;
      top: 9px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 0 3px var(--accent-dim);
      transition: box-shadow 0.25s ease;
    }
    .t-item:hover::before {
      box-shadow: 0 0 0 6px var(--accent-glow);
    }
    .t-item:first-child::before {
      animation: pulse-dot 2.2s ease-in-out infinite;
    }

    .t-role {
      font-size: 1.02rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.2rem;
    }
    .t-company {
      font-size: 0.88rem;
      font-weight: 500;
      color: var(--accent);
    }
    .t-alias {
      font-size: 0.78rem;
      color: var(--text-faint);
      margin-left: 0.5rem;
    }
    .t-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 0.4rem;
      margin: 0.5rem 0 1rem;
    }
    .t-chip {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.68rem;
      padding: 0.15rem 0.5rem;
      border-radius: 4px;
      border: 1px solid var(--border);
      color: var(--text-muted);
    }

    .t-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.42rem;
    }
    .t-list li {
      font-size: 0.885rem;
      color: var(--text-muted);
      line-height: 1.65;
      padding-left: 1.1rem;
      position: relative;
    }
    .t-list li::before {
      content: '-';
      position: absolute;
      left: 0;
      color: var(--text-faint);
      font-size: 0.78rem;
      top: 0.05em;
    }
    .t-list li strong {
      color: var(--text);
      font-weight: 500;
    }

    .impact-block {
      margin-top: 1.1rem;
      padding: 1rem 1.2rem;
      background: var(--accent-dim);
      border: 1px solid rgba(79,156,249,0.14);
      border-radius: 8px;
    }
    .impact-label {
      font-size: 0.62rem;
      font-weight: 600;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 0.6rem;
    }
    .impact-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.3rem;
    }
    .impact-list li {
      font-size: 0.84rem;
      color: var(--text-muted);
      padding-left: 1.1rem;
      position: relative;
      line-height: 1.6;
    }
    .impact-list li::before {
      content: '↗';
      position: absolute;
      left: 0;
      color: var(--accent);
      font-size: 0.72rem;
      top: 0.1em;
    }

    /* ── Projects ── */
    .proj-grid {
      display: grid;
      gap: 1.1rem;
    }
    .proj-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.4rem 1.5rem;
      position: relative;
      overflow: hidden;
      transition: background 0.22s ease, border-color 0.22s ease, transform 0.22s ease;
    }
    .proj-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), var(--accent-2));
      opacity: 0;
      transition: opacity 0.25s ease;
    }
    .proj-card:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
      transform: translateY(-2px);
    }
    .proj-card:hover::after {
      opacity: 1;
    }
    .proj-title {
      font-size: 0.98rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.8rem;
    }
    .proj-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.38rem;
    }
    .proj-list li {
      font-size: 0.87rem;
      color: var(--text-muted);
      padding-left: 1.1rem;
      position: relative;
      line-height: 1.6;
    }
    .proj-list li::before {
      content: '·';
      position: absolute;
      left: 0;
      color: var(--accent);
      font-size: 1.3rem;
      line-height: 1.15;
    }

    /* ── Approach ── */
    .approach-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    .approach-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.25rem;
      transition: background 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
    }
    .approach-card:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
      transform: translateY(-1px);
    }
    .approach-card strong {
      display: block;
      font-size: 0.88rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.35rem;
    }
    .approach-card p {
      font-size: 0.86rem;
      color: var(--text-muted);
      line-height: 1.65;
    }

    /* ── Education ── */
    .edu-grid {
      display: grid;
      gap: 0.85rem;
    }
    .edu-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.1rem 1.3rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: background 0.2s ease, border-color 0.2s ease;
    }
    .edu-card:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
    }
    .edu-icon {
      width: 38px;
      height: 38px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
      flex-shrink: 0;
    }
    .edu-degree {
      font-size: 0.92rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.1rem;
    }
    .edu-school {
      font-size: 0.78rem;
      color: var(--text-muted);
    }

    /* ── Animations ── */
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(14px);
      }
      to   {
        opacity: 1;
        transform: translateY(0);
      }
    }
    @keyframes pulse-dot {
      0%, 100% {
        box-shadow: 0 0 0 3px var(--accent-dim);
      }
      50%       {
        box-shadow: 0 0 0 7px var(--accent-glow);
      }
    }

    /* ── Responsive ── */
    @media (max-width: 900px) {
      .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
      }
      .sidebar.open {
        transform: translateX(0);
      }
      .mobile-header {
        display: flex;
      }
      .mobile-overlay {
        display: block;
      }
      .main-content {
        margin-left: 0;
        padding-top: 54px;
      }
      .hero {
        padding: 3rem 1.75rem;
        min-height: calc(100vh - 54px);
      }
      section {
        padding: 3.5rem 1.75rem;
      }
      .approach-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 600px) {
      .hero {
        padding: 2.5rem 1.25rem;
      }
      section {
        padding: 3rem 1.25rem;
      }
      .hero-name {
        font-size: 2.2rem;
      }
      .skills-grid {
        grid-template-columns: 1fr;
      }
      .approach-grid {
        grid-template-columns: 1fr;
      }
    }

    /* ── Praise badge ── */
    .praise-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.3rem;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.6rem;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.18rem 0.55rem;
      border-radius: 20px;
      background: rgba(167,139,250,0.1);
      color: var(--accent-2);
      border: 1px solid rgba(167,139,250,0.28);
      vertical-align: middle;
      margin-left: 0.65rem;
      cursor: default;
      user-select: none;
      transition: background 0.18s, border-color 0.18s, box-shadow 0.18s;
      white-space: nowrap;
    }
    .praise-badge:hover {
      background: rgba(167,139,250,0.18);
      border-color: rgba(167,139,250,0.5);
      box-shadow: 0 0 10px rgba(167,139,250,0.2);
    }

    /* ── Praise popup ── */
    #praise-popup {
      position: fixed;
      z-index: 500;
      pointer-events: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 16px 48px rgba(0,0,0,0.65), 0 0 0 1px rgba(167,139,250,0.2);
      transform: scale(0);
      transform-origin: bottom left;
      transition: transform 0.28s cubic-bezier(0.34, 1.42, 0.64, 1);
    }
    #praise-popup.visible {
      transform: scale(2.5);
    }
    #praise-popup img {
      display: block;
      width: 300px;
      height: 190px;
      object-fit: contain;
      object-position: center;
      padding: 1rem
    }

    /* ── Praise mobile modal ── */
    #praise-modal {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 600;
      background: rgba(7,8,14,0.88);
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }
    #praise-modal.open {
      display: flex;
    }
    #praise-modal img {
      max-width: min(88vw, 480px);
      max-height: 70vh;
      object-fit: contain;
      border-radius: 10px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.7), 0 0 0 1px rgba(167,139,250,0.2);
      display: block;
    }
    #praise-modal-close {
      position: absolute;
      top: 1rem;
      right: 1rem;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255,255,255,0.08);
      border: 1px solid rgba(255,255,255,0.12);
      color: #dde3ee;
      font-size: 1.1rem;
      line-height: 1;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.15s;
    }
  </style>
</head>
<body>

<div id="progress-bar"></div>

<!-- Mobile header -->
<header class="mobile-header">
  <span class="mobile-brand">DAN PELTIER</span>
  <button class="hamburger" id="hamburger" aria-label="Toggle menu">
    <span></span><span></span><span></span>
  </button>
</header>

<div class="mobile-overlay" id="overlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">Dan Peltier</div>
  <div class="sidebar-sub">Frontend UX/UI Developer<br>Toronto, ON</div>

  <ul class="nav-list">
    <li><a href="/">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>Homepage
    </a></li>
    <li><a href="/portfolio">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>Portfolio
    </a></li>
    <li><a href="/playground">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>Dev Playground
    </a></li>
    <li>
      <div class="nav-section-label">
        <div>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Resume
        </div>
        <ul class="nav-list" id="nav-list">
          <li><a href="#hero" class="nav-link active">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>Overview
          </a></li>
          <li><a href="#skills" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>Skills
          </a></li>
          <li><a href="#experience" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 3H8a2 2 0 0 0-2 2v2h12V5a2 2 0 0 0-2-2z"/></svg>Experience
          </a></li>
          <li><a href="#projects" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>Projects
          </a></li>
          <li><a href="#approach" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>Approach
          </a></li>
          <li><a href="#education" class="nav-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>Education
          </a></li>
        </ul>

      </div>
    </li>
  </ul>

  <div class="sidebar-footer">
    <div>Frontend · UX/UI · PHP/JS</div>
    <div style="margin-top:0.25rem">Open to new opportunities</div>
  </div>
</aside>

<!-- Main -->
<main class="main-content">

  <!-- Hero -->
  <section id="hero" class="hero">
    <p class="hero-eyebrow">Open to new opportunities</p>
    <h1 class="hero-name"><span>Dan Peltier</span></h1>
    <p class="hero-title">Frontend UX/UI Developer | <strong>JavaScript / UX Engineering / AI Integration</strong></p>
    <p class="hero-desc">
      Frontend-focused developer with a strong background in UX design, technical problem-solving,
      and hands-on implementation within real-world systems. I translate complex business workflows
      into intuitive, high-performance web interfaces - particularly where modern UX must integrate
      with existing or legacy codebases.
    </p>
    <div class="hero-pills">
      <span class="pill pill-b">HTML5 / CSS3</span>
      <span class="pill pill-b">JavaScript</span>
      <span class="pill pill-b">Node.js</span>
      <span class="pill pill-b">jQuery</span>
      <span class="pill pill-b">PHP</span>
      <span class="pill pill-p">UX / UI Design</span>
      <span class="pill pill-p">User Flows</span>
      <span class="pill pill-g">Performance</span>
      <span class="pill pill-g">SEO</span>
      <span class="pill pill-g">AEO</span>
    </div>
    <div class="hero-cue">
      <span class="hero-cue-line"></span>
      <span>Scroll to explore</span>
    </div>
  </section>

  <!-- Skills -->
  <section id="skills">
    <p class="sec-label reveal">Core Technical Skills</p>
    <h2 class="sec-title reveal">What I Bring to the Table</h2>
    <div class="skills-grid">

      <div class="skill-cat reveal">
        <div class="skill-cat-head" style="color:var(--accent)">
          <span class="dot" style="background:var(--accent)"></span>Frontend Development
        </div>
        <div class="tags">
          <span class="tag">HTML5</span>
          <span class="tag">CSS3</span>
          <span class="tag">Responsive Design</span>
          <span class="tag">JavaScript (Vanilla / React)</span>
          <span class="tag">jQuery</span>
          <span class="tag">AJAX / XHR</span>
          <span class="tag">Dynamic UI</span>
          <span class="tag">UI/UX for AI</span>
        </div>
      </div>

      <div class="skill-cat reveal" style="transition-delay:0.08s">
        <div class="skill-cat-head" style="color:var(--accent-2)">
          <span class="dot" style="background:var(--accent-2)"></span>Backend & Integration
        </div>
        <div class="tags">
          <span class="tag">Node.js</span>
          <span class="tag">Python</span>
          <span class="tag">PHP</span>
          <span class="tag">API Integration</span>
          <span class="tag">LLM Development &amp; Integration</span>
          <span class="tag">Data-Driven UI</span>
          <span class="tag">Git Workflows</span>
          <span class="tag">Legacy Codebases</span>
        </div>
      </div>

      <div class="skill-cat reveal" style="transition-delay:0.14s">
        <div class="skill-cat-head" style="color:var(--accent-2)">
          <span class="dot" style="background:var(--accent-2)"></span>UX / UI Design
        </div>
        <div class="tags">
          <span class="tag">Wireframing</span>
          <span class="tag">User Flows</span>
          <span class="tag">Layout Design</span>
          <span class="tag">Conversion Design</span>
          <span class="tag">eCommerce UX</span>
          <span class="tag">Dashboard Usability</span>
          <span class="tag">Rapid Prototyping</span>
        </div>
      </div>

      <div class="skill-cat reveal" style="transition-delay:0.2s">
        <div class="skill-cat-head" style="color:var(--accent-3)">
          <span class="dot" style="background:var(--accent-3)"></span>Performance & Optimization
        </div>
        <div class="tags">
          <span class="tag">SEO-Conscious Dev</span>
          <span class="tag">Asset Optimization</span>
          <span class="tag">Load Performance</span>
          <span class="tag">Lean UI Dev</span>
          <span class="tag">Framework-Free</span>
        </div>
      </div>

    </div>
  </section>

  <!-- Experience -->
  <section id="experience">
    <p class="sec-label reveal">Professional Experience</p>
    <h2 class="sec-title reveal">Where I've Made an Impact</h2>
    <div class="timeline">

      <div class="t-item reveal">
        <p class="t-role">Senior Solutions Engineer <span style="font-weight:400;color:var(--text-muted)">(Frontend / UX-Focused)</span></p>
        <div>
          <span class="t-company">Rezolve AI</span>
          <span class="t-alias">formerly GroupBy Inc.</span>
        </div>
        <div class="t-chips">
          <span class="t-chip">Toronto, ON</span>
          <span class="t-chip">Aug 2018 – Present</span>
        </div>
        <ul class="t-list">
          <li><strong>Led the full frontend implementation of groupbyinc.com</strong>, collaborating closely with a marketing designer to translate visual concepts into a responsive, production-ready site.</li>
          <li>Built end-to-end using HTML, CSS, and JavaScript - performance, responsiveness, and SEO optimization throughout.</li>
          <li>Delivered under aggressive timelines, earning internal recognition for speed and quality of execution.</li>
          <li>Designed and implemented interactive web-based demos simulating real production environments via frontend technologies and API integrations.</li>
          <li>Built UI workflows to represent complex eCommerce and AI-driven systems in a clear, intuitive, visually structured way.</li>
          <li>Applied UX principles to improve usability, clarity, and engagement across internal and client-facing tools.</li>
          <li>Collaborated cross-functionally with sales, product, engineering, and marketing teams to refine user flows and interface design.</li>
        </ul>
        <div class="impact-block">
          <p class="impact-label">Impact</p>
          <ul class="impact-list">
            <li>Improved clarity and usability of complex technical solutions, increasing stakeholder understanding and engagement.</li>
            <li>Enabled faster decision-making by presenting systems through intuitive, well-structured interfaces.</li>
            <li>Consistently delivered high-quality UI implementations under tight timelines.</li>
          </ul>
        </div>
      </div>

      <div class="t-item reveal">
        <p class="t-role">Professor - Technology &amp; Problem Solving</p>
        <div><span class="t-company">Sheridan College</span></div>
        <div class="t-chips">
          <span class="t-chip">Oakville, ON</span>
          <span class="t-chip">Aug 2016 – Aug 2018</span>
        </div>
        <ul class="t-list">
          <li>Taught structured problem-solving, system design, and real-world application development concepts.</li>
          <li>Guided students in building practical technical solutions including web-based interfaces and application logic.</li>
          <li>Simplified complex technical topics into accessible, engaging learning experiences.</li>
        </ul>
      </div>

      <div class="t-item reveal">
        <p class="t-role">Technology &amp; Consulting Roles</p>
        <div><span class="t-company" style="color:var(--text-muted)">Earlier Career</span></div>
        <div class="t-chips">
          <span class="t-chip">Various Sectors</span>
        </div>
        <ul class="t-list">
          <li>Delivered technical solutions across financial services, healthcare, and digital platforms.</li>
          <li>Built and modified web-based interfaces aligned with business workflows and user needs.</li>
          <li>Contributed to UI design, usability improvements, and technical implementation in production environments.</li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Projects -->
  <section id="projects">
    <p class="sec-label reveal">Selected Projects</p>
    <h2 class="sec-title reveal">Things I've Built</h2>
    <div class="proj-grid">

      <div class="proj-card reveal">
        <p class="proj-title">Corporate Website - GroupBy Inc.<span class="praise-badge" data-img="/praise/praise-groupby-website-launch.png">✦ Praise</span></p>
        <ul class="proj-list">
          <li>Collaborated with marketing design to evolve visual concepts into a fully realized web experience.</li>
          <li>Owned full frontend implementation: layout, responsiveness, and interactive elements.</li>
          <li>Optimized for performance, SEO, and cross-device usability.</li>
          <li>Delivered a high-quality production site under tight timelines.</li>
        </ul>
      </div>

      <div class="proj-card reveal">
        <p class="proj-title">Shopify App Development<span class="praise-badge" data-img="/praise/praise-groupby-shopify-app.png">✦ Praise</span></p>
        <ul class="proj-list">
          <li>Designed and developed a custom app on the Shopify platform to support internal business workflows, integrating seamlessly with store data and SaaS</li>
          <li>Built intuitive, user-friendly interfaces that enabled non-technical stakeholders to manage and interact with complex data efficiently</li>
          <li>Leveraged Shopify APIs and webhooks to automate key processes (indexing, etc), reducing manual effort and improving operational accuracy</li>
          <li>Collaborated with cross-functional teams to translate business requirements into scalable technical solutions, balancing rapid delivery with maintainable architecture</li>
        </ul>
      </div>

      <div class="proj-card reveal">
        <p class="proj-title">AI Demo &amp; Workflow Interfaces<span class="praise-badge" data-img="/praise/praise-rezolve-rails-team-collaboration-shop-talk-event.png">✦ Praise</span></p>
        <ul class="proj-list">
          <li>Built interactive UI systems to simulate AI-driven product experiences.</li>
          <li>Designed user flows aligned with real eCommerce and operational processes.</li>
          <li>Balanced technical constraints with usability and clarity improvements.</li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Approach -->
  <section id="approach">
    <p class="sec-label reveal">Philosophy</p>
    <h2 class="sec-title reveal">Design &amp; Development Approach</h2>
    <div class="quote-holder">
      <div class="quote">"AI is a tool. The choice about how it gets deployed is ours."</div>
      <div class="quote-by">-Oren Etzioni</div>
    </div>
    <div class="approach-grid">
      <div class="approach-card reveal">
        <strong>Clarity Over Complexity</strong>
        <p>Prioritize clarity, usability, and performance over visual excess. Every element earns its place on the screen.</p>
      </div>
      <div class="approach-card reveal" style="transition-delay:0.08s">
        <strong>Legacy-Ready Thinking</strong>
        <p>Comfortable working within legacy or mixed PHP/JavaScript environments where real-world constraints apply.</p>
      </div>
      <div class="approach-card reveal" style="transition-delay:0.14s">
        <strong>Lean by Default</strong>
        <p>Prefer lean, maintainable solutions over heavy frontend frameworks. Less overhead, more control over every line.</p>
      </div>
      <div class="approach-card reveal" style="transition-delay:0.2s">
        <strong>User-First Efficiency</strong>
        <p>Focus on real-world workflows and user efficiency - not just aesthetics. Great UX solves actual problems.</p>
      </div>
    </div>
  </section>

  <!-- Education -->
  <section id="education">
    <p class="sec-label reveal">Education &amp; Training</p>
    <h2 class="sec-title reveal">Background &amp; Learning</h2>
    <div class="edu-grid">
      <div class="edu-card reveal">
        <div class="edu-icon" style="background:var(--accent-dim)">🎓</div>
        <div>
          <p class="edu-degree">Diploma - Electronics Engineering Technology</p>
          <p class="edu-school">DeVry Institute of Technology</p>
        </div>
      </div>
      <div class="edu-card reveal">
        <div class="edu-icon" style="background:var(--accent-2-dim)">📋</div>
        <div>
          <p class="edu-degree">Management Skills for IT Professionals</p>
          <p class="edu-school">Additional Training</p>
        </div>
      </div>
      <div class="edu-card reveal">
        <div class="edu-icon" style="background:var(--accent-2-dim)">📊</div>
        <div>
          <p class="edu-degree">Managing IT Projects</p>
          <p class="edu-school">Additional Training</p>
        </div>
      </div>
      <div class="edu-card reveal">
        <div class="edu-icon" style="background:var(--accent-3-dim)">⚡</div>
        <div>
          <p class="edu-degree">Elasticsearch Engineer I</p>
          <p class="edu-school">Additional Training</p>
        </div>
      </div>
    </div>
  </section>

</main>

<div id="praise-popup">
  <img id="praise-popup-img" src="" alt="Project preview" />
</div>

<div id="praise-modal">
  <button id="praise-modal-close" aria-label="Close">✕</button>
  <img id="praise-modal-img" src="" alt="Project preview" />
</div>

<script>
  // ── Scroll progress bar ──
  const bar = document.querySelector('#progress-bar');
  const updateBar = () => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    bar.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
  };
  window.addEventListener('scroll', updateBar, { passive: true });

  // ── Scroll reveal ──
  const reveals = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); revealObs.unobserve(e.target); }
    });
  }, { threshold: 0.06, rootMargin: '0px 0px -36px 0px' });
  reveals.forEach(el => revealObs.observe(el));

  // ── Active nav highlight ──
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');
  const updateNav = () => {
    const scrollY = window.scrollY + 120;
    let current = sections[0].id;
    sections.forEach(s => { if (scrollY >= s.offsetTop) current = s.id; });
    navLinks.forEach(a => {
      a.classList.toggle('active', a.getAttribute('href') === '#' + current);
    });
  };
  window.addEventListener('scroll', updateNav, { passive: true });
  updateNav();

  // ── Mobile sidebar ──
  const hamburger = document.querySelector('#hamburger');
  const sidebar   = document.querySelector('#sidebar');
  const overlay   = document.querySelector('#overlay');

  const close = () => {
    sidebar.classList.remove('open');
    hamburger.classList.remove('open');
    overlay.style.opacity = '0';
    setTimeout(() => { overlay.style.display = 'none'; }, 300);
  };
  const open = () => {
    sidebar.classList.add('open');
    hamburger.classList.add('open');
    overlay.style.display = 'block';
    requestAnimationFrame(() => { overlay.style.opacity = '1'; });
  };

  hamburger.addEventListener('click', () => sidebar.classList.contains('open') ? close() : open());
  overlay.addEventListener('click', close);
  navLinks.forEach(a => a.addEventListener('click', () => { if (window.innerWidth <= 900) close(); }));


  var isTouch  = false;
  var popup    = document.querySelector('#praise-popup');       // always declared
  var popImg   = document.querySelector('#praise-popup-img');
  var modal    = document.querySelector('#praise-modal');
  var modalImg = document.querySelector('#praise-modal-img');
  var closeBtn = document.querySelector('#praise-modal-close');
  var hideTimer = null;

  window.addEventListener('touchstart', function() {
    if(!isTouch) isTouch = true;
  });

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  (function () {

    document.querySelectorAll('.praise-badge').forEach(function (badge) {
      badge.addEventListener('mouseenter', function () {
        if(!isTouch) {
          clearTimeout(hideTimer);
          var rect   = badge.getBoundingClientRect();
          var imgSrc = badge.dataset.img;

          if (popImg.src !== imgSrc) { popImg.src = imgSrc; }

          var popW = 300, popH = 190;
          var left = Math.min(rect.left, window.innerWidth - popW - 12);
          var top  = rect.top;

          popup.style.left = left + 'px';
          popup.style.top  = top  + 'px';
          popup.style.transformOrigin = 'top left';

          popup.classList.add('visible');
        }
      });

      badge.addEventListener('mouseleave', function () {
        if(!isTouch) {
          hideTimer = setTimeout(function () {
            popup.classList.remove('visible');
          }, 80);
        }
      });
    });
  })();

  // tap badge → open modal
  document.querySelectorAll('.praise-badge').forEach(function (badge) {
    badge.addEventListener('click', function (e) {
      if(isTouch) {
        e.stopPropagation();
        modalImg.src = badge.dataset.img;
        modal.classList.add('open');
        document.body.style.overflow = 'hidden';
      }
    });
  });
  // X button or tap backdrop → close
  closeBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', function (e) {
    if (isTouch && e.target === modal) closeModal();
  });

</script>
</body>
</html>
