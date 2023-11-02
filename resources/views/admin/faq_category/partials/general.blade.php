<div class="row">
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq_category.form.position") !!}</div>
    <div class="form-group form-float">
      <div class="form-line">
        <input type="number" class="form-control" name="position" value="{{ !empty($faq_category) ? $faq_category->position : '0' }}"
               required min="0">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq_category.form.parent") !!}</div>
    <div class="form-group form-float">
      <div class="form-line">
        <select class="form-control" name="parent_id">
          <option value="">---</option>
          @foreach ($faq_categories as $category)
            <option value="{{ $category->id }}" @if(isset($faq_category) && $faq_category->parent_id == $category->id) selected @endif>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq_category.form.status") !!}</div>
    <div class="form-group">
      <input type="checkbox" name="active" value="1" id="active"
             @if(!empty($faq_category) && $faq_category->active) checked @endif>
      <label for="active">{!! trans("admin_faq_category.form.active") !!}</label>
    </div>
  </div>
</div>
