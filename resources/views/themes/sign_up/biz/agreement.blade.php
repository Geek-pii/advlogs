@extends('sign_up_process', ['content_class' => 'container-fluid'])
@section('styles')
    <style>
        .next-button {
            background-image: linear-gradient(to right, #a0984f, #959679) !important;
            border-radius: 30px;
            padding: 14px 40px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            border: none;
            outline: none;
            box-shadow: none;
            cursor: pointer;
        }

        .next-button:focus,
        .next-button:hover {
            text-decoration: none;
            color: white
        }

        .error {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="business-client-signup-page-wrapper">
        @include('themes.sign_up.biz._step_list')
        <form id="biz-agreement" class="w-100">
            <div class="light-overflow"
                style="background:#fff; padding:25px; margin:0 auto; box-shadow: 0px 0px 5px 1px #d2d2d2; margin-bottom:40px">
                <div style="text-align:center;"><span> <img src="{{ asset('assets/images/logo-pdf.jpg') }}" alt="logo">
                    </span> </div>

                <h1
                    style="text-align:center; color:#000; font-size:22px; color:#000; font-weight:bold; padding-top:10px; margin-bottom:5px">
                    Advantage Logistics LLC Rate and Terms Agreement for Business Clients </h1>

                <p
                    style=" border-bottom:1px solid #ccc; padding-bottom:25px; margin-bottom:25px; text-align:center; font-size:16px">
                    1410 Moose Pass, Festus, MO 63028 / Office 888.238.5642 / www.advlogs.com </p>

                <p style="padding-bottom:15px"> This agreement is made as of 24-Aug-2021 by and between Advantage Logistics
                    LLC and (Walter and Norton Inc) (Ora) conducting business at (Hines Campbell Plc)

                    Client therefore agrees as follows: </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px"> 1. Freight
                    Inspection, Damage </h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">a.</strong> In
                    order to maintain
                    quality service and low prices, it is critical that vehicles be inspected promptly. Client must inspect

                    the vehicle at the time of delivery with the driver present. All damage must be clearly notated on the
                    bill of lading (BOL)

                    at the time of delivery and reported to Advantage Logistics LLC within 24 hours. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong> If
                    Client is unable
                    to immediately inspect the vehicle at time of delivery, Client must write “STI” (Subject to Inspection)

                    on the BOL instead of a signature and add the date and time. This gives up to 24 hours to completely
                    inspect the vehicle

                    and report any damage. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong>
                    When a vehicle is
                    delivered after hours and no one is present to sign for it, there will be a 24-hour allowance starting
                    on

                    the next business day to inspect the vehicle and report damages. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">d.</strong>
                    Advantage Logistics
                    LLC is a broker, not a carrier. The carrier is solely responsible for any damage. To assist clients,

                    Advantage Logistics LLC will make reasonable effort to facilitate resolution of Client’s damage claim
                    against a carrier.

                    This may include helping initiate a claim with the carrier’s insurance company. Under no circumstance
                    does Advantage

                    Logistics LLC assume liability for any damage or claim. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">
                        e. </strong>Advantage Logistics LLC will not be responsible for or facilitate claims against a
                    carrier for:<br>

                    i. Damage not clearly notated on the signed bill of lading,<br>

                    ii. Damage found after signature is received on the bill of lading,<br>

                    iii. Damage identified or reported after the time periods specified above,<br>

                    iv. Damage to the vehicle before pickup,<br>

                    v. Missing memory cards, key fobs, or other damage not related to transport of the vehicle,<br>

                    vi. Damage of convertible tops,<br>

                    vii. Mechanical fault, exhaust assembly, alignment, suspension, or engine tuning,<br>

                    viii. Cleanliness or damage of any type resulting from weather conditions,<br>

                    ix. Profit, commission, detail charges, or reconditioning performed on an incorrect vehicle. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px"> 2. Transport
                    Preparation, Delivery Times, and Fees</h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">
                        a.</strong> Client agrees that all balances due to the seller that are required for vehicle release
                    must be paid before the vehicle will

                    be scheduled for pickup.</p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong> A
                    dry run fee of up
                    to 50% per vehicle may be charged if one or more of the vehicles contracted to Advantage Logistics

                    LLC is not available when the transporting carrier arrives. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong> An
                    additional fee
                    will be added for any Client vehicle breakdowns that occur during transport. This is in addition to the

                    original quoted and agreed upon rate. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">d.</strong>
                    All delivery times
                    are estimated. Advantage Logistics LLC does not guarantee delivery on any exact date or time. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">3. Payment for
                    Logistics Services </h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">a.</strong>
                    Invoices will be
                    emailed to the billing email address Client provides below. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong> If
                    Advantage
                    Logistics LLC has agreed in advance to extend credit, all balances due must be paid by company check

                    or ACH and received within 15 calendar days of invoice being sent to the billing email address Client
                    provides below. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong> If
                    Client must pay by
                    credit card, please notify Advantage Logistics LLC in advance and a 3% convenience fee will be

                    added to the invoice, which is due in full with the original invoice amount. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">d.</strong> A
                    monthly late fee
                    will be added to each invoice for which payment has not been received on time. The fee will be $25

                    + 3% of the outstanding balance for each full or partial 30-calendar-day period past due, or the maximum
                    amount allowed

                    by law, whichever is less. The late fee will be added to the invoice and will be due in full with the
                    original invoice amount. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">e.</strong> A
                    $35 fee will be
                    added for each check, draft, order or like instrument that is returned unpaid. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">4.
                    Non-Solicitation</h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">a.</strong>
                    Client agrees to not
                    engage in a direct business transaction with any carrier, subsidiary, affiliate, associate, or company

                    related to a carrier that Advantage Logistics LLC has contracted to perform services for Client within
                    the past 24 months. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong>
                    This provision shall
                    not apply if Client had a previous business relationship with the carrier. For the purpose of this

                    provision, a previous business relationship is defined as follows: the carrier directly contracted with
                    Client (not through

                    a broker or other intermediary) to perform the same type of service within the 12-month period
                    immediately before

                    Advantage Logistics LLC first contracted the carrier to perform services for Client and that service was
                    not in violation

                    of any provision of this agreement or the carrier/broker agreement. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong> If
                    Client does engage
                    in a direct business transaction prohibited above, Client agrees to pay Advantage Logistics a 20%

                    fee on each service provided to Client by the company for the remainder of the 24-month period starting
                    when Advantage

                    Logistics LLC last contracted the carrier to perform services related to Client and retroactively to the
                    first violation. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px"> 5. Agreement
                    Duration and Termination </h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">a.</strong>
                    The term of this
                    agreement shall be for (1) year and shall automatically renew successively in (1) year increments. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong>
                    This agreement may be
                    terminated by either party at any time by giving (30) days prior written (email) notice. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong>
                    Notice of termination
                    to Advantage Logistics LLC must be provided to both of the following email addresses:

                    jessary@advlogs.com and signup@advlogs.com. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">d.</strong>
                    Notice of termination
                    to Client must be provided to the email address set forth below as the Primary Contact Person

                    Email Address. If no email address is set forth below, or the address set forth below is incorrect or
                    otherwise not working,

                    Client agrees notice of termination may be sent to any email address Client has used to correspond with
                    Advantage

                    Logistics LLC. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">e.</strong> No
                    termination of
                    this agreement shall relieve any party hereto from any obligations or liabilities incurred thereunder

                    before the time of such termination, including, without limitation, Client’s obligation for payment of
                    any fees incurred as

                    set forth in this agreement and Client’s obligation to not engage in a direct business transaction with
                    any carrier,

                    subsidiary, affiliate, associate, or company related to a carrier that Advantage Logistics LLC
                    contracted to provide

                    services related to Client. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">6. Disputes
                </h2>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">a.</strong>
                    Any and all actions
                    or proceedings shall be tried and litigated exclusively in the state and federal courts located in the

                    County of St. Louis, State of Missouri, or the City of St. Louis, State of Missouri and those courts
                    shall have in personam

                    jurisdiction and venue over Client for the purpose of litigating any dispute, controversy or proceeding
                    arising out of or

                    related to any service provided by/or to Advantage Logistics LLC. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">b.</strong>
                    Any right to assert
                    the doctrine of forum non convenience or similar doctrine or to object to venue with respect to any

                    proceeding brought is hereby waived. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">c.</strong>
                    This agreement shall
                    be governed by the laws of the State of Missouri, except that any provisions applicable to indemnity

                    or liability for personal injury or property damage shall be governed by the law of the state in which
                    the incident occurred. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">d.</strong>
                    Client agrees to
                    accept service of process sufficient for personal jurisdiction by registered or certified mail, to the
                    address

                    set forth below or its registered principle place of business. </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">e.</strong>
                    Client agrees and
                    promises to pay any and all charges incurred for services provided, associated late fees, finance

                    charges, and all cost incurred in the collection of the same, including but not limited to, reasonable
                    attorney fees,

                    collectively (“Fees”). </p>

                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left;">f.</strong> If
                    Client becomes
                    insolvent or generally fails to pay off the charges, or becomes unable to remit payments as they
                    become due, or refuses to remit any payment as it becomes due; the officers of the Client and the signee
                    shall undertake

                    personal liability for the repayment of the charges and Fees in due manner in accordance with the terms
                    of this

                    Agreement. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">7.
                    Severability: </h2>

                <p style="padding-bottom:5px"> If any provision of this agreement is held invalid by a court of competent
                    jurisdiction or pursuant to binding

                    arbitration, such provision shall be severed from this agreement, and to the extent possible, this
                    agreement shall continue with

                    regard to the remaining provisions. </p>

                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">8. Authority
                    to Sign:</h2>

                <p style="padding-bottom:25px"> Each individual signing this agreement directly and expressly warrants that
                    he or she has been given and

                    has received and accepted authority to sign and execute the agreement on behalf of the party for whom it
                    is indicated he or

                    she has signed, and further has been expressly given and received and accepted authority to enter into a
                    binding agreement

                    on behalf of such party with respect to each and every provision contained herein and as stated herein.
                </p>

                <p style="padding-bottom:25px"> Client agrees to pay in full the quoted rates pertaining to those vehicles.
                    Client further agrees to the terms and conditions and consents

                    and requests that Advantage Logistics LLC arrange transport for the agreed upon vehicles. </p>

                <p style="padding-bottom:25px"> I understand that signing or submitting this contract electronically has the
                    same legal effect and can be enforced in the same way as

                    a written signature. Typing my name in the signature section below represents my intention to sign and
                    to enter into this agreement. </p>
                <div class="boxes-new-wrpaer">
                    <div class="boxes">
                        <input type="checkbox" id="i_agree" name="checkbox_1" 
                        @if (auth('account')->user()->company->agreement_checked) checked="checked" @endif />
                        <label for="i_agree">I Agree</label>
                    </div>
                </div>
                <div class="rounded border border-dark p-2 mb-2">
                    <div class="col-12 p-0">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="client" class="col-4 p-0"><strong>Client:</strong></label>
                            <input type="text" readonly id="client"
                                value="{{ auth('account')->user()->Company->company_legal_name }}"
                                class=" form-control text-dark bg-white border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 not-sign-yet">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="by" class="col-4 p-0"><strong>By:</strong></label>
                            <input type="text" readonly id="signature-not-signed"
                            value="{{ auth('account')->user()->company->agreement_checked ? auth('account')->user()->full_name : '' }}"
                                class="signature  form-control text-dark bg-white border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 not-sign-yet">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                            <input type="text" readonly
                                value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                                class="form-control date_input bg-white text-dark border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 signed hidden">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="signature" class="col-4 p-0"><strong>By:</strong></label>
                            <input type="text" readonly id="by"
                                class="signature  form-control text-dark bg-white border-bottom border-dark rounded-0"
                                value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 signed hidden">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                            <input type="text" readonly
                                value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                                class="form-control date_input bg-white text-dark border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="print" class="col-4 p-0"><strong>Print:</strong></label>
                            <input type="text" readonly id="print"
                                class=" form-control bg-white text-dark border-bottom border-dark rounded-0"
                                value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="title" class="col-4 p-0"><strong>Title:</strong></label>
                            <input type="text" readonly name="title"
                                class="form-control  bg-white text-dark border-bottom border-dark rounded-0"
                                value="{{ auth('account')->user()->job_title }}" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                </div>
                <div class="rounded border border-dark p-2">
                    <div class="col-12 p-0 not-sign-yet">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="signature" class="col-4 p-0"><strong>Signature:</strong></label>
                            <input type="text" readonly id="signature"
                            value="{{ auth('account')->user()->company->agreement_checked ? auth('account')->user()->full_name : '' }}"
                                class="signature  form-control bg-white border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 not-sign-yet">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                            <input type="text" readonly
                                value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                                class="form-control date_input text-dark bg-white border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 signed hidden">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="signature" class="col-4 p-0"><strong>Signature:</strong></label>
                            <input type="text" readonly id="signature"
                                class="signature  form-control bg-white border-bottom border-dark rounded-0"
                                value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0 signed hidden">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="date_input" class="col-4 p-0"><strong>Date:</strong></label>
                            <input type="text" readonly
                            value="{{ auth('account')->user()->company->agreement_checked? auth('account')->user()->company->agreement_checked_date->format('m/d/Y H:i:s A'): '' }}"
                                class="form-control date_input bg-white text-dark border-bottom border-dark rounded-0"
                                aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="form-group border-0 p-0 d-flex shadow-none">
                            <label for="print" class="col-4 p-0"><strong>Print:</strong></label>
                            <input type="text" readonly id="print"
                                class=" form-control bg-white text-dark border-bottom border-dark rounded-0"
                                value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5 pr-0">
                    <a type="button" href="{{ route('account.biz.company-profile', ['pass_step' => true]) }}"
                        class="wizard-next-prev-btn next-button pull-left" id="prev">Previous</a>
                    
                </div>
                <div class="col-7 pl-0">
                    <button type="submit" class="wizard-next-prev-btn next-button pull-right" id="next">Agree &
                        Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#biz-agreement").validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                ignore: [':not(checkbox:hidden)'],
                rules: {
                    "checkbox_1": {
                        required: true,
                    },
                    "by": {
                        required: true
                    }
                },
                errorPlacement: function(error, element) {
                    element.parent('div').append(error);
                },
                invalidHandler: function(event, validator) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.check-agreement') }}",
                        success: function(msg) {
                            window.location.href = "{{ route('account.biz.billing') }}";
                        },
                        error: function(data) {}
                    });
                }
            });
        });
    </script>
@endsection
