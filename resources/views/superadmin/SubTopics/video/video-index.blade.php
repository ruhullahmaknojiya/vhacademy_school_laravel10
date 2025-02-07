@extends('layouts.superadmin')

@section('title')

Create Video Bulk

@endsection


@section('content')

@include('flash-message')

<meta name="csrf_token" content="{{ csrf_token() }}" />

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Create Video File bulk-uploads</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Video File bulk-uploads</li>
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
                    <form id="VideoExcelUploadsForm" action="{{ route('VideoUploadExcel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h5 class="form-title">
                                <span>Create Video File Bulk Uploads</span>
                                <a href="{{ route('subtopics.index') }}"><i class="mt-2 fas fa-arrow-left" style="float: right;"></i></a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Medium Selection -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Medium <span class="text-danger">*</span></label>
                                        <select name="medium_id" id="medium" class="form-control">
                                            <option value="">Select Medium</option>
                                            @foreach($mediums as $medium)
                                            <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Standard Selection -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Standard <span class="text-danger">*</span></label>
                                        <select name="standard_id" id="standard" class="form-control">
                                            <option value="">Select Standard</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Subject Selection -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <select name="sub_id" id="subject" class="form-control">
                                            <option value="">Select Subject</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Topic Selection -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Topic <span class="text-danger">*</span></label>
                                        <select name="topic_id" id="topics" class="form-control">
                                            <option value="">Select Topic</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- File Upload -->
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <label>Video File Upload <span class="text-danger">*</span></label>
                                        <input type="file" name="file_path" id="file_path" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-2 card">
                    <div class="card-header">
                        <h5>Video File Result Excel</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Medium Name</th>
                                    <th>Standards Name</th>
                                    <th>Subjects Name</th>
                                    <th>Topic</th>
                                    <th>Sub Topics</th>
                                    <th>Sub Topics Type</th>
                                    <th>Description</th>
                                    <th>File Path</th>
                                    <th>Video Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($subTopics->isNotEmpty())
                                @foreach ($subTopics as $subTopic)
                                <tr>
                                    <td>{{ $subTopic->id }}</td>
                                    <td>{{ $subTopic->medium->medium_name ?? 'N/A' }}</td>
                                    <td>{{ $subTopic->standard->standard_name ?? 'N/A' }}</td>
                                    <td>{{ $subTopic->subjects->subject ?? 'N/A' }}</td>
                                    <td>{{ $subTopic->topic->topic ?? 'N/A' }}</td>
                                    <td>{{ $subTopic->sub_topic }}</td>
                                    <td>{{ $subTopic->type }}</td>
                                    <td>{{ $subTopic->description }}</td>
                                    <td>{{ $subTopic->file_path ?? 'N/A' }}</td>
                                    <td>{{ $subTopic->video_link ?? 'N/A' }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="11" style="text-align: center;">
                                        No records found.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Load Standards when Medium is selected
        $('#medium').change(function() {
            let mediumId = $(this).val();
            $('#standard').html('<option value="">Select Standard</option>');
            $('#subject').html('<option value="">Select Subject</option>');
            $('#topics').html('<option value="">Select Topic</option>');

            if (mediumId) {
                $.get(`/get-standards/${mediumId}`, function(data) {
                    if (data.length > 0) {
                        $.each(data, function(index, standard) {
                            $('#standard').append(`<option value="${standard.id}">${standard.standard_name}</option>`);
                        });
                    } else {
                        $('#standard').html('<option value="">No Standards Available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch standards. Please try again.');
                });
            }
        });

        // Load Subjects when Standard is selected
        $('#standard').change(function() {
            let standardId = $(this).val();
            $('#subject').html('<option value="">Select Subject</option>');
            $('#topics').html('<option value="">Select Topic</option>');

            if (standardId) {
                $.get(`/get-subjects/${standardId}`, function(data) {
                    if (data.length > 0) {
                        $.each(data, function(index, subject) {
                            $('#subject').append(`<option value="${subject.id}">${subject.subject}</option>`);
                        });
                    } else {
                        $('#subject').html('<option value="">No Subjects Available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch subjects. Please try again.');
                });
            }
        });


        $('#subject').change(function() {
            let subjectId = $(this).val();
            $('#topics').html('<option value="">Select Topic</option>');

            if (subjectId) {
                $.get(`/get-topics/${subjectId}`, function(data) {
                    if (data.length > 0) {
                        $.each(data, function(index, topic) {
                            $('#topics').append(`<option value="${topic.id}">${topic.topic}</option>`);
                        });
                    } else {
                        $('#topics').html('<option value="">No Topics Available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch topics. Please try again.');
                });
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("#VideoExcelUploadsForm").submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Uploading...'
                , text: 'Please wait while your file is being processed.'
                , allowOutsideClick: false
                , didOpen: () => {
                    Swal.showLoading();
                }
            });

            let formData = new FormData(this);

            // Remove previous validation errors
            $(".text-danger").remove();

            $.ajax({
                url: "{{ route('VideoUploadExcel') }}"
                , method: "POST"
                , data: formData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    Swal.close();
                    Swal.fire({
                        icon: 'success'
                        , title: 'Success'
                        , text: response.message
                    , });

                    // Reset the form after successful upload
                    $("#VideoExcelUploadsForm")[0].reset();
                }
                , error: function(xhr) {
                    Swal.close();

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        for (let field in errors) {
                            let inputField = $(`[name="${field}"]`);
                            inputField.after(`<span class="text-danger">${errors[field][0]}</span>`);
                            errorMessage += `${errors[field][0]}\n`;
                        }

                        Swal.fire({
                            icon: 'error'
                            , title: 'Validation Error'
                            , text: errorMessage.trim()
                        , });
                    } else {
                        Swal.fire({
                            icon: 'error'
                            , title: 'Error'
                            , text: 'Something went wrong. Please try again.'
                        , });
                    }
                }
            });
        });
    });

</script>

@endpush
