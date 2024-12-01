@extends('layouts.school_admin')
@section('title')
  Attendance for {{ $student->first_name }} {{ $student->last_name }} - {{ \Carbon\Carbon::parse($selectedMonth)->format('F Y') }}
@endsection
@section('content')
    <section class="content">
        <br>
    </section>
    <div class="content">
        <!-- Name and Month Filter Section -->
        <div class="row mb-2">
    <div class="col-md-8">
        <div class="card text-center h-100">
            <div class="card-body d-flex align-items-center justify-content-center">
                <h4 class="mb-0">{{ \Carbon\Carbon::parse($selectedMonth)->format('F Y') }} Attendance for {{ $student->first_name }} {{ $student->last_name }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4 align-self-center">
        <div class="card h-110">
            <div class="card-body d-flex align-items-center">
                <form method="GET" action="{{ route('schooladmin.attendance_report.show', ['student_id' => $student_id]) }}" class="w-100">
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="month" class="form-control" id="month" name="month" value="{{ $selectedMonth }}" onchange="this.form.submit()">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
        <!-- Summary Cards Section -->
        <div class="row">
            <!-- Total Days -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Total Days</h4>
                        <h2>{{ $totalDays }}</h2>
                    </div>
                </div>
            </div>
            <!-- Total Present -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Total Present</h4>
                        <h2>{{ $totalPresent }}</h2>
                    </div>
                </div>
            </div>
            <!-- Total Absent -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Total Absent</h4>
                        <h2>{{ $totalAbsent }}</h2>
                    </div>
                </div>
            </div>
            <!-- Total Holidays -->
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h4>Total Holidays</h4>
                        <h2>{{ $totalHolidays }}</h2> <!-- Replace $totalHolidays with the actual variable that holds the count of holidays -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Table Section -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="attendanceTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Reason</th>
                                <th>Holiday</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr 
                                    @if($attendance['status'] == 'Absent')
                                        style="background-color: red; color: white;"
                                    @elseif($attendance['status'] == 'Holiday')
                                        style="background-color: yellow; color: black;"
                                    @endif
                                >
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($attendance['attendance_date'])->format('d M Y') }}</td>
                                    <td>{{ $attendance['status'] }}</td>
                                    <td>{{ $attendance['reason'] }}</td>
                                    <td>
                                        @if($attendance['holiday'])
                                            Yes ({{ $attendance['holiday']->holiday_name }})
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('.select2').select2();

            $("#attendanceTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#attendanceTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
