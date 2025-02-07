@extends('layouts.superadmin')
@section('title')
Unit
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Unit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Unit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Unit Details</h5>
                    </div>
                    <div class="text-right col-md-6">
                        <a href="{{ route('BulkResultIndex') }}" class="btn btn-info me-2"><i class="fas fa-plus-circle"></i> Bulk Upload</a>
                        <a href="{{ route('create_topic') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Unit</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('topics') }}" class="mt-2 form-inline">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ request('medium_id') == $medium->id ? 'selected' : '' }}>
                                    {{ $medium->medium_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @foreach ($standards as $standard)
                                <option value="{{ $standard->id }}" {{ request('standard_id') == $standard->id ? 'selected' : '' }}>
                                    {{ $standard->standard_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control" name="subject_id" id="subjects" style="width:140px; ">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->subject }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="me-2 col-md-1 d-flex">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            <a href="{{ route('topics') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>

                <table class="table table-striped table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Medium</th>
                            <th>Standard</th>
                            <th>Subject</th>
                            <th>Unit</th>
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

</section>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#mediums').change(function() {
            const mediumId = $(this).val();
            $('#standards').html('<option value="">Select Standard</option>'); // Reset Standards
            $('#subjects').html('<option value="">Select Subject</option>'); // Reset Subjects

            if (mediumId) {
                $.get(`/get-standards/${mediumId}`, function(data) {
                    if (data.length > 0) {
                        data.forEach(standard => {
                            $('#standards').append(`<option value="${standard.id}">${standard.standard_name}</option>`);
                        });
                    } else {
                        $('#standards').html('<option value="">No Standards Available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch standards. Please try again.');
                });
            }
        });

        // Handle Standard selection to fetch Subjects
        $('#standards').change(function() {
            const standardId = $(this).val();
            $('#subjects').html('<option value="">Select Subject</option>'); // Reset Subjects

            if (standardId) {
                $.get(`/get-subjects/${standardId}`, function(data) {
                    if (data.length > 0) {
                        data.forEach(subject => {
                            $('#subjects').append(`<option value="${subject.id}">${subject.subject}</option>`);
                        });
                    } else {
                        $('#subjects').html('<option value="">No Subjects Available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch subjects. Please try again.');
                });
            }
        });
    });
</script>

<script>
    $(function() {
        $("#mytable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": true
            , "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush
