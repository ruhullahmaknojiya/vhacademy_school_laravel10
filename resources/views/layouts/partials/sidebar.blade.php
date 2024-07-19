<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
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
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('school.list') }}" class="nav-link {{ request()->routeIs('school.list') ? 'active' : '' }}">
                                <i class="fas fa-school nav-icon"></i>
                                <p>School List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Principle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Students</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-header">ACADEMIC MANAGEMENT</li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.events.index') }}" class="nav-link {{ request()->routeIs('superadmin.events.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Events</p>
                    </a>
                </li>

                <li class="nav-header">EDUCATIONAL MANAGEMENT ( LMS ) </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.homesubject.index') }}" class="nav-link {{ request()->routeIs('superadmin.homesubject.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Home Subject</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.medium.index') }}" class="nav-link {{ request()->routeIs('superadmin.medium.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>Medium</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.standard.index') }}" class="nav-link {{ request()->routeIs('superadmin.standard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>Standard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.class.index') }}" class="nav-link {{ request()->routeIs('superadmin.class.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subjects') }}" class="nav-link {{ request()->routeIs('Subject') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('topics') }}" class="nav-link {{ request()->routeIs('Topics') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Chapter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subtopics.index') }}" class="nav-link {{ request()->routeIs('SubTopics.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Chapter-Topic</p>
                    </a>
                </li>

                <li class="nav-header">SETIINGS</li>
                <li class="nav-item">
                    <a href="{{route('superadmin.providers.index')}}" class="nav-link {{ request()->routeIs('superadmin.providers.index') ? 'active' : '' }}">
                        <i class="fas fa-wallet"></i>
                        <p>Payment Method</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
