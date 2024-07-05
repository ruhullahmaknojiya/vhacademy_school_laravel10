@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Edit Medium</h1>
    <form action="{{ route('superadmin.medium.update', $medium->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $medium->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
