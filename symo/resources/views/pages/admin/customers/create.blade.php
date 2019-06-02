

@extends('layouts.masterdashboard')

@section('BODY')
    <div class="row ">

        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                @if ($errors->any())

                    <div class="alert alert-danger">
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
                        <i class="fa fa-user fa-fw"></i>Create profile

                    </div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'Admin\CustomerController@store', 'enctype' => 'multipart/form-data'])  !!}
                            <div class="col-lg-6">
                                <div class="form-group col-md-12 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-8 "  >

                                        {!! Form::radio("gender",0,true) !!}Man
                                        {!! Form::radio("gender",1,false) !!}Woman
                                </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::email("email",old('email'),[
                                        "class"=>"form-control",
                                       "required"=>"required",
                                        ]) !!}

                                    </div>
                                </div>

                                <div class="form-group col-md-12 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                            {!! Form::password("password",[
                                            "class"=>"form-control",
                                            "required"=>"required",
                                            ]) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

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
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::text("mobile",old('mobile'),[
                                        "class"=>"form-control",
                                        "required"=>"required",
                                        ]) !!}

                                    </div>
                                </div>
                                <div class="form-group col-md-12 row" id="phoneField">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::text("phone",old('phone'),[
                                   "class"=>"form-control",
                                   "required"=>"required",
                                   ]) !!}

                                    </div>
                                </div>

                                <div class="form-group col-md-12 row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

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
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="col-md-8 "  >
                                        {!! Form::radio("status",0,false) !!}Block
                                        {!! Form::radio("status",1,false) !!}Deactive
                                        {!! Form::radio("status",2,true) !!}Active



                                    </div>
                                </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    {!! Form::submit("Create",[
                                    "class"=>"btn btn-success"
                                    ]) !!}
                                    {!! Form::reset("Clear",[
                                    "class"=>"btn btn-primary"
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
            if(type==0) {
                $('#addressField').css("display", 'none');
                $('#phoneField').css("display", 'none');
            } else {
                $('#addressField').css("display",'');
                $('#phoneField').css("display",'');
            }
        }

    </script>
@endsection
