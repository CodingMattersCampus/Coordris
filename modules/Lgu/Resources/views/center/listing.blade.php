@extends('adminlte::page')
@section('title', 'COORDRIS - Center Detail')
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
                <label for="#disaster">Select Disaster:</label>
                <select id="disaster" name="disaster_id" class="form-control">
                    @foreach($disasters as $disaster)
                        <option class="form-control" value="{{$disaster->id}}"> {{$disaster->name}}</option>
                    @endforeach
                </select>
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
                <label for="#duration">Support Duration (in Days):</label>
                <select id="duration" name="support_duration" class="form-control">
                    <option class="form-control" value="1"> 1 Day</option>
                    <option class="form-control" value="2"> 2 Days</option>
                    <option class="form-control" value="3" selected> 3 Days</option>
                    <option class="form-control" value="4"> 4 Days</option>
                    <option class="form-control" value="5"> 5 Days</option>
                </select>
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
        var table = $('#centers-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['pageLength'],
            "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]],
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
            "ajax": "{{\route('api.lgu.centers.listing', \compact('lgu'))}}"
        });
        //click rows
        $('#centers-table tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            window.location.href = ""+ data['slug'] +"/detail";
        });
    });
</script>
@endpush