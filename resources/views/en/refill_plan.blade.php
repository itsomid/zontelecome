@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Refill Plan
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color bg__refill" style="background-size: 30%">

        <section class="w-100 mt-md-5">
            <div class="container text-center sec__bg sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center mb-3 mt-3">
                            <img src="{{url('/img/shopping_circle.svg')}}" width="77" height="77">
                            <img src="{{url($product->main_image_url)}}" class="main_product_refill">

                            <p class="device_id ml-5 pt-4">{{$device_id}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container text-center  sixth-color">r
                <div class="data__plan">
                    @foreach($plans as $plan)
                        <div class="plan__box" id="{{$plan->id}}">
                            <div class="plan__size pt-3">{{$plan->title}}</div>
                            <div class="plan__month">12 months</div>
                            <div class="plan__price">${{$plan->price}}</div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center pb-5 pt-3">
                    <form action="{{route('website/data/payment/create')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="package_id" id="plan" value="{{$plans[0]->id}}">
                        <input type="hidden" name="device_id" value="{{$device_id}}">
                        <button class="btn btn__pay"><strong>Pay</strong> by Square</button>
                    </form>
                </div>

            </div>

        </section>
        <section class="fifth-color">
            <div class="container text-center ">
                <div class="row align-items-center  pt-5 pb-5">
                    <div class="col-md-8 col-12">
                        <p class="fabfelt">If you need any help, please contact us</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <a class="btn btn__contact" target="_blank" href="{{route('website/contact')}}">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
        <script>
            $(document).ready(function () {
                $('.data__plan > div:first-child').css('border','3px solid #FFCC00');

                $('.data__plan > div').click(function () {
                    $('.data__plan > div').css('border','none');
                    $(this).css('border','3px solid #FFCC00');
                    var plan_id = $(this).attr('id');
                    $('#plan').attr('value',plan_id);

                });
            });
        </script>
@endsection

