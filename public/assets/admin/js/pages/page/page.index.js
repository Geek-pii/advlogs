jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    var _datatable = _table.DataTable({
        dom: 'l<"toolbar">frtip',
        initComplete: function () {
            $("div.toolbar").html('<a href="javascript:void(0)" class="btn btn-info waves-effect pull-right delete"><i class="material-icons">delete</i><span>Delete</span></a>');
        },
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        lengthChange: false, 
        paging: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'check', name: 'check', orderable: false},
            {data: 'translations', name: 'translations.title', orderable: false},
            {data: 'theme', name: 'theme', orderable: false},
            {data: 'parent', name: 'parent', orderable: false},
            {data: 'active', name: 'active', orderable: false},
            {data: 'created_at', name: 'created_at', orderable: true},
            {data: 'updated_at', name: 'updated_at', orderable: true},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [
            [5, "desc"]
        ],
        language: {
            url: DATATABLE_LANGUAGE
        }
    });

    $(document).on('click', 'input[name=check]', function () {
        var _check_list = $('input[name=check]');
        var _checked_count = 0;
        _check_list.each(function () {
            if ($(this).is(':checked')) {
                _checked_count++;
            }
        })
        if (_checked_count > 0) {
            $('.toolbar').css('display', 'block');
        } else {
            $('.toolbar').css('display', 'none');
        }
    });

    $(document).on('click', 'input[name=check_all]', function () {
        var _check_all = $(this);
        var _check_list = $('input[name=check]');
        _check_list.each(function () {
            $(this).prop('checked', _check_all.is(':checked'));
        });
        $('.toolbar').css('display', _check_all.is(':checked') ? 'block' : 'none');
    });

    $(document).on('click', '.delete', function () {
        var _check_list = $('input[name=check]');
        var _checked_array = [];
        _check_list.each(function () {
            if ($(this).is(':checked')) {
                _checked_array.push($(this).attr('data-id'));
            }
        })

        $.confirm({
            title: 'Confirmation!',
            content: 'Are you sure you want to delete this file?',
            type: 'red',
            buttons: {
                ok: {
                    btnClass: 'btn-primary text-white',
                    keys: ['enter'],
                    action: function () {
                        $.post(POST_DELETE_MULTI, {array_id: _checked_array}).done(function () {
                            _datatable.draw();
                            $('input[name=check_all]').prop('checked', false);
                            $('.toolbar').css('display', 'none');
                        });
                    }
                },
                cancel: function () {
                    // 
                }
            }
        });
    });
});
