@extends("admin.layouts.master")

@section("meta")
@endsection

@section("style")
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}"/>

  <style type="text/css">
    .theme-link-ajax {
      display: none;
    }
  </style>
@endsection

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="body">

        @include('admin.layouts.parts.message')

        @component('admin.layouts.components.form', [
            'form_method' =>  empty($menu_item) ? 'POST' : 'PUT',
            'form_url' => empty($menu_item) ? route("admin.menu.item.store") : route("admin.menu.item.update", $menu_item->id)
        ])
          <!-- Nav tabs -->
            @include('admin.translation.nav_tab', [
                'default_tabs' => [
                    [
                        'id' => 'general',
                        'name' => trans('admin_tab.general'),
                        'path' => 'admin.menu_item.partials.general'
                    ]
                ],
                'object_trans' => $menu_item ?? null,
                'default_tab' => 'general',
                'form_fields' => [
                    ['type' => 'text', 'name' => 'title'],
                    ['type' => 'text', 'name' => 'url']
                ],

                'translation_file' => 'admin_menu_item'
            ])

            {{--Buttons--}}
            @include("admin.layouts.partials.form_buttons", [
                "cancel" => route("admin.menu.item.index")
            ])
          @endcomponent
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")

  <script type="text/javascript">
      const URL_GET_THEME = '{{ route("get.theme") }}';
  </script>

  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

  @if($composer_locale !== 'en')
    <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
            type="text/javascript"></script>
  @endif

  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/menu_item.create.js') }}"></script>
@endsection