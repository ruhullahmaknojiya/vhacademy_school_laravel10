@extends('layouts.school_admin')
@section('title')
  Attendance Report
@endsection
@section('content')
    @include('flash-message')
    <section class="content">
        <br>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="card-title">Attendance Report</h1>
                    </div>
                </div>
                <form method="GET" action="{{ route('schooladmin.attendance_report.index') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medium">Medium</label>
                                <select class="form-control" id="medium" name="medium">
                                    <option value="">Select Medium</option>
                                    @foreach($mediums as $medium)
                                        <option value="{{ $medium->id }}" {{ request('medium') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="standard">Standard</label>
                                <select class="form-control" id="standard" name="standard">
                                    <option value="">Select Standard</option>
                                    @foreach($standards as $standard)
                                        <option value="{{ $standard->id }}" {{ request('standard') == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select class="form-control" id="class" name="class">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ request('class') == $class->id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">
                            </div>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="attendanceTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Admission No.</th>
                                <th>UID</th>
                                <th>Student Name</th>
                                <th>Roll No.</th>
                                <th>Class</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->student->admission_no }}</td>
                                    <td>{{ $attendance->student->uid }}</td>
                                    <td class="text-center">{{ $attendance->student->first_name }}</td>
                                    <td>{{ $attendance->student->roll_number }}</td>
                                    <td>{{ $attendance->student->medium->medium_name }} {{ $attendance->student->standard->standard_name ?? 'N/A' }} ({{ $attendance->student->class->class_name ?? 'N/A' }})</td>
                                    <td>{{ $attendance->attendance_date }}</td>
                                    <td>
                                        @if($attendance->holiday_id)
                                        {{ Holiday }}
                                        @else
                                        {{ $attendance->status }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($attendance->holiday_id)
                                            Yes ({{ $attendance->holiday->holiday_name }})
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $attendances->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $("#attendanceTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#attendanceTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
