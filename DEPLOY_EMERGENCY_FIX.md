# Emergency Fix Deployment Instructions

## What Was Fixed:
✅ **Google Fonts (Raleway)** - Now properly enqueued in functions.php

## What You Need To Do:

### Step 1: Deploy the Fix
```bash
cd /path/to/wordpress/wp-content/themes/carmazzi-distilled
git pull origin theme-distilled
```

### Step 2: Clear ALL Caches (CRITICAL!)

#### A. WordPress Cache
- If using WP Super Cache: Delete cache
- If using W3 Total Cache: Empty all caches
- If using WP Rocket: Clear cache
- Go to: Settings → Permalinks → Click "Save Changes" (flushes rewrite rules)

#### B. Browser Cache
- Chrome: Ctrl+Shift+Delete → Clear cached images and files
- Firefox: Ctrl+Shift+Delete → Clear cache
- Safari: Cmd+Option+E
- **OR** Open site in Incognito/Private mode

#### C. CDN Cache (if applicable)
- Cloudflare: Purge everything
- Other CDN: Clear cache

### Step 3: Verify the Fix

#### Check Fonts:
1. Open staging site
2. Right-click → Inspect
3. Go to Network tab
4. Reload page (Ctrl+F5)
5. Look for: `fonts.googleapis.com/css2?family=Raleway`
6. Should see status 200 (loaded successfully)

#### Check Typography:
- Text should now use Raleway font (not Times/Arial)
- Headings should be bold and clean
- Overall appearance should match original site

### Step 4: Troubleshooting

#### If fonts still don't load:
1. Check browser console for errors (F12)
2. Verify functions.php was updated correctly
3. Try different browser
4. Disable all plugins temporarily
5. Switch to default theme, then back

#### If footer still duplicates:
1. Check for plugin conflicts (disable all, enable one by one)
2. Look for theme caching plugins
3. Check if another theme is active
4. Verify you're viewing the correct site

#### If properties don't show:
1. Go to WordPress Admin
2. Navigate to: Rental Properties
3. Check if any posts exist
4. If posts exist, check their status (Published vs Draft)
5. If no posts exist, create test posts

### Step 5: Verify Post Type

In WordPress Admin:
1. Go to: Rental Properties (should be in left menu)
2. If you don't see it, go to: Settings → Permalinks → Save Changes
3. This flushes rewrite rules and registers the post type

### Step 6: Test Thoroughly

- [ ] Fonts load correctly (Raleway)
- [ ] Header is transparent over hero image
- [ ] Footer appears once (not duplicated)
- [ ] Blue color is #0066cc
- [ ] Properties display (if posts exist)
- [ ] Container width is reasonable (1170px max)
- [ ] Mobile responsive works
- [ ] All links work

## Expected Timeline:
- Deploy: 2 minutes
- Clear caches: 5 minutes
- Verification: 5 minutes
- **Total: ~12 minutes**

## If Issues Persist:

### Check These Files Were Updated:
```bash
cd /path/to/theme
git log -1 --name-only
```

Should show: `functions.php` was modified

### Verify Google Fonts Line:
```bash
grep "fonts.googleapis.com" functions.php
```

Should return: Line with Raleway font URL

### Check File Permissions:
```bash
ls -la functions.php
```

Should be readable (644 or similar)

## Support:

If problems continue after following ALL steps:
1. Check EMERGENCY_FIXES.md for detailed diagnosis
2. Review browser console for JavaScript errors
3. Check WordPress debug.log for PHP errors
4. Verify correct theme is active
5. Test with all plugins disabled

## Success Indicators:

✅ Raleway font loads in Network tab
✅ Text uses Raleway (not Times/Arial)
✅ Header is transparent
✅ Footer appears once
✅ Site looks professional and polished

---

**Note**: The code was already 95% correct. The main issue was missing Google Fonts. Everything else should resolve with proper cache clearing.