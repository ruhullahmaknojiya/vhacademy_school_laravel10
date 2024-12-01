@extends('layouts.school_admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <!-- Back Button -->
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                <a href="{{ route('schooladmin.teachers.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Teacher List
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
                            if ($teacher->gender == 'Female') {
                                $avatarUrl = "https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Round&hairColor=Brown&facialHairType=Blank&clotheType=Hoodie&clotheColor=Red&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light";
                            } elseif ($teacher->gender == 'Male') {
                                $avatarUrl = "https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortFlat&accessoriesType=Round&hairColor=Brown&facialHairType=BeardMedium&facialHairColor=Brown&clotheType=Hoodie&clotheColor=Red&eyeType=Happy&eyebrowType=Default&mouthType=Smile&skinColor=Light";
                            }
                        @endphp

                        <img src="{{ $avatarUrl }}" class="rounded-circle mb-3" alt="Cartoon Teacher" width="150" height="150">
                        <h3 class="mt-2">{{ $teacher->first_name }} {{ $teacher->last_name }}</h3>
                    </div>
                </div>
            </div>

            <!-- Tabs for Profile, Academic Info, and Bank Account -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Basic Info</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="academic-info-tab" data-bs-toggle="tab" href="#academic-info" role="tab" aria-controls="academic-info" aria-selected="false">Academic Info</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="bank-account-tab" data-bs-toggle="tab" href="#bank-account" role="tab" aria-controls="bank-account" aria-selected="false">Bank Account</a>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <!-- Basic Info Tab -->
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $teacher->email }}</p>
                                        <p><i class="fas fa-phone"></i> <strong>Phone:</strong> {{ $teacher->phone }}</p>
                                        <p><i class="fas fa-calendar-day"></i> <strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($teacher->date_of_birth)->format('d M Y') }}</p>
                                        <p><i class="fas fa-calendar-check"></i> <strong>Date of Joining:</strong> {{ \Carbon\Carbon::parse($teacher->date_of_joining)->format('d M Y') }}</p>
                                        <p><i class="fas fa-briefcase"></i> <strong>Work Experience:</strong> {{ $teacher->work_experience }}</p>
                                        <p><i class="fas fa-graduation-cap"></i> <strong>Qualification:</strong> 
                                            @if(is_array($teacher->qualification))
                                                {{ implode(', ', $teacher->qualification) }}
                                            @else
                                                {{ $teacher->qualification }}
                                            @endif
                                        </p>
                                        <p><i class="fas fa-phone-alt"></i> <strong>Emergency Contact:</strong> {{ $teacher->emergency_contact_number }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><i class="fas fa-home"></i> <strong>Current Address:</strong> {{ $teacher->current_address }}</p>
                                        <p><i class="fas fa-home"></i> <strong>Permanent Address:</strong> {{ $teacher->permanent_address }}</p>
                                        <p><i class="fas fa-sticky-note"></i> <strong>Note:</strong> {{ $teacher->note }}</p>
                                        <p><i class="fas fa-calendar-times"></i> <strong>Date of Leaving:</strong> {{ $teacher->date_of_leaving ? \Carbon\Carbon::parse($teacher->date_of_leaving)->format('d M Y') : '-' }}</p>
                                        <p><i class="fas fa-map-marker-alt"></i> <strong>Work Location:</strong> {{ $teacher->work_location }}</p>
                                        <p><i class="fas fa-calendar-clock"></i> <strong>Work Shift:</strong> {{ $teacher->work_shift }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Academic Info Tab -->
                            <div class="tab-pane fade" id="academic-info" role="tabpanel" aria-labelledby="academic-info-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Subjects Assigned</h5>
                                        @if($teacher->subjects->isEmpty())
                                            <p>Subject not assigned.</p>
                                        @else
                                            <ul>
                                                @foreach($teacher->subjects as $subject)
                                                    <li>{{ $subject->subject }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Class Teacher Assignments</h5>
                                        @if($teacher->classTeacherAssignments->isEmpty())
                                            <p>Hi/She is not assigned to any class as a teacher.</p>
                                        @else
                                            <ul>
                                                @foreach($teacher->classTeacherAssignments as $assignment)
                                                    @php
                                                        // Extract the class, medium, and standard information
                                                        $className = $assignment->class->class_name ?? 'N/A';
                                                        $mediumName = $assignment->medium->medium_name ?? 'N/A';
                                                        $standardName = $assignment->standard->standard_name ?? 'N/A';

                                                        // Format the output
                                                        $formattedOutput = "{$mediumName} - {$standardName} ({$className})";
                                                    @endphp
                                                    <li>{{ $formattedOutput }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Account Tab -->
                            <div class="tab-pane fade" id="bank-account" role="tabpanel" aria-labelledby="bank-account-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><i class="fas fa-university"></i> <strong>Account Title:</strong> {{ $teacher->account_title }}</p>
                                        <p><i class="fas fa-bank"></i> <strong>Bank Account Number:</strong> {{ $teacher->bank_account_number }}</p>
                                        <p><i class="fas fa-building"></i> <strong>Bank Name:</strong> {{ $teacher->bank_name }}</p>
                                        <p><i class="fas fa-code"></i> <strong>IFSC Code:</strong> {{ $teacher->ifsc_code }}</p>
                                        <p><i class="fas fa-map-pin"></i> <strong>Bank Branch Name:</strong> {{ $teacher->bank_branch_name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><i class="fas fa-credit-card"></i> <strong>PAN Number:</strong> {{ $teacher->pan_number }}</p>
                                        <p><i class="fas fa-cogs"></i> <strong>EPF No:</strong> {{ $teacher->epf_no }}</p>
                                        <p><i class="fas fa-file-contract"></i> <strong>Contract Type:</strong> {{ $teacher->contract_type }}</p>
                                        <p><i class="fas fa-money-bill-alt"></i> <strong>Basic Salary:</strong> {{ $teacher->basic_salary }}</strong></p>
                                    </div>
                                </div>
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

