@extends('layouts.school_admin')

@section('content')

<section class="content">
    <div class="mt-3 container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4 card">
                    <div class="card-body">
                        <div class="mt-1 tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p><i class="fas fa-calendar-alt"></i> <strong>Student Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-calendar-day"></i> <strong>Roll Number:</strong> {{ $student->roll_number }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-list-alt"></i> <strong>Standard Name:</strong> {{ $student->standard->standard_name }}

                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-mobile-alt"></i> <strong>Medium Name:</strong> {{ $student->medium->medium_name }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <p><i class="fas fa-mobile-alt"></i> <strong>Fee Category Name:</strong>
                                            {{ $studentPayments->first()->feeCategory->category_name ?? 'N/A' }}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-envelope"></i> <strong>Total Fees:</strong> {{ $totalFees }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-notes-medical"></i> <strong>Paid Amount:</strong> {{ $sumPaidAmount }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <p><i class="fas fa-notes-medical"></i> <strong>Due Amount:</strong> {{ $totalFees - $sumPaidAmount }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Fees</span>

                        <span class="info-box-number">{{ number_format($totalFees, 2) }}</span>
                    </div>
                </div>
            </div>
            @foreach ($fee_categories as $category)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">{{ $category->category_name }}</span>
                        <span class="info-box-number">₹{{ number_format($category->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($fee_categories as $category)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $category->category_name }} Paid</span>
                        <span class="info-box-number">
                            ₹{{ $feesCategoryStudentWise[$category->master_category_id] ?? '0.00' }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($categoryFeeDueDetails as $category)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $category['category_name'] }} Due</span>
                        <span class="info-box-number text-danger">Due: ₹{{ number_format($category['due_amount'], 2) }}</span>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-12 col-sm-12 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Paid Fees</span>
                        <span class="info-box-number">{{ number_format($sumPaidAmount, 2) }}</span>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-4">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text text-danger">Due Fees</span>
                        <span class="info-box-number">{{ $totalFees - $sumPaidAmount }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-white card-header bg-secondary d-flex justify-content-between">
                        <h5>Fees Payment History</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Medium</th>
                                    <th>Standard</th>
                                    <th>Roll Number</th>
                                    <th>Fee Categories</th>
                                    <th>Total Fees</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Paid Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($student_fees_payment_histories->isNotEmpty())
                                @foreach ($student_fees_payment_histories as $history)
                                <tr>
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->student_name }}</td>
                                    <td>{{ $history->medium->medium_name }}</td>
                                    <td>{{ $history->standard->standard_name }}</td>
                                    <td>{{ $history->roll_number}}</td>
                                    <td>{{ $history->FeeCategory->category_name}}</td>
                                    <td>{{ $history->total_fees }}</td>
                                    <td>{{ $history->paid_amount }}</td>
                                    <td>{{ $history->due_amount }}</td>
                                    <td>
                                        @if($history->paid_amount)
                                        <span class="badge bg-success">
                                            Paid
                                        </span>
                                        @else
                                        <span class="badge bg-danger">
                                            un-paid
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{ $history->created_at->setTimezone('Asia/KolKata')->format('d/m/Y h:i:s A') }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="11" style="text-align: center;">
                                        <h5 class="fs-bold text-danger">Fees payment Records not found</h5>
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
