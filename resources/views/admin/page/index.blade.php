@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable" content="{{ route('admin.page.datatable') }}" />
@endsection

@section('style')
    <style type="text/css">
        .toolbar {
            float: left;
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}" />
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h2>
                                {!! trans('admin_page.list') !!}
                            </h2>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{!! route('admin.page.create') !!}" class="btn btn-info waves-effect pull-right">
                                <span>{!! trans('button.create') !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('admin.layouts.parts.message')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped table-hover dataTable w-100">
                            <thead>
                                <tr>
                                    <th width="40">
                                        <input type="checkbox" name="check_all" value="1" id="check_all">
                                        <label for="check_all"></label>
                                    </th>
                                    <th>{!! trans('admin_page.table.title') !!}</th>
                                    <th>{!! trans('admin_page.table.theme') !!}</th>
                                    <th>{!! trans('admin_page.table.parent') !!}</th>
                                    <th>{!! trans('admin_page.table.active') !!}</th>
                                    <th>{!! trans('admin_page.table.created_at') !!}</th>
                                    <th>{!! trans('admin_page.table.updated_at') !!}</th>
                                    <th width="150">{!! trans('admin_page.table.action') !!}</th>
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

    <script>
        const POST_DELETE_MULTI = '{{ route('admin.page.multi.delete') }}';
    </script>
    <script src="{{ asset('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/page/page.index.js') }}"></script>
@endsection
