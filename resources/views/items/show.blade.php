@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show item <strong>{{$item->name}}</strong> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/items" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                <span>{{$item->id}}</span>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Warenouse:</strong>
                <span>{{$item->warehouse->name}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <span>{{$item->name}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Barcode</strong>
                <span>{{$item->barcode}}</span>
            </div>
        </div>      
        
    </div>
@endsection
