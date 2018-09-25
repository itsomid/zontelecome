@extends('fa.landing.main')
@section('header')
    {{config('app.name')}} | {{$product->title}}
@endsection
@section('content')

    @include('fa.landing.topnav')
    <div class=" main-body">
        <section class="flex-container-main justify-content-center max_width">
            <div class="flex-item-main-1">
                <img src="{{asset('img/grey-circle.svg')}}">
                <div class="product_name">
                    <p class="product_title_main">{{$product->title}}</p>
                    <p class="Product_subtitle_main">
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
                </div>
            </div>
            <div class="flex-item-main-2">

                <img src="{{url('img/big-yellow-circle.svg')}}" class="main_product_back">
                <img src="{{$product->main_image_url}}" width="657" height="657" class="main_product detail">
            </div>
            <div class="flex-item-main-3">
                <img src="{{url('img/world-wide-modem-ltr.png')}}">
            </div>
        </section>
        <section class="flex-container-main  justify-content-center main-color sec__padding">
            <div class="container text-center text-lg-left">
                <div class="row align-items-center">
                    <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                        @if($product->slug == "zonfi-global-modem")
                            <img src="{{url('img/modem-g.svg')}}" alt="" class="divider-image">
                        @elseif($product->slug == "zonfi-v2-global-modem")
                            <img src="{{url('img/modem-v2-g.svg')}}" alt="" class="divider-image img-fluid">
                        @elseif($product->slug == "zontel-eu-simcard" ||$product->slug == "zontel-global-simcard")
                            <img src="{{url('img/sim-g.svg')}}" alt="" class="divider-image ">
                        @endif

                    </div>
                    <div class="col-lg-7">

                        @if($product->slug == "zonfi-global-modem" || $product->slug == "zonfi-v2-global-modem")
                            <h2 class="divider-heading title__color text-right">ZonFi ارتباط شما را آسان میکند.</h2>
                        @elseif($product->slug == "zontel-eu-simcard" ||$product->slug == "zontel-global-simcard")
                            <h2 class="divider-heading title__color">LIFETIME 4G LTE DATA SIM CARD</h2>
                        @endif
                        <div class="row">
                            <div class="col-lg-10">
                                <p class="lead divider-subtitle mt-2 context__color text-right">{{$product->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-container-main justify-content-center sec__padding second-color always__online__bg">
            <div class="container text-center d-flex flex-row justify-content-center align-items-center">
                @if($product->slug == "zonfi-global-modem")
                    <div class="col-md-4 helvetica">Power Bank</div>
                    <div class="col-md-3">
                        <img src="{{asset('img/powerbank.svg')}}">
                    </div>
                    <div class="col-md-4 helvetica">WIFI 4G LTE</div>
                @elseif($product->slug == "zonfi-v2-global-modem")
                    <p class="sim__feature">Your Internet Solution in 110 Countries…</p>
                @elseif($product->slug == "zontel-eu-simcard")
                    <p class="sim__feature">Your Internet Solution in 28 Countries…</p>
                @elseif($product->slug == "zontel-global-simcard")
                    <p class="sim__feature">Your Internet Solution in 75 Countries…</p>
                @endif
            </div>
        </section>
        <section class="flex-container-main flex-wrap   main-color sec__padding">
            <div class="flex__item__1">
                <div class="container">
                    <div class="context__color">
                        <p class="header__feature">ما برای شما<br>
                            <span class="title__color">بهترین امکانات</span><br>
                            را بر روی یک وسیله<br>
                            فراهم میکنیم.</p>
                    </div>
                </div>
            </div>
            <div class="flex__item__2">
                <div class="container">
                    @if($product->slug == "zonfi-global-modem" || $product->slug == "zonfi-v2-global-modem")
                        <div class="row">
                            <div class="col-lg-8 image__modem">
                                @if($product->slug == "zonfi-global-modem")
                                    <img src="{{asset('img/modem-z-rtl.svg')}}" class="img-fluid">
                                @else
                                    <img src="{{asset('img/modem-v2-z-rtl.svg')}}" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-lg-4 wid_mr_l">
                                <div>
                                    <span class="title__feature title__color">هوشمند و ساده</span>
                                    <p class="context__feature context__color"> One-touch access to unlimited WiFi <br>in
                                        over 110 countries - no SIMs <br>needed!</p>
                                </div>
                                <div>
                                    <span class="title__feature title__color">قابلیت اشتراک گذاری</span>
                                    <p class="context__feature context__color"> Connect up to 8 gadgets at once.<br>
                                        Keep your travel buddies online too!
                                    </p>
                                </div>
                                <div>
                                    <span class="title__feature title__color">شارژ قدرتمند </span>
                                    <p class="context__feature context__color"> Charge your gadgets on-the-go with<br>
                                        embedded 6000 mAh power bank</p>
                                </div>
                            </div>
                        </div>
                    @elseif($product->slug == "zontel-eu-simcard" ||$product->slug == "zontel-global-simcard")
                        <div class="row">
                            <div class="col-lg-8 image__modem">
                                <img src="{{asset('img/simcard-z.svg')}}" class="img-fluid ">
                            </div>
                            <div class="col-lg-4 wid_mr_l ">
                                <div>
                                    <span class="title__feature title__color">UNTHROTTLED 4G LTE</span>
                                    <p class="context__feature context__color"> Global 4G LTE data with no throttling at
                                        no extra charge. </p>
                                </div>
                                <div>

                                </div>
                                <div>
                                    <span class="title__feature title__color">ACTIVATES INSTANTLY</span>
                                    <p class="context__feature context__color">Your SIM will arrive activated. Slip it
                                        on your mobile device, change the APN settings and you are ready to go. </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </section>
        <section class="main-color sec__padding head__bg" style="direction: ltr">
            <div class="container text-center">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-4 col-sm-12 mb-5 mb-sm-0">
                        <img src="{{asset('/img/gb-1.svg')}}">
                        <p class="title__color main__feature__title">دسترسی به 500 حامل بی سیم</p>
                        <span class="main__feature__sub">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</span>
                    </div>
                    <div class="col-md-4 col-sm-12 mb-5 mb-sm-0">
                        <img src="{{asset('img/gb-2.svg')}}">
                        <p class="title__color main__feature__title">ساده و شفاف</p>
                        <span class="main__feature__sub">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</span>
                    </div>
                    <div class="col-md-4 col-sm-12 ">
                        <img src="{{asset('img/gb-3.svg')}}">
                        <p class="title__color main__feature__title">گزینه های دوباره پر کردن فوری اطلاعات</p>
                        <span class="main__feature__sub">   لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="fourth-color">
            <div class="row">
                <div class="col-md-8">
                    <div class="row justify-content-center" style="height: 100%">
                        <div class="flex__1 align-self-center text-center text-md-left position-relative">
                            <img src="{{asset('/img/z-circle.svg')}}" class="position-relative circle_zebra">
                            <img src="{{asset($product->main_image_url)}}" class="main_p">
                        </div>
                        <div class="flex__2">
                            <ul class="product__feature__details">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row second-color enjoy__bg col_row_1_padd"></div>
                    <div class="row main-color col_row_2_padd">
                        <p class="product__cart ">{{number_format($product->price,0)}}تومان </p>
                        <p class="product__cart__sub">سفارش خود را ثبت کنید</p>
                        <a class="btn btn__product addbtn" id="{{$product->slug}}">
                            <i class="fa fa-plus" style="font-size: 12px"></i>
                            افزودن به سبد خرید
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec__padding third-color">
            <div class="row bg__other__circle justify-content-center align-items-center" style=" height: 345px;">
                <div class="other_product_text bg__other ">ما <strong>انواع محصولات</strong><br>
                    را برای نیازهای مختلف شما<br>
                    فراهم میکنیم...
                </div>
            </div>
            <div class="text-center">
                <div class="row">
                    @foreach($products as $p)
                        <div class="col-lg-3 mb-5">
                            <img src="{{asset($p->main_image_url)}}" class="mb-5" height="200px">
                            <h3 class="related__product__title mb-2">{{$p->title}}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

@endsection
