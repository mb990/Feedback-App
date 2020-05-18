$(document).ready(function(){
    $(".js-e-mail").change(function(){
        $(".e-mail").css("border-color", "#ec1940");
        $(".js-mail").toggle();
    });
    $(".js-password").change(function(){
        $(".password").css("border-color", "#ec1940");
        $(".js-pass").toggle();
    });
    $(".js-search").on("keyup", function(){
        var value = $(this).val().toLowerCase();
        $(".list li").filter(function(){
            $(this).toggle($(this).text().toLocaleLowerCase().indexOf(value) > -1);
            
        });
    });
    $(".js-search").before("<i class='fas js-live-search'>&#xf002;</i>");
    // $(".js-search").change(function(){
    //     $(".js-search").css("border-color", "#ec1940");
    //     $(".fas").css("border-color", "#ec1940");
    //     $(".fas").css("color", "#ec1940");
    // })
    var $inputs = $(".js-search");      
    $inputs.on("input", function() {
        var $filled = $inputs.filter(function() { return this.value.trim().length > 0; });
        $('.js-live-search').toggleClass('js-filled', $filled.length > 0);
    });
});
