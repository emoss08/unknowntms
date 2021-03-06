$("#tag_expiration").daterangepicker(
    {
        singleDatePicker: !0,
        showDropdowns: !0,
        autoUpdateInput: !1,
        drops: "auto",
        opens: "center",
        minYear: 2020,
        maxYear: 2025,
        locale: {format: 'YYYY-MM-DD'},
        ranges: { Today: [moment()], Yesterday: [moment().subtract(1, "days")], "7 Days Ago": [moment().subtract(6, "days")], "30 Days Ago": [moment().subtract(29, "days")] },
    },
    function (t) {
        $("#tag_expiration").val(t.format("YYYY-MM-DD"));
    }
),
    $(".selectall").click(function () {
        $(this).is(":checked") ? $("div input").attr("checked", !0) : $("div input").attr("checked", !1);
    }),
    $("#last_inspection").daterangepicker(
        {
            singleDatePicker: !0,
            showDropdowns: !0,
            autoUpdateInput: !1,
            drops: "auto",
            opens: "center",
            minYear: 2020,
            maxYear: 2025,
            ranges: { Today: [moment()], Yesterday: [moment().subtract(1, "days")], "7 Days Ago": [moment().subtract(6, "days")], "30 Days Ago": [moment().subtract(29, "days")] },
        },
        function (t) {
            $("#last_inspection").val(t.format("YYYY-MM-DD"));
        }
    ),
    $(".selectall").click(function () {
        $(this).is(":checked") ? $("div input").attr("checked", !0) : $("div input").attr("checked", !1);
    });
