@extends('adminlte::page')
@section('title', 'COORDRIS - Products Summary')
@section('content_header')
    <h1>Product Registration Page</h1>
@stop
@section('content')
<div id="app" class="row-fluid">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title text-capitalize">Inventory Summary</h4>
        </div>
        <div class="box-body">
            <table id="products-table" class="table table-responsive table-striped table-hover">
                <thead class="bg-blue-gradient">
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Stocks</th>
                </tr>
                </thead>
            </table>
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
            "buttons": ['pageLength', 'pdf', 'csv'],
            "lengthMenu": [[50, 250, 500, -1], [50, 250, 500, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "name", "orderable": false, "searchable": true },
                { "data": "brand", "orderable": false, "searchable": true },
                { "data": "category", "orderable": false, "searchable": true},
                { "data": "subcategory", "orderable": false, "searchable": true},
                { "data": "stocks", "orderable": false, "searchable": false},
            ],
            "ajax": "{{\route('api.ngo.products.listing', compact('user'))}}"
        });

        setInterval(function() {
            productsTable.ajax.reload()
        }, 10000);
    });
</script>
@endpush