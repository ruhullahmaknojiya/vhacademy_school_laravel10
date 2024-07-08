@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Fees Master List : 2024-25</h1>
    <a href="{{ route('schooladmin.feecollection.feesmaster.create') }}" class="btn btn-primary">Add Fees Master</a>
    <table class="table">
        <thead>
            <tr>
                <th>Fees Group</th>
                <th>Fees Type</th>
                <th>Due Date</th>
                <th>Amount</th>
                <th>Fine Type</th>
                <th>Percentage</th>
                <th>Fix Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feesMasters as $feesMaster)
                <tr>
                    <td>{{ $feesMaster->feeGroup->name }}</td>
                    <td>{{ $feesMaster->feeType->name }}</td>
                    <td>{{ $feesMaster->due_date }}</td>
                    <td>{{ $feesMaster->amount }}</td>
                    <td>{{ $feesMaster->fine_type }}</td>
                    <td>{{ $feesMaster->percentage }}</td>
                    <td>{{ $feesMaster->fix_amount }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feesmaster.edit', $feesMaster->id) }}" class="btn btn-warning">Edit</a>
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
