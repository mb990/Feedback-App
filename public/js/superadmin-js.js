$(document).ready(function () {
    // function getCompany(){
        $.get(
            '/superadmin/companies', function (data) {
                let output = [];
                data.companies.forEach(function (e) {
                    output += '<p>' + e.name + '<button>DEL</button><button>EDIT</button><input></p>';
                })
                $('.js-companies').append(output);
            }
        )
//     }
// getCompany();


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
            var name = $('.js-company').val()
            alert(name)
            $.post('/superadmin/companies', 
            {
                name: name
            },
        ).done(function(data){
            console.log(data)
        })
        }

        $('.js-add-skill-btn').click(addSkill);
        function addSkill(){
            var name = $('.js-skill').val()
            alert(name)

            $.post('/superadmin/skills', 
            {
                name: name
            },
        ).done(function(data){
            console.log(data)

        })
        }
})
