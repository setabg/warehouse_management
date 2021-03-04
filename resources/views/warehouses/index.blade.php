@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Warehouses </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/warehouses/create" title="Create a warehouse"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID </th>
            <th>Name</th>
            <th>Country</th>
            <th>City</th>
            <th>Address </th>
            <th>Contact person </th>
            <th>Phone</th>
            <th>Total number of items</th>
            <th>Actions</th>
        </tr>
        @foreach ($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->id }}</td>
                <td>{{ $warehouse->name }}</td>
                <td>{{ $warehouse->country }}</td>
                <td>{{ $warehouse->city }}</td>
                <td>{{ $warehouse->address }}</td>
                <td>{{ $warehouse->contact_person }}</td>
                <td>{{ $warehouse->phone }}</td>
                <td>{{ $warehouse->total_number_of_items }}</td>
               
                
                <td>
                    <form action="warehouses/{{ $warehouse->id }}" method="POST">

                        <a href="warehouses/{{ $warehouse->id }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="warehouses/{{ $warehouse->id }}/edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;" onclick="return confirm('Are you sure you want to delete this item?');">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $warehouses->links() !!}

@endsection
