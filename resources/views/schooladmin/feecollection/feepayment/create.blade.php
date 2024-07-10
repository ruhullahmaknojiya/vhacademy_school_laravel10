@extends('layouts.school_admin')
@section('title')
    Payment Create
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
    <form action="{{ route('schooladmin.feecollection.feepayment.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="form-title"><b>Payment Information</b></h5>
            </div>
        <div class="form-group col-md-6">
            <label for="student_id">Student</label>
            <select class="form-control" id="student_id" name="student_id" required>
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name }}.{{$student->last_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="fee_assignment_id">Fee Assignment</label>
            <select class="form-control" id="fee_assignment_id" name="fee_assignment_id" required>
                <option value="">Select Fee Assignment</option>
                @foreach ($feeAssignments as $feeAssignment)
                    <option value="{{ $feeAssignment->id }}">{{ $feeAssignment->feesMaster->feeType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="amount_paid">Amount Paid ($)</label>
            <input type="number" step="0.01" class="form-control" id="amount_paid" name="amount_paid" required>
        </div>
        <div class="form-group col-md-6">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>
        <div class="form-group col-md-6">
            <label for="payment_type">Payment Type</label>
            <select class="form-control" id="payment_type" name="payment_type" required>
                <option value="">Select Payment Type</option>
                <option value="online">Online</option>
                <option value="bank">Bank</option>
                <option value="check">Check</option>
                <option value="cash">Cash</option>

            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="payment_mode">Payment Mode</label>
            <select class="form-control" id="payment_mode" name="payment_mode" required>
                <option value="">Select Payment Mode</option>
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
                <option value="net_banking">Net Banking</option>
                <option value="upi">UPI</option>
                <option value="cash">Cash</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="transaction_id">Transaction ID</label>
            <input type="text" class="form-control" id="transaction_id" name="transaction_id">
        </div>
        <div class="form-group col-md-6">
            <label for="bank_payment_id">Bank Payment ID</label>
            <input type="text" class="form-control" id="bank_payment_id" name="bank_payment_id">
        </div>
        <div class="form-group col-md-6">
            <label for="check_number">Check Number</label>
            <input type="text" class="form-control" id="check_number" name="check_number">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Record Payment</button>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
