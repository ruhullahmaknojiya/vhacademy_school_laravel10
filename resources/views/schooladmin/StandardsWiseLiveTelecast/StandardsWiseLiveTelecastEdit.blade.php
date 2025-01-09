@extends('layouts.school_admin')



@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">Edit StandardsWiseLiveTelecast</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit StandardsWiseLiveTelecast</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="justify-content-between card-header alert-info d-flex">
                        <h4>Edit StandardsWiseLiveTelecast</h4>
                        <a href="{{ route('live-standardsWise-telecast-url-list') }}" class="btn btn-secondary ms-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form id="updateStandardTelecast" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">Medium Name</label>
                                        <select id="mediumDropdown" name="medium_id" class="form-control">
                                            <option value="">Select Medium</option>
                                            @foreach ($mediums as $medium)
                                            <option value="{{ $medium->id }}" {{ $medium->id == $telecasts->medium_id ? 'selected' : '' }}>
                                                {{ $medium->medium_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span id="MediumIdError" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">Standard Name</label>
                                        <select name="standard_id" id="standard_id" class="form-control">
                                            <option value="">Select Standard</option>

                                        </select>
                                        <span id="StandardIdError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $telecasts->start_date->format('Y-m-d') }}">
                                        <span id="StartDateError" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">End Date</label>
                                        @php
                                        $telecasts->end_date = \Carbon\Carbon::parse($telecasts->end_date);

                                        @endphp
                                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $telecasts->end_date ? $telecasts->end_date->format('Y-m-d') : '' }}">
                                        <span id="EndDateError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form-group">

                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status</option>

                                            <option value="yes" {{ $telecasts->status == 'yes' ? 'selected' :'' }}>Yes</option>
                                            <option value="no" {{ $telecasts->status == 'no' ? 'selected' :'' }}>No</option>
                                        </select>
                                        <span id="StatusError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="live_telecast_url">Live Telecast URL</label>
                                        <input type="url" class="form-control" id="live_telecast_url" name="live_telecast_url" placeholder="Enter the live telecast URL" value="{{ $telecasts->live_telecast_url }}">
                                        <span id="liveTelecastUrlError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label>live Telecast Id</label>
                                        <input type="text" name="live_telecast_id" class="form-control" value="std - {{ $telecasts->id }}">
                                        <span id="liveTelecastIdError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@push('js')

<script>
    $(document).ready(function() {
        $("#updateStandardTelecast").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post"
                , url: "{{ route('standardsWise-telecast-url-update',$telecasts->id) }}"
                , data: $(this).serializeArray()
                , dataType: "json"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('live-standardsWise-telecast-url-list') }}";
                    } else {
                        $("#MediumIdError").text(response.errors.medium_id || "");
                        $("#StandardIdError").text(response.errors.standard_id || "");
                        $("#StartDateError").text(response.errors.start_date || "");
                        $("#EndDateError").text(response.errors.end_date || "");
                        $("#liveTelecastUrlError").text(response.errors.live_telecast_url || "");
                        $("#StatusError").text(response.errors.status || "");
                    }

                }
            });

        });
    });

</script>

<script>
    $(document).ready(function() {
        var selectedStandardId = "{{ $telecasts->class_id }}";

        // Function to load standards based on medium ID
        function loadStandards(mediumId) {
            if (mediumId) {
                $.ajax({
                    url: '/get-standards/' + mediumId
                    , type: 'GET'
                    , dataType: 'json'
                    , success: function(data) {
                        $('#standard_id').empty().append('<option value="">Select Standard</option>');
                        $.each(data, function(key, value) {
                            $('#standard_id').append(
                                '<option value="' + value.id + '" ' +
                                (value.id == selectedStandardId ? 'selected' : '') +
                                '>' + value.standard_name + '</option>'
                            );
                        });
                    }
                    , error: function() {
                        alert('Failed to fetch standards. Please try again.');
                    }
                });
            } else {
                $('#standard_id').empty().append('<option value="">Select Standard</option>');
            }
        }


        var mediumId = $('#mediumDropdown').val();
        if (mediumId) {
            loadStandards(mediumId);
        }

        // Load standards dynamically when medium is changed
        $('#mediumDropdown').on('change', function() {
            loadStandards($(this).val());
        });
    });

</script>



@endpush
