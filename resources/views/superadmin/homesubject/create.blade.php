@extends('layouts.superadmin')
@section('title')
    Create Home-Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Create Home-Subject</h1>
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
                    <form method="post" action="{{route('superadmin.homesubject.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Subject Information</span><a
                                        href="{{route('superadmin.homesubject.index')}}"><i class="fas fa-arrow-left"
                                                                       style="float: right;"></i></a></h5>
                            </div>



                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Name <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_title" placeholder="Enter Subject Name" class="form-control">
                                    @error('subject_title')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Code <span class="text-danger">*</span></label>
                                    <input type="text" name="subject_code" placeholder="Enter Subject Code" class="form-control">
                                    @error('subject_code')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <select type="text" name="type" class="form-control">
                                        <option>Select Type</option>
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                    @error('type')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <input type="text" name="description" placeholder="Enter Subject Description" class="form-control">
                                    @error('description')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Image</label>
                                    <input type="file" name="sub_image" class="form-control">
                                    @error('sub_image')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject Banner</label>
                                    <input type="file" name="subject_banner" class="form-control">
                                    @error('subject_banner')
                                    <span class="error  text-danger">{{ $message }}</span>
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
@push('page_scripts')

@endpush
