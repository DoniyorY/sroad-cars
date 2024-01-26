$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: false,
    mouseDrag: true,
    autoplay: true,
    autoplayTimeout: 10000,
    animateOut: 'slideOutLeft',
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 3
        }
    }
});