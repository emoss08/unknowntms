"use strict";
var EquipmentType = (function () {
    var e, t, i;
    return {
        init: function () {
            (e = document.querySelector("#equipment_type_form")),
                (t = document.querySelector("#equip_type_submit")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        status: { validators: { notEmpty: { message: "The status is required" } } },
                        equip_type_id: {
                            validators: {
                                notEmpty: { message: "The equipment type id is required" },
                                stringLength: { min: 1, max: 4, message: "Equipment Type ID must be more than 1 and less than 4 characters long." },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Equipment Type ID can only consist of alphabetical and number" },
                            },
                        },
                        description: {
                            validators: {
                                notEmpty: { message: "Description field is required." },
                                stringLength: { min: 5, max: 50, message: "Description must be more than 5 and less than 50 characters long." },
                                regexp: { regexp: /^[a-z\s]+$/i, message: "Description can consist of alphabetical characters and spaces only." },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "is-invalid", eleValidClass: "is-valid" }),
                        icon: new FormValidation.plugins.Icon({ valid: "fa fa-check", invalid: "fa fa-times", validating: "fa fa-refresh" }),
                    },
                    err: { clazz: "invalid-feedback" },
                    control: { valid: "is-valid", invalid: "is-invalid" },
                    row: { invalid: "has-danger" },
                })),
                t.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" === i
                                ? (t.setAttribute("data-kt-indicator", "on"),
                                    (t.disabled = !0),
                                    axios
                                        .post(t.closest("form").getAttribute("action"), new FormData(e))
                                        .then(function (t) {
                                            Swal.fire({
                                                text: "New record successfully processed!",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                                            }).then(function (t) {
                                                t.isConfirmed && ((e.querySelector('[name="equip_type_id"]').value = ""), (e.querySelector('[name="description"]').value = ""), window.location.reload());
                                            });
                                        })
                                        .catch(function (e) {
                                            let t = e.response.data.message,
                                                i = e.response.data.errors;
                                            for (const e in i) i.hasOwnProperty(e) && (t += "\r\n" + i[e]);
                                            e.response && Swal.fire({ text: t, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                        })
                                        .then(function () {
                                            t.removeAttribute("data-kt-indicator"), (t.disabled = !1);
                                        }))
                                : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    EquipmentType.init();
});
