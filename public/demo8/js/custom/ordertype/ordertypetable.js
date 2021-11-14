var status = {
    1: {"title": "Pending", "state": "primary"},
    2: {"title": "Delivered", "state": "danger"},
    3: {"title": "Canceled", "state": "primary"},
    4: {"title": "Success", "state": "success"},
    5: {"title": "Info", "state": "info"},
    6: {"title": "Danger", "state": "danger"},
    7: {"title": "Warning", "state": "warning"},
};

$("#order_type_table").DataTable({
    "columnDefs": [
        {
            // The `data` parameter refers to the data for the cell (defined by the
            // `data` option, which defaults to the column being worked with, in
            // this case `data: 0`.
            "render": function ( data, type, row ) {
                var index = KTUtil.getRandomInt(1, 7);

                return data + '<span class="ms-2 badge badge-light-' + status[index]['state'] + ' fw-bold">' + status[index]['title'] + '</span>';
            },
            "targets": 1
        }
    ],
    "searching": false
});
