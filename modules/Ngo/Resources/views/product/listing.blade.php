@extends('adminlte::page')
@section('title', 'COORDRIS - Products Summary')
@section('content_header')
    <h1>Product Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/mdb/css/mdb.min.css')}}"/>
@endpush
@push('js')
<script type="text/javascript" src="{{\asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/mdb/js/mdb.min.js')}}"></script>
<script>
    $(function() {
        var table = $('#products-table').DataTable({
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
            "ajax": "{{\route('api.ngo.products.listing', compact('user'))}}"
        });
    });
</script>
@endpush