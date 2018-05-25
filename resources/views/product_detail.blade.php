@extends('landing.main')
@section('content')

    @include('landing.main_topnav')
    <div class=" main-body">
        <section class="flex-conteiner-main justify-content-center max_width">
            <div class="flex-item-main-1">
                <img src="img/grey-circle.svg">
                <div class="product_name">
                    <span class="product_title_main">ZoneModem</span>
                    <p class="Product_subtitle_main">For Your Global Needs</p>
                </div>
            </div>
            <div class="flex-item-main-2">

                <img src="img/big-yellow-circle.svg" class="main_product_back">
                <img src="img/modem.png" width="657" height="544" id="product_1" class="main_product">
            </div>
            <div class="flex-item-main-3">

                    <img src="img/world-wide-modem.svg">

            </div>
        </section>
        <section class="flex-conteiner-main  justify-content-center main-color">
            <div class="container text-center text-lg-left">
                <div class="row align-items-center">
                    <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                        <img src="img/modem-g.svg" alt="" class="divider-image img-fluid">
                    </div>
                    <div class="col-lg-7">
                        <h2 class="divider-heading">the Answer to your global needs</h2>
                        <div class="row">
                            <div class="col-lg-10">
                                <p class="lead divider-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing. Vitae animi mollitia cumque sunt soluta. consectetur adipisicing.</p>
                                <p class="lead divider-subtitle mt-2 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing. Vitae animi mollitia cumque sunt soluta. consectetur adipisicing.Lorem ipsum dolor sit amet, consectetur adipisicing. Vitae animi mollitia cumque sunt soluta. consectetur adipisicing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex-conteiner-main  justify-content-center">
            <div class="container text-center text-lg-left">
                <p class="lead divider-subtitle mt-2 text-center" style="font-family: MoskNormal;font-size: 64px">Your Internet Solution on 195 Countries…</p>
            </div>
        </section>


    </div>



@endsection
