@extends('layouts.school_admin')
@section('title')
    Edit School Event
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Edit School Event</h1>
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
                    <form method="post" action="{{route('update_schoolevents',$edit_schoolevent->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>School-Event Information</span><a
                                        href="{{route('school_events')}}"><i class="fas fa-arrow-left"
                                                                             style="float: right;"></i></a></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="login-danger">*</span></label>
                                    <input type="text" name="event_title" class="form-control"
                                           value="{{$edit_schoolevent->event_title}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control"
                                           value="{{$edit_schoolevent->start_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control"
                                           value="{{$edit_schoolevent->end_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Color<span class="login-danger">*</span></label>
                                    <select type="color" name="color" class="form-control" required>
                                        <option>Please Select Color</option>
                                        <option value="#FFA500" {{ $edit_schoolevent->color == '#FFA500' ? 'selected' : '' }}>Orange</option>
                                        <option value="#008000" {{ $edit_schoolevent->color == '#008000' ? 'selected' : '' }}>Green</option>
                                        <option value="#0000FF" {{ $edit_schoolevent->color == '#0000FF' ? 'selected' : '' }}>Blue</option>
                                        <option value="#00008B" {{ $edit_schoolevent->color == '#00008B' ? 'selected' : '' }}>Dark Blue</option>
                                        <option value="#FFFF00" {{ $edit_schoolevent->color == '#FFFF00' ? 'selected' : '' }}>Yellow</option>
                                        <option value="#A52A2A" {{ $edit_schoolevent->color == '#A52A2A' ? 'selected' : '' }}>Brown</option>
                                        <option value="#000000" {{ $edit_schoolevent->color == '#000000' ? 'selected' : '' }}>Black</option>

                                    </select>
                                    @error('color')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="login-danger">*</span></label>
                                    <input type="text" name="short_Description" class="form-control"
                                           value="{{$edit_schoolevent->short_Description}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Image<span class="login-danger">*</span></label>
                                    <input type="file" name="event_image" class="form-control">
                                    <img
                                        src="{{asset('public/storage/images/admin/event/'.$edit_schoolevent->event_image)}}"
                                        width="60" height="60">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Pdf<span class="login-danger">*</span></label>
                                    <input type="file" name="event_pdf" class="form-control" >
                                    @error('event_pdf')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Link<span class="login-danger">*</span></label>
                                    <input type="url" name="event_video" class="form-control" value="{{$edit_schoolevent->event_video}}" >
                                    @error('event_video')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group local-forms mt-4 ">


                                    <input type="checkbox" name="repeated" id="repeated" {{ old('repeated', $edit_schoolevent->repeated) ? 'checked' : '' }}>
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
