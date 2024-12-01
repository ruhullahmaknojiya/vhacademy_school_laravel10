@extends('layouts.school_admin')
@section('title')
 Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}
@endsection
@section('content')
    @include('flash-message')

<br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Timetable for {{ $teacher->first_name }} {{ $teacher->last_name }}</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('teacher.timetable.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                @if (session('danger'))
                                    <div class="alert alert-danger">
                                        {{ session('danger') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    @foreach($timetables as $group => $entries)
                                        <h4>{{ $group }}</h4>
                                        <table class="table table-striped table-bordered" >
                                            <thead class="">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Medium Name</th>
                                                    <th>Standard Name</th>
                                                    <th>Class</th>
                                                     <th>Subject</th>
                                                    <th>Weekday Name</th>
                                                    <th>Start Time - End Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($entries as $timetable)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $timetable->medium->medium_name }}</td>
                                                        <td>{{ $timetable->standard->standard_name }}</td>
                                                        <td>{{ $timetable->classmodel->class_name }}</td>
                                                        <td>{{ $timetable->subject->subject }}</td>
                                                        <td>{{ $timetable->day }}</td>
                                                        <td>{{ $timetable->start_time }} - {{ $timetable->end_time }}</td>
                                                        <td class="text-end">
                                                            <div class="btn-group">
                                                                <form action="{{ route('teacher_timetable_delete', $timetable->id) }}" method="POST">
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
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $("#teacherTimetableTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
                "order": true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#teacherTimetableTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
