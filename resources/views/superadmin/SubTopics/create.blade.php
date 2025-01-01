@extends('layouts.superadmin')
@section('title')
Add Topics
@endsection
@section('content')
@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Add SubTopics</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add SubTopics</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('save_subtopics')}}" enctype="multipart/form-data" id="subtopicForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Topics Information</span><a href="{{route('subtopics.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Medium <span class="text-danger">*</span></label>
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
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <select type="text" name="sub_id" id="subject" class="form-control subject">
                                            <option>Select Subject</option>

                                        </select>
                                        <span class="validation-message " id="subjectValidation"></span>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Chapter <span class="text-danger">*</span></label>
                                        <select type="text" name="topic_id" id="topics" class="form-control topics">
                                            <option>Select Chapter</option>

                                        </select>
                                        @error('topic_id')
                                        <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Topic <span class="text-danger">*</span></label>
                                        <input type="text" name="sub_topic" id="sub_topic" class="form-control">
                                        @error('sub_topic')
                                        <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Topic Type <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" id="type">
                                            <option>Select Type</option>
                                            <option value="free">Free</option>
                                            <option value="paid">Paid</option>

                                        </select>
                                        @error('type')
                                        <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <input type="text" name="description" id="description" class="form-control">
                                        @error('description')
                                        <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>SubTopic Image<span class="text-danger">*</span></label>
                                        <input type="file" name="stopic_image" class="form-control">
                                        @error('stopic_image')
                                        <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div> --}}

                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>SubTopic Pdf<span class="text-danger">*</span></label>
                            <input type="file" name="file_path" id="file_path" class="form-control">
                            @error('file_path')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>SubTopic Video<span class="text-danger">*</span></label>
                            <input type="url" name="video_link" id="video_link" class="form-control">
                            @error('video_link')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Vhm Start Title<span class="text-danger">*</span></label>
                            <input type="text" name="vhm_start_title" id="vhm_start_title" class="form-control">
                            @error('vhm_start_title')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Vhm End Title<span class="text-danger">*</span></label>
                            <input type="text" name="vhm_end_title" id="vhm_end_title" class="form-control">
                            @error('vhm_end_title')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Vhm Start Video<span class="text-danger">*</span></label>
                            <input type="url" name="vhm_start_url" id="vhm_start_url" class="form-control">
                            @error('vhm_start_url')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                            <label>Vhm End Video<span class="text-danger">*</span></label>
                            <input type="url" name="vhm_end_url" id="vhm_end_url" class="form-control">
                            @error('vhm_end_url')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-12">--}}
                    {{-- <h5 class="form-title"><span>Sub-Topics Help Data</span>--}}
                    {{-- <button type="button" class="btn btn-success " style="float: right;" id="addNew"><i--}}
                    {{-- class="fas fa-plus" ></i> Add New--}}
                    {{-- </button>--}}
                    {{-- </h5>--}}
                    {{-- </div>--}}

                    {{-- <div class="row help">--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>School Medium <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="medium_id" id="medium" class="form-control mediu">--}}
                    {{-- <option>Select Medium</option>--}}
                    {{-- @foreach($mediums as $medium)--}}
                    {{-- <option value="{{$medium->id}}">--}}
                    {{-- {{$medium->name}}--}}
                    {{-- </option>--}}
                    {{-- @endforeach--}}
                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Standard <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="helpdetails[0][std_id]" id="standard" class="form-control standar">--}}
                    {{-- <option>Select Standard</option>--}}
                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Subject <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="helpdetails[0][sub_id]" id="subject" class="form-control subjec">--}}
                    {{-- <option>Select Subject</option>--}}
                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Topic <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="helpdetails[0][topic_id]" id="topics" class="form-control topic">--}}
                    {{-- <option>Select Topic</option>--}}
                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>SubTopic <span class="text-danger">*</span></label>--}}

                    {{-- <select type="text" name="helpdetails[0][sub_topic]" id="subtopic" class="form-control subtopi">--}}
                    {{-- <option>Select SubTopic</option>--}}

                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- </div>--}}
                    {{-- <div id="helpdetails">--}}


                    {{-- </div>--}}

                    {{-- <div class="col-12">--}}
                    {{-- <h5 class="form-title"><span>Sub-Topics Reference Data</span>--}}
                    {{-- <button type="button" class="btn btn-success" style="float: right;" id="addNewrefer"--}}
                    {{-- type="button"><i--}}
                    {{-- class="fas fa-plus" ></i> Add New--}}
                    {{-- </button>--}}
                    {{-- </h5>--}}

                    {{-- </div>--}}
                    {{-- <div class="row Refference">--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>School Medium <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="medium_id" id="medium" class="form-control medi">--}}
                    {{-- <option>Select Medium</option>--}}
                    {{-- @foreach($mediums as $medium)--}}
                    {{-- <option value="{{$medium->id}}">--}}
                    {{-- {{$medium->name}}--}}
                    {{-- </option>--}}
                    {{-- @endforeach--}}
                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Standard <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="reference_details[0][std_id]" id="standard" class="form-control stand">--}}
                    {{-- <option>Select Standard</option>--}}

                    {{-- </select>--}}

                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Subject <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="reference_details[0][sub_id]" id="subject" class="form-control sub">--}}
                    {{-- <option>Select Subject</option>--}}

                    {{-- </select>--}}

                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>Topic <span class="text-danger">*</span></label>--}}
                    {{-- <select type="text" name="reference_details[0][topic_id]" id="topics" class="form-control top">--}}
                    {{-- <option>Select Topic</option>--}}

                    {{-- </select>--}}

                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>SubTopic <span class="text-danger">*</span></label>--}}

                    {{-- <select type="text" name="reference_details[0][sub_topic]" id="subtopic" class="form-control subto">--}}
                    {{-- <option>Select SubTopic</option>--}}

                    {{-- </select>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>SubTopic reference Pdf<span class="login-danger">*</span></label>--}}
                    {{-- <input type="file" name="reference_details[0][refference_pdf]" id="refference_pdf" class="form-control">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-12 col-sm-4">--}}
                    {{-- <div class="form-group local-forms">--}}
                    {{-- <label>SubTopic reference Video<span class="login-danger">*</span></label>--}}
                    {{-- <input type="url" name="reference_details[0][refference_video_link]" id="refference_video_link" class="form-control">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div id="referenc_Details">--}}


                    {{-- </div>--}}
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
</section>
@endsection


@push('js')


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

    });

