<div class="d-flex flex-column flex-lg-row">

    @includeIf('trailers._partials._search')
    <div class="flex-lg-row-fluid">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-stack mb-5">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                    </div>
                    <!--end::Search-->

                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
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
                <!--end::Wrapper-->
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
