<?php
/**
 * A snippet to add a new panel in WordPress Customizer. For more info, view:
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package jmc87_customizer
 */

function add_new_customizer_panel()
{
    global $wp_customize;
    $textdomain = 'jmc87_customizer';
    $panel      = 'panel_name';
    $section    = 'section_name';
    $control    = 'control_name';

    $wp_customize -> add_panel( 
        $panel, 
        array(
            'priority'       => 1,
            'capability'     => 'edit_pages',
            'title'          => __( 'Panel Name', $textdomain ),
        )
    );

    $wp_customize -> add_section( 
        $section,
        array(
            'title'         => __( 'Section Name', $textdomain ),
            'priority'      => 1,
            'description'   => __( 'A little section description', $textdomain ),
            'capability'    => 'edit_pages',
            'panel'         => $panel,
        )
    );

    $wp_customize -> add_setting(
        $control,
        array(
            'default'       => '',
            'type'          => 'option',
            'capability'    => 'edit_pages',
            'transport'     => 'refresh',
        )
    );

    $wp_customize -> add_control(
        $control,
        array(
            'label'       => __( 'Control Name', $textdomain ),
            'description' => __( 'A little control description', $textdomain ),
            'section'     => $section,
            'priority'    => 1,
            'type'        => 'text',
        )
    );
}
add_action( 'customize_register', 'add_new_customizer_panel' );
