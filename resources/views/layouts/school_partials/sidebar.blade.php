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
                    <a href="{{ route('schooladmin.dashboard') }}" class="nav-link {{ request()->routeIs('schooladmin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ \Illuminate\Support\Facades\Request::is('SchoolAdmin/SchoolEvents*') ? 'active' : '' }}">
                    <a class="nav-link {{ \Illuminate\Support\Facades\Request::is('SchoolAdmin/SchoolEvents*') ? 'active' : '' }}" href="{{route('school_events')}}"> <i class="fas fa-calendar-day"></i> <p> Events</p></a>
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
                            <a href="{{ route('schooladmin.students.index') }}" class="nav-link {{ request()->routeIs('schooladmin.students.index') ? 'active' : '' }}">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.teachers.index') }}" class="nav-link {{ request()->routeIs('schooladmin.teachers.index') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Teachers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.parents.index') }}" class="nav-link {{ request()->routeIs('schooladmin.parents.index') ? 'active' : '' }}">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Parents</p>
                            </a>
                        </li>

                    </ul>
                </li>
               <!-- Fees Management Menu -->
                <li class="nav-header">ACCOUNT MANAGEMENT</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Fees Collection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feepayment.index')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feepayment.index') ? 'active' : '' }}">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Collect Fees</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Search Fees Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feepayment.dueFees')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feepayment.dueFees') ? 'active' : '' }}">
                                <i class="fas fa-search-minus nav-icon"></i>
                                <p>Search Due Fees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feesassign.index')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feesassign.index') ? 'active' : '' }}">
                                <i class="fas fa-university nav-icon"></i>
                                <p>Assign Fees Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feesmaster.index')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feesmaster.index') ? 'active' : '' }}">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Fees Master</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feegroup.index')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feegroup.index') ? 'active' : '' }}">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Fees Group</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('schooladmin.feecollection.feetype.index')}}" class="nav-link {{ request()->routeIs('schooladmin.feecollection.feetype.index') ? 'active' : '' }}">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>Fees Type</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-percent nav-icon"></i>
                                <p>Fees Discount</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-forward nav-icon"></i>
                                <p>Fees Carry Forward</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-bell nav-icon"></i>
                                <p>Fees Reminder</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <!-- Fees Management Menu -->
                <li class="nav-header">ACADEMIC MANAGEMENT</li>
                <li class="nav-item">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-calendar-alt nav-icon"></i>
                            <p>Class Timetable</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-chalkboard nav-icon"></i>
                            <p>Teacher Timetable</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-user-check nav-icon"></i>
                            <p>Assign Class Teacher</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-arrow-up nav-icon"></i>
                            <p>Promote Students</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-language nav-icon"></i>
                            <p>Medium</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-layer-group nav-icon"></i>
                            <p>Standard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-door-open nav-icon"></i>
                            <p>Class</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <p>Subject</p>
                        </a>
                    </li>
                </li>
            </ul>
        </nav>
    </div>
</aside>