@extends('front.layouts.app')

@section('frontend-content')

<div class="container py-5">
    <div class="row align-items-center">
        <!-- Left Side: Image -->
        <div class="mb-4 col-lg-6">
            <img src="{{ asset('images/logo.png') }}" alt="About Our School" class="rounded shadow-lg img-fluid">
        </div>

        <!-- Right Side: Content -->
        <div class="mt-3 col-lg-6">
            <h2 class="mt-3 text-primary">About Our School</h2>
            <p class="mt-3 lead">
                Welcome to <strong>XYZ School</strong>, where learning meets excellence. Our institution is dedicated to fostering a nurturing and challenging environment that inspires students to reach their full potential.
            </p>
            <p>
                Established in <strong>2005</strong>, our school has consistently provided high-quality education, modern teaching methods, and a diverse curriculum that caters to both academics and extracurricular activities.
            </p>
            <p>
                Our mission is to shape young minds with values, knowledge, and skills to succeed in their future careers. Join us in building a brighter future for the next generation!
            </p>
            <a href="{{ route('contact') }}" class="mt-3 btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>

<!-- Extra Section (Optional) -->
<div class="container my-5">
    <div class="text-center row">
        <div class="col-md-4">
            <h3 class="text-success">20+</h3>
            <p>Years of Excellence</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-success">5000+</h3>
            <p>Students Enrolled</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-success">100%</h3>
            <p>Board Exam Success Rate</p>
        </div>
    </div>
</div>

@endsection
