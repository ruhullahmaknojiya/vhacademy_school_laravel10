@extends('layouts.school_admin')
@section('title')
    Topics
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Topics</h1>
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
                                <h3 class="page-title">List Topics</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">

                                <a href="{{route('create_subtopics')}}" class="btn btn-primary"><i
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
                                     <th>Stander</th>
                                          <th>Subject</th>
                                <th>Topic</th>
                                <th>Image</th>
                                <th>SubTopic</th>
                                <th>Type</th>
                                <th>File</th>



                                <th class="text-end">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subtopics as $subtopic)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                        <td>{{$subtopic->topic->subject->standers->standard_name ?? ''}}</td>
                                     <td>{{$subtopic->topic->subject->subject}}</td>
                                    <td>{{ $subtopic->topic->topic}}</td>
                                    <td> <img src="{{asset('public/storage/images/school/subject/subtopics/'.$subtopic->stopic_image)}}" width="50" height="60" alt="Subject-Image"></td>
                                    <td>{{$subtopic->sub_topic}}</td>
                                    <td >@if($subtopic->type=='free')
                                            <span class="badge badge-success">{{$subtopic->type}}</span>
                                             @elseif($subtopic->type=='paid')
                                            <span class="badge badge-danger">{{$subtopic->type}}</span>
                                    @endif
                                    </td>
                                    <td>
                                        @if ($subtopic->file_path)
                                            <a href="{{ asset('public/storage/pdf/subtopics/' . $subtopic->file_path) }}" target="_blank">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                            <a href="{{ asset('public/storage/pdf/subtopics/' . $subtopic->file_path) }}" download>
                                                Download
                                            </a>
                                        @else
                                            <center><b> -</b></center>
                                        @endif
                                    </td>



                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{route('edit_subtopics',$subtopic->id)}}"
                                               class="btn btn-sm btn-info me-2">
                                                <i class="fa fa-edit"></i>
                                            </a>&nbsp;
                                            <form action="{{route('delete_subtopics',$subtopic->id)}}" method="POST">



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
