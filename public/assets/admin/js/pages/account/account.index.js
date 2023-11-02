jQuery(function ($) {
  var linkDatatable = $("meta[name=linkDatatable]").attr("content");

  var _table = $("#datatable");

  _table.DataTable({
    processing: true,
    serverSide: true,
    lengthMenu: [
      [10, 25, 50, 100, 200, -1],
      [10, 25, 100, 200, "All"],
    ],
    pageLength: 10,
    ajax: {
      url: linkDatatable,
    },
    columns: [
      { data: "id", name: "id" },
      { data: "type", name: "type", "render": function (data, type, row) { 
          // upcase first letter
          return data.charAt(0).toUpperCase() + data.slice(1);
      }},
      {
        data: "company"
      },
      {
        data: "roles"
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
