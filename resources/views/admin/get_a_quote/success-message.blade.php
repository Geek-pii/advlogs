@extends("admin.layouts.master")


@section("content")
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>
            {!! trans("admin_get_a_quote.list") !!}
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">

          @include("admin.layouts.parts.message")

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
              <thead>
              <tr>
                <th width="150">{!! trans("admin_info.success_message_title") !!}</th>
                <th width="40">{!! trans("admin_info.action") !!}</th>
              </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>{{ $msg->message }}</td>
                        <td><a href="{{ url('admin/message/edit/'.encrypt($msg->id))}}"class="btn btn-info">Edit</a></td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
