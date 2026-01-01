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
- Plugin Icon: `Logo.jpg`

## Theme Metadata
- **Screenshot**: `wordpress-theme/screenshot.jpg` (Renamed from Theme-Banner.jpg for WordPress compatibility)

---

## Theme File Structure
```
wordpress-theme/
├── assets/              # Compiled CSS, JS, and images
│   ├── index-DcvmkrFt.css
│   ├── index-dGTOy_ll.js
│   └── *.png           # Image files
├── header.php          # Theme header template
├── footer.php          # Footer matching React design
├── index.php           # Main template file
├── functions.php       # Theme functions and hooks
└── style.css           # Theme metadata
```

---

## Key Functions

1. **hentai_saga_scripts()** - Enqueues compiled React CSS/JS
2. **hentai_saga_fonts()** - Loads Inter, Orbitron, Rajdhani from Google Fonts
3. **hentai_saga_custom_css()** - Injects CSS variables and image styling
4. **hentai_saga_create_pages()** - Auto-creates policy pages on theme activation

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

---

## Plugins Installed

### 1. Hentai Saga Authors Taxonomy Plugin ✅
**File**: `wordpress-theme/hentai-saga-authors-taxonomy.php`

**Purpose**: Adds a custom hierarchical "Authors" taxonomy that works exactly like Categories

**Features**:
- Hierarchical (supports parent/child authors)
- Appears under Posts in WordPress admin menu
- Identical UI to Categories (Add/Edit/Delete interface)
- Selectable in post editor (checkbox interface like Categories)
- **Gutenberg Support**: Enabled and fixed to show in sidebar
- **Yoast SEO Compatible**:
  - Automatically detected as accessible taxonomy
  - Archive pages set to indexable
  - **Primary Term support enabled** (select a "Main Author" for SEO)
- Archive URLs: `/author/author-name/`
- Automatic rewrite rule generation

**Installation Instructions**:
1. Go to WordPress Dashboard → Plugins → Add New
2. Upload the `hentai-saga-authors-taxonomy.php` file
3. Activate the plugin
4. New "Authors" menu item appears below Posts (under Tags)
5. Start adding authors and assigning them to posts

**How to Use**:
1. **Add New Author**:
   - Go to Posts → Authors
   - Click "Add New Author"
   - Fill in author name and description
   - Optional: Assign to parent author for hierarchy

2. **Assign Author to Post**:
   - Edit or create a post
   - Look for "Authors" box on right sidebar (like Categories)
   - Select author(s) with checkboxes
   - Publish the post

3. **View Author Archive**:
   - Visit: `/author/author-slug/`
   - Shows all posts assigned to that author

**Technical Details**:
- Taxonomy Slug: `authors`
- Archive Slug: `author`
- Hierarchical: Yes (like Categories, not Tags)
- Public: Yes (indexed by search engines)
- REST API: Enabled (`show_in_rest = true`)
- Yoast SEO: Automatically detected
- Capabilities: Uses standard post editing capabilities

**Why This Plugin?**
- More organized than Tags
- Supports hierarchies (main author → contributor)
- Better for content attribution
- Yoast SEO treats author archives as indexable
- No duplicate content issues

---

## Next Steps (If Needed)
- Monitor React app changes and sync to WordPress theme immediately
- Test theme with different WordPress configurations
- Optimize image loading if needed
- Add custom WordPress widgets that match React design
- Ensure all policy pages have proper content
