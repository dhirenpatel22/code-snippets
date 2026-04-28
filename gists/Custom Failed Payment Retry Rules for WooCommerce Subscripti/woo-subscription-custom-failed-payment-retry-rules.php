<?php
/**
 * Custom Failed Payment Retry Rules for WooCommerce Subscriptions
 * @param $default_retry_rules_array
 * @return array
 */

function wc_subscription_custom_retry_rules($default_retry_rules_array ){
    return array(
        array(
            'retry_after_interval'            => 21600,
            'email_template_customer'         => '',
            'email_template_admin'            => '', //WCS_Email_Payment_Retry
            'status_to_apply_to_order'        => 'pending',
            'status_to_apply_to_subscription' => 'on-hold',
        ),
        array(
            'retry_after_interval'            => 43200,
            'email_template_customer'         => 'WCS_Email_Customer_Payment_Retry',
            'email_template_admin'            => '', //WCS_Email_Payment_Retry
            'status_to_apply_to_order'        => 'pending',
            'status_to_apply_to_subscription' => 'on-hold',
        ),
        array(
            'retry_after_interval'            => 86400,
            'email_template_customer'         => 'WCS_Email_Customer_Payment_Retry',
            'email_template_admin'            => '', //WCS_Email_Payment_Retry
            'status_to_apply_to_order'        => 'pending',
            'status_to_apply_to_subscription' => 'on-hold',
        ),
        array(
            'retry_after_interval'            => 172800,
            'email_template_customer'         => 'WCS_Email_Customer_Payment_Retry',
            'email_template_admin'            => '', //WCS_Email_Payment_Retry
            'status_to_apply_to_order'        => 'pending',
            'status_to_apply_to_subscription' => 'on-hold',
        ),
        array(
            'retry_after_interval'            => 259200,
            'email_template_customer'         => 'WCS_Email_Customer_Payment_Retry',
            'email_template_admin'            => 'WCS_Email_Payment_Retry', //WCS_Email_Payment_Retry
            'status_to_apply_to_order'        => 'pending',
            'status_to_apply_to_subscription' => 'on-hold',
        ),
    );
}
add_filter( 'wcs_default_retry_rules', 'wc_subscription_custom_retry_rules' );
