<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('schooladmin.students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <!-- Show validation errors -->
                        <!-- Show validation errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span></span><a href="{{route('schooladmin.students.index')}}"><i class="fas fa-arrow-left" style="float: right;"></i></a></h5>
                                </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="admission_no">Admission No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('admission_no') is-invalid @enderror" placeholder="Enter Admission No " id="admission_no" name="admission_no" value="{{ old('admission_no') }}" required>
                                    @error('admission_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="roll_number">Roll Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('roll_number') is-invalid @enderror" placeholder="Enter Roll Number " id="roll_number" name="roll_number" value="{{ old('roll_number') }}" required>
                                    @error('roll_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medium_id">Medium <span class="text-danger">*</span></label>
                                    <select class="form-control @error('medium_id') is-invalid @enderror" id="medium_id" name="medium_id" required>
                                        <option value="" >Select Medium</option>
                                        @foreach($mediums as $medium)

                                            <option value="{{ $medium->id }}" {{ old('medium_id') == $medium->id ? 'selected' : '' }}>{{ $medium->medium_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('medium_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="class_id">Class <span class="text-danger">*</span></label>
                                    <select class="form-control @error('class_id') is-invalid @enderror" id="class_id" name="class_id" required>

                                        <option value="" >Select Class</option>
                                        @foreach($standard as $class)
                                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->standard_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="section_id">Section <span class="text-danger">*</span></label>
                                    <select class="form-control @error('section_id') is-invalid @enderror" id="section_id" name="section_id" required>
                                        <option value="" >Select Section</option>
                                        @foreach($classes as $section)
                                            <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->class_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="" >Select Gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name " id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name"  id="last_name" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control  @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                        <option value="" >Select Category</option>
                                        <option value="General" {{ old('category') == 'General' ? 'selected' : '' }}>General</option>
                                        <option value="OBC" {{ old('category') == 'OBC' ? 'selected' : '' }}>OBC</option>
                                        <option value="SC" {{ old('category') == 'SC' ? 'selected' : '' }}>SC</option>
                                        <option value="ST" {{ old('category') == 'ST' ? 'selected' : '' }}>ST</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <input type="text" class="form-control @error('religion') is-invalid @enderror" placeholder="Enter Religion"  id="religion" name="religion" value="{{ old('religion') }}">
                                    @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="caste">Caste</label>
                                    <input type="text" class="form-control @error('caste') is-invalid @enderror" placeholder="Enter Caste" id="caste" name="caste" value="{{ old('caste') }}">
                                    @error('caste')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="Enter Mobile Number"  id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
                                    @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email " id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="admission_date">Admission Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('admission_date') is-invalid @enderror" id="admission_date" name="admission_date" value="{{ old('admission_date') }}" required>
                                    @error('admission_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" class="form-control @error('blood_group') is-invalid @enderror" placeholder="Enter Blood Group "  id="blood_group" name="blood_group" value="{{ old('blood_group') }}">
                                    @error('blood_group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="house">House</label>
                                    <input type="text" class="form-control @error('house') is-invalid @enderror" id="house" name="house" value="{{ old('house') }}">
                                    @error('house')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="height">Height</label>
                                    <input type="text" class="form-control @error('height') is-invalid @enderror" placeholder="Enter Your Height "  id="height" name="height" value="{{ old('height') }}">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror" placeholder="Enter Your Weight " id="weight" name="weight" value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="medical_history">Medical History</label>
                                    <textarea class="form-control @error('medical_history') is-invalid @enderror" id="medical_history" placeholder="Enter Medical History " name="medical_history">{{ old('medical_history') }}</textarea>
                                    @error('medical_history')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_photo">Student Photo</label>
                                    <input type="file" class="form-control @error('student_photo') is-invalid @enderror" id="student_photo" name="student_photo">
                                    @error('student_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="aadharcard_number">Aadharcard Number</label>
                                    <input type="text" class="form-control @error('aadharcard_number') is-invalid @enderror" placeholder="Enter Aadharcard Number" id="aadharcard_number" name="aadharcard_number" value="{{ old('aadharcard_number') }}">
                                    @error('aadharcard_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="current_address">Current Address</label>
                                    <input type="text" class="form-control @error('current_address') is-invalid @enderror" id="current_address" placeholder="Enter Current Address" name="current_address" value="{{ old('current_address') }}">
                                    @error('current_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input type="text" class="form-control @error('permanent_address') is-invalid @enderror" placeholder="Enter Permanent Address" id="permanent_address" name="permanent_address" value="{{ old('permanent_address') }}">
                                    @error('permanent_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        <!-- Parent Details -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name">Father Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" placeholder="Enter Father Name" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_phone">Father Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('father_phone') is-invalid @enderror" placeholder="Enter Father Phone Number" id="father_phone" name="father_phone" value="{{ old('father_phone') }}" required>
                                    @error('father_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_email">Father Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('guardian_email') is-invalid @enderror" placeholder="Enter Father Email" id="guardian_email" name="guardian_email" value="{{ old('guardian_email') }}" required>
                                    @error('guardian_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_occupation">Father Occupation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('father_occupation') is-invalid @enderror" placeholder="Enter Father Occupation" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}" required>
                                    @error('father_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_photo">Father Photo</label>
                                    <input type="file" class="form-control @error('father_photo') is-invalid @enderror"  id="father_photo" name="father_photo">
                                    @error('father_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_name">Mother Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" placeholder="Enter Mother Name" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_phone"> Mother Phone </label>
                                    <input type="text" class="form-control @error('mother_phone') is-invalid @enderror" placeholder="Enter Mother Phone Number" id="mother_phone" name="mother_phone" value="{{ old('mother_phone') }}">
                                    @error('mother_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_occupation">Mother Occupation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('mother_occupation') is-invalid @enderror" placeholder="Enter Mother Occupation" id="mother_occupation" name="mother_occupation" value="{{ old('mother_occupation') }}" required>
                                    @error('mother_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mother_photo">Mother Photo</label>
                                    <input type="file" class="form-control @error('mother_photo') is-invalid @enderror"  id="mother_photo" name="mother_photo">
                                    @error('mother_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_name">Guardian Name </label>
                                    <input type="text" class="form-control @error('guardian_name') is-invalid @enderror" placeholder="Enter Guardian Name" id="guardian_name" name="guardian_name" value="{{ old('guardian_name') }}" >
                                    @error('guardian_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_relation">Guardian Relation </label>
                                    <input type="text" class="form-control @error('guardian_relation') is-invalid @enderror" placeholder="Enter Guardian Relation" id="guardian_relation" name="guardian_relation" value="{{ old('guardian_relation') }}" >
                                    @error('guardian_relation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_phone">Guardian Phone </label>
                                    <input type="text" class="form-control @error('guardian_phone') is-invalid @enderror" placeholder="Enter Guardian Phone Number" id="guardian_phone" name="guardian_phone" value="{{ old('guardian_phone') }}">
                                    @error('guardian_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_occupation">Guardian Occupation</label>
                                    <input type="text" class="form-control @error('guardian_occupation') is-invalid @enderror" placeholder="Enter Guardian Occupation" id="guardian_occupation" name="guardian_occupation" value="{{ old('guardian_occupation') }}">
                                    @error('guardian_occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_address">Guardian Address</label>
                                    <input type="text" class="form-control @error('guardian_address') is-invalid @enderror" placeholder="Enter Guardian Address" id="guardian_address" name="guardian_address" value="{{ old('guardian_address') }}">
                                    @error('guardian_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guardian_photo">Guardian Photo</label>
                                    <input type="file" class="form-control @error('guardian_photo') is-invalid @enderror" id="guardian_photo" name="guardian_photo">
                                    @error('guardian_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                        <!-- Miscellaneous Details -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_account_number">Bank Account Number</label>
                                    <input type="text" class="form-control @error('bank_account_number') is-invalid @enderror" placeholder="Enter Bank Account Number" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number') }}">
                                    @error('bank_account_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror" placeholder="Enter Bank Name"  id="bank_name" name="bank_name" value="{{ old('bank_name') }}">
                                    @error('bank_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ifsc_code">IFSC Code</label>
                                    <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" placeholder="Enter IFSC Code"  id="ifsc_code" name="ifsc_code" value="{{ old('ifsc_code') }}">
                                    @error('ifsc_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="national_identification_number">National Identification Number</label>
                                    <input type="text" class="form-control @error('national_identification_number') is-invalid @enderror" placeholder="Enter National Identification Number" id="national_identification_number" name="national_identification_number" value="{{ old('national_identification_number') }}">
                                    @error('national_identification_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rte">RTE</label>
                                    <select class="form-control @error('rte') is-invalid @enderror" id="rte" name="rte">
                                        <option value="" >Select RTE</option>
                                        <option value="1" {{ old('rte') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('rte') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('rte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="previous_school_details">Previous School Details</label>
                                    <textarea class="form-control @error('previous_school_details') is-invalid @enderror" placeholder="Enter Previous School Details" id="previous_school_details" name="previous_school_details">{{ old('previous_school_details') }}</textarea>
                                    @error('previous_school_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea class="form-control @error('note') is-invalid @enderror" placeholder="Enter Note" id="note" name="note">{{ old('note') }}</textarea>
                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        <!-- Upload Documents -->
                            </div>
                    <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="documents[0][title]">Title</label>
                                    <input type="text" class="form-control @error('documents.0.title') is-invalid @enderror" id="documents[0][title]" name="documents[0][title]">
                                    @error('documents.0.title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="documents[0][file]">Document</label>
                                    <input type="file" class="form-control @error('documents.0.file') is-invalid @enderror" id="documents[0][file]" name="documents[0][file]">
                                    @error('documents.0.file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="documents[1][title]">Title</label>
                                    <input type="text" class="form-control @error('documents.1.title') is-invalid @enderror" id="documents[1][title]" name="documents[1][title]">
                                    @error('documents.1.title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="documents[1][file]">Document</label>
                                    <input type="file" class="form-control @error('documents.1.file') is-invalid @enderror" id="documents[1][file]" name="documents[1][file]">
                                    @error('documents.1.file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                    </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
