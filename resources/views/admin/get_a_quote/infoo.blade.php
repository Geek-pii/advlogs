@extends("admin.layouts.master")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <table class="table table-bordered bg-white p-5" style="color:black">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $info->name }}</td>
                        <td><a href="{{ url('admin/info/edit/'.encrypt($info->id))}}"class="btn btn-info">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection