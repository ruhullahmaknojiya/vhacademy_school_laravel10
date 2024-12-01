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
                        <h1 class="card-title">Student List</h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Admission No.</th>
                                <th>UID</th>
                                <th>Student Name</th>
                                <th>Roll No.</th>
                                <th>Class</th>
                                <th>View Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->admission_no }}</td>
                                    <td>{{ $student->uid }}</td>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->roll_number }}</td>
                                    <td>{{ $student->medium->medium_name ?? 'N/A' }} {{ $student->standard->standard_name ?? 'N/A' }} ({{ $student->class->class_name ?? 'N/A' }})</td>
                                    <td>
                                        <a href="{{ route('schooladmin.attendance_report.show', ['student_id' => $student->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $('.select2').select2();

            $("#studentTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#studentTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
