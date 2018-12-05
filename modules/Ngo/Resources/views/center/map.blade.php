@extends('adminlte::page')
@section('title', 'COORDRIS - Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
<div class="row-fluid" id="app">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title text-capitalize">Center Summary</h4>
        </div>
        <div class="box-body">
            <table id="centers-table" class="table table-responsive table-striped table-hover">
                <thead class="bg-blue-gradient">
                <tr>
                    <th>Name</th>
                    <th>Population</th>
                    <th>Infrastructure</th>
                    <th>Barangay</th>
                    <th>City</th>
                    <th>Disaster Support</th>
                    <th>Support Duration</th>
                    <th>Electricity Supply</th>
                    <th>Water Supply</th>
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
            const centersTable = $('#centers-table').DataTable({
                "dom": 'Bfrtip',
                "buttons": ['pageLength'],
                "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
                "serverSide": true,
                "deferRender": true,
                "columns": [
                    { "data": "name", "orderable": false, "searchable": true },
                    { "data": "population", "orderable": false, "searchable": false },
                    { "data": "structure", "orderable": false, "searchable": true },
                    { "data": "barangay", "orderable": false, "searchable": true},
                    { "data": "city", "orderable": false, "searchable": true },
                    { "data": "support", "orderable": false, "searchable": true },
                    { "data": "duration", "orderable": false, "searchable": false },
                    { "data": "electricity", "orderable": false, "searchable": false },
                    { "data": "water", "orderable": false, "searchable": false },
                ],
                "ajax": "{{\route('api.centers.listing')}}"
            });
            //click rows
            $('#centers-table tbody').on('click', 'tr', function () {
                const data = centersTable.row( this ).data();
                window.location.href = "/centers/"+ data['slug'] +"/detail";
            });

            setInterval(function() {
                centersTable.ajax.reload();
            }, 5000);
        });

    </script>
@endpush