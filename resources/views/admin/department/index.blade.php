@extends("admin.layouts.master")

@section("meta")
  <meta name="linkDatatable" content="{{ route('admin.department.datatable') }}"/>
@endsection

@section("style")
@endsection

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{!! route("admin.department.create") !!}" class="btn btn-info waves-effect pull-right">
            <span>{!! trans("button.create") !!}</span>
          </a>
          <h2>
            {!! trans("admin_department.list") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">

          @include("admin.layouts.parts.message")

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
              <thead>
              <tr>
                <th width="40">{!! trans("admin_department.table.id") !!}</th>
                <th>{!! trans("admin_department.table.name") !!}</th>
                <th>{!! trans("admin_department.table.email") !!}</th>
                <th>{!! trans("admin_department.table.position") !!}</th>
                <th>{!! trans("admin_department.table.active") !!}</th>
                <th>{!! trans("admin_department.table.created_at") !!}</th>
                <th width="150">{!! trans("admin_department.table.action") !!}</th>
              </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")
  @include("admin.layouts.parts.modal-delete")
  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/department.index.js') }}"></script>
@endsection
