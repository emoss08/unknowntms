<x-base-layout>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ordertypes.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ordertypes.update',$ordertype->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control form-control-solid" value="Active" name="is_active" readonly/>
                    <strong>order type</strong>
                    <input type="text" class="form-control form-control-solid" value="{{ $ordertype->order_type_id }}" name="order_type_id" id="kt_docs_maxlength_always_show" maxlength="4" required />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea name="description" class="form-control form-control form-control-solid" data-kt-autosize="true" maxlength="50">{{ $ordertype->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>

</x-base-layout>
