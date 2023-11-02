<div class="row @if (auth('account')->user()->has_document_authority && $step != 2) hidden @endif" id="step-2">

    <form>
        <div class="col-md-12">
            <h2 style=" text-align:center; margin-bottom:30px"> Certificate of Insurance </h2>
            <p class="certificate-para"> Please provide the insurance agent contact information used to request
                certificates
                of insurance. You’ll be able to make the request for a certificate of insurance from this screen.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label> Fax # for Certificate Requests </label>
                    <input type="text" class="form-control phone_us" name="carrier_certificate_fax"
                        @if($company) value="{{ $company->carrier_certificate_fax }}" @endif
                        placeholder="Fax # for Certificate Requests">
                </div>
            </div>
            <div class="col-md-6">
                <div class="boxes">
                    <input type="checkbox" name="skip_certification" id="skip_this" @if($company->skip_certification) checked="checked" @endif/>
                    <label for="skip_this" class="text-dark">Skip this. I will request the certificate manually.</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label> Contact Person For Certificate Requests <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="carrier_certificate_person"
                        value="{{ $company->carrier_certificate_person ?? '' }}"
                        @if($company->skip_certification) disabled="disabled" @endif
                        placeholder="Contact person for certificate requests">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label> Email Address For Certificate Requests <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="carrier_certificate_email"
                        id="carrier_certificate_email" value="{{ $company->carrier_certificate_email ?? '' }}"
                        @if($company->skip_certification) disabled="disabled" @endif
                        placeholder="Email Address For Certificate Requests">
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="skip_this_modal" tabindex="-1" aria-labelledby="tinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <strong>Please note:</strong> <br />
                For verification reasons, the certificate email must come directly from the insurance agent
                to signup@advlogs.com, not a forward from the carrier. An email generated from an insurance portal or
                app is also fine; a certificate emailed from the carrier is not acceptable.
                Certificate Holder:<br />
                Advantage Logistics LLC <br />
                1410 Moose Pass <br />
                Festus, MO 63028 <br />
                signup@advlogs.com
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
