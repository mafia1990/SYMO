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
                        <i class="fa fa-user fa-fw"></i>ویرایش دسته بندی

                    </div>
                    <div class="panel-body">
                        {!! Form::model($fields,['method'=>'PATCH', 'route'=>['category.update',$fields['id']], 'enctype' => 'multipart/form-data'])  !!}
                        <div class="col-lg-6">
                            <div class="form-group col-md-12 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                                <div class="col-md-8">
                                    {{Form::text("title",$fields["name"] ,
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
                                    {{Form::radio("sex",0 ,$fields['sex']==0,
                                                 [
                                                 ]) }}
                                    <label>مردانه</label>

                                    {{Form::radio("sex",1 ,$fields['sex']==1,
                                                 [
                                                 ]) }}
                                    <label>زنانه</label>

                                    {{Form::radio("sex",2,$fields['sex']==2,
                                                 [
                                                 ]) }}
                                    <label>هردو</label>

                                </div>
                            </div>


                            <div class="form-group col-md-12 row">
                                <label for="file"
                                       class="col-md-4 col-form-label text-md-right">{{ __('عکس دسته بندی') }}</label>

                                <div class="col-md-8">
                                    {!! Form::file("image",[
                                    "class"=>" form-control",

                                    ]) !!}
                                </div>
                                <div class="col-md-12 offset-md-4">
                                    <img src="{{$fields['image']}}" class="img-responsive">

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
