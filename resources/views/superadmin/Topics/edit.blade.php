@extends('layouts.superadmin')
@section('title')
    Edit Chapter
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Edit Chapter</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{route('update_topic',$edit_topic->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Chapter Information</span><a href="{{route('topics')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject<span class="text-danger">*</span></label>
                                    <select type="text" name="sub_id" class="form-control">
                                        <option>Select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}" @if($subject->id == $edit_topic->sub_id) selected @endif>{{$subject->subject}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic <span class="text-danger">*</span></label>
                                    <input type="text" name="topic" value="{{$edit_topic->topic}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Type <span class="text-danger">*</span></label>
                                    <select  name="type" class="form-control">
                                        <option>Select Type</option>
                                        <option value="free" {{ $edit_topic->type == 'free' ? 'selected' : '' }}>Free</option>
                                        <option value="paid" {{ $edit_topic->type == 'paid' ? 'selected' : '' }}>Paid</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" name="description" value="{{$edit_topic->description}}" class="form-control">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Image<span class="text-danger">*</span></label>
                                    <input type="file" name="topic_image" class="form-control">
                                    <br>
                                    <img src="{{asset('public/storage/images/school/subject/topics/'.$edit_topic->topic_image)}}" width="60" height="60">

                                </div>

                            </div> --}}
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Banner<span class="text-danger">*</span></label>
                                    <input type="file" name="topic_banner" class="form-control">
                                    <br>
                                    <img src="{{asset('public/storage/images/school/subject/topics/'.$edit_topic->topic_banner)}}" width="60" height="60">

                                </div>

                            </div> --}}


                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
