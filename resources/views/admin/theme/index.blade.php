@extends("admin.layouts.master")

@section("meta")
  <meta name="linkDatatable" content="{{ route('admin.theme.datatable') }}"/>
@endsection


@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="header">
          <a href="{!! route("admin.theme.create") !!}" class="btn btn-info waves-effect pull-right">
            <span>{!! trans("button.create") !!}</span>
          </a>
          <h2>
            {!! trans("admin_theme.list") !!}
          </h2>
          <div class="clearfix"></div>
        </div>

        <div class="body">

          @include("admin.layouts.parts.message")

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
              <thead>
              <tr>
                <th width="40">{!! trans("admin_theme.table.id") !!}</th>
                <th>{!! trans("admin_theme.table.name") !!}</th>
                <th width="150">{!! trans("admin_theme.table.action") !!}</th>
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
  <script src="{{ asset('assets/admin/js/pages/theme.index.js') }}" type="text/javascript"></script>
@endsection
