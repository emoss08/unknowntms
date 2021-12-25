<div>
    <div class="card card-flush shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Tractor List</h3>
            <div class="card-toolbar">
                    <a wire:click.prevent="create" href="#" class="btn btn-light-primary btn-sm me-3">
                                                <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                                </svg>
                                                            </span>Add new product</a>
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="test_table">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>Status</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                    @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->status }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->code }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a wire:click.prevent="edit({{ $customer->id }})"
                                   href="#" class="btn btn-sm btn-primary">Edit</a>
                                <button wire:click.prevent="delete({{ $customer->id }})"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                        class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                            <td colspan="3">No customers found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $customers->links() }}

    <div class="modal" @if ($showModal) style="display:block" @endif>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h2 class="modal-title">{{ $CustomerId ? 'Edit Customer' : 'Add New Customer' }}</h2>
                        <button wire:click="close" type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
                        </button>
                    </div>
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-1">

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
                                        <input wire:model="status" class="form-control form-control-solid">
                                        @error('status')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Customer Code</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unique identifier for Customer."></i>
                                        </label>
                                        <input wire:model="code" type="text" class="form-control form-control-solid @error('description') is-invalid @enderror" maxlength="5" />
                                        <!--end::Input-->
                                        @error('customer.code')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Customer Name</span>
                                        </label>
                                        <input wire:model="customer.name" type="text" class="form-control form-control-solid" maxlength="50" />
                                        <!--end::Input-->
                                        @error('customer.name')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <!--end::Row-->
                            </div>
                            <div class="separator my-10"></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-15">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Address Line 1</span>
                                        </label>
                                        <input wire:model="customer.Address_line_1" type="text" class="form-control form-control-solid" />
                                        @error('customer.Address_line_1')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Address Line 2</span>
                                        </label>
                                        <input wire:model="customer.Address_line_2" type="text" class="form-control form-control-solid" />
                                        @error('customer.Address_line_2')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                        @enderror
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Zip Code/Postal Code</span>
                                        </label>
                                        <input wire:model.defer="customer.zip" type="text" class="form-control form-control-solid" />
                                        @error('customer.zip')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                    @enderror
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
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Country</span>
                                        </label>
                                        <input wire:model.defer="customer.zip" type="text" class="form-control form-control-solid" />
                                        @error('customer.zip')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                    @enderror
                                    <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Phone Number</span>
                                        </label>
                                        <input wire:model.defer="customer.phone" type="text" class="form-control form-control-solid" />
                                        @error('customer.phone')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                    @enderror
                                    <!--end::Input-->
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Email Address</span>
                                        </label>
                                        <input wire:model="customer.phone" type="text" class="form-control form-control-solid" />
                                        @error('customer.email')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="my-2"></div>
                            <div class="col-md-15 fv-row">
                                <div class="row fv-row">
                                    <div class="col-md-4 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Fax Number </span>
                                        </label>
                                        <input wire:model="customer.fax" type="text" class="form-control form-control-solid" />
                                        @error('customer.fax')
                                        <p style="font-size: 11px; color: red">{{ $message }}</p>
                                    @enderror
                                    </div>
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="close" type="button" class="btn btn-light me-3" data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">{{ $CustomerId ? 'Save Changes' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

