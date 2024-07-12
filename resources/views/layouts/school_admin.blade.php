<!DOCTYPE html>
<head>
    <title>@yield('title')</title>
    <!-- Include AdminLTE CSS -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"> <!-- Link to the favicon -->

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Add your custom CSS here -->
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <!-- DataTables CSS -->
    <style>
        body {
            font-family: 'Arial, sans-serif'; /* Change font family here */
            font-size: 14px; /* Change font size here */
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table .text-center {
            text-align: center;
        }
        .table .d-flex {
            display: flex;
            justify-content: center;
        }
        .table .btn {
            margin-right: 5px;
        }
        .table .btn:last-child {
            margin-right: 0;
        }
        .table .btn i {
            margin-right: 3px;
        }
        .table .btn-sm {
            padding: 5px 10px;
        }
        .table .btn-info {
            color: #fff;
        }
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
        }
        @media screen and (max-width: 768px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #ddd;
            }
            .table-responsive > .table {
                margin-bottom: 0;
            }
            .table-responsive > .table > thead > tr > th,
            .table-responsive > .table > tbody > tr > th,
            .table-responsive > .table > tfoot > tr > th,
            .table-responsive > .table > thead > tr > td,
            .table-responsive > .table > tbody > tr > td,
            .table-responsive > .table > tfoot > tr > td {
                white-space: nowrap;
            }
        }
        .menu-open > .nav-treeview {
            display: block !important;
        }
    </style>

    @include('layouts.school_partials.datatables_css')
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' rel='stylesheet' />

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
{{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> <!-- Chart.js --> --}}
 {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> --}}
<!-- Additional JS if needed -->
@include('layouts.school_partials.datatables_js')

<!-- FullCalendar JS -->
 <!-- FullCalendar JS -->
 <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js'></script>

 @stack('js')
</body>
</html>
