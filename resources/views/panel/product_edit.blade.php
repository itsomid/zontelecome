@extends('panel.layouts.main')

@section('title')
    {{$product->title}}
@endsection
@section('breadtitle')
    {{$product->title}}
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active">Products List</li>
    <li class="active"><strong>Edit Product</strong></li>
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Product info</a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-3"> Packages</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <form action="{{route('panel/edit/product',['uid'=>$product->slug])}}" id="form_product"
                                  method="POST">
                                {{csrf_field()}}
                                <div class="panel-body">

                                    <fieldset class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-11 text-right">

                                                <label class="">Availability:</label>
                                            </div>
                                            <div class="col-sm-1 ">
                                                <div class="onoffswitch">
                                                    <input type="checkbox" class=" onoffswitch-checkbox"
                                                           name="p_status"
                                                           id="p_status"

                                                           @if($product->status == 1)
                                                           checked
                                                            @endif
                                                    >
                                                    <label class="onoffswitch-label" style="text-align: left"
                                                           for="p_status">
                                                        <span class="onoffswitch-inner"></span>
                                                        <span class="onoffswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="p_title"
                                                       value="{{$product->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Slug:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="p_slug"
                                                       value="{{$product->slug}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Price:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="p_price"
                                                       value="{{$product->price}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Short Description:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" size="20" name="p_description"
                                                          style=" width: 100%; height: 100px;">{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <div class="col-sm-4 pull-right text-right">
                                                <button class="btn btn__ btn__save" type="submit">Save changes</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>


                        <div id="tab-3" class="tab-pane ">
                            <form action="{{route('panel/edit/package',['id'=>$product->id])}}" id="form_package"
                                  method="POST">
                                {{csrf_field()}}
                                <div class="panel-body">
                                    <div class="m-b text-right">
                                        <a class="btn btn__ btn__package" id="add_btn"> <i class="fa fa-plus"
                                                                                          style="font-size: 12px"></i>
                                            Add New Package</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-stripped table-bordered" id="myTable">
                                            <thead>
                                            <tr>

                                                <th>
                                                    Data Package
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Available
                                                </th>

                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($related_products as $related_product)
                                                <tr align="center" style="vertical-align: middle" id="{{$related_product->id}}">

                                                    <td width="40%" align="left">
                                                        <input style="width: 50%;"
                                                               name="rp_title[{{$related_product->id}}]" type="text"
                                                               class="form-control" value="{{$related_product->title}}"
                                                               required>
                                                    </td>
                                                    <td width="40%" align="left">
                                                        <input style="width: 50%;"
                                                               name="rp_price[{{$related_product->id}}]" type="text"
                                                               class="form-control" value="{{$related_product->price}}"
                                                               required>
                                                    </td>
                                                    <td width="5%" style="vertical-align: middle;">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" class=" onoffswitch-checkbox" name="rp_status[{{$related_product->id}}]"  id="switch{{$related_product->id}}"
                                                                   @if($related_product->status == 1)
                                                                   checked
                                                                    @endif
                                                            >
                                                            <label class="onoffswitch-label" style="text-align: left" for="switch{{$related_product->id}}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </td>


                                                    <td width="5%">
                                                        <a onclick="remove(this)" id="{{$related_product->id}}">
                                                            <i class="fa fa-trash"
                                                               style="color: red;font-size: 23px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-4 pull-right text-right">
                                            <button class="btn btn__ btn__save" type="submit">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var id = {{$last_id}}

        $(document).ready(function () {


            $('#add_btn').click(function () {
                id = id + 1;
                $('#myTable tbody').append('' +
                    '<tr align="center" style="vertical-align: middle" id="'+id+'">' +
                        '<td width="40%" align="left">' +
                            '<input style="width: 50%;" name="rp_title['+id+']" type="text" class="form-control" value="" required>' +
                        '</td>' +
                        '<td width="40%" align="left">' +
                            '<input style="width: 50%;" name="rp_price['+id+']" type="text" class="form-control" value="" required>' +
                        '</td>' +
                        '<td width="5%" style="vertical-align: middle;">'+
                            '<div class="onoffswitch">'+
                                '<input type="checkbox" class=" onoffswitch-checkbox" name="rp_status['+id+']"  id="switch'+id+'" checked>'+
                                '<label class="onoffswitch-label" style="text-align: left" for="switch'+id+'">'+
                                    '<span class="onoffswitch-inner"></span>'+
                                    '<span class="onoffswitch-switch"></span>'+
                                '</label>'+
                            '</div>'+
                        '</td>' +
                        '<td width="5%">'+
                            '<a onclick="remove(this)" id="'+id+'">'+
                                '<i class="fa fa-trash" style="color: red;font-size: 23px;"></i>'+
                            '</a>'+
                        '</td>'+
                    '</tr>');
            });



            $(".metismenu li").removeClass("active");
            $('#product').addClass('active');
        });
        function remove(element) {
            var rowNum = element.id;
            $('#' + rowNum).remove();
            {{--$.ajax({--}}
                {{--type: 'post',--}}
                {{--url: '{{route()}}'--}}
                {{--});--}}

        }


    </script>
@endsection