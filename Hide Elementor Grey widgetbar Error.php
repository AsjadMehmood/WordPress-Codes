add_action( 'elementor/editor/after_enqueue_scripts', function() {
    wp_add_inline_script( 'elementor-editor', '
        jQuery( window ).on( "elementor:init", function() {
            elementor.on( "panel:init", function() {
                jQuery( "#elementor-panel-state-loading" ).remove();
            });
        });
    ');
});
