<div class="col-md-4">
    <!--begin::Card-->
    <div class="card card-flush h-md-100">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Flush Failed Jobs</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-1">
            <!--begin::Permissions-->
            <div class="d-flex flex-column text-gray-600">
                <div class="d-flex align-items-center py-2">
                    <span class="bullet bg-dark me-3"></span>This will run a system command to flush all failed queued jobs.</div>
            </div>
            <div class="text-center px-5">
                <img src="demo8/media/illustrations/unitedpalms-1/13-dark.png" alt="" class="mw-100 h-200px h-sm-325px" />
            </div>
            <!--end::Permissions-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <livewire:artisan.flush-failed-jobs/>
        <!--end::Card footer-->
    </div>
    <!--end::Card-->
</div>
