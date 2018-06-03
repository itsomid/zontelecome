@extends('landing.main')
@section('content')

    @include('landing.main_topnav')
    <div class="main-body fifth-color">

        <section class="sec__padding ">
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 50%">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <p class="refill_title mt-5 mb-5">Please enter your <span class="title__color">product ID.</span></p>
                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-9 mb-3">
                                <input type="text" class="form-control refill__input" id="">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <button class="btn btn__find">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
