@extends('layouts.superadmin')

@section('content')
    <h1>Edit Provider</h1>
    <form action="{{ route('superadmin.providers.update/$provider', $provider->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $provider->name }}" required>
        </div>
        <div class="form-group">
            <label for="provider_key">Provider Key</label>
            <input type="text" name="provider_key" id="provider_key" class="form-control" value="{{ $provider->provider_key }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="bank" {{ $provider->type == 'bank' ? 'selected' : '' }}>Bank</option>
                <option value="third_party" {{ $provider->type == 'third_party' ? 'selected' : '' }}>Third Party</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Provider</button>
    </form>
@endsection
