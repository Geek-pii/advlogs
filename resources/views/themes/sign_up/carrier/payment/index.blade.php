@extends('sign_up_process', ['content-class' => 'container-fluid'])
@section('styles')
    <style>
        .next-button {
            background-image: linear-gradient(to right, #a0984f, #959679) !important;
            border-radius: 30px;
            padding: 14px 40px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            border: none;
            outline: none;
            box-shadow: none;
            cursor: pointer;
        }

        .next-button:focus,
        .next-button:hover {
            text-decoration: none;
            color: white
        }

        .error {
            color: red;
            display: block;
        }
    </style>
@endsection
@php
    $pageStep = $continueStep;
@endphp
@section('content')
    <div class="container">
        @include('themes.sign_up.carrier._step_list')
        <div id="step_1" class="@if ($pageStep != 1) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_1')
        </div>
        <div id="step_2" class="@if ($pageStep != 2) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_2')
        </div>
        <div id="step_3" class="@if ($pageStep != 3) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_3')
        </div>
        <div id="step_4" class="@if ($pageStep != 4) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_4')
        </div>
        <div id="step_5" class="@if ($pageStep != 5) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_5')
        </div>
        <div id="step_6" class="@if ($pageStep != 6) hidden @endif">
            @include('themes.sign_up.carrier.payment.step_6')
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <button type="button"
                    class="wizard-next-prev-btn next-button pull-left @if (auth()->guard('account')->user()->account_step_number < 3) hidden @endif"
                    id="prev-button">Previous</button>
                <button type="button" data-toggle="modal" data-target="#myModal2121"
                    class="wizard-next-prev-btn next-button pull-right" id="next-button">Next</button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var step =
            {{ $pageStep }};
        $(document).ready(function() {
            var authUser = {!! json_encode(auth('account')->user()) !!}
            $('#next-button').click(function() {
                $('#step_' + step).find('form').submit();
            });
            $('#prev-button').click(function() {
                if (step > 1) {
                    $('#step_' + step).addClass('hidden');
                    $('#step_' + (step - 1)).removeClass('hidden');
                    step--;
                } else {
                    window.location.href = "carrier-load?pass_step=1&is_last=1";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var sameAsOptions = {!! json_encode(!empty($companyContacts) ? $companyContacts : [], true) !!};
            sameAsOptions = [{
                "id": 0,
                "full_name": "---"
            }, ...sameAsOptions];
            $('#step_1').find('input[name="use_factory"]').click(function() {
                $('#step_2').find('input[name="payment_plan_id"]').prop('checked', false);
            });

            $(".same_as_select").change(function(){
                let selectedElement;
                let selectedVal = $(this).val();
                if (selectedVal != 0) {
                    for (let index = 0; index < sameAsOptions.length; index++) {
                        const element = sameAsOptions[index];
                        if (element.id == $(this).val()) {
                            selectedElement = element;
                        }
                    }
                }
                $(this).closest('.contact-form-row').first().find("input[name='first_name']").val(
                    selectedVal == 0 ? '' : selectedElement.first_name);
                $(this).closest('.contact-form-row').first().find("input[name='last_name']").val(
                    selectedVal == 0 ? '' : selectedElement.last_name);
                $(this).closest('.contact-form-row').first().find("input[name='job_title']").val(
                    selectedVal == 0 ? '' : selectedElement.job_title);
                $(this).closest('.contact-form-row').first().find("input[name='business_phone_number']").val(
                    selectedVal == 0 ? '' : selectedElement.business_phone_number);
                $(this).closest('.contact-form-row').first().find("input[name='mobile_number']").val(
                    selectedVal == 0 ? '' : selectedElement.mobile_number);
                $(this).closest('.contact-form-row').first().find("input[name='email']").val(
                    selectedVal == 0 ? '' : selectedElement.email);
                $(this).closest('.contact-form-row').first().find("input[name='alternate_email']").val(
                    selectedVal == 0 ? '' : selectedElement.alternate_email);
                $(this).closest('.contact-form-row').first().find("input[name='business_phone_ext']").val(
                    selectedVal == 0 ? '' : selectedElement.business_phone_ext);
            });
            var step1Validator = $('#step_1').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'use_factory': 'required',
                    'first_name': 'required',
                    'last_name': 'required',
                    'job_title': 'required',
                    'business_phone_number': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number',['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'mobile_number': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'email': 'required'
                },
                invalidHandler: function(f, v) {},
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_1').find('form').serialize(),
                        success: function(response) {
                            $('#step_' + (step)).addClass('hidden');
                            $('#step_' + (step + 1)).removeClass('hidden');
                            let useFactory = response.company.use_factory
                            if (useFactory == 'Y') {
                                $('.use-factor').removeClass('hidden');
                                $('.not-use-factor').addClass('hidden');
                            } else {
                                $('.use-factor').addClass('hidden');
                                $('.not-use-factor').removeClass('hidden');
                            }
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step1Validator.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step2Validator = $('#step_2').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'use_factory': 'required',
                    'first_name': 'required',
                    'last_name': 'required',
                    'job_title': 'required',
                    'business_phone_number': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'mobile_number': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'email': 'required'
                },
                invalidHandler: function(f, v) {},
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_2').find('form').serialize(),
                        success: function(response) {
                            $('#step_' + (step)).addClass('hidden');
                            $('#step_' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step2Validator.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step3Validator = $('#step_3').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'payer_name': 'required'
                },
                invalidHandler: function(f, v) {},
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    if ($('input[name="federal_tax_classification"]:checked:enabled').length == 0) {
                        $('#step_3').find('.error').css('display', 'block');
                        return;
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_3').find('form').serialize(),
                        success: function(response) {
                            $('#step_' + (step)).addClass('hidden');
                            $('#step_' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step3Validator.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step4Validator = $('#step_4').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    street_address: "required",
                    city: "required",
                    state: "required",
                    zip: "required",
                },
                invalidHandler: function(f, v) {},
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_4').find('form').serialize(),
                        success: function(response) {
                            $('#step_' + (step)).addClass('hidden');
                            $('#step_' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step4Validator.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step5Validator = $('#step_5').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'social_security_number': {
                        required: function() {
                            return $('#employer_identification_number').val().length == 0;
                        }
                    },
                    'employer_identification_number': {
                        required: function() {
                            if ($('#social_security_number').val().length == 0 && $(
                                    '#employer_identification_number').val().length == 0) {
                                return false
                            } else {
                                return $('#social_security_number').val().length == 0;
                            }
                        }
                    }
                },
                messages: {
                    social_security_number: "social security number or employer identification number is required",
                    employer_identification_number: "social security number or employer identification number is required"
                },
                invalidHandler: function(f, v) {},
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".form-group"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_5').find('form').serialize(),
                        success: function(response) {
                            $('#step_' + (step)).addClass('hidden');
                            $('#step_' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step5Validator.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step6Validator = $('#step_6').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                ignore: [':not(checkbox:hidden)'],
                rules: {
                    "i_agree": {
                        required: true
                    }
                },
                messages: {
                    'i_agree': {
                        required: "Please agree the agreement",
                    }
                },
                errorPlacement: function($error, $element) {
                    $error.appendTo($element.closest(".col-12"));
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-payment') }}",
                        data: $('#step_6').find('form').serialize(),
                        success: function(response) {
                            window.location.href = "{{ route('user.dashboard') }}";
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step6Validator.showErrors(message);
                            }
                        }
                    });
                }
            });

            $('input[name="federal_tax_classification"]').on('change', function(index) {
                let value = $(this).val();
                if (value == 'Limited_Liability_Company') {
                    $('input[name="other_tax_classification_value"]').next('label').addClass('hidden');
                    $('input[name="other_tax_classification_value"]').val('');

                    if (!['S', 'C', 'P'].includes($('input[name="tax_classification_value"]').val())) {
                        $(this).prop('checked', false);
                        $('input[name="tax_classification_value"]').next('label').removeClass('hidden');
                    } else {
                        $('input[name="tax_classification_value"]').next('label').addClass('hidden');
                    }
                } else if (value == 'Other') {
                    $('input[name="tax_classification_value"]').val('');
                    $('input[name="tax_classification_value"]').next('label').addClass('hidden');
                    if ($('input[name="other_tax_classification_value"]').val() == '') {
                        $(this).prop('checked', false);
                        $('input[name="other_tax_classification_value"]').next('label').removeClass(
                            'hidden');
                    } else {
                        $('input[name="other_tax_classification_value"]').next('label').addClass('hidden');
                    }
                } else {
                    $('input[name="other_tax_classification_value"]').next('label').addClass('hidden');
                    $('input[name="tax_classification_value"]').next('label').addClass('hidden');
                    $('input[name="other_tax_classification_value"]').val('');
                    $('input[name="tax_classification_value"]').val('');
                }
                if ($(this).prop('checked') == false) {
                    $('input[name="other_tax_classification_value"]').val('');
                    $('input[name="tax_classification_value"]').val('');
                }
                $('input[name="federal_tax_classification"]').not(this).prop('checked', false);
            });
            $('input[name="tax_classification_value"]').keyup(function(index) {
                let val = $(this).val();
                if (['S', 'C', 'P'].includes(val)) {
                    $('input[name="federal_tax_classification"][value="Limited_Liability_Company"]').prop(
                        'checked', true);
                    $('input[name="federal_tax_classification"]').not($(
                        'input[name="federal_tax_classification"][value="Limited_Liability_Company"]'
                    )).prop('checked', false);
                    $('input[name="other_tax_classification_value"]').val('');
                    $('input[name="tax_classification_value"]').next('label').addClass('hidden');
                } else {
                    $('input[name="federal_tax_classification"][value="Limited_Liability_Company"]').prop(
                        'checked', false);
                    $('input[name="tax_classification_value"]').next('label').removeClass('hidden');
                }
            });
            $('input[name="other_tax_classification_value"]').keyup(function(index) {
                let val = $(this).val();
                if (val != '') {
                    $('input[name="federal_tax_classification"][value="Other"]').prop('checked', true);
                    $('input[name="federal_tax_classification"]').not($(
                        'input[name="federal_tax_classification"][value="Other"]')).prop('checked',
                        false);
                    $('input[name="tax_classification_value"]').val('');
                    $('input[name="other_tax_classification_value"]').next('label').addClass('hidden');
                } else {
                    $('input[name="federal_tax_classification"][value="Other"]').prop('checked', false);
                    $('input[name="other_tax_classification_value"]').next('label').removeClass('hidden');
                }
            });

            $('#tin_notice').click(function() {
                $('#tinModal').modal('show')
            })
            $('#tax_classification_notice').click(function() {
                $('#taxClassification').modal('show')
            });
        });
    </script>
@endsection
