@php
 $physicAddress = $company ? $company->address()->where('sub_type', 'physic_address')->first() : null;   
@endphp
<input type="hidden" name="company_id"
@if($company) value="{{ $company->id}}" @endif
>
    <div class="row">
        <div class="col-md-12">
            <h4>Company Name</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" id="comapnyNAme">
                <label>Company Legal Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="company_legal_name"
                @if ($company) value="{{ $company->company_legal_name }}" @endif
                 placeholder="Company Legal Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="comapnyDBA">
                <label>Company DBA</label>
                <input type="text" name="company_dba" class="form-control"
                @if ($company) value="{{ $company->company_dba }}" @endif
                placeholder="DBA">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Business’s Physical Address *</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group streetAdress">
                <label> Street Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control location-field pac-target-input street_address"
                    name="street_address" id="autocomplete" placeholder="Street Address"
                    @if ($physicAddress) value="{{ $physicAddress->street_address }}" @endif
                    autocomplete="off">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="citydiv">
                <label> City <span class="text-danger">*</span></label>
                <input type="text" class="form-control city" name="city"
                @if ($physicAddress) value="{{ $physicAddress->city }}" @endif
                placeholder="City">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="state_div">
                <label> State <span class="text-danger">*</span></label>
                <input type="text" name="state" class="form-control state"
                @if ($physicAddress) value="{{ $physicAddress->state }}" @endif
                placeholder="State">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="zip_div">
                <label> Zip <span class="text-danger">*</span></label>
                <input type="text" class="form-control zip_code" name="zip"
                @if ($physicAddress) value="{{ $physicAddress->zip }}" @endif
                placeholder="zip">
            </div>
        </div>
    </div>
