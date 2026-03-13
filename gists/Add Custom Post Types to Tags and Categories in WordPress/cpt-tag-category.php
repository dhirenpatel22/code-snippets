<?php 
/**
 * Add Custom Post Types to Tags and Categories in WordPress
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars[‘suppress_filters’] ) ) {

		// Get all Custom Post types
		//$post_types = get_post_types();

		// Get Specific Custom Post types
		$post_types = array( ‘post’, ‘your_custom_type’ );

		$query->set( ‘post_type’, $post_types );
		
		return $query;
	}
}
add_filter( ‘pre_get_posts’, ‘add_custom_types_to_tax’ );