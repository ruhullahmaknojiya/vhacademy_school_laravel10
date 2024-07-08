@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Fees Group List</h1>
    <a href="{{ route('schooladmin.feecollection.feegroup.create') }}" class="btn btn-primary">Add Fee Group</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Fees Code</th>
                <th>Description</th>
                <th>Fee Types</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeGroups as $feeGroup)
                <tr>
                    <td>{{ $feeGroup->name }}</td>
                    <td>{{ $feeGroup->fees_code }}</td>
                    <td>{{ $feeGroup->description }}</td>
                    <td>
                        @foreach ($feeGroup->feeTypes as $feeType)
                            <span class="badge badge-info">{{ $feeType->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feegroup.edit', $feeGroup->id) }}" class="btn btn-warning">Edit</a>
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
