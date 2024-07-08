@extends('layouts.superadmin')
@section('title')
    Chapter
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Chapter</h1>
                </div>
                <div class="justify-content-center mt-4 ml-2">
                    <form method="GET" action="{{route('topics')}}" class="form-inline" style="margin-left: 400px;" >
                        <div class="row" >


                            <div class="mr-4">
                                <select class="form-control filter-dropdown" name="subject"
                                        id="standards">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ request()->sub_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="mr-2">
                                <select class="form-control filter-dropdown" name="topic"
                                        id="standards">
                                    <option value="">Select Toipc</option>
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->topic }}" {{ request()->topic == $topic->topic ? 'selected' : '' }}>{{ $topic->topic }}</option>
                                    @endforeach


                                </select>
                            </div>


                                <button type="submit" class="btn btn-primary mr-2">Filter</button>


                                <a href="{{ route('topics') }}" class="btn btn-dark">Reset</a>

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
                                <h3 class="page-title">List Chapter</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('create_topic')}}" class="btn btn-primary"><i
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
                                <th>Subject</th>
                                <th>Image</th>
                                <th>Banner-Image</th>
                                <th>Topic</th>
                                <th>Type</th>
{{--                                <th>Video</th>--}}
                                <th>Description</th>

                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topics as $topic)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topic->subject->subject }}</td>
                                    <td> <img src="{{asset('public/storage/images/school/subject/topics/'.$topic->topic_image)}}" width="50" height="60" alt="Subject-Image"></td>
                                    <td> <img src="{{asset('public/storage/images/school/subject/topics/'.$topic->topic_banner)}}" width="50" height="60" alt="Subject-Image"></td>
                                    <td>{{$topic->topic}}</td>
                                    <td >@if($topic->type=='free')
                                            <span class="badge badge-success">{{$topic->type}}</span>
                                        @elseif($topic->type=='paid')
                                            <span class="badge badge-danger">{{$topic->type}}</span>
                                        @endif</td>


                                    <td>{{$topic->description}}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('edit_topic',$topic->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('delete_topic',$topic->id)}}" method="POST">



                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');"  class="btn btn-sm btn-danger me-2"><i class="fa fa-trash"></i></button>

                                            </form>
{{--                                            <a href="{{route('delete_topic',$topic->id)}}"--}}
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
