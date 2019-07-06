@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

@endsection
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
                        {!! Form::model($fields['catpd'],['method'=>'PATCH', 'route'=>['categorypropertiesdata.update',$fields['catpd']['id']], 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('انتخاب دسته بندی') }}</label>

                                <div class="col-md-8">
                                    {{Form::select("category_id",[null => 'انتخاب دسته بندی']+$fields["cat"] ,$fields["catpd"]['categoryproperties']['category']['id'],
                                                 [
                                                    "class" => "form-control",
                                                    "onchange"=>"change_state(this)",
                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __(' مشخصه') }}</label>

                                <div class="col-md-8">
                                    {{Form::select("categoryproperties_id",[null => 'انتخاب مخضه']+$fields["catp"] ,$fields["catpd"]['categoryproperties']['id'],
                                                 [
                                                    "class" => "form-control",
                                                    "id"=>"category_properties",
                                                    "required"=>"required",
                                                 ])
                                    }}

                                </div>
                            </div>
                            <div class="form-group col-md-12 row">

                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('مقدار مشخصه') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title",$fields["catpd"]["name"] ,
                                                 [
                                                    "class" => "form-control",
                                                    "required"=>"required",

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