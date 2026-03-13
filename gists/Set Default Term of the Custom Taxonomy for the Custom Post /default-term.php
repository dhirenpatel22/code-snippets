<?php
// Set Default Term of the Custom Taxonomy for the Custom Post Type.
add_action( 'wp_insert_post', 'set_default_term', 10, 3 );
function set_default_term( $post_id, $post, $update ) {
	if ( 'cpt_slug' == $post->post_type ) { 
		if ( empty( wp_get_post_terms( $post_id, 'taxonomy_slug' ) ) ) {
			wp_set_object_terms( $post_id, get_option( 'default_taxo_term', 'term_slug' ), 'taxonomy_slug' );
		}
	}
}
?>