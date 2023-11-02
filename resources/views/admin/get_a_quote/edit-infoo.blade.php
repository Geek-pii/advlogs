@extends("admin.layouts.master")

@section("content")
<div class="container">
    <form action="{{ url('admin/info/update/'.encrypt($info->id)) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control" value="{{ $info->name }}">
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-2">
                <input type="submit" class="btn btn-info" style="margin-top: 25px">
            </div>
        </div>
    </form>
</div>
@endsection