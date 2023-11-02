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
        <form id="delivery-infomation">
            <div class="light-overflow">
                <h1>Delivery Infomation</h1>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Pick-up Location Type <span class="text-danger">*</span></label>
                            <select class="form-control" name="location_type">
                                <option>---</option>
                                @foreach (config('collection.location_type') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Delivery restrictions or notes</label>
                            <input type="text" name="notes" class="form-control"
                                placeholder="Delivery restrictions or notes:">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Delivery Company Name (if applicable) </label>
                            <input type="text" name="company_name" id="year2" class="form-control"
                                placeholder="Delivery Company Name (if applicable)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Street Address <span class="text-danger">*</span></label>
                            <input type="text" name="street_address" class="form-control street_address"
                                placeholder="Street Address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> City <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control city" placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> State <span class="text-danger">*</span></label>
                            <input type="text" name="state" class="form-control state" placeholder="State">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Zip <span class="text-danger">*</span></label>
                            <input type="text" name="zip" class="form-control zip_code" placeholder="Zip">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Delivery Contact Person <span class="text-danger">*</span></label>
                            <input type="text" name="contact_name" class="form-control"
                                placeholder="Delivery Contact Person">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Delivery Contact Phone # <span class="text-danger">*</span></label>
                            <input type="text" name="contact_phone" class="form-control phone_us"
                                placeholder="Delivery Contact Phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Delivery Contact Mobile/Alternate #</label>
                            <input type="text" name="contact_phone_1" class="form-control phone_us"
                                placeholder="Delivery Contact Mobile/Alternate">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Delivery Contact Email Address <span class="text-danger">*</span></label>
                            <input type="text" name="contact_email" class="form-control"
                                placeholder="Delivery Contact Email Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px">
                    <div class="form-group-button">
                        <a style="float: left" href="{{ route('account.pickup.information', ['pass_step' => true]) }}"><input type="button"
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
    <script>
        $(document).ready(function() {
            var validatorMessage = $("#delivery-infomation").validate({
                onfocusout: function(element) {$(element).valid()},
                ignore: [':not(checkbox:hidden)'],
                errorPlacement: function(error, element) {
                    element.parent('div').append(error);
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "{{ route('user.delivery-information.store') }}",
                        data: $("#delivery-infomation").serialize(),
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
