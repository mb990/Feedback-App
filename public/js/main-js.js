$(document).ready(function(){
    $(".js-e-mail").change(function(){
            $(".e-mail").css("border-color", "#ec1940");
            $(".js-mail").toggle();
    });
    $(".js-password").change(function(){
        $(".password").css("border-color", "#ec1940");
        $(".js-pass").toggle();
    });
});
