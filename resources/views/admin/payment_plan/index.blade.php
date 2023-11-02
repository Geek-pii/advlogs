@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable" content="{{ route('admin.payment.plan.datatable') }}" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                </div>
                <div class="card-body">
                    @include('admin.layouts.parts.message')
                    @include('admin.payment_plan.list')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.layouts.parts.modal-delete')
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/payment_plan/payment_plan.index.js') }}"></script>
@endsection
