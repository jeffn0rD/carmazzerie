# Carmazzi Real Estate Theme Distillation - Complete Project Context

## PROJECT GOAL
Distill the CarmazziRealEstate WordPress theme to achieve **pixel-perfect visual parity** with the original site (www.carmazzire.com) on the staging site (jeffreypaulramenllc.com), while maintaining WCAG compliance and code quality.

## REPOSITORY INFORMATION
- **GitHub Repository:** https://github.com/jeffn0rD/carmazzerie
- **Working Branch:** `theme-distilled`
- **Original Theme Branch:** `accessibility-update`
- **Staging Site:** https://jeffreypaulramenllc.com/
- **Original Site:** https://www.carmazzire.com/

## PROJECT STATUS: ITERATION 2 COMPLETE

### What's Been Completed

#### Iteration 1 (Previous)
- Repository restructured - theme files moved to root (removed distilled-theme subdirectory)
- Removed /lib and /templates directories (belonged to original theme)
- Added top bar to header
- Added icon menu section to front page (4 icons: Owners, Applicants, For Sale, Contact Us)
- Fixed property queries (available vs rented properties)
- Simplified property card template
- Added footer images and disclaimer
- Cleaned up unnecessary files

#### Iteration 2 (Just Completed - PUSHED TO GITHUB)
- **CTA Section Implementation:** Added WordPress Customizer integration for Call to Action section
- **functions.php:** Added `carmazzi_cta` customizer section with `carmazzi_cta_text` setting
- **Documentation:** Created ITERATION_2_SUMMARY.md, DEPLOYMENT_INSTRUCTIONS.md, READY_FOR_DEPLOYMENT.md
- **Cleanup:** Removed functions-backup.php
- **Commits Pushed:** 3 commits (1f5e47f, 3a6490d, 71007dd)

### Current Front Page Structure (Complete)
1. ✅ Hero Section - Background image with title/subtitle
2. ✅ Icon Menu Section - 4 navigation icons
3. ✅ Available Rentals Section - Up to 3 available properties
4. ✅ Rented Section - Up to 9 rented properties
5. ✅ CTA Section - Mission statement with Contact Us button
6. ✅ Footer - Logos and disclaimer

## FILE STRUCTURE & KEY FILES

### Theme Root Files
```
carmazzerie/
├── style.css                          # Theme metadata (required by WordPress)
├── functions.php                      # Core functionality + customizer settings
├── front-page.php                     # Homepage template (all sections)
├── header.php                         # Site header with top bar
├── footer.php                         # Site footer with logos
├── index.php                          # Default template
├── page.php                           # Single page template
├── single.php                         # Single post template
├── archive.php                        # Archive template
├── archive-rentalproperty.php         # Rental property archive
├── single-rentalproperty.php          # Single rental property
├── home.php                           # Blog home template
├── search.php                         # Search results template
├── searchform.php                     # Search form
├── sidebar.php                        # Sidebar template
├── 404.php                            # 404 error page
├── screenshot.png                     # Theme screenshot
├── READY_FOR_DEPLOYMENT.md            # Quick deployment guide
└── PROJECT_CONTEXT_SUMMARY.md         # This file
```

### Assets Directory
```
assets/
├── css/
│   └── main.css                       # All theme styles (consolidated)
├── images/
│   ├── equalhousing.png               # Footer logo
│   ├── mls.png                        # Footer logo
│   ├── realtor.png                    # Footer logo
│   └── narpm2.png                     # Footer logo
└── js/
    └── (minimal JavaScript)
```

### Template Parts
```
template-parts/
└── content-property-card.php          # Reusable property card template
```

