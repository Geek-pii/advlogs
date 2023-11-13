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

        .modal {
            height: 90vh;
        }

        .bg-selected {
            background-color: #dff0d8 !important;
        }

        .main_ul {
            cursor: pointer;
        }
    </style>
@endsection
@php
    $step = $continueStep;
    if ($isLast) {
        $step = 5;
    }

@endphp
@section('content')
    <div class="container">
        @include('themes.sign_up.carrier._step_list')
        @if (request()->get('pass_step'))
            <div class="profile_information @if ($step != 1) hidden @endif" id="step-1">
                @include('themes.sign_up.carrier.profile.step_1')
            </div>
            <div class="profile_information  hidden" id="step-2">
                @include('themes.sign_up.carrier.profile.step_2')
            </div>
            <div class="profile_information @if ($step != 2) hidden @endif" id="step-3">
                @include('themes.sign_up.carrier.profile.step_3')
            </div>
            <div class="profile_information @if ($step != 3) hidden @endif" id="step-4">
                @include('themes.sign_up.carrier.profile.step_4')
            </div>
            <div class="profile_information @if ($step >= 4) @else hidden @endif" id="step-5">
                @include('themes.sign_up.carrier.profile.step_5')
            </div>
        @else
            <div class="profile_information @if ($step != 1) hidden @endif" id="step-1">
                @include('themes.sign_up.carrier.profile.step_1')
            </div>
            <div class="profile_information hidden" id="step-2">
                @include('themes.sign_up.carrier.profile.step_2')
            </div>
            <div class="profile_information @if ($step != 2) hidden @endif" id="step-3">
                @include('themes.sign_up.carrier.profile.step_3')
            </div>
            <div class="profile_information @if ($step != 3) hidden @endif" id="step-4">
                @include('themes.sign_up.carrier.profile.step_4')
            </div>
            <div class="profile_information @if ($step != 4) hidden @endif" id="step-5">
                @include('themes.sign_up.carrier.profile.step_5')
            </div>
        @endif
        <div class="row row mr-0 ml-0 @if ($step < 2) hidden @endif" id="step-button-group">
            <div class="col-6 pr-0">
                <button type="button" class="btn next-button pull-left @if ($step < 2) hidden @endif"
                    id="prev-button">Previous</button>

            </div>
            <div class="col-6 pl-0">
                <button type="button" class="btn next-button pull-right" id="next-button">Next</button>
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
            var globalStep = {!! $step !!};
            var authUser = {!! json_encode(auth('account')->user()) !!}
            var sameAsOptions = {!! json_encode(!empty($companyContacts) ? $companyContacts : [], true) !!};
            var authUser = {!! json_encode(auth('account')->user()) !!}
            var carrierList = [];
            var selectedCarrierIndex = null;
            sameAsOptions = [{
                "id": 0,
                "full_name": "---"
            }, ...sameAsOptions];

            // forword
            $('#next-button').click(function() {
                if (globalStep == 1) {
                    $('#step-2').find('form').submit();
                    $('#prev-button').removeClass('hidden');
                }
                if (globalStep == 2) {
                    step3Validator.settings.rules['mobile_number[]'].remote = false;
                    step3Validator.settings.rules['business_phone_number[]'].remote = false;
                    $('#step-3').find('form').submit();
                    step3Validator.settings.rules['mobile_number[]'].remote = true;
                    step3Validator.settings.rules['business_phone_number[]'].remote = true;
                }
                if (globalStep == 3) {
                    step4Validator.settings.rules['mobile_number[]'].remote = false;
                    step4Validator.settings.rules['business_phone_number[]'].remote = false;
                    $('#step-4').find('form').submit();
                    step4Validator.settings.rules['mobile_number[]'].remote = true;
                    step4Validator.settings.rules['business_phone_number[]'].remote = true;
                }
                if (globalStep >= 4) {
                    step5Validator.settings.rules['mobile_number[]'].remote = false;
                    step5Validator.settings.rules['business_phone_number[]'].remote = false;
                    $('#step-5').find('form').submit();
                    step5Validator.settings.rules['mobile_number[]'].remote = true;
                    step5Validator.settings.rules['business_phone_number[]'].remote = true;
                }
                window.scrollTo(0, 0);
            });
            $('#prev-button').click(function() {
                if (globalStep == 1) {
                    $('#step-2').addClass('hidden');
                    $('#step-3').addClass('hidden');
                    $('#step-1').removeClass('hidden');
                    $('#prev-button').addClass('hidden');
                    $('#step-button-group').addClass('hidden');
                    globalStep = 1;
                }
                if (globalStep == 2) {
                    $('#step-3').addClass('hidden');
                    $('#step-2').removeClass('hidden');
                    globalStep -= 1;
                }
                if (globalStep == 3) {
                    $('#step-4').addClass('hidden');
                    $('#step-3').removeClass('hidden');
                    globalStep -= 1;
                }
                if (globalStep >= 4) {
                    $('#step-5').addClass('hidden');
                    $('#step-4').removeClass('hidden');
                    globalStep = 3;
                }
                window.scrollTo(0, 0);
            });

            $('.profile_information ').delegate('.same_as_select', 'change', function(index) {
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

                if (selectedVal != 0 && selectedElement.id == authUser.id && $(this).hasClass(
                        'have_authority_page')) {
                    $('#same_as_same_person').modal('show');
                } else {
                    $('#have_authority').prop('checked', false);
                    $(this).closest('.contact-form-row').first().find("input[name='first_name[]']").val(
                        selectedVal == 0 ? '' : selectedElement.first_name);
                    // $(this).closest('.contact-form-row').first().find("input[name='contact_id[]']").val(
                    //     selectedVal == 0 ? '' : selectedElement.id);
                    $(this).closest('.contact-form-row').first().find("input[name='last_name[]']").val(
                        selectedVal ==
                        0 ? '' : selectedElement.last_name);
                    $(this).closest('.contact-form-row').first().find("input[name='job_title[]']").val(
                        selectedVal ==
                        0 ? '' : selectedElement.job_title);
                    $(this).closest('.contact-form-row').first().find(
                        "input[name='business_phone_number[]']").val(
                        selectedVal == 0 ? '' : selectedElement.business_phone_number);
                    $(this).closest('.contact-form-row').first().find("input[name='mobile_number[]']").val(
                        selectedVal == 0 ? '' : selectedElement.mobile_number);
                    $(this).closest('.contact-form-row').first().find("input[name='business_phone_ext[]']")
                        .val(
                            selectedVal == 0 ? '' : selectedElement.business_phone_ext);
                    $(this).closest('.contact-form-row').first().find("input[name='email[]']").val(
                        selectedVal ==
                        0 ?
                        '' : selectedElement.email);
                    $(this).closest('.contact-form-row').first().find("input[name='alternate_email[]']")
                        .val(
                            selectedVal ==
                            0 ?
                            '' : selectedElement.alternate_email);
                }
            });
            /** 
             * Step 1 Search Carrier
             */
            $('#search-carrier-result').delegate('.main_ul', 'click', function() {
                $('.main_ul').not(this).removeClass('bg-selected');
                $(this).addClass('bg-selected');
                selectedCarrierIndex = $(this).data('index');
            });
            $('#search-carrier').click(function() {
                if ($('#search-carrier-form').valid()) {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('user.fmcsa.carrier.search') }}",
                        data: $('#search-carrier-form').serialize(),
                        success: (response) => {
                            if (response.length > 0) {
                                console.log(response)
                                let countResult = response.length;
                                var compiled = _.template(
                                    `<% _.forEach(carriers, function(carrier, index) { %>\n
                                        <ul class="main_ul <% if (countResult == 1 && index == 0) { %> bg-selected <% } %>" data-dot-number="<%= carrier.carrier.dotNumber %>" data-index="<%= index %>"> \n
                                                    <li><div class="field-bg"> MC #: <%- carrier.carrier.docket_number %></div></li> \n
                                                    <li><div class="field-bg"> Dot #: <%- carrier.carrier.dotNumber %></div></li> \n
                                                    <li><div class="field-bg"> Legal Name: <%- carrier.carrier.legalName %></div></li> \n
                                                    <li> <div class="field-bg"> DBA  Name: <%- carrier.carrier.dbaName %> </div> </li> \n
                                                    <li><div class="field-bg">  Address: <%- carrier.carrier.phyStreet %> <%- carrier.carrier.phyCity %> <%- carrier.carrier.phyState %> <%- carrier.carrier.phyZipcode %></div></li>\n
                                                      <% if (carrier.carrier.fromDatabase) {%>
                                                           <li class="text-warning">Only DOT # matches can be looked up at this time.  If your company is not shown here, please search again with your DOT #.  You can also manually fill your information.</li>
                                                         <% }%>
                                                    </ul>\n
                                    <% }); %>
                                    `
                                );
                                var result = compiled({
                                    'carriers': response,
                                    'countResult': countResult
                                });
                                carrierList = response;
                                if (carrierList.length == 1) {
                                    selectedCarrierIndex = 0;
                                }
                                $('#carrier-search-data').html(result);
                                $('#copy-carrier').removeClass('hidden');
                            } else {
                                $('#carrier-search-data').html(
                                    '<p>The MC or DOT number you entered wasn’t found.  Please verify the number and try your search again.</p><br /> Was your DOT activated recently? To fill in your information manually <a class="manully-fill-company" style="cursor:pointer">Click Here</a>.'
                                );
                                $('#copy-carrier').addClass('hidden');
                            }
                            $('#search-carrier-result').modal('show');

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
                }
            });
            var searchCarrierValidator = $('#search-carrier-form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                onkeyup: false,
                rules: {
                    'carrier_mc_or_dot': {
                        required: true
                    }
                },
                messages: {
                    carrier_mc_or_dot: "Carrier mc or dot is required"
                },
                invalidHandler: function(f, v) {},
                submitHandler: (form, event) => {
                    event.preventDefault();
                }
            });
            // Copy Carrier after Search
            $('#copy-carrier').click(function() {
                if (selectedCarrierIndex != null) {
                    let response = carrierList[selectedCarrierIndex];
                    $('#search-carrier-result').modal('hide');
                    $("#step-button-group").removeClass('hidden');
                    $('#company-detail-form').find('input[name="company_legal_name"]').val(
                        response.carrier.legalName).prop('readOnly', true);;
                    $('#company-detail-form').find('input[name="company_dba"]').val(
                        response.carrier.dbaName).prop('readOnly', true);;
                    $('#company-detail-form').find('input[name="mc_number"]').val(
                        response.carrier.docket_number).prop('readOnly', true);
                    $('#company-detail-form').find('input[name="dot_number"]').val(
                        response.carrier.dotNumber).prop('readOnly', true);
                    $('.physical-address').find('input[name="company_dba"]').val(response
                        .carrier.dbaName);
                    $('.physical-address').find('input[name="street_address"]').val(response
                        .carrier.phyStreet);
                    $('.physical-address').find('input[name="city"]').val(response.carrier
                        .phyCity);
                    $('.physical-address').find('input[name="state"]').val(response.carrier
                        .phyState);
                    $('.physical-address').find('input[name="zip"]').val(response.carrier
                        .phyZipcode);
                    $('.physical-address').find('input[name="company_telephone"]').val(response.carrier
                        .telephone);
                    $('.physical-address').find('input[name="company_email"]').val(response.carrier
                        .email_address);
                    // reset mailling address
                    $('.mailling-address').find("input[name=mailing_street_address]").val(response.carrier
                        .mailing_street ? response.carrier.mailing_street : '');
                    $('.mailling-address').find("input[name=mailing_city]").val(response.carrier
                        .mailing_city ? response.carrier.mailing_city : '');
                    $('.mailling-address').find("input[name=mailing_state]").val(response.carrier
                        .mailing_state ? response.carrier.mailing_state : '');
                    $('.mailling-address').find("input[name=mailing_zip]").val(response.carrier
                        .mailing_zip ? response.carrier.mailing_zip : '');
                    $('#same_as_phsical').prop('checked', false);

                    $('#step-2').removeClass('hidden');
                    $('#step-1').addClass('hidden');
                    $('#prev-button').removeClass('hidden');
                    selectedCarrierIndex = null
                    $('#step-2').find('form').valid();
                }
            });

            $('#step-1').delegate('.manully-fill-company', 'click', function() {
                $("#step-button-group").removeClass('hidden');
                $('#search-carrier-result').modal('hide');
                $('#step-2').find('input:not(:hidden)').prop('value', '');
                $('#company-detail-form').find('input[name="company_legal_name"]').prop('readOnly', false);
                $('#company-detail-form').find('input[name="company_dba"]').prop('readOnly', false);
                $('#company-detail-form').find('input[name="mc_number"]').prop('readOnly', false);
                $('#company-detail-form').find('input[name="dot_number"]').prop('readOnly', false);
                $('#step-2').removeClass('hidden');
                $('#step-1').addClass('hidden');
                $('#prev-button').removeClass('hidden');
            });
            /*
             * Step 2 fill company address from pop up
             */
            $('#same_as_phsical').click(function() {
                let checked = $(this).prop('checked');
                if (checked) {
                    $('.mailling-address').find("input[name=mailing_street_address]").val($(
                        '.physical-address').find('input[name="street_address"]').val());
                    $('.mailling-address').find("input[name=mailing_city]").val($('.physical-address').find(
                        'input[name="city"]').val());
                    $('.mailling-address').find("input[name=mailing_state]").val($('.physical-address')
                        .find('input[name="state"]').val());
                    $('.mailling-address').find("input[name=mailing_zip]").val($('.physical-address').find(
                        'input[name="zip"]').val());
                    $('#step-2').find('form').valid();
                } else {
                    $('.mailling-address').find("input[name=mailing_street_address]").val('');
                    $('.mailling-address').find("input[name=mailing_city]").val('');
                    $('.mailling-address').find("input[name=mailing_state]").val('');
                    $('.mailling-address').find("input[name=mailing_zip]").val('');
                }
            });
            var step2Validator = $('#step-2').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                onkeyup: false,
                rules: {
                    'company_legal_name': {
                        required: true,
                    },
                    'mc_number': {
                        required: false
                    },
                    'dot_number': {
                        required: false
                    },
                    'street_address': {
                        required: true
                    },
                    'city': {
                        required: true
                    },
                    'state': {
                        required: true
                    },
                    'zip': {
                        required: true
                    },
                    'mailing_street_address': {
                        required: true
                    },
                    'mailing_city': {
                        required: true
                    },
                    'mailing_state': {
                        required: true
                    },
                    'mailing_zip': {
                        required: true
                    },
                    'company_telephone': {
                        required: false,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'company_email': {
                        email: true
                    }
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let data = $('#step-2').find('form').serialize() + '&carrier_or_dot_search=' + $(
                        'input[name="carrier_mc_or_dot"]').val();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.company-profile-store') }}",
                        data: data,
                        success: function(response) {

                            $('#step-2').find('form').find('input[name=company_id]')
                                .val(response.company.id)
                            globalStep += 1;
                            $('#step-2').addClass('hidden');
                            $('#step-3').removeClass('hidden');
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
                                                    'company_id': responseText
                                                        .company_id
                                                },
                                                success: function() {
                                                    Swal.fire(
                                                            'Your application sent, please wait for the administrator to review!',
                                                            '',
                                                            'success')
                                                        .then((
                                                            confirmed
                                                        ) => {
                                                            if (confirmed
                                                                .isConfirmed
                                                            ) {
                                                                window
                                                                    .location
                                                                    .href =
                                                                    "{{ route('user.dashboard') }}";
                                                            }
                                                        })
                                                }
                                            });
                                        } else if (result.isDenied) {}
                                    })
                                }
                            }
                        }
                    });
                }
            });
            /** 
             * step 3 Primary Dispatch Contact
             * */
            var step3Validator = $('#step-3').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                onkeyup: false,
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'mobile_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_ext[]': {
                        number: true
                    },
                    'email[]': {
                        required: true,
                        email: true
                    }
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.company-profile-store') }}",
                        data: $('#step-3').find('form').serialize(),
                        success: function(response) {
                            let primaryBizContacts = _.cloneDeep(response
                                    .company.accounts)
                                .filter((val) => {
                                    let roles = val.roles;
                                    const pluckedNames = roles.map((role) => role.slug);
                                    return pluckedNames.includes('dispatch.primary');
                                });

                            for (let i = 0; i < primaryBizContacts; i++) {
                                const element = array[i];
                                $('#step-3').find(
                                    'input[name="contact_id[]"]').val(element.id);
                            }
                            sameAsOptions = response.company.accounts;
                            sameAsOptions = [{
                                "id": 0,
                                "full_name": "---"
                            }, ...sameAsOptions];
                            $(".same_as_select").each(function() {
                                $(this).replaceContactOptions(sameAsOptions)
                            })
                            $('#step-3').addClass('hidden');
                            $('#step-4').removeClass('hidden');
                            globalStep += 1;
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

            /*
             * step 4 Alternate Dispatch Contact
             */

            function addContact() {
                let optionString = '';
                for (let index = 0; index < sameAsOptions.length; index++) {
                    const sameAsOption = sameAsOptions[index];
                    optionString += "<option value=" + sameAsOption.id + ">" +
                        sameAsOption.full_name + "</option>"
                }
                $('#no-alternate-contact').prop('checked', false)
                let i = $('.contact-form-row').length + 1;
                let netContact = `
                ${i > 1 ? `<hr class="hr" />`: ''}
                <div class="contact-form-row">
                    <input type="hidden" name="contact_type[]" value="normal" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherFirstName_div">
                                <label>Same As</label>
                                <select class="same_as_select_multiple form-control">
                                    ${optionString}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherFirstName_div">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name[]"
                                    id="first_name_alter_${i}" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="otherrLastName_div">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name[]" id="last_name_alter_${i}" 
                                    placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherrJobTitle_div">
                                <label>Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_title[]" id="job_title_alter_${i}" 
                                    placeholder="Job Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="otherrNumber_div">
                                <label> Business Phone # <span class="text-danger">*</span></label>
                                <input type="text" placeholder="XXX-XXX-XXXX" class="form-control phone_us" name="business_phone_number[]" id="business_phone_number_alter_${i}" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="otherrExt_div">
                                <label> Extension</label>
                                <input type="text" class="form-control" name="business_phone_ext[]" placeholder="XXX" id="business_phone_ext_alter_${i}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="otherr_mobNumber_div">
                                <label> Mobile # <span class="text-danger">*</span></label>
                                <input type="text" class="form-control phone_us mobile_number" id="business_mobile_number_alter_${i}"
                                    name="mobile_number[]" placeholder="Mobile #">
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
                            <div class="form-group" id="other_alter_email_div">
                                <label> Alternate Email Address</label>
                                <input type="email" class="form-control" name="alternate_email[]" id="alt_email_alter_${i}" placeholder="Alternate Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="addanotehr-contact pull-right">
                                <a style="cursor: pointer;" class="remove_contact">Remove Contact</a>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(netContact).insertBefore($('.add_contact_box'));
                $("#step-4").find("[name='mobile_number[]']").each(function(index) {
                    $(this).attr("name", "mobile_number[" + index + "]");

                    $(this).rules("add", {
                        required: false,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    });
                });
            }

            $('#add_contact').click(function() {
                if ($('#step-4').find('form').valid()) {
                    addContact()
                }
            });

            $('.profile_information').delegate('.same_as_select_multiple', 'change', function() {
                // const index = $(event.target).index();
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
                if (selectedVal != 0 && selectedElement.id == authUser.id && $(this).hasClass(
                        'have_authority_page')) {
                    $('#same_as_same_person').modal('show');
                } else {
                    $('#have_authority').prop('checked', false);
                    $(this).closest('.contact-form-row').first().find("input[name='first_name[]']").val(
                        selectedVal == 0 ? '' : selectedElement.first_name);
                    // $(this).closest('.contact-form-row').first().find("input[name='contact_id[]']").val(
                    //     selectedVal == 0 ? '' : selectedElement.id);
                    $(this).closest('.contact-form-row').first().find("input[name='last_name[]']").val(
                        selectedVal ==
                        0 ? '' : selectedElement.last_name);
                    $(this).closest('.contact-form-row').first().find("input[name='job_title[]']").val(
                        selectedVal ==
                        0 ? '' : selectedElement.job_title);
                    $(this).closest('.contact-form-row').first().find(
                        "input[name='business_phone_number[]']").val(
                        selectedVal == 0 ? '' : selectedElement.business_phone_number);
                    $(this).closest('.contact-form-row').first().find(".mobile_number").val(
                        selectedVal == 0 ? '' : selectedElement.mobile_number);
                    $(this).closest('.contact-form-row').first().find("input[name='business_phone_ext[]']")
                        .val(
                            selectedVal == 0 ? '' : selectedElement.business_phone_ext);
                    $(this).closest('.contact-form-row').first().find("input[name='email[]']").val(
                        selectedVal ==
                        0 ?
                        '' : selectedElement.email);
                    $(this).closest('.contact-form-row').first().find("input[name='alternate_email[]']")
                        .val(
                            selectedVal ==
                            0 ?
                            '' : selectedElement.alternate_email);
                }
            })
            $('.profile_information').delegate('.remove_contact', 'click', function() {
                $(this).parents('.contact-form-row').prev('.hr').remove();
                $(this).parents('.contact-form-row').remove();
            });
            $('#no-alternate-contact').click(function() {
                if ($(this).prop('checked') == true) {
                    $(this).parent().closest('form').children('.contact-form-row').remove();
                    $('.hr').remove();
                } else {
                    addContact();
                }
            });
            var step4Validator = $('#step-4').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid()
                },
                onkeyup: false,
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'mobile_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_ext[]': {
                        number: true
                    },
                    'email[]': {
                        required: true,
                        email: true
                    }
                },
                invalidHandler: function(f, v) {
                    console.log(f);
                    console.log('=======');
                    console.log(f);
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.company-profile-store') }}",
                        data: $('#step-4').find('form').serialize(),
                        success: function(response) {
                            let normalBizContacts = _.cloneDeep(response
                                    .company.accounts)
                                .filter((val) => {
                                    let roles = val.roles;
                                    const pluckedNames = roles.map((role) => role.slug);
                                    return pluckedNames.includes(
                                        'dispatch.alternative');
                                });
                            for (let index = 0; index < normalBizContacts
                                .length; index++) {
                                const element = normalBizContacts[index];
                                $('.contact-form-row').eq(index).find(
                                    "input[name='contact_id[]']").val(element.id);
                            }
                            sameAsOptions = response.company.accounts;
                            sameAsOptions = [{
                                "id": 0,
                                "full_name": "---"
                            }, ...sameAsOptions];
                            $(".same_as_select").each(function() {
                                $(this).replaceContactOptions(sameAsOptions)
                            })
                            $('#step-4').addClass('hidden');
                            $('#step-5').removeClass('hidden');
                            globalStep += 1;
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
            /** 
             * step 5
             **/

            $('#have_authority').click(function() {
                $(this).parent().closest('.contact-form-row').find('.same_as_select').val(0);
                if ($(this).prop('checked')) {
                    $('#owner-contact-form').find("input[name='first_name[]']").val(authUser.first_name);
                    $('#owner-contact-form').find("input[name='last_name[]']").val(authUser.last_name);
                    $('#owner-contact-form').find("input[name='job_title[]']").val(authUser.job_title);
                    $('#owner-contact-form').find("input[name='business_phone_number[]']").val(authUser
                        .business_phone_number);
                    $('#owner-contact-form').find("input[name='mobile_number[]']").val(authUser
                        .mobile_number);
                    $('#owner-contact-form').find("input[name='business_phone_ext[]']").val(authUser
                        .business_phone_ext);
                    $('#owner-contact-form').find("input[name='email[]']").val(authUser.email);
                    $('#owner-contact-form').find("input[name='alternate_email[]']").val(authUser
                        .alternate_email);
                } else {
                    $('#owner-contact-form').find("input[name='first_name[]']").val("");
                    $('#owner-contact-form').find("input[name='last_name[]']").val("");
                    $('#owner-contact-form').find("input[name='job_title[]']").val("");
                    $('#owner-contact-form').find("input[name='business_phone_number[]']").val("");
                    $('#owner-contact-form').find("input[name='mobile_number[]']").val("");
                    $('#owner-contact-form').find("input[name='business_phone_ext[]']").val("");
                    $('#owner-contact-form').find("input[name='email[]']").val("");
                    $('#owner-contact-form').find("input[name='alternate_email[]']").val("");
                }
            });

            var step5Validator = $('#step-5').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid();
                },
                onkeyup: false,
                rules: {
                    'first_name[]': 'required',
                    'last_name[]': 'required',
                    'job_title[]': 'required',
                    'mobile_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'mobile']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_number[]': {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number', ['accept' => 'any']) }}",
                            type: "get"
                        }
                    },
                    'business_phone_ext[]': {
                        number: true
                    },
                    'email[]': {
                        required: true,
                        email: true
                    }
                },
                invalidHandler: function(f, v) {},
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.company-profile-store') }}",
                        data: $('#step-5').find('form').serialize(),
                        success: function(response) {
                            window.location.href =
                                "{{ route('account.carrier.agreement') }}?pass_step=1"
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
        });
    </script>
@endsection
