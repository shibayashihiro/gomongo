// testimonal
 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay: 2000, // time for slides changes
    smartSpeed: 1000, // duration of change of 1 slide
    pagination:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})