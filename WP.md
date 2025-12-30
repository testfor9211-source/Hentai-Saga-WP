# WordPress Theme - Memory Documentation

## 🚨 CRITICAL: DESIGN CONSISTENCY RULE
**The WordPress theme design MUST ALWAYS be an exact replica of the original React application in the `/client` folder.**
- Any design changes must be made to the `/client` folder first
- The WordPress theme should mirror the React design exactly
- Colors, fonts, spacing, and layout must match perfectly
- Update this theme whenever the React design changes
- Do not make design decisions without comparing to `/client/src/components/`

---

## Theme Name
**Hentai Saga** - A WordPress conversion of the original React application

## Theme Status - All Complete ✅

### 1. Design Parity with Client Folder ✅
- **Status**: WordPress theme now exactly matches React app design
- **Original Source**: `/client/src/components/footer.tsx` and `/client/src/index.css`
- **Implementation**: Footer replicated in `wordpress-theme/footer.php`
- **Maintenance Rule**: Always check `/client` folder before making design changes

### 2. Font Implementation ✅
**Exact fonts from React app:**
- `Inter` (400, 500, 600, 700) - Main body text
- `Orbitron` (400, 700, 900) - Display/headings
- `Rajdhani` (400, 500, 600, 700) - UI elements

**Implementation**: Google Fonts in `functions.php` → `hentai_saga_fonts()`
- Font loading URL includes all three families
- CSS variables match React design:
  - `--font-sans`: "Inter"
  - `--font-display`: "Orbitron"
  - `--font-ui`: "Rajdhani"

### 3. Color Scheme (Exact HSL Values from React) ✅
All colors match `/client/src/index.css` exactly:

```
Background:     hsl(240 10% 4%)      → #0a0a0d
Card/Footer:    hsl(240 10% 6%)      → #0f0f14
Primary/Pink:   hsl(326 100% 50%)    → #ff0080
Muted Text:     hsl(240 5% 65%)      → #a5a8b3
White:          hsl(0 0% 98%)        → #fafafa
Border:         rgba(255, 255, 255, 0.1)
```

### 4. Footer Design - Handled by React App ✅
**Important**: The footer is rendered by the React app itself, not by WordPress PHP.
- React component: `/client/src/components/footer.tsx`
- WordPress footer.php is minimal - only contains WordPress hooks (`wp_footer()`)
- This prevents duplicate footers from appearing
- Footer styling, layout, and design come entirely from the React application

**Design Details** (from React component):
- Desktop Layout: Logo + text on left, copyright on right, centered links
- Mobile Layout: Centered logo, 3-column grid of links
- Logo: 40px (desktop) / 32px (mobile), pink background, Orbitron font
- All links use proper WordPress lowercase page URLs
- Hover state: Links change to primary pink color

### 5. Footer Links - WordPress Pages (Lowercase URLs) ✅
All footer links use lowercase WordPress page slugs:
- `/privacy-policy` - Privacy Policy
- `/terms-of-service` - Terms of Service
- `/cookie-policy` - Cookie Policy
- `/disclaimer` - Disclaimer
- `/dmca-copyright-policy` - DMCA Copyright Policy
- `/advertisement-policy` - Advertisement Policy
- `/18-age-restriction-policy` - Age Restriction Policy
- `/parental-controls` - Parental Controls
- `/usc-2257` - USC 2257

**Implementation**: Uses `site_url()` for proper WordPress URL generation

