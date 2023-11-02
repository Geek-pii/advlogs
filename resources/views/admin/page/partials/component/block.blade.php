<div class="module-item @if(empty($default_block)) disabled-sortable @endif" data-el_position="{{ $name }}[position]">

  <input type="hidden" id="changeId-{{ Str::slug($name, '') }}" name="{{ $name }}[is_change]" value="0">

  <button type="button" class="btn bg-red btn-delete btn_delete_this" data-parent=".module-item"
          @if(!empty($default_block)) data-name="delete_blocks[]" data-value="{{ $default_block->id }}" @endif>
    <i class="glyphicon glyphicon-remove"></i>
  </button>

  <button class="btn btn-info @if(!empty($default_block)) collapsed @endif" type="button" data-toggle="collapse"
          data-change="#changeId-{{ Str::slug($name, '') }}"
          data-target="#yeuhoashin{{ Str::slug($name, '') }}" aria-expanded="true"
          aria-controls="yeuhoashin{{ Str::slug($name, '') }}">
    <i class="glyphicon glyphicon-menu-down"></i>
  </button>

  @if(!empty($default_block))
    <h4>#<span class="position">{{$default_block->position}}</span> -
      {!!  $default_block->name ? $default_block->name : $default_block->code !!}
      <small>{!! $default_block->type_names !!}</small>
    </h4>
  @endif

  <div class="collapse @if(empty($default_block)) in @endif" id="yeuhoashin{{ Str::slug($name, '') }}">
    <div class="row">

      <div class="col-md-4">
        <div class="form-group">
          <div class="font-bold col-blue">{{ trans('admin_page_block.form.code') }}</div>
          <div class="form-line">
            <input type="text" class="form-control" name="{{ $name }}[code]"
                   value="{{ !empty($default_block) ? $default_block->code : '' }}" required>
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group @if(!empty($default_block)) hidden @endif">
          <div class="font-bold col-blue">{{ trans('admin_page_block.form.position') }}</div>
          <div class="form-line">
            <input type="number" class="form-control" name="{{ $name }}[position]" required min="0"
                   value="{{ !empty($default_block) ? $default_block->position : '0' }}">
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="form-group">
          <div class="font-bold col-blue">{{ trans('admin_page_block.form.parent') }}</div>
          <div class="form-line">
            <select name="{{ $name }}[parent_id]" class="form-control">
              <option value="0">---</option>
              @if(!empty($parent_blocks))
                @foreach($parent_blocks as $value)
                  @continue(!empty($default_block) && $default_block->id === $value->id)
                  <option value="{{ $value->id }}" {{ (!empty($default_block) && $value->id == $default_block->parent_id) ? 'selected' : '' }}>{{ $value->name }}
                    ({{ $value->code }})
                  </option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
      </div>
    </div>

    @if(in_array('TYPE_ICON', $types) || in_array('TYPE_PHOTO', $types) || in_array('TYPE_PHOTO_MOBILE', $types))
      <div class="row">
        @if(in_array('TYPE_ICON', $types))
          <div class="col-md-4">
            <h4 class="m-t-0">{{ trans('admin_page_block.form.icon') }}</h4>
            <div class="form-group">
              @component('admin.layouts.components.upload_photo', [
                  'image' => !empty($default_block) ? $default_block->icon : null,
                  'name' => $name.'[icon]',
              ])
              @endcomponent
            </div>
          </div>
          {{-- <div class="col-md-8">
            @component('admin.translation.nav_tab', [
                'object_trans' => !empty($default_block) ? $default_block : null,
                'default_tab' => $composer_locale,
                'tab_id' => Str::slug($name),
                'is_ajax_request' => !empty($default_block) ? false : true,
                'form_fields' => [
                    ['type' => 'text', 'name' => 'alt_icon', 'default_name' => $name.'[LOCALE][alt_icon]']
                ],
                'form_plugins' => [],
                'translation_file' => 'admin_page_block'
            ])
            @endcomponent
          </div> --}}
        @endif
      </div>
      <div class="row">
        @if(in_array('TYPE_PHOTO', $types))
          <div class="col-md-4">
            <h4 class="m-t-0">{{ trans('admin_page_block.form.photo') }}</h4>
            <div class="form-group">
              @component('admin.layouts.components.upload_photo', [
                 'image' => !empty($default_block) ? $default_block->photo : null,
                 'name' => $name.'[photo]',
             ])
              @endcomponent
            </div>
          </div>
          {{-- <div class="col-md-8">
            @component('admin.translation.nav_tab', [
                'object_trans' => !empty($default_block) ? $default_block : null,
                'default_tab' => $composer_locale,
                'tab_id' => Str::slug($name),
                'is_ajax_request' => !empty($default_block) ? false : true,
                'form_fields' => [
                    ['type' => 'text', 'name' => 'alt_photo', 'default_name' => $name.'[LOCALE][alt_photo]']
                ],
                'form_plugins' => [],
                'translation_file' => 'admin_page_block'
            ])
            @endcomponent
          </div> --}}
        @endif
      </div>
      <div class="row">
        @if(in_array('TYPE_PHOTO_MOBILE', $types))
          <div class="col-md-4">
            <h4 class="m-t-0">{{ trans('admin_page_block.form.photo_mobile') }}</h4>
            <div class="form-group">
              @component('admin.layouts.components.upload_photo', [
                 'image' => !empty($default_block) ? $default_block->photo_mobile : null,
                 'name' => $name.'[photo_mobile]',
             ])
              @endcomponent
            </div>
          </div>
          {{-- <div class="col-md-8">
            @component('admin.translation.nav_tab', [
                'object_trans' => !empty($default_block) ? $default_block : null,
                'default_tab' => $composer_locale,
                'tab_id' => Str::slug($name),
                'is_ajax_request' => !empty($default_block) ? false : true,
                'form_fields' => [
                    ['type' => 'text', 'name' => 'alt_photo_mobile', 'default_name' => $name.'[LOCALE][alt_photo_mobile]']
                ],
                'form_plugins' => [],
                'translation_file' => 'admin_page_block'
            ])
            @endcomponent
          </div> --}}
        @endif
      </div>
    @endif

    @if(in_array('TYPE_MULTI_PHOTOS', $types))
      <h4 class="m-t-0">{{ trans('admin_page_block.form.photos') }}</h4>
      <ul id="{{ Str::slug($name, '') }}-photos" class="list-photos">
        @if(!empty($default_block))
          @foreach($default_block->medias as $media)
            <li data-id="{{ $media->id }}">
              <div class="box-image">
                <img src="{{ asset($media->path) }}">
                <button type="button" class="btn_delete_this" data-parent="li" data-multi="1"
                        data-name="{{ $name }}[delete_photos][]" data-value="{{ $media->id }}">
                  <i class="glyphicon glyphicon-remove"></i>
                </button>
              </div>
            </li>
          @endforeach
        @endif
      </ul>
      <div class="text-center p-b-15">
        <button type="button" class="btn btn-primary ckfinder-multi"
                data-append="#{{ Str::slug($name, '') }}-photos"
                data-name="{{ $name.'[photos][]' }}">
          {{ trans('button.add_photos') }}
        </button>
      </div>
    @endif

    @if(in_array('TYPE_URL', $types)
    || in_array('TYPE_NAME', $types)
    || in_array('TYPE_DESCRIPTION', $types)
    || in_array('TYPE_CONTENT', $types)
    || in_array('TYPE_PHOTO_TRANSLATION', $types) )
      @php
        $form_fields = [];
        $form_plugins = [];
        if(in_array('TYPE_PHOTO_TRANSLATION', $types)){
            $form_fields[] = ['type' => 'photo_translation', 'name' => 'photo_translation', 'default_name' => $name.'[LOCALE][photo_translation]'];
        }
        if(in_array('TYPE_URL', $types)){
            $form_fields[] = ['type' => 'text', 'name' => 'url', 'default_name' => $name.'[LOCALE][url]'];
        }
        if(in_array('TYPE_NAME', $types)){
            $form_fields[] = ['type' => 'text', 'name' => 'name', 'default_name' => $name.'[LOCALE][name]'];
        }
        if(in_array('TYPE_DESCRIPTION', $types)){
            $form_fields[] = ['type' => 'textarea', 'name' => 'description', 'default_name' => $name.'[LOCALE][description]'];
        }
        if(in_array('TYPE_CONTENT', $types)){
            $form_fields[] = ['type' => 'ckeditor', 'name' => 'content', 'default_name' => $name.'[LOCALE][content]'];
            $form_plugins[] = 'ckeditor';
        }

      @endphp
      <h4 class="m-t-0">{{ trans('admin_page_block.form.content') }}</h4>
      @component('admin.translation.nav_tab', [
          'object_trans' => !empty($default_block) ? $default_block : null,
          'default_tab' => $composer_locale,
          'tab_id' => Str::slug($name),
          'is_ajax_request' => !empty($default_block) ? false : true,
          'form_fields' => $form_fields,
          'form_plugins' => $form_plugins,
          'translation_file' => 'admin_page_block'
      ])
      @endcomponent
    @endif

    <input type="hidden" name="{{ $name }}[types]" value="{{ json_encode($types) }}">

    @if(!empty($default_block) && $default_block->parent_id == 0 && $default_block->children->count())
      <div class="module-items">
        @foreach($default_block->children as $rs)
          @php $name  = "old_blocks[{$rs->id}]"; @endphp
          @component('admin.page.partials.component.block', [
              'name' => $name,
              'default_block' => $rs,
              'types' => $rs->decode_types,
              'parent_blocks' => $parent_blocks,
          ])
          @endcomponent
        @endforeach
      </div>
    @endif
  </div>

</div>