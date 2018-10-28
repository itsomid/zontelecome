@extends('en.landing.main')
@section('header')
    {{config('app.name')}}
@endsection
@section('content')
    @include('en.landing.nav')
    <div class="main">
        @include('en.landing.topnav')
        <div class="container-fluid">
            <div class="scrolling-box">
                @foreach($products as $key=>$product)
                    <section class="flex-container" id="{{$key+1}}"
                    @if($product->slug == "zontel-global-simcard")
                        style="background: url('/img/world-wide-simcard-black.svg') no-repeat; background-position: center"
                            @elseif($product->slug == "zontel-eu-simcard")
                             style="background: url('/img/euro-wide-simcard-black.svg') no-repeat; background-position: center"
                                @endif
                    >
                        <div class="flex-item-1">
                            <p class="product_title">{{$product->title}}</p>
                            <p class="Product_subtitle">
                                @if($product->slug == "zonfi-global-modem")
                                    Global WiFi At Your Fingertips
                                @elseif($product->slug == "zonfi-v2-global-modem")
                                    Our Revolutionary Global WiFi Solution
                                @elseif($product->slug == "zontel-eu-simcard")
                                    For Your EU Trips
                                @elseif($product->slug == "zontel-global-simcard")
                                    For Your Global Travels
                                @endif
                            </p>
                            <p class="product_price">${{number_format($product->price,2)}}</p>
                            <div class="flex-item-2-inner">
                                <div class="item">
                                    @if($product->slug != "zonfi-v2-global-modem")
                                        <img src="{{$product->main_image_url}}" id="img_{{$key+1}}"
                                             class="main_product_res">
                                    @else
                                        <img src="{{$product->main_image_url}}" id="img_{{$key+1}}"
                                             class="main_product_res main_product_v2">
                                    @endif
                                    <img src="img/shopping_circle.svg" class="main_product_circle">
                                </div>
                            </div>
                            <div class="product_description">
                                {{$product->description}}
                            </div>
                            <a href="{{route('website/product',['slug'=>$product->slug])}}" class="btn btn__more ">
                                Read More
                            </a>
                        </div>
                        <div class="flex-item-2">
                            <div class="item">
                                @if($product->slug != "zonfi-v2-global-modem")
                                    <img src="{{$product->main_image_url}}" id="img_{{$key+1}}" class="main_product">
                                @else
                                    <img src="{{$product->main_image_url}}" id="img_{{$key+1}}"
                                         class="main_product main_product_v2">
                                @endif
                                <img src="img/shopping_circle.svg" class="main_product_circle">
                            </div>
                        </div>
                        <div class="flex-item-3 pb-5">
                            <ul class="product_feature">
                                @if($product->slug == "zonfi-global-modem")
                                    <li>Flexible Refill Options</li>
                                    <li>Access to 500 Carriers Worldwide</li>
                                    <li>Built-In Power Bank</li>
                                    <li>A Full Year To Use Your Data</li>
                                @elseif($product->slug == "zonfi-v2-global-modem")
                                    <li>Flexible Refill Options</li>
                                    <li>Access to 500 Carriers Worldwide</li>
                                    <li>More compact, with twice the battery life</li>
                                    <li>A Full Year To Use Your Data</li>
                                @elseif($product->slug == "zontel-eu-simcard")
                                    <li>Coverage All Over EU</li>
                                    <li>Instant Activation</li>
                                    <li>Lifetime Ownership</li>
                                    <li>Compatible With All Unlocked Phones</li>
                                @elseif($product->slug == "zontel-global-simcard")
                                    <li>Coverage All Over World</li>
                                    <li>Instant Activation</li>
                                    <li>Lifetime Ownership</li>
                                    <li>Compatible With All Unlocked Phones</li>
                                @endif
                            </ul>
                            <div class="d-flex flex-nowrap justify-content-start">
                                <a class="btn btn__light shadow-none addbtn" style="background-color: transparent"
                                   id="{{$product->slug}}">
                                    <i class="fa fa-plus"></i> Add to cart
                                </a>
                                <a href="{{route('website/cart')}}" class="btn btn__primary shadow-none ml-3 addbtn"
                                   id="{{$product->slug}}">
                                    Buy Now
                                </a>
                            </div>
                        </div>

                    </section>
                @endforeach

            </div>
        </div>
    </div>

@endsection