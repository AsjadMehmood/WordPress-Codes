<script>
document.addEventListener('DOMContentLoaded', function() {

    setTimeout(function() {

        if (!sessionStorage.getItem('ageVerified')) {
            console.log('Showing age verification popup');
            elementorProFrontend.modules.popup.showPopup({ id: 817 });

            document.querySelector('.age-yes-btn').addEventListener('click', function() {
                sessionStorage.setItem('ageVerified', 'true');
                console.log('Age verified, closing popup');
                elementorProFrontend.modules.popup.closePopup({ id: 817 });
            });

            document.querySelector('.elementor-button-no').addEventListener('click', function() {
                console.log('Redirecting to Google');
                window.location.href = 'https://www.google.com';
            });
        } else {
            console.log('User already verified age, not showing popup');
        }
    }, 1000);
});
</script>
