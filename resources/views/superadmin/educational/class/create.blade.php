@extends('layouts.superadmin')
@section('title')
    Class-Create
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Class</h1>
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


    <form action="{{ route('superadmin.class.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="form-title"><b>Create Class </b><a class="float-right" href="{{route('superadmin.class.index')}}"><i class="fa fa-arrow-left " style="color:blue;"></i></a></h5>
            </div>
            <div class="col-12 col-sm-4">
        <div class="form-group">
            <label for="class_name">Name</label>
            <input type="text" name="class_name" placeholder="Enter Class Name" class="form-control" required>
        </div>
        </div>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
