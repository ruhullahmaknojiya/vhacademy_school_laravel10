@extends('layouts.school_admin')
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
                <h1 class="m-0">Subjects</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <form method="GET" action="{{ route('schooladmin.educational.subject.index') }}" class="form-inline w-75">
                    <div class="row w-100">
                        <div class="mb-2 col-md-2">
                            <div class="form-group">
                                <label for="medium" class="mr-2">Medium</label>
                                <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                    <option value="">Select Medium</option>
                                    @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : (isset($defaultMedium) && $defaultMedium->id == $medium->id ? 'selected' : '') }}>{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>&nbsp;&nbsp;
                        <div class="mb-2 col-md-2">
                            <div class="form-group">
                                <label for="standard" class="mr-2">Standard</label>
                                <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                    <option value="">Select Standard</option>
                                    @if(request()->medium_id || isset($defaultMedium))
                                    @foreach ($standards as $standard)
                                    <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : (isset($defaultStandard) && $defaultStandard->id == $standard->id ? 'selected' : '') }}>{{ $standard->standard_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="mb-2 col-md-3 d-flex align-items-end">
                            <div class="mr-2 form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('schooladmin.educational.subject.index') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="subjectTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Medium</th>
                                <th>Standard</th>
                                <th>Subject</th>
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($subject->standard && $subject->standard->medium)
                                    {{ $subject->standard->medium->medium_name }}
                                    @else
                                    Not Available
                                    @endif
                                </td>
                                <td>{{ $subject->standard->standard_name ?? '' }}</td>
                                <td>{{ $subject->subject }}</td>
                                <td>{{ $subject->subject_code }}</td>
                                <td>{{ $subject->description }}</td>
                                <td class="text-end">
                                    <span class="badge badge-success">{{ 'Active' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="pagination justify-content-center">
                        {{ $subjects->links() }}
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

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
    });

</script>
<script>
    $(function() {
        $("#subjectTable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": false
            , "order": true
            , "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#subjectTable_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush
