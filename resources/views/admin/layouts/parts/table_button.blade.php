@if (!empty($btn_view_datatable) || !empty($link_show) || !empty($name_button))
    <a class="btn btn-success btn-detail" {!! !empty($link_show) ? "href='{$link_show}'" : '' !!}>{!! !empty($name_button) ? $name_button : trans('button.view') !!}</a>
@endif

@if (!empty($btn_view_js) || !empty($name_view_js))
    <a class="btn btn-success btn-detail" data-id="{{ $btn_view_js }}">{{ $name_view_js }}</a>
@endif

@if (!empty($link_edit))
    <a class="btn btn-info" href="{!! $link_edit !!}" title="{!! trans('button.edit') !!}">{!! trans('button.edit') !!}</a>
@endif

@if (!empty($link_delete) && !empty($id_delete))
    <a class="btn btn-danger btn-delete-record" data-title="{!! trans('admin_message.alert_delete', ['attr' => $id_delete]) !!}" data-url="{!! $link_delete !!}"
        title="{!! trans('button.delete') !!}">{!! trans('button.delete') !!}</a>
@endif

@if (!empty($link_user_approval) && !empty($id_approval))
    <a class="btn btn-warning approve-record" data-title="{!! trans('admin_message.alert_approve', ['attr' => $id_approval]) !!}" data-url="{!! $link_user_approval !!}"
        title="{!! trans('button.approve') !!}">{!! trans('button.approve') !!}</a>
@endif
@if (!empty($link_user_un_approval) && !empty($id_un_approval))
    <a class="btn btn-warning un-approve-record" data-title="{!! trans('admin_message.alert_un_approve', ['attr' => $id_un_approval]) !!}" data-url="{!! $link_user_un_approval !!}"
        title="{!! trans('button.un_approve') !!}">{!! trans('button.un_approve') !!}</a>
@endif
