@extends('layouts.school_admin')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">


@include('flash-message')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">StandardsWiseLiveTelecast</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">StandardsWiseLiveTelecast</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add StandardsWiseLiveTelecast</h4>
                    </div>
                    <div class="card-body">
                        <form id="StandardWideLiveTelecast" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">Medium Name</label>
                                        <select id="mediumDropdown" name="medium_id" class="form-control">
                                            <option value="">Select Medium</option>
                                            @if($mediums->isNotEmpty())
                                            @foreach ($mediums as $medium)
                                            <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                                            @endforeach
                                            @else
                                            <option value="">Medium Records Not Found</option>
                                            @endif
                                        </select>
                                        <span id="MediumIdError" class="text-danger"></span>
                                        <span id="medium_idError" class="text-danger"></span>
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
                                        <input type="date" name="start_date" id="start_date" class="form-control">
                                        <span id="StartDateError" class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control">
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
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        <span id="StatusError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 form-group">
                                        <label for="live_telecast_url">Live Telecast URL</label>
                                        <input type="url" class="form-control" id="live_telecast_url" name="live_telecast_url" placeholder="Enter the live telecast URL">
                                        <span id="liveTelecastUrlError" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>StandardsWiseLiveTelecast</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Medium Name</th>
                                    <th>Standard Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Live Telecast Url</th>
                                    <th>Live Telecast Id</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($StandardsWiseLiveTelecasts->isNotEmpty())
                                @foreach($StandardsWiseLiveTelecasts as $telecast)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $telecast->medium->medium_name }}</td> <!-- Assuming a relationship -->
                                    <td>{{ $telecast->standard->standard_name }}</td> <!-- Assuming a relationship -->
                                    <td>{{ $telecast->start_date }}</td>
                                    <td>{{ $telecast->end_date }}</td>
                                    <td>
                                        @if ($telecast->status == 'yes')
                                        <span class="badge bg-success status-change" data-id="{{ $telecast->id }}" data-status="no" style="cursor: pointer;">Active</span>
                                        @else
                                        <span class="badge bg-danger status-change" data-id="{{ $telecast->id }}" data-status="yes" style="cursor: pointer;">In-active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($telecast->status=='yes')
                                        <a href="{{ $telecast->live_telecast_url }}" target="_blank">{{ $telecast->live_telecast_url }}</a>
                                        @else
                                        @endif
                                    </td>
                                    <td>{{ $telecast->live_telecast_id }}</td>


                                    <td>{{ \Carbon\Carbon::parse($telecast->created_at)->format('d-M-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($telecast->updated_at)->format('d-M-Y') }}</td>

                                    <td class="d-flex">
                                        <a href="{{ route('standardsWise-telecast-url-edit',$telecast->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('standardsWise-telecast-url-delete', $telecast->id) }}" class="btn btn-danger btn-sm delete-records">Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <h6>No Records Found</h6>
                                    </td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                        <div class="mt-3">
                            {{ $StandardsWiseLiveTelecasts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@endsection

@push('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#mediumDropdown').on('change', function() {
            var mediumId = $(this).val();
            if (mediumId) {
                $.ajax({
                    url: '/get-standards/' + mediumId
                    , type: 'GET'
                    , data: $(this).serializeArray()
                    , dataType: 'json'
                    , success: function(data) {
                        $('#standard_id').empty().append('<option value="">Select Standard</option>');
                        $.each(data, function(key, value) {
                            $('#standard_id').append('<option value="' + value.id + '">' + value.standard_name + '</option>');
                        });
                    }
                    , error: function() {
                        alert('Failed to fetch standards. Please try again.');
                    }
                });
            } else {
                $('#standard_id').empty().append('<option value="">Select Standard</option>');
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        $("#StandardWideLiveTelecast").submit(function(e) {
            e.preventDefault();
            $("button[type=submit]").attr("disabled", true);

            $.ajax({
                type: "POST"
                , url: "{{ route('StandardsWise-telecast-store') }}"
                , data: $(this).serialize()
                , dataType: "json"
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , success: function(response) {
                    $("button[type=submit]").attr("disabled", false);
                    if (response.status === true) {
                        window.location.href = "{{ route('live-standardsWise-telecast-url-list') }}";
                    } else {
                        $("#MediumIdError").text(response.errors.medium_id || "");
                        $("#medium_idError").text(response.errors.medium_id || "");
                        $("#StandardIdError").text(response.errors.standard_id || "");
                        $("#StartDateError").text(response.errors.start_date || "");
                        $("#EndDateError").text(response.errors.end_date || "");
                        $("#liveTelecastUrlError").text(response.errors.live_telecast_url || "");
                        $("#StatusError").text(response.errors.status || "");
                    }
                }
                , error: function() {
                    alert('An error occurred. Please try again.');
                    $("button[type=submit]").attr("disabled", false);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('.status-change').on('click', function() {
            var telecastId = $(this).data('id');
            var newStatus = $(this).data('status');

            Swal.fire({
                title: 'Are you sure?'
                , text: "You want to change the status!"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/update-status', // Replace with your actual route
                        type: 'POST'
                        , data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                            , id: telecastId
                            , status: newStatus
                        }
                        , success: function(response) {
                            if (response.status === true) {
                                Swal.fire(
                                    'Updated!'
                                    , 'The status has been updated.'
                                    , 'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error!', 'Failed to update status.', 'error');
                            }
                        }
                        , error: function() {
                            Swal.fire('Error!', 'An error occurred while updating status.', 'error');
                        }
                    });
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function() {
        $(".delete-records").on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            if (confirm("Are you sure you want to delete this record?")) {


                $.ajax({
                    type: "GET"
                    , url: url
                    , data: $(this).serializeArray()
                    , dataType: "json"
                    , success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('live-standardsWise-telecast-url-list') }}";
                        } else {
                            alert("Failed to delete the record: " + response.message);
                        }
                    }
                    , error: function() {
                        alert("An error occurred while deleting the record.");
                    }
                });
            }

        });
    });

</script>
