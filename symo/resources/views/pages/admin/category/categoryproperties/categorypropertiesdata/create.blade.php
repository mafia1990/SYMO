

@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

@endsection
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
                        {!! Form::open(['method'=>'POST', 'action'=>'Admin\Category\CategoryPropertiesDataController@store', 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('انتخاب دسته بندی') }}</label>

                                <div class="col-md-8">
                                    {{Form::select("category_id",[null => 'انتخاب دسته بندی']+ $fields['cat'] ,"",
                                                 [
                                                    "class" => "form-control",
                                                    "onchange"=>"change_state(this)",
                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('انتخاب مشخصه') }}</label>

                                <div class="col-md-8">
                                    {{Form::select("categoryproperties_id",[null => 'انتخاب مشخصه'] ,"",
                                                 [
                                                    "Class" => "form-control",
                                                    "id"=>"category_properties",
                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('مقدار مشخصه') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title","" ,
                                                 [
                                                    "class" => "form-control",

                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>




                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4 direction">
                                {!! Form::submit("ثبت مقدار",[
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
@section("JS")
   <script>
    function change_state(e){


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
        /* send the csrf-token and the input to the controller */
        $("#category_properties").html("");
        formData.append("_token", CSRF_TOKEN);
        formData.append("category_id", e.value);
        $.ajax({
            /* the route pointing to the post function */
            url: "/fetchcatp",
            type: 'POST',
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            data: formData,
            dataType: 'JSON',

            success: function (data) {
                $("#category_properties").html("");


                data.forEach(function(d){

                        $("#category_properties").append("  <option value="+d['id']+">"+d['name']+"</option> ");
                });

            }
        });
   }
   </script>
@endsection