@extends('panel.layouts.main')
@section('title')
    Dashboard
@endsection
@section('breadtitle')
    Dashboard
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        <div>
                        <span class="pull-right text-right">
                            All sales: {{$all_order}}
                            <br>
                            <p style=" font-size: 30px;">{{number_format((float)$income,2,'.',',')}}$</p>
                        </span>
                            <h1 class="m-b-xs">Orders</h1>
                            <div>
                                <canvas id="lineChart" height="473" width="2030"
                                        style="display: block; width: 2030px; height: 473px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="border-top: 4px solid #F8CD46">
                            <span class="pull-right text-right label label-primary">Today</span>
                            <span style="font-size: 16px">Visits</span>
                        </div>
                        <div class="ibox-content">
                            <h1>285,430</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="border-top: 4px solid #F8CD46">
                            <span class="pull-right text-right label label-info">Orders</span>
                            <span style="font-size: 16px">Monthly</span>
                        </div>
                        <div class="ibox-content">
                            @if(!empty($monthly_order[Carbon\carbon::now()->format('m')]))
                            <h1>{{count($monthly_order[Carbon\carbon::now()->format('m')])}}</h1>
                                @else
                                <h1>0</h1>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="border-top: 4px solid #F8CD46">
                            <span class="pull-right text-right label label-warning">Income</span>
                            <span style="font-size: 16px">Annual</span>
                        </div>
                        <div class="ibox-content">
                            <h1>{{number_format((float)$annual_income[0]->total,2,'.',',')}}$</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script src="/js/plugins/chartJs/Chart.min.js"></script>
    <script>
        $(function () {

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [

                    {
                        backgroundColor: 'rgba(255,204,0,0.4)',
                        borderColor: "#FFCC00",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90, 27, 90, 60, 18, 45]
                    }, {
                        label: "",
                        backgroundColor: 'rgba(220, 220, 220, 0.5)',
                        pointBorderColor: "#fff",
                        data: [65, 59, 80, 81, 56, 55, 40, 10, 20, 15, 11, 19]
                    }
                ],
            };

            var lineOptions = {};


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {
                type: 'line', data: lineData, options: {
                    responsive: true,
                }
            });

        });
    </script>
@endsection