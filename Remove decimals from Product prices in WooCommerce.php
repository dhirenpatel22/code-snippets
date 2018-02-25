<?php 
/**
 * Remove decimals from Product prices in WooCommerce
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/remove-decimals-product-prices-woocommerce/
 */

// Trim zeros in price decimals
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );