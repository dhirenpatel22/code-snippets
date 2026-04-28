<?php

/**
 * Add Parent ID to the Renewal orders of the Subscriptions
 * Compatible with High-Performance Order Storage (HPOS)
 * 
 * @param WC_Subscription $subscription
 * @param WC_Order $order
 */
function add_parent_order_id_to_renewal_orders( $subscription, $order ) {
    
    // Ensure order is a WC_Order object
    if ( ! is_a( $order, 'WC_Order' ) ) {
        return;
    }
    
    // Check if order contains renewal
    $is_renewal = wcs_order_contains_renewal( $order->get_id() );
    
    // Is Renewal Order?
    if ( $is_renewal ) {
        $parent_order_id = WC_Subscriptions_Renewal_Order::get_parent_order_id( $order->get_id() );
        
        // Validate parent order ID exists
        if ( $parent_order_id ) {
            // Update Order Meta - HPOS compatible
            $order->update_meta_data( 'parent_id', $parent_order_id );
            
            // Save order - works with both HPOS and posts table
            $order->save();
        }
    }
}
add_action( 'woocommerce_subscription_renewal_payment_complete', 'add_parent_order_id_to_renewal_orders', 10, 2 );
