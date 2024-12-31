@extends('layouts.superadmin')
@section('title')
    Chapter
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Chapter</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Chapter Details</h3>
                    </div>
                    <div class="text-right col-md-6">
                        <a href="{{ route('create_topic') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Chapter</a>
                    </div>
                </div>
                <form method="GET" action="{{ route('topics') }}" class="mt-2 form-inline">
                    <div class="row align-items-end">
                        <div class="col-md-3">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @if(request()->medium_id)
                                    @foreach ($standards as $standard)
                                        <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control filter-dropdown" name="subject_id" id="subjects">
                                <option value="">Select Subject</option>
                                @if(request()->standard_id)
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-1">
                            <button type="submit" class="mr-2 mr-3 btn btn-primary" style="margin-left:-17px;">Filter</button>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('topics') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Medium</th>
                                <th>Standard</th>
                                <th>Subject</th>
                                <th>Chapter</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topics as $topic)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topic->subject->standard->medium->medium_name }}</td>
                                    <td>{{ $topic->subject->standard->standard_name }}</td>
                                    <td>{{ $topic->subject->subject }}</td>
                                    <td>{{ $topic->topic }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>
                                        @if($topic->type == 'free')
                                            <span class="badge badge-success">{{ $topic->type }}</span>
                                        @elseif($topic->type == 'paid')
                                            <span class="badge badge-danger">{{ $topic->type }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('edit_topic', $topic->id) }}" class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('delete_topic', $topic->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mediums').change(function() {
                var mediumId = $(this).val();
                if (mediumId) {
                    $.ajax({
                        url: "{{ route('getnewestandard', '') }}/" + mediumId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#standards').empty();
                            $('#standards').append('<option value="">Select Standard</option>');
                            $.each(data, function(key, value) {
                                console.info(value);
                                $('#standards').append('<option value="' + value['id'] + '">' + value['standard_name'] + '</option>');
                            });
                            $('#subjects').empty();
                            $('#subjects').append('<option value="">Select Subject</option>');
                        }
                    });
                } else {
                    $('#standards').empty();
                    $('#standards').append('<option value="">Select Standard</option>');
                    $('#subjects').empty();
                    $('#subjects').append('<option value="">Select Subject</option>');
                }
            });

            $('#standards').change(function() {
                var standardId = $(this).val();
                if (standardId) {
                    $.ajax({
                        url: "{{ route('get-subjects', '') }}/" + standardId,
                        type: 'GET',
                        dataType: 'json',
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

            // Trigger change event to load standards and subjects if medium and standard are already selected
            @if(request()->medium_id)
                $('#mediums').trigger('change');
            @endif
            @if(request()->standard_id)
                $('#standards').trigger('change');
            @endif
        });
    </script>
    <script>
        $(function() {
            $("#mytable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
