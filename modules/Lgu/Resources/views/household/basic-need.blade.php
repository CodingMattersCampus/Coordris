@extends('adminlte::page')
@section('title', 'COORDRIS - Dashboard')
@section('content_header')
    <h1>Household Basic Needs</h1>
@stop
@section('content')
<div class="row-fluid" id="app">
    <span>Maximum # of Members: {{$household->total_members}}</span>
    @foreach($items as $item)
        <p>{{ $item->categoryName() }} - {{ $item->quantity }} - {{$item->unit}}</p>
    @endforeach
</div>
@stop
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush