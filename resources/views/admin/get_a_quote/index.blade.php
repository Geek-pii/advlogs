@extends("admin.layouts.master")

@section("meta")
  <meta name="linkDatatable" content="{{ route('admin.get.a.quote.datatable') }}"/>
@endsection

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>
            {!! trans("admin_get_a_quote.list") !!}
          </h2>
        </div>
        <div class="card-body">

          @include("admin.layouts.parts.message")

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
              <thead>
              <tr>
                <th width="40">{!! trans("admin_get_a_quote.table.id") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.quote_number") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.picking_zip") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.delivery_zip") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.preferred_pick_up_date") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.year") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.make") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.model") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.condition") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.run_drives") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.rolls_steers_brakes") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.transport_type") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.transport_speed") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.modification_description") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.first_name") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.last_name") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.email_address") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.phone_number") !!}</th>
                <th>{!! trans("admin_get_a_quote.table.created_at") !!}</th>
                <th width="150">{!! trans("admin_get_a_quote.table.action") !!}</th>
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
  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/get_a_quote.index.js') }}"></script>
@endsection
