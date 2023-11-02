<form>
    <input type="hidden" name="step" value="3">
    <div class="row">
        <div class="col-12 mb-3">
            <h4 class="text-center mb-2"><Strong>[Form W-9]</Strong></h4>
            <h5>Request For Taxpayer Identification Number And Ceritification</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="payer_name">Name (as shown on your income tax return)<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="payer_name" name="payer_name"
                    value="{{ $taxPayer->payer_name ?? '' }}" placeholder="Name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="biz_name">Business name/disregarded entity name</label>
                <input type="text" class="form-control" id="biz_name" name="biz_name"
                    value="{{ $taxPayer->biz_name ?? '' }}" placeholder="Business name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="federal_tax_classification" class="mb-2">Federal tax classification <span
                        class="text-danger">*</span></label>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" value="LLC"
                        id="federal_tax_classification_1"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'LLC' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_1">Individual/sole proprietor or single-member LLC</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" id="federal_tax_classification_2"
                        value="C_Corp"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'C_Corp' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_2">C Corporation</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" id="federal_tax_classification_3"
                        value="S_Corp"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'S_Corp' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_3">S Corporation</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" value="Partnership"
                        id="federal_tax_classification_4"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'Partnership' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_4">Partnership</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" value="Trust_LLC"
                        id="federal_tax_classification_5"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'Trust_LLC' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_5">Trust/estate single-member LLC</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" value="Limited_Liability_Company"
                        id="federal_tax_classification_6"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'Limited_Liability_Company' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_6" class="mb-0">Limited liability company <i
                            class="fa fa-eye text-primary" aria-hidden="true" id="tax_classification_notice"></i>
                        <span>Enter the tax classification (C=C
                            corporation, S=S corporation, P=Partnership)
                        </span>
                    </label>
                    <input type="text" name="tax_classification_value"
                        value="{{ $taxPayer->tax_classification_value ?? '' }}" style="text-transform: uppercase;"
                        class="w-50 border-top-0 border-left-0 border-right-0 form-control border-bottom border-dark rounded-0 ml-4" />
                    <label for="tax_classification_value" class="hidden ml-4" pattern="[C|S|P]" style="color:red;">tax
                        classfication must be C,S or P</label>
                </div>
                <div class="boxes">
                    <input type="checkbox" name="federal_tax_classification" value="Other"
                        id="federal_tax_classification_7"
                        {{ $taxPayer && $taxPayer->federal_tax_classification == 'Other' ? 'checked' : '' }} />
                    <label for="federal_tax_classification_7" class="mb-0">Other</label>
                    <input type="text" name="other_tax_classification_value"
                        value="{{ $taxPayer->other_tax_classification_value ?? '' }}"
                        class="w-50 border-top-0 border-left-0 border-right-0 form-control border-bottom border-dark rounded-0 ml-4" />
                    <label for="other_tax_classification_value" class="hidden ml-4" style="color:red">please fill
                        here</label>
                </div>
                <div class="boxes">
                    <label class="error" style="display: none">
                        please check at least one checkbox above
                    </label>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="tinModal" tabindex="-1" aria-labelledby="tinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Enter your TIN in the appropriate box. The TIN provided must match the name given on line 1 to avoid
                backup withholding. <br />
                For individuals, this is generally your social security number (SSN). However, for a
                resident alien, sole proprietor, or disregarded entity, see the instructions for Part I, later. For
                other entities, it is your employer identification number (EIN). If you do not have a number, see How to
                get a
                TIN, later.<br />
                Note: If the account is in more than one name, see the instructions for line 1. Also see What Name and
                Number To Give the Requester for guidelines on whose number to enter.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="taxClassification" tabindex="-1" aria-labelledby="taxClassificationLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Note: Check the appropriate box in the line above for the tax classification of the single-member owner.
                <br />
                Do not check LLC if the LLC is classified as a single-member LLC that is disregarded from the owner
                unless the owner
                of the LLC is another LLC that is not disregarded from the owner for U.S. federal tax purposes. <br />
                Otherwise, a single-member LLC that is disregarded from the owner should check the appropriate box for
                the tax classification of its owner.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>
