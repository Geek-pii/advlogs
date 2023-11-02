@extends('admin.layouts.master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layouts.parts.message')

                    @component('admin.layouts.components.form',
                        [
                            'form_method' => empty($company) ? 'POST' : 'PUT',
                            'form_url' => empty($company) ? route('admin.company.store') : route('admin.company.update', $company->id),
                        ])
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.company_legal_name') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="company_legal_name"
                                            value="{{ $company->company_legal_name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.company_dba') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="company_dba"
                                            value="{{ $company->company_dba ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.street_address') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control street_address" name="street_address"
                                            value="{{ $company->street_address ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.city') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control city" name="city"
                                            value="{{ $company->city ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.state') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control state" name="state"
                                            value="{{ $company->state ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.zip') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control zip_code" name="zip"
                                            value="{{ $company->zip ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.mailing_street_address') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mailing_street_address"
                                            value="{{ $company->mailing_street_address ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.mailing_city') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mailing_city"
                                            value="{{ $company->mailing_city ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.mailing_state') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mailing_state"
                                            value="{{ $company->mailing_state ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.mailing_zip') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mailing_zip"
                                            value="{{ $company->mailing_zip ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.use_factory') !!}</div>
                                <div class="form-group form-float">
                                    <select class="form-control select2 w-100" name="use_factory"
                                        data-placeholder="Select a State">
                                          <option value="Y" @if($company->use_factory == 'Y') selected="selected" @endif>Yes</option>
                                          <option value="N" @if($company->use_factory == 'N') selected="selected" @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_company.table.payment_plan') !!}</div>
                                <div class="form-group @if($company->use_factory == 'Y') d-none @endif" id="not_use_factor">
                                    <select class="form-control w-100" name="not_payment_plan_id" data-placeholder="Select a payment plan">
                                            @foreach ($paymentPlans['not_use_factor'] as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($company->use_factory == 'N' &&  $company->carrierPaymentPlans->first() && $company->carrierPaymentPlans->first()->id == $item->id) selected="selected" @endif>
                                                    Pay me directly in {{ $item->days_paid }}
                                                    {{ strtolower($item->day_type) }}
                                                    days with a {{ $item->fee }} discount
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group @if($company->use_factory == 'N') d-none @endif" id="use_factor">
                                    <select class="form-control w-100" name="use_payment_plan_id" data-placeholder="Select a payment plan">
                                            @foreach ($paymentPlans['use_factor'] as $item)
                                                @if ($item->pay_to == 'Direct')
                                                    <option value="{{ $item->id }}"
                                                        @if ($company->use_factory == 'Y' && $company->carrierPaymentPlans->first() && $company->carrierPaymentPlans->first()->id == $item->id) selected="selected" @endif>
                                                        Skip the factor and pay me directly in {{ $item->days_paid }}
                                                        {{ strtolower($item->day_type) }}
                                                        days with a {{ $item->fee }} discount
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        @if ($company->use_factory == 'Y' && $company->carrierPaymentPlans->first() && $company->carrierPaymentPlans->first()->id == $item->id) selected="selected" @endif>
                                                        Pay my factoring company company in {{ $item->days_paid }}
                                                        {{ strtolower($item->day_type) }}
                                                        days with a {{ $item->fee }}% discount
                                                    </option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Buttons --}}
                        @include('admin.layouts.partials.form_buttons', [
                            'cancel' => route('admin.company.index'),
                        ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>
    @if ($composer_locale !== 'en')
        <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_' . $composer_locale . '.js') }}"
            type="text/javascript"></script>
    @endif
    <script>
        $(document).ready(function() {
            $('select[name="use_factory"]').on('change', function() {
                let val = $(this).val();
                if (val == 'Y') {
                    $('#use_factor').removeClass('d-none');
                    $('#not_use_factor').addClass('d-none');
                } else {
                    $('#not_use_factor').removeClass('d-none');
                    $('#use_factor').addClass('d-none');
                }
            });
        });
    </script>
@endsection
