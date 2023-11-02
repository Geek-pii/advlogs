<div class="ckfinder-upload">
  <div class="out-image {{ $image ? '' : 'hidden' }}">
    <img src="{!! $image ? asset($image) : null !!}">
    <input type="hidden" value="{!! $image ?? null !!}" name="{{ $name ?? null }}">
    <div class="info-file">
      <span>{!! $image ?? '' !!}</span>
      <span class="copy-image-image"
            style="float:right;border:1px solid;padding:0 5px;color:#ff0;cursor:pointer">Copy</span>
    </div>
    <button type="button" class="btn btn-danger btn-circle btn-delete">
      <span class="glyphicon glyphicon-remove"></span>
    </button>
  </div>

  <div class="box-upload {{ $image ? 'hidden' : '' }}">
    <label class="label-select">
      <span class="glyphicon glyphicon-picture"></span>
    </label>
    <button type="button" class="btn-ckfinder"></button>
  </div>
</div>