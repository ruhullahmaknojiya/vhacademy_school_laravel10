@extends('layouts.school_admin')

@section('content')

<section class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Academic info</a>
                            </li>

                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><i class="fas fa-calendar-alt"></i> <strong>Student Name:</strong> {{ $studentPayments->first()->student_name }}</p>
                                        <p><i class="fas fa-calendar-day"></i> <strong>Roll Number:</strong> {{ $studentPayments->first()->roll_number }}</p>
                                        <p><i class="fas fa-list-alt"></i> <strong>Standard Name:</strong> {{ $studentPayments->first()->standard->standard_name }}</p>
                                        <p><i class="fas fa-mobile-alt"></i> <strong>Medium Name:</strong> {{ $studentPayments->first()->medium->medium_name }}</p>
                                        <p><i class="fas fa-mobile-alt"></i> <strong>Fee Category Name:</strong> {{ $studentPayments->first()->feeCategory->category_name }}</p>
                                        <p><i class="fas fa-envelope"></i> <strong>Total Fees :</strong>{{ $totalFees }}</p>
                                        <p><i class="fas fa-notes-medical"></i> <strong>Paid AMount:</strong>{{$sumPaidAmount}}</p>
                                        <p><i class="fas fa-notes-medical"></i> <strong>Due AMount:</strong>{{ $studentPayments->first()->due_amount }}</p>
                                    </div>

                                </div>

                            </div>

                            <!-- Academic Info Tab -->
                            <div class="tab-pane fade" id="academic-info" role="tabpanel" aria-labelledby="academic-info-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Current Class</h5>
                                                                                    <p><i class="fas fa-chalkboard"></i>  English Medium - NURSERY (A)</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Parent/Guardian Info Tab -->
                            <div class="tab-pane fade" id="parent-info" role="tabpanel" aria-labelledby="parent-info-tab">

                                <p><i class="fas fa-user-tie"></i> <strong>Father Name:</strong> CHANDRAKANT</p>
                                <p><i class="fas fa-phone-alt"></i> <strong>Father Phone:</strong> 9033907466</p>
                                <p><i class="fas fa-user-tie"></i> <strong>Mother Name:</strong> HEENA </p>
                                <p><i class="fas fa-phone-alt"></i> <strong>Mother Phone:</strong> 7016568547</p>
                                <p><i class="fas fa-user-tie"></i> <strong>Guardian Name:</strong> </p>
                                <p><i class="fas fa-user-shield"></i> <strong>Guardian Relation:</strong> </p>
                                <p><i class="fas fa-envelope"></i> <strong>Guardian Email:</strong> DIYA123@GMAIL.COM</p>
                                <p><i class="fas fa-phone-alt"></i> <strong>Guardian Phone:</strong> </p>
                                <p><i class="fas fa-briefcase"></i> <strong>Guardian Occupation:</strong> </p>
                                <p><i class="fas fa-map-marker-alt"></i> <strong>Guardian Address:</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Fees Summary Card -->
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="text-white card-header bg-primary">
                        <h5>{{ $studentPayments->first()->student_name }} Fee Details : </h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Student Name:</strong> {{ $studentPayments->first()->student_name }}</p>
                        <p><strong>Class Name:</strong> {{ $studentPayments->first()->standard->standard_name }}</p>
                        <p><strong>Medium Name:</strong> {{ $studentPayments->first()->medium->medium_name }}</p>
                        <p><strong>Roll Number:</strong> {{ $studentPayments->first()->roll_number}}</p>
                        <p><strong>Fee Category:</strong> {{ $studentPayments->first()->feeCategory->category_name}}</p>
                        {{-- <p><strong>Fees Category:</strong></p>
                        {{-- {{ $studentPayments->first()->feeCategory->category_name}} --}}
                        {{-- <ul> --}}
                        {{-- @foreach ($studentPayments->unique('fee_category_id') as $payment)
                            <li>{{ $payment->feeCategory->category_name }}</li>
                        @endforeach --}}
                        {{-- </ul> --}}
                        <p><strong>Total Fees:</strong> ₹{{ $totalFees }}</p>
                        <p><strong>Paid Fees:</strong> ₹ {{ $sumPaidAmount }}</p>

                        <p><strong>Due Amount:</strong> ₹ {{ $studentPayments->first()->due_amount }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Fees</span>

                            <span class="info-box-number">{{ number_format($totalFees, 2) }}</span>
                        </div>
                    </div>
                </div>
                @foreach ($fee_categories as $category)
                <div class="col-12 col-sm-6 col-md-3">
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
                <div class="col-12 col-sm-6 col-md-3">
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
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ $category['category_name'] }} Due</span>
                            <span class="info-box-number text-danger">Due: ₹{{ number_format($category['due_amount'], 2) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Paid Fees</span>
                            <span class="info-box-number">{{ number_format($sumPaidAmount, 2) }}</span>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-12 col-md-3">
                    <div class="mb-3 info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Due Fees</span>
                            <span class="info-box-number">{{ $studentPayments->first()->due_amount }}</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="text-white card-header bg-secondary d-flex justify-content-between">
                        <h5>Fees Payment History</h5>
                        <a href="{{ route('student-school-fee.details',$studentPayments->first()->student_id) }}" class="btn btn-warning ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive">
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
                                    <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d/M/Y h:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        {{-- <!-- Fee Categories with Subcategories -->
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
        </a></strong> ₹({{ $category['total_fee'] }})
        <br>
        <strong>Subcategories:</strong>
        <ul>
            @foreach($category['subcategories'] as $subcategory)
            <li>{{ $subcategory['subcategory_name'] }}: ₹{{ $subcategory['total_amount'] }}</li>
            @endforeach
        </ul>
        </li>
        @endforeach
        </ul>
    </div>
    </div>
    </div>
    </div> --}}

    <!-- Fee Payment Details Table -->
    {{-- <div class="mt-4 row">
        <div class="col-md-12">
            <div class="card">
                <div class="text-white card-header bg-success d-flex justify-content-between">
                    <h5>Due Fee Amount Details : {{ $studentPayments->first()->due_amount }}</h5>
                    <a href="{{ route('student-school-fee.details',$studentPayments->first()->student_id) }}" class="btn btn-warning ms-auto">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Standard Name</th>
                                <th>Medium Name</th>
                                <th>Roll Number</th>
                                <th>Fee Category</th>
                                <th>Total Fees</th>
                                <th>Due Amount</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>{{ $dueAmountsFee->student_id }}</td>
                                <td>{{ $dueAmountsFee->student_name }}</td>
                                <td>{{ $dueAmountsFee->standard ? $dueAmountsFee->standard->standard_name : 'N/A' }}</td>
                                <td>{{ $dueAmountsFee->medium->medium_name }}</td>
                                <td>{{ $dueAmountsFee->roll_number }}</td>
                                <td>{{ $dueAmountsFee->feeCategory->category_name }}</td>
                                <td>{{ $dueAmountsFee->total_fees }}</td>
                                <td>{{ $studentPayments->first()->due_amount }}</td>
                                <td>{{ $studentPayments->first()->paid_amount  }}</td>
                                <td>{{ $dueAmountsFee->created_at->format('d-M-Y') }}</td>
                                <td><a href="{{ route('fees-payment-view', $dueAmountsFee->student_id) }}" class="btn btn-primary btn-sm">View</a></td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div> --}}
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
