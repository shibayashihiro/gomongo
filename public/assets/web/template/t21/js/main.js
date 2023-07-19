// home-stock
$('.owl-stock').owlCarousel({
    loop:true,
    center: true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },        
    }
})

// home-testimonial
$('.owl-test').owlCarousel({
    loop:true,
    center: true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        },        
    }
})