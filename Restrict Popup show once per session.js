<script>
document.addEventListener('DOMContentLoaded', function() {

    // Set a timeout to delay the popup display, if needed
    setTimeout(function() {

        // Check if popup has not been shown in this session
        if (!sessionStorage.getItem('popupShown')) {
            console.log('Showing popup');
            elementorProFrontend.modules.popup.showPopup({ id: 817 });

            // When the user fills the form or closes the popup, set the session item
            document.querySelector('.elementor-popup__close-button, .elementor-button-submit').addEventListener('click', function() {
                sessionStorage.setItem('popupShown', 'true');
                console.log('Popup closed or form submitted');
                elementorProFrontend.modules.popup.closePopup({ id: 817 });
            });

        } else {
            console.log('Popup already shown this session, not showing again');
        }
    }, 1000);

});
</script>
