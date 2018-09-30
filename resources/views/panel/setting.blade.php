@extends('panel.layouts.main')

@section('title')
    Settings
@endsection
@section('breadtitle')
    Settings
@endsection
@section('breadmenu')
    <li><a href="{{route('panel')}}">Home</a></li>

    <li class="active"><strong>Settings</strong></li>
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>System Setting</h5>
                </div>
                <form action="{{route('panel/change/setting')}}" method="POST">
                    {{csrf_field()}}
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title">Tax fee (Percentage)</label>
                                    <input id="tax" type="text" class="form-control" name="tax_fee" value="{{$setting->tax_fee}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Delivery fee</label>
                                    <input id="delivery" type="text" class="form-control" name="delivery_fee" value="{{$setting->delivery_fee}}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Discount (Percentage)</label>
                                    <input id="discount" type="text" class="form-control" name="discount" value="{{$setting->discount}}">
                                </div>
                            </div>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 pull-right text-right">
                                    <button class="btn btn__ btn__save" type="submit">Save changes</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>
        $(document).ready(function () {


            $(".metismenu li").removeClass("active");
            $('#setting').addClass('active');
        });
    </script>
@endsection


