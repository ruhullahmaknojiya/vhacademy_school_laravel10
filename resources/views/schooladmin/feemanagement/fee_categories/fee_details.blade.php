@extends('layouts.school_admin')

@section('content')


<section class="content-header">

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Fee Payment Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fee Payment Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if($studentPayments->isNotEmpty())
                @foreach($studentPayments as $payment)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Fee Payment Details</h4>
                            <a href="{{ route('fees-payment-history') }}" class="ms-auto btn btn-warning">Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Student Name</th>
                                        <th>Standard Name</th>
                                        <th>Medium Name</th>
                                        <th>Fee Category</th>
                                        <th>Total Fees</th>
                                        <th>Due Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Paid Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->student_name }}</td>
                                        <td>{{ $payment->standard ? $payment->standard->standard_name : 'N/A' }}</td>
                                        {{-- <td>{{ $payment->medium->medium_name }}</td> --}}
                                        <td>{{ $payment->feeCategory->category_name }}</td>
                                        <td>{{ $payment->total_fees }}</td>
                                        <td>{{ $payment->due_amount }}</td>
                                        <td>{{ $payment->paid_amount }}</td>
                                        <td>{{ $payment->created_at->format('d-M-Y h:m:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- End of card -->
                @endforeach
                @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Fee Payment Details</h4>
                            <a href="{{ route('fees-payment-history') }}" class="ms-auto btn btn-warning">Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Student Name</th>
                                        <th>Standard Name</th>
                                        <th>Fee Category</th>
                                        <th>Total Fees</th>
                                        <th>Due Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Paid Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">
                                            No Payment Fees Records Found
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>





    @endsection
