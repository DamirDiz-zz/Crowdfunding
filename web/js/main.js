$(document).ready(function () {

    /***************** Header BG Scroll ******************/
    $(function () {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 20) {
                $('section.navigation').addClass('fixed');
                $('header').css({
                    "border-bottom": "none",
                    "padding": "30px 0"
                });

            } else {
                $('section.navigation').removeClass('fixed');
            }
        });
    });

});