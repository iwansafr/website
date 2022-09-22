<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item  ">
        <a href="index.html" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Components</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="#"> <i class="bi bi-stack"></i> Alert</a>
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
                <a href="{{ url('/admin/user/list') }}"> <i class="bi bi-people-fill"></i> {{ __('User List') }}</a>
            </li>
        </ul>
    </li>
</ul>
