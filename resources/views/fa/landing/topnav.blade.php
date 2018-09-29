<nav class="navbar navbar-expand-lg fixed-top navbar-light main-topbar">
    <a class="navbar__logo" href="{{route('website/home')}}">
        <img src="/img/logo.svg">
    </a>
    <a class="shopping__cart__res" href="{{route('website/cart')}}">
        <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle shadow-none">
        <img src="/img/shopping-cart.svg" width="21" height="24"
             style="position: absolute;right: 9px; top: 7px;">
        @if(!empty(session('cart.item')))
            <span class="cart__num">{{count(session('cart.item'))}}</span>
        @else
            <span class="cart__num">0</span>
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
                            <span class="cart__num">{{count(session('cart.item'))}}</span>
                        @else
                            <span class="cart__num">0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2 ">
                    <a href="{{route('website/order/track')}}" class="btn btn__light menu">
                        پیگیری سفارش
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary menu">
                        <i class="fa fa-plus"></i> افزایش اعتبار
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
                            <span class="cart__num">{{count(session('cart.item'))}}</span>
                        @else
                            <span class="cart__num">0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/order/track')}}" class="btn btn__light menu shadow-none"
                       style="">
                        پیگیری سفارش
                    </a>

                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary menu shadow-none">
                        <i class="fa fa-plus"></i> افزایش اعتبار
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
        persian_numbers();
        if ($(window).width() < 767) {
            $('.addbtn').click(function () {
                var cart = $('.shopping__cart__res');
                var imgtodrag = $(this).parent().parent().parent().find('.main_product_res').eq(0);

                $([document.documentElement, document.body]).animate({
                    scrollTop: $(this).parent().parent().parent().offset().top - 200
                }, 600);

                if (imgtodrag) {
                    setTimeout(function () {
                        drag()
                    }, 600);

                    function drag() {
                        var imgclone = imgtodrag.clone()
                            .offset({
                                top: imgtodrag.offset().top + 200,
                                left: imgtodrag.offset().left + 250
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
                                'top': cart.offset().top - 30,
                                'left': cart.offset().left - 10,
                                'width': 110,
                                'height': 110
                            }, 1200);
                        imgclone.animate({
                            'width': 100,
                            'height': 100
                        }, function () {
                            $(this).detach()
                        });
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
                        } );
                    }
                }
            });

            $('.addbtn_detail').click(function () {
                var cart = $('.shopping__cart__res');
                var imgtodrag = $(this).parent().parent().parent().find('.main_p').eq(0);
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('.main_p').offset().top - 100
                }, 600);
                if (imgtodrag) {
                    setTimeout(function () {
                        drag()
                    }, 600);

                    function drag() {
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
                    }

                }

            });
        }
        else
        {
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

    function myFunction_home() {
        var x = document.getElementById("myTopnav_home");
        if (x.className === "collapse_menu navbar-collapse_menu") {
            x.className += " responsive_home";
        } else {
            x.className = "collapse_menu navbar-collapse_menu";
        }
    }
    function persian_numbers(obj) {
        if (typeof(obj) == 'string' && obj.length > 0) {
            var Sobj = obj;
        } else {
            //all numbers in page will converted
            var Sobj = 'body';
        }
        var AobJ = $(Sobj);
console.log(AobJ);
        // AobJ.filter("*:not(iframe)").filter("div.desc-video").andSelf().contents().each(function() {
        AobJ.find("*:not(iframe)").contents().each(function () {

            /*skip iframe like youtube vimo etc.. because jquery this function cannot access iframe https: content  */
            if (this.nodeType === 3 && this.parentNode.localName != "style" && this.parentNode.localName != "script" && this.parentNode.localName != "iframe") {
                if (
                    this.parentNode.getAttribute('class') == "grid-dp-12 grid-tt-12 grid-tm-12 grid-me-12 desc-video"
                    || this.parentNode.getAttribute('class') == "videocode-box"
                    || this.parentNode.getAttribute('class') == "textarea-embed"
                    || this.parentNode.getAttribute('class') == "menu_title pt-1"
                    || this.parentNode.getAttribute('class') == "cart__num"
                ) {
                    //console.log('1');
                } else {

                    this.nodeValue = this.nodeValue.replace(this.nodeValue.match(/[0-9]*\.[0-9]+/), function (txt) {
                        return txt.replace(/\./, ',');
                    });
                    this.nodeValue = this.nodeValue.replace(/\d/g, function (v) {
                        return String.fromCharCode(v.charCodeAt(0) + 1584);
                    });

                }
            }
        });
    }
</script>