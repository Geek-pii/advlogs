<form id="form-step-1">
    @php
        $equipment_capacity = $loads ? $loads->equipment_capacity : [];
    @endphp
        <h4 class="text-center mb-2">Equipment</h4>
    <div class="row top-title">
        How many total trucks do you have? <input type="number" min="0" class="no-border-input text-center" name="total_trucks" id="total_trucks"
            value="{{ $equipment_capacity && isset($equipment_capacity['total_trucks']) ? $equipment_capacity['total_trucks'] : '' }}" />
        <input type="hidden" name="step" value="1" />
    </div>
    <div class="row step-title">Equipment Capacity</div>
    <div class="row item ml-0 mr-0">
        <div class="col-md-5 pl-0 pr-0">
            <input type="number" min="0" class="no-border-input text-center" name="capacity_1_quantity"
                value="{{ $equipment_capacity && isset($equipment_capacity['capacity_1_quantity']) ? $equipment_capacity['capacity_1_quantity'] : '' }}" />
            trucks that haul 1-2 cars each
        </div>
        <div class="select-apply-title col-md-3 pl-0 pr-0">select all that apply:</div>
        <div class="flex col-md-4 pl-0 pr-0">
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-1" value="open"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_1_apply']) &&
                            in_array('open', $equipment_capacity['capacity_1_apply'])) checked @endif />
                    <label for="have-authority-checkbox-1"><strong>Open</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-2" value="enclosed"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_1_apply']) &&
                            in_array('enclosed', $equipment_capacity['capacity_1_apply'])) checked @endif />
                    <label for="have-authority-checkbox-2"><strong>Enclosed</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-3" value="flatbed"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_1_apply']) &&
                            in_array('flatbed', $equipment_capacity['capacity_1_apply'])) checked @endif />
                    <label for="have-authority-checkbox-3"><strong>Flatbed</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-4" value="step_deck"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_1_apply']) &&
                            in_array('step_deck', $equipment_capacity['capacity_1_apply'])) checked @endif />
                    <label for="have-authority-checkbox-4"><strong>Step Deck</strong></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row item ml-0 mr-0">
        <div class="col-md-5 d-flex justify-content-between pl-0 pr-0">
            <div><input type="number" min="0" class="no-border-input text-center" name="capacity_3_quantity"
                    value="{{ $equipment_capacity && isset($equipment_capacity['capacity_3_quantity']) ? $equipment_capacity['capacity_3_quantity'] : '' }}" />trucks
                that haul 3-4 cars each</div>
        </div>
        <div class="select-apply-title col-md-3 pl-0 pr-0">select all that apply:</div>
        <div class="flex col-md-4 pl-0 pr-0">
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_3_apply[]" id="have-authority-checkbox-5" value="open"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_3_apply']) &&
                            in_array('open', $equipment_capacity['capacity_3_apply'])) checked @endif />
                    <label for="have-authority-checkbox-5"><strong>Open</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_3_apply[]" id="have-authority-checkbox-6" value="enclosed"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_3_apply']) &&
                            in_array('enclosed', $equipment_capacity['capacity_3_apply'])) checked @endif />
                    <label for="have-authority-checkbox-6"><strong>Enclosed</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_3_apply[]" id="have-authority-checkbox-7" value="flatbed"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_3_apply']) &&
                            in_array('flatbed', $equipment_capacity['capacity_3_apply'])) checked @endif />
                    <label for="have-authority-checkbox-7"><strong>Flatbed</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_3_apply[]" id="have-authority-checkbox-8" value="step_deck"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_3_apply']) &&
                            in_array('step_deck', $equipment_capacity['capacity_3_apply'])) checked @endif />
                    <label for="have-authority-checkbox-8"><strong>Step Deck</strong></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row item ml-0 mr-0">
        <div class="col-md-5 d-flex justify-content-between pl-0 pr-0">
            <div><input type="number" min="0" class="no-border-input text-center" name="capacity_5_quantity"
                    value="{{ $equipment_capacity && isset($equipment_capacity['capacity_5_quantity']) ? $equipment_capacity['capacity_5_quantity'] : '' }}" />trucks
                that haul 5-6 cars each</div>
        </div>
        <div class="select-apply-title col-md-3 pl-0 pr-0">select all that apply:</div>
        <div class="flex col-md-4 pl-0 pr-0">
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_5_apply[]" id="have-authority-checkbox-9" value="open"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_5_apply']) &&
                            in_array('open', $equipment_capacity['capacity_5_apply'])) checked @endif />
                    <label for="have-authority-checkbox-9"><strong>Open</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_5_apply[]" id="have-authority-checkbox-10" value="enclosed"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_5_apply']) &&
                            in_array('enclosed', $equipment_capacity['capacity_5_apply'])) checked @endif />
                    <label for="have-authority-checkbox-10"><strong>Enclosed</strong></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row item ml-0 mr-0">
        <div class="col-md-5 d-flex justify-content-between pl-0 pr-0">
            <div><input type="number" min="0" class="no-border-input text-center" name="capacity_7_quantity"
                    value="{{ $equipment_capacity && isset($equipment_capacity['capacity_7_quantity']) ? $equipment_capacity['capacity_7_quantity'] : '' }}" />trucks
                that haul 7-8 cars each</div>
        </div>
        <div class="select-apply-title col-md-3 pl-0 pr-0">select all that apply:</div>
        <div class="flex col-md-4 pl-0 pr-0">
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_7_apply[]" id="have-authority-checkbox-11" value="open"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_7_apply']) &&
                            in_array('open', $equipment_capacity['capacity_7_apply'])) checked @endif />
                    <label for="have-authority-checkbox-11"><strong>Open</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_7_apply[]" id="have-authority-checkbox-12"
                        value="enclosed" @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_7_apply']) &&
                            in_array('enclosed', $equipment_capacity['capacity_7_apply'])) checked @endif />
                    <label for="have-authority-checkbox-12"><strong>Enclosed</strong></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row item ml-0 mr-0">
        <div class="col-md-5 d-flex justify-content-between pl-0 pr-0">
            <div><input type="number" min="0" class="no-border-input text-center" name="capacity_9_quantity"
                    value="{{ $equipment_capacity && isset($equipment_capacity['capacity_9_quantity']) ? $equipment_capacity['capacity_9_quantity'] : '' }}" />trucks
                that haul 9-10 cars each</div>
        </div>
        <div class="select-apply-title col-md-3 pl-0 pr-0">select all that apply:</div>
        <div class="flex col-md-4 pl-0 pr-0">
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_9_apply[]" id="have-authority-checkbox-13" value="open"
                        @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_9_apply']) &&
                            in_array('open', $equipment_capacity['capacity_9_apply'])) checked @endif />
                    <label for="have-authority-checkbox-13"><strong>Open</strong></label>
                </div>
            </div>
            <div class="">
                <div class="boxes">
                    <input type="checkbox" name="capacity_9_apply[]" id="have-authority-checkbox-14"
                        value="enclosed" @if ($equipment_capacity &&
                            isset($equipment_capacity['capacity_9_apply']) &&
                            in_array('enclosed', $equipment_capacity['capacity_9_apply'])) checked @endif />
                    <label for="have-authority-checkbox-14"><strong>Enclosed</strong></label>
                </div>
            </div>
        </div>
    </div>
    <div class="row top-title ml-0 mr-0">
        <strong>Total Car Hauling Units</strong> <input type="text" readonly class="no-border-input text-center"
            name="verify_total_trucks" value="{{ $equipment_capacity && isset($equipment_capacity['total_trucks']) ? $equipment_capacity['total_trucks'] : 0 }}"/>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="truck_have_winch">Does at least one of these have a winch? <span class="text-danger">*</span></label>
            <div class="form-group border-0 pl-0 shadow-none">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="truck_have_winch" id="winch_radio_yes" value="Y" @if ($loads &&
                    isset($loads['truck_have_winch']) && $loads['truck_have_winch'] == 'Y') checked @endif>
                    <label class="form-check-label" for="winch_radio_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="truck_have_winch" id="winch_radio_no" value="N" @if ($loads &&
                    isset($loads['truck_have_winch']) && $loads['truck_have_winch'] == 'N') checked @endif>
                    <label class="form-check-label" for="winch_radio_no">No</label>
                </div>
            </div>

        </div>
    </div>
</form>
