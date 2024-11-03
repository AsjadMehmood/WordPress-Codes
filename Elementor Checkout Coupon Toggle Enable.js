<script>
jQuery(document).ready(function($) {
    $('.e-show-coupon-form').on('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        $('.e-coupon-anchor').slideToggle(); // Toggle the visibility of the coupon field
    });
});
</script>
