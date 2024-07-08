@extends('layouts.school_admin')

@section('content')
<div class="container">
    <h1>Edit Fee Assignment</h1>
    <form action="{{ route('schooladmin.feecollection.feesassign.update', $feeassignment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fee_group_id">Fee Group</label>
            <select class="form-control" id="fee_group_id" name="fee_group_id" required>
                <option value="">Select</option>
                @foreach ($feeGroups as $feeGroup)
                    <option value="{{ $feeGroup->id }}" {{ $feeassignment->fee_group_id == $feeGroup->id ? 'selected' : '' }}>
                        {{ $feeGroup->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fees_master_id">Fee Type</label>
            <select class="form-control" id="fees_master_id" name="fees_master_id" required>
                <option value="">Select</option>
                @foreach ($feesMasters as $feesMaster)
                    <option value="{{ $feesMaster->id }}" {{ $feeassignment->fees_master_id == $feesMaster->id ? 'selected' : '' }}>
                        {{ $feesMaster->feeType->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="medium_id">Medium</label>
            <select class="form-control" id="medium_id" name="medium_id" required>
                <option value="">Select</option>
                @foreach ($mediums as $medium)
                    <option value="{{ $medium->id }}" {{ $feeassignment->medium_id == $medium->id ? 'selected' : '' }}>
                        {{ $medium->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="standard_id">Class</label>
            <select class="form-control" id="standard_id" name="standard_id" required>
                <option value="">Select</option>
                @foreach ($standards as $standard)
                    <option value="{{ $standard->id }}" {{ $feeassignment->standard_id == $standard->id ? 'selected' : '' }}>
                        {{ $standard->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="section_id">Section</label>
            <select class="form-control" id="section_id" name="section_id" required>
                <option value="">Select</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ $feeassignment->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
