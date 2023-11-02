@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable"
        content="{{ route('admin.carrier-load.datatable', ['company_id' => request()->get('company_id')]) }}" />
@endsection

@section('style')
    <style>
        .error {
            color: red
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    @include('admin.company.tabs', [
                        'activeTab' => 'carrier-load',
                        'carrierLoad' => $carrierLoad,
                    ])
                </div>
                <div class="card-body p-3">
                    @include('admin.company.carrier_load.show', ['carrierLoad' => $carrierLoad])
                </div>
            </div>
        </div>
    </div>
@endsection
@if ($carrierLoad)
    @section('script')
        <script>
            $(document).ready(function() {
                $('#view-equipment').click(function() {
                    $('#equipment-modal').modal('show');
                });
                $('#vehicle-type').click(function() {
                    $('#vehicle-type-modal').modal('show');
                });
                $('#load-offers').click(function() {
                    $('#load-offers-modal').modal('show');
                });

                $('#equipment-modal form').find('input[type="number"]').change(function() {
                    let totalTruckInput = $('#total_trucks');
                    let verifyTotalTruckInput = $('#equipment-modal form').find(
                        'input[name="verify_total_trucks"]');
                    let caculatedTotal = 0;
                    $('#equipment-modal form').find('input[type="number"]').each((i, item) => {
                        if ($(item).prop('id') != 'total_trucks' && $(item).prop('id') !=
                            'verify_total_trucks') {
                            caculatedTotal += $(item).val() == '' ? 0 : parseInt($(item).val());
                        }

                    });
                    verifyTotalTruckInput.val(caculatedTotal);
                    $('#equipment-modal form').find('input[name="verify_total_trucks"]').valid();
                });

                var equipmentValidator = $('#equipment-modal form').validate({
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
                                return $('input[name=capacity_1_quantity]').val() !== '' && $(
                                    'input[name=capacity_1_quantity]').val() > 0;
                            }
                        },
                        'capacity_3_apply[]': {
                            required: function() {
                                return $('input[name=capacity_3_quantity]').val() !== '' && $(
                                    'input[name=capacity_3_quantity]').val() > 0;
                            }
                        },
                        'capacity_5_apply[]': {
                            required: function() {
                                return $('input[name=capacity_5_quantity]').val() !== '' && $(
                                    'input[name=capacity_5_quantity]').val() > 0;
                            }
                        },
                        'capacity_7_apply[]': {
                            required: function() {
                                return $('input[name=capacity_7_quantity]').val() !== '' && $(
                                    'input[name=capacity_7_quantity]').val() > 0;
                            }
                        },
                        'capacity_9_apply[]': {
                            required: function() {
                                return $('input[name=capacity_9_quantity]').val() !== '' && $(
                                    'input[name=capacity_9_quantity]').val() > 0;
                            }
                        }
                    },
                    messages: {
                        apply: "Apply is required",
                        total_trucks: "Total trucks is required",
                        verify_total_trucks: {
                            equalTo: "Total car hanling units must equal total trucks"
                        },
                        'capacity_1_apply[]': "Please check at least one apply",
                        'capacity_3_apply[]': "Please check at least one apply",
                        'capacity_5_apply[]': "Please check at least one apply",
                        'capacity_7_apply[]': "Please check at least one apply",
                        'capacity_9_apply[]': "Please check at least one apply"
                    },
                    errorPlacement: function($error, $element) {
                        $error.appendTo($element.closest(".form-group"));

                    },
                    invalidHandler: function(f, v) {},
                    submitHandler: (form, event) => {
                        event.preventDefault();
                        $.ajax({
                            method: "PUT",
                            url: "{{ route('admin.company.carrier-load.update', ['company' => $carrierLoad->company->id, 'carrier_load' => $carrierLoad->id]) }}",
                            data: $('#equipment-modal').find('form').serialize(),
                            success: (response) => {
                                window.location.reload();
                            },
                            error: function(data) {
                                if (data.status == 422) {
                                    let responseText = $.parseJSON(data.responseText);
                                    let message = {};
                                    $.each(responseText, function(key, value) {
                                        message[key] = value[0]
                                    });
                                }
                                if (data.status == 500) {
                                    alert('some wrong with server');
                                }
                            }
                        });
                    }
                });

                var vehicleHauled = $('#vehicle-type-modal').find('form').validate({
                    ignore: [':not(checkbox:hidden)'],
                    onfocusout: function(element) {
                        $(element).valid()
                    },
                    rules: {
                        "vehicle_types_hauled[]": {
                            required: true
                        }
                    },
                    messages: {
                        'vehicle_types_hauled[]': "Please select at least 1 type of vehicle hauled"
                    },
                    errorPlacement: function($error, $element) {
                        if ($element.is('input:checkbox')) {
                            $error.appendTo($element.parent().closest('.form-group'));
                        } else {
                            $error.insertAfter($element);
                        }
                    },
                    submitHandler: (form, event) => {
                        event.preventDefault();
                        $.ajax({
                            method: "PUT",
                            url: "{{ route('admin.company.carrier-load.update', ['company' => $carrierLoad->company->id, 'carrier_load' => $carrierLoad->id]) }}",
                            data: $('#vehicle-type-modal').find('form').serialize(),
                            success: (response) => {
                                window.location.reload();
                            },
                            error: function(data) {
                                if (data.status == 422) {
                                    let responseText = $.parseJSON(data.responseText);
                                    let message = {};
                                    $.each(responseText, function(key, value) {
                                        message[key] = value[0]
                                    });
                                }
                                if (data.status == 500) {
                                    alert('some wrong with server');
                                }
                            }
                        });
                    }
                });

                var loadOfferValidator = $('#load-offers-modal').find('form').validate({
                    onfocusout: function(element) {
                        $(element).valid()
                    },
                    rules: {
                        "send_to[]": {
                            phone_us_or_email: /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/
                        },
                        "new_contact": {
                            phone_us_or_email: /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/
                        }
                    },
                    invalidHandler: function(f, v) {},
                    submitHandler: (form, event) => {
                        event.preventDefault();
                        $.ajax({
                            method: "PUT",
                            url: "{{ route('admin.company.carrier-load.update', ['company' => $carrierLoad->company->id, 'carrier_load' => $carrierLoad->id]) }}",
                            data: $('#load-offers-modal').find('form').serialize(),
                            success: (response) => {
                                window.location.reload();
                            },
                            error: function(data) {
                                if (data.status == 422) {
                                    let responseText = $.parseJSON(data.responseText);
                                    let message = {};
                                    $.each(responseText, function(key, value) {
                                        message[key] = value[0]
                                    });
                                }
                                if (data.status == 500) {
                                    alert('some wrong with server');
                                }
                            }
                        });
                    }
                });


                $('#load-offers-modal').delegate('.fa-check', 'click', function() {
                    let newContact = $('#new_contact').val();
                    let validContact = loadOfferValidator.element($('#new_contact'));
                    if (newContact && validContact) {
                        let max = 99999;
                        let min = 1;
                        let randowId = parseInt(Math.random() * (max - min + 1) + min);
                        let newContactHtml = '';
                        if (!newContact.includes('@')) {
                            newContactHtml = `<div class="col-md-12 mb-1 mt-1 phone-number">
                    <input type="checkbox" name="send_to[]" id="${randowId}" value="${newContact}" class="phone_us" checked="checked" />
                    <label for="${randowId}"><strong>${newContact}</strong></label>
                    </div>`;
                        } else {
                            newContactHtml = `<div class="col-md-12 phone-number">
                    <input type="checkbox" name="send_to[]" id="${randowId}" value="${newContact}" checked="checked" />
                    <label for="${randowId}"><strong>${newContact}</strong></label>
                    </div>`;
                        }
                        $('.phone-number').last().after(newContactHtml);
                        $('#new_contact').val('');
                    }
                });
            });
        </script>
    @endsection
@endif
