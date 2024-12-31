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
                                <select name="medium_id" class="form-control" id="medium">
                                    <option value="">Select Medium</option>
                                    @foreach($mediums as $medium)
                                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="standard">Standard</label>
                                <select name="standard_id" class="form-control" id="standard">
                                    <option value="">Select Standard</option>
                                    @foreach($standards as $standard)
                                    <option value="{{ $standard->id }}">{{ $standard->standard_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <select name="class_id" class="form-control" id="class">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select name="subject_id" class="form-control" id="subject">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
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
@endpush
