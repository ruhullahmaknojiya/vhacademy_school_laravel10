@extends('layouts.school_admin')
@section('title')
    Add School Holiday
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Add School Holiday</h1>
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
                    <form method="post" action="{{route('save_schoolholidays')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>School-Holiday Information</span><a
                                        href="{{route('school_holidays')}}"><i class="fas fa-arrow-left"
                                                                               style="float: right;"></i></a></h5>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Holiday Name  <span class="text-danger">*</span></label>
                                    <input type="text" name="holiday_name" placeholder="Enter Holiday Name" class="form-control">
                                    <span style="color: red">{{$errors->first('holiday_name')}}</span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control">
                                    <span style="color: red">{{$errors->first('start_date')}}</span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control">
                                    <span style="color: red">{{$errors->first('end_date')}}</span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea type="text" name="description" placeholder="Enter Description " class="form-control"></textarea>
                                    <span style="color: red">{{$errors->first('description')}}</span>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Holiday Image<span class="text-danger">*</span></label>
                                    <input type="file" name="holiday_image" class="form-control">
                                    <span style="color: red">{{$errors->first('holiday_image')}}</span>

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
