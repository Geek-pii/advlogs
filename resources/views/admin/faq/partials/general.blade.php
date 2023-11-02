<div class="row">
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq.form.position") !!}</div>
    <div class="form-group form-float">
      <div class="form-line">
        <input type="number" class="form-control" name="position" value="{{ !empty($faq) ? $faq->position : '0' }}"
               required min="0">
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq.form.category") !!}</div>
    <div class="form-group form-float">
      <div class="form-line">
        <select class="form-control" name="category_id" required>
          @foreach ($faq_categories as $category)
            <option value="{{ $category->id }}" @if(isset($faq) && $faq->category_id == $category->id) selected @endif>{{ $category->name }}</option>
            @if($category->children)
              @foreach($category->children as $child)
                <option value="{{ $child->id }}" @if(isset($faq) && $faq->category_id == $child->id) selected @endif>--- {{ $child->name }}</option>
              @endforeach
            @endif
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="font-bold col-blue">{!! trans("admin_faq.form.status") !!}</div>
    <div class="form-group">
      <input type="checkbox" name="active" value="1" id="active"
             @if(!empty($faq) && $faq->active) checked @endif>
      <label for="active">{!! trans("admin_faq.form.active") !!}</label>
    </div>
  </div>
</div>
