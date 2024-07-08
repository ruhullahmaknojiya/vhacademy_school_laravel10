@extends('layouts.school_admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Select Criteria</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('schooladmin.students.index') }}">
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="keyword">Search By Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search By Student Name, Roll Number, etc.">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        {{-- <div class="row">
            <div class="card-header">
            <div class="col-md-6">
               <h3>Students List</h3>
             </div>

            <div class="col-md-6 text-right">
                <a href="{{ route('schooladmin.students.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                    <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add Student
                </a>
            </div>
            </div>
        </div> --}}
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Students Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('schooladmin.students.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add Student
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Admission No</th>
                                    <th>Student Name</th>
                                    <th>Roll No.</th>
                                    <th>Medium</th>
                                    <th>Class</th>
                                    <th>Father Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Category</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->admission_no }}</td>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->roll_number }}</td>
                                        <td>{{ $student->medium->medium_name }}</td>
                                        <td>{{ $student->standard ? $student->standard->standard_name : 'N/A'  }} ({{ $student->class->class_name }})</td>
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
    </div>
</div>
@endsection
