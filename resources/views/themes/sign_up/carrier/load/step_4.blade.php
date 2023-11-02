    @php
        $sendOffer = $loads ? ($loads->send_offer ? $loads->send_offer : []) : [];
        $maxOffers = $loads ? ($loads->max_offers ? $loads->max_offers : []) : [];
        $contactPhoneNumbers = $companyContacts->pluck('business_phone_number')->toArray();
        $contactEmails = $companyContacts->pluck('email')->toArray();
        $contactPhoneArray = array_unique(array_merge($sendOffer, $contactPhoneNumbers, $contactEmails));
    @endphp
    <h4 class="text-center">Load Offers</h4>
    <form id="form-step-4" class="row ml-0 mr-0">
        <input type="hidden" name="step" value="4" />
        <div class="col-md-5 step-box">
            <div class="col-md-12 title">
                Send Load Offer and Inquiries to:
            </div>
            @foreach ($contactPhoneArray as $key => $phoneNumber)
                <div class="col-md-12 phone-number mb-1 mt-1">
                    <input type="checkbox" name="send_to[]" id="contact_number-checkbox-4-{{ $key }}"
                        value="{{ $phoneNumber }}" @if (($sendOffer && in_array($phoneNumber, $sendOffer)) || $phoneNumber == auth('account')->user()->mobile_number) checked @endif />
                    <label
                        for="contact_number-checkbox-4-{{ $key }}"><strong>{{ $phoneNumber }}</strong></label>
                </div>
            @endforeach
            <div class="col-md-12">
                <label>Add another email or phone # </label>
                <div class="d-flex">
                    <div class="phone mr-2">
                        <input type="text" id="new_contact" name="new_contact" />
                    </div>
                    <i class="fa fa-check fa-2x text-success" role="button" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-md-2"> &nbsp</div>
        <div class="col-md-5 step-box">
            <div class="col-md-12 title">
                Max Load Offers:
            </div>
            @php
                $maxLoadOffersChecked = true;
                if (in_array($maxOffers, ['max_1_load_offer_per_day', 'max_3_loads_offer_per_day', 'max_4_loads_offer_per_day'])) {
                    $maxLoadOffersChecked = false;
                }
            @endphp
            <div class="col-md-12">
                <div class="radio-boxes">
                    <input type="radio" name="max_load_offers" value="any_load_matching_my_lanes"
                        @if ($maxLoadOffersChecked) checked @endif />
                    <label for="have-authority-radio"><strong>Any load matching my lanes</strong></label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="radio-boxes">
                    <input type="radio" name="max_load_offers" value="max_1_load_offer_per_day"
                        @if (!$maxLoadOffersChecked && 'max_1_load_offer_per_day' == $maxOffers) checked @endif />
                    <label for="have-authority-radio"><strong>Max 1 load offer per day</strong></label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="radio-boxes">
                    <input type="radio" name="max_load_offers" value="max_3_loads_offer_per_day"
                        @if (!$maxLoadOffersChecked && 'max_3_loads_offer_per_day' == $maxOffers) checked @endif />
                    <label for="have-authority-radio"><strong>Max 3 load offers per day</strong></label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="radio-boxes">
                    <input type="radio" name="max_load_offers" value="max_4_loads_offer_per_day"
                        @if (!$maxLoadOffersChecked && 'max_4_loads_offer_per_day' == $maxOffers) checked @endif />
                    <label for="have-authority-radio"><strong>Max 4 load offers per day</strong></label>
                </div>
            </div>
        </div>
    </form>
    <div class="modal" tabindex="-1" id="loads-instruction-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">You requested early notification of loads on at least 1 lane on the previous screen. Please specify how we should notify you.</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    If you don’t want early notice of loads on your preferred routes, you may disable early notice on
                    all lanes, or modify which lanes to receive notice.<br />
                    Options: 
                        1. Specify How to Contact; 
                        2. Disable All Early Notice on All Loads; 
                        3. Modify Early Notice Lanes.
                    Specify how to contact closes the dialog box, allowing the user to select or enter phone numbers or
                    email addresses.<br />
                    Disable All Early Notice on All Loads, sets the Get Notification on all lanes this user entered to
                    No. The change is made in the background, Max load offers is disabled, user is advanced to next
                    screen.<br />
                    Modify Early Notice Lanes takes the user to the previous screen. 
                    <img src="/assets/images/load-instructions.png" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Got It</button>
                </div>
            </div>
        </div>
    </div>
