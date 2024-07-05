@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h2 class="mb-4">School Details</h2>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $school->name }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>School Name</th>
                    <td>{{ $school->name }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $school->address }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $school->phone }}</td>
                </tr>
                <tr>
                    <th>Admin Name</th>
                    <td>{{ $school->user->name }}</td>
                </tr>
                <tr>
                    <th>Admin Email</th>
                    <td>{{ $school->user->email }}</td>
                </tr>
            </table>
            <a href="{{ route('school.list') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
