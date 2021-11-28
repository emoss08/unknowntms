<x-base-layout>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @includeIf('trailers._partials._content')
    @includeIf('trailers._partials._create_modal')
    @includeIf('trailers._partials._edit_modal')
</x-base-layout>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
        $( "#selTrailers" ).select2({
            ajax: {
                url: "{{route('trailer.showTrailerList')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>
<script>
    $(function () {
        $("#trailer_table").DataTable({
            processing: !0,
            serverSide: !0,
            searching: !1,
            order: [[0, "desc"]],
            search: {return: !0},
            pageLength: 7,
            ajax: '{!! route('trailers.list') !!}',
            columns: [
                {
                    data: "status",
                    render: function (data, type, row, meta) {
                        if (type === 'display') {
                            if (data === 'Active') {
                                data = '<span class="badge badge-light-success">Active</span>';
                            } else if (data === 'Inactive') {
                                data = '<span class="badge badge-light-danger">Inactive</span>';
                            }
                            return data;
                        }
                    }
                },
                {data: "trailer_id", name: "trailer_id"},
                {data: "year", name: "year"},
                {data: "make", name: "make"},
                {data: "model", name: "model"},
                {data: "owned_by", name: "owned_by"},
                {data: "last_inspection", name: "last_inspection"},
                {data: "Actions", name: "Actions", orderable: !1, serachable: !1, sClass: "text-center"},
            ],
        });
    });
</script>
@foreach($trailers as $trailer)

<script>
    "use strict";
    var Trailer_{{$trailer->id}}=function() {
        var e, a, t;
        return {
            init:function() {
                e=document.querySelector("#trailer_form_edit-{{ $trailer->id }}"), a=document.querySelector("#trailer_submit_edit-{{ $trailer->id }}"),
                    t=FormValidation.formValidation(e, {
                            fields: {
                                status: {
                                    validators: {
                                        notEmpty: {
                                            message: "Status field is required."
                                        }
                                    }
                                },
                                trailer_id: {
                                    validators: {
                                        notEmpty: {
                                            message: "The tractor ID is required"
                                        }
                                        , stringLength: {
                                            min: 1,
                                            max: 10,
                                            message: "Equipment Type ID must be more than 1 and less than 10 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Equipment Type ID can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                year: {
                                    validators: {
                                        notEmpty: {
                                            message: "Year Field is required."
                                        }, stringLength: {
                                            min: 4, max: 4, message: "Year must be 4 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[0-9]+$/, message: "A year can only consist of number"
                                        }
                                    }
                                },
                                make: {
                                    validators: {
                                        notEmpty: {
                                            message: "Make field is required."
                                        }
                                        , stringLength: {
                                            min: 1,
                                            max: 50,
                                            message: "Make must be more than 1 and less than 50 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Make can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                equip_type_id: {
                                    validators: {
                                        notEmpty: {
                                            message: "Equipment Type is required"
                                        }
                                    }
                                },
                                model: {
                                    validators: {
                                        notEmpty: {
                                            message: "Model field is required."
                                        }
                                        , stringLength: {
                                            min: 1,
                                            max: 50,
                                            message: "Model must be more than 1 and less than 50 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Model can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                vin: {
                                    validators: {
                                        vin: {
                                            message: "The value is not valid VIN."
                                        }
                                        , notEmpty: {
                                            message: "VIN field is required."
                                        }
                                        , stringLength: {
                                            min: 1,
                                            max: 17,
                                            message: "VIN must be more than 1 and less than 17 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "VIN can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                owned_by: {
                                    validators: {
                                        stringLength: {
                                            min: 1,
                                            max: 50,
                                            message: "Owned By must be more than 1 and less than 50 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Owned By can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                tag: {
                                    validators: {
                                        stringLength: {
                                            min: 1,
                                            max: 50,
                                            message: "Tag must be more than 1 and less than 50 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Tag can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                tag_state: {
                                    validators: {
                                        stringLength: {
                                            min: 1,
                                            max: 50,
                                            message: "Tag must be more than 1 and less than 50 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-zA-Z0-9]+$/,
                                            message: "Tag can only consist of alphabetical and number"
                                        }
                                    }
                                },
                                tag_expiration: {
                                    validators: {
                                        date: {
                                            format: "YYYY-MM-DD",
                                            message: "The value is not a valid date. Use the format YYYY-MM-DD"
                                        }
                                    }
                                },
                                last_inspection: {
                                    validators: {
                                        date: {
                                            format: "YYYY-MM-DD",
                                            message: "The value is not a valid date. Use the format YYYY-MM-DD"
                                        }
                                    }
                                },
                                comments: {
                                    validators: {
                                        stringLength: {
                                            min: 1,
                                            max: 500,
                                            message: "Comments must be more than 1 and less than 500 characters long."
                                        }
                                        , regexp: {
                                            regexp: /^[a-z\s]+$/i,
                                            message: "Description can consist of alphabetical characters and spaces only."
                                        }
                                    }
                                }
                            },
                        plugins: {
                                trigger:new FormValidation.plugins.Trigger, bootstrap:new FormValidation.plugins.Bootstrap5( {
                                        rowSelector: ".fv-row", eleInvalidClass:"is-invalid", eleValidClass:"is-valid"
                                    }
                                ), icon:new FormValidation.plugins.Icon( {
                                        valid: "fa fa-check", invalid:"fa fa-times", validating:"fa fa-refresh"
                                    }
                                )
                            },
                        err: {
                                clazz: "invalid-feedback"
                            },
                        control: {
                                valid: "is-valid", invalid:"is-invalid"
                            },
                        row: {
                                invalid: "has-danger"
                            }
                        }
                    ),
                    $(e.querySelector('[name="status"]')).on("change", function() {
                            t.revalidateField("status")
                        }
                    ),
                    $(e.querySelector('[name="equip_type_id"]')).on("change", function() {
                            t.revalidateField("equip_type_id")
                        }
                    ),
                    $(e.querySelector('[name="tag_state"]')).on("change", function() {
                            t.revalidateField("tag_state")
                        }
                    ),
                    $(e.querySelector('[name="tag_expiration"]')).on("change", function() {
                            t.revalidateField("tag_expiration")
                        }
                    ),
                    $(e.querySelector('[name="last_inspection"]')).on("change", function() {
                            t.revalidateField("last_inspection")
                        }
                    ),
                    a.addEventListener("click", function(n) {
                            n.preventDefault(), t.validate().then(function(t) {
                                    "Valid"===t?(a.setAttribute("data-kt-indicator", "on"), a.disabled= !0, axios.post(a.closest("form").getAttribute("action"), new FormData(e)).then(function(a) {
                                            Swal.fire( {
                                                    text:"Updated record successfully!", icon:"success", buttonsStyling: !1, confirmButtonText:"Ok, got it!", customClass: {
                                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                                    }
                                                }
                                            ).then(function(a) {
                                                    a.isConfirmed&&(e.querySelector('[name="trailer_id"]').value="", e.querySelector('[name="equip_type_id"]').value="", window.location.reload())
                                                }
                                            )
                                        }
                                    ).catch(function(e) {
                                            let a=e.response.data.message, t=e.response.data.errors;
                                            for(const e in t)t.hasOwnProperty(e)&&(a+="\r\n"+t[e]);
                                            e.response&&Swal.fire( {
                                                    text:a, icon:"error", buttonsStyling: !1, confirmButtonText:"Ok, got it!", customClass: {
                                                        confirmButton: "btn btn-primary"
                                                    }
                                                }
                                            )
                                        }
                                    ).then(function() {
                                            a.removeAttribute("data-kt-indicator"),a.disabled= !1
                                        }
                                    )):Swal.fire( {
                                            text:"Sorry, looks like there are some errors detected, please try again.", icon:"error", buttonsStyling: !1, confirmButtonText:"Ok, got it!", customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }
                                    )
                                }
                            )
                        }
                    )
            }
        }
    }();
    KTUtil.onDOMContentLoaded(function() {Trailer_{{$trailer->id}}.init()}
    );
</script>

<script>
    "use strict";
    $("#tag_expiration-{{ $trailer->id }}").daterangepicker(
        {
            singleDatePicker: !0,
            showDropdowns: !0,
            autoUpdateInput: !1,
            drops: "auto",
            opens: "center",
            minYear: 2020,
            maxYear: 2025,
            autoApply: true,
            locale: { format: "YYYY-MM-DD" },
            ranges: { Today: [moment()], Yesterday: [moment().subtract(1, "days")], "7 Days Ago": [moment().subtract(6, "days")], "30 Days Ago": [moment().subtract(29, "days")] },
        },
        function (t) {
            $("#tag_expiration-{{ $trailer->id }}").val(t.format("YYYY-MM-DD"));
        }
    ),
        $(".selectall").click(function () {
            $(this).is(":checked") ? $("div input").attr("checked", !0) : $("div input").attr("checked", !1);
        }),
        $("#last_inspection-{{ $trailer->id }}").daterangepicker(
            {
                singleDatePicker: !0,
                showDropdowns: !0,
                autoUpdateInput: !1,
                drops: "auto",
                opens: "center",
                minYear: 2020,
                maxYear: 2025,
                locale: { format: "YYYY-MM-DD" },
                autoApply: true,
                ranges: { Today: [moment()], Yesterday: [moment().subtract(1, "days")], "7 Days Ago": [moment().subtract(6, "days")], "30 Days Ago": [moment().subtract(29, "days")] },
            },
            function (t) {
                $("#last_inspection-{{ $trailer->id }}").val(t.format("YYYY-MM-DD"));
            }
        ),
        $(".selectall").click(function () {
            $(this).is(":checked") ? $("div input").attr("checked", !0) : $("div input").attr("checked", !1);
        });
</script>

@endforeach
