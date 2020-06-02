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

    // $('.js-write, .js-write-two').blur(function(){
    //     if(!$(this).val()){
    //         $(this).removeClass("written");
    //         // $('.js-hide').addClass("hide");
    //         // $('.js-hide-two').addClass("hide");

    //     } else{
    //         $(this).addClass("written");
    //         // $('.js-hide').removeClass("hide");
    //     }
    //     if (!$('.js-write').val()){
    //         $('.js-hide'+id).addClass("hide");
    //     } else{
    //         $('.js-hide'+id).removeClass("hide");
    //     }
    //     if (!$('.js-write-two').val()){
    //         $('.js-hide-2'+id).addClass("hide");
    //     } else{
    //         $('.js-hide-2'+id).removeClass("hide");

    //     }
    // });

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

    $('.list li').click(getUser);

    $('.js-comments').click(getComments);
    function getComments(){
        $('.comments').slideToggle('500');
        $('.btn-container').find('i').toggleClass('fa-chevron-down fa-chevron-up')
    }
    // $('.list li').click(userFeedback);
    // $('.js-close').click(closeFeedback);

    // function userFeedback(e){
    //     e.preventDefault();
    //     $('.modal').show();
    //     $('.container').hide();
    // };
    // function closeFeedback(){
    //     $('.modal').hide();
    //     $('.container').show();
    // }

$('.js-accepted').hide()


    

    function getUser() {
        // e.preventDefault();
        let id = $(this).attr('data-userId');

        $('.js-write'+id).blur(function(){
            if(!$(this).val()){
                $(this).removeClass("written");
            } else{
                $(this).addClass("written");
            }
            if (!$('.js-write'+id).val()){
                $('.js-hide'+id).addClass("hide");
            } else{
                $('.js-hide'+id).removeClass("hide");
            }
        })
        $('.js-write-two'+id).blur(function(){
            if(!$(this).val()){
                $(this).removeClass("written");
            } else{
                $(this).addClass("written");
            }
            if (!$('.js-write-two'+id).val()){
                $('.js-hide-2'+id).addClass("hide");
            } else{
                $('.js-hide-2'+id).removeClass("hide");
            }
        });









        $('.js-close'+id).click(closeFeedback);
        function closeFeedback(){
            $('.modal'+id).hide();
            $('.js-no-selected').show();
        }
        $.get('/feedback/user/'+id,
            {
                success:  function(){
                        $('.modal').css('display', 'none')
                        $('.modal'+id).show();
                        $('.js-no-selected').hide()
                        $('.js-accepted').hide()
                }
            }
        ).done(function ($data) {
            alert($data.feedback.comment_wrong  +  $data.feedback.comment_improve)
            $('.js-wrong'+id).attr('disabled', true)
            $('.js-improve'+id).attr('disabled', true)
            $('.js-rating'+id).attr('disabled', true)
            // $('.js-hide'+id).removeClass("hide");
            // $('.js-hide-2'+id).removeClass("hide");
            console.log($data.feedback.comment_wrong);
        });
    }
    let star = $('.star-rating').text()
    $('.star-rating').html(getStars(star))
    function getStars(star) {
        alert(star)
        star = Math.round(star * 2) / 2;
        let output = [];
        // Append all the filled whole stars
        for (var i = star; i >= 1; i--)
        output.push('<i class="fa fa-star"  style="color: red;"></i>&nbsp;');

        // If there is a half a star, append it
        if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: blue;"></i>&nbsp;');
        // Fill the empty stars
        for (let i = (5 - star); i >= 1; i--)
        output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: green;"></i>&nbsp;');

        return output.join('');
    }

});


