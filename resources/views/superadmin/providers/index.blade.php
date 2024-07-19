@extends('layouts.superadmin')

@section('content')
    <h1>Providers</h1>
    <a href="{{ route('superadmin.providers.create') }}" class="btn btn-primary">Add Provider</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Provider Key</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
                <tr>
                    <td>{{ $provider->name }}</td>
                    <td>{{ $provider->provider_key }}</td>
                    <td>{{ ucfirst($provider->type) }}</td>
                    <td>
                        <a href="{{ route('superadmin.providers.edit', $provider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('superadmin.providers.destroy', $provider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
