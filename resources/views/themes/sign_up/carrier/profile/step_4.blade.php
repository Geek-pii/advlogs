<form id="alternate-contact-form">
    <input type="hidden" name="step" value="3">
    <div class="row">
        <div class="col-md-12">
            <h4>Alternate Dispatch Contact</h4>
            <div class="boxes mt-3">
                <input type="checkbox" id="no-alternate-contact" style="display: none" name="no_alternate_contact">
                <label for="no-alternate-contact"><strong style="font-size:10px">No Alternate Contact</strong></label>
            </div>
        </div>
    </div>
    @php
        $carrierNormalContacts = $companyContacts->filter(function ($value, $key) {
            return $value->hasRole('dispatch.alternative');
        });
    @endphp

    @if ($carrierNormalContacts->count() > 0)
        @foreach ($carrierNormalContacts as $carrierNormalContact)
            <div class="contact-form-row">
                <input type="hidden" name="contact_type[]" value="normal">
                <input type="hidden" name="contact_id[]" value="{{ $carrierNormalContact['id'] }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="otherFirstName_div">
                            <label>Same As</label>
                            <select class="same_as_select_multiple form-control">
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
                        <div class="form-group" id="otherFirstName_div">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="first_name[]"
                                value="{{ $carrierNormalContact['first_name'] }}" id="first_name_alter_1"
                                placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="otherLastName_div">
                            <label>Last Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name[]"
                                value="{{ $carrierNormalContact['last_name'] }}" id="last_name_alter_1"
                                placeholder="Last Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="otherJobTitle_div">
                            <label>Job Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title[]"
                                value="{{ $carrierNormalContact['job_title'] }}" id="job_title_alter_1"
                                placeholder="Job Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="otherNumber_div">
                            <label> Business Phone # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control phone_us"
                                value="{{ $carrierNormalContact['business_phone_number'] }}" name="business_phone_number[]"
                                placeholder="Phone Number" id="business_phone_number_alter_1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="otherExt_div">
                            <label> Extension</label>
                            <input type="text" class="form-control" name="business_phone_ext[]"
                                value="{{ $carrierNormalContact['business_phone_ext'] }}" placeholder="XXX"
                                id="business_phone_ext_alter_1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="normalphoneNumber_div">
                            <label>Mobile # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control phone_us mobile_number"
                                value="{{ $carrierNormalContact['mobile_number'] }}" name="mobile_number[]" maxlength="14"
                                placeholder="Mobile #">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email[]"
                                value="{{ $carrierNormalContact['email'] }}" id="email_alter_1" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="otherEmail_div2">
                            <label> Alternate Email Address </label>
                            <input type="email" class="form-control" name="alternate_email[]"
                                value="{{ $carrierNormalContact['alternate_email'] }}"
                                placeholder="Alternate Email Address">
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        @endforeach
    @else
        <div class="contact-form-row">
            <input type="hidden" name="contact_type[]" value="normal">
            <input type="hidden" name="contact_id[]">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="otherFirstName_div">
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
                    <div class="form-group" id="otherFirstName_div">
                        <label>First Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name[]" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="otherLastName_div">
                        <label>Last Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name[]" id="last_name_alter_1"
                            placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="otherJobTitle_div">
                        <label>Job Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="job_title[]" id="job_title_alter_1"
                            placeholder="Job Title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="otherNumber_div">
                        <label> Business Phone #<span class="text-danger">*</span></label>
                        <input type="text" class="form-control phone_us" name="business_phone_number[]"
                            id="business_phone_number_alter_1" placeholder="Business Phone #">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="otherExt_div">
                        <label> Extension</label>
                        <input type="text" class="form-control" name="business_phone_ext[]" placeholder="XXX"
                            id="business_phone_ext_alter_1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="normalphoneNumber_div">
                        <label>Mobile #<span class="text-danger">*</span></label>
                        <input type="text" class="form-control phone_us" name="mobile_number[]" maxlength="14"
                            placeholder="Mobile #">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Email Address<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email[]" id="email_alter_1"
                            placeholder="Email Address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="otherEmail_div2">
                        <label> Alternate Email Address </label>
                        <input type="email" class="form-control" name="alternate_email[]"
                            placeholder="Alternate Email Address">
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="row add_contact_box">
        <div class="col-md-12">
            <div class="addanotehr-contact">
                <a style="cursor: pointer;text-decoration:underline" class="text-primary" id="add_contact">Add
                    Another Contact</a>
            </div>
        </div>
    </div>
</form>
