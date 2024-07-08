<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Add your custom CSS here -->
    <link rel="shortcut icon" href="{{asset('/images/logo.png')}}">

     <style>
         .menu-open > .nav-treeview {
    display: block !important;
}
     </style>
     <!-- Additional AdminLTE Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/main.min.css') }}"> <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('vendor/chart.js/Chart.min.css') }}"> <!-- Chart.js -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@include('layouts.partials.datatables_css')
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
<!-- Additional AdminLTE Plugins JS -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> <!-- Chart.js -->
<script src="{{ asset('vendor/fullcalendar/main.min.js') }}"></script> <!-- FullCalendar -->

<!-- Additional JS if needed -->
@stack('js')
@include('layouts.partials.datatables_js')
</body>
</html>
