@extends('layouts.superadmin')
@section('title')
Create Unit
@endsection
@section('content')

@include('flash-message')

<meta name="csrf_token" content="{{ csrf_token() }}" />

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
                    <form method="POST" action="{{ route('uploadExcel') }}" enctype="multipart/form-data" id="ExcelUploadsForm">
                        @csrf
                        <div class="card-header">
                            <h5 class="form-title"><span>Create bulk-uploads</span>
                                <a href="{{ route('topics') }}"><i class="mt-2 fas fa-arrow-left" style="float: right;"></i></a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
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
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Standard <span class="text-danger">*</span></label>
                                        <select name="std_id" id="standard" class="form-control">
                                            <option value="">Select Standard</option>
                                            <!-- Populate dynamically -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Subject <span class="text-danger">*</span></label>
                                        <select name="sub_id" id="subject" class="form-control">
                                            <option value="">Select Subject</option>
                                            <!-- Populate dynamically -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Excel Uploads <span class="text-danger">*</span></label>
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
                        <h5>Result Excel File</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Subject Name</th>
                                    <th>Unit</th>
                                    <th>Unit Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
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
<script>
    $(document).ready(function() {
        function populateStandards(mediumId) {
            if (mediumId) {
                $.ajax({
                    url: "{{ route('get-standards', '') }}/" + mediumId
                    , type: 'GET'
                    , success: function(data) {
                        $('#standard').empty().append('<option>Select Standard</option>');
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#standard').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        }

        function populateSubjects(standardId) {
            if (standardId) {
                $.ajax({
                    url: "{{ route('get_subjects', '') }}/" + standardId
                    , type: 'GET'
                    , success: function(data) {
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subject').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        }

        $('#medium').on('change', function() {
            var mediumId = $(this).val();
            populateStandards(mediumId);
        });

        $('#standard').on('change', function() {
            var standardId = $(this).val();
            populateSubjects(standardId);
        });


        var oldMediumId = '{{ old('
        medium_id ') }}';
        var oldStandardId = '{{ old('
        std_id ') }}';

        if (oldMediumId) {
            populateStandards(oldMediumId);
            setTimeout(function() {
                $('#medium').val(oldMediumId).trigger('change');
            }, 500);
        }

        if (oldStandardId) {
            setTimeout(function() {
                $('#standard').val(oldStandardId).trigger('change');
            }, 500);
        }
    });

</script>

{{-- <script>
    // $(document).ready(function() {
    //     $("#ExcelUploadsForm").submit(function(e) {
    //         e.preventDefault();

    //         Swal.fire({
    //             title: 'Uploading...'
    //             , text: 'Please wait while your file is being processed.'
    //             , allowOutsideClick: false
    //             , didOpen: () => {
    //                 Swal.showLoading();
    //             }
    //         });

    //         let formData = new FormData(this);

    //         $.ajax({
    //             url: "{{ route('uploadExcel') }}"
// , method: "POST"
// , data: formData
// , contentType: false
// , processData: false
// , headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// , success: function(response) {
// Swal.close(); // Close the loader
// Swal.fire({
// icon: 'success'
// , title: 'Success'
// , text: 'Excel file imported successfully!'
// , });
// }
// , error: function(xhr, status, error) {
// Swal.close(); // Close the loader
// Swal.fire({
// icon: 'error'
// , title: 'Error'
// , text: xhr.responseJSON ? .message || 'Something went wrong!'
// , });
// }
// });
// });
// }); --}}


<script>
    $(document).ready(function() {
        $("#ExcelUploadsForm").submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: 'Uploading...'
                , text: 'Please wait while your file is being processed.'
                , allowOutsideClick: false
                , didOpen: () => {
                    Swal.showLoading();
                }
            });

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('uploadExcel') }}"
                , method: "POST"
                , data: formData
                , processData: false
                , contentType: false
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    Swal.close(); // Close the loader
                    Swal.fire({
                        icon: 'success'
                        , title: 'Success'
                        , text: response.message
                    , });
                }
                , error: function(xhr) {
                    Swal.close(); // Close the loader

                    // Check for validation errors
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        // Collect all error messages
                        for (let field in errors) {
                            errorMessage += errors[field][0] + '\n';
                        }

                        Swal.fire({
                            icon: 'error'
                            , title: 'Validation Error'
                            , text: errorMessage.trim()
                        });
                    } else {
                        Swal.fire({
                            icon: 'error'
                            , title: 'Error'
                            , text: 'Something went wrong. Please try again.'
                        });
                    }
                }
            });
        });
    });

</script>



{{-- </script> --}}


@endpush
