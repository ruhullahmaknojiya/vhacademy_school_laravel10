@extends('layouts.school_admin')
@section('title')
School Holiday
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


                    <div class="justify-between card-header d-flex">
                        <h3 class="page-title">List Holidays</h3>
                        <a href="{{route('schooladmin.holiday.create')}}" class="btn btn-primary ms-auto"><i class="fas fa-plus"></i></a>


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
                                        <td>{{$schoolholiday->description}}</td>
                                        <td class="text-end">
                                            <div class="btn-group">
                                                <a href="{{route('schooladmin.holiday.edit',$schoolholiday->id)}}" class="btn btn-sm btn-info me-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>&nbsp;
                                                <form action="{{route('schooladmin.holiday.delete',$schoolholiday->id)}}" method="POST">



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
</div>
</div>
@endsection
@push('scripts')
<script>
    $(function() {
        $("#mytable").DataTable({
            "responsive": true
            , "lengthChange": true
            , "autoWidth": true
            , "responsive": true
            , order: true
            , "scrollX": false
            , "buttons": ["copy", "csv", "excel", "pdf", ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>


@endpush
