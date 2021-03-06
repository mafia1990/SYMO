
@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Page-Level CSS -->
    <link href="/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

@endsection
@section('BODY')



    <div class="row">
        <div class="col-lg-12">
            <div id="app">
                <admin-sets-component :data="{{ json_encode($fields) }}"></admin-sets-component>
            </div>




            <!--End Advanced Tables -->
        </div>
    </div>



@endsection
@section('JS')
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

@endsection