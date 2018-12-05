@extends('adminlte::page')
@section('title', 'COORDRIS - Products Summary')
@section('content_header')
    <h1>Product Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
        <form action="{{route('products.registration')}}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger text-xs">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="#centerName">Name:</label>
                <input class="form-control" type="text" name="name" id="centerName" placeholder="Example: Drinks">
            </div>
            <div class="form-group">
                <label for="#brand">Brand:</label>
                <select class="form-control" name="brand_id" id="brand">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"> {{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#category">Category:</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#category">Subategory:</label>
                <select class="form-control" name="subcategory_id" id="category">
                    @foreach($subcategories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-block btn-primary">Register</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title text-capitalize">Product Summary</h4>
            </div>
            <div class="box-body">
                <table id="products-table" class="table table-responsive table-striped table-hover">
                    <thead class="bg-blue-gradient">
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/DataTables/datatables.min.css')}}"/>
@endpush
@push('js')
<script type="text/javascript" src="{{\asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
<script>
    $(function() {
        var productsTable = $('#products-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": [
                'pageLength', 'pdf', 'csv'
            ],
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "name", "orderable": false, "searchable": true },
                { "data": "brand", "orderable": false, "searchable": true },
                { "data": "category", "orderable": false, "searchable": true},
            ],
            "ajax": "{{\route('api.products.listing')}}"
        });

        setInterval(function() {
            productsTable.ajax.reload();
        }, 5000);
    });
</script>
@endpush