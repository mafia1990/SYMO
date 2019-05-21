@if( isset($msg) && count($msg)>0)
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="top-label label label-danger">{!! count($msg) !!}</span><i class="fa fa-envelope fa-3x"></i>
    </a>
    <!-- dropdown-messages -->
    <ul class="dropdown-menu dropdown-messages">
        @foreach($msg as $message)
            <li>
                <a href="#">
                    <div>
                        <strong><span class=" label  label-warning">{!! $message['src_name'] !!}</span></strong>
                        <span class="pull-right text-muted">
                                        <em>{!! Helpers::time_elapsed_string($message['date']) !!}</em>
                                    </span>
                    </div>
                    <div>{!! $message['msg'] !!}</div>
                </a>
            </li>
            <li class="divider"></li>
        @endforeach
        <li>
            <a class="text-center" href="#">
                <strong>Read All Messages</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- end dropdown-messages -->
</li>

@endif
@if ( isset($events) && count($events)>0)

<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="top-label label label-warning">{!! count($events); !!}</span>  <i class="fa fa-bell fa-3x"></i>
    </a>
    <!-- dropdown alerts-->
    <ul class="dropdown-menu dropdown-alerts">
        @foreach($events as $evnt)
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-comment fa-fw"></i>{!! $events->msg; !!}
                        <span class="pull-right text-muted small">{!! $events->date; !!}</span>
                    </div>
                </a>
            </li>


            <li class="divider"></li>
        @endforeach




        <li>
            <a class="text-center" href="#">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- end dropdown-alerts -->
</li>
@endif
