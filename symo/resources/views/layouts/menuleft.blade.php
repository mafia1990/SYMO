
<li>
    <a href="/"><i class="fa fa-dashboard fa-fw"></i>داشبورد</a>
</li>
@if(session()->get('permission')==1)
<li>
    <a href="chart"><i class="fa fa-bar-chart-o fa-fw"></i>جداول آنالیز</a>
</li>
@endif
<li>
    <a {!! Request::is('operators')?"class='active'":"" !!} href=""><i class="fa fa-table fa-fw"></i>مدیریت<span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
        @if(Auth::user()->type==1 || Auth::user()->type==2)
        <li>
            <a href="/admin/customers">مدیریت مشتری</a>
        </li>

        <li>
            <a href="salers">مدیریت فروشنده</a>
        </li>
        <li>
            <a href="designers">مدیریت طراح</a>
        </li>
        <li>
            <a href="/admin/clothes">مدیریت لباس ها</a>
        </li>
        <li>
            <a href="/admin/sets">مدیریت ست ها</a>
        </li>
        @endif
        @if(session()->get('permission')==1)
        <li>
            <a  href="operators">مدیریت اپراتور</a>
        </li>
        @endif
        @if(session()->get('permission')=="designer")
        <li>
            <a href=""><i class="fa fa-table fa-fw"></i>طراحی<span class="fa arrow"></span></a>

            <ul class="nav nav-second-level">
                <li>
                    <a href="addnewset">add Set of clothes</a>
                </li>
                <li>
                    <a href="sets">Manage your sets</a>
                </li>
            </ul>
        </li>

        @endif

    </ul>
</li>
@if(session()->get('permission')=="designer")
    <li >
    <a href="checkdesigners"><i class="fa fa-pencil-square-o fa-fw"></i>Check Designers</a>
    </li>>
@endif