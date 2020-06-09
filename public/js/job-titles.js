$(document).ready(function () {
    function getJobTitles() {
        $.get(
            '/superadmin/job-titles', function (data) {
                let output = [];
                data.positions.forEach(function (e) {
                    output += '<p style="display:flex">' + e.name +
                        '<button data-id="'+ e.id +
                        '" class="delete-position super-admin-btn" name="delete-position">DEL</button>'+
                        '<i style="margin:auto 0" class="add fas fa-plus-circle js-job-show" data-id="'+ e.id +'"></i>'+
                        '<span class="js-job-hide'+ e.id +' hide"><button data-id="'+ e.id +
                        '"class="edit-position super-admin-btn" id="edit-position">Update</button>' +
                        '<input type="text" name="edit-position'+ e.id +'" id="edit-position'+ e.id +'" data-id="'+ e.id +
                        '"class="js-edit-input'+ e.id +'" placeholder="Update job title">' +
                        '</span></p>';
                })
                $('.js-positions').append(output);
            }
        )
    }

    getJobTitles();

    // Add job
    $('.js-add-position-btn').click(addJobTitle);

    function addJobTitle() {
        $.post(
            '/superadmin/job-titles',
            {
                name: $('[name="position-name"]').val()
            })
            .done(function(data){
                $('.js-positions').empty().append(getJobTitles);
                $('.js-position').val("");
        })
    }

    // Update job title

    $(document).on ('click', '.edit-position', function () {
        let id = $(this).data('id');
        let name = $('#edit-position'+id).val();
        $.ajax(
            {
                url: "/superadmin/job-titles/" + id,
                type: 'PUT',
                data: {
                    name: name,
                }
            }).done(function (data) {
            $('.js-positions').empty().append(getJobTitles);
        });
    })

    // Delete job title

    $(document).on ('click', '.delete-position', function () {
        let id = $(this).data('id');
        $.ajax(
            {
                url: "/superadmin/job-titles/" + id,
                type: 'DELETE',
                data: {
                    id: id
                },
            }).done(function (data) {
            $('.js-positions').empty().append(getJobTitles);
        })
    })

        //Search positions
        $(".search-position").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".js-positions p").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        //Update job
        $(document).on ('click', '.js-job-show', function(){
            let id = $(this).data('id');
            let field = $('.js-job-hide'+id)
            field.toggle()
            $(this).toggleClass('fa-plus-circle fa-minus-circle')
        });
})
