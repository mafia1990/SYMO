
@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Page-Level CSS -->
    <link href="/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

@endsection
@section('BODY')



    <div class="row">
        <div class="col-lg-12">
        <div>

            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading   " style="display:  flow-root;">
                    <span class="float-right">مشخصات لباس</span>
                    <span style="float: left;"> <a href="clothes/create">
                            <button type="button" class="btn btn-success  ">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </span>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover direction" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>عنوان</th>
                                <th>جنسیت</th>
                                <th>دسته بندی</th>
                                <th>پیش نمایش</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
        </div>
    </div>


@endsection
@section("JS")

{{--    <script src="{{asset('js/app.js')}}"></script>--}}
    <script src="/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'throw';


            var rows= $('#dataTables-example').dataTable({
                processing: true,
                serverSide: true,
                "bPaginate": true,
                ajax: {
                    "url":'{!! route('get.cloth.data') !!}',
                    "type": "POST"
                },
                columns: [

                    {data: 'id',},
                    {data: 'title'},
                    {
                        data: 'sex',
                        render: function (data, type, row) {
                            if (data == 0) return "مردانه";
                            return "زنانه";

                        }

                    },

                    {data: 'category.name'},
                    {
                        data: null, render: function (data, type, row) {
                            if (data.images[0].path)
                                return '<img class=" img-circle" width="50" height="50"  src=' + data.images[0].path + '>';
                            else return '<img  width="50" height="50" class=" img-circle" src="/images/users/user.jpg"/>';

                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {

                            return '<a href="/admin/clothes/' + data.id + '/edit" class="editor_edit">Edit</a> / <a href="javascript:void(0)" onclick="delete_user(this,' + data.id + ')" class="editor_remove">Delete</a>';

                        }
                    }

                ],

                "oLanguage": {
                    "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
                }

            });

        });

        function delete_user(e,id) {
            if (confirm('Are you sure you want to remove this record?')) {
                axios.post('/admin/clothes/' + id, {
                    '_method': 'DELETE',
                    'id': id
                }).then(res => {
                    $(e).closest('tr').remove();
                }).catch(err => {
                    console.log(err);

                });
            }
        }

    </script>

@endsection
