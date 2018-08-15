@extends('fa.landing.main')
@section('header')
    {{config('app.name')}} | Payment Result
@endsection
@section('content')

    @include('fa.landing.topnav')
    <div class="main-body fifth-color d-flex flex-column justify-content-center align-items-center  pt-0 bg__done ">
        <section class="sec__padding">
            {{--<img src="/img/flesh.svg" class="bg__flesh img-fluid">--}}
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 35%">
                <div class="row align-items-center pt-5 pb-5">
                    <div class="col-md-4">
                        <img src="/img/modem-g-b.svg">
                    </div>
                    <div class="col-md-8 text-left pr-5">
                        <div class="row pb-4">
                            <h2 class="fabfelt">با تشکر از خرید شما</h2>
                            <p class="success__title__1 w-100"> لطفا<span style="font-weight: bold;"> این شماره </span>
                               را برای پیگیری سفارش نزد خود نگه دارید.</p>
                            @if(!empty($order->c_mail))
                                <div class="success__title__1 w-100">ایمیل محصول شما</div>
                                <div class="success__title__1 w-100">{{$order->c_mail}}</div>
                            @else
                                <p class="success__title__1">ایمیل محصول شما</p>
                            @endif
                        </div>
                        <div class="row">
                            <p class="success__title__2">شماره سفارش شما:</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="success__box">{{$order_uid}}</span>
                            </div>
                            <div class="col-md-6 text-center">
                                <button class="btn btn__find"><i class="fa fa-arrow-down"
                                                                 style="padding-left: 5px"></i>دانلود
                                </button>
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
