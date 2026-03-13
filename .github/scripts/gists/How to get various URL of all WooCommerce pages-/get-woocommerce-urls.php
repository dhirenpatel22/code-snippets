<?php /**
 * How to get various URL of all WooCommerce pages?
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/get-various-url-woocommerce-pages/
 */ 
 
// Get the Shop page url
echo get_permalink( wc_get_page_id( 'shop' ) );

// Get the My Account page url
echo get_permalink( wc_get_page_id( 'myaccount' ) );

// Get the Cart page url
echo get_permalink( wc_get_page_id( 'cart' ) );

// Get the Checkout page url
echo get_permalink( wc_get_page_id( 'checkout' ) );

// Get the Terms page url
echo get_permalink( wc_get_page_id( 'terms' ) );

// Get the Edit Account page url
echo wc_customer_edit_account_url();
