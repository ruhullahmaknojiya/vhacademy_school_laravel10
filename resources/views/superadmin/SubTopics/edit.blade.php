@extends('layouts.superadmin')
@section('title')
    Topics
    @endsection
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit Topics</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Topics</a></li>
                    <li class="breadcrumb-item active">Edit Topics</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('update_subtopics',$edit_subtopics->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Topics Information</span><a
                                        href="{{route('subtopics')}}"><i class="fas fa-arrow-left"
                                                                         style="float: right;"></i></a></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label> Medium <span class="login-danger">*</span></label>
                                    <select type="text" name="medium_id" id="medium" class="form-control medium">
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
                                    <select type="text" name="std_id" id="standard" class="form-control standard  ">
                                        <option>Select Standard</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject <span class="login-danger">*</span></label>
                                    <select type="text" name="sub_id" id="subject" class="form-control subject">
                                        <option>Select Subject</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic <span class="login-danger">*</span></label>
                                    <select type="text" name="topic_id" id="topics" class="form-control topics">
                                        <option>Select Topic</option>
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
                                    <label>SubTopic <span class="login-danger">*</span></label>
                                    <input type="text" name="sub_topic" id="sub_topic" value="{{$edit_subtopics->sub_topic}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>SubTopic Type <span class="login-danger">*</span></label>
                                    <select name="type" class="form-control" id="type">
                                        <option>Select Type</option>
                                        <option value="free"  {{old('free')=="free" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subtopics)) {{ ($edit_subtopics->type=="free")? "selected" : "" }} @endif>Free</option>
                                        <option value="paid"  {{old('paid')=="paid" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subtopics)) {{ ($edit_subtopics->type=="paid")? "selected" : "" }} @endif>Paid</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="login-danger">*</span></label>
                                    <input type="text" name="description" id="description" value="{{$edit_subtopics->description}}" class="form-control">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>SubTopic Image<span class="login-danger">*</span></label>
                                    <input type="file" name="stopic_image" class="form-control">
                                    <img src="{{asset('public/storage/images/school/subject/subtopics/'.$edit_subtopics->stopic_image)}}" width="90" height="70">
                                </div>
                            </div> --}}
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>SubTopic Pdf<span class="login-danger">*</span></label>
                                    <input type="file" name="file_path" id="file_path" class="form-control">
                                    <a href="{{ asset('public/storage/pdf/subtopic/' . $edit_subtopics->file_path) }}" target="_blank">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>SubTopic Video<span class="login-danger">*</span></label>
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

{{--                            <div class="col-12">--}}
{{--                                <h5 class="form-title"><span>Sub-Topics Help Data</span>--}}
{{--                                    <button type="button" class="btn btn-success float-end" id="addNew"--}}
{{--                                            type="button"><i--}}
{{--                                            class="fas fa-plus"></i> Add New--}}
{{--                                    </button>--}}
{{--                                </h5>--}}

{{--                            </div>--}}

