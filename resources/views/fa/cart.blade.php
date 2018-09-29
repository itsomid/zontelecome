@extends('fa.landing.main')
@section('header')
    {{config('app.name')}} | Cart
@endsection
@section('content')

    @include('fa.landing.topnav')
    <div class="main-body fifth-color bg__enjoy">

        <section class="flex-container-main  justify-content-center sec__padding  pt-0">
            <div class="container text-center text-lg-left">
                <div class="row mb-3">
                    <p class="cart_title_1">۱. سبد خرید خود را چک کنید</p>
                </div>
                @if(empty($products))
                    <p class="cart_title_1">سبد خرید شما خالی است.</p>
                @else
                    @foreach($products as $key=>$item)
                        <div id="omid" class="row align-items-center cart_item mb-3">
                            <a class="remove_product" id="{{$item[0]->slug}}"><i class="fa fa-times cart_item_remove"></i></a>
                            <div class="cart_item_img">
                                <img src="{{$item[0]->main_image_url}}" height="135" width="135">
                            </div>
                            <div class="cart_item_text mt-4">
                                <h2 class="mb-0">{{$item[0]->title}}</h2>
                                <span>{{number_format($item[0]->price)}} تومان </span>
                            </div>
                            <div class="cart_item_price flex-grow-1 text-right mt-4">
                                <div class="row justify-content-end mb-3">
                            <span class="mr-2 pt-1">
                                <a class="cart_item_ar add_item" id="{{$item[0]->slug}}">Add <i class="fa fa-plus"></i></a>
                                <a class="cart_item_ar remove_item" id="{{$item[0]->slug}}">Remove <i class="fa fa-minus"></i></a>
                            </span>
                                    <span id="p_slug_{{$key}}" class="cart_item_number mb-4">x{{count($item)}}</span>
                                </div>
                                <div class="row justify-content-end">
                                    <h3 id="product_price_{{$key}}" class="product_price">{{number_format($item[0]->price*count($item))}} تومان </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row cart_item mt-2">
                        <div class="col-md-3 text-center align-self-center">
                            <span class="fa fa-check tick_icon"></span>
                            <span id="total_item">
                                <strong>تعداد محصول:
                                    @if(!empty(session('cart.item')))
                                    {{count(session('cart.item'))}}
                                        @endif
                                </strong>
                            </span>
                        </div>
                        <div class="col-md-4 align-self-end mt-5">
                            <div class="table-responsive m-t">
                                <table class="table invoice-table table-borderless cart_item_table">

                                    <tbody>
                                    <tr>
                                        <td>
                                            <div>مجموع</div>
                                        </td>
                                        <td id="total_price">تومان 26.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>مالیات</div>
                                        </td>
                                        <td id="tax"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>هزینه حمل</div>
                                        </td>
                                        <td>{{number_format($tax->delivery_fee)}} تومان </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>تخفیف</div>
                                        </td>
                                        <td id="dis">0 تومان</td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-5 second-color cart_item_final">
                            <div class="">
                                <span class="mr-3">قیمت نهایی</span>
                                <span  id="final_price"> تومان</span>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </section>
        <section class="sec__padding sec__bg">
            <div class="container text-center text-lg-left">
                <div class="row">
                    <p class="cart_title_2">۲. اطلاعات خود را وارد کنید.</p>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <form action="{{route('website/product/payment/create')}}" method="POST" class="d-flex flex-wrap">
                            {{csrf_field()}}
                            <div class="col-md-7">

                                <div class="form-group row">
                                    <label for="txt_name" class="col-sm-4 col-form-label">نام و نام خانوادگی</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="c_name" name="c_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txt_email" class="col-sm-4 col-form-label">ایمیل</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="c_mail" name="c_mail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label">آدرس</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="c_address" name="c_address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-4 col-form-label">شهر</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="c_city" name="c_city" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_country" class="col-sm-4 col-form-label">کشور</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="c_country" name="c_country" value="ایران" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_state" class="col-sm-4 col-form-label">کدپستی</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="c_zipcode" name="c_zipcode">
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4 align-self-end text-center text-md-left">
                                @if(!empty($products))
                                    <p class="payment__text">پرداخت امن با <strong>زرین پال</strong></p>
                                    <button class="btn btn__product mb-4"><i class="fa fa-caret-left" style="padding-left: 15px"></i>پرداخت و ثبت نهایی سفارش</button>
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
            // $('.body').persiaNumber();

            var sum = 0;
            var tax_perc = parseFloat({{$tax->tax_fee}});
            $('.product_price').each(function(){

                sum += parseInt($(this).text().replace(' تومان ','').replace(/,/g, ''));
            });

            var tax = taxPrice(sum,tax_perc);
            $('#tax').text(addCommas(tax.toFixed(0))+ " تومان ");
            $('#total_price').text(addCommas(sum) + " تومان ");

            var final_price =finalPrice(sum,tax_perc);
            $('#final_price').text(addCommas(final_price.toFixed(0)) + "تومان ");
            persian_numbers();
            $('.remove_product').click(function () {
                alert(1);
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
                        location.reload();
                    }
                  
                });
            });
            $('.add_item').click(function () {

                var product_slug = $(this).attr('id');
                // alert(persian_numbers(12));
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

                        $('#p_slug_' + product_slug).text("x" + data['product_count']);
                        $('.nav-item span').text(data['total_count']);
                        $('#total_item').text("تعداد محصول: " + data['total_count']);
                        // alert(addCommas(data['total_price']));
                        $('#product_price_' + product_slug).text(addCommas(data['total_price']) + " تومان ");
                        var sum = 0;
                        $('.product_price').each(function(){
                            // alert(parseFloat($(this).text().replace(' تومان ','').replace(/,/g, '')));
                           sum += parseFloat($(this).text().replace(' تومان ','').replace(/,/g, ''));
                        });
                        $('#total_price').text(addCommas(sum.toFixed(0)) + " تومان ");
                        var tax = taxPrice(sum,tax_perc);
                        $('#tax').text(addCommas(tax.toFixed(0)) + " تومان ");
                        var final_price =finalPrice(sum,tax_perc);
                        $('#final_price').text(addCommas(final_price.toFixed(0)) + " تومان");
                        persian_numbers();
                    }

                });
            });
            $('.remove_item').click(function () {

                var product_slug = $(this).attr('id');
                var product_count = $('#p_slug_'+product_slug).text().replace('x','');
                product_count = parseInt(product_count);
                if (product_count > 1) {
                    $.ajax({

                        url: "{{route('website/remove/product/item')}}",
                        type: "POST",
                        data: {
                            slug: product_slug,
                            _token: "{{ csrf_token() }}"
                        },
                        error: function (data) {
                            console.log("error" + data);
                        },
                        success: function (data) {
                            console.log(data);

                            $('#p_slug_' + product_slug).text("x" + data['product_count']);
                            $('.nav-item span').text(data['total_count']);
                            $('#total_item').text("تعداد محصول: " + data['total_count']);
                            $('#product_price_' + product_slug).text(addCommas(data['total_price'])+ " تومان ");
                            var sum = 0;
                            $('.product_price').each(function(){
                                sum += parseFloat($(this).text().replace(' تومان ','').replace(/,/g, ''));
                            });
                            $('#total_price').text(addCommas(sum.toFixed(0)) + " تومان ");
                            var tax = taxPrice(sum,tax_perc);
                            $('#tax').text(addCommas(tax.toFixed(0)) + " تومان ");

                            var final_price =finalPrice(sum,tax_perc);
                            $('#final_price').text(addCommas(final_price.toFixed(0)) + " تومان ");
                            persian_numbers();
                        }
                    });
                }
                else {
                    console.log("minimum number");
                }

            });

        });
        function finalPrice(price,tax_perc) {
            var delivery = parseFloat({{$tax->delivery_fee}});
            var  tax = price * (tax_perc/100);
            var  final_price = tax + price + delivery;
            return final_price;
        }
        function taxPrice(price,tax_perc) {
            var  tax = price * (tax_perc/100);
            return tax;
        }
        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        function toPersianNumber(input) {
            var inputstring = input;
            var persian = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"]
            for (var j = 0; j < persian.length; j++) {
                inputstring = inputstring.toString().replace(new RegExp(j, "g"), persian[j]);
            }

            return inputstring;
        }
    </script>
@endsection

