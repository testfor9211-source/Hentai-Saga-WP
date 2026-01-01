<?php
/**
 * Plugin Name: Hentai Saga Authors Taxonomy
 * Plugin URI: https://hentaisaga.xxx
 * Description: Adds a custom hierarchical Authors taxonomy for Posts, exactly like Categories
 * Version: 1.0.2
 * Author: Hentai Saga Team
 * Author URI: https://hentaisaga.xxx
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: hentai-saga-authors
 * Domain Path: /languages
 * Icon URI: assets/Logo.jpg
 *
 * @package HentaiSagaAuthors
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Authors Taxonomy
 */
function hentai_saga_register_authors_taxonomy() {
    
    $labels = array(
        'name'                       => _x( 'Authors', 'taxonomy general name', 'hentai-saga-authors' ),
        'singular_name'              => _x( 'Author', 'taxonomy singular name', 'hentai-saga-authors' ),
        'search_items'               => __( 'Search Authors', 'hentai-saga-authors' ),
        'popular_items'              => __( 'Popular Authors', 'hentai-saga-authors' ),
        'all_items'                  => __( 'All Authors', 'hentai-saga-authors' ),
        'parent_item'                => __( 'Parent Author', 'hentai-saga-authors' ),
        'parent_item_colon'          => __( 'Parent Author:', 'hentai-saga-authors' ),
        'edit_item'                  => __( 'Edit Author', 'hentai-saga-authors' ),
        'view_item'                  => __( 'View Author', 'hentai-saga-authors' ),
        'update_item'                => __( 'Update Author', 'hentai-saga-authors' ),
        'add_new_item'               => __( 'Add New Author', 'hentai-saga-authors' ),
        'new_item_name'              => __( 'New Author Name', 'hentai-saga-authors' ),
        'new_item'                   => __( 'New Author', 'hentai-saga-authors' ),
        'menu_name'                  => __( 'Authors', 'hentai-saga-authors' ),
        'separate_items_with_commas' => __( 'Separate authors with commas', 'hentai-saga-authors' ),
        'add_or_remove_items'        => __( 'Add or remove authors', 'hentai-saga-authors' ),
        'choose_from_most_used'      => __( 'Choose from the most used authors', 'hentai-saga-authors' ),
        'not_found'                  => __( 'No authors found.', 'hentai-saga-authors' ),
        'no_terms'                   => __( 'No authors', 'hentai-saga-authors' ),
        'back_to_items'              => __( '← Back to Authors', 'hentai-saga-authors' ),
    );

    register_taxonomy(
        'authors',
        array( 'post' ), // Explicitly as array
        array(
            'labels'                => $labels,
            'description'           => __( 'Authors for organizing content', 'hentai-saga-authors' ),
            'public'                => true,
            'publicly_queryable'    => true,
            'hierarchical'          => true, 
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true, // Essential for Gutenberg
            'rest_base'             => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'rewrite'               => array(
                'slug'         => 'author',
                'with_front'   => false,
                'hierarchical' => true,
            ),
            'capabilities'          => array(
                'manage_terms' => 'manage_categories',
                'edit_terms'   => 'edit_posts',
                'delete_terms' => 'manage_categories',
                'assign_terms' => 'edit_posts',
            ),
            'sort'                  => true,
        )
    );
}
add_action( 'init', 'hentai_saga_register_authors_taxonomy', 0 );

/**
 * Yoast SEO Compatibility
 */
function hentai_saga_authors_yoast_seo_compatible( $taxonomies ) {
    if ( ! in_array( 'authors', (array) $taxonomies ) ) {
        $taxonomies[] = 'authors';
    }
    return $taxonomies;
}
add_filter( 'wpseo_accessible_post_types', 'hentai_saga_authors_yoast_seo_compatible' );

/**
 * Enable Yoast SEO Primary Term for Authors
 */
function hentai_saga_authors_yoast_primary_term( $taxonomies, $post_type, $all_taxonomies ) {
    if ( $post_type === 'post' && isset( $all_taxonomies['authors'] ) ) {
        $taxonomies['authors'] = $all_taxonomies['authors'];
    }
    return $taxonomies;
}
add_filter( 'wpseo_primary_term_taxonomies', 'hentai_saga_authors_yoast_primary_term', 10, 3 );

/**
 * Set Author Archive Pages as Indexable
 */
function hentai_saga_authors_archive_indexable() {
    if ( function_exists( 'YoastSEO' ) ) {
        add_filter( 'wpseo_robots', function( $robots ) {
            if ( is_tax( 'authors' ) ) {
                $robots = str_replace( 'noindex', '', $robots );
            }
            return $robots;
        });
    }
}
add_action( 'wp', 'hentai_saga_authors_archive_indexable' );

/**
 * Plugin Activation
 */
function hentai_saga_authors_activate() {
    hentai_saga_register_authors_taxonomy();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'hentai_saga_authors_activate' );

/**
 * Plugin Deactivation
 */
function hentai_saga_authors_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'hentai_saga_authors_deactivate' );
