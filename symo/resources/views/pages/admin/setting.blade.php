@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('BODY')

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">

            <!-- Form Elements -->
            <form role="form">
                @csrf
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Feature
                    </div>
                    <div class="panel-body">
                        <div id="app">
                            <admin-settings-component :data="{{json_encode($fields)}}"></admin-settings-component>
                        </div>

                    </div>

            </form>
            <!-- End Form Elements -->

        </div>
        <!--End Page Header -->
    </div>
@endsection
@section('JS')
    <script src="{{asset("/js/app.js")}}"></script>
    <script src="assets/scripts/adddata.js"></script>
@endsection