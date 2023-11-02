@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable" content="{{ route('admin.account.datatable') }}" />
@endsection

@section('style')
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        {!! trans('admin_account.list') !!}
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">

                    @include('admin.layouts.parts.message')

                    <div class="display responsive nowrap">
                        <table id="datatable" class="responsive table table-bordered table-striped table-hover dataTable"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th width="40">{!! trans('admin_account.table.id') !!}</th>
                                    <th>{!! trans('admin_account.table.type') !!}</th>
                                    <th>{!! trans('admin_account.table.company') !!}</th>
                                    <th>{!! trans('admin_account.table.role') !!}</th>
                                    <th>{!! trans('admin_account.table.mobile_number') !!}</th>
                                    <th>{!! trans('admin_account.table.email') !!}</th>
                                    <th>{!! trans('admin_account.table.full_name') !!}</th>
                                    <th>{!! trans('admin_account.table.job_title') !!}</th>
                                    <th>{!! trans('admin_account.table.primary_contact_number') !!}</th>
                                    <th>{!! trans('admin_account.table.business_phone_number') !!}</th>
                                    <th>{!! trans('admin_account.table.active') !!}</th>
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
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/account/account.index.js') }}"></script>
@endsection
