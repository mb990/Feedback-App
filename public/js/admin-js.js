$(document).ready(function () {
    function getUsers() {
        $.get(
            '/admin/users', function (data) {
                let output = [];

                $.each(data.users, function (i, e) {
                    // varijable: e.first_name, e.last_name, e.email, e.active
                    output += '<tr class="js-user-del'+e.id+'"><td>' + e.first_name + '</td><td>' + e.last_name + '</td><td>'+
                    e.email+'</td><td>'+(e.active === 1 ? '<span title="active user"class="dot"></span>' : '<span title="Inactive user" class="dot-red"></span>')+
                    '</td><td><button id="'+e.id+'" class="admin-btn js-edit-user" data-id='+e.id+'>Edit</button>'+' '+'<button class="admin-btn" id="delete-user" data-id='+e.id+'>Delete</button></td></tr>'
                    // '<input type="text" id="edit-user-first-name '+ e.id +'" name="edit-user-first-name" value="'+ e.first_name +'">' +
                    // '<input type="hidden" id="hidden_user_id" name="id" value="'+ e.id +'">' +
                    // '<input type="text" id="edit-user-last-name '+ e.id +'" name="edit-user-last-name" value="'+ e.last_name +'">' +
                    // '<input type="text" id="edit-user-email '+ e.id +'" name="edit-user-email" value="'+ e.email +'">' +
                    // '<select>'
                    //     data.positions.forEach(function (e) {
                    //         + '<option value="'+ e.id +'">'+ e.name + '</option>'
                    //     })
                    // '</select>' +
                    // '<button id="edit-user" class="admin-btn js-edit-user" data-id='+e.id+'>Edit</button>' +
                    // '<input type="hidden" id="hidden_pass_id" name="id" value="'+ e.id +'">' +
                    // '<input type="password" id="edit-user-password '+ e.id +'" name="password" placeholder="update password">' +
                    // '<input type="password" id="password-confirm '+ e.id +'" name="password_confirmation" placeholder="confirm password">' +
                    // '<button id="edit-user-password" class="admin-btn js-edit-user-password" data-id='+e.id+'>Update password</button></td></tr>';
                })
                $('.js-admins-list').append(output);
                $(".js-edit-user").click(editUser)
                function editUser(){
                    id = $(this).attr('id')
                    $.get('/admin/users/'+id, function(data){
                        $('.js-edit-fname').val(data.user.first_name)
                        $('.js-edit-lname').val(data.user.last_name)
                        $('.js-edit-mail').val(data.user.email)
                    }
                    )
                    $('#hidden_user_id').val(id)
                    $(".js-user-modal").show()
                }

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
                            $(".js-admins-list").empty().append(getUsers),
                            $('.js-edit-form input').val('')
                            alert(data.user.first_name + ' ' + data.user.last_name + ' je sacuvan.');
                        })
                }
            }
        )
    }
    getUsers();



    // EDIT USER

    // function editUser() {
    //     id = $(this).attr('id');
    //     $.get('/admin/users/'+id, function(data){
    //         // $('#first_name').val(data.user.first_name);
    //         // $('#last_name').val(data.user.last_name);
    //         // $('#admin-email').val(data.user.email);
    // })}

    // UPDATE USER
    $('.js-update-user').click(updateUser)
    function updateUser(){
        id = $('#hidden_user_id').val();
        first_name = $('.js-edit-fname').val();
        last_name = $('.js-edit-lname').val();
        email = $('.js-edit-mail').val();
        job_title_id = $('#update-job-title').val()
        $.ajax(
            {
                url: "/admin/users/" + id,
                type: 'PUT',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    job_title_id: job_title_id
                }
            }).done(alert("User is updated"),
            $(".js-user-modal").hide(),
            $('.js-admins-list').empty().append(getUsers)
            )



    // UPDATE USER PASSWORD

    $('.js-update-password').click(updatePassword);
    function updatePassword(){
        id = $('#hidden_pass_id').val();
        password = $('#password' + id).val();
        password_confirmation = $('#password-confirm' + id).val();
        alert(password)
        $.ajax(            {
            url: "superadmin/admins/"+id+"/update/password",
            type: 'PUT',
            data: {
                password: password,
                password_confirmation: password_confirmation
            },
        })
    }

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
                $(".js-user-del"+id).remove();
        })
    })
    // UPDATE COMPANY FEEDBACK DURATION
    $(document).on ('click', '.admin-btn-feedback-duration', function () {
        let id = $(this).data('id');
        let feedback_duration_id = $('#feedback-time').val();
        $.ajax(
            {
                url: "/admin/companies/" + id,
                type: 'PUT',
                data: {
                    feedback_duration_id: feedback_duration_id,
                }
            }).done(function (data) {
                alert('Feedback time is updated.')
        });
    })
$('.js-edit-user-close').click(closeEdit)
function closeEdit(){
    $(".js-user-modal").hide()
}
})
