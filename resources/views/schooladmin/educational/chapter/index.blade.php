@extends('layouts.school_admin')
@section('title')
Chapter
@endsection

@section('content')
<style>
    .col-2 {
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%;
        display: flex;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@include('flash-message')


<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Chapter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chapter List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="{{ route('topics') }}" class="form-inline" style="margin-left: 10px;">
                    <div class="row">
                        <div class="col-2">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : (isset($defaultMedium) && $defaultMedium->id == $medium->id ? 'selected' : '') }}>
                                    {{ $medium->medium_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2">
                            <select class="form-control filter-dropdown standard" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @if(request()->medium_id || isset($defaultMedium))
                                @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : (isset($defaultStandard) && $defaultStandard->id == $standard->id ? 'selected' : '') }}>
                                    {{ $standard->standard_name }}
                                </option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-2">
                            <select class="form-control filter-dropdown" name="subject_id" id="subjects" style="width: -webkit-fill-available;width: 39rem;">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : (isset($defaultSubject) && $defaultSubject->id == $subject->id ? 'selected' : '') }}>
                                    {{ $subject->subject }}
                                </option>
                                @endforeach
                            </select>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary ms-auto">Filter</button>
                                <a href="{{ route('schooladmin.educational.chapter.index') }}" class="mx-2 btn btn-danger ms-auto">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="mytable">
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Medium</th>
                                <th>Standard</th>
                                <th>Subject</th>
                                <th>Topic</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topics as $topic)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $topic->subject->standard->medium->medium_name }}</td>
                                <td>{{ $topic->subject->standard->standard_name }}</td>
                                <td>{{ $topic->subject->subject }}</td>
                                <td>{{$topic->topic}}</td>
                                <td>{{$topic->description}}</td>
                                <td>@if($topic->type=='free')
                                    <span class="badge bg-success">{{$topic->type}}</span>
                                    @elseif($topic->type=='paid')
                                    <span class="badge bg-danger">{{$topic->type}}</span>
                                    @endif</td>
                                <td>
                                    <div class="btn-group">
                                        <span class="badge badge-success">ACTIVE</span>

                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>

@endsection
@push('js')
<script>
    $(function() {
        $("#mytable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": true
            , "responsive": true
            , order: true
            , "scrollX": false
            , "buttons": ["copy", "csv", "excel", "pdf", ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mediums').change(function() {
            var mediumId = $(this).val();
            if (mediumId) {
                $.ajax({
                    url: '/standards/' + mediumId
                    , type: 'GET'
                    , dataType: 'json'
                    , success: function(data) {
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
                $('#standards').empty();
                $('#standards').append('<option value="">Select Standard</option>');
                $('#subjects').empty();
                $('#subjects').append('<option value="">Select Subject</option>');
            }
        });

        $('#standard').change(function() {
            var standardId = $(this).val();
            if (standardId) {
                $.ajax({
                    url: '/subjects/' + standardId
                    , type: 'GET'
                    , dataType: 'json'
                    , success: function(data) {
                        $('#subjects').empty();
                        $('#subjects').append('<option value="">Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subjects').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#subjects').empty();
                $('#subjects').append('<option value="">Select Subject</option>');
            }
        });
    });

</script>
@endpush
