<form>
    <input type='hidden' name='step' value='5'>
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="text-center mb-2">Taxpayer Identification Number (TIN)</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div>
                    <label for="">Social Security Number</label>
                    <input type="text" class="form-control social_security_number" id="social_security_number"
                        name="social_security_number" value="{{ $taxPayer->social_security_number ?? '' }}">
                </div>
                <div><strong>OR</strong></div>
                <div>
                    <label for="">Employer Identification Number</label>
                    <input type="text" class="form-control employer_identification_number"
                        id="employer_identification_number" name="employer_identification_number"
                        value="{{ $taxPayer->employer_identification_number ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</form>
