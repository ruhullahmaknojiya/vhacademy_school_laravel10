@extends('layouts.school_admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="path_to_student_image" class="rounded-circle" alt="Student Photo" width="150" height="150">
                    <h3>{{ $student->first_name }} {{ $student->last_name }}</h3>
                    <p>Admission No: <strong>{{ $student->admission_no }}</strong></p>
                    <p>Roll Number: <strong>{{ $student->roll_number }}</strong></p>
                    {{-- <p>Class: <strong>{{ $student->class->standard_name }}</strong></p> --}}
                    {{-- <p>Section: <strong>{{ $student->section->standard_name }}</strong></p> --}}
                    <p>RTE: <strong>{{ $student->rte ? 'Yes' : 'No' }}</strong></p>
                    <p>Gender: <strong>{{ $student->gender }}</strong></p>
                    <p>Barcode: <strong>{{ $student->barcode }}</strong></p>
                    <p>QR Code: <strong>{{ $student->qrcode }}</strong></p>
                    <p>Behaviour Score: <strong>{{ $student->behaviour_score }}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <!-- Add other tabs here -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p>Admission Date: <strong>{{ $student->admission_date }}</strong></p>
                                    <p>Date of Birth: <strong>{{ $student->date_of_birth }}</strong></p>
                                    <p>Category: <strong>{{ $student->category }}</strong></p>
                                    <p>Mobile Number: <strong>{{ $student->mobile_number }}</strong></p>
                                    <p>Email: <strong>{{ $student->email }}</strong></p>
                                    <p>Medical History: <strong>{{ $student->medical_history }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Caste: <strong>{{ $student->caste }}</strong></p>
                                    <p>Religion: <strong>{{ $student->religion }}</strong></p>
                                    <p>Note: <strong>{{ $student->note }}</strong></p>
                                </div>
                            </div>
                            <hr>
                            <h4>Address</h4>
                            <p>Current Address: <strong>{{ $student->current_address }}</strong></p>
                            <p>Permanent Address: <strong>{{ $student->permanent_address }}</strong></p>
                            <hr>
                            <h4>Parent/Guardian Detail</h4>
                            <p>Father Name: <strong>{{ $student->parent->father_name }}</strong></p>
                            <p>Father Phone: <strong>{{ $student->parent->father_phone }}</strong></p>
                            <p>Mother Name: <strong>{{ $student->parent->mother_name }}</strong></p>
                            <p>Mother Phone: <strong>{{ $student->parent->mother_phone }}</strong></p>
                            <p>Guardian Name: <strong>{{ $student->parent->guardian_name }}</strong></p>
                            <p>Guardian Relation: <strong>{{ $student->parent->guardian_relation }}</strong></p>
                            <p>Guardian Email: <strong>{{ $student->parent->guardian_email }}</strong></p>
                            <p>Guardian Phone: <strong>{{ $student->parent->guardian_phone }}</strong></p>
                            <p>Guardian Occupation: <strong>{{ $student->parent->guardian_occupation }}</strong></p>
                            <p>Guardian Address: <strong>{{ $student->parent->guardian_address }}</strong></p>
                        </div>
                        <!-- Add other tab contents here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
