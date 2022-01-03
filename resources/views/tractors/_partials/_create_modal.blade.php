<!--begin::Modal - Create Tractor-->
<div class="modal fade" id="create-tractor" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Add New Tractor</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"
                     data-bs-toggle="tooltip" data-bs-placement="right" title="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                                  rx="1" transform="rotate(-45 6 17.3137)"
                                                                  fill="black"/>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                  transform="rotate(45 7.41422 6)" fill="black"/>
														</svg>
													</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form action="{{ route('tractors.store') }}" method="POST" novalidate="novalidate" id="tractor_form"
                      enctype="multipart/form-data">
                @csrf

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
                                    <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select an option" data-dropdown-parent="#create-tractor"
                                            name="status">
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
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Unique identifier for Tractor."></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="tractor_id"
                                           id="tractor_id_max" maxlength="15" required/>
                                    <!--end::Input-->
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
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
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Year of the tractor."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="year"
                                           id="kt_docs_maxlength_always_show" maxlength="4" required/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Make</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Make of the tractor."></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="make"
                                           id="kt_docs_maxlength_always_show" maxlength="30" required/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Model</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Model of the tractor."></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="model"
                                           id="kt_docs_maxlength_always_show" maxlength="30" required/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
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
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="VIN Number for the tractor. Example: 1XKYDP9X9KJ252282"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="vin"
                                           id="kt_docs_maxlength_always_show" maxlength="40" required/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Owned by</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Owner of the tractor."></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="owned_by"
                                           id="kt_docs_maxlength_always_show" maxlength="30" required/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Driver</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Driver Assigned to the Driver."></i>
                                    </label>
                                    <select class="form-select form-select-solid" data-dropdown-parent="#create-tractor"
                                            data-control="select2" data-placeholder="Select an driver" name="driver_1">
                                        <option></option>
                                        <option value="TDRIVER">Test Driver</option>
                                        <option value="UDRIVER">Unknown Driver</option>
                                    </select>
                                    <!--end::Input-->
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
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
                                        <span class="required">Tag</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="The yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="tag"
                                           id="kt_docs_maxlength_always_show" maxlength="40"/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Tag State</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="State of the yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                                    </label>
                                    <select class="form-select form-select-solid" data-dropdown-parent="#create-tractor"
                                            data-control="select2" data-placeholder="Select an state" name="tag_state">
                                        <option></option>
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
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                </div>
                                <!--end::Col-->
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Tag Expiration</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Expiration Date of Tag."></i>
                                    </label>
                                    <input class="form-control form-control-solid" name="tag_expiration"
                                           id="tag_expiration"/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                </div>
                            </div>
                        </div>

                        <div class="my-2"></div>

                        <div class="col-md-15 fv-row">
                            <div class="row fv-row">
                                <div class="col-md-4 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">Last Inspection</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Last inspection performed on tractor."></i>
                                    </label>
                                    <input class="form-control form-control-solid" name="last_inspection"
                                           id="last_inspection"/>
                                    <div class="valid-feedback">Looks good! Nice Job.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Comments</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                               title="Comments related to the tractor."></i>
                        </label>
                        <textarea name="comments" class="form-control form-control form-control-solid"
                                  data-kt-autosize="true" maxlength="50"></textarea>
                        <div class="valid-feedback">Looks good! Nice Job.</div>
                    </div>

                    <!-- Removal of Attachments for now
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Attachments</span>
                        </label>
                        <input type="file" name="attachments" id="attachment" />
                        <div class="valid-feedback">Looks good! Nice Job.</div>
                    </div>
                    End Removal of Attachments for now -->

                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="tractor_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Create Tractor-->
