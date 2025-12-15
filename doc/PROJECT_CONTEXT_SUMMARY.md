# PROJECT_CONTEXT_SUMMARY.md

## Carmazzi Real Estate Theme Distillation — Project Context

### Project Goal
Achieve **pixel-perfect visual parity** and WCAG 2.1 AA compliance between:
- **Original Site:** https://www.carmazzire.com/
- **Staging Site:** https://jeffreypaulramenllc.com/

### Repository Information
- **GitHub:** https://github.com/jeffn0rD/carmazzerie
- **Branch:** `theme-distilled`
- **Status:** Iteration 2 Complete (CTA Section & Customizer added).
- **Deployment:** User handles deployment. AI focuses on code, commits, and parity.

### Theme Structure (Root)
- **Templates:** `front-page.php`, `header.php`, `footer.php`, `index.php`, `page.php`, `single.php`, `archive.php`, `archive-rentalproperty.php`, `single-rentalproperty.php`, `home.php`, `search.php`, `sidebar.php`, `404.php`
- **Parts:** `template-parts/content-property-card.php`
- **Styles:** `assets/css/main.css` (Consolidated styles)
- **Images:** `assets/images/` (Footer logos: `equalhousing.png`, `mls.png`, `realtor.png`, `narpm2.png`)
- **Core:** `functions.php`

### Functional Specifications
1.  **CPT (`rentalproperty`) Logic:**
    *   **Rented:** Title contains "RENTED" (case-insensitive). Limit: 9.
    *   **Available:** All other properties. Limit: 3.
2.  **Icon Menu Links:**
    *   Owners -> `/owners/`
    *   Applicants -> `/applicants/`
    *   For Sale -> `/for-sale/`
    *   Contact Us -> `/contact/`
3.  **Customizer Settings:**
    *   **Hero:** `carmazzi_hero_title`, `carmazzi_hero_subtitle`, Header Image (core).
    *   **CTA:** `carmazzi_cta_text` (textarea).

### Visual Reference & Styling
- **Colors:** Primary `#0066cc`, Hover `#096abf`, Dark `#2c3e50`, Light `#bdc3c7`, White `#fff`.
- **Typography:** Raleway (Google Fonts), Arial fallback.
- **Key Classes:** `.hero-section`, `.icon-menu-section`, `.properties-section`, `.property-grid`, `.cta-section`, `.site-footer`.

### Visual Comparison Checklist (Priority Areas)
*Compare Staging vs Original specifically on:*
1.  **Hero Section:** Background positioning, title/subtitle font weights (boldness), overlay opacity/darkness, vertical spacing.
2.  **Icon Menu:** Exact icon sizes, circle dimensions, grid gaps, hover color effects.
3.  **Property Cards:** Image aspect ratios, card padding, title styling, grid layout gaps (responsive).
4.  **CTA Section:** Background overlay darkness (readability), text line-height, button padding/hover.
5.  **Footer:** Logo sizing and spacing, disclaimer text styling, background color.

### Coding Standards & Efficiency
- **PHP:** Use `esc_html`, `esc_url`, `esc_attr`. Sanitize all inputs.
- **CSS:** Keep in `assets/css/main.css`. No inline styles.
- **Accessibility:** Logical headings (H1->H2), visible focus states, `aria-label` on icon links.
- **Workflow:**
    *   **Always commit and push** changes at the end of the session.
    *   **Accomplish significant work** (fix multiple sections per iteration).
    *   **Do not wait** for feedback on obvious visual mismatches—fix them.

### Do Not
- Do not change CPT logic or queries.
- Do not add plugins or dependencies.
- Do not use page builders.
