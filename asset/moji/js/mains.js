var showEdJs = $('#js-show-added'),
PS_PARENT_ROOT = -2,
isLoadScript = false,
storeId = $('#storeId').val();
$(function () {
    var pathname = window.location.pathname;
    /*-----------------------
    ----- Menu ----------------
    ------------------------*/
    // Open navagation
    $('.js-menu-svg').on('click',function () {
        $('.navagation').toggleClass('open');
        $('body').toggleClass('open-move');
    });

    // Close navagation
    $('.js-menu-close img, .nava-mask').on('click',function () {
        $('.navagation').toggleClass('open');
        $('body').toggleClass('open-move');
    });

    $('.navagation li.all').on('click',function () {
        $(this).find('.menu_all').slideToggle('medium');
    });

    $('.menu_all .menu_all_list li.more').on('click',function () {
        var t = $(this), parent = t.parents('.menu_all_list');

        t.toggleClass('is');
        if (t.hasClass('is')){
            t.find('a').html('Rút gọn <i class="fa fa-angle-double-up"></i>');
            parent.find('li:nth-child(n+5)').not(t).show();
        }else{
            t.find('a').html('Xem thêm <i class="fa fa-angle-double-down"></i>');
            parent.find('li:nth-child(n+5)').not(t).hide();
        }
        return false;
    });

    $('.navagation li.has-dropdown .fa-angle-down').on('click',function () {
        $(this).parent('.has-dropdown').toggleClass('open');
        $(this).siblings('ul').slideToggle('fast');
    });

    if ($(window).width() < 1200) {
        scrollHeader();
    }
    /*---- End Menu -----------------------------*/


    /*---- header right top -----------------------------*/
    $(document).on('click','.header-right .count-cart-icon',function () {
         $(this).siblings('.mini-shopping-cart').toggleClass('open');
    });
    $(document).on('click','.shopping-cart-item .js-remove-item',function () {
        var check = confirm(msgRemoveCartItem + '?');
        if(check) {
            $.post('/cart/remove',{'psId' : $(this).attr('data-psId')},
                function(rs){
                    ajaxLoadView({
                        view: 'viewMiniCart',
                        onSuccess: function (rs) {
                            $('#js-rs-mini-cart').html(rs);
                        }
                    });
                }
            );
        }
    });
    /*---- End header right top -----------------------------*/


    /*---- Wish Product -----------------------------*/
    $(document).on('click','.product-action .wish, .blk-action .wish',function () {
        if (!$('#hasIdentity').val()){
            ajaxLoadView({
                view: 'modalLogin',
                onSuccess: function (rs) {
                    $('#modalShow').find('.modal-content').html(rs);
                    $('#modalShow').modal('show');
                }
            });
            if (!isLoadScript) {
                 isLoadScript = true;
                 $.getScript("/js/jquery/jquery.validationEngine.js");
                 $.getScript("/js/jquery/jquery.validationEngine-vi.js");

                 $("<link/>", {
                     rel: "stylesheet",
                     type: "text/css",
                     href: "/css/validationEngine.jquery.css"
                 }).appendTo("head");
            }

           /* ajaxLoadView({
                view: 'modalTopLogin&pathname='+pathname,
                onSuccess: function (rs) {
                    $('#modalTop').find('.modal-body').html(rs);
                    $('#modalTop').modal('show');
                }
            });*/
            return false;
        }else{
            var t = $(this), psId = t.attr('data-psId');
            if (t.hasClass('active')) {
                // Xóa yêu thích
                AppAjax.post('/product/wishlistcookie', {
                        'productId':psId,
                        'type': 6
                    },
                    function (rs) {
                        if (rs.code == 1) {
                            t.removeClass('active');
                            var html = '<div class="alert alert-danger alert-dismissible" role="alert">\n' +
                                '        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Xóa sản phẩm yêu thích thành công!</div>';

                            showEdJs.html(html).show();
                            setTimeout(function () {
                                showEdJs.fadeOut(100).empty();
                            }, 8000);
                        }
                    },
                    'json'
                );
            }else{
                AppAjax.post('/product/wishlistcookie', {
                        'productId': psId,
                        'type': 5
                    },
                    function (rs) {
                        if (rs.code == 1) {
                            t.addClass('active');
                            //if($(window).width() >= 768) {
                                var html = '<div class="alert alert-success alert-dismissible" role="alert">\n' +
                                    '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                    '            <span aria-hidden="true">×</span></button> Thêm sản phẩm yêu thích thành công!</div>';

                                showEdJs.html(html).show();
                                setTimeout(function () {
                                    showEdJs.fadeOut(100).empty();
                                }, 8000);

                            //}
                        }
                    },
                    'json'
                );
            }
        }
    });
    /*---- End Wish Product -----------------------------*/


    /*---- js add cart -----------------------------*/
    $(document).on('click','.js-add-cart',function () {
        var t = $(this), root = t.attr('data-root');
        if (root != PS_PARENT_ROOT) {
            addToCart([{id: t.attr('data-psId'), quantity: 1}], 1, function (rs) {
                if (rs.status == 1) {
                    // call modal show responsive add cart
                    ajaxLoadView({
                        view: 'modalAbandCart&psId='+t.attr('data-psId'),
                        onSuccess: function (rs) {
                            $('#modalAbandoned').find('.modal-content').html(rs);
                            $('#modalAbandoned').modal('show');
                        }
                    });

                    // Update lại list sản phẩm icon cart header
                    ajaxLoadView({
                        view: 'viewMiniCart',
                        onSuccess: function (rs) {
                           $('#js-rs-mini-cart').html(rs);
                            //jQuery('html, body').animate({scrollTop: parseInt($('#js-rs-mini-cart').offset().top) - 100}, 'slow');
                        }
                    });
                } else {
                    alert(msgSizeColorProduct);
                }
            });
        } else {
            // Product parent
            $.post('/product/q' + t.attr('data-psId'),
                function (rs) {
                    $('#modalShow .modal-content').html(rs);
                    $('#modalShow').addClass('modal-quick').modal('show');

                }
            );
        }
    });

    $(document).on('change','.modal-quick .blk-qty-input',function (e) {
        e.preventDefault();
        var x = parseInt($(this).val()),
            min = parseInt($(this).attr('min')),
            max = parseInt($(this).attr('max'));

        if (isNaN(x)){
            $(this).val(min);
            return false;
        }else {
            if (x < min) {
                alert('Số lượng đặt tối thiểu là '+min+' sản phẩm');
                $(this).val(min);
                return false;
            } else if (x > max) {
                alert('Bạn chỉ được đặt tối đa '+max+' sản phẩm');
                $(this).val(max);
                return false;
            }
        }
    });
    $(document).on('click', '.modal-quick .blk-qty-btn[data-label!="cart"]', function (e) {
         e.preventDefault();
         var  $qty = $(this).siblings('input.blk-qty-input');

         var _qty = parseInt($qty.val()),
             min = parseInt($qty.attr('min')),
             max = parseInt($qty.attr('max'));

         if ($(this).hasClass('minus')) {
             if (_qty > 1) {
                 _qty--;
                 $qty.val(_qty);
             }else{
                 alert('Số lượng đặt tối thiểu là '+min+' sản phẩm');
                 return false;
             }
         }
         else if ($(this).hasClass('plus')) {
             if (_qty < max) {
                 _qty++;
                 $qty.val(_qty);
             }else{
                 alert('Bạn chỉ được đặt tối đa '+max+' sản phẩm');
                 return false;
             }
         }
     });
    var timeOut = 4000;
    if(in_array(storeId,[7534])){
        timeOut = 10000;
    }
    $('.owl-full').each(function () {
        var t = $(this), loop = false;
        if (t.attr('data-loop') == 'true'){
            loop = true;
        }
        if (t.find('img').length) {
            t.owlCarousel({
                smartSpeed: 450,
                autoplay:true,
                autoplayTimeout: timeOut,
                // autoplayHoverPause: true,
                loop:loop,
                animateIn: 'fadeInLeft',
                animateOut: 'fadeOutRight',
                navText: ["<i class=\"fa fa-angle-left \"><\/i>", "<i class=\"fa fa-angle-right\"><\/i>"],
                nav:true,
                dots:true,
                items: 1,
            });
        }
    });


    // Sản phẩm đã xem
    if ($('.blk-product-viewed .owl-carousel .product-item').length) {
        $('.blk-product-viewed .owl-carousel').owlCarousel({
            dots:true,
            nav:true,
            autoPlay: false,
            navText: ["<i class=\"fa fa-angle-left \"><\/i>", "<i class=\"fa fa-angle-right\"><\/i>"],
            responsiveClass:true,
            items:1,
            slideBy: 1,
            responsive:{
                0:{
                    items:2,
                },
                680:{
                    items:3,
                },
                991:{
                    items:4,
                },
                1200:{
                    items:5,
                },
            }
        });
    }

    /*------------ check inventory --------------------------------*/
    if ($('.product-item').length) {
        var ps = [];
        $('.product-item').each(function () {
            ps.push({storeId: storeId, id: $(this).attr('data-psId')});
        });
        if (ps.length) {
            checkInventory(ps, function (rs) {
                if (rs.inventories != "") {
                    $.each(rs.inventories, function (psId, ivt) {
                        if (ivt <= 0) {
                            $('.product-item.item'+psId).find('.image').append(' <div class="outstock"></div>');
                        }
                    });
                }
            });
        }
    }
});
function scrollHeader() {
    var scrollPastPosition = 0;
    var $header = $('.header-content');
    var headerHeight = $header.height();

    $(window).scroll(function(e){
        var scrollTop = $(this).scrollTop();
        if ($header.hasClass('none')) {
            $header.addClass('top').removeClass('top wait up down');
            return;
        }

        if (scrollTop === 0) {
            $header.addClass('top').removeClass('wait up down');
            $('body').css({'padding-top':'0px'});
        }  else if (scrollTop > scrollPastPosition && scrollTop < headerHeight) {
            $header.addClass('wait').removeClass('top up down');
            $('body').css({'padding-top':headerHeight+'px'});
        } else if (scrollTop > scrollPastPosition && scrollTop > headerHeight) {
            $header.addClass('down').removeClass('top wait up');
            $('body').css({'padding-top':headerHeight+'px'});
        } else if(scrollTop < scrollPastPosition && scrollTop + $(window).height() < $(document).height()) {
            $header.addClass('up').removeClass('top wait down');
            $('body').css({'padding-top':headerHeight+'px'});
        }

        scrollPastPosition = scrollTop;
    });
}
function number(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}