@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('programmes.create') }}"> Create New Item</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-4">
        <form action="{{ route('programmes.search') }}" method="get">
            <div class="form-group">
                <input type="search" name="search" class="form-control">
                <span class="input-group-prepend">
                   <button type="submit" class="btn btn-primary">Rechercher</button>
               </span>
            </div>
        </form>
    </div>


    <table class="table table-bordered">
        <tr>

            <th>Id-event</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($items as $key => $item)
    <tr>

        <td>{{ $item->id_event }}</td>
        <td>{{ $item->description }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('programmes.show',$item->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('programmes.edit',$item->id) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('programmes.destroy',$item->id) }}">Delete</a>
     
        </td>
    </tr>
    @endforeach
    </table>


    {!! $items->render() !!}


@endsection