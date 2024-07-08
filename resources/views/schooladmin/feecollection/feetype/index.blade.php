@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Fees Type List</h1>
    <a href="{{ route('schooladmin.feecollection.feetype.create') }}" class="btn btn-primary">Add Fee Type</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Fees Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeTypes as $feeType)
                <tr>
                    <td>{{ $feeType->name }}</td>
                    <td>{{ $feeType->fees_code }}</td>
                    <td>{{ $feeType->description }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feetype.edit', $feeType->id) }}" class="btn btn-warning">Edit</a>
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
