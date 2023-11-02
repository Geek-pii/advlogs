@extends('sign_up_process', ['content-class' => 'container-fluid'])

@section('styles')
    <style>
        .my-error-class {
            color: red !important;
        }

        label.error {
            color: red;
        }

        form {
            width: 100% !important;
            margin: initial !important;
        }
    </style>
@endsection

@section('content')
    <div class="business-client-signup-page-wrapper">
        @include('themes.sign_up.personal._step_list')
        <h1>Quote</h1>
        <div class="buttons-toogle row">
            <a href="#" id="cart-header1" class="col mr-1">Enter Your Quote ID</a>
            <a href="#" id="cart-header" class="col">Get a New Quote</a>
        </div>
        <div class="quote-email-address-wrapper cart-head-detail1" style="display:none">
            <form id="user_bind_quote" action="#" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Quote ID:</label>
                            <input @if (!is_null($quote)) value="{{ $quote->quote_number }}" @endif
                                type="text" name="quote_number" class="form-control" placeholder="Quote ID">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group-button">
                            <input type="submit" value="Next" class="next-button-form rounded-pill"
                                id="next-with-quote-id">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <form id="quote-form">
            @csrf
            <div class="form-new-quote-wrapper cart-head-detail">
                <h2>Shipping Info</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Pick-up Zip Code <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->picking_zip }}" @endif type="text"
                                name="picking_zip" id="picking_zip" class="form-control zip_code"
                                placeholder="Pick-up Zip Code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Delivery Zip Code <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->delivery_zip }}" @endif
                                type="text" name="delivery_zip" id="delivery_code" class="form-control zip_code"
                                placeholder="Delivery Zip Code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Preferred Pick up date <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->preferred_pick_up_date }}" @endif
                                type="date" name="preferred_pick_up_date" id="preferred_pick_up_date"
                                class="form-control" placeholder="Preferred Pick up date">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2> Vehicle Info </h2>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Year <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->year }}" @endif type="text"
                                name="year" id="year2" class="form-control year" placeholder="Year">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Make <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->make }}" @endif type="text"
                                name="make" id="make2" class="form-control" placeholder="Make">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Model <span class="text-danger">*</span></label>
                            <input @if (!is_null($quote)) value="{{ $quote->model }}" @endif type="text"
                                name="model" id="model2" class="form-control" placeholder="Model">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cart-head-detail">
                <div class="col-md-12">
                    <div class="button-get-quote" style="margin-bottom:50px">
                        <a id="next-without-quote-id" style="cursor: pointer" class="text-white">
                            <img src="{{ asset('assets/images/button-icon6.png') }}" alt="icon-form"> Next
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--get quote popup-->
    <div class="get-quote-popup-wrapper">
        <div id="myModal1" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Get a Free Personal Vehicle Quote </h4>
                    </div>
                    <form class="row" id="quote-form-extra" method="POST" action="{{ route('get.a.quote.post') }}">
                        @csrf
                        @if (!is_null($quote))
                            <input type="hidden" name="quote_id" value="{{ $quote->id }}">
                        @endif
                        <div class="modal-body">
                            <div class="form-group-button-radio">
                                <div class="quote-checkboxes">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="happy">Condition</label>
                                                <div class="pricing-switcher">
                                                    <p class="fieldset">
                                                        <input type="radio" name="condition" value="Used"
                                                            id="condition-yes" class="condition_radio"
                                                            @if (!is_null($quote)) @if ($quote->condition == 'Used') checked @endif
                                                        @else checked @endif />
                                                        <label for="condition-yes">Used</label>
                                                        <input type="radio" name="condition" value="New"
                                                            id="condition-no" class="condition_radio"
                                                            @if (!is_null($quote)) @if ($quote->condition == 'New') checked @endif
                                                            @endif/>
                                                        <label for="condition-no">New</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                        class="second-tooltip" data-toggle="tooltip"
                                                        data-placement="right" title="{{ $info->name }}"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div
                                                class="form-group run-drive-div @if (!is_null($quote) && $quote->condition == 'New') hidden @endif">
                                                <label for="happy">Runs & Drives</label>
                                                <div class="pricing-switcher">
                                                    <p class="fieldset">
                                                        <input type="radio" name="run_drives" value="Yes"
                                                            id="run-drive-yes" class="run_drive_radio"
                                                            @if (!is_null($quote)) @if ($quote->run_drives == 'Yes') checked @endif
                                                        @else checked @endif/>
                                                        <label for="run-drive-yes">Yes</label>
                                                        <input type="radio" name="run_drives" value="No"
                                                            id="run-drive-no" class="run_drive_radio"
                                                            @if (!is_null($quote)) @if ($quote->condition == 'No') checked @endif
                                                            @endif/>
                                                        <label for="run-drive-no">No</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                        class="second-tooltip" data-toggle="tooltip"
                                                        data-placement="right" title="{{ $info->run }}"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div
                                                class="form-group rolls-steer-brake-div 
                                                @if (!is_null($quote)) @if ($quote->run_drives == 'Yes' || $quote->condition == 'New') hidden @endif
