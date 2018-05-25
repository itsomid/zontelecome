@extends('layouts.app')
@section('breadcrumbs')
    @include('inspinia::layouts.main-panel.breadcrumbs', [
      'breadcrumbs' => [
        (object) [ 'title' => 'Home', 'url' => route('panel') ],
        (object) [ 'title' => 'Product List', 'url' => route('panel/product') ]
      ]
    ])
@endsection
@section('content-title')
    Product List
    @endsection
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">

                        <div class="product-imitation second-color" >

                           <img src="{{$product->main_image_url}}" width="200px" height="162px">
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