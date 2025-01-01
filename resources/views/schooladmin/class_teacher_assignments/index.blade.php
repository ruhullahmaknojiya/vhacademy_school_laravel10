@extends('layouts.school_admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Assign Class Teacher</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Assign Class Teacher</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assign Class Teacher</h3>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @if ($message = Session::get('danger'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('classteacherassignments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="medium_id">Medium:</label>
                                <select name="medium_id" id="medium_id" class="form-control">
                                    <option value="">Select Medium</option>
                                    @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="standard_id">Standard:</label>
                                <select name="standard_id" id="standard_id" class="form-control" disabled>
                                    <option value="">Select Standard</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Class:</label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teacher_ids">Teachers:</label>
                                <select name="teacher_ids[]" id="teacher_ids" class="form-control" multiple>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }} ({{ $teacher->phone }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List Card -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Class Teacher List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="class_teacher_assignment_table">
                            <thead>
                                <tr>
                                    <th>Medium</th>
                                    <th>Standard</th>
                                    <th>Class</th>
                                    <th>Teachers</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedData as $mediumId => $standards)
                                @foreach ($standards as $standardId => $classes)
                                @foreach ($classes as $classId => $assignments)
                                <tr>
                                    <td>{{ $assignments[0]->medium->medium_name }}</td>
                                    <td>{{ $assignments[0]->standard->standard_name }}</td>
                                    <td>{{ $assignments[0]->class->class_name }}</td>
                                    <td>
                                        @foreach ($assignments as $assignment)
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <span>{{ $assignment->teacher->first_name }} {{ $assignment->teacher->last_name }} ({{ $assignment->teacher->phone }})</span>
                                            <form action="{{ route('classteacherassignments.destroy', $assignment->id) }}" method="POST" style="margin-left: 10px;" onsubmit="return confirm('Are you sure you want to remove this teacher?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                            </form>
                                        </div>
                                        @if (!$loop->last)
                                        <hr>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('css')
<!-- Include DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
@endpush
@push('js')
<!-- Include jQuery -->
<!-- Include Select2 CSS and JS -->
<!-- Include jQuery -->
<!-- Include SheetJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {

        // Initialize DataTable
        $('#class_teacher_assignment_table').DataTable({
            paging: true
            , searching: true
            , ordering: true
        });

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

        $('#teacher_ids').select2({
            placeholder: "Select teachers"
            , allowClear: true
        });
    });

</script>
@endpush
