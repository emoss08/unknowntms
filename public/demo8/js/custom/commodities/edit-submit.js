"use strict";
var Commodity_edit = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#equip_type_form_edit")),
                (e = document.querySelector("#equip_type_submit_edit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        status: { validators: { notEmpty: { message: "Status field is required." } } },
                        commodity_id: {
                            validators: {
                                notEmpty: { message: "The Commodity ID is required" },
                                stringLength: { min: 1, max: 4, message: "Commodity ID must be more than 1 and less than 4 characters long." },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Commodity ID can only consist of alphabetical and number" },
                            },
                        },
                        description: {
                            validators: {
                                notEmpty: { message: "Description field is required." },
                                stringLength: { min: 1, max: 50, message: "Description must be more than 1 and less than 50 characters long." },
                                regexp: { regexp: /^[a-z\s]+$/i, message: "Description can consist of alphabetical characters and spaces only." },
                            },
                        },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                    err: { clazz: "invalid-feedback" },
                    control: { valid: "is-valid", invalid: "is-invalid" },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" === i
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                    (e.disabled = !0),
                                    axios
                                        .post(e.closest("form").getAttribute("action"), new FormData(t))
                                        .then(function (e) {
                                            Swal.fire({
                                                text: "New record successfully processed!",
                                                icon: "success",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                                            }).then(function (e) {
                                                e.isConfirmed && ((t.querySelector('[name="commodity_id"]').value = ""), (t.querySelector('[name="description"]').value = ""), window.location.reload());
                                            });
                                        })
                                        .catch(function (t) {
                                            let e = t.response.data.message,
                                                i = t.response.data.errors;
                                            for (const t in i) i.hasOwnProperty(t) && (e += "\r\n" + i[t]);
                                            t.response && Swal.fire({ text: e, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                        })
                                        .then(function () {
                                            e.removeAttribute("data-kt-indicator"), (e.disabled = !1);
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
    Commodity_edit.init();
});
