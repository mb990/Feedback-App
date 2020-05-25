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

        // $('.js-test').click(function(){
        //     $('.main').load('feedback');
        // });

        // $('.js-test').click(function(){
        //     $('body').load('dashboard');
        // });

        // function buttonClick() {
            //var request = new XMLHttpRequest();
            //request.open('GET ili POST', 'url sa podacima ili lokalni fajl', true ili false (za asinhrono(true) ili sinhrono(false), uglavnom se stavlja true))
            //request.onload = function(){...} ovde proveravamo stanje request-a, ako je 200 sto je ok, onda manipulisemo podacima koje dobijamo iz request-a i prikazujemo ih na stranici
            // i na kraju
            // request.send()  saljemo request//
        // }

            // $('.js-test').click(test);
            // function test(){
            //     let xhr = new XMLHttpRequest();
            //     console.log(xhr)
            //     xhr.open('GET', 'url', true)
            //     xhr.onload = function(){
            //         if(this.status == 200){
            //     }
            // }
            //     xhr.send();
            // }

$('.list li').click(userFeedback);

// getUser(id);

function userFeedback(){
    $('.modal').show();
}

});

function getUser(id) {

    $.get('/feedback/user/'+id,
        {
            // data: {
            //     user_id: id,
            // },
            success: console.log('bravo')
        },
    ).done(function ($data) {
        console.log($data.user_id);
    });

    function userFeedback(){
        $('.modal').show();
    }
}
