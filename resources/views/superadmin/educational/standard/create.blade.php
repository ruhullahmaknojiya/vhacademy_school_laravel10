@extends('layouts.superadmin')
@section('title')
    Standard-Create
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Standard</h1>
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

    <form action="{{ route('superadmin.standard.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 mb-4">
                <h5 class="form-title"><b>Create Standard</b><a class="float-right" href="{{route('superadmin.standard.index')}}"><i class="fa fa-arrow-left " style="color:blue;"></i></a></h5>
            </div>
            <div class="col-12 col-sm-4">
        <div class="form-group">
            <label for="medium_id">Medium:</label>
            <select name="medium_id" id="medium_id" class="form-control">
                @foreach ($mediums as $medium)
                    <option value="{{ $medium->id }}">{{ $medium->medium_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="standard_name">Standard Name:</label>
            <input type="text" name="standard_name" placeholder="Enter Standard Name" id="standard_name" class="form-control" required>
        </div>
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
    </div>
@endsection
