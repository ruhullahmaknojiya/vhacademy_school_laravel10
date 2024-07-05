
@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Class List</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Class Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('superadmin.class.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add New Class
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->class_name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('superadmin.class.edit', $class->id) }}" class="btn btn-primary btn-sm mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('superadmin.class.destroy', $class->id) }}" method="POST" style="display:inline;">
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
                {{ $classes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

