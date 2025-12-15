# Installation Guide - Carmazzi Real Estate Distilled Theme

## Prerequisites
- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern web browser

## Installation Steps

### Step 1: Download FlexSlider Library
**IMPORTANT:** The theme requires FlexSlider for property image galleries.

1. Download FlexSlider from: https://github.com/woocommerce/FlexSlider
2. Extract the downloaded file
3. Copy `jquery.flexslider-min.js` to `distilled-theme/assets/js/`

**Alternative:** Download directly:
```bash
cd distilled-theme/assets/js/
wget https://raw.githubusercontent.com/woocommerce/FlexSlider/master/jquery.flexslider-min.js
```

### Step 2: Upload Theme
1. Compress the `distilled-theme` folder into a ZIP file
2. Go to WordPress Admin > Appearance > Themes
3. Click "Add New" > "Upload Theme"
4. Choose the ZIP file
5. Click "Install Now"

**OR** via FTP:
1. Upload `distilled-theme` folder to `/wp-content/themes/`
2. Ensure proper file permissions (755 for directories, 644 for files)

### Step 3: Activate Theme
1. Go to Appearance > Themes
2. Find "Carmazzi Real Estate Distilled"
3. Click "Activate"

### Step 4: Flush Permalinks
**CRITICAL:** This ensures the rental property URLs work correctly.

1. Go to Settings > Permalinks
2. Click "Save Changes" (no need to change anything)
3. This flushes the rewrite rules

### Step 5: Configure Theme Settings
Go to Appearance > Customize:

#### Site Identity
1. Upload your logo (recommended: 300x104px)
2. Set site title and tagline
3. Upload site icon (favicon)

#### Header Image
1. Upload hero section background image
2. Recommended size: 1920x400px
3. Choose an image that works with white text overlay

#### Contact Information
1. Enter phone number (e.g., (916) 736-1417)
2. Enter email address

#### Hero Section
1. Set hero title (e.g., "Welcome to Carmazzi Real Estate")
2. Set hero subtitle (e.g., "Residential Real Estate for the Greater Sacramento Area")

### Step 6: Create Navigation Menus
1. Go to Appearance > Menus
2. Create a new menu called "Primary Menu"
3. Add pages:
   - Home
   - Available Rentals
   - Owners
   - Applicants
   - For Sale
   - Contact Us
4. Assign to "Primary Menu" location
5. Save menu

**Optional:** Create footer menu and assign to "Footer Menu" location

### Step 7: Configure Footer Widgets
1. Go to Appearance > Widgets
2. Add widgets to footer areas:
   - Footer Column 1: Navigation Menu or Custom HTML
   - Footer Column 2: Navigation Menu or Custom HTML
   - Footer Column 3: Navigation Menu or Custom HTML
   - Footer Column 4: Navigation Menu or Custom HTML

**Example Footer Structure:**
- Column 1: Quick Links (Contact, Vendor List)
- Column 2: For Owners (Owner Sign In, Resources)
- Column 3: For Tenants (Tenant Sign In, FAQ)
- Column 4: Properties (For Sale, Reviews)

### Step 8: Create Essential Pages
Create these pages if they don't exist:
1. Owners
2. Applicants
3. For Sale
4. Contact Us
5. Vendor List
6. Reviews

### Step 9: Add Your First Property
1. Go to Rental Properties > Add New
2. Enter property title (e.g., "$2650/month: Pet Friendly Rental Home...")
3. Add property description in the editor
4. Set featured image (main property photo)
5. Add gallery images:
   - Click "Set featured image"
   - Upload additional images to the post
   - These will appear in the slider
6. Fill in Property Details:
   - Availability Status: Available or Rented
   - Location: e.g., "Natomas, Sacramento"
   - Bedrooms: e.g., 3
   - Bathrooms: e.g., 2
   - Square Footage: e.g., 1302
   - Parking: e.g., "2 Car Garage"
   - Contact: e.g., "(916) 736-1417"
   - Google Map Link: Full URL to Google Maps
7. Click "Publish"

### Step 10: Test the Site
1. Visit homepage - should show property grid
2. Click on a property - should show details and image slider
3. Test on mobile device
4. Test navigation menu
5. Test all links

