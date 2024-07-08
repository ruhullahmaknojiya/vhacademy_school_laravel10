@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Add Fee Type</h1>
    <form action="{{ route('schooladmin.feecollection.feetype.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="fees_code">Fees Code</label>
            <input type="text" class="form-control" id="fees_code" name="fees_code" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection