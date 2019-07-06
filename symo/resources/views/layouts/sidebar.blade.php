<!-- Right side column. contains the logo and sidebar -->
<aside class="main-sidebar direction">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="/favicon.ico"  with="160" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>پنل مدیریتی سایمو</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="جستجو...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">منو اصلی</li>
            <li class="active treeview">
                <a href="/">
                    <i class="fa fa-dashboard"></i> <span>داشبورد</span> <i class="fa pull-right"></i>
                </a>

            </li>
            @if(Auth::user()->type==1 || Auth::user()->type==2)
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>مدیریت</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('clothes.index')}}"><i class="fa fa-circle-o"></i> مدیریت لباس ها </a></li>
                    <li><a href="{{route('sets.index')}}"><i class="fa fa-circle-o"></i>  مدیریت ست ها</a></li>
                    <li><a href="{{route('sellers.index')}}"><i class="fa fa-circle-o"></i>  مدیریت فروشندگان</a></li>
                    <li><a href="{{route('customers.index')}}"><i class="fa fa-circle-o"></i>  مدیریت کاربران</a></li>
                    <li><a href="{{route('designers.index')}}"><i class="fa fa-circle-o"></i>  مدیریت طراحان</a></li>
                    <li><a href="{{route('shops.index')}}"><i class="fa fa-circle-o"></i>  مدیریت فروشگاها</a></li>
                    @if(Auth::user()->type==1)
                    <li><a href="{{route('operators.index')}}"><i class="fa fa-circle-o"></i>  مدیریت اپراتور ها</a></li>
                        @endif
                </ul>
            </li>
                <li class=" treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>تنظیم ویژگی های لباس</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>  مدیریت دسته بندی</a></li>
                        <li><a href="{{route('categoryproperties.index')}}"><i class="fa fa-circle-o"></i>  مدیریت مشخصه های دسته بندی</a></li>
                        <li><a href="{{route('categorypropertiesdata.index')}}"><i class="fa fa-circle-o"></i>  مدیریت داده های مشخصه</a></li>
                        <li><a href="{{route('seasons.index')}}"><i class="fa fa-circle-o"></i>  مدیریت فصول</a></li>
                        <li><a href="{{route('colors.index')}}"><i class="fa fa-circle-o"></i> مدیریت رنگ ها </a></li>
                    </ul>
                </li>
            <li class ="treeview">
                <a href="/">
                    <i class="fa fa-bar-chart-o"></i> <span>آمار و نمودار</span> <i class="fa  pull-right"></i>
                </a>

            </li>
            @endif
           @yield("LABEL")

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
