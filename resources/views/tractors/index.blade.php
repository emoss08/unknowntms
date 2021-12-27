<x-base-layout>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@if (auth()->user()->is_admin)
    test to see if you're admin
@endif
@includeIf('tractors._partials._content')
@includeIf('tractors._partials._create_modal')
</x-base-layout>

    <script>
        // Create FilePond object
        const inputElement = document.querySelector('input[id="attachment"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        });
    </script>
<script>
    $(function(){$('#tractor_table').DataTable({
        ajax:'{!! route('api.tractors.index') !!}',
        columns:[
        {
            data: "status",
            render: function (data, type, row, meta) {
                if (type === 'display') {
                    if (data === 'Active') {
                        data = '<span class="badge badge-light-success">Active</span>';
                    } else if (data === 'Inactive') {
                        data = '<span class="badge badge-light-danger">Inactive</span>';
                    }
                    return data;
                }
            }
        },
            {data:'tractor_id',name:'tractor_id'},
            {data:'year',name:'year'},
            {data:'make',name:'make'},
            {data:'model',name:'model'},
            {data:'owned_by',name:'owned_by'},
            {data:'last_inspection',name:'last_inspection'},
            {data:'Actions',name:'Actions',orderable:!1,sClass:'text-center'},
        ],
    })
})
</script>
<!-- end::Script to Produce DataTable for Tractors -->

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
        $( "#selTractors" ).select2({
            ajax: {
                url: "{{route('tractors.showTractors')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>
