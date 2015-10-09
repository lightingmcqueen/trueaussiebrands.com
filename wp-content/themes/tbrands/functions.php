<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Add your custom functions here, or overwrite existing ones. Read more how to use:
	// http://codex.wordpress.org/Child_Themes
if (!is_admin()) { 
	wp_enqueue_style( 'main_css', get_stylesheet_uri() );
}

function lufc_exclude_category( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', array('listing','post'));
	}
}
add_action( 'pre_get_posts', 'lufc_exclude_category' );

