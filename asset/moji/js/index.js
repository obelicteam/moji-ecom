$(function () {
    // Load product new ----------------------
    $(document).on('click','#js-btn-load-product',function () {
        var t = $(this), offset = parseInt(t.attr('data-offset'));
        t.append('<div class="spinner-border spinner-border-sm" role="status"></div>');

        ajaxLoadView({
            view: 'loadproduct&offset='+offset+'&element=js-btn-load-product',
            onSuccess: function (rs) {
                $('#rs-js-product').append(rs);
                t.attr('data-offset', parseInt(offset+8));
                t.find('.spinner-border').remove();
                $(document).find('#rs-js-product').find('script').remove();
            }
        });
    });


    // Load product for campaigns ----------------------
    var btnCamp = $('#js-btn-load-cam'), jsCamPro = $('#js-camp-pro') ;
    $(document).on('click','div[data-label="campaign"]',function () {
        var t = $(this),
            limit = 4,
            offset = parseInt(t.attr('data-offset')),
            label = t.attr('data-label'),
            getviewlink = t.attr('data-href'),
            caId = t.attr('data-id');

        $('.blk-banner .item[data-label="campaign"]').removeClass('active');
        t.addClass('active');

        // click list campaign
        if (label === 'campaign'){
            btnCamp.attr('data-offset',4).attr('data-id',caId).fadeIn(100);
        }else{
            t.append('<div class="spinner-border spinner-border-sm" role="status"></div>');
        }

        ajaxLoadView({
            view: 'loadproduct&offset='+offset+'&limit='+limit+'&caId='+caId+'&label='+label,
            onSuccess: function (rs) {
                if (label === 'button') {
                    jsCamPro.append(rs);
                    t.attr('data-offset', parseInt(offset + 4));
                    t.find('.spinner-border').remove();
                }else{
                    jsCamPro.html(rs);
                    btnCamp.attr('href',getviewlink);
                }
                $(document).find('#rs-js-product').find('script').remove();
            }
        });
    });


    // Tạm chưa dùng ----------------------
    /*$(document).on('click','#js-load-product',function () {
        var t = $(this), offset = parseInt(t.attr('data-offset'));
        t.append('<div class="spinner-border spinner-border-sm" role="status"></div>');

        ajaxLoadView({
            view: 'loadproduct&offset='+offset+'&element=js-load-product',
            onSuccess: function (rs) {
                $('#rs-js-product').append(rs);
                t.attr('data-offset', parseInt(offset+8));
                t.find('.spinner-border').remove();
                $(document).find('#rs-js-product').find('script').remove();
            }
        });
    });*/

    if ($('.blk-collection .owl-carousel .item').length) {
        $('.blk-collection .owl-carousel').owlCarousel({
            dots:true,
            nav:true,
            autoPlay: false,
            navText: ["<i class=\"fa fa-angle-left \"><\/i>", "<i class=\"fa fa-angle-right\"><\/i>"],
            responsiveClass:true,
            items:1,
            responsive:{
                0:{
                    items:2,
                },
                550:{
                    items:3,
                },
            }
        });
    }

    var popupHomeCookie = $('#popupHome.cookie');
    if(popupHomeCookie.length){
        popupHomeCookie.modal('show');
    }
});