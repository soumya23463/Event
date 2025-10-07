# Krishna Events - Slider Setup Guide

## 📸 Slider Style - EXACTLY Like Krishna Events Website

The slider is now updated to match **https://krishnaeventss.com/** exactly:

### ✅ Features:
- **Full-width background images**
- **Left-aligned text** (not centered)
- **Three lines of text**:
  1. Main Title (large, uppercase)
  2. Subtitle (medium size)
  3. Description text (smaller paragraph)
- **"Read More" button** (rounded, gold color)
- **Fade transition** between slides
- **Circular navigation arrows** (Previous/Next)
- **Dot indicators** at bottom
- **Dark overlay** on images for better text readability

---

## 🎯 How to Add Slider Content

### Step 1: Create a Post in "Slider" Category

1. Go to **Posts → Add New**
2. Add the following:

#### Post Details:
- **Title**: This becomes the BIG HEADING
  - Example: `Krishna Events` or `Destination Wedding Planner`

- **Content** (Description): Write a short description (max 20 words shown)
  - Example: `We would love to meet up and chat about how we can make YOUR DREAM wedding happen!`

- **Featured Image**: Upload your banner image
  - **Recommended size**: 1920x1080px
  - **Format**: JPG or PNG
  - High-quality wedding/event images

- **Category**: Select **"slider"** category

#### Custom Fields (Slider Settings Meta Box):

1. **Slider Subtitle**:
   - Example: `Wedding & Event Planner`

2. **Button Text**:
   - Example: `Read More`

3. **Button Link**:
   - Leave empty for home page
   - Or add URL: `#contact-section` or any page URL

4. Click **Publish**

---

## 📝 Example Slider Posts (Like Krishna Events)

### Slide 1:
```
Title: Krishna Events
Subtitle: Wedding & Event Planner
Content: We would love to meet up and chat about how we can make YOUR DREAM wedding happen!
Button Text: Read More
Button Link: #contact-section
Featured Image: Wedding decoration image
```

### Slide 2:
```
Title: Destination Wedding Planner
Subtitle: Wedding & Event Planner
Content: No matter your dreams - we can assist you in planning your PWE WEDDINGS & EVENTS.
Button Text: Read More
Button Link: #services
Featured Image: Beach/destination wedding image
```

### Slide 3:
```
Title: Your Dream Event Partner
Subtitle: Complete Event Management
Content: Creating unforgettable moments with expert planning, stunning decor, and flawless execution.
Button Text: Get Quote
Button Link: #contact-section
Featured Image: Event setup image
```

---

## 🎨 Slider Features Breakdown

### Text Positioning:
- ✅ **Left-aligned** (text starts from left side)
- ❌ NOT centered

### Text Hierarchy:
1. **Title** (Largest) - 4rem desktop, 2rem mobile
2. **Subtitle** (Medium) - 1.5rem desktop, 1rem mobile
3. **Description** (Small) - 1.2rem desktop, 0.95rem mobile
4. **Button** - Rounded pill button

### Colors:
- **Text**: White with shadow
- **Button**: Gold (#c79c6c)
- **Button Hover**: Transparent with white border
- **Overlay**: Dark gradient (top to bottom)

### Animations:
- **Title**: Fade in from top
- **Subtitle**: Fade in from bottom (0.2s delay)
- **Description**: Fade in from bottom (0.3s delay)
- **Button**: Fade in from bottom (0.4s delay)

---

## 🔧 Customization

### Change Button Color:
Edit [css/krishna-events-custom.css](css/krishna-events-custom.css:184)
```css
.btn-banner {
    background: var(--primary-color); /* Change this */
}
```

### Change Overlay Darkness:
Edit [css/krishna-events-custom.css](css/krishna-events-custom.css:135)
```css
.banner-overlay {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
    /* First number = top darkness, second = bottom darkness */
    /* 0.3 = 30% dark, 0.5 = 50% dark */
}
```

### Change Slide Speed:
Edit [front-page.php](front-page.php:27)
```php
data-bs-interval="4000"  <!-- 4000 = 4 seconds -->
```

### Disable Auto-Play:
Edit [front-page.php](front-page.php:27)
```php
data-bs-ride="carousel"  <!-- Remove this attribute -->
```

---

## 📱 Responsive Behavior

### Desktop (>992px):
- Full height banner (up to 800px)
- Large text (4rem title)
- Navigation arrows visible
- Text width: 66% of screen

### Tablet (768px - 991px):
- Medium height (500-600px)
- Medium text (3rem title)
- Smaller arrows
- Text width: 83% of screen

### Mobile (<768px):
- Compact height (400-500px)
- Small text (2rem title)
- **Arrows hidden** (swipe only)
- Dots visible for navigation
- Text width: 100% with padding

---

## 🎭 Important Notes

### DO:
✅ Use high-quality, sharp images (1920x1080)
✅ Keep titles short (2-4 words)
✅ Keep descriptions brief (15-25 words)
✅ Use images with subjects on the right side (text is on left)
✅ Test on mobile devices

### DON'T:
❌ Use small/blurry images
❌ Write long titles (will break layout)
❌ Use images with busy left side (text area)
❌ Upload vertical/portrait images
❌ Create more than 3-5 slides (user attention span)

---

## 🔍 Troubleshooting

### Slider not showing?
1. Check if posts are in **"slider"** category
2. Verify **Featured Images** are set
3. Ensure posts are **Published** (not draft)

### Images look stretched?
- Use 16:9 ratio images (1920x1080, 1600x900, etc.)
- Check `background-size: cover` in CSS

### Text not visible?
- Increase overlay darkness in `.banner-overlay`
- Use darker images or add text shadow

### Text too big/small?
- Edit `.banner-title`, `.banner-subtitle`, `.banner-description` font sizes
- Check responsive breakpoints for mobile

---

## 📊 Recommended Image Sizes

| Device | Recommended Size | Aspect Ratio |
|--------|-----------------|--------------|
| Desktop | 1920x1080px | 16:9 |
| Tablet | 1600x900px | 16:9 |
| Mobile | 1200x675px | 16:9 |

**Pro Tip**: Upload 1920x1080 images - they work on all devices!

---

## 🎬 Files Modified

1. **[front-page.php](front-page.php:10-127)** - Slider HTML structure
2. **[css/krishna-events-custom.css](css/krishna-events-custom.css:101-281)** - Slider styling
3. **[functions.php](functions.php)** - Meta boxes for slider fields

---

## ✨ Result

Your slider now looks **EXACTLY** like Krishna Events:
- Full-width background images ✅
- Left-aligned text overlay ✅
- Three-line content (title, subtitle, description) ✅
- Golden rounded button ✅
- Smooth fade transitions ✅
- Responsive design ✅

**Version**: 2.0 - Krishna Events Style
**Last Updated**: 2025-10-06
