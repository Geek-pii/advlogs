@extends("admin.layouts.master")

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

        @include("admin.layouts.parts.message")

        @component('admin.layouts.components.form', [
        'form_method' =>  empty($faq_category) ? 'POST' : 'PUT',
        'form_url' => empty($faq_category) ? route("admin.faq.category.store") : route("admin.faq.category.update", $faq_category->id)
        ])
          <!-- Nav tabs -->
            @include('admin.translation.nav_tab', [
                'default_tabs' => [
                    [
                        'id' => 'general',
                        'name' => trans('admin_tab.faq.general'),
                        'path' => 'admin.faq_category.partials.general'
                    ]
                ],
                'object_trans' => $faq_category ?? null,
                'default_tab' => 'general',
                'form_fields' => [
                    ['type' => 'text', 'name' => 'name'],
                    ['type' => 'ckeditor', 'name' => 'description']
                ],
                'form_plugins' => ['ckeditor'],
                'translation_file' => 'admin_faq_category'
            ])

            {{--Buttons--}}
            @include("admin.layouts.partials.form_buttons", [
                "cancel" => route("admin.faq.category.index")
            ])
          @endcomponent

        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")
  <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

  @if($composer_locale !== 'en')
    <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
            type="text/javascript"></script>
  @endif

  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/faq_category.create.js') }}"></script>
@endsection