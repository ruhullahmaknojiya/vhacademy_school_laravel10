@extends('layouts.school_admin')
@section('title')
    Edit School Holiday
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Edit School Holiday</h1>
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
                    <form method="post" action="{{route('update_schoolholidays',$edit_schoolholiday->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>School-Holiday Information</span><a
                                        href="{{route('school_holidays')}}"><i class="fas fa-arrow-left"
                                                                             style="float: right;"></i></a></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="login-danger">*</span></label>
                                    <input type="text" name="holiday_name" class="form-control"
                                           value="{{$edit_schoolholiday->holiday_name}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control"
                                           value="{{$edit_schoolholiday->start_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control"
                                           value="{{$edit_schoolholiday->end_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="login-danger">*</span></label>
                                    <textarea type="text" name="description" class="form-control"
                                              >{{$edit_schoolholiday->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Holiday Image<span class="login-danger">*</span></label>
                                    <input type="file" name="holiday_image" class="form-control">
                                    <img
                                        src="{{asset('public/storage/images/admin/holidays/'.$edit_schoolholiday->holiday_image)}}"
                                        width="60" height="60">
                                </div>
                            </div>
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
