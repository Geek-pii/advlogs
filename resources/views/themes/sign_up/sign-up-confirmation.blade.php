@extends('auth', ['content_class' => 'login-main-wrapper'])

@section('styles')
    <style>
        label.error {
            color: red !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row row-flex">
            <!--signup-->
            <div class="col-md-7">
                <div class="signup-wrapper" style="background:url('/assets/images/slider-image1.jpg') no-repeat top;">
                    <div class="signup-wrapper-text">
                        <h3><span> Welcome to </span><br>Advantage Logistics</h3>
                        There are many variations of alteration in some form by injected humour or randomised words which
                        don't look even slightly believable If you are going to use a passage of Lorem Ipsum you need to be
                        sure there isn't anything embarrassing.
                        <div class="signup-button-wrp">
                            {{-- <a href="/sign-up">Login to Your Account</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--//signup-->

            <!--login-->
            <div class="col-md-5">
                <div class="login-wrapper">
                    <div class="login-logo">
                        <a href="{{ route('page.home') }}">
                            <img src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}"
                                alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <form id="sign-up-confirmation-form" style="margin: 10%;"
                        action="{{ route('account.signup.confirmation.post') }}" method="POST">
                        @csrf
                        <h1>Sign Up Confirmation</h1>
                        @include('admin.layouts.partials.message')
                       
                        <div class="form-group">
                            <label>Confirm Account Type </label>
                            <select name="type" class="form-control" required>
                                @foreach (\App\Models\Account::$types as $key => $type)
                                    {{-- @dd($type) --}}
                                    <option value="{{ $key }}" @if (auth()->guard('account')->user()->type == $key) selected @endif>
                                        {{ $type }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>First Name <span class="text-danger">*</span></label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="form-control" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name <span class="text-danger">*</span></label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="form-control" placeholder="Doe" required>
                        </div>
                        <div class="form-group personal-fields"
                            @if (auth()->guard('account')->user()->type == 'personal') style="display:block" @else style="display:none" @endif>
                            <label>Primary Contact Number # <span class="text-danger">*</span></label>
                            <input type="text" id="primary_contact_number" name="primary_contact_number"
                                value="{{ old('primary_contact_number') }}" class="form-control phone_us"
                                placeholder="(XXX) XXX XXXX" />
                        </div>
                        <div class="form-group business-fields"
                            @if (auth()->guard('account')->user()->type == 'personal') style="display:none" @else style="display:block" @endif>
                            <label>Job Title <span class="text-danger">*</span></label>
                            <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}"
                                class="form-control" placeholder="CEO">
                        </div>
                        <div class="form-group business-fields"
                            @if (auth()->guard('account')->user()->type == 'personal') style="display:none" @else style="display:block" @endif>
                            <label>Business phone number # <span class="text-danger">*</span></label>
                            <input type="text" id="business_phone_number" name="business_phone_number"
                                value="{{ old('business_phone_number') }}" class="form-control phone_us"
                                placeholder="(XXX) XXX XXXX">
                        </div>
                        <div class="form-group business-fields"
                            @if (auth()->guard('account')->user()->type == 'personal') style="display:none" @else style="display:block" @endif>
                            <label>Business phone ext #</label>
                            <input type="text" id="business_phone_ext" name="business_phone_ext"
                                value="{{ old('business_phone_ext') }}" class="form-control" placeholder="XXX">
                        </div>
                        <div class="input-group form-group justify-content-between" id="security_field">
                            <div>
                                <label>Confirmation/Security Code # <span class="text-danger">*</span></label>
                                <input type="text" id="security_code" name="security_code"
                                    value="{{ old('security_code') }}" class="form-control" placeholder="XXXXXX"
                                    minlength="6" maxlength="6" required>
                            </div>
                            <div class="input-group-append p-1">
                                <span class="input-group-text rounded-pill" id="resend_btn" id="basic-addon2">Re-send</span>
                            </div>
                            {{-- <span class="input-group-btn">
                                <button id="resend_btn" class="btn btn-outline-secondary" type="button"
                                    style="width: 80px !important;border-radius: 30px;">Re-send</button>
                            </span> --}}
                        </div>
                        <div class="signin-button-wrapper">
                            <button type="submit" class="submit-form-button"><img
                                    src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--//login-->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("change", "select[name=type]", function() {
                var type = $(this).val();
                if (type === 'personal') {
                    $('.personal-fields').show();
                    $('.business-fields').hide();
                } else {
                    $('.personal-fields').hide();
                    $('.business-fields').show();
                }
                $('.account-type-message').each(function() {
                    if ($(this).data('type') == type) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                })
            });

            $('#sign-up-confirmation-form').validate({
                onfocusout: function(element) {$(element).valid()},
            });

            $('#resend_btn').click(function() {
                if ($('#resend_btn').text() == 'Re-send') {
                    var timeleft = 60;
                    var downloadTimer = setInterval(function() {
                        timeleft--;
                        $('#resend_btn').text(timeleft + ' s')
                        if (timeleft <= 0) {
                            clearInterval(downloadTimer);
                            $('#resend_btn').text('Re-send')
                        }
                    }, 1000);
                    $.ajax({
                        method: "GET",
                        url: "{{ route('user.retrieve-verification-code.post') }}",
                    });
                }

            })
        });
    </script>
@endsection
