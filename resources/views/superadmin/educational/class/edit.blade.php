@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Edit Class</h1>
    <form action="{{ route('superadmin.class.update', $class->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $class->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
