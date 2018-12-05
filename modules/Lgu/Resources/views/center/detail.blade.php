@extends('adminlte::page')
@section('title', 'COORDRIS - Center Detail')
@section('content_header')
    <h1>{{$center->name}}</h1>
@stop

@section('content')
<div class="row-fluid" id="app">
    <div class="box box-primary">
        <div class="box-header">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#household">Household Listing</a></li>
                <li><a data-toggle="tab" href="#item-request">Item Requests</a></li>
                <li><a data-toggle="tab" href="#forum">Forum</a></li>
            </ul>
        </div>
        <div class="box-body">
            <div class="tab-content">
                <div class="container-fluid tab-pane fade in active" id="household">
                    @include('lgu::center.partial.household', compact('center'))
                </div>
                <div class="container-fluid tab-pane fade in" id="item-request">
                    @include('lgu::center.partial.item-request')
                </div>
                <div class="container-fluid tab-pane fade in" id="forum">
                    @include('lgu::center.partial.forum')
                </div>
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
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
@endpush