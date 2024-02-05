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


/*$(document).ready(function () {
    $('.js-example-responsive').select2({
        ajax: {
            url: base_url + '/cars/ajax?search_type=0',
            dataType: 'json',
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data.items
                };
            }
        },
        placeholder: 'Выберите маршрут'
    });
});*/
$(".js-example-responsive").select2({
    ajax: {
        url: base_url + '/cars/ajax?search_type=0',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term, // search term
                page: params.page
            };
        },
        processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
                results: data.items,
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        },
        cache: true
    },
    placeholder: 'Search for a repository',
    minimumInputLength: 1,
});