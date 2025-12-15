# Deployment Guide - Carmazzi Real Estate Distilled Theme

## Overview
This guide covers deploying the distilled theme to your WordPress site.

## Pre-Deployment Checklist

### 1. Backup Current Site
- [ ] Full database backup
- [ ] Complete file backup
- [ ] Export all property data
- [ ] Screenshot current site appearance
- [ ] Document current theme settings

### 2. Prepare Theme Package
- [ ] Download FlexSlider JS library
- [ ] Add `jquery.flexslider-min.js` to `assets/js/`
- [ ] Verify all files are present
- [ ] Test theme in local/staging environment first

### 3. Review Documentation
- [ ] Read INSTALLATION.md
- [ ] Review MANUAL.md for technical details
- [ ] Understand CHANGES_SUMMARY.md
- [ ] Note any custom modifications needed

## Deployment Options

### Option 1: Direct Activation (Recommended for New Sites)
1. Upload theme to `/wp-content/themes/`
2. Activate theme
3. Configure settings
4. Add content

### Option 2: Gradual Migration (Recommended for Existing Sites)
1. Install on staging site first
2. Test thoroughly
3. Migrate to production
4. Monitor for issues

### Option 3: Child Theme Approach
1. Create child theme for customizations
2. Keep distilled theme as parent
3. Override only what's needed

## Step-by-Step Deployment

### Phase 1: Preparation (30 minutes)

#### 1.1 Download FlexSlider
```bash
cd distilled-theme/assets/js/
wget https://raw.githubusercontent.com/woocommerce/FlexSlider/master/jquery.flexslider-min.js
```

#### 1.2 Create Theme Package
```bash
cd /path/to/themes
zip -r carmazzi-distilled.zip distilled-theme/
```

#### 1.3 Backup Current Site
- Use backup plugin or manual backup
- Store backup in safe location
- Verify backup is complete

### Phase 2: Installation (15 minutes)

#### 2.1 Upload Theme
**Via WordPress Admin:**
1. Go to Appearance > Themes
2. Click "Add New" > "Upload Theme"
3. Choose `carmazzi-distilled.zip`
4. Click "Install Now"

**Via FTP:**
1. Upload `distilled-theme` folder to `/wp-content/themes/`
2. Rename to `carmazzi-distilled` if desired
3. Set permissions: 755 for directories, 644 for files

#### 2.2 Activate Theme
1. Go to Appearance > Themes
2. Find "Carmazzi Real Estate Distilled"
3. Click "Activate"
4. **IMPORTANT:** Go to Settings > Permalinks > Save Changes

### Phase 3: Configuration (20 minutes)

#### 3.1 Site Identity
1. Go to Appearance > Customize > Site Identity
2. Upload logo (300x104px recommended)
3. Set site title and tagline
4. Upload site icon (favicon)

#### 3.2 Header Image
1. Go to Appearance > Customize > Header Image
2. Upload hero background (1920x400px recommended)
3. Choose image that works with white text

#### 3.3 Contact Information
1. Go to Appearance > Customize > Contact Information
2. Enter phone: (916) 736-1417
3. Enter email address

#### 3.4 Hero Section
1. Go to Appearance > Customize > Hero Section
2. Set title: "Welcome to Carmazzi Real Estate"
3. Set subtitle: "Residential Real Estate for the Greater Sacramento Area"

#### 3.5 Navigation Menu
1. Go to Appearance > Menus
2. Create "Primary Menu"
3. Add pages:
   - Home
   - Available Rentals
   - Owners
   - Applicants
   - For Sale
   - Contact Us
4. Assign to "Primary Menu" location
5. Save menu

#### 3.6 Footer Widgets
1. Go to Appearance > Widgets
2. Configure 4 footer columns:
   - Column 1: Quick Links
   - Column 2: For Owners
   - Column 3: For Tenants
   - Column 4: Properties

### Phase 4: Content Migration (30-60 minutes)

#### 4.1 Properties
If migrating from original theme:
- Properties should automatically work (same post type)
- Verify all fields display correctly
- Check image galleries work
- Test "RENTED!" prefix on unavailable properties

#### 4.2 Pages
- Verify all pages display correctly
- Check page templates
- Test contact forms
- Verify links work

#### 4.3 Images
1. Install "Regenerate Thumbnails" plugin
2. Go to Tools > Regenerate Thumbnails
3. Click "Regenerate All Thumbnails"
4. Wait for completion

### Phase 5: Testing (30 minutes)

#### 5.1 Visual Testing
- [ ] Homepage displays correctly
- [ ] Property grid shows 3 columns
- [ ] Property cards have images
- [ ] Single property page works
- [ ] Image slider functions
- [ ] Navigation menu works
- [ ] Footer displays correctly

#### 5.2 Functionality Testing
- [ ] Can create new properties
- [ ] Can edit properties
- [ ] All fields save correctly
- [ ] Images upload properly
- [ ] Property archive works
- [ ] Search works
- [ ] Pagination works

