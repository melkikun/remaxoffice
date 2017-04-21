

//revolution-slider

jQuery(document).ready(function ($) {


    

    //portfoli mixitup	
    // try {

    //     $('.filter-list').mixitup({
    //         effects: ['fade', 'blur']
    //     });



    //     $(function () {
    //         $('.filter-property').on('click', function (e) {
    //             e.preventDefault();
    //             var price1 = $('input[name=min-price]').val(),
    //                     price2 = $('input[name=max-price]').val(),
    //                     $container = $('.filter-list');

    //             // Filter the mixed elements
    //             var $show = $container.find('.mix').filter(function () {
    //                 var price = Number($(this).attr('data-price'));

    //                 return price >= price1 && price <= price2;
    //             });
    //             //console.log($show);
    //             // Call mix it up to.. well.. mix it up..
    //             $container.find('.mix').removeClass('custom-price-filter');

    //             $.each($show, function (index, element) {
    //                 $(this).addClass('custom-price-filter');
    //             });
    //             $container.mixitup('filter', 'custom-price-filter');

    //         });
    //     });

    // } catch (e) {
    //     console.log('filter-list error');
    // }

    $(window).load(function (e) {
        $('.checkbox input[type=checkbox]:checked').next('span').addClass('checked').parent('label').addClass('selected');
    });

    $('.checkbox input[type=checkbox]').change(function (e) {
        e.preventDefault();
        $(this).next('span').toggleClass('checked');
        $(this).parent('label').toggleClass('selected');
    });

    //radiobtn


    $(window).load(function (e) {
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

