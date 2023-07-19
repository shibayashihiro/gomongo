// Home Testimonial
$(document).ready(function(){
  
$('.owl-carousel').owlCarousel({
    stagePadding: 0,
    loop:true,
    margin:30,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

});