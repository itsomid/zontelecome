@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | {{$product->title}}
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class=" main-body">
        <section class="flex-container-main justify-content-center max_width">
            <div class="flex-item-main-1">
                <img src="{{asset('img/grey-circle.svg')}}">
                <div class="product_name">
                    <span class="product_title_main">{{$product->title}}</span>
                    <p class="Product_subtitle_main">
                        @if($product->slug == "zonfi-global-modem")
                            For Your Global Needs
                        @elseif($product->slug == "zonfi-v2-global-modem")
                            Our Revolutionary Global WiFi Solution
                        @elseif($product->slug == "zontel-eu-simcard")
                            For Your Trips Across Europe
                        @elseif($product->slug == "zontel-global-simcard")
                            For Your Global Needs
                        @endif
                    </p>
                </div>
            </div>
            <div class="flex-item-main-2">

                    <img src="{{url('img/big-yellow-circle.svg')}}" class="main_product_back">

                @if($product->slug == "zonfi-v2-global-modem")
                    <img src="{{$product->main_image_url}}" width="657" height="657" class="main_product detail_v2">
                @else
                    <img src="{{$product->main_image_url}}" width="657" height="657" class="main_product detail">
                @endif
            </div>
            <div class="flex-item-main-3">
                @if($product->slug == "zonfi-v2-global-modem" || $product->slug == "zonfi-global-modem")
                    <img src="{{url('img/world-wide-modem.svg')}}">
                @elseif($product->slug == "zontel-eu-simcard" ||$product->slug == "zontel-global-simcard")
                    <img src="{{url('img/world-wide-simcard.svg')}}">
                    @endif
            </div>
        </section>
        <section class="flex-container-main  justify-content-center main-color sec__padding">
            <div class="container text-center text-lg-left">
                <div class="row align-items-center">
                    <div class="col-lg-5 mt-md-5 mt-lg-0 mb-5 mb-md-0 text-center">
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
                            <h2 class="divider-heading title__color">ZonFi Makes Connecting Simple</h2>
                        @elseif($product->slug == "zontel-eu-simcard" ||$product->slug == "zontel-global-simcard")
                            <h2 class="divider-heading title__color">LIFETIME 4G LTE DATA SIM CARD</h2>
                        @endif
                        <div class="row">
                            <div class="col-lg-10">
                                <p class="lead product_description mt-2">{{$product->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-container-main justify-content-center sec__padding second-color always__online__bg">
            <div class="container text-center d-flex flex-column flex-sm-row justify-content-center align-items-center">
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
                        <p class="header__feature">
                            <span class="title__color">FEATURES YOU ARE</span><br>
                            GOING TO LOVE<br>
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex__item__2">
                <div class="container">
                    @if($product->slug == "zonfi-global-modem" || $product->slug == "zonfi-v2-global-modem")
                        <div class="row">
                            <div class="col-lg-8 img__modem">
                                @if($product->slug == "zonfi-global-modem")
                                    <img src="{{asset('img/modem-z.svg')}}" class="img-fluid">
                                @else
                                    <img src="{{asset('img/modem-v2-z.svg')}}" class="img-fluid">
                                @endif
                            </div>
                            <div class="col-lg-4 wid_mr_l">
                                <div>
                                    <span class="title__feature title__color">Smart & Simple</span>
                                    <p class="context__feature context__color"> One-touch access to unlimited WiFi <br>in
                                        over 110 countries - no SIMs <br>needed!</p>
                                </div>
                                <div>
                                    <span class="title__feature title__color">Shareable</span>
                                    <p class="context__feature context__color"> Connect up to 8 gadgets at once.<br>
                                        Keep your travel buddies online too!
                                    </p>
                                </div>
                                @if($product->slug == "zonfi-global-modem")
                                    <div>
                                        <span class="title__feature title__color">Powerful charging</span>
                                        <p class="context__feature context__color"> Charge your gadgets on-the-go
                                            with<br>
                                            embedded 6000 mAh power bank</p>
                                    </div>
                                @else
                                    <div>
                                        <span class="title__feature title__color">Unthrottled 4G LTE</span>
                                        <p class="context__feature context__color">Global 4G LTE data with no<br>
                                            throttling at no extra charge.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @elseif($product->slug == "zontel-eu-simcard" || $product->slug == "zontel-global-simcard")
                        <div class="row">
                            <div class="col-lg-8 image__modem">
                                <img src="{{asset('img/simcard-z.svg')}}" class="img-fluid ">
                            </div>
                            <div class="col-lg-4 wid_mr_l">
                                <div>
                                    <span class="title__feature title__color">UNTHROTTLED 4G LTE</span>
                                    <p class="context__feature context__color"> Global 4G LTE data with no throttling at
                                        no extra charge.</p>
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
        @if($product->slug == "zontel-eu-simcard" || $product->slug == "zontel-global-simcard")
            {{--// --}}
        @else
            <section class="seventh-color sec__padding">
                <div class="container text-center">
                    <div class="row justify-content-center mb-0 mb-md-5">
                        <p class="title__step">It's easy as 1,2,3</p>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-4 col-sm-12 mb-5">
                            <img src="{{asset('/img/3Steps-A.png')}}" class="img__step" >
                            <p class="title__color main__feature__title">Grab a ZonFi</p>
                            <span class="main__feature__sub"> Buy ZonFi here or at retail stores near you. Carry it all the time to get secure mobile WiFi ("MiFi") and keep all your devices charged wherever you go.
                            Get big savings with low rates for WiFi and never worry about roaming fees again. No SIMs or tedious configuration needed. </span>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-5">
                            <img src="{{asset('img/3Steps-B.png')}}" class="img__step">
                            <p class="title__color main__feature__title">Power On</p>
                            <span class="main__feature__sub">Simply turn on ZonFi. connect up to 8 gadgets to WiFi, Top up your data anytime, anywhere,
                            through our app or website and enjoy the power of ZonFi. </span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <img src="{{asset('img/3Steps-C.png')}}" class="img__step">
                            <p class="title__color main__feature__title">Enjoy WiFi Anywhere</p>
                            @if($product->slug == "zonfi-global-modem")
                                <span class="main__feature__sub">   Enjoy fast and secure WiFi connectivity across 110+ countries all at a flat rate, with the convenience of pay-as-you-go with no subscriptions. Keep your other devices charged all day with the embedded power bank.</span>
                            @elseif($product->slug == "zonfi-v2-global-modem")
                                <span class="main__feature__sub">   Enjoy fast and secure WiFi connectivity across 110+ countries all at a flat rate, with the convenience of pay-as-you-go with no subscription.</span>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if($product->slug == "zontel-global-simcard")
            <section class="main-color sec__padding head__bg">
                <div class="container text-center">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-4 col-sm-12 mb-5 mb-md-0">
                            <img src="{{asset('/img/gb-1.svg')}}">
                            <p class="title__color main__feature__title">Access to Over 250 Carriers Across The
                                Globe</p>
                            <span class="main__feature__sub">While traveling, ZonTel global Data Sim will automatically link up with our partners across the world and provide you with an unparalleled browsing experience, hassle-free.</span>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-5 mb-md-0">
                            <img src="{{asset('img/gb-2.svg')}}">
                            <p class="title__color main__feature__title">Simple and Transparent</p>
                            <span class="main__feature__sub">ZonFi is Sim-Free, requires no setup, and  with a push of a button you are moments away from getting connected to the internet and the worldwide web.
                        You will only pay for what you use, contract free, and will incur no overage charges.</span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <img src="{{asset('img/gb-3.svg')}}">
                            <p class="title__color main__feature__title">Instant Data Refill Options</p>
                            <span class="main__feature__sub">   Top up your data on the go through
                      our iOS and Android apps or simple
                       by visiting our website. Never worry about running out of data, with 365  days validity. Also we will notify you once you are past your preset minimum.</span>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($product->slug == "zontel-eu-simcard")
            <section class="main-color sec__padding head__bg">
                <div class="container text-center">
                    <div class="row justify-content-center ">
                        <div class="col-md-4 col-sm-12 mb-5 mb-sm-0">
                            <img src="{{asset('/img/gb-1.svg')}}">
                            <p class="title__color main__feature__title">Access to Over 60 Carriers Across Europe</p>
                            <span class="main__feature__sub">While traveling, ZonTel EU Data Sim will automatically link up with our partners across the European Union and provide you with an unparalleled browsing experience, hassle-free.</span>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-5 mb-md-0">
                            <img src="{{asset('img/gb-2.svg')}}">
                            <p class="title__color main__feature__title">Simple and Transparent</p>
                            <span class="main__feature__sub">ZonFi is Sim-Free, requires no setup, and  with a push of a button you are moments away from getting connected to the internet and the worldwide web.
                        You will only pay for what you use, contract free, and will incur no overage charges.</span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <img src="{{asset('img/gb-3.svg')}}">
                            <p class="title__color main__feature__title">Instant Data Refill Options</p>
                            <span class="main__feature__sub">   Top up your data on the go through
                      our iOS and Android apps or simple
                       by visiting our website. Never worry about running out of data, with 365  days validity. Also we will notify you once you are past your preset minimum.</span>
                        </div>
                    </div>
                </div>
            </section>
            @elseif($product->slug == "zonfi-global-modem" || $product->slug == "zonfi-v2-global-modem")
            <section class="main-color sec__padding head__bg">
                <div class="container text-center">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-4 col-sm-12 mb-5 mb-sm-0">
                            <img src="{{asset('/img/gb-1.svg')}}">
                            <p class="title__color main__feature__title">Access to Over 60 Carriers Across Europe</p>
                            <span class="main__feature__sub">While traveling, ZonTel EU Data Sim will automatically link up with our partners across the European Union and provide you with an unparalleled browsing experience, hassle-free.</span>
                        </div>
                        <div class="col-md-4 col-sm-12 mb-5 mb-sm-0">
                            <img src="{{asset('img/gb-2.svg')}}">
                            <p class="title__color main__feature__title">Simple and Transparent</p>
                            <span class="main__feature__sub">ZonFi is Sim-Free, requires no setup, and  with a push of a button you are moments away from getting connected to the internet and the worldwide web.
                        You will only pay for what you use, contract free, and will incur no overage charges.</span>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <img src="{{asset('img/gb-3.svg')}}">
                            <p class="title__color main__feature__title">Instant Data Refill Options</p>
                            <span class="main__feature__sub">   Top up your data on the go through
                      our iOS and Android apps or simple
                       by visiting our website. Never worry about running out of data, with 365  days validity. Also we will notify you once you are past your preset minimum.</span>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="fourth-color">
            <div class="row">
                <div class="col-md-8">
                    <div class="row justify-content-center" style="height: 100%">
                        <div class="flex__1 align-self-center text-center text-sm-right position-relative">
                            <img src="{{asset('/img/z-circle.svg')}}" class="position-relative circle_zebra">
                            <img src="{{asset($product->main_image_url)}}" class="main_p">
                        </div>
                        <div class="flex__2">
                            <ul class="product__feature__details">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="second-color enjoy__bg col_row_1_padd"></div>
                    <div class="main-color col_row_2_padd">
                        <p class="product__cart ">$ {{number_format($product->price,2)}}</p>
                        <p class="product__cart__sub">Place Your Order Now</p>
                        <a class="btn btn__product addbtn_detail" id="{{$product->slug}}">
                            <i class="fa fa-plus" style="font-size: 12px"></i>
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec__padding third-color">
            <div class="row bg__other__circle justify-content-center align-items-center" style=" height: 345px;">
                <div class="other_product_text bg__other ">we provide a <strong>variety of products</strong><br>
                    for your different needs.<br>
                    have a look …
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
