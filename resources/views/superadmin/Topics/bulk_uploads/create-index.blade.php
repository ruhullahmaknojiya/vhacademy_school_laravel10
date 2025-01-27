@extends('layouts.superadmin')
@section('title')
Create Unit
@endsection
@section('content')
<style>
    .error-message {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
        display: block;
    }

</style>

@include('flash-message')



<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Create bulk-uploads</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Bulk-uploads</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form id="ExcelUploadsForm" enctype="multipart/form-data">
                        @csrf
                        <meta name="csrf_token" content="{{ csrf_token() }}" />
                        <div class="card-header">
                            <h5 class="form-title">
                                <span>Create bulk-uploads</span>
                                <a href="{{ route('topics') }}">
                                    <i class="mt-2 fas fa-arrow-left" style="float: right;"></i>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Medium -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Medium <span class="text-danger">*</span></label>
                                        <select name="medium_id" id="medium" class="form-control">
                                            <option value="">Select Medium</option>
                                            @foreach($mediums as $medium)
                                            <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="medium_error" class="error-message"></span>
                                    </div>
                                </div>

                                <!-- Standard -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Standard <span class="text-danger">*</span></label>
                                        <select name="standard_id" id="standard_id" class="form-control">
                                            <option value="">Select Standard</option>
                                        </select>
                                        <span id="standard_error" class="error-message"></span>
                                    </div>
                                </div>

                                <!-- Subject -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            <option value="">Select Subject</option>
                                        </select>
                                        <span id="subject_error" class="error-message"></span>
                                    </div>
                                </div>

                                <!-- File Upload -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Excel Uploads <span class="text-danger">*</span></label>
                                        <input type="file" name="file_path" id="file_path" class="form-control">
                                        <span id="file_path_error" class="error-message"></span>
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
                @include('flash-message')
                <div class="mt-2 card">
                    <div class="card-header">
                        <h5>Result Excel File</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Medium Name</th>
                                    <th>Standard Name</th>
                                    <th>Subject Name</th>
                                    <th>Unit</th>
                                    <th>Unit Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($topics->isNotEmpty())
                                @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topic->medium->medium_name }}</td>
                                    <td>{{ $topic->standards->standard_name }}</td>
                                    <td>{{ $topic->subject->subject }}</td>
                                    <td>{{ $topic->topic }}</td>
                                    <td>{{ $topic->type }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-danger" colspan="8" style="text-align: center;">
                                        No Records Found
                                    </td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                        <div class="float-end">
                            {{ $topics->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- <script>
    $(document).ready(function() {
        $("#ExcelUploadsForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);


            Swal.fire({
                title: 'Uploading...'
                , text: 'Please wait while your file is being processed.'
                , allowOutsideClick: false
                , didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                type: "POST"
                , url: "{{ route('uploadExcel') }}"
, data: formData
, contentType: false
, processData: false
, dataType: "json"
, headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
}
, success: function(response) {
setTimeout(() => {
if (response.status === true) {
// Success Alert with rows added count
Swal.fire({
icon: 'success'
, title: 'Success'
, text: `${response.message} Rows added: ${response.rows_added}`
, confirmButtonText: 'OK'
}).then((result) => {
if (result.isConfirmed) {
// Redirect to the success page
window.location.href = "{{ route('BulkResultIndex') }}";
}
});
}
}, 500); // 500ms delay
}
, error: function(xhr) {
setTimeout(() => {
if (xhr.status === 422) {
let response = xhr.responseJSON;
let errorMessages = '';
if (response.errors) {
$.each(response.errors, function(key, messages) {
errorMessages += `<li>${messages[0]}</li>`; // Format errors
});
}
Swal.fire({
icon: 'error'
, title: 'Validation Errors'
, html: `<ol style="text-align:left;">${errorMessages}</ol>`
, confirmButtonText: 'OK'
});
} else {
Swal.fire({
icon: 'error'
, title: 'Error'
, text: 'An unexpected error occurred. Please try again later.'
, confirmButtonText: 'OK'
});
console.error("Unexpected Error:", xhr);
}
}, 100);
}
});
});
});

</script> --}}

<script>
    $(document).ready(function() {

        $('#medium').change(function() {
            const mediumId = $(this).val();
            $('#standard_id').html('<option value="">Select Standard</option>');
            $('#student').html('<option value="">Select Subjects</option>');

            if (mediumId) {
                $.get(`/get-standards/${mediumId}`, function(data) {
                    data.forEach(standard => {
                        $('#standard_id').append(`<option value="${standard.id}">${standard.standard_name}</option>`);
                    });
                });
            }
        });

        // Handle standard selection
        $('#standard_id').change(function() {
            const standardId = $(this).val();
            $('#student').html('<option value="">Select Students</option>');

            if (standardId) {
                $.get(`/get-subjects/${standardId}`, function(data) {
                    data.forEach(subject => {
                        $('#subject_id').append(`<option value="${subject.id}">${subject.subject}</option>`);
                    });
                });
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("#ExcelUploadsForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: "POST"
                , url: "{{ route('uploadExcel') }}"
                , data: formData
                , contentType: false
                , processData: false
                , dataType: "json"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                }
                , success: function(response) {
                    if (response.status === true) {
                        // Redirect to the success page
                        window.location.href = "{{ route('BulkResultIndex') }}";
                    } else {
                        // Display validation errors
                        var errors = response.errors;

                        if (errors.medium_id && errors.medium_id.length > 0) {
                            $("#medium_error").text(errors.medium_id[0]);
                        } else {
                            $("#medium_error").text('');
                        }

                        if (errors.standard_id && errors.standard_id.length > 0) {
                            $("#standard_error").text(errors.standard_id[0]);
                        } else {
                            $("#standard_error").text('');
                        }

                        if (errors.subject_id && errors.subject_id.length > 0) {
                            $("#subject_error").text(errors.subject_id[0]);
                        } else {
                            $("#subject_error").text('');
                        }

                        if (errors.file_path && errors.file_path.length > 0) {
                            $("#file_path_error").text(errors.file_path[0]);
                        } else {
                            $("#file_path_error").text('');
                        }
                    }
                }
                , error: function(xhr) {
                    console.error("Error occurred:", xhr);
                }
            });
        });
    });

</script>



@endpush
