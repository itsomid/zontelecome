@extends('panel.layouts.main')

@section('title')
    Product List
@endsection
@section('breadtitle')
    Product List
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active"><strong>Product List</strong></li>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">

                        <div class="product-imitation second-color" >

                           <img src="{{$product->main_image_url}}" width="220px" height="220px">
                        </div>
                        <div class="product-desc text-center">
                                <span class="product-price">
                                   {{$product->price}} $
                                </span>

                            <p  class="product__title" style="font-family: BloggerSans-Medium;font-size: 16px"> {{$product->title}}</p>
                            <a href="{{route('panel/get/product',['slug'=>$product->slug])}}" class="btn btn__ btn__light">Edit Price </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".metismenu li").removeClass("active");

            $('#product').addClass('active');

        });
    </script>


@endsection