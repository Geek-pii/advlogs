<div class="modal fade" id="equipment-modal" tabindex="-1" aria-labelledby="tinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                @php
                    $equipment_capacity = $loads ? $loads->equipment_capacity : [];
                @endphp
                <form onsubmit="return false">
                <div class="card card-primary mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Equipment</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="total_trucks" class="col-form-label">How many total trucks do you have?</label>
                            <div class="col-3">
                                <input type="number" min="0" class="form-control" id="total_trucks" name="total_trucks"
                                    value="{{ $equipment_capacity && isset($equipment_capacity['total_trucks']) ? $equipment_capacity['total_trucks'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Equipment Capacity: </label>
                        </div>
                        <div class="border border-dark rounded p-2 mb-1">
                            <div class="form-group row">
                                <div class="col-3">
                                    <input type="number" min="0" class="form-control" name="capacity_1_quantity"
                                        value="{{ $equipment_capacity && isset($equipment_capacity['capacity_1_quantity']) ? $equipment_capacity['capacity_1_quantity'] : '' }}">
                                </div>
                                <label for="capacity_1_quantity" class="col-9 col-form-label">trucks that haul
                                    1-2 cars each</label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">select all that
                                    apply:</label>
                                <div class="d-flex justify-content-between">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-1"
                                            value="open" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_1_apply']) &&
                                                    in_array('open', $equipment_capacity['capacity_1_apply'])) checked @endif>
                                        <label for="have-authority-checkbox-1"><strong>Open</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-2"
                                            value="enclosed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_1_apply']) &&
                                                    in_array('enclosed', $equipment_capacity['capacity_1_apply'])) checked @endif>
                                        <label for="have-authority-checkbox-2"><strong>Enclosed</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-3"
                                            value="flatbed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_1_apply']) &&
                                                    in_array('flatbed', $equipment_capacity['capacity_1_apply'])) checked @endif>
                                        <label for="have-authority-checkbox-3"><strong>Flatbed</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_1_apply[]" id="have-authority-checkbox-4"
                                            value="step_deck" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_1_apply']) &&
                                                    in_array('step_deck', $equipment_capacity['capacity_1_apply'])) checked @endif>
                                        <label for="have-authority-checkbox-4"><strong>Step Deck</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border border-dark rounded p-2 mb-1">
                            <div class="form-group row">
                                <div class="col-3">
                                    <input type="number" min="0" class="form-control" name="capacity_3_quantity"
                                        value="{{ $equipment_capacity && isset($equipment_capacity['capacity_3_quantity']) ? $equipment_capacity['capacity_3_quantity'] : '' }}">
                                </div>
                                <label for="capacity_3_quantity" class="col-9 col-form-label">trucks
                                    that haul 3-4 cars each</label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">select all that
                                    apply:</label>
                                <div class="d-flex justify-content-between">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_3_apply[]" id="capacity-3-apply-1"
                                            value="open" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_3_apply']) &&
                                                    in_array('open', $equipment_capacity['capacity_3_apply'])) checked @endif>
                                        <label for="capacity-3-apply-1"><strong>Open</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_3_apply[]" id="capacity-3-apply-2"
                                            value="enclosed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_3_apply']) &&
                                                    in_array('enclosed', $equipment_capacity['capacity_3_apply'])) checked @endif>
                                        <label for="capacity-3-apply-2"><strong>Enclosed</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_3_apply[]" id="capacity-3-apply-3"
                                            value="flatbed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_3_apply']) &&
                                                    in_array('flatbed', $equipment_capacity['capacity_3_apply'])) checked @endif>
                                        <label for="capacity-3-apply-3"><strong>Flatbed</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_3_apply[]" id="capacity-3-apply-4"
                                            value="step_deck" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_3_apply']) &&
                                                    in_array('step_deck', $equipment_capacity['capacity_3_apply'])) checked @endif>
                                        <label for="capacity-3-apply-4"><strong>Step Deck</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border border-dark rounded p-2 mb-1">
                            <div class="form-group row">
                                <div class="col-3">
                                    <input type="number" min="0" class="form-control"
                                        name="capacity_5_quantity"
                                        value="{{ $equipment_capacity && isset($equipment_capacity['capacity_5_quantity']) ? $equipment_capacity['capacity_5_quantity'] : '' }}">
                                </div>
                                <label for="capacity_5_quantity" class="col-9 col-form-label">trucks that haul 5-6
                                    cars each</label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">select all that
                                    apply:</label>
                                <div class="d-flex justify-content-around w-50">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_5_apply[]" id="capacity-5-apply-1"
                                            value="open" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_5_apply']) &&
                                                    in_array('open', $equipment_capacity['capacity_5_apply'])) checked @endif>
                                        <label for="capacity-5-apply-1"><strong>Open</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_5_apply[]" id="capacity-5-apply-2"
                                            value="enclosed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_5_apply']) &&
                                                    in_array('enclosed', $equipment_capacity['capacity_5_apply'])) checked @endif>
                                        <label for="capacity-5-apply-2"><strong>Enclosed</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border border-dark rounded p-2 mb-1">
                            <div class="form-group row">
                                <div class="col-3">
                                    <input type="number" min="0" class="form-control"
                                        name="capacity_7_quantity"
                                        value="{{ $equipment_capacity && isset($equipment_capacity['capacity_7_quantity']) ? $equipment_capacity['capacity_7_quantity'] : '' }}">
                                </div>
                                <label for="capacity_7_quantity" class="col-9 col-form-label">trucks that haul 7-8
                                    cars each</label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">select all that
                                    apply:</label>
                                <div class="d-flex justify-content-around w-50">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_7_apply[]" id="capacity-5-apply-1"
                                            value="open" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_7_apply']) &&
                                                    in_array('open', $equipment_capacity['capacity_7_apply'])) checked @endif>
                                        <label for="capacity-5-apply-1"><strong>Open</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_7_apply[]" id="capacity-5-apply-2"
                                            value="enclosed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_7_apply']) &&
                                                    in_array('enclosed', $equipment_capacity['capacity_7_apply'])) checked @endif>
                                        <label for="capacity-5-apply-2"><strong>Enclosed</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border border-dark rounded p-2 mb-2">
                            <div class="form-group row">
                                <div class="col-3">
                                    <input type="number" min="0" class="form-control"
                                        name="capacity_9_quantity"
                                        value="{{ $equipment_capacity && isset($equipment_capacity['capacity_9_quantity']) ? $equipment_capacity['capacity_9_quantity'] : '' }}">
                                </div>
                                <label for="capacity_9_quantity" class="col-9 col-form-label">trucks that haul 9-10
                                    cars each</label>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">select all that
                                    apply:</label>
                                <div class="d-flex justify-content-around w-50">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_9_apply[]" id="capacity-5-apply-1"
                                            value="open" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_9_apply']) &&
                                                    in_array('open', $equipment_capacity['capacity_9_apply'])) checked @endif>
                                        <label for="capacity-5-apply-1"><strong>Open</strong></label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" name="capacity_9_apply[]" id="capacity-5-apply-2"
                                            value="enclosed" @if (
                                                $equipment_capacity &&
                                                    isset($equipment_capacity['capacity_9_apply']) &&
                                                    in_array('enclosed', $equipment_capacity['capacity_9_apply'])) checked @endif>
                                        <label for="capacity-5-apply-2"><strong>Enclosed</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="verify_total_trucks" class="col-form-label">Total Car Hauling Unites:</label>
                            <div class="col-3">
                                <input type="number" min="0" class="form-control" id="verify_total_trucks" name="verify_total_trucks"
                                    readonly
                                    value="{{ $equipment_capacity && isset($equipment_capacity['total_trucks']) ? $equipment_capacity['total_trucks'] : 0 }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Does at least one of these have a
                                winch? <span class="text-danger">*</span></label>
                            <div class="col-sm-12">
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
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="update-equipment">Save Changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
