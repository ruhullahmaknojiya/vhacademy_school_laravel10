<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Add your custom CSS here -->
     <style>
         .menu-open > .nav-treeview {
    display: block !important;
}
     </style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Additional CSS if needed -->
    @stack('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.partials.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.partials.sidebar')
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- /.footer -->

</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script> <!-- Add your custom JS here -->

<!-- Additional JS if needed -->
@stack('js')

</body>
</html>
