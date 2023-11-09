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
@php
    $bzPayableContacts = $companyContacts->filter(function ($value, $key) {
        return $value->hasRole('ap.primary');
    });
    $bzPayableContact = $bzPayableContacts->first();
@endphp
@section('content')
    <div class="business-client-signup-page-wrapper">
        @include('themes.sign_up.biz._step_list')
        <h1>Billing Information</h1>
        <p class="top-form-detail-text">Please provide the Accounts Payable information below to ensure proper billing.</p>
        <form id="billing_form">
            <div class="row">
                <div class="col-md-12">
                    <h4>Accounts Payable Contact</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Same As</label>
                        <select class="same_as_select form-control">
                            <option value="0">---</option>
                            @foreach ($companyContacts as $bizContact)
                                <option value="{{ $bizContact->id }}">{{ $bizContact->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group" id="firstNAme_div">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->first_name }}" @endif
                            placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="lastName_div">
                        <label>Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->last_name }}" @endif
                            placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="jobTitle_div">
                        <label>Job Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="job_title" id="job_title"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->job_title }}" @endif
                            placeholder="Job Title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group" id="phoneNumber_div">
                        <label>Business Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control phone_us" name="business_phone_number"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->business_phone_number }}" @endif
                            id="business_phone_number" placeholder="(111) 222 2222" maxlength="14">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" id="ext_div">
                        <label>Extension</label>
                        <input type="text" class="form-control" name="business_phone_ext" id="ext"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->ext }}" @endif placeholder="XXX">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="normalphoneNumber_div">
                        <label>Mobile # </label>
                        <input type="text" class="form-control phone_us" name="mobile_number" id="mobile_number"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->mobile_number }}" @endif
                            placeholder="(111) 222 2222 " maxlength="14">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" id="emailAdress_div">
                        <label> Email Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email" id="email_adress"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->email }}" @endif
                            placeholder=" Email Address ">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="otherEmail_div2">
                        <label> Alternate Email Address </label>
                        <input type="text" class="form-control" name="alternate_email" id="other_email2"
                            @if ($bzPayableContact) value="{{ $bzPayableContact->alternate_email }}" @endif
                            placeholder="Alternate Email Address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Send Invoices To</h4>
                </div>
            </div>
            <div class="row invoice_emails_div">
                @if ($bzPayableContact)
                    @foreach ($bzPayableContact->invoice_emails as $key => $email)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email Address to Receive Invoices</label>
                                <input type="text" class="form-control business_invoice_email"
                                    value="{{ $email }}" name="invoice_emails[]" placeholder="Email for invoice">
                            </div>
                            @if ($key !== 0)
                                <a style="cursor: pointer;margin:10px" class="pull-right remove_contact">Remove</a>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email Address to Receive Invoices</label>
                            <input type="text" class="form-control business_invoice_email" name="invoice_emails[]"
                                placeholder="Email for invoice">
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="button-text-form-businees">
                        <a href="javascript:;" id="add-email-btn"> Add Another Invoice Email </a>
                        <strong> Note: Invoices will be emailed to the billing email address you provided above. Invoices
                            are not physically mailed.</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 15px;">
                    <div class="form-group-button text-right">
                        <button type="submit" class="wizard-next-prev-btn next-button"
                            id="billing-submit">Finish</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var sameAsOptions = {!! json_encode($companyContacts, true) !!};
            $('#billing_form').delegate('.same_as_select', 'change', function() {
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
                $(this).parents('form').find("input[name='first_name']").val(
                    selectedVal == 0 ? '' : selectedElement.first_name);
                $(this).parents('form').find("input[name='last_name']").val(selectedVal ==
                    0 ? '' : selectedElement.last_name);
                $(this).parents('form').find("input[name='job_title']").val(selectedVal ==
                    0 ? '' : selectedElement.job_title);
                $(this).parents('form').find("input[name='business_phone_number']").val(
                    selectedVal == 0 ? '' : selectedElement.business_phone_number);
                $(this).parents('form').find("input[name='mobile_number']").val(
                    selectedVal == 0 ? '' : selectedElement.mobile_number);
                $(this).parents('form').find("input[name='business_phone_ext']").val(
                    selectedVal == 0 ? '' : selectedElement.business_phone_ext);
                $(this).parents('form').find("input[name='email']").val(selectedVal == 0 ?
                    '' : selectedElement.email);
                $(this).parents('form').find("input[name='alternate_email']").val(
                    selectedVal == 0 ? '' : selectedElement.alternate_email);
            });
            $('#add-email-btn').click(function() {
                let index = $('.invoice_emails_div').children('div').length + 1;
                var invoiceDiv = `
                <div class="col-md-12">
                        <div class="form-group" style="margin-bottom:0px">
                            <label>Email Address to Receive Invoices</label>
                            <input type="text" class="form-control business_invoice_email" name="invoice_emails[]" placeholder="Email for invoice" id="invoice_email_${index}">
                        </div>
                        <a style="cursor: pointer;margin:10px" class="pull-right remove_contact">Remove</a>
                    </div>
                `;
                $('.invoice_emails_div').append(invoiceDiv);
            });
            $('.invoice_emails_div').delegate('.remove_contact', 'click', function() {
                $(this).parents('.col-md-12').remove();
            })

            $("#billing_form").validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                ignore: [':not(checkbox:hidden)'],
                rules: {
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
                    'email': 'required',
                    'invoice_emails[]': 'required',
                },
                errorPlacement: function(error, element) {
                    element.parent('div').append(error);
                },
                invalidHandler: function(event, validator) {
                    $('#checkbox-notify').show();
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.billing-store') }}",
                        data: $("#billing_form").serialize(),
                        success: function(msg) {
                            window.location.reload();
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                validatorMessage.showErrors(message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
