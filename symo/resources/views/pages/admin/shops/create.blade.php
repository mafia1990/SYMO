@extends('layouts.masterdashboard')
@section('CSS')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc;
            border-radius: 0px;
        }

        .select2-container .select2-selection--single {
            height: 34px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid #ccc 1px;
        }

        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ccc;
            border-radius: 0px;
        }

        .select2-container .select2-search--inline {
            float: right;
        }
    </style>

@endsection
@section('BODY')
    <div class="row direction ">

        <div class="col-md-12 direction">
            @if (session('success'))
                <div class="alert alert-success direction">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())

                <div class="alert alert-danger direction">
                    <ul>
                        @foreach($errors->all() as  $error)
                            <li>   {{$error}}</li><br>
                        @endforeach

                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-bag fa-fw"></i>
                        ساخت فروشگاه

                    </div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'Admin\ShopsController@store', 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('نام فروشگاه') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("name","" ,
                                                 [
                                                    "class" => "form-control",

                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('تلفن فروشگاه') }}</label>

                                <div class="col-md-8">
                                    {!! Form::text("phone","",[
                                    "class"=>"form-control",
                                   "required"=>"required",
                                    ]) !!}

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('موبایل') }}</label>

                                <div class="col-md-8">
                                    {!! Form::number("mobile","",[
                                    "class"=>"form-control",
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="file"
                                       class="col-md-4 col-form-label text-md-right">{{ __('تصویر فروشگاه') }}</label>

                                <div class="col-md-8">
                                    {!! Form::file("photo",[
                                    "class"=>" form-control",

                                    ]) !!}
                                </div>


                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="seller"
                                       class="col-md-4 col-form-label text-md-right">{{ __('فروشنده') }}</label>
                                <div class="col-md-8">
                                    <select  name="seller[]"  class="select_multiple form-control"    tabindex="-1" >
                                            @foreach($sellers as $seller)
                                                    <option value="{{ $seller->id }}">{{ $seller->id.' - '.$seller->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">


                            <div class="form-group col-md-12 row" id="addressField">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('آدرس') }}</label>

                                <div class="col-md-8">
                                    {!! Form::textarea("address",old('address'),[
                                       "class"=>"form-control",
                                       "required"=>"required",
                                       "rows"=>5,
                                       ]) !!}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row" id="addressField">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('توضیحات') }}</label>

                                <div class="col-md-8">
                                    {!! Form::textarea("description",old('description'),[
                                       "class"=>"form-control",
                                       "rows"=>5,
                                       ]) !!}

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('وضعیت فروشگاه') }}</label>

                                <div class="col-md-8 direction ">
                                    {!! Form::radio("status",0,false) !!}بلاک
                                    {!! Form::radio("status",1,false) !!}غیر فعال
                                    {!! Form::radio("status",2,true) !!}فعال


                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4 direction">
                                {!! Form::submit("ساخت فروشگاه",[
                                "class"=>"btn btn-success"
                                ]) !!}
                                {!! Form::reset("پاک کردن فرم",[
                                "class"=>"btn btn-default"
                                ]) !!}


                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function userForm(type) {
            if (type == 0) {
                $('#addressField').css("display", 'none');
                $('#phoneField').css("display", 'none');
            } else {
                $('#addressField').css("display", '');
                $('#phoneField').css("display", '');
            }
        }

    </script>
@endsection
@section('JS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $('.select_multiple').val(null).trigger('change');
        $('.select_multiple').select2({
            placeholder: 'انتخاب فروشندگان فروشگاه',
        });
    </script>
@endsection