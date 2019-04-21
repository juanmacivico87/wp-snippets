<?php
/**
 * A snippet to create a new custom post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package jmc87_cpt
 */

function jmc87_add_custom_post_type()
{
    $post_type  = 'sample';
    $slug       = 'samples';
    $singular   = 'Sample';
    $plural     = 'Samples';
    $textdomain = 'jmc87_cpt_textdomain';

    $support    = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' );
    $taxonomies = array( 'custom_cat', 'custom_tag' );
    $rewrite    = array( 
        'slug'       => $slug,
        'with_front' => false,
        'feeds'      => false,
        'pages'      => true,
    );

    $args = array(
        'labels' => array(
            'name'                     => __( $plural, $textdomain ),
            'singular_name'            => __( $singular, $textdomain ),
            'add_new'                  => __( 'Add new', $textdomain ),
            'add_new_item'             => __( 'Add new ' . $singular, $textdomain ),
            'edit_item'                => __( 'Edit ' . $singular, $textdomain ),
            'new_item'                 => __( 'New ' . $singular, $textdomain ),
            'view_item'                => __( 'View ' . $singular, $textdomain ),
            'view_items'               => __( 'View ' . $plural, $textdomain ),
            'search_items'             => __( 'Search ' . $plural, $textdomain ),
            'not_found'                => __( $singular . ' not Found', $textdomain ),
            'not_found_in_trash'       => __( $singular . ' not Found in Trash', $textdomain ),
            'parent_item_colon'        => __( 'Parent ' . $singular . ':', $textdomain ),
            'all_items'                => __( 'All ' . $plural, $textdomain ),
            'archives'                 => __( $singular . ' Archives', $textdomain ),
            'attributes'               => __( $singular . ' Attributes', $textdomain ),
            'insert_into_item'         => __( 'Insert into ' . $singular, $textdomain ),
            'uploaded_to_this_item'    => __( 'Uploaded to this ' . $singular, $textdomain ),
            'featured_image'           => __( 'Featured Image', $textdomain ),
            'set_featured_image'       => __( 'Set Featured Image', $textdomain ),
            'remove_featured_image'    => __( 'Remove Featured Image', $textdomain ),
            'use_featured_image'       => __( 'Use Featured Image', $textdomain ),
            'menu_name'                => __( $plural, $textdomain ),
            'filter_items_list'        => __( 'Filter ' . $plural . ' List', $textdomain ),
            'items_list_navigation'    => __( $plural . ' List Navigation', $textdomain ),
            'items_list'               => __( $plural . ' List', $textdomain ),
            'name_admin_bar'           => __( $plural, $textdomain ),
            'item_published'           => __( $singular . ' Published', $textdomain ),
            'item_published_privately' => __( $singular . ' Published Privately', $textdomain ),
            'item_reverted_to_draft'   => __( $singular . ' Reverte to Draft', $textdomain ),
            'item_scheduled'           => __( $singular . ' Scheduled', $textdomain ),
            'item_updated'             => __( $singular . ' Updated', $textdomain ),
        ),
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-wordpress',
        'hierarchical'        => true,
        'supports'            => $support,
        'taxonomies'          => $taxonomies,
        'has_archive'         => false,
        'rewrite'             => $rewrite,
        'query_var'           => true,
        'can_export'          => true,
        'delete_with_user'    => false,
        'show_in_rest'        => true,
    );

	register_post_type( $post_type, $args );
}
add_action( 'init', 'jmc87_add_custom_post_type', 10 );

//Fix 404 error
flush_rewrite_rules();