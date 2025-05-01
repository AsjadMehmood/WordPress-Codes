jQuery(document).ready(function($) {
    // Wait for the checkout form to load (important for dynamic content)
    $(document.body).on('updated_checkout', function() {
        // Check if the text already exists to avoid duplicates
        if (!$('.custom-purchase-agreement').length) {
            // Create the HTML for the agreement text
            var agreementText = `
                <div class="custom-purchase-agreement" style="margin-top: 15px; font-size: 0.875em; line-height: 1.5; color: #666; text-align: left;">
                    <p>By making a purchase, you agree to our 
                        <a href="https://fundexplus.com/terms-and-conditions" target="_blank" style="color: #1a73e8; text-decoration: none;">Terms and Conditions</a>, 
                        <a href="https://fundexplus.com/" target="_blank" style="color: #1a73e8; text-decoration: none;">Privacy Policy</a>, and 
                        <a href="https://fundexplus.com/" target="_blank" style="color: #1a73e8; text-decoration: none;">Refund Policy</a>.
                    </p>
                </div>
            `;
            // Insert it after the Place Order button
            $('#place_order').after(agreementText);
        }
    });
});
