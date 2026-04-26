<?php
/**
 * Change Coupon to Promo code
 * @param $translated_text
 * @param $text
 * @param $text_domain
 * @return mixed
 */
function woocommerce_rename_coupon_field_on_cart($translated_text, $text, $text_domain ){

    if ( 'Coupon:' === $text ) {
        $translated_text = 'Promo:';
    }

    if ('Coupon has been removed.' === $text){
        $translated_text = 'Promo code has been removed.';
    }

    if ( 'Apply coupon' === $text ) {
        $translated_text = 'Apply Promo Code';
    }

    if ( 'Coupon code' === $text ) {
        $translated_text = 'Promo Code';
    }
	
	if('If you have a coupon code, please apply it below.' === $text){
        $translated_text = 'If you have a promo code, please apply it below.';
    }
	
    return $translated_text;
}
add_filter( 'gettext', 'woocommerce_rename_coupon_field_on_cart', 10, 3 );

/**
 * Rename Coupon Label
 * @param $err
 * @param null $err_code
 * @param null $something
 * @return string|string[]
 */
function rename_coupon_label($err, $err_code=null, $something=null){
    $err = str_ireplace("Coupon","Promo",$err);
    return $err;
}
add_filter('woocommerce_coupon_error', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_coupon_message', 'rename_coupon_label', 10, 3);
add_filter('woocommerce_cart_totals_coupon_label', 'rename_coupon_label',10, 1);

/**
 * Rename the "Have a Coupon?" message on the checkout page
 * @return string
 */
function woocommerce_rename_coupon_message_on_checkout() {
    return 'Have a Promo Code? <a href="#" class="showcoupon">Click here to enter your code</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
