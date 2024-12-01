@extends('layouts.superadmin')

@section('title')
    Topics
@endsection

@section('content')
    @include('flash-message')
    <section class="content-header">
        <h2 class="content-title">Topics</h2>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('subtopics.index') }}" class="form-inline w-100">
                    <div class="row w-100">
                        <div class="col-md-2 mb-2">
                            <label for="medium" class="form-label">Medium</label>
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="standard" class="form-label">Standard</label>
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @foreach ($standards as $standard)
                                    <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-control filter-dropdown" name="subject_id" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ Str::limit($subject->subject, 20) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="topic" class="form-label">Topic</label>
                            <select class="form-control filter-dropdown" name="topic_id" id="topics">
                                <option value="">Select Topic</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" {{ request()->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->topic }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mr-2">Filter</button>
                            <a href="{{ route('subtopics.index') }}" class="btn btn-danger">Reset</a>
                        </div>
                        <div class="col-md-2 text-right d-flex align-items-center">
                            <a href="{{ route('create_subtopics') }}" class="btn btn-success mt-2">
                                <i class="fas fa-plus-circle"></i> Create SubTopic
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
                        url: '{{ route("get-newstandards") }}',
                        type: 'GET',
                        data: { medium_id: mediumId },
                        success: function(data) {
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
                        url: '{{ route("get-newsubjects") }}',
                        type: 'GET',
                        data: { standard_id: standardId },
                        success: function(data) {
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
                        url: '{{ route("get-newtopics") }}',
                        type: 'GET',
                        data: { subject_id: subjectId },
                        success: function(data) {
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
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#subtopicTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
