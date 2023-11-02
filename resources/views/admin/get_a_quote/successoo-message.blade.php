@extends("admin.layouts.master")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered bg-white p-5" style="color:black">
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Action</th>
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
@endsection