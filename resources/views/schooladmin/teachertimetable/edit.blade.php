@extends('layouts.school_admin')
@section('title', 'View Timetable')
@section('content')
    @include('flash-message')

    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="form-title">
                                <span>Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</span>
                                <a href="{{ route('teacher.timetable.index') }}">
                                    <button class="btn btn-primary" style="float: right; margin-right: 10px;">Back</button>
                                </a>
                                <button onclick="printTimetable()" class="btn btn-primary" style="float: right; margin-right: 10px;">Print</button>
                            </h5>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="timetableTable">
                                    <thead>
                                        <tr>
                                            @foreach ($daysOfWeek as $day)
                                                <th>{{ $day }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($daysOfWeek as $day)
                                                <td>
                                                    @if (isset($timetables[$day]))
                                                        @foreach ($timetables[$day] as $timetable)
                                                            <div class="timetable-entry">
                                                                <strong>{{ $timetable->medium->medium_name }}</strong><br>
                                                                Std. {{ $timetable->standard->standard_name }} (Class {{ $timetable->classmodel->class_name }})<br>
                                                                Subject: {{ $timetable->subject->subject }}<br>
                                                                Time: {{ $timetable->start_time }} - {{ $timetable->end_time }}
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    @else
                                                        No classes
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printTimetable() {
            var printContents = document.getElementById('timetableTable').outerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = `
                <html>
                <head>
                    <title>Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</title>
                    <style>
                        @media print {
                            @page {
                                size: A4 landscape;
                                margin: 10mm;
                            }
                            body {
                                -webkit-print-color-adjust: exact;
                                font-size: 12px;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                font-size: 8px;
                            }
                            th, td {
                                border: 1px solid black;
                                padding: 2px;
                                text-align: left;
                            }
                            .timetable-entry {
                                font-size: 6px;
                            }
                            h1 {
                                font-size: 14px;
                                text-align: center;
                            }
                            hr {
                                margin: 2px 0;
                            }
                        }
                    </style>
                </head>
                <body>
                    <h1>Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</h1>
                    ${printContents}
                </body>
                </html>`;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload(); // Reload the page to restore the original content
        }
    </script>
@endsection

@section('scripts')
<script>
    // Hide the sidebar on this page
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.querySelector('.sidebar');
        if (sidebar) {
            sidebar.style.display = 'none';
        }
    });
</script>
@endsection

@section('styles')
<style>
    /* Make the content full screen */
    .content {
        margin-left: 0 !important;
    }
</style>
@endsection
