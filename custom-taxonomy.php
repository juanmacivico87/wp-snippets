<?php
/**
 * A snippet to create a new custom taxonomy for a post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package jmc87_custom_taxonomy
 */

function jmc87_add_custom_taxonomy()
{
    $taxonomy   = 'custom_cat';
    $slug       = 'custom-cat';
    $singular   = 'Custom Category';
    $plural     = 'Custom Categories';
    $post_type  = 'sample';
    $textdomain = 'jmc87_taxonomy';

    $rest_base  = $taxonomy;
    $query_var  = $taxonomy;
    $rewrite    = array( 
        'slug'          => $slug,
        'with_front'    => false,
        'hierarchical'  => false,
        'ep_mask'       => EP_NONE,
    );

    $args = array(
        'label'  => __( $plural, $textdomain ),
        'labels' => array(
            'name'                       => __( $plural, $textdomain ),
            'singular_name'              => __( $singular, $textdomain ),
            'menu_name'                  => __( $plural, $textdomain ),
            'all_items'                  => __( 'All ' . $plural, $textdomain ),
            'edit_item'                  => __( 'Edit ' . $singular, $textdomain ),
            'view_item'                  => __( 'View ' . $singular, $textdomain ),
            'update_item'                => __( 'Update ' . $singular, $textdomain ),
            'add_new_item'               => __( 'Add new ' . $singular, $textdomain ),
            'new_item_name'              => __( 'New ' . $singular . ' Name', $textdomain ),
            'parent_item'                => __( 'Parent ' . $singular, $textdomain ),
            'parent_item_colon'          => __( 'Parent ' . $singular . ':', $textdomain ),
            'search_items'               => __( 'Search ' . $plural, $textdomain ),
            'popular_items'              => __( 'Popular ' . $plural, $textdomain ),
            'separate_items_with_commas' => __( 'Separate ' . $plural . ' with Commas', $textdomain ),
            'add_or_remove_items'        => __( 'Add or remove ' . $plural, $textdomain ),
            'choose_from_most_used'      => __( 'Choose from most used ' . $plural, $textdomain ),
            'not_found'                  => __( $plural . ' not Found', $textdomain ),
            'back_to_items'              => __( 'Back to ' . $plural, $textdomain ),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'rest_base' => $rest_base,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'description' => '',
        'hierarchical' => true,
        'query_var' => $query_var,
        'rewrite' => $rewrite
    );

    register_taxonomy( $taxonomy, $post_type, $args );
}
add_action( 'init', 'jmc87_add_custom_taxonomy', 10 );