### Documentation Directory
```
doc/
├── README.md                          # Theme overview
├── ITERATION_1_SUMMARY.md             # First iteration changes
├── ITERATION_2_SUMMARY.md             # Second iteration changes
├── DEPLOYMENT_INSTRUCTIONS.md         # Detailed deployment guide
├── INSTALLATION.md                    # Installation instructions
├── MANUAL.md                          # User manual
├── STYLE_GUIDE.md                     # Extracted styles from original
├── ANALYSIS.md                        # Initial analysis
├── CHANGES_SUMMARY.md                 # All changes summary
├── PRE_DEPLOYMENT_SUMMARY.md          # Pre-deployment checklist
├── DEPLOYMENT_GUIDE.md                # Deployment guide
├── todo.md                            # Task tracking
└── readme.txt                         # WordPress readme
```

## KEY FUNCTIONALITY

### Custom Post Type
- **Post Type:** `rentalproperty`
- **Property Classification:** Based on title containing "RENTED" (case-insensitive)
- **Available Properties:** Displayed first (up to 3)
- **Rented Properties:** Displayed second (up to 9)

### WordPress Customizer Sections
1. **Hero Section** (`carmazzi_hero`)
   - `carmazzi_hero_title` - Hero title text
   - `carmazzi_hero_subtitle` - Hero subtitle text
   - Header Image - Background image

2. **CTA Section** (`carmazzi_cta`)
   - `carmazzi_cta_text` - Mission statement text (long textarea)

### Theme Features
- Custom header support
- Custom logo support
- Post thumbnails
- HTML5 markup
- Title tag support
- Responsive design
- WCAG 2.1 AA compliant

## STYLING REFERENCE

### Colors (from STYLE_GUIDE.md)
- **Primary Blue:** #0066cc
- **Link Hover:** #096abf
- **Dark Background:** #2c3e50
- **Light Text:** #bdc3c7
- **White:** #fff

### Typography
- **Primary Font:** Raleway (from Google Fonts)
- **Fallback:** Arial, sans-serif

### Key CSS Classes
- `.hero-section` - Hero background section
- `.icon-menu-section` - Icon navigation grid
- `.properties-section` - Property listings container
- `.property-grid` - Property card grid
- `.cta-section` - Call to action section
- `.site-footer` - Footer section

## WHAT NEEDS TO HAPPEN NEXT

### Immediate Actions (User)
1. ✅ **DONE:** Changes pushed to GitHub (branch: theme-distilled)
2. **Deploy to Staging:** Upload theme to jeffreypaulramenllc.com
3. **Activate Theme:** In WordPress admin
4. **Configure Settings:** Set header image, hero text, CTA text
5. **Visual Comparison:** Compare with www.carmazzire.com

### Iteration 3 (If Needed - Based on User Feedback)
- Fine-tune spacing/padding to match original exactly
- Adjust typography (font sizes, line heights, weights)
- Match colors precisely
- Optimize responsive breakpoints
- Fix any visual discrepancies identified
- Address any functional issues

## DEPLOYMENT OPTIONS

### Option 1: FTP/SFTP Upload
```bash
# Download from GitHub
git clone https://github.com/jeffn0rD/carmazzerie.git
cd carmazzerie
git checkout theme-distilled

# Upload entire directory to:
# /wp-content/themes/carmazzi-distilled/
```

### Option 2: Git Pull on Server
```bash
ssh user@jeffreypaulramenllc.com
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/jeffn0rD/carmazzerie.git carmazzi-distilled
cd carmazzi-distilled
git checkout theme-distilled
```

### Option 3: WordPress Admin Upload
```bash
# Create ZIP (excluding git files)
cd carmazzerie
zip -r carmazzi-distilled.zip . -x "*.git*" -x "*node_modules*" -x "*.DS_Store"

# Upload via: Appearance → Themes → Add New → Upload Theme
```

## IMPORTANT NOTES

### Property Display Logic
- Properties are fetched using WP_Query for post type `rentalproperty`
- Properties with "RENTED" in title (case-insensitive) go to Rented section
- All other properties go to Available Rentals section
- Available: Limited to 3 properties
- Rented: Limited to 9 properties

