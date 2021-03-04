@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Items</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/items/create" title="Create a item"> <i class="fas fa-plus-circle"></i>
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
            <th>Warehouse</th>
            <th>Name</th>
            <th>Barcode</th>
            <th>Actions</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->warehouse->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->barcode }}</td>
                                                             
                <td>
                    <form action="items/{{ $item->id }}" method="POST">

                        <a href="items/{{ $item->id }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="items/{{ $item->id }}/edit">
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

    {!! $items->links() !!}

@endsection
