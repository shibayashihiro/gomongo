// Home Testimonial
$(document).ready(function () {
    $('.mobile-menu').click(function () {
        $('.head-bottom').toggleClass('open');
    });
    $('.opacity, .close-menu').click(function () {
        $('.head-bottom').removeClass('open');
    });
    // fixed header 
    $(window).scroll(function () {
        var sticky = $('.header-bottom'),
            scroll = $(window).scrollTop();
        if (scroll >= 50) sticky.addClass('active_head');
        else sticky.removeClass('active_head');
    });
    $('.owl-carousel').owlCarousel({
        stagePadding: 400,
        loop: true,
        margin: 30,
        nav: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 50
            },
            600: {
                items: 2,
                stagePadding: 100
            },
            1200: {
                items: 2,
                stagePadding: 250
            },
            1600: {
                items: 2,
            },

        }
    });

});