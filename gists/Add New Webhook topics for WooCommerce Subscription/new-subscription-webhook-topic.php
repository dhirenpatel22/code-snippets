<?php

function add_custom_filters_and_actions() {

	add_filter( 'woocommerce_webhook_topic_hooks', 'add_custom_wcs_topics', 30, 2 );

	add_filter( 'woocommerce_valid_webhook_events', 'add_custom_wcs_events', 20, 1 );

	add_filter( 'woocommerce_webhook_topics' , 'add_custom_wcs_topics_admin_menu', 20, 1 );
	
	add_action( 'woocommerce_subscription_status_pending-cancel_to_cancelled', 'add_subscription_cancelled_callback', 10, 1 );
	
	add_action( 'woocommerce_subscription_status_pending_to_active', 'add_subscription_active_callback', 10, 1 );
}

/**
 * Add Custom Subscription webhook topics
 */
function add_custom_wcs_topics( $topic_hooks, $webhook ) {
	
	switch ( $webhook->get_resource() ) {
		case 'subscription':
			$topic_hooks = apply_filters( 'woocommerce_subscriptions_webhook_topics', array(
				'subscription.cancelled' => array(
					'wcs_webhook_status_cancelled'
				),
				'subscription.activated' => array(
					'wcs_webhook_status_active'
				)
			), $webhook );
			break;
	}

	return $topic_hooks;
}

/**
 * Add Subscription topics to the Webhooks dropdown menu in when creating a new webhook.
 */
function add_custom_wcs_topics_admin_menu( $topics ) {

	$front_end_topics = array(
		'subscription.cancelled'  => __( 'Subscription Cancelled', 'woocommerce-subscriptions' ),
		'subscription.activated'  => __( 'Subscription Activated', 'woocommerce-subscriptions' )
	);

	return array_merge( $topics, $front_end_topics );
}

/**
 * Add webhook event for subscription switched.
 */
function add_custom_wcs_events( $events ) {
	$events[] = 'cancelled';
	$events[] = 'activated';

	return $events;
}

function add_subscription_cancelled_callback( $subscription ) {
	do_action( 'wcs_webhook_status_cancelled', $subscription->get_id());
}

function add_subscription_active_callback( $subscription ) {
	do_action( 'wcs_webhook_status_active', $subscription->get_id());
}

add_custom_filters_and_actions();

?>