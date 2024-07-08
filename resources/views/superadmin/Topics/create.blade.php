@extends('layouts.superadmin')
@section('title')
    Create Chapter
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Create Chapter</h1>
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
                    <form method="post" action="{{route('save_topic')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Chapter Information</span><a href="{{route('topics')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label> Medium <span class="text-danger">*</span></label>
                                    <select type="text" name="medium_id" id="medium" class="form-control">
                                        <option>Select Medium</option>
                                        @foreach($mediums as $medium)
                                            <option value="{{$medium->id}}">
                                                {{$medium->medium_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Standard <span class="text-danger">*</span></label>
                                    <select type="text" name="std_id" id="standard" class="form-control">
                                        <option>Select Standard</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <select type="text" name="sub_id" id="subject" class="form-control">
                                        <option>Select Subject</option>

                                    </select>
                                    @error('sub_id')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic <span class="text-danger">*</span></label>
                                    <input type="text" name="topic" class="form-control">
                                    @error('topic')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Type <span class="text-danger">*</span></label>
                                    <select  name="type" class="form-control">
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
                                    <input type="text" name="description" class="form-control">
                                    @error('description')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Image<span class="text-danger">*</span></label>
                                    <input type="file" name="topic_image" class="form-control">
                                    @error('topic_image')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Topic Banner<span class="text-danger">*</span></label>
                                    <input type="file" name="topic_banner" class="form-control">
                                    @error('topic_banner')
                                    <span class="error  text-danger">{{ $message }}</span>
                                    @enderror
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
@push('js')
    <script>
        $(document).ready(function() {
            $('#medium').on('change', function() {
                var mediumId = $(this).val();

                $.ajax({
                    url: "{{route('get-standards','')}}/" + mediumId,
                    type: 'GET',
                    success: function(data) {
                        $('#standard').empty().append('<option>Select Standard</option>');
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#standard').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            $('#standard').on('change', function() {
                var standardId = $(this).val();

                $.ajax({
                    url: "{{route('get-subjects','')}}/" + standardId,
                    type: 'GET',
                    success: function(data) {
                        $('#subject').empty().append('<option>Select Subject</option>');
                        $.each(data, function(key, value) {
                            $('#subject').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            // Trigger change event to populate standards and subjects dropdown on page load
            $('#medium').trigger('change');
            $('#standard').trigger('change');
        });
    </script>
@endpush
