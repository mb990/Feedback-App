$(document).ready(function () {

        $.get(
            '/superadmin/companies', function (data) {
                let output = [];

                data.companies.forEach(function (e) {
                    output += '<p>' + e.name + '</p><br>';
                })

                $('.js-companies').append(output);
            }

        )

        $.get(
            '/superadmin/admins', function (data) {
                let output = [];

                data.admins.forEach(function (e) {
                    output += '<p>' + e.first_name + e.last_name + '</p><br>';
                })

                $('.js-admins').append(output);
            }

        )

        $.get(
            '/superadmin/skills', function (data) {
                let output = [];

                data.skills.forEach(function (e) {
                    output += '<p>' + e.name + '</p><br>';
                })

                $('.js-skills').append(output);
            }

        )
})
