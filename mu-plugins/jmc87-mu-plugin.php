<?php
/*
Plugin Name: JMC87 MU-Plugin
Plugin URI: https://www.juanmacivico87.com
Description: Plugin with mu-functions to improve website performance and security
Version: 1.0
Author: Juan Manuel Civico Cabrera
Author URI: https://www.juanmacivico87.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

//Avoid access to the plugin file by typing its URL in the address bar.
//Evitar que se pueda acceder al archivo del plugin escribiendo su URL en la barra de direcciones.
if ( !defined( 'ABSPATH' ) )
    exit;

//Hide login error messages
//Ocultar los mensajes de error en el login
function jmc87_hide_login_errors( $error )
{
    $error = __( 'You shall not pass!!!' );
    return $error;
}
add_filter( 'login_errors', 'jmc87_hide_login_errors' );

//Enable SVG images upload
//Habilitar la subida de imágenes SVG
function jmc87_enable_upload_svg( $mimes = array() )
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'jmc87_enable_upload_svg' );

//Modifica el intervalo de los heartbeats
//Modify API heartbits interval
function jmc87_heartbeat_interval( $settings )
{
    $settings['interval'] = 300;
    return $settings;
}
add_filter( 'heartbeat_settings', 'jmc87_heartbeat_interval' );

//Elimina las cadenas de version de los archivos JS y CSS
//Remove JS and CSS files version strings
function jmc87_remove_version_strings( $src )
{
    $parts = explode( '?ver', $src );
    return $parts[0];
}
add_filter( 'script_loader_src', 'jmc87_remove_version_strings', 15, 1 );
add_filter( 'style_loader_src', 'jmc87_remove_version_strings', 15, 1 );

//Mueve los archivos JS al pie de la página
//Move JS files to the footer
if( !is_admin() )
{
    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
    add_action( 'wp_footer', 'wp_print_scripts', 5 );
    add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
    add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
}

//Remove desktop widgets.
//Elimina los widgets del escritorio.
function jmc87_remove_desktop_widgets()
{
    global $wp_meta_boxes;
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
}
add_action( 'wp_dashboard_setup', 'jmc87_remove_desktop_widgets' );
remove_action( 'welcome_panel', 'wp_welcome_panel' );

//Elimina los elementos del menú indicados
//Remove menu items that developer indicates
function jmc87_remove_menu_items()
{
    if ( wp_get_current_user()->roles !== 'administrator' )
        add_filter( 'acf/settings/show_admin', '__return_false' );
}
add_action( 'admin_menu', 'jmc87_remove_menu_items' );

remove_action('set_comment_cookies', 'wp_set_comment_cookies');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
add_filter('xmlrpc_enabled', '__return_false');
