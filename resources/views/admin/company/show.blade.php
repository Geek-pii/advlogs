@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    @include('admin.company.tabs', ['activeTab' => 'basic_info'])
                </div>
                <div class="card-body">
                    <div class="d-inline-block table-responsive w-50">
                        @include('admin.company.partials.basic_info')
                    </div>
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
