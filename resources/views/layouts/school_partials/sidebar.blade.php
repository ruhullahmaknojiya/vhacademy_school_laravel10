<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset('images/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if (Auth::check())
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
            @else
            <div class="info">
                <a href="{{ route('login') }}" class="d-block">Login</a>
            </div>
            @endif
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i> <!-- Fees Collection Icon -->
                        <p>
                            Fees Collection
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('feemanagement.manageMasterFeeCategories') }}" class="nav-link {{ request()->routeIs('feemanagement.manageMasterFeeCategories') ? 'active' : '' }}">
                                <i class="fas fa-folder-open nav-icon"></i> <!-- Icon for Master Fee Categories -->
                                <p>Master Fee Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('showStudentsByClassWise') }}" class="nav-link {{ request()->routeIs('showStudentsByClassWise') ? 'active' : '' }}">
                                <i class="fas fa-folder-open nav-icon"></i> <!-- Icon for Master Fee Categories -->
                                <p>Fees ClassWise Records</p>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a href="" class="nav-link {{ request()->routeIs('fees-payment-history') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- Icon for Fee Assign by Class -->
                                <p>Fees Details Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('live-standardsWise-telecast-url-list') }}" class="nav-link {{ request()->routeIs('live-standardsWise-telecast-url-list') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Live broad Telecast</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manageFeeCategories') }}" class="nav-link {{ request()->routeIs('manageFeeCategories') ? 'active' : '' }}">
                                <i class="fas fa-list-alt nav-icon"></i> <!-- Icon for Fee Categories -->
                                <p>Fee Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('feemanagement.index') }}" class="nav-link {{ request()->routeIs('feemanagement.index') ? 'active' : '' }}">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- Icon for Fee Assign by Class -->
                                <p>Fee Assign by Class</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <!-- Accedmic Management Menu -->
                <li class="nav-header">ACADEMIC MANAGEMENT</li>
                <li class="nav-item">
                <li class="nav-item">
                    <a href="{{ route('schooladmin.events.index') }}" class="nav-link {{ request()->routeIs('schooladmin.events.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('schooladmin.holiday.index') }}" class="nav-link {{ request()->routeIs('schooladmin.holiday.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-umbrella-beach"></i>
                        <p>Holiday</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('schooladmin.homework.index') }}" class="nav-link {{ request()->routeIs('schooladmin.homework.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Home Work</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('schooladmin.teacher_leaves.index')}}" class="nav-link {{ request()->routeIs('schooladmin.teacher_leaves.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Teacher Leave</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('classteacherassignments.index')}}" class="nav-link {{ request()->routeIs('classteacherassignments.index') ? 'active' : '' }}">
                        <i class="fas fa-user-check nav-icon"></i>
                        <p>Assign Class Teacher</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subjectteacherassignments.index')}}" class="nav-link {{ request()->routeIs('subjectteacherassignments.index') ? 'active' : '' }}">
                        <i class="fas fa-user-check nav-icon"></i>
                        <p>Assign Subject Teacher</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('teacher.timetable.index')}}" class="nav-link {{ request()->routeIs('teacher.timetable.index') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard nav-icon"></i>
                        <p>Teacher Timetable</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-graduate nav-icon"></i>
                        <p>Promote Students</p>
                    </a>
                </li>

                </li>
                <li class="nav-header">EDUCATION MANAGEMENT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            LMS CONTENT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.medium.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.medium.index') ? 'active' : '' }}">
                                <i class="fas fa-language nav-icon"></i>
                                <p>Medium</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.standard.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.standard.index') ? 'active' : '' }}">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Standard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.class.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.class.index') ? 'active' : '' }}">
                                <i class="fas fa-door-open nav-icon"></i>
                                <p>Class</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.subject.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.subject.index') ? 'active' : '' }}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.chapter.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.chapter.index') ? 'active' : '' }}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Chapter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('schooladmin.educational.topic.index')}}" class="nav-link {{ request()->routeIs('schooladmin.educational.topic.index') ? 'active' : '' }}">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Topic</p>
                            </a>
                        </li>

                    </ul>
                <li class="nav-header">SETIINGS</li>
                <li class="nav-item">
                    <a href="{{route('schooladmin.notices.index')}}" class="nav-link {{ request()->routeIs('schooladmin.notices.index') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate nav-icon"></i>
                        <p>School Notice</p>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a href="{{route('teacher.import-form')}}" class="nav-link {{ request()->routeIs('teacher.import-form') ? 'active' : '' }}">-->
                <!--        <i class="fas fa-chalkboard-teacher nav-icon"></i>-->
                <!--        <p>Import Teacher</p>-->
                <!--    </a>-->
                <!--</li>-->
                </li>
            </ul>
        </nav>
    </div>
</aside>
