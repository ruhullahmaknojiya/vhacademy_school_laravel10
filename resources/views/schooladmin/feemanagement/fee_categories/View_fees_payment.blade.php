@extends('layouts.school_admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Fees Payment Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Fees Payment Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Fees Payment Details for {{ $payment->student_name }}</h5>
                        <a href="{{ route('fees-payment-history') }}" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td>{{ $payment->id }}</td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td>{{ $payment->student_name }}</td>
                            </tr>
                            <tr>
                                <th>Standard Name</th>
                                <td>{{ $payment->standard ? $payment->standard->standard_name : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Medium Name</th>
                                <td>{{ $payment->medium->medium_name }}</td>
                            </tr>
                            <tr>
                                <th>Fee Category</th>
                                <td>{{ $payment->feeCategory->category_name }}</td>
                            </tr>
                            <tr>
                                <th>Total Fees</th>
                                <td>{{ $payment->total_fees }}</td>
                            </tr>
                            <tr>
                                <th>Due Amount</th>
                                <td>{{ $payment->due_amount }}</td>
                            </tr>
                            <tr>
                                <th>Paid Amount</th>
                                <td>{{ $payment->paid_amount }}</td>
                            </tr>
                            <tr>
                                <th>Paid Date</th>
                                <td>{{ $payment->created_at->format('d-M-Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</section>

@endsection
