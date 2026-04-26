<?php
/**
 * Alter related products query to pull items from Yoast Primary Category
 */
add_filter( 'woocommerce_get_related_product_cat_terms', function( $terms, $product_id ) {
    if ( function_exists( 'yoast_get_primary_term_id' ) ) {
        $primary_term_product_id = yoast_get_primary_term_id( 'product_cat', $product_id );
        if ( $primary_term_product_id ) {
            return array( $primary_term_product_id );
        }
    }
    return $terms;
}, 10, 2 );
