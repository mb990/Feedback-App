$(document).ready(function () {

        $.get(
            '/superadmin/companies', function (data) {
                let output = [];
                data.companies.forEach(function (e) {
                    output += '<p>' + e.name + '<button>DEL</button><button>EDIT</button></p>';
                })
                $('.js-companies').append(output);
            }
        )


        $.get(
            '/superadmin/admins', function (data) {
                let output = [];
                data.admins.forEach(function (e) {
                    output += '<p>' + e.first_name + e.last_name + '<button>DEL</button><button>EDIT</button></p>';
                })
                $('.js-admins').append(output);
            }
        )

        $.get(
            '/superadmin/skills', function (data) {
                let output = [];
                data.skills.forEach(function (e) {
                    output += '<p>' + e.name + '<button>DEL</button><button>EDIT</button></p>';
                })
                $('.js-skills').append(output);
            }
        )
        $('.js-add-company-btn').click(addCompany);
        function addCompany(){
            var company = $('.js-company').val()
            alert(company)
            $.post('/superadmin/companies', 
            {
                name: company
            },
        ).done(function(){
            alert("done")
        })
        }
})
