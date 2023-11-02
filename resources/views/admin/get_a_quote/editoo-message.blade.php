@extends("admin.layouts.master")

@section("content")
<div class="container">
    <form action="{{ url('admin/message/update/'.encrypt($msg->id)) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Message</label>
                    <input type="text" name="message" class="form-control" value="{{ $msg->message }}">
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-info" style="margin-top: 25px">
            </div>
        </div>
    </form>
</div>
@endsection