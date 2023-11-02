<form action="{{ route('laravelroles::permissions-deleted-restore-all') }}" method="POST" accept-charset="utf-8"
      class="mb-0">
  {{ csrf_field() }}
  {{ method_field('POST') }}
  <button class="dropdown-item text-success pointer" type="button" style="width: 100%;" data-toggle="modal"
          data-target="#confirmRestorePermissions"
          data-title="{{ trans('laravelroles::laravelroles.modals.restoreAllPermissionsTitle') }}"
          data-message="{{ trans('laravelroles::laravelroles.modals.restoreAllPermissionsMessage') }}">
    <i class="fa fa-fw fa-refresh" aria-hidden="true"></i>
    {!! trans('laravelroles::laravelroles.buttons.restore-all-permissions') !!}
  </button>
</form>
