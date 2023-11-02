<div id="confirm-dialog" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email to Insurance Provider</h5>
                <button type="button" class="close pt-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="d-flex pl-3 pr-3 justify-content-between mb-2 mt-2">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-info" id="dialog-submit" >Send</button>
            </div>
            <div class="modal-body">
                <div class="form-field-no-editable">
                    <ul id="email_to">
                        <li>
                            <div class="form-listing"><strong>To: </strong><span id="mail_to"></span></div>
                        </li>
                        <li>
                            <div class="form-listing"> <strong>Subject:</strong>Urgent COI request: Order Hold (30 min) for COI naming Advantage Logistics LLC</div>
                        </li>
                    </ul>
                    <div class="text-area-group">
                        {!!$emailTemplate !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
