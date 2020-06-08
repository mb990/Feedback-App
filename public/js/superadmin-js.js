$(document).ready(function () {
    function getCompany(){
        $.get(
            '/superadmin/companies', function (data) {
                let output = [];
                data.companies.forEach(function (e) {
                    output += '<p style="display:flex">' + e.name +
                    (e.active === 1 ? '<span title="active company"class="dot"></span>' : '<span title="Inactive company" class="dot-red"></span>') + '<button data-id="'+ e.id +
                    '" class="delete-company super-admin-btn" name="delete-company">DEL</button>'+
                    '<i style="margin:auto 0" class="add fas fa-plus-circle js-super-show" data-id="'+ e.id +'"></i>'+
                    '<span class="hide js-super-hide'+ e.id +'"><button data-id="'+ e.id +
                    '"class="edit-company super-admin-btn" name="edit-company">Update</button><input data-id="'+ e.id +
                    '"class="js-edit-input'+ e.id +'" value="'+ e.name +'">'+
                    '<input class="js-edit-input'+ e.id +'name="active" id="active-'+ e.id +'" type="checkbox"' +
                        (e.active === 1 ? "checked" : "")
                        + ">"+'</span></p>';
                })
                $('.js-companies').append(output);
                
            }
        )
    }
    getCompany();

    function getAdmins(){
        $.get(
            '/superadmin/admins', function (data) {
                let output = [];
                data.admins.forEach(function (e) {
                    output += '<p>' + e.first_name + ' ' + e.last_name + ' <button data-id="'+ e.id +
                        '" class="delete-admin super-admin-btn" name="delete-admin">DEL</button>'+
                        '<button name="edit-admin" id="'+ e.id +'" class="super-admin-btn js-edit-modal">EDIT</button></p>';
                })
                $('.js-admins').append(output);
                $(".js-edit-modal").click(editAdmin);
                function editAdmin(){
                    id = $(this).attr('id')
                    $.get('/superadmin/admins/'+id+'/update', function(data){
                        $('#first_name').val(data.admin.first_name)
                        $('#last_name').val(data.admin.last_name)
                        $('#email').val(data.admin.e-mail)
                        $('#password').val(data.admin.password)

                    }
                    )
                    $(".edit-modal").show();
                }
            }
        )
    }

    getAdmins();

    function getSkills(){
        $.get(
            '/superadmin/skills', function (data) {
                let output = [];
                data.skills.forEach(function (e) {
                    output += '<p style="display:flex">' + e.name +
                        '<button data-id="'+ e.id +
                        '" class="delete-skill super-admin-btn" name="delete-skill">DEL</button>'+
                        '<i style="margin:auto 0" class="add fas fa-plus-circle js-skill-show" data-id="'+ e.id +'"></i>'+
                        '<span class="hide js-skill-hide'+ e.id +'"><button data-id="'+ e.id +
                        '"class="edit-skill super-admin-btn" name="edit-skill">Update</button><input data-id="'+ e.id +
                        '"class="js-edit-input'+ e.id +'" placeholder="Update skill name"></span></p>';
                })
                $('.js-skills').append(output);
            }
        )
    }
    getSkills();
        //ADD COMPANY
        $('.js-add-company-btn').click(addCompany);
        function addCompany(){
            var name = $('.js-company').val()
            $.post('/superadmin/companies',
            {
                name: name
            },
        ).done(function(data){
            $('.js-companies').empty().append(getCompany);
            $('.js-company').val("");
        })
        }
        //ADD ADMIN
        $('.js-add-admin-btn').click(addAdmin);
        function addAdmin(){
            let first_name = $('#first-name').val()
            let last_name = $('#last-name').val()
            let email = $('#email').val()
            let password = $('#password').val()
            let password_confirmation = $('#password-confirm').val()
            let company_id = $('#company-id').val()
            $.post('/superadmin/admins',
            {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                password_confirmation: password_confirmation,
                company_id: company_id
            },
        ).done(function(data){
            $('.js-admins').empty().append(getAdmins);
            $(".superadmin-modal").hide()
            $(".superadmin-modal > input").val("")
        })
        }

        $('.js-add-skill-btn').click(addSkill);
        function addSkill(){
            var name = $('.js-skill').val()

            $.post('/superadmin/skills',
            {
                name: name
            },
        ).done(function(data){
            $('.js-skills').empty().append(getSkills);
        })
        }

        $(document).on ('click', '.delete-company', function () {
            let id = $(this).data('id');
            $.ajax(
                {
                    url: "/superadmin/companies/" + id + "/delete",
                    type: 'DELETE',
                    data: {
                        id: id
                    },
            }).done(function (data) {
                $('.js-companies').empty().append(getCompany);
            })
        });
        $(document).on ('click', '.edit-company', function () {
            let id = $(this).data('id');
            let active = '';
            let name = $('.js-edit-input'+id).val();
            if (document.getElementById('active-' + id).checked) {
                active = 1;
            }
            else {
                active = 0;
            }
            $.ajax(
                {
                    url: "/superadmin/companies/" + id + "/update",
                    type: 'PUT',
                    data: {
                        name: name,
                        active: active
                    }
            }).done(function (data) {
                alert('updated');
                $('.js-companies').empty().append(getCompany);
            });
            // $.ajax({
            //     type: "GET",
            //     url: "/superadmin/companies/" + id + "/edit",
            //     data: "data",
            //     dataType: "dataType",
            //     success: function (response) {

            //     }
            // });
        })

    $(document).on ('click', '.delete-skill', function () {
        let id = $(this).data('id');
        $.ajax(
            {
                url: "/superadmin/skills/" + id + "/delete",
                type: 'DELETE',
                data: {
                    id: id
                },
            }).done(function (data) {
                alert('obrisano');
            $('.js-skills').empty().append(getSkills);
        })
    })

    $(document).on ('click', '.edit-skill', function () {
        let id = $(this).data('id');
        let name = $('.js-edit-input'+id).val();
        $.ajax(
            {
                url: "/superadmin/skills/" + id + "/update",
                type: 'PUT',
                data: {
                    name: name
                },
            }).done(function (data) {
            $('.js-skills').empty().append(getSkills);
        })
    })

    $(document).on ('click', '.delete-admin', function () {
        let id = $(this).data('id');
        $.ajax(
            {
                url: "/superadmin/users/" + id + "/delete",
                type: 'DELETE',
                data: {
                    id: id
                },
            }).done(function (data) {
            alert(data.success);
            $('.js-admins').empty().append(getAdmins);
        })
    })
    $(document).on ('click', '.js-super-show', function(){
        let id = $(this).data('id');
        let field = $('.js-super-hide'+id)
        field.toggle()
        $(this).toggleClass('fa-plus-circle fa-minus-circle')

    });
    $(document).on ('click', '.js-skill-show', function(){
        let id = $(this).data('id');
        let field = $('.js-skill-hide'+id)
        field.toggle()
        $(this).toggleClass('fa-plus-circle fa-minus-circle')
    });
    $(document).on ('click', '.js-job-show', function(){
        let id = $(this).data('id');
        let field = $('.js-job-hide'+id)
        field.toggle()
        $(this).toggleClass('fa-plus-circle fa-minus-circle')
    });
    $('#tabs ul li a').click(function(){
        $('#tabs ul li a').removeClass('current-tab');
        $(this).addClass('current-tab');
    });

    $(document).ready(function(){
        $(".search-company").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".js-companies p").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(".js-superadmin-modal-btn").click(getModal);
    function getModal(){
        $(".superadmin-modal").toggle()
        $(this).text(function(i, text){
            return text === "Close" ? "Add new admin" : "Close";
        })
    }
    $(".js-edit-modal").click(editAdmin);
    function editAdmin(){
        $(".edit-modal").show();
    }

    $('.js-edit-close').click(closeEdit);
    function closeEdit(){
        $('.edit-modal').hide();
    }

})
