@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Add Fees Master : 2024-25</h1>
    <form action="{{ route('schooladmin.feecollection.feesmaster.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fee_group_id">Fees Group</label>
            <select class="form-control" id="fee_group_id" name="fee_group_id" required>
                <option value="">Select</option>
                @foreach ($feeGroups as $feeGroup)
                    <option value="{{ $feeGroup->id }}">{{ $feeGroup->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fee_type_id">Fees Type</label>
            <select class="form-control" id="fee_type_id" name="fee_type_id" required>
                <option value="">Select</option>
                @foreach ($feeTypes as $feeType)
                    <option value="{{ $feeType->id }}">{{ $feeType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount (₹)</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="fine_type">Fine Type</label>
            <div>
                <input type="radio" id="none" name="fine_type" value="None" checked>
                <label for="none">None</label>
                <input type="radio" id="percentage" name="fine_type" value="Percentage">
                <label for="percentage">Percentage</label>
                <input type="radio" id="fix_amount" name="fine_type" value="Fix Amount">
                <label for="fix_amount">Fix Amount</label>
            </div>
        </div>
        <div class="form-group">
            <label for="percentage">Percentage (%)</label>
            <input type="number" step="0.01" class="form-control" id="percentage" name="percentage">
        </div>
        <div class="form-group">
            <label for="fix_amount">Fix Amount ($)</label>
            <input type="number" step="0.01" class="form-control" id="fix_amount" name="fix_amount">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
