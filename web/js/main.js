$(document).ready(function () {


    if ($(".full-page-form-holder").length > 0) {
        $('section.navigation').addClass('fixed');
                    $('header').css({
                        "border-bottom": "none",
                        "padding": "15px 0"
                    });
    } else {
        $('section.navigation').addClass('transition');
        
        /***************** Header BG Scroll ******************/
        $(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();

                if (scroll >= 20) {
                    $('section.navigation').addClass('fixed');
                    $('header').css({
                        "border-bottom": "none",
                        "padding": "15px 0"
                    });

                } else {
                    $('section.navigation').removeClass('fixed');
                    $('header').css({
                        "border-bottom": "solid 1px rgba(255, 255, 255, 0.2)",
                        "padding": "15px 0"
                    });
                }
            });
        });
    }
});