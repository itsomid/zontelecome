<nav class="navbar navbar-expand-lg fixed-top navbar-light main-topbar">
    <a class="navbar-brand p-2" href="{{route('website/home')}}">
        <img src="/img/logo.svg">
    </a>

    <ul class="cart_item_res">
        <li class="">
            <a class="shopping__cart" href="{{route('website/cart')}}">
                <img src="/img/shopping_circle.svg" width="40" height="40"
                     class="shopping__cart__circle shadow-none">
                <img src="/img/shopping-cart.svg" width="21" height="24"
                     style="position: absolute;left: 9px; top: -15px;">
                @if(!empty(session('cart.item')))
                    <span>{{count(session('cart.item'))}}</span>
                @else
                    <span>0</span>
                @endif
            </a>
        </li>
    </ul>
    <div class="collapse_menu navbar-collapse_menu" id="myTopnav">

        <ul class="navbar-nav ml-auto">
            {{--@if(Request::url() !== url("/"))--}}
                <li class="nav-item p-2">
                    <a class="shopping__cart" href="{{route('website/cart')}}">
                        <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle">
                        <img src="/img/shopping-cart.svg" width="21" height="24"
                             style="position: absolute;left: 9px; top: -15px;">
                        @if(!empty(session('cart.item')))
                            <span>{{count(session('cart.item'))}}</span>
                        @else
                            <span>0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/order/track')}}" class="btn btn__light">
                        Track Order
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary">
                        <i class="fa fa-plus"></i> Data Refill
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            {{--@else--}}
                {{--<li class="nav-item p-2">--}}
                    {{--<a class="shopping__cart" href="{{route('website/cart')}}">--}}
                        {{--<img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle">--}}
                        {{--<img src="/img/shopping-cart.svg" width="21" height="24"--}}
                             {{--style="position: absolute;left: 9px; top: -15px;">--}}
                        {{--@if(!empty(session('cart.item')))--}}
                            {{--<span>{{count(session('cart.item'))}}</span>--}}
                        {{--@else--}}
                            {{--<span>0</span>--}}
                        {{--@endif--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item p-2">--}}
                    {{--<a href="{{route('website/order/track')}}" class="btn btn__light "--}}
                       {{--style="background-color: #202020 !important;">--}}
                        {{--Track Order--}}
                    {{--</a>--}}

                {{--</li>--}}
                {{--<li class="nav-item p-2">--}}
                    {{--<a href="{{route('website/refill')}}" class="btn btn__primary ">--}}
                        {{--<i class="fa fa-plus"></i> Data Refill--}}
                    {{--</a>--}}
                {{--</li>--}}


            {{--@endif--}}

        </ul>

    </div>

</nav>

<script>

    $(document).ready(function () {


        $('.addbtn').click(function () {
            var cart = $('.shopping__cart');
            var imgtodrag = $(this).parent().parent().parent().find('.main_product').eq(0);
            // console.log(imgtodrag);
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

    });

    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "collapse_menu navbar-collapse_menu") {
            x.className += " responsive";
        } else {
            x.className = "collapse_menu navbar-collapse_menu";
        }
    }
</script>