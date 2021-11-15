<!--begin::Aside-->
<div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5">
    <!--begin::Form-->
    <form action="#">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin:Search-->
                <p class="fw-bolder text-danger">*** Still in Development! ***</p>
                <div class="position-relative">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
															</svg>
														</span>
                    <!--end::Svg Icon-->
                    <input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Search">
                </div>
                <!--end:Search-->
                <!--begin::Border-->
                <div class="separator separator-dashed my-8"></div>
                <!--end::Border-->
                <!--begin::Input group-->
                <div class="mb-5">
                    <label class="fs-6 form-label fw-bolder text-dark">Status</label>
                    <!--begin::Select-->
                    <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-placeholder="In Progress" data-hide-search="true" data-select2-id="select2-data-10-lo7h" tabindex="-1" aria-hidden="true">
                        <option value="Active" selected="selected" data-select2-id="select2-data-12-dieh">Active</option>
                        <option value="2">In-Active</option>
                        <option value="3">Done</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-5">
                    <label class="fs-6 form-label fw-bolder text-dark">Tractor ID</label>
                    <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-placeholder="In Progress" data-hide-search="true" tabindex="-1" aria-hidden="true">
                        @foreach ($tractor as $tractors)
                            <option value="{{$tractors->tractor_id}}">{{$tractors->tractor_id}}</option>
                        @endforeach
                    </select>
                </div>
                <!--end::Input group-->
                <!--begin::Action-->
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="btn btn-active-light-primary btn-color-gray-400 me-3">Discard</a>
                    <a href="#" class="btn btn-primary">Search</a>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </form>
    <!--end::Form-->
</div>
