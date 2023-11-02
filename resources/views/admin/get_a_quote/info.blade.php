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
                <th width="150">{!! trans("admin_info.condition") !!}</th>
                <th width="150">{!! trans("admin_info.run") !!}</th>
                <th width="150">{!! trans("admin_info.type") !!}</th>
                <th width="150">{!! trans("admin_info.speed") !!}</th>
                <th width="150">{!! trans("admin_info.rolls") !!}</th>
                <th width="150">{!! trans("admin_info.modification") !!}</th>
                <th width="40">{!! trans("admin_info.action") !!}</th>
              </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->run }}</td>
                        <td>{{ $info->type }}</td>
                        <td>{{ $info->speed }}</td>
                        <td>{{ $info->rolls }}</td>
                        <td>{{ $info->modification }}</td>
                        <td><a href="{{ url('admin/info/edit/'.encrypt($info->id))}}"class="btn btn-info">Edit</a></td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
