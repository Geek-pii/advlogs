<div class="modal fade in" id="modal-un-approve-account" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-col-red">
        <form action="" method="post">
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Un Approve Account?</h4>
          </div>
          <div class="modal-body">
            <p id="un-approve-account-name"></p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-link waves-effect">{!! trans("button.un_approve") !!}</button>
            <button type="button" class="btn btn-link waves-effect"
                    data-dismiss="modal">{!! trans("button.close") !!}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
      jQuery(function ($) {
          $("body").on("click", ".un-approve-record", function (event) {
              event.stopPropagation();
              event.preventDefault();
              var _this = $(this);
              var action = _this.data("url");
              if (!action) {
                  $("#modal-un-approve-account").modal("hide");
                  return false;
              }
              var title = _this.data("title");
              $("#modal-un-approve-account").find("form").attr("action", action);
              $("#un-approve-account-name").html(title);
              $("#modal-un-approve-account").modal("show");
          });
  
          $('#modal-un-approve-account').on('hidden.bs.modal', function (e) {
              $("#un-approve-account-name").html("");
              $("#modal-un-approve-account").find("form").attr("action", "");
          })
      });
  </script>