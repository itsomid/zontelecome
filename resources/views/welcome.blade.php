@extends('landing.main')

@section('content')
    @include('landing.nav')
    <div class="main">
        @include('landing.topnav')
        <div class="container-fluid">
            <div class="scrolling-box">
                @foreach($products as $key=>$product)
                    <section class="flex-container" id="{{$key+1}}">
                        <div class="flex-item-1">
                            <p class="product_title">{{$product->title}}</p>
                            <p class="Product_subtitle">For Your Global Needs</p>
                            <p class="price">$ 2.99</p>
                            <div class="product_description">
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.

                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.

                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.

                    </span>
                            </div>
                            <button type="button" class="btn btn__more">
                                Read More
                            </button>
                        </div>
                        <div class="flex-item-2">
                            <div style="position: relative;margin-top: 110px;    margin-left: 100px;">
                                <img src="img/modem.png" width="657" height="544" id="product_1" class="main_product">
                                <img src="img/shopping_circle.svg" style="position: absolute; z-index: 0">
                            </div>
                        </div>
                        <div class="flex-item-3">
                            <ul class="product_feature">
                                <li>cool features</li>
                                <li>amazing anten</li>
                                <li>awesome stuff</li>
                                <li>mindblowing button</li>
                            </ul>
                            <a class="btn btn__light addbtn" id="{{$product->slug}}">
                                <i class="fa fa-plus"></i> Add to cart
                            </a>
                            <button type="button" class="btn btn__primary">
                                Buy Now
                            </button>
                        </div>

                    </section>
                @endforeach

            </div>
        </div>
    </div>

@endsection

