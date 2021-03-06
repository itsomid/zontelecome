@extends('en.landing.main')
@section('header')
    {{config('app.name')}} | Order Track
@endsection
@section('content')

    @include('en.landing.topnav')
    <div class="main-body fifth-color bg__tracking ">

        <section class="w-100 mt-md-5">
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
                            <div class="order_situation mt-4">Order Registered.</div>
                            <div class="order_date">{{$order->created_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/registered-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">Order Registered.</div>
                            <div class="order_date_g">{{$order->created_at->format('d/m/Y')}}</div>
                        @endif

                    </div>
                    <div class="d-flex flex-column align-items-center">
                        @if($order->status == 'delivering')
                            <img src="/img/track.svg" width="100" height="100">
                            <img src="/img/shopping_circle.svg" width="32" class="mt-5">
                            <div class="order_situation mt-4">Order On The Way.</div>
                            <div class="order_date">{{$order->updated_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/track-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">Order On The Way.</div>
                        @endif
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        @if($order->status == 'delivered')
                            <img src="/img/delivered.svg" width="100" height="100">
                            <img src="/img/shopping_circle.svg" width="32" class="mt-5">
                            <div class="order_situation mt-4">Order Delivered.</div>
                            <div class="order_date">{{$order->updated_at->format('d/m/Y')}}</div>
                        @else
                            <img src="/img/delivered-bw.svg" width="100" height="100">
                            <img src="/img/grey-circle-2.svg" width="32" class="mt-5">
                            <div class="order_situation_g mt-4">Order Delivered.</div>
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
                                    <td>{{$product->title}}<span
                                                class="product_quantity ml-3">x{{$product->pivot->quantity}}</span></td>
                                    <td>$ {{number_format($product->price,2)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <table class="table table-borderless table_situation ">
                            <tbody>
                            <tr>
                                <td>Total</td>
                                <td>$ {{number_format($order->total_price - $order->tax - $order->delivery_fee + $order->discount ,2)}}</td>

                            </tr>
                            <tr>
                                <td>Taxes</td>
                                <td>$ {{number_format($order->tax,2)}}</td>
                            </tr>
                            <tr>
                                <td>Delivery fee</td>
                                <td>$ {{number_format($order->delivery_fee,2)}}</td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>$ {{number_format($order->discount,2)}}</td>
                            </tr>

                            <tr>
                                <td><strong>Final Price</strong></td>
                                <td>$ {{number_format($order->total_price,2)}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table  table_situation table-borderless border-0">
                            <tbody>
                            @if($order->by_admin)
                                <tr>
                                    <td>Payment Not Found!</td>


                                </tr>
                                @else
                            <tr>
                                <td>Date</td>
                                <td>{{$pay->created_at->format('d-m-Y')}}</td>

                            </tr>
                            <tr>
                                <td>Invoice ID</td>
                                @if(config('app.locale') == 'en')
                                    <td>{{$order->payment->reference}}</td>
                                @else
                                    <td>{{$order->payment->payment_info->reference_id}}</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{$order->status}}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
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

@endsection

