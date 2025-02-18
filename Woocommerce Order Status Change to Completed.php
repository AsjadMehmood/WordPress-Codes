/**
 * Automatically mark all WooCommerce orders as "Completed" regardless of their initial status.
 */
add_action('woocommerce_order_status_changed', 'auto_complete_all_orders', 10, 4);

function auto_complete_all_orders($order_id, $old_status, $new_status, $order) {
    // Check if the order is not already completed
    if ($new_status !== 'completed') {
        // Update the order status to "Completed"
        $order->update_status('completed');
    }
}
