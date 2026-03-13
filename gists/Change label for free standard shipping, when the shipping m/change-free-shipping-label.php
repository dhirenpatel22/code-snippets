<?php
/**
 * Change label for free standard shipping, when the shipping method’s rate returns $0.00
 * @param $full_label
 * @param $method
 * @return string
 */
function custom_display_zero_shipping_cost($full_label, $method){
    if( $method->cost == 0.0 ) {
        $full_label = '<span class=”woocommerce-Price-amount amount”>Free Shipping</span>';
    }
    return $full_label;
}
add_filter( 'woocommerce_cart_shipping_method_full_label', 'custom_display_zero_shipping_cost', 10, 2 );

function add_free_shipping_label_email( $label, $method ) {
    if ( $method->cost == 0 ) {
        $label = 'Free shipping'; //not quite elegant hard coded string
    }
    return $label;
}
add_filter( 'woocommerce_order_shipping_to_display', 'add_free_shipping_label_email', 10, 2 );
?>