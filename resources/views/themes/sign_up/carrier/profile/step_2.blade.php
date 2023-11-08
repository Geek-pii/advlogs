<form id="company-detail-form">
    <input type="hidden" name="step" value="1">
    <input type="hidden" name="company_id"
        @if ($company) value="{{ $company->id }}" @endif>
    <div class="row mb-3">
        <div class="col-md-12">
            <h4> Company Name </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> Company Legal Name <span class="text-danger">*</span></label>
                <input id="company_legal_name" type="text" name="company_legal_name" class="form-control"
                    @if ($company) value="{{ $company->company_legal_name }}" @endif
                    placeholder="Company Legal  Name" style="border: none;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> DBA </label>
                <input id="company_dba" type="text" name="company_dba" class="form-control" placeholder="DBA"
                    @if ($company) value="{{ $company->company_dba }}" @endif
                    style="border: none;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> MC # </label>
                <input id="mc_number" type="text" name="mc_number" class="form-control" placeholder="MC #"
                    @if ($company) value="{{ $company->mc_number }}" @endif
                    style="border: none;">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label> DOT # </label>
                <input id="dot_number" type="text" name="dot_number" class="form-control" placeholder="DOT #"
                    @if ($company) value="{{ $company->dot_number }}" @endif
                    style="border: none;">
            </div>
        </div>
    </div>
    <div class="physical-address">
        <div class="row mb-3">
            <div class="col-md-12">
                <h4> Physical Address #</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Street Address <span class="text-danger">*</span></label>
                    <input type="text" id="street_address" name="street_address"
                        class="form-control street_address"
                        @if ($physicAddress) value="{{ $physicAddress->street_address }}" @endif
                        placeholder="Street Address" style="border: none;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>City <span class="text-danger">*</span></label>
                    <input type="text" id="city"name="city" class="form-control city" placeholder="City"
                        @if ($physicAddress) value="{{ $physicAddress->city }}" @endif
                        style="border: none;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> State <span class="text-danger">*</span></label>
                    <input type="text" id="company_state"name="state" class="form-control state"
                        @if ($physicAddress) value="{{ $physicAddress->state }}" @endif
                        placeholder="State" style="border: none;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Zip <span class="text-danger">*</span></label>
                    <input type="text" id="zip" name="zip" class="form-control zip_code"
                        @if ($physicAddress) value="{{ $physicAddress->zip }}" @endif
                        placeholder="Zip Code" style="border: none;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Carrier Phone #</label>
                    <input type="text" id="company_telephone" name="company_telephone" class="form-control phone_us"
                           @if ($physicAddress) value="{{ $physicAddress->telephone }}" @endif
                           placeholder=" Carrier Phone" style="border: none;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Email</label>
                    <input type="email" id="company_email" name="company_email" class="form-control "
                           @if ($physicAddress) value="{{ $physicAddress->email }}" @endif
                           placeholder="Email Address" style="border: none;">
                </div>
            </div>
        </div>
    </div>
    <div class="mailling-address">
        <div class="row">
            <div class="col-md-12">
                <h4><span>Mailing Address </span></h4>
                <div class="boxes mt-3">
                    <input type="checkbox" id="same_as_phsical" name="mailing_address_same_as_physical" @if ($mailingAddress && $mailingAddress->mailing_address_same_as_physical) checked="checked" @endif>
                    <label style="font-size:14px" for="same_as_phsical">Same as Physical Address </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Street Address <span class="text-danger">*</span></label>
                    <input type="text" id="mailing_street_address" name="mailing_street_address"
                        class="form-control street_address"
                        @if ($mailingAddress) value="{{ $mailingAddress->street_address }}" @endif
                        placeholder="Street Address">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>City <span class="text-danger">*</span></label>
                    <input type="text" id="mailing_city" name="mailing_city" class="form-control city"
                        @if ($mailingAddress) value="{{ $mailingAddress->city }}" @endif
                        placeholder="Contact Person Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> State <span class="text-danger">*</span></label>
                    <input type="text" id="mailing_state" name="mailing_state" class="form-control state"
                        placeholder="State"
                        @if ($mailingAddress) value="{{ $mailingAddress->state }}" @endif
                        style="border: none;">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label> Zip <span class="text-danger">*</span></label>
                    <input type="text" id="mailing_zip" name="mailing_zip" class="form-control zip_code"
                        placeholder="Zip"
                        @if ($mailingAddress) value="{{ $mailingAddress->zip }}" @endif>
                </div>
            </div>
        </div>
    </div>
</form>
