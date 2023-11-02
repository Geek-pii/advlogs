<div class="form-group">
    <label>Choose Account Type <span class="text-danger">*</span></label>
    <select name="type" class="form-control" required>
        <option value="">Select Account Type</option>
        @foreach (\App\Models\Account::$types as $k => $type)
            <option value="{{ $k }}" @if(request()->get('type') == $k) selected="selected" @endif>{{ $type }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Mobile # <span class="text-danger">*</span></label>
    <input type="text" id="mobile_number" name="mobile_number" class="form-control phone_us"
        placeholder="(XXX) XXX-XXXX" maxlength="14" value="{{ old('mobile_number') }}" required>
</div>
<div class="form-group">
    <label>Enter Email <span class="text-danger">*</span></label>
    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
        placeholder="Enter Email" data-rule-email="true" required>
</div>
<div class="form-group">
    <label>Confirm Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control" name="confirm_email" value="{{ old('confirm_email') }}"
        placeholder="Confirm Email" data-rule-email="true" data-rule-equalTo="#email" required>
</div>
<div class="form-group">
    <label> Password <span class="text-danger">*</span>&nbsp;<span class="text-danger hidden caps-lock">(Caps lock is ON)</span></label>
    <div class="d-flex">
        <input type="password" name="password" id="password" class="form-control password-field" placeholder="Password" minlength="8"
        data-toggle="popover" 
        data-trigger="focus" 
        title="Password Requirements" 
        data-placement="bottom" 
        data-html="true"
        data-content="
        Your password should: <br />
        1. be at least 8 characaters long <br /> 
        2. contain at least one special character(s) (!@#$%^&*) <br />
        3. contain at least one lower case character(s) <br />
        4. contain at least one upper case character(s) <br />
        5. contain at least one number
        "
        >
        <div class="input-group-addon">
            <i class="fa fa-eye text-secondary password-icon" aria-hidden="true" role="button"></i>
        </div>
    </div>
</div>
<div class="form-group">
    <label> Re-Password <span class="text-danger">*</span>&nbsp;<span class="text-danger hidden caps-lock">(Caps lock is ON)</span></label>
    <div class="d-flex">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control password-field" placeholder="Confirm Password" minlength="8"
            data-rule-equalTo="#password">
        <div class="input-group-addon">
            <i class="fa fa-eye text-secondary password-icon" aria-hidden="true" role="button"></i></a>
        </div>
    </div>
</div>
<div class="signin-button-wrapper">
    <button type="button" id="continue_step_1">
        Continue
    </button>
</div>
<div class="dont-have-account already-account-wrapper"> Already have an account? <a href="/login">Login to Your
        Account</a></div>
