require(['jquery'], function($) {
    $(document).ready(function() {
        console.log('custom-popup.js loaded');

        // When the link is clicked, show the modal
        $('#show-custom-attribute-popup').on('click', function(e) {
            e.preventDefault();
            console.log('Link clicked');
            $('#custom-attribute-modal').show(); // Show the modal
        });

        // Close the modal when the close button is clicked
        $('#close-custom-attribute-popup').on('click', function() {
            $('#custom-attribute-modal').hide(); // Hide the modal
        });
    });
});
