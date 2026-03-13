<?php 
/**
 * How to display links of current post category and its sub-categories
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

// get Post Object outside
$queried_object = get_queried_object();
if ( $queried_object ) {
	$post_id = $queried_object->ID;
}

//Returns All Term Items for "my_taxonomy"
$term_list = wp_get_post_terms($post_id, 'category', array("fields" => "all"));
$term_list_id = wp_get_post_terms($post_id, 'category', array("fields" => "ids"));

echo '<ul>';
foreach($term_list as $term) {

	$has_parent = $term->parent;
	$has_childrens = get_terms( $term->taxonomy, array( 'parent'    => $term->term_id, 'hide_empty' => false) );

	// If it have parents...
	if ( $has_parent ) {

		// If parent category is already selected
		if(in_array($has_parent, $term_list_id)){
			// Do nothing
		}else{
			// If parent category is not selected
			$parent_id = $term->parent;
			$parent_term = get_term( $parent_id, 'category' );

			// Display Parent
			echo '<li><a href="' . get_category_link( $parent_id ) . '">' . $parent_term->name.'</a></li>';
			echo '<ul>';

			// Display Children
			$childrens = get_categories( array('child_of' => $parent_id), 'category' );
			foreach($childrens as $children) {
				echo '<li><a href="' . get_category_link( $children->term_id ) . '">' . $children->name.'</a></li>';
			}
			echo '</ul>';
		}

	}elseif ( $has_childrens ) {
		// If it have childrens...

		// display parent
		echo '<li><a href="' . get_category_link( $term->term_id ) . '">' . $term->name.'</a></li>';
			$childrens = get_categories( array('child_of' => $parent_id), 'category' );
			echo '<ul>';

		// Display children
			foreach($has_childrens as $has_children) {
				echo '<li><a href="' . get_category_link( $has_children->term_id ) . '">' . $has_children->name.'</a></li>';
			}
			echo '</ul>';

	}else{
		// No Parent No Child
		echo '<li><a href="' . get_category_link( $term->term_id ) . '">' . $term->name.'</a></li>';
	}
}
echo '</ul>';
?>