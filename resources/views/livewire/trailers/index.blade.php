<div class="d-flex flex-column flex-lg-row">
    @includeIf('trailers._partials._search')
    <div class="flex-lg-row-fluid">
        <div class="card card-flush shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Trailers List</h3>
                <div class="card-toolbar">
                    @can('tractor-create')
                        <button type="button" class="btn btn-light-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#create-trailer">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                                </svg>
                                                            </span>
                            <!--end::Svg Icon-->Add Trailer</button>
                @endcan
                <!--begin::Trigger-->
                    <button type="button" class="btn btn-icon btn-light-info btn-sm"
                            data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-start">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com008.svg-->
                        <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
                                <rect x="11" y="11" width="2" height="2" rx="1" fill="black"/>
                                <rect x="11" y="15" width="2" height="2" rx="1" fill="black"/>
                                <rect x="11" y="7" width="2" height="2" rx="1" fill="black"/>
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Trigger-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                         data-kt-menu="true">
                        <!--begin::Menu item-->
                        @can('tractor-create')
                            <div class="menu-item px-3">
                                <a data-bs-dismiss="modal" data-bs-toggle="tooltip" data-bs-placement="left" title="Coming Soon..." class="menu-link px-3">
                                    Import From Excel
                                </a>
                            </div>
                    @endcan
                    <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a wire:click="export" class="menu-link px-3" target="_blank" >
                                Export to Excel
                            </a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="{{ route('tractor.pdf') }}" class="menu-link px-3">
                                Export To PDF
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Toolbar-->
                </div>
                <!--end::Group actions-->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="trailer_table">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>Status</th>
                            <th>Trailer ID</th>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Owned By</th>
                            <th>Last Inspection</th>
                            <th width="150" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--begin::Modal - Edit Tractors-->
    <div class="@if (!$showModal) hidden @endifmodal fade" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-xl">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <h2 class="modal-title">Updating Trailer - {{ $trailer->trailer_id }}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
                    </div>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class=" modal-body scroll-y mx-5 mx-xl-15 my-1">
                    <!--begin::Form-->
                    <form action="{{ route('trailers.update',$trailer->id) }}" method="POST" id="trailer_form_edit-{{ $trailer->id }}" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row mb-5">
                            <div class="col-md-15 fv-row">
                                <div class="row fv-row">
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Status</span>
                                        </label>
                                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="{{ $trailer->status }}" data-dropdown-parent="#edit-trailers-{{ $trailer->id }}" name="status">
                                            <option></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Trailer ID</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unique identifier for Tractor."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="trailer_id" maxlength="15" value="{{ $trailer->trailer_id }}" required />
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
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Year of the tractor."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="year" id="kt_docs_maxlength_always_show" value="{{ $trailer->year }}" maxlength="4" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Make</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Make of the tractor."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="make" id="kt_docs_maxlength_always_show" value="{{ $trailer->make }}" maxlength="30" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Model</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Model of the tractor."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="model" id="kt_docs_maxlength_always_show" value="{{ $trailer->model }}" maxlength="30" required />
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
                                        <input type="text" class="form-control form-control-solid" name="vin" id="kt_docs_maxlength_always_show" value="{{ $trailer->vin }}" maxlength="40" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Owned by</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Owner of the tractor."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="owned_by" id="kt_docs_maxlength_always_show" value="{{ $trailer->owned_by }}" maxlength="30" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Equipment Type</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Type of Trailer."></i>
                                        </label>
                                        <select class="form-select form-select-solid" data-control="select2" name="equip_type_id" data-dropdown-parent="#edit-trailers-{{ $trailer->id }}">
                                            <option>{{ $trailer->equip_type_id }}</option>
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
                                        <input type="text" class="form-control form-control-solid" name="tag" id="kt_docs_maxlength_always_show" maxlength="40" value="{{ $trailer->tag }}" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Tag State</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="State of the yearly registration sticker that you place on your license plate every time you renew your vehicle's registration"></i>
                                        </label>
                                        <select class="form-select form-select-solid" data-dropdown-parent="#edit-trailers-{{ $trailer->id }}" data-control="select2" data-placeholder="Select an state" name="tag_state" >
                                            <option>{{ $trailer->tag_state }}</option>
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
                                        <input class="form-control form-control-solid" name="tag_expiration" id="tag_expiration-{{ $trailer->id }}" value="{{ $trailer->tag_expiration }}"/>
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
                                        <input class="form-control form-control-solid" name="last_inspection" id="last_inspection-{{ $trailer->id }}" value="{{ $trailer->last_inspection }}" />
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
                            <textarea name="comments" class="form-control form-control form-control-solid" data-kt-autosize="true" maxlength="50">{{ $trailer->comments }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <a data-bs-dismiss="modal" class="btn btn-light me-3">Discard</a>
                            <button type="submit" id="trailer_submit_edit-{{ $trailer->id }}" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
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
    <!--end::Modal - Edit Order Type-->
