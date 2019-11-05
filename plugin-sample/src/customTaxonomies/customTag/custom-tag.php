<?php
/**
 * A snippet to create a new custom tag taxonomy for a post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package jmc87_custom_tag
 */

class JMC87_CustomTag
{
    public $taxonomy   = 'custom_tag';
    public $post_type  = 'sample';

    public $rest_base  = 'custom_tag';
    public $query_var  = 'custom_tag';
    public $rewrite    = array( 
        'slug'          => 'custom-tag',
        'with_front'    => false,
        'hierarchical'  => false,
        'ep_mask'       => EP_NONE,
    );

    public function __construct()
    {
        add_action( 'init', array( $this, 'jmc87_add_custom_tag' ) );
    }

    public function jmc87_add_custom_tag()
    {
        $args = array(
            'label'  => __( 'Custom Tags', PLG_TEXTDOMAIN ),
            'labels' => array(
                'name'                       => __( 'Custom Tags', PLG_TEXTDOMAIN ),
                'singular_name'              => __( 'Custom Tag', PLG_TEXTDOMAIN ),
                'menu_name'                  => __( 'Custom Tags', PLG_TEXTDOMAIN ),
                'all_items'                  => __( 'All Custom Tags', PLG_TEXTDOMAIN ),
                'edit_item'                  => __( 'Edit Custom Tag', PLG_TEXTDOMAIN ),
                'view_item'                  => __( 'View Custom Tag', PLG_TEXTDOMAIN ),
                'update_item'                => __( 'Update Custom Tag', PLG_TEXTDOMAIN ),
                'add_new_item'               => __( 'Add new Custom Tag', PLG_TEXTDOMAIN ),
                'new_item_name'              => __( 'New Custom Tag Name', PLG_TEXTDOMAIN ),
                'search_items'               => __( 'Search Custom Tags', PLG_TEXTDOMAIN ),
                'popular_items'              => __( 'Popular Custom Tags', PLG_TEXTDOMAIN ),
                'separate_items_with_commas' => __( 'Separate Custom Tags with Commas', PLG_TEXTDOMAIN ),
                'add_or_remove_items'        => __( 'Add or remove Custom Tags', PLG_TEXTDOMAIN ),
                'choose_from_most_used'      => __( 'Choose from most used Custom Tags', PLG_TEXTDOMAIN ),
                'not_found'                  => __( 'Custom Tags not Found', PLG_TEXTDOMAIN ),
                'back_to_items'              => __( 'Back to Custom Tags', PLG_TEXTDOMAIN ),
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
            'description' => __( 'Custom Tag Description', PLG_TEXTDOMAIN ),
            'hierarchical' => false,
            'query_var' => $this->query_var,
            'rewrite' => $this->rewrite
        );

        register_taxonomy( $this->taxonomy, $this->post_type, $args );
    }
}