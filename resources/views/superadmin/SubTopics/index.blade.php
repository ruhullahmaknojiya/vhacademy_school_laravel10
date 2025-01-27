@extends('layouts.superadmin')

@section('title')
Topics
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Video</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Video</li>
                </ol>
              </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('subtopics.index') }}" class="form-inline w-100">
                    <div class="row w-100">
                        <div class="mb-2 col-md-2">
                            <label for="medium" class="form-label">Medium</label>
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2 col-md-2">
                            <label for="standard" class="form-label">Standard</label>
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2 col-md-2">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-control filter-dropdown" name="subject_id" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ Str::limit($subject->subject, 20) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2 col-md-2">
                            <label for="topic" class="form-label">Topic</label>
                            <select class="form-control filter-dropdown" name="topic_id" id="topics">
                                <option value="">Select Topic</option>
                                @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ request()->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-2" style="margin-top: 20px;">
                            <button type="submit" class="mr-2 btn btn-primary">Filter</button>
                            <a href="{{ route('subtopics.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                        <div class="text-right col-md-2">
                            <a href="{{ route('create_subtopics') }}" class="mb-2 btn btn-success">
                                <i class="fas fa-plus-circle"></i> Create Video
                            </a>
                            <a href="{{ route('VideoBulkUploadsIndex') }}" class="btn btn-info">
                                <i class="fas fa-upload"></i> Bulk Upload
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="subtopicTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Medium</th>
                                <th>Subject</th>
                                <th>Chapter</th>
                                <th>Topic</th>
                                <th class="text-end">Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subtopics as $subtopic)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subtopic->topic->subject->standard->standard_name ?? 'N/A' }} ({{ $subtopic->topic->subject->standard->medium->medium_name ?? 'N/A' }})</td>
                                <td>{{ $subtopic->topic->subject->subject ?? 'N/A' }}</td>
                                <td>{{ $subtopic->topic->topic ?? 'N/A' }}</td>
                                <td>{{ $subtopic->sub_topic }}</td>
                                <td class="text-end">
                                    <span class="badge badge-{{ 'success' }}">{{'Active' }}</span>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('edit_subtopics',$subtopic->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('delete_subtopics', $subtopic->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subtopic?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="float-end">
                        {{ $subtopics->links() }}
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .form-label {
        display: block;
        margin-bottom: .5rem;
    }

    .form-group {
        margin-bottom: 0;
    }

    .filter-dropdown {
        width: 100%;
        max-width: 100%;
    }

</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#mediums').change(function() {
            var mediumId = $(this).val();
            if (mediumId) {
                $.ajax({
                    url: '{{ route("get-newstandards") }}'
                    , type: 'GET'
                    , data: {
                        medium_id: mediumId
                    }
                    , success: function(data) {
                        $('#standards').empty().append('<option value="">Select Standard</option>');
                        $.each(data, function(key, value) {
                            $('#standards').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                        });
                    }
                });
            } else {
                $('#standards').empty().append('<option value="">Select Standard</option>');
            }
        });

        $('#standards').change(function() {
            var standardId = $(this).val();
            if (standardId) {
                $.ajax({
                    url: '{{ route("get-newsubjects") }}'
                    , type: 'GET'
                    , data: {
                        standard_id: standardId
                    }
                    , success: function(data) {
                        $('#subjects').empty().append('<option value="">Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subjects').append('<option value="' + value.id + '">' + value.subject + '</option>');
                        });
                    }
                });
            } else {
                $('#subjects').empty().append('<option value="">Select Subject</option>');
            }
        });

        $('#subjects').change(function() {
            var subjectId = $(this).val();
            if (subjectId) {
                $.ajax({
                    url: '{{ route("get-newtopics") }}'
                    , type: 'GET'
                    , data: {
                        subject_id: subjectId
                    }
                    , success: function(data) {
                        $('#topics').empty().append('<option value="">Select Topic</option>');
                        $.each(data, function(key, value) {
                            $('#topics').append('<option value="' + value.id + '">' + value.topic_name + '</option>');
                        });
                    }
                });
            } else {
                $('#topics').empty().append('<option value="">Select Topic</option>');
            }
        });
    });

</script>
<script>
    $(function() {
        $("#subtopicTable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": false
            , "order": true
            , "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#subtopicTable_wrapper .col-md-6:eq(0)');
    });

</script>

@endpush
