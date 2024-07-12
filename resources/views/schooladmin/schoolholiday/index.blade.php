@extends('layouts.master')
@section('title')
     School Holiday
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>School Holiday</h1>
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
                                <h3 class="page-title">List Holidays</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('create_schoolholidays')}}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="mytable">
                            <thead class="">
                            <tr>

                                <th>No</th>
                                <th>Holiday Name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Event Image</th>
                                <th>Description</th>

                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($schoolholidays as $schoolholiday)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$schoolholiday->holiday_name}}</td>
                                    <td>{{$schoolholiday->start_date}}</td>
                                    <td>
                                       {{$schoolholiday->end_date}}
                                    </td>
                                    <td><img src="{{asset('public/storage/images/admin/holidays/'.$schoolholiday->holiday_image)}}" width="60" height="60"></td>
                                    <td>{{$schoolholiday->description}}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('edit_schoolholidays',$schoolholiday->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('delete_schoolholidays',$schoolholiday->id)}}" method="POST">



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
@push('scripts')
    <script>
        $(function() {
            $("#mytable").DataTable({
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
