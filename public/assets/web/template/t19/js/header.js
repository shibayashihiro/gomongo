// responsive js
$(document).ready(function(){ 

// Mobile menu

    $('.mobile-menu').click(function () {

        $('.head-bottom').toggleClass('open');
        $('body').toggleClass('active-body');
    });

    $('.opacity, .close-menu').click(function () {

        $('.head-bottom').removeClass('open');
        $('body').removeClass('active-body');

    });

});

// fixed header 
$(window).scroll(function(){
              var sticky = $('.fixed-top'),
                  scroll = $(window).scrollTop();
              if (scroll >= 50) sticky.addClass('active_head');
              else sticky.removeClass('active_head');
            });