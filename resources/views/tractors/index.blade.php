<x-base-layout>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@include('tractors._partials._content')
@include('tractors._partials._create_modal')
@include('tractors._partials._edit_modal')

</x-base-layout>
