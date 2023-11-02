<form>
    <input type="hidden" name="step" value="6">
    <div class="row">
        <div class="col-12 mb-3">
            <h5>Certification</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>
                Under penalties of perjury, I certify that:<br />
                1. The number shown on this form is my correct taxpayer identification number (or I am waiting for a
                number to be issued to me); and <br />
                2. I am not subject to backup withholding because: (a) I am exempt from backup withholding, or (b) I
                have not been notified by the Internal Revenue
                Service (IRS) that I am subject to backup withholding as a result of a failure to report all interest or
                dividends, or (c) the IRS has notified me that I am
                no longer subject to backup withholding; and<br />
                3. I am a U.S. citizen or other U.S. person (defined below); and<br />
                4. The FATCA code(s) entered on this form (if any) indicating that I am exempt from FATCA reporting is
                correct.<br />
                Certification instructions. You must cross out item 2 above if you have been notified by the IRS that
                you are currently subject to backup withholding because
                you have failed to report all interest and dividends on your tax return. For real estate transactions,
                item 2 does not apply. For mortgage interest paid,
                acquisition or abandonment of secured property, cancellation of debt, contributions to an individual
                retirement arrangement (IRA), and generally, payments
                other than interest and dividends, you are not required to sign the certification, but you must provide
                your correct TIN. See the instructions for Part II, later
            </p>
        </div>
        <div class="col-12">
            <div class="boxes">
                <input type="checkbox" name="i_agree" id="i_agree" value="1"/>
                <label for="i_agree">I Agree</label>
            </div>
        </div>
        <div class="col-12 not-sign-yet">
            <div class="form-group border-0 p-0 d-flex shadow-none">
                <label for="signature" class="col-3 p-0"><strong>Signature:</strong></label>
                <input type="text" readonly 
                    class="signature w-50 form-control bg-white border-bottom border-dark rounded-0"
                    aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="col-12 not-sign-yet">
            <div class="form-group border-0 p-0 d-flex shadow-none">
                <label for="date_input" class="col-3 p-0"><strong>Date:</strong></label>
                <input type="text" readonly
                    class="form-control w-50 date_input bg-white text-dark border-bottom border-dark rounded-0"
                    aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="col-12 signed hidden">
            <div class="form-group border-0 p-0 d-flex shadow-none">
                <label for="signature" class="col-3 p-0"><strong>Signature:</strong></label>
                <input type="text" readonly
                    class="signature w-50 form-control bg-white border-bottom border-dark rounded-0"
                    value="{{ auth('account')->user()->full_name }}" aria-describedby="passwordHelpInline">
            </div>
        </div>
        <div class="col-12 signed hidden">
            <div class="form-group border-0 p-0 d-flex shadow-none">
                <label for="date_input" class="col-3 p-0"><strong>Date:</strong></label>
                <input type="text" readonly
                    class="form-control w-50 date_input bg-white text-dark border-bottom border-dark rounded-0"
                     aria-describedby="passwordHelpInline">
            </div>
        </div>
    </div>
</form>