</script>


<script>
    $(document).ready(function() {
        var helpIndex = 1; // Initialize the index for help rows
        var referenceIndex = 1; // Initialize the index for reference rows

        $("#addNew").click(function() {
            // Clone the help row and append it to the container
            var helpRow = $(".help:first").clone();

            // Update IDs and clear values in the cloned row to make them unique
            helpRow.find('select, input').each(function() {
                var originalName = $(this).attr('name');
                var newName = originalName.replace(/\[\d\]/, '[' + helpIndex + ']');
                $(this).attr('name', newName);

                // // Clear values for file input and URL input
                // if ($(this).is('input[type="file"]')) {
                //     $(this).val('');
                // }
                //
                // if ($(this).is('input[type="url"]')) {
                //     $(this).val('');
                // }
            });

            // Add a remove button to the cloned row
            helpRow.append('<a type="button" class="btn btn-md removeRow " style="margin-bottom: 60px;"><i class="fas fa-trash"></i></a>');

            $("#helpdetails").append(helpRow);
            helpIndex++;
        });

        $("#addNewrefer").click(function() {
            // Clone the reference row and append it to the container
            var referenceRow = $(".Refference:first").clone();

            // Update IDs and clear values in the cloned row to make them unique
            referenceRow.find('select, input').each(function() {
                var originalName = $(this).attr('name');
                var newName = originalName.replace(/\[\d\]/, '[' + referenceIndex + ']');
                $(this).attr('name', newName);

                // Clear values for file input and URL input
                // if ($(this).is('input[type="file"]')) {
                //     $(this).val('');
                // }
                //
                // if ($(this).is('input[type="url"]')) {
                //     $(this).val('');
                // }
            });

            // Add a remove button to the cloned row
            referenceRow.append('<a type="button" class="btn btn-md removeRow"><i class="fas fa-trash"></i></a>');

            $("#referenc_Details").append(referenceRow);
            referenceIndex++;
        });

        // Handle remove button click
        $(document).on('click', '.removeRow', function() {
            $(this).closest('.help, .Refference').remove();
        });
    });

</script>



