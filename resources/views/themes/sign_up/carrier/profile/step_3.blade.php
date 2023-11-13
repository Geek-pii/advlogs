<form class="contact-form-row">
    <input type="hidden" name="step" value="2">
    @php
        $primaryContacts = $companyContacts->filter(function($value, $key) {
            return $value->hasRole('dispatch.primary');
        });

        $primaryContact = $primaryContacts->first();
    @endphp
    <input type="hidden" name="contact_type[]" value="primary">
    <input type="hidden" name="contact_id[]" class="contact_id"
        @if ($primaryContact) value="{{ $primaryContact['id'] }}" @endif>
    <div class="col-md-12 mb-3">
        <h4> Primary Dispatch Contact</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="otherFirstName_div">
                {{-- @dd($companyContacts->toArray()) --}}
                <label>Same As</label>
                <select class="same_as_select form-control">
                    <option value="0">---</option>
                    
                    @if ($companyContacts)
                        @foreach ($companyContacts as $carrierContact)
                            <option value="{{ $carrierContact->id }}">{{ $carrierContact->full_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="p_dispactch_f_name" name="first_name[]"
                    @if ($primaryContact) value="{{ $primaryContact['first_name'] }}" @endif
                    placeholder="First Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="p_dispactch_l_name" name="last_name[]"
                    @if ($primaryContact) value="{{ $primaryContact['last_name'] }}" @endif
                    placeholder="Last Name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Job Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="p_dispactch_job_title" name="job_title[]"
                    @if ($primaryContact) value="{{ $primaryContact['job_title'] }}" @endif
                    placeholder="Job Title">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Business Phone # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us" id="phone_number"
                    @if ($primaryContact) value="{{ $primaryContact['business_phone_number'] }}" @endif
                    name="business_phone_number[]" placeholder="XXX-XXX-XXXX">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Extension</label>
                <input type="text" class="form-control" id="p_dispactch_phone_ext" name="business_phone_ext[]"
                    @if ($primaryContact) value="{{ $primaryContact['business_phone_ext'] }}" @endif
                    placeholder="Extension">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label> Mobile # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us" id="p_dispactch_phone"
                    @if ($primaryContact) value="{{ $primaryContact['mobile_number'] }}" @endif
                    name="mobile_number[]" placeholder="Mobile #">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="p_dispactch_email" name="email[]"
                    @if ($primaryContact) value="{{ $primaryContact['email'] }}" @endif
                    placeholder="Email Address">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="otherEmail_div2">
                <label> Alternate Email Address </label>
                <input type="email" class="form-control" name="alternate_email[]"
                    @if($primaryContact) value="{{ $primaryContact->alternate_email}}" @endif
                    placeholder="Alternate Email Address">
            </div>
        </div>
    </div>
</form>
