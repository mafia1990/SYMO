
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symo | Admin Dashboad </title>
    <!-- Core CSS - Include with every page -->
    <link href="/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/main-style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico">

    @yield("CSS")
</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="/assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                @include("layouts.menunotify")

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofile"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="/admin/settings"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>



                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->




        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">

                                @if(isset($useravatar))
                                <img src="/assets/users/{!! $useravatar  !!}" alt="">
                                @else
                                    <img src="/assets/img/user.jpg" alt="">
                                @endif
                            </div>
                            <div class="user-info">
                                <div>Admin </div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle invisible"></span>
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    @include('layouts.menuleft');


                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">
                        @if(isset($pagename))
                        {!! $pagename !!}
                            @endif
                    </h1>
                </div>
                <!--End Page Header -->
            </div>



                @yield('BODY')



        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="/assets/plugins/jquery-1.10.2.js"></script>
    <script src="/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/plugins/pace/pace.js"></script>
    <script src="/assets/scripts/symo.js"></script>
    @yield("JS")
</body>

</html>
