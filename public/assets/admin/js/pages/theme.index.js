jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {
                data: 'no', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, orderable: false, searchable: false
            },
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        language: {
            url: DATATABLE_LANGUAGE
        }
    });
});
