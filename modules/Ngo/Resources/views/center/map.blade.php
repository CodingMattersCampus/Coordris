@extends('adminlte::page')
@section('title', 'COORDRIS - Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
<div class="row" id="app">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title text-capitalize">Center Summary</h4>
            </div>
            <div class="box-body">
                <table id="centers-table" class="table table-responsive table-striped table-hover">
                    <thead class="bg-blue-gradient">
                    <tr>
                        <th>Name</th>
                        <th>Infrastructure</th>
                        <th>Barangay</th>
                        <th>City</th>
                        <th>Disaster Support</th>
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
            var table = $('#centers-table').DataTable({
                "dom": 'Bfrtip',
                "buttons": [
                    'pageLength', 'pdf', 'csv'
                ],
                "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                "serverSide": true,
                "deferRender": true,
                "columns": [
                    { "data": "name", "orderable": false, "searchable": true },
                    { "data": "structure", "orderable": false, "searchable": true },
                    { "data": "barangay", "orderable": false, "searchable": true},
                    { "data": "city", "orderable": false, "searchable": true },
                    { "data": "support", "orderable": false, "searchable": true },
                ],
                "ajax": "{{\route('api.centers.listing')}}"
            });
            //click rows
            $('#centers-table tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                window.location.href = ""+ data['slug'] +"/detail";
            });
        });
    </script>
@endpush