@extends('adminlte::page')
@section('title', 'COORDRIS - Dashboard')
@section('content_header')
    <h1>Household Basic Needs</h1>
@stop
@section('content')
<div class="row-fluid" id="app">
	<table id="disasters-table" class="table table-responsive table-striped table-hover">
            <thead class="bg-blue-gradient">
                    <tr>
                        <th>Top Level Category</th>
                        <th>Main Category</th>
                        <th>Subcategory</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    </table>
    <span>Maximum # of Members: {{$household->total_members}}</span>
    @foreach($items as $item)
        <p>{{ $item->categoryName() }} - {{ $item->subcategoryName() }} - {{ $item->quantity }} - {{$item->unit}}</p>
    @endforeach
    {{--@php dd($specific->toArray());@endphp--}}
    		
    
</div>
@stop
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush