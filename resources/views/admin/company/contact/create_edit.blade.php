@extends('admin.layouts.master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layouts.parts.message')

                    @component('admin.layouts.components.form',
                        [
                            'form_method' => empty($contact) ? 'POST' : 'PUT',
                            'form_url' => empty($contact) ? route('admin.contact.store') : route('admin.contact.update', $contact->id),
                        ])
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.first_name') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $contact->first_name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.last_name') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $contact->last_name ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.email') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $contact->email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.mobile_number') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mobile_number"
                                            value="{{ $contact->mobile_number ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.job_title') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="job_title"
                                            value="{{ $contact->job_title ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.business_phone_number') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="business_phone_number"
                                            value="{{ $contact->business_phone_number ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.business_phone_ext') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="business_phone_ext"
                                            value="{{ $contact->business_phone_ext ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.active') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                            <select id="active" name="active" class="form-control" required>
                                                <option value="1" @if ($contact->active == 1) selected="selected" @endif>Yes</option>
                                                <option value="0" @if ($contact->active == 0) selected="selected" @endif>NO</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.role') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        @php
                                         $selectedRoles = $contact->roles->pluck('id')->toArray();
                                        @endphp
                                        <select class="form-control select2" name="roles[]" multiple="multiple">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if(in_array($role->id, $selectedRoles)) selected="selected" @endif>{{ $role->name }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_account.table.company') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="company" readonly="readonly"
                                            value="{{ $contact->company_id ? $contact->company->company_legal_name : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Buttons --}}
                        @include('admin.layouts.partials.form_buttons', [
                            'cancel' => route('admin.contact.index', ['company_id' => $contact->company->id]),
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

@endsection
