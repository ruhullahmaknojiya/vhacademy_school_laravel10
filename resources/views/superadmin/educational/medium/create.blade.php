@extends('layouts.superadmin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Medium</h1>
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
    <h1></h1>
    <form action="{{ route('superadmin.medium.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="form-title"><b>Create New Medium</b><a href="{{route('superadmin.medium.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
            </div>
        <div class="form-group col-md-4">
            <label for="medium_name">Name</label>
            <input type="text" name="medium_name" placeholder="Enter Medium" class="form-control" required>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
