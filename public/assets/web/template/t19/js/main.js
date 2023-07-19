// home-banner
$('.owl-home').owlCarousel({
    nav:false,
    dots:true,
    loop:true,
    margin:0,
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

// home-stocks
$('.owl-stock').owlCarousel({
    nav:true,
    dots:false,
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
            items:3
        }
    }
})

// home-review
$('.owl-review').owlCarousel({
    nav:false,
    dots:true,
    loop:true,
    margin:0,
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
