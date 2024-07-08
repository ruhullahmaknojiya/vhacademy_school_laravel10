@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Fee Assignments</h1>
    <a href="{{ route('schooladmin.feecollection.feesassign.create') }}" class="btn btn-primary">Assign New Fees</a>
    <table class="table">
        <thead>
            <tr>
                <th>Fee Group</th>
                <th>Fee Type</th>
                <th>Medium</th>
                <th>Class</th>
                <th>Section</th>
                <th>FeeAmount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeAssignments as $feeAssignment)
                <tr>
                    <td>{{ $feeAssignment->feeGroup->name }}</td>
                    <td>{{ $feeAssignment->feesMaster->feeType->name }}</td>
                    <td>{{ $feeAssignment->medium->medium_name }}</td>
                    <td>{{ $feeAssignment->standard->standard_name }}</td>
                    <td>{{ $feeAssignment->section->class_name }}</td>
                    <td>{{ $feeAssignment->feesMaster->amount }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feesassign.edit', $feeAssignment->id) }}" class="btn btn-warning">Edit</a>
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
