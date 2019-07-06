@extends('layouts.masterdashboard')

@section('BODY')
    <div class="row direction">

        <div class="col-md-12 direction">
            @if (session('success'))
                <div class="alert alert-success">
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
                        <i class="fa fa-user fa-fw"></i>ساخت پروفایل

                    </div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'Admin\CustomersController@store', 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

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
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('جنسیت') }}</label>

                                <div class="col-md-8 ">

                                    {!! Form::radio("gender",0,true) !!}مرد
                                    {!! Form::radio("gender",1,false) !!}زن
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                                <div class="col-md-8">
                                    {!! Form::email("email",old('email'),[
                                    "class"=>"form-control",
                                   "required"=>"required",
                                    ]) !!}

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('کلمه عبور') }}</label>

                                <div class="col-md-8">
                                    {!! Form::password("password",[
                                    "class"=>"form-control",
                                    "required"=>"required",
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('تکرار کلمه عبور') }}</label>

                                <div class="col-md-8">
                                    {!! Form::password("password_confirmation",[
                                        "class"=>"form-control",
                                        "required"=>"required",
                                        ]) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">

                            <div class="form-group col-md-12 row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('موبایل') }}</label>

                                <div class="col-md-8">
                                    {!! Form::text("mobile",old('mobile'),[
                                    "class"=>"form-control",
                                    "required"=>"required",
                                    ]) !!}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row" id="phoneField">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('تلفن') }}</label>

                                <div class="col-md-8">
                                    {!! Form::text("phone",old('phone'),[
                               "class"=>"form-control",
                               "required"=>"required",
                               ]) !!}

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="file"
                                       class="col-md-4 col-form-label text-md-right">{{ __('عکس پروفایل') }}</label>

                                <div class="col-md-8">
                                    {!! Form::file("avatar",[
                                    "class"=>" form-control",

                                    ]) !!}
                                </div>


                            </div>

                            {{--<div class="form-group col-md-12 row" id="addressField">--}}
                            {{--<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>--}}

                            {{--<div class="col-md-8">--}}
                            {{--{!! Form::textarea("address",old('address'),[--}}
                            {{--"class"=>"form-control",--}}
                            {{--"required"=>"required",--}}
                            {{--"rows"=>5,--}}
                            {{--]) !!}--}}

                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group col-md-12 row">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('وضعیت') }}</label>

                                <div class="col-md-8 ">
                                    {!! Form::radio("status",0,false) !!}بلاک
                                    {!! Form::radio("status",1,false) !!}غیر فعال
                                    {!! Form::radio("status",2,true) !!}فعال


                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                {!! Form::submit("ساخت اکانت",[
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
