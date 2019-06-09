@section('CSS')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
<div class="row">
    <!-- Welcome -->
    <div class="col-lg-12">
        <div class="alert alert-info text-right">
           <b>&nbsp;سلام ! </b>خوش آمدید <b>{!! $fields["name"]; !!} </b> <i class="fa fa-folder-open"></i>

        </div>
    </div>
    <!--end  Welcome -->
</div>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$fields['setsCount']}}</h3>

                <p>ست های مورد بررسی</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-copy-outline"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$fields['clothUnverifyCount']}}</h3>

                <p>لباس های مورد بررسی</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-done-all"></i>
            </div>
            <a href="{{route('clothes.index')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$fields['userCount']}}</h3>

                <p>تمام کاربران</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people-outline"></i>
            </div>
            <a href="" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$fields['sellersCount']}}</h3>

                <p>فروشندگان بررسی نشده</p>
            </div>
            <div class="icon">
                <i class="ion  ion-android-contacts"></i>
            </div>
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>          </div>
    </div>
    <!-- ./col -->
</div>


<div class="row">
    <div class="col-lg-8">


        <!-- table sets -->
        <div class="panel panel-primary">
            <div class="panel-heading direction">
                <i class="fa fa-bar-chart-o fa-fw"></i> جدید ترین ست ها

            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped direction">
                                <thead>
                                <tr>
                                    <th>کد</th>
                                    <th>تاریخ</th>
                                    <th>زمان</th>
                                    <th>توضیحات</th>
                                    <th>وضعیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fields['sets'] as $set)
                                    <tr>
                                        <td>{!! $set->id !!} </td>
                                        <td>{!!  explode(" " ,$set->updated_at)[0] !!}</td>
                                        <td>{!! explode(" ",$set->updated_at)[1] !!}</td>
                                        <td>{!! Str::limit( $set->comment,20,"...") !!}</td>
                                        <td class="text-center">
                                            <button onclick="delete_set({!! $set->id !!})" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                                            </button>
                                            <a href="/admin/sets/{!! $set->id !!}/edit"><button  type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
                                                </button></a>
                                            <button   type="button" class="btn {!! ($set->status=='1')?"btn-success":"btn-default"; !!} btn-circle"><i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                 @endforeach
                                @if(count($fields['sets'])==0)
                                    <tr  class="text-center"><td colspan="5" > {!! "متاسفانه هیچ ست و مدلی موجود نمی باشد"!!}</td></tr>
                                @endif
                                </tbody>

                            </table>


                        </div>

                    </div>

                </div>


                <!-- /.row -->
            </div>

            <!-- /.panel-body -->
        </div>
        <!--End  table  -->

        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">جدیدترین اعضا</h3>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($fields['CustomerCount'] as $customer)
                        <li style="padding:4px;">
                            <img src="{{ ($customer->avatar==null)?"/images/users/user.jpg":$customer->avatar}}" alt="User Image">
                            <a class="users-list-name" href="#">{{$customer->name}}</a>
                            <span class="users-list-date">{!!   App\Helpers::time_elapsed_string($customer->created_at)  !!} </span>
                        </li>

                        @endforeach
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route("customers.index")}}" class="uppercase">مشاهده تمام مشتریان</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <div class="col-md-6">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">گفتگو مستقیم</h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                            <i class="fa fa-comments"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                اوضاع خیلی خوبه
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                               بهترش کن
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                حله
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                باخس بابا
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->

                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                                        <span class="contacts-list-msg">I will be waiting for...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                                        <span class="contacts-list-msg">I'll call you back at...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                                        <span class="contacts-list-msg">Where is your new...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                                        <span class="contacts-list-msg">Can I take a look at...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Image">

                                    <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                                        <span class="contacts-list-msg">Never mind I found...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                </a>
                            </li>
                            <!-- End Contact Item -->
                        </ul>
                        <!-- /.contatcts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <form action="#" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                        </div>
                    </form>
                </div>
                <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
    </div>

    <div class="col-md-4">
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">موجودی لباس</span>
                <span class="info-box-number">{{count($fields['cloths'])}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description direction">
                    50% رشد در 30 روز
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">لایک ها</span>
                <span class="info-box-number">{{$fields['likeCount']}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
                <span class="progress-description direction">
                    0% رشد در 30 روز
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-upload-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">آپلود</span>
                <span class="info-box-number">114,381 MB</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description direction">
                    70% رشد  در  30 روز
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">نظرات</span>
                <span class="info-box-number">163</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                </div>
                <span class="progress-description">
                    40% رشد در  30 روز
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->


        <!-- /.box -->

        <!-- PRODUCT LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">لباس های به تازگی درج شده</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($fields['cloths'] as $cloth)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{  ($cloth->images->toArray()==[])?"/dist/img/default-50x50.gif":$cloth->images['path']}} " alt="Product Image">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$cloth->title}}<br>
                                @if($cloth->price==null)
                                <span class="label label-warning pull-right">عدم فیمت</span>
                                    @elseif($cloth->price!=null &&  $cloth->discount>0)
                                    <span class="label label-info pull-right direction">{{$cloth->price}}   تومان</span>
                                    @elseif($cloth->price!=null &&  $cloth->discount==0)
                                    <span class="label label-success pull-right direction">{{$cloth->price}} تومان </span>
                                    @endif
                            </a>
                            <br>
                            <span class="product-description">
                        {{Str::limit( $cloth->comment,20,"...")}}
                        </span>
                        </div>
                    </li>
                    <!-- /.item -->
                    @endforeach


                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">نمایش تمام محصولات</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>

</div>
@section('LABEL')
    @if(Auth::user()->type==1 || Auth::user()->type==2)
        <li class="header">آمار کاربران</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>   {{count($fields['CustomerCount'])}} مشتری </span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>   {{$fields['sellers']}} فروشنده</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>   {{$fields['designerCount'] }} طراح لباس</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>  {{count($fields['sets'])}} ست لباس </span></a></li>
    @endif
    @if(Auth::user()->type==1)
        <li><a href="#"><i class="fa fa-circle-o text-fuchsia"></i> <span>  {{$fields['operatorCount']}} اپراتور</span></a></li>
    @endif
@endsection
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