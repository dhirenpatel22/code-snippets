<?php /**
 * Do something if product is simple, variable, external and grouped
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/
 */

add_action( 'woocommerce_after_single_product_summary', 'bbloomer_single_product_type' );
function bbloomer_single_product_type() {
  if( $product->is_type( 'simple' ) ){
    // do something
  } elseif( $product->is_type( 'variable' ) ){
    // do something
  } elseif( $product->is_type( 'external' ) ){
    // do something
  } elseif( $product->is_type( 'grouped' ) ){
    // do something
  } 
}