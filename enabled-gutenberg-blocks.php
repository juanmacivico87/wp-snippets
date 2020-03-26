<?php
/**
 * This function allows you to set blocks for frontpage (or any other you want)
 */
function enabled_homepage_gutenberg_blocks( $allowed_block_types )
{
	global $post;
    //If the page is set as "homepage", I add an array with all the blocks I want to load.
    //If not, it does not enter the conditional and the variable still contains the default Gutenberg blocks.
    if ( $post->ID === intval( get_option( 'page_on_front' ) ) )
    {
        $allowed_block_types = array(
            'core/paragraph'
        );
	}
	//Returns the desired blocks, depending on the page on which it is.
    return $allowed_block_types;
}
add_action( 'allowed_block_types', 'enabled_homepage_gutenberg_blocks' );
