<?php
/**
 * Plugin Name: Hentai Saga Authors Taxonomy
 * Plugin URI: https://hentaisaga.xxx
 * Description: Adds a custom hierarchical Authors taxonomy for Posts, exactly like Categories
 * Version: 1.0.1
 * Author: Hentai Saga Team
 * Author URI: https://hentaisaga.xxx
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: hentai-saga-authors
 * Domain Path: /languages
 *
 * @package HentaiSagaAuthors
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Authors Taxonomy
 *
 * Creates a hierarchical custom taxonomy for Posts.
 * Behaves exactly like Categories with full Gutenberg and Yoast SEO support.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_register_authors_taxonomy() {
    
    // Labels for the Authors taxonomy
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

    // Register the Authors taxonomy
    register_taxonomy(
        'authors', // Taxonomy slug
        'post',    // Associated post type
        array(
            'labels'                => $labels,
            'description'           => __( 'Authors for organizing content', 'hentai-saga-authors' ),
            'public'                => true,
            'publicly_queryable'    => true,
            'hierarchical'          => true, // Like Categories (not Tags)
            'show_ui'               => true, // Show in admin
            'show_in_menu'          => true, // Show in admin menu
            'show_in_nav_menus'     => true, // Available in navigation menus
            'show_tagcloud'         => true, // Show tag cloud
            'show_in_quick_edit'    => true, // Show in quick edit
            'show_admin_column'     => true, // Show in posts list table
            'meta_box_cb'           => 'post_categories_meta_box', // Use the hierarchical category metabox interface
            
            // REST API / Gutenberg support
            'show_in_rest'          => true,
            'rest_base'             => 'authors',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            
            // Permalinks
            'rewrite'               => array(
                'slug'         => 'author',
                'with_front'   => false,
                'hierarchical' => true,
            ),
            
            // Capability mapping
            'capabilities'          => array(
                'manage_terms' => 'manage_categories',
                'edit_terms'   => 'edit_posts',
                'delete_terms' => 'manage_categories',
                'assign_terms' => 'edit_posts',
            ),
            
            // Sorting
            'sort'                  => true,
            'default_term'          => array(
                'name'        => __( 'Uncategorized', 'hentai-saga-authors' ),
                'slug'        => 'uncategorized',
                'description' => __( 'Default author', 'hentai-saga-authors' ),
            ),
        )
    );
}

// Hook into init to register the taxonomy
add_action( 'init', 'hentai_saga_register_authors_taxonomy', 0 );

/**
 * Yoast SEO Compatibility
 *
 * Ensures Yoast SEO automatically detects and supports the Authors taxonomy.
 * Makes archive pages indexable and prevents duplicate content issues.
 *
 * @since 1.0.0
 * @param array $taxonomies List of taxonomies.
 * @return array
 */
function hentai_saga_authors_yoast_seo_compatible( $taxonomies ) {
    if ( function_exists( 'YoastSEO' ) || function_exists( 'wpseo_get_terms' ) ) {
        $taxonomies[] = 'authors';
    }
    return $taxonomies;
}

// Hook for Yoast SEO compatibility
add_filter( 'wpseo_accessible_post_types', 'hentai_saga_authors_yoast_seo_compatible' );

/**
 * Set Author Archive Pages as Indexable
 *
 * Ensures Yoast SEO treats author archive pages as indexable.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_authors_archive_indexable() {
    // This ensures Yoast treats author archives as content
    if ( function_exists( 'YoastSEO' ) ) {
        add_filter(
            'wpseo_robots',
            function( $robots ) {
                if ( is_tax( 'authors' ) ) {
                    // Remove 'noindex' if present, ensures indexable
                    $robots = str_replace( 'noindex', '', $robots );
                }
                return $robots;
            }
        );
    }
}

add_action( 'wp', 'hentai_saga_authors_archive_indexable' );

/**
 * Plugin Activation Hook
 *
 * Flushes rewrite rules on activation to create proper permalinks.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_authors_activate() {
    // Register the taxonomy on activation
    hentai_saga_register_authors_taxonomy();
    
    // Flush rewrite rules to create proper author archive URLs
    flush_rewrite_rules( false );
}

register_activation_hook( __FILE__, 'hentai_saga_authors_activate' );

/**
 * Plugin Deactivation Hook
 *
 * Flushes rewrite rules on deactivation to clean up permalinks.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_authors_deactivate() {
    // Flush rewrite rules
    flush_rewrite_rules( false );
}

register_deactivation_hook( __FILE__, 'hentai_saga_authors_deactivate' );

/**
 * Ensure Taxonomy Stays Registered
 *
 * Some operations require the taxonomy to be re-registered.
 * This ensures it persists across all admin pages.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_authors_ensure_registered() {
    if ( ! taxonomy_exists( 'authors' ) ) {
        hentai_saga_register_authors_taxonomy();
    }
}

add_action( 'admin_init', 'hentai_saga_authors_ensure_registered' );
add_action( 'wp', 'hentai_saga_authors_ensure_registered' );

/**
 * Add Authors Taxonomy to Admin Menu Ordering
 *
 * Ensures Authors appears in the correct position in the Posts submenu.
 *
 * @since 1.0.0
 * @return void
 */
function hentai_saga_authors_menu_position() {
    global $menu, $submenu;
    
    // Authors taxonomy admin page uses the 'authors' query arg
    // It will appear below Tags automatically due to registration order
}

add_action( 'admin_menu', 'hentai_saga_authors_menu_position' );
