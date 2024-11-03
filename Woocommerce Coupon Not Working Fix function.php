// Enqueue custom JavaScript for the coupon apply functionality
function enqueue_custom_coupon_script() {
    // Enqueue the custom inline JavaScript for handling the coupon code
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.e-apply-coupon').on('click', function(event) {
                event.preventDefault(); // Prevent default form submission
                let couponCode = $('#coupon_code').val(); // Get the entered coupon code
                
                if (couponCode) {
                    // AJAX call to apply the coupon
                    $.ajax({
                        url: wc_checkout_params.ajax_url, // WooCommerce AJAX URL
                        type: 'POST',
                        data: {
                            action: 'apply_coupon_custom',
                            coupon_code: couponCode
                        },
                        success: function(response) {
                            if (response.success) {
                                $('body').trigger('update_checkout'); // Trigger checkout update
                            } else {
                                alert('Coupon not applied: ' + response.data.message);
                            }
                        },
                        error: function() {
                            alert('There was an error applying the coupon. Please try again.');
                        }
                    });
                } else {
                    alert('Please enter a coupon code');
                }
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'enqueue_custom_coupon_script');

// Handle AJAX request to apply coupon
function apply_coupon_custom() {
    if (isset($_POST['coupon_code'])) {
        $coupon_code = sanitize_text_field($_POST['coupon_code']);
        WC()->cart->apply_coupon($coupon_code);

        if (WC()->cart->has_discount($coupon_code)) {
            wp_send_json_success();
        } else {
            wp_send_json_error(array('message' => 'Coupon code is invalid or expired.'));
        }
    } else {
        wp_send_json_error(array('message' => 'Coupon code is required.'));
    }
}
add_action('wp_ajax_apply_coupon_custom', 'apply_coupon_custom');
add_action('wp_ajax_nopriv_apply_coupon_custom', 'apply_coupon_custom');
