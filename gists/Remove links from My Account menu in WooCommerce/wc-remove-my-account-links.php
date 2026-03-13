<?php /**
 * Remove links from My Account menu in WooCommerce
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/remove-links-my-account-menu/
 */

add_filter ( 'woocommerce_account_menu_items', 'wc_remove_my_account_links' );
function wc_remove_my_account_links( $menu_links ){
 
	unset( $menu_links['edit-address'] ); // Addresses
	//unset( $menu_links['dashboard'] ); // Dashboard
	//unset( $menu_links['payment-methods'] ); // Payment Methods
	//unset( $menu_links['orders'] ); // Orders
	//unset( $menu_links['downloads'] ); // Downloads
	//unset( $menu_links['edit-account'] ); // Account details
	//unset( $menu_links['customer-logout'] ); // Logout

	return $menu_links;
 
}
