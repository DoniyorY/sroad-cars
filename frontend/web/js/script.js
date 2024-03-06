let about_owl = $('.my-owl');
let lang = document.documentElement.lang
const Lang = {
    from_id: {
        ru: 'Выберите адрес отправления...',
        en: 'Select departure address...',
        uz: 'Jo\'nab ketish manzilini tanlang…',
    },
    to_id: {
        ru: 'Выберите адрес назначения…',
        en: 'Select destination address...',
        uz: 'Kelish manzilini tanlang tanlang…',
    },
    choose_car: {
        ru: 'Выберите марку',
        en: 'Choose a Car',
        uz: 'Mashinani tanlang',
    }
}
if (about_owl) {
    about_owl.owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        mouseDrag: true,
        autoplay: false,
        autoplayTimeout: 10000,
        nav: false,
        items: 1,
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
/*$('#owl-view').owlCarousel({
    loop: false,
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
});*/

let baseUrl = window.location.origin

let select2_url = baseUrl + '/' + lang + "/v1/api/ajax?search_type=";
$(document).ready(function () {
    // SELECT 2 FROM INPUT
    let select_from = $('.js-from-select2').select2({
        language: "ru",
        ajax: {
            url: select2_url + '0',
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
    // SELECT 2 TO INPUT DEFAULT
    let select_to = $('.js-to-select2').select2({
        language: "ru",
        ajax: {
            url: select2_url + '1',
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

    //ON SELECT FROM INPUT
    select_from.on('select2:select', function (e) {
        let get_data = e.params.data.id
        //DESTROYING OLD SELECT 2
        select_to.select2('destroy');
        // MAKING NEW SELECT 2 WITH AJAX REQUEST
        $('.js-to-select2').select2({
            language: "ru",
            ajax: {
                url: select2_url + '1&address_id=' + get_data,
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
    })

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
        placeholder: Lang.choose_car[lang],
    });
    let select2ToId = $('#to_id').select2().prop('disabled',true)
    let select2FromId = $('#from_id').select2({
        language: "ru",
        dropdownParent: $('#bookingModal'),
        ajax: {
            url: select2_url + '0',
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
    select2FromId.on('select2:select',function (e){
        let get_data=e.params.data.id
        select2ToId.select2().prop('disabled',false)
        select2ToId.select2({
            language: "ru",
            dropdownParent: $('#bookingModal'),
            ajax: {
                url: select2_url + '1&address_id=' + get_data,
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
            placeholder: Lang.to_id[lang],
        });
    })


    select2FromId.on('select2:select', function (e) {
        let data = e.params.data;
        if (data.id === 4) {
            console.log($('#airport_group'))
            $('#airport_group').removeClass('d-none')
        } else {
            $('#airport_group').addClass('d-none')
        }
    })

    function numberWithSpaces(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    select2ToId.on('select2:select', function (e) {
        let data = e.params.data;
        let select2CarId = document.getElementById('to_id').getAttribute('data-model-car');
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", baseUrl + '/' + lang + '/v1/api/selected?address_id=' + data.id + '&car_id=' + select2CarId);
        xhttp.send();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                let getJson = JSON.parse(this.responseText);
                let total = document.getElementById('booking_total').innerText = numberWithSpaces(getJson) + ' UZS';
                let input_total_price = document.getElementById('input_total_price');
                input_total_price.value = getJson;
            }
        }
    })
});
