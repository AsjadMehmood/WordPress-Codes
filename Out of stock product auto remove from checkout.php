function auto_remove_out_of_stock_items() {
    if (WC()->cart->is_empty()) return; // If cart is empty, skip

    $removed_items = [];

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product = wc_get_product($cart_item['product_id']);

        if (!$product || !$product->is_in_stock()) {
            $removed_items[] = $product->get_name(); // Store removed product names
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    // If any items were removed, show a WooCommerce notice
    if (!empty($removed_items)) {
        $message = sprintf(
            __('The following items were removed from your cart as they are out of stock: %s', 'woocommerce'),
            implode(', ', $removed_items)
        );
        wc_add_notice($message, 'notice');
    }
}

// Run this check on every page load (supports Elementor & funnel pages)
add_action('wp', 'auto_remove_out_of_stock_items');
