$(document).ready(function () {
    function getUsers() {
        $.get(
            '/admin/users', function (data) {
                let output = [];
                data.users.forEach(function (e) {
                    // varijable: e.first_name, e.last_name, e.email, e.active
                    output += '';
                })
                // $('.js-users').append(output);
            }
        )
    }
    getUsers();

    // ADD USER

    $('.admin-btn').click(addUser);

    function addUser() {
        let first_name = $('#first-name').val();
        let last_name = $('#last-name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let password_confirmation = $('#password-confirm').val();
        let company_id = $('#company-id').val();
        let job_title_id = $('#job-title').val();
        $.post(
            '/admin/users',
            {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                password_confirmation: password_confirmation,
                company_id: company_id,
                job_title_id: job_title_id,
                picture: 'https://picsum.photos/200/300'
            })
            .done(function(data){
                // console.log(data.user);
                alert(data.user.first_name + ' ' + data.user.last_name + ' je sacuvan.');
            })
    }
})
