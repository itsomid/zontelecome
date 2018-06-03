@extends('panel.layouts.main')

@section('title')
    Refill
@endsection
@section('breadtitle')
    Refill list
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active"><strong>Refill</strong></li>
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

                        <a class="btn btn__ btn__table active" id="all_order">All orders</a>
                        <a class="btn btn__ btn__table" id="open_order">Open orders</a>
                        <a class="btn btn__ btn__table" id="done_order">Done orders</a>

                    </fieldset>


                </div>
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-filter="#filter">
                        <thead>
                        <tr>

                            <th data-toggle="true">Order ID</th>
                            <th>Product ID</th>
                            <th>Product Type</th>
                            <th>Data Package</th>
                            <th>Amount</th>
                            <th>Reference Number</th>
                            <th>Datetime</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @if($order->virtualProduct != '[]')
                            <tr>
                                <td>{{$order->id}}</td>
                                @foreach($order->virtualProduct as $product)

                                    <td>{{$product->id}}</td>

                                    <td>{!!\App\Product::whereId($product->related_product)->first()->title!!}</td>


                                <td>{{$product->title}}</td>
                                @endforeach
                                <td>${{number_format((float)$order->total_price, 2, '.', ',')}}</td>
                                <td>

                                            {{$order->payment['reference']}}
                                </td>

                                <td>{{$order->created_at->format('Y-m-d H:i:s')}}</td>


                                <td>
                                    @if($order->status == 'paid')
                                        <span class="label label-primary">Paid</span>
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
                            @endif
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
            $('.btn__table').click(function () {
                $('.btn__table').removeClass('active');
                $('#' + this.id).addClass('active');
            });

            $('#all_order').click(function () {
                $('.label').parent().parent().css('display','');
            });
            $('#done_order').click(function () {
                $('.label').parent().parent().css('display','');
                $('.label-danger').parent().parent().css('display','none');
                $('.label-warning').parent().parent().css('display','none');

            });
            $('#open_order').click(function () {
                $('.label').parent().parent().css('display','');
                $('.label-primary').parent().parent().css('display','none');
                $('.label-success').parent().parent().css('display','none');
            });
            $('.footable').footable();
            $('.footable2').footable();

            $(".metismenu li").removeClass("active");
            $('#refill').addClass('active');
        });

    </script>
@endsection


