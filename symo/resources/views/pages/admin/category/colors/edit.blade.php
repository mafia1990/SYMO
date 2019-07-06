@extends('layouts.masterdashboard')
@section("CSS")
    <link rel="stylesheet" href="/plugins/colorpicker/la_color_picker.css">
    <style>
        .inp {
            border-right:  1px solid {{$color['code']}}
            border-radius: 3px;
            padding: 10px;
            font-size: 110%;
        }
        #colorPicker {
            border-right: 40px solid {{$color['code']}} ;
        }

    </style>

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
                        <i class="fa fa-user fa-fw"></i>ویرایش رنگ

                    </div>
                    <div class="panel-body">
                        {!! Form::model($color,['method'=>'PATCH', 'route'=>['colors.update',$color['id']], 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('کد رنگ') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title", substr( $color["code"],1) ,
                                                 [
                                                    "class" => "form-control inp",
                                                    "required"=>"required",
                                                      "id" => "colorPicker",
                                                 ])
                                    }}
                                    <div class="palette" id="colorPalette"></div>

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
@section("JS")
    <script src="/plugins/colorpicker/la_color_picker.js"></script>

@endsection