

@extends('layouts.masterdashboard')

@section('BODY')
    <div class="row ">

        <div class="col-md-12">
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
                        ایجاد دسته بندی جدید<i class="fa fa-user fa-fw"></i>

                    </div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST', 'action'=>'Admin\Category\CategoryController@store', 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('عنوان') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title","" ,
                                                 [
                                                    "class" => "form-control",

                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت') }}</label>

                                <div class="col-md-8 direction text-right">
                                    {{Form::radio("sex",0 ,null,
                                                 [
                                                 ]) }}
                                    <label>مردانه</label>

                                    {{Form::radio("sex",1 ,null,
                                                 [
                                                 ]) }}
                                    <label>زنانه</label>

                                    {{Form::radio("sex",2,null,
                                                 [
                                                 ]) }}
                                    <label>هردو</label>

                                </div>
                            </div>

                            <div class="form-group col-md-12 row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('تصویر دسته بندی') }}</label>

                                <div class="col-md-8">
                                    {!! Form::file("image",[
                                    "class"=>" form-control",
                                    "required"=>"required"
                                    ]) !!}
                                </div>
                            </div>


                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4 direction">
                                {!! Form::submit("درج دسته بندی",[
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
