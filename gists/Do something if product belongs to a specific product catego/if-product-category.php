<?php /**
 * Do something if product belongs to a specific product category
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

add_action( 'woocommerce_after_single_product_summary', 'bbloomer_single_category_slug' );

function bbloomer_single_category_slug() {
    if ( has_term( 'chairs', 'product_cat' ) ) {
        echo 'Something';
    } elseif ( has_term( 'tables', 'product_cat' ) ) {
        echo 'Something else';
    }
}