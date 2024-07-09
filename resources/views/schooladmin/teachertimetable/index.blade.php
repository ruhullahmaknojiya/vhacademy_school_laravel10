@extends('layouts.school_admin')
@section('title')
 School  Timetable
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>School-Timetable</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">

                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List School-Timetable</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('teacher_timetable')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i></a>
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
                                <th>Medium name</th>
                                <th>Standerd Name</th>
                                <th>Class</th>
                                <th>Day</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>



                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($timetables as $timetable)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$timetable->teacher->user->first_name}} {{$timetable->teacher->user->last_name}}</td>
                                     <td>{{$timetable->medium->name}}</td>
                                    <td>{{ $timetable->stander->name}}</td>

                                    <td>{{$timetable->classs->name}}</td>
                                    <td>{{$timetable->day->day_name}}</td>
                                    <td>{{$timetable->subject->subject}}</td>
                                    <td>{{$timetable->date}}</td>
                                    <td>{{$timetable->start_time}}</td>
                                    <td>{{$timetable->end_time}}</td>



                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('teacher_timetable_edit',$timetable->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('teacher_timetable_delete',$timetable->id)}}" method="POST">



                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></button>

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
                "buttons": ["copy", "csv", "excel", "pdf", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>


@endpush
