@extends("admin.layouts.master")

@section("meta")
@endsection

@section("style")
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet"/>
@endsection

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="body">

        @include('admin.layouts.parts.message')

        @component('admin.layouts.components.form', [
            'form_method' =>  empty($menu) ? 'POST' : 'PUT',
            'form_url' => empty($menu) ? route("admin.menu.store") : route("admin.menu.update", $menu->id)
        ])
          <!-- Nav tabs -->
            @include('admin.translation.nav_tab', [
                'default_tabs' => [
                    [
                        'id' => 'general',
                        'name' => trans('admin_tab.general'),
                        'path' => 'admin.menu.partials.general'
                    ]
                ],
                'object_trans' => $menu ?? null,
                'default_tab' => 'general',
                'form_fields' => [
                    ['type' => 'text', 'name' => 'title']
                ],

                'translation_file' => 'admin_menu'
            ])

            {{--Buttons--}}
            @include("admin.layouts.partials.form_buttons", [
                "cancel" => route("admin.menu.index")
            ])
          @endcomponent
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")
  <script type="text/javascript"
          src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

  <!-- Jquery Validation Plugin Css -->
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

  @if($composer_locale !== 'en')
    <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
            type="text/javascript"></script>
  @endif

  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/menu.create.js') }}"></script>
@endsection