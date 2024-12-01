@extends('layouts.school_admin')
@section('title')
 School  Timetable
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
                                <h3 class="page-title">School Timetable</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="{{route('teacher_timetable')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="teacherTable">
                            <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Teacher Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                     
                                    <td class="text-end">
                                         <a href="{{ route('teacher_timetable_show', $teacher->id) }}" class="btn btn-sm btn-info me-2">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('teacher_timetable_edit', $teacher->id) }}" class="btn btn-sm btn-info me-2">
                                            <i class="fa fa-eye"></i> View Timetable
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
            $("#teacherTable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
