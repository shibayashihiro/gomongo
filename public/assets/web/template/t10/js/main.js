// Home Testimonial
$('.owl-test').owlCarousel({
    loop:true,
    margin:15,
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
            items:3
        }
    }
})

$('.owl-car').owlCarousel({
    loop:true,
    margin:30,
    nav:false,
    autoplay: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})