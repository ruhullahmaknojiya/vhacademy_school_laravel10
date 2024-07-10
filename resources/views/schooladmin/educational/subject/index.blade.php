@extends('layouts.school_admin')
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
        <div class="card mt-4">
            <div class="card-header">
                <form method="GET" action="{{ route('schooladmin.educational.subject.index') }}" class="form-inline" style="margin-left: 20px;">
                    <div class="row w-100">
                        <div class="col-md-2 mb-2">
                            <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                <option value="">Select Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : (isset($defaultMedium) && $defaultMedium->id == $medium->id ? 'selected' : '') }}>{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 mb-1">
                            <select class="form-control filter-dropdown" name="standard_id" id="standards">
                                <option value="">Select Standard</option>
                                @if(request()->medium_id || isset($defaultMedium))
                                    @foreach ($standards as $standard)
                                        <option value="{{ $standard->id }}" {{ request()->standard_id == $standard->id ? 'selected' : (isset($defaultStandard) && $defaultStandard->id == $standard->id ? 'selected' : '') }}>{{ $standard->standard_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-2 mb-1">
                            <select class="form-control filter-dropdown" name="subject" id="subjects">
                                <option value="">Select Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ request()->subject == $subject->id ? 'selected' : (isset($defaultSubject) && $defaultSubject->id == $subject->id ? 'selected' : '') }}>{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-1">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="col-md-2 mb-1">
                            <a href="{{ route('schooladmin.educational.subject.index') }}" class="btn btn-danger">Reset</a>
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
                                    <td><h4><a>{{ $subject->subject_code }}</a></h4></td>
                                    <td>{{ $subject->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                                <span class="badge badge-success">{{ $standard->status ? 'Active' : 'Deactive' }}</span>

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




