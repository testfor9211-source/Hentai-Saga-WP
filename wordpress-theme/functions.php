<?php
/**
 * Theme functions and definitions
 */

function hentai_saga_scripts() {
    wp_enqueue_style('hentai-saga-styles', get_template_directory_uri() . '/assets/index-DcvmkrFt.css');
    wp_enqueue_script('hentai-saga-js', get_template_directory_uri() . '/assets/index-dGTOy_ll.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'hentai_saga_scripts');

// Add theme support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
