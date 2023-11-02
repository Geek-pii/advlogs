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
                        'activeTab' => 'payment',
                        'companyId' => $companyId,
                    ])
                </div>
                <div class="card-body p-3">
                    @include('admin.company.payment.show', ['taxPayer' => $taxPayer])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>           
    </script>
@endsection