## Post-Installation Tasks

### Regenerate Thumbnails
Install and run "Regenerate Thumbnails" plugin:
1. Install plugin from WordPress.org
2. Go to Tools > Regenerate Thumbnails
3. Click "Regenerate All Thumbnails"
4. Wait for completion

### Optimize Images
Consider installing an image optimization plugin:
- Smush
- ShortPixel
- Imagify

### Setup Caching
Install a caching plugin for better performance:
- WP Super Cache
- W3 Total Cache
- WP Rocket (premium)

### Security
1. Keep WordPress updated
2. Use strong passwords
3. Install security plugin (Wordfence, Sucuri)
4. Regular backups

### SEO
Install an SEO plugin:
- Yoast SEO
- Rank Math
- All in One SEO

## Troubleshooting

### Properties Not Showing
**Problem:** Property archive page shows 404 or no properties
**Solution:** Flush permalinks (Settings > Permalinks > Save)

### Images Not Displaying
**Problem:** Property images don't show or are broken
**Solution:** 
1. Check file permissions
2. Regenerate thumbnails
3. Verify images are uploaded correctly

### Slider Not Working
**Problem:** Image slider doesn't work on single property page
**Solution:**
1. Verify FlexSlider JS is in `assets/js/`
2. Check browser console for JavaScript errors
3. Ensure jQuery is loading

### Styles Not Loading
**Problem:** Site looks unstyled or broken
**Solution:**
1. Clear browser cache
2. Check file permissions
3. Verify CSS files are in `assets/css/`
4. Check for PHP errors

### Menu Not Showing
**Problem:** Navigation menu doesn't appear
**Solution:**
1. Create menu in Appearance > Menus
2. Assign to "Primary Menu" location
3. Add menu items
4. Save menu

### Footer Empty
**Problem:** Footer has no content
**Solution:**
1. Add widgets to footer areas
2. Or create footer menu
3. Check footer.php template

## Migration from Original Theme

### Export Data
1. Backup entire site
2. Export all properties
3. Note theme settings
4. Take screenshots

### Import to Distilled Theme
1. Install and activate distilled theme
2. Properties should automatically work (same post type)
3. Reconfigure theme settings in Customizer
4. Recreate menus
5. Setup footer widgets
6. Test thoroughly

### Field Mapping
Original theme fields automatically map to new theme:
- `is-available` → `_property_is_available`
- `location` → `_property_location`
- `bedrooms` → `_property_bedrooms`
- `bathrooms` → `_property_bathrooms`
- `square-footage` → `_property_square_footage`
- `parking` → `_property_parking`
- `contact` → `_property_contact`
- `google-map-link` → `_property_google_map`

**Note:** If migrating from original theme, you may need to run a database query to update meta keys. Contact developer for migration script.

## Support

### Documentation
- README.md - Overview and features
- MANUAL.md - Technical documentation
- CHANGES_SUMMARY.md - All changes from original

### Common Issues
Check MANUAL.md "Troubleshooting" section

### Getting Help
1. Check documentation first
2. Search WordPress.org forums
3. Contact theme developer

## Checklist

Use this checklist to ensure proper installation:

- [ ] FlexSlider JS added to assets/js/
- [ ] Theme uploaded and activated
- [ ] Permalinks flushed
- [ ] Logo uploaded
- [ ] Header image set
- [ ] Contact info entered
- [ ] Hero text configured
- [ ] Primary menu created and assigned
- [ ] Footer widgets configured
- [ ] Essential pages created
- [ ] First property added and tested
- [ ] Thumbnails regenerated
- [ ] Site tested on desktop
- [ ] Site tested on mobile
- [ ] All links work
- [ ] Images display correctly
- [ ] Slider works on property pages
- [ ] Navigation menu works
- [ ] Footer displays correctly

## Next Steps

After installation:
1. Add all your properties
2. Optimize images
3. Setup caching
4. Install security plugin
5. Setup backups
6. Configure SEO
7. Test thoroughly
8. Launch!

---

**Congratulations!** Your Carmazzi Real Estate Distilled theme is now installed and ready to use.