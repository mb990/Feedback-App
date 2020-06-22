$(document).ready(function () {
    function getUsers() {
        $.get(
            '/admin/users', function (data) {
                let output = [];

                $.each(data.users, function (i, e) {
                    output += '<tr class="media-user js-user-del'+e.id+'"><td>' + e.first_name + '</td><td>' + e.last_name + '</td><td>'+
                        e.email+'</td><td>'+e.profile.job_title.name+'</td><td class="user-status-dot"><label class="switch"><input class="check-slider "data-id='+ e.id +' name="chk-box" id="chk-box" value="1" type="checkbox" '+ (e.active === 1 ? "checked" : "" )+' ><span class="slider round"></span></label>'+
                        // (e.active === 1 ? '<span title="active user"class="dot"></span> ' : '<span title="Inactive user" class="dot-red"></span>')+
                        '</td><td><button id="'+e.id+'" class="admin-btn js-edit-user" data-id='+e.id+'>Edit</button>'+' '+'<button class="admin-btn" id="delete-user" data-id='+e.id+'>Delete</button></td></tr>'
// '<input type="text" id="edit-user-first-name '+ e.id +'" name="edit-user-first-name" value="'+ e.first_name +'">' +
// '<input type="hidden" id="hidden_user_id" name="id" value="'+ e.id +'">' +
// '<input type="text" id="edit-user-last-name '+ e.id +'" name="edit-user-last-name" value="'+ e.last_name +'">' +
// '<input type="text" id="edit-user-email '+ e.id +'" name="edit-user-email" value="'+ e.email +'">' +
// '<select>'
// data.positions.forEach(function (e) {
// + '<option value="'+ e.id +'">'+ e.name + '</option>'
// })
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
                            $('#update-job-title').val(data.user.profile.job_title_id)
                        }
                    )
                    $('#hidden_user_id').val(id)
                    $(".js-user-modal").show()
                }
                $("#form").on('submit',(function(e) {
                    e.preventDefault();
                    let form_data = new FormData();
                    form_data.append('first_name', $('#first-name').val());
                    form_data.append('last_name', $('#last-name').val());
                    form_data.append('email', $('#email').val());
                    form_data.append('password', $('#password').val());
                    form_data.append('password_confirmation', $('#password-confirm').val());
                    form_data.append('company_id', $('#company-id').val());
                    form_data.append('job_title_id', $('#job-title').val());
                    form_data.append('picture', $('#image')[0].files[0]);
// debugger;
                    $.ajax({
                        url: "/admin/users",
                        type: "post", // Type of request to be send, called as method
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data) // A function to be called if request succeeds
                        {
                            console.log(data.request);
                            alert('User added');
                            $(".js-admins-list").empty().append(getUsers);
                            $('.js-edit-form input').val('');
                            $(".js-statistics").load(location.href+" .js-statistics>*","");
                        },
                        error: (function(data){
                            if (data.responseJSON.errors.first_name) {
                                $('.js-error-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                            }
                            if (data.responseJSON.errors.last_name) {
                                $('.js-error-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                            }
                            if (data.responseJSON.errors.email) {
                                $('.js-error-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                            }
                            if (data.responseJSON.errors.password) {
                                $('.js-error-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                            }
                            if (data.responseJSON.errors.picture) {
                                $('.js-error-picture').slideDown().text(data.responseJSON.errors.picture[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                            }
                        })
                    }).done((function(data){

                        })
                    )
                }));
// ADD USER

// $('.js-add-user').click(addUser);

// function addUser() {
// let first_name = $('#first-name').val();
// let last_name = $('#last-name').val();
// let email = $('#email').val();
// let password = $('#password').val();
// let password_confirmation = $('#password-confirm').val();
// let company_id = $('#company-id').val();
// let job_title_id = $('#job-title').val();
// // let picture = $('#add-img').prop('files');
// // console.log(job_title_id);
// $.ajax({
// url:'/admin/users',
// type: 'post',
// data:
// {
// first_name: first_name,
// last_name: last_name,
// email: email,
// password: password,
// password_confirmation: password_confirmation,
// company_id: company_id,
// job_title_id: job_title_id,
// // picture: picture
// }})
// .done(function(data){
// console.log(data.request);
// $(".js-admins-list").empty().append(getUsers);
// $('.js-edit-form input').val('');
// // alert(data.user.first_name + ' ' + data.user.last_name + ' je sacuvan.');
// })
// }
            }
        )
    }
    getUsers();



// EDIT USER

// function editUser() {
// id = $(this).attr('id');
// $.get('/admin/users/'+id, function(data){
// // $('#first_name').val(data.user.first_name);
// // $('#last_name').val(data.user.last_name);
// // $('#admin-email').val(data.user.email);
// })}

// UPDATE USER
    $('.js-update-user').click(updateUser);
    function updateUser(){
        id = $('#hidden_user_id').val();
        first_name = $('.js-edit-fname').val();
        last_name = $('.js-edit-lname').val();
        email = $('.js-edit-mail').val();
        job_title_id = $('#update-job-title').val();
// picture = document.getElementById('picture').files[0];
        $.ajax(
            {
                url: "/admin/users/" + id,
                type: 'PUT',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    job_title_id: job_title_id,
// picture: picture
                },
                error: (function(data){
                    if (data.responseJSON.errors.first_name) {
                        $('.js-error-edit-user-first-name').slideDown().text(data.responseJSON.errors.first_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                    }
                    if (data.responseJSON.errors.last_name) {
                        $('.js-error-edit-user-last-name').slideDown().text(data.responseJSON.errors.last_name[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                    }
                    if (data.responseJSON.errors.email) {
                        $('.js-error-edit-user-email').slideDown().text(data.responseJSON.errors.email[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                    }
                })
            }).done(alert("User is updated"),
            $(".js-user-modal").hide(),
            $('.js-admins-list').empty().append(getUsers)
        );



    }
// UPDATE USER PASSWORD

    $('.js-user-update-password').click(updateUserPassword);
    function updateUserPassword(){
        id = $('#hidden_user_id').val();
        password = $('#password1').val();
        password_confirmation = $('#password-confirm1').val();
        alert(id)
        alert(password)
        alert(password_confirmation)
        $.ajax( {
            url: "/admin/users/"+id+"/update/password",
            type: 'PUT',
            data: {
                password: password,
                password_confirmation: password_confirmation
            },
            error: (function(data){
                if (data.responseJSON.errors.password) {
                    $('.js-error-edit-user-password').slideDown().text(data.responseJSON.errors.password[0]).fadeIn(3000).delay(3000).fadeOut("slow");
                }
            })
        }).done(alert("Password is updated"))
    }
//ADD USER MODAL BUTTON
    $('.js-show-new-user').click(showNew)
    function showNew(){
        var ix = $(this).index();
        $('.js-admin-modal').toggle( ix === '1' ? '0' : '1');
        $('.js-interactive-text').toggle( ix === '0' ? '1' : '0');
        if($(this).text()=="New user"){
            $(this).text("Close");
        } else {
            $(this).text("New user");
        }
    }
//EDIT FEEDBACK TIME MODAL BUTTON
    $('.js-show-time-update').click(showTime)
    function showTime(){
        var ix = $(this).index();
        $('.js-tab-2').toggle( ix === '1' ? '0' : '1');
        $('.js-feedback-interval').toggle( ix === '0' ? '1' : '0');
        if($(this).text()=="Edit time"){
            $(this).text("Close");
        } else {
            $(this).text("Edit time");
        }
    }
//SHOW STATS BUTTON
    $('.js-stats').click(showStats)
    function showStats(){
        var ix = $(this).index();
        $('.js-statistics').toggle( ix === '1' ? '0' : '1');
        $('.js-stats-info').toggle( ix === '0' ? '1' : '0');
        if($(this).text()=="Statistics"){
            $(this).text("Close");
        } else {
            $(this).text("Statistics");
        }
    }
    //MOBILE VIEW TEST
    function testScreen(){
        if($(window).width() < 430 ){
            console.log('test');
            $('.js-media-show').click(mediaUsers);
                function mediaUsers(){
                    var ix = $(this).index();
                    $('.js-admin-modal').toggle();
                    $('.js-interactive-text').toggle();
                }
            $('.js-media-time').click(mediaTime);
                function mediaTime(){
                    var ix = $(this).index();
                    $('.js-tab-2').toggle();
                    $('.js-feedback-interval').toggle();
                }
            $('.js-media-stats').click(mediaStats);
                function mediaStats(){
                    var ix = $(this).index();
                    $('.js-statistics').toggle();
                    $('.js-stats-info').toggle();
                }
        }
    }
testScreen();
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
            $(".js-statistics").load(location.href+" .js-statistics>*","");
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
// change user status
    $(document).on("change", "input[name='chk-box']", function() {

        let id = $(this).data('id');

        $.ajax({
            url: '/admin/users/' + id + '/update/status',
            type: 'put',
            data: {
                id: id
            }
        }).done(function (data) {
            $(".js-statistics").load(location.href+" .js-statistics>*","");
            alert(data.success);
        })
    });


// let text = $('#tekst').val();
// let picture = document.getElementById('add_img').files[0];
// // form_data.append('picture', picture);
// // form_data.append('text', text);
// $("#upload-picture-button").click(function(e){
// e.preventDefault();
// // let picture = $('#picture').prop('files')[0];
// $.ajax({
// url: "/admin/users/" + 6 + "/update/picture",
// type: "put",
// data: form_data,
// contentType: false,
// cache: false,
// processData:false,
// enctype: 'multipart/form-data',
// success: function(data){
// alert('Picture is uploaded');
// console.log(data.request);
// },
// error: function(){}
// });
// });
// let form_data = new FormData();
// form_data.append('picture', $('#add-img')[0].files[0]);
// let text = $('#tekst').val();
// let picture = ;
//
// form_data.append('tekst', text);


// forma

// $("#uploadimage").on('submit', function(e) {
// e.preventDefault();
// let form_data = new FormData(this);
// form_data.append('picture',$('#file')[0].files[0])
// $.ajax({
// url: "/admin/users/" + 6 + "/update/picture",
// type: "put",
// data: form_data,
// contentType: false,
// dataType: 'JSON',
// cache: false,
// processData:false,
// success: function(data){
// alert('Picture is uploaded');
// console.log(data.request);
// },
// })
// })
})
