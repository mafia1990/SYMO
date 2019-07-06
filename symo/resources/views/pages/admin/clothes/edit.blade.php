@extends('layouts.masterdashboard')
@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
    <link href="/plugins/iCheck/line/red.css" rel="stylesheet">



    <style>
        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc;
            border-radius: 0px;
        }

        .select2-container .select2-selection--single {
            height: 34px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid #ccc 1px;
        }

        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ccc;
            border-radius: 0px;
        }

        .select2-container .select2-search--inline {
            float: right;
        }
    </style>
@endsection
@section('BODY')

    <div class="row direction">
        <div class="col-md-12 direction">

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
                {!! Form::model($fields,[ 'method'=>'PATCH', 'route'=>['clothes.update',$fields['cloth']['id']],'enctype'=>"multipart/form-data"]) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        درج لباس
                    </div>
                    <div id="app">
                        <admin-edit-cloth-component :data="{{ json_encode( $fields)}}"></admin-edit-cloth-component>
                    </div>

                </div>

            {!! Form::close() !!}
            <!-- End Form Elements -->
            </div>
            <!--End Page Header -->
        </div>
    </div>
        @endsection
        @section("JS")
            <script src="{{asset('js/app.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
            <script src="/plugins/iCheck/icheck.js"></script>
            <script>
                Dropzone.autoDiscover = false;
                $(document).ready(function () {
                    $('#categorySelect').select2({
                        placeholder: 'انتخاب کنید',
                    });

                    $("#categorySelect").on("select2:select", function (e) {
                        var data = e.params.data;
                        $('#load_cloth_properties').html("");
                        $('#load_cloth_properties').load('/fetchcatp2?id=' + data.id);
                    });
                    $('.select_multiple').select2({
                        placeholder: 'انتخاب کنید',
                        multiple: true,
                    });
                    $('.select_single').select2({
                        placeholder: 'انتخاب کنید',
                        multiple: false,
                    });


                    var images ={{$fields['clothImages']->pluck('id')->toJson()}};
                    document.getElementById('photo-id').value = images.toString()

                    function arrayRemove(arr, value) {

                        return arr.filter(function (ele) {
                            return ele != value;
                        });

                    }

                    var drop = new Dropzone('#photo', {
                        addRemoveLinks: true,
                        maxFiles: 5,
                        maxFileSize: 50,
                        acceptedFiles: ".png,.jpg",
                        url: "{{ route('admin.photo.upload') }}",
                        sending: function (file, xhr, formData) {
                            console.log(file);

                            formData.append("_token", "{{csrf_token()}}");
                            formData.append("_name", file.upload.uuid);
                        },
                        success: function (file, response) {
                            images.push(response.photo_id);
                            document.getElementById('photo-id').value = images.toString();
                        },

                        removedfile: function (file) {
                            console.log(file);
                            if (file.upload)
                                axios.post("{{route('admin.photo.del')}}", {'_name': file.upload.uuid}).then(res => {

                                    file.previewElement.remove();
                                    images = arrayRemove(images, res.data.photo_id);
                                    document.getElementById('photo-id').value = images.toString();
                                });
                            else {
                                images = arrayRemove(images, file.photo_id);
                                document.getElementById('photo-id').value = images.toString();
                                file.previewElement.remove();
                            }
                        }


                    });

                    var existingFiles = [
                            @forEach( $fields['clothImages'] as $clothImage)
                        {
                            path: "{{$clothImage->path}}",
                            name: "{{$clothImage->name}}",
                            photo_id: {{$clothImage->id}} },
                        @endforeach
                    ];

                    for (i = 0; i < existingFiles.length; i++) {
                        drop.emit("addedfile", existingFiles[i]);
                        drop.emit("thumbnail", existingFiles[i], existingFiles[i].path);
                        drop.emit("complete", existingFiles[i]);
                    }
                    $('input[type=checkbox]').each(function () {
                        var self = $(this),
                            label = self.next(),
                            label_text = label.text();
                        label.remove();
                        self.iCheck({
                            checkboxClass: 'icheckbox_line-red',
                            insert: '<div class="icheck_line-icon"></div>' + label_text
                        });
                    });
                });


            </script>
@endsection
