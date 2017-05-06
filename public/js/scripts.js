
jQuery(document).ready(function ($) {
    // $('.navbar-header > .navbar-toggle').on('click', function (e) {
    //     e.preventDefault();
    //     $('#navbar').slideToggle('slow');
    // });
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

