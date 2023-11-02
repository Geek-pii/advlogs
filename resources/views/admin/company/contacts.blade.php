<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Company Contacts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped table-hover dataTable"
                style="width: 100%">
                <thead>
                    <tr>
                        <th width="40">{!! trans('admin_company.table.id') !!}</th>
                        <th>{!! trans('admin_company.table.role') !!}</th>
                        <th>{!! trans('admin_company.table.first_name') !!}</th>
                        <th>{!! trans('admin_company.table.last_name') !!}</th>
                        <th>{!! trans('admin_company.table.email') !!}</th>
                        <th>{!! trans('admin_company.table.mobile_number') !!}</th>
                        <th>{!! trans('admin_company.table.job_title') !!}</th>
                        <th>{!! trans('admin_company.table.primary_contact_number') !!}</th>
                        <th>{!! trans('admin_company.table.business_phone_number') !!}</th>
                        <th>{!! trans('admin_company.table.business_phone_ext') !!}</th>
                        <th width="150"></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>