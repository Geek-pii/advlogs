@extends("admin.layouts.master")

@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>
            {!! trans("admin_info.edit_success_message") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">

          @include("admin.layouts.parts.message")

          <form id="form-form" method="post"
                action="{{ url('admin/message/update/'.encrypt($msg->id)) }}"
                enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}


            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="font-bold col-blue">{!! trans('admin_info.success_message_title') !!}
                      </div>
                      <div class="form-group form-float">
                        <div class="form-line">
                            <input required type="text" name="message" class="form-control" value="{{$msg->message}}">
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
