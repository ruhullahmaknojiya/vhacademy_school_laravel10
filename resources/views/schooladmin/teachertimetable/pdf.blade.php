<!DOCTYPE html>
<html>
<head>
    <title>Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</h1>
    <table class="table table-bordered">
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
</body>
</html>
