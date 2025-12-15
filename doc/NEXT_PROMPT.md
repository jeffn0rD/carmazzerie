# NEXT_PROMPT.md

I am continuing the Carmazzi Real Estate theme distillation project.

**PROJECT GOAL:** Achieve pixel-perfect visual parity between Staging (jeffreypaulramenllc.com) and Original (carmazzire.com).

**CURRENT STATUS:**
- Repo: `jeffn0rD/carmazzerie` (Branch: `theme-distilled`)
- Iteration 2 is complete (CTA added).
- Full context is in `PROJECT_CONTEXT_SUMMARY.md`.

**YOUR MISSION FOR THIS SESSION:**
I have deployed the latest theme changes to staging. I need you to perform a comprehensive visual audit and fix **multiple sections** in this single iteration.

**Step 1: Visual Audit & Comparison**
Compare Staging vs Original. Look specifically for:
- **Hero:** Overlay darkness, font weights, vertical spacing.
- **Icon Menu:** Exact icon sizes, color matches, hover states.
- **Properties:** Grid gaps, card padding, image aspect ratios.
- **CTA:** Text readability (overlay), button size.
- **Footer:** Logo alignment and spacing.

**Step 2: Execution (Code Changes)**
- Modify `assets/css/main.css` and PHP templates to fix *all* identified discrepancies.
- Ensure WCAG 2.1 AA compliance (contrast, focus states, aria-labels).
- Adhere to WordPress Coding Standards (escaping/sanitization).

**Step 3: Commit & Push**
- Commit changes logically (e.g., "Fix Hero styling", "Adjust Icon Menu spacing").
- Push to `theme-distilled`.

**REQUIRED OUTPUT:**
1.  **List of Discrepancies Found:** Grouped by section.
2.  **Code Changes:** Diff snippets for CSS/PHP.
3.  **Commit Log:** The specific commits you pushed.
4.  **Accessibility Notes:** Improvements made.

**EFFICIENCY INSTRUCTION:**
Maximize the work done in this prompt. If you see a visual difference, fix it now. Do not wait for feedback to fix obvious visual mismatches (spacing, colors, sizes).
