@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        .col-container {
            display: table;
            width: 100%;
        }
        .col {
            display: table-cell;
            padding: 16px;
        }
    </style>
@endsection
@section('BODY')
        <div id="app">
            <admin-create-set-component :data="{{json_encode($fields)}}"></admin-create-set-component>
        </div>

@endsection
@section("JS")
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/plugins/pace/pace.js"></script>

@endsection