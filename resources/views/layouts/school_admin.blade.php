<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Add your custom CSS here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">

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
    @include('layouts.school_partials.datatables_css')
    <!-- Additional CSS if needed -->
    @stack('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.school_partials.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.school_partials.sidebar')
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.school_partials.footer')
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

<!-- Additional JS if needed -->
@stack('js')
@include('layouts.school_partials.datatables_js')

</body>
</html>
