$(document).ready(function(){
    $(".login-btn").click(function(){
        $(".login-text").css("color", "red");
    });
    // $(".e-mail").onchange(function(){
    //     if ($(".e-mail").value == "") {
    //         $(".e-mail").css("background-color", "#d3d4d5");
    //     }
    //     else{
    //         $(".e-mail").css("background-color", "red");
    //     }
    // });
    $(".js-e-mail").change(function(){
            $(".e-mail").css("border-color", "#ec1940");
            $(".js-mail").toggle();
    });
    $(".js-password").change(function(){
        $(".password").css("border-color", "#ec1940");
        $(".js-pass").toggle();

    });


});
