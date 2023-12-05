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

        .step-box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .step-box .form-check {
            display: inline-block;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            width: 100px;
            margin-left: 15px;
        }

        .step-box .form-check .form-check-label {
            margin-left: 10px;
        }

        .route-header-box {
            display: flex;
            justify-content: space-between;
            background: #f5f5f5;
            align-items: center;
            padding: 10px;
        }

        .route-header-box .form-check {
            display: inline-block
        }

        .step-control {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .region_search {
            padding: 5px
        }

        .region_search h5 {
            margin-left: 5px
        }

        .region_search .region_box {
            border: 1px solid #ccc;
            overflow-y: scroll;
            height: 150px;
            margin: 5px
        }

        .region_box div {
            padding: 5px;
            cursor: pointer;
        }

        .bg-selected {
            background-color: #dff0d8 !important;
        }

        .add_buttion {
            cursor: pointer;
            height: 30px;
            padding: 5px;
            margin-right: 20px
        }
        .radius_20 {
            border-radius: 20px !important;
        }
        .radius_right_20 {
            border-radius: 0 20px 20px 0 !important;
        }

        #step-1 .flex {
            display: flex;
            flex-wrap: wrap;
        }

        #step-1 .space-between {
            justify-content: space-between;
        }

        #step-1 .flex .boxes {
            font-size: 13px;
            padding-right: 10px;
        }

        #step-1 .item {
            border: 2px solid #000;
            border-radius: 20px;
            padding: 15px 15px 0 15px;
            margin-bottom: 20px;
        }

        #step-1 .item:last-child {
            margin-bottom: 0;
        }

        #step-1 .item .select-apply-title {
            font-size: 15px;
            font-weight: 800;
            font-style: italic;
            padding: 10px 0 10px 15px;
        }

        #step-1 .no-border-input {
            border-bottom: 1px solid #000;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            width: 60px;
        }

        #step-1 .top-title {
            font-size: 15px;
            margin-bottom: 20px;
            font-weight: 600;
            margin-left: 5px;

        }

        #step-1 .no-border-input:focus {
            outline: none;
            background: transparent
        }

        #step-1 .step-title {
            font-size: 16px;
            font-weight: 800;
            font-style: italic;
            margin-left: 5px;
            margin-bottom: 5px;
        }

        #step-1 input[type=checkbox]+label:before {
            width: 15px;
            height: 15px;
            top: 1px;
        }

        #step-1 input[type=checkbox]:checked+label:before {
            width: 8px;
            height: 13px;
        }

        #step-1 input[type=checkbox]+label {
            padding-left: 20px;
        }

        @media screen and (max-width: 1169px) {
            #step-3 form {
                width: 100%;
            }

            #step-3 #form-step-3 {
                width: 90%;
            }

            #step-4 form {
                width: 100%;
            }
        }

        .step-4 {
            padding-top: 10px;
        }

        .step-4 .title {
            font-size: 16px;
            font-weight: 800;
            padding: 10px 0 10px 0;
            border-bottom: 1px solid #ccc;
            margin: 0 15px 15px 15px;
        }

        .step-4 .add-phone {
            color: #7fb1f5;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .step-4 .step-box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
        }

        .step-4 .radio-boxes {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 6px 0 6px 10px;
            margin-bottom: 10px;
        }

        .step-4 input[type="radio"] {
            margin: 0 5px 0 0;
            position: relative;
            top: 2px;
        }

        .step-4 .phone {
            margin: 5px 0 5px 0
        }

        .step-4 .phone .region {
            width: 60px;
            margin: 0 5px 0 5px;
        }

        .step-4 .phone .number {
            width: 125px;
            margin: 0 15px 0 5px;
        }

        .step-4 .phone input {
            border-bottom: 1px solid #000;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        .step-4 .phone input:focus {
            outline: none;
            background: transparent
        }

        .step-4 .fa-check {
            cursor: pointer;
        }
        .pricing-switcher label {
            font-size: 8px !important;
        }
    </style>
