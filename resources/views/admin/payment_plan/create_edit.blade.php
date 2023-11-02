@extends("admin.layouts.master")

@section("content")
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    @include("admin.layouts.parts.message")

                    @component('admin.layouts.components.form', [
                        'form_method' => empty($plan) ? 'POST' : 'PUT',
                        'form_url' => empty($plan) ? route("admin.payment.plan.store") : route("admin.payment.plan.update", $plan->id)
                    ])
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.use_factory") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select id="use_factory" name="use_factory" class="form-control" required>
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.pay_to") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pay_to"
                                               value="{{ $plan->pay_to ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.days_paid") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="days_paid"
                                               value="{{ $plan->days_paid ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.day_type") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <select id="day_type" name="day_type" class="form-control" required>
                                        <option value="Business">Business</option>
                                        <option value="Calender">Calender</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.fee") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="fee"
                                               value="{{ (isset($plan) && $plan->fee) ? substr($plan->fee,0,strlen($plan->fee) - 1) : 0 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.offer_start") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="offer_start"
                                               value="{{ $plan->offer_start ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans("admin_payment_plan.form.offer_expiration") !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="offer_expiration"
                                               value="{{ $plan->offer_expiration ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--Buttons--}}
                        @include("admin.layouts.partials.form_buttons", [
                                "cancel" => route("admin.payment.plan.index")
                        ])
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

    @if($composer_locale !== 'en')
        <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
                type="text/javascript"></script>
    @endif

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/payment_plan/payment_plan.create.js') }}"></script>
@endsection
