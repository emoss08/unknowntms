@extends('articles.layout')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Advance Searching
                        </div>
                        <form method="GET" id="search-form">
                            <div class="row">
                                <div class="col-lg-3">
                                    <input type="text" class="form-control adv-search-input" placeholder="User Name" name="username" value="{{ (isset($_GET['username']) && $_GET['username'] != '')?$_GET['username']:'' }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control adv-search-input" placeholder="Country" name="country" value="{{ (isset($_GET['country']) && $_GET['country'] != '')?$_GET['country']:'' }}">
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                    <button class="btn btn-success" type="submit" id="extraSearch">Search</button>
                                    <a class="btn btn-danger" href="#">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            {{ __('Article Listing') }}
                            <button style="float: right; font-weight: 900;" class="btn btn-info btn-sm" type="button"  data-toggle="modal" data-target="#CreateArticleModal">
                                Create Article
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th width="150" class="text-center">Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // init datatable.
            var dataTable = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 5,
                // scrollX: true,
                "order": [[ 0, "desc" ]],
                ajax: {
                    url: '{{ route('get-users') }}',
                    data: function (d) {
                        d.username = $('input[name=username]').val();
                        d.country = $('input[name=country]').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
                ]
            });
        });
    </script>
@endsection
