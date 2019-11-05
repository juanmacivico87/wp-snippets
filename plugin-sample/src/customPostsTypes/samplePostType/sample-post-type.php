<?php
/**
 * A snippet to create a new custom post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package jmc87_cpt
 */

class JMC87_SamplePostType
{
    public $post_type  = 'sample';

    public $support    = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' );
    public $taxonomies = array( 'custom_cat', 'custom_tag' );
    public $rewrite    = array( 
        'slug'       => 'samples',
        'with_front' => false,
        'feeds'      => false,
        'pages'      => true,
    );

    public function __construct()
    {
        add_action( 'init', array( $this, 'jmc87_add_custom_post_type' ) );
    }

    public function jmc87_add_custom_post_type()
    {
        $args = array(
            'labels' => array(
                'name'                     => __( 'Samples', PLG_TEXTDOMAIN ),
                'singular_name'            => __( 'Sample', PLG_TEXTDOMAIN ),
                'add_new'                  => __( 'Add New', PLG_TEXTDOMAIN ),
                'add_new_item'             => __( 'Add New Sample', PLG_TEXTDOMAIN ),
                'edit_item'                => __( 'Edit Sample', PLG_TEXTDOMAIN ),
                'new_item'                 => __( 'New Sample', PLG_TEXTDOMAIN ),
                'view_item'                => __( 'View Sample', PLG_TEXTDOMAIN ),
                'view_items'               => __( 'View Samples', PLG_TEXTDOMAIN ),
                'search_items'             => __( 'Search Samples', PLG_TEXTDOMAIN ),
                'not_found'                => __( 'Sample not Found', PLG_TEXTDOMAIN ),
                'not_found_in_trash'       => __( 'Sample not Found in Trash', PLG_TEXTDOMAIN ),
                'parent_item_colon'        => __( 'Parent Sample:', PLG_TEXTDOMAIN ),
                'all_items'                => __( 'All Samples', PLG_TEXTDOMAIN ),
                'archives'                 => __( 'Sample Archives', PLG_TEXTDOMAIN ),
                'attributes'               => __( 'Sample Attributes', PLG_TEXTDOMAIN ),
                'insert_into_item'         => __( 'Insert into Sample', PLG_TEXTDOMAIN ),
                'uploaded_to_this_item'    => __( 'Uploaded to this Sample', PLG_TEXTDOMAIN ),
                'featured_image'           => __( 'Featured Image', PLG_TEXTDOMAIN ),
                'set_featured_image'       => __( 'Set Featured Image', PLG_TEXTDOMAIN ),
                'remove_featured_image'    => __( 'Remove Featured Image', PLG_TEXTDOMAIN ),
                'use_featured_image'       => __( 'Use Featured Image', PLG_TEXTDOMAIN ),
                'menu_name'                => __( 'Samples', PLG_TEXTDOMAIN ),
                'filter_items_list'        => __( 'Filter Samples' . ' List', PLG_TEXTDOMAIN ),
                'items_list_navigation'    => __( 'Samples List Navigation', PLG_TEXTDOMAIN ),
                'items_list'               => __( 'Samples List', PLG_TEXTDOMAIN ),
                'name_admin_bar'           => __( 'Samples', PLG_TEXTDOMAIN ),
                'item_published'           => __( 'Sample Published', PLG_TEXTDOMAIN ),
                'item_published_privately' => __( 'Sample Published Privately', PLG_TEXTDOMAIN ),
                'item_reverted_to_draft'   => __( 'Sample Reverte to Draft', PLG_TEXTDOMAIN ),
                'item_scheduled'           => __( 'Sample Scheduled', PLG_TEXTDOMAIN ),
                'item_updated'             => __( 'Sample Updated', PLG_TEXTDOMAIN ),
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
            'supports'            => $this->support,
            'taxonomies'          => $this->taxonomies,
            'has_archive'         => false,
            'rewrite'             => $this->rewrite,
            'query_var'           => true,
            'can_export'          => true,
            'delete_with_user'    => false,
            'show_in_rest'        => true,
        );

        register_post_type( $this->post_type, $args );
        flush_rewrite_rules();
    }
}
