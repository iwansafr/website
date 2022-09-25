<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item  ">
        <a href="{{ url('/admin') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>{{ __('Menu') }}</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{ url('admin/menu/position') }}"> <i class="bi bi-stack"></i> {{ __('Menu Position') }}</a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-person-workspace"></i>
            <span>{{ __('User') }}</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{ url('/admin/user/role') }}"> <i class="bi bi-people-fill"></i> {{ __('Role') }}</a>
            </li>
            <li class="submenu-item ">
                <a href="{{ url('/admin/user/list') }}"> <i class="bi bi-people-fill"></i> {{ __('User') }}</a>
            </li>
        </ul>
    </li>
</ul>
