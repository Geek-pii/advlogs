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

@section('content')
    <div class="business-client-signup-page-wrapper">
        @include('themes.sign_up.personal._step_list')
        <form id="pick-up-information">
            <div class="light-overflow">
                <h1>Pickup Infomation</h1>
                @if ($pickUpInfo)
                    <input type="hidden" name="id" value="{{ $pickUpInfo->id }}">
                @endif
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pick-up Location Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="location_type">
                                    <option>---</option>
                                    @foreach (config('collection.location_type') as $key => $value)
                                        <option value="{{ $key }}" @if($pickUpInfo && ($pickUpInfo->location_type == $key)) selected="selected"  @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Earliest date available for pickup <span class="text-danger">*</span></label>
                            <input type="date" name="pick_up_date" class="form-control"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->pick_up_date }}" @endif
                                placeholder="Earliest date available for pickup">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Pickup restrictions or notes</label>
                            <input type="text" name="notes" class="form-control"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->notes }}" @endif
                                placeholder="Pickup restrictions or notes">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Pickup Company Name (if applicable) </label>
                            <input type="text" name="company_name" id="year2" class="form-control"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->company_name }}" @endif
                                placeholder="Pickup Company Name (if applicable)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Street Address <span class="text-danger">*</span></label>
                            <input type="text" name="street_address" class="form-control street_address"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->street_address }}" @endif
                                placeholder="Street Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> City <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control city"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->city }}" @endif placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> State <span class="text-danger">*</span></label>
                            <input type="text" name="state" class="form-control state"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->state }}" @endif
                                placeholder="State">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Zip <span class="text-danger">*</span></label>
                            <input type="text" name="zip" class="form-control zip_code"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->zip }}" @endif placeholder="Zip">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pickup Contact Person <span class="text-danger">*</span></label>
                            <input type="text" name="contact_name" class="form-control"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->contact_name }}" @endif
                                placeholder="Pickup Contact Person">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pickup Contact Phone # <span class="text-danger">*</span></label>
                            <input type="text" name="contact_phone" class="form-control phone_us"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->contact_phone }}" @endif
                                placeholder="Pickup Contact Phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pickup Contact Mobile/Alternate #</label>
                            <input type="text" name="contact_phone_1" class="form-control phone_us"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->contact_phone_1 }}" @endif
                                placeholder="Pickup Contact Mobile/Alternate">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pickup Contact Email Address <span class="text-danger">*</span></label>
                            <input type="text" name="contact_email" class="form-control"
                                @if ($pickUpInfo) value="{{ $pickUpInfo->contact_email }}" @endif
                                placeholder="Pickup Contact Email Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px">
                    <div class="form-group-button">
                        <a style="float: left" href="{{ route('account.personal.agreement', ['pass_step' => true]) }}"><input type="button"
                            value=Previous class="next-button disabled-anchor"></a>
                        <input style="float: right" type="submit" value="Next" id="next"
                            class="next-button disabled-anchor">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    @php
        $url = $pickUpInfo ? route('user.pick-up-information.update', $pickUpInfo->id) : route('user.pick-up-information.store');
        $method = $pickUpInfo ? 'PUT' : 'POST';
    @endphp

    <script>
        $(document).ready(function() {
            var validatorMessage = $("#pick-up-information").validate({
                onfocusout: function(element) {$(element).valid()},
                ignore: [':not(checkbox:hidden)'],
                errorPlacement: function(error, element) {
                    element.parent('div').append(error);
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "{{ $method }}",
                        url: "{{ $url }}",
                        data: $("#pick-up-information").serialize(),
                        success: function(msg) {
                            window.location.href =
                                "{{ route('account.delivery.information') }}"
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
