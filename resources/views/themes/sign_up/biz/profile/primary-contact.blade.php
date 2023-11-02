    <input type="hidden" name="contact_type[]" value="primary">
    @php
            $bzPrimaryContacts = $companyContacts->filter(function($value, $key) {
                return $value->hasRole('biz.primary');
            });
            $bzPrimary = $bzPrimaryContacts->first();
    @endphp
    <input type="hidden" name="contact_id[]"
    class="contact_id"
    @if($bzPrimary) value="{{ $bzPrimary->id}}" @endif
    >
    <div class="row">
        <div class="col-md-12">
            <h4>Primary Contact</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="firstNAme_div">
                <label>First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="first_name[]" 
                @if($bzPrimary) value="{{ $bzPrimary->first_name}}" @endif
                placeholder="First Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="lastName_div">
                <label>Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="last_name[]"
                @if($bzPrimary) value="{{ $bzPrimary->last_name}}" @endif
                placeholder="Last Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="jobTitle_div">
                <label>Job Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="job_title[]"
                @if($bzPrimary) value="{{ $bzPrimary->job_title}}" @endif
                placeholder="Job Title">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group" id="phoneNumber_div">
                <label>Business Phone # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us" name="business_phone_number[]"
                @if($bzPrimary) value="{{ $bzPrimary->business_phone_number}}" @endif
                 id="phone_number" maxlength="14" placeholder="XXX-XXX-XXXX"
                 >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="ext_div">
                <label> Extension </label>
                <input type="text" class="form-control" name="business_phone_ext[]"
                @if($bzPrimary) value="{{ $bzPrimary->business_phone_ext}}" @endif
                placeholder="XXX">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="normalphoneNumber_div">
                <label>Mobile # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us"
                @if($bzPrimary) value="{{ $bzPrimary->mobile_number}}" @endif
                name="mobile_number[]" maxlength="14" placeholder="Mobile #"
                >
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email[]" id="email[]"
                @if($bzPrimary) value="{{ $bzPrimary->email}}" @endif
                placeholder=" Email Address ">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="otherEmail_div2">
                <label> Alternate Email Address </label>
                <input type="email" class="form-control" name="alternate_email[]"
                    @if($bzPrimary) value="{{ $bzPrimary->alternate_email}}" @endif
                    placeholder="Alternate Email Address">
            </div>
        </div>
    </div>
