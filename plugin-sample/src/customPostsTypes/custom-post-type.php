<?php
/**
 * A snippet to create a new custom post type in WordPress. For more info, view:
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package jmc87_cpt
 */

class JMC87_CustomPostType
{
    public $post_type  = 'sample';
    public $singular   = 'Sample';
    public $plural     = 'Samples';

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
                'name'                     => __( $this->plural, PLG_TEXTDOMAIN ),
                'singular_name'            => __( $this->singular, PLG_TEXTDOMAIN ),
                'add_new'                  => __( 'Add new', PLG_TEXTDOMAIN ),
                'add_new_item'             => __( 'Add new ' . $this->singular, PLG_TEXTDOMAIN ),
                'edit_item'                => __( 'Edit ' . $this->singular, PLG_TEXTDOMAIN ),
                'new_item'                 => __( 'New ' . $this->singular, PLG_TEXTDOMAIN ),
                'view_item'                => __( 'View ' . $this->singular, PLG_TEXTDOMAIN ),
                'view_items'               => __( 'View ' . $this->plural, PLG_TEXTDOMAIN ),
                'search_items'             => __( 'Search ' . $this->plural, PLG_TEXTDOMAIN ),
                'not_found'                => __( $this->singular . ' not Found', PLG_TEXTDOMAIN ),
                'not_found_in_trash'       => __( $this->singular . ' not Found in Trash', PLG_TEXTDOMAIN ),
                'parent_item_colon'        => __( 'Parent ' . $this->singular . ':', PLG_TEXTDOMAIN ),
                'all_items'                => __( 'All ' . $this->plural, PLG_TEXTDOMAIN ),
                'archives'                 => __( $this->singular . ' Archives', PLG_TEXTDOMAIN ),
                'attributes'               => __( $this->singular . ' Attributes', PLG_TEXTDOMAIN ),
                'insert_into_item'         => __( 'Insert into ' . $this->singular, PLG_TEXTDOMAIN ),
                'uploaded_to_this_item'    => __( 'Uploaded to this ' . $this->singular, PLG_TEXTDOMAIN ),
                'featured_image'           => __( 'Featured Image', PLG_TEXTDOMAIN ),
                'set_featured_image'       => __( 'Set Featured Image', PLG_TEXTDOMAIN ),
                'remove_featured_image'    => __( 'Remove Featured Image', PLG_TEXTDOMAIN ),
                'use_featured_image'       => __( 'Use Featured Image', PLG_TEXTDOMAIN ),
                'menu_name'                => __( $this->plural, PLG_TEXTDOMAIN ),
                'filter_items_list'        => __( 'Filter ' . $this->plural . ' List', PLG_TEXTDOMAIN ),
                'items_list_navigation'    => __( $this->plural . ' List Navigation', PLG_TEXTDOMAIN ),
                'items_list'               => __( $this->plural . ' List', PLG_TEXTDOMAIN ),
                'name_admin_bar'           => __( $this->plural, PLG_TEXTDOMAIN ),
                'item_published'           => __( $this->singular . ' Published', PLG_TEXTDOMAIN ),
                'item_published_privately' => __( $this->singular . ' Published Privately', PLG_TEXTDOMAIN ),
                'item_reverted_to_draft'   => __( $this->singular . ' Reverte to Draft', PLG_TEXTDOMAIN ),
                'item_scheduled'           => __( $this->singular . ' Scheduled', PLG_TEXTDOMAIN ),
                'item_updated'             => __( $this->singular . ' Updated', PLG_TEXTDOMAIN ),
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
