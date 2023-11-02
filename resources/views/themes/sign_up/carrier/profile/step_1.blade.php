<form id="search-carrier-form">
    <div class="row">
        <div class="col-12 mb-3">
            <h4> Enter MC or DOT #</h4>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Carrier MC # or DOT # <span class="text-danger">*</span></label>
                <input id="searchmc" class="form-control" type="number" placeholder="Carrier MC # or DOT #" name="carrier_mc_or_dot"
                @if ($company) value="{{ $company->carrier_or_dot_search }}" @endif
                    style="border: none;">
            </div>
        </div>
        <div class="col-12 text-right">
            <div class="form-group" style="border: none; box-shadow: none">
                <button type="button" id="search-carrier" class="modal-button-modal">Find</button>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="search-carrier-result" tabindex="-1" aria-labelledby="label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="label">MC/DOT Search Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 50vh;overflow:scroll">
                <div class="filed-form-popup" id="carrier-search-data">
                    <p> Please confirm the company name and address to proceed</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Search Again</button>
                <button type="button" class="btn btn-info manully-fill-company" id="manully-fill-company">Manually Fill</button>
                <button type="button" class="btn btn-primary" id="copy-carrier">Select</button>
            </div>
        </div>
    </div>
</div>
