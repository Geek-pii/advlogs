jQuery(function ($) {
    var linkDatatable = $("meta[name=linkDatatable]").attr("content");

    var _table = $("#datatable");
  
    _table.DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            { data: "id", name: "id" },
            {
              data: "company"
            },
            {
              data: "roles",
            },
            { data: "mobile_number", name: "mobile_number", orderable: false },
            { data: "email", name: "email", orderable: false },
            { data: "full_name", name: "full_name", orderable: false },
            { data: "job_title", name: "job_title", orderable: false },
            {
              data: "primary_contact_number",
              name: "primary_contact_number",
              orderable: false,
            },
            {
              data: "business_phone_number",
              name: "business_phone_number",
              orderable: false,
            },
            { data: "active", name: "active", orderable: false },
            { data: "approval", name: "approval", orderable: false, searchable: false },
            { data: "action", name: "action", orderable: false, searchable: false },
          ],
        language: {
            url:
                "/assets/plugins/jquery-datatable/languages/" +
                COMPOSER_LOCALE +
                ".json",
        },
    });
});
