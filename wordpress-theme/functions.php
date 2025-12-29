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
    echo '<style>
    :root {
        --font-sans: "Inter", sans-serif;
        --font-display: "Orbitron", sans-serif;
        --font-ui: "Rajdhani", sans-serif;
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
    </style>';
}
add_action('wp_head', 'hentai_saga_custom_css');

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
