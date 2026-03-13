<?php /**
 * Do something if product belongs to a specific product category
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 * The snippet below hides the price only on the single product page and only on the related products section.
 */
 
add_filter( 'woocommerce_variable_price_html', 'bbloomer_remove_variation_price', 10, 2 );
function bbloomer_remove_variation_price( $price ) {
    global $woocommerce_loop;
    if ( is_product() && $woocommerce_loop['name'] == 'related' ) {
        $price = '';
    }
    return $price;
}