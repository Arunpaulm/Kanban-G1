<div class="sidebar">
    @include('layout.user-info')
    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            @canany(['role-list', 'assign-role-permission'])
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Role Management<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Roles</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Permissions</p></a>
                        </li>
                    </ul>
                </li>
            @endcanany

            @can('user-list')
            <li class="nav-item">
                <a href="{{ route('user') }}" class="nav-link"><i class="far fa-user"></i> &nbsp;&nbsp;&nbsp;<p>Users</p></a>
            </li>
            @endcan

            <li class="nav-item">
                <a href="{{ route('project.index') }}" class="nav-link"><i class="far fa-user"></i> &nbsp;&nbsp;&nbsp;<p>Projects</p></a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.merchant') }}" class="nav-link"><i class="fa fa-briefcase"></i> &nbsp;&nbsp;&nbsp;<p>Merchants</p></a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.transactions') }}" class="nav-link"><i class="fas fa-money-check"></i> &nbsp;&nbsp;<p>Transactions</p></a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link"><i class="fas fa-tools"></i> &nbsp;&nbsp;<p>System Settings <i class="right fas fa-angle-left"></i></p></a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.settings') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>General Settings</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.banners') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Banner Settings</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.merchant-settings') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Merchant Settings</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>SMS Settings</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.banks') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Bank List</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.cards') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Card List</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.currency') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Currencies</p></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link"><i class="fas fa-tools"></i> &nbsp;&nbsp;<p>Terms & Policy <i class="right fas fa-angle-left"></i></p></a>--}}
{{--                <ul class="nav nav-treeview">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.privacy-policy') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Privacy Policy</p></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{ route('admin.terms-condition') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Terms & Condition</p></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('admin.faq') }}" class="nav-link"><i class="fas fa-question"></i> &nbsp;&nbsp;&nbsp;<p>FAQ</p></a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link"><i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;&nbsp;<p>Log Viewer</p></a>--}}
{{--            </li>--}}
        </ul>
    </nav>
</div>
