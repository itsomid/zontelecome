<nav class="navbar navbar-expand-lg fixed-top navbar-light main-topbar">
    <a class="navbar__logo" href="{{route('website/home')}}">
        <img src="/img/logo.svg">
    </a>
    <a class="shopping__cart__res" href="{{route('website/cart')}}">
        <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle shadow-none">
        <img src="/img/shopping-cart.svg" width="21" height="24"
             style="position: absolute;left: 9px; top: 7px;">
        @if(!empty(session('cart.item')))
            <span>{{count(session('cart.item'))}}</span>
        @else
            <span>0</span>
        @endif
    </a>
    @if(Request::url() !== url("/"))
        <div class="collapse_menu navbar-collapse_menu" id="myTopnav">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item p-2 pr-2">
                        <a class="shopping__cart" href="{{route('website/cart')}}">
                            <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle">
                            <img src="/img/shopping-cart.svg" width="21" height="24"
                                 style="position: absolute;left: 9px; top: 0px;">
                            @if(!empty(session('cart.item')))
                                <span>{{count(session('cart.item'))}}</span>
                            @else
                                <span>0</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item p-2 ">
                        <a href="{{route('website/order/track')}}" class="btn btn__light menu">
                            Track Order
                        </a>
                    </li>
                    <li class="nav-item p-2">
                        <a href="{{route('website/refill')}}" class="btn btn__primary menu">
                            <i class="fa fa-plus"></i> Data Refill
                        </a>
                    </li>
                    <li class="nav-item pt-3 pt-md-3">
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
            </ul>
        </div>
    @else
        <div class="collapse_menu navbar-collapse_menu" id="myTopnav_home">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item p-2 pr-2">
                    <a class="shopping__cart" href="{{route('website/cart')}}">
                        <img src="/img/shopping_circle.svg" width="40" height="40"
                             class="shopping__cart__circle shadow-none">
                        <img src="/img/shopping-cart.svg" width="21" height="24"
                             style="position: absolute;left: 9px; top: 0px;">
                        @if(!empty(session('cart.item')))
                            <span>{{count(session('cart.item'))}}</span>
                        @else
                            <span>0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/order/track')}}" class="btn btn__light menu shadow-none"
                       style="">
                        Track Order
                    </a>

                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary menu shadow-none">
                        <i class="fa fa-plus"></i> Data Refill
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="javascript:void(0);" class="icon" onclick="myFunction_home()">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>

        </div>

    @endif


</nav>

<script>

    $(document).ready(function () {

        if ($(window).width() < 767) {
            $('.addbtn').click(function () {
                var cart = $('.shopping__cart__res');
                var imgtodrag = $(this).parent().parent().parent().find('.main_product_res').eq(0);
                $window = $(window);
                console.log(imgtodrag);
                // $([document.documentElement, document.body]).animate({
                //     scrollTop: $(this).parent().parent().parent().offset().top - 200
                // }, 1000);
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top + 200,
                            left: imgtodrag.offset().left + 250
                        }).delay()
                        .css({
                            'opacity': '0.7',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                        })
                        .appendTo($('body'))
                        .animate({
                            'top': cart.offset().top - 10,
                            'left': cart.offset().left -10,
                            'width': 110,
                            'height': 110
                        }, 1200);

                    imgclone.animate({
                        'width': 100,
                        'height': 100
                    }, function () {
                        $(this).detach()
                    });
                }
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(this).parent().parent().parent().offset().top - 200
                }, 2000);
                var name = $(this).attr('id');

                $.ajax({
                    url: "{{route('website/order/cart/item')}}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {

                        $('.shopping__cart__res span').text(data);
                    }
                });

            });

            $('.addbtn_detail').click(function () {
                var cart = $('.shopping__cart__res');
                var imgtodrag = $(this).parent().parent().parent().find('.main_p').eq(0);
                // $([document.documentElement, document.body]).animate({
                //     scrollTop: $('.main_p').offset().top - 100
                // }, 800);
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top + 200,
                            left: imgtodrag.offset().left + 250
                        })
                        .css({
                            'opacity': '0.7',
                            'position': 'absolute',
                            'width': '105px',
                            'height': '105px',
                            'z-index': '100'
                        })
                        .appendTo($('body'))
                        .animate({
                            'top': cart.offset().top - 10,
                            'left': cart.offset().left - 10,
                            'width': 110,
                            'height': 110
                        }, 1000);


                    imgclone.animate({

                        'width': 0,
                        'height': 0
                    }, function () {
                        $(this).detach()
                    });
                }

                var name = $(this).attr('id');

                $.ajax({
                    url: "{{route('website/order/cart/item')}}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {

                        $('.shopping__cart__res span').text(data);
                    }
                });

            });
        }
        else {
            $('.addbtn').click(function () {
                var cart = $('.shopping__cart');
                var imgtodrag = $(this).parent().parent().parent().find('.main_product').eq(0);
                console.log(imgtodrag);
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top + 200,
                            left: imgtodrag.offset().left + 200
                        })
                        .css({
                            'opacity': '1',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                        })
                        .appendTo($('body'))
                        .animate({
                            'top': cart.offset().top + 10,
                            'left': cart.offset().left + 10,
                            'width': 110,
                            'height': 110
                        }, 1000);

                    setTimeout(function () {
                        cart.effect("shake", {
                            times: 2
                        }, 200);
                    }, 1500);

                    imgclone.animate({
                        'width': 0,
                        'height': 0
                    }, function () {
                        $(this).detach()
                    });
                }
                var name = $(this).attr('id');

                $.ajax({
                    url: "{{route('website/order/cart/item')}}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {

                        $('.nav-item span').text(data);
                    }
                });

            });
            $('.addbtn_detail').click(function () {
                var cart = $('.shopping__cart');
                var imgtodrag = $(this).parent().parent().parent().find('.main_p').eq(0);

                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                            top: imgtodrag.offset().top + 200,
                            left: imgtodrag.offset().left + 200
                        })
                        .css({
                            'opacity': '0.7',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '100'
                        })
                        .appendTo($('body'))
                        .animate({
                            'top': cart.offset().top + 10,
                            'left': cart.offset().left + 10,
                            'width': 110,
                            'height': 110
                        }, 1000);


                    imgclone.animate({
                        'width': 0,
                        'height': 0
                    }, function () {
                        $(this).detach()
                    });
                }
                var name = $(this).attr('id');

                $.ajax({
                    url: "{{route('website/order/cart/item')}}",
                    type: "POST",
                    data: {
                        name: name,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {

                        $('.nav-item span').text(data);
                    }
                });

            });
        }


    });

    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "collapse_menu navbar-collapse_menu") {
            x.className += " responsive";
        } else {
            x.className = "collapse_menu navbar-collapse_menu";
        }
    }
    function  myFunction_home() {
        var x = document.getElementById("myTopnav_home");
        if (x.className === "collapse_menu navbar-collapse_menu") {
            x.className += " responsive_home";
        } else {
            x.className = "collapse_menu navbar-collapse_menu";
        }
    }
</script>