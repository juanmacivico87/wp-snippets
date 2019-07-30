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
            'label'  => __( 'Custom Categories', PLG_TEXTDOMAIN ),
            'labels' => array(
                'name'                       => __( 'Custom Categories', PLG_TEXTDOMAIN ),
                'singular_name'              => __( 'Custom Category', PLG_TEXTDOMAIN ),
                'menu_name'                  => __( 'Custom Categories', PLG_TEXTDOMAIN ),
                'all_items'                  => __( 'All Custom Categories', PLG_TEXTDOMAIN ),
                'edit_item'                  => __( 'Edit Custom Category', PLG_TEXTDOMAIN ),
                'view_item'                  => __( 'View Custom Category', PLG_TEXTDOMAIN ),
                'update_item'                => __( 'Update Custom Category', PLG_TEXTDOMAIN ),
                'add_new_item'               => __( 'Add new Custom Category', PLG_TEXTDOMAIN ),
                'new_item_name'              => __( 'New Custom Category Name', PLG_TEXTDOMAIN ),
                'parent_item'                => __( 'Parent Custom Category', PLG_TEXTDOMAIN ),
                'parent_item_colon'          => __( 'Parent Custom Category:', PLG_TEXTDOMAIN ),
                'search_items'               => __( 'Search Custom Categories', PLG_TEXTDOMAIN ),
                'popular_items'              => __( 'Popular Custom Categories', PLG_TEXTDOMAIN ),
                'separate_items_with_commas' => __( 'Separate Custom Categories with Commas', PLG_TEXTDOMAIN ),
                'add_or_remove_items'        => __( 'Add or remove Custom Categories', PLG_TEXTDOMAIN ),
                'choose_from_most_used'      => __( 'Choose from most used Custom Categories', PLG_TEXTDOMAIN ),
                'not_found'                  => __( 'Custom Categories not Found', PLG_TEXTDOMAIN ),
                'back_to_items'              => __( 'Back to Custom Categories', PLG_TEXTDOMAIN ),
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
