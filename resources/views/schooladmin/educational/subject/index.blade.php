@extends('layouts.school_admin')
@section('title')
    Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <h2 class="content-title">Subjects</h2>
    </section>
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <form method="GET" action="{{ route('schooladmin.educational.subject.index') }}" class="form-inline w-75">
                    <div class="row w-100">
                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="medium" class="mr-2">Medium</label>
                                <select class="form-control filter-dropdown" name="medium_id" id="mediums">
                                    <option value="">Select Medium</option>
                                    @foreach ($mediums as $medium)
                                        <option value="{{ $medium->id }}" {{ request()->medium_id == $medium->id ? 'selected' : (isset($defaultMedium) && $defaultMedium->id == $medium->id ? 'selected' : '') }}>{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
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
                        <div class="col-md-3 mb-2">
                            <div class="form-group">
                                <label for="subject" class="mr-2">Subject</label>
                                <select class="form-control filter-dropdown" name="subject_id" id="subjects">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : (isset($defaultSubject) && $defaultSubject->id == $subject->id ? 'selected' : '') }}>{{ $subject->subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2 d-flex align-items-end">
                            <div class="form-group mr-2">
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
                                        <span class="badge badge-success">{{ $subject->status ? 'Active' : 'Deactive' }}</span>
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
            $("#subjectTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "order": true,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#subjectTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
