@extends('layouts.school_admin')
@section('title')
    School Event
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1> School Event</h1>
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
                                <h3 class="page-title">List Events</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('create_schoolevents')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="eventTable">
                            <thead class="">
                            <tr>

                                <th>No</th>
                                <th>Event Title</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Event Type</th>
                                <th>Description</th>

                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($schoolevents as $schoolevent)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$schoolevent->event_title}}</td>
                                    <td>{{$schoolevent->start_date}}</td>
                                    <td>
                                       {{$schoolevent->end_date}}
                                    </td>
                                        <td>@if($schoolevent->repeated=='true')
                                    <h6>Repeated</h6>
                                       @else
                                        <h6>One Time </h6>
                                       @endif
                                    </td>
                                          <td>{{ Str::limit($schoolevent->short_Description, 200) }}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('edit_schoolevents',$schoolevent->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('delete_schoolevents',$schoolevent->id)}}" method="POST">



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

@endsection
@push('js')
<script>
    $(function() {
        $("#eventTable").DataTable({
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
