$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    navSpeed: 1000,
    mouseDrag: true,
    autoplay: false,
    autoplayTimeout: 10000,
    navText: ['<img src="/img/owl_prev.svg" alt="">', '<img src="/img/owl_next.svg" alt="">'],
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 1
        },
        1000: {
            items: 3,
            nav: true,
        }
    }
});
var base_url = window.location.origin;

$(document).ready(function () {
    $('.js-example-responsive').select2({
        ajax: {
            url: base_url + "/api/api/ajax?search_type=0",
            dataType: 'json',
            delay: 250,
            type: 'get',
            data: function (params) {
                return {
                    nome: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: data // Make sure the data structure matches what Select2 expects
                };
            },
            cache: true,
        },
        placeholder: 'Выберите маршрут',

    });
});