@endsection
@section('content')
        @php
            $step = $continueStep;
            if ($isLast) {
                $step = $loads->routes ? 4 : 3;
            }
        @endphp
        @include('themes.sign_up.carrier._step_list')
        <div id="step-1" class="@if ($step !== 1) hidden @endif">
            @include('themes.sign_up.carrier.load.step_1')
        </div>
        <div id="step-2" class="@if ($step !== 2) hidden @endif">
            @include('themes.sign_up.carrier.load.step_2')
        </div>
        <div id="step-3" class="@if ($step !== 3) hidden @endif">
            @include('themes.sign_up.carrier.load.step_3')
        </div>
        <div id="step-4" class=" @if($step !== 4) hidden @endif">
            @include('themes.sign_up.carrier.load.step_4')
        </div>
        <div class="row mt-2 mb-2 mt-2">
            <div class="col-6">
                <button type="button"
                class="wizard-next-prev-btn next-button pull-left"
                id="prev-button">Previous</button>
            </div>
            <div class="col-6">
                <button type="button"
                    class="wizard-next-prev-btn next-button pull-right" id="next-button">Next</button>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        let editRouteString = 
            `
            <div class="col-md-5" id="origin-box" style="border: 1px solid #ccc;padding: 0px">
            <div class="route-header-box">
                <div class="font-weight-bold pr-2">
                    Origin
                </div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_origin" value="region_search" <% if (search_origin == 'region_search') {%>
                            checked="checked" <% } %>?>
                        <label class="form-check-label" for="search_origin">Tap one or more origin regions or states:</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_origin" value="city_search" <% if (search_origin == 'city_search') {%>
                            checked="checked" <% } %>>
                        <label class="form-check-label" for="search_origin">City Search</label>
                    </div>
                </div>
            </div>
            <div class="region_search <%=(search_origin == 'city_search') ? 'hidden' : ''  %>">
                <h6>Select One Area:</h6>
                <input type="hidden" name="origin_area" value='<%= origin_area %>'>
                <div class="region_box">
                    @foreach (config('data.route_regions') as $key => $region)
                        <div class="col-md-12 mb-1 <% if (JSON.parse(origin_area).includes("{{$region['value']}}")) { %> bg-selected <% } %>" data-selected-value="{{ $region['value'] }}">
                            {{ $region['label'] }}
                        </div>
                    @endforeach
                </div>
                <div id="origin_area-error" class="error" style="display: none">Please select one of the area.</div>
            </div>
            <div class="city_search <%=(search_origin == 'region_search') ? 'hidden' : ''%>">
                <div class="form-group shadow-none">
                    <label>* City</label>
                    <input type="text" class="form-control city_address" name="origin_city" value="<%=origin_city%>"
                        placeholder="City">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="origin_state" class="form-control state" placeholder="state" value="<%=origin_state%>">
                    </div>
                    <div class="form-group ml-1 mr-1">
                        <label> Postal Code </label>
                        <input type="text" name="origin_zip" class="form-control zip_code" placeholder="Postal Code" value="<%=origin_zip%>"
                            style="border: none;">
                    </div>
                    <div class="form-group">
                        <label target="radius"> *Radius </label>
                        <select class="form-control" name="origin_radius">
                            @foreach (config('data.route_radius') as $key => $option)
                                <option <% if (origin_radius == '{{ $key }}') {%> selected="selected" <% } %> value="{{ $key }}">
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-5" id="dest-box" style="border: 1px solid #ccc;padding: 0px">
            <div class="route-header-box">
                <div class="font-weight-bold pr-2">
                    Destination
                </div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_dest" value="region_search" <% if (search_dest == 'region_search') {%>
                            checked="checked" <% } %>>
                        <label class="form-check-label" for="search_dest">Tap one or more destination regions or states:</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="search_dest" value="city_search" 
                        <% if (search_dest == 'city_search') {%>
                            checked="checked" <% } %> >
                        <label class="form-check-label" for="search_dest">City Search</label>
                    </div>
                </div>
            </div>
            <div class="region_search <%=(search_dest == 'city_search') ? 'hidden' : ''%>">
                <h6>Select One Area:</h6>
                <input type="hidden" name="dest_area" value='<%=dest_area %>'>
                <div class="region_box">
                    @foreach (config('data.route_regions') as $key => $region)
                        <div class="col-md-12 mb-1 <% if (JSON.parse(dest_area).includes("{{$region['value']}}")) { %> bg-selected <% } %>" data-selected-value="{{ $region['value'] }}">
                            {{ $region['label'] }}
                        </div>
                    @endforeach
                </div>
                <div id="dest_area-error" class="error" style="display: none">Please select one of the area.</div>
            </div>
            <div class="city_search <%=(search_dest == 'region_search') ? 'hidden' : ''%>">
                <div class="form-group shadow-none">
                    <label>* City</label>
                    <input type="text" class="form-control city_address" name="dest_city"
                        placeholder="City" value="<%=dest_city%>">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="dest_state" class="form-control state" placeholder="state" value="<%=dest_state%>">
                    </div>
                    <div class="form-group ml-1 mr-1">
                        <label> Postal Code </label>
                        <input type="text" name="dest_zip" class="form-control zip_code" placeholder="Zip Code" value="<%=dest_zip%>"
                            style="border: none;">
                    </div>
                    <div class="form-group">
                        <label target="radius"> *Radius </label>
                        <select class="form-control" name="dest_radius">
                            @foreach (config('data.route_radius') as $key => $option)
                                <option value="{{ $key }}" <% if (dest_radius == "{{$region['value']}}") {%> selected="selected" <% } %> >
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
            `;
        var editRoute =  _.template(editRouteString, { 'imports': { 'jq': jQuery } });
    </script>
    <script>
        $(document).ready(function() {
            var step = {{ $step }};
            var hasNotificationRequest = {{ $loads ? $loads->has_notification_request : 0 }};
            $('#next-button').click(function() {
                if (step < 4) {
                    $('#form-step-' + step).submit();
                }
                if (step == 4) {
                    let sendTo = $('input[name="send_to[]"]:checked').serializeArray()
                    if (hasNotificationRequest) {
                        if (sendTo.length == 0) {
                            $('#loads-instruction-modal').modal('show');
                        } else {
                            $('#form-step-' + step).submit();
                        }
                    } else {
                        $('#form-step-' + step).submit();
                    }
                }
                window.scrollTo(0, 0);
            });
            $('#prev-button').click(function() {
                if (step > 1) {
                    $('#step-' + step).addClass('hidden');
                    $('#step-' + (step - 1)).removeClass('hidden');
                    step--;
                } else {
                    window.location.href = "carrier-agreement?pass_step=1&is_last=1";
                    {{--window.location.href = "{{ route('account.carrier.agreement', ['pass_step' => 1]) }}";--}}
                }
            });
            $('#form-step-1').find('input[type="number"]').change(function() {
                let totalTruckInput = $('#total_trucks');
                let verifyTotalTruckInput = $('#form-step-1').find('input[name="verify_total_trucks"]');
                let caculatedTotal = 0;
                $('#form-step-1').find('input[type="number"]').each((i, item) => {
                    if ($(item).prop('id') != 'total_trucks') {
                        caculatedTotal += $(item).val() == '' ? 0 : parseInt($(item).val());
                    }
                    
                });
                verifyTotalTruckInput.val(caculatedTotal);
                $('#form-step-1').find('input[name="verify_total_trucks"]').valid();
            });
            var form1Validator = $('#form-step-1').validate({
                ignore: [':not(checkbox:hidden)'],
                onfocusout: function(element) {
                    if ($(element).prop('name') == 'capacity_1_quantity') {
                        $('input[name="capacity_1_apply[]"]').valid();
                    } else if ($(element).prop('name') == 'capacity_3_quantity') {
                        $('input[name="capacity_3_apply[]"]').valid();
                    } else if ($(element).prop('name') == 'capacity_5_quantity') {
                        $('input[name="capacity_5_apply[]"]').valid();
                    } else if ($(element).prop('name') == 'capacity_7_quantity') {
                        $('input[name="capacity_7_apply[]"]').valid();
                    } else if ($(element).prop('name') == 'capacity_9_quantity') {
                        $('input[name="capacity_9_apply[]"]').valid();
                    } else {
                        $(element).valid();
                    }
                },
                rules: {
                    'apply': 'required',
                    'step': 'required',
                    'total_trucks': {
                        'required': true,
                        'min': 1
                    },
                    'truck_have_winch': 'required',
                    'verify_total_trucks': {
                        equalTo: "#total_trucks",
                        required: true
                    },
                    'capacity_1_apply[]': {
                        required: function() {
                            return $('input[name=capacity_1_quantity]').val() !== '' && $('input[name=capacity_1_quantity]').val() > 0;
                        }
                    },
                    'capacity_3_apply[]': {
                        required: function() {
                            return $('input[name=capacity_3_quantity]').val() !== '' && $('input[name=capacity_3_quantity]').val() > 0;
                        }
                    },
                    'capacity_5_apply[]': {
                        required: function() {
                            return $('input[name=capacity_5_quantity]').val() !== '' && $('input[name=capacity_5_quantity]').val() > 0;
                        }
                    },
                    'capacity_7_apply[]': {
                        required: function() {
                            return $('input[name=capacity_7_quantity]').val() !== '' && $('input[name=capacity_7_quantity]').val() > 0;
                        }
                    },
                    'capacity_9_apply[]': {
                        required: function() {
                            return $('input[name=capacity_9_quantity]').val() !== '' && $('input[name=capacity_9_quantity]').val() > 0;
                        }
                    }
                },
                messages: {
                    apply: "Apply is required",
                    total_trucks: "Total trucks is required",
                    verify_total_trucks: {
                        equalTo: "Total car handling units must equal total trucks"
                    },
                    'capacity_1_apply[]' : "Please check at least one apply",
                    'capacity_3_apply[]' : "Please check at least one apply",
                    'capacity_5_apply[]' : "Please check at least one apply",
                    'capacity_7_apply[]' : "Please check at least one apply",
                    'capacity_9_apply[]' : "Please check at least one apply"
                },
                errorPlacement: function($error, $element) {
                    if($element.is('input:radio')) {
                        $error.appendTo($element.closest(".form-group"));
                    }
                    else {
                        if ($element.is('input:checkbox')) {
                            $error.insertAfter($element.parent().closest('.col-md-4'));
                        } else {
                            $error.insertAfter($element);
                        }
                    }                
                },
                invalidHandler: function(f, v) {
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-load') }}",
                        data: $('#form-step-1').serialize(),
                        success: (response) => {
                            $('#step-' + (step)).addClass('hidden');
                            $('#step-' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                            }
                        }
                    });
                }
            });
            var form2Validator = $('#step-2').find('form').validate({
                ignore: [':not(checkbox:hidden)'],
                onfocusout: function(element) {$(element).valid()},
                rules: {
                    "vehicle_types_hauled[]": {
                        required: true
                    },
                    "vehicle_types_hauled_selected": {
                        required: true
                    }
                },
                messages: {
                    'vehicle_types_hauled[]' : "Please select at least 1 type of vehicle hauled"
                },
                errorPlacement: function($error, $element) {
                        if ($element.is('input:checkbox')) {
                            $error.appendTo($element.parent().closest('.step-box'));
                        } else {
                            $error.insertAfter($("#error_msg_hook"));
                        }
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-load') }}",
                        data: $('#form-step-2').serialize(),
                        success: (response) => {
                            $('#step-' + (step)).addClass('hidden');
                            $('#step-' + (step + 1)).removeClass('hidden');
                            step++;
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                            }
                        }
                    });
                }
            });
            var form3Validator = $('#form-step-3').validate({
                onfocusout: function(element) {$(element).valid()},
                ignore: [':not(checkbox:hidden)'],
                errorPlacement: function($error, $element) {
                        if ($element.is('input:checkbox')) {
                            $error.appendTo($element.parent().closest('.col-12'));
                        } else {
                            $error.insertAfter($element);
                        }
                },
                messages: {
                    "no_future_loads": "You must enter at least one valid route, or check the checkbox above"
                },
                rules: {
                    "direction[]": {
                        required: true,
                    },
                    "notification[]": {
                        required: true
                    },
                    "origin_area[]": {
                        required: true
                    },
                    "origin_city[]": {
                        required: true
                    }, 
                    "origin_state[]": {
                        required: true
                    },
                    "origin_zip[]": {
                        required: false
                    },
                    "origin_radius[]": {
                        required: true
                    },
                    "dest_area[]": {
                        required: true
                    },
                    "dest_city[]": {
                        required: true
                    },
                    "dest_state[]": {
                        required: true
                    }, 
                    "dest_zip[]": {
                        required: false
                    }, 
                    "dest_radius[]": {
                        required: true
                    },
                    "no_future_loads": {
                        required: {
                            depends: function(element) {
                                return !$(".search_origin").length
                            }
                        }
                    }

                },
                invalidHandler: function(f, v) {
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.carrier.submit-load') }}",
                        data: $('#form-step-3').serialize(),
                        success: (response) => {
                            if (response.routes == null) {
                                window.location.href = "{{ route('account.carrier.payment') }}"
                            } else {
                                $('#step-' + (step)).addClass('hidden');
                                $('#step-' + (step + 1)).removeClass('hidden');
                                step++;
                            }
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText, function(key, value) {
                                    message[key] = value[0]
                                });
                            }
                        }
                    });
                }
            });
            var form4Validator = $('#form-step-4').validate({
                onfocusout: function(element) {$(element).valid()},
                rules: {
                    "send_to[]": {
                        phone_us_or_email: /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/
                    },
                    "new_contact": {
                        // phone_us_or_email: /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/
                        remote: {
                            url: "{{ route('tools.validation-phone-or-email') }}",
                            type: "get"
                        }
                    }
                },
                invalidHandler: function(f, v) {
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    submitLoad();
                }
            });

            function submitLoad() {
                $.ajax({
                    method: "POST",
                    url: "{{ route('account.carrier.submit-load') }}",
                    data: $('#form-step-4').serialize(),
                    success: (response) => {
                        window.location.href = "{{ route('account.carrier.payment') }}"
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            let responseText = $.parseJSON(data.responseText);
                            let message = {};
                            $.each(responseText, function(key, value) {
                                message[key] = value[0]
                            });
                        }
                    }
                });
            }

            $('#dialog-submit').click(function() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('user.fmcsa.carrier.search') }}",
                    data: $('#search-carrier-form').serialize(),
                    success: (response) => {
                        window.location.href = "{{ route('account.carrier.load') }}";
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
            $('.step-box').delegate('.fa-check', 'click', function() {
                let newContact =  $('#new_contact').val();
                let validContact = form4Validator.element($('#new_contact'));
                if (newContact && validContact) {
                    let max = 99999;
                    let min = 1;
                    let randowId = parseInt(Math.random() * (max - min + 1) + min);
                    let newContactHtml = '';
                    if (!newContact.includes('@')) {
                        let usPhoneFormat = "("+newContact.substring(0,3) +") " + newContact.substring(3,6) + "-" +newContact.substring(6);
                         newContactHtml = `<div class="col-md-12 phone-number">
                     <div class="boxes">
                    <input type="checkbox" name="send_to[]" id="${randowId}" value="${usPhoneFormat}" class="phone_us" checked="checked" />
                    <label for="${randowId}"><strong>${usPhoneFormat}</strong></label>
                     </div>
                    </div>`;
                    } else {
                         newContactHtml = `<div class="col-md-12 phone-number">
                     <div class="boxes">
                    <input type="checkbox" name="send_to[]" id="${randowId}" value="${newContact}" checked="checked" />
                    <label for="${randowId}"><strong>${newContact}</strong></label>
                     </div>
                    </div>`;
                    }
                    $('.phone-number').last().after(newContactHtml);
                    $('#new_contact').val('');
                }
            });

        });
    </script>
    <script>
        /**
         * step 3
         * */
        $(document).ready(function() {
            var routeIndex = 0;
            if ($('.step_3_max_step').val() > 0) {
                routeIndex = parseInt($('.step_3_max_step').val());
            }
            $('#step-3').delegate('input[name="search_origin"]', 'click', function() {
                let searchVal = $(this).val();
                if (searchVal == 'region_search') {
                    $(this).parent().closest('#origin-box').find('.region_search')
                        .removeClass('hidden');
                    $(this).parent().closest('#origin-box').find('.city_search')
                        .addClass('hidden');
                } else {
                    $(this).parent().closest('#origin-box').find('.region_search')
                        .addClass('hidden');
                    $(this).parent().closest('#origin-box').find('.city_search')
                        .removeClass('hidden');
                }
            });
            $('#step-3').delegate('input[name="search_dest"]', 'click', function() {
                let searchVal = $(this).val();
                if (searchVal == 'region_search') {
                    $(this).parent().closest('#dest-box').find('.region_search')
                        .removeClass('hidden');
                    $(this).parent().closest('#dest-box').find('.city_search')
                        .addClass('hidden');
                } else {
                    $(this).parent().closest('#dest-box').find('.region_search')
                        .addClass('hidden');
                    $(this).parent().closest('#dest-box').find('.city_search')
                        .removeClass('hidden');
                }
            });
            $('#step-3').delegate('.region_box > div', 'click', function() {
                $(this).toggleClass('bg-selected');
                var selectedValue = [];
                $(this).parent('.region_box').children('div').each(function() {
                    if ($(this).hasClass('bg-selected')) {
                        selectedValue.push($(this).data('selected-value'));
                    }
                });
                
                $(this).parent('.region_box').prev("input").val(JSON.stringify(selectedValue));
            });
            $('.add_route').click(function() {
                $('#add_route_form').submit();
            });

            function addNewRoute(dataArray) {
                let origin = "";
                let destination = "";
                let search_origin = "";
                let search_dest = "";
                dataArray.forEach((item) => {
                    if (item.name == "search_origin") {
                        search_origin = item.value;
                    }
                    if (item.name == 'search_dest') {
                        search_dest = item.value;
                    }
                });
                if ("region_search" === search_origin) {
                    origin = JSON.parse(dataArray[1].value).join(', ');
                } else {
                    origin = dataArray[2].value + ' ' + dataArray[3].value + ', ' + dataArray[4].value + ', ' +
                        dataArray[5].value + ' miles';

                }
                if ("region_search" === search_dest) {
                    destination = JSON.parse(dataArray[7].value).join(', ');
                } else {
                    destination = dataArray[8].value + ', ' + dataArray[9].value +
                        ', ' + dataArray[10].value + ', ' + dataArray[11].value + ' miles';
                }
                let getNotificationYes = '';
                let getNotificationNo = '';
                if (search_origin == "region_search" && search_dest == "region_search") {
                    getNotificationYes = '';
                    getNotificationNo = 'checked';
                } else {
                    getNotificationYes = 'checked';
                    getNotificationNo = '';
                }

                let router = `
                        <div class="d-flex route_box bg-secondary radius_20 border border-dark mb-2" data-index="${routeIndex}">
                        <div class="align-self-center">
                            <strong style="writing-mode: vertical-lr;
                            transform: rotate(180deg);">
                            Route ${routeIndex + 1}</strong>
                        </div>
                        <div class="flex-grow-1 bg-white radius_right_20 border-0 p-2">
                            <div class="d-flex">
                                <div class="title" style="width: 80px"><strong>Origin</strong></div>
                                <div class="content"><span class="origin-display-value">
                                    ${origin}
                                    </span>
                                </div>
                                <div class="tail ml-auto">
                                    <i class="fa fa-pencil-square-o fa-2x" data-index="${routeIndex}"
                                        aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="title" style="width: 80px"><strong>Destination</strong></div>
                                <div class="content"><span class="dest-display-value">
                                        ${destination}
                                    </span>
                                </div>
                                <div class="tail ml-auto"></div>
                            </div>
                            <div class="d-flex">
                                <div class="title" style="width: 80px"></div>
                                <div class="content d-flex align-items-center">
                                    <div class="pricing-switcher float-none transport-speed">
                                        <p class="fieldset p-0 m-0">
                                            <input type="radio" name="direction[${routeIndex}]" value="Both"
                                                id="direction_both_${routeIndex}"
                                                checked/>
                                            <label for="direction_both_${routeIndex}">Both Directions</label>
                                            <input type="radio" name="direction[${routeIndex}]" value="One"
                                                id="direction_one_${routeIndex}"
                                                />
                                            <label for="direction_one_${routeIndex}">One Direction Only</label>
                                            <span class="switch"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="tail ml-auto"></div>
                            </div>
                            <div class="d-flex">
                                <div class="title" style="width: 80px"></div>
                                <div class="content d-flex align-items-center">
                                    Get Notification
                                    <div class="pricing-switcher float-none">
                                        <p class="fieldset p-0 m-0">
                                            <input type="radio" name="notification[${routeIndex}]" value="Yes"
                                                id="notification_yes_${routeIndex}"
                                                 ${getNotificationYes}/>
                                            <label for="notification_yes_${routeIndex}">Yes</label>
                                            <input type="radio" name="notification[${routeIndex}]" value="No"
                                                id="notification_no_${routeIndex}"
                                                ${getNotificationNo}
                                                />
                                            <label for="notification_no_${routeIndex}">No</label>
                                            <span class="switch"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="tail ml-auto"><i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i></div>
                            </div>
                            <input type="hidden" class="search_origin" name="search_origin[${routeIndex}]" value="${search_origin}">
                            <input type="hidden" name="origin_area[${routeIndex}]" value='${dataArray[1].value}'>
                            <input type="hidden" name="origin_city[${routeIndex}]" value="${dataArray[2].value}">
                            <input type="hidden" name="origin_state[${routeIndex}]" value="${dataArray[3].value}">
                            <input type="hidden" name="origin_zip[${routeIndex}]" value="${dataArray[4].value}">
                            <input type="hidden" name="origin_radius[${routeIndex}]" value="${dataArray[5].value}">
                            <input type="hidden" name="search_dest[${routeIndex}]" value="${search_dest}">
                            <input type="hidden" name="dest_area[${routeIndex}]" value='${dataArray[7].value}'>
                            <input type="hidden" name="dest_city[${routeIndex}]" value="${dataArray[8].value}">
                            <input type="hidden" name="dest_state[${routeIndex}]" value="${dataArray[9].value}">
                            <input type="hidden" name="dest_zip[${routeIndex}]" value="${dataArray[10].value}">
                            <input type="hidden" name="dest_radius[${routeIndex}]" value="${dataArray[11].value}">
                        </div>
                    </div>
                `;
                $('#form-step-3').append(router);
                routeIndex += 1;
                $('input[name="search_origin"]').eq(0).prop('checked', true);
                $('input[name="search_dest"]').eq(1).prop('checked', true);
                $("#dest-box").find('.region_search').addClass('hidden');
                $("#dest-box").find('.city_search').removeClass('hidden');
                $("#origin-box").find('.region_search').removeClass('hidden');
                $("#origin-box").find('.city_search').addClass('hidden');
                $('input[name="origin_city"]').val('');
                $('input[name="origin_state"]').val('');
                $('input[name="origin_zip"]').val('');
                $('select[name="origin_radius"]').val(100);
                $('input[name="dest_city"]').val('');
                $('input[name="dest_state"]').val('');
                $('input[name="dest_zip"]').val('');
                $('select[name="dest_radius"]').val(100);
                $('input[name="origin_area"]').val('');
                $('input[name="dest_area"]').val('');
                $('.region_box').children().removeClass('bg-selected');
            }

            $('#form-step-3').delegate('.fa-trash', 'click', function() {
                $(this).parent().closest('.route_box').remove();
            });
            $('#route-instruction').click(function() {
                $('#router-instruction-modal').modal('show');
            })
            $('#form-step-3').delegate('.fa-pencil-square-o', 'click', function() {
                let index = $(this).data('index');
                let formData = $('#form-step-3').serializeArray();
                let tplData = {
                    search_origin: 'city_search',
                    origin_area: "",
                    origin_city: "",
                    origin_state: "",
                    origin_zip: "",
                    origin_radius: "",
                    search_dest: 'region_search',
                    dest_area: "",
                    dest_city: "",
                    dest_state: "",
                    dest_zip: "",
                    dest_radius: ""
                };
                for (let i = 0; i < formData.length; i++) {
                    const element = formData[i];
                    if (element.name == 'search_origin['+index+']') {
                        tplData['search_origin'] = element.value;
                    }
                    if (element.name == 'origin_area['+index+']') {
                        tplData['origin_area'] = element.value;
                    }
                    if (element.name == 'origin_city['+index+']') {
                        tplData['origin_city'] = element.value;
                    }
                    if (element.name == 'origin_state['+index+']') {
                        tplData['origin_state'] = element.value;
                    }
                    if (element.name == 'origin_zip['+index+']') {
                        tplData['origin_zip'] = element.value;
                    }
                    if (element.name == 'origin_radius['+index+']') {
                        tplData['origin_radius'] = element.value;
                    }
                    if (element.name == 'search_dest['+index+']') {
                        tplData['search_dest'] = element.value;
                    }
                    if (element.name == 'dest_area['+index+']') {
                        tplData['dest_area'] = element.value;
                    }
                    if (element.name == 'dest_city['+index+']') {
                        tplData['dest_city'] = element.value;
                    }
                    if (element.name == 'dest_state['+index+']') {
                        tplData['dest_state'] = element.value;
                    }
                    if (element.name == 'dest_zip['+index+']') {
                        tplData['dest_zip'] = element.value;
                    }
                    if (element.name == 'dest_radius['+index+']') {
                        tplData['dest_radius'] = element.value;
                    }
                }
                let tmpEditForm = editRoute(tplData);
                $('#edit-route-form').html(tmpEditForm);
                $('#save-route').data('index', index);
                $('#edit-route').modal();
            });
            $('#save-route').click(function() {
                let index = $(this).data('index');
                let dataArray = $('#edit-route-form').serializeArray();
                let search_origin = $('#edit-route-form').find('input[name="search_origin"]:checked').val();
                let displayOrigin = "";
                if ("region_search" === search_origin) {
                    displayOrigin = JSON.parse(dataArray[1].value).join(', ');
                } else {
                    displayOrigin = dataArray[2].value + ' ' + dataArray[3].value + ', ' + dataArray[4].value + ', ' +
                        dataArray[5].value + ' miles';

                }
                let search_dest = $('#edit-route-form').find('input[name="search_dest"]:checked').val();
                let displayDest = "";
                if ("region_search" === search_dest) {
                    displayDest = JSON.parse(dataArray[7].value).join(', ');
                } else {
                    displayDest = dataArray[8].value + ' ' + dataArray[9].value + ', ' + dataArray[10].value + ', ' +
                        dataArray[11].value + ' miles';
                }
                $($('.route_box').get()).eq(index).find('input[name="search_origin['+index+']"]').val(search_origin);
                $($('.route_box').get()).eq(index).find('input[name="origin_area['+index+']"]').val($('#edit-route-form').find('input[name="origin_area"]').val());
                $($('.route_box').get()).eq(index).find('input[name="origin_city['+index+']"]').val($('#edit-route-form').find('input[name="origin_city"]').val());
                $($('.route_box').get()).eq(index).find('input[name="origin_state['+index+']"]').val($('#edit-route-form').find('input[name="origin_state"]').val());
                $($('.route_box').get()).eq(index).find('input[name="origin_zip['+index+']"]').val($('#edit-route-form').find('input[name="origin_zip"]').val());
                $($('.route_box').get()).eq(index).find('input[name="origin_radius['+index+']"]').val($('#edit-route-form').find('select[name="origin_radius"]').val());
                $($('.route_box').get()).eq(index).find('input[name="search_dest['+index+']"]').val(search_dest);
                $($('.route_box').get()).eq(index).find('input[name="dest_area['+index+']"]').val($('#edit-route-form').find('input[name="dest_area"]').val());
                $($('.route_box').get()).eq(index).find('input[name="dest_city['+index+']"]').val($('#edit-route-form').find('input[name="dest_city"]').val());
                $($('.route_box').get()).eq(index).find('input[name="dest_state['+index+']"]').val($('#edit-route-form').find('input[name="dest_state"]').val());
                $($('.route_box').get()).eq(index).find('input[name="dest_zip['+index+']"]').val($('#edit-route-form').find('input[name="dest_zip"]').val());
                $($('.route_box').get()).eq(index).find('input[name="dest_radius['+index+']"]').val($('#edit-route-form').find('select[name="dest_radius"]').val());
                $($('.route_box').get()).eq(index).find('.origin-display-value').text(displayOrigin);
                $($('.route_box').get()).eq(index).find('.dest-display-value').text(displayDest);
                $('#edit-route').modal('hide');
            });
            $('#form-step-3').delegate('.route-origin', 'change', function() {
                $(this).parent('div').find('.origin-display-value').text($(this).val());
            });
            $('#form-step-3').delegate('.route-destination', 'change', function() {
                $(this).parent('div').find('.dest-display-value').text($(this).val());
            });

            $('#add_route_form').validate({
                rules: {
                    "origin_city": "required",
                    "origin_state": "required",
                    "origin_radius": "required",
                    "dest_city": "required",
                    "dest_state": "required",
                    "dest_radius": "required"
                },
                invalidHandler: function(f, v) {
                },
                submitHandler: (form, event) => {
                    event.preventDefault();
                    let originValid = false;
                    let destValid = false;
                    if ($('input:radio[name="search_origin"]:checked').val() == 'region_search') {
                        if (!$("input[name='origin_area']").val()) {
                            $('#origin_area-error').css('display', 'block');
                        } else {
                            $('#origin_area-error').css('display', 'none');
                            $('#add_route_form').serialize();
                            originValid = true;
                        }
                    } else {
                        originValid = true;
                    }
                    if ($('input:radio[name="search_dest"]:checked').val() === 'region_search') {
                        if (!$("input[name='dest_area']").val()) {
                            $('#dest_area-error').css('display', 'block');
                            return;
                        } else {
                            $('#dest_area-error').css('display', 'none');
                            destValid = true;
                        }
                    } else {
                        destValid = true;
                    }
                    if (originValid && destValid) {
                        addNewRoute($('#add_route_form').serializeArray());
                        $("#add_route_form").validate().resetForm();
                    }
                }
            });

        });
    </script>
@endsection
