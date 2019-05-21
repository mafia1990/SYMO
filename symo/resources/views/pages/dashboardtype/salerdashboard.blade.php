@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
<div class="row">
    <!-- Welcome -->
    <div class="col-lg-12">
        <div class="alert alert-info">
            <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b>{!! $username; !!} </b>

        </div>
    </div>
    <!--end  Welcome -->
</div>
<div class="row">
    <!--quick info section -->
    <div class="col-lg-3">
        <div class="alert alert-danger text-center">
            <i class="fa fa-archive fa-3x"></i>&nbsp;<b>{!! DB::table('sets')->where('status','!=','true')->count(); !!} </b>sets not accept!

        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-success text-center">
            <i class="fa  fa-users fa-3x"></i>&nbsp;<b>{!! DB::table('users')->where([['type','saler'],['status','!=','1']])->count(); !!} </b>salers not verification
        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-info text-center">
            <i class="fa fa-briefcase fa-3x"></i>&nbsp;<b>{!! DB::table('clothes')->where('status','!=','true')->count(); !!}</b> clothes not verification

        </div>
    </div>
    <div class="col-lg-3">
        <div class="alert alert-warning text-center">
            <i class="fa  fa-lock fa-3x"></i>&nbsp;<b>{!! DB::table('users')->where([['status','2'],['type','customer']])->count(); !!} </b>users blocked
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
            @if(count($sets)>0)
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
            @if(count($clothes)>0)
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
        @if(count($notifies)>0)
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
                <h3>{!! $visitors !!} </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Daily User Visits
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body blue">
                <i class="fa fa-pencil-square-o fa-3x"></i>
                <h3>{!! $orders; !!}  </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">Pending Orders Found
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body green">
                <i class="fa fa fa-floppy-o fa-3x"></i>
                <h3>{!! $space !!} </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">New Data Uploaded
                            </span>
            </div>
        </div>
        <div class="panel panel-primary text-center no-boder">
            <div class="panel-body red">
                <i class="fa fa-thumbs-up fa-3x"></i>
                <h3>{!! DB::table('users')->where([['type','customer']])->count(); !!}  </h3>
            </div>
            <div class="panel-footer">
                            <span class="panel-eyecandy-title">New User Registered
                            </span>
            </div>
        </div>
    </div>

</div>
@if(count($sessionchats)>0)
    <div class="row">

        @foreach($sessionchats as $chats)
            <div class="col-lg-4">
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
                                    <a href="#">
                                        <i class="fa fa-refresh fa-fw"></i>Refresh
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <ul class="chat">
                            @foreach($chats->messages as $msg)
                                @if( $msg->$usertid!=$userid)

                                    <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">{!! $msg->name; !!} </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i>{!! $msg->date; !!}
                                                </small>
                                            </div>
                                            <p>
                                                {!! $msg->txt; !!}
                                            </p>

                                        </div>

                                    </li>
                                @else
                                    <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i>{!! $msg->date; !!}</small>
                                                <strong class="pull-right primary-font">{!! $msg->name; !!}</strong>
                                            </div>
                                            <p>
                                                {!! $msg->txt; !!}
                                            </p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>

                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                            <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
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