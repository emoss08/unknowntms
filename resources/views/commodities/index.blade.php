<x-base-layout>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        @includeIf('commodities._partials._content')
        @includeIf('commodities._partials._create_modal')
        @includeIf('commodities._partials._edit_modal')
</x-base-layout>
