# Swiper Slider Troubleshooting Guide

## ✅ Files Updated & Fixed

### Changes Made:
1. ✅ Changed `.swiper-container` to `.swiper` (Swiper v8+ requirement)
2. ✅ Updated CSS to support both class names
3. ✅ Fixed JavaScript initialization
4. ✅ Added proper error handling

---

## 🔍 Common Issues & Solutions

### Issue 1: Slider Not Showing / Blank Screen
**Solution:**
- Clear browser cache (Ctrl + Shift + R)
- Check if Swiper library is loading:
  - Open browser Console (F12)
  - Look for any errors
  - Should see "Swiper initialized" message

### Issue 2: Slides Stacked Vertically
**Problem:** CSS not loading properly

**Solution:**
1. Check if CSS file exists: `wp-content/themes/understrap-child/css/swiper-slider-custom.css`
2. Verify file is enqueued in functions.php
3. Hard refresh (Ctrl + F5)

### Issue 3: No Images Showing
**Problem:** No slider posts created yet

**Solution:**
1. Create posts in "slider" category
2. Add Featured Images to posts
3. Publish posts

### Issue 4: Navigation Arrows Not Working
**Problem:** JavaScript not initialized

**Solution:**
1. Check browser console for errors
2. Verify Swiper JS is loading:
   ```
   View Page Source → Search for "swiper-bundle.min.js"
   ```
3. Make sure swiper-init.js is loading after swiper-bundle.min.js

---

## 🧪 Debug Steps

### Step 1: Check Console
```javascript
// Open Browser Console (F12) and run:
console.log(typeof Swiper); // Should show "function"
```

### Step 2: Check if Element Exists
```javascript
// In console:
document.querySelector('#heroSwiper'); // Should return element
```

### Step 3: Manual Test
```javascript
// In console - Try initializing manually:
var testSwiper = new Swiper('#heroSwiper', {
    loop: true,
    autoplay: { delay: 3000 }
});
```

---

## 📋 Checklist

Before asking for help, verify:

- [ ] Created posts in "slider" category
- [ ] Added Featured Images to slider posts
- [ ] Published the posts
- [ ] Cleared browser cache (Ctrl + Shift + R)
- [ ] Checked browser console for errors (F12)
- [ ] Verified Swiper library is loading (check page source)
- [ ] CSS file exists at: `/css/swiper-slider-custom.css`
- [ ] JS file exists at: `/js/swiper-init.js`

---

## 🎯 Quick Fix Commands

### Clear WordPress Cache:
If using a caching plugin, clear it.

### Force CSS/JS Reload:
1. Edit functions.php
2. Change version number:
   ```php
   $theme_version = '2.0.1'; // Increment this
   ```

### Verify Files are Enqueued:
View page source (Ctrl + U) and search for:
- `swiper-bundle.min.css`
- `swiper-bundle.min.js`
- `swiper-slider-custom.css`
- `swiper-init.js`

All should be present!

---

## 💡 Expected Behavior

### Desktop:
- Image on left (50%)
- Text on right (50%)
- Navigation arrows on sides
- Auto-play every 5 seconds

### Tablet:
- Image on top
- Text on bottom
- Smaller arrows

### Mobile:
- Image on top (smaller)
- Text below
- No arrows (swipe only)

---

## 🔧 Manual Fixes

### If Slider Still Not Working:

#### Option 1: Use Bootstrap Carousel Instead
If Swiper is causing issues, you can revert to Bootstrap carousel:
- Restore previous version from git/backup

#### Option 2: Use CDN Links
Update functions.php to use CDN:
```php
// Use older stable version
wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css');
wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js');
```

#### Option 3: Check File Permissions
Make sure files are readable:
```bash
chmod 644 css/swiper-slider-custom.css
chmod 644 js/swiper-init.js
```

---

## 📞 Final Checks

### Browser Compatibility:
- Chrome/Edge: ✅ Works
- Firefox: ✅ Works
- Safari: ✅ Works
- IE11: ❌ Not supported (use fallback)

### WordPress Requirements:
- WordPress: 6.0+
- PHP: 7.4+
- jQuery: Included
- Bootstrap: 5.x

---

## ✨ Success Indicators

You'll know it's working when:
1. ✅ Slider shows full-screen
2. ✅ Image on one side, text on other
3. ✅ Slides auto-advance every 5 seconds
4. ✅ Navigation arrows work
5. ✅ Smooth transitions
6. ✅ Responsive on mobile

---

## 🚀 Next Steps

Once slider is working:
1. Add 2-3 slider posts
2. Upload high-quality images (1920x1080)
3. Customize text and links
4. Test on mobile devices
5. Check load times

**Last Updated:** 2025-10-06
**Version:** 2.0
