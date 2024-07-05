@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Create New Standard</h1>
    <form action="{{ route('superadmin.standard.store') }}" method="POST">
        @csrf
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
            <input type="text" name="standard_name" id="standard_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
