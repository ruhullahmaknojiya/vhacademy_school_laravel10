@extends('layouts.superadmin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Teachers List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Teachers List</li>
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

                    <form method="GET" action="{{ route('superAdmin-teachers-index') }}">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">School Name</label>
                                    <select name="school" id="school" class="form-control">
                                        <option value="">Select School</option>
                                        @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="">Teachers Name</label>
                                    <select name="teacher" id="teacher" class="form-control">
                                        <option value="">Select Teachers</option>
                                    </select>
                                </div>
                                <div class="mt-3 col-md-2">
                                    <button type="submit" class="mt-2 btn btn-info">Filter</button>
                                    <a href="{{ route('superAdmin-teachers-index') }}" class="mt-2 btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>School Name</th>
                                    <th>Teachers Name</th>
                                    <th>Email</th>
                                    <th>MobileNumber</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->school->name }}</td>

                                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 float-end">
                            {{ $teachers->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection


@push('js')

<script>
    $(document).ready(function() {
        // School dropdown change
        $('#school').change(function() {
            const schoolId = $(this).val();
            // Reset dependent dropdowns
            $('#teacher').html('<option value="">Select Teachers</option>');

            if (schoolId) {
                // Fetch mediums based on selected school
                $.get(`/get-teachers/${schoolId}`, function(data) {
                    if (data.length > 0) {
                        data.forEach(teacher => {
                            $('#teacher').append(`<option value="${teacher.id}">${teacher.first_name} ${teacher.last_name}</option>`);
                        });
                    } else {
                        $('#teacher').empty().append('<option value="">No Teachers Records Found for this School</option>');
                    }
                }).fail(function() {
                    alert("Error fetching teachers. Please try again.");
                });
            }
        });

    });

</script>




@endpush
