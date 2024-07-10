@extends('layouts.school_admin')

@section('title', 'School Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <style>
        body {
            background-color: #f4f4f9;
        }
        .stat-box, .calendar {
            background-color: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .calendar {
            margin-bottom: 15px;
        }
        .user-role {
            background-color: #ffca28;
            color: white;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-role img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .user-role span {
            font-size: 1.2em;
        }
    </style>
@stop

@section('content')
    <div class="content" style="height: 5pt"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @foreach([
                    ['bg-warning', 'fas fa-money-bill-wave', 'Monthly Fee Collection', $monthlyCollectedFee],
                    ['bg-info', 'fas fa-user-graduate', 'Students', $studentsCount],
                    ['bg-success', 'fas fa-check-circle', 'Total Boy', $totalBoys],
                    ['bg-danger', 'fas fa-exclamation-circle', 'Total Girl', $totalGirls],
                    ['bg-primary', 'fas fa-chalkboard-teacher', 'Teachers', $teachersCount],
                    ['bg-secondary', 'fas fa-user-friends', 'Parents', $parentsCount]
                ] as [$bg, $icon, $text, $number])
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon {{ $bg }} elevation-1"><i class="{{ $icon }}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $text }}</span>
                                <span class="info-box-number">{{ $number }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Calendar</h3>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    @foreach([
                        ['bg-purple', 'fas fa-book', 'Medium', $mediumCount],
                        ['bg-teal', 'fas fa-school', 'Standard', $standardCount],
                        ['bg-maroon', 'fas fa-chalkboard', 'Class', $classCount],
                        ['bg-olive', 'fas fa-book-open', 'Subject', $subjectCount],
                        ['bg-navy', 'fas fa-layer-group', 'Chapter', $chapterCount],
                        ['bg-lime', 'fas fa-list', 'Topic', $topicCount]
                    ] as [$bg, $icon, $text, $number])
                        <div class="info-box mb-2">
                            <span class="info-box-icon {{ $bg }} elevation-1"><i class="{{ $icon }}"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $text }}</span>
                                <span class="info-box-number">{{ $number }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultView: 'month',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                height: 430,
                events: [
                    {
                        title: 'Orientation Program for Class 1 to 12 Students and their Parents',
                        start: '2024-07-10T10:30:00',
                        end: '2024-07-10T12:00:00'
                    },
                    // Add more events here
                ]
            });
        });
    </script>
@endpush
