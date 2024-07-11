@extends('layouts.school_admin')
@section('title')
    SubTopics
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <h3 class="content-title">SubTopics</h3>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('subtopics.index') }}" class="form-inline w-75">
                    <div class="row w-100 align-items-end">
                        <div class="col-md-2 mb-2">
                            <label for="medium" class="mr-3">Medium</label>
                            <select class="form-control filter-dropdown mr-1" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2 ml-4">
                            <label for="standard" class="mr-3">Standard</label>
                            <select class="form-control filter-dropdown mr-1" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @foreach ($standards as $standard)
                                    <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2 ml-3">
                            <label for="subject" class="mr-3">Subject</label>
                            <select class="form-control filter-dropdown mr-1" name="subject_id" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2 ml-2">
                            <label for="topic" class="mr-3">Topic</label>
                            <select class="form-control filter-dropdown mr-1" name="topic_id" id="topics">
                                <option value="">Select Topic</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" {{ request()->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-2 d-flex">
                            <div class="form-group mr-1">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <div class="form-group mr-1">
                                <a href="{{ route('schooladmin.educational.topic.index') }}" class="btn btn-danger">Reset</a>
                            </div>
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
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#mediums').change(function() {
                var mediumId = $(this).val();
                if (mediumId) {
                    $.ajax({
                        url: '{{ route("get-newstandards") }}',
                        type: 'GET',
                        data: { medium_id: mediumId },
                        success: function(data) {
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
                        url: '{{ route("get-newsubjects") }}',
                        type: 'GET',
                        data: { standard_id: standardId },
                        success: function(data) {
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
                        url: '{{ route("get-newtopics") }}',
                        type: 'GET',
                        data: { subject_id: subjectId },
                        success: function(data) {
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
    </script>
    <script>
        $(function() {
            $("#subtopicTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#subtopicTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
