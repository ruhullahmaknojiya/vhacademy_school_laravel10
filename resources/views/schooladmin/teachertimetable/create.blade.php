@extends('layouts.school_admin')
@section('title')
   Add Teacher Timetable
@endsection
@section('content')
@include('flash-message')
<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12">
                <h1>Add Teacher Timetable</h1>
            </div>
        </div>
    </div>
</section>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('teacher_timetable_insert')}}" enctype="multipart/form-data" id="timetableForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span> Teacher Timetable</span><a href="{{route('teacher.timetable.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Select Teacher <span class="text-danger">*</span></label>
                                        <select type="text" name="teacher_id" id="teacher" class="form-control">
                                            <option>Select Teacher</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="validation-message " id="teacherValidation"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-success" id="addRow">+ Add New</button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table" id="timetableTable">
                                        <thead>
                                            <tr>
                                                <th>Medium</th>
                                                <th>Standard</th>
                                                <th>Subject</th>
                                                <th>Day</th>
                                                <th>Time From</th>
                                                <th>Time To</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="medium_id[]" class="form-control medium-dropdown">
                                                        @foreach($mediums as $medium)
                                                            <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="standard_id[]" class="form-control standard-dropdown">
                                                        <option value="">Select Standard</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="subject_id[]" class="form-control subject-dropdown">
                                                        <option value="">Select Subject</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="day[]" class="form-control">
                                                        @php
                                                            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                                        @endphp
                                                        @foreach($daysOfWeek as $day)
                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="time" name="start_time[]" class="form-control" required></td>
                                                <td><input type="time" name="end_time[]" class="form-control" required></td>
                                                <td>
                                                    <select name="class_id[]" class="form-control">
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><button type="button" class="btn btn-danger remove-row">Delete</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        $('#addRow').on('click', function() {
            var newRow = `<tr>
                            <td>
                                <select name="medium_id[]" class="form-control medium-dropdown">
                                    @foreach($mediums as $medium)
                                        <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="standard_id[]" class="form-control standard-dropdown">
                                    <option value="">Select Standard</option>
                                </select>
                            </td>
                            <td>
                                <select name="subject_id[]" class="form-control subject-dropdown">
                                    <option value="">Select Subject</option>
                                </select>
                            </td>
                            <td>
                                <select name="day[]" class="form-control">
                                    @php
                                        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    @endphp
                                    @foreach($daysOfWeek as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="time" name="start_time[]" class="form-control" required></td>
                            <td><input type="time" name="end_time[]" class="form-control" required></td>
                            <td>
                                <select name="class_id[]" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button type="button" class="btn btn-danger remove-row">Delete</button></td>
                        </tr>`;
            $('#timetableTable tbody').append(newRow);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });

        $(document).on('change', '.medium-dropdown', function() {
            var mediumId = $(this).val();
            var $row = $(this).closest('tr');
            $.ajax({
                url: "{{route('teacher_standard','')}}/" + mediumId,
                type: 'GET',
                success: function(data) {
                    var standardDropdown = $row.find('.standard-dropdown');
                    standardDropdown.empty().append('<option>Select Standard</option>');
                    $.each(data, function(key, value) {
                        standardDropdown.append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $(document).on('change', '.standard-dropdown', function() {
            var standardId = $(this).val();
            var $row = $(this).closest('tr');
            $.ajax({
                url: "{{route('teacher_subjects','')}}/" + standardId,
                type: 'GET',
                success: function(data) {
                    var subjectDropdown = $row.find('.subject-dropdown');
                    subjectDropdown.empty().append('<option>Select Subject</option>');
                    $.each(data, function(key, value) {
                        subjectDropdown.append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Trigger change event to populate standards and subjects dropdown on page load
        $('.medium-dropdown').trigger('change');
    });
</script>
@endpush
