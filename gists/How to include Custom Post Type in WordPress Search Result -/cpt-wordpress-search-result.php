<?php 
/**
 * This function modifies the main WordPress query and includes an array of 
 * post types instead of the default 'post' and 'page' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function include_cpt_search( $query ) {
	
    if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'custom_post_type' ) );
    }
    
    return $query;
    
}
add_filter( 'pre_get_posts', 'include_cpt_search' );