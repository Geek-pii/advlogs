@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable" content="{{ route('admin.faq.category.datatable') }}" />
@endsection



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2>
                                {!! trans('admin_faq_category.list') !!}
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{!! route('admin.faq.category.create') !!}" class="btn btn-info waves-effect pull-right">
                                <span>{!! trans('button.create') !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('admin.layouts.parts.message')

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th width="40">{!! trans('admin_faq_category.table.id') !!}</th>
                                    <th>{!! trans('admin_faq_category.table.name') !!}</th>
                                    <th>{!! trans('admin_faq_category.table.parent') !!}</th>
                                    <th>{!! trans('admin_faq_category.table.position') !!}</th>
                                    <th>{!! trans('admin_faq_category.table.active') !!}</th>
                                    <th width="150">{!! trans('admin_faq_category.table.action') !!}</th>
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

    <script src="{{ asset('assets/plugins/DataTables/DataTables-1.13.1/js/jquery.dataTables.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/DataTables/DataTables-1.13.1/js/dataTables.bootstrap4.min.js') }}"
        type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/faq_category.index.js') }}"></script>
@endsection
