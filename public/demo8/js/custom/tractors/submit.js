"use strict";
var Tractors = (function () {
    var e, t, i;
    return {
        init: function () {
            (e = document.querySelector("#tractor_form")),
                (t = document.querySelector("#tractor_submit")),
                (i = FormValidation.formValidation(e, {
                    fields: {
                        status: {
                            validators: {
                                notEmpty: {
                                    message: 'Status field is required.'
                                }
                            }
                        },
                        tractor_id: {
                            validators: {
                                notEmpty: { message: "The tractor ID is required" },
                                stringLength: { min: 1, max: 10, message: "Tractor ID must be more than 1 and less than 10 characters long." },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Tractor ID can only consist of alphabetical and number" },
                            }
                        },
                        year: {
                            validators: {
                                notEmpty: { message: 'Year Field is required.' },
                                stringLength: { min: 4, max: 4, message: 'Year must be 4 characters long.' },
                                regexp: { regexp: /^[0-9]+$/, message: "A year can only consist of number" },
                            }
                        },
                        make: {
                            validators: {
                                notEmpty: { message: 'Make field is required.' },
                                stringLength: { min: 1, max: 50, message: 'Make must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Make can only consist of alphabetical and number" },
                            }
                        },
                        model: {
                            validators: {
                                notEmpty: { message: 'Model field is required.' },
                                stringLength: { min: 1, max: 50, message: 'Model must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Model can only consist of alphabetical and number" },
                            }
                        },
                        vin: {
                            validators: {
                                vin: { message: 'The value is not valid VIN.' },
                                notEmpty: { message: 'VIN field is required.' },
                                stringLength: { min: 1, max: 17, message: 'VIN must be more than 1 and less than 17 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "VIN can only consist of alphabetical and number" },
                            }
                        },
                        owned_by: {
                            validators: {
                                stringLength: { min: 1, max: 50, message: 'Owned By must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Owned By can only consist of alphabetical and number" },
                            }
                        },
                        driver_1:{
                            validators: {
                                stringLength: { min: 1, max: 50, message: 'Driver 1 must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Driver 1 can only consist of alphabetical and number" },
                            }
                        },
                        tag:{
                            validators: {
                                stringLength: { min: 1, max: 50, message: 'Tag must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Tag can only consist of alphabetical and number" },
                            }
                        },
                        tag_state:{
                            validators: {
                                stringLength: { min: 1, max: 50, message: 'Tag must be more than 1 and less than 50 characters long.' },
                                regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Tag can only consist of alphabetical and number" },
                            }
                        },
                        tag_expiration:{
                            validators: {
                                date:{ format: 'YYYY-MM-DD', message: 'The value is not a valid date. Use the format YYYY-MM-DD' }
                            }
                        },
                        last_inspection:{
                            validators: {
                                date:{ format: 'YYYY-MM-DD', message: 'The value is not a valid date. Use the format YYYY-MM-DD' }
                            }
                        },
                        comments:{
                            validators: {
                                stringLength: { min: 1, max: 500, message: 'Comments must be more than 1 and less than 500 characters long.' },
                                regexp: { regexp: /^[a-z\s]+$/i, message: "Description can consist of alphabetical characters and spaces only." },
                            }
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

                // Select2 validation integration
                $(e.querySelector('[name="driver_1"]')).on('change', function () {
                    // Revalidate the color field when an option is chosen
                    i.revalidateField('driver_1');
                });
            // Select2 validation integration
            $(e.querySelector('[name="status"]')).on('change', function () {
                // Revalidate the color field when an option is chosen
                i.revalidateField('status');
            });
            // Select2 validation integration
            $(e.querySelector('[name="tag_state"]')).on('change', function () {
                // Revalidate the color field when an option is chosen
                i.revalidateField('tag_state');
            });

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
                                                t.isConfirmed && ((e.querySelector('[name="tractor_id"]').value = ""), (e.querySelector('[name="comments"]').value = ""), window.location.reload());
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
    Tractors.init();
});
