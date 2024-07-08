@extends('layouts.school_admin')
@section('title')
    Teacher-Create
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Teacher</h1>
                </div>
                <div class="col-sm-6">

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
            </div>
        </div>
    </div>
    </div>
@endsection
