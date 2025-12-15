# Deployment Instructions - Iteration 2

## Overview
The theme is now complete with all sections implemented and ready for staging deployment. All changes have been committed locally to the `theme-distilled` branch.

## Current Status

✅ **All Development Complete**
- CTA section fully implemented
- All front page sections present and styled
- WordPress Customizer integration complete
- Documentation updated
- Code committed locally

⚠️ **Pending Action**
- Changes need to be pushed to GitHub (requires authentication)

## Step 1: Push Changes to GitHub

You'll need to push the local commits to GitHub. Run these commands from your local machine:

```bash
cd /path/to/carmazzerie
git checkout theme-distilled
git pull origin theme-distilled
git push origin theme-distilled
```

If you encounter authentication issues, you may need to:
- Use SSH instead of HTTPS
- Set up a Personal Access Token (PAT)
- Configure Git credentials

## Step 2: Deploy to Staging Site

### Option A: Direct Upload via FTP/SFTP

1. **Download the theme from GitHub**
   ```bash
   git clone https://github.com/jeffn0rD/carmazzerie.git
   cd carmazzerie
   git checkout theme-distilled
   ```

2. **Upload to staging server**
   - Connect to your staging server via FTP/SFTP
   - Navigate to `/wp-content/themes/`
   - Upload the entire theme directory
   - Rename it to `carmazzi-distilled` (or your preferred name)

### Option B: Git Pull on Server

If you have SSH access to your staging server:

```bash
ssh user@jeffreypaulramenllc.com
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/jeffn0rD/carmazzerie.git carmazzi-distilled
cd carmazzi-distilled
git checkout theme-distilled
```

### Option C: WordPress Admin Upload

1. **Create a ZIP file**
   ```bash
   cd carmazzerie
   zip -r carmazzi-distilled.zip . -x "*.git*" -x "*node_modules*" -x "*.DS_Store"
   ```

2. **Upload via WordPress Admin**
   - Go to Appearance → Themes → Add New → Upload Theme
   - Choose the ZIP file
   - Click "Install Now"

## Step 3: Activate the Theme

1. Log in to WordPress Admin on staging site
2. Go to **Appearance → Themes**
3. Find "Carmazzi Real Estate Distilled"
4. Click **Activate**

## Step 4: Configure Theme Settings

### 4.1 Set Header Image
1. Go to **Appearance → Customize → Header Image**
2. Upload a hero background image (recommended: 1920x1080px)
3. Click **Publish**

### 4.2 Configure Hero Section
1. Go to **Appearance → Customize → Hero Section**
2. Set **Hero Title**: "Welcome to Carmazzi Real Estate"
3. Set **Hero Subtitle**: "Residential Real Estate for the Greater Sacramento Area"
4. Click **Publish**

### 4.3 Configure CTA Section
1. Go to **Appearance → Customize → Call to Action Section**
2. Review/edit the **CTA Text** (default mission statement is already set)
3. Click **Publish**

## Step 5: Verify Front Page Display

Visit your staging site homepage and verify:

- [ ] Hero section displays with background image
- [ ] Icon menu section shows 4 icons (Owners, Applicants, For Sale, Contact Us)
- [ ] Available Rentals section displays (or shows "No Available Rentals" message)
- [ ] Rented section displays rented properties
- [ ] CTA section appears with mission statement and Contact Us button
- [ ] Footer displays with logos and disclaimer

## Step 6: Test Functionality

### Navigation
- [ ] Click each icon in the icon menu section
- [ ] Verify links go to correct pages
- [ ] Test Contact Us button in CTA section

### Property Display
- [ ] Check that available properties show correctly
- [ ] Verify rented properties display with "RENTED" in title
- [ ] Test property card links

### Responsive Design
- [ ] Test on mobile devices
- [ ] Test on tablets
- [ ] Test on desktop browsers
- [ ] Verify all sections are responsive

### Accessibility
- [ ] Test keyboard navigation
- [ ] Verify screen reader compatibility
- [ ] Check color contrast ratios

## Step 7: Visual Comparison

Compare the staging site with the original:

**Original:** https://www.carmazzire.com/  
**Staging:** https://jeffreypaulramenllc.com/

### Areas to Compare:
1. **Hero Section**
   - Background image positioning
   - Title and subtitle styling
   - Overall layout

2. **Icon Menu**
   - Icon sizes and spacing
   - Hover effects
   - Grid layout

3. **Property Sections**
   - Card styling and layout
   - Image display
   - Text formatting

4. **CTA Section**
   - Background and overlay
   - Text styling
   - Button appearance

5. **Footer**
   - Logo positioning
   - Disclaimer text
   - Overall styling

## Step 8: Document Findings

Create a list of any visual differences or issues:

### Visual Differences
- [ ] List any spacing/padding differences
- [ ] Note any color mismatches
- [ ] Document typography differences
- [ ] Identify layout discrepancies

### Functional Issues
- [ ] List any broken links
- [ ] Note any JavaScript errors
- [ ] Document any display issues

## Step 9: Provide Feedback

Share your findings so we can make adjustments in Iteration 3:

1. Take screenshots of any issues
2. Note specific sections that need adjustment
3. Provide feedback on overall appearance
4. Suggest any improvements

## Troubleshooting

### Theme Not Appearing
- Verify theme files are in `/wp-content/themes/` directory
- Check file permissions (755 for directories, 644 for files)
- Ensure style.css is present in theme root

### Images Not Loading
- Check that images are in `assets/images/` directory
- Verify image paths in footer.php
- Ensure proper file permissions

### Customizer Settings Not Saving
- Check PHP error logs
- Verify WordPress version compatibility
- Test with default WordPress theme first

### Property Queries Not Working
- Verify "rentalproperty" custom post type exists
- Check that properties are published
- Review property titles for "RENTED" keyword

## Next Steps After Deployment

1. **Gather Feedback**
   - Review visual appearance
   - Test all functionality
   - Document any issues

2. **Iteration 3 Planning**
   - Address visual discrepancies
   - Fine-tune spacing and typography
   - Optimize responsive behavior
   - Make final adjustments

3. **Production Deployment**
   - Once approved, deploy to production
   - Monitor for any issues
   - Provide final documentation

## Support

If you encounter any issues during deployment:

1. Check the error logs (PHP and WordPress)
2. Review the documentation in `/doc` directory
3. Verify all prerequisites are met
4. Test with WordPress default theme to isolate issues

## Files Reference

Key files in the theme:

- `style.css` - Theme metadata
- `functions.php` - Theme functionality and customizer
- `front-page.php` - Homepage template
- `header.php` - Site header with top bar
- `footer.php` - Site footer with logos
- `assets/css/main.css` - All theme styles
- `template-parts/content-property-card.php` - Property card template

## Commit History

Latest commits on `theme-distilled` branch:

1. **Iteration 2: Complete CTA section implementation**
   - Added CTA customizer section
   - Updated documentation
   - Removed backup files

2. **Update todo.md: Mark commit task complete**
   - Updated task tracking

## Summary

✅ Theme is complete and ready for deployment  
✅ All sections implemented and styled  
✅ Documentation comprehensive and up-to-date  
✅ Code is clean and maintainable  

**Action Required:** Push commits to GitHub and deploy to staging site for visual comparison and feedback.