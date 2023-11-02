<div class="modal fade" id="vehicle-type-modal" tabindex="-1" aria-labelledby="tinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                @php
                    $vehicleTypes = $loads ? $loads->vehicle_types : [];
                @endphp
                <form onsubmit="return false">
                    <div class="card card-primary mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Vehicle Hauled</h3>
                        </div>
                        <div class="card-body">
                            <div class="border border-dark rounded p-2 mb-1">
                                <div class="form-group">
                                    <label class="col-form-label">Vehicle Types Hauled</label>
                                    <div class="">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]"
                                                value="car_suv_pickup_minivan" id="step_2_car_suv_pickup_minivan"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('car_suv_pickup_minivan', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label
                                                for="step_2_car_suv_pickup_minivan"><strong>Car/SUV/Pickup/Minivan</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="large_van"
                                                id="step_2_large_van"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('large_van', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_large_van"><strong>Large Van</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="motor_cycle"
                                                id="step_2_motor_cycle"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('motor_cycle', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_motor_cycle"><strong>Motor Cycle</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="atv"
                                                id="step_2_atv" @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('atv', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_atv"><strong>ATV</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="boat"
                                                id="step_2_boat" @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('boat', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_boat"><strong>Boat</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="rv"
                                                id="step_2_rv" @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('rv', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_rv"><strong>RV</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="travel_trailer"
                                                id="step_2_travel_trailer"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('travel_trailer', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_travel_trailer"><strong>Travel Trailer</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="bucket_truck"
                                                id="step_2_bucket_truck"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('bucket_truck', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_bucket_truck"><strong>Bucket Truck</strong></label>
                                        </div>
                                        <br />
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" name="vehicle_types_hauled[]" value="heavy_equipment"
                                                id="step_2_heavy_equipment"
                                                @if (
                                                    $vehicleTypes &&
                                                        isset($vehicleTypes['vehicle_types_hauled']) &&
                                                        in_array('heavy_equipment', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
                                            <label for="step_2_heavy_equipment"><strong>Heavy Equipment</strong></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Vehicle Types Hauled</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="vehicle_types_hauled_selected"
                                        id="vehicle_types_hauled_selected1" value="yes_most_inops"
                                        @if (isset($vehicleTypes['vehicle_types_hauled_selected']) &&
                                                $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_most_inops') checked="checked" @endif />
                                    <label class="custom-control-label" for="vehicle_types_hauled_selected1">Yes, we accept
                                        most inops</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="vehicle_types_hauled_selected"
                                        id="vehicle_types_hauled_selected2" value="yes_only_inops"
                                        @if (isset($vehicleTypes['vehicle_types_hauled_selected']) &&
                                                $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_only_inops') checked="checked" @endif>
                                    <label class="custom-control-label" for="vehicle_types_hauled_selected2">Yes, only if it
                                        rolls, steers and
                                        brakes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="vehicle_types_hauled_selected"
                                        id="vehicle_types_hauled_selected3" value="yes_only_fork-lifed"
                                        @if (isset($vehicleTypes['vehicle_types_hauled_selected']) &&
                                                $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_only_fork-lifed') checked="checked" @endif>
                                    <label class="custom-control-label" for="vehicle_types_hauled_selected3">Yes, only if
                                        it's fork-lifted
                                        on/off</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio"
                                        name="vehicle_types_hauled_selected" id="vehicle_types_hauled_selected4"
                                        value="no_not_accept"
                                        @if (isset($vehicleTypes['vehicle_types_hauled_selected']) &&
                                                $vehicleTypes['vehicle_types_hauled_selected'] == 'no_not_accept') checked="checked" @endif>
                                    <label class="custom-control-label" for="vehicle_types_hauled_selected4">No, we don't
                                        accept any inoperable
                                        vehicles</label>
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
