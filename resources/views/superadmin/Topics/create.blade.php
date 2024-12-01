@extends('layouts.superadmin')
@section('title')
    Create Chapter
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Create Chapter</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('save_topic') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Chapter Information</span><a href="{{ route('topics') }}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Medium <span class="text-danger">*</span></label>
                                            <select name="medium_id" id="medium" class="form-control">
                                                <option>Select Medium</option>
                                                @foreach($mediums as $medium)
                                                    <option value="{{ $medium->id }}" {{ old('medium_id') == $medium->id ? 'selected' : '' }}>
                                                        {{ $medium->medium_name }}
                                                    </option>
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
                                            <select name="std_id" id="standard" class="form-control">
                                                <option>Select Standard</option>
                                            </select>
                                            @error('std_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Subject <span class="text-danger">*</span></label>
                                            <select name="sub_id" id="subject" class="form-control">
                                                <option>Select Subject</option>
                                            </select>
                                            @error('sub_id')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Chapter <span class="text-danger">*</span></label>
                                            <input type="text" name="topic" class="form-control" value="{{ old('topic') }}">
                                            @error('topic')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Chapter Type <span class="text-danger">*</span></label>
                                            <select name="type" class="form-control">
                                                <option>Select Type</option>
                                                <option value="free" {{ old('type') == 'free' ? 'selected' : '' }}>Free</option>
                                                <option value="paid" {{ old('type') == 'paid' ? 'selected' : '' }}>Paid</option>
                                            </select>
                                            @error('type')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                            @error('description')
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function populateStandards(mediumId) {
                if (mediumId) {
                    $.ajax({
                        url: "{{ route('get-standards', '') }}/" + mediumId,
                        type: 'GET',
                        success: function(data) {
                            $('#standard').empty().append('<option>Select Standard</option>');
                            $('#subject').empty().append('<option>Select Subject</option>');
                            $.each(data, function(key, value) {
                                $('#standard').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                }
            }

            function populateSubjects(standardId) {
                if (standardId) {
                    $.ajax({
                        url: "{{ route('get_subjects', '') }}/" + standardId,
                        type: 'GET',
                        success: function(data) {
                            $('#subject').empty().append('<option>Select Subject</option>');
                            $.each(data, function(key, value) {
                                $('#subject').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                }
            }

            $('#medium').on('change', function() {
                var mediumId = $(this).val();
                populateStandards(mediumId);
            });

            $('#standard').on('change', function() {
                var standardId = $(this).val();
                populateSubjects(standardId);
            });

            // Trigger change events to populate standards and subjects dropdowns on page load if old values are present
            var oldMediumId = '{{ old('medium_id') }}';
            var oldStandardId = '{{ old('std_id') }}';

            if (oldMediumId) {
                populateStandards(oldMediumId);
                setTimeout(function() {
                    $('#medium').val(oldMediumId).trigger('change');
                }, 500);
            }

            if (oldStandardId) {
                setTimeout(function() {
                    $('#standard').val(oldStandardId).trigger('change');
                }, 500);
            }
        });
    </script>
@endpush
