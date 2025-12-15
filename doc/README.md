# Carmazzi Real Estate Distilled Theme

A minimalist WordPress theme for rental property listings, distilled from the original Pinnacle-based CarmazziRealEstate theme.

## Current Status

**Version:** 1.0.1 (Iteration 2 Complete)  
**Branch:** `theme-distilled`  
**Status:** ✅ Ready for Staging Deployment

### Latest Updates (Iteration 2)
- ✅ CTA (Call to Action) section fully implemented
- ✅ WordPress Customizer integration for CTA content
- ✅ All front page sections complete and in correct order
- ✅ Theme structure optimized and cleaned
- ✅ Documentation updated

See [ITERATION_2_SUMMARY.md](ITERATION_2_SUMMARY.md) for detailed changes.

## Features

- **Custom Post Type**: Rental Property with all essential fields
- **Clean Design**: Minimalist, modern interface
- **WCAG 2.1 AA Compliant**: Full accessibility support
- **Responsive**: Mobile-first design
- **Simple Admin**: WordPress Customizer-based settings
- **No Dependencies**: Removed Redux Framework, CMB, and other heavy frameworks
- **Performance Optimized**: Consolidated CSS (3 files), minimal JavaScript

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme through WordPress admin
3. **Important**: Download and install FlexSlider JS library:
   - Download from: https://github.com/woocommerce/FlexSlider
   - Copy `jquery.flexslider-min.js` to `assets/js/`
4. Configure theme settings in Appearance > Customize

## Theme Structure

```
distilled-theme/
├── assets/
│   ├── css/
│   │   ├── main.css           # Main styles
│   │   ├── responsive.css     # Mobile/responsive styles
│   │   ├── accessibility.css  # WCAG compliance styles
│   │   └── flexslider.css     # Image slider styles
│   ├── js/
│   │   ├── main.js            # Theme JavaScript
│   │   └── jquery.flexslider-min.js  # (needs to be added)
│   └── images/                # Theme images
├── inc/                       # (Reserved for future includes)
├── template-parts/
│   ├── content.php            # Default post content
│   ├── content-property-card.php  # Property grid card
│   └── content-none.php       # No results message
├── functions.php              # Theme functions
├── header.php                 # Header template
├── footer.php                 # Footer template
├── index.php                  # Main template
├── front-page.php             # Homepage with property grid
├── page.php                   # Page template
├── single-rentalproperty.php  # Single property template
├── archive-rentalproperty.php # Property archive
├── 404.php                    # Error page
├── style.css                  # Theme stylesheet (header only)
└── README.md                  # This file
```

## Custom Post Type: Rental Property

### Fields
- **Location**: Property location (e.g., "Natomas, Sacramento")
- **Bedrooms**: Number of bedrooms
- **Bathrooms**: Number of bathrooms
- **Square Footage**: Property size
- **Parking**: Parking information (e.g., "2 Car Garage")
- **Contact**: Contact information
- **Google Map Link**: Link to Google Maps
- **Availability Status**: Available or Rented

### Image Gallery
- Featured image + unlimited gallery images
- FlexSlider for image display
- Automatic alt text generation for accessibility

## Customizer Settings

Access via Appearance > Customize:

### Site Identity
- Site Title
- Tagline
- Logo (max height: 104px)

### Header Image
- Hero section background
- Recommended size: 1920x400px

### Contact Information
- Phone Number
- Email Address

### Hero Section
- Hero Title
- Hero Subtitle

## Menus

Two menu locations:
1. **Primary Menu**: Main navigation in header
2. **Footer Menu**: Footer navigation

## Widget Areas

Four footer widget areas:
- Footer Column 1
- Footer Column 2
- Footer Column 3
- Footer Column 4

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Accessibility

- WCAG 2.1 AA compliant
- Keyboard navigation support
- Screen reader optimized
- Skip links
- Proper heading hierarchy
- Sufficient color contrast
- Touch target sizes (44x44px minimum)

## Performance

- Consolidated CSS (3 files, ~2000 lines total)
- Minimal JavaScript
- Optimized images
- No external dependencies (except FlexSlider)

## Development

### CSS Organization
1. `main.css` - Core styles, layout, components
2. `responsive.css` - Mobile and responsive styles
3. `accessibility.css` - WCAG compliance styles

### Adding Custom Styles
Add custom CSS via Appearance > Customize > Additional CSS

### Modifying Templates
All templates follow WordPress template hierarchy.

## Migration from Original Theme

### What Was Removed
- Redux Framework (replaced with Customizer)
- CMB Framework (replaced with native meta boxes)
- WooCommerce integration
- Portfolio post type
- Complex homepage builder
- Multiple slider options
- Blog-focused features
- Icon menu builder
- 25+ unnecessary CSS files

### What Was Preserved
- Rental property custom post type
- All property fields
- Image galleries
- Property grid layout
- Visual appearance
- Navigation structure
- Footer structure

## Support

For issues or questions, contact the theme developer.

## Changelog

### Version 1.0.0
- Initial distilled release
- Removed Redux Framework
- Removed CMB Framework
- Consolidated CSS files
- Simplified admin interface
- Improved accessibility
- Optimized performance

## License

GPL v2 or later

## Credits

- Original Pinnacle Theme by Kadence Themes
- Distilled by NinjaTech AI
- FlexSlider by WooCommerce