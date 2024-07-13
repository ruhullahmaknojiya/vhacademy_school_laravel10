@extends('layouts.superadmin')
@section('title')
    Edit Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Edit Subject</h1>
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
                    <form method="post" action="{{route('superadmin.homesubject.update',$edit_subject->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Subject Information</span><a href="{{route('superadmin.homesubject.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>



                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Title <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_title" class="form-control" value="{{$edit_subject->subject_title}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Code <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_code" class="form-control" value="{{$edit_subject->subject_code}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <select type="text" name="type" class="form-control">
                                        <option>Select Type</option>
                                        <option value="free" {{old('free')=="free" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subject)) {{ ($edit_subject->type=="free")? "selected" : "" }} @endif>Free</option>
                                        <option value="paid" {{old('paid')=="paid" ? 'selected='.'"selected"' : '' }} @if(isset($edit_subject)) {{ ($edit_subject->type=="paid")? "selected" : "" }} @endif>Paid</option>
                                    </select>
                                    @error('type')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" name="description" class="form-control" value="{{$edit_subject->description}}">
                                </div>
                            </div>


                            <div class="col-12 mt-2">
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

