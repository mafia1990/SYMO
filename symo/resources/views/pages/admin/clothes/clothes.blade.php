
@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Page-Level CSS -->
    <link href="/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

@endsection
@section('BODY')



    <div class="row">
        <div class="col-lg-12">
        <div id="app">

            <admin-clothes-component :data="{{ json_encode( $fields) }}"></admin-clothes-component>
        </div>
        </div>
    </div>


@endsection
@section('JS')

            <script src="{{asset('js/app.js')}}" ></script>
            <script src="/plugins/dataTables/jquery.dataTables.js"></script>
            <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/persian.js"></script>
            <script src="/plugins/dataTables/dataTables.bootstrap.js"></script>
            <script>
                $(document).ready(function () {
                    $('#dataTables-example').dataTable({

                        "oLanguage": {
                            "sUrl": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
                        }
                        });
                });
            </script>
@endsection