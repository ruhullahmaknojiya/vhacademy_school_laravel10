@extends('layouts.school_admin')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h4>Fees Payment Details</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Fee Payment Details</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Fees Summary Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="text-white card-header bg-primary">
                        <h5>Fees Summary</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Student Name:</strong> {{ $studentPayments->first()->student_name }}</p>
                        <p><strong>Total Fees:</strong> {{ $totalFees }}</p>
                        <p><strong>Paid Fees:</strong> {{ $sumPaidAmount }}</p>
                        <p><strong>Due Amount:</strong> {{ $studentPayments->first()->due_amount }}</p>
                    </div>
                </div>
            </div>

            <!-- Fees Payment History Table -->
            <div class="col-md-8">
                <div class="card">
                    <div class="text-white card-header bg-secondary d-flex justify-content-between">
                        <h5>Fees Payment History</h5>
                        <a href="{{ route('fees-payment-history') }}" class="btn btn-warning ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Medium</th>
                                    <th>Standard</th>
                                    <th>Total Fees</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Paid Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fees_payment_histories as $history)
                                <tr>
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->student_name }}</td>
                                    <td>{{ $history->medium->medium_name }}</td>
                                    <td>{{ $history->standard->standard_name }}</td>
                                    <td>{{ $history->total_fees }}</td>
                                    <td>{{ $history->paid_amount }}</td>
                                    <td>{{ $history->due_amount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d/M/Y h:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fee Categories with Subcategories -->
        <div class="mt-4 row">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-white card-header bg-info">
                        <h5>Fee Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($categoryFeeDetails as $category)
                            <li>
                                <strong><a href="{{ route('subCategoryFee', $category['id']) }}" class="category-toggle">
                                    {{ $category['category_name'] }}
                                </a></strong> ({{ $category['total_fee'] }})
                                <br>
                                <strong>Subcategories:</strong>
                                <ul>
                                    @foreach($category['subcategories'] as $subcategory)
                                    <li>{{ $subcategory['subcategory_name'] }}: {{ $subcategory['total_amount'] }}</li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fee Payment Details Table -->
        <div class="mt-4 row">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-white card-header bg-success d-flex justify-content-between">
                        <h5>Fee Payment Details</h5>
                        <a href="{{ route('fees-payment-history') }}" class="btn btn-dark ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Standard Name</th>
                                    <th>Medium Name</th>
                                    <th>Fee Category</th>
                                    <th>Total Fees</th>
                                    <th>Due Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Paid Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentPayments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->student_name }}</td>
                                    <td>{{ $payment->standard ? $payment->standard->standard_name : 'N/A' }}</td>
                                    <td>{{ $payment->medium->medium_name }}</td>
                                    <td>{{ $payment->feeCategory->category_name }}</td>
                                    <td>{{ $payment->total_fees }}</td>
                                    <td>{{ $payment->due_amount }}</td>
                                    <td>{{ $payment->paid_amount }}</td>
                                    <td>{{ $payment->created_at->format('d-M-Y') }}</td>
                                    <td><a href="{{ route('fees-payment-view', ['id' => $payment->id]) }}" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.category-toggle').on('click', function(e) {
            e.preventDefault();
            const categoryId = $(this).data('category-id');
            // Add your AJAX logic here to dynamically load subcategories if needed
        });
    });
</script>

@endsection
