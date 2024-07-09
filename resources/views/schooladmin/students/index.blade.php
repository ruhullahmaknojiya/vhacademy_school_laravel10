@extends('layouts.school_admin')
@section('title')
  Students
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Students</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Students Details</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('schooladmin.students.create') }}" class="btn btn-primary" >
                            <i class="fas fa-plus-circle" ></i> Add Student
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
                                        <option value="{{ $standard->id }}">{{ $standard->name }}</option>
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
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="col-mr-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>

                        </div>
                    </div>
                    </div>
                </form>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Admission No.</th>
                                        <th>UID</th>
                                        <th>Student Name</th>
                                        <th>Roll No.</th>
                                        <th>Medium</th>
                                        <th>Class</th>
                                        <th>Father Name</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Category</th>
                                        <th>Mobile No.</th>
                                        <th>Action</th>
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
                                            <td>{{ $student->medium->medium_name }}</td>
                                            <td>{{ $student->standard ? $student->standard->standard_name : 'N/A'  }} ({{ $student->class ? $student->class->class_name : 'N/A' }})</td>
                                            <td>{{ $student->parent->father_name }}</td>
                                            <td>{{ $student->date_of_birth }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->category }}</td>
                                            <td>{{ $student->mobile_number }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('schooladmin.students.show', $student->id) }}" class="btn btn-info btn-sm mr-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-primary btn-sm mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $students->links() }}
                </div>
            </div>



@endsection
@push('js')

    <script>
        $(function() {
            $("#studentTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
