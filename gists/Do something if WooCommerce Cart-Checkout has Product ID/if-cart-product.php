<?php /**
 * Do something if WooCommerce Cart/Checkout has Product ID
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

function bbloomer_find_id_in_cart() {
    global $woocommerce;   
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values) {
        $product = $values['data'];
        if ( $product->id == 123 ) {
            // do something
        }
    }
}