@else
hidden @endif">
                                                <label for="happy">Rolls, Steers & Brakes?</label>
                                                <div class="pricing-switcher">
                                                    <p class="fieldset">
                                                        <input type="radio" name="rolls_steers_brakes" value="Yes"
                                                            id="roll-steer-brake-yes" class="roll_steer_radio"
                                                            @if (!is_null($quote)) @if ($quote->rolls_steers_brakes == 'Yes') checked @endif
                                                        @else checked @endif/>
                                                        <label for="roll-steer-brake-yes">Yes</label>
                                                        <input type="radio" name="rolls_steers_brakes" value="No"
                                                            id="roll-steer-brake-no" class="roll_steer_radio"
                                                            @if (!is_null($quote)) @if ($quote->rolls_steers_brakes == 'No') checked @endif
                                                            @endif/>
                                                        <label for="roll-steer-brake-no">No</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper">
                                                    <a href="javascript:void(0)" class="second-tooltip"
                                                        data-toggle="tooltip" data-placement="right"
                                                        title="{{ $info->rolls }}"><i class="fa fa-info-circle"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p
                                                    class="rolls-steer-brake-no 
                                                    @if (!is_null($quote)) @if ($quote->condition == 'New' || $quote->run_drives == 'Yes')
                                                             hidden 
                                                        @else 
                                                            @if ($quote->rolls_steers_brakes == 'No') hidden @endif 
                                                        @endif
@else
hidden 
                                                    @endif">
                                                    We’re sorry, but we do not arrange
                                                    transport
                                                    for these
                                                    vehicles.</p>
                                                <p
                                                    class="rolls-steer-brake-yes
                                                    @if (!is_null($quote)) @if ($quote->condition == 'New' || $quote->run_drives == 'Yes')
                                                             hidden 
                                                        @else 
                                                            @if ($quote->rolls_steers_brakes == 'Yes') hidden @endif 
                                                        @endif
@else
hidden 
                                                    @endif">
                                                    We will provide information on
                                                    access
                                                    requirements to
                                                    transport inoperable vehicles with your quote.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group form-group-margin">
                                                <label for="happy">Transport Type</label>
                                                <div class="pricing-switcher transport-type">
                                                    <p class="fieldset">
                                                        <input type="radio" name="transport_type" value="Open"
                                                            id="transport-open"
                                                            @if (!is_null($quote)) @if ($quote->transport_type == 'Open')
                                                                checked @endif
                                                        @else checked @endif
                                                        />
                                                        <label for="transport-open">Open</label>
                                                        <input type="radio" name="transport_type" value="Enclosed"
                                                            id="transport-enclosed"
                                                            @if (!is_null($quote)) @if ($quote->transport_type == 'Enclosed')
                                                                    checked @endif
                                                            @endif
                                                        />
                                                        <label for="transport-enclosed">Enclosed</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                        class="second-tooltip" data-toggle="tooltip"
                                                        data-placement="right" title="{{ $info->type }}"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group form-group-margin">
                                                <label for="happy">Transport Speed</label>
                                                <div class="pricing-switcher transport-speed">
                                                    <p class="fieldset">
                                                        <input type="radio" name="transport_speed" value="Standard"
                                                            id="transport-standard"
                                                            @if (!is_null($quote)) @if ($quote->transport_speed == 'Standard')
                                                                checked @endif
                                                        @else checked @endif />
                                                        <label for="transport-standard">Standard</label>
                                                        <input type="radio" name="transport_speed" value="Expedited"
                                                            @if (!is_null($quote)) @if ($quote->transport_type == 'Expedited')
                                                                    checked @endif
                                                            @endif
                                                        id="transport-expedited" />
                                                        <label for="transport-expedited">Expedited</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper"><a href="javascript:void(0)"
                                                        class="second-tooltip" data-toggle="tooltip"
                                                        data-placement="right" title="{{ $info->speed }}"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group-margin">
                                                <label for="happy">Are there any modifications to the vehicle? </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="pricing-switcher">
                                                    <p class="fieldset">
                                                        <input type="radio" name="is_modifications" value="1"
                                                            id="modifications-yes" class="modification_radio"
                                                            @if (!is_null($quote)) @if ($quote->is_modifications == '1')
                                                                    checked @endif
                                                            @endif
                                                        />
                                                        <label for="modifications-yes">Yes</label>
                                                        <input type="radio" name="is_modifications" value="0"
                                                            id="modifications-no" class="modification_radio"
                                                            @if (!is_null($quote)) @if ($quote->is_modifications == '0')
                                                            checked @endif
                                                        @else checked @endif
                                                        />
                                                        <label for="modifications-no">No</label>
                                                        <span class="switch"></span>
                                                    </p>
                                                </div>
                                                <div class="tooltip-wrapper">
                                                    <a href="javascript:void(0)" class="second-tooltip"
                                                        data-toggle="tooltip" data-placement="right"
                                                        title="{{ $info->modification }}">
                                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="modifications"
                                    class="row @if (!is_null($quote)) @if ($quote->is_modifications == '0') hidden @endif
