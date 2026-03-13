<?php /**
 * Add Bootstrap Class to WooCommerce Checkout Fields
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/wc-checkout-bootstrap/
 */

add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
}