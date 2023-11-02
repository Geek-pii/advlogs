<form>
    <input type="hidden" name="step" value="4">
    <div class="row">
        <div class="col-12 mb-3">
            <h4>Taxpayer Address Infomation</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Address <span class="text-danger">*</span></label>
                <input type="text" id="street_address" name="address" class="form-control street_address"
                    value="{{ $taxPayer ? $taxPayer->address : '' }}" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>City <span class="text-danger">*</span></label>
                <input type="text" id="city"name="city" class="form-control city" placeholder="City"
                    value="{{ $taxPayer ? $taxPayer->city : '' }}" style="border: none;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label> State <span class="text-danger">*</span></label>
                <input type="text" id="company_state"name="state" class="form-control state"
                    placeholder="State" value="{{ $taxPayer ? $taxPayer->state : '' }}" style="border: none;">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label> Zip <span class="text-danger">*</span></label>
                <input type="text" id="zip" name="zip" class="form-control zip_code"
                    placeholder="Zip" value="{{ $taxPayer ? $taxPayer->zip : '' }}" style="border: none;">
            </div>
        </div>
    </div>
</form>