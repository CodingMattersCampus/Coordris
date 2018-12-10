@extends('adminlte::page')
@section('title', 'EvacuationCenter')
@section('content_header')
    <h1>Disaster Registration Page</h1>
@stop
@section('content')
<div id="app" class="row">
    <div class="col-md-3">
        <form action="{{\route('disasters.registration')}}" method="POST">
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
                <label for="#centerName">Disaster:</label>
                <input class="form-control" type="text" name="name" id="centerName" placeholder="Example: Typhoon Sendong">
            </div>
            <div class="form-group">
                <label for="#type">Select Type:</label>
                <select id="type" name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option class="form-control" value="{{$type->id}}"> {{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="#date">Date of Occurrence:</label>
                <vuejs-datepicker placeholder="Select Date" input-class="form-control" id="date" name="disaster_date"></vuejs-datepicker>
            </div>
            <div class="form-goup">
                <button class="btn btn-block btn-primary">Record</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title text-capitalize">Summary</h4>
            </div>
            <div class="box-body">
                <table id="disasters-table" class="table table-responsive table-striped table-hover">
                    <thead class="bg-blue-gradient">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
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
        $('#disasters-table').DataTable({
            "dom": 'Bfrtip',
            "buttons": ['pageLength'],
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
            "serverSide": true,
            "deferRender": true,
            "columns": [
                { "data": "name", "orderable": false, "searchable": true },
                { "data": "type", "orderable": false, "searchable": true },
                { "data": "date", "orderable": true, "searchable": false},
            ],
            "ajax": "{{\route('api.disasters.listing')}}"
        });
    });
</script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>
<script>
    const app = new Vue({
        el: '#app',
        components: {
            vuejsDatepicker
        }
    })
</script>
@endpush