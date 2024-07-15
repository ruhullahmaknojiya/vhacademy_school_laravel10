@extends('layouts.superadmin')
@section('title')
    Edit Subject
@endsection
@section('content')
    @include('flash-message')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Edit Subject</h1>
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
                            <form method="post" action="{{ route('update_Subject', $edit_subject->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title">
                                            <span>Subject Information</span>
                                            <a href="{{ route('subjects') }}">
                                                <i class="fas fa-arrow-left" style="float: right;"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Medium <span class="text-danger">*</span></label>
                                            <select name="medium_id" id="medium" class="form-control">
                                                <option>Select Medium</option>
                                                @foreach($mediums as $medium)
                                                    <option value="{{ $medium->id }}" {{ $medium->id == $edit_subject->standard->medium_id ? 'selected' : '' }}>
                                                        {{ $medium->medium_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4" id="stdshow">
                                        <div class="form-group local-forms">
                                            <label>Standard<span class="text-danger">*</span></label>
                                            <select name="std_id" class="form-control" id="standard">
                                                <option>Select Standard</option>
                                                @foreach($standars as $standar)
                                                    <option value="{{ $standar->id }}" {{ $standar->id == $edit_subject->std_id ? 'selected' : '' }}>
                                                        {{ $standar->standard_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Subject <span class="text-danger">*</span></label>
                                            <input type="text" name="subject" class="form-control" value="{{ $edit_subject->subject }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Subject Code <span class="text-danger">*</span></label>
                                            <input type="text" name="subject_code" class="form-control" value="{{ $edit_subject->subject_code }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <input type="text" name="description" class="form-control" value="{{ $edit_subject->description }}">
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
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            function getStandards(mediumId, selectedStandardId) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('getstandard', '') }}/" + mediumId,
                    success: function(data) {
                        $('#standard').empty();
                        $('#standard').append('<option>Select Standard</option>');

                        $.each(data, function(key, value) {
                            $('#standard').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                        });

                        if (selectedStandardId) {
                            $('#standard').val(selectedStandardId);
                        }
                    }
                });
            }

            var initialMediumId = "{{ old('medium_id', $edit_subject->standard->medium_id) }}";
            var initialStandardId = "{{ old('std_id', $edit_subject->std_id) }}";

            $('#medium').val(initialMediumId);
            getStandards(initialMediumId, initialStandardId);

            $('#medium').on('change', function() {
                var mediumId = $(this).val();
                getStandards(mediumId, null);
            });
        });
    </script>
@endpush
