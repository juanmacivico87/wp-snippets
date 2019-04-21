<?php
/*
Plugin Name: Plugin Name
Plugin URI: https://www.myplugin.com
Description: A little plugin description
Version: 1.0
Author: Your Name
Author URI: https://www.yourwebsite.com
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  jmc87_plugin_textdomain
Domain Path:  /languages

[Plugin Name] is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
[Plugin Name] is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with [Plugin Name]. If not, see https://www.gnu.org/licenses/gpl-2.0.html
*/

//Avoid access to the plugin file by typing its URL in the address bar
//Evitar que se pueda acceder al archivo del plugin escribiendo su URL en la barra de direcciones
if ( !defined( 'ABSPATH' ) )
    exit;

//Define text-domain
//Define el texto de dominio para las traducciones
define( 'TEXTDOMAIN', 'jmc87_plugin_textdomain' );

//Load plugin textdomain (it is not necessary for the plugins of the official repository)
//Cargar el textdomain del plugin (no es necesario para los plugins del repositorio oficial)
function jmc87_load_textdomain()
{
    $url_lang = basename( dirname( __FILE__ ) ) . '/languages/';
    load_plugin_textdomain( TEXTDOMAIN, false, $url_lang );
}
add_action( 'plugins_loaded', 'jmc87_load_textdomain' );

//Plugin install
//Instalar el plugin
function jmc87_plugin_install()
{
    //Comprobar que el actual usuario puede instalar plugins
    //Check current user is allow to install plugins
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to install this plugin.', TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', TEXTDOMAIN ) . '</a>' );
}
register_activation_hook( __FILE__, 'jmc87_plugin_install' );

//Plugin disabled
//Desactivar el plugin
function jmc87_plugin_disabled()
{
    //Comprobar que el actual usuario puede desactivar plugins
    //Check current user is allow to disable plugins
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to disable this plugin.', TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', TEXTDOMAIN ) . '</a>' );
}
register_deactivation_hook( __FILE__, 'jmc87_plugin_disabled' );

//Plugin uninstall
//Desinstalar el plugin
function jmc87_plugin_uninstall()
{
    //Comprobar que el actual usuario puede desinstalar plugins
    //Check current user is allow to uninstall plugins
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to uninstall this plugin.', TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', TEXTDOMAIN ) . '</a>' );
}
register_uninstall_hook( __FILE__, 'jmc87_plugin_uninstall' );