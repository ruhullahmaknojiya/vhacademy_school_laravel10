@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Student List</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Student Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('students.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add Student
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roll ID</th>
                        <th>Admission Number</th>
                        <th>Admission Date</th>
                        <th>Birthday</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->fullName }}</td>
                            <td>{{ $student->studentRollId }}</td>
                            <td>{{ $student->admission_number }}</td>
                            <td>{{ $student->admission_date }}</td>
                            <td>{{ $student->birthday }}</td>
                            <td class="d-flex">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
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
