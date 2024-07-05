@extends('layouts.school_admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: black; color: white;">
                    <h2 class="card-title" style="font-family: 'Arial', sans-serif;">Student Registration Form</h2>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary float-right" style="background-color:white;color:black">Back</a>
                </div>
                <form method="POST" action="{{ route('students.store') }}" novalidate>
                    @csrf
                    <!-- Link Parent -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="parent_search" style="font-family: 'Arial', sans-serif;">Search by Email or Phone</label>
                                    <input id="parent_search" type="text" class="form-control" name="parent_search">
                                    <div class="invalid-feedback">
                                        Please provide an email or phone number to search.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-end">
                                <button type="button" class="btn btn-primary w-100" style="background-color: black; color: white;">Search Parent</button>
                            </div>
                        </div>
                        <div class="row" id="parent_info" style="display: none;">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Parent Found: <span id="parent_name"></span>
                                    <input type="hidden" name="parent_id" id="parent_id">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Student details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" style="font-family: 'Arial', sans-serif;">First Name</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                                    <div class="invalid-feedback">
                                        Please provide a first name.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" style="font-family: 'Arial', sans-serif;">Last Name</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" required>
                                    <div class="invalid-feedback">
                                        Please provide a last name.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="font-family: 'Arial', sans-serif;">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" style="font-family: 'Arial', sans-serif;">Phone</label>
                                    <input id="phone" type="tel" class="form-control" name="phone" pattern="^\d{10}$" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob" style="font-family: 'Arial', sans-serif;">Date of Birth</label>
                                    <input id="dob" type="date" class="form-control" name="dob" required>
                                    <div class="invalid-feedback">
                                        Please provide a date of birth.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" style="font-family: 'Arial', sans-serif;">Gender</label>
                                    <select id="gender" class="form-control" name="gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a gender.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Address details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_country" style="font-family: 'Arial', sans-serif;">Current Country</label>
                                    <input id="current_country" type="text" class="form-control" name="current_country" required>
                                    <div class="invalid-feedback">
                                        Please provide a country.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_state" style="font-family: 'Arial', sans-serif;">Current State</label>
                                    <input id="current_state" type="text" class="form-control" name="current_state" required>
                                    <div class="invalid-feedback">
                                        Please provide a state.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_city" style="font-family: 'Arial', sans-serif;">Current City</label>
                                    <input id="current_city" type="text" class="form-control" name="current_city" required>
                                    <div class="invalid-feedback">
                                        Please provide a city.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="current_zipcode" style="font-family: 'Arial', sans-serif;">Current Zip Code</label>
                                    <input id="current_zipcode" type="text" class="form-control" name="current_zipcode" required>
                                    <div class="invalid-feedback">
                                        Please provide a zip code.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_full_address" style="font-family: 'Arial', sans-serif;">Current Full Address</label>
                                    <textarea id="current_full_address" class="form-control" name="current_full_address" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a full address.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Home Address details -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="home_country" style="font-family: 'Arial', sans-serif;">Home Country</label>
                                    <input id="home_country" type="text" class="form-control" name="home_country" required>
                                    <div class="invalid-feedback">
                                        Please provide a country.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="home_state" style="font-family: 'Arial', sans-serif;">Home State</label>
                                    <input id="home_state" type="text" class="form-control" name="home_state" required>
                                    <div class="invalid-feedback">
                                        Please provide a state.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="home_city" style="font-family: 'Arial', sans-serif;">Home City</label>
                                    <input id="home_city" type="text" class="form-control" name="home_city" required>
                                    <div class="invalid-feedback">
                                        Please provide a city.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="home_zipcode" style="font-family: 'Arial', sans-serif;">Home Zip Code</label>
                                    <input id="home_zipcode" type="text" class="form-control" name="home_zipcode" required>
                                    <div class="invalid-feedback">
                                        Please provide a zip code.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="home_full_address" style="font-family: 'Arial', sans-serif;">Home Full Address</label>
                                    <textarea id="home_full_address" class="form-control" name="home_full_address" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a full address.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary float-right" style="background-color: black; color: white;width: 250px;">Register Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    // Handle parent search
    document.querySelector('button[type="button"]').addEventListener('click', function() {
        // Simulate a search function - replace with actual search logic
        let searchValue = document.getElementById('parent_search').value;
        if (searchValue) {
            // Simulate finding a parent
            document.getElementById('parent_info').style.display = 'block';
            document.getElementById('parent_name').innerText = "John Doe (Simulated)";
            document.getElementById('parent_id').value = 123; // Simulated parent ID
        }
    });
</script>
@endsection
