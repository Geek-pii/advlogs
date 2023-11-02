<form class="contact-form-row">
    <input type="hidden" name="step" value="1">
    <div class="row">
        <div class="col-12 mb-3">
            <h4>Person to Receive Payments</h4>
        </div>
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
        <div class="col-12">
            <div class="form-group">
                <label class="w-100">Does your company use a factoring company? <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_factory" id="radio_yes" value="Y" @if ($useFactory == 'Y') checked @endif>
                    <label class="form-check-label" for="radio_yes">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="use_factory" id="radio_no" value="N" @if ($useFactory == 'N') checked @endif>
                    <label class="form-check-label" for="radio_no">No</label>
                  </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="firstNAme_div">
                <label>First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name"
                @if($paymentReceiver) value="{{ $paymentReceiver->first_name }}" @endif>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="lastName_div">
                <label>Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                @if($paymentReceiver) value="{{ $paymentReceiver->last_name }}" @endif>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="jobTitle_div">
                <label>Job Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="job_title" placeholder="Job Title"
                @if($paymentReceiver) value="{{ $paymentReceiver->job_title }}" @endif>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group" id="phoneNumber_div">
                <label>Business Phone # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us" name="business_phone_number" id="phone_number"
                    maxlength="14" placeholder="XXX-XXX-XXXX"
                    @if($paymentReceiver) value="{{ $paymentReceiver->business_phone_number }}" @endif>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="ext_div">
                <label> Extension </label>
                <input type="text" class="form-control" name="business_phone_ext" placeholder="XXX"
                @if($paymentReceiver) value="{{ $paymentReceiver->business_phone_ext }}" @endif>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="normalphoneNumber_div">
                <label>Mobile # <span class="text-danger">*</span></label>
                <input type="text" class="form-control phone_us" name="mobile_number" maxlength="14"
                    placeholder="Mobile #"
                    @if($paymentReceiver) value="{{ $paymentReceiver->mobile_number }}" @endif>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label> Email Address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                @if($paymentReceiver) value="{{ $paymentReceiver->email }}" @endif>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="otherEmail_div2">
                <label> Alternate Email Address </label>
                <input type="email" class="form-control" name="alternate_email"
                    placeholder="Alternate Email Address"
                    @if($paymentReceiver) value="{{ $paymentReceiver->alternate_email }}" @endif>
            </div>
        </div>
    </div>
</form>
