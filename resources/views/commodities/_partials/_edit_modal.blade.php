@foreach ($commodities as $commodity)
    <div class="modal fade" id="edit-commodity-{{$commodity->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Updating Commodity - {{$commodity->commodity_id}}</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form action="{{route('commodities.update',$commodity->id)}}" method="POST" id="commodity_form_edit_{{$commodity->id}}" novalidate>
                        @csrf @method('PUT')
                        <div class="row mb-5">
                            <div class="col-md-15 fv-row">
                                <div class="row fv-row">
                                    <div class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2"> <span class="required">Status</span> </label>
                                        <select class="form-select form-select-solid" name="status" data-control="select2" data-placeholder="{{$commodity->status}}">
                                            <option></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Commodity ID</span> <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Unique identifier for Commodity."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" value="{{$commodity->commodity_id}}" name="commodity_id" id="kt_docs_maxlength_always_show" maxlength="4" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Description</span> <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Brief description of Commodity."></i>
                            </label>
                            <textarea name="description" class="form-control form-control form-control-solid" data-kt-autosize="true" maxlength="50">{{$commodity->description}}</textarea>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="commodity_submit_edit_{{$commodity->id}}" class="btn btn-primary">
                                <span class="indicator-label">Submit</span> <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
