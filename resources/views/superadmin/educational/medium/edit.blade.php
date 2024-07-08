@extends('layouts.superadmin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Medium</h1>
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
    <form action="{{ route('superadmin.medium.update', $medium->id) }}" method="POST">


        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="form-title"><b>Edit Medium</b><a href="{{route('superadmin.medium.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
            </div>
        <div class="form-group col-md-4">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $medium->medium_name }}" required>
        </div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
