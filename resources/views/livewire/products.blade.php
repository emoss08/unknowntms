<div>
    <div class="card card-flush shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Tractor List</h3>
            <div class="card-toolbar">
                @can('tractor-create')
                    <a wire:click.prevent="create" href="#" class="btn btn-light-primary btn-sm me-3">
                                                <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                                </svg>
                                                            </span>Add new product</a>
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
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="test_table">
        <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a wire:click.prevent="edit({{ $product->id }})"
                       href="#" class="btn btn-sm btn-primary">Edit</a>
                    <button wire:click.prevent="delete({{ $product->id }})"
                            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                            class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        @empty
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                <td colspan="3">No products found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    </div>
    </div>
    </div>
    {{ $products->links() }}

    <div class="modal" @if ($showModal) style="display:block" tabindex="-1" aria-hidden="true" @endif>\
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h2 class="modal-title">{{ $productId ? 'Edit Product' : 'Add New Product' }}</h2>
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
                        Name:
                        <br/>
                        <input wire:model="product.name" class="form-control form-control-solid"/>
                        @error('product.name')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br/>
                        Price:
                        <br/>
                        <input wire:model="product.price" class="form-control form-control-solid"/>
                        @error('product.price')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button wire:click="close" type="button" class="btn btn-light me-3" data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">{{ $productId ? 'Save Changes' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

