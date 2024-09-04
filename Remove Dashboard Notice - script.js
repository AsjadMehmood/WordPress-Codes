function remove_dashboard_notice_output() {
    // Start output buffering
    ob_start(function($buffer) {
        // Remove the specific notice based on its class
        $buffer = preg_replace('/<div class="notice notice-error rb-setting-warning.*?<\/div>/s', '', $buffer);
        return $buffer;
    });
}
add_action('admin_init', 'remove_dashboard_notice_output');
