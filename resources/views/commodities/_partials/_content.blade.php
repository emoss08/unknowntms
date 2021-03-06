<div class="d-flex flex-column flex-lg-row">
    @includeIf('commodities._partials._search')
    <div class="flex-lg-row-fluid">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-stack mb-5">
                    <div class="d-flex align-items-center position-relative my-1">
                    </div>
                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                        @can('commodities-create') <button type="button" class="btn btn-light-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#create-commodity">
                            <span class="svg-icon svg-icon-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"/>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/> </svg>
                            </span> Add Commodity</button> @endcan <button type="button" class="btn btn-icon btn-light-info btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                                <span class="svg-icon svg-icon-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/> <rect x="11" y="11" width="2" height="2" rx="1" fill="black"/>
                                        <rect x="11" y="15" width="2" height="2" rx="1" fill="black"/> <rect x="11" y="7" width="2" height="2" rx="1" fill="black"/>
                                    </svg>
                                </span>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a data-bs-dismiss="modal" data-bs-toggle="tooltip" data-bs-placement="left" title="Coming Soon..." class="menu-link px-3">Import From Excel</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Export To Excel</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="commodity-table" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>Status</th>
                            <th>ID</th>
                            <th>Description</th>
                            <th class="text-end min-w-100px">Actions</th>
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
