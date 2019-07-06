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
                        <i class="fa fa-user fa-fw"></i>ویرایش دسته

                    </div>
                    <div class="panel-body">
                        {!! Form::model($fields['catp'],['method'=>'PATCH', 'route'=>['categoryproperties.update',$fields['catp']['id']], 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('عنوان دسته بندی') }}</label>

                                <div class="col-md-8">
                                    {{Form::select("category_id",[null => 'انتخاب دسته بندی']+$fields["cat"] ,null,
                                                 [
                                                    "class" => "form-control",

                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">

                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام مشخصه') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title",$fields["catp"]["name"] ,
                                                 [
                                                    "class" => "form-control",
                                                    "required"=>"required",

                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('امکان چند انتخابی') }}</label>

                                <div class="col-md-8">
                                    {{Form::checkbox("multiselect", 1 ,null ,
                                                 [

                                                 ])
                                    }}

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

@endsection
