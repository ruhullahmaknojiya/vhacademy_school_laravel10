@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Create New Medium</h1>
    <form action="{{ route('superadmin.medium.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="medium_name">Name</label>
            <input type="text" name="medium_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
