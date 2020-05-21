$(document).ready(function () {
    $('#submit').click(function () {
        $.ajax({
            url: 'test-post',
            method: 'POST',
            data: {
                skill_name: $('#skill_name').val(),
                feedback_1: $('#comment_wrong').val(),
                feedback_2: $('#comment_improve').val(),
            },
            success: function (result) {
                console.log(result);
                // $('.alert').show();
                $('.alert').html(result.success);
            }
        });
    });
});
