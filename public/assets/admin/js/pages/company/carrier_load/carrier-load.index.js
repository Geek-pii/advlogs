jQuery(function ($) {
    var linkDatatable = $("meta[name=linkDatatable]").attr("content");

    var _table = $("#datatable");
  
    _table.DataTable({
        responsive: true,
        processing: true,
        autoWidth: false,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            { data: "id", name: "id" },
            {
              data: "company", name: 'Company'
            },
            {
                data: "equipment_capacity",
                name: 'Equipment Capacity'
            },
            {
                data: "vehicle_types",
                name: 'Vehicle Types'
            },
            {
                data: "routes",
                name: 'Routes'
            },
            {
                data: "no_future_loads",
                name: 'No Future Loads'
            },
            {
                data: "send_offer",
                name: 'Send Offer'
            },
            {
                data: "max_offers",
                name: "Mac Offers"
            },
            {
                data: "truck_have_winch",
                name: "Truck Have Winch"
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
