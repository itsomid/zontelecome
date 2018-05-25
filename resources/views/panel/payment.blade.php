@extends('panel.layouts.main')

@section('title')
    Payments
@endsection
@section('breadtitle')
    Payments
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active"><strong>Payments</strong></li>
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 m-b">
            <div class="ibox-content">
                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                       placeholder="Search in table">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <fieldset class="form-horizontal">
                        <div class="col-md-1">
                            <a class="btn btn__ btn__table" id="add_btn">All orders</a>
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn__ btn__table" id="add_btn">Open orders</a>
                        </div>
                        <div class="col-md-1">
                            <a class="btn btn__ btn__table" id="add_btn">Done orders</a>
                        </div>


                        <div class="col-md-2 pull-right text-right">
                            <a href="{{route('panel/get/neworder')}}" class="btn btn__ btn__package" id="add_btn"> <i class="fa fa-plus" style="font-size: 12px"></i>Add New Order</a>
                        </div>
                    </fieldset>


                </div>
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-filter="#filter">
                        <thead>
                        <tr>

                            <th data-toggle="true">Order ID</th>
                            <th>Type</th>
                            <th>via</th>
                            <th>Amount</th>
                            <th>Reference Number</th>
                            <th>Datetime</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->products[0]->type}}</td>
                                <td>{{!is_null($order->payment) ? $order->payment->via : "-"}}</td>
                                @if(!is_null($order->payment))
                                <td>${{number_format((float)$order->payment->amount, 2, '.', ',')}}</td>
                                @else
                                    <td>-</td>
                                @endif
                                <td>{{$order->payment['reference']}}</td>
                                <td>{{$order->created_at->format('Y-m-d H:i:s')}}</td>

                                <td>
                                    @if($order->status == 'payed')
                                        <span class="label label-primary">Payed</span>
                                    @elseif($order->status == 'processing')
                                        <span class="label label-danger">Processing</span>
                                    @elseif($order->status == 'initializing')
                                        <span class="label label-danger">initializing</span>
                                    @elseif($order->status == 'canceled')
                                        <span class="label label-warning">Canceled</span>
                                    @elseif($order->status == 'ready to deliver')
                                        <span class="label label-success">Ready</span>
                                    @elseif($order->status == 'delivering')
                                        <span class="label label-success">Delivering</span>
                                    @elseif($order->status == 'delivered')
                                        <span class="label label-success">Delivered</span>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="9">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <!-- Page-Level Scripts -->

    <!-- FooTable -->
    <script src="/js/plugins/footable/footable.all.min.js"></script>


    <script>
        $(document).ready(function () {

            $('.footable').footable();
            $('.footable2').footable();

            $(".metismenu li").removeClass("active");
            $('#payment').addClass('active');
        });

    </script>
@endsection


