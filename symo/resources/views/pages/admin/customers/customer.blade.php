
@extends('layouts.masterdashboard')
@section("CSS")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page-Level CSS -->
    <link href="/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
@endsection
@section('BODY')



    <div class="row">
        <div class="col-lg-12 direction">
            <!-- Advanced Tables -->

                <div id="app" >
                <admin-customer-component   ></admin-customer-component>
                </div>


            <!--End Advanced Tables -->
        </div>
    </div>



@endsection
@section("JS")

<script src="{{asset('js/app.js')}}" ></script>
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
                    "url":'{!! route('get.cus.data') !!}',
                    "type": "POST"
                },
                columns: [

                    {data: 'id',},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'phone'},
                    {
                        data: null, render: function (data, type, row) {
                            if (data.avatar)
                                return '<img class=" img-circle" width="50" height="50"  src=' + data.avatar + '>';
                            else return '<img  width="50" height="50" class=" img-circle" src="/images/users/user.jpg"/>';

                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row) {

                            return '<a href="/admin/customers/' + data.id + '/edit" class="editor_edit">Edit</a> / <a href="javascript:void(0)" onclick="delete_user(this,' + data.id + ')" class="editor_remove">Delete</a>';

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


                axios.post('/admin/customers/' + id, {
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