@else
hidden @endif">
                                    <div class="col-md-12">
                                        <div class="text-area-group  form-group-margin form-group">
                                            <textarea class="form-control" style="height: 80px" rows="4" name="modification_description"
                                                placeholder="Describe any modification to the vehicle that affect height, ground clearance, dimensions, or weight (100 lbs. or more).  Lifted or lowered, raised roof, ladders/racks/toolboxes, campers, roll bars, reinforcements, added external accessories, etc. "
                                                @if (!is_null($quote)) value="{{ $quote->modification_description }}" @endif
                                                id="modification-description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-area-group form-group-margin form-group">
                                            <label for="happy">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                rows="3" placeholder="First Name"
                                                @if (!is_null($quote)) value="{{ $quote->first_name }}" @else value="{{ auth('account')->user()->first_name }}" @endif
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-area-group form-group-margin form-group">
                                            <label for="happy">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                rows="3" placeholder="Last Name"
                                                @if (!is_null($quote)) value="{{ $quote->last_name }}" @else value="{{ auth('account')->user()->last_name }}" @endif
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-area-group form-group-margin form-group">
                                            <label for="happy">Email Address</label>
                                            <input type="email" name="email_address" id="email_address"
                                                @if (!is_null($quote)) value="{{ $quote->email_address }}" @else value="{{ auth('account')->user()->email }}" @endif
                                                class="form-control" rows="3" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-area-group form-group-margin form-group">
                                            <label for="happy">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number"
                                                @if (!is_null($quote)) value="{{ $quote->phone_number }}" @else value="{{ auth('account')->user()->mobile_number }}" @endif
                                                class="form-control phone_us" rows="3" placeholder="Phone Number"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="buttonnextform" id="quote-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="thankyouModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p>Thank you for the opportunity to earn your business. One of our representatives will send your quote
                        to
                        (YOUR_EMAIL) soon. Please add us to your list of contacts so your quote is not misdirected
                        to a spam
                        or junk folder.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="confirm_thank_you"
                        data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#cart-header").click(function() {
                $(".cart-head-detail").slideToggle();
                $(".cart-head-detail1").hide();
            });
            $("#cart-header1").click(function() {
                $(".cart-head-detail1").slideToggle();
                $(".cart-head-detail").hide();
            });
            var userBindQuoteValidator = $("#user_bind_quote").validate({
                onfocusout: function(element) {$(element).valid()},
                rules: {
                    quote_number: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.personal.bind-quote') }}",
                        data: $("#user_bind_quote").serialize(),
                        success: function(msg) {
                            window.location.href =
                                "{{ route('account.personal.agreement') }}";
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let responseText = $.parseJSON(data.responseText);
                                let message = {};
                                $.each(responseText.errors, function(key, value) {
                                    message[key] = value[0]
                                });
                                userBindQuoteValidator.showErrors(message);
                            }
                        }
                    });
                    return false;
                }
            });

        });
    </script>
    <script>
        $(document).on('click', '.condition_radio', function() {
            var condition_val = $('.condition_radio:checked').val();
            if (condition_val == 'Used') {
                $('.run-drive-div').removeClass('hidden');
                $('.rolls-steer-brake-div').addClass('hidden');
            } else {
                $('#run-drive-yes').click();
                $('#run-drive-yes').prop('checked', true);
                $('.run-drive-div').addClass('hidden');
                $('.rolls-steer-brake-div').addClass('hidden');
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            }
        });
        $(document).on('click', '.run_drive_radio', function() {
            var run_drive_val = $('.run_drive_radio:checked').val();
            if (run_drive_val == 'No') {
                $('#roll-steer-brake-yes').click();
                $('#roll-steer-brake-yes').prop('checked', true);
                $('.rolls-steer-brake-div').removeClass('hidden');
            } else {
                $('#roll-steer-brake-yes').click();
                $('#roll-steer-brake-yes').prop('checked', true);
                $('.rolls-steer-brake-div').addClass('hidden');
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            }
        });
        $(document).on('click', '.roll_steer_radio', function() {
            var roll_steer_val = $('.roll_steer_radio:checked').val();
            if (roll_steer_val == 'No') {
                $('.rolls-steer-brake-no').removeClass('hidden');
                $('.rolls-steer-brake-yes').addClass('hidden');
            } else {
                $('.rolls-steer-brake-no').addClass('hidden');
                $('.rolls-steer-brake-yes').removeClass('hidden');
            }
        });
        $(document).on('click', '.modification_radio', function() {
            var modification_val = $('.modification_radio:checked').val();
            if (modification_val == 'Yes') {
                $('.modification-textarea').removeClass('hidden');
            } else {
                $('.modification-textarea').addClass('hidden');
                $('#modification-description').val('');
            }
        });
        $('input[name="is_modifications"]').on('click', function() {
            var query = $(this).val();
            if (query == 1) {
                var a = document.getElementById('modification-description');
                a.setAttribute("required", "");
                $('#modifications').removeClass('hidden');
            } else {
                $('#modification-description').removeAttr('required');
                $('#modifications').addClass('hidden');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#next-without-quote-id').click(function() {
                newQuoteValidator();
            });
            $('#confirm_thank_you').click(function() {
                window.location.href = "{{ route('account.personal.agreement') }}";
            })
            $('#quote-submit').click(function(e) {
                e.preventDefault();
                var b = $('#quote-form-extra').validate({
                    onfocusout: function(element) {$(element).valid()},
                    errorClass: "my-error-class",
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        email_address: {
                            required: true,
                        },
                        phone_number: {
                            required: true,
                        },
                        modification_description: {
                            required: true,
                        }
                    },
                }).form();

                if ($('#quote-form-extra').valid()) {
                    $.ajax({
                            method: "POST",
                            url: "{{ route('get.a.quote.post') }}",
                            data: {
                                quote_id: "{{ isset($quote) ? $quote->id : null }}",
                                picking_zip: $('input[name=picking_zip]').val(),
                                delivery_zip: $('input[name=delivery_zip]').val(),
                                preferred_pick_up_date: $('input[name=preferred_pick_up_date]').val(),
                                year: $('input[name=year]').val(),
                                make: $('input[name=make]').val(),
                                model: $('input[name=model]').val(),
                                condition: $('input[name=condition]:checked').val(),
                                run_drives: $('input[name=run_drives]:checked').val(),
                                rolls_steers_brakes: $('input[name=rolls_steers_brakes]:checked').val(),
                                transport_type: $('input[name=transport_type]:checked').val(),
                                transport_speed: $('input[name=transport_speed]:checked').val(),
                                is_modifications: $('input[name=is_modifications]:checked').val(),
                                modification_description: $('textarea[name=modification_description]')
                                    .val(),
                                first_name: $('input[name=first_name]').val(),
                                last_name: $('input[name=last_name]').val(),
                                email_address: $('input[name=email_address]').val(),
                                phone_number: $('input[name=phone_number]').val(),
                                bind_account: true
                            }
                        })
                        .done(function(msg) {
                            var m = $('#thankyouModal').find('p').text()
                            var mail = document.getElementById('email_address').value;
                            var mm = m.replace('YOUR_EMAIL', mail);
                            $('#thankyouModal').find('p').text(mm);
                            $('#myModal1').modal('hide');
                            $('#thankyouModal').modal('show');
                        })
                        .fail(function(err) {
                            alert(err);
                        });
                } else {
                    return false;
                }
            });
        });

        var quoteFormValidation = $('#quote-form').validate({
            onfocusout: function(element) {$(element).valid()},
            errorClass: "my-error-class",
            rules: {
                picking_zip: {
                    required: true,
                    zip_code: true
                },
                delivery_zip: {
                    required: true,
                    zip_code: true
                },
                preferred_pick_up_date: {
                    required: true,
                },
                year: {
                    required: true,
                },
                make: {
                    required: true,
                },
                model: {
                    required: true,
                },
            },
        });

        function newQuoteValidator() {
            if (quoteFormValidation.form()) {
                $('#myModal1').modal('show');
            }
        }
    </script>
@endsection
