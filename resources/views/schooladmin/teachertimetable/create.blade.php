@extends('layouts.school_admin')
@section('title')
   Add Teacher TimeTable
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Add Teacher TimeTable</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{route('teacher_timetable_insert')}}" enctype="multipart/form-data" id="subtopicForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span> Teacher TimeTable</span><a
                                        href="{{route('teacher_timetable_index')}}"><i class="fas fa-arrow-left"
                                                                         style="float: right;"></i></a></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>School Teachers <span class="text-danger">*</span></label>
                                    <select type="text" name="teacher_id" id="class" class="form-control">
                                        <option>Select Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">
                                                {{$teacher->user->first_name}} {{$teacher->user->last_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="validation-message " id="mediumValidation"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>School Medium <span class="text-danger">*</span></label>
                                    <select type="text" name="medium_id" id="medium" class="form-control medium">
                                        <option>Select Medium</option>
                                        @foreach($mediums as $medium)
                                            <option value="{{$medium->id}}">
                                                {{$medium->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="validation-message " id="mediumValidation"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Standard <span class="text-danger">*</span></label>
                                    <select type="text" name="std_id" id="standard" class="form-control standard  ">
                                        <option>Select Standard</option>

                                    </select>
                                    <span class="validation-message " id="standardValidation"></span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>School Class <span class="text-danger">*</span></label>
                                    <select type="text" name="class_id" id="class" class="form-control">
                                        <option>Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{$class->id}}">
                                                {{$class->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="validation-message " id="mediumValidation"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <select type="text" name="subject_id" id="subject" class="form-control subject">
                                        <option>Select Subject</option>

                                    </select>
                                    <span class="validation-message " id="subjectValidation"></span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Day <span class="text-danger">*</span></label>
                                    <select type="text" name="day_id" id="class" class="form-control">
                                        <option>Select Day</option>
                                        @foreach($days as $day)
                                            <option value="{{$day->id}}">
                                                {{$day->day_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="validation-message " id="mediumValidation"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" id="date" class="form-control">
                                    @error('date')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Start Time<span class="text-danger">*</span></label>
                                    <input type="time" name="start_time" id="Time" class="form-control">
                                    @error('start_time')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>End Time<span class="text-danger">*</span></label>
                                    <input type="time" name="end_time" id="Time" class="form-control">
                                    @error('end_time')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>









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
    </div>
@endsection


@push('scripts')


    <script>
        $(document).ready(function () {
            $('.medium').on('change', function () {
                var mediumId = $(this).val();

                $.ajax({
                    url: "{{route('get_standards','')}}/" + mediumId,
                    type: 'GET',
                    success: function (data) {
                        $('.standard').empty().append('<option>Select Standard</option>');
                        $('.subject').empty().append('<option>Select Subject</option>');
                        $('.topics').empty().append('<option>Select Topic</option>');

                        $.each(data, function (key, value) {
                            $('.standard').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            $('.standard').on('change', function () {
                var standardId = $(this).val();

                $.ajax({
                    url: "{{route('get_subjects','')}}/" + standardId,
                    type: 'GET',
                    success: function (data) {
                        $('.subject').empty().append('<option>Select Subject</option>');
                        $('.topics').empty().append('<option>Select Topic</option>');

                        $.each(data, function (key, value) {
                            $('.subject').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            $('.subject').on('change', function () {
                var subjectId = $(this).val();

                $.ajax({
                    url: "{{route('get_topics','')}}/" + subjectId,
                    type: 'GET',
                    success: function (data) {
                        $('.topics').empty().append('<option>Select Topic</option>');

                        $.each(data, function (key, value) {
                            $('.topics').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

        });
    </script>


<script>
    $(document).ready(function() {
    $('#submitBtn').click(function(event) {
        event.preventDefault(); // Prevent form submission to handle validation first

        // Reset previous error messages
        $('.error-message').remove();
        $('select, input').removeClass('is-invalid');

        // Flag to check if validation passes
        var isValid = true;

        // Validation for each required field
        $('select[name="teacher_id"], select[name="medium_id"], select[name="std_id"], select[name="class_id"], select[name="subject_id"], select[name="day_id"], input[name="date"], input[name="start_time"], input[name="end_time"]')
            .each(function() {
                if ($(this).val() === '' || $(this).val() === 'Select Teacher' || $(this).val() === 'Select Medium' || $(this).val() === 'Select Standard' || $(this).val() === 'Select Class' || $(this).val() === 'Select Subject' || $(this).val() === 'Select Day') {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    $(this).after('<span class="error-message text-danger">This field is required</span>');
                }
            });

        if (isValid) {
            $('#subtopicForm').submit(); // Submit the form if validation passes
        }
    });
});

    </script>


@endpush
