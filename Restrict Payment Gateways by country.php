add_filter( 'woocommerce_available_payment_gateways', 'restrict_toyyibpay_by_ip_location' );

function restrict_toyyibpay_by_ip_location( $available_gateways ) {
    if ( is_admin() ) return $available_gateways;

    // List of allowed Asian country codes
    $allowed_countries = array( 'AF', 'AM', 'AZ', 'BH', 'BD', 'BT', 'BN', 'KH', 'CN', 'CY', 'GE', 'IN', 'ID', 'IR', 'IQ', 'IL', 'JP', 'JO', 'KZ', 'KW', 'KG', 'LA', 'LB', 'MY', 'MV', 'MN', 'MM', 'NP', 'KP', 'OM', 'PE', 'PK', 'PS', 'PH', 'QA', 'SA', 'SG', 'KR', 'LK', 'SY', 'TW', 'TJ', 'TH', 'TR', 'TM', 'TL', 'AE', 'UZ', 'VN', 'YE', 'HK' );

    // Get the customer’s country based on their IP address
    $geo_data = WC_Geolocation::geolocate_ip();

    // Check if we have valid geo data
    if ( !empty( $geo_data['country'] ) ) {
        $customer_country = $geo_data['country'];

        // If the customer's country is not in the allowed Asian countries, remove ToyyibPay
        if ( !in_array( $customer_country, $allowed_countries ) ) {
            unset( $available_gateways['toyyibpay'] );
        }
    } else {
        // If we cannot detect the customer's country, hide ToyyibPay as a fallback
        unset( $available_gateways['toyyibpay'] );
    }

    return $available_gateways;
}
