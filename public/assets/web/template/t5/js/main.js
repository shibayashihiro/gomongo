// Home Testimonial
$(document).ready(function(){
    // Mobile menu
    $('.mobile-menu').click(function () {
        $('.head-bottom').toggleClass('open');
    });
    $('.opacity, .close-menu').click(function () {
        $('.head-bottom').removeClass('open');
    });
    
    $('#upcoming').owlCarousel({
        stagePadding:0,
        loop:true,
        margin:0,
        nav:true,
        autoplay:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:2.7
            }
        }
    });

    $('.owl-carousel').owlCarousel({
        stagePadding: 0,
        loop:true,
        margin:30,
        nav:true,
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