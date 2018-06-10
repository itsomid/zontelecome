@extends('landing.main')
@section('content')

    @include('landing.topnav')
    <div class=" main-body">
        <section class="flex-container-main justify-content-center max_width">
            <div class="flex-item-main-1">
                <img src="{{asset('img/grey-circle.svg')}}">
                <div class="product_name">
                    <span class="product_title_main">{{$product->title}}</span>
                    <p class="Product_subtitle_main">For Your Global Needs</p>
                </div>
            </div>
            <div class="flex-item-main-2">

                <img src="{{url('img/big-yellow-circle.svg')}}" class="main_product_back">
                <img src="{{url('img/modem.png')}}" width="657" height="544" id="product_1" class="main_product detail">
            </div>
            <div class="flex-item-main-3">

                <img src="{{url('img/world-wide-modem.svg')}}">
            </div>
        </section>
        <section class="flex-container-main  justify-content-center main-color sec__padding">
            <div class="container text-center text-lg-left">
                <div class="row align-items-center">
                    <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                        <img src="{{url('img/modem-g.svg')}}" alt="" class="divider-image img-fluid">
                    </div>
                    <div class="col-lg-7">
                        <h2 class="divider-heading title__color">the Answer to your global needs</h2>
                        <div class="row">
                            <div class="col-lg-10">
                                <p class="lead divider-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing. Vitae animi mollitia cumque sunt soluta. consectetur adipisicing.</p>
                                <p class="lead divider-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing. Vitae animi mollitia cumque sunt soluta. consectetur adipisicing.Lorem
                                    ipsum dolor sit amet, consectetur adipisicing. Vitae animi mollitia cumque sunt
                                    soluta. consectetur adipisicing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-container-main justify-content-center sec__padding second-color always__online__bg">
            <div class="container text-center">
                <p class="mt-2" style="font-family: MoskNormal; font-size: 64px; color: #181818;">Your Internet Solution
                    on 195 Countries…</p>
            </div>
        </section>
        <section class="flex-container-main flex-wrap   main-color sec__padding">

            <div class="flex__item__1">
                <div class="container">
                    <div class="context__color">
                        <p style="font-size: 48px;line-height: 43px;">We Provided<br>
                            <span class="title__color">Best Features</span><br>
                            on One Device<br>
                            Just For You</p>
                    </div>
                </div>
            </div>

            <div class="flex__item__2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 image__modem">
                            <img src="{{asset('img/modem-z.svg')}}" class="img-fluid ">
                        </div>
                        <div class="col-lg-4 wid_mr_l">
                            <div>
                                <span class="title__feature title__color">Best at That</span>
                                <p class="context__feature context__color"> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim
                                    veniam, quis nostrud exercitation.</p>
                            </div>
                            <div>
                                <span class="title__feature title__color">Best at That</span>
                                <p class="context__feature context__color"> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim
                                    veniam, quis nostrud exercitation.</p>
                            </div>
                            <div>
                                <span class="title__feature title__color">Best at That</span>
                                <p class="context__feature context__color"> Lorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim
                                    veniam, quis nostrud exercitation.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="main-color sec__padding head__bg">
            <div class="container text-center">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-4 col-sm-12">
                        <img src="{{asset('/img/global-support.svg')}}">
                        <p class="title__color main__feature__title">Global Support</p>
                        <span class="main__feature__sub">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation.ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</span>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <img src="{{asset('img/global-support.svg')}}">
                        <p class="title__color main__feature__title">Global Support</p>
                        <span class="main__feature__sub">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation.ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</span>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <img src="{{asset('img/global-support.svg')}}">
                        <p class="title__color main__feature__title">Global Support</p>
                        <span class="main__feature__sub">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation.ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="row fourth-color">
            <div class="col-md-8">
                <div class="row justify-content-center" style="height: 100%">
                    <div class="flex__1 align-self-center text-right">
                        <img src="{{asset('/img/z-circle.svg')}}">

                    </div>
                    <div class="flex__2">
                        <ul class="product__feature__details">
                            <li>cool features</li>
                            <li>amazing anten</li>
                            <li>awesome stuff</li>
                            <li>mindblowing button</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row second-color enjoy__bg col_row_1_padd"></div>
                <div class="row main-color col_row_2_padd">
                    <p class="product__cart ">$ 2.99</p>
                    <p class="product__cart__sub">Place Your Order Now</p>
                    <a class="btn btn__product addbtn" id="{{$product->slug}}">
                        <i class="fa fa-plus" style="font-size: 12px"></i>
                        Add to Cart
                    </a>
                </div>
            </div>
        </section>


        <section class="sec__padding third-color">
            <div class="text-center">
                <div class="row"></div>
                <div class="row">
                    <div class="col-lg-3 mb-5">
                        <img src="{{asset('img/modem.png')}}" class="mb-5" height="200px">
                        <h3 class="related__product__title mb-2">ZonModem</h3>
                        <p class="related__product__details mb-3">Worldide Anten</p>
                    </div>
                    <div class="col-lg-3 mb-5" >
                        <img src="{{asset('img/router.png')}}" class="mb-5"  height="200px">
                        <h3 class="related__product__title mb-2">ZonModem</h3>
                        <p class="related__product__details mb-3">Worldide Anten</p>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <img src="{{asset('img/sim.png')}}" class="mb-5"  height="200px">
                        <h3 class="related__product__title mb-2">ZonModem</h3>
                        <p class="related__product__details mb-3">Worldide Anten</p>
                    </div>
                    <div class="col-lg-3 mb-5">
                        <img src="{{asset('img/modem.png')}}" class="mb-5"  height="200px">
                        <h3 class="related__product__title mb-2">ZonModem</h3>
                        <p class="related__product__details mb-3">Worldide Anten</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
