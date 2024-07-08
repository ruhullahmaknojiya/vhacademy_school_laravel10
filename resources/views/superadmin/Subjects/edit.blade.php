@extends('layouts.superadmin')
@section('title')
    Edit Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Edit Subject</h1>
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
                    <form method="post" action="{{route('update_Subject',$edit_subject->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Subject Information</span><a href="{{route('Subject')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label> Medium <span class="text-danger">*</span></label>
                                    <select type="text" name="medium_id" id="medium" class="form-control">
                                        <option>Select Medium</option>
                                        @foreach($mediums as $medium)
                                            <option value="{{ $medium->id }}" @if($medium->id == $edit_subject->medium_id) selected @endif>
                                                {{ $medium->medium_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4" id="stdshow">
                                <div class="form-group local-forms">
                                    <label>Standard<span class="text-danger">*</span></label>
                                    <select type="text" name="std_id"  class="form-control" id="standard">
                                        <option>Select Standard</option>
                                        @foreach($standars as $standar)
                                            <option value="{{$standar->id}}" @if($standar->id == $edit_subject->std_id) selected @endif>{{$standar->standard_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" value="{{$edit_subject->subject}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Code <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_code" class="form-control" value="{{$edit_subject->subject_code}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" name="description" class="form-control" value="{{$edit_subject->description}}">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Image<span class="text-danger">*</span></label>
                                    <input type="file" name="sub_image" class="form-control">
                                </div>
                                <img src="{{asset('public/storage/images/school/subject/'.$edit_subject->sub_image)}}" width="80" height="80">
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Banner<span class="text-danger">*</span></label>
                                    <input type="file" name="subject_banner" class="form-control">
                                </div>
                                <img src="{{asset('public/storage/images/school/subject/'.$edit_subject->subject_banner)}}" width="80" height="80">
                            </div> --}}
                            <div class="col-12 mt-2">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            // Function to get standards based on the selected medium
            function getStandards(mediumId, selectedStandardId) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('getstandard', '') }}/" + mediumId,
                    success: function(data) {
                        // Clear existing options
                        $('#standard').empty();

                        // Add new options based on the returned data
                        $.each(data, function(key, value) {
                            $('#standard').append('<option value="' + key + '">' + value + '</option>');
                        });

                        // Set the selected option based on the passed ID
                        $('#standard').val(selectedStandardId);
                    }
                });
            }

            // On document ready, get standards based on the selected medium
            var initialMediumId = "{{ old('medium_id', $edit_subject->medium_id) }}";
            var initialStandardId = "{{ old('std_id', $edit_subject->std_id) }}";

            // Set the selected option for the medium dropdown
            $('#medium').val(initialStandardId);

            // Call the function to get standards based on the selected medium
            getStandards(initialStandardId);

            // On change of the medium dropdown
            $('#medium').on('change', function() {
                var mediumId = $(this).val();
                getStandards(mediumId, null); // Passing null as the selectedStandardId to reset the standard dropdown
            });
        });
    </script>


@endpush
