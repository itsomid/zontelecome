@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Payment Result
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color bg__track d-flex flex-column justify-content-center align-items-center bg__done ">
        <section class="w-100" >
            <img src="/img/flesh.svg" class="bg__flesh img-fluid">
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 35%">
                <div class="row align-items-center pt-5 pb-5">
                    <div class="col-lg-4 col-sm-12">
                        <img src="/img/modem-g-b.svg">
                    </div>
                    <div class="col-lg-8 col-sm-12 text-lg-left text-md-center pl-5">
                        <div class="row pb-4">
                            <h2 class="fabfelt w-100">Thank You For Your Purchase</h2>
                            <p class="success__title__1 w-100 ">Please keep <span style="font-family: BloggerSans-Bold;">this number</span>
                                for tracking your order</p>
                            @if(!empty($order->c_mail))
                                <div class="success__title__1 w-100">Your Product Email</div>
                                <div class="success__title__1 w-100">{{$order->c_mail}}</div>
                            @else
                                <p class="success__title__1 w-100">Your Product Email</p>
                            @endif
                        </div>
                        <div class="row">
                            <p class="success__title__2 w-100">Your order number:</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 text-md-center">
                                <span class="success__box">{{$order_uid}}</span>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 text-md-center">
                                <button class="btn btn__find"><i class="fa fa-arrow-down"
                                                                 style="padding-right: 5px"></i>Download
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="sec__padding w-100">
            <div class="container text-center">
            </div>
        </section>
    </div>


@endsection
