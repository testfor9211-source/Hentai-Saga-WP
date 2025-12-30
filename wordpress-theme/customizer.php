<?php
/**
 * Theme Customizer for Header and Footer Settings
 * Allows admins to customize header logo, footer links, and other branding elements
 */

function hentai_saga_customize_register($wp_customize) {
    // ========== HEADER SETTINGS ==========
    $wp_customize->add_section('hentai_saga_header', array(
        'title'    => 'Hentai Saga - Header Settings',
        'priority' => 30,
        'description' => 'Customize your header logo, text, and links'
    ));

    // Header Logo Text
    $wp_customize->add_setting('hentai_saga_header_text', array(
        'default' => 'HENTAI SAGA',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hentai_saga_header_text', array(
        'label'   => 'Header Logo Text',
        'section' => 'hentai_saga_header',
        'type'    => 'text',
        'description' => 'Enter the text that appears in the header logo'
    ));

    // Header Logo URL
    $wp_customize->add_setting('hentai_saga_header_url', array(
        'default' => home_url('/'),
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('hentai_saga_header_url', array(
        'label'   => 'Header Logo URL',
        'section' => 'hentai_saga_header',
        'type'    => 'url',
        'description' => 'Where the logo links to (usually homepage)'
    ));

    // ========== FOOTER SETTINGS ==========
    $wp_customize->add_section('hentai_saga_footer', array(
        'title'    => 'Hentai Saga - Footer Settings',
        'priority' => 31,
        'description' => 'Customize your footer links, icons, and text'
    ));

    // Footer Logo Text
    $wp_customize->add_setting('hentai_saga_footer_text', array(
        'default' => 'HENTAI SAGA',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hentai_saga_footer_text', array(
        'label'   => 'Footer Logo Text',
        'section' => 'hentai_saga_footer',
        'type'    => 'text',
        'description' => 'Enter the text that appears in the footer logo'
    ));

    // Footer Copyright Text
    $wp_customize->add_setting('hentai_saga_footer_copyright', array(
        'default' => '© 2025 Hentai Saga. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hentai_saga_footer_copyright', array(
        'label'   => 'Footer Copyright Text',
        'section' => 'hentai_saga_footer',
        'type'    => 'text',
        'description' => 'Copyright notice shown in footer'
    ));

    // ========== FOOTER LINKS ==========
    $footer_links = array(
        'privacy' => 'Privacy Policy',
        'terms' => 'Terms of Service',
        'dmca' => 'DMCA Copyright Policy',
        'usc' => 'USC 2257',
        'cookies' => 'Cookie Policy',
        'disclaimer' => 'Disclaimer',
        'ads' => 'Advertisement Policy',
        'age' => 'Age Restriction Policy',
        'parental' => 'Parental Controls'
    );

    foreach ($footer_links as $key => $label) {
        // Link Text
        $wp_customize->add_setting('hentai_saga_footer_' . $key . '_text', array(
            'default' => $label,
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('hentai_saga_footer_' . $key . '_text', array(
            'label'   => $label . ' - Link Text',
            'section' => 'hentai_saga_footer',
            'type'    => 'text'
        ));

        // Link URL
        $default_url = home_url('/' . strtolower(str_replace(' ', '-', $label)) . '/');
        $wp_customize->add_setting('hentai_saga_footer_' . $key . '_url', array(
            'default' => $default_url,
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('hentai_saga_footer_' . $key . '_url', array(
            'label'   => $label . ' - URL',
            'section' => 'hentai_saga_footer',
            'type'    => 'url'
        ));
    }
}
add_action('customize_register', 'hentai_saga_customize_register');

/**
 * Helper function to get footer link
 */
function hentai_saga_get_footer_link($key) {
    $text = get_theme_mod('hentai_saga_footer_' . $key . '_text', '');
    $url = get_theme_mod('hentai_saga_footer_' . $key . '_url', '');
    
    if (empty($text) || empty($url)) {
        return null;
    }

    return array(
        'text' => $text,
        'url' => $url
    );
}

/**
 * Get all footer links
 */
function hentai_saga_get_all_footer_links() {
    $links = array();
    $footer_keys = array('privacy', 'terms', 'dmca', 'usc', 'cookies', 'disclaimer', 'ads', 'age', 'parental');
    
    foreach ($footer_keys as $key) {
        $link = hentai_saga_get_footer_link($key);
        if ($link) {
            $links[] = $link;
        }
    }
    
    return $links;
}
?>
