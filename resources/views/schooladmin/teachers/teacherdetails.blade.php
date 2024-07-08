<fieldset class="border p-2 mb-3">
    <legend class="w-auto">Personal Details:</legend>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
    </div>
    <div class="form-group">
        <label for="father_name">Father Name</label>
        <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
    </div>
    <div class="form-group">
        <label for="mother_name">Mother Name</label>
        <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="marital_status">Marital Status</label>
        <select class="form-control" id="marital_status" name="marital_status" required>
            <option value="Married">Married</option>
            <option value="Single">Single</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select>
    </div>
    <legend class="w-auto">Contact Details:</legend>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
    </div>
    <div class="form-group">
        <label for="emergency_contact_number">Emergency Contact Number</label>
        <input type="text" class="form-control" id="emergency_contact_number" name="emergency_contact_number" value="{{ old('emergency_contact_number') }}" required>
    </div>
    <div class="form-group">
        <label for="current_address">Current Address</label>
        <input type="text" class="form-control" id="current_address" name="current_address" value="{{ old('current_address') }}" required>
    </div>
    <div class="form-group">
        <label for="permanent_address">Permanent Address</label>
        <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{ old('permanent_address') }}" required>
    </div>
</fieldset>
<fieldset class="border p-2">
    <legend class="w-auto">Professional Details:</legend>

    <div class="form-group">
        <label for="designation">Designation</label>
        <select class="form-control" id="designation" name="designation" required>
            <option value="Faculty">Faculty</option>
            <option value="Assistant Professor">Assistant Professor</option>
            <option value="Associate Professor">Associate Professor</option>
            <option value="Professor">Professor</option>
            <!-- Add more designations as needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="department">Department</label>
        <select class="form-control" id="department" name="department" required>
            <option value="Academic">Academic</option>
            <option value="Administration">Administration</option>
            <!-- Add more departments as needed -->
        </select>
    </div>
    <div class="form-group">
        <label for="qualification">Qualification</label>
        <input type="text" class="form-control" id="qualification" name="qualification" value="{{ old('qualification') }}" required>
    </div>
    <div class="form-group">
        <label for="work_experience">Work Experience</label>
        <input type="text" class="form-control" id="work_experience" name="work_experience" value="{{ old('work_experience') }}" required>
    </div>
    <div class="form-group">
        <label for="date_of_joining">Date of Joining</label>
        <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" value="{{ old('date_of_joining') }}" required>
    </div>
    <div class="form-group">
        <label for="contract_type">Contract Type</label>
        <input type="text" class="form-control" id="contract_type" name="contract_type" value="{{ old('contract_type') }}" required>
    </div>
    <div class="form-group">
        <label for="basic_salary">Basic Salary</label>
        <input type="number" class="form-control" id="basic_salary" name="basic_salary" value="{{ old('basic_salary') }}" required>
    </div>
    <div class="form-group">
        <label for="work_shift">Work Shift</label>
        <input type="text" class="form-control" id="work_shift" name="work_shift" value="{{ old('work_shift') }}" required>
    </div>
    <div class="form-group">
        <label for="work_location">Work Location</label>
        <input type="text" class="form-control" id="work_location" name="work_location" value="{{ old('work_location') }}" required>
    </div>
    <div class="form-group">
        <label for="date_of_leaving">Date of Leaving</label>
        <input type="date" class="form-control" id="date_of_leaving" name="date_of_leaving" value="{{ old('date_of_leaving') }}">
    </div>
</fieldset>


<fieldset class="border p-2">
    <legend class="w-auto">Additional Details:</legend>
    <div class="form-group">
        <label for="note">Note</label>
        <textarea class="form-control" id="note" name="note">{{ old('note') }}</textarea>
    </div>
    <div class="form-group">
        <label for="pan_number">PAN Number</label>
        <input type="text" class="form-control" id="pan_number" name="pan_number" value="{{ old('pan_number') }}" required>
    </div>
    <div class="form-group">
        <label for="epf_no">EPF Number</label>
        <input type="text" class="form-control" id="epf_no" name="epf_no" value="{{ old('epf_no') }}">
    </div>
    <div class="form-group">
        <label for="account_title">Account Title</label>
        <input type="text" class="form-control" id="account_title" name="account_title" value="{{ old('account_title') }}" required>
    </div>
    <div class="form-group">
        <label for="bank_account_number">Bank Account Number</label>
        <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number') }}" required>
    </div>
    <div class="form-group">
        <label for="bank_name">Bank Name</label>
        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" required>
    </div>
    <div class="form-group">
        <label for="ifsc_code">IFSC Code</label>
        <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="{{ old('ifsc_code') }}" required>
    </div>
    <div class="form-group">
        <label for="bank_branch_name">Bank Branch Name</label>
        <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name" value="{{ old('bank_branch_name') }}" required>
    </div>
    <div class="form-group">
        <label for="facebook_url">Facebook URL</label>
        <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url') }}">
    </div>
    <div class="form-group">
        <label for="twitter_url">Twitter URL</label>
        <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url') }}">
    </div>
    <div class="form-group">
        <label for="linkedin_url">LinkedIn URL</label>
        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}">
    </div>
    <div class="form-group">
        <label for="instagram_url">Instagram URL</label>
        <input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ old('instagram_url') }}">
    </div>
</fieldset>
