<x-base-layout>
    <!--
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        </div>
    </div>
</div>-->

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        @includeIf('roles._partials._content')
            <div class="ol-md-4">
                <!--begin::Card-->
                <div class="card h-md-100">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                            <!--begin::Illustration-->
                            <img src="demo8/media/illustrations/sketchy-1/4.png" alt="" class="mw-100 mh-150px mb-7" />
                            <!--end::Illustration-->
                            <!--begin::Label-->
                            <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                            <!--end::Label-->
                        </button>
                        <!--begin::Button-->
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--begin::Card-->
            </div>
        </div>


</x-base-layout>
