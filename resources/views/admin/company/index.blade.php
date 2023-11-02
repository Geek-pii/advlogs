@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable" content="{{ route('admin.company.datatable') }}" />
@endsection

@section('style')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2>
                                {!! trans('admin_company.list') !!}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('admin.layouts.parts.message')

                    <div class="table-responsive">
                        <table id="datatable" class="display responsive table table-striped table-bordered"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th width="40">{!! trans('admin_company.table.id') !!}</th>
                                    <th>{!! trans('admin_company.table.company_legal_name') !!}</th>
                                    <th>{!! trans('admin_company.table.company_type') !!}</th>
                                    <th>{!! trans('admin_company.table.company_dba') !!}</th>
                                    <th>{!! trans('admin_company.table.created_at') !!}</th>
                                    <th width="150"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.layouts.parts.modal-delete')
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/company/company.index.js') }}"></script>
@endsection
