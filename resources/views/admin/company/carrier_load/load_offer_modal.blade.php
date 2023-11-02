<div class="modal fade" id="load-offers-modal" tabindex="-1" aria-labelledby="tinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                @php
                    $sendOffer = $loads ? ($loads->send_offer ? $loads->send_offer : []) : [];
                    $maxOffers = $loads ? ($loads->max_offers ? $loads->max_offers : []) : [];
                    $companyContacts = $loads->company->accounts ? $loads->company->accounts : null;
                    $contactPhoneNumbers = $companyContacts->pluck('business_phone_number')->toArray();
                    $contactEmails = $companyContacts->pluck('email')->toArray();
                    $contactPhoneArray = array_unique(array_merge($sendOffer, $contactPhoneNumbers, $contactEmails));
                @endphp
                <form onsubmit="return false">
                    <div class="card card-primary mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Load Offers</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group border rounded">
                                <label class="col-form-label">Send Load Offer and Inquiries to:</label>
                                @foreach ($contactPhoneArray as $key => $phoneNumber)
                                    <div class="col-md-12 mb-1 mt-1 phone-number">
                                        <input type="checkbox" name="send_to[]"
                                            id="contact_number-checkbox-4-{{ $key }}" value="{{ $phoneNumber }}"
                                            @if (($sendOffer && in_array(str_replace([' ', '(', ')'], '', $phoneNumber), $sendOffer))) checked @endif />
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
                            <div class="form-group border rounded">
                                <label class="col-form-label">Max Load Offers:</label>
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
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
