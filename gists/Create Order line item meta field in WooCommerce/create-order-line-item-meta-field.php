<?php
/**
 * Add a custom field to order line item
 * @param $item_id
 * @param $item
 */
function add_order_item_custom_field($item_id, $item ) {
    // Targeting line items type only
    if ($item->get_type() == 'line_item') {

        $product = $item->get_product();

        // Get SKU
        $sku = $product->get_sku();

        if ($sku == '8010100999' || $sku == '2010100999') {
            woocommerce_wp_text_input(array(
                'id' => 'serialno_item_' . $item_id,
                'label' => __('Serial Number', 'hfh'),
                'description' => __('This field contains the serial number of the ordered product item', 'hfh'),
                'desc_tip' => true,
                'class' => 'woocommerce',
                'value' => wc_get_order_item_meta($item_id, '_serial_number'),
            ));
        }
    }
}
add_action( 'woocommerce_before_order_itemmeta', 'add_order_item_custom_field', 10, 3 );

/**
 * Save the custom field value to the order line items
 * @param $post_id
 * @return mixed
 */
function save_order_item_custom_field_value($post_id){
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( ! current_user_can( 'edit_shop_order', $post_id ) )
        return $post_id;

    $order = wc_get_order( $post_id );

    // Loop through order items
    foreach ( $order->get_items() as $item_id => $item ) {
        if( isset( $_POST['serialno_item_'.$item_id] ) ) {
            wc_update_order_item_meta( $item_id, '_serial_number', sanitize_text_field( $_POST['serialno_item_'.$item_id] ) );
        }
    }
}
add_action('save_post_shop_order', 'save_order_item_custom_field_value');

// Optionally Keep the new meta key/value as hidden in backend
function additional_hidden_order_itemmeta( $args ) {
    $args[] = '_serial_number';
    return $args;
}
add_filter( 'woocommerce_hidden_order_itemmeta', 'additional_hidden_order_itemmeta', 10, 1 );
?>