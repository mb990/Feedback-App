$(document).ready(function(){
    //Log in input animation
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
    //Search teammate input
    $(".js-search").before("<i class='fas fasa js-live-search'>&#xf002;</i>");

    $(".js-search").attr('spellcheck',false);
    $(".write-feedback").attr('spellcheck',false);

    var $inputs = $(".js-search");      
    $inputs.on("input", function() {
        var $filled = $inputs.filter(function() { return this.value.trim().length > 0; });
        $('.js-live-search').toggleClass('js-filled', $filled.length > 0);
    });

    $('.js-write, .js-write-two').blur(function(){
        if(!$(this).val()){
            $(this).removeClass("written");
            // $('.js-hide').addClass("hide");
            // $('.js-hide-two').addClass("hide");

        } else{
            $(this).addClass("written");
            // $('.js-hide').removeClass("hide");
        } 
        if (!$('.js-write').val()){
            $('.js-hide').addClass("hide");
        } else{
            $('.js-hide').removeClass("hide");
        }
        if (!$('.js-write-two').val()){
            $('.js-hide-2').addClass("hide");
        } else{
            $('.js-hide-2').removeClass("hide");

        }
    });



});
