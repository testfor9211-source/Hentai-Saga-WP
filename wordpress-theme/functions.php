<?php
/**
 * Theme functions and definitions
 */

function hentai_saga_scripts() {
    wp_enqueue_style('hentai-saga-styles', get_template_directory_uri() . '/assets/index-DcvmkrFt.css');
    wp_enqueue_script('hentai-saga-js', get_template_directory_uri() . '/assets/index-dGTOy_ll.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'hentai_saga_scripts');

// Add custom font
function hentai_saga_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@400;700;900&family=Rajdhani:wght@400;500;600;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'hentai_saga_fonts');

// Add theme support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

// Fix image paths for proper loading
function hentai_saga_custom_css() {
    $theme_uri = get_template_directory_uri();
    echo '<style>
    :root {
        --font-sans: "Inter", sans-serif;
        --font-display: "Orbitron", sans-serif;
        --font-ui: "Rajdhani", sans-serif;
        --theme-uri: "' . $theme_uri . '";
    }
    body {
        font-family: var(--font-sans);
    }
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }
    .wp-image-* {
        max-width: 100%;
        height: auto;
    }
    /* Fix image paths in compiled assets */
    img[src*="anime_"] {
        max-width: 100%;
        height: auto;
    }
    </style>';
}
add_action('wp_head', 'hentai_saga_custom_css');

// Rewrite image URLs to point to WordPress uploads folder
function hentai_saga_rewrite_asset_urls() {
    $upload_dir = wp_upload_dir();
    $uploads_url = $upload_dir['baseurl'];
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Fix image URLs in the page - rewrite to WordPress uploads folder
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (img.src && img.src.includes('anime_')) {
                const filename = img.src.split('/').pop();
                img.src = '<?php echo $uploads_url; ?>/' + filename;
            }
        });
        
        // Also fix any background images in styles
        const elements = document.querySelectorAll('[style*="background"]');
        elements.forEach(el => {
            if (el.style.backgroundImage && el.style.backgroundImage.includes('anime_')) {
                const url = el.style.backgroundImage.match(/url\(['"]?([^'")]+)['"]?\)/)[1];
                const filename = url.split('/').pop();
                el.style.backgroundImage = 'url(<?php echo $uploads_url; ?>/' + filename + ')';
            }
        });
        
        // Fix any images in CSS that reference anime files
        const styleSheets = document.styleSheets;
        for (let i = 0; i < styleSheets.length; i++) {
            try {
                const rules = styleSheets[i].cssRules || styleSheets[i].rules;
                for (let j = 0; j < rules.length; j++) {
                    const rule = rules[j];
                    if (rule.style && rule.style.backgroundImage && rule.style.backgroundImage.includes('anime_')) {
                        const url = rule.style.backgroundImage.match(/url\(['"]?([^'")]+)['"]?\)/)[1];
                        const filename = url.split('/').pop();
                        rule.style.backgroundImage = 'url(<?php echo $uploads_url; ?>/' + filename + ')';
                    }
                }
            } catch (e) {
                // Skip stylesheets we can't access (external, cross-origin, etc)
            }
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'hentai_saga_rewrite_asset_urls');

// Create lowercase page slug support
function hentai_saga_create_pages() {
    $pages = array(
        'privacy-policy' => 'Privacy Policy',
        'terms-of-service' => 'Terms of Service',
        'cookie-policy' => 'Cookie Policy',
        'disclaimer' => 'Disclaimer',
        'dmca-copyright-policy' => 'DMCA Copyright Policy',
        'advertisement-policy' => 'Advertisement Policy',
        'parental-controls' => 'Parental Controls',
        'age-restriction-policy' => 'Age Restriction Policy',
        'usc-2257' => 'USC 2257',
    );
    
    foreach ($pages as $slug => $title) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            wp_insert_post(array(
                'post_type'   => 'page',
                'post_title'  => $title,
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_content' => 'Page content goes here.',
            ));
        }
    }
}
add_action('after_switch_theme', 'hentai_saga_create_pages');
