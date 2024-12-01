@extends('layouts.school_admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Back Button -->
            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    <a href="{{ route('schooladmin.students.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to Student List
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Avatar and Name -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            @php
                                // Set default avatar URL
                                $avatarUrl = "https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortFlat&accessoriesType=Round&hairColor=Brown&facialHairType=BeardMedium&facialHairColor=Brown&clotheType=Hoodie&clotheColor=Red&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light";

                                // Customize avatar URL based on gender
                                $gender = strtoupper($student->gender); // Ensure gender is in uppercase

                                if ($gender == 'F' || $gender == 'FEMALE') {
                                    $avatarUrl = "https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Round&hairColor=Brown&facialHairType=Blank&clotheType=Hoodie&clotheColor=Red&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light";
                                } elseif ($gender == 'M' || $gender == 'MALE') {
                                    $avatarUrl = "https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortFlat&accessoriesType=Round&hairColor=Brown&facialHairType=BeardMedium&facialHairColor=Brown&clotheType=Hoodie&clotheColor=Red&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light";
                                }
                            @endphp

                            <img src="{{ $avatarUrl }}" class="rounded-circle mb-3" alt="Cartoon Student" width="150" height="150">
                            <h3 class="mt-2">{{ $student->first_name }} {{ $student->last_name }}</h3>
                            <h3 class="mt-2">( Student )</h3>
                        </div>
                    </div>
                </div>

                <!-- Tabs for Profile, Academic Info, and Other Details -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav Tabs -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="academic-info-tab" data-bs-toggle="tab" href="#academic-info" role="tab" aria-controls="academic-info" aria-selected="false">Academic Info</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="parent-info-tab" data-bs-toggle="tab" href="#parent-info" role="tab" aria-controls="parent-info" aria-selected="false">Parent/Guardian Info</a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content mt-3" id="myTabContent">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><i class="fas fa-calendar-alt"></i> <strong>Admission Date:</strong> {{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</p>
                                            <p><i class="fas fa-calendar-day"></i> <strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') }}</p>
                                            <p><i class="fas fa-list-alt"></i> <strong>Category:</strong> {{ $student->category }}</p>
                                            <p><i class="fas fa-mobile-alt"></i> <strong>Mobile Number:</strong> {{ $student->mobile_number }}</p>
                                            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $student->email }}</p>
                                            <p><i class="fas fa-notes-medical"></i> <strong>Medical History:</strong> {{ $student->medical_history }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><i class="fas fa-users"></i> <strong>Caste:</strong> {{ $student->caste }}</p>
                                            <p><i class="fas fa-praying-hands"></i> <strong>Religion:</strong> {{ $student->religion }}</p>
                                            <p><i class="fas fa-sticky-note"></i> <strong>Note:</strong> {{ $student->note }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Address</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> <strong>Current Address:</strong> {{ $student->current_address }}</p>
                                    <p><i class="fas fa-home"></i> <strong>Permanent Address:</strong> {{ $student->permanent_address }}</p>
                                </div>

                                <!-- Academic Info Tab -->
                                <div class="tab-pane fade" id="academic-info" role="tabpanel" aria-labelledby="academic-info-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Current Class</h5>
                                            @php
                                                $className = $student->class->class_name ?? 'N/A';
                                                $mediumName = $student->medium->medium_name ?? 'N/A';
                                                $standardName = $student->standard->standard_name ?? 'N/A';
                                                $formattedOutput = "{$mediumName} - {$standardName} ({$className})";
                                            @endphp
                                            <p><i class="fas fa-chalkboard"></i>  {{ $formattedOutput }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Parent/Guardian Info Tab -->
                                <div class="tab-pane fade" id="parent-info" role="tabpanel" aria-labelledby="parent-info-tab">
                                  
                                    <p><i class="fas fa-user-tie"></i> <strong>Father Name:</strong> {{ $student->parent->father_name }}</p>
                                    <p><i class="fas fa-phone-alt"></i> <strong>Father Phone:</strong> {{ $student->parent->father_phone }}</p>
                                    <p><i class="fas fa-user-tie"></i> <strong>Mother Name:</strong> {{ $student->parent->mother_name }}</p>
                                    <p><i class="fas fa-phone-alt"></i> <strong>Mother Phone:</strong> {{ $student->parent->mother_phone }}</p>
                                    <p><i class="fas fa-user-tie"></i> <strong>Guardian Name:</strong> {{ $student->parent->guardian_name }}</p>
                                    <p><i class="fas fa-user-shield"></i> <strong>Guardian Relation:</strong> {{ $student->parent->guardian_relation }}</p>
                                    <p><i class="fas fa-envelope"></i> <strong>Guardian Email:</strong> {{ $student->parent->guardian_email }}</p>
                                    <p><i class="fas fa-phone-alt"></i> <strong>Guardian Phone:</strong> {{ $student->parent->guardian_phone }}</p>
                                    <p><i class="fas fa-briefcase"></i> <strong>Guardian Occupation:</strong> {{ $student->parent->guardian_occupation }}</p>
                                    <p><i class="fas fa-map-marker-alt"></i> <strong>Guardian Address:</strong> {{ $student->parent->guardian_address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ensure Bootstrap tabs are working
            var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
            triggerTabList.forEach(function (triggerEl) {
                var tabTrigger = new bootstrap.Tab(triggerEl);

                triggerEl.addEventListener('click', function (event) {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });
        });
    </script>
@endpush

@push('css')
    <style>
        .mt-3 {
            margin-top: 1rem !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .card-body p {
            font-size: 1rem;
            line-height: 1.5;
            text-align: left;
        }
        .card-body h5 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        .card-body strong {
            font-weight: 600;
        }
        .nav-link {
            font-size: 1rem;
        }
        .nav-tabs .nav-item {
            margin-bottom: -1px;
        }
        .btn {
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }
    </style>
@endpush
