@extends('layouts.superadmin')

@section('content')
<div class="container">
    <h1>Register School</h1>
    <form method="POST" action="{{ route('school.register') }}">
        @csrf
        <!-- User details -->
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <!-- School details -->
        <div class="form-group">
            <label for="school_name">School Name</label>
            <input id="school_name" type="text" class="form-control" name="school_name" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input id="address" type="text" class="form-control" name="address" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" type="text" class="form-control" name="phone" required>
        </div>

        <button type="submit" class="btn btn-primary">Register School</button>
    </form>
</div>
@endsection
