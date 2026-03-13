<?php 

function update_products_by_x(){

	$args = array(
		'limit' => -1,
		'product_category_id' => array( 604 ),
		'return' => 'ids',
	);
	
	$products_ids = wc_get_products( $args );

    // Loop through product Ids
    foreach ( $products_ids as $product_id ) {
		
    		$category_id = 604;
        // Remove the category from the product
        wp_remove_object_terms( $product_id, $category_id, 'product_cat' );

    }
}
add_action( 'init', 'update_products_by_x' );
?>