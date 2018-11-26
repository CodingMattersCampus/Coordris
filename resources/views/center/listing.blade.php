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
                <label for="#city">Select City:</label>
                <select id="city" name="city_id" class="form-control">
                    @foreach($cities as $city)
                        <option class="form-control" value="{{$city->id}}"> {{$city->name}}</option>
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
            <div class="form-goup">
                <button class="btn btn-block btn-primary">Register</button>
            </div>
        </form>
    </div>
    <div class="col-md-8"></div>
</div>
@stop
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('js')
<script type="text/javascript" src="{{\asset('js/app.js')}}"></script>
@endpush