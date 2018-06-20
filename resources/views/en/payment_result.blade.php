@extends('landing.main')
@section('header')
    {{config('app.name')}} | Payment Result
@endsection
@section('content')

    @include('landing.topnav')
    <div class="main-body fifth-color d-flex flex-column justify-content-center align-items-center  pt-0 bg__done ">
        <section class="sec__padding" style="z-index: 100">
            <img src="/img/flesh.svg" class="bg__flesh img-fluid">
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 35%">
                <div class="row align-items-center pt-5 pb-5">
                    <div class="col-md-4">
                        <img src="/img/modem-g-b.svg" >
                    </div>
                    <div class="col-md-8 text-left pl-5">
                        <div class="row pb-4">
                            <h2 class="fabfelt">Thank You For Your Purchase</h2>
                            <p class="success__title__1 w-100">Please keep <span style="font-family: BloggerSans-Bold;">this number</span> for tracking your order</p>
                            <p class="success__title__1">info@seeb.co</p>
                        </div>
                        <div class="row">
                            <p class="success__title__2">Your order number:</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="success__box">{{$order_uid}}</span>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn__find"><i class="fa fa-arrow-down" style="padding-right: 5px"></i>Download</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="sec__padding bg__track w-100">
            <div class="container text-center">
            </div>
        </section>
    </div>


@endsection
