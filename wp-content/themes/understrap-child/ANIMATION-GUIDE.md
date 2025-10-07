# Event Website - Styling & Animation Guide

## Overview
Yeh guide aapko batayega ki kaise WordPress website me modern animations aur styling use karein.

## Files Added
1. **CSS File**: `css/event-animations.css` - All animations aur styling
2. **JS File**: `js/event-animations.js` - Scroll animations aur interactive effects
3. **functions.php** - Updated to load new CSS & JS files

---

## 🎨 Available Animations

### 1. **Heading Animations**

#### Section Titles with Animation
```html
<h2 class="section-title animate-fade-in-down">Your Heading</h2>
```

#### Title with Underline Effect
```html
<h2 class="section-title underline">Services We Offer</h2>
```

#### Gradient Text
```html
<h1 class="gradient-text">Beautiful Gradient Heading</h1>
```

#### Animated Gradient Text
```html
<h1 class="gradient-text-animated">Color Shifting Text</h1>
```

---

### 2. **Animation Classes**

Kisi bhi element par yeh classes add karke animation lagayen:

```html
<!-- Fade In -->
<div class="animate-fade-in">Content</div>

<!-- Fade In from Bottom -->
<div class="animate-fade-in-up">Content</div>

<!-- Fade In from Top -->
<div class="animate-fade-in-down">Content</div>

<!-- Fade In from Left -->
<div class="animate-fade-in-left">Content</div>

<!-- Fade In from Right -->
<div class="animate-fade-in-right">Content</div>

<!-- Scale Up -->
<div class="animate-scale-up">Content</div>

<!-- Zoom In -->
<div class="animate-zoom-in">Content</div>

<!-- Bounce In -->
<div class="animate-bounce-in">Content</div>

<!-- Slide Up -->
<div class="animate-slide-up">Content</div>
```

#### Animation with Delay
```html
<div class="animate-fade-in-up delay-1">First</div>
<div class="animate-fade-in-up delay-2">Second</div>
<div class="animate-fade-in-up delay-3">Third</div>
```

---

### 3. **Scroll Animations**

Automatic scroll animation - jab user scroll karega tab element animate hoga:

```html
<div class="scroll-animate">
    This will animate when scrolled into view
</div>
```

---

### 4. **Button Styles**

#### Primary Button with Gradient
```html
<a href="#" class="btn-primary-custom">Click Me</a>
<!-- OR -->
<a href="#" class="event-btn">Book Now</a>
```

#### Button with Shine Effect
```html
<a href="#" class="btn-primary-custom btn-shine">Hover Me</a>
```

#### Outline Button
```html
<a href="#" class="btn-outline-custom">Learn More</a>
```

---

### 5. **Card Styles**

#### Service/Feature Card
```html
<div class="service-card">
    <div class="icon-box">
        <i class="fa fa-heart"></i>
    </div>
    <h3>Service Title</h3>
    <p>Service description here...</p>
</div>
```

#### Card with Border Animation
```html
<div class="service-card card-border-animate">
    Content here
</div>
```

#### Image Card with Hover Effect
```html
<div class="image-card">
    <img src="image.jpg" alt="Image">
    <div class="card-overlay">
        <div class="card-overlay-content">
            <h3>Overlay Title</h3>
            <p>Overlay description</p>
        </div>
    </div>
</div>
```

---

### 6. **Image Effects**

#### Zoom on Hover
```html
<div class="img-zoom">
    <img src="image.jpg" alt="Image">
</div>
```

#### Grayscale to Color
```html
<div class="img-grayscale">
    <img src="image.jpg" alt="Image">
</div>
```

#### Brightness Effect
```html
<div class="img-brightness">
    <img src="image.jpg" alt="Image">
</div>
```

---

### 7. **Icon Styles**

#### Icon Box with Animation
```html
<div class="icon-box">
    <i class="fa fa-star"></i>
</div>
```

#### Floating Icon
```html
<div class="icon-box icon-float">
    <i class="fa fa-rocket"></i>
</div>
```

#### Pulsing Icon
```html
<div class="icon-box icon-pulse">
    <i class="fa fa-heart"></i>
</div>
```

---

### 8. **Background Gradients**

```html
<!-- Primary Gradient -->
<section class="bg-gradient-primary">
    Content with gradient background
</section>

<!-- Secondary Gradient -->
<section class="bg-gradient-secondary">
    Content here
</section>

<!-- Dark Gradient -->
<section class="bg-gradient-dark">
    Content here
</section>

<!-- Animated Gradient -->
<section class="bg-gradient-animated">
    Content with moving gradient
</section>
```

---

### 9. **Testimonial Card**

```html
<div class="testimonial-card">
    <p>"Amazing service! Highly recommended."</p>
    <h5>- Customer Name</h5>
</div>
```

---

