# danpeltier.ca — Portfolio Site

A dark-themed, single-server portfolio built with **HTML + CSS + JavaScript + PHP**.

---

## Pages

| Route | Page | Description |
|---|---|---|
| `/` | **Homepage** | Intro, quick links to all sections, and a brief bio. |
| `/portfolio` | **Portfolio** | Project showcase with four sections — Dashboards, Demos, GroupBy Website, and Shopify — with a lightbox for images and an in-page video player. |
| `/playground` | **Developer's Playground** | Interactive coding tutorials with live preview. See below for full usage guide. |
| `*` (any other path) | **404** | Animated robot 404 page with cycling quips and a starfield background. |

All pages share a consistent sidebar navigation, dark design tokens, and Inter + JetBrains Mono fonts.

---

## Developer's Playground — Usage Guide

The Playground is an in-browser coding environment with interactive tutorials and a live preview pane. No installs, no setup — everything runs in the browser.

### Layout

- **Left sidebar** — page navigation (links to other portfolio sections)
- **File dock** — tutorial file browser, grouped by topic (HTML, CSS, JavaScript, jQuery)
- **Main area** — split into two tabs:
  - **Preview** — live rendered output of the selected tutorial
  - **Code** — read-only syntax-highlighted source for the tutorial

### Selecting a Tutorial

Click any file in the dock to load it. The preview updates instantly and the concept tags at the top of the page show what skills the tutorial covers.

### Running / Editing Code

1. Click **▶ Run** (or the run button in the toolbar) to open the tutorial in a full editor window.
2. The editor window lets you modify the code freely.
3. Click **▶ Run** again inside the editor to re-render your changes in the preview.
4. Close the editor window to return to the read-only view.

### Tutorial Topics

| Section | Files | Covers |
|---|---|---|
| **HTML** | 01 – 04 | Semantic markup, lists & tables, forms, media elements |
| **CSS** | 01 – 05 | Selectors, the box model, flexbox, CSS Grid, transitions & animations |
| **JavaScript** | 01 – 05 | Variables & types, functions & closures, DOM manipulation, events, Fetch API & Promises |
| **jQuery** | 01 – 04 | Selectors, DOM manipulation, events & effects, AJAX |

### Dark Mode Toggle

Use the **☀ / ☾** button in the toolbar to invert the preview pane for light-background tutorials.

### Mobile

On smaller screens the layout collapses to a bottom tab bar. Tap **Files** to browse tutorials, **Preview** to see output, and **Code** to read the source.
