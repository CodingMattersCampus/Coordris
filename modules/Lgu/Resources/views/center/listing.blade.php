@extends('adminlte::page')
@section('title', 'EvacuationCenter')
@section('content_header')
    <h1>Center Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
        <form action="{{\route('centers.registration')}}" method="POST">
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
                <label for="#centerName">Center Name:</label>
                <input class="form-control" type="text" name="name" id="centerName" placeholder="Example: Sendong Survivors Center">
            </div>
            <div class="form-group">
                <label for="#barangay">Select Baranagay:</label>
                <select id="barangay" name="barangay_id" class="form-control">
                    @foreach($barangays as $barangay)
                        <option class="form-control" value="{{$barangay->id}}"> {{$barangay->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#infrastructure">Select Infrastructure:</label>
                <select id="infrastructure" name="infrastructure_id" class="form-control">
                    @foreach($infrastructures as $infrastructure)
                        <option class="form-control" value="{{$infrastructure->id}}"> {{$infrastructure->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#capacity">Capacity (per person):</label>
                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="10">
            </div>
            <div class="form-group">
                <label for="#electricity">Has Electricity Supply:</label>
                <select id="electricity" name="has_electricity_supply" class="form-control">
                    <option class="form-control" value="1"> Yes </option>
                    <option class="form-control" value="0"> No </option>
                </select>
            </div>
            <div class="form-group">
                <label for="#water-supply">Has Water Supply:</label>
                <select id="water-supply" name="has_water_supply" class="form-control">
                    <option class="form-control" value="1"> Yes </option>
                    <option class="form-control" value="0"> No </option>
                </select>
            </div>
            <div class="form-group">
                <label for="#network-coverage">Has Network Coverage:</label>
                <select id="network-coverage" name="has_network_coverage" class="form-control">
                    <option class="form-control" value="1"> Yes </option>
                    <option class="form-control" value="0"> No </option>
                </select>
            </div>
            <div class="form-goup">
                <button class="btn btn-block btn-primary">Register</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
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
                        <th>Capacity</th>
                        <th>Electricity Supply</th>
                        <th>Water Supply</th>
                        <th>Network Coverage</th>
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
    $(function () {
        var centerTable = $('#centers-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['pageLength'],
            "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "name", "orderable": false, "searchable": true },
                { "data": "structure", "orderable": false, "searchable": true },
                { "data": "barangay", "orderable": false, "searchable": true},
                { "data": "city", "orderable": false, "searchable": true },
                { "data": "capacity", "orderable": false, "searchable": false },
                { "data": "electricity", "orderable": false, "searchable": false },
                { "data": "water", "orderable": false, "searchable": false },
                { "data": "network", "orderable": false, "searchable": true },
            ],
            "ajax": "{{\route('api.lgu.centers.listing', \compact('lgu'))}}"
        });
    });
</script>
@endpush