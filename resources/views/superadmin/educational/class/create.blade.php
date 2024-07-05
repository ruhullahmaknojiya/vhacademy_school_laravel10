@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Create New Class</h1>
    <form action="{{ route('superadmin.class.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="class_name">Name</label>
            <input type="text" name="class_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
