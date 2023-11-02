<div class="modal fade in" id="modal-approve-account" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-col-red">
        <form action="" method="post">
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Approve Account</h4>
          </div>
          <div class="modal-body">
            <p id="approve-account-name"></p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-link waves-effect">{!! trans("button.approve") !!}</button>
            <button type="button" class="btn btn-link waves-effect"
                    data-dismiss="modal">{!! trans("button.close") !!}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
      jQuery(function ($) {
          $("body").on("click", ".approve-record", function (event) {
              event.stopPropagation();
              event.preventDefault();
              var _this = $(this);
              var action = _this.data("url");
              if (!action) {
                  $("#modal-approve-account").modal("hide");
                  return false;
              }
              var title = _this.data("title");
              $("#modal-approve-account").find("form").attr("action", action);
              $("#approve-account-name").html(title);
              $("#modal-approve-account").modal("show");
          });
  
          $('#modal-approve-account').on('hidden.bs.modal', function (e) {
              $("#approve-account-name").html("");
              $("#modal-approve-account").find("form").attr("action", "");
          })
      });
  </script>