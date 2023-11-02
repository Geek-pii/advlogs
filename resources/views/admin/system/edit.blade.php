@extends("admin.layouts.master")

@section('style')
  <style>
    .ck-editor__editable[role="textbox"] {
      /* editing area */
      min-height: 200px;
    }
  </style>
  @endsection

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>
            {!! trans("admin_system.list") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">

          @include("admin.layouts.parts.message")

          <form id="form-form" method="post"
                action="{!! route("admin.system.update", '0110') !!}"
                enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-6">
                <div class="font-bold col-blue">Logo</div>
                <div class="form-group">
                  @component('admin.layouts.components.upload_photo', [
                      'image' => $system['website_logo']['content'] ?? null,
                      'name' => 'website_logo',
                  ])
                  @endcomponent
                </div>
              </div>
              <div class="col-md-6">
                <div class="font-bold col-blue">Maintenance Mode</div>
                <div class="form-group">
                  <input type="checkbox" name="maintenance_mode" value="1" id="maintenance_mode"
                         @if(isset($system['maintenance_mode']['content']) && $system['maintenance_mode']['content']) checked @endif>
                  <label for="maintenance_mode">{!! trans("admin_system.form.active") !!}</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="font-bold col-blue">{!! trans('admin_system.form.email') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="email" name="email" class="form-control"
                           value="{{ $system['email']['content'] ?? null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="font-bold col-blue">{!! trans('admin_system.form.phone') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="phone" class="form-control"
                           value="{{ !empty($system['phone']) ?  $system['phone']['content'] : null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="font-bold col-blue">{!! trans('admin_system.form.address') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="address" class="form-control"
                           value="{{ !empty($system['address']) ?  $system['address']['content'] : null }}">
                  </div>
                </div>
              </div>
            </div>

            <h4>{{ trans('admin_system.social') }}</h4>

            <div class="row">
              <div class="col-md-4" style="display: none">
                <div class="font-bold col-blue">{!! trans('admin_system.form.facebook') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="facebook" class="form-control"
                           value="{{ !empty($system['facebook']) ?  $system['facebook']['content'] : null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="font-bold col-blue">{!! trans('admin_system.form.youtube') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="youtube" class="form-control"
                           value="{{ $system['youtube']['content'] ?? null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="font-bold col-blue">{!! trans('admin_system.form.google') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="google" class="form-control"
                           value="{{ $system['google']['content'] ?? null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="font-bold col-blue">{!! trans('admin_system.form.twitter') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="twitter" class="form-control"
                           value="{{ $system['twitter']['content'] ?? null }}">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="font-bold col-blue">{!! trans('admin_system.form.linkedin') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="linkedin" class="form-control"
                           value="{{  $system['linkedin']['content'] ?? null }}">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="font-bold col-blue">{!! trans('admin_system.form.instagram') !!}</div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" name="instagram" class="form-control"
                           value="{{ $system['instagram']['content'] ?? null }}">
                  </div>
                </div>
              </div>
            </div>
            <h4>Email Template</h4>
            <div class="raw">
              <div class="col-md-12">
                <div class="font-bold col-blue">Certificate of Insurance</div>
                <textarea id="editor" name="email_certificate_of_insurance">{{ $system['email_certificate_of_insurance']['content'] ?? '' }}</textarea>
              </div>

              <div class="col-md-12">
                <div class="font-bold col-blue">Signature request invitation</div>
                <textarea id="signature_invitation_email" name="email_signature_request_invitation">{{ $system['email_signature_request_invitation']['content'] ?? '' }}</textarea>
              </div>
            </div>

            <h4>{{ trans('admin_system.website_info') }}</h4>

            <div class="row">
              @foreach($composer_locales as $key => $value)
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_system.form.website_title') !!}
                        ({{ $value['native'] }})
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" name="website_title[{{ $key }}]" class="form-control"
                                 value="{{ $system['website_title']['content'][$key] ?? '' }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              @foreach($composer_locales as $key => $value)
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_system.form.website_description') !!}
                        ({{ $value['native'] }})
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" name="website_description[{{ $key }}]" class="form-control"
                                 value="{{ $system['website_description']['content'][$key] ?? '' }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              @foreach($composer_locales as $key => $value)
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_system.form.website_keywords') !!}
                        ({{ $value['native'] }})
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                          <input type="text" name="website_keywords[{{ $key }}]" class="form-control"
                                 value="{{ $system['website_keywords']['content'][$key] ?? '' }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <h4>Contract Template</h4>
            <div class="raw">
              <div class="col-md-12">
                <div class="font-bold col-blue">Carrier Broker Agreement</div>
                <textarea id="carrier_broker_agreement" name="carrier_broker_agreement">{{ $system['carrier_broker_agreement']['content'] ?? '' }}</textarea>
              </div>
            </div>

            {{--Buttons--}}
            @include("admin.layouts.partials.form_buttons", [
                "cancel" => ''
            ])
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section("script")
  <script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
              console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#signature_invitation_email' ) )
            .catch( error => {
              console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#carrier_broker_agreement' ) )
            .catch( error => {
              console.error( error );
            } );
  </script>
@endsection
