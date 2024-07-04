@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Schools List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>School Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Admin Name</th>
                <th>Admin Email</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
