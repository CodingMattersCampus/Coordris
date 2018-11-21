@extends('adminlte::page')

@section('title', 'COORDRIS - Center Detail')

@section('content_header')
    <h1>Center Registration Page</h1>
@stop

@section('content')
<div class="row">
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
        <input type="text" name="name">
        <input type="text" value="1" name="barangay_id">
        <input type="text" value="1" name="city_id">
        <input type="text" value="1" name="infrastructure_id">
        <button> Register</button>
    </form>
</div>
@stop