
jQuery(document).ready(function ($) {
    $(window).on('load',function (e) {
        $('.checkbox input[type=checkbox]:checked').next('span').addClass('checked').parent('label').addClass('selected');
    });

    $('.checkbox input[type=checkbox]').change(function (e) {
        e.preventDefault();
        $(this).next('span').toggleClass('checked');
        $(this).parent('label').toggleClass('selected');
    });

    //radiobtn


    $(window).on('load',function (e) {
        $('.radio input[type=radio]:checked').next('span').addClass('checked').parent('label').addClass('selected');
    });

    $('.radio input[type=radio]').on('change', function (e) {
        e.preventDefault();
        $('.radio input[type=radio]').next('span').removeClass('checked');
        $('.radio input[type=radio]').parent('label').removeClass('selected');
        $(this).next('span').addClass('checked');
        $(this).parent('label').addClass('selected');
    });

    $('.navbar-header > .navbar-toggle').on('click', function (e) {
        e.preventDefault();

        $('#navbar').slideToggle('slow');
    });


    if ($('.animated').length) {
        var $ = jQuery;

        $('.animated').appear(function () {
            var element = $(this);
            var animation = element.data('animation');
            var animationDelay = element.data('delay');
            if (animationDelay) {
                setTimeout(function () {
                    element.addClass(animation + " in");
                    element.removeClass('out');
                }, animationDelay);
            } else {
                element.addClass(animation + " in");
                element.removeClass('out');
            }

        }, {accY: -150});

    }
});

