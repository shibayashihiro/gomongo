// home-banner
$('.owl-home').owlCarousel({
    nav:true,
    dots:true,
    loop:true,
    margin:10,
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

// home-services
$('.owl-service').owlCarousel({
    nav:false,
    dots:false,
    loop:false,
    margin:0,
    autoplay:true,   
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
})

// home-review
$('.owl-review').owlCarousel({
    nav:false,
    dots:true,
    loop:true,
    margin:50,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})