$(document).ready(function () {

    $('#companies').click(function () {
        $.get(
            '/superadmin/companies', function (data) {
                let output = [];

                data.companies.forEach(function (e) {
                    output += '<p>' + e.name + '</p><br>';
                })

                $('#companies-div').append(output);
            }

        )
    })

    $('#admins').click(function () {
        $.get(
            '/superadmin/admins', function (data) {
                let output = [];

                data.admins.forEach(function (e) {
                    output += '<p>' + e.first_name + e.last_name + '</p><br>';
                })

                $('#admins-div').append(output);
            }

        )
    })

    $('#skills').click(function () {
        $.get(
            '/superadmin/skills', function (data) {
                let output = [];

                data.skills.forEach(function (e) {
                    output += '<p>' + e.name + '</p><br>';
                })

                $('#skills-div').append(output);
            }

        )
    })
})