### 6. Image Loading & Sizing ✅
**Fixed with automatic URL rewriting AND CSS aspect ratio rules:**
- All images should be uploaded to: `/wp-content/uploads/` (WordPress default)
- JavaScript function `hentai_saga_rewrite_asset_urls()` automatically fixes image paths
- CSS rules ensure proper aspect ratio and sizing (matches React's `object-cover`)
- Handles:
  - Regular `<img>` tags with `object-fit: cover`
  - CSS `background-image` properties in inline styles
  - CSS background images in stylesheets
  - Hero/banner images with proper aspect ratio preservation
- Runs on page load via `DOMContentLoaded` event

**CSS Image Sizing Rules Applied**:
```css
img[src*="hero"], img[src*="banner"] {
    object-fit: cover;    /* Maintains aspect ratio */
    width: 100%;          /* Full width */
    height: 100%;         /* Full height */
}
img[alt*="Hero"] {
    object-fit: cover;    /* Covers entire container */
}
```

**How it works**:
1. React app tries to load images with paths like "anime_poster_*.png"
2. WordPress function detects images with names containing "anime_"
3. Automatically rewrites URLs to: `/wp-content/uploads/filename.png`
4. CSS applies `object-fit: cover` to maintain aspect ratio (same as React)
5. Uses WordPress `wp_upload_dir()` to get correct uploads URL

**Setup Instructions**:
1. Go to WordPress Dashboard → Media
2. Upload all anime poster images (anime_hero_banner_*.png, anime_poster_*.png, etc.)
3. Images will be stored in `/wp-content/uploads/`
4. Website automatically finds, displays, and sizes them correctly with proper aspect ratio

---

## Asset Files Location
**Path**: `wordpress-theme/assets/`
- CSS: `index-DcvmkrFt.css` (React compiled styles)
- JS: `index-dGTOy_ll.js` (React app bundle)
- Images: Anime poster images in PNG format

---

## Theme File Structure
```
wordpress-theme/
├── assets/              # Compiled CSS, JS, and images
│   ├── index-DcvmkrFt.css
│   ├── index-dGTOy_ll.js
│   └── *.png           # Image files
├── header.php          # HTML head, body open, wp_head() hook
├── footer.php          # wp_footer() hook, body close, html close
├── index.php           # Main page template with React mount point
├── functions.php       # Theme functions and hooks
└── style.css           # Theme metadata
```

**File Responsibilities**:
- **header.php**: Minimal boilerplate only (<!DOCTYPE>, wp_head, wp_body_open) - React renders navbar
- **footer.php**: Minimal boilerplate only (wp_footer, closing tags) - React renders footer
- **index.php**: Clean page content with just React mount point (#root)
- **functions.php**: Theme setup, font loading, image handling, CSS/JS enqueuing
- **customizer.php**: Settings for header/footer customization (data available to React or PHP)

---

## Key Functions

1. **hentai_saga_scripts()** - Enqueues compiled React CSS/JS
2. **hentai_saga_fonts()** - Loads Inter, Orbitron, Rajdhani from Google Fonts
3. **hentai_saga_custom_css()** - Injects CSS variables and image styling
4. **hentai_saga_create_pages()** - Auto-creates policy pages on theme activation
5. **hentai_saga_customize_register()** - Registers customizer settings for header/footer
6. **hentai_saga_get_footer_link($key)** - Gets footer link by key
7. **hentai_saga_get_all_footer_links()** - Gets all footer links

## Admin Customizer Settings

**How to Access:**
1. Go to WordPress Dashboard
2. Click on **Appearance** → **Customize**
3. You'll see two new panels:
   - **Hentai Saga - Header Settings**
   - **Hentai Saga - Footer Settings**

### Header Settings (customizer.php):
- **Header Logo Text** - Main logo text displayed in header (default: "HENTAI SAGA")
- **Header Logo URL** - URL the logo links to when clicked (default: homepage)

### Footer Settings (customizer.php):
- **Footer Logo Text** - Text shown in footer logo area (default: "HENTAI SAGA")
- **Footer Copyright Text** - Copyright notice (default: "© 2025 Hentai Saga. All rights reserved.")

### Footer Links - 9 Customizable Links:
For each link you can customize:
- **Link Text** - The display text
- **Link URL** - The destination URL

Available footer links:
1. Privacy Policy
2. Terms of Service
3. DMCA Copyright Policy
4. USC 2257
5. Cookie Policy
6. Disclaimer
7. Advertisement Policy
8. Age Restriction Policy
9. Parental Controls

**Example Use Case:**
- Change "Privacy Policy" text to "Privacy"
- Change "Advertisement Policy" URL to your custom page
- Hide a link by leaving it blank (won't display if text is empty)
- Add new URLs or domains as needed

### Theme Files Structure:
- **customizer.php** - All customizer settings and helper functions
- **header.php** - Uses customizer settings for logo text and URL
- **footer.php** - Uses customizer settings for footer content
- **functions.php** - Loads the customizer.php file

### Helper Functions:
```php
// Get a single footer link by key
$link = hentai_saga_get_footer_link('privacy');
// Returns: ['text' => 'Privacy Policy', 'url' => 'https://...']

// Get all footer links
$links = hentai_saga_get_all_footer_links();
// Returns array of all active footer links
```

---

## WordPress Hooks Used
- `wp_enqueue_scripts` - Load CSS and JavaScript
- `wp_head` - Custom CSS injection
- `after_switch_theme` - Create pages on activation

---

## Important Notes
- All fonts are served from Google Fonts CDN
- Colors use HSL notation for exact matching with React app
- Footer uses inline styles (not Tailwind) but achieves same visual result
- Responsive design uses inline media query display properties
- All page slugs are lowercase with hyphens
- Design must match React app - never deviate without updating React first

---

## Maintenance Checklist
When updating the theme:
- [ ] Check `/client/src/components/footer.tsx` for any changes
- [ ] Check `/client/src/index.css` for color/font changes
- [ ] Update WordPress theme to match exactly
- [ ] Test responsive design (desktop and mobile)
- [ ] Verify all footer links work with lowercase slugs
- [ ] Test font loading from Google Fonts
- [ ] Verify image display and scaling

---

## Next Steps (If Needed)
- Monitor React app changes and sync to WordPress theme immediately
- Test theme with different WordPress configurations
- Optimize image loading if needed
- Add custom WordPress widgets that match React design
- Ensure all policy pages have proper content
