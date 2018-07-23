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
                                @elseif($product->slug == "zontel-eu-simcard")
                                    برای نیاز های جهانی شما
                                @elseif($product->slug == "zontel-global-simcard")
                                    برای نیاز های جهانی شما
                                @endif
                            </p>
{{--                            <p class="price">$ {{number_format($product->price,2)}}</p>--}}
                            <p class="product_price">100,000 تومان</p>
                            <div class="product_description">

                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.

                            </div>
                            <a href="{{route('website/product',['slug'=>$product->slug])}}" class="btn btn__more ">
                                میخواهم بیشتر بدانم
                            </a>
                        </div>
                        <div class="flex-item-2">
                            <div style="position: relative;margin-top: 110px;    margin-left: 100px;">
                                <img src="{{$product->main_image_url}}" id="img_{{$key+1}}"
                                     class="main_product">
                                <img src="img/shopping_circle.svg" class="main_product_circle">
                            </div>
                        </div>
                        <div class="flex-item-3 pb-5">
                            <ul class="product_feature">
                                @if($product->slug == "zonfi-global-modem")
                                    <li>لورم ایپسوم متن ساختگی</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</li>
                                    <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</li>
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
                            <div class="d-flex flex-nowrap pr-5">
                                <a class="btn btn__light shadow-none addbtn" style="background-color: transparent" id="{{$product->slug}}">
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

