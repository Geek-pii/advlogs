@php
    $vehicleTypes = $loads ? $loads->vehicle_types : [];
@endphp
<form id="form-step-2" class="row ml-0 mr-0">
    <input type="hidden" name="step" value="2" />
    <div class="col-md-5 step-box">
        <h5 class="mb-3">Vehicle Types Hauled</h5>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="car_suv_pickup_minivan"
                id="step_2_car_suv_pickup_minivan" @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('car_suv_pickup_minivan', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_car_suv_pickup_minivan"><strong>Car/SUV/Pickup/Minivan</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="large_van" id="step_2_large_van"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('large_van', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_large_van"><strong>Large Van</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="motor_cycle" id="step_2_motor_cycle"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('motor_cycle', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_motor_cycle"><strong>Motor Cycle</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="atv" id="step_2_atv"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('atv', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_atv"><strong>ATV</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="boat" id="step_2_boat"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('boat', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_boat"><strong>Boat</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="rv" id="step_2_rv"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('rv', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_rv"><strong>RV</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="travel_trailer" id="step_2_travel_trailer"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('travel_trailer', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_travel_trailer"><strong>Travel Trailer</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="bucket_truck" id="step_2_bucket_truck"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('bucket_truck', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_bucket_truck"><strong>Bucket Truck</strong></label>
        </div>
        <div class="boxes">
            <input type="checkbox" name="vehicle_types_hauled[]" value="heavy_equipment" id="step_2_heavy_equipment"
                @if (
                    $vehicleTypes &&
                        isset($vehicleTypes['vehicle_types_hauled']) &&
                        in_array('heavy_equipment', $vehicleTypes['vehicle_types_hauled'])) checked @endif />
            <label for="step_2_heavy_equipment"><strong>Heavy Equipment</strong></label>
        </div>
    </div>
    <div class="col-md-2">&nbsp</div>
    <div class="col-md-5">
        <h5 class="mb-2">Do you accept inoperable vehicles?</h5>
        <div class="form-group border-0 mb-0 shadow-none">
            <input class="form-check-input" type="radio" name="vehicle_types_hauled_selected"
                id="vehicle_types_hauled_selected1" value="yes_most_inops"
                @if (isset($vehicleTypes['vehicle_types_hauled_selected']) && $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_most_inops') checked="checked" @endif
            />
            <label class="form-check-label" for="vehicle_types_hauled_selected1" >Yes, we accept most inops</label>
        </div>
        <div class="form-group border-0 mb-0 shadow-none">
            <input class="form-check-input" type="radio" name="vehicle_types_hauled_selected"
                id="vehicle_types_hauled_selected2" value="yes_only_inops"
                @if (isset($vehicleTypes['vehicle_types_hauled_selected']) && $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_only_inops') checked="checked" @endif
            >
            <label class="form-check-label" for="vehicle_types_hauled_selected2">Yes, only if it rolls, steers and
                brakes</label>
        </div>
        <div class="form-group border-0 mb-0 shadow-none">
            <input class="form-check-input" type="radio" name="vehicle_types_hauled_selected"
                id="vehicle_types_hauled_selected3" value="yes_only_fork-lifed"
                @if (isset($vehicleTypes['vehicle_types_hauled_selected']) && $vehicleTypes['vehicle_types_hauled_selected'] == 'yes_only_fork-lifed') checked="checked" @endif
            >
            <label class="form-check-label" for="vehicle_types_hauled_selected3">Yes, only if it's fork-lifted
                on/off</label>
        </div>
        <div class="form-group border-0 mb-0 shadow-none" id="error_msg_hook">
            <input class="form-check-input" type="radio" name="vehicle_types_hauled_selected"
                id="vehicle_types_hauled_selected4" value="no_not_accept"
                @if (isset($vehicleTypes['vehicle_types_hauled_selected']) && $vehicleTypes['vehicle_types_hauled_selected'] == 'no_not_accept') checked="checked" @endif
            >
            <label class="form-check-label" for="vehicle_types_hauled_selected4">No, we don't accept any inoperable
                vehicles</label>
        </div>
    </div>
</form>
