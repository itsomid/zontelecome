@extends('landing.main')
@section('header')
    {{config('app.name')}}
@endsection
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
                            <p class="Product_subtitle">
                                @if($product->slug == "zonfi-global-modem")
                                    Global Wifi At Your Fingertips
                                @elseif($product->slug == "zontel-eu-simcard")
                                    For Your Trips Across Europe
                                @elseif($product->slug == "zontel-global-simcard")
                                    For Your Global Needs
                                @endif
                            </p>
                            <p class="price">$ {{number_format($product->price,2)}}</p>
                            <div class="product_description">

                                    {{$product->description}}

                            </div>
                            <a href="{{route('website/product',['slug'=>$product->slug])}}" class="btn btn__more ">
                                Read More
                            </a>
                        </div>
                        <div class="flex-item-2">
                            <div style="position: relative;margin-top: 110px;    margin-left: 100px;">
                                <img src="{{$product->main_image_url}}" id="img_{{$key+1}}"
                                     class="main_product img-fluid">
                                <img src="img/shopping_circle.svg" class="img-fluid"
                                     style="position: absolute; z-index: 0">
                            </div>
                        </div>
                        <div class="flex-item-3 pb-5">
                            <ul class="product_feature">
                                @if($product->slug == "zonfi-global-modem")
                                    <li>Flexible Refill Options</li>
                                    <li>A Full Year To Use Your Data</li>
                                    <li>SIM-Free, Hassle-Free, No Overage Charges.</li>
                                    <li>Access to 500 Carriers Worldwide</li>
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
                            <div class="d-flex flex-nowrap">
                                <a class="btn btn__light shadow-none addbtn" style="background-color: transparent" id="{{$product->slug}}">
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

