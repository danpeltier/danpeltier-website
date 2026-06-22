<?php
// portfolio
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Dan Peltier</title>
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

    .nav-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .nav-list a, .nav-list .nav-section-label {
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
    .nav-list .nav-list {
      margin-left: 2rem;
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
    .sidebar-footer a {
      color: var(--accent);
      text-decoration: none;
    }
    .sidebar-footer a:hover {
      text-decoration: underline;
    }

    /* ── Main ── */
    .main {
      margin-left: var(--sidebar-w);
      min-height: 100vh;
      padding: 3rem 3.5rem 5rem;
      max-width: 1300px;
    }

    /* ── Page header ── */
    .page-header {
      margin-bottom: 3.5rem;
      padding-bottom: 2rem;
      border-bottom: 1px solid var(--border);
    }
    .page-header-kicker {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.65rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 0.7rem;
    }
    .page-header h1 {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--text);
      letter-spacing: -0.02em;
      margin-bottom: 0.6rem;
      line-height: 1.2;
    }
    .page-header p {
      font-size: 0.97rem;
      color: var(--text-muted);
      max-width: 600px;
      line-height: 1.7;
    }

    /* ── Project section ── */
    .project-section {
      margin-bottom: 4.5rem;
    }

    .section-header {
      display: flex;
      align-items: baseline;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    .section-title {
      font-size: 1.15rem;
      font-weight: 700;
      color: var(--text);
      letter-spacing: -0.01em;
    }
    .section-count {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.65rem;
      color: var(--text-faint);
      letter-spacing: 0.08em;
    }
    .section-divider {
      height: 1px;
      background: linear-gradient(90deg, var(--border) 0%, transparent 100%);
      margin-bottom: 1.75rem;
    }
    .section-desc {
      font-size: 0.875rem;
      color: var(--text-muted);
      margin-bottom: 1.75rem;
      max-width: 700px;
      line-height: 1.7;
    }

    /* ── Media grid ── */
    .media-grid {
      display: grid;
      gap: 1.25rem;
    }
    .media-grid.cols-1 {
      grid-template-columns: 1fr;
      max-width: 860px;
    }
    .media-grid.cols-2 {
      grid-template-columns: repeat(2, 1fr);
    }
    .media-grid.cols-3 {
      grid-template-columns: repeat(3, 1fr);
    }
    .media-grid.cols-4 {
      grid-template-columns: repeat(4, 1fr);
    }

    /* ── Media card ── */
    .media-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      overflow: hidden;
      transition: border-color 0.2s, transform 0.2s, box-shadow 0.2s;
      cursor: pointer;
    }
    .media-card:hover {
      border-color: var(--border-hover);
      transform: translateY(-2px);
      box-shadow: 0 8px 32px rgba(0,0,0,0.4);
    }
    .media-card.video-card {
      cursor: default;
    }
    .media-card.video-card:hover {
      transform: none;
      box-shadow: none;
    }

    .card-thumb {
      width: 100%;
      aspect-ratio: 16 / 9;
      overflow: hidden;
      background: #0a0c14;
      position: relative;
    }
    .card-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top;
      display: block;
      transition: transform 0.35s ease;
    }
    .media-card:hover .card-thumb img {
      transform: scale(1.03);
    }

    .card-thumb video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .card-zoom-hint {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      background: rgba(11,13,21,0.55);
      transition: opacity 0.2s;
      pointer-events: none;
    }
    .card-zoom-hint svg {
      width: 28px;
      height: 28px;
      color: #fff;
      opacity: 0.9;
    }
    .media-card:hover .card-zoom-hint {
      opacity: 1;
    }

    .card-body {
      padding: 0.85rem 1rem 1rem;
    }
    .card-title {
      font-size: 0.88rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.25rem;
    }
    .card-caption {
      font-size: 0.78rem;
      color: var(--text-muted);
      line-height: 1.55;
    }

    /* ── Video section (full-width) ── */
    .video-wrap {
      width: 100%;
      max-width: 860px;
      border-radius: var(--radius);
      overflow: hidden;
      background: #000;
      border: 1px solid var(--border);
      box-shadow: 0 16px 48px rgba(0,0,0,0.5);
    }
    .video-wrap video {
      width: 100%;
      display: block;
      max-height: 520px;
    }
    .video-meta {
      padding: 0.85rem 1rem;
      background: rgba(255,255,255,0.03);
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 0.6rem;
    }
    .video-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.6rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.15rem 0.45rem;
      border-radius: 4px;
      background: rgba(167,139,250,0.14);
      color: var(--accent-2);
    }
    .video-label {
      font-size: 0.82rem;
      color: var(--text-muted);
    }

    /* ── Shopify grid - slides feel better at aspect-ratio 4:3 ── */
    .shopify-grid .card-thumb {
      aspect-ratio: 4 / 3;
    }
    .shopify-grid .card-thumb img {
      object-fit: contain;
      object-position: center;
      padding: 2rem;
    }

    /* ── Section accent bar ── */
    .section-accent {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 1.25rem;
    }
    .section-pip {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      flex-shrink: 0;
    }
    .section-tag {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.62rem;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--text-faint);
    }

    /* ── Lightbox ── */
    .lightbox {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 900;
      background: rgba(7,8,14,0.92);
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      cursor: zoom-out;
    }
    .lightbox.open {
      display: flex;
    }
    .lightbox-inner {
      position: relative;
      max-width: min(1100px, 94vw);
      max-height: 90vh;
      display: flex;
      flex-direction: column;
      gap: 0.85rem;
      cursor: default;
    }
    .lightbox-inner img {
      max-width: 100%;
      max-height: 82vh;
      object-fit: contain;
      border-radius: 8px;
      box-shadow: 0 24px 80px rgba(0,0,0,0.7);
      display: block;
    }
    .lightbox-caption {
      text-align: center;
      font-size: 0.82rem;
      color: var(--text-muted);
    }
    .lightbox-close {
      position: absolute;
      top: -2.5rem;
      right: 0;
      background: none;
      border: none;
      color: var(--text-muted);
      font-size: 1.4rem;
      cursor: pointer;
      padding: 0.3rem;
      transition: color 0.15s;
    }
    .lightbox-close:hover {
      color: var(--text);
    }

    /* ── Mobile ── */
    @media (max-width: 900px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: static;
        border-right: none;
        border-bottom: 1px solid var(--border);
      }
      .main {
        margin-left: 0;
        padding: 2rem 1.25rem 4rem;
      }
      .page-header h1 {
        font-size: 1.6rem;
      }
      .media-grid.cols-2,
      .media-grid.cols-3,
      .media-grid.cols-4 {
        grid-template-columns: 1fr;
      }
    }
    @media (min-width: 901px) and (max-width: 1100px) {
      .main {
        padding: 2.5rem 2rem 4rem;
      }
      .media-grid.cols-3,
      .media-grid.cols-4 {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>
<body>

<div id="progress-bar"></div>

<!-- ── Sidebar ── -->
<nav class="sidebar">
  <div class="sidebar-brand">Dan Peltier</div>
  <div class="sidebar-sub">danpeltier.ca</div>

  <ul class="nav-list">
    <li>
      <a href="/">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12L12 3l9 9"/><path d="M9 21V12h6v9"/></svg>
        Homepage
      </a>
    </li>
    <li>
      <div class="nav-section-label"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>Portfolio</div>
      <ul class="nav-list">
        <li><a href="#dashboards">📊 Dashboards</a></li>
        <li><a href="#demos">🛒 eCommerce Demos</a></li>
        <li><a href="#groupby">🌐 GroupBy Website</a></li>
        <li><a href="#shopify">🛍️ Shopify</a></li>
      </ul>
    </li>
    <li>
      <a href="/playground">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        Dev Playground
      </a>
    </li>
  </ul>

  <div class="sidebar-footer">
    <a href="mailto:dan@danpeltier.ca">dan@danpeltier.ca</a><br>
    Toronto, Ontario · Canada
  </div>
</nav>

<!-- ── Main content ── -->
<main class="main">

  <!-- Page header -->
  <header class="page-header">
    <div class="page-header-kicker">Work samples</div>
    <h1>Portfolio</h1>
    <p>Screenshots and recordings from projects I've built - spanning dashboard design, AI-powered eCommerce demos, corporate web presence, and Shopify app development.</p>
  </header>

  <!-- ─────────────────────────────────────────────
       Section 1 - Dashboards
  ───────────────────────────────────────────── -->
  <section class="project-section" id="dashboards">
    <div class="section-accent">
      <span class="section-pip" style="background:var(--accent)"></span>
      <span class="section-tag">01 · Dashboards</span>
    </div>
    <div class="section-header">
      <h2 class="section-title">Dashboard Design</h2>
      <span class="section-count">2 items</span>
    </div>
    <div class="section-divider"></div>
    <p class="section-desc">Internal dashboard interface built to surface analytics and visualise operational workflows - designed from scratch with a focus on clarity and data density.</p>

    <div class="media-grid cols-2">
      <div class="media-card" onclick="openLightbox('/portfolio-assets/dashboard-design.png', 'Dashboard Design')">
        <div class="card-thumb">
          <img src="/portfolio-assets/dashboard-design.png" alt="Dashboard Design" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Dashboard Design System</div>
          <div class="card-caption">Full-page analytics dashboard - component hierarchy, data tables, summary cards, and charting layout.</div>
        </div>
      </div>
      <div class="media-card" onclick="openLightbox('/portfolio-assets/dashboard-peltierlabs.png', 'PeltierLabs Design')">
        <div class="card-thumb">
          <img src="/portfolio-assets/dashboard-peltierlabs.png" alt="PeltierLabs Design" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">PeltierLabs Dashboard Design</div>
          <div class="card-caption">Analytics dashboard for Customer Engagement with Search/Merchandising SaaS</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ─────────────────────────────────────────────
       Section 2 - Demos
  ───────────────────────────────────────────── -->
  <section class="project-section" id="demos">
    <div class="section-accent">
      <span class="section-pip" style="background:var(--accent-3)"></span>
      <span class="section-tag">02 · eCommerce Demos</span>
    </div>
    <div class="section-header">
      <h2 class="section-title">AI-Powered Demo Interfaces</h2>
      <span class="section-count">3 items</span>
    </div>
    <div class="section-divider"></div>
    <p class="section-desc">Interactive UI systems built for Rezolve AI client demos - simulating intelligent eCommerce product discovery experiences across verticals including housewares, apparel, and auto parts.</p>

    <div class="media-grid cols-3">
      <div class="media-card" onclick="openLightbox('/portfolio-assets/demo-ai-housewares.png', 'AI Housewares Demo')">
        <div class="card-thumb">
          <img src="/portfolio-assets/demo-ai-housewares.png" alt="AI Housewares Demo" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">AI Housewares Demo</div>
          <div class="card-caption">AI-driven product discovery interface for a housewares vertical.</div>
        </div>
      </div>

      <div class="media-card" onclick="openLightbox('/portfolio-assets/demo-apparel.png', 'Apparel Demo')">
        <div class="card-thumb">
          <img src="/portfolio-assets/demo-apparel.png" alt="Apparel Demo" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Apparel Demo</div>
          <div class="card-caption">Intelligent search and filtering experience for fashion retail.</div>
        </div>
      </div>

      <div class="media-card" onclick="openLightbox('/portfolio-assets/demo-autoparts-fitment.png', 'Auto Parts Fitment Demo')">
        <div class="card-thumb">
          <img src="/portfolio-assets/demo-autoparts-fitment.png" alt="Auto Parts Fitment Demo" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Auto Parts Fitment Demo</div>
          <div class="card-caption">Fitment-aware product search - matching parts to vehicle year, make, and model.</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ─────────────────────────────────────────────
       Section 3 - GroupBy Website
  ───────────────────────────────────────────── -->
  <section class="project-section" id="groupby">
    <div class="section-accent">
      <span class="section-pip" style="background:var(--accent-2)"></span>
      <span class="section-tag">03 · GroupBy Website</span>
    </div>
    <div class="section-header">
      <h2 class="section-title">GroupBy Inc. - Corporate Website <a href="https://groupbyinc.com" target="_blank" rel="noopener noreferrer" style="font-size:0.72rem;font-weight:500;font-family:'JetBrains Mono',monospace;letter-spacing:0.08em;color:var(--accent-3);background:var(--accent-3-dim);border:1px solid rgba(52,211,153,0.18);padding:0.15rem 0.55rem;border-radius:20px;text-decoration:none;vertical-align:middle;margin-left:0.5rem;transition:background 0.15s;" onmouseover="this.style.background='rgba(52,211,153,0.18)'" onmouseout="this.style.background='var(--accent-3-dim)'">↗ Live</a></h2>
      <span class="section-count">1 recording</span>
    </div>
    <div class="section-divider"></div>
    <p class="section-desc">Full frontend implementation of groupbyinc.com - built in collaboration with a marketing designer, translating visual concepts into a responsive, SEO-optimised production site delivered under aggressive timelines.</p>

    <div class="video-wrap">
      <video controls preload="metadata" poster="">
        <source src="/portfolio-assets/groupbyinc-website.mp4" type="video/mp4" />
        Your browser doesn't support this video format.
      </video>
      <div class="video-meta">
        <span class="video-badge">Screen recording</span>
        <span class="video-label">GroupBy Inc. Website Walkthrough - groupbyinc.com</span>
      </div>
    </div>
  </section>

  <!-- ─────────────────────────────────────────────
       Section 4 - Shopify
  ───────────────────────────────────────────── -->
  <section class="project-section" id="shopify">
    <div class="section-accent">
      <span class="section-pip" style="background:#96bf48"></span>
      <span class="section-tag">04 · Shopify</span>
    </div>
    <div class="section-header">
      <h2 class="section-title">Shopify Integration</h2>
      <span class="section-count">4 items</span>
    </div>
    <div class="section-divider"></div>
    <p class="section-desc">Shopify app development - from integration architecture through documentation, dashboard reporting, and App Store launch. Covers the full lifecycle of a production Shopify application.</p>

    <div class="media-grid cols-2 shopify-grid">
      <div class="media-card" onclick="openLightbox('/portfolio-assets/shopify-app-store-launched.png', 'Shopify App Store Launch')">
        <div class="card-thumb">
          <img src="/portfolio-assets/shopify-app-store-launched.png" alt="Shopify App Store Launch" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">App Store Launch</div>
          <div class="card-caption">Live Shopify App Store listing - published and available to merchants.</div>
        </div>
      </div>

      <div class="media-card" onclick="openLightbox('/portfolio-assets/shopify-integration-slide.png', 'Shopify Integration Overview')">
        <div class="card-thumb">
          <img src="/portfolio-assets/shopify-integration-slide.png" alt="Shopify Integration Overview" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Integration Overview</div>
          <div class="card-caption">Architecture overview slide - how the Shopify integration connects to the platform.</div>
        </div>
      </div>

      <div class="media-card" onclick="openLightbox('/portfolio-assets/shopify-dashboard-slide.png', 'Shopify Dashboard Slide')">
        <div class="card-thumb">
          <img src="/portfolio-assets/shopify-dashboard-slide.png" alt="Shopify Dashboard Slide" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Dashboard Reporting</div>
          <div class="card-caption">Merchant-facing dashboard slide highlighting analytics and key metrics.</div>
        </div>
      </div>

      <div class="media-card" onclick="openLightbox('/portfolio-assets/shopify-documentation.png', 'Shopify Developer Documentation')">
        <div class="card-thumb">
          <img src="/portfolio-assets/shopify-documentation.png" alt="Shopify Developer Documentation" loading="lazy" />
          <div class="card-zoom-hint">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
          </div>
        </div>
        <div class="card-body">
          <div class="card-title">Developer Documentation</div>
          <div class="card-caption">Integration documentation - installation guide, API reference, and configuration steps.</div>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- ── Lightbox ── -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
  <div class="lightbox-inner" onclick="event.stopPropagation()">
    <button class="lightbox-close" onclick="closeLightbox()" title="Close">✕</button>
    <img id="lightbox-img" src="" alt="" />
    <div class="lightbox-caption" id="lightbox-caption"></div>
  </div>
</div>

<script>
  // ── Scroll progress ──────────────────────────────────────────────
  window.addEventListener('scroll', function () {
    var scrolled = document.documentElement.scrollTop;
    var total = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.querySelector('#progress-bar').style.width = (scrolled / total * 100) + '%';
  });

  // ── Lightbox ─────────────────────────────────────────────────────
  function openLightbox(src, caption) {
    document.querySelector('#lightbox-img').src = src;
    document.querySelector('#lightbox-img').alt = caption;
    document.querySelector('#lightbox-caption').textContent = caption;
    document.querySelector('#lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    document.querySelector('#lightbox').classList.remove('open');
    document.querySelector('#lightbox-img').src = '';
    document.body.style.overflow = '';
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeLightbox();
  });
</script>
</body>
</html>
