@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Schools List</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">School Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('school.register.form') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add School
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>School Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Admin Name</th>
                        <th>Admin Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{ $school->id }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->address }}</td>
                            <td>{{ $school->phone }}</td>
                            <td>{{ $school->user->name }}</td>
                            <td>{{ $school->user->email }}</td>
                            <td class="d-flex">
                                <a href="{{ route('schools.show', $school->id) }}" class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('schools.disable', $school->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $schools->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
