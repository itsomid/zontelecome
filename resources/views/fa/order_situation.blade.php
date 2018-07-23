@extends('fa.landing.main')
@section('header')
    {{config('app.name')}} | Order Track
@endsection
@section('content')

    @include('fa.landing.topnav')
    <div class="main-body fifth-color bg__tracking ">

        <section class="w-100 mt-5">
            <div class="container text-center sec__bg sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center mb-3 mt-3">

                            <p class="order_id mt-4">{{$order->uid}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container text-center  sixth-color">
                <div class="row justify-content-around pb-5 pt-3">
                    <div class="d-flex flex-column align-items-center">
                        @if($order->status == 'paid' || $order->status == 'processing' || $order->status == 'ready to deliver' )
                            <img src="/img/registered.svg" width="100" height="100">
                            <img src="/img/shopping_circle.svg" width="32" class="mt-5">
                            <div class="order_situation mt-4">تایید سفارش</div>
                            <div class="order_date">{{$order->created_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/registered-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">تایید سفارش</div>
                            <div class="order_date_g">{{$order->created_at->format('d/m/Y')}}</div>
                        @endif

                    </div>
                    <div class="d-flex flex-column align-items-center">
                        @if($order->status == 'delivering')
                            <img src="/img/track.svg" width="100" height="100">
                            <img src="/img/shopping_circle.svg" width="32" class="mt-5">
                            <div class="order_situation mt-4">ارسال شده</div>
                            <div class="order_date">{{$order->updated_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/track-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">ارسال شده</div>
                        @endif
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        @if($order->status == 'delivered')
                            <img src="/img/delivered.svg" width="100" height="100">
                            <img src="/img/shopping_circle.svg" width="32" class="mt-5">
                            <div class="order_situation mt-4">تحویل شده</div>
                            <div class="order_date">{{$order->updated_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/delivered-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">تحویل شده</div>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center order_description no-padding">
                    <div class="col-md-8 mt-5 mb-5">
                        <table class="table table-borderless table_situation ">
                            <tbody>
                            <tr>
                                <td>{{$order->c_name}}</td>
                                <td>{{$order->c_address}}</td>
                            </tr>
                            <tr>
                                <td>{{$order->c_mail}}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-borderless table_situation ">
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>
                                        <span class="product_quantity ml-3">{{$product->pivot->quantity}}x</span>
                                        {{$product->title}}

                                    </td>
                                    <td>{{number_format($product->price,2)}} تومان </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-borderless table_situation ">
                            <tbody>
                            <tr>
                                <td>مجموع</td>
                                <td>{{number_format($order->total_price,2)}}  تومان </td>

                            </tr>
                            <tr>
                                <td>مالیات</td>
                                <td>{{number_format($order->tax,2)}}  تومان </td>
                            </tr>
                            <tr>
                                <td>تخفیف</td>
                                <td>{{number_format($order->discount,2)}}  تومان </td>
                            </tr>
                            <tr>
                                <td><strong>قیمت نهایی</strong></td>
                                <td>{{number_format($order->final_price,2)}}  تومان </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table  table_situation table-borderless border-0">
                            <tbody>
                            <tr>
                                <td>تاریخ</td>
                                <td>{{$order->payment->created_at->format('d-m-Y')}}</td>

                            </tr>
                            <tr>
                                <td>شماره فاکتور</td>
                                @if(config('app.locale') == 'en')
                                    <td>{{$order->payment->reference}}</td>
                                @else
                                    <td>{{$order->payment->payment_info->reference_id}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>وضعیت</td>
                                <td>{{$order->status}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
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

@endsection

