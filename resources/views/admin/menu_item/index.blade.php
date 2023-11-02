@extends("admin.layouts.master")

@section("meta")
  <meta name="linkSortMenuItem" content="{{ route('admin.menu.item.sort') }}"/>
@endsection

@section("style")
  <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui-sortable/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/menu.item.css') }}">
@endsection


@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="header">
          <a href="{!! route("admin.menu.item.create") !!}" class="btn btn-info waves-effect pull-right">
            <span>{!! trans("button.create") !!}</span>
          </a>
          <h2>
            {!! trans("admin_menu_item.list") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="body" id="menu-item">

          @include("admin.layouts.parts.message")

          {!! $menu_item !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")
  @include("admin.layouts.parts.modal-delete")

  <!-- Start sortable -->
  <script src="{{ asset('assets/plugins/jquery-ui-sortable/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/plugins/jquery-ui-sortable/jquery.ui.touch-punch.min.js') }}"
          type="text/javascript"></script>
  <!-- End sortable -->

  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/menu_item.index.js') }}"></script>
@endsection