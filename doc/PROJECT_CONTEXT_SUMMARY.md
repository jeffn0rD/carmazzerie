# PROJECT_CONTEXT_SUMMARY.md

## Carmazzi Real Estate Theme Distillation — Project Context

### Project Goal
**REPAIR & RESTORE.** The theme is currently broken visually and functionally.
- **Original Site:** https://www.carmazzire.com/
- **Staging Site:** https://jeffreypaulramenllc.com/

### CRITICAL DEFECTS (Must Fix Immediately)
1.  **Footer Duplication:** The footer content appears twice or is malformed. This indicates a broken HTML structure or unclosed Loop in `front-page.php`.
2.  **Missing Fonts:** The site is using fallback fonts (Times/Arial). 'Raleway' is NOT loading.
3.  **Header/Logo Ugly:** The header has a white background and borders. It should be **transparent** (overlaying the hero image) with no borders.
4.  **Wrong Colors:** The blue is incorrect. It must be `#0066cc`.
5.  **Missing Properties:** The `rentalproperty` query is failing.
6.  **Oversized Elements:** The site scale is too large (container width > 1200px).

### Theme Structure
- **Templates:** `front-page.php`, `header.php`, `footer.php`.
- **Styles:** `assets/css/main.css`.
- **Functions:** `functions.php` (Enqueues, Customizer).

### Technical Specifications
- **Fonts:** Use **Google Fonts (Raleway)**. Enqueue in `functions.php`. Do not look for local font files unless they exist (unlikely).
- **Colors:**
  - Primary Blue: `#0066cc`
  - Dark Blue/Grey: `#2c3e50`
  - Text Grey: `#666666`
- **Layout:**
  - Container Max-Width: `1170px` (Standard Bootstrap size).
  - Header: Absolute positioning or transparent background on Homepage.

### Coding Standards
- **Debug:** Check `WP_Query` arguments. Check for unclosed `</div>` tags.
- **CSS:** Remove `background-color: #fff` from the header on the front page.
