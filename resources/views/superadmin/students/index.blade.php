@extends('layouts.superadmin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Students List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Students List</li>
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
                    <form method="GET" action="{{ route('superAdmin-students-index') }}" id="filterForm">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">School Name</label>
                                    <select name="school" id="school" class="form-control">
                                        <option value="">Select School</option>
                                        @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Medium Name</label>
                                    <select name="medium" id="medium" class="form-control">
                                        <option value="">Select Medium</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Standard Name</label>
                                    <select name="standard" id="standard" class="form-control">
                                        <option value="">Select Standard</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="student">Students Name</label>
                                    <select name="student" id="student" class="form-control">
                                        <option value="">Select Students</option>
                                    </select>
                                </div>
                                <div class="mt-3 col-md-2">
                                    <button type="submit" class="mt-2 btn btn-info">Filter</button>
                                <a href="{{ route('superAdmin-students-index') }}" class="mt-2 btn btn-danger">Reset</a>
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
                                    <th>Medium Name</th>
                                    <th>Standard Name</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>MobileNumber</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->school->name }}</td>
                                    <td>{{ $student->medium->medium_name }}</td>
                                    <td>{{ $student->standard->standard_name }}</td>

                                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->mobile_number }}</td>
                                    <td class="d-flex justify-content-between">
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 float-end">
                            {{ $students->links() }}
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
        $('#school').change(function() {
            const schoolId = $(this).val();
            $('#medium').html('<option value="">Select Medium</option>');
            $('#standard').html('<option value="">Select Standard</option>');
            $('#student').html('<option value="">Select Students</option>');

            if (schoolId) {
                $.get(`/get-mediums/${schoolId}`, function(data) {
                    data.forEach(medium => {
                        $('#medium').append(`<option value="${medium.id}">${medium.medium_name}</option>`);
                    });
                });
            }
        });


        $('#medium').change(function() {
            const mediumId = $(this).val();
            $('#standard').html('<option value="">Select Standard</option>');
            $('#student').html('<option value="">Select Students</option>');

            if (mediumId) {
                $.get(`/get-standards/${mediumId}`, function(data) {
                    data.forEach(standard => {
                        $('#standard').append(`<option value="${standard.id}">${standard.standard_name}</option>`);
                    });
                });
            }
        });

        $('#standard').change(function() {
            const standardId = $(this).val();


            $('#student').html('<option value="">Select Students</option>');

            if (standardId) {
                $.get(`/get-students/${standardId}`, function(response) {
                    if (response && response.data.length > 0) {
                        response.data.forEach(student => {
                            $('#student').append(`<option value="${student.id}">${student.first_name} ${student.last_name}</option>`);
                        });
                    } else {

                        $('#student').html('<option value="">No students available</option>');
                    }
                }).fail(function() {
                    alert('Failed to fetch students. Please try again.');
                });
            }
        });


    });

</script>

@endpush
