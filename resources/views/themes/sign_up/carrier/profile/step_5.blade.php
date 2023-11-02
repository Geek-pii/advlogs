<form class="contact-form-row" id="owner-contact-form">
    <input type="hidden" name="step" value="4">
    @php
        $bzManagerContacts = $companyContacts->filter(function ($value, $key) {
            return $value->hasRole('ops.mgr');
        });
        
        $bzManagerContact = $bzManagerContacts->first();
    @endphp
    <input type="hidden" name="contact_type[]" value="manager_or_owner">
    <input type="hidden" name="contact_id[]"
        @if ($bzManagerContact) value="{{ $bzManagerContact['id'] }}" @endif>
    <div class="col-md-12">
        <h2 style="text-align:center; padding:15px 0; font-weight:bold;"> Contacts </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Owner or Operation Manager</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>
                A Carrier Broker Agreement must be signed by an authorized <span class="border-bottom border-dark">Owner or company officer (President, CEO,
                Managing Member, Managing Partner)</span> with the legal authority to act on behalf of this carrier and to
                accept the terms of the Carrier Broker Agreement.
            </p>
            <div class="boxes-new-wrpaer" style=" margin-bottom:18px; display:inline-block ">
                <div class="boxes">
                    <input type="checkbox" name="have_authority" id="have_authority"
                        @if (auth('account')->user()->has_document_authority) checked="checked" @endif>
                    <label style="font-size:14px" for="have_authority">I have the authority </label>
                </div>
            </div>
        </div>
    </div>

    <div id="authority">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" id="otherFirstName_div">
                    <label>Same As</label>
                    <select class="same_as_select form-control have_authority_page">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="first_name[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['first_name'] }}" @endif
                        placeholder="First Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="last_name[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['last_name'] }}" @endif
                        placeholder="Last Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Job Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="job_title[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['job_title'] }}" @endif
                        placeholder="Job Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Business Phone # <span class="text-danger">*</span></label>
                    <input type="text" class="form-control phone_us" name="business_phone_number[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['business_phone_number'] }}" @endif
                        id="business_phone_number[]" maxlength="14" placeholder="Business Phone #">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label> Extension </label>
                    <input type="text" class="form-control" name="business_phone_ext[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['business_phone_ext'] }}" @endif
                        placeholder="XXX">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Mobile # <span class="text-danger">*</span></label>
                    <input type="text" class="form-control phone_us"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['mobile_number'] }}" @endif
                        name="mobile_number[]" maxlength="14" placeholder="Mobile #/After Hours">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label> Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email[]" id="step_3_email"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['email'] }}" @endif
                        placeholder=" Email Address ">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="otherEmail_div2">
                    <label> Alternate Email Address </label>
                    <input type="email" class="form-control" name="alternate_email[]"
                        @if ($bzManagerContact) value="{{ $bzManagerContact['alternate_email'] }}" @endif
                        placeholder="Alternate Email Address">
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="same_as_same_person" tabindex="-1" aria-labelledby="taxClassificationLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            You selected yourself as an Owner or company officer with the legal authority to act on behalf of this
            carrier and to accept the terms of the Carrier Broker Agreement.<br />
            - If that is correct, please select the "I have the authority" checkbox.<br />
            - If that is not correct, please provide the contact information of the Owner or company officer with
            that authority. We will send a signature link for the agreement.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
        </div>
    </div>
</div>
</div>
