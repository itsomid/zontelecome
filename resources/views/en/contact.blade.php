@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Contact
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color bg__contact pb-5">
        <section class="w-100 mt-5">
            <div class="container text-center sec__bg sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center mb-3 mt-3">
                            <img src="{{url('/img/logo.png')}}" width="50%" >
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container text-center  sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 mb-5 mt-5">
                        <p class="contact__text">
                            ZonTelecom is a leading mobile data provider, serving the burgeoning demand for seamless internet connectivity among international travelers. We offer an array of innovative products and services ranging from global mobile data SIM cards to mobile WiFi hotspots.
                        </p>

                        <div class="mb-5 mt-5">
                            <a class="btn btn__contact__email"><img src="/img/email.png" width="40"> support@zontelecom.ca</a>
                        </div>
                        <div class="mb-5 mt-5">
                        <a class="btn btn__contact__phone"><img src="/img/phone.png" width="40" class="mr-4"> +16049999199</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

