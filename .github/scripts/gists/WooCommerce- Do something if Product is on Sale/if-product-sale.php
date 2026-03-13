<?php /**
 * Do something if Product is on Sale
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

add_action( 'woocommerce_after_single_product_summary', 'bbloomer_single_on_sale' );
 
function bbloomer_single_on_sale() {
    if ( $product->is_on_sale() ) {
        // do something
    }
}