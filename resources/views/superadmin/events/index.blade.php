@extends('layouts.superadmin')
@section('title')
    EVENT LIST
@endsection
@section('content')
    @include('flash-message')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title float-left">List Events</h3>
                            </div>
                            <div class="card-tools">
                                <a href="{{route('superadmin.events.create')}}" class="btn btn-primary"><i class="fas fa-plus"> Create Event</i></a>
                            </div>
                            
                            <div class="card-tools">
                                <a href="{{ route('superadmin.import') }}" class="btn btn-success"><i class="fas fa-plus"> Import Events</i></a>
                            </div>
                            
                            
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('superadmin.events.index') }}">
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <select name="month" class="form-control">
                                            <option value="">Select Month</option>
                                            @foreach($months as $key => $month)
                                                <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="year" class="form-control">
                                            <option value="">Select Year</option>
                                            @foreach($years as $year)
                                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="eventTable">
                                    <thead>
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
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$event->event_title}}</td>
                                            <td>{{$event->start_date}}</td>
                                            <td>{{$event->end_date}}</td>
                                            <td>
                                                @if($event->repeated=='true')
                                                    <h6>Repeated</h6>
                                                @else
                                                    <h6>One Time</h6>
                                                @endif
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($event->short_Description, 200) }}</td>
                                            <td class="text-end">

                                                <div class="btn-group">
                                                    <a href="{{route('superadmin.events.edit',$event->id)}}" class="btn btn-sm btn-info me-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>&nbsp;
                                                    <form action="{{route('superadmin.events.delete',$event->id)}}" method="POST">
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
        $(function () {
            $("#eventTable").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "responsive": true,
                order: true,
                "scrollX": false,
                "buttons": ["copy", "csv", "excel", "pdf",]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
