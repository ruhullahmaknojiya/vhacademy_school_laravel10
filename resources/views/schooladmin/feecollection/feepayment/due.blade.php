@extends('layouts.school_admin')

@section('content')
    @include('flash-message')
    <div class="content-header">

    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="col-mt-12">
                    <h3>Due Fee</h3>
                </div>
                <form action="{{ route('schooladmin.feecollection.feepayment.dueFees') }}" method="GET" class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="medium_id">Medium</label>
                            <select name="medium_id" id="medium_id" class="form-control">
                                <option value="">Select Medium</option>
                                @foreach($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="standard_id">Standard</label>
                            <select name="standard_id" id="standard_id" class="form-control">
                                <option value="">Select Standard</option>
                                @foreach($standards as $standard)
                                    <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="class_id">Class</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="DueTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Class</th>
                                        <th>Admission No.</th>
                                        <th>Student UID</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Amount(₹)</th>
                                        <th>Paid(₹)</th>
                                        <th>Due(₹)</th>
                                        <th>Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->medium->medium_name }} - {{ $student->standard }}  {{ $student->class }}</td>
                                        <td>{{ $student->admission_no }}</td>
                                        <td>{{ $student->uid }}</td>
                                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                        <td>{{ $student->parent->father_name }}</td>
                                        <td>{{ optional(optional($student->feeAssignment)->feesMaster)->due_date ?? 'N/A' }}</td>
                                        <td>{{ $student->feePayments->sum('amount_paid') }}</td>
                                        <td>{{ $student->feePayments->sum('discount') }}</td>
                                        <td>{{ $student->feePayments->sum('fine') }}</td>
                                        <td><a href="" class="btn btn-primary">₹ Add Fee</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    <script>
       $(document).ready(function() {
    $('#DueTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true
    });
});
    </script>
@endpush
