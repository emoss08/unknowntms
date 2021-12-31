 <!--begin::Modal - Create Trailer-->
    <div class="modal fade" id="create-trailer" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add New trailer</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-1">
                    <form action="{{ route('trailers.store') }}" method="POST" id="trailer_form_create" novalidate>
                    @csrf
                        <div class="row mb-5">
                            <div class="col-md-15 fv-row">
                                <div class="row fv-row">
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Status</span>
                                        </label>
                                        <select class="form-select form-select-solid" data-control="select2" data-dropdown-parent="#create-trailer" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Trailer ID</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unique identifier for Trailer."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="trailer_id" id="kt_docs_maxlength_always_show" maxlength="15" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="separator my-5"></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-15 fv-row">
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Year</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Year of the trailer."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="year" id="kt_docs_maxlength_always_show" maxlength="4" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Make</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Make of the trailer."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="make" id="kt_docs_maxlength_always_show" maxlength="30" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Model</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Model of the trailer."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="model" id="kt_docs_maxlength_always_show" maxlength="30" required />
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
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="VIN Number for the trailer."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="vin" id="kt_docs_maxlength_always_show" maxlength="17" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Owned by</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Owner of the trailer."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="owned_by" id="kt_docs_maxlength_always_show" maxlength="50" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Equipment Type</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Type of Trailer."></i>
                                        </label>
                                        <select class="form-select form-select-solid" data-control="select2" name="equip_type_id" data-placeholder="Select an option" data-dropdown-parent="#create-trailer">
                                            <option></option>
                                            @foreach($equipTypes as $equipType)
                                                <option value="{{ $equipType->equip_type_id }}">{{ $equipType->equip_type_id }} - {{ $equipType->description }}</option>
                                            @endforeach
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
                                        <input type="text" class="form-control form-control-solid" name="tag" id="kt_docs_maxlength_always_show" maxlength="40" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Tag State</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="State of the yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                                        </label>
                                        <select class="form-select form-select-solid" data-dropdown-parent="#create-trailer" data-control="select2" data-placeholder="Select an state" name="tag_state">
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
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Tag Expiration</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Expiration Date of Tag."></i>
                                        </label>
                                        <input class="form-control form-control-solid" name="tag_expiration" id="tag_expiration" value=""/>
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
                                        <input class="form-control form-control-solid" name="last_inspection" id="last_inspection" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Comments</span>
                            </label>
                            <textarea name="comments" class="form-control form-control form-control-solid" data-kt-autosize="true" maxlength="255"></textarea>
                        </div>
                        <div class="modal-footer">
                            <a data-bs-dismiss="modal"  class="btn btn-light me-3">Discard</a>
                            <button type="submit" id="trailer_submit" class="btn btn-primary">
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
    <!--end::Modal - Create Trailer-->
