@extends('adminlte::page')
@section('title', 'COORDRIS - Item Dispatch Summary')
@section('content_header')
    <h1>Dispatch Report</h1>
@stop
@section('content')
<div id="app" class="row-fluid">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title text-capitalize">Inventory Summary</h4>
        </div>
        <div class="box-body">
            <table id="dispatch-table" class="table table-responsive table-striped table-hover">
                <thead class="bg-blue-gradient">
                <tr>
                    <th>Family</th>
                    <th>Rice (kls)</th>
                    <th>Canned Goods (pcs)</th>
                    <th>Noodles (pcs)</th>
                    <th>Water (L)</th>
                    <th>Center</th>
                    <th>Date Given</th>
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
        const dispatchTable = $('#dispatch-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['pageLength', 'pdf', 'csv'],
            "lengthMenu": [[50, 250, 500, -1], [50, 250, 500, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "family", "orderable": false, "searchable": true },
                { "data": "rice", "orderable": false, "searchable": true},
                { "data": "canned_goods", "orderable": false, "searchable": true},
                { "data": "noodles", "orderable": false, "searchable": false},
                { "data": "water", "orderable": false, "searchable": false},
                { "data": "center", "orderable": false, "searchable": true },
                { "data": "date_given", "orderable": false, "searchable": false},
            ],
            "ajax": "{{\route('api.ngo.dispatch.report', compact('ngo'))}}"
        });

        setInterval(function() {
            dispatchTable.ajax.reload()
        }, 5000);
    });
</script>
@endpush