@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
  <!--select 2 plugin-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}"/>
@endsection


@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="body">

        @include("admin.layouts.parts.message")

        @component('admin.layouts.components.form', [
            'form_method' =>  empty($user) ? 'POST' : 'PUT',
            'form_url' => empty($user) ? route("admin.user.store") : route("admin.user.update", $user->id)
        ])
          @include("admin.user.partials.tab")

          <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active in" id="information">
                @include("admin.user.partials.information")
              </div>
              {{--
              <div role="tabpanel" class="tab-pane fade " id="permission">
                  @include("admin.user.partials.permission")
              </div>
              --}}

            </div>

            @include("admin.layouts.partials.form_buttons", [
                "cancel" => route("admin.user.index")
            ])
          @endcomponent
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")

  @if($composer_locale !== 'en')
    <script src="{{ asset('assets/plugins/jquery-validation/localization/messages_'. $composer_locale .'.js') }}"
            type="text/javascript"></script>
  @endif

  <script type="text/javascript" src="{{ asset('assets/admin/js/pages/administrator/user.create.js') }}"></script>
@endsection