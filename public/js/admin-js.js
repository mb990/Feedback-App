$(document).ready(function () {
    function getUsers() {
        $.get(
            '/admin/users', function (data) {
                console.log(data.users);
                let output = [];

                $.each(data.users, function (i, e) {
                    // varijable: e.first_name, e.last_name, e.email, e.active
                    output += '<tr><td>' + e.first_name + '</td><td>' + e.last_name + '</td><td>'+
                    e.email+'</td><td>'+e.active+'</td><td><button id="delete-user" data-id='+e.id+'>Delete</button></td>'+
                    '<td><button id="edit-user" data-id='+e.id+'>Edit</button></td></tr>';
                })
                $('.js-admins-list').append(output);
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

    // DELETE USER

    $(document).on ('click', '#delete-user', function () {
        let id = $(this).data('id');
        $.ajax(
            {
                url: "/admin/users/" + id,
                type: 'DELETE',
                data: {
                    id: id
                },
            }).done(function (data) {
                alert(data.success);
            $('.js-admins-list').empty().append(getUsers);
        })
    })
})
