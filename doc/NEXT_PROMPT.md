# NEXT_PROMPT.md

I am continuing the Carmazzi Real Estate theme distillation project.

**PROJECT GOAL:** RESCUE MISSION. Fix the broken layout, missing assets, and logic errors.
**CURRENT STATUS:** The staging site has repeated footers, wrong fonts, ugly header backgrounds, and no properties.
**REPO:** `jeffn0rD/carmazzerie` (Branch: `theme-distilled`)

**YOUR MISSION FOR THIS SESSION:**
You must perform the following repairs in this order:

**Step 1: Fix Fonts & Colors (Assets)**
- **Fonts:** The user asks if fonts are in `/assets`. Check. If not, **Enqueue Google Fonts (Raleway)** in `functions.php`.
- **Colors:** Open `assets/css/main.css`. Find all instances of blue and force them to `#0066cc`.

**Step 2: Fix Header & Logo (Visuals)**
- The header currently has a white background and borders.
- **Fix:** On the homepage, the header should be transparent (overlaying the hero). Remove the white background and border from `.site-header` or `.navbar` in `main.css`.

**Step 3: Fix Footer Duplication & Property Loop (Logic)**
- **Footer:** The footer is repeating. Check `front-page.php`.
    - Look for unclosed `<div>` tags.
    - Look for multiple calls to `get_footer()`.
    - Look for a `while` loop that doesn't end correctly.
- **Properties:** The query is returning nothing.
    - Ensure `post_type => 'rentalproperty'`.
    - Add `wp_reset_postdata()` after your loops.

**Step 4: Fix Scaling (Layout)**
- Set the main container max-width to `1170px`.
- Reduce the font size of H1 and H2 elements.

**REQUIRED OUTPUT:**
1.  **Root Cause:** Why was the footer repeating? Why were fonts missing?
2.  **Code Changes:**
    - `functions.php` (Font enqueue).
    - `front-page.php` (Loop fix).
    - `assets/css/main.css` (Color/Header fix).
3.  **Commit:** "Fix critical layout bugs: fonts, footer duplication, and header styling."

**EFFICIENCY INSTRUCTION:**
Do not assume the code is correct. It is broken. Rewrite the `front-page.php` loop structure if necessary to ensure it is clean.
