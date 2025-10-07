# Krishna Events - WordPress Setup Guide

This is a custom WordPress theme designed to match the krishnaeventss.com website for event management and destination wedding planning services.

## 🎨 Features Implemented

### 1. **Custom Design & Branding**
- Krishna Events color scheme (Gold: #c79c6c, Dark: #2c2c2c)
- Professional logo design with custom typography
- Responsive layout matching Krishna Events style

### 2. **Home Page Sections**
- ✅ Hero Slider (8:4 split layout with image and content)
- ✅ About Us Section (Destination wedding focus)
- ✅ Services Section (6 main services)
- ✅ Stats/Counter Section (Happy clients, events, team, experience)
- ✅ Gallery Section (Grid with hover effects)
- ✅ Testimonials Section (Client reviews)
- ✅ Contact Section (Form + contact information)

### 3. **Interactive Features**
- ✅ WhatsApp Floating Button (bottom-right corner)
- ✅ Scroll Animations (fade-in effects)
- ✅ Counter Animations (statistics)
- ✅ Smooth Scrolling
- ✅ Responsive Navigation
- ✅ Hover Effects on Cards and Images

### 4. **Custom Components**
- Custom Header Navigation
- Custom Footer with Social Links
- Service Cards with Icons
- Gallery with Overlay Effects
- Contact Form
- Scroll-to-Top Button

---

## 📋 Setup Instructions

### Step 1: WordPress Posts Setup

#### Create Categories
Go to **Posts → Categories** and create these categories:

1. **slider** - For hero slider posts
2. **gallery** - For gallery images
3. **testimonials** - For client testimonials

#### Add Slider Posts
1. Go to **Posts → Add New**
2. Title: "Destination Wedding Planning"
3. Category: **slider**
4. Featured Image: Upload a high-quality wedding/event image (recommended: 1920x600px)
5. Custom Fields (scroll down to "Slider Settings" meta box):
   - **Slider Subtitle**: "Creating unforgettable destination weddings across India"
   - **Button Text**: "Read More"
   - **Button Link**: Leave empty or add URL
6. Publish the post
7. Create 3-5 more slider posts with different images and content

#### Add Gallery Posts
1. Go to **Posts → Add New**
2. Title: Event name (e.g., "Beach Wedding in Goa")
3. Category: **gallery**
4. Featured Image: Upload event image (recommended: 800x600px)
5. Excerpt: Brief description
6. Publish
7. Create 6+ gallery posts

#### Add Testimonials
1. Go to **Posts → Add New**
2. Title: Client name (e.g., "Rajesh & Priya")
3. Category: **testimonials**
4. Content: Write the testimonial text
5. Publish
6. Create 3-6 testimonials

### Step 2: Navigation Menu Setup

1. Go to **Appearance → Menus**
2. Create a new menu named "Primary Menu"
3. Add these pages/links:
   - Home
   - About Us
   - Services
   - Gallery (with dropdown for "Photo Gallery" and "Video Gallery")
   - Contact Us
4. Assign to **Primary Menu** location
5. Save Menu

### Step 3: Customize Settings

#### Upload Logo (Optional)
1. Go to **Appearance → Customize → Site Identity**
2. Upload your Krishna Events logo (recommended: 200x60px PNG with transparent background)
3. If no logo is uploaded, the text "Krishna Events" will display automatically

#### Contact Information
1. Edit the footer file or use a plugin to manage:
   - Phone: +91 98765 43210
   - Email: info@krishnaeventss.com
   - Address: Update in [footer.php](footer.php:71)

2. Update WhatsApp Number:
   - Edit [front-page.php](front-page.php:488)
   - Change the phone number in the WhatsApp link

### Step 4: Social Media Links

Update social media links in [footer.php](footer.php:31):
- Facebook
- Instagram
- Twitter
- YouTube

---

## 🎯 Customization Options

### Change Colors
Edit [css/krishna-events-custom.css](css/krishna-events-custom.css:7) and update CSS variables:
```css
:root {
    --primary-color: #c79c6c;
    --secondary-color: #8b6f47;
    --accent-color: #d4af37;
    --dark-color: #2c2c2c;
}
```

### Update Services
Edit [front-page.php](front-page.php:149) services section:
- Change icons (using Font Awesome)
- Update service titles and descriptions
- Add/remove service cards

### Modify Stats/Counters
Edit [front-page.php](front-page.php:196) stats section:
- Update counter values in `data-count` attribute
- Change stat labels

### Contact Form
The contact form is currently static HTML. To make it functional:
1. Install **Contact Form 7** plugin
2. Create a form in CF7
3. Replace the form HTML in [front-page.php](front-page.php:443)

---

## 📱 WhatsApp Integration

The WhatsApp button is configured at [front-page.php](front-page.php:488)

**To update:**
```html
<a href="https://wa.me/919876543210?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20event%20planning%20services"
```

Replace `919876543210` with your WhatsApp number (with country code, no + or spaces)

---

## 🎨 CSS Files Structure

1. **style.css** - Main theme stylesheet (WordPress required)
2. **css/child-theme.css** - Compiled child theme styles
3. **css/slider-custom.css** - Hero slider specific styles
4. **css/event-animations.css** - Animation definitions
5. **css/krishna-events-custom.css** - Krishna Events custom styles ⭐

---

## 📦 JavaScript Files

1. **js/child-theme.js** - Main theme scripts
2. **js/event-animations.js** - Scroll animations, counters, smooth scroll ⭐

---

## 🚀 Performance Tips

1. **Optimize Images**
   - Compress all images before uploading
   - Use WebP format for better compression
   - Recommended dimensions:
     - Slider: 1920x600px
     - Gallery: 800x600px
     - About section: 800x800px

2. **Install Caching Plugin**
   - WP Super Cache or W3 Total Cache
   - Enable browser caching

3. **Lazy Loading**
   - Already implemented in JavaScript
   - Use `data-src` for lazy-loaded images

---

## 🔧 Troubleshooting

### Slider Not Showing
- Ensure posts are in "slider" category
- Check that Featured Images are set
- Verify posts are published (not draft)

### Gallery Empty
- Add posts to "gallery" category
- Set Featured Images on all gallery posts

### Menu Not Displaying
- Go to Appearance → Menus
- Ensure menu is assigned to "Primary Menu" location

### Animations Not Working
- Clear browser cache
- Check browser console for JavaScript errors
- Ensure jQuery is loaded

### WhatsApp Button Not Visible
- Check [css/krishna-events-custom.css](css/krishna-events-custom.css:25)
- Verify `.whatsapp-float` CSS is present
- Make sure Font Awesome is loaded

---

## 📞 Support & Customization

### Files to Edit for Common Changes

| What to Change | File to Edit | Line Number |
|----------------|--------------|-------------|
| Logo/Brand Name | global-templates/navbar-branding.php | 17-28 |
| Services | front-page.php | 149-214 |
| Stats/Counters | front-page.php | 196-217 |
| Contact Info | front-page.php | 403-425 |
| Footer Content | footer.php | 16-78 |
| Colors | css/krishna-events-custom.css | 7-15 |
| WhatsApp Number | front-page.php | 488 |

---

## 🎯 Next Steps

1. **Create Additional Pages**
   - About Us (detailed company info)
   - Services (individual service pages)
   - Gallery (full photo/video galleries)
   - Contact Page

2. **Add Plugins**
   - Contact Form 7 (forms)
   - Yoast SEO (search optimization)
   - WP Super Cache (performance)
   - Elementor (if you want drag-drop editing)

3. **Content**
   - Add real images from your events
   - Write authentic testimonials
   - Create detailed service descriptions
   - Add blog posts about events

4. **SEO**
   - Set up meta titles and descriptions
   - Add alt text to all images
   - Create XML sitemap
   - Submit to Google Search Console

---

## 📝 Credits

- **Theme Base**: Understrap (Bootstrap 5 + Underscores)
- **Icons**: Font Awesome
- **Animations**: CSS3 + Intersection Observer API
- **Design Inspiration**: krishnaeventss.com

---

## 🔒 Important Notes

1. **Backup Regularly** - Always backup before major changes
2. **Test Responsive** - Check on mobile, tablet, desktop
3. **Update Plugins** - Keep WordPress and plugins updated
4. **Security** - Use strong passwords and security plugins

---

## 📧 Configuration Checklist

- [ ] Created slider, gallery, testimonials categories
- [ ] Added 3-5 slider posts with images
- [ ] Added 6+ gallery posts
- [ ] Added 3+ testimonials
- [ ] Created navigation menu
- [ ] Updated WhatsApp number
- [ ] Updated contact information
- [ ] Added social media links
- [ ] Uploaded logo (or using text logo)
- [ ] Tested on mobile devices
- [ ] Installed Contact Form 7
- [ ] Set up caching plugin
- [ ] Optimized all images

---

**Version:** 1.0
**Last Updated:** 2025-10-06
**Compatible With:** WordPress 6.0+, PHP 7.4+

For more customization or support, refer to the individual PHP, CSS, and JS files with inline comments.
