@extends('layouts.superadmin')
@section('title')
Home Subject
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@include('flash-message')


<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Home-Subject</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Home-Subject</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Home-Subject Lists</h4>
                        <a href="{{route('superadmin.homesubject.create')}}" class="btn btn-primary ms-auto"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="mytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Subject</th>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $subject)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subject->type }}</td>
                                        <td>{{$subject->subject_title}}</td>
                                        <td>

                                            {{$subject->subject_code}}

                                        </td>
                                        <td>{{$subject->description}}</td>
                                        <td class="text-end">
                                            <div class="btn-group">
                                                <a href="{{route('superadmin.homesubject.edit',$subject->id)}}" class="btn btn-sm btn-info me-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>&nbsp;
                                                <form action="{{route('superadmin.homesubject.destroy',$subject->id)}}" method="POST">


                                                    @csrf
                                                    @method('DELETE')

                                                    <a type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></a>

                                                </form>
                                                {{-- <a href="{{route('delete_Subject',$subject->id)}}"--}}
                                                {{-- class="btn btn-sm btn-danger me-2" onclick="return confirm('Are you sure?')">--}}
                                                {{-- <i class="feather-trash"></i>--}}
                                                {{-- </a>--}}

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
