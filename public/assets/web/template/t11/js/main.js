// Home Testimonial
$(document).ready(function(){
    // Mobile menu
    $('.mobile-menu').click(function () {
        $('.head-bottom').toggleClass('open');
    });
    $('.opacity, .close-menu').click(function () {
        $('.head-bottom').removeClass('open');
    });
    
    $('#home-slider').owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    });

    $('#stock-slider').owlCarousel({
        items: 3,
        loop: true,
        nav: false,
        margin:30,
        center: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });


    $('.owl-carousel').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        loop:true,
        margin:30,
        nav:true,
        items:1,
        autoHeight:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    

});
// Header Sticky
$(window).scroll(function(){
    if ($(this).scrollTop() > 200) {
        $('header').addClass('fixed');
    } else {
        $('header').removeClass('fixed');
    }
});