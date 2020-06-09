$(document).ready(function () {
    function getUsers() {
        // $.get(
        //     '/admin/users', function (data) {
        //         console.log(data);
        //         // let output = [];
        //         data.users.forEach(function (e) {
        //             // console.log(1);
        //             // varijable: e.first_name, e.last_name, e.email, e.password, e.active
        //             // output += '';
        //         })
        //         // $('.js-users').append(output);
        //     }
        // )
        $.ajax(
            {
                url: "/admin/users",
                type: 'GET',
                // data: {
                //     first_name: first_name,
                //     last_name: last_name,
                //     email: email
                // }
            }).done(console.log(23));
    }
    getUsers();
})