#### 5.3 Responsive Testing
- [ ] Test on desktop (1920px)
- [ ] Test on laptop (1366px)
- [ ] Test on tablet (768px)
- [ ] Test on mobile (375px)
- [ ] Test landscape orientation

#### 5.4 Browser Testing
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile browsers

#### 5.5 Accessibility Testing
- [ ] Keyboard navigation works
- [ ] Skip link functions
- [ ] Screen reader compatible
- [ ] Color contrast sufficient
- [ ] Focus indicators visible

### Phase 6: Optimization (20 minutes)

#### 6.1 Install Recommended Plugins
```
Performance:
- WP Super Cache or W3 Total Cache
- Autoptimize (CSS/JS optimization)

Images:
- Smush or ShortPixel

Security:
- Wordfence or Sucuri

SEO:
- Yoast SEO or Rank Math

Backup:
- UpdraftPlus or BackupBuddy
```

#### 6.2 Configure Caching
1. Install caching plugin
2. Enable page caching
3. Enable browser caching
4. Minify CSS/JS
5. Test site speed

#### 6.3 Optimize Images
1. Install image optimization plugin
2. Optimize existing images
3. Set up automatic optimization
4. Test image loading

### Phase 7: Go Live (10 minutes)

#### 7.1 Final Checks
- [ ] All content migrated
- [ ] All links work
- [ ] Forms work
- [ ] Images display
- [ ] Mobile works
- [ ] No console errors

#### 7.2 Performance Check
- [ ] Run GTmetrix test
- [ ] Run Google PageSpeed Insights
- [ ] Check load time < 3 seconds
- [ ] Verify mobile performance

#### 7.3 Accessibility Check
- [ ] Run WAVE accessibility test
- [ ] Check keyboard navigation
- [ ] Verify screen reader compatibility
- [ ] Test with accessibility tools

#### 7.4 Launch
1. Clear all caches
2. Test one final time
3. Monitor for issues
4. Be ready to rollback if needed

## Post-Deployment

### Week 1: Monitoring
- Check analytics daily
- Monitor error logs
- Watch for user feedback
- Fix any issues quickly

### Week 2-4: Optimization
- Review performance metrics
- Optimize slow pages
- Improve SEO
- Enhance user experience

### Ongoing: Maintenance
- Keep WordPress updated
- Update plugins regularly
- Monitor security
- Regular backups
- Performance monitoring

## Rollback Plan

If issues occur:

### Immediate Rollback
1. Deactivate distilled theme
2. Activate original theme
3. Clear all caches
4. Verify site works

### Restore from Backup
1. Access backup
2. Restore database
3. Restore files
4. Test thoroughly

## Troubleshooting

### Common Issues

#### Properties Not Showing
**Solution:** Flush permalinks
1. Go to Settings > Permalinks
2. Click "Save Changes"
3. Test property pages

#### Images Not Displaying
**Solution:** Regenerate thumbnails
1. Install "Regenerate Thumbnails"
2. Run regeneration
3. Clear cache

#### Slider Not Working
**Solution:** Check FlexSlider
1. Verify `jquery.flexslider-min.js` exists
2. Check browser console for errors
3. Ensure jQuery is loading

#### Styles Not Loading
**Solution:** Clear caches
1. Clear browser cache
2. Clear WordPress cache
3. Clear CDN cache if applicable
4. Hard refresh (Ctrl+Shift+R)

#### Menu Not Showing
**Solution:** Assign menu
1. Go to Appearance > Menus
2. Create menu
3. Assign to location
4. Save

## Support Resources

### Documentation
- README.md - Overview
- MANUAL.md - Technical details
- INSTALLATION.md - Installation steps
- CHANGES_SUMMARY.md - All changes

### Testing Tools
- GTmetrix: https://gtmetrix.com/
- PageSpeed Insights: https://pagespeed.web.dev/
- WAVE: https://wave.webaim.org/
- Lighthouse: Built into Chrome DevTools

### WordPress Resources
- WordPress.org Forums
- WordPress Codex
- Theme Handbook

## Success Metrics

### Performance Goals
- Load time: < 3 seconds
- PageSpeed score: > 90
- Mobile score: > 85
- Accessibility score: 100

### User Experience Goals
- Easy navigation
- Fast property browsing
- Mobile-friendly
- Accessible to all users

### Business Goals
- Maintain or improve conversions
- Reduce bounce rate
- Increase time on site
- Improve user satisfaction

## Conclusion

The distilled theme is designed for easy deployment and maintenance. Follow this guide carefully, test thoroughly, and monitor closely after launch. The simplified codebase and comprehensive documentation make ongoing maintenance straightforward.

**Remember:** Always test in staging before deploying to production!

---

**Need Help?** Refer to MANUAL.md for technical details or INSTALLATION.md for step-by-step instructions.