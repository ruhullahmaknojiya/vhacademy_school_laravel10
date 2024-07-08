@extends('layouts.school_admin')
@section('title')
   Add School Event
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Add School Event</h1>
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
                    <form method="post" action="{{route('save_schoolevents')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>School-Event Information</span><a
                                        href="{{route('school_events')}}"><i class="fas fa-arrow-left"
                                                                             style="float: right;"></i></a></h5>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="text-danger">*</span></label>
                                    <input type="text" name="event_title" class="form-control" placeholder="Enter Event Title">
                                    <span style="color: red">{{$errors->first('event_title')}}</span>
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
                                    <label>Color<span class="login-danger">*</span></label>
                                    <select type="color" name="color" class="form-control" required>
                                        <option>Please Select Color</option>
                                        <option value="#FFA500">Orange</option>
                                        <option value="#008000">Green</option>
                                        <option value="#0000FF">Blue</option>
                                        <option value="#00008B">Dark Blue</option>
                                        <option value="#FFFF00">Yellow</option>
                                        <option value="#A52A2A">Brown</option>
                                        <option value="#000000">Black</option>

                                    </select>
                                    @error('color')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" name="short_Description" class="form-control" placeholder="Enter Description">
                                    <span style="color: red">{{$errors->first('short_Description')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Image<span class="text-danger">*</span></label>
                                    <input type="file" name="event_image" class="form-control">
                                    <span style="color: red">{{$errors->first('event_image')}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Pdf</label>
                                    <input type="file" name="event_pdf" class="form-control" >
                                    @error('event_pdf')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Link</label>
                                    <input type="url" name="event_video" class="form-control" placeholder="Enter Event Link"  >
                                    @error('event_video')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                                 <div class="col-sm-12">
                                <div class="form-group local-forms mt-4 ">


                                        <input type="checkbox" name="repeated" id="repeated">
                                        <label >&nbsp;Event Repeated</label>

                                    @error('repeated')
                                    <span class="error text-danger">{{ $message }}</span>
                                    @enderror
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
