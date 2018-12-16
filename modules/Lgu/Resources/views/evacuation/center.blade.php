@extends('adminlte::page')
@section('title', 'EvacuationCenter')
@section('content_header')
    <h1>Center Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
        <form action="{{route('evacuation.center.registration')}}" method="POST">
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
                <label for="#center">Select Center:</label>
                <select id="center" name="center_code" class="form-control">
                    @foreach($centers as $center)
                        <option class="form-control" value="{{$center->code}}"> {{$center->name}}</option>
                    @endforeach
                </select>
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
                <label for="#duration">Support Duration (in Days):</label>
                <select id="duration" name="support_duration" class="form-control">
                    <option class="form-control" value="1"> 1 Day</option>
                    <option class="form-control" value="2"> 2 Days</option>
                    <option class="form-control" value="3" selected> 3 Days</option>
                    <option class="form-control" value="4"> 4 Days</option>
                    <option class="form-control" value="5"> 5 Days</option>
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
                <table id="centers-table" class="table table-responsive table-responsive-sm table-responsive-md table-striped table-hover">
                    <thead class="bg-blue-gradient">
                    <tr>
                        <th>Center</th>
                        <th>Disaster Support</th>
                        <th>Population</th>
                        <th>Capacity</th>
                        <th>Barangay</th>
                        <th>City</th>
                        <th>Support Duration</th>
                        <th>Electricity Supply</th>
                        <th>Water Supply</th>
                        <th>Network Coverage</th>
                        <th>Status</th>
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
<script>
    $(function () {
        const centerTable = $('#centers-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['pageLength'],
            "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "center", "orderable": false, "searchable": true },
                { "data": "disaster", "orderable": false, "searchable": true },
                { "data": "population", "orderable": false, "searchable": false },
                { "data": "capacity", "orderable": false, "searchable": false },
                { "data": "barangay", "orderable": false, "searchable": true},
                { "data": "city", "orderable": false, "searchable": true },
                { "data": "duration", "orderable": false, "searchable": true },
                { "data": "electricity", "orderable": false, "searchable": false },
                { "data": "water", "orderable": false, "searchable": false },
                { "data": "network", "orderable": false, "searchable": false },
                { "data": "status", "orderable": false, "searchable": false },
            ],
            "ajax": "{{\route('api.lgu.evacuation.centers', \compact('user'))}}"
        });

        //click rows
        $('#centers-table tbody').on('click', 'tr', function () {
            const data = centerTable.row( this ).data();
            window.location.href = "/evacuation/centers/"+ data['code'] +"/detail";
        });
    });
</script>
@endpush