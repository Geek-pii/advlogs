        <div class="row">
            <div class="col-md-12">
                <h4>Alternate Contacts
                    <div class="boxes pull-right">
                        <input type="checkbox" id="no-alternate-contact" style="display: none" name="no_alternate_contact">
                        <label for="no-alternate-contact"><strong style="font-size:.7rem">No Alternate
                                Contact</strong></label>
                    </div>
                </h4>
            </div>
        </div>
        @php
            $bzNormalContacts = $companyContacts->filter(function($value, $key) {
                return $value->hasRole('biz.alternative');
            });
        @endphp

        @if (count($bzNormalContacts) > 0)
            @foreach ($bzNormalContacts as $bzNormalContact)
                <div class="contact-form-row">
                    <input type="hidden" name="contact_type[]" value="normal">
                    <input type="hidden" name="contact_id[]" value="{{ $bzNormalContact['id'] }}">
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
                            <div class="form-group" id="otherFirstName_div">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name[]"
                                    value="{{ $bzNormalContact['first_name'] }}" id="first_name_alter_1"
                                    placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="otherLastName_div">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name[]"
                                    value="{{ $bzNormalContact['last_name'] }}" id="last_name_alter_1"
                                    placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="otherJobTitle_div">
                                <label>Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_title[]"
                                    value="{{ $bzNormalContact['job_title'] }}" id="job_title_alter_1"
                                    placeholder="Job Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group" id="otherNumber_div">
                                <label> Business Phone # <span class="text-danger">*</span></label>
                                <input type="text" class="form-control phone_us"
                                    value="{{ $bzNormalContact['business_phone_number'] }}"
                                    name="business_phone_number[]" id="business_phone_number_alter_1"
                                    placeholder="XXX-XXX-XXXX"
                                    >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" id="otherExt_div">
                                <label> Extension</label>
                                <input type="text" class="form-control" name="business_phone_ext[]"
                                    value="{{ $bzNormalContact['business_phone_ext'] }}" placeholder="XXX"
                                    id="business_phone_ext_alter_1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="other_mobNumber_div">
                                <label> Mobile # <span class="text-danger">*</span></label>
                                <input type="text" class="form-control phone_us"
                                    value="{{ $bzNormalContact['mobile_number'] }}" id="business_mobile_number_alter_1"
                                    name="mobile_number[]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email[]"
                                    value="{{ $bzNormalContact['email'] }}" id="email_alter_1"
                                    placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alternate Email Address </label>
                                <input type="email" class="form-control" name="alternate_email[]"
                                    value="{{ $bzNormalContact['alternate_email'] }}" id="alternate_email_alter_1"
                                    placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="addanotehr-contact text-right">
                                <a style="cursor: pointer;" class="remove_contact">Remove Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(next( $bzNormalContacts ) ) 
                <hr />
                @endif
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
                        <div class="form-group" id="otherFirstName_div">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="first_name[]" id="first_name_alter_1"
                                placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="otherLastName_div">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="last_name[]" id="last_name_alter_1"
                                placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="otherJobTitle_div">
                            <label>Job Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title[]" id="job_title_alter_1"
                                placeholder="Job Title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group" id="otherNumber_div">
                            <label> Business Phone # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control phone_us" name="business_phone_number[]"
                                id="business_phone_number_alter_1"
                                placeholder="XXX-XXX-XXXX"
                            >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="otherExt_div">
                            <label> Extension</label>
                            <input type="text" class="form-control" name="business_phone_ext[]" placeholder="XXX"
                                id="business_phone_ext_alter_1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="other_mobNumber_div">
                            <label> Mobile # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control phone_us" id="business_mobile_number_alter_1"
                                name="mobile_number[]"
                                placeholder="Mobile #"
                            >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email[]" id="email_alter_1"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alternate Email Address </label>
                            <input type="email" class="form-control" name="alternate_email[]"
                                id="alternate_email_alter_1" placeholder="Email Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="addanotehr-contact text-right">
                            <a style="cursor: pointer;" class="remove_contact">Remove Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row add_contact_box">
            <div class="col-md-12">
                <div class="addanotehr-contact">
                    <a style="cursor: pointer;text-decoration:underline" class="text-primary" id="add_contact">Add Another Contact</a>
                </div>
            </div>
        </div>
