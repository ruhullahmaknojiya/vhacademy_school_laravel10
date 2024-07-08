@extends('layouts.school_admin')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Add New Teacher</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('schooladmin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @include('schooladmin.teachers.teacherdetails')
                    </div>

                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