{{--                            @foreach($edit_subtopics->subtopichelp as $index => $edit_subtopic)--}}
{{--                            <div class="row help">--}}
{{--                                <input type="hidden" name="helpdetails[{{$index}}][id]" value="{{ optional($edit_subtopic)->id }}">--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>School Medium <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="helpdetails[{{$index}}][medium_id]" id="medium{{$index}}" class="form-control mediu">--}}
{{--                                            <option>Select Medium</option>--}}
{{--                                            @foreach($mediums as $medium)--}}
{{--                                                <option value="{{$medium->id}}" @if($medium->id == $edit_subtopic->medium_id) selected @endif>--}}
{{--                                                    {{$medium->name}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Standard <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="helpdetails[{{$index}}][std_id]" id="standard{{$index}}" class="form-control standar">--}}
{{--                                            <option>Select Standard</option>--}}
{{--                                            @foreach($standard as $stand)--}}
{{--                                                <option value="{{$stand->id}}" @if($stand->id == $edit_subtopic->sub_id) selected @endif>--}}
{{--                                                    {{$stand->title}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Subject <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="helpdetails[{{$index}}][sub_id]" id="subject{{$index}}" class="form-control subjec">--}}
{{--                                            <option>Select Subject</option>--}}
{{--                                            @foreach($subjects as $subject)--}}
{{--                                                <option value="{{$subject->id}}" @if($subject->id == $edit_subtopic->sub_id) selected @endif>--}}
{{--                                                    {{$subject->subject}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Topic <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="helpdetails[{{$index}}][topic_id]" id="topics{{$index}}" class="form-control topic">--}}
{{--                                            <option>Select Topic</option>--}}
{{--                                            @foreach($topics as $topic)--}}
{{--                                                <option value="{{$topic->id}}" @if($topic->id == $edit_subtopic->topic_id) selected @endif>--}}
{{--                                                    {{$topic->topic}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="helpdetails[{{$index}}][sub_topic]" id="subtopics{{$index}}" class="form-control subtopi">--}}
{{--                                            <option>Select SubTopic</option>--}}
{{--                                            @foreach($subtopics as $subtopic)--}}
{{--                                                <option value="{{$subtopic->id}}" @if($subtopic->id == $edit_subtopic->topic_id) selected @endif>--}}
{{--                                                    {{$subtopic->sub_topic}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic Help Pdf<span class="login-danger">*</span></label>--}}
{{--                                        <input type="file" name="helpdetails[{{$index}}][help_pdf]" id="help_pdf" class="form-control">--}}
{{--                                        <a href="{{ asset('public/storage/pdf/subtopic/help/' . $edit_subtopics->help_pdf) }}" target="_blank">--}}
{{--                                            <i class="fas fa-file-pdf"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic Help Video<span class="login-danger">*</span></label>--}}
{{--                                        <input type="url" name="helpdetails[{{$index}}][help_video_link]" value="{{$edit_subtopic->help_video_link}}" id="help_video_link" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                            <div id="helpdetails">--}}


{{--                            </div>--}}

{{--                            <div class="col-12">--}}
{{--                                <h5 class="form-title"><span>Sub-Topics Reference Data</span>--}}
{{--                                    <button type="button" class="btn btn-success float-end" id="addNewrefer"--}}
{{--                                            type="button"><i--}}
{{--                                            class="fas fa-plus"></i> Add New--}}
{{--                                    </button>--}}
{{--                                </h5>--}}

{{--                            </div>--}}
{{--                            @foreach($edit_subtopics->subtopicreference as $index => $edit_subtopicrefer)--}}
{{--                            <div class="row Refference">--}}
{{--                                <input type="hidden" name="reference_details[{{$index}}][id]" value="{{ optional($edit_subtopicrefer)->id }}">--}}
{{--                                --}}{{-- <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>School Medium <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="medium_id" id="medium" class="form-control medi">--}}
{{--                                            <option>Select Medium</option>--}}
{{--                                            @foreach($mediums as $medium)--}}
{{--                                                <option value="{{$medium->id}}" @if($medium->id == $edit_subtopicrefer->medium_id) selected @endif>--}}
{{--                                                    {{$medium->name}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Standard <span class="login-danger">*</span></label>--}}

{{--                                            <select type="text" name="reference_details[{{$index}}][std_id]" id="standard{{$index}}" class="form-control stand">--}}
{{--                                                <option>Select Standard</option>--}}
{{--                                                @foreach($standard as $stand)--}}
{{--                                                    <option value="{{$stand->id}}" @if($stand->id == $edit_subtopicrefer->sub_id) selected @endif>--}}
{{--                                                        {{$stand->title}}--}}
{{--                                                    </option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Subject <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="reference_details[{{$index}}][sub_id]" id="subject{{$index}}" class="form-control sub">--}}
{{--                                            <option>Select Subject</option>--}}
{{--                                            @foreach($subjects as $subject)--}}
{{--                                                <option value="{{$subject->id}}" @if($subject->id == $edit_subtopicrefer->sub_id) selected @endif>--}}
{{--                                                    {{$subject->subject}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>Topic <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="reference_details[{{$index}}][topic_id]" id="topics{{$index}}" class="form-control top">--}}
{{--                                            <option>Select Topic</option>--}}
{{--                                            @foreach($topics as $topic)--}}
{{--                                                <option value="{{$topic->id}}" @if($topic->id == $edit_subtopicrefer->topic_id) selected @endif>--}}
{{--                                                    {{$topic->topic}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic <span class="login-danger">*</span></label>--}}
{{--                                        <select type="text" name="reference_details[{{$index}}][sub_topic]" id="subtopics{{$index}}" class="form-control subto">--}}
{{--                                            <option>Select SubTopic</option>--}}
{{--                                            @foreach($subtopics as $subtopic)--}}
{{--                                                <option value="{{$subtopic->id}}" @if($subtopic->id == $edit_subtopic->topic_id) selected @endif>--}}
{{--                                                    {{$subtopic->sub_topic}}--}}
{{--                                                </option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div> --}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic reference Title<span class="login-danger">*</span></label>--}}
{{--                                        <input type="text" name="reference_details[0][title]" id="refference_pdf" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic reference Video<span class="login-danger">*</span></label>--}}
{{--                                        <input type="url" name="reference_details[0][refference_video_link]" id="refference_video_link" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic reference Pdf<span class="login-danger">*</span></label>--}}
{{--                                        <input type="file" name="reference_details[{{$index}}][refference_pdf]" id="refference_pdf{{$index}}" class="form-control">--}}
{{--                                        <a href="{{ asset('public/storage/pdf/subtopic/reference/' . $edit_subtopicrefer->refference_pdf) }}" target="_blank">--}}
{{--                                            <i class="fas fa-file-pdf"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-4">--}}
{{--                                    <div class="form-group local-forms">--}}
{{--                                        <label>SubTopic reference Video<span class="login-danger">*</span></label>--}}
{{--                                        <input type="url" name="reference_details[{{$index}}][refference_video_link]" id="refference_video_link{{$index}}" class="form-control" value="{{$edit_subtopicrefer->refference_video_link}}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                            <div id="referenc_Details">--}}


{{--                            </div>--}}
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
        $(document).ready(function () {
            var helpIndex = $(".help").length; // Initialize the index for help rows
            var referenceIndex = $(".Refference").length; // Initialize the index for reference rows

            // Function to reset values in a cloned row
            function resetClonedRow(row) {
                // Clear values for all inputs in the cloned row
                row.find('select, input').each(function () {
                    // Clear values for file input and URL input
                    // if ($(this).is('input[type="file"]')) {
                    //     $(this).val('');
                    // } else {
                    //     $(this).val('');
                    // }
                });
            }

            $("#addNew").click(function () {
                // Clone the help row and append it to the container
                var helpRow = $(".help:first").clone();

                // Reset values in the cloned row to make them empty
                resetClonedRow(helpRow);

                // Update IDs and clear values in the cloned row to make them unique
                helpRow.find('select, input').each(function () {
                    var originalName = $(this).attr('name');
                    var newName = originalName.replace(/\[\d\]/, '[' + helpIndex + ']');
                    $(this).attr('name', newName);
                });

                // Add a remove button to the cloned row
                helpRow.append('<a type="button" class="btn btn-md removeRow " style="margin-bottom: 60px;"><i class="fas fa-trash"></i></a>');

                $("#helpdetails").append(helpRow);
                helpIndex++;
            });

            $("#addNewrefer").click(function () {
                // Clone the reference row and append it to the container
                var referenceRow = $(".Refference:first").clone();

                // Reset values in the cloned row to make them empty
                resetClonedRow(referenceRow);

                // Update IDs and clear values in the cloned row to make them unique
                referenceRow.find('select, input').each(function () {
                    var originalName = $(this).attr('name');
                    var newName = originalName.replace(/\[\d\]/, '[' + referenceIndex + ']');
                    $(this).attr('name', newName);
                });

                // Add a remove button to the cloned row
                referenceRow.append('<a type="button" class="btn btn-md removeRow"><i class="fas fa-trash"></i></a>');

                $("#referenc_Details").append(referenceRow);
                referenceIndex++;
            });

            // Handle remove button click
            $(document).on('click', '.removeRow', function () {
                $(this).closest('.help, .Refference').remove();
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            // Event delegation for change in the "Medium" dropdown
            $(document).on('change', '.mediu', function () {
                var medium_Id = $(this).val();
                var row = $(this).closest('.help');

                $.ajax({
                    url: "{{ route('get_standards', '') }}/" + medium_Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.standar').empty().append('<option>Select Standard</option>');
                        row.find('.subjec').empty().append('<option>Select Subject</option>');
                        row.find('.topic').empty().append('<option>Select Topic</option>');
                        row.find('.subtopi').empty().append('<option>Select SubTopic</option>');

                        $.each(data, function (key, value) {
                            row.find('.standar').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Standard" dropdown
            $(document).on('change', '.standar', function () {
                var standard_Id = $(this).val();
                var row = $(this).closest('.help');

                $.ajax({
                    url: "{{ route('get_subjects', '') }}/" + standard_Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.subjec').empty().append('<option>Select Subject</option>');
                        row.find('.topic').empty().append('<option>Select Topic</option>');
                        row.find('.subtopi').empty().append('<option>Select SubTopic</option>');

                        $.each(data, function (key, value) {
                            row.find('.subjec').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Subject" dropdown
            $(document).on('change', '.subjec', function () {
                var subject_Id = $(this).val();
                var row = $(this).closest('.help');

                $.ajax({
                    url: "{{ route('get_topics', '') }}/" + subject_Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.topic').empty().append('<option>Select Topic</option>');
                        row.find('.subtopi').empty().append('<option>Select SubTopic</option>');

                        $.each(data, function (key, value) {
                            row.find('.topic').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Topic" dropdown
            $(document).on('change', '.topic', function () {
                var subtopictI__d = $(this).val();
                var row = $(this).closest('.help');

                $.ajax({
                    url: "{{ route('get_subtopics', '') }}/" + subtopictI__d,
                    type: 'GET',
                    success: function (data) {
                        row.find('.subtopi').empty().append('<option>Select Topic</option>');

                        $.each(data, function (key, value) {
                            row.find('.subtopi').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Event delegation for change in the "Medium" dropdown
            $(document).on('change', '.medi', function () {
                var medium__Id = $(this).val();
                var row = $(this).closest('.Refference');

                $.ajax({
                    url: "{{ route('get_standards', '') }}/" + medium__Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.stand').empty().append('<option>Select Standard</option>');
                        row.find('.sub').empty().append('<option>Select Subject</option>');
                        row.find('.top').empty().append('<option>Select Topic</option>');
                        row.find('.subto').empty().append('<option>Select SubTopic</option>');

                        $.each(data, function (key, value) {
                            row.find('.stand').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Standard" dropdown
            $(document).on('change', '.stand', function () {
                var standard__Id = $(this).val();
                var row = $(this).closest('.Refference');

                $.ajax({
                    url: "{{ route('get_subjects', '') }}/" + standard__Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.sub').empty().append('<option>Select Subject</option>');
                        row.find('.top').empty().append('<option>Select Topic</option>');
                        row.find('.subto').empty().append('<option>Select SubTopic</option>');
                        $.each(data, function (key, value) {
                            row.find('.sub').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Subject" dropdown
            $(document).on('change', '.sub', function () {
                var subject___Id = $(this).val();
                var row = $(this).closest('.Refference');

                $.ajax({
                    url: "{{ route('get_topics', '') }}/" + subject___Id,
                    type: 'GET',
                    success: function (data) {
                        row.find('.top').empty().append('<option>Select Topic</option>');
                        row.find('.subto').empty().append('<option>Select SubTopic</option>');
                        $.each(data, function (key, value) {
                            row.find('.top').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Event delegation for change in the "Topic" dropdown
            $(document).on('change', '.top', function () {
                var subtopictI___d = $(this).val();
                var row = $(this).closest('.Refference');

                $.ajax({
                    url: "{{ route('get_subtopics', '') }}/" + subtopictI___d,
                    type: 'GET',
                    success: function (data) {
                        row.find('.subto').empty().append('<option>Select SubTopic</option>');

                        $.each(data, function (key, value) {
                            row.find('.subto').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush
