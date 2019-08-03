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

if ( !defined( 'ABSPATH' ) )
    exit;

if ( !defined( 'PLG_TEXTDOMAIN' ) )
    define( 'PLG_TEXTDOMAIN', 'jmc87_plugin_textdomain' );

if ( !defined( 'LANG_DIR' ) )
    define( 'LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages' );

function jmc87_plugin_install()
{
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to install this plugin.', PLG_TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', PLG_TEXTDOMAIN ) . '</a>' );
}
register_activation_hook( __FILE__, 'jmc87_plugin_install' );

function jmc87_plugin_deactivation()
{
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to disable this plugin.', PLG_TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', PLG_TEXTDOMAIN ) . '</a>' );
}
register_deactivation_hook( __FILE__, 'jmc87_plugin_deactivation' );

function jmc87_plugin_uninstall()
{
    if ( !current_user_can( 'activate_plugins' ) )
        wp_die( __( 'Don\'t have enough permissions to uninstall this plugin.', PLG_TEXTDOMAIN ) . '<br /><a href="' . admin_url( 'plugins.php' ) . '">&laquo; ' . __( 'Back to plugins page.', PLG_TEXTDOMAIN ) . '</a>' );
}
register_uninstall_hook( __FILE__, 'jmc87_plugin_uninstall' );

require 'config/config.php';
$config = new JMC87_PluginConfig();

require 'src/customizerSection/customizer.php';
$customizer = new JMC87_Customizer();

require 'src/customPostsTypes/custom-post-type.php';
$custom_post_type = new JMC87_CustomPostType();

require 'src/customTaxonomies/custom-taxonomy.php';
$custom_taxonomy = new JMC87_CustomTaxonomy();

require 'src/customMetaboxes/custom-metabox.php';
$custom_taxonomy = new JMC87_CustomMetabox();
