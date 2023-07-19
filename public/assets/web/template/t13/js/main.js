// home-stock
$('.owl-stock').owlCarousel({
    loop:true,
    center: true,
    margin:30,
    nav:false,
    dots:false,
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
        },
        1366:{
            items:5
        }
    }
})