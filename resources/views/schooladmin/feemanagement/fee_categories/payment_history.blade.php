@extends('layouts.school_admin')

@section('content')

<section class="content-header">
    <div class="container-fluid">



        <div class="row">

            <div class="col-12 col-sm-6 col-md-2">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">totalFees</span>
                        <span class="info-box-number">{{ $totalFees }}</span>
                    </div>
                </div>
            </div>
            @foreach ($fee_categories as $category)
            <div class="col-12 col-sm-6 col-md-2">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $category->category_name }}</span>
                        <span class="info-box-number">₹{{ number_format($category->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Fee Paid</span>
                        <!-- Display the total amount dynamically -->
                        <span class="info-box-number">{{ number_format($totalPaidAmountByCategory, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">School Fee Paid</span>
                        <span class="info-box-number">{{ $schoolFeesPaid }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">Mandal Fee Paid</span>

                        <span class="info-box-number">{{ $mandalFeesPaid }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-friends"></i></span>
                    <div class="info-box-content">

                        <span class="info-box-text">TotalDueAmount</span>
                        <span class="info-box-number">{{ $totalDueAmount }}</span>

                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">School Fee Due</span>
                        <span class="info-box-number">{{ number_format($schoolFeeDue, 2) }}</span>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-6 col-md-3">
                <div class="mb-3 info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Mandal Fee Due</span>
                        <span class="info-box-number">{{ number_format($mandalFeeDue, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('flash-message')
                <div class="mt-3 card" style="margin-top: -191px;">
                    <div class="card-header d-flex justify-content-between">
                        <h4 id="class_name">Fee Payment History</h4>
                        <a href="{{ route('fees.invoice.all') }}" class="btn btn-info ms-auto">Invoice All</a>
                    </div>

                    <div class="card-body">
                        <div class="float-end">
                            <form method="GET" action="{{ route('fees-payment-history') }}" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by Student Name or Standard" value="{{ request()->search }}" style="border-radius: 5px;">
                                    <button class="btn btn-primary" type="submit" style="border-radius: 5px;margin-left:9px;">Search</button>
                                    <a href="{{ route('fees-payment-history') }}" class="mx-2 btn btn-danger" style="border-radius: 4px;">Reset</a>
                                </div>
                            </form>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Medium Name</th>
                                    <th>ClassName</th>
                                    <th>Master Fee Categories</th>
                                    <th>Total Fees ClassWise</th>
                                    <th>Due Amount</th>
                                    <th>Paid Amount</th>

                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Fee Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($fees_payment_histories->isNotEmpty())
                                @foreach ($fees_payment_histories as $fees_payment_history)
                                <tr>

                                    <td>{{ $fees_payment_history->id }}</td>
                                    <td>{{ $fees_payment_history->student_name }}</td>
                                    <td>{{ $fees_payment_history->medium->medium_name}}</td>
                                    <td>{{ $fees_payment_history->standard ? $fees_payment_history->standard->standard_name : 'N/A' }}</td>
                                    <td>{{ $fees_payment_history->feeCategory->category_name }}</td>
                                    <td>{{ $fees_payment_history->total_fees }}</td>
                                    <td>{{ $fees_payment_history->due_amount }}</td>
                                    <td>{{ $fees_payment_history->paid_amount }}</td>

                                    <td>{{ $fees_payment_history->created_at->format('d-M-Y h:m:s') }}</td>
                                    <td>{{ $fees_payment_history->updated_at->format('d-M-Y h:m:s') }}</td>
                                    <td>
                                        <a href="{{ route('student-school-fee.details', $fees_payment_history->student_id) }}" class="btn btn-primary">Fee Details</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="11" style="text-align: center;">
                                        <span>No Records Found</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="float-end">
                            {{ $fees_payment_histories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>




@endsection


@push('js')

<script>
    function check_delete() {
        return confirm("Are You SUre Want to delete this records");
    }

</script>


@endpush
