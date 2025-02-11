@extends('layouts.superadmin')
@section('title')
Subject
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Subject Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subject Details</li>
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
                        <h3 class="card-title">Subject Details</h3>
                    </div>
                    <div class="text-right col-md-6">
                        <a href="{{ route('create_Subject') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Subject</a>
                    </div>
                </div>
                <form method="GET" action="{{ route('subjects') }}" class="mt-2 form-inline">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach($mediums as $medium)
                                <option value="{{ $medium->id }}" {{ request('medium_id') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @if(request('medium_id'))
                                @foreach($standards as $standard)
                                <option value="{{ $standard->id }}" {{ request('standard_id') == $standard->id ? 'selected' : '' }}>{{ $standard->standard_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('subjects') }}" class="btn btn-danger">Reset</a>
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
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subject->standard->medium->medium_name ?? 'Not Available' }}</td>
                                <td>{{ $subject->standard->standard_name ?? 'Not Available' }}</td>
                                <td>{{ $subject->subject }}</td>
                                <td>{{ $subject->subject_code }}</td>
                                <td>{{ $subject->description }}</td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('edit_Subject', $subject->id) }}" class="btn btn-sm btn-info me-2">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!--<form action="{{ route('delete_Subject', $subject->id) }}" method="POST" style="display:inline-block;">-->
                                        <!--    @csrf-->
                                        <!--    @method('DELETE')-->
                                        <!--    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>-->
                                        <!--</form>-->
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
<script>
    $(document).ready(function() {
        $('#mediums').on('change', function() {
            var mediumId = $(this).val();
            // Make an AJAX request to get standards based on the selected medium
            $.ajax({
                type: 'GET'
                , url: "{{ route('getnewestandard', '') }}/" + mediumId
                , success: function(data) {
                    // Clear existing options
                    $('#standards').empty();
                    // Add new options based on the returned data
                    $('#standards').append('<option value="">Select Standard</option>');
                    $.each(data, function(key, value) {
                        console.info(value);
                        $('#standards').append('<option value="' + value['id'] + '">' + value['standard_name'] + '</option>');
                    });
                }
            });
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
