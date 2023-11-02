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
            {data: "quote_number", name: "quote_number"},
            {data: "picking_zip", name: "picking_zip", orderable: false},
            {data: "delivery_zip", name: "delivery_zip", orderable: false},
            {data: "preferred_pick_up_date", name: "preferred_pick_up_date", orderable: false},
            {data: "year", name: "year", orderable: false},
            {data: "make", name: "make", orderable: false},
            {data: "model", name: "model", orderable: false},
            {data: "condition", name: "condition", orderable: false},
            {data: "run_drives", name: "run_drives", orderable: false},
            {data: "rolls_steers_brakes", name: "rolls_steers_brakes", orderable: false},
            {data: "transport_type", name: "transport_type", orderable: false},
            {data: "transport_speed", name: "transport_speed", orderable: false},
            {data: "modification_description", name: "modification_description", orderable: false},
            {data: "first_name", name: "first_name", orderable: false},
            {data: "last_name", name: "last_name", orderable: false},
            {data: "email_address", name: "email_address", orderable: false},
            {data: "phone_number", name: "phone_number", orderable: false},
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
