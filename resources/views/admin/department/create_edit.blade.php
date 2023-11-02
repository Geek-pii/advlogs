@extends('admin.layouts.master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.layouts.parts.message')

                    @component('admin.layouts.components.form',
                        [
                            'form_method' => empty($department) ? 'POST' : 'PUT',
                            'form_url' => empty($department)
                                ? route('admin.department.store')
                                : route('admin.department.update', $department->id),
                        ])
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_department.form.name') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $department->name ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_department.form.email') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $department->email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_department.form.position') !!}</div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="position"
                                            value="{{ $department->position ?? 0 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-bold col-blue">{!! trans('admin_department.form.status') !!}</div>
                                <div class="form-group">
                                    <input type="checkbox" name="active" value="1" id="active"
                                        @if (!empty($department) && $department->active) checked @endif>
                                    <label for="active">{!! trans('admin_department.form.active') !!}</label>
                                </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        @include('admin.layouts.partials.form_buttons', [
                            'cancel' => route('admin.get.a.quote.index'),
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

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/department.create.js') }}"></script>
@endsection
