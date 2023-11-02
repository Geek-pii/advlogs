@extends("admin.layouts.master")

@section("meta")
  <meta name="linkDatatable" content="{{ route('admin.role.datatable') }}"/>
@endsection


@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-6">
              <h2>
                {!! trans("admin_role.list") !!}
              </h2>
            </div>
            <div class="col-6 text-right">
              <a href="{!! route("admin.role.create") !!}" class="btn btn-info waves-effect pull-right">
                <span>{!! trans("button.create") !!}</span>
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          @include("admin.layouts.parts.message")

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
              <thead>
              <tr>
                <th width="40">{!! trans("admin_role.table.id") !!}</th>
                <th>{!! trans("admin_role.table.name") !!}</th>
                <th>{!! trans("admin_role.table.level") !!}</th>
                <th width="150">{!! trans("admin_role.table.action") !!}</th>
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

  <!--dataTables plugin-->
  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/role/role.index.js') }}"></script>
@endsection
