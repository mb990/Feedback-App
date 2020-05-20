$(document).ready(function () {
    $('#submit').click(function () {
        $.ajax({
            url: 'test',
            method: 'POST',
            data: {feedback_1: $('#comment_wrong').val()},
            success: function (result) {
                console.log(result);
                // $('.alert').show();
                $('.alert').html(result.success);
            }
        });
    });
});
