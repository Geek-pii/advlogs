@php
    $bzManagerContacts = $companyContacts->filter(function ($value, $key) {
        return $value->hasRole('ops.mgr');
    });
    $bzManagerContact = $bzManagerContacts->first();
@endphp
<div class="row">
    <div class="col-md-12">
        <h4>Owner or Operations Manager</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="contact-para">A Client Agreement must be signed by an Owner or Operations Manager with the legal
            authority to act on behalf of the company and to accept the terms of the Client Agreement.<br>Please
            enter
            the contact information for the appropriate person.</p>
        <div class="boxes">
            <input type="checkbox" id="have-authority-checkbox" name="is_authority"
                @if ($bzManagerContact && $bzManagerContact->has_document_authority) checked="checked" @endif>
            <label for="have-authority-checkbox"><strong>I have the authority</strong></label>
        </div>
    </div>
</div>
<div id="authority_contact" class="contact-form-row">
    <input type="hidden" name="contact_type[]" value="manager_or_owner">
    <input type="hidden" name="contact_id[]"
        @if ($bzManagerContact) value="{{ $bzManagerContact['id'] }}" @endif>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="otherFirstName_div">
                <label>Same As</label>
                <select class="same_as_select form-control">
                    <option value="0">---</option>
                    @if ($companyContacts)
                        @foreach ($companyContacts as $bizContact)
                            <option value="{{ $bizContact->id }}">{{ $bizContact->full_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>First Name #</label>
                <input type="text" class="form-control" name="first_name[]" id="authority_first_name"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['first_name'] }}" @endif
                    placeholder="First Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Last Name #</label>
                <input type="text" class="form-control" name="last_name[]" id="authority_last_name"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['last_name'] }}" @endif
                    placeholder="Last Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Job Title #</label>
                <input type="text" class="form-control" name="job_title[]" id="authority_job_title"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['job_title'] }}" @endif
                    placeholder="Job Title">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Business Phone #</label>
                <input type="text" class="form-control phone_us" name="business_phone_number[]"
                    id="authority_business_phone" placeholder="XXX-XXX-XXXX"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['business_phone_number'] }}" @endif
                    maxlength="14">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Extension</label>
                <input type="text" class="form-control" name="business_phone_ext[]" id="authority_business_phone_ext"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['business_phone_ext'] }}" @endif
                    placeholder="XXX">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mobile # </label>
                <input type="text" class="form-control phone_us" name="mobile_number[]" id="authority_mobile_number"
                    placeholder="Mobile #"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['mobile_number'] }}" @endif
                    maxlength="14">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email[]" id="authority_email"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['email'] }}" @endif
                    placeholder="Email Address">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Alternate Email Address</label>
                <input type="email" class="form-control" name="alternate_email[]" id="authority_alternate_email"
                    @if ($bzManagerContact) value="{{ $bzManagerContact['alternate_email'] }}" @endif
                    placeholder="Alternate Email Address">
            </div>
        </div>
    </div>
</div>
