@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Edit Fee Group</h1>
    <form action="{{ route('schooladmin.feecollection.feegroup.update', $feegroup->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $feegroup->name }}" required>
        </div>
        <div class="form-group">
            <label for="fees_code">Fees Code</label>
            <input type="text" class="form-control" id="fees_code" name="fees_code" value="{{ $feegroup->fees_code }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $feegroup->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="fee_types">Fee Types</label>
            <select class="form-control" id="fee_types" name="fee_types[]" multiple required>
                @foreach ($feeTypes as $feeType)
                    <option value="{{ $feeType->id }}" {{ in_array($feeType->id, $selectedFeeTypes) ? 'selected' : '' }}>
                        {{ $feeType->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
