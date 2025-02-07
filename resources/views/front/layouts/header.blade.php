<style>
    .logo-container {
        background-color: black;
        display: inline-block;
        padding: 10px;
        border-radius: 5px;
    }

    .logo {
        filter: invert(1);
    }






</style>
<div class="py-2 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="#" class="mr-3 small"><span class="mr-2 icon-question-circle-o"></span> Have a questions?</a>
                <a href="#" class="mr-3 small"><span class="mr-2 icon-phone2">+91</span> 884 946 9980</a>
                <a href="#" class="mr-3 small"><span class="mr-2 icon-envelope-o"></span> vhacademy@gmail.com</a>
            </div>
            <div class="text-right col-lg-3">
                @auth
                @if(Auth::user()->hasRole('SuperAdmin'))
                <a href="{{ route('superadmin.dashboard') }}" class="btn btn-success btn-sm">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
                @elseif(Auth::user()->hasRole('SchoolAdmin'))
                <a href="{{ route('schooladmin.dashboard') }}" class="btn btn-success btn-sm">
                    <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                </a>
                @endif
                @else
                <a href="{{ route('login') }}" class="mr-3 small"><span class="icon-unlock-alt"></span> Log In</a>
                <a href="{{ route('register') }}" class="px-4 py-2 small btn btn-primary rounded-0"><span class="icon-users"></span> Register</a>
                @endauth
            </div>

        </div>
    </div>
</div>


<header class="py-1 site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="index.html" class="d-block">
                    <img src="{{ asset('images/logo.png') }}" alt="Image" class="logo img-fluid" style="width: 70px; border-radius: 4px; background-color: white;">
                </a>
            </div>
            <div class="mr-auto">
                <nav class="text-right site-navigation position-relative" role="navigation">
                    <ul class="mr-auto site-menu main-menu js-clone-nav d-none d-lg-block">
                        <li class="active">
                            <a href="{{ route('front-home') }}" class="text-left nav-link">Home</a>
                        </li>
                        <li class="has-children">
                            <a href="{{ route('about-us') }}" class="text-left nav-link">About Us</a>
                            <ul class="dropdown">
                                <li><a href="teachers.html">Our Teachers</a></li>
                                <li><a href="about.html">Our School</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admission') }}" class="text-left nav-link">Admissions</a>
                        </li>
                        <li>
                            <a href="{{ route('course') }}" class="text-left nav-link">Courses</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-left nav-link">Contact</a>
                        </li>
                    </ul>
                    </ul>
                </nav>

            </div>
            <div class="ml-auto">
                <div class="social-wrap">
                    <a href="#" class="facebook" style="border-radius: 21px;"><span class="icon-facebook"></span></a>
                    <a href="#" class="twitter" style="border-radius: 21px;"><span class="icon-twitter"></span></a>
                    <a href="#" class="linkedin" style="border-radius: 21px;"><span class="icon-linkedin"></span></a>

                    <a href="#" class="text-black d-inline-block d-lg-none site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a>
                </div>
            </div>

        </div>
    </div>
</header>


