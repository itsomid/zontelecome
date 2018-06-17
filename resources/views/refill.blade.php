@extends('landing.main')
@section('content')

    @include('landing.topnav')
    <div class="main-body fifth-color d-flex justify-content-center align-items-center pt-0">
        <section class="w-100">
            <form action="{{route('website/refill/balance')}}" method="POST">
                {{csrf_field()}}
            <div class="container text-center sec__bg__half sixth-color" style="background-size: 50%">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">

                        <p class="refill_title mt-5 mb-5">Please enter your <span class="title__color">Device ID.</span></p>
                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-9 mb-3">
                                <input type="text" class="form-control refill__input" name="device_id" id="">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <button class="btn btn__find">Find</button>
                        </div>
                    </div>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>

            </form>
        </section>
    </div>

@endsection
