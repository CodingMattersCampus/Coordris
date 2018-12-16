@extends('adminlte::page')
@section('title', 'EvacuationCenter')
@section('content_header')
    <h1>{{$center->centerName()}}
        <span class = "pull-right">
            <input type="checkbox" id="status" name="status" data-toggle="toggle"/>
        </span>
    </h1> 
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
                    @include('lgu::center.partial.item-request', compact('center', 'given'))
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
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush
@push('js')
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/DataTables/datatables.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $('#status').bootstrapToggle({
      on: 'Active',
      off: 'Inactive'
    });


$(function() {
        $.ajax({
            dataType: "json",
                url: "{{\route("api.center.status", compact('center'))}}",
            success(response) {
                $('#status').bootstrapToggle(response.status);
                },
            error(response) {
                }
        });
  });

     $('#status').change(function(){
            $.ajax({
                'type': "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                url: "{{\route('center.status.update', compact('center'))}}",
                data: {
                    'status' : $(this).prop('checked'),
                },
                success(response) {
                
                },
                error(response) {

                }
            });
    });

    

</script>
@endpush