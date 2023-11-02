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
            {data: "id", name: "id"},
            {data: "use_factory", name: "use_factory", orderable: false},
            {data: "pay_to", name: "pay_to", orderable: false},
            {data: "days_paid", name: "days_paid", orderable: false},
            {data: "day_type", name: "day_type", orderable: false},
            {data: "fee", name: "fee", orderable: false},
            {data: "offer_start", name: "offer_start", orderable: false},
            {data: "offer_expiration", name: "offer_expiration", orderable: false},
            {data: "created_at", name: "created_at", orderable: false},
            {data: "action", name: "action", orderable: false, searchable: false},
        ],
        language: {
            url:
                "/assets/plugins/jquery-datatable/languages/" +
                COMPOSER_LOCALE +
                ".json",
        },
    });
});
