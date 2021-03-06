@extends('fa.landing.main')
@section('header')
    {{config('app.name')}} | Refill Plan
@endsection
@section('content')

    @include('fa.landing.topnav')
    <div class="main-body fifth-color bg__refill" style="background-size: 30%">

        <section class="w-100 mt-5">
            <div class="container text-center sec__bg sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center mb-3 mt-3">
                            <img src="{{url('/img/shopping_circle.svg')}}" width="100" height="100">
                            <img src="{{url($product->main_image_url)}}"  class="main_product refill">

                            <p class="device_id mr-3 pt-4">{{$device_id}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container text-center  sixth-color">
                <div class="data__plan">
                    @foreach($plans as $plan)
                        <div id="{{$plan->id}}">
                            <div class="plan__size pt-3">{{$plan->title}}</div>
                            <div class="plan__month">۱۲ ماه</div>
                            <div class="plan__price">{{$plan->price}} تومان</div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center pb-5 pt-3">
                    <form action="{{route('website/data/payment/create')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="package_id" id="plan" value="{{$plans[0]->id}}">
                        <input type="hidden" name="device_id" value="{{$device_id}}">
                        <button class="btn btn__pay">پرداخت</button>
                    </form>
                </div>

            </div>

        </section>
        <section class="fifth-color">
            <div class="container text-center ">
                <div class="row flex-wrap align-items-center justify-content-around  pt-5 pb-5">

                    <div class="fabfelt">اگر به کمک احتیاج دارید با ما تماس بگیرید</div>
                    <a class="btn btn__contact" target="_blank" href="{{route('website/contact')}}">
                        تماس با ما
                    </a>
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

