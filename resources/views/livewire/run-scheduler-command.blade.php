@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="card-footer flex-wrap pt-0">
    <button wire:click="run" class="btn btn-dark my-1 me-2">Launch</button>
    <a href="#" class="btn btn-light btn-active-light-dark my-1 me-2">Learn More</a>
</div>
