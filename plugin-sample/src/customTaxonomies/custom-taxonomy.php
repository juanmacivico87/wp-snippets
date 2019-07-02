<?php
/**
 * A snippet to create a new custom taxonomy for a post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package jmc87_custom_taxonomy
 */

class JMC87_CustomTaxonomy
{
    public $taxonomy   = 'custom_cat';
    public $singular   = 'Custom Category';
    public $plural     = 'Custom Categories';
    public $post_type  = 'sample';

    public $rest_base  = 'custom_cat';
    public $query_var  = 'custom_cat';
    public $rewrite    = array( 
        'slug'          => 'custom-cat',
        'with_front'    => false,
        'hierarchical'  => false,
        'ep_mask'       => EP_NONE,
    );

    public function __construct()
    {
        add_action( 'init', array( $this, 'jmc87_add_custom_taxonomy' ) );
    }

    public function jmc87_add_custom_taxonomy()
    {
        $args = array(
            'label'  => __( $this->plural, PLG_TEXTDOMAIN ),
            'labels' => array(
                'name'                       => __( $this->plural, PLG_TEXTDOMAIN ),
                'singular_name'              => __( $this->singular, PLG_TEXTDOMAIN ),
                'menu_name'                  => __( $this->plural, PLG_TEXTDOMAIN ),
                'all_items'                  => __( 'All ' . $this->plural, PLG_TEXTDOMAIN ),
                'edit_item'                  => __( 'Edit ' . $this->singular, PLG_TEXTDOMAIN ),
                'view_item'                  => __( 'View ' . $this->singular, PLG_TEXTDOMAIN ),
                'update_item'                => __( 'Update ' . $this->singular, PLG_TEXTDOMAIN ),
                'add_new_item'               => __( 'Add new ' . $this->singular, PLG_TEXTDOMAIN ),
                'new_item_name'              => __( 'New ' . $this->singular . ' Name', PLG_TEXTDOMAIN ),
                'parent_item'                => __( 'Parent ' . $this->singular, PLG_TEXTDOMAIN ),
                'parent_item_colon'          => __( 'Parent ' . $this->singular . ':', PLG_TEXTDOMAIN ),
                'search_items'               => __( 'Search ' . $this->plural, PLG_TEXTDOMAIN ),
                'popular_items'              => __( 'Popular ' . $this->plural, PLG_TEXTDOMAIN ),
                'separate_items_with_commas' => __( 'Separate ' . $this->plural . ' with Commas', PLG_TEXTDOMAIN ),
                'add_or_remove_items'        => __( 'Add or remove ' . $this->plural, PLG_TEXTDOMAIN ),
                'choose_from_most_used'      => __( 'Choose from most used ' . $this->plural, PLG_TEXTDOMAIN ),
                'not_found'                  => __( $this->plural . ' not Found', PLG_TEXTDOMAIN ),
                'back_to_items'              => __( 'Back to ' . $this->plural, PLG_TEXTDOMAIN ),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'rest_base' => $this->rest_base,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => false,
            'description' => '',
            'hierarchical' => true,
            'query_var' => $this->query_var,
            'rewrite' => $this->rewrite
        );

        register_taxonomy( $this->taxonomy, $this->post_type, $args );
    }
}
