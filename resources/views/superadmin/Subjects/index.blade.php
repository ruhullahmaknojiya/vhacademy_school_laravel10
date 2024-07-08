@extends('layouts.superadmin')
@section('title')
    Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Subject</h1>
                </div>
                <div class="justify-content-center mt-4 ml-2">
                    <form method="GET" action="{{route('Subject')}}" class="form-inline" style="margin-left: 300px;">
                        <div class="row" >


                            <div style="margin-right:2px;">
                                <select class="form-control filter-dropdown" name="standard_id"
                                        id="standards">
                                    <option value="">Select Standard</option>
                                    @foreach ($standars as $standar)
                                        <option value="{{ $standar->id }}" {{ request()->standard_id == $standar->id ? 'selected' : '' }}>{{ $standar->standard_name }}</option>
                                    @endforeach


                                </select>

                            </div>
                            <div class="mr-1">
                                <select class="form-control filter-dropdown" name="subject"
                                        id="standards">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject }}" {{ request()->subject == $subject->subject ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                    @endforeach


                                </select>

                            </div>


                                <button type="submit" class="btn btn-primary mr-2 ">Filter</button>


                                <a href="{{ route('Subject') }}" class="btn btn-dark">Reset</a>

                        </div>
                    </form>
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
                                <h3 class="page-title">List Subject</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('create_Subject')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="mytable">
                            <thead class="">
                            <tr>

                                <th>No</th>
                                <th>Std</th>
                                <th>Image</th>
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
                                    <td>{{ $subject->standers->standard_name ?? '' }}</td>
                                    <td> <img src="{{asset('public/storage/images/school/subject/'.$subject->sub_image)}}" width="80" height="80" alt="Subject-Image"></td>
                                    <td>{{$subject->subject}}</td>
                                    <td>
                                        <h4>
                                            <a>{{$subject->subject_code}}</a>
                                        </h4>
                                    </td>
                                    <td>{{$subject->description}}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('edit_Subject',$subject->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('delete_Subject',$subject->id)}}" method="POST">



                                                @csrf
                                                @method('DELETE')

                                                <a type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></a>

                                            </form>
{{--                                            <a href="{{route('delete_Subject',$subject->id)}}"--}}
{{--                                               class="btn btn-sm btn-danger me-2" onclick="return confirm('Are you sure?')">--}}
{{--                                                <i class="feather-trash"></i>--}}
{{--                                            </a>--}}

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
