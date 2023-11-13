@extends('sign_up_process', ['content_class' => 'container-fluid'])
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
        }
    </style>
@endsection
@section('content')
    @php
        $step = 1;
        if ($isLast) {
            $step = 2;
        }
    @endphp
    <div class="container mt-5 mb-2" id="carrier-agreement">
        @include('themes.sign_up.carrier._step_list')
        @if (auth('account')->user()->has_document_authority)
        @include('themes.sign_up.carrier.agreement.step_1')
        @endif
        @include('themes.sign_up.carrier.agreement.step_2')
        @include('themes.sign_up.carrier.agreement.step_3')

        <div class="row">
            <div class="col-5 pr-0 pl-0">
                <button type="button"
                    class="wizard-next-prev-btn next-button pull-left"
                    id="prev-button">Previous</button>
                
            </div>
            <div class="col-7 pl-0 pr-0">
                <button type="button" data-toggle="modal" data-target="#myModal2121"
                        class="wizard-next-prev-btn next-button pull-right" id="next-button">{{ $step == 1 && auth('account')->user()->has_document_authority ? 'Agree & Submit' : 'Next' }}</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var carrierLegalName = "{{ $company->company_legal_name ?? '' }}";
        var authFullName = "{{ auth('account')->user()->full_name }}";
        var hasDocAuthority = {{ auth('account')->user()->has_document_authority }};
        $(document).ready(function() {
            var step = {!! $step !!};
            $('#next-button').click(function() {
                if (step == 1 && hasDocAuthority) {
                    if ($('#i_agree').is(':checked')) {
                        $('#step-1').addClass('hidden');
                        $('#step-2').removeClass('hidden');
                        step = 2;
                        $.ajax({
                            method: "POST",
                            url: "{{ route('account.company.check-agreement') }}",
                            data: {
                                "agreement_checked": true
                            },
                            success: (response) => {
                                
                            },
                            error: function(data) {
                            }
                        });

                        $('#next-button').text('Next');
                    } else {
                        $('#must-agree').modal('show');
                    }
                    
                } else {
                    if ( $('#skip_this').is(':checked')) {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('account.carrier.skip-agreement') }}",
                            data: $('#carrier-agreement').find('form').first().serialize(),
                            success: (response) => {
                                window.location.href = "{{ route('account.carrier.load') }}"
                            },
                            error: function(data) {
                                if (data.status == 422) {
                                    let responseText = $.parseJSON(data.responseText);
                                    let message = {};
                                    $.each(responseText, function(key, value) {
                                        message[key] = value[0]
                                    });
                                    searchCarrierValidator.showErrors(message);
                                }
                            }
                        });
                    } else{
                        formValidator.settings.rules['carrier_certificate_fax'].remote = false;
                        $('#step-2').find('form').submit();
                        formValidator.settings.rules['carrier_certificate_fax'].remote = true;
                    }
                }
            });
            $('#prev-button').click(function() {
                if (step == 2 && hasDocAuthority) {
                    $('#step-2').addClass('hidden');
                    $('#step-1').removeClass('hidden');
                    step = 1
                    $('#next-button').text('Agree and Submit');
                    window.scrollTo(0, 0);
                } else {
                    window.location.href = "carrier-company-profile?pass_step=true&is_last=1"
                    {{--window.location.href = "{{ !!route('account.carrier.company-profile', ['pass_step' => true, 'is_last' => 1]) }}"--}}
                }
            });

            var formValidator = $('#step-2').find('form').validate({
                onfocusout: function(element) {$(element).valid()},
                rules: {
                    'carrier_certificate_person': 'required',
                    'carrier_certificate_email': {
                        required: true,
                        email: true
                    },
                    'carrier_certificate_fax': {
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    }
                },
                invalidHandler: function(f, v) {
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    $('#confirm-dialog').find('#mail_to').text($(
                        'input[name="carrier_certificate_email"]').val());
                    // $('.request-person').text($('input[name="carrier_certificate_person"]').val());
                    $('.carrier-legal-name').text(carrierLegalName);
                    $('.user-full-name').text(authFullName);
                    $('#confirm-dialog').modal('show');
                }
            });
            $('#dialog-submit').click(function() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('account.carrier.submit-agreement') }}",
                    data: $('#carrier-agreement').find('form').first().serialize(),
                    success: (response) => {
                        window.location.href = "{{ route('account.carrier.load') }}"
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            let responseText = $.parseJSON(data.responseText);
                            let message = {};
                            $.each(responseText, function(key, value) {
                                message[key] = value[0]
                            });
                            searchCarrierValidator.showErrors(message);
                        }
                    }
                });
            });
            $('#i_agree').click(function() {
                formValidator.resetForm();
                if ($(this).is(':checked')) {
                    $('.signature_input').val(authFullName);
                    $('#by').val(authFullName);
                    $('#date').val(moment().format('MM/DD/YYYY'));
                    $('.must-agree').addClass('hidden');
                } else {
                    $('.signature_input').val('');
                    $('#by').val('');
                    $('#date').val('');
                }
            });

            $('#skip_this').click(function() {
                $('#step-2').find('form').data('validator').resetForm();
                if ($(this).prop('checked') == true) {
                    $('#skip_this_modal').modal('show');
                    $('#step-2').find('input[name=carrier_certificate_person]').prop('disabled', true).val('');
                    $('#step-2').find('input[name=carrier_certificate_email]').prop('disabled', true).val('');
                } else {
                    $('#step-2').find('input[name=carrier_certificate_person]').prop('disabled', false);
                    $('#step-2').find('input[name=carrier_certificate_email]').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
