@extends("admin.layouts.master")

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>
            {!! trans("admin_info.edit_info") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="body">

          @include("admin.layouts.parts.message")

          <form id="form-form" method="post"
                action="{{ url('admin/info/update/'.encrypt($info->id)) }}"
                enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}


            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.condition') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="name" class="form-control" value="{{ $info->name }}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.run') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="run" class="form-control" value="{{ $info->run }}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.type') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="type" class="form-control" value="{{ $info->type }}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.speed') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="speed" class="form-control" value="{{ $info->speed }}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.rolls') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="rolls" class="form-control" value="{{ $info->rolls }}">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.modification') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="modification" class="form-control" value="{{ $info->modification }}">
                        </div>
                      </div>
                    </div>
                  </div>
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
