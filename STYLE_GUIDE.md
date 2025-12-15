# Original Site Style Guide - Extracted Values

## FONTS

### Primary Font Family
- **Font:** Raleway (Google Font)
- **Weights:** 400 (regular), 700 (bold)
- **Import:** `https://fonts.googleapis.com/css?family=Raleway:400,700`

### Font Usage
- **Logo:** Raleway, 400 weight, 32px, color: #444444
- **Navigation:** Raleway, 18px, bold, color: #ffffff
- **Hero Title (h1):** color: #ffffff
- **Body:** Raleway

## COLORS

### Primary Colors
- **Link Hover:** #096abf
- **Logo Text:** #444444
- **Hero Title:** #ffffff
- **Hero Subtitle:** #ffffff
- **Navigation Text:** #ffffff

### Background Colors
- **Navigation Menu Background:** rgba(96, 96, 96, 0.7)
- **Navigation Menu Hover:** rgba(48, 48, 48, 0.9)
- **Header Overlay:** rgba(0, 0, 0, 0.4)

### Border & Radius
- **Navigation Border Radius:** 8px
- **Navigation Padding:** 4px
- **Navigation Height:** 20px

## LAYOUT

### Header
- **Classes:** banner, headerclass, kad-header-style-basic
- **ID:** kad-banner
- **Style:** trans-header (transparent header)

### Hero Section
- **Main Heading:** "Welcome to Carmazzi Real Estate"
- **Classes:** kad-page-title, home-page-title
- **Subtitle:** "Residential Real Estate for the Greater Sacramento Area"

### Navigation
- **Font Size:** 18px
- **Font Weight:** bold
- **Text Color:** #ffffff
- **Background:** rgba(96, 96, 96, 0.7)
- **Hover Background:** rgba(48, 48, 48, 0.9)
- **Border Radius:** 8px
- **Padding:** 4px

## CSS FILES USED
1. pinnacle.css
2. pinnacle_unmin_fixed.css
3. color_contrast_fixes.css
4. skins/default.css
5. custom.css

## KEY OBSERVATIONS

### Icon Section
- Found 20 elements with 'icon' in class
- Circular icons with labels
- 4 icons: Owners, Applicants, For Sale, Contact Us

### Property Cards
- Found 99 potential property card elements
- Grid layout (appears to be 3 columns)
- Cards include: image, title, author, date, excerpt, "Read More" link

### Structure
- Transparent header with overlay
- Full-width hero section with background image
- Icon section below hero
- Property grid sections (Available Rentals, Rented)
- Footer with company info and links

## NEXT STEPS
1. Download and analyze the main CSS files
2. Extract exact spacing and sizing values
3. Identify icon styles and colors
4. Document property card styling
5. Extract footer styling