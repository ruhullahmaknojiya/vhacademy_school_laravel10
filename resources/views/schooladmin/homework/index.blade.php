@extends('layouts.school_admin')

@section('title')
Homeworks
@endsection

@section('content')
@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Homework</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Homework</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Homeworks</h3>
                    </div>
                </div>
                <form method="GET" action="{{ route('schooladmin.homework.index') }}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medium">Medium</label>
                                <select name="medium_id" id="medium_id" class="form-control">
                                    <option value="">Select Medium</option>
                                    @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="standard">Standard</label>
                                <select name="standard_id" id="standard_id" class="form-control" disabled>
                                    <option value="">Select Standard</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select class="mr-1 form-control filter-dropdown subject" name="subject_id" id="subjects">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ request()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="homeworkTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Date</th>
                                <th>Submission Date</th>
                                <th>Submission Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($homeworks as $homework)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $homework->medium->medium_name }} - {{ $homework->standard->standard_name }} (class: {{ $homework->class->class_name }})</td>
                                <td>{{ $homework->subject->subject }}</td>
                                <td>{{ $homework->teacher->first_name }} {{ $homework->teacher->last_name }}</td>
                                <td>{{ $homework->date }}</td>
                                <td>{{ $homework->submition_status == 'pending' ? '-' : $homework->submition_date }}</td>
                                <td>{{ $homework->submition_status }}</td>
                                <td>
                                    <a href="{{ route('schooladmin.homework.show', $homework->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $homeworks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    $(function() {
        $("#homeworkTable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": false
            , "order": true
            , "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#homeworkTable_wrapper .col-md-6:eq(0)');
    });

</script>

   {{-- <script>
    $(document).ready(function() {
        $('.medium').on('change', function() {
            var mediumId = $(this).val();
            if (mediumId) {
                $.ajax({
                    url: "{{route('get_standards','')}}/" + mediumId
                    , type: 'GET'
                    , success: function(data) {
                        $('.standard').empty().append('<option>Select Standard</option>');
                        $('.subject').empty().append('<option>Select Subject</option>');
                        $('.topics').empty().append('<option>Select Topic</option>');

                        $.each(data, function(key, value) {
                            $('.standard').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }else{
                $('#standards').empty();
                $('#standards').append('<option value="">Select Standard</option>');
                $('#subjects').empty();
                $('#subjects').append('<option value="">Select Subject</option>');

            }

        });

        $('.standard').on('change', function() {
            var standardId = $(this).val();

            $.ajax({
                url: "{{route('get_subjects','')}}/" + standardId
                , type: 'GET'
                , success: function(data) {
                    $('.subject').empty().append('<option>Select Subject</option>');
                    $('.topics').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        $('.subject').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

        $('.subject').on('change', function() {
            var subjectId = $(this).val();

            $.ajax({
                url: "{{route('get_topics','')}}/" + subjectId
                , type: 'GET'
                , success: function(data) {
                    $('.topics').empty().append('<option>Select Topic</option>');

                    $.each(data, function(key, value) {
                        $('.topics').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });

    });



</script> --}}

<script>
    $(document).ready(function () {


    // Filter table rows based on selected criteria
    function filterAssignments() {
            var mediumId = $('#filter_medium').val();
            var standardId = $('#filter_standard').val();
            var subjectId = $('#filter_subject').val();

            $('#assignment_table_body tr').each(function() {
                var row = $(this);
                var rowMediumId = row.data('medium-id');
                var rowStandardId = row.data('standard-id');
                var rowSubjectId = row.data('subject-id');

                var showRow = true;

                if (mediumId && rowMediumId != mediumId) {
                    showRow = false;
                }
                if (standardId && rowStandardId != standardId) {
                    showRow = false;
                }
                if (subjectId && rowSubjectId != subjectId) {
                    showRow = false;
                }

                if (showRow) {
                    row.show();
                } else {
                    row.hide();
                }
            });
        }

        $('#filter_medium, #filter_standard, #filter_subject').change(filterAssignments);


        $('#medium_id').change(function() {
            var mediumId = $(this).val();
            $('#standard_id').prop('disabled', true);
            $('#class_id').prop('disabled', true);

            if (mediumId) {
                $.ajax({
                    url: '/get-class-standards/' + mediumId
                    , type: 'GET'
                    , success: function(data) {
                        $('#standard_id').prop('disabled', false).html(data);
                    }
                });
            } else {
                $('#standard_id').html('<option value="">Select Standard</option>');
                $('#class_id').html('<option value="">Select Class</option>');
            }
        });

        $('#standard_id').change(function() {
            var standardId = $(this).val();
            if (standardId) {
                $('#class_id').prop('disabled', false);
            } else {
                $('#class_id').html('<option value="">Select Class</option>');
            }
        });
    });
</script>
@endpush
