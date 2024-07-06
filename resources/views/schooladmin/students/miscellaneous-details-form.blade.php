<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number') }}">
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
            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" value="{{ old('bank_name') }}">
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
            <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" id="ifsc_code" name="ifsc_code" value="{{ old('ifsc_code') }}">
            @error('ifsc_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="national_identification_number">National Identification Number</label>
            <input type="text" class="form-control @error('national_identification_number') is-invalid @enderror" id="national_identification_number" name="national_identification_number" value="{{ old('national_identification_number') }}">
            @error('national_identification_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="local_identification_number">Local Identification Number</label>
            <input type="text" class="form-control @error('local_identification_number') is-invalid @enderror" id="local_identification_number" name="local_identification_number" value="{{ old('local_identification_number') }}">
            @error('local_identification_number')
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
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="previous_school_details">Previous School Details</label>
            <textarea class="form-control @error('previous_school_details') is-invalid @enderror" id="previous_school_details" name="previous_school_details">{{ old('previous_school_details') }}</textarea>
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
            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note">{{ old('note') }}</textarea>
            @error('note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
