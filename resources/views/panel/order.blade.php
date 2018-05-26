@extends('panel.layouts.main')

@section('title')
    Order List
@endsection
@section('breadtitle')
    Order List
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active"><strong>Order List</strong></li>
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

                        <div class="col-md-2 pull-right text-right">
                            <a href="{{route('panel/get/neworder')}}" class="btn btn__ btn__package" id="add_btn"> <i
                                        class="fa fa-plus" style="font-size: 12px"></i>Add New Order</a>
                        </div>
                    </fieldset>


                </div>
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-filter="#filter">
                        <thead>
                        <tr>

                            <th data-toggle="true">Order ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Product count</th>
                            <th>Amount</th>
                            <th>Refrence Number</th>
                            <th>Datetime</th>
                            <th>Status</th>
                            <th data-hide="all"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->c_name}}</td>
                                <td>{{$order->c_mail}}</td>
                                <td>{{$order->c_address}}</td>
                                <td><span class="pie">{{$order->total_quantity}}</span></td>
                                <td>${{number_format((float)$order->total_price, 2, '.', ',')}}</td>
                                <td>
                                    @if($order->by_admin == true)
                                        created by admin
                                    @else
                                        {{$order->payment['reference']}}
                                    @endif
                                </td>
                                <td>{{$order->created_at->format('Y-m-d H:i:s')}}</td>
                                <td>
                                    @if($order->status == 'payed')
                                        <span class="label label-primary">Payed</span>
                                    @elseif($order->status == 'processing')
                                        <span class="label label-danger" >Processing</span>
                                    @elseif($order->status == 'initializing')
                                        <span class="label label-danger" >initializing</span>
                                    @elseif($order->status == 'canceled')
                                        <span class="label label-warning" >Canceled</span>
                                    @elseif($order->status == 'ready to deliver')
                                        <span class="label label-success" >Ready</span>
                                    @elseif($order->status == 'delivering')
                                        <span class="label label-success" >Delivering</span>
                                    @elseif($order->status == 'delivered')
                                        <span class="label label-success" >Delivered</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="container">
                                        <div class="text-right pull-right">
                                            <a href="{{route('panel/get/order', ['uid'=>$order->uid]) }}"
                                               class="btn btn__ btn__light" id="add_btn">Edit Order</a>
                                        </div>
                                        <div class="table-responsive invoice-table">
                                            <table class="table invoice-table">
                                                <thead>
                                                <tr>
                                                    <th>item</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Total Price</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->products as $key=>$product)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td>{{$product->title}}</td>
                                                        <td>{{$product->pivot->quantity}}</td>
                                                        <td>{{$product->description}}</td>
                                                        <td>{{$product->price}}$</td>
                                                        <td>{{number_format((float)$product->pivot->quantity * $product->price, 2, '.', ',')}}
                                                            $
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <table class="table invoice-total">
                                                <tbody>
                                                <tr>
                                                    <td><strong>Total :</strong></td>
                                                    <td id="total_price_lb">
                                                        ${{number_format((float)$order->total_price, 2, '.', ',')}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Taxes :</strong></td>
                                                    <td id="total_price_lb">
                                                        ${{number_format((float)$tax, 2, '.', ',')}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Discount :</strong></td>
                                                    <td id="total_price_lb">$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Final Price :</strong></td>
                                                    <td>
                                                        ${{number_format((float)$order->total_price + $tax, 2, '.', ',')}}</td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

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
            $('#order').addClass('active');
        });

    </script>
@endsection


