<?php
// homepage
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Dan Peltier</title>
  <meta name="description" value="Multi-Disciplinary Professional" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <!-- jQuery 3.7 -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
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
      height: 2px; width: 0%;
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
      margin-bottom: 0.2rem;
    }
    .sidebar-url {
      font-size: 0.7rem;
      color: var(--text-faint);
      margin-bottom: 2.5rem;
      letter-spacing: 0.02em;
    }

    .nav-section-label {
      font-size: 1.25rem;
      font-weight: 600;
      letter-spacing: 0.13em;
      color: var(--text-faint);
      margin-bottom: 0.6rem;
      margin-top: 1.25rem;
      display: flex;
      align-items: center;
      gap: 0.55rem;
    }

    .nav-section-label > svg {
      width: 13px;
      height: 13px;
      flex-shrink: 0;
      opacity: 0.65;
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
    .nav-list a svg {
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

    .sidebar-resume-btn {
      margin-top: auto;
      padding-top: 1.5rem;
      border-top: 1px solid var(--border);
    }
    .resume-cta {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.6rem 1rem;
      background: var(--accent-dim);
      border: 1px solid rgba(79,156,249,0.22);
      border-radius: 8px;
      text-decoration: none;
      color: var(--accent);
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      transition: all 0.2s ease;
    }
    .resume-cta:hover {
      background: rgba(79,156,249,0.18);
      border-color: rgba(79,156,249,0.35);
    }
    .resume-cta svg {
      width: 13px;
      height: 13px;
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
      display: flex; flex-direction: column; justify-content: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 5rem 4.5rem;
      position: relative;
      overflow: hidden;
      position: relative;
      overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute;
      top: -20%;
      right: -10%;
      position: absolute;
      top: -20%;
      right: -10%;
      width: 55%;
      height: 75%;
      width: 55%;
      height: 75%;
      background: radial-gradient(ellipse at center, rgba(79,156,249,0.06) 0%, transparent 70%);
      pointer-events: none;
    }

    /* DP Avatar */
    .dp-avatar {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      width: 72px;
      height: 72px;
      border-radius: 50%;
      background: linear-gradient(135deg, #a78bfa 0%, #4f9cf9 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      font-size: 1.5rem;
      font-weight: 700;
      color: #fff;
      letter-spacing: -0.02em;
      margin-bottom: 1.75rem;
      box-shadow: 0 0 0 4px rgba(79,156,249,0.12);
      opacity: 0;
      animation: fadeUp 0.6s ease 0.1s forwards;
      opacity: 0;
      animation: fadeUp 0.6s ease 0.1s forwards;
    }

    .hero-name {
      font-size: clamp(2.6rem, 6vw, 4.5rem);
      font-weight: 700;
      letter-spacing: -0.025em;
      line-height: 1.04;
      font-weight: 700;
      letter-spacing: -0.025em;
      line-height: 1.04;
      margin-bottom: 0.5rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.25s forwards;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.25s forwards;
    }
    .hero-name span {
      background: linear-gradient(140deg, #ffffff 40%, rgba(79,156,249,0.75) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-title {
      font-size: 1rem;
      color: var(--text-muted);
      font-weight: 400;
      font-size: 1rem;
      color: var(--text-muted);
      font-weight: 400;
      margin-bottom: 1.25rem;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.4s forwards;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.4s forwards;
    }

    /* Typewriter */
    .typewriter-wrap {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 2.5rem;
      min-height: 1.6em;
      margin-bottom: 2.5rem;
      min-height: 1.6em;
      opacity: 0;
      animation: fadeUp 0.7s ease 0.55s forwards;
    }
    .typewriter-prefix {
      font-size: 0.82rem;
      font-family: 'JetBrains Mono', monospace;
      color: var(--text-faint);
      letter-spacing: 0.08em;
    }
    #typewriter {
      font-size: 0.9rem;
      font-weight: 500;
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--accent-2);
      font-family: 'JetBrains Mono', monospace;
    }
    .cursor {
      display: inline-block;
      width: 2px;
      height: 1em;
      display: inline-block;
      width: 2px;
      height: 1em;
      background: var(--accent-2);
      margin-left: 2px;
      vertical-align: middle;
      animation: blink 1s step-end infinite;
    }

    .info-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1rem 1.15rem;
      transition: border-color 0.2s ease;
    }
    .info-card:hover {
      border-color: var(--border-hover);
    }

    .info-label {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.6rem;
      font-weight: 500;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      margin-bottom: 0.5rem;
    }
    .info-label.loc   {
      color: var(--accent);
    }
    .info-label.dt    {
      color: var(--accent-2);
    }
    .info-label.wx    {
      color: var(--accent-3);
    }

    .info-main {
      font-size: 1rem; font-weight: 600; color: var(--text);
      line-height: 1.25; margin-bottom: 0.2rem;
    }
    .info-sub {
      font-size: 0.75rem; color: var(--text-muted); line-height: 1.4;
    }

    /* Skeleton shimmer */
    .skel {
      background: linear-gradient(90deg,
        rgba(255,255,255,0.04) 25%,
        rgba(255,255,255,0.09) 50%,
        rgba(255,255,255,0.04) 75%);
      background-size: 200% 100%;
      animation: shimmer 1.6s infinite;
      border-radius: 4px; height: 0.9em;
    }
    .skel.w-80 {
      width: 80%;
    }
    .skel.w-60 {
      width: 60%;
    }
    .skel.w-40 {
      width: 40%;
      margin-top: 0.3rem;
    }

    /* Weather icon */
    .wx-row {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .wx-icon {
      width: 32px;
      height: 32px;
    }
    .wx-temp {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--text);
    }
    .wx-cond {
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 0.15rem;
      text-transform: capitalize;
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

    /* ── Reveal ── */
    .reveal {
      opacity: 0; transform: translateY(22px);
      transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* ── Stats row ── */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      margin-bottom: 0;
      position: relative;
    }
    .stats-row > img {
      height: 6rem;
      width: auto;
      position: absolute;
      right: 1rem;
      top: -4.75rem;
      z-index: 1;
    }
    .stat-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.4rem 1.5rem;
      text-align: center;
      transition: background 0.2s ease, border-color 0.2s ease;
    }
    .stat-card:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
    }
    .stat-num {
      font-size: 2.5rem;
      font-weight: 700;
      letter-spacing: -0.03em;
      line-height: 1;
      margin-bottom: 0.3rem;
    }
    .stat-num.blue   {
      color: var(--accent);
    }
    .stat-num.purple {
      color: var(--accent-2);
    }
    .stat-num.green  {
      color: var(--accent-3);
    }
    .stat-label {
      font-size: 0.78rem; color: var(--text-muted); font-weight: 500;
    }

    /* ── Expertise grid ── */
    .expertise-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }
    .exp-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.3rem 1.4rem;
      transition: background 0.22s ease, border-color 0.22s ease, transform 0.22s ease;
      cursor: default;
    }
    .exp-card:hover {
      background: var(--bg-card-hover); border-color: var(--border-hover); transform: translateY(-2px);
    }
    .exp-icon {
      font-size: 1.6rem;
      margin-bottom: 0.75rem;
      display: block;
    }
    .exp-title {
      font-size: 0.92rem;
      font-weight: 600;
      color: var(--text);
      margin-bottom: 0.4rem;
    }
    .exp-desc {
      font-size: 0.8rem;
      color: var(--text-muted);
      line-height: 1.6;
    }

    /* ── Projects widget ── */
    #projects-container {
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

    .proj-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 1rem;
      margin-bottom: 0.6rem;
    }
    .proj-title {
      font-size: 0.98rem;
      font-weight: 600;
      color: var(--text);
    }
    .proj-year {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.7rem;
      color: var(--text-faint);
      padding: 0.15rem 0.5rem;
      border: 1px solid var(--border);
      border-radius: 4px;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .proj-desc {
      font-size: 0.875rem;
      color: var(--text-muted);
      line-height: 1.65;
      margin-bottom: 0.85rem;
    }
    .proj-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.35rem;
      margin-bottom: 0.85rem;
    }
    .proj-tag {
      font-size: 0.72rem;
      padding: 0.15rem 0.55rem;
      border-radius: 4px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--border);
      color: var(--text-muted);
      font-weight: 500;
    }
    .proj-outcome {
      font-size: 0.8rem;
      color: var(--accent-3);
      padding-left: 1rem;
      position: relative;
      line-height: 1.5;
    }
    .proj-outcome::before {
      content: '↗';
      position: absolute;
      left: 0;
      color: var(--accent-3);
    }

    /* Project skeleton */
    .proj-skel-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 1.4rem 1.5rem;
    }
    .proj-skel-card .skel {
      margin-bottom: 0.5rem;
    }

    /* Projects error state */
    .proj-error {
      text-align: center;
      padding: 2.5rem;
      color: var(--text-muted);
      font-size: 0.9rem;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
    }

    /* Backend note */
    .backend-note {
      margin-top: 1.25rem;
      padding: 0.9rem 1.1rem;
      background: var(--accent-2-dim);
      border: 1px solid rgba(167,139,250,0.15);
      border-radius: 8px;
      font-size: 0.8rem;
      color: var(--text-muted);
      line-height: 1.6;
    }
    .backend-note strong {
      color: var(--accent-2);
    }

    /* ── Contact ── */
    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: start;
    }

    .map-wrap {
      border-radius: var(--radius);
      overflow: hidden;
      border: 1px solid var(--border);
      height: 280px;
      position: relative;
    }
    .map-wrap iframe {
      width: 100%;
      height: 100%;
      border: none;
      display: block;
      filter: invert(92%) hue-rotate(200deg) saturate(0.85) brightness(0.85);
    }

    .contact-details {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .contact-item {
      display: flex;
      align-items: flex-start;
      gap: 0.85rem;
      padding: 1rem 1.1rem;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      transition: background 0.2s ease, border-color 0.2s ease;
    }
    .contact-item:hover {
      background: var(--bg-card-hover);
      border-color: var(--border-hover);
    }
    .contact-icon {
      width: 32px;
      height: 32px;
      border-radius: 7px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      flex-shrink: 0;
    }
    .contact-item-label {
      font-size: 0.68rem;
      color: var(--text-faint);
      margin-bottom: 0.15rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }
    .contact-item-val {
      font-size: 0.88rem;
      color: var(--text);
      font-weight: 500;
    }
    .contact-item-val a {
      color: var(--accent);
      text-decoration: none;
    }
    .contact-item-val a:hover {
      text-decoration: underline;
    }

    .contact-resume-btn {
      display: flex; align-items: center; justify-content: center; gap: 0.5rem;
      padding: 0.85rem 1.5rem;
      background: linear-gradient(135deg, var(--accent-dim), var(--accent-2-dim));
      border: 1px solid rgba(79,156,249,0.25);
      border-radius: var(--radius);
      text-decoration: none; color: var(--text);
      font-size: 0.9rem; font-weight: 600;
      transition: all 0.2s ease;
    }
    .contact-resume-btn:hover {
      background: linear-gradient(135deg, rgba(79,156,249,0.18), rgba(167,139,250,0.18));
      border-color: rgba(79,156,249,0.4);
      transform: translateY(-1px);
    }
    .contact-resume-btn svg {
      width: 14px;
      height: 14px;
      opacity: 0.8;
    }

    .dan-holder {
      height: 22rem;
      display: flex;
      justify-content: center;
      align-items: flex-end;
    }

    .dan-holder > img {
      height: 12rem;
      margin-bottom: 1rem;
      width: auto;
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
    @keyframes blink {
      0%, 100% { opacity: 1; } 50% { opacity: 0; }
    }
    @keyframes shimmer {
      0%   { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }
    @keyframes countUp { from { opacity: 0; } to { opacity: 1; } }

    /* ── Responsive ── */
    @media (max-width: 1100px) {
      .expertise-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
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
      .info-strip {
        grid-template-columns: repeat(3, 1fr);
      }
      .contact-grid {
        grid-template-columns: 1fr;
      }
      .stats-row {
        grid-template-columns: repeat(3, 1fr);
      }
      .dan-holder > img {
        height: 8rem;
      }
    }
    @media (max-width: 640px) {
      .hero {
        padding: 2.5rem 1.25rem;
      }
      section {
        padding: 3rem 1.25rem;
      }
      .expertise-grid {
        grid-template-columns: 1fr 1fr;
      }
      .info-strip {
        grid-template-columns: 1fr;
      }
      .stats-row {
        grid-template-columns: repeat(1, 1fr);
        gap: 0.6rem;
      }
      .stat-num {
        font-size: 1.8rem;
      }
    }
    @media (max-width: 400px) {
      .expertise-grid {
        grid-template-columns: 1fr;
      }
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
  <div class="sidebar-url">danpeltier.ca</div>

  <div class="nav-section-label"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12L12 3l9 9"></path><path d="M9 21V12h6v9"></path></svg>Homepage</div>
  <ul class="nav-list" id="nav-list" style="margin-left: 2rem;">
    <li><a href="#hero" class="nav-link active">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>Overview
    </a></li>
    <li><a href="#expertise" class="nav-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z"/></svg>Expertise/Passions
    </a></li>
    <li><a href="#contact" class="nav-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Contact
    </a></li>
  </ul>

  <ul class="nav-list">
    <li><a href="/portfolio">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>Portfolio
    </a></li>
    <li><a href="/playground">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>Dev Playground
    </a></li>
  </ul>

</aside>

<!-- Main -->
<main class="main-content">

  <!-- ── HERO ── -->
  <section id="hero" class="hero">
    <div class="dp-avatar">DP</div>

    <h1 class="hero-name"><span>Dan Peltier</span></h1>
    <p class="hero-title">Multi-Disciplinary Professional</p>

    <div class="typewriter-wrap">
      <span class="typewriter-prefix">currently_</span>
      <span id="typewriter"></span><span class="cursor"></span>
    </div>
  </section>

  <!-- ── EXPERTISE ── -->
  <section id="expertise">
    <p class="sec-label reveal">Expertise &amp; Passions</p>
    <h2 class="sec-title reveal">What I Do &amp; Love</h2>

    <!-- Stats row -->
    <div class="stats-row" style="margin-bottom:2.5rem;">
      <img src="/danpeltier-images/toon-dan-behind-something.png" />
      <div class="stat-card reveal">
        <div class="stat-num blue" data-target="25" data-suffix="+">0</div>
        <div class="stat-label">Years in Tech</div>
      </div>
      <div class="stat-card reveal" style="transition-delay:0.14s">
        <div class="stat-num green" data-target="30" data-suffix="+">0</div>
        <div class="stat-label">Programming Languages</div>
      </div>
    </div>

    <div class="expertise-grid">
      <div class="exp-card reveal">
        <span class="exp-icon">💻</span>
        <p class="exp-title">Programmer &amp; Developer</p>
        <p class="exp-desc">Full-stack development expertise with a passion for clean, efficient code and innovative solutions across multiple languages and frameworks.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.05s">
        <span class="exp-icon">🎨</span>
        <p class="exp-title">Web Designer</p>
        <p class="exp-desc">A UI/UX focus used in creating visually stunning and user-friendly web experiences that combine aesthetic appeal with functional design principles.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.1s">
        <span class="exp-icon">🏗️</span>
        <p class="exp-title">Solutions Architect</p>
        <p class="exp-desc">Designing scalable, robust technical architectures that solve complex business challenges and drive organisational success.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.05s">
        <span class="exp-icon">⚙️</span>
        <p class="exp-title">Solutions Engineer</p>
        <p class="exp-desc">Bridging the gap between technical capabilities and business needs through innovative engineering and strategic implementation.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.1s">
        <span class="exp-icon">🌟</span>
        <p class="exp-title">Mentor</p>
        <p class="exp-desc">Guiding and inspiring the next generation of technologists through personalised coaching and knowledge sharing.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.15s">
        <span class="exp-icon">📈</span>
        <p class="exp-title">SEO Specialist</p>
        <p class="exp-desc">Optimising digital presence and driving organic growth through data-driven SEO strategies and search engine expertise.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.05s">
        <span class="exp-icon">🎓</span>
        <p class="exp-title">Professor</p>
        <p class="exp-desc">Educating and inspiring students in technology and digital innovation, fostering critical thinking and practical skills.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.1s">
        <span class="exp-icon">🎭</span>
        <p class="exp-title">Artist</p>
        <p class="exp-desc">Expressing creativity through various artistic mediums, bringing a unique aesthetic perspective to every technical project.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.15s">
        <span class="exp-icon">✍️</span>
        <p class="exp-title">Writer</p>
        <p class="exp-desc">Crafting compelling content and technical documentation that communicates complex ideas with clarity and engagement.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.05s">
        <span class="exp-icon">🎲</span>
        <p class="exp-title">Game Designer</p>
        <p class="exp-desc">A deep passion for board games and tabletop RPGs - designing them serves as yet another creative outlet and system-thinking exercise.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.1s">
        <span class="exp-icon">🦋</span>
        <p class="exp-title">Social Butterfly</p>
        <p class="exp-desc">Building meaningful connections and fostering collaborative environments where ideas flourish and teams thrive.</p>
      </div>
      <div class="exp-card reveal" style="transition-delay:0.15s">
        <span class="exp-icon">⚡</span>
        <p class="exp-title">Feminist &amp; Well-Rounded Nerd</p>
        <p class="exp-desc">Advocating for equality and inclusion while embracing intellectual curiosity across diverse fields of knowledge and culture.</p>
      </div>
    </div>
  </section>

  <!-- ── CONTACT ── -->
  <section id="contact">
    <p class="sec-label reveal">Get In Touch</p>
    <h2 class="sec-title reveal">Let's Connect</h2>

    <div class="contact-grid">
      <!-- Google Maps - dark-filtered embed, Toronto -->
      <div class="map-wrap reveal">
        <iframe
          title="Toronto, ON"
          src="https://maps.google.com/maps?q=Toronto,+Ontario,+Canada&t=&z=9&ie=UTF8&iwloc=&output=embed"
          allowfullscreen
          loading="lazy">
        </iframe>
      </div>

      <div class="contact-details reveal" style="transition-delay:0.1s">
        <div class="contact-item">
          <div class="contact-icon" style="background:var(--accent-dim)">📍</div>
          <div>
            <p class="contact-item-label">Location</p>
            <p class="contact-item-val">Greater Toronto Area, Ontario, Canada</p>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon" style="background:var(--accent-2-dim)">✉️</div>
          <div>
            <p class="contact-item-label">Email</p>
            <p class="contact-item-val"><a href="mailto:dan@danpeltier.ca">dan@danpeltier.ca</a></p>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon" style="background:var(--accent-dim)">🔗</div>
          <div>
            <p class="contact-item-label">LinkedIn</p>
            <p class="contact-item-val"><a href="https://www.linkedin.com/in/dan-peltier-51492536/" target="_blank" rel="noopener">linkedin.com/in/dan-peltier</a></p>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon" style="background:var(--accent-3-dim)">📖</div>
          <div>
            <p class="contact-item-label">Blog</p>
            <p class="contact-item-val"><a href="https://danpeltier.ca/origin" rel="noopener">Read my Origin Story</a></p>
          </div>
        </div>

        <a href="#" class="contact-resume-btn" style="display: none;">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          View Full Resume
        </a>
      </div>
    </div>
    <div class="dan-holder"><img src="/danpeltier-images/toon-dan-afternoon.png" /></div>
  </section>

</main>


<script>
$(function () {

  let d = new Date();
  let h = d.getHours();
  console.log('h', h);
  let danImg = document.querySelector('.dan-holder > img');
  let newDan = danImg.getAttribute('src');
  if(h > 22 || h < 8) {
    newDan = `/danpeltier-images/toon-dan-youre-up-late.png`;
  }
  else if(h > 7 && h < 12) {
    newDan = `/danpeltier-images/toon-dan-morning.png`;
  }
  else if(h > 11 && h < 17) {
    newDan = `/danpeltier-images/toon-dan-afternoon.png`;
  }
  else {
    newDan = `/danpeltier-images/toon-dan-evening.png`;
  }
  danImg.setAttribute('src', newDan);

  // ── Scroll progress bar ──────────────────────────────────────────
  $(window).on('scroll.progress', function () {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    $('#progress-bar').css('width', (max > 0 ? (window.scrollY / max) * 100 : 0) + '%');
  });

  // ── Geolocation + Weather (jQuery AJAX) ─────────────────────────
  /*
   * Calls /home/geo which proxies:
   *   1. ipapi.co/json/    → city, country_code, lat, lon
   *   2. OpenWeatherMap    → temp_c, condition, icon_code, humidity, wind_kph
   *
   * PHP backend: point this URL to /geo-weather.php when live.
   * If temp_c is null, weather section shows "Not connected" gracefully.
   */
  function flagEmoji(code) {
    if (!code || code.length !== 2) return '';
    return code.toUpperCase().split('').map(function(c) {
      return String.fromCodePoint(c.charCodeAt(0) + 127397);
    }).join('');
  }

  function wxEmoji(icon) {
    if (!icon) return '🌡️';
    var pre = icon.substring(0, 2);
    var map = { '01':'☀️','02':'⛅','03':'☁️','04':'☁️','09':'🌧️','10':'🌦️','11':'⛈️','13':'❄️','50':'🌫️' };
    return map[pre] || '🌡️';
  }

  // ── Typewriter ───────────────────────────────────────────────────
  var roles = [
    'Programmer & Developer',
    'Web Designer',
    'Solutions Architect',
    'Solutions Engineer',
    'UX Engineer',
    'Professor',
    'SEO Specialist',
    'Mentor',
    'Game Designer',
    'Artist & Writer',
    'Social Butterfly',
  ];
  var roleIdx = 0, charIdx = 0, deleting = false;
  var $tw = $('#typewriter');

  function typeStep() {
    var word = roles[roleIdx];
    if (deleting) {
      charIdx--;
      $tw.text(word.substring(0, charIdx));
      if (charIdx === 0) {
        deleting = false;
        roleIdx = (roleIdx + 1) % roles.length;
        setTimeout(typeStep, 400);
        return;
      }
      setTimeout(typeStep, 40);
    } else {
      charIdx++;
      $tw.text(word.substring(0, charIdx));
      if (charIdx === word.length) {
        deleting = true;
        setTimeout(typeStep, 1800);
        return;
      }
      setTimeout(typeStep, 70);
    }
  }
  setTimeout(typeStep, 1200);

  // ── Scroll reveal (Intersection Observer) ────────────────────────
  var revealObs = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.06, rootMargin: '0px 0px -36px 0px' });
  document.querySelectorAll('.reveal').forEach(function (el) { revealObs.observe(el); });

  // ── Animated stat counters ───────────────────────────────────────
  var counted = false;
  var statObs = new IntersectionObserver(function (entries) {
    if (counted) return;
    if (entries.some(function(e){ return e.isIntersecting; })) {
      counted = true;
      $('.stat-num[data-target]').each(function () {
        var $el = $(this);
        var target = parseInt($el.data('target'), 10);
        var suffix = $el.data('suffix') || '';
        var start = 0, duration = 1200, step = 16;
        var inc = target / (duration / step);
        var timer = setInterval(function () {
          start += inc;
          if (start >= target) { start = target; clearInterval(timer); }
          $el.text(Math.floor(start) + suffix);
        }, step);
      });
    }
  }, { threshold: 0.5 });
  document.querySelectorAll('.stat-card').forEach(function (el) { statObs.observe(el); });

  // ── Active nav link ──────────────────────────────────────────────
  var $sections = $('section[id]');
  var $navLinks = $('.nav-link');

  function updateNav() {
    var scrollY = window.scrollY + 120;
    var current = $sections.first().attr('id');
    $sections.each(function () {
      if (scrollY >= $(this).offset().top) current = $(this).attr('id');
    });
    $navLinks.removeClass('active').filter('[href="#' + current + '"]').addClass('active');
  }
  $(window).on('scroll.nav', updateNav);
  updateNav();

  // ── Mobile sidebar ───────────────────────────────────────────────
  var $sidebar = $('#sidebar'), $overlay = $('#overlay'), $ham = $('#hamburger');

  function closeSidebar() {
    $sidebar.removeClass('open'); $ham.removeClass('open');
    $overlay.css('opacity', 0);
    setTimeout(function () { $overlay.css('display', 'none'); }, 300);
  }
  function openSidebar() {
    $sidebar.addClass('open'); $ham.addClass('open');
    $overlay.css({ display: 'block', opacity: 0 });
    requestAnimationFrame(function () { $overlay.css('opacity', 1); });
  }

  $ham.on('click', function () { $sidebar.hasClass('open') ? closeSidebar() : openSidebar(); });
  $overlay.on('click', closeSidebar);
  $navLinks.on('click', function () { if ($(window).width() <= 900) closeSidebar(); });

});
</script>
</body>
</html>
