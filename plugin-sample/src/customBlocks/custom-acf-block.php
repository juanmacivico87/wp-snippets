<?php
/**
 * A snippet to create a new Gutenberg block. For more info, view:
 *
 * @link https://www.advancedcustomfields.com/blog/acf-5-8-introducing-acf-blocks-for-gutenberg/
 *
 * @package jmc87_cgb
 */

class JMC87_CustomACFGutenbergBlock
{
    public function __construct()
    {
        add_action( 'acf/init', array( $this, 'jmc87_add_custom_block' ) );
        add_action( 'init', array( $this, 'jmc87_add_block_fields' ) );
    }
    
    public function jmc87_add_custom_block()
    {
        if ( function_exists( 'acf_register_block' ) ) {
            acf_register_block(
                array(
                    'name'				=> 'sample',
                    'title'				=> __( 'Sample Block', PLG_TEXTDOMAIN ),
                    'description'		=> __( 'A Gutenbetg sample block', PLG_TEXTDOMAIN ),
                    'render_callback'	=> array( $this, 'jmc87_render_custom_block' ),
                    'category'			=> 'formatting',
                    'icon'				=> 'admin-comments',
                    'keywords'			=> array( 'sample', 'block' ),
                )
            );
        }
    }

    public function jmc87_add_block_fields()
    {
        if( function_exists( 'acf_add_local_field_group' ) ) :
            acf_add_local_field_group(
                array(
                    'key' => 'group_5cf76f0e4cde3',
                    'title' => __( 'Sample', PLG_TEXTDOMAIN ),
                    'fields' => array(
                        array(
                            'key' => 'field_5cf76f15f55e8',
                            'label' => __( 'Title', PLG_TEXTDOMAIN ),
                            'name' => 'sample_title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5cf76f28f55e9',
                            'label' => __( 'Subtitle', PLG_TEXTDOMAIN ),
                            'name' => 'sample_subtitle',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5cf76f3bf55ea',
                            'label' => __( 'Button', PLG_TEXTDOMAIN ),
                            'name' => 'sample_button',
                            'type' => 'link',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'block',
                                'operator' => '==',
                                'value' => 'acf/sample',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                )
            );
        endif;
    }

    public function jmc87_render_custom_block( $block )
    {
        $title    = get_field( 'sample_title' );
        $subtitle = get_field( 'sample_subtitle' );
        $button   = get_field( 'sample_button' ); ?>
        
        <section class="sample-block">
            <h1><?php echo $title ?></h1>
            <p><?php echo $subtitle ?></p>
            <?php if ( $button ) : ?>
                <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" title="<?php echo $button['title'] ?>"><?php echo $button['title'] ?></a>
            <?php endif ?>
        </section><?php
    }
}
