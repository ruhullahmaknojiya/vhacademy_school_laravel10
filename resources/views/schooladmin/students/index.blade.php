@extends('layouts.school_admin')
@section('title')
  Students
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
                        <h1 class="card-title">Students</h1>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('import-form') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Import Student
                        </a>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('schooladmin.students.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add Student
                        </a>
                    </div>
                </div>
                <form method="GET" action="{{ route('schooladmin.students.index') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medium">Medium</label>
                                <select class="form-control" id="medium" name="medium">
                                    <option value="">Select Medium</option>
                                    @foreach($mediums as $medium)
                                        <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
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
                                        <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
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
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
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
                    <table class="table table-bordered table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Admission No.</th>
                                <th>UID</th>
                                <th>Student Name</th>
                                <th>Roll No.</th>
                                <th>Class</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <!--<th>Category</th>-->
                                <th>Father Name</th>
                                <th>Father Mobile No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->admission_no }}</td>
                                    <td>{{ $student->uid }}</td>
                                    <td class="text-center">{{ $student->first_name }}</td>
                                    <td>{{ $student->roll_number }}</td>
                                    <td>{{ $student->medium->medium_name }} {{ $student->standard->standard_name ? $student->standard->standard_name : 'N/A' }} ({{ $student->class ? $student->class->class_name : 'N/A' }})</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <!--<td>{{ $student->category }}</td>-->
                                    <td>{{ $student->parent->father_name }}</td>
                                    <td>{{ $student->parent->father_phone }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('schooladmin.students.show', $student->id) }}" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                      
                                        <a href="{{ route('schooladmin.attendance_report.show', ['student_id' => $student->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-user-check"></i> Attendance
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
            $("#studentTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf","print"]
            }).buttons().container().appendTo('#studentTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