### 10. **Pricing Card**

```html
<div class="pricing-card">
    <h3>Basic Plan</h3>
    <div class="price">₹10,000</div>
    <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
        <li>Feature 3</li>
    </ul>
    <a href="#" class="btn-primary-custom">Choose Plan</a>
</div>

<!-- Featured Plan -->
<div class="pricing-card featured">
    <h3>Premium Plan</h3>
    <div class="price">₹20,000</div>
    <ul>
        <li>All Basic Features</li>
        <li>Premium Feature 1</li>
        <li>Premium Feature 2</li>
    </ul>
    <a href="#" class="btn-primary-custom">Choose Plan</a>
</div>
```

---

### 11. **Social Media Icons**

```html
<a href="#" class="social-icon">
    <i class="fa fa-facebook"></i>
</a>
<a href="#" class="social-icon">
    <i class="fa fa-instagram"></i>
</a>
<a href="#" class="social-icon">
    <i class="fa fa-twitter"></i>
</a>
```

---

### 12. **Form Styling**

```html
<input type="text" class="form-control-custom" placeholder="Your Name">
<textarea class="form-control-custom" placeholder="Your Message"></textarea>
```

---

### 13. **Counter Animation**

Number counter jo scroll par animate hoga:

```html
<div class="counter-section">
    <div class="counter" data-count="500">0</div>
    <p>Happy Clients</p>
</div>
```

---

### 14. **Hover Underline Effect**

```html
<a href="#" class="hover-underline">Link with animated underline</a>
```

---

## 🎯 Complete Example

Ek complete service section ka example:

```html
<section class="py-5">
    <div class="container">
        <h2 class="section-title underline text-center animate-fade-in-down">
            Our Services
        </h2>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="service-card scroll-animate">
                    <div class="icon-box icon-pulse">
                        <i class="fa fa-camera"></i>
                    </div>
                    <h3>Photography</h3>
                    <p>Professional event photography services</p>
                    <a href="#" class="btn-outline-custom">Learn More</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="service-card scroll-animate delay-2">
                    <div class="icon-box icon-pulse">
                        <i class="fa fa-music"></i>
                    </div>
                    <h3>Music & DJ</h3>
                    <p>Best music and DJ services</p>
                    <a href="#" class="btn-outline-custom">Learn More</a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="service-card scroll-animate delay-3">
                    <div class="icon-box icon-pulse">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <h3>Catering</h3>
                    <p>Delicious food catering options</p>
                    <a href="#" class="btn-outline-custom">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
```

---

## 🚀 JavaScript Features

Automatically enabled features:
- ✅ Scroll animations
- ✅ Smooth scroll for anchor links
- ✅ Navbar background change on scroll
- ✅ Counter animations
- ✅ Lazy load images
- ✅ Scroll to top button
- ✅ Parallax effects

---

## 📝 WordPress Usage

### In Gutenberg Editor:
1. Add a "Custom HTML" block
2. Paste your HTML with animation classes
3. Publish/Update

### In Classic Editor:
1. Switch to "Text" mode
2. Add your HTML with animation classes
3. Publish/Update

### In PHP Templates:
```php
<div class="service-card animate-fade-in-up">
    <h3><?php the_title(); ?></h3>
    <p><?php the_excerpt(); ?></p>
</div>
```

---

## 🎨 Customization

### Change Colors:
[event-animations.css](css/event-animations.css) file me colors change karein:

```css
/* Default gradient: Purple to Pink */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Apna gradient lagayen */
background: linear-gradient(135deg, #YOUR_COLOR_1 0%, #YOUR_COLOR_2 100%);
```

### Popular Color Combinations:
```css
/* Blue to Purple */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Pink to Orange */
background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);

/* Green to Blue */
background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);

/* Orange to Pink */
background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
```

---

## 💡 Tips

1. **Don't Overuse**: Har element par animation mat lagayen, important elements par hi lagayen
2. **Mobile**: Mobile par animations kam rakhen, performance ke liye
3. **Loading**: Page load hone par bahut zyada animations slow kar sakte hain
4. **Testing**: Different browsers me test karein

---

## 🐛 Troubleshooting

### Animations nahi dikh rahe?
1. Browser cache clear karein
2. Check karein ki CSS/JS files properly load ho rahi hain
3. Browser console me errors check karein

### Animations slow hain?
1. Bahut sare animations ek saath use mat karein
2. Large images optimize karein
3. JavaScript conflicts check karein

---

## 📞 Support

Agar koi problem ho to browser console check karein (F12 press karke).

**Files Location:**
- CSS: `wp-content/themes/understrap-child/css/event-animations.css`
- JS: `wp-content/themes/understrap-child/js/event-animations.js`
- functions.php: `wp-content/themes/understrap-child/functions.php`

---

**Happy Designing! 🎉**
