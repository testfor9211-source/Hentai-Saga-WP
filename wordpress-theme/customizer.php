<?php
/**
 * Theme Customizer Helper Functions
 * Gets customizer setting values for use in templates and React app
 */

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
