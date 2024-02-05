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

$(document).ready(function () {
    $('.js-from-select2').select2({
        language: "ru",
        ajax: {
            url: "http://10.10.200.221:8888/ru/v1/api/ajax?search_type=0",
            dataType: 'json',
            //delay: 250,
            type: 'get',

            data: function (params) {
                return {
                    req: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: data // Make sure the data structure matches what Select2 expects
                };
            },
            cache: true,
        },
        status: 1,
        placeholder: 'Выберите маршрут',
    });
});
$(document).ready(function () {
    $('.js-to-select2').select2({
        language: "ru",
        ajax: {
            url: "http://localhost:8080/ru/v1/api/ajax?search_type=1",
            dataType: 'json',
            //delay: 250,
            type: 'get',

            data: function (params) {
                return {
                    req: params.term
                }
            },
            processResults: function (data) {
                return {
                    results: data // Make sure the data structure matches what Select2 expects
                };
            },
            cache: true,
        },
        status: 1,
        placeholder: 'Выберите маршрут'
    });
});
