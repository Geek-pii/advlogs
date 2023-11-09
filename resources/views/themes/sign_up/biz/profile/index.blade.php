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
        }
    </style>
@endsection
@php
    $step = 1;
@endphp
@section('content')
    <div class="business-client-signup-page-wrapper">
        @include('themes.sign_up.biz._step_list')
        <h1> Complete Your Business Profile </h1>
        @if (request()->get('pass_step'))
            <div class="profile_information @if ($step != 1) hidden @endif" id="step-1">
                <form class="company_profile_form">
                    <input type="hidden" name="step" value="1">
                    @include('themes.sign_up.biz.profile.company-info')
                </form>
            </div>
            <div class="profile_information @if ($step != 2) hidden @endif" id="step-2">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="2">
                    @include('themes.sign_up.biz.profile.primary-contact')
                </form>
            </div>
            <div class="profile_information alter_contacts @if ($step != 3) hidden @endif" id="step-3">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="3">
                    @include('themes.sign_up.biz.profile.alternative-contact')
                </form>
            </div>
            <div class="profile_information @if ($step != 4) hidden @endif" id="step-4">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="4">
                    @include('themes.sign_up.biz.profile.own-or-manager-contact')
                </form>
            </div>
        @else
            <div class="profile_information @if ($step != 1) hidden @endif" id="step-1">
                <form class="company_profile_form">
                    <input type="hidden" name="step" value="1">
                    @include('themes.sign_up.biz.profile.company-info')
                </form>
            </div>
            <div class="profile_information @if ($step != 2) hidden @endif" id="step-2">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="2">
                    @include('themes.sign_up.biz.profile.primary-contact')
                </form>
            </div>
            <div class="profile_information alter_contacts @if ($step != 3) hidden @endif" id="step-3">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="3">
                    @include('themes.sign_up.biz.profile.alternative-contact')
                </form>
            </div>
            <div class="profile_information @if ($step != 4) hidden @endif" id="step-4">
                <form class="contacts_form">
                    <input type="hidden" name="step" value="4">
                    @include('themes.sign_up.biz.profile.own-or-manager-contact')
                </form>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 15px;">
                <div class="form-group-button">
                    <button type="button"
                        class="wizard-next-prev-btn next-button pull-left @if ($step < 2) hidden @endif"
                        id="prev-button">Previous</button>
                    <button type="button" class="wizard-next-prev-btn next-button pull-right" id="submit-button">
                        Next
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function($, window) {
            $.fn.replaceContactOptions = function(options) {
                var self, $option;
                this.empty();
                self = this;
                $.each(options, function(index, option) {
                    $option = $("<option></option>")
                        .attr("value", option.id)
                        .text(option.full_name);
                    self.append($option);
                });
            };
        })(jQuery, window);
        $(document).ready(function() {
            var step = {{ $step }};
            var sameAsOptions = {!! json_encode(!empty($companyContacts) ? $companyContacts : [], true) !!};
            var authUser = {!! json_encode(auth('account')->user()) !!}
            sameAsOptions = [{
                "id": 0,
                "full_name": "---"
            }, ...sameAsOptions];

            function addContact() {
                let optionString = '';
                for (let index = 0; index < sameAsOptions.length; index++) {
                    const sameAsOption = sameAsOptions[index];
                    optionString += "<option value=" + sameAsOption.id + ">" +
                        sameAsOption.full_name + "</option>"
                }
                $('#no-alternate-contact').prop('checked', false)
                let i = $('#step-3').find('.contact-form-row').not('.hidden').length + 1;
                let netContact = `
                ${i > 1 ? `<hr class="hr" />`: ''}
                <div class="contact-form-row">
                    <input type="hidden" name="contact_type[]" value="normal" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherFirstName_div">
                                <label>Same As</label>
                                <select class="same_as_select form-control">
                                    ${optionString}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" id="otherFirstName_div">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name[]"
                                    id="first_name_alter_${i}" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="otherrLastName_div">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name[]" id="last_name_alter_${i}" 
                                    placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="otherrJobTitle_div">
                                <label>Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_title[]" id="job_title_alter_${i}" 
                                    placeholder="Job Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group" id="otherrNumber_div">
                                <label> Business Phone # <span class="text-danger">*</span></label>
                                <input type="text" class="form-control phone_us" name="business_phone_number[]" placeholder="XXX-XXX-XXXX" id="business_phone_number_alter_${i}" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" id="otherrExt_div">
                                <label> Extension</label>
                                <input type="text" class="form-control" name="business_phone_ext[]" placeholder="XXX" id="business_phone_ext_alter_${i}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="otherr_mobNumber_div">
                                <label> Mobile # <span class="text-danger">*</span></label>
                                <input type="text" class="form-control phone_us" placeholder="Mobile #" id="business_mobile_number_alter_${i}"
                                    name="mobile_number[]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherrEmail_div">
                                <label> Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email[]" id="email_alter_${i}" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="otherrEmail_div">
                                <label>Alternate Email Address </label>
                                <input type="email" class="form-control" name="alternate_email[]" id="alternate_email_alter_${i}"
                                    placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="addanotehr-contact text-right">
                                <a style="cursor: pointer;" class="remove_contact">Remove Contact</a>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(netContact).insertBefore($('.add_contact_box'));
            }
            $('#add_contact').click(function() {
                addContact();
            });
            $('.business-client-signup-page-wrapper').delegate('.remove_contact', 'click', function() {
                let removeContactId = $(this).parent().closest('.contact-form-row').find(
                    'input[name="contact_id[]"]').val();
                if (removeContactId !== undefined) {
                    $('#step-3').find('form').append(
                        '<input type="hidden" name="remove_contact[]" value="' +
                        removeContactId + '" />');
                }
                $(this).parent().closest('.contact-form-row').next('hr').remove();
                $(this).parent().closest('.contact-form-row').remove();

            });
            $('.business-client-signup-page-wrapper').delegate('.same_as_select', 'change', function() {
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

                if (!$('#step-4').hasClass('hidden')) {
                    $('#have-authority-checkbox').prop('checked', false);
                }

                $(this).parent().closest('.contact-form-row').find("input[name='first_name[]']").val(
                    selectedVal == 0 ? '' : selectedElement.first_name);
                $(this).parent().closest('.contact-form-row').find("input[name='last_name[]']").val(
                    selectedVal ==
                    0 ? '' : selectedElement.last_name);
                $(this).parent().closest('.contact-form-row').find("input[name='job_title[]']").val(
                    selectedVal ==
                    0 ? '' : selectedElement.job_title);
                $(this).parent().closest('.contact-form-row').find("input[name='business_phone_number[]']")
                    .val(
                        selectedVal == 0 ? '' : selectedElement.business_phone_number);
                $(this).parent().closest('.contact-form-row').find("input[name='mobile_number[]']").val(
                    selectedVal == 0 ? '' : selectedElement.mobile_number);
                $(this).parent().closest('.contact-form-row').find("input[name='business_phone_ext[]']")
                    .val(
                        selectedVal == 0 ? '' : selectedElement.business_phone_ext);
                $(this).parent().closest('.contact-form-row').find("input[name='email[]']").val(
                    selectedVal == 0 ?
                    '' : selectedElement.email);
                $(this).parent().closest('.contact-form-row').find("input[name='alternate_email[]']").val(
                    selectedVal == 0 ? '' : selectedElement.alternate_email);
            });

            $('#no-alternate-contact').click(function() {
                if ($(this).prop('checked') == true) {
                    $(this).parent().closest('form').find('.contact-form-row').remove();
                    $('.hr').remove();
                } else {
                    addContact();
                }
            });

            $('#have-authority-checkbox').click(function() {
                if ($(this).prop('checked')) {
                    $(this).parents('form').find("input[name='first_name[]']").val(authUser.first_name);
                    $(this).parents('form').find("input[name='last_name[]']").val(authUser.last_name);
                    $(this).parents('form').find("input[name='job_title[]']").val(authUser.job_title);
                    $(this).parents('form').find("input[name='business_phone_number[]']").val(authUser
                        .business_phone_number);
                    $(this).parents('form').find("input[name='mobile_number[]']").val(authUser
                        .mobile_number);
                    $(this).parents('form').find("input[name='business_phone_ext[]']").val(authUser
                        .business_phone_ext);
                    $(this).parents('form').find("input[name='email[]']").val(authUser.email);
                } else {
                    $(this).parents('form').find("input[name='first_name[]']").val("");
                    $(this).parents('form').find("input[name='last_name[]']").val("");
                    $(this).parents('form').find("input[name='job_title[]']").val("");
                    $(this).parents('form').find("input[name='business_phone_number[]']").val("");
                    $(this).parents('form').find("input[name='mobile_number[]']").val("");
                    $(this).parents('form').find("input[name='business_phone_ext[]']").val("");
                    $(this).parents('form').find("input[name='email[]']").val("");
                }
            });

            $('#submit-button').click(function() {
                if (step == 1) {
                    $('#step-1').find('form').submit();
                } else if (step == 2) {
                    $('#step-2').find('form').submit();
                } else if (step == 3) {
                    if ($("input[name='no_alternate_contact']").prop('checked')) {
                        step = 4;
                        $('#step-3').addClass('hidden');
                        $('#step-4').removeClass('hidden');
                    } else {
                        $('#step-3').find('form').submit();
                    }
                } else {
                    if (step == 4) {
                        $('#step-4').find('form').submit();
                    }
                }

            });

            $('#prev-button').click(function() {
                if (step == 2) {
                    step = 1;
                    $('#step-1').removeClass('hidden');
                    $('#step-2').addClass('hidden');
                    $('#prev-button').addClass('hidden');
                }
                if (step == 3) {
                    step = 2;
                    $('#step-2').removeClass('hidden');
                    $('#step-3').addClass('hidden');
                }
                if (step >= 4) {
                    step = 3;
                    $('#step-3').removeClass('hidden');
                    $('#step-4').addClass('hidden');
                }
            })

            var step1Validate = $('#step-1').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'company_legal_name': 'required',
                    'street_address': 'required',
                    'city': 'required',
                    'state': 'required',
                    'zip': 'required',
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let data;
                    if (step == 1) {
                        data = $('#step-1').find('form').serialize();
                    }
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.company-profile-store') }}",
                        data: data,
                        success: function(response) {
                            if (step == 1) {
                                step = 2;
                                $('#step-1').addClass('hidden');
                                $('#step-2').removeClass('hidden');
                                $('#prev-button').removeClass('hidden');
                                $('#step-1').find('form').find('input[name=company_id]')
                                    .val(response.id)
                            }
                        },
                        error: function(data) {
                            if (data.status == 400) {
                                let responseText = $.parseJSON(data.responseText);
                                if (responseText.error == 'company_already_exists') {
                                    Swal.fire({
                                        title: 'The company already exists in our system. Would you like to apply to be a user at this company?',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                method: "POST",
                                                url: "{{ route('user.account.bind-company') }}",
                                                data: {
                                                    'company_id': responseText.company_id
                                                }, 
                                                success: function() {
                                                    Swal.fire('Your application sent, please wait for the administrator to review!', '', 'success').then((confirmed) => {
                                                        if (confirmed.isConfirmed) {
                                                            window.location.href = "{{ route('user.dashboard') }}";
                                                        }
                                                    })
                                                }
                                            });
                                        } else if (result.isDenied) {
                                        }
                                    })
                                }
                            }
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step1Validate.showErrors(message);
                            }
                        }
                    });
                }
            });

            var step2Validate = $('#step-2').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                ignore: ":hidden",
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'business_phone_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'mobile_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'email[]': 'required'
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let data = $('#step-2').find('form').serialize();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.company-profile-store') }}",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            step = 3;
                            sameAsOptions = response.company.accounts;
                            sameAsOptions = [{
                                "id": 0,
                                "full_name": "---"
                            }, ...sameAsOptions];
                            $(".same_as_select").each(function() {
                                $(this).replaceContactOptions(sameAsOptions)
                            })

                            let primaryContact = _.cloneDeep(response
                                    .company.accounts)
                                .filter((val) => {
                                    let roles = val.roles;
                                    const pluckedNames = roles.map((role) => role.slug);
                                    return pluckedNames.includes('biz.primary');
                                });

                            $('#step-2').addClass('hidden');
                            $('#step-3').removeClass('hidden');
                            $('#step-2').find('form').find('.contact_id').val(
                                primaryContact[0].id)

                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step2Validate.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step3Validate = $('#step-3').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                ignore: ":hidden",
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'business_phone_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'mobile_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'email[]': 'required'
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let data = $('#step-3').find('form').serialize();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.company-profile-store') }}",
                        data: data,
                        success: function(response) {
                            step = 4;
                            sameAsOptions = response.company.accounts;
                            sameAsOptions = [{
                                "id": 0,
                                "full_name": "---"
                            }, ...sameAsOptions];
                            $(".same_as_select").each(function() {
                                $(this).replaceContactOptions(sameAsOptions)
                            })

                            let normalBizContacts = _.cloneDeep(response.company
                                    .accounts)
                                .filter(val => val.contact_type == 'normal');
                            for (let index = 0; index < normalBizContacts
                                .length; index++) {
                                const element = normalBizContacts[index];
                                $('.contact-form-row').eq(index).find(
                                    "input[name='contact_id[]']").val(element.id);
                            }

                            $('#step-3').addClass('hidden');
                            $('#step-4').removeClass('hidden');

                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step3Validate.showErrors(message);
                            }
                        }
                    });
                }
            });
            var step4Validate = $('#step-4').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'business_phone_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'mobile_number[]': {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'email[]': 'required'
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let data = $('#step-4').find('form').serialize();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.biz.company-profile-store') }}",
                        data: data,
                        success: function(response) {
                            window.location.href = "{{ route('account.biz.agreement') }}";

                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                                step4Validate.showErrors(message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
