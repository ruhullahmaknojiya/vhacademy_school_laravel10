@extends('layouts.school_admin')
@section('title')
SubTopics
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@include('flash-message')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">SubTopics</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">SubTopics</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- <form method="GET" action="{{ route('subtopics.index') }}" class="form-inline w-75">
                <div class="row w-100 align-items-end">
                    <div class="mb-2 col-md-2">
                        <label for="medium" class="mr-3">Medium</label>
                        <select class="mr-1 form-control filter-dropdown" name="medium_id" id="mediums">
                            <option value="">Select Medium</option>
                            @foreach ($mediums as $medium)
                            <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2 ml-4 col-md-2">
                        <label for="standard" class="mr-3">Standard</label>
                        <select class="mr-1 form-control filter-dropdown" name="standard_id" id="standards">
                            <option value="">Select Standard</option>
                            @foreach ($standards as $standard)
                            <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="subject" class="mr-3">Subject</label>
                        <select class="mr-1 form-control filter-dropdown" name="subject_id" id="subjects">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="topic" class="mr-3">Topic</label>
                        <select class="mr-1 form-control filter-dropdown" name="topic_id" id="topics">
                            <option value="">Select Topic</option>
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->id }}" {{ request()->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                            @endforeach
                        </select>
                        <div class="col-3 d-flex">
                            <div class="mr-1 form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <div class="mr-1 form-group">
                                <a href="{{ route('schooladmin.educational.topic.index') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </div>

                </div>
                </form> --}}


                <form method="GET" action="{{ route('subtopics.index') }}">
                    <div class="row">
                        <div class="col-2">
                            <select class="mr-1 form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <select class="mr-1 form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3">
                            <select class="mr-1 form-control filter-dropdown" name="subject_id" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-2">
                            <select class="mr-1 form-control filter-dropdown" name="topic_id" id="topics">
                                <option value="">Select Topic</option>
                                @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ request()->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary ms-auto">Filter</button>
                            <a href="{{ route('schooladmin.educational.topic.index') }}" class="mx-1 btn btn-danger">Reset</a>

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
                            <th>Standard</th>
                            <th>Subject</th>
                            <th>Topic</th>
                            <th>SubTopic</th>
                            <th class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subtopics as $subtopic)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subtopic->topic->subject->standard->medium->medium_name ?? 'N/A' }}</td>
                            <td>{{ $subtopic->topic->subject->standard->standard_name ?? 'N/A' }}</td>
                            <td>{{ $subtopic->topic->subject->subject ?? 'N/A' }}</td>
                            <td>{{ $subtopic->topic->topic_name ?? 'N/A' }}</td>
                            <td>{{ $subtopic->subtopic_name }}</td>
                            <td class="text-end">
                                <span class="badge badge-success">{{ $subtopic->status ? 'Active' : 'Deactive' }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination justify-content-center">
                            {{ $subtopics->links() }}
            </div> --}}
        </div>
    </div>
    </div>
    </div>
</section>

@endsection

@push('js')
{{-- <script>
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
                        $('#standards').empty();
                        $('#standards').append('<option value="">Select Standard</option>');
                        $.each(data, function(key, value) {
                            $('#standards').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                        });
                    }
                });
            } else {
                $('#standards').empty();
                $('#standards').append('<option value="">Select Standard</option>');
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
                        $('#subjects').empty();
                        $('#subjects').append('<option value="">Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subjects').append('<option value="' + value.id + '">' + value.subject + '</option>');
                        });
                    }
                });
            } else {
                $('#subjects').empty();
                $('#subjects').append('<option value="">Select Subject</option>');
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
                        $('#topics').empty();
                        $('#topics').append('<option value="">Select Topic</option>');
                        $.each(data, function(key, value) {
                            $('#topics').append('<option value="' + value.id + '">' + value.topic_name + '</option>');
                        });
                    }
                });
            } else {
                $('#topics').empty();
                $('#topics').append('<option value="">Select Topic</option>');
            }
        });
    });

</script> --}}
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


<script>
    $(document).ready(function() {

        $('#mediums').change(function() {
            var mediumId = $(this).val();

            if (mediumId) {

                $.ajax({
                    url: '/standards/' + mediumId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#standards').empty();
                        $('#standards').append('<option value="">Select Standard</option>');

                        $.each(data, function(key, value) {
                            $('#standards').append('<option value="' + key + '">' + value + '</option>');
                        });
                        $('#subjects').empty();
                        $('#subjects').append('<option value="">Select Subject</option>');
                    }
                });
            } else {

                $('#standards').empty().append('<option value="">Select Standard</option>');
                $('#subjects').empty().append('<option value="">Select Subject</option>');
            }
        });


        $('#standards').change(function() {
            var standardId = $(this).val();

            if (standardId) {

                $.ajax({
                    url: '/subjects/' + standardId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subjects').empty();
                        $('#subjects').append('<option value="">Select Subject</option>');

                        $.each(data, function(key, value) {
                            $('#subjects').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {

                $('#subjects').empty().append('<option value="">Select Subject</option>');
            }
        });
    });
</script>


@endpush
