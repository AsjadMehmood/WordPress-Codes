/**
 * Automatically mark all "Processing" orders as "Completed".
 */
add_action('woocommerce_order_status_processing', 'auto_complete_all_processing_orders');

function auto_complete_all_processing_orders($order_id) {
    // Get the order object
    $order = wc_get_order($order_id);

    // Update the order status to "Completed"
    $order->update_status('completed');
}
