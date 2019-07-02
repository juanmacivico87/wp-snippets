<?php
if ( !defined( 'ABSPATH' ) )
    exit;

class JMC87_Config
{
    public function __construct()
    {
        add_action( 'plugins_loaded', array( $this, 'jmc87_load_textdomain' ) );
    }

    public function jmc87_load_textdomain()
    {
        $url_lang = basename( dirname( __FILE__ ) ) . '/languages/';
        load_plugin_textdomain( PLG_TEXTDOMAIN, false, $url_lang );
    }
}
