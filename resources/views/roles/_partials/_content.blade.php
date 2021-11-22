@foreach ($roles as $key => $role)
    <div class="col-md-4">
        <!--begin::Card-->
        <div class="card card-flush h-md-100">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>{{ $role->name }}</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Users-->
                <div class="fw-bolder text-gray-600 mb-5">Total users with this role: 5</div>
                <!--end::Users-->
                <!--begin::Permissions-->
                <div class="d-flex flex-column text-gray-600">
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{ $v->name }}</div>
                        @endforeach
                    @endif
                </div>
                <!--end::Permissions-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer flex-wrap pt-0">
                <a href="{{ route('roles.show',$role->id) }}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
                <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-light btn-active-primary my-1 me-2">Edit Role</a>
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
@endforeach