### Icon Menu Links
- Owners: `/owners/`
- Applicants: `/applicants/`
- For Sale: `/for-sale/`
- Contact Us: `/contact/`

### Footer Images
All footer logos are in `assets/images/`:
- equalhousing.png
- mls.png
- realtor.png
- narpm2.png

### CTA Section
- Default text is the company mission statement (long paragraph)
- Button links to `/contact/`
- Background overlay for text readability
- Fully customizable via WordPress Customizer

## TESTING CHECKLIST

After deployment, verify:
- [ ] Hero section displays with background image
- [ ] Icon menu shows 4 icons with correct links
- [ ] Available Rentals section displays (or "No Available Rentals" message)
- [ ] Rented section displays rented properties
- [ ] CTA section appears with mission statement and button
- [ ] Footer displays with all 4 logos and disclaimer
- [ ] All links work correctly
- [ ] Responsive design works on mobile/tablet/desktop
- [ ] WordPress Customizer settings work

## VISUAL COMPARISON AREAS

Compare these specific elements with original site:

1. **Hero Section**
   - Background image positioning and size
   - Title font size, weight, color
   - Subtitle font size, weight, color
   - Overlay darkness
   - Vertical spacing

2. **Icon Menu**
   - Icon sizes and colors
   - Circle sizes and spacing
   - Grid layout and gaps
   - Hover effects
   - Title font sizes

3. **Property Cards**
   - Image aspect ratios
   - Card padding and margins
   - Title and text styling
   - Grid layout and gaps
   - Hover effects

4. **CTA Section**
   - Background image/color
   - Overlay darkness
   - Text font size and line height
   - Button size, color, and hover effect
   - Section padding

5. **Footer**
   - Logo sizes and spacing
   - Background color
   - Text color and size
   - Disclaimer text styling
   - Overall layout

## COMMIT HISTORY (Latest 3)

1. **71007dd** - "Add comprehensive deployment documentation"
   - Added READY_FOR_DEPLOYMENT.md
   - Added doc/DEPLOYMENT_INSTRUCTIONS.md
   - Updated doc/todo.md

2. **3a6490d** - "Update todo.md: Mark commit task complete"
   - Updated task tracking

3. **1f5e47f** - "Iteration 2: Complete CTA section implementation"
   - Added CTA customizer section in functions.php
   - Updated documentation
   - Removed functions-backup.php

## NEXT PROMPT TEMPLATE

For the next session, use this context:

```
I'm continuing work on the Carmazzi Real Estate theme distillation project.

PROJECT GOAL: Achieve pixel-perfect visual parity between staging site (jeffreypaulramenllc.com) and original site (www.carmazzire.com).

CURRENT STATUS:
- Repository: github.com/jeffn0rD/carmazzerie
- Branch: theme-distilled
- Iteration 2 complete and pushed
- Theme deployed to staging (or: ready to deploy)

WHAT I NEED:
[Describe specific visual differences or issues found during comparison]
[Or: "Ready to deploy - need deployment assistance"]
[Or: "Deployed - here are the visual differences I found: ..."]

Please review the PROJECT_CONTEXT_SUMMARY.md in the repo for full context.
```

## EFFICIENCY EXPECTATIONS

For future iterations:
1. **Always commit and push** changes at the end of each session
2. **Accomplish significant work** each iteration (multiple tasks)
3. **Be proactive** - don't wait for explicit instructions to push
4. **Deliver results** - focus on completing tasks, not just documenting
5. **Save time and money** - maximize work done per prompt

## REFERENCE URLS

- **Original Site:** https://www.carmazzire.com/
- **Staging Site:** https://jeffreypaulramenllc.com/
- **GitHub Repo:** https://github.com/jeffn0rD/carmazzerie
- **Branch:** theme-distilled

---

**Last Updated:** December 15, 2024
**Version:** 1.0.1 (Iteration 2 Complete)
**Status:** ✅ Pushed to GitHub - Ready for Staging Deployment