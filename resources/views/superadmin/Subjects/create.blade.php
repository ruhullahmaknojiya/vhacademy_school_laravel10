@extends('layouts.superadmin')
@section('title')
    Create Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12">
                    <h1>Create Subject</h1>
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
                            <form method="post" action="{{route('save_Subject')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Subject Information</span><a href="{{route('Subject')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Medium <span class="text-danger">*</span></label>
                                            <select name="medium_id" id="medium" class="form-control">
                                                <option>Select Medium</option>
                                                @foreach($mediums as $medium)
                                                    <option value="{{$medium->id}}" {{ old('medium_id') == $medium->id ? 'selected' : '' }}>{{$medium->medium_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('medium_id')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Standard <span class="text-danger">*</span></label>
                                            <select name="standard_id" id="standard" class="form-control">
                                                <option>Select Standard</option>
                                            </select>
                                            @error('standard_id')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Subject <span class="text-danger">*</span></label>
                                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                                            @error('subject')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                            @error('description')
                                            <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group local-forms">
                                            <label>File Path (PDF)<span class="text-danger">*</span></label>
                                            <input type="file" name="sub_pdf" class="form-control">
                                            @error('sub_pdf')
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
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#medium').on('change', function() {
            var mediumId = $(this).val();
            // Make an AJAX request to get standards based on the selected medium
            $.ajax({
                type: 'GET',
                url: "{{ route('getnewestandard', '') }}/" + mediumId,
                success: function(data) {
                    // Clear existing options
                    $('#standard').empty();
                    $('#standard').append('<option>Select Standard</option>');
                    // Add new options based on the returned data
                    $.each(data, function(key, value) {
                        $('#standard').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                    });
                }
            });
        });

        // Trigger change event to load standards if medium is already selected
        @if(old('medium_id'))
            $('#medium').trigger('change');
        @endif
    });
</script>
@endpush
