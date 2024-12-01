@extends('layouts.school_admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notices</h2>
        <a href="{{ route('schooladmin.notices.create') }}" class="btn btn-primary">Create Notice</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Teachers Seen</th>
                <th>Parents Seen</th>
                <th>Total Seen</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
              
    @foreach($notices as $notice)
    <tr>
        <td>{{ $notice->title }}</td>
        <td>{{ \Carbon\Carbon::parse($notice->date)->format('d-m-Y') }}</td>
        <td>{{ $notice->teacher_views }} Teachers</td>
        <td>{{ $notice->parent_views }} Parents</td>
        <td>{{ $notice->total_views }} Total Views</td>
        <td class="d-flex">
            <a href="{{ route('schooladmin.notices.report', $notice->id) }}" class="btn btn-info btn-sm mr-1">View Report</a>
            <form action="{{ route('schooladmin.notices.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
   @endforeach
        </tbody>
    </table>
</div>
@endsection
