@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="card-footer flex-wrap pt-0">
    <button wire:click="runInspire" class="btn btn-dark my-1 me-2">Launch</button>
    <button wire:click="learn" class="btn btn-light btn-active-light-dark my-1 me-2">Learn More</button>
</div>
