@extends('layouts.superadmin')
@section('title')
    Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Subject</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Standard Details</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('create_Subject') }}" class="btn btn-primary"> <i class="fas fa-plus-circle" ></i> Add Subject</a>
                    </div>
                </div>
                <form method="GET" action="{{ route('Subject') }}" class="form-inline" style="margin-left: 10px;">
                    <div class="row">

                        <div class="mr-2 mb-2">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : (isset($defaultMedium) && $defaultMedium->id == $medium->id ? 'selected' : '') }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mr-2 mb-2">
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @if(request()->medium_id || isset($defaultMedium))
                                    @foreach ($standards as $standard)
                                        <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : (isset($defaultStandard) && $defaultStandard->id == $standard->id ? 'selected' : '') }}>{{ $standard->standard_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mr-2 mb-2">
                            <select class="form-control filter-dropdown" name="subject" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ request()->subject == $subject->id ? 'selected' : (isset($defaultSubject) && $defaultSubject->id == $subject->id ? 'selected' : '') }}>{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-2 mb-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="mr-2 mb-2">
                            <a href="{{ route('Subject') }}" class="btn btn-danger">Reset</a>
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
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th class="text-end">Action</th>
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
                                    <td><h4><a>{{ $subject->subject_code }}</a></h4></td>
                                    <td>{{ $subject->description }}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{ route('edit_Subject', $subject->id) }}" class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{ route('delete_Subject', $subject->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></a>
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
        });
    </script>
     <script>
        $(function() {
            $("#mytable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush




