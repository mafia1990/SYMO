
<li>
    <a href="/"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
</li>
@if(session()->get('permission')==1)
<li>
    <a href="chart"><i class="fa fa-bar-chart-o fa-fw"></i>Charts</a>
</li>
@endif
<li>
    <a {!! Request::is('operators')?"class='active'":"" !!} href=""><i class="fa fa-table fa-fw"></i>Manage<span class="fa arrow"></span></a>

    <ul class="nav nav-second-level">
        @if(session()->get('permission')==1 || session()->get('permission')=="operator")
        <li>
            <a href="users">Manage customer</a>
        </li>

        <li>
            <a href="salers">Manage salers</a>
        </li>
        <li>
            <a href="designers">Manage designers</a>
        </li>
        <li>
            <a href="clothes">Manage clothes</a>
        </li>
        @endif
        @if(session()->get('permission')==1)
        <li>
            <a  href="operators">Manage operators</a>
        </li>
        @endif
        @if(session()->get('permission')=="designer")
        <li>
            <a href=""><i class="fa fa-table fa-fw"></i>Design<span class="fa arrow"></span></a>

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