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
                                        href="{{route('teacher.timetable.index')}}"><i class="fas fa-arrow-left"
                                                                         style="float: right;"></i></a></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>School Teachers <span class="text-danger">*</span></label>
                                    <select type="text" name="teacher_id" id="class" class="form-control">
                                        <option>Select Teacher</option>

                                        @foreach($teachers as $teacher)

                                            <option value="{{$teacher->id}}">
                                                {{$teacher->first_name}} {{$teacher->last_name}}
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
                                                {{$medium->medium_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="validation-message " id="mediumValidation"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Standard <span class="text-danger">*</span></label>
                                    <select type="text" name="std_id" id="standard" class="form-control standard ">
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
                                                {{$class->class_name}}
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
                            @php
                                // Array to store the days of the week
                                $daysOfWeek = [];

                                // Loop to get the last 7 days
                                for ($i = 0; $i < 7; $i++) {
                                    // Subtract days from the current date and get the day name
                                    $daysOfWeek[] = date('l', strtotime("-$i days"));
                                }
                            @endphp
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Day <span class="text-danger">*</span></label>
                                    <select type="text" name="day_id" id="class" class="form-control">
                                        <option>Select Day</option>
                                        @foreach ($daysOfWeek as $day)
                                            <option value="{{ $day }}">{{ $day }}</option>
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


@push('js')
    <script>
        $(document).ready(function() {
            $('#medium').on('change', function() {
                var mediumId = $(this).val();

                $.ajax({
                    url: "{{route('teacher_standard','')}}/" + mediumId,
                    type: 'GET',
                    success: function(data) {
                        $('#standard').empty().append('<option>Select Standard</option>');
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#standard').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            $('#standard').on('change', function() {
                var standardId = $(this).val();

                $.ajax({
                    url: "{{route('teacher_subjects','')}}/" + standardId,
                    type: 'GET',
                    success: function(data) {
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subject').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Trigger change event to populate standards and subjects dropdown on page load
            $('#medium').trigger('change');
            $('#standard').trigger('change');
        });
    </script>






@endpush
