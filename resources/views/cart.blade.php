@extends('landing.main')
@section('content')

    @include('landing.topnav')
    <div class="main-body fifth-color">

        <section class="flex-container-main  justify-content-center sec__padding fifth-color pt-0">
            <div class="container text-center text-lg-left">
                <div class="row">
                    <p class="cart_title_1">1. Check your shopping list:</p>
                </div>
                @if(empty($products))
                    <p class="cart_title_1">Your Shopping Cart is empty.</p>
                @else
                    @foreach($products as $key=>$item)
                        <div class="row align-items-center cart_item mb-3">
                            <a class="remove_product" id="{{$item[0]->slug}}"><i class="fa fa-times cart_item_remove"></i></a>
                            <div class="cart_item_img">
                                <img src="{{$item[0]->main_image_url}}" height="110px" width="135">
                            </div>
                            <div class="cart_item_text mt-4">
                                <h2 class="mb-0">{{$item[0]->title}}</h2>
                                <h3 class="mb-3">Model 4358E</h3>
                                <span>$ {{number_format($item[0]->price,2)}}</span>
                            </div>
                            <div class="cart_item_price flex-grow-1 text-right mt-4">
                                <div class="row justify-content-end mb-3">
                            <span class="mr-2 pt-1">
                                <a class="cart_item_ar add_item" id="{{$item[0]->slug}}">Add <i class="fa fa-plus"></i></a>
                                <a class="cart_item_ar remove_item" id="{{$item[0]->slug}}">Remove <i class="fa fa-minus"></i></a>
                            </span>
                                    <span class="cart_item_number mb-4">x{{count($item)}}</span>
                                </div>
                                <div class="row justify-content-end">
                                    <h3>$ {{number_format($item[0]->price*count($item),2)}} </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row cart_item mt-2">
                        <div class="col-md-4 text-center align-self-center">
                            <span class="fa fa-check tick_icon"></span>
                            <span><strong>6 </strong>items</span>
                        </div>
                        <div class="col-md-3 align-self-end mt-5">
                            <div class="table-responsive m-t">
                                <table class="table invoice-table table-borderless cart_item_table">

                                    <tbody>
                                    <tr>
                                        <td>
                                            <div>Total</div>
                                        </td>
                                        <td>$26.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Taxes</div>
                                        </td>
                                        <td>$26.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Shipment</div>
                                        </td>
                                        <td>$26.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>Discount</div>
                                        </td>
                                        <td>$0</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5 second-color cart_item_final">
                            <div class="">
                                <span class="mr-3">Final Price</span>
                                <span>$ 19.19</span>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </section>
        <section class="sec__padding sec__bg">
            <div class="container text-center text-lg-left">
                <div class="row">
                    <p class="cart_title_2">2. Enter your information:</p>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <form class="d-flex flex-wrap">
                            <div class="col-md-7">

                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label text-right">State</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputPassword">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 align-self-end text-right">
                                @if(!empty($products))
                                    <span class="payment__text">Secrue payment by <strong>Paypal</strong></span>
                                    <button class="btn btn__product mb-5">Check Out<i class="fa fa-caret-right" style="padding-left: 15px"></i></button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function () {
            $('.remove_product').click(function () {

                var product_slug = $(this).attr('id');

                $.ajax({
                   url: "{{route('website/remove/product')}}",
                    type: "POST",
                    data:{
                       slug: product_slug,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {

                    }
                  
                });
            });
            $('.add_item').click(function () {
                var product_slug = $(this).attr('id');

                $.ajax({

                    url: "{{route('website/add/product/item')}}",
                    type: "POST",
                    data:{
                        slug: product_slug,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log("error" + data);
                    },
                    success: function (data) {
                        console.log(data);

                    }

                });
            });
            $('.remove_item').click(function () {
                var product_slug = $(this).attr('id');

                $.ajax({

                    url: "{{route('website/remove/product/item')}}",
                    type: "POST",
                    data:{
                        slug: product_slug,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function (data) {
                        console.log("error" + data);
                    },
                    success: function (data) {
                        // console.log(data);
                        location.reload();
                    }

                });
            });

        });
    </script>
@endsection

