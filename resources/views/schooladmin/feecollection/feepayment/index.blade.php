@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Fee Payments</h1>
    <form method="GET" action="{{ route('schooladmin.feecollection.feepayment.index') }}">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="medium_id">Medium</label>
                <select id="medium_id" name="medium_id" class="form-control">
                    <option value="">Select Medium</option>
                    @foreach($mediums as $medium)
                        <option value="{{ $medium->id }}" {{ request('medium_id') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="standard_id">Standard</label>
                <select id="standard_id" name="standard_id" class="form-control">
                    <option value="">Select Standard</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}" {{ request('standard_id') == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="section_id">Section</label>
                <select id="section_id" name="section_id" class="form-control">
                    <option value="">Select Section</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}" {{ request('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="fee_group_id">Fee Group</label>
                <select id="fee_group_id" name="fee_group_id" class="form-control">
                    <option value="">Select Fee Group</option>
                    @foreach($feeGroups as $feeGroup)
                        <option value="{{ $feeGroup->id }}" {{ request('fee_group_id') == $feeGroup->id ? 'selected' : '' }}>{{ $feeGroup->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="fees_master_id">Fee Master</label>
                <select id="fees_master_id" name="fees_master_id" class="form-control">
                    <option value="">Select Fee Master</option>
                    @foreach($feesMasters as $feesMaster)
                        <option value="{{ $feesMaster->id }}" {{ request('fees_master_id') == $feesMaster->id ? 'selected' : '' }}>{{ $feesMaster->feeType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Class</th>
                <th>Admition number</th>
                <th>Student</th>
                <th>Fee Assignment</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feePayments as $feePayment)
                <tr>
                    <td>LKG ({{ $feePayment->student->medium->medium_name }}) {{ $feePayment->student->class->class_name }}</td>
                    <td>{{ $feePayment->student->admission_no }}</td>
                    <td>{{ $feePayment->student->first_name }} {{ $feePayment->student->last_name }}</td>
                    <td>{{ $feePayment->feeAssignment->feesMaster->feeType->name }}</td>
                    <td>{{ $feePayment->amount_paid }}</td>
                    <td>{{ $feePayment->payment_date }}</td>
                    <td>{{ $feePayment->status }}</td>
                    <td>
                        <a href="{{ route('schooladmin.feecollection.feepayment.edit', $feePayment->id) }}" class="btn btn-warning">Edit</a>
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
