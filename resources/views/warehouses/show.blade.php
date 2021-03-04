@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show warehose <strong>{{$warehouse->name}}</strong> </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/warehouses" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                <span>{{$warehouse->id}}</span>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <span>{{$warehouse->name}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country</strong>
                <span>{{$warehouse->country}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
                <span>{{$warehouse->city}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address</strong>
                <span>{{$warehouse->address}}</span>
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact person</strong>
                <span>{{$warehouse->contact_person}}</span>
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone</strong>
                <span>{{$warehouse->phone}}</span>
            </div>
            
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total number of items</strong>
                <span>{{$warehouse->total_number_of_items}}</span>
            </div>
            
        </div>
        
    </div>
@endsection
