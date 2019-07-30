<?php
/**
 * A snippet to add a new panel in WordPress Customizer. For more info, view:
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package jmc87_customizer
 */

class JMC87_Customizer
{
    public $panel      = 'panel_name';
    public $section    = 'section_name';
    public $control    = 'control_name';

    public function __construct()
    {
        add_action( 'customize_register', array( $this, 'jmc87_add_new_customizer_panel' ) );
    }

    public function jmc87_add_new_customizer_panel()
    {
        global $wp_customize;

        $wp_customize -> add_panel( 
            $this->panel, 
            array(
                'priority'       => 1,
                'capability'     => 'edit_pages',
                'title'          => __( 'Panel Name', PLG_TEXTDOMAIN ),
            )
        );

        $wp_customize -> add_section( 
            $this->section,
            array(
                'title'         => __( 'Section Name', PLG_TEXTDOMAIN ),
                'priority'      => 1,
                'description'   => __( 'A little section description', PLG_TEXTDOMAIN ),
                'capability'    => 'edit_pages',
                'panel'         => $this->panel,
            )
        );

        $wp_customize -> add_setting(
            $this->control,
            array(
                'default'       => '',
                'type'          => 'option',
                'capability'    => 'edit_pages',
                'transport'     => 'refresh',
            )
        );

        $wp_customize -> add_control(
            $this->control,
            array(
                'label'       => __( 'Control Name', PLG_TEXTDOMAIN ),
                'description' => __( 'A little control description', PLG_TEXTDOMAIN ),
                'section'     => $this->section,
                'priority'    => 1,
                'type'        => 'text',
            )
        );
    }
}
