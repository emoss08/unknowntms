<div class="card card-flush shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Artisan Control Center</h3>
        <div class="card-toolbar">
            <button type="button" href="#" class="btn btn-sm btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Learn more about Artisan Control Center">
                Learn More
            </button>
        </div>
    </div>
    <div class="card-body py-5">
        @includeIf('artisan._partials._system._index')
        @includeIf('artisan._partials._jobs._index')
        @includeIf('artisan._partials._views._index')
    </div>
</div>
