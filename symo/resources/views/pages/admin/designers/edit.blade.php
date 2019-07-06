

@extends('layouts.masterdashboard')

@section('BODY')
    <div class="row direction">

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
                        <i class="fa fa-user fa-fw"></i>ویرایش پروفایل اپراتور

                    </div>
                    <div class="panel-body">
                        {!! Form::model($fields,['method'=>'PATCH', 'route'=>['designers.update',$fields['id']], 'enctype' => 'multipart/form-data'])  !!}
                            <div class="col-lg-6">
                                <div class="form-group col-md-12 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                                    <div class="col-md-8">
                                        {{Form::text("name",$fields["name"] ,
                                                     [
                                                        "class" => "form-control",
                                                        "required"=>"required",
                                                     ])
                                        }}

                                    </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت') }}</label>

                                    <div class="col-md-8 "  >

                                        {!! Form::radio("gender",0,$fields["gender"]==0?true:false) !!}مرد
                                        {!! Form::radio("gender",1,$fields["gender"]==1?true:false) !!}زن
                                </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::email("email",$fields["email"],[
                                        "class"=>"form-control",
                                       "required"=>"required",
                                        ]) !!}

                                    </div>
                                </div>

                                <div class="form-group col-md-12 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('کلمه عبور') }}</label>

                                    <div class="col-md-8">
                                            {!! Form::password("password",[
                                            "class"=>"form-control",
                                            ]) !!}
                                    </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار کلمه عبور') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::password("password_confirmation",[
                                            "class"=>"form-control",
                                            ]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group col-md-12 row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('موبایل') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::text("mobile",$fields["mobile"],[
                                        "class"=>"form-control",
                                        "required"=>"required",
                                        ]) !!}

                                    </div>
                                </div>
                                <div class="form-group col-md-12 row" id="phoneField">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('تلفن') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::text("phone",$fields["phone"],[
                                   "class"=>"form-control",
                                   "required"=>"required",
                                   ]) !!}

                                    </div>
                                </div>

                                <div class="form-group col-md-12 row">
                                    <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('عکس پروفایل') }}</label>

                                    <div class="col-md-8">
                                    {!! Form::file("avatar",[
                                    "class"=>" form-control",

                                    ]) !!}
                                    </div>


                                </div>

                                <div class="form-group col-md-12 row" id="addressField">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('آدرس') }}</label>

                                    <div class="col-md-8">
                                        {!! Form::textarea("address",old('address'),[
                                           "class"=>"form-control",
                                           "required"=>"required",
                                           "rows"=>5,
                                           ]) !!}

                                    </div>
                                </div>
                                <div class="form-group col-md-12 row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('وضعیت کاربر') }}</label>

                                    <div class="col-md-8 "  >

                                        {!! Form::radio("status",0,$fields["status"]==0?true:false) !!}بلاک
                                        {!! Form::radio("status",1,$fields["status"]==1?true:false) !!}غیر فعال
                                        {!! Form::radio("status",2,$fields["status"]==2?true:false) !!}فعال



                                    </div>
                                </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    {!! Form::submit("بروز رسانی",[
                                    "class"=>"btn btn-success"
                                    ]) !!}
                                    {!! Form::reset("پاک کردن فرم",[
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
