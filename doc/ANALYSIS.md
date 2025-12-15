# Theme Analysis - CarmazziRealEstate

## Current Structure Analysis

### Visual Appearance
- **Homepage**: Hero header with Sacramento skyline image, navigation menu, icon menu section, property grid (3 columns)
- **Property Grid**: Shows property images, title with price, excerpt, "Read More" link
- **Single Property**: Image slider (flexslider), property title, location, description, property details table (bedrooms, bathrooms, square footage, parking, contact, map link)
- **Header**: Logo (left), navigation menu (right) - Available Rentals, Owners, Applicants, For Sale, Contact Us
- **Footer**: Multiple columns with links (Contact Us, Vendor List, Owner/Tenant Sign In, For Sale, Reviews)

### CSS Files (Total: ~28,465 lines)
1. **pinnacle_unmin_fixed.css** (13,813 lines) - Main theme styles including normalize, grid system, components
2. **pinnacle_unmin.css** (13,813 lines) - Duplicate/backup
3. **editor-style.css** (585 lines) - WordPress editor styles
4. **color_contrast_fixes.css** (185 lines) - Accessibility fixes
5. **kt_adminstyles.css** (42 lines) - Admin panel styles
6. **icons.css** (26 lines) - Icon font styles
7. **custom.css** (3 lines) - Logo height override
8. **pinnacle.css** (1 line) - Minified version reference
9. **kad-framework.css** (0 lines) - Empty file

### PHP Template Files
**Root Level:**
- front-page.php - Homepage template
- home.php - Blog homepage
- index.php - Main template
- header.php - Header template
- footer.php - Footer template
- single-rentalproperty.php - Single property template
- page.php - Page template
- archive.php - Archive template
- 404.php - 404 error page
- search.php, searchform.php - Search functionality
- sidebar.php - Sidebar template

**Templates Directory (30+ files):**
- content-*.php - Various content templates
- entry-meta-*.php - Meta information templates
- home/* - Homepage section templates
- shop/* - WooCommerce templates
- Various carousel and slider templates

**Lib Directory:**
- init.php - Theme initialization
- config.php - Configuration
- custom.php - Custom functions
- metaboxes.php - Custom metaboxes (using CMB framework)
- scripts.php - Script/style enqueuing
- output_css.php - Dynamic CSS output
- widgets.php - Widget areas
- template-actions.php - Template hooks
- custom-woocommerce.php - WooCommerce customization
- sidebar.php - Sidebar registration
- nav.php - Navigation customization
- cleanup.php - WordPress cleanup
- comments.php - Comment customization
- authorbox.php - Author box functionality
- admin_scripts.php - Admin scripts
- plugin-activate.php - TGM Plugin Activation
- aq_resizer.php - Image resizing
- utils.php - Utility functions

### Custom Post Type: rentalproperty
- Registered by "Virtue/Pinnacle Toolkit" plugin (external dependency)
- Custom fields (using CFC - Custom Field Class):
  - is-available (yes/no)
  - location
  - bedrooms
  - bathrooms
  - square-footage
  - parking
  - contact
  - google-map-link
- Image gallery support (featured image + attachments)
- Flexslider for image display

### Admin Interface
- **Redux Framework** - Complex theme options framework with extensive settings
- **CMB (Custom Metaboxes)** - Metabox framework for custom fields
- Multiple theme option pages with drag-and-drop layouts
- Homepage layout builder
- Typography controls
- Color controls
- Slider settings
- Mobile settings
- Many other complex options

### Dependencies
1. **Required/Recommended:**
   - Virtue/Pinnacle Toolkit plugin (custom post types, shortcodes)
   
2. **Bundled Frameworks:**
   - Redux Framework (theme options)
   - CMB (Custom Metaboxes and Fields)
   - TGM Plugin Activation
   
3. **JavaScript Libraries:**
   - jQuery
   - Modernizr
   - Flexslider
   - Various other plugins

### Key Features to Preserve
1. Rental property custom post type with all fields
2. Property image galleries with slider
3. Property grid layout on homepage
4. Property details table display
5. Navigation menu structure
6. Header with logo
7. Footer with links
8. Responsive design
9. WCAG accessibility features

### Features to Remove/Simplify
1. Redux Framework - Replace with WordPress Customizer
2. CMB Framework - Use native WordPress custom fields
3. Complex homepage layout builder - Simplify to fixed layout
4. WooCommerce integration - Not needed for rental properties
5. Multiple slider options - Keep only flexslider for properties
6. Blog post features - Focus on properties only
7. Portfolio post type - Not needed
8. Complex theme options - Reduce to essentials
9. Icon menu builder - Simplify or remove
10. Multiple CSS files - Consolidate to 2-3 files