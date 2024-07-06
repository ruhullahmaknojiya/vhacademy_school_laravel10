@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Parents</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Parent Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    {{-- <a href="{{ route('schooladmin.parents.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add Student
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $parent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $parent->father_name }}</td>
                            <td>{{ $parent->father_phone }}</td>
                            <td>{{ $parent->guardian_email }}</td>
                            <td class="d-flex">
                                <a href="{{ route('schooladmin.parents.show', $parent->id) }}" class="btn btn-info btn-sm mr-1">
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
                {{ $parents->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
