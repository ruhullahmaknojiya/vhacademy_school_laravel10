@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Homeworks</h1>

    <form method="GET" action="{{ route('schooladmin.homework.index') }}">
        <div class="row">
            <div class="col-md-2">
                <select name="medium_id" class="form-control">
                    <option value="">Select Medium</option>
                    @foreach($mediums as $medium)
                        <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="standard_id" class="form-control">
                    <option value="">Select Standard</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="class_id" class="form-control">
                    <option value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="subject_id" class="form-control">
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date" class="form-control" placeholder="Select Date">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
     <br>
    <table class="table table-bordered table-striped" id="homeworkTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homeworks as $homework)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $homework->medium->medium_name }} - {{ $homework->standard->standard_name }} ( {{ $homework->class->class_name }} )</td>
                    <td>{{ $homework->teacher->first_name }} {{ $homework->teacher->last_name }}</td>
                    <td>{{ $homework->subject->subject }}</td>
                    <td>{{ $homework->date }}</td>
                    <td>{{ $homework->submition_status == 'pending' ? " - " : $homework->submition_date }} </td>
                    <td>{{ $homework->submition_status }}</td>
                    <td>
                        <a href="{{ route('schooladmin.homework.show', $homework->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('js')

    <script>
        $(function() {
            $("#homeworkTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
