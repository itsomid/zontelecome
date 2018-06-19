@extends('landing.main')
@section('content')

    @include('landing.topnav')
    <div class="main-body fifth-color bg__refill" style="background-size: 30%;">

        <section class="w-100 mt-5">
            <div class="container text-center sec__bg sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="row justify-content-center align-items-center mb-3 mt-3">
                            <img src="{{url('/img/shopping_circle.svg')}}" width="100" height="100">
                            <img src="{{url($device_info->image_url)}}" width="130px" class="main_product"
                                 style="left: 22%">

                            <p class="device_id ml-3">{{$device_info->product_id}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container text-center  sixth-color">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 mb-5">
                        <svg width="30%" height="100%" viewBox="0 0 42 42" class="donut">
                            <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent"
                                    stroke="#242424" stroke-width="2"></circle>
                            <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent"
                                    stroke="#FFCC00" stroke-width="1"
                                    stroke-dasharray="{{$device_info->balance_perc}} {{100 - $device_info->balance_perc}}"
                                    stroke-dashoffset="25"></circle>
                            <g class="chart-text">
                                <text x="50%" y="50%" class="chart-number">
                                    @if($device_info->balance % 1024 == 0)
                                        {{$device_info->balance / 1024}}GB
                                        <tspan class="chart-number-text inline">left</tspan>
                                    @else
                                        {{number_format((float)$device_info->balance / 1024,2,'.',',')}}GB
                                        <tspan class="chart-number-text inline">left</tspan>
                                    @endif
                                </text>

                                <text x="50%" y="50%" class="chart-label">
                                    DataPlan:
                                    <tspan class="chart-label-text "> {{$device_info->balance / 1024}}GB</tspan>
                                </text>
                            </g>
                        </svg>
                    </div>
                    <div class="col-md-12 mb-5">
                        <a class="btn btn__refill" href="{{route('website/refill/plan',['slug'=>$device_info->product_slug,'device_id'=>$device_info->product_id])}}">
                            <i class="fa fa-plus" style="font-size: 12px"></i>
                            Refill Now
                        </a>
                    </div>
                    <div class="col-md-8 mb-5">
                        <table class="table table-borderless table-border-bottom">
                            <tbody>
                            @foreach($refill_history as $item)
                                <tr>
                                    <td>Refilled for <strong>{{$item->product->title}}</strong></td>
                                    <td>{{number_format($item->product->price,2)}}$</td>
                                    <td>invoice:{{$item->order->payment['reference']}}</td>
                                    <td>{{$item->created_at->format('F,d,Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
        <section class="fifth-color">
            <div class="container text-center ">
                <div class="row align-items-center justify-content-around flex-nowrap pt-5 pb-5">

                    <p class="fabfelt">If you need any help, please contact us</p>
                    <a class="btn btn__contact" href="">
                        Contact Us
                    </a>
                </div>
            </div>
        </section>

    </div>

@endsection

