$(document).ready(function () {
    // show message box on button click and load all messages
    $(document).on('click', '.send-message', function (e) {
        let toUser = $(this).attr('data-to-user');
        console.log('Message Sent to ' + toUser);

        let data = {to_user: toUser, _token: $("meta[name='csrf-token']").attr("content")};
        $.ajax({
            url: loadLatestMessages,
            method: 'GET',
            data: data,
            dataType: "html",
            success: function (response) {
                console.log(response);
                $('#chatBox').html(response);
                scrollMessageBoxToTop();
            },error: function (response) {
                console.log(response);
            }
        })
    });

    // send message to selected user
    $(document).on('submit', '#sendMessage', function (e) {
        e.preventDefault();
        let toUser = $(this).find('input[name="to_user"]').val();
        let fromUser = $(this).find('input[name="from_user"]').val();
        let message = $(this).find('input[name="message"]').val();
        if (message !== '' || message != null){
            let data = {'to_user': toUser, 'from_user': fromUser, message: message,
                _token: $("meta[name='csrf-token']").attr("content")};
            $.ajax({
                url: sendMessage,
                method: 'POST',
                data: data,
                dataType: "html",
                success: function (response) {
                    console.log(response);
                    $('#chatBox').html(response);
                    scrollMessageBoxToTop();
                },error: function (response) {
                    console.log(response);
                }
            })
        }
    });

    // close message box on clicking on cross icon
    $(document).on('click', '.message-box-close', function (e) {
        e.preventDefault();
        $(this).parents('.chat-room.small-chat').remove();
    });

    $(document).on('click', '#toggleMessageBox', function () {
        let toggleMode = $(this).attr('data-mode');
        if (toggleMode === 'show'){
            $(this).attr('data-mode', 'hide');
            $(this).siblings('.message-history').hide();
            $(this).siblings('.card-footer').hide();
        }else {
            $(this).attr('data-mode', 'show');
            $(this).siblings('.message-history').show();
            $(this).siblings('.card-footer').show()
        }
    });

});

// =========================================== HELPER FUNCTIONS =========================================/
function scrollMessageBoxToTop() {
    let messageBody = document.querySelector('.message-history');
    messageBody.scrollTop = messageBody.scrollHeight;
}