$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    navSpeed: 1000,
    mouseDrag: true,
    autoplay: false,
    autoplayTimeout: 10000,
    navText: ['<img src="/img/owl_prev.svg" alt="">','<img src="/img/owl_next.svg" alt="">'],
    responsive: {
        0: {
            items: 1,
            nav:false,
        },
        600: {
            items: 1
        },
        1000: {
            items: 3,
            nav:true,
        }
    }
});