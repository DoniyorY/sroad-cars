let about_owl = $('.my-owl');
let lang = document.documentElement.lang
const Lang = {
   from_id:{
       ru:'Выберите адрес отправления...',
       en:'Select departure address...',
       uz:'',
   },
    to_id:{
        ru:'Выберите адрес назначения…',
        en:'Select destination address...',
        uz:'',
    }
}
if (about_owl){
    about_owl.owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        autoplay: false,
        autoplayTimeout: 10000,
        nav:false,
        items:1,
    });
}

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    navSpeed: 1000,
    mouseDrag: true,
    autoplay: true,
    autoplayTimeout: 10000,
    navText: ['<img src="/img/owl_prev.svg" alt="">', '<img src="/img/owl_next.svg" alt="">'],
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: true,
        },
        1000: {
            items: 3,
            nav: true,
        }
    }
});

let baseUrl = window.location.origin

let select2_url = baseUrl + '/' + lang + "/v1/api/ajax?search_type=";
$(document).ready(function () {

    $('.js-from-select2').select2({
        language: "ru",
        ajax: {
            url: select2_url+'0',
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
        placeholder: Lang.from_id[lang],
    });
});
$(document).ready(function () {
    $('.js-to-select2').select2({
        language: "ru",
        ajax: {
            url: select2_url+'1',
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
        placeholder: Lang.to_id[lang]
    });
});
$(document).ready(function () {
    $('.js-title-select2').select2({
        language: "ru",
        ajax: {
            url: baseUrl + '/' + lang + "/v1/api/find-car",
            dataType: 'json',
            //delay: 250,
            type: 'get',

            data: function (params) {
                return {
                    data: params.term
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
        placeholder: 'Выберите машину'
    });
});
