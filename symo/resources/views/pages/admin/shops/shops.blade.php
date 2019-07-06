@extends('layouts.masterdashboard')
@section("CSS")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page-Level CSS -->
    <link href="/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
@endsection
@section('BODY')



    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->

            <div id="app">
                <div class="panel panel-default">
                    <div class="panel-heading   " style="display:  flow-root;">
                        <span class="float-right">مشخصات فروشگاها</span>
                        <span style="float: left;"> <a href="shops/create">
                            <button type="button" class="btn btn-success  ">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </span>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive direction editor">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>آیدی</th>
                                    <th> نام فروشگاه</th>
                                    <th>فروشنده</th>
                                    <th>تماس</th>
                                    <th>تعداد لباس</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <!--End Advanced Tables -->
        </div>
    </div>



@endsection
@section("JS")

    <script src="{{asset('js/app.js')}}"></script>
    <script src="/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.errMode = 'throw';


           var rows= $('#dataTables-example').dataTable({
                processing: true,
                serverSide: true,
                "bPaginate": true,
                ajax: {
                "url":'{!! route('get.shop.data') !!}',
                "type": "POST"
                     },
                columns: [

                    {data: 'id',},
                    {data: 'shop'},
                    {data:  null,
                        render: function (data, type, row) {
                            var users="";
                            data.users.forEach(function(user){
                                users+='<a href="/admin/sellers/' + user.id + '/edit" class="editor_edit">'+user.name+'</a>  ';

                            });
                            return users;

                        }

                    },
                    {data: 'phone'},
                    {data:  null,
                        render: function (data, type, row) {

                            return data.clothes.length ;

                        }

                    },

                    {
                        data: null,
                        render: function (data, type, row) {

                            return '<a href="/admin/shops/' + data.id + '/edit" class="editor_edit">Edit</a> / <a href="javascript:void(0)" onclick="delete_user(this,' + data.id + ')" class="editor_remove">Delete</a>';

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


                axios.post('/admin/shops/' + id, {
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
