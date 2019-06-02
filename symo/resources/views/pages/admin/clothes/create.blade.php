@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

@endsection
@section('BODY')

    <div class="row">
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
    <!-- Page Header -->
        <div class="col-lg-12">
            <!-- Form Elements -->
            {!! Form::open([ 'method'=>'POST', 'action'=>'Admin\ClothesController@store','enctype'=>"multipart/form-data"]) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                       درج لباس
                    </div>
                    <div id="app">
                        <admin-create-cloth-component :data="{{ json_encode( $fields)}}"></admin-create-cloth-component>
                    </div>

                </div>

            {!! Form::close() !!}
            <!-- End Form Elements -->
        </div>
        <!--End Page Header -->
    </div>

@endsection
@section("JS")
    <script src="{{asset('js/app.js')}}"></script>
    <script src="assets/scripts/loaddata.js"></script>

@endsection