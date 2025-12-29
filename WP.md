# WordPress Theme - Memory Documentation

## Theme Name
**Hentai Saga** - A modern WordPress theme converted from a React application

## Current Status - All Issues Fixed ✅

### 1. "Running application" Message - REMOVED ✅
- **File**: `wordpress-theme/index.php`
- **Status**: No loading message is present. React mounts directly to the `<div id="root">`
- **Result**: Clean page load without any temporary loading text

### 2. Custom Font Implementation - UPDATED ✅
- **Fonts Used**: 
  - `Inter` (400, 500, 600, 700) - Main body font
  - `Orbitron` (400, 700, 900) - Display/heading font
  - `Rajdhani` (400, 500, 600, 700) - UI font
- **Google Fonts URL**: Integrated in `functions.php` via `hentai_saga_fonts()` function
- **CSS Variables**: 
  - `--font-sans`: "Inter" for body text
  - `--font-display`: "Orbitron" for headings
  - `--font-ui`: "Rajdhani" for UI elements
- **File**: `wordpress-theme/functions.php`
- **Status**: ✅ All three custom fonts loaded from Google Fonts

### 3. Image Loading - FIXED ✅
- **Solution**: Enhanced CSS rules in `hentai_saga_custom_css()` function
- **CSS Rules**: 
  - `max-width: 100%` - Responsive width
  - `height: auto` - Maintains aspect ratio
  - `display: block` - Proper image rendering
  - `.wp-image-*` - WordPress image class support
- **Image Path**: Images stored in `wordpress-theme/assets/`
- **Supported Formats**: PNG, JPG, WebP
- **Status**: ✅ Images will load and scale properly

### 4. Footer with WordPress Pages - CONFIGURED ✅
- **Implementation**: `wordpress-theme/footer.php` with 3-column responsive layout
- **Policy Pages Created** (Automatic on theme activation):
  - `/privacy-policy` - Privacy Policy
  - `/terms-of-service` - Terms of Service
  - `/cookie-policy` - Cookie Policy
  - `/disclaimer` - Disclaimer
  - `/dmca-copyright-policy` - DMCA Copyright Policy
  - `/advertisement-policy` - Advertisement Policy
  - `/age-restriction-policy` - Age Restriction Policy
  - `/parental-controls` - Parental Controls
  - `/usc-2257` - USC 2257

- **URL Format**: All URLs are in lowercase (WordPress native slugs)
- **Implementation Method**: Uses `site_url()` function for proper WordPress URL generation
- **Auto-creation**: `hentai_saga_create_pages()` in `functions.php` creates pages on theme activation
- **File**: `wordpress-theme/footer.php`
- **Status**: ✅ All footer links use proper lowercase WordPress page URLs

### 5. Footer Layout
- **Design**: 3-column grid (responsive on mobile)
- **Styling**: Dark background (#1f2937) with light text (#9ca3af)
- **Sections**:
  - **Policies**: Privacy, Terms, Cookie, Disclaimer
  - **Legal**: DMCA, Advertisement, USC 2257
  - **Support**: Age Restriction, Parental Controls
- **Mobile**: Responsive design adapts to smaller screens

## Asset Files Location
- **Path**: `wordpress-theme/assets/`
- **Contents**:
  - CSS: `index-DcvmkrFt.css` (Main stylesheet)
  - JS: `index-dGTOy_ll.js` (React app bundle)
  - Images: Anime poster images (PNG format)

## Theme Structure
```
wordpress-theme/
├── assets/          # CSS, JS, and image files
├── header.php       # Theme header template
├── footer.php       # Theme footer with policy links
├── index.php        # Main template file
├── functions.php    # Theme functions and hooks
└── style.css        # Theme metadata
```

## Key Functions
1. **hentai_saga_scripts()** - Enqueues CSS/JS from assets folder
2. **hentai_saga_fonts()** - Loads Inter, Orbitron, Rajdhani from Google Fonts
3. **hentai_saga_custom_css()** - Injects CSS for fonts, images, and responsive sizing
4. **hentai_saga_create_pages()** - Auto-creates all policy pages on theme activation

## WordPress Hooks Used
- `wp_enqueue_scripts` - For loading CSS and JavaScript
- `wp_head` - For custom CSS injection
- `after_switch_theme` - For creating pages on theme activation

## Font Stack (in order of priority)
1. **Inter** - Main body text (sans-serif)
2. **Orbitron** - Display/headings (sans-serif)
3. **Rajdhani** - UI elements (sans-serif)
4. System fonts as fallback

## Image Handling
- Responsive sizing with `max-width: 100%`
- Automatic aspect ratio preservation
- WordPress image class compatibility
- Proper display as block elements
- No hardcoded image dimensions (responsive by default)

## Page Slug Convention
- All page slugs use lowercase with hyphens
- WordPress automatically creates these slugs when pages are created
- Example: "Privacy Policy" → `/privacy-policy`
- Example: "Terms of Service" → `/terms-of-service`

## Notes for Future Maintenance
- Fonts are loaded from Google Fonts CDN (ensure internet connectivity)
- Image assets should be uploaded to WordPress media library for best compatibility
- Policy page content can be edited in WordPress admin panel
- Footer styling uses inline CSS for portability
- React app is bundled in assets folder - rebuild if making changes to React code