<script>
    $(document).ready(function() {
        // Event delegation for change in the "Medium" dropdown
        $(document).on('change', '.medium', function() {
            var medium_Id = $(this).val();
            var row = $(this).closest('.help');

            $.ajax({
                url: "{{ route('get_standards', '') }}/" + medium_Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.standar').empty().append('<option>Select Standard</option>');
                    row.find('.subjec').empty().append('<option>Select Subject</option>');
                    row.find('.topic').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        row.find('.standar').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Standard" dropdown
        $(document).on('change', '.standar', function() {
            var standard_Id = $(this).val();
            var row = $(this).closest('.help');

            $.ajax({
                url: "{{ route('get_subjects', '') }}/" + standard_Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.subjec').empty().append('<option>Select Subject</option>');
                    row.find('.topic').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        row.find('.subjec').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Subject" dropdown
        $(document).on('change', '.subjec', function() {
            var subject_Id = $(this).val();
            var row = $(this).closest('.help');

            $.ajax({
                url: "{{ route('get_topics', '') }}/" + subject_Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.topic').empty().append('<option>Select Topic</option>');
                    row.find('.subtopi').empty().append('<option>Select SubTopic</option>');
                    $.each(data, function(key, value) {
                        row.find('.topic').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Topic" dropdown
        $(document).on('change', '.topic', function() {
            var subtopictI__d = $(this).val();
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
<script>
    $(document).ready(function() {
        // Event delegation for change in the "Medium" dropdown
        $(document).on('change', '.medi', function() {
            var medium__Id = $(this).val();
            var row = $(this).closest('.Refference');

            $.ajax({
                url: "{{ route('get_standards', '') }}/" + medium__Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.stand').empty().append('<option>Select Standard</option>');
                    row.find('.sub').empty().append('<option>Select Subject</option>');
                    row.find('.top').empty().append('<option>Select Topic</option>');
                    row.find('.subto').empty().append('<option>Select SubTopic</option>');

                    $.each(data, function(key, value) {
                        row.find('.stand').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Standard" dropdown
        $(document).on('change', '.stand', function() {
            var standard__Id = $(this).val();
            var row = $(this).closest('.Refference');

            $.ajax({
                url: "{{ route('get_subjects', '') }}/" + standard__Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.sub').empty().append('<option>Select Subject</option>');
                    row.find('.top').empty().append('<option>Select Topic</option>');
                    row.find('.subto').empty().append('<option>Select SubTopic</option>');
                    $.each(data, function(key, value) {
                        row.find('.sub').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Subject" dropdown
        $(document).on('change', '.sub', function() {
            var subject___Id = $(this).val();
            var row = $(this).closest('.Refference');

            $.ajax({
                url: "{{ route('get_topics', '') }}/" + subject___Id
                , type: 'GET'
                , success: function(data) {
                    row.find('.top').empty().append('<option>Select Topic</option>');
                    row.find('.subto').empty().append('<option>Select SubTopic</option>');
                    $.each(data, function(key, value) {
                        row.find('.top').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        // Event delegation for change in the "Topic" dropdown
        $(document).on('change', '.top', function() {
            var subtopictI___d = $(this).val();
            var row = $(this).closest('.Refference');

            $.ajax({
                url: "{{ route('get_subtopics', '') }}/" + subtopictI___d
                , type: 'GET'
                , success: function(data) {
                    row.find('.subto').empty().append('<option>Select SubTopic</option>');

                    $.each(data, function(key, value) {
                        row.find('.subto').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('#submitBtn').click(function(event) {
            // Reset previous error messages
            $('.error-message').remove();

            // Flag to check if validation passes
            var isValid = true;

            // Validation for each required field
            $('select[name="medium_id"], select[name="std_id"], select[name="sub_id"], select[name="topic_id"], input[name="sub_topic"], select[name="type"], input[name="description"]').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).after('<span class="error-message" style="color: red;">This field is required</span>');
                }
            });

            // Additional validation for SubTopic Image
            if (!validateImage($('input[name="stopic_image"]')[0])) {
                isValid = false;
            }

            // Additional validation for SubTopic PDF
            if (!validatePDF($('input[name="file_path"]')[0])) {
                isValid = false;
            }

            // Additional validation for SubTopic Video URL
            if (!validateURL($('input[name="video_link"]')[0])) {
                isValid = false;
            }

            // If validation fails, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Function to validate Image file
        function validateImage(fileInput) {
            var errorMessage = '';

            if (fileInput.files.length === 0) {
                errorMessage = 'Please choose an image file.';
            } else {
                // Add additional image validation if needed
            }

            if (errorMessage !== '') {
                $(fileInput).after('<span class="error-message" style="color: red;">' + errorMessage + '</span>');
                return false;
            }

            return true;
        }

        // Function to validate PDF file
        function validatePDF(fileInput) {
            var errorMessage = '';

            if (fileInput.files.length === 0) {
                errorMessage = 'Please choose a PDF file.';
            } else {
                var allowedExtensions = /(\.pdf)$/i;
                var fileName = fileInput.files[0].name;

                if (!allowedExtensions.exec(fileName)) {
                    errorMessage = 'Please upload a valid PDF file.';
                }
            }

            if (errorMessage !== '') {
                $(fileInput).after('<span class="error-message" style="color: red;">' + errorMessage + '</span>');
                return false;
            }

            return true;
        }


        function validateURL(urlInput) {
            var errorMessage = '';

            if ($(urlInput).val() !== '' && !isValidURL($(urlInput).val())) {
                errorMessage = 'Please enter a valid URL.';
            }

            if (errorMessage !== '') {
                $(urlInput).after('<span class="error-message" style="color: red;">' + errorMessage + '</span>');
                return false;
            }

            return true;
        }

        // Function to check if a given string is a valid URL
        function isValidURL(url) {
            // You can add your URL validation logic here
            // This is a simple example that checks if it starts with 'http://' or 'https://'
            return /^https?:\/\/.+\..+$/.test(url);
        }
    });

</script>



@endpush
