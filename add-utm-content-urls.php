<?php
/**
 * This function allows you to insert parameters in those URLs that contain the given search string
 */
function add_utm_to_content( $content )
{
    //Define the text string contained in the URL you are looking for
    $search_string = 'url-string-to-search';

    //Load the content as if it were rendered in the DOM and look for the links in it
	$html 		   = new DOMDocument();
	$html->loadHTML( $content );
    $links 		   = $html->getElementsByTagName( 'a' );
    
    //Check all links and add the parameter in those that match the search
	foreach( $links as $link )
	{
		$href 	  = $link->getAttribute( 'href' );
		$new_href = strpos( $href, $search_string ) ? $href . '?utm_source=foo_bar' : $href;
		$link->setAttribute( 'href', $new_href );
    }
    
    //Return the content with the parameters of the URL's 
	return $html->saveHTML();
}
add_filter( 'the_content', 'add_utm_to_content' );
