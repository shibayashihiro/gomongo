// responsive header
$(document).ready(function(){ 
// Mobile menu
    $('.mobile-menu').click(function () {
        $('.head-bottom').toggleClass('open');
    });
    $('.opacity, .close-menu').click(function () {
        $('.head-bottom').removeClass('open');
    });

    // fixed header 
			$(window).scroll(function(){
              var sticky = $('.header-bottom'),
                  scroll = $(window).scrollTop();
              if (scroll >= 50) sticky.addClass('active_head');
              else sticky.removeClass('active_head');
            });

    
});

