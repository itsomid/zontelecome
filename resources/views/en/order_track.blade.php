@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Order Track
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color d-flex justify-content-center align-items-center pt-0 bg__tracking">

        <section class="w-100 ">
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 50%">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <p class="refill_title mt-5 mb-5">Please enter your <span
                                    class="title__color">Order number.</span></p>
                        <form action="{{route('website/order/track/situation')}}" method="post">
                            {{csrf_field()}}
                            <div class="row mb-5 justify-content-center">
                                <div class="col-md-9 mb-3">
                                    <input type="text" class="form-control refill__input" name="order_uid">
                                </div>
                            </div>
                            <div class="row justify-content-center mb-5">

                                <button class="btn btn__find">Continue</button>
                            </div>
                        </form>
                    </div>

                </div>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </section>
    </div>

@endsection
