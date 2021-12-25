<x-base-layout>
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Edit Tractor  - {{ $tractor->tractor_id }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('tractors.index') }}" type="button" class="btn btn-sm btn-light">
                    Go Back
                </a>
            </div>
        </div>
    <!--begin::Form-->
        <form action="{{ route('tractors.update',$tractor->id) }}" method="POST" id="tractor_form_edit" novalidate>
            @csrf
            @method('PUT')
        <div class="card-body">
    <!--begin::Input group-->
        <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-15 fv-row">
                <!--begin::Row-->
                <div class="row fv-row">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Status</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="{{ $tractor->status }}" name="status">
                            <option></option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Tractor ID</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unique identifier for Tractor."></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="tractor_id" id="kt_docs_maxlength_always_show" maxlength="15" value="{{ $tractor->tractor_id }}" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <div class="separator my-10"></div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-15 fv-row">
                <!--begin::Row-->
                <div class="row fv-row">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Year</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Year of the tractor."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="year" id="kt_docs_maxlength_always_show" value="{{ $tractor->year }}" maxlength="4" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Make</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Make of the tractor."></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="make" id="kt_docs_maxlength_always_show" value="{{ $tractor->make }}" maxlength="30" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Model</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Model of the tractor."></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="model" id="kt_docs_maxlength_always_show" value="{{ $tractor->model }}" maxlength="30" required />
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
            <div class="my-2"></div>
            <!--begin::Col-->
            <div class="col-md-15 fv-row">
                <!--begin::Row-->
                <div class="row fv-row">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">VIN #</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="VIN Number for the tractor."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="vin" id="kt_docs_maxlength_always_show" value="{{ $tractor->vin }}" maxlength="40" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Owned by</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Owner of the tractor."></i>
                        </label>
                        <input type="text" class="form-control form-control-solid" name="owned_by" id="kt_docs_maxlength_always_show" value="{{ $tractor->owned_by }}" maxlength="30" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Driver</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Driver Assigned to the Driver."></i>
                        </label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an driver" name="driver_1">
                            <option>{{ $tractor->driver_1 }}</option>
                            <option value="TDRIVER">Test Driver</option>
                            <option value="UDRIVER">Unknown Driver</option>
                        </select>
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
            <div class="my-2"></div>
            <!--begin::Col-->
            <div class="col-md-15 fv-row">
                <!--begin::Row-->
                <div class="row fv-row">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Tag</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="The yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" name="tag" id="kt_docs_maxlength_always_show" maxlength="40" value="{{ $tractor->tag }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Tag State</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="State of the yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                        </label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an state" name="tag_state" >
                            <option>{{ $tractor->tag_state }}</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <div class="col-md-4 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Tag Expiration</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Expiration Date of Tag."></i>
                        </label>
                        <input class="form-control form-control-solid" name="tag_expiration" id="tag_expiration" value="{{ $tractor->tag_expiration }}"/>
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
            <div class="my-2"></div>
            <!--begin::Col-->
            <div class="col-md-15 fv-row">
                <!--begin::Row-->
                <div class="row fv-row">
                    <div class="col-md-4 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Last Inspection</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Last inspection performed on tractor."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid" name="last_inspection" id="last_inspection" value="{{ $tractor->last_inspection }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-7 fv-row">
            <!--begin::solid autosize textarea-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span>Comments</span>
            </label>
            <textarea name="comments" class="form-control form-control form-control-solid" data-kt-autosize="true" maxlength="50">{{ $tractor->comments }}</textarea>
            <!--end::solid autosize textarea-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
    </div>
        <div class="card-footer">
        <div class="text-center">
            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
            <button type="submit" id="tractor_submit_edit" class="btn btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
    </div>
</x-base-layout>
<script>
    "use strict";
    var tractor = (function () {
        var e, a, t;
        return {
            init: function () {
                (e = document.querySelector("#tractor_form_edit")),
                    (a = document.querySelector("#tractor_submit_edit")),
                    (t = FormValidation.formValidation(e, {
                        fields: {
                            status: { validators: { notEmpty: { message: "Status field is required." } } },
                            tractor_id: {
                                validators: {
                                    notEmpty: { message: "The tractor ID is required" },
                                    stringLength: { min: 1, max: 10, message: "Equipment Type ID must be more than 1 and less than 10 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Equipment Type ID can only consist of alphabetical and number" },
                                },
                            },
                            year: {
                                validators: {
                                    notEmpty: { message: "Year Field is required." },
                                    stringLength: { min: 4, max: 4, message: "Year must be 4 characters long." },
                                    regexp: { regexp: /^[0-9]+$/, message: "A year can only consist of number" },
                                },
                            },
                            make: {
                                validators: {
                                    notEmpty: { message: "Make field is required." },
                                    stringLength: { min: 1, max: 50, message: "Make must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Make can only consist of alphabetical and number" },
                                },
                            },
                            model: {
                                validators: {
                                    notEmpty: { message: "Model field is required." },
                                    stringLength: { min: 1, max: 50, message: "Model must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Model can only consist of alphabetical and number" },
                                },
                            },
                            vin: {
                                validators: {
                                    vin: { message: "The value is not valid VIN." },
                                    notEmpty: { message: "VIN field is required." },
                                    stringLength: { min: 1, max: 17, message: "VIN must be more than 1 and less than 17 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "VIN can only consist of alphabetical and number" },
                                },
                            },
                            owned_by: {
                                validators: {
                                    stringLength: { min: 1, max: 50, message: "Owned By must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Owned By can only consist of alphabetical and number" },
                                },
                            },
                            driver_1: {
                                validators: {
                                    stringLength: { min: 1, max: 50, message: "Driver 1 must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Driver 1 can only consist of alphabetical and number" },
                                },
                            },
                            tag: {
                                validators: {
                                    stringLength: { min: 1, max: 50, message: "Tag must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Tag can only consist of alphabetical and number" },
                                },
                            },
                            tag_state: {
                                validators: {
                                    stringLength: { min: 1, max: 50, message: "Tag must be more than 1 and less than 50 characters long." },
                                    regexp: { regexp: /^[a-zA-Z0-9]+$/, message: "Tag can only consist of alphabetical and number" },
                                },
                            },
                            tag_expiration: { validators: { date: { format: "YYYY-MM-DD", message: "The value is not a valid date. Use the format YYYY-MM-DD" } } },
                            last_inspection: { validators: { date: { format: "YYYY-MM-DD", message: "The value is not a valid date. Use the format YYYY-MM-DD" } } },
                            comments: {
                                validators: {
                                    stringLength: { min: 1, max: 500, message: "Comments must be more than 1 and less than 500 characters long." },
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
                    $(e.querySelector('[name="driver_1"]')).on("change", function () {
                        t.revalidateField("driver_1");
                    }),
                    $(e.querySelector('[name="status"]')).on("change", function () {
                        t.revalidateField("status");
                    }),
                    $(e.querySelector('[name="tag_state"]')).on("change", function () {
                        t.revalidateField("tag_state");
                    }),
                    a.addEventListener("click", function (n) {
                        n.preventDefault(),
                            t.validate().then(function (t) {
                                "Valid" === t
                                    ? (a.setAttribute("data-kt-indicator", "on"),
                                        (a.disabled = !0),
                                        axios
                                            .post(a.closest("form").getAttribute("action"), new FormData(e))
                                            .then(function (a) {
                                                Swal.fire({
                                                    text: "New record successfully processed!",
                                                    icon: "success",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: { confirmButton: "btn font-weight-bold btn-light-primary" },
                                                }).then(function (a) {
                                                    a.isConfirmed && ((e.querySelector('[name="tractor_id"]').value = ""), (e.querySelector('[name="comments"]').value = ""),
                                                        window.location = "/tractors");
                                                });
                                            })
                                            .catch(function (e) {
                                                let a = e.response.data.message,
                                                    t = e.response.data.errors;
                                                for (const e in t) t.hasOwnProperty(e) && (a += "\r\n" + t[e]);
                                                e.response && Swal.fire({ text: a, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                                            })
                                            .then(function () {
                                                a.removeAttribute("data-kt-indicator"), (a.disabled = !1);
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
        tractor.init();
    });
</script>
<!-- end:: Form Validation Script for each Equipment Type -->
<script>
    "use strict"; $("#tag_expiration").daterangepicker({singleDatePicker:!0,showDropdowns:!0,autoUpdateInput:!1,drops:"auto",opens:"center",minYear:2020,maxYear:2025,autoApply:true,locale:{format: 'YYYY-MM-DD'},ranges:{Today:[moment()],Yesterday:[moment().subtract(1,"days")],"7 Days Ago":[moment().subtract(6,"days")],"30 Days Ago":[moment().subtract(29,"days")]}},function(t){$("#tag_expiration-{{ $tractor->id }}").val(t.format("YYYY-MM-DD"))}),$(".selectall").click(function(){$(this).is(":checked")?$("div input").attr("checked",!0):$("div input").attr("checked",!1)}),$("#last_inspection").daterangepicker({singleDatePicker:!0,showDropdowns:!0,autoUpdateInput:!1,drops:"auto",opens:"center",minYear:2020,maxYear:2025,locale:{format: 'YYYY-MM-DD'},autoApply:true,ranges:{Today:[moment()],Yesterday:[moment().subtract(1,"days")],"7 Days Ago":[moment().subtract(6,"days")],"30 Days Ago":[moment().subtract(29,"days")]}},function(t){$("#last_inspection-{{ $tractor->id }}").val(t.format("YYYY-MM-DD"))}),$(".selectall").click(function(){$(this).is(":checked")?$("div input").attr("checked",!0):$("div input").attr("checked",!1)});
</script>
