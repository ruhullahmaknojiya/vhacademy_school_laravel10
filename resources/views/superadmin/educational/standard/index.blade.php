@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Standard List</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Standard Details</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('superadmin.standard.create') }}" class="btn btn-success" style="background-color: black; color: white;">
                        <i class="fas fa-plus-circle" style="background-color: black; color: white;"></i> Add New Standard
                    </a>
                </div>
            </div>
            <form method="GET" action="{{ route('superadmin.standard.index') }}">
                <div class="form-group">
                    <label for="medium_filter">Filter by Medium:</label>
                    <select name="medium_filter" id="medium_filter" class="form-control" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($mediums as $medium)
                            <option value="{{ $medium->id }}" {{ request('medium_filter') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Medium</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($standards as $standard)
                    <tr>
                        <td>{{ $standard->id }}</td>
                        <td>{{ $standard->medium->medium_name }}</td>
                        <td>{{ $standard->standard_name }}</td>
                        <td>{{ $standard->status ? 'Active' : 'Deactive' }}</td>
                        <td class="d-flex">
                            <a href="{{ route('superadmin.standard.edit', $standard->id) }}" class="btn btn-primary btn-sm mr-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('superadmin.standard.destroy', $standard->id) }}" method="POST" style="display:inline;">
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
                {{ $standards->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
