@extends('layouts.school_admin')
@section('title')
    EVENT-EDIT
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event <i class="fa fa-edit"></i></h1>
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
                    <form method="post" action="{{route('schooladmin.events.update',$edit_event->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h5 class="form-title"><b>Edit Event Information</b><a href="{{route('superadmin.events.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Title <span class="login-danger">*</span></label>
                                    <input type="text" name="event_title" class="form-control" value="{{$edit_event->event_title}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Start<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="start_date" class="form-control" value="{{$edit_event->start_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event End<span class="login-danger">*</span></label>
                                    <input type="datetime-local" name="end_date" class="form-control" value="{{$edit_event->end_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Color<span class="login-danger">*</span></label>
                                    <select type="color" name="color" class="form-control" required>
                                        <option>Please Select Color</option>
                                        <option value="#FFA500" {{ $edit_event->color == '#FFA500' ? 'selected' : '' }}>Orange</option>
                                        <option value="#008000" {{ $edit_event->color == '#008000' ? 'selected' : '' }}>Green</option>
                                        <option value="#0000FF" {{ $edit_event->color == '#0000FF' ? 'selected' : '' }}>Blue</option>
                                        <option value="#00008B" {{ $edit_event->color == '#00008B' ? 'selected' : '' }}>Dark Blue</option>
                                        <option value="#FFFF00" {{ $edit_event->color == '#FFFF00' ? 'selected' : '' }}>Yellow</option>
                                        <option value="#A52A2A" {{ $edit_event->color == '#A52A2A' ? 'selected' : '' }}>Brown</option>
                                        <option value="#000000" {{ $edit_event->color == '#000000' ? 'selected' : '' }}>Black</option>

                                    </select>
                                    @error('color')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="login-danger">*</span></label>
                                    <input type="text" name="short_Description" class="form-control" value="{{$edit_event->short_Description}}">
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Event Image<span class="login-danger">*</span></label>
                                    <input type="file" name="event_image" class="form-control">
                                    <img src="{{asset('public/storage/images/admin/event/'.$edit_event->event_image)}}" width="60" height="60">
                                </div>
                            </div> --}}
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
                                    <input type="url" name="event_video" class="form-control" value="{{$edit_event->event_video}}" >
                                    @error('event_video')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group local-forms mt-4 ">


                                    <input type="checkbox" name="repeated" id="repeated" {{ old('repeated', $edit_event->repeated) ? 'checked' : '' }}>
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
