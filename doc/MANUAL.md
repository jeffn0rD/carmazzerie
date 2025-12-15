# Carmazzi Real Estate Distilled Theme - Technical Manual

## Table of Contents
1. [Theme Architecture](#theme-architecture)
2. [File Structure](#file-structure)
3. [Custom Post Type](#custom-post-type)
4. [Template Hierarchy](#template-hierarchy)
5. [CSS Organization](#css-organization)
6. [JavaScript Functions](#javascript-functions)
7. [Customization Guide](#customization-guide)
8. [Code Reference](#code-reference)

---

## Theme Architecture

### Design Philosophy
The distilled theme follows these principles:
- **Minimalism**: Only essential features, no bloat
- **Accessibility**: WCAG 2.1 AA compliant
- **Performance**: Optimized assets, minimal dependencies
- **Maintainability**: Clean, well-documented code
- **Semantic HTML**: Proper HTML5 structure

### Core Components
1. **Custom Post Type**: `rentalproperty` for property listings
2. **Template System**: WordPress template hierarchy
3. **Styling**: 3 CSS files (main, responsive, accessibility)
4. **JavaScript**: jQuery + FlexSlider + custom functions
5. **Customizer**: WordPress Customizer for settings

---

## File Structure

### Root Level Files

#### `style.css`
Theme header file containing theme metadata. Actual styles are in `assets/css/`.

#### `functions.php`
Core theme functionality:
- Theme setup and support
- Custom post type registration
- Meta boxes for property details
- Script/style enqueuing
- Widget areas
- Customizer settings
- Helper functions

**Key Functions:**
```php
carmazzi_distilled_setup()           // Theme setup
carmazzi_distilled_scripts()         // Enqueue assets
carmazzi_register_rental_property_cpt() // Register CPT
carmazzi_add_property_meta_boxes()   // Add meta boxes
carmazzi_save_property_details()     // Save meta data
carmazzi_modify_property_title()     // Add "RENTED!" prefix
carmazzi_widgets_init()              // Register widgets
carmazzi_customize_register()        // Customizer settings
carmazzi_get_property_meta()         // Helper to get meta
```

#### `header.php`
Site header template:
- DOCTYPE and HTML head
- Skip link for accessibility
- Site branding (logo or title)
- Primary navigation menu
- Fallback menu if none set

**Important Elements:**
- Skip link: `<a class="skip-link">` for keyboard navigation
- Semantic `<header>` with `role="banner"`
- Navigation with `role="navigation"` and `aria-label`

#### `footer.php`
Site footer template:
- Four widget areas
- Footer bottom with copyright
- Closes HTML tags

**Widget Areas:**
- `footer-1` through `footer-4`
- Flexible grid layout

#### `index.php`
Main fallback template:
- Used when no specific template matches
- Displays posts in a loop
- Includes pagination
- Calls template parts

#### `front-page.php`
Homepage template:
- Hero section with header image
- Property grid (3 columns)
- Queries rental properties
- Pagination support

**Query Parameters:**
```php
'post_type'      => 'rentalproperty'
'posts_per_page' => 12
'orderby'        => 'date'
'order'          => 'DESC'
```

#### `page.php`
Standard page template:
- Single column layout
- Featured image support
- Page content
- Page links for multi-page content

#### `single-rentalproperty.php`
Single property display:
- Image slider (FlexSlider)
- Property title and location
- Property description
- Property details table
- All custom fields displayed

**Image Gallery Logic:**
1. Featured image (if set)
2. All attached images
3. Proper alt text for accessibility

#### `archive-rentalproperty.php`
Property archive/listing page:
- Hero section
- Property grid
- Pagination
- Uses `content-property-card.php` template part

#### `404.php`
Error page:
- User-friendly error message
- Search form
- Link to property listings

### Template Parts Directory

#### `template-parts/content-property-card.php`
Property card for grid display:
- Thumbnail image
- Property title
- Location, bedrooms, bathrooms
- Excerpt
- "Read More" link

**Used By:**
- `front-page.php`
- `archive-rentalproperty.php`

#### `template-parts/content.php`
Default post content template:
- Post title
- Featured image (if singular)
- Post content or excerpt
- "Read More" link (if archive)

#### `template-parts/content-none.php`
No results message:
- Displayed when no posts found
- Search form
- Helpful messages based on context

### Assets Directory

#### `assets/css/main.css`
Core stylesheet (~1000 lines):

**Sections:**
1. CSS Reset & Normalize
2. Typography
3. Layout (Container & Grid)
4. Header
5. Hero Section
6. Property Grid
7. Single Property Page
8. Footer
9. Utility Classes
10. Responsive Design
11. Print Styles

**Grid System:**
- Flexbox-based
- 12-column grid
- Responsive breakpoints

**Key Classes:**
- `.container` - Max-width wrapper
- `.row` - Flex container
- `.col-*` - Column widths
- `.property-grid` - CSS Grid for properties
- `.property-card` - Individual property card
- `.flexslider` - Image slider

#### `assets/css/responsive.css`
Mobile and responsive styles (~400 lines):

**Breakpoints:**
- 1024px - Tablet landscape
- 768px - Tablet portrait
- 480px - Mobile
- 360px - Small mobile

**Key Adjustments:**
- Stacked navigation on mobile
- Single column property grid
- Adjusted typography
- Touch-friendly sizes
- Landscape orientation handling

#### `assets/css/accessibility.css`
WCAG 2.1 AA compliance (~500 lines):

**Features:**
- Enhanced focus indicators
- Skip links
- Screen reader text
- Color contrast fixes
- Touch target sizes (44x44px)
- Form accessibility
- High contrast mode support
- Reduced motion support
- Print accessibility

**Key Classes:**
- `.skip-link` - Skip to content
- `.sr-only` - Screen reader only
- `.screen-reader-text` - Hidden text

#### `assets/css/flexslider.css`
FlexSlider styling:
- Slider container
- Navigation arrows
- Control dots
- Responsive adjustments

#### `assets/js/main.js`
Theme JavaScript:

**Functions:**
1. `initPropertySlider()` - Initialize FlexSlider
2. `initMobileNav()` - Mobile menu toggle
3. `initSmoothScroll()` - Smooth anchor scrolling
4. `initImageLoading()` - Image load handling
5. `initAccessibility()` - Focus management

**Dependencies:**
- jQuery (WordPress core)
- FlexSlider library

---

## Custom Post Type

### Registration
Registered in `functions.php` via `carmazzi_register_rental_property_cpt()`.

**Post Type:** `rentalproperty`
**Archive Slug:** `available-rentals`
**Single Slug:** `rentalproperty`

### Custom Fields

All fields stored as post meta with `_property_` prefix:

| Field Name | Meta Key | Type | Description |
|------------|----------|------|-------------|
| Availability | `_property_is_available` | select | yes/no |
| Location | `_property_location` | text | Property location |
| Bedrooms | `_property_bedrooms` | number | Number of bedrooms |
| Bathrooms | `_property_bathrooms` | number | Number of bathrooms |
| Square Footage | `_property_square_footage` | number | Property size |
| Parking | `_property_parking` | text | Parking info |
| Contact | `_property_contact` | text | Contact info |
| Google Map | `_property_google_map` | url | Map link |

### Meta Box
Custom meta box added via `carmazzi_add_property_meta_boxes()`:
- ID: `property_details`
- Title: "Property Details"
- Context: `normal`
- Priority: `high`

### Saving Data
Data saved via `carmazzi_save_property_details()`:
- Nonce verification
- Capability check
- Sanitization
- Update post meta

### Helper Function
```php
carmazzi_get_property_meta($post_id, $key)
```
Retrieves property meta without `_property_` prefix.

**Example:**
```php
$bedrooms = carmazzi_get_property_meta(get_the_ID(), 'bedrooms');
```

### Title Modification
Properties marked as unavailable get "RENTED!" prefix via `carmazzi_modify_property_title()`.

---

## Template Hierarchy

### Homepage
1. `front-page.php` ✓
2. `home.php`
3. `index.php`

### Property Archive
1. `archive-rentalproperty.php` ✓
2. `archive.php`
3. `index.php`

### Single Property
1. `single-rentalproperty.php` ✓
2. `single.php`
3. `singular.php`
4. `index.php`

### Pages
1. `page-{slug}.php`
2. `page-{id}.php`
3. `page.php` ✓
4. `singular.php`
5. `index.php`

### 404 Error
1. `404.php` ✓

---

## CSS Organization

### Naming Convention
BEM-inspired with semantic names:
- `.site-header` - Site-wide header
- `.property-card` - Property card component
- `.property-card__title` - Card title element
- `.property-card--featured` - Card modifier

### Color Palette
```css
/* Primary Colors */
--primary: #0066cc;
--primary-dark: #004499;

/* Neutrals */
--text: #333;
--text-light: #555;
--text-lighter: #666;
--border: #e0e0e0;
--background: #fff;
--background-alt: #f9f9f9;

/* Footer */
--footer-bg: #2c3e50;
--footer-text: #ecf0f1;

/* Semantic */
--error: #d32f2f;
--success: #4caf50;
```

### Breakpoints
```css
/* Tablet Landscape */
@media (max-width: 1024px) { }

/* Tablet Portrait */
@media (max-width: 768px) { }

/* Mobile */
@media (max-width: 480px) { }

/* Small Mobile */
@media (max-width: 360px) { }
```

### Grid System
12-column flexbox grid:
```html
<div class="container">
  <div class="row">
    <div class="col-4">1/3 width</div>
    <div class="col-8">2/3 width</div>
  </div>
</div>
```

---

## JavaScript Functions

### FlexSlider Initialization
```javascript
$('.flexslider').flexslider({
    animation: 'fade',
    slideshow: true,
    slideshowSpeed: 7000,
    animationSpeed: 400,
    controlNav: true,
    directionNav: true,
    pauseOnHover: true,
    keyboard: true,
    touch: true
});
```

### Mobile Navigation
Automatically adds toggle button on mobile:
```javascript
<button class="mobile-menu-toggle" 
        aria-label="Toggle navigation menu" 
        aria-expanded="false">
```

### Accessibility Features
- Skip link focus management
- Focus class on parent elements
- Keyboard navigation support

---

## Customization Guide

### Adding Custom Styles
**Option 1:** Customizer
1. Go to Appearance > Customize
2. Additional CSS
3. Add your CSS

**Option 2:** Child Theme
Create a child theme and override styles.

### Modifying Templates
1. Copy template to child theme
2. Modify as needed
3. Maintain WordPress template hierarchy

### Adding Custom Fields
1. Add field to meta box callback in `functions.php`
2. Add save logic in `carmazzi_save_property_details()`
3. Display in `single-rentalproperty.php`

### Changing Property Grid Columns
In `assets/css/main.css`:
```css
.property-grid {
    grid-template-columns: repeat(3, 1fr); /* Change 3 to desired number */
}
```

### Customizing Hero Section
1. Go to Appearance > Customize
2. Header Image - Upload background
3. Hero Section - Edit title/subtitle

### Adding Menu Locations
In `functions.php`:
```php
register_nav_menus(array(
    'new-menu' => __('New Menu', 'carmazzi-distilled'),
));
```

In template:
```php
wp_nav_menu(array(
    'theme_location' => 'new-menu',
));
```

---

## Code Reference

### Common Hooks

#### Actions
```php
// After theme setup
add_action('after_setup_theme', 'function_name');

// Enqueue scripts
add_action('wp_enqueue_scripts', 'function_name');

// Register post type
add_action('init', 'function_name');

// Add meta boxes
add_action('add_meta_boxes', 'function_name');

// Save post
add_action('save_post_rentalproperty', 'function_name');

// Widgets init
add_action('widgets_init', 'function_name');

// Customizer
add_action('customize_register', 'function_name');
```

#### Filters
```php
// Modify title
add_filter('the_title', 'function_name', 10, 2);

// Disable Gutenberg
add_filter('use_block_editor_for_post_type', 'function_name', 10, 2);
```

### Template Tags

#### Property Meta
```php
// Get property meta
$value = carmazzi_get_property_meta(get_the_ID(), 'bedrooms');

// Check if available
$available = carmazzi_get_property_meta(get_the_ID(), 'is_available');
if ($available === 'yes') {
    // Property is available
}
```

#### Theme Mods
```php
// Get customizer setting
$phone = get_theme_mod('carmazzi_phone', '(916) 736-1417');
$hero_title = get_theme_mod('carmazzi_hero_title', 'Default Title');
```

#### Images
```php
// Featured image
if (has_post_thumbnail()) {
    the_post_thumbnail('property-thumbnail');
}

// Custom size
the_post_thumbnail('property-large', array(
    'alt' => get_the_title(),
    'class' => 'custom-class'
));
```

### Debugging

#### Enable Debug Mode
In `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

#### Check Template Being Used
```php
global $template;
echo basename($template);
```

#### Inspect Query
```php
global $wp_query;
var_dump($wp_query);
```

---

## Best Practices

### Performance
1. Use `wp_enqueue_script()` and `wp_enqueue_style()`
2. Minimize HTTP requests
3. Optimize images
4. Use caching plugins
5. Minify CSS/JS in production

### Security
1. Sanitize all input: `sanitize_text_field()`, `sanitize_email()`, etc.
2. Escape all output: `esc_html()`, `esc_url()`, `esc_attr()`
3. Use nonces for forms
4. Check capabilities: `current_user_can()`
5. Validate data types

### Accessibility
1. Use semantic HTML5 elements
2. Provide alt text for images
3. Use proper heading hierarchy
4. Ensure keyboard navigation
5. Maintain color contrast
6. Add ARIA labels where needed

### Coding Standards
Follow WordPress Coding Standards:
- Indentation: Tabs
- Line length: 80-120 characters
- Naming: `snake_case` for functions, `kebab-case` for CSS
- Comments: PHPDoc format

---

## Troubleshooting

### Properties Not Showing
1. Check if custom post type is registered
2. Flush permalinks: Settings > Permalinks > Save
3. Verify query in template

### Styles Not Loading
1. Check file paths in `functions.php`
2. Clear browser cache
3. Check for CSS errors in browser console

### Images Not Displaying
1. Regenerate thumbnails
2. Check image sizes in `functions.php`
3. Verify file permissions

### FlexSlider Not Working
1. Ensure jQuery is loaded
2. Check for JavaScript errors
3. Verify FlexSlider library is included

---

## Support & Resources

### WordPress Resources
- [Template Hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Coding Standards](https://developer.wordpress.org/coding-standards/)

### Accessibility
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- [WebAIM](https://webaim.org/)

### Testing Tools
- [WAVE Accessibility Tool](https://wave.webaim.org/)
- [Lighthouse](https://developers.google.com/web/tools/lighthouse)
- [GTmetrix](https://gtmetrix.com/)

---

## Changelog

### Version 1.0.0 (Initial Release)
- Distilled from original Pinnacle theme
- Removed Redux Framework
- Removed CMB Framework
- Consolidated CSS files (3 files)
- Simplified admin interface
- Improved accessibility (WCAG 2.1 AA)
- Optimized performance
- Clean, maintainable code