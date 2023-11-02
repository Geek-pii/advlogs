jQuery(function ($) {
  var linkDatatable = $("meta[name=linkDatatable]").attr("content");

  var _table = $("#datatable");

  _table.DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    autoWidth: false,
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
      {
        data: "company_legal_name",
        name: "company_legal_name",
        orderable: false,
      },
      {
        data: "accounts",
        render: function (data, type, row) {
          console.log(data);
          if (data[0].type == "business") {
            return "Business Client";
          }
          if (data[0].type == "carrier") {
            return "Carrier";
          }
        },
        bSearchable: false
      },
      { data: "company_dba", name: "company_dba", orderable: false },
      {
        data: "created_at",
        name: "created_at",
        orderable: false,
        searchable: false,
      },
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
