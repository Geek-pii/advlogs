<div id="step-1" class="@if ($step != 1) hidden @endif">
    <h1 style="margin-bottom:30px"> Carrier Broker Agreement </h1>
    <div class="light-overflow"
        style="background:#fff; padding:25px; margin:0 auto; box-shadow: 0px 0px 5px 1px #d2d2d2;margin-bottom: 40px;">
        <div style="text-align:center;"> <a href="#"> <img src="{{ asset('assets/images/logo-pdf.jpg') }}"
                    alt="logo"> </a> </div>
        <h1
            style="text-align:center; color:#000; font-size:22px; color:#000; font-weight:bold; padding-top:10px; margin-bottom:5px">
            Advantage Logistics LLC Carrier Broker Agreement </h1>
        <div class="row">
            <p
                style=" border-bottom:1px solid #ccc; padding-bottom:25px; margin-bottom:25px; text-align:center; font-size:16px">
                1410 Moose Pass, Festus, MO 63028/ Office 888.238.5642 <a href="#"> www.advlogs.com </a> </p>
            <p style="padding-bottom:15px">
                This agreement is made as of the {{ \Carbon\Carbon::now()->format('m/d/Y H:i:s A') }} below, by and
                between Advantage Logistics LLC and {{ auth('account')->user()->company->company_legal_name }}
                (“Carrier”) and {{ auth('account')->user()->full_name }}. Carrier therefore agrees as follows:
            </p>
            {!! $agreement !!}
        </div>
        <div class="row">
            <div class="col-12">
                <div class="boxes">
                    <input type="checkbox" name="agree" id="i_agree"
                        @if (auth('account')->user()->company->agreement_checked) checked="checked" @endif />
                    <label for="i_agree" class="text-dark">I Agree</label>
                    <span class="text-danger hidden must-agree">you must agree above agreemment</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 rounded border border-dark p-2">
                <div class="col-12">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="client" class="col-4 p-0"><strong>Carrier:</strong></label>
                        <input type="text" readonly id="client"
                            value="{{ auth('account')->user()->Company->company_legal_name }}"
                            class="form-control bg-white border-bottom border-dark rounded-0 text-dark"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12 not-sign-yet">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="by" class="col-4 p-0"><strong>By:</strong></label>
                        <input type="text" readonly id="by"
                            value="{{ auth('account')->user()->company->agreement_checked ? auth('account')->user()->full_name : '' }}"
                            class="signature form-control bg-white border-bottom border-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12 not-sign-yet">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                        <input type="text" readonly
                            value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                            class="form-control bg-white date_input border-bottom border-dark text-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12 signed hidden">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="by" class="col-4 p-0"><strong>By:</strong></label>
                        <input type="text" readonly id="by"
                            class="signature form-control bg-white border-bottom border-dark rounded-0" name="by"
                            value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12 signed hidden">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                        <input type="text"
                            value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                            readonly name="date_input"
                            class="form-control bg-white date_input text-dark border-bottom border-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="print" class="col-4 p-0"><strong>Print:</strong></label>
                        <input type="text" readonly id="print"
                            class="form-control bg-white border-bottom border-dark text-dark rounded-0"
                            value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="date" class="col-4 p-0"><strong>Title:</strong></label>
                        <input type="text" readonly
                            class="form-control bg-white border-bottom text-dark border-dark rounded-0"
                            value="{{ auth('account')->user()->job_title }}" aria-describedby="passwordHelpInline">
                    </div>
                </div>
            </div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-5 rounded border border-dark p-2">
                <div class="not-sign-yet">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="signature" class="col-4 p-0"><strong>Signature:</strong></label>
                        <input type="text"
                            value="{{ auth('account')->user()->company->agreement_checked ? auth('account')->user()->full_name : '' }}"
                            readonly
                            class="signature signature_input form-control bg-white border-bottom border-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="not-sign-yet">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                        <input type="text" readonly
                            value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                            class="form-control bg-white date_input border-bottom text-dark border-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="signed hidden">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="signature" class="col-4 p-0"><strong>Signature:</strong></label>
                        <input type="text" readonly
                            class="signature signature_input form-control bg-white border-bottom border-dark rounded-0"
                            value="{{ auth('account')->user()->company->agreement_checked ? auth('account')->user()->full_name : '' }}"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="signed hidden">
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                        <input type="text" readonly
                            class="form-control bg-white date_input border-bottom text-dark border-dark rounded-0"
                            aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div>
                    <div class="form-group border-0 p-0 d-flex shadow-none">
                        <label for="print" class="col-4 p-0"><strong>Print:</strong></label>
                        <input type="text" readonly id="print"
                            class="form-control bg-white border-bottom text-dark border-dark rounded-0"
                            value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="must-agree">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agree Agreement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You must agree to this agreement, or if you don’t have the authority to do so, go to the previous page
                and provide
                contact information of the Owner or company officer with that authority.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
