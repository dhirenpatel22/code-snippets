<?php
/**
 * Extend WooCommerce admin order search with custom meta fields.
 *
 * Usage:
 * - Add your custom meta keys in the $custom_fields array.
 * - Works for searching order meta in admin order list.
 */

add_filter( 'woocommerce_shop_order_search_fields', function( $search_fields ) {
    // Define your custom meta keys here
    $custom_fields = array(
        'custom_field_1',
        'custom_field_2',
        'custom_field_3',
    );

    // Merge safely with existing fields
    $search_fields = array_merge( $search_fields, $custom_fields );

    // Remove duplicates (just in case)
    $search_fields = array_unique( $search_fields );

    return $search_fields;
} );
