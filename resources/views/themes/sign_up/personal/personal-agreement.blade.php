@extends('sign_up_process', ['content-class' => 'container-fluid'])

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
        @include('themes.sign_up.personal._step_list')
        <form id="personal-agreement">
            <div class="light-overflow"
                style="background:#fff; padding:25px; margin:0 auto; box-shadow: 0px 0px 5px 1px #d2d2d2;">

                <div style="text-align:center;"> <a href="#"> <img src="{{ asset('assets/images/logo-pdf.jpg') }}"
                            alt="logo"> </a> </div>

                <h1
                    style="text-align:center; color:#000; font-size:18px; color:#000; font-weight:bold; padding-top:10px; margin-bottom:5px">
                    Advantage Logistics LLC Rate and Terms Agreement for Personal Vehicles </h1>
                <p
                    style=" border-bottom:1px solid #ccc; padding-bottom:25px; margin-bottom:25px; text-align:center; font-size:16px">
                    1410 Moose Pass, Festus, MO 63028/ Office 888.238.5642 <a href="#" target="_blank">
                        www.advlogs.com
                    </a></p>
                <p style="padding-bottom:15px"> This agreement is made as of the date below, by and between Advantage
                    Logistics
                    LLC and the undersigned person (“Client”). Client therefore agrees as follows: </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px"> 1. Authority
                    and
                    Authorization: </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:41px">a.</strong> Client warrants that
                    it
                    is the registered legal owner of the vehicle(s), or that it has been duly authorized by the legal owner
                    to
                    enter into an agreement for transportation of the automobiles. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:41px">b.</strong> Client authorizes
                    Advantage Logistics LLC, its subcontractors and agents to drive, park, store and otherwise operate or
                    transport the vehicle(s) in any manner necessary to fulfill the obligations under this agreement. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">2. Vehicle
                    Inspection </h2>
                <p style="padding-bottom:5px"> <strong style="margin-right:15px; font-size:16px; float:left; height:45px">
                        a.</strong> Client must inspect the entire vehicle with the driver prior to transport and fill out
                    and
                    sign a vehicle condition report on the bill of lading (BOL). This is critical to ensure that all current
                    damages are noted, authorized and agreed upon between the parties prior to the vehicle leaving the
                    Client’s
                    possession. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">b.</strong> Client must inspect
                    the
                    vehicle at the time of delivery with the driver present and before signing the BOL. All damage must be
                    clearly notated on the BOL at the time of delivery before signing for receipt of the vehicle. </p>
                <div class="boxes-new-wrpaer" style="margin-top:20px; margin-bottom:30px ">
                    <div class="boxes">
                        <input type="checkbox" id="box-1" name="checkbox_1">
                        <label for="box-1">I Agree</label>
                    </div>
                </div>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">3. Claims and
                    Liability </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">a.</strong> Any damage must be
                    reported to Advantage Logistics LLC by emailing dispatch@advlogs.com within 24 hours of vehicle
                    delivery.
                </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">b.</strong> Client hereby waives
                    any
                    damage claims that are not noted on the bill of lading and any damage claims for which Client has not
                    submitted a timely claim. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:67px">c.</strong> Advantage Logistics
                    LLC
                    is a broker that arranges transport, not a carrier that conducts the transport. Client agrees the
                    carrier
                    conducting the transport shall be solely responsible for any damage, loss or claim. Advantage Logistics
                    LLC
                    shall not be liable directly, in subrogation, or by assignment to Client’s insurance company or any
                    other
                    party for any claims. In no event shall Advantage Logistics LLC be liable for any incidental, indirect
                    or
                    consequential damages. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:50px">d.</strong> In the event of a
                    damage,
                    to assist clients, Advantage Logistics LLC will make reasonable effort to facilitate resolution of
                    Client’s
                    damage claim against a carrier. This may include helping initiate a claim with the carrier’s insurance
                    company. Under no circumstance does Advantage Logistics LLC assume liability for any damage, loss or
                    claim.
                </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:42px">e.</strong> Advantage Logistics
                    LLC
                    will not provide reimbursement for auto rental fees, storage fees, diminished value, or any other
                    expenses
                    incurred as a result of damage or accident. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:121px">f.</strong> Advantage Logistics
                    LLC
                    will not be responsible for or facilitate claims against a carrier for any of the following:<br>
                    Damage found after receipt signature on the bill of lading (BOL) or not clearly notated on the signed
                    BOL,<br>
                    Damage identified or reported more than 24 hours after vehicle delivery,<br>
                    Damage to the vehicle before pickup, or otherwise not related to transport of the vehicle,<br>
                    Damage of convertible tops on open transport,<br>
                    Mechanical fault, exhaust assembly, alignment, suspension, or engine tuning,<br>
                    Cleanliness or damage of any type resulting from weather conditions. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:42px">g.</strong> In no event shall
                    Advantage Logistics LLC, its subcontractors or agents be liable for any damages except for damages to
                    vehicles actually transported and only to the extent such damages were caused by gross negligence or
                    intentional misconduct by Advantage Logistics LLC or its agents. </p>
                <div class="boxes-new-wrpaer" style="margin-top:20px; margin-bottom:30px ">
                    <div class="boxes">
                        <input type="checkbox" id="box-2" name="checkbox_2" @if (auth('account')->user()->agreement_checked)
                        checked="checked"
                    @endif>
                        <label for="box-2">I Agree</label>
                    </div>
                </div>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">4. Transport
                    Timeliness </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:53px">a.</strong> Advantage Logistics
                    LLC
                    agrees to arrange transport of vehicle(s) described on quotation on or about the dates requested.
                    Advantage
                    Logistics LLC agrees to make commercially reasonable effort to arrange timely vehicle pickup and
                    delivery,
                    however, Advantage Logistics LLC cannot guarantee specific dates or times. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:20px">b.</strong> No express or implied
                    representations or warranties are made with respect to pickup or delivery times or dates. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">c.</strong> All transport pickup
                    and
                    delivery dates and times are estimates only. Advantage Logistics LLC does not agree or commit to
                    transport
                    the vehicle(s) in time for any particular date. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:91px">d.</strong> Neither Advantage
                    Logistics LLC nor its auto transport carriers are responsible or liable for auto rental fees, storage
                    fees,
                    or any other claim or expense incurred as a result of late pick up and/or late delivery of Client’s
                    vehicle(s), regardless of the length of the delay. </p>
                <div class="boxes-new-wrpaer" style="margin-top:20px; margin-bottom:30px ">
                    <div class="boxes">
                        <input type="checkbox" id="box-3" name="checkbox_3" @if (auth('account')->user()->agreement_checked)
                        checked="checked"
                    @endif>
                        <label for="box-3">I Agree</label>
                    </div>
                </div>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">5. Payment and
                    Fees </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">a.</strong> Client agrees to pay
                    all
                    charges and fees associated with transport and this agreement </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">b.</strong> Client agrees that
                    all
                    balances due to the vehicle seller that are required for vehicle release must be paid before the vehicle
                    will be scheduled for pickup. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">c.</strong> A dry run fee of up
                    to
                    50% per vehicle may be charged if one or more of the vehicles contracted to Advantage Logistics LLC is
                    not
                    available when the transporting carrier arrives. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:159px">d.</strong> Client shall
                    disclose to
                    Advantage Logistics LLC in the written quote request form any modifications to the vehicle that affect
                    height, ground clearance, dimensions, or total weight (100 lbs. or more). These include, but are not
                    limited
                    to: lifted or lowered, raised roof, ladders/racks/toolboxes, campers, roll bars, reinforcements, added
                    external accessories, etc., collectively (“Modifications”). To the extent the Client fails or refuses to
                    disclose any or all Modifications on the vehicle, the Client agrees and acknowledges that Advantage
                    Logistics LLC may charge additional transportation fees in an amount equal to any additional costs
                    Advantage
                    Logistics LLC incurred as a result of transporting such vehicle. Client authorizes Advantage Logistics
                    LLC
                    to automatically charge Client’s credit card for such additional fees incurred as a result of Client’s
                    failure to disclose the Modifications. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:68px">e.</strong> It is understood and
                    agreed upon that should the vehicle(s) contracted for pick up as a running unit become inoperable during
                    transport, an inoperable fee of $150.00 will be added per inoperable vehicle upon delivery. Upon receipt
                    of
                    notice from Advantage Logistics LLC, Client authorizes Advantage Logistics LLC to automatically charge
                    Client’s credit card the $150.00 fee. This is in addition to the original quoted and agreed upon rate.
                </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:85px">f.</strong> In the unlikely event
                    that the Carrier cannot deliver the vehicle(s) due to natural (low hanging trees, etc.) or man-made
                    obstructions (dead end streets, cul-de-sac’s, narrow streets, low clearance, bridges, crosswalks, street
                    closing, construction, etc.), Client and Carrier shall meet at an agreed upon location to take
                    possession of
                    the vehicle. Such location may be changed as mutually agreed upon by the parties from time to time.
                    Client
                    agrees and acknowledges that meeting at such location shall not affect the cost of services owed by
                    Client.
                </p>
                <div class="boxes-new-wrpaer" style="margin-top:20px; margin-bottom:30px ">
                    <div class="boxes">
                        <input type="checkbox" id="box-4" name="checkbox_4" @if (auth('account')->user()->agreement_checked)
                        checked="checked"
                    @endif required>
                        <label for="box-4">I Agree</label>
                    </div>
                </div>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">6. Personal
                    Belongings </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:57px">a.</strong> In compliance with
                    the
                    Federal Motor Carriers Safety Administration and the Department of Transportation regulations, only
                    “standard vehicle accessories” can be shipped with vehicles. Personal items may not be shipped inside
                    vehicles. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">b.</strong> Client shall remove
                    all
                    detachable personal/household belongings from the vehicle(s). </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:30px">c.</strong> In no event shall
                    Advantage Logistics LLC or its subcontractors be responsible for the safe transport, loss, or damage of
                    any
                    such contents. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:32px">d.</strong> Advantage Logistics
                    LLC,
                    its subcontractors and agents, shall be permitted to refuse to move Client’s car until all such items
                    are
                    removed from the vehicle. </p>
                <div class="boxes-new-wrpaer" style="margin-top:20px; margin-bottom:30px ">
                    <div class="boxes">
                        <input type="checkbox" id="box-5" name="checkbox_5" @if (auth('account')->user()->agreement_checked)
                        checked="checked"
                    @endif required>
                        <label for="box-5">I Agree</label>
                    </div>
                </div>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">7.
                    Cancellation
                </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:22px">a.</strong> Client may cancel
                    the
                    order prior to dispatched status by emailing dispatch@advlogs.com. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:54px">b.</strong>No termination of
                    this
                    agreement shall relieve any party hereto from any obligations or liabilities incurred thereunder before
                    the
                    time of such termination, including, without limitation, Client’s obligation for payment of any fees
                    incurred as set forth in this agreement. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">8. Supersedes
                    and
                    Controls Other Agreements: </h2>
                <p style="padding-bottom:5px"> This Agreement and the quotation incorporated herein by reference constitute
                    the
                    entire agreement and understanding between the parties and contains all the agreements between them with
                    respect to the subject matter hereof. It also supersedes any and all other agreements, negotiations,
                    understandings, or contracts, either oral or written, between the parties with respect to the subject
                    matter
                    hereof. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">9.
                    Subcontracting: </h2>
                <p style="padding-bottom:5px"> Advantage Logistics LLC may, at its sole discretion, subcontract its
                    obligations
                    hereunder. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px"> 10.
                    Assignment:
                </h2>
                <p style="padding-bottom:5px"> The parties expressly agree that Client may not assign this Agreement
                    without
                    the written consent of Advantage Logistics LLC. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">11.
                    Severability:
                </h2>
                <p style="padding-bottom:5px"> If any provision or portion of a provision of this agreement is held invalid
                    by
                    a court of competent jurisdiction or pursuant to binding arbitration, such portion of the provision
                    shall be
                    severed from this agreement, and to the extent possible, this agreement shall continue with regard to
                    the
                    remaining provisions and portions of provisions. </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">12. Disputes
                </h2>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:84px">a.</strong>Any and all actions
                    or
                    proceedings shall be tried and litigated exclusively in the state and federal courts located in the
                    County
                    of St. Louis, State of Missouri, or the City of St. Louis, State of Missouri and those courts shall have
                    in
                    personam jurisdiction and venue over Client for the purpose of litigating any dispute, controversy or
                    proceeding arising out of or related to any service provided by/or to Advantage Logistics LLC. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:29px">b.</strong> Any right to assert
                    the
                    doctrine of forum non convenience or similar doctrine or to object to venue with respect to any
                    proceeding
                    brought is hereby waived. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:41px">c.</strong> This agreement shall
                    be
                    governed by the laws of the State of Missouri, except that any provisions applicable to indemnity or
                    liability for personal injury or property damage shall be governed by the law of the state in which the
                    incident occurred. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:41px">d.</strong> Client agrees to
                    accept
                    service of process sufficient for personal jurisdiction by registered or certified mail, to the address
                    set
                    forth below or its principle place of residence or employment. </p>
                <p style="padding-bottom:5px"> <strong
                        style="margin-right:15px; font-size:16px; float:left; height:41px">e.</strong> Client agrees and
                    promises to pay any and all charges incurred to enforce this agreement, finance charges, late fees, and
                    all
                    cost incurred in the collection of the same, including but not limited to, reasonable attorney fees.
                </p>
                <h2 style="color:#000; font-size:20px; font-weight:bold; margin-bottom:15px; margin-top:15px">13.
                    Indemnification: </h2>
                <p style="padding-bottom:5px"> Notwithstanding any other term of this Agreement, Client shall indemnify,
                    defend
                    and hold harmless Advantage Logistics LLC, Advantage Logistics LLC clients, and their affiliates,
                    current or
                    future directors, consultants, and agents and their respective successors, heirs and assigns (“Advantage
                    Logistics LLC Indemnities”), against any claim, liability, cost, damage, deficiency, loss, expense or
                    obligation of any kind or nature (including without limitation reasonable attorneys’ fees and other
                    costs
                    and expenses of litigation) incurred by or imposed upon Advantage Logistics LLC Indemnities or any one
                    of
                    them in connection with any claims, suits, actions, demands or judgments arising out of this Agreement
                    (including, but not limited to, actions in the form of tort, warranty, or strict liability). <br>
                    <br>
                    I understand that signing or submitting this contract electronically has the same legal effect and can
                    be
                    enforced in the same way as a written signature. Typing my name in the signature section below
                    represents my
                    intention to sign and to enter into this agreement.
                </p>
                <div class="clearfix"></div>
                <div class="boxes-new-wrpaer">
                    <div class="boxes">
                        <input type="checkbox" id="box-6" name="checkbox_6" @if (auth('account')->user()->agreement_checked)
                            checked="checked"
                        @endif>
                        <label for="box-6">I Agree</label>
                    </div>
                </div>
                <p class="mb-1"><span class="text-danger hidden" id="checkbox-notify">Please check all the checkbox in the agreement</span></p>
                <div class="flex-column p-1 border border-secondary rounded @if (auth('account')->user()->agreement_checked) hidden  @else d-flex @endif" id="unchecked-sign">
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Signature:</label>
                        <input type="text" name="signature" readonly="readonly"
                            class="border-top-0 border-left-0 rounded-0 border-right-0 bg-white border-bottom-dark"
                            id="signature"
                            style="color: #00F; font-family: 'Sacramento', cursive;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Date:</label>
                        <input type="text" class="border-top-0 border-left-0 rounded-0 border-right-0 bg-white border-bottom-dark" readonly="readonly">
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Print:</label>
                        <input type="text" class="border-top-0 border-left-0 border-right-0 rounded-0 bg-white border-bottom-dark" readonly="readonly">
                    </div>
                </div>
                <div class="flex-column p-1 border border-secondary rounded @if (!auth('account')->user()->agreement_checked) hidden  @endif" id="checked-sign">
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Signature:</label>
                        <input type="text" name="signature" value="{{ $clientName }}" readonly="readonly"
                            class="border-top-0 border-left-0 rounded-0 border-right-0 bg-white border-bottom-dark"
                            id="signature"
                            style="color: #00F; font-family: 'Sacramento', cursive;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Date:</label>
                        <input type="text" value="{{ $dateTime }}" class="border-top-0 border-left-0 rounded-0 border-right-0 bg-white border-bottom-dark" readonly="readonly">
                    </div>
                    <div class="d-flex justify-content-between">
                        <label for="signature" class="col-form-label col-form-label-sm w-25">Print:</label>
                        <input type="text" value="{{ $clientName }}" class="border-top-0 border-left-0 border-right-0 rounded-0 bg-white border-bottom-dark" readonly="readonly">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px">
                    <div class="form-group-button">
                        <a style="float: left" href="{{ route('account.personal.quotes', ['pass_step' => true]) }}"><input
                                type="button" value=Previous class="next-button disabled-anchor"></a>
                        <input style="float: right" type="submit" value="Next" id="next"
                            class="next-button disabled-anchor">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#personal-agreement").find('input[type="checkbox"]').click(function(e) {
                $('#checkbox-notify').addClass('hidden');
                if ($(e.target).attr('name') == 'checkbox_6') {
                    if ($('input[name="checkbox_6"]').prop('checked') == true) {
                        $('#checked-sign').addClass('d-flex');
                        $('#checked-sign').removeClass('hidden');
                        $('#unchecked-sign').addClass('hidden');
                        $('#unchecked-sign').removeClass('d-flex');
                    } else {
                        $('#unchecked-sign').addClass('d-flex');
                        $('#unchecked-sign').removeClass('hidden');
                        $('#checked-sign').addClass('hidden');
                        $('#checked-sign').removeClass('d-flex');
                    }
                }
            });
            $("#personal-agreement").validate({
                onfocusout: function(element) {$(element).valid()},
                ignore: [':not(checkbox:hidden)'],
                rules: {
                    "checkbox_1": {
                        required: true,
                    },
                    "checkbox_2": {
                        required: true,
                    },
                    "checkbox_3": {
                        required: true,
                    },
                    "checkbox_4": {
                        required: true,
                    },
                    "checkbox_5": {
                        required: true,
                    },
                    "checkbox_6": {
                        required: true,
                    },
                },
                errorPlacement: function(error, element) {
                },
                invalidHandler: function(event, validator) {
                    $('#checkbox-notify').removeClass('hidden');
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.personal.check-agreement') }}",
                        success: function(msg) {
                            window.location.reload();
                            window.location.href =
                                "{{ route('account.pickup.information') }}";
                        },
                        error: function(data) {}
                    });
                }
            });
        });
    </script>
@endsection
