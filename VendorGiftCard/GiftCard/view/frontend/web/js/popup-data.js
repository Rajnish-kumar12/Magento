require(['jquery', 'Magento_Ui/js/modal/modal', 'jquery/ui'], function ($, modal) {
    $(document).ready(function () {
        $("#preview-button").one("click", function () {
            let options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                modalClass: 'custom-giftcard-popup',
                buttons: []
            };
            modal(options, $('#giftcard-info-popup'));

        });
        $('#preview-button').click(function () {
            if ($("#product_addtocart_form").valid()) {
                let senderName = $('#giftcard_sender_name').val();
                let senderEmail = $('#giftcard_sender_email').val();
                let recipientName = $('#giftcard_recipient_name').val();
                let recipientEmail = $('#giftcard_recipient_email').val();
                let message = $('#giftcard-message').val();

                $('#sender-name').text(senderName);
                $('#sender-email').text(senderEmail);
                $('#recipient-name').text(recipientName);
                $('#recipient-email').text(recipientEmail);
                $('#message').text(message);

                $('#giftcard-info-popup').modal('openModal');
            }
        });
    });
});