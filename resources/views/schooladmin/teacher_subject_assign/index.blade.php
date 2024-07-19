@extends('layouts.school_admin')

@section('content')

<div class="container-fluid">
    <br>
    <div class="row">

        <!-- Form Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assign Subjects to Teachers</h3>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success " id="success-message">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="success-message">
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

                    <form action="{{ route('subjectteacherassignments.store') }}" method="POST">
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
                            <label for="subjects">Subjects:</label>
                            <select name="subjects[]" id="subjects" class="form-control" multiple disabled>
                                <option value="">Select Subjects</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="teacher_id">Teacher:</label>
                            <select name="teacher_id" id="teacher_id" class="form-control select2">
                                <option value="">Select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }} ({{ $teacher->phone }})</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="school_id" value="{{ $school->id }}">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Card -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assigned Subjects With Teachers</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select id="filter_medium" class="form-control">
                                <option value="">Filter by Medium</option>
                                @foreach ($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="filter_standard" class="form-control">
                                <option value="">Filter by Standard</option>
                                @foreach ($standards as $standard)
                                    <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="filter_subject" class="form-control">
                                <option value="">Filter by Subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button id="download_excel" class="btn btn-success">Download Excel</button>
                    </div>
                    <table class="table table-bordered" id="assignment_table">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teachers</th>
                            </tr>
                        </thead>
                        <tbody id="assignment_table_body">
                            @foreach ($assignments as $mediumId => $standards)
                                @foreach ($standards as $standardId => $subjects)
                                    @foreach ($subjects as $subjectId => $groupedAssignments)
                                        <tr data-medium-id="{{ $mediumId }}" data-standard-id="{{ $standardId }}" data-subject-id="{{ $subjectId }}">
                                            <td>{{ $groupedAssignments->first()->medium->medium_name }} - {{ $groupedAssignments->first()->standard->standard_name }}</td>
                                            <td>{{ $groupedAssignments->first()->subject->subject }}</td>
                                            <td>
                                                @foreach ($groupedAssignments as $assignment)
                                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                                        <span>{{ $assignment->teacher->first_name }} {{ $assignment->teacher->last_name }} ({{ $assignment->teacher->phone }})</span>
                                                        <form action="{{ route('subjectteacherassignments.destroy', $assignment->id) }}" method="POST" style="margin-left: 10px;" onsubmit="return confirm('Are you sure you want to remove this teacher?');">
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
@endsection

@push('css')
<!-- Include DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
@endpush

@push('js')
<!-- Include jQuery -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- Include SheetJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();

        // Initialize DataTable
        $('#assignment_table').DataTable({
            paging: true,
            searching: true,
            ordering: true
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

        // Existing AJAX logic to load standards and subjects
        $('#medium_id').change(function() {
            var mediumId = $(this).val();
            $('#standard_id').prop('disabled', true);
            $('#subjects').prop('disabled', true);
            if (mediumId) {
                $.ajax({
                    url: '/get-standards/' + mediumId,
                    type: 'GET',
                    success: function(data) {
                        $('#standard_id').prop('disabled', false).html('<option value="">Select Standard</option>');
                        $.each(data, function(index, standard) {
                            $('#standard_id').append('<option value="'+standard.id+'">'+standard.standard_name+'</option>');
                        });
                    }
                });
            } else {
                $('#standard_id').html('<option value="">Select Standard</option>');
                $('#subjects').html('<option value="">Select Subjects</option>');
            }
        });

        $('#standard_id').change(function() {
            var standardId = $(this).val();
            $('#subjects').prop('disabled', true);
            if (standardId) {
                $.ajax({
                    url: '/get-teacher-subjects/' + standardId,
                    type: 'GET',
                    success: function(data) {
                        $('#subjects').prop('disabled', false).html('<option value="">Select Subjects</option>');
                        $.each(data, function(index, subject) {
                            $('#subjects').append('<option value="'+subject.id+'">'+subject.subject+'</option>');
                        });
                    }
                });
            } else {
                $('#subjects').html('<option value="">Select Subjects</option>');
            }
        });

        // Download Excel
        $('#download_excel').click(function() {
            const wb = XLSX.utils.book_new();
            const ws_data = [['Class', 'Subject', 'Teachers']];
            $('#assignment_table tbody tr').each(function() {
                const row = [];
                $(this).find('td').each(function(index) {
                    if (index === 2) { // Teachers column
                        const teachers = $(this).find('span').map(function() {
                            return $(this).text();
                        }).get().join(', ');
                        row.push(teachers);
                    } else {
                        row.push($(this).text().trim());
                    }
                });
                ws_data.push(row);
            });

            const ws = XLSX.utils.aoa_to_sheet(ws_data);
            XLSX.utils.book_append_sheet(wb, ws, "Assignments");
            XLSX.writeFile(wb, 'assignments.xlsx');
        });
        // Auto hide success message after 1 second
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 1000);
    });
</script>
@endpush
