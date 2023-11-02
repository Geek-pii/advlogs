<div class="form-group">
    @php
        $type = request()->get('type', null);
    @endphp
    <p class="account-type-message font-weight-light @if($type !== 'personal') hidden @endif mb-0 alert alert-warning" data-type="personal">
        <small>
        You chose a Personal Vehicle account meaning you are a private individual requesting
        Advantage Logistics LLC move a personal vehicle on your behalf.. If this is incorrect,
        please change the account type before proceeding.
        </small>
    </p>
    <p class="account-type-message font-weight-light @if($type !== 'business') hidden @endif mb-0 alert alert-warning" data-type="business">
        <small>
        You chose a Business Client account meaning you are a business requesting Advantage Logistics
        LLC move vehicles on behalf of the business. If this is incorrect, please change the account
        type before proceeding.
        </small>
    </p>
    <p class="account-type-message font-weight-light @if($type !== 'carrier') hidden @endif mb-0 alert alert-warning" data-type="carrier">
        <small>
        You chose a Carrier account meaning you are a carrier requesting to move vehicles for Advantage
        Logistics LLC. If this is incorrect, please change the account type before proceeding.
        </small>
    </p>
    <label>Choose Account Type <span class="text-danger">*</span></label>
    <select name="type" class="form-control">
        <option value="0">Select Account Type</option>
        @foreach (\App\Models\Account::$types as $k => $type)
            <option value="{{ $k }}" @if(request()->get('type') == $k) selected="selected" @endif>{{ $type }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>First Name <span class="text-danger">*</span></label>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control"
        placeholder="First Name">
</div>
<div class="form-group">
    <label>Last Name <span class="text-danger">*</span></label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control"
        placeholder="Last Name">
</div>
<div class="form-group personal-fields">
    <label>Primary Contact # <span class="text-danger">*</span></label>
    <input type="text" id="primary_contact_number" name="primary_contact_number"
        value="{{ old('primary_contact_number') }}" class="form-control phone_us" placeholder="XXX-XXX-XXXX" />
</div>
<div class="form-group business-fields">
    <label>Job Title <span class="text-danger">*</span></label>
    <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}" class="form-control"
        placeholder="Job Title">
</div>
<div class="form-group business-fields">
    <label>Business Phone # <span class="text-danger">*</span></label>
    <input type="text" id="business_phone_number" name="business_phone_number"
        value="{{ old('business_phone_number') }}" class="form-control phone_us" placeholder="XXX-XXX-XXXX">
</div>
<div class="form-group business-fields">
    <label>Extension</label>
    <input type="text" id="business_phone_ext" name="business_phone_ext" value="{{ old('business_phone_ext') }}"
        class="form-control" placeholder="XXX">
</div>
<div class="form-group justify-content-between" id="security_field">
    <div class="d-flex">
        <div>
            <label>Confirmation/Security Code <span class="text-danger">*</span></label>
            <input type="text" id="security_code" name="security_code" value="{{ old('security_code') }}"
                class="form-control" placeholder="XXXXXX" minlength="6" maxlength="6">
        </div>
        <div class="input-group-append">
            <span class="input-group-text rounded-pill" id="resend_btn" id="basic-addon2">Re-send</span>
        </div>
    </div>
</div>
<div class="signin-button-wrapper d-flex justify-content-between mt-2 mb-2">
        <button type="button" class="submit-form-button mr-1" id="go_back">Go Back</button>
        <button type="button" class="submit-form-button ml-1" id="confirm">Confirm</button>
</div>
