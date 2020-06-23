$(document).ready(function () {

    // send notification to all users

    function notifyUsers() {

        let message = $('#message').val();

        $.post(
            '/admin/notification/send',
            {
                message: message
            })
            .done(function (data) {
                console.log(data.request);
            });
    }

});
