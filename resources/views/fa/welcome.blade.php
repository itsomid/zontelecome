@extends('fa.landing.main')
@section('header')
    {{config('app.name')}}
@endsection
@section('content')
    @include('fa.landing.nav')
    <div class="main">
        @include('fa.landing.topnav')
        <div class="container-fluid">
            <div class="scrolling-box">
                @foreach($products as $key=>$product)
                    <section class="flex-container" id="{{$key+1}}">
                        <div class="flex-item-1">
                            <p class="product_title">{{$product->title}}</p>
                            <p class="Product_subtitle">
                                @if($product->slug == "zonfi-global-modem")
                                    برای نیاز های جهانی شما
                                @elseif($product->slug == "zonfi-v2-global-modem")
                                    برای نیاز های جهانی شما
                                @elseif($product->slug == "zontel-eu-simcard")
                                    برای نیاز های جهانی شما
                                @elseif($product->slug == "zontel-global-simcard")
                                    برای نیاز های جهانی شما
                                @endif
                            </p>
                            <p class="product_price">{{number_format($product->price,0)}}تومان </p>
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
                                میخواهم بیشتر بدانم
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
                                    <li>لورم ایپسوم متن ساختگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                @elseif($product->slug == "zonfi-v2-global-modem")
                                    <li>لورم ایپسوم متن ساختگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                @elseif($product->slug == "zontel-eu-simcard")
                                    <li>لورم ایپسوم متن ساختگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                @elseif($product->slug == "zontel-global-simcard")
                                    <li>لورم ایپسوم متن ساختگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی</li>
                                @endif
                            </ul>
                            <div class="d-flex flex-nowrap pl-5">
                                <a class="btn btn__light shadow-none addbtn" style="background-color: transparent"
                                   id="{{$product->slug}}">
                                    <i class="fa fa-plus"></i> افزودن به سبد خرید
                                </a>
                                <a href="{{route('website/cart')}}" class="btn btn__primary shadow-none mr-3 addbtn"
                                   id="{{$product->slug}}">
                                    خرید همین حالا
                                </a>
                            </div>
                        </div>

                    </section>
                @endforeach

            </div>
        </div>
    </div>

@endsection

