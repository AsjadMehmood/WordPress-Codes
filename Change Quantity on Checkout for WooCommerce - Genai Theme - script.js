// Add remove button above product list in checkout
add_action( 'woocommerce_checkout_before_order_review', 'add_remove_button_above_checkout' );

function add_remove_button_above_checkout() {
    echo '<div class="remove-items-container">';
    
    // Display a remove button for each cart item
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product_id = $cart_item['product_id'];
        echo '<a href="' . esc_url( wc_get_cart_remove_url( $cart_item_key ) ) . '" class="remove-item" aria-label="Remove this item" data-product_id="' . esc_attr( $product_id ) . '"><span class="remove-icon">×</span></a><br>';
    }

    echo '</div>';
}

// Ensure cart item is removed on click
add_action( 'template_redirect', 'remove_cart_item' );

function remove_cart_item() {
    if ( isset( $_GET['remove_item'] ) ) {
        $cart_item_key = sanitize_text_field( $_GET['remove_item'] );
        WC()->cart->remove_cart_item( $cart_item_key );
        wc_add_notice( 'Item removed successfully.', 'success' );
        wp_safe_redirect( wc_get_checkout_url() );
        exit;
    }
}

