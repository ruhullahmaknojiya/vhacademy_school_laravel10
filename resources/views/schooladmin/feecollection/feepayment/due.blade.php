@extends('layouts.school_admin')

@section('content')

<div class="container">
    <h2>Due Fees</h2>
    <form action="{{ route('schooladmin.feecollection.feepayment.dueFees') }}" method="GET" class="mb-4">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="medium_id">Medium</label>
                <select name="medium_id" id="medium_id" class="form-control">
                    <option value="">Select Medium</option>
                    @foreach($mediums as $medium)
                        <option value="{{ $medium->id }}">{{ $medium->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="standard_id">Standard</label>
                <select name="standard_id" id="standard_id" class="form-control">
                    <option value="">Select Standard</option>
                    @foreach($standards as $standard)
                        <option value="{{ $standard->id }}">{{ $standard->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="class_id">Class</label>
                <select name="class_id" id="class_id" class="form-control">
                    <option value="">Select Class</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <h3>Students with Due Fees</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Medium</th>
                <th>Standard</th>
                <th>Class</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->medium->name }}</td>
                    {{-- <td>{{ $student->standard->name }}</td> --}}
                    <td>{{ $student->class->name }}</td>
                    <td>
                        <a href="" class="btn btn-primary">Collect Fee</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
