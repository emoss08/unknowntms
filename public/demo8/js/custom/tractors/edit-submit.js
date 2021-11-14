"use strict";

// Class definition
var Tractor_Edit = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
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
                            notEmpty: {
                                message: 'Tractor ID field is required.'
                            }
                        }
                    },
                    year: {
                        validators: {
                            notEmpty: {
                                message: 'Year Field is required.'
                            },
                            numeric: {
                                message: 'The value is not a number.'
                            }
                        }
                    },
                    make: {
                        validators: {
                            notEmpty: {
                                message: 'Make field is required.'
                            }
                        }
                    },
                    model: {
                        validators: {
                            notEmpty: {
                                message: 'Model field is required.'
                            }
                        }
                    },
                    vin: {
                        validators: {
                            vin: {
                                message: 'The value is not valid VIN.'
                            },
                            notEmpty: {
                                message: 'VIN field is required.'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Select2 validation integration
        $(form.querySelector('[name="driver_1"]')).on('change', function () {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('driver_1');
        });
        // Select2 validation integration
        $(form.querySelector('[name="status"]')).on('change', function () {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('status');
        });
        // Select2 validation integration
        $(form.querySelector('[name="tag_state"]')).on('change', function () {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('tag_state');
        });

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status === 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Simulate ajax request
                    axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form))
                        .then(function (response) {
                            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Updated record successfully processed!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {
                                    form.querySelector('[name="status"]').value = "";
                                    form.querySelector('[name="tractor_id"]').value = "";
                                    form.querySelector('[name="year"]').value = "";
                                    form.querySelector('[name="make"]').value = "";
                                    form.querySelector('[name="model"]').value = "";
                                    form.querySelector('[name="vin"]').value = "";
                                    window.location.reload();
                                }
                            });
                        })
                        .catch(function (error) {
                            let dataMessage = error.response.data.message;
                            let dataErrors = error.response.data.errors;

                            for (const errorsKey in dataErrors) {
                                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                                dataMessage += "\r\n" + dataErrors[errorsKey];
                            }

                            if (error.response) {
                                Swal.fire({
                                    text: dataMessage,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        })
                        .then(function () {
                            // always executed
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;
                        });
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
        });
    };

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#tractor_form_edit');
            submitButton = document.querySelector('#tractor__edit_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    Tractor_Edit.init();
});
