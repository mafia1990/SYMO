@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
<div class="row">
    <!-- Welcome -->
    <div class="col-lg-12">
        <div class="alert alert-info">
            <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{!! $fields["name"]; !!} </b>

        </div>
    </div>
    <!--end  Welcome -->
</div>
<div class="row">
    <!--quick info section -->
    <div class="col-lg-3">
        <div class="alert alert-danger text-center">
            <i class="fa fa-archive fa-3x"></i>&nbsp;<b>{!! $fields["setsCount"] !!} </b>sets not accept!

        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-success text-center">
            <i class="fa  fa-users fa-3x"></i>&nbsp;<b>{!! $fields["selerCount"]  !!} </b>salers not verification
        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-info text-center">
            <i class="fa fa-briefcase fa-3x"></i>&nbsp;<b>{!! $fields["clothUnverifyCount"] !!}</b> clothes not verification

        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-warning text-center">
            <i class="fa  fa-lock fa-3x"></i>&nbsp;<b>{!!  $fields["userUnverifyCustomerCount"]    !!} </b>users blocked
        </div>
    </div>
    <!--end quick info section -->
</div>

<div class="row">
    <div class="col-lg-8">


        <!-- table sets -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Newest Sets

            </div>
            @if($fields['setsCount']>0)
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#Set Id</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sets as $set)
                                    <tr>
                                        <td>{!! $set->id !!} </td>
                                        <td>{!!  explode(" " ,$set->updated_at)[0] !!}</td>
                                        <td>{!! explode(" ",$set->updated_at)[1] !!}</td>
                                        <td class="text-center">
                                            <button onclick="delete_set({!! $set->setid !!})" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                                            </button>
                                            <a href="editset?id={!! $set->setid !!}"><button  type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                                                </button></a>
                                            <button   type="button" class="btn {!! ($set->status=='1')?"btn-success":"btn-default"; !!} btn-circle"><i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                 @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>


                <!-- /.row -->
            </div>
            @endif
            <!-- /.panel-body -->
        </div>
        <!--End  table  -->
        <!--table clothes -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>Newest Clothes

            </div>
            @if(count($fields['clothes'])>0)
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover  table-striped">
                                    <thead>
                                    <tr>
                                        <th>#Cloth Id</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clothes as $cloth)
                                        <tr>
                                            <td>{!! $cloth->id !!} </td>
                                            <td>{!!  explode(" " ,$cloth->updated_at)[0] !!}</td>
                                            <td>{!! explode(" ",$cloth->updated_at)[1] !!}</td>
                                            <td class="text-center">
                                                <button onclick="delete_cloth({!! $cloth->id !!})" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                                                </button>
                                                <a href="editcloth?id={!! $cloth->id !!}"><button  type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                                                    </button></a>
                                                <button   type="button" class="btn {!! ($cloth->status=='1')?"btn-success":"btn-default"; !!} btn-circle"><i class="fa fa-check"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>


                    <!-- /.row -->
                </div>
        @endif
        <!-- /.panel-body -->
        </div>
        <!--End  table  -->
        @if(count($fields['notifies'] )>0)
        <div class="col-lg-12 ">
            <!-- Notifications-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i>Notifications Panel
                </div>

                <div class="panel-body">
                    <div class="list-group">

                        @foreach($notifies as $notify)
                        <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i>{!! $notify->msg; !!}
                            <span class="pull-right text-muted small"><em>{!! $notify->date; !!}</em>
                                    </span>
                        </a>

                         @endforeach

                    </div>
                    <!-- /.list-group -->
                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                </div>

            </div>
            <!--End Notifications-->
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body yellow">
                <i class="fa fa-bar-chart-o fa-3x"></i>
                <h3>{!! $fields['visitors'] !!} </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Daily User Visits
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body blue">
                <i class="fa fa-pencil-square-o fa-3x"></i>
                <h3>{!! $fields['orders'] !!}  </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Pending Orders Found
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body green">
                <i class="fa fa fa-floppy-o fa-3x"></i>
                <h3>{!! $fields['space'] !!} </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">New Data Uploaded
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body red">
                <i class="fa fa-thumbs-up fa-3x"></i>
                <h3>{!!  $fields['userCustomerCount']  !!}  </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">New User Registered
                            </span>
            </div>
        </div>
    </div>

</div>
@if(count( $fields['sessionchats'])>0)
<div class="row">

    @foreach($fields['sessionchats'] as $chats)
    <div class="col-lg-4 chats">
        <!-- Chat Panel Example-->
        <div class="chat-panel panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Chat
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu slidedown">
                        <li>
                            <a href="javascript:void();" onclick="chat_user({!! $chats->srcid !!})">
                                <i class="fa fa-refresh fa-fw"></i>Refresh
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <ul class="chat" id="chat-log-{!! $chats->srcid !!}">
                    @foreach($chats->messages as $msg)
                        @if( $msg->type=='admin')

                            <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="{!! $chats->desAvatar !!}" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                <strong class="primary-font">{!! $msg->type !!} </strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>{!! Helpers::time_elapsed_string($msg->updated_at) !!}
                                </small>
                            </div>
                            <p>
                                {!! $msg->msg !!}
                            </p>

                        </div>

                            </li>
                        @else
                            <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="{!! $chats->srcAvatar !!}" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i>{!! Helpers::time_elapsed_string( $msg->updated_at) !!}</small>
                                        <strong class="pull-right primary-font">{!! $chats->name !!}</strong>
                                    </div>
                                    <p>
                                        {!! $msg->msg !!}
                                    </p>
                                </div>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>

            <div class="panel-footer">
                <div class="input-group">
                    <input maxlength="126" id="msg-{!! $chats->srcid  !!}"  type="text" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                                    <button  class="btn btn-warning btn-sm" onclick="sendmsg({!! $chats->srcid  !!})">
                                        Send
                                    </button>
                                </span>
                </div>
            </div>

        </div>
        <!--End Chat Panel Example-->
    </div>
    @endforeach

</div>
@endif
@section("JS")
    <script src="assets/scripts/admin.js"></script>

    <script>
        $( document ).ready(function() {

            var first=true;
            $.fn.visible = function (partial) {

                var $t = $(this),
                    $w = $(window),
                    viewTop = $w.scrollTop(),
                    viewBottom = viewTop + $w.height(),
                    _top = $t.offset().top,
                    _bottom = _top + $t.height(),
                    compareTop = partial === true ? _bottom : _top,
                    compareBottom = partial === true ? _top : _bottom;

                return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

            };


            var win = $(window);
            var chats = $(".chats");
            win.scroll(function (event) {
                chats.each(function (i, el) {

                    var el = $(el);
                    if (first) {
                        first=false;
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            /* the route pointing to the post function */
                            url: "",
                            type: 'POST',
                            /* send the csrf-token and the input to the controller */
                            data: {_token: CSRF_TOKEN, 'status':'1'},
                            dataType: 'JSON',
                            success: function (data) {

                            }
                        });

                    }
                });
            });
        });
    </script>
@endsection