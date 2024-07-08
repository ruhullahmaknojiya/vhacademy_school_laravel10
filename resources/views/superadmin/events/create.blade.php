@extends('layouts.superadmin')
@section('title')
    EVENT-CREATE
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Events</h1>
                </div>
                <div class="col-sm-6">

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
                    <form method="post" action="{{route('save_events')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h5 class="form-title"><b>Create Event Information</b><a class="float-right" href="{{route('events')}}"><i class="fa fa-arrow-left " style="color:blue;"></i></a></h5>
                            </div>


                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="login-danger">*</span></label>
                                    <input type="text" name="event_title" class="form-control" placeholder="Enter Event Title" >
                                    @error('event_title')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
{{--                                    <span class="text-danger"><b>{{$errors->first('event_title')}}</b></span>--}}

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control" required>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control" required>
                                    @error('end_date')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
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
                                    <label>Description<span class="login-danger">*</span></label>
                                    <input type="text" name="short_Description" class="form-control" placeholder="Enter Short Description">
                                    @error('short_Description')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Image<span class="login-danger">*</span></label>
                                    <input type="file" name="event_image" class="form-control" >
                                    @error('event_image')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
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
                                    <input type="url" name="event_video" class="form-control" placeholder="Enter Event Link" >
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
