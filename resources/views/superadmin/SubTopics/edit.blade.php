@extends('layouts.superadmin')
@section('title')
Video
@endsection
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Video</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Video</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('update_subtopics',$edit_subtopics->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-12">
                                    <h5 class="mb-3 form-title"><span>Topics Information</span><a href="{{route('get_subtopics',$edit_subtopics->id)}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Medium <span class="login-danger">*</span></label>
                                        <select name="medium_id" id="medium" class="form-control medium">
                                            <option>Select Medium</option>
                                            @foreach($mediums as $medium)
                                            <option value="{{ $medium->id }}" {{ $edit_subtopics->medium_id == $medium->id ? 'selected' : '' }}>
                                                {{ $medium->medium_name }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Standard <span class="login-danger">*</span></label>
                                        <select name="standard_id" id="standard" class="form-control standard">
                                            <option>Select Standard</option>
                                            @foreach($standards as $standard)
                                            <option value="{{ $standard->id }}" {{ $edit_subtopics->standard_id == $standard->id ? 'selected' : '' }}>
                                                {{ $standard->standard_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Subject <span class="login-danger">*</span></label>
                                        <select name="subject_id" id="subject_id" class="form-control subject">
                                            <option>Select Subject</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ $edit_subtopics->subject_id == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->subject }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Unit <span class="login-danger">*</span></label>
                                        <select type="text" name="topic_id" id="topics" class="form-control topics">
                                            <option>Select Unit</option>
                                            @foreach($topics as $topic)
                                            <option value="{{ $topic->id }}" {{ $edit_subtopics->topic_id == $topic->id ? 'selected' : '' }}>
                                                {{ $topic->topic }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Video <span class="login-danger">*</span></label>
                                        <input type="text" name="sub_topic" id="sub_topic" value="{{$edit_subtopics->sub_topic}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Video Type <span class="login-danger">*</span></label>
                                        <select name="type" class="form-control" id="type">
                                            <option>Select Type</option>
                                            <option value="free" {{old('free')=="free" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subtopics)) {{ ($edit_subtopics->type=="free")? "selected" : "" }} @endif>Free</option>
                                            <option value="paid" {{old('paid')=="paid" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subtopics)) {{ ($edit_subtopics->type=="paid")? "selected" : "" }} @endif>Paid</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description<span class="login-danger">*</span></label>
                                        <input type="text" name="description" id="description" value="{{$edit_subtopics->description}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Video Pdf<span class="login-danger">*</span></label>
                                        <input type="file" name="file_path" id="file_path" class="form-control">
                                        <a href="{{ asset('public/storage/pdf/subtopic/' . $edit_subtopics->file_path) }}" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Video Link<span class="login-danger">*</span></label>
                                        <input type="url" name="video_link" id="video_link" value="{{$edit_subtopics->video_link}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Vhm Start Title<span class="login-danger">*</span></label>
                                        <input type="text" name="vhm_start_title" id="vhm_start_title" value="{{$edit_subtopics->vhm_start_title}}" class="form-control">
                                        <span class="validation-message " id="videoLinkValidation"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Vhm End Title<span class="login-danger">*</span></label>
                                        <input type="text" name="vhm_end_title" id="vhm_end_title" value="{{$edit_subtopics->vhm_end_title}}" class="form-control">
                                        <span class="validation-message " id="videoLinkValidation"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Vhm Start Video<span class="login-danger">*</span></label>
                                        <input type="url" name="vhm_start_url" id="vhm_start_url" value="{{$edit_subtopics->vhm_start_url}}" class="form-control">
                                        <span class="validation-message " id="videoLinkValidation"></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Vhm End Video<span class="login-danger">*</span></label>
                                        <input type="url" name="vhm_end_url" id="vhm_end_url" value="{{$edit_subtopics->vhm_end_url}}" class="form-control">
                                        <span class="validation-message " id="videoLinkValidation"></span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
@push('js')


<script>
    $(document).ready(function() {
        $('.medium').on('change', function() {
            var mediumId = $(this).val();

            // Fetch related standards based on medium selected
            $.ajax({
                url: "{{ route('get_standards', '') }}/" + mediumId
                , type: 'GET'
                , success: function(data) {
                    var standardDropdown = $('.standard');
                    standardDropdown.empty();
                    standardDropdown.append('<option>Select Standard</option>');

                    // Append the options for the standards
                    $.each(data, function(key, value) {
                        standardDropdown.append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                    });
                }
            });

            // Fetch related subjects based on medium selected
            $.ajax({
                url: "{{ route('get_subjects', '') }}/" + mediumId
                , type: 'GET'
                , success: function(data) {
                    var subjectDropdown = $('.subject');
                    subjectDropdown.empty();
                    subjectDropdown.append('<option>Select Subject</option>');

                    // Append the options for the subjects
                    $.each(data, function(key, value) {
                        subjectDropdown.append('<option value="' + value.id + '">' + value.subject_name + '</option>');
                    });
                }
            });

            $.ajax({
                url: "{{ route('get_topics', '') }}/" + mediumId
                , type: 'GET'
                , success: function(data) {
                    var topicDropdown = $('.topic');
                    topicDropdown.empty();
                    topicDropdown.append('<option>Select Topic</option>');

                    // Append the options for the topics
                    $.each(data, function(key, value) {
                        topicDropdown.append('<option value="' + value.id + '">' + value.topic_name + '</option>');
                    });
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('.medium').on('change', function() {
            var mediumId = $(this).val();


            $.ajax({
                url: "{{route('get_standards','')}}/" + mediumId
                , type: 'GET'
                , success: function(data) {
                    $('.standard').empty().append('<option>Select Standard</option>');
                    $('.subject').empty().append('<option>Select Subject</option>');
                    $('.topics').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        $('.standard').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $('.standard').on('change', function() {
            var standardId = $(this).val();

            $.ajax({
                url: "{{route('get_subjects','')}}/" + standardId
                , type: 'GET'
                , success: function(data) {
                    $('.subject').empty().append('<option>Select Subject</option>');
                    $('.topics').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        $('.subject').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $('.subject').on('change', function() {
            var subjectId = $(this).val();

            $.ajax({
                url: "{{route('get_topics','')}}/" + subjectId
                , type: 'GET'
                , success: function(data) {
                    $('.topics').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        $('.topics').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $(document).on('change', '.topic', function() {
            var subtopictI__d = $(this).val();
            alert(subtopictI__d);

            var row = $(this).closest('.help');

            $.ajax({
                url: "{{ route('get_subtopics', '') }}/" + subtopictI__d
                , type: 'GET'
                , success: function(data) {
                    row.find('.subtopi').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        row.find('.subtopi').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    });

</script>

@endpush
