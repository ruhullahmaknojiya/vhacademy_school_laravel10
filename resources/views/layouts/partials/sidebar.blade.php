<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('superadmin/user-management*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('superadmin/user-management*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Principle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('school.register.form') }}" class="nav-link {{ request()->routeIs('school.register.form') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Registration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('school.list') }}" class="nav-link {{ request()->routeIs('school.list') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MANAGEMENT</li>
            </ul>
        </nav>
    </div>
</aside